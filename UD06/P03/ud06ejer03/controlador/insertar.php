<?php
require("../modelo/clase_conexion.php");
require("../modelo/clase_consulta.php");


$conexion = new Consulta();
$id = $_POST['libro'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$paginas = $_POST['paginas'];

$image = $_FILES["imagen"]["tmp_name"];
$imgContenido = base64_encode(file_get_contents($image));


if(is_numeric($paginas)) {
    $resultado = $conexion->insertarImagen($id, $titulo, $autor, $paginas, $imgContenido);
    echo $resultado . "<br>";
    $resultado = $conexion->cargarProductosEliminar();
    echo $resultado;
}
else {
    echo "<h3>El campo PAGINAS no es numerico</h3><br>";
}

echo "<a href='../ud04ejer04.php'><button>Atrás</button></a>";

?>