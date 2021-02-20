<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("clase_persona.php");
        include("clase_mascotas.php");

        $mascota = new Mascotas();
        $persona = new Persona("Tonet", "Moreno Cantó", "74735135Q");

        $mascota->__set("Nombre", "Laika");
        $mascota->__set("Vacuntas", "Parvorirus", "Hepatitis", "Rabia");

        echo $mascota->get

    ?>
</body>
</html>