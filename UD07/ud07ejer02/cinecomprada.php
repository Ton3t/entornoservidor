<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    header("Location: cinelogin.php");
} else {
    $numButaca = $_GET["butaca"];
    $butUpdate = $_GET["butacaUpdate"];
    $numFila = $_GET["fila"];
    $titulo = $_GET["titulo"];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra butacas</title>
</head>

<body>

    <img src="./imagenes/logo.png" alt="logo"><br>
    <h1>¡Enhorabuena!</h1>
    <p>Has adquirido una entrada. Para descargarla, haz click <?php echo "<a href='cinepdfentrada.php?butaca=$numButaca&fila=$numFila&titulo=$titulo'>Aquí</a>";?></p>
    <p>
    <?php
    include("clase_conexion.php");
    include("clase_consulta.php");
    
    $conexion = new Consulta();
    $butacas = $conexion->buscarPelicula($titulo);
    $butacas[0][$butUpdate] = "0";
    $conexion->actualizarButacas($butacas[0], $titulo);
    ?>
    </p>
    <a href="cinepagina.php"><img src="./imagenes/botonSeguir.png" alt="atrás"></a>
</body>

</html>