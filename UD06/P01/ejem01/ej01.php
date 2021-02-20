<?php
    imagepng("./img/holow.png");
    header('content-type: image/png');
    imagejpeg($imagen);
    imagedestroy($imagen);
?>
