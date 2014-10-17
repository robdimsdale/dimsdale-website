#!/bin/bash

# Exit immediately on error
set -e

# Gets the directory that script lives in,
# irresepctive of where it's executed from.
DIR="$( cd "$( dirname "$0" )" && pwd )"

resume_dir=$DIR/../public_html/resume
resume_json_dir=$DIR/../resume-json
resume_theme=classy

RESUME_VERSION=$(resume --version)
echo "Using resume-cli version: $RESUME_VERSION"
echo "Using theme: $resume_theme"

cd $resume_json_dir
resume export resume.json --theme $resume_theme --format html
cp $resume_json_dir/resume.json.html $resume_dir/robdimsdale-resume.html

exit 0
