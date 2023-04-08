<?php
session_start();
require_once('connectDb.php');

//update a user
function update_profile($username, $email, $password){
    global $PDO;
    $current_username = $_SESSION['username'];
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = $PDO->prepare("UPDATE utilisateurs SET username = :username, email = :email, password_hash = :password_hash WHERE username = :currentUser");
    $sql->bindValue(':username', $username);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password_hash', $encrypted_password);
    $sql->bindValue(':currentUser', $current_username);

    try{
        $sql->execute();
        echo "Mise à jour réussie.";
        return 0;
    }catch(PDOException $e){
        echo "Erreur lors de la mise à jour : " . $sql->errorInfo()[2];
        print_r($e);
    }   
}
?>
