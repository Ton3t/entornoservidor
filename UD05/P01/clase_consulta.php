<?php
class Consulta
{
    function insertarProducto($usuario, $pass)
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "INSERT INTO USUARIOS (usuario, pass) VALUES (:usuario, :pass)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':pass', md5($pass));
        if($consulta->execute()) {
            echo "<script>alert('$usuario creado correctamente.')</script>";
        }
        else {
            echo "<script>alert('$usuario ya esta registrado.')</script>";
        }
    }

    
}
