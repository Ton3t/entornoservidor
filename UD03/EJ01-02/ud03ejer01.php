<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'contacto.php';
    $nom1 = "Toni";
    $tel1 = "687936462";
    $obj1 = new Contacto($nom1, $tel1);
    $obj2 = new Contacto("Pep", "999999999");
    $obj3 = new Contacto("Lucia", "888888888");
    echo $obj1 . "<br>";
    echo $obj2 . "<br>";
    echo $obj3 . "<br>";
?>

    
</body>
</html>