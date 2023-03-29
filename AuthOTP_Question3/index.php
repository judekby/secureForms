<?php   
    
    if (!isset($_GET['controller'])) 
        header ("Location: index.php?controller=connexion");
    elseif (!file_exists("./Controllers/{$_GET['controller']}.php")) {
        $ERROR=100;
        require "./views/error.php";
    }
    else require "./Controllers/{$_GET['controller']}.php";
?>