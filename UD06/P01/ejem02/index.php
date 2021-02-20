<?php
// Creacion de la imagen
    $alto = 500;
    $ancho = 500;
    $imagen = imagecreatetruecolor($ancho, $alto);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $azul = imagecolorallocate($imagen, 0, 0, 164);
    $rojo = imagecolorallocate($imagen, 255, 0, 0);
    $verde = imagecolorallocate($imagen, 95, 218, 62);
    $morado = imagecolorallocate($imagen, 144, 26, 225);

    imagefill($imagen, 0, 0, $azul);
    imageline($imagen, 0, 0, $ancho, $alto, $blanco);
    imageline($imagen, 0, 500, 500, 0, $rojo);
    imageline($imagen, 0, 250, 500, 250, $verde);
    imageline($imagen, 250, 0, 250, 500, $morado);
    imagestring($imagen, 4, 100, 50, "El Tonet", $verde);

    header('content-type: image/png');
    imagepng($imagen);
    imagedestroy($imagen);
?>