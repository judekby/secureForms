<?php
require_once('connectDb.php');

function insert($username, $email, $password){
    global $PDO;
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    $sql=$PDO->prepare('INSERT INTO utilisateur(username, email, password) VALUES (:username, :email, :password)');
    $sql->bindValue(':username', $username);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password', $encrypted_password);

    try{
        $sql->execute();
        return 0;
    }catch(PDOException $e){
        print_r($e);
        return "Erreur lors de l'insertion des données";

    }   

}

?>