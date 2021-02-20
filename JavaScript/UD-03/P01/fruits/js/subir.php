<?php
    $datosJson = file_get_contents("tablas.json");
    $datos = json_decode($datosJson, true);
    $factura = $_POST["datos"];
    $jsonNuevo = json_decode($factura, true);
    $jsonFinal = json_encode($jsonNuevo, JSON_PRETTY_PRINT);
    file_put_contents("tablas.json", $jsonFinal);
?>