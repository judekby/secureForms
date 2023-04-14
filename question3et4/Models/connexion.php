<?php
require_once('connectDb.php');
//insert les données de l'utilisateur dans la base de données
function insert($username, $email, $password){
    global $PDO;
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    $sql=$PDO->prepare('INSERT INTO utilisateurs (username, email, password_hash) VALUES (:username, :email, :password_hash)');
    $sql->bindValue(':username', $username);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password_hash', $encrypted_password);

    try{
        $sql->execute();
        return 0;
    }catch(PDOException $e){
        print_r($e);
        return "Erreur lors de l'insertion des données";

    }   

}

?>
