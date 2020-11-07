<?php
    session_start();
    if(!isset($_SESSION["nombre"])) {
        header("Location:login.php");
    }
    
    echo "<h3>¡¡Bienvenido, " . $_SESSION["nombre"] . "!!</h3>";
    echo "Hora del último login: " . $_COOKIE["ultimo_log"] . "<br>";
    echo "<a href='logout.php'>Cerrar sesión</a>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Principal</title>
</head>
<body>
    <h1>Permisos de acceso en esta aplicación:</h1>
    <ul>
        <?php
            if($_SESSION["lectura"] == 1) {
                echo "<li>Lectura</li>";
            }
            if($_SESSION["escritura"] == 1) {
                echo "<li>Escritura</li>";
            }
            if($_SESSION["administracion"] == 1) {
                echo "<li>Administración</li>";
            }
        ?>
    </ul>
    <h1>Inserta libro</h1>
    <form action="" method="post">
            <label for="idid">Id: <input type="text" name="id" id="idid" <?php if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 0 && $_SESSION["administracion"] == 0) echo "disabled"?>></label><br>
            <label for="idtitulo">Titulo: <input type="text" name="titulo" id="idtitulo" <?php if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 0 && $_SESSION["administracion"] == 0) echo "disabled"?>></label><br>
            <label for="idautor">Autor: <input type="text" name="autor" id="idautor" <?php if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 0 && $_SESSION["administracion"] == 0) echo "disabled"?>></label><br>
            <label for="idpaginas">Páginas: <input type="number" name="paginas" id="idpaginas" <?php if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 0 && $_SESSION["administracion"] == 0) echo "disabled"?>></label><br>
            <input type="submit" value="Insertar Libro" name="arre" <?php if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 0 && $_SESSION["administracion"] == 0) echo "disabled"?>>
        </form>
    <?php
        include("cl_libros.php");
        $conexion = new ConexionLibros();
        if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 0 && $_SESSION["administracion"] == 0) {
            echo $conexion->libroslvl1();
        }
        if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 1 && $_SESSION["administracion"] == 0) {
            echo $conexion->libroslvl1();
        }
        if($_SESSION["lectura"] == 1 && $_SESSION["escritura"] == 1 && $_SESSION["administracion"] == 1) {
            echo $conexion->cargarProductos();
        }
        if(isset($_POST["arre"])) {
            if(empty($_POST["id"]) || empty($_POST["titulo"]) || empty($_POST["autor"]) || empty($_POST["paginas"])) {

            }
            else {
                $id = $_POST["id"];
                $autor = $_POST["autor"];
                $titulo = $_POST["titulo"];
                $paginas = $_POST["paginas"];
                $conexion->insLibro($id, $titulo, $autor, $paginas);
            }
        }
    ?>
</body>
</html>