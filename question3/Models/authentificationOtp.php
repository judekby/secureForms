<?php
require ('./Models/connectDb');
function insert_otp($code){
    global $PDO;
    $query = $PDO->prepare("INSERT INTO utilisateur (code) values (:code)");
    $query->bindParam(':code', $code);

try{
    $rq->execute();
    
}catch(PDOException $e){ 
    print_r($e);
    
    }
}

?>