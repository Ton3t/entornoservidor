<?php
    session_start();
    if(isset($_SESSION["nombre"])) {
        $_SESSION = array();
        session_destroy();
        header("Location: cinelogin.php");
    }
?>