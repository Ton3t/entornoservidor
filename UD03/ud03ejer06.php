<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require("ejer06/equipo.php");

        require("ejer06/jugador.php");
        require("ejer06/alapivot.php");
        require("ejer06/alero.php");
        require("ejer06/base.php");
        require("ejer06/escolta.php");
        require("ejer06/pivot.php");

        $base = new Base(array("nombre" => "Toni", "dorsal" => 4, "estatura" => 1.89, "asistencias" => 10));
        $alapivot = new Alapivot(array("nombre" => "Ramon", "dorsal" => 9, "estatura" => 1.80, "tapones" => 4));
        $alero = new Alero(array("nombre" => "Alexander", "dorsal" => 5, "estatura" => 1.95, "puntos" => 23));
        $escolta = new Escolta(array("nombre" => "Asier", "dorsal" => 10, "estatura" => 1.84, "robos" => 5));
        $pivot = new Pivot(array("nombre" => "Angel", "dorsal" => 11, "estatura" => 1.72, "rebotes" => 11));
        
        $jugadores = [$base, $alapivot, $alero, $escolta, $pivot];

        $celtics = new Equipo(array("nombre" => "Celtics", "jugadores" => $jugadores));

        echo $celtics;
    ?>
</body>
</html>