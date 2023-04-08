<?php
include('./Views/connexion.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $email = filter_var(htmlspecialchars($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password =  htmlspecialchars($_POST['password']);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        // print_r('session'.$_SESSION);

        if (empty($username)) {
            echo 'erreur';
            header("Location: index.php?erreur=Veuillez entrer un nom d'utilisateur");
            exit;
        } elseif (empty($password)) {

            header("Location: index.php?erreur=Veuillez entrer un mot de passe");
            exit;
        } elseif (empty($email)) {

            header("Location: index.php?erreur=Veuillez entrer une adresse email");
            exit;
        }
        try {
            require('Models/connexion.php');
            insert($username, $email, $password);
            header('Location: index.php?controller=authentification');
            require './Models/mail.php';

            exit;
        } catch (Exception $e) {
            echo"non";
            print_r($e);
        }

    } else {
        die("Le formulaire doit être rempli");
    }
}


?>
