<?php   
    
    if (!isset($_GET['controller'])) 
        header ("Location: index.php?controller=connexion.php");
    elseif (!file_exists("./controllers/{$_GET['controller']}.php")) {
        $ERROR=100;
        require "./view/error.php";
    }
    else require "./Controller/{$_GET['controller']}.php";
?>