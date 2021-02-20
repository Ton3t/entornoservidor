<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
</head>

<body>
    <?php
    require("../modelo/clase_consulta.php");
    require("../modelo/clase_conexion.php");
    $conexion = new Consulta();
    $resultado = $conexion->cargarProductosEliminar();
    echo "<h3>Tabla antigua</h3>";
    echo $resultado;
    echo "<h3>Tabla modificada</h3>";
    $resultado = $conexion->eliminarProducto($_GET["id"]);
    echo $resultado;
    $resultado = $conexion->cargarProductosEliminar();
    echo $resultado;

    /*
    $host = "localhost";
    $db = "bdlibros";
    $user = "root";
    $pass = "tutuha";
    $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
    if ($conexion == null) {
        echo "Base de datos no disponible";
    } else {
        $id = $_GET['id'];
        $sql = "DELETE FROM LIBROS WHERE id = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->execute();
        echo "<h3>Registro modificado</h3>";
        $resultado = $connect->cargarProductosEliminar();
        echo $resultado;
    }
    echo "<a href='../ud04ejer04.php'>Atras</a>";
    */
    ?>
    <a href="../ud04ejer04.php">Atrás</a>
</body>

</html>