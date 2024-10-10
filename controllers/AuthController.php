<?php

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function login() {
        $error = $_SESSION['error'] ?? null;
        $success = $_SESSION['success'] ?? null;

        // Clear the session messages immediately after retrieving them
        unset($_SESSION['error'], $_SESSION['success']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nameSignUp'])) {
                $this->handleSignup($_POST);
            } elseif (isset($_POST['emailSignIn'])) {
                $this->handleSignin($_POST);
            }
            // Redirect after POST to prevent form resubmission
            header('Location: index.php?route=login');
            exit();
        }

        // Afficher la page de connexion
        require_once __DIR__ . '/../views/login/login.php';
    }

    private function handleSignup($data) {
        // Vérification de la présence de tous les champs requis
        $requiredFields = ['nameSignUp', 'emailSignUp', 'pwdSignUp', 'ConfpwdSignUp', 'role'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $_SESSION['error'] = "Tous les champs sont obligatoires.";
                return;
            }
        }

        // Logique d'inscription
        try {
            $this->userModel->register([
                'nameSignUp' => $data['nameSignUp'],
                'emailSignUp' => $data['emailSignUp'],
                'pwdSignUp' => $data['pwdSignUp'],
                'ConfpwdSignUp' => $data['ConfpwdSignUp'],
                'role' => $data['role']
            ]);
            $_SESSION['success'] = "Inscription réussie !";
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    private function handleSignin($data) {
        // Vérification de la présence des champs requis
        if (!isset($data['emailSignIn']) || empty($data['emailSignIn']) || 
            !isset($data['pwdSignIn']) || empty($data['pwdSignIn'])) {
            $_SESSION['error'] = "Veuillez remplir tous les champs.";
            return;
        }

        try {
            $user = $this->userModel->getUserByEmail($data['emailSignIn']);
            
            if ($user && password_verify($data['pwdSignIn'], $user['u_mdp'])) {
                // Connexion réussie
                $_SESSION['user_id'] = $user['u_id'];
                $_SESSION['user_role'] = $user['u_role'];
                $_SESSION['success'] = "Connexion réussie !";
                // Rediriger vers la page d'accueil ou le tableau de bord
                header('Location: index.php');
                exit();
            } else {
                // Identifiants incorrects
                $_SESSION['error'] = "Email ou mot de passe incorrect.";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue lors de la connexion.";
        }
    }
}