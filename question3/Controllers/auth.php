<?php
require './Views/authentification.php';
require './Models/mail.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['verification-code'])) {
        $code = $_POST['verification-code'];
        $otp_code = $_SESSION['otp'];
        if (empty($code)){
            header("Location: index.php?erreur=Veuillez entrer un code de verification");
            exit;
        }
        echo'---------\n';
        require_once('./Models/authentification.php');
        try{
            if(is_auth($code)){
                header('Location: index.php?home');
            };
        }catch(Exception $e){
            echo 'erreur dans la fonction';

        }

    }
}
?>
