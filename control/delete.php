<?php

require_once "../entidades/User.php";
require_once "../middleWork/controlarSesiones.php";
if ($_SESSION["datos"]["rol"] !== "Admin") {
        header("Location: ../index.php");
        exit();
    }
$user = new User();
$ID = $user -> getByNickname($_POST["nickname"]);
$userID = $ID["id"];
$user -> delete($userID);

echo "Usuario Eliminado con exito <br>";
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";
