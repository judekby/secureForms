<?php
require('connectDb.php');
session_start();

//insere le onetimepassword dans la bdd
function insert_otp($activation_code){
    global $PDO;
    $user = $_SESSION['username'];
    $query = $PDO->prepare("UPDATE utilisateurs SET activation_code = :code WHERE username = :user");
    $query->bindParam(':code', $activation_code);
    $query->bindParam(':user', $user);
    try {
        $query->execute();
    } catch(PDOException $e) { 
        print_r($e);
    }
}
//verifie si le code entré est dans la base de donnée et match le nom d'utilisateur
function is_auth($code){
    global $PDO;
    $user = $_SESSION['username'];
    $check = $PDO->prepare('select * from utilisateurs where username like :name and activation_code = :code');
    $check->bindParam(':name', $user);
    $check->bindParam(':code', $code);
    $check->execute();
    $row = $check->fetch(PDO::FETCH_ASSOC);
    if($row >=1) { 
        return true;
    } else {
        return false;
    }
}
 ?>
