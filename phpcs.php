<?php

declare(strict_types=1);

class PhpcsCommentManager
{
    private $jsonData;

    public function __construct(string $jsonFilePath)
    {
        $this->parseJson($jsonFilePath);
    }

    public function getAllComments(): string
    {
        $allComments = '';

        foreach ($this->jsonData as $warning) {
            $allComments .= "--------------------------------\n";
            $allComments .= $this->getSingleComment($warning);
        }

        return $allComments;
    }

    public function saveCommentsToFile(string $filePath, string $comments): void
    {
        file_put_contents($filePath, $comments);
    }

    private function getSingleComment($warning): string
    {
        $lines = isset($warning->location->lines->end) ? $warning->location->lines->begin.':'.$warning->location->lines->end : $warning->location->lines->begin;

        return
            $this->getCommentLine('Severity', $warning->severity).
            $this->getCommentLine('Description', $warning->description).
            $this->getCommentLine('Path', $warning->location->path).
            $this->getCommentLine('Line(s)', $lines);
    }

    private function parseJson(string $filename): void
    {
        $json = file_get_contents($filename);
        $this->jsonData = json_decode($json);
    }

    private function getCommentLine(string $key, string|int $value): string
    {
        return $key.': '.$value."\n";
    }
}

$parser = new PhpcsCommentManager($argv[1]);
$comments = $parser->getAllComments();
$parser->saveCommentsToFile($argv[2], $comments);
