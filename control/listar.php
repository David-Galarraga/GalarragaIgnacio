<?php
require_once "../entidades/User.php";
$user = new User();
$users = $user->getAll();

foreach ($users as $u) {
    echo "ID: $u->id ROL: $u->rol NOMBRE $u->nombre" .   "<br>";
}
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";
