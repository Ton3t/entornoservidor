<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    header("Location: cinelogin.php");
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butacas</title>
</head>

<body>
    <img src="./imagenes/logo.png" alt="logo del cine">
    <p>
        <?php
        echo "<h3>¡¡Bienvenido, " . $_SESSION["nombre"] . "!!</h3>";
        echo "Cerrar sesión: <a href='cinelogout.php'>Logout</a>";
        $but = "";

        ?>
    </p>
    <form action="" method="post">
    <select name="titulo" id="idtitulos">
        <option value="">Películas</option>
        <option value="Titanic">Titanic</option>
        <option value="Batman">Batman</option>
        <option value="Alien">Alien</option>
    </select>
    <input type="submit" value="Seleccionar película" name="buscar">
    </form>
    <h1>Comprar entradas</h1>
    <?php
    if (isset($_POST["buscar"]) && !empty($_POST["titulo"])) {
        include("clase_conexion.php");
        include("clase_consulta.php");
        $_SESSION["titulo"] = $_POST["titulo"];
        $titulo = $_POST["titulo"];
        echo "<h2>Estamos en " . $_SESSION["titulo"] . "</h2>";
        echo '<img src="./imagenes/pant.png" alt="Pantalla cine"><br>';
        $conexion = new Consulta();
        $butacas = $conexion->buscarPelicula($titulo);
        $valores = str_split($butacas[0]);
        $contador = 0;
        $numButaca = 1;
        $numFila = 1;
        for($i = 0; $i < count($valores); $i++) {
            if($valores[$i] == "1") {
                echo "<a href='cinecomprada.php?butaca=$numButaca&butacaUpdate=$contador&fila=$numFila&titulo=$titulo'><img src='./imagenes/butaca_amarilla.png' alt='butaca libr'></a>";
                $numButaca++;
                $contador++;
            }
            if($valores[$i] == "0") {
                echo '<img src="./imagenes/butaca_roja.png" alt="butaca ocupada">';
                $numButaca++;
                $contador++;
            }
            if($i == 9 || $i == 19 || $i == 29 || $i == 39) {
                $numButaca = 1;
                $numFila++;
                echo "<br>";
            } 
        }
    }   
    ?>
    
    <br>
    
    <br>
    
    
</body>

</html>