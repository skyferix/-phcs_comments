
# phcs_comments

Project to create a comment under MR in case of failed analysis job

## Important

Does not perform comment adding if there are any conflict between 2 branches!

## Information

This repo works based on 3rd party action wich can be found here ->
[github repo](https://github.com/thenabeel/action-phpcs)
[github marketplace](https://github.com/marketplace/actions/action-phpcs)

## Getting started

1) You can define custom option to the file .github/workflows/commenter.yml using input keyword.
2) Used variables could be found in [action.yml](https://github.com/thenabeel/action-phpcs/blob/master/action.yml) file.
3) Change phpcs.xml config for other preferences or they way defined in the 3rd party documentation.

## How it works

1. It runs entirely on the 3rd party action.
2. Action outputs all the warnings and errors which then are picked by problem parser (checkstyle output)
