<?php
require_once('connectDb.php');
session_start();

//insere le code otp dans la base de données
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
//vérifie si l'utilisateur a bien saisi le bon code de verification
function is_auth($code){
    global $PDO;
    $user = $_SESSION['username'];
    $check = $PDO->prepare('select * from utilisateurs where username like :name and activation_code = :code');
    $check->bindParam(':name', $user);
    $check->bindParam(':code', $code);
    $check->execute();
    $row = $check->fetch(PDO::FETCH_ASSOC);
    if($row >=1) { 
        header('Location: index.php?controller=home');
    } else {
        echo "mauvais code";
    }
}
?>
<!-- 

function is_valid(){
    global $PDO;

    $oneTimePassword = $_SESSION["otp"] ;
    $user = $_SESSION["username"];
    $creationTime = date('Y-m-d H:i:s', time());

    // Récupérer l'ID de l'utilisateur à partir de la base de données
    // $sql = $PDO->prepare("SELECT id FROM utilisateurs WHERE username = :user");
    // $sql->bindParam(':user', $user);
    // $sql->execute();
    // $utilisateur_id = $sql->fetchColumn();

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

//     $expiration = $creationTime + (5 * 60);
//     $now = time();

//     if($now < $expiration) {
//         return true;
// } else {
//     return false;
//     }
// }
}



?> -->