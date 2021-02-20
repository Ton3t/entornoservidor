
<?php
    include('tcpdf/config/tcpdf_config.php');
    include('tcpdf/tcpdf.php');
    $dimensiones = array(1, 3);
    $documento = new TCPDF('P', 'in', $dimensiones);
    $documento->setPrintHeader(false);
    $documento->setPrintFooter(false);
    $documento->SetTitle("hola");
    $documento->AddPage();
    $documento->AddPage('L');
    $documento->AddPage();
    $documento->Output("doc.pdf", "I");
?>
