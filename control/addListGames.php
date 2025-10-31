<?php
require_once "../middleWork/controlarSesiones.php";
require_once "../entidades/Juegos.php";


$juego = new Juego();
$juegos = $juego -> getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Juegos</title>
</head>
<body>
    <div>
        <h2>Juegos</h2> <br>
        <button onclick="window.location.href='../vista/juegosBibliotecas.php'">Volver</button> <br>
        <p>
            <?php
                foreach ($juegos as $j) {
                    $idJuego = $j->id;
                    echo "ID: $j->id 
                    NOMBRE $j->nombre 
                    PLATAFORMA: $j->plataforma <br> 
                    DESCRIPCION: $j->descripcion <br>
                    <button onclick=\"window.location.href='addGameOnLibrary.php?idJuego=$idJuego'\">Añadir</button>
                    <hr>";
                }
            ?>
        </p>
    </div>
    
</body>
</html>