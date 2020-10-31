<?php
require("../modelo/clase_conexion.php");
require("../modelo/clase_consulta.php");


$conexion = new Consulta();
$id = $_POST['libro'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$paginas = $_POST['paginas'];
if(is_numeric($paginas)) {
    $resultado = $conexion->insertarProducto($id, $titulo, $autor, $paginas);
    echo $resultado . "<br>";
    $resultado = $conexion->cargarProductos();
    echo $resultado;
}
else {
    echo "El campo PAGINAS no es numerico<br>";
}

echo "<a href='../ud04ejer04.php'>Atrás</a>";

?>