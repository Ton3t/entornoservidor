<?php
    $imagen = imagecreatefrompng("holow.png");
    header('content-type: image/png');
    imagepng($imagen);
    imagedestroy($imagen);
?>
