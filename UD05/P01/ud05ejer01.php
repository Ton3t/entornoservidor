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
        Usuario: <input type="text" name="usuario" id="idusuiario" value="<?php if(isset($_POST["registrar"])) echo $_POST["usuario"] ?>"><?php if (isset($_POST["usuario"]) && empty($_POST['usuario'])) { echo "<span style='color: red'>Debes introducir un usuario.</span>";}?>
        <br>
        Contraseña: <input type="password" name="pass" id="idpass" value="<?php if(isset($_POST["registrar"])) echo $_POST["pass"] ?>"><?php if (isset($_POST["pass"]) && empty($_POST['pass'])) { echo "<span style='color: red'>Debes introducir una contraseña.</span>";}?>
        <br>
        Repite contraseña: <input type="password" name="reppass" id="idreppass" value=""><?php if (isset($_POST["reppass"]) && empty($_POST['reppass']) != empty($_POST['pass'])) { echo "<span style='color: red'>Debes introducir la misma contraseña.</span>";}?>
        <br>
        <input type="submit" value="Registar" name="registrar" id="idregristrar">
    </form>
    <?php
    require("clase_conexion.php");
    require("clase_consulta.php");

    if (isset($_POST["registrar"])) {
        if (empty([$_POST["usuario"]]) || empty($_POST["pass"]) || $_POST["usuario"] == "" || $_POST["usuario"] == null || $_POST["pass"] == "" || $_POST["pass"] == null || $_POST["pass"] != $_POST["reppass"] || empty($_POST["reppass"])) {
        } else {
            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];
            $_POST["usuario"] = "";
            $conexion = new Consulta();
            $conexion->insertarProducto($usuario, $pass);
        }
    }

    ?>
</body>

</html>