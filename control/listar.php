<?php
require_once "../entidades/User.php";
require_once "../middleWork/controlarSesiones.php";
$user = new User();
$users = $user->getAll();
if (!$_SESSION["datos"]["rol"] === "Admin") {
        header("Location: ../index.php");
        exit();
    }
foreach ($users as $u) {
    echo "ID: $u->id ROL: $u->rol NOMBRE $u->nombre" .   "<br>";
}
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";
