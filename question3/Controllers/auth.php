<?php
require ('./Views/authentification.php');
session_start();
if($__SERVER['REQUEST_METHODE']==='POST'){
    if(isset($_POST['verification_code'])){
        $code = $_POST['verification_code'];
        $_SESSION['code'] = $code;
        if(empty($code)){
            header("Location : index.php?erreur=Veuillez entrez un code de verification");
            exit;
        }
    }
    
}

?>