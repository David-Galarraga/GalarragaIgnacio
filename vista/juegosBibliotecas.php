<?php
require_once "../middleWork/controlarSesiones.php";
require_once "../entidades/Biblioteca.php";
$biblioteca = new Biblioteca();
$idBiblioteca = $biblioteca -> getID($_SESSION["datos"]["id"]);

echo "<button onclick='window.location.href=`../control/addListGames.php`'>Añadir Juego</button> <br>";
echo "<button onclick='window.location.href=`bienvenidoUsuario.php`'>Volver</button> <br>";

$juegosBiblioteca = $biblioteca -> getGamesDetails($idBiblioteca);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Personal</title>
</head>
<body>
    <p>
        <?php
            foreach ($juegosBiblioteca as $jb){
                echo <<<TEXT
                    NOMBRE: $jb[nombre] <br>
                    PLATAFORMAS: $jb[plataforma] <br>
                    DESCRIPCION: $jb[descripcion] <br>
                    <img src=$jb[thumbnail]></img> <hr>
                TEXT;
            }
        ?>
    </p>
</body>
</html>