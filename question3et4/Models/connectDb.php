<?php
require "config.php";
try {
    $PDO = new PDO($dsn, $user, $mdp);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
    
}
?>


