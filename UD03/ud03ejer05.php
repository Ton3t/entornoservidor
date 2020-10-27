<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require("agenda.php");
    require("Econtacto.php");

    $agenda = new Agenda();

    $contacto1 = new EContacto(array("nombre" => "Tonet", "telefono" => 999999999, "email" => "tonet@gmail.com", "url" => "www.tonet.com"));
    $contacto2 = new EContacto(array("nombre" => "Asier", "telefono" => 888888888, "email" => "asier@gmail.com", "url" => "www.asier.com"));
    $contacto3 = new EContacto(array("nombre" => "Alexander", "telefono" => 777777777, "email" => "alexander@hotmail.com", "url" => "www.alex.com"));

    $contacto4 = new PContacto(array("nombre" => "Ramon", "telefono" => 666666666, "direccion" => "C/ del Olmo n 11", "provincia" => "Alicante", "ciudad" => "Benidorm"));
    $contacto5 = new PContacto(array("nombre" => "Dani", "telefono" => 555555555, "direccion" => "C/ Tomás Ortuño n 10", "provincia" => "Alicante", "ciudad" => "Benidorm"));
    $contacto6 = new PContacto(array("nombre" => "Lucía", "telefono" => 444444444, "direccion" => "Av Europa n 39", "provincia" => "Alicante", "ciudad" => "Benidorm"));
  

    $agenda->anyadirContacto($contacto1);
    $agenda->anyadirContacto($contacto2);
    $agenda->anyadirContacto($contacto3);
    $agenda->anyadirContacto($contacto4);
    $agenda->anyadirContacto($contacto5);
    $agenda->anyadirContacto($contacto6);

    echo $agenda;
    echo "HOla";
?>
</body>
</html>