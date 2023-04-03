<?php
require_once('connectDb.php');
session_start();

function insert_otp($activation_code){
    global $PDO;
    $query = $PDO->prepare("INSERT INTO utilisateurs (activation_code) values (:code)");
    $query->bindParam(':code', $activation_code);

try{
    $query->execute();
    
}catch(PDOException $e){ 
    print_r($e);
    
    }
}

function compare($activation_code, $database_code){
    global $PDO;

}


function FiveMinuteCheck(){
    global $PDO;

    $oneTimePassword = rand(100000, 999999);
    $_SESSION["otp"] = $oneTimePassword;
    $user = $_SESSION["username"];


    $creationTime = date('Y-m-d H:i:s', time());

    // Récupérer l'ID de l'utilisateur à partir de la base de données
    $sql = $PDO->prepare("SELECT id FROM utilisateurs WHERE username = :user");
    $sql->bindParam(':user', $user);
    $sql->execute();
    $utilisateur_id = $sql->fetchColumn();

    // insertion du mot de passe temporaire dans la bdd
    $query = $PDO->prepare("INSERT INTO onetimepassword (utilisateur_id, code, creation_time) VALUES (:utilisateur, :code, :date_crea)");
    $query->bindParam(':utilisateur', $utilisateur_id);
    $query->bindParam(':code', $oneTimePassword);
    $query->bindParam(':date_crea', $creationTime);

    try {
        $query->execute();
    } catch(PDOException $e) { 
        print_r($e);
    }

    // Vérifier si le mot de passe est toujours valide
    $expiration = $creationTime + (5 * 60);
    $now = time();


    if($now < $expiration) {
        return true;
} else {
    return false;
    }
}



?>