<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador API</title>
</head>

<body>
    <h1>Buscador de libros</h1>
    <form action="buscador.php" method="post">
        <label for="idtitulo">Libro: <input type="text" name="titulo" id="idtitulo"></label>
        <input type="submit" value="Ejecuta" name="buscador">
    </form>
    <?php

    require("./modelo/clase_consulta.php");
    require("./modelo/clase_conexion.php");

    $host = "localhost";
    $db = "bdlibros";
    $user = "root";
    $pass = "tutuha";
    $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

    if ($conexion == null) {
        echo "Imposible conectar con la base de datos";
    } else {
        if (isset($_POST["buscador"])) {
            $titulo = $_POST["titulo"];
            $sql = "SELECT * FROM LIBROS WHERE titulo LIKE ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $titulo);
            $consulta->execute();
            $row = null;
            $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
            while ($row = $consulta->fetch()) {
                if ($row == null) {
                    $mensaje = "Libro no disponible en la base de datos.";
                } 
                else if($row != null) {
                    $contador = $row["id"];
                    $mensaje .=  "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><td><a href='./controlador/modificarlibro.php?id=$contador'>Modificar</a></td><td><a href='./controlador/eliminarlibro.php?id=$contador'>Eliminar</a></td><tr/>";
                }
            }
            if($mensaje == "Libro no disponible en la base de datos.") {
                echo $mensaje;
            }
            else if($mensaje != "Libro no disponible en la base de datos.") {
                $mensaje .= "</table>";
                echo "<h1>Listado de libros disponibles</h1>";
                echo $mensaje;
            }
        }
    }
    ?>
    <h4>
        <a href="ud04ejer04.php">Atras</a>

    </h4>
</body>

</html>