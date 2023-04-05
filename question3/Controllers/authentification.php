<?php
session_start();
require './Views/authentification.php';
require './Models/mail.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['verification-code'])) {
        $code = $_POST['verification-code'];
        if (empty($code)){
            $error = "Veuillez entrer un code de verification";
        } else {
            try {
                require './Models/authentification.php';
                if (is_auth($code)) {
                    
                    header('Location: index.php?controller=home');
                    exit();
                } else {
                    echo'non';
                    $error = "Mauvais code de verification";
                }
            } catch (Exception $e) {
                $error = "Erreur dans la fonction : " . $e->getMessage();
            }
        }
    }
}
?>
