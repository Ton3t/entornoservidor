<?php
    session_start();
    include("clase_conexion.php");
    include("clase_consulta.php");
    
    if(!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        date_default_timezone_set("Europe/Madrid");
        setcookie("ultimo_log", date("d/m/y - H:i"), time()+90000);
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $conexion = new Consulta();
        $conexion->userLoged($usuario, $password);

        /*
        $usuario = $_POST["usuario"];
        $password = sha1($_POST["password"]);
        $conexion = new mysqli("localhost", "root", "tutuha", "bdregis");
        $squl = "SELECT * FROM USUARIO WHERE loggin = '" . $usuario . "' AND pasw = '" . $password . "'";
        $consulta = $conexion->query($squl);
        $resultado = $consulta->fetch_assoc();
        if($resultado != null) {
            $_SESSION["nombre"] = $resultado["loggin"];
            $_SESSION["lectura"] = $resultado["lectura"];
            $_SESSION["escritura"] = $resultado["escritura"];
            $_SESSION["administracion"] = $resultado["administracion"];
        }
        */
     }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<?php
    if(isset($_SESSION["nombre"])) {
        header("Location:pagina.php");
    }
    else {
        if(isset($usuario)) {
            echo "No has conseguido acceder, porfavor logueate...";
        }
        else {
            echo "Logueate para poder entrar.";
        }
    }
?>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario" id="idusuario"><br>
        Password: <input type="password" name="password" id="idpassword"><br>
        <input type="submit" value="Aceptar" id="idaceptar" name="acepta">
    </form>
    <p>¿No estás registrado? <a href="registro.php">Registrate</a> si no lo estas.</p>
    <?php
    
    include("clase_consulta.php");
    include("clase_conexion.php");
        if(isset($_POST["acepta"])) {
            if(empty($_POST["usuario"]) || empty($_POST["password"])) {

            }
            else {
                $user = $_POST["usuario"];
                $password = $_POST["password"];
                $conexion = new Consulta();
                $conexion->buscarUsuario($user, $password);
            }
        }
        
    ?>
</body>
</html>