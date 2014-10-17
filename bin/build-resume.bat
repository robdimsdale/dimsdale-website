@echo off
SET resume_dir=public_html\resume
SET resume_theme=classy

cd ..\resume-json\ && resume export resume.json --theme %resume_theme% --format html && cd .. && ^
xcopy /y resume-json\resume.json.html %resume_dir%\robdimsdale-resume.html
