<?php
session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/models/CoreModel.php';  
require_once __DIR__ . '/models/UserModel.php';  
require_once __DIR__ . '/controllers/UserController.php';

$db = new PDO(DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PWD);

$title = 'Accueil';

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'login':
        $userController = new UserController($db);
        $userController->login();
        break;
    case 'userPage':
        $userController = new UserController($db);
        $userController->showUserPage();
        break;
    case 'logout':
        $userController = new UserController($db);
        $userController->logout();
        break;
    default:
        $title = 'Accueil';
        include __DIR__ . '/views/home/home.php';
        break;
}

