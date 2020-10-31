<?php
require("datosconexion.php");
$conexion = mysqli_connect($db_host, $db_usuario, $db_contrasenya);
if (mysqli_connect_errno()) {
    echo "Houston, tenemos un problema...";
    exit();
}
mysqli_select_db($conexion, $db_nombre) or die("No encuentro la base de datos.");
mysqli_set_charset($conexion, "utf8");
$sql = "SELECT * FROM productos WHERE paisorigen = ?";
$resultado = mysqli_prepare($conexion, $sql);
$pais = $_POST["pais"];
mysqli_stmt_bind_param($resultado, "s", $pais);
$ok = mysqli_stmt_execute($resultado);
if (!$ok) {
    echo "Error al ejecutar la consulta.";
} else {
    mysqli_stmt_bind_result($resultado, $micodigo, $miseccion, $miarticulo, $miprecio, $mipais);
    echo "Artículos encontrados: <br><br>";
    $mensaje = "<table border><tr><th>ID</th><th>SECCION</th><th>ARTICULO</th><th>PRECIO</th><th>PAIS</th></tr>";
    while (mysqli_stmt_fetch($resultado)) {
        $mensaje .= "<tr><td>$micodigo</td><td>$miseccion</td><td>$miarticulo</td><td>$miprecio €</td><td>$mipais</td></tr>";
    }
    $mensaje .= "</table>";
    echo $mensaje;
    echo "<a href='formulariobusqueda.php'>Atrás</a>";
    mysqli_stmt_close($resultado);
}
mysqli_close($conexion);
?>
