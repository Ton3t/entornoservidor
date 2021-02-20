<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Libro</title>
</head>

<body>
    <form action="modificarlibro.php" method="post">
    <h1>Modificar libro</h1>
        <label for="idid">ID:
            <input type="text" name="id" id="idid" value="<?php echo $_GET['id'] ?>" readonly>
        </label><br>
        <label for="idnombre">Nombre
            <input type="text" name="nombre" id="idnombre">
        </label><br>
        <label for="idautor">Autor
            <input type="text" name="autor" id="idautor">
        </label><br>
        <label for="idpaginas">Paginas
            <input type="number" name="paginas" id="idpaginas">
        </label><br>
        <label for="idsubmit">
            <input type="submit" value="Modificar" name="modificar">
        </label><a href="../ud04ejer04.php">Atrás</a>
    </form>
    <?php
    require("../modelo/clase_consulta.php");
    require("../modelo/clase_conexion.php");
    $conexion = new Consulta();
    $resultado = $conexion->cargarProductosEliminar();
    echo $resultado;
    if(isset($_POST["modificar"])) {
        $resultado = $conexion->modificarProducto($_POST["id"], $_POST["nombre"], $_POST["autor"], $_POST["paginas"]);
        echo $resultado;
        echo $conexion->cargarProductosEliminar();
    }

        
    /*
    $connect = new Consulta();
    $resultado = $connect->cargarProductosEliminar();
    echo "<h3>Tabla de libros</h3>";
    echo $resultado;
    if (isset($_POST['modificar'])) {

        $host = "localhost";
        $db = "bdlibros";
        $user = "root";
        $pass = "tutuha";
        $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);


        if ($conexion == null) {
            echo "Base de datos no disponible";
        } else {
            $id = $_POST['id'];
            $titulo = $_POST['nombre'];
            $autor = $_POST['autor'];
            $paginas = $_POST['paginas'];
            $sql = "UPDATE LIBROS SET titulo = ?, autor = ?, paginas = ? WHERE id = $id";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $titulo);
            $consulta->bindParam(2, $autor);
            $consulta->bindParam(3, $paginas);
            $consulta->execute();
            echo "<h3>Registro modificado</h3>";
            $resultado = $connect->cargarProductosEliminar();
            echo $resultado;
        }
    }
    */
    ?>
</body>

</html>