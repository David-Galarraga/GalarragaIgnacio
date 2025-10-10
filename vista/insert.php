<?php
require_once "../entidades/User.php";

$user = new User();
$user->add("54321", "Pérez", "Gimenez", "ElMasCapo123", "usuario");

echo "Usuario insertado con éxito.";