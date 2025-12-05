@echo off
title Project Runner - Latihan CI
color 0B

echo ========================================
echo        PROJECT STARTER v1.0
echo ========================================
echo.
echo 1. Starting PHP Built-in Server...
echo    URL: http://localhost:8000
echo.
echo 2. Opening browser...
start http://localhost:8000
echo.
echo 3. Server is running...
echo    Press CTRL+C to stop
echo ========================================
echo.

cd /d "C:\xampp\htdocs\latihanc"
php -S localhost:8000

pause