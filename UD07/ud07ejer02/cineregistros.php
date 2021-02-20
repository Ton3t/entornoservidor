<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="./imagenes/logo.png" alt="Logo de la empresa">
    <p>Introduce tus credenciales para entrar</p>
    <form action="./controlador/reguser.php" method="post">
    <label for="iduser">
        Usuarios: <input type="text" name="user" id="iduser">
    </label>
    <?php if(isset($_POST["login"]) && empty($_POST["user"])) { echo "<span style='color: red'>Debes introducir un usuario.</span>";} ?>
    <br>
    <label for="idpassword">
        Contraseña: <input type="text" name="password" id="idpassword">
    </label>
    <?php if(isset($_POST["login"]) && empty($_POST["password"])) { echo "<span style='color: red'>Debes introducir una contraseña.</span>";} ?>
    <br>
    <label for="idsubmit">
        <input type="submit" value="Registrate" id="idsubmit" name="login">
    </label>
    </form>
    <p>
        <span>Ya tienes usuario?? Vuelve a la página principal <a href="cinelogin.php">Aquí</a></span>
    </p>
</body>
</html>