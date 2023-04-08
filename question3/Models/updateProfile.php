<?php
require_once('connectDb.php');
session_start();
$current_username = $_SESSION['username'];
function update_profile($username, $email, $password){
    global $PDO;
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "UPDATE utilisateurs SET username = :username, email = :email, password_hash = :password_hash WHERE username = $current_username";
    $sql->bindValue(':username', $username);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password_hash', $encrypted_password);

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