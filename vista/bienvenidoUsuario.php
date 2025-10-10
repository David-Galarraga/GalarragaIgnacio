<?php
    include_once "../middleWork/controlarSesiones.php";
    var_dump($_SESSION["datos"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Usuario</title>
</head>
<body>
    <div>
        <pre>
            <button>Perfil</button>
            <button>Biblioteca</button>
        </pre>
    </div>
</body>
</html>