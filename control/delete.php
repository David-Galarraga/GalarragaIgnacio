<?php
require_once "../entidades/User.php";
$user = new User();
$user->delete($_POST["id"]);
echo "EL usuario n° " . $_POST["id"] . " ha sido eliminado." . "\n";
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";
?>