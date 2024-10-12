<?php

require_once 'models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct($params)
    {
        $this->userModel = new UserModel($params);
    }

    public function is_connected() : bool {
        return !empty($_SESSION['connected']);
    }

    public function login()
    {
        $error = $_SESSION['error'] ?? null;
        $success = $_SESSION['success'] ?? null;

        unset($_SESSION['error'], $_SESSION['success']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSignin($_POST);
            header('Location: index.php?route=login');
            exit();
        }

        require_once __DIR__ . '/../views/login/login.php';
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSignup($_POST);
            header('Location: index.php?route=login');
            exit();
        }

        require_once __DIR__ . '/../views/signup/signup.php';
    }

    private function handleSignup($data)
    {
        $requiredFields = ['nameSignUp', 'emailSignUp', 'pwdSignUp', 'ConfpwdSignUp', 'role'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $_SESSION['error'] = "Tous les champs sont obligatoires.";
                return;
            }
        }
        try {
            $hashedPassword = password_hash($data['pwdSignUp'], PASSWORD_DEFAULT);
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

    private function handleSignin($data)
    {
        if (
            !isset($data['emailSignIn']) || empty($data['emailSignIn']) ||
            !isset($data['pwdSignIn']) || empty($data['pwdSignIn'])
        ) {
            $_SESSION['error'] = "Veuillez remplir tous les champs.";
            return;
        }

        try {
            $user = $this->userModel->getUserByEmail($data['emailSignIn']);

            if ($user && password_verify($data['pwdSignIn'], $user['use_password'])) {
                $_SESSION['connected'] == 1;
                $_SESSION['user_id'] = $user['use_id'];
                $_SESSION['user_name'] = $user['use_name'];
                $_SESSION['user_email'] = $user['use_login'];
                $_SESSION['user_city'] = $user['use_city'];
                $_SESSION['user_skill'] = $user['use_skill'];
                $_SESSION['user_role'] = $user['rol_id'];
                $_SESSION['success'] = "Connexion réussie !";
                header('Location: index.php');
                exit();
            } else {
                $_SESSION['error'] = "Email ou mot de passe incorrect.";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue lors de la connexion.";
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type'] ?? '';
            $name = $_POST['nameSignUp'] ?? '';
            $email = $_POST['emailSignUp'] ?? '';
            $password = $_POST['pwdSignUp'] ?? '';
            $confirmPassword = $_POST['ConfpwdSignUp'] ?? '';

            if (!in_array($type, ['entreprise', 'etudiant'])) {
                $error = "Veuillez sélectionner un rôle valide (Entreprise ou Etudiant).";
                $this->showLoginPage($error);
                return;
            }

            if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
                $error = "Tous les champs sont obligatoires.";
                $this->showLoginPage($error);
                return;
            }

            if ($password !== $confirmPassword) {
                $error = "Les mots de passe ne correspondent pas.";
                $this->showLoginPage($error);
                return;
            }

            if ($this->userModel->register($type, $name, $email, $password)) {
                header('Location: index.php?action=login&success=1');
                exit();
            } else {
                $error = "Erreur lors de la création du compte. Veuillez réessayer.";
                $this->showLoginPage($error);
            }
        } else {
            $this->showLoginPage();
        }
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();
        header('Location: index.php');
    }

    public function showLoginPage($error = null, $success = null)
    {
        $title = 'One Day One Job';
        require 'views/login/login.php';
    }

    #USER PAGE

    public function showUserPage($error = null, $succes = null) {
        $title = $_SESSION['user_name'] . " - Page";
        require 'views/userPage.php';
    }

}
