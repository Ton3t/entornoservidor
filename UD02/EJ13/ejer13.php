<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<body>
    <?php
    if (!empty($_POST['nombre']) && !empty($_POST['musica'])) {
        $nombre = $_POST['nombre'];
        $musica = $_POST['musica'];
        
    }
    else {
        ?>
        <form action="ejer13.php" method="post">
        <label for="idnombre">Nombre:* </label>
        <input type="text"  name="nombre" id="idnombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'] ?>" multiple><br/>
        <label for="idmusica">Que muscia te gusta</label>
        <select name="musica[]" id="idmusica">
            <option value="Acustica">Acústica</option>
            <option value="BSO">BSO</option>
            <option value="R&B">R&B</option>
            <option value="Electronica">Electrónica</option>
            <option value="Folk">Folk</option>
            <option value="Jazz">Jazz</option>
            <option value="Pop">Pop</option>
            <option value="Rock">Rock</option>
        </select><br/>
        <input type="submit" value="Enviar">
    </form>
    <?php
    }
    ?>


    
    <?php
        $ip_cliente = $_SERVER['REMOTE_ADDR'];
        $fecha = date("d/m/Y");
        $hora = date("H:i:s");
        echo gethostname() . " " . $ip_cliente . "<br/>";
        echo $fecha . " " . $hora;
    ?>
</body>
</html>