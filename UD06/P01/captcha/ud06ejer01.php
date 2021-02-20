<?php
    // Crear un texto aleatorio
    session_start();
    // Creamos una cadena aleatoria
    $crypt = md5(mktime() * rand());
    // Cogemos 5 carácteres
    $cadena = substr($crypt, 0, 5);
    // Creamos una imagen partiendo de una de fondo.
    // Debemos subir una imagen de fondo al servidor).
    $alto = 100;
    $ancho = 200;
    $imagen = imagecreatetruecolor($ancho, $alto);
    // Colores usados para generan las líneas (RGB).
    $azul = imagecolorallocate($captcha, 39, 102, 165);
    // Añadimos líneas a nuestra imagen.
    imageline($captcha, 0, 0, 39, 29, $azul);
    imageline($captcha, 40, 0, 64, 29, $azul);

    // Escribimos la cadena aleatoriamente en la imagen
    imagestring($captcha, 5, 20, 10, $cadena, $azul);
    // Encriptamos y almacenamos el valor en una variable de sesión
    $_SESSION["key"] = md5($cadena);
    // Devolvemos la imagen para mostrarla
    header("Content-type: image/jpg");
    $nombre = "imagencaptcha.jpg";
    imagejpeg($captcha, $nombre);
    imagedestroy($captcha);

    if(md5($_POST["code"]) != $_SESSION["key"]) {
        die("Error: No has introducido el código correcto.");
    }
    else {
        echo "Correcto, parece que eres un humano.";
    }
?>


