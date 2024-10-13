<?php
session_start();

require_once 'config/config.php';
require_once 'lib/autoloader.php';
require_once 'controllers/HomeController.php';

$db = new PDO(DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PWD);

$route = $_GET['route'] ?? 'home';

try {
    switch ($route) {
        case 'home':
            $controller = new HomeController($db);
            $controller->index();
            break;

        case 'login':
            $controller = new UserController($db);
            $controller->login();
            break;

        case 'userPage':
            $controller = new UserController($db);
            $controller->showUserPage();
            break;

        case 'logout':
            $controller = new UserController($db);
            $controller->logout();
            break;

        default:
            throw new Exception("Route non trouvée");
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}
