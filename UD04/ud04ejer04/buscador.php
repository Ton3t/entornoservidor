<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador API</title>
</head>
<body>
    <h1>Buscador de libros</h1>
    <form action="" method="post">
        <label for="idtitulo">Libro: <input type="text" name="titulo" id="idtitulo"></label>
        <input type="submit" value="Ejecuta">
    </form>
    <?php
        $host = "localhost";
        $db = "bdlibros";
        $user = "root";
        $pass = "tutuha";
        $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

        if($conexion == null) {
            echo "Imposible conectar con la base de datos";
        }
        else {
            if(isset($_POST["titulo"]));
            $titulo = $_POST["titulo"];
            $sql = "SELECT * FROM LIBROS WHERE titulo LIKE ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $titulo);
            $consulta->execute();
            $row = null;
            $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
            while($row = $consulta->fetch()) {
                $mensaje .=  "<tr><td>". $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><tr/>";
    
            }
            $mensaje .= "</table>";
            echo $mensaje;
        }
    ?>
    <a href="ud04ejer04.php">Insertar Libro</a>
</body>
</html>