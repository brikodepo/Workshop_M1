<?php
// index.php

require_once 'config.php';
require_once 'Main/session.php';
require_once 'Modèles/Utilisateurs.php';
require_once 'Controleurs/AuthentificationControleurs.php';

session_start();

$action = $_GET['action'] ?? 'login';

$controller = new AuthController();

switch ($action) {
    case 'login':
        $controller->login();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        echo "404 - Page non trouvée";
}