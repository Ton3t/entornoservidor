<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $contador = 0;
        echo "<table border=''>";
        echo "<tr><td>";
        echo key($_SERVER) . "</td><td>" . current($_SERVER);
        echo "</td></tr>";
        while(key($_SERVER) != null) {
            next($_SERVER);
            echo "<tr><td>";
            echo key($_SERVER);
            echo "</td>";
            echo "<td>";
            echo current($_SERVER);
            echo "</td></tr>";
        }
        echo "</table>";

    ?>
</body>
</html>