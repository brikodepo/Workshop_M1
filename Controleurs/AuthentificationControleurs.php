<?php
// controllers/AuthController.php

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();

            if ($userModel->verifyCredentials($username, $password)) {
                Session::set('user', $username);
                header('Location: index.php?action=dashboard');
                exit();
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
                include 'vues/login.php';
                return;
            }
        }

        include 'vues/login.php';
    }

    public function dashboard()
    {
        if (!Session::has('user')) {
            header('Location: index.php?action=login');
            exit();
        }

        include 'Vues/DossiersMedicales.php';
    }

    public function logout()
    {
        Session::destroy();
        header('Location: index.php?action=login');
        exit();
    }

}


