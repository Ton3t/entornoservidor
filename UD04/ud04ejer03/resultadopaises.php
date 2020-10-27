<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require("datosconexion.php");
        $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasenya);
        if(mysqli_connect_errno()) {
            echo "Houston, tenemos un problema...";
            exit();
        }
        
    ?>
</body>
</html>