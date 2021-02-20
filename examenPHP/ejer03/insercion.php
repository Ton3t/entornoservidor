<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opcion 2</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" id="idnombre" value="<?php if (isset($_POST['enviar'])) echo $_POST['nombre']; ?>"><br>
        Año : <input type=" number" name="anyo" id="idanyo" value="<?php if (isset($_POST['enviar'])) echo $_POST['anyo']; ?>"><br>
        foto: <input type="file" name="foto" id="idfoto" value="<?php if (isset($_POST['foto'])) echo $_POST['foto']; ?>"> <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
    include("clas_conexion.php");
    include("clas_consulta.php");

    if (isset($_POST['enviar'])) {
        if (empty($_POST['nombre']) || empty($_POST['anyo']) || empty($_POST['foto'])) {
        } else {
            $conexion = new Consulta();
            $resultado = $conexion->cargarProductos();
            echo $resultado;
        }
    }
    ?>
</body>

</html>