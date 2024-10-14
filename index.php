<?php
session_start();

require_once 'config/config.php';
require_once 'lib/autoloader.php';
require_once 'controllers/HomeController.php';

$db = new PDO(DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PWD);

$ctrl = $_GET['ctrl'] ?? 'home';

$action = $_GET['action'] ?? 'index';

$ctrl = 'HomeController';
if (isset($_GET['ctrl'])) {
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller';
}


$method = 'index';
if (isset($_GET['action'])) {
    $method = $_GET['action'];
}

try {
    if (class_exists($ctrl)) {
        $controller = new $ctrl();

        if (!empty($_POST)) {

            if (method_exists($ctrl, $method)) {
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id'], $_POST);
                } else {
                    $controller->$method($_POST);
                }
            }
        } else {

            if (method_exists($ctrl, $method)) {
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id']);
                } else {
                    $controller->$method();
                }
            }
        }
    }
} catch (Exception $e) {
    die($e->getMessage());
}
