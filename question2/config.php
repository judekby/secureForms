<?php

$dsn = 'pgsql:host=localhost;dbname=secu_web';
$user = 'judekabeya';
$password = 'jude93zoo';


try {
    $PDO = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "Une erreur est survenue";
    echo $e;
}

?>



