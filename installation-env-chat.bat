@echo off
title Installation de l'environnement de chat WebSocket
color 0A
echo =====================================================
echo       🚀 INSTALLATION DE L'ENVIRONNEMENT DE CHAT
echo =====================================================
echo.




echo [2/4] Vérification de Composer...
composer -V >nul 2>&1
IF %ERRORLEVEL% NEQ 0 (
    echo ⚠️ Composer n'est pas installé. Téléchargement en cours...
    powershell -Command "Invoke-WebRequest https://getcomposer.org/installer -OutFile composer-setup.php"
    php composer-setup.php --install-dir=C:\xampp\php --filename=composer
    del composer-setup.php
    echo ✅ Composer installé dans C:\xampp\php
) ELSE (
    echo ✅ Composer est déjà installé.
)
echo.


echo [3/4] Installation de Ratchet...
cd /d "%~dp0"
if not exist "vendor" (
    composer require cboden/ratchet
) else (
    echo 📦 Ratchet déjà installé.
)
echo.

:: Vérification finale
echo [4/4] Vérification des fichiers...
if exist "chat-server.php" (
    echo ✅ Fichier chat-server.php trouvé.
) else (
    echo ⚠️ Fichier chat-server.php manquant dans ce dossier.
    echo Télécharge-le avant de continuer.
)

echo =====================================================
echo ✅ INSTALLATION TERMINEE AVEC SUCCES !
echo =====================================================
echo.
pause
