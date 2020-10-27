<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        date_default_timezone_set('Europe/Madrid');
        define("NOTA", 10);
        $asignatura = "DWES";
        echo "Espero sacar un " .NOTA;
        echo " en $asignatura <br/>";
        echo date('j/n/y - h:i');
        echo "<br/>"
    ?>
</body>
</html>