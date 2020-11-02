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
    $resultado = $conexion->cargarProductosEliminar();
    echo $resultado;
}
else {
    echo "<h3>El campo PAGINAS no es numerico</h3><br>";
}

echo "<a href='../ud04ejer04.php'><button>Atrás</button></a>";

?>