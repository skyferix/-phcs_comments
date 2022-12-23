# phcs_comments

Project to create a comment under MR in case of failed analysis job

## Getting started

1) Create system user for comment under MR part. (if not use your own - unrecommended)
2) Create access token (2FA need to be enabled)
3) Create a Project CI variable -> CI_ACCESS_TOKEN

## How it works

1. Static analysis tool analyzes code in the analysis stage and creat warning list artifact.
2. In warning_comments stage analysis result are parsed into text comments
3. Comments is being added as note to MR via gitlab api (author the owner of the access token)
