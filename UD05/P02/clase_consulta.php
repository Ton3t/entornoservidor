<?php
class Consulta
{
    function insertarProducto($usuario, $pass)
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "INSERT INTO USUARIO (loggin, pasw) VALUES (:loggin, :pasw)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':loggin', $usuario);
        $consulta->bindParam(':pasw', sha1($pass));
        if($consulta->execute()) {
            echo "<script>alert('$usuario creado correctamente.')</script>";
            header("refresh:0; url = login.php");
        }
        else {
            echo "<script>alert('$usuario ya esta registrado.')</script>";
        }
    }

    function buscarUsuario($login, $pass) {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM USUARIO WHERE LOGGIN = ? AND PASW = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->bindParam(2, sha1($pass));
        $consulta->execute();
        $row = null;

        if ($row == $consulta->fetch()) {
            echo "<script>alert('Usuario o contraseña erroneos.')</script>";
        }
        else {
            echo "<script>alert('$login conectado, disfruta de la visita.')</script>";
            header("refresh:0; url = pagina.php");
        }
        
        /*
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $squl = "SELECT * FROM usuario WHERE loggin = ? AND pasw = ?";
        $consulta = $conexion->prepare($squl);
        $consulta->bindParam(1, $login);
        $consulta->bindParam(2, sha1($pass));
        if($consulta->execute()) {
            echo "<script>alert('$login conectado, disfruta de la visita.')</script>";
            header("refresh:0; url = pagina.php");
        }
        */
        
    }

    function userLoged($login, $pass) {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM USUARIO WHERE loggin = ? AND pasw = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->bindParam(2, sha1($pass));
        $consulta->execute();
        $row = $consulta->fetch();

        if ($row != null) {
            $_SESSION["nombre"] = $row["loggin"];
            $_SESSION["lectura"] = $row["lectura"];
            $_SESSION["escritura"] = $row["escritura"];
            $_SESSION["administracion"] = $row["administracion"];
            header("refresh:0; url = pagina.php");
            
        }
    }

    function ultimoLog() {
        date_default_timezone_set("Europe/Madrid");
        if(isset($_COOKIE["ultimo_log"])) {
            $ultimo_log = $_COOKIE["ultimo_log"];
        }
        setcookie("ultimo_log", time(), time() + 60 * 60 * 24 * 365);
        return $ultimo_log;
    }

    
}
?>