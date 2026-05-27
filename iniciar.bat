@echo off

echo ========================================
echo Inicializando projeto Laravel
echo ========================================

echo.
echo Instalando dependencias PHP...
call composer install --no-interaction

echo.
if not exist ".env" (
    echo Criando .env a partir do .env.example...
    copy .env.example .env
)

echo.
echo ========================================
echo Configure o arquivo .env:
echo.
echo DB_DATABASE=
echo DB_USERNAME=
echo DB_PASSWORD=
echo ========================================

pause

echo.
echo Gerando APP_KEY...
call php artisan key:generate

echo.
echo Limpando caches...
call php artisan optimize:clear

echo.
echo ========================================
echo Escolha uma opcao para o banco:
echo.
echo 1. Rodar migrate
echo 2. Rodar migrate:fresh
echo 3. Rodar migrate --seed
echo 4. Rodar migrate:fresh --seed
echo 5. Pular etapa do banco
echo ========================================

set /p DB_OPTION=Digite a opcao (1-5): 

if "%DB_OPTION%"=="1" (
    echo.
    echo Rodando migrations...
    call php artisan migrate
)

if "%DB_OPTION%"=="2" (
    echo.
    echo Rodando migrate:fresh...
    call php artisan migrate:fresh
)

if "%DB_OPTION%"=="3" (
    echo.
    echo Rodando migrate com seed...
    call php artisan migrate --seed
)

if "%DB_OPTION%"=="4" (
    echo.
    echo Rodando migrate:fresh com seed...
    call php artisan migrate:fresh --seed
)

if "%DB_OPTION%"=="5" (
    echo.
    echo Etapa do banco ignorada.
)

echo.
echo Instalando dependencias frontend...
call cmd /c npm install

echo.
echo Buildando assets...
call cmd /c npm run build

echo.
echo ========================================
echo Projeto pronto!
echo ========================================

echo.
echo Para iniciar o servidor:
echo php artisan serve

pause
