<?php
    session_start();
    if(!isset($_SESSION["nombre"])) {
        header("Location:login.php");
    }
    echo "<h3>¡¡Bienvenido, " . $_SESSION["nombre"] . "!!</h3>";
    echo "Hora del último login: " . $_COOKIE["ultimo_log"] . "<br>";
    echo "<a href='logout.php'>Cerrar sesión</a>";
    include("cl_libros.php");
    $conexion = new ConexionLibros();

    $conexion->eliminarProducto($_GET["id"]);
?>
