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

function is_auth($code){
    global $PDO;
    $user = $_SESSION['username'];
    $query = $PDO->prepare('select * from utilisateurs where username like :name and activation_code = :code');
    $query->bindParam(':name', $user);
    $query->bindParam(':code', $code);
    try{
        $rows = $query->execute();
    }catch(PDOException $e){
        print_r($e);
    }
    if(strlen($rows) > 1){
        return true;
    }else{
        return false;
    }
}
//     if (is_valid()){
//         $sql = $PDO->prepare('select * from utilisateurs u  inner join onetimepassword o  on u.activation_code=o.code where u.username like :name');
//         $sql->bindParam(':name', $user);
//         $rows = $query->execute();
//         if($rows){
//             return true;
//         }else{
//             return false;
//         }
//     }

// }

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



?>