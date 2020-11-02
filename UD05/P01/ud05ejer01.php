<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario" id="idusuiario"><br>
        Contraseña: <input type="text" name="pass" id="idpass"><br><br>
        <input type="submit" value="Registar" name="registrar" id="idregristrar">
    </form>
    <?php
    require("clase_conexion.php");
    require("clase_consulta.php");

    if (isset($_POST["registrar"])) {
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];
        $conexion = new Consulta();
        
            $conexion->insertarProducto($usuario, $pass);

            

    } 
    ?>
</body>
</html>