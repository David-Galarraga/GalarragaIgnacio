<?php
require_once "../entidades/User.php";
require_once "../middleWork/controlarSesiones.php";
if (!$_SESSION["datos"]["rol"] === "Admin") {
        header("Location: ../index.php");
        exit();
    }
$user = new User();
$user->update($_POST["id"], $_POST["password"], $_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["rol"]);

echo "Usuario actualizado." . "\n";
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";

?>