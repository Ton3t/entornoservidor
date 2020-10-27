<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nombre = $_GET['nombre'];
        $color = $_GET['colores'];
        $genero = $_GET['genero'];
        echo $nombre . "<br/>";
        echo $color . "<br/>";
        echo $genero;
    ?>
</body>
</html>