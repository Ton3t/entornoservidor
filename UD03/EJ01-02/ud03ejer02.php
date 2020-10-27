<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require('contacto.php');
        require('agenda.php');

        $toni = new Contacto("Toni", 111111111);
        $alex = new Contacto("Alex", 222222222);
        $ramon = new Contacto("Ramon", 333333333);

        $agenda = new Agenda();

        $agenda->anyadirContacto($toni);
        $agenda->anyadirContacto($alex);
        $agenda->anyadirContacto($ramon);

        echo $agenda;
        echo $alex->__toString();
        $agenda->eliminarContato(1);

        echo $agenda;
    ?>
</body>
</html>