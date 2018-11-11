@echo off
set /p input=Enter a description: 
git add .
git commit -m "%input%"
git push -u origin master
PAUSE
