<?php 
    include("../clase_conexion.php");
    include("../clase_consulta.php");
    $usuario = $_POST["user"];
    $contrasenya = $_POST["password"];
    $conexion = new Consulta();
    $conexion->insertarProducto($usuario, $contrasenya);
    header("refresh:0; url=../cineregistros.php");
?>