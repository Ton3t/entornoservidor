<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "Array de nombres <br>";
        $alumni = ["Pepe", "Juan", "Toni", "Asier", "Ramon", "Alex", "Alejandro", "Salva", "Victor", "Lucía", "Angel", "Raunak"];
        $alumni2 = array_reverse($alumni);

        echo implode(", ", $alumni) . "<br>";
        
        echo "Array de nombres ordenado <br>";
        

        asort($alumni);
        foreach($alumni as $codigo => $contenido) {
            echo $codigo . " - " . $contenido . "<br>";
        }

        echo "<br>Array al reves<br>";
        foreach($alumni2 as $codigo => $contenido) {
            echo $codigo . " - " . $contenido . "<br>";
        }

        echo "<br>Buscamos Toni<br>";
        $nombre = array_search('Toni', $alumni);
        echo $nombre . "<br>";
        
    ?>
    <table border="1">
        
        <?php
            $alumnado = array(array(11, "Toni", 34), array(12, "Asier", 20), array(13, "Ramon", 22), array(14, "Lucía", 28), array(15, "Alexander", 19), array(16, "Angel", 40));
            foreach($alumnado as $elemento) {
                echo "<tr>";
                foreach($elemento as $posicion) {
                    echo "<td>" . $posicion . "</td>";
                }
                echo "</tr></table>";
            }

        ?>
</body>
</html>