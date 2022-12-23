#!/bin/bash
set -e

TOKEN="__SET_YOUR_PERSONAL_ACCESS_TOKEN__"
# Visible under name of project page.
PROJECT_ID="__SET_NUMERIC_PROJECT_ID__"
# Set your gitlab instance url.
GITLAB_INSTANCE="https://gitlab.com/api/v4/projects"
# How many to delete from the oldest, 100 is the maximum, above will just remove 100.
PER_PAGE=100

for PIPELINE in $(curl --header "PRIVATE-TOKEN: $TOKEN" "$GITLAB_INSTANCE/$PROJECT_ID/pipelines?per_page=$PER_PAGE&sort=asc" | jq '.[].id') ; do
    echo "Deleting pipeline $PIPELINE"
    curl --header "PRIVATE-TOKEN: $TOKEN" --request "DELETE" "$GITLAB_INSTANCE/$PROJECT_ID/pipelines/$PIPELINE"
done
