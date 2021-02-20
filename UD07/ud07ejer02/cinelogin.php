<?php
session_start();
if(isset($_SESSION["nombre"])) {
    header("Location: cinepagina.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   

    <img src="./imagenes/logo.png" alt="Logo de la empresa">
    <p>Introduce tus credenciales para entrar</p>
    <form action="" method="post">
        <label for="iduser">
            Usuarios: <input type="text" name="user" id="iduser">
            <?php if (isset($_POST["eject"]) && empty($_POST["user"])) {
                echo "<span style='color: red'>Debes introducir un usuario.</span>";
            } ?>
        </label><br>
        <label for="idpassword">
            Contraseña: <input type="text" name="password" id="idpassword" value="">
            <?php if (isset($_POST["eject"]) && empty($_POST["password"])) {
                echo "<span style='color: red'>Debes introducir una contraseña.</span>";
            } ?>
        </label><br>
        <label for="idsubmit">
            <input type="submit" value="Entrar" id="idsubmit" name="eject">
        </label>
    </form>
    <p>
        <span>¿Aún no tienes cuenta? Registraté <a href="cineregistros.php">Aquí</a></span>
    </p>
    <?php
    if(isset($_POST["eject"]) && !empty($_POST["user"]) && !empty($_POST["password"])) {
        include("clase_conexion.php");
        include("clase_consulta.php");
        $user = $_POST["user"];
        $password = $_POST["password"];
        $conexion = new Consulta();
        $conexion->userLoged($user, $password);
                    
    }
    
?>
</body>

</html>