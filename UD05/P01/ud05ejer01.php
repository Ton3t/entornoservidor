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
        Usuario: <input type="text" name="usuario" id="idusuiario" value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>">
        <?php 
                    if(isset($_POST['registrar']) && empty($_POST['usuario']) && $_POST['usuario'] == "") {
                        echo "<span style='color: red'>Debes introducir un usuario.</span>";
                    } ?>
        <br>
        Contraseña: <input type="text" name="pass" id="idpass" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>">
        <?php 
                    if(isset($_POST['pass']) && empty($_POST['pass'])) {
                        echo "<span style='color: red'>Debes introducir una contraseña.</span>";
                    } ?>
        <br><br>
        <input type="submit" value="Registar" name="registrar" id="idregristrar">
    </form>
    <?php
    require("clase_conexion.php");
    require("clase_consulta.php");

    if (isset($_POST["registrar"])) {
       if (empty([$_POST["usuario"]]) || empty($_POST["pass"]) || $_POST["usuario"] == "" || $_POST["usuario"] == null || $_POST["pass"] == "" || $_POST["pass"] == null) {

        } else {
            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];
            $conexion = new Consulta();
            $conexion->insertarProducto($usuario, $pass);
       }
    }

    function checkInput($parametro1, $parametro2) {
        if (isset($_POST[$parametro1]) && empty($_POST[$parametro2])) {
            return "<p style='{color: red;}'>El campo $parametro2, no puede estar vacío.</p>";
        }
    }

    ?>
</body>

</html>