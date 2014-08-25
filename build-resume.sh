#!/bin/bash

resume_dir=public_html/resume
resume_theme=classy

cp resume-json/resume.json $resume_dir/robdimsdale-resume.json
cd resume-json/ && resume export resume.json --theme $resume_theme --format html && cd ..
cp resume-json/resume.json.html $resume_dir/robdimsdale-resume.html

exit 0

