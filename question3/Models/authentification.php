<?php
require_once('connectDb.php');
session_start();

function insert_otp($activation_code){
    global $PDO;
    $user = $_SESSION['username'];
    $query = $PDO->prepare("UPDATE utilisateurs SET activation_code = :code WHERE username = :user");
    $query->bindParam(':code', $activation_code);
    $query->bindParam(':user', $user);

try{
    $query->execute();
    
}catch(PDOException $e){ 
    print_r($e);
    
    }
}

function compare($activation_code, $database_code){
    global $PDO;

}


function is_valid(){
    global $PDO;

    $oneTimePassword = $_SESSION["otp"] ;
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