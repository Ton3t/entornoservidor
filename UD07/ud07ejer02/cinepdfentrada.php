<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    header("Location: cinelogin.php");
}
else {
    $numButaca = $_GET["butaca"];
    $numFila = $_GET["fila"];
    $titulo = $_GET["titulo"];
    
    include("./tcpdf/config/tcpdf_config.php");
    include("./tcpdf/tcpdf.php");
    $html = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
        
    <body>
    <img src="./imagenes/logo.png" alt="logo"><br>
        <table border="1">
            <tr>
                <td><strong>Película</strong></td>
                <td>' . $titulo . '</td>
            </tr>
            <tr>
                <td><strong>Fila</strong></td>
                <td>' . $numFila . '</td>
            </tr>
            <tr>
                <td><strong>Butaca</strong></td>
                <td>' . $numButaca . '</td>
            </tr>
            <tr>
                <td colspan="2">
                    <em>Presente esta entrada en la taquilla</em>
                </td>
            </tr>
        </table>
    </body>
    </html>';
    
        $documento = new TCPDF();
        $documento->setPrintHeader(false);
        $documento->setPrintFooter(false);
        $documento->SetTitle("Super Cines");
        $documento->AddPage();
        $documento->writeHTML($html, true, false, true, false, "");
        $documento->Output("entrada.pdf", "D");
}

?>