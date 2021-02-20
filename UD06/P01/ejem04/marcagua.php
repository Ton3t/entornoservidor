<?php
    // Creamos la estampa
    $estampa = imagecreatetruecolor(100, 70);
    $img = imagecreatefromjpeg("./img/hollow.jpeg");

    // Establecer los márgenes para la estampa
    $margen_derecho = 10;
    $margen_inferior = 10;

    // Obtener el alto y ancho de la imagen de la estampa
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);

    imagefilledrectangle($estampa, 0, 0, 99, 69, 0x0000FF);
    imagefilledrectangle($estampa, 9, 9, 90, 60, 0xFFFFFF);

    // Dibujar un texto horizontal
    imagestring($estampa, 5, 20, 20, 'Tonet', 0x0000FF);
    imagestring($estampa, 3, 20, 40, '(c) 2020', 0x0000FF);

   // Fusiona la estampa con la imagen con una opacidad
    imagecopymerge($img, $estampa, imagesx($img) - $sx - $margen_derecho, imagesy($img) - $sy - $margen_inferior, 0, 0, imagesx($estampa), imagesy($estampa), 50);

    // Imprimir y mostrar
    header("content-type: image/png");
    imagepng($img);

    // Guardar en un archivo nuevo 
    $nombreimg = "imagen_marcadeagua2.png";
    imagepng($img, $nombreimg);
    imagedestroy($img);
?>