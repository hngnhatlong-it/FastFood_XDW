@echo off
REM ============================================
REM KFT Deploy Script - For InfinityFree
REM ============================================

echo ========================================
echo KFT Deployment Script
echo ========================================

REM Get current date for version
for /f "tokens=2 delims==" %%a in ('wmic OS Get localdatetime /value') do set "dt=%%a"
set version=%dt:~0,8%

REM Get project root (where this script is located)
set PROJECT_ROOT=%~dp0
set PROJECT_ROOT=%PROJECT_ROOT:~0,-1%

echo Project Root: %PROJECT_ROOT%
echo Version: %version%

REM Create temp folder outside project
echo.
echo [1/7] Creating temp folder...
if exist "%PROJECT_ROOT%\temp_deploy" rmdir /S /Q "%PROJECT_ROOT%\temp_deploy"
mkdir "%PROJECT_ROOT%\temp_deploy"

REM Copy required folders
echo [2/7] Copying project files...
xcopy /E /I /Y "%PROJECT_ROOT%\app" "%PROJECT_ROOT%\temp_deploy\app\"
xcopy /E /I /Y "%PROJECT_ROOT%\config" "%PROJECT_ROOT%\temp_deploy\config\"
xcopy /E /I /Y "%PROJECT_ROOT%\database" "%PROJECT_ROOT%\temp_deploy\database\"
xcopy /E /I /Y "%PROJECT_ROOT%\public" "%PROJECT_ROOT%\temp_deploy\public\"
xcopy /E /I /Y "%PROJECT_ROOT%\resources" "%PROJECT_ROOT%\temp_deploy\resources\"
xcopy /E /I /Y "%PROJECT_ROOT%\routes" "%PROJECT_ROOT%\temp_deploy\routes\"
xcopy /E /I /Y "%PROJECT_ROOT%\storage" "%PROJECT_ROOT%\temp_deploy\storage\"
xcopy /Y "%PROJECT_ROOT%\bootstrap\app.php" "%PROJECT_ROOT%\temp_deploy\"
xcopy /Y "%PROJECT_ROOT%\bootstrap\providers.php" "%PROJECT_ROOT%\temp_deploy\"

REM Copy vendor folder (updated for PHP 8.2 compatibility)
echo [3/7] Copying vendor folder...
xcopy /E /I /Y "%PROJECT_ROOT%\vendor" "%PROJECT_ROOT%\temp_deploy\vendor\"

REM Copy config files
echo [4/7] Copying config files...
copy /Y "%PROJECT_ROOT%\composer.json" "%PROJECT_ROOT%\temp_deploy\"
copy /Y "%PROJECT_ROOT%\package.json" "%PROJECT_ROOT%\temp_deploy\"
copy /Y "%PROJECT_ROOT%\vite.config.js" "%PROJECT_ROOT%\temp_deploy\"
copy /Y "%PROJECT_ROOT%\tailwind.config.js" "%PROJECT_ROOT%\temp_deploy\"
copy /Y "%PROJECT_ROOT%\artisan" "%PROJECT_ROOT%\temp_deploy\"

REM Copy .htaccess for InfinityFree
echo [5/7] Copying .htaccess...
(
echo RewriteEngine On
echo RewriteRule ^(.*^)$ /public/$1 [L]
) > "%PROJECT_ROOT%\temp_deploy\.htaccess"

REM Copy .env.prod as .env for production
copy /Y "%PROJECT_ROOT%\.env.prod" "%PROJECT_ROOT%\temp_deploy\.env"

REM Run migrations and seed
echo [6/7] Running migrations...
cd /d "%PROJECT_ROOT%"
php artisan migrate:fresh --seed

REM Export database
echo [7/7] Exporting database...
mysqldump -u root fastfood_db > "%PROJECT_ROOT%\temp_deploy\database\fastfood_db.sql"

REM Create zip
echo.
echo Creating zip file...
powershell -NoProfile -Command "Compress-Archive -Path '%PROJECT_ROOT%\temp_deploy\*' -DestinationPath '%PROJECT_ROOT%\temp_deploy\kft-v%version%.zip' -Force"

REM Move zip to project root
move /Y "%PROJECT_ROOT%\temp_deploy\kft-v%version%.zip" "%PROJECT_ROOT%\deploy\"

REM Clean up
rmdir /S /Q "%PROJECT_ROOT%\temp_deploy"

echo.
echo ========================================
echo Deploy Complete!
echo File: %PROJECT_ROOT%\deploy\kft-v%version%.zip
echo ========================================
pause
