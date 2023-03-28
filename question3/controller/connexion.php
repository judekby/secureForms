<?php

require_once "./database/connectDb.php";
require 'gabarit.php';

define('USERNAME_FIELD', 'username');
define('PASSWORD_FIELD', 'password');
define('EMAIL_FIELD', 'email');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST[USERNAME_FIELD], $_POST[PASSWORD_FIELD], $_POST[EMAIL_FIELD])) {
        $username = htmlspecialcharstrim($_POST[USERNAME_FIELD]);
        $password = htmlspecialchars(trim($_POST[PASSWORD_FIELD]));
        $email = htmlspecialchars(trim($_POST[EMAIL_FIELD]));

        $_SESSION['username'] = $username;

        if (empty($username)) {
            header("Location: index.php?erreur=Veuillez entrer un nom d'utilisateur");
            exit;
        } elseif (empty($password)) {
            header("Location: index.php?erreur=Veuillez entrer un mot de passe");
            exit;
        } elseif (empty($email)) {
            header("Location: index.php?erreur=Veuillez entrer une adresse email");
            exit;
        }


    }
}



?>
