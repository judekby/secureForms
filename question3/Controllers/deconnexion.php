<?php
session_start();
session_destroy();
header("Location: index.php?controller=connexion");
// require './Views/connexion';


?>

