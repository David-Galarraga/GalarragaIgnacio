<?php
    include_once "../entidades/User.php";

    $user = new User();
    $nicknames =$user -> getNicknames() ;
    
    if (in_array($nickname, $nicknames)) {
        header("Location: ../vista/registro.php");
        exit();
    }

    $passCrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $user->add($passCrypt, $_POST["nombre"], $_POST["apellido"], $_POST["nickname"],"usuario");

    header("Location: ../index.php");
    exit();

    
