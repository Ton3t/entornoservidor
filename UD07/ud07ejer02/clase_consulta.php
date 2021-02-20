<?php
class Consulta
{
    function insertarProducto($usuario, $pass)
    {
        if($usuario == "" || $pass == "") {
            echo "<script>alert('El campo usuario no puede estar vacio.')</script>";
        }
        else {
            $bbdd = new Conexion();
            $conexion = $bbdd->getConexion();
            $sql = "INSERT INTO USUARIOS (usuario, contrasena) VALUES (:usuario, :contrasena)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':usuario', $usuario);
            $consulta->bindParam(':contrasena', sha1($pass));
            if($consulta->execute()) {
                echo "<script>alert('$usuario creado correctamente.')</script>";
            }
            else {
                echo "<script>alert('$usuario ya esta registrado.')</script>";
            }
        }
    }

    function buscarUsuario($login, $pass) {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM USUARIOS WHERE usuario = ? AND contrasena = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->bindParam(2, sha1($pass));
        $consulta->execute();
        $row = null;

        if ($row == $consulta->fetch()) {
            echo "<script>alert('Usuario o contraseña erroneos.')</script>";
        }
        else {
            $_SESSION["nombre"] = $login;
            echo "<script>alert('$login conectado, disfruta de la visita.')</script>";
        }  
    }

    function userLoged($login, $pass) {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM USUARIOS WHERE usuario = ? AND contrasena = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->bindParam(2, sha1($pass));
        $consulta->execute();
        $row = $consulta->fetch();

        if ($row != null) {
            $_SESSION["nombre"] = $row["usuario"];

            header("Location: cinepagina.php");
            
        }
        else {
            echo "<script>alert('Usuario o contraseña erroneos.')</script>";
        }
    }

    function buscarPelicula($titulo) {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT butacas FROM peliculas WHERE titulo = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $titulo);
        $consulta->execute();
        $row = $consulta->fetch();
        if ($row != null) {
            return $row;
        } 
    }

    function actualizarButacas($butacas, $titulo) {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "UPDATE peliculas SET butacas = ? WHERE titulo = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $butacas);
        $consulta->bindParam(2, $titulo);
        $consulta->execute();
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