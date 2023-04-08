<?php
    require( "Views/config.php" );

    if ( !isset( $_GET[ "controller" ] ) ) {
        $ERROR = 1;
        require( "Controllers/error.php" );
        return;
    }

    if ( !file_exists( "Controllers/" . $_GET[ "controller" ] . ".php" ) ) {
        $stylepage = file_exists( "css/error.css" ) ? "error" : "default";
        $ERROR = 2;
        require( "Controllers/error.php" );
        return;
    }

    require( "Controllers/" . $_GET[ "controller" ] . ".php" );
    return;
?>