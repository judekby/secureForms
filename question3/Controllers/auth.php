<?php
require './Views/authentification.php';
require './Models/mail.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['verification-code'])) {
        $code = $_POST['verification-code'];
        $otp_code = $_SESSION['otp'];
        echo"ot_cod".$otp_code ;
        echo'---------';
        echo"code".$code;



        if (empty($code)) {
            header("Location: index.php?erreur=Veuillez entrer un code de verification");
            exit;
        }

        // The rest of your code goes here
    }
}
?>
