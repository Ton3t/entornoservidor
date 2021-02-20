<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opción 2</title>
</head>
<?php
    if (!empty($_POST['nomcompleto']) && !empty($_POST['genero']) && !empty($_POST['comentario'])) {
        // Aquí iría el código a ejecutar cuando los datos son correctos
        $nombre = $_POST['nombre'];
        $comida = $_POST['comida'];
        $comentario = $_POST['comentario'];
        echo $nombre;
        foreach($comida as $contador) {
            echo $contador;
        }
        echo $comentario;

    } else {
        ?>
<body>
    <form action="" method="post">
        <h1>Formulario Ejercicio 1</h1>
        Nombre: <input type="text" name="nomcompleto" id="idnomcompleto"><br>
        Género: <br>
        <input type="radio" name="genero" id="" value="masculino"> Masculino
        <input type="radio" name="genero" id="" value="femenino"> Femenino
        <br>

        <input type="checkbox" value="mañana" name="horario[]">Mañana</input>
        <input type="checkbox" value="tarde" name="horario[]">Tarde</input>
        <input type="checkbox" value="noche" name="horario[]">Noche</input>
        <br>
        Animales que te gustan: <br>
        <input type="radio" name="animales[]" id="" value="perros"> Perros
        <input type="radio" name="animales[]" id="" value="gatos"> Gatos
        <input type="radio" name="animales[]" id="" value="roedores"> Roedores
        <input type="radio" name="animales[]" id="" value="reptiles"> Reptiles
        <br>
        <textarea name="otros" id="" cols="60" rows="4"></textarea><br>
        <input type="submit" value="Enviar" name="ejecuta">
    </form>
    <?php
        if(isset($_POST["ejecuta"])) {
            if(empty($_POST["nomcompleto"]) || empty($_POST["genero"]) || empty($_POST["horario"]) || empty($_POST["animales"]) || empty($_POST["otros"])) {

            } else {

            }
        }
    ?>

</body>

</html>