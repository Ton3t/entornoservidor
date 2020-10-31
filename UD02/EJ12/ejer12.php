<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php
    if (!empty($_POST['nombre']) && !empty($_POST['comida']) && !empty($_POST['comentario'])) {
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
        
        <form action="ejer12.php" method="post">
        <label for="idnombre">Nombre: </label>
        <input type="text" name="nombre" id="idnombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'] ?>">
        <?php if(isset($_POST['enviar']) && empty($_POST['nombre'])) echo "<span style='color:red'> Debe introducir un nombre!!</span>"; ?>
        <br />
        <label for="idprefer">Que prefieres??</label>
        <?php if(isset($_POST['enviar']) && empty($_POST['comida'])) echo "<span style='color:red'> Debe introducir una comida!!</span>"; ?>
        <br/>
        <label for="idhamburguesa">Hamburguesa</label>
        <input type="checkbox" name="comida[]" id="idhamburguesa" value="Hamburguesa" <?php if(in_array("Hamburguesa", $_POST['comida'])) echo "checked"; ?>>
        <label for="idfilete">Filete</label>
        <input type="checkbox" name="comida[]" id="idfilete" value="Filete" <?php if(in_array("Filete", $_POST['comida'])) echo "checked"; ?>>
        <label for="idmarisco">Marisco</label>
        <input type="checkbox" name="comida[]" id="idmarisco" value="Marisco" <?php if(in_array("Marisco", $_POST['comida'])) echo "checked";?>>
        <br />
        <label for="idcomentario">Deja tu comentario: <?php if(isset($_POST['enviar']) && empty($_POST['comentario']) || $_POST['comentario'] == "" || $_POST['comentario'] == null) echo "<span style='color:red'> Debe introducir un comentario!!</span>";?></label>
        <br />
        <textarea name="comentario" id="idcomentario" cols="30" rows="10">
            <?php
                if(isset($_POST['comentario'])) echo $_POST['comentario'];
            ?>
        </textarea>
        
        <br />
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
    }
    ?>
</body>

</html>
