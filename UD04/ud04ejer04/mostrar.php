
<?php

require("./modelo/clase_consulta.php");
require("./modelo/clase_conexion.php");
$conexion = new Consulta();


echo "<a href='ud04ejer04.php'>Atras</a>";

/*
if($conexion->connect_errno) {
    echo "La conexión a la base de datos no ha sido posible";
}
else {

}

    $host = "localhost";
    $db = "bdlibros";
    $user = "root";
    $pass = "tutuha";
    $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
    if ($conexion->connect_errno) {
        echo "La conexión a la base de datos no ha sido posible...";
    } else {
        $sql = "SELECT * FROM LIBROS";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $row = null;
        $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
        while($row = $consulta->fetch()) {
            $mensaje .=  "<tr><td>". $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><tr/>";

        }
        $mensaje .= "</table>";
        echo $mensaje;
    }
    */
?>
