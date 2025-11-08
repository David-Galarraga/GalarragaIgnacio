<?php
require_once "../entidades/User.php";
require_once "../middleWork/controlarSesiones.php";
if (!$_SESSION["datos"]["rol"] === "Admin") {
        header("Location: ../index.php");
        exit();
    }
$user = new User();
$passCrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);
$user->add($passCrypt, $_POST["nombre"], $_POST["apellido"], $_POST["nickname"],$_POST["rol"]);
var_dump($_POST["nombre"]);

echo "Usuario insertado con éxito." . "<br>";
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";
?>