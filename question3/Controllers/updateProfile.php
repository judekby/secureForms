<?php
require('./Views/updateProfile.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newusername'], $_POST['newemail'], $_POST['newpassword'])) {
        $username = htmlspecialchars($_POST['newusername']);
        $email = filter_var(htmlspecialchars($_POST['newemail'], FILTER_SANITIZE_EMAIL));
        $password =  htmlspecialchars($_POST['newpassword']);
        // $_SESSION['username'] = $username;

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
            require('Models/updateProfile.php');
            echo'apres require';
            echo update_profile($username, $email, $password);
            echo 'apres fonction';
            // header('Location: index.php?controller=home');
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
