<?php
function fechaCastellano()
{
    //$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    //$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $dia = dias();
    $mes = meses();

    
    echo "<br/>";

    echo $dia . ", " . date('d') . " de " . $mes . " de " .date('Y');

    echo "<br/>";

    //echo $diassemana[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
}

function dias() {
    $dia = date('w');
    $dia--;
    switch ($dia) {
        case 0:
            return "Lunes";
            break;
        case 1:
            return "Martes";
            break;
        case 2:
            return "Miercoles";
            break;
        case 3:
            return "Jueves";
            break;
        case 4:
            return "Viernes";
            break;
        case 5:
            return "Sabado";
            break;
        case 6:
            return "Domingo";
            break;
    }
}

function meses() {
    $mes = date('n');
    switch ($mes) {
        case 1:
            return "Enero";
            break;
        case 2:
            return "Febrero";
            break;
        case 3:
            return "Marzo";
            break;
        case 4:
            return "Abril";
            break;
        case 5:
            return "Mayo";
            break;
        case 6:
            return "Junio";
            break;
        case 7:
            return "Julio";
            break;
        case 8:
            return "Agosto";
            break;
        case 9:
            return "Septiembre";
            break;
        case 10:
            return "Octubre";
            break;
        case 11:
            return "Noviembre";
            break;
        case 12:
            return "Diciembre";
            break;
    }
}

function factorial($num)
{
    $factorial = $num;
    $total = 1;
    echo $num . "! = ";
    while ($factorial != 1) {
        echo $factorial . " * ";
        $total = $factorial * $total;
        $factorial--;
    }
    echo "1 = " . $total;
}
