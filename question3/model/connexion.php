<?php
require('connectDb.php');
global $PDO;

function insert($username, $email, $password){
    $sql=$PDO->prepare("Insert into utilisateur(username, email, password) values :username, :email, :password");
    $sql->bindParam(':username', $username);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':password', $password);

    try{
        $sql->execute();
    }catch(PDOException $e){
        return "Erreur lors de l'insertion des données";

    }   

}


?>