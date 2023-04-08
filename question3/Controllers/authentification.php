<?php
session_start();
require './Views/authentification.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['verification-code'])){
        $code = $_POST['verification-code'];
        if (empty($_POST['verification-code'])){
            $error = "Veuillez entrer un code de verification";
            echo $error;
         }try {
            require './Models/authentification.php';
            //si l'utilisateur est authentifié -> home page
            if (is_auth($code)) {
                header('Location: index.php?controller=home');}
            else{
                echo'<div class="alert alert-danger mt-3" role="alert">
                        Mots de passe incorrect
                    </div>';
                }
        }catch(Exception $e){
        print_r($e);
        }
  
    }
}
?>
