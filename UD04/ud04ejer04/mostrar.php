
<?php
require("./modelo/clase_consulta.php");
require("./modelo/clase_conexion.php");
$conexion = new Consulta();
$resultado = $conexion->cargarProductos();
echo "<h1>Listado de libros disponibles</h1>";
echo $resultado;
echo "<h4><a href='ud04ejer04.php'>Atras</a></h4>";
?>
