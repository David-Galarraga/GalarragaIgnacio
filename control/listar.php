<?php
require_once "../entidades/User.php";
$user = new User();
$users = $user->getAll();
print_r($users);

$text = <<<TEXT
    Nombre: {$}
TEXT;
/*foreach ($users as $u) {
    echo $u['rol'] . " - " . $u['id'] . " - " . $u['nombre'] . " " . $u['apellido'] . "<br>";
}*/
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";
