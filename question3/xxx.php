<?php
$expiration = time() + (5*60);
$username = $_POST['username'];
$email = $_POST['email'];
$code = rand(100000,999999);
$rq = $db->prepare("INSERT INTO utilisateur (code) values (:code)");
$rq->bindParam(':code', $code);

try{
    $rq->execute();
    
}catch(PDOException $e){ 
    echo "Erreur";
}

?>