<?php

function insert_otp($code){

$expiration = time() + (5*60);
$code = rand(100000,999999);
$rq = $db->prepare("INSERT INTO utilisateur (code) values (:code)");
$rq->bindParam(':code', $code);

try{
    $rq->execute();
    
}catch(PDOException $e){ 
    echo "Erreur";
    
    }
}

?>