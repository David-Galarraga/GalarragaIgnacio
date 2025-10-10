<?php
require_once "../entidades/User.php";

$user = new User();
$user->add($_POST["password"], $_POST["nombre"], $_POST["apellido"], $_POST["email"],$_POST["rol"]);
var_dump($_POST["nombre"]);

echo "Usuario insertado con éxito." . "<br>";
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";