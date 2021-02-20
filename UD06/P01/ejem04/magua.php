<?php
    // Creamos la estampa
    $estampa = imagecreatefrompng("./img/logo.png");
    $img = imagecreatefromjpeg("./img/hollow.jpeg");

    // Establecer los márgenes para la estampa
    $margen_derecho = 10;
    $margen_inferior = 10;

    // Obtener el alto y ancho de la imagen de la estampa
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);

    /* Copiar la imagen de la estampa sobre nuestra foto
    usando los índices de margen y el ancho de la foto para 
    calcular la posición de la estampa.*/
    imagecopy($img, $estampa, imagesx($img) - $sx - $margen_derecho, imagesy($img) - $sy - $margen_inferior, 0, 0, imagesx($estampa), imagesy($estampa));

    // Imprimir y mostrar
    header("content-type: image/png");
    imagepng($img);

    // Guardar en un archivo nuevo 
    $nombreimg = "imagen_marcadeagua.png";
    imagepng($img, $nombreimg);
    imagedestroy($img);
?>