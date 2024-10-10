<?php
session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/models/CoreModel.php';  
require_once __DIR__ . '/models/UserModel.php';  
require_once __DIR__ . '/controllers/AuthController.php';
// Ajoutez ici d'autres fichiers nécessaires

// Initialisation de la connexion à la base de données
$db = new PDO(DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PWD);

// Définir le titre de la page
$title = 'Accueil';

// Simple routing
$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'login':
        $authController = new AuthController($db);
        $authController->login();
        break;
    default:
        // Load the home page
        $title = 'Accueil';
        include __DIR__ . '/views/home/home.php';
        break;
}

