<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'funciones.php';

        $precio1 = 50;
        $precio2 = 100;
        $precio3 = 1600;

        echo calcularPrecio($precio1) . "<br/><br/>";
        echo calcularPrecio($precio2) . "<br/><br/>";
        echo calcularPrecio($precio3) . "<br/><br/>";

    ?>
</body>
</html>