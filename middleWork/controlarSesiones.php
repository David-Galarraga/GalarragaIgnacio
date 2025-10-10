<?php
    session_start();
    if (!empty($_SESSION["datos"])) {
        
    } else {
        echo "Sesion no iniciada";
        session_destroy();
        die;
    }
?>