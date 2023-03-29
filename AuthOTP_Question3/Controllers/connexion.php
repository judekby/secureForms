<?php
include('./Views/connexion.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password =  htmlspecialchars($_POST['password']);

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        print_r($_SESSION);


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
        try {
            require( 'Models/connexion.php' );
            $insert = insert($username, $email, $password);
            header('Location: index.php?controller=authentification');
            exit;
        } catch (Exception $e) {
            print_r($e);
        }
    

    }else{
        die("Le formulaire doit etre rempli");
    }
}



?>
