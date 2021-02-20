<?php
function miniatura($name_org,$name_dst,$ancho,$alto){
    // Separamos el nombre y la extensión en un array de 2 elementos
    $arrNombre=explode(".",$name_dst);
    $nombre=$arrNombre[0];
    $extension=$arrNombre[1];

    // Creamos una nueva imagen, paracada tipo de extensión posible
    if($extension=="jpg"||$extension=="jpeg") $source=imagecreatefromjpeg($name_org);
    elseif($extension=="png")$source=imagecreatefrompng($name_org);
    elseif($extension=="gif")$source=imagecreatefromgif($name_org);

    //Creamos el thumbnail vacio 
    $thumb=imagecreatetruecolor($ancho,$alto);
    $ancho_orig=imagesx($source);
    $alto_orig=imagesy($source);

    // Copiamos la imagen en un thumbnail pasándole los parámetros necesarios 
    imagecopyresampled($thumb,$source,0,0,0,0,$ancho,$alto,$ancho_orig,$alto_orig);
    // Exportamos al formato elegido (Con el formato jpg o jpeg podemos elegir calidad).
    if($extension=="jpg"||$extension=="jpeg")imagejpeg($thumb,$name_dst, 90);
    elseif($extension=="png")imagepng($thumb,$name_dst);
    elseif($extension=="gif")imagegif($thumb,$name_dst);
}


if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) { 
    echo'Error: '; 
    switch($_FILES['imagen']['error']) {
        case UPLOAD_ERR_INI_SIZE: 
        case UPLOAD_ERR_FORM_SIZE: 
            echo'El fichero es demasiado grande'; 
        break; 
        case UPLOAD_ERR_PARTIAL: 
            echo'El fichero no se ha podido subir entero'; 
        break; 
        case UPLOAD_ERR_NO_FILE: 
            echo'No se ha podido subir el fichero'; 
        break; 
        default: 
        echo'Error indeterminado'; 
    } 
    // Comprobamos que el fichero es del tipo que esperamos
// } elseif($_FILES['imagen']['type'] != 'image/jpeg') {
} elseif (!in_array($_FILES['imagen']['type'], ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'])){
    echo'Error: No se trata de un fichero .JPG.'; 
}
elseif(is_uploaded_file($_FILES['imagen']['tmp_name']) === true) {

    /* Concatenamos la ruta destino y comprobamos si el nombre ya existe previamente, en cuyo caso añadiremos una marca de tiempo. */
    $nombre = './subidas/' . $_FILES['imagen']['name'];
    $arrNombre = explode(".",$nombre);
    $extension = end($arrNombre);

    if(is_file($nombre) === true){
        $nombre =  '.'.$arrNombre[count($arrNombre) - 2] .'_'.time().'.'.$extension;
        echo "Nombre: $nombre";
    }

    // Movemos el fichero a su nueva ubicación 
    // move_uploaded_file( string $filename , string $destination ) : bool
    if (move_uploaded_file($_FILES['imagen']['tmp_name'],$nombre)) { 


        // Mostramos el archivo gifsubido
        // header("Content-type: image/gif"); 
        // $fp= fopen($nombre, 'rb'); 
        // $contenido = fread($fp, filesize($nombre)); 
        // fclose($fp); 
        // echo $contenido; 

        miniatura($nombre,"subidas/muestra120.$extension",120,120);
        miniatura($nombre,"subidas/muestra200.$extension",200,200);




    }else{
        echo'Error: No se puede mover el fichero a su destino.'; 
    }
} else{
    echo'Error: posible ataque. Nombre: ' . $_FILES['imagen']['name'];
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" id="" value="Selecciona un archivo">
        <input type="submit" value="Apreta wei" name="ejecuta">
    </form>
    <br>
    <?php
        if(isset($_POST["ejecuta"])) {
            $arrNombre = explode('.', $_FILES['imagen']['name']);
            $extension = end($arrNombre);
            echo "<img src='./subidas/muestra120.{$extension}' alt='imagen 120'>";
            echo "<img src='./subidas/muestra200.{$extension}' alt='imagen 200'>";
        }
    ?>
    
</body>


</html>