<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $conexion = new mysqli('localhost', 'root', '', 'bdlibros');
        if($conexion->connect_errno) {
            echo "La conexión ha fallado";
            exit();
        }
        else {
            $consulta = $conexion->query("INSERT INTO libros VALUES (1, 'Jarry Choped y la Hierba Triposa', 'JK Bowling', 301)");
            $consulta = $conexion->query("INSERT INTO libros VALUES (2, 'El senyor de los Palillos', 'JRR TolQuien', 550)");
            $consulta = $conexion->query("INSERT INTO libros VALUES (3, 'Jarry Choped y la Sabana mágica', 'JK Bowling', 302)");
            $consulta = $conexion->query("INSERT INTO libros VALUES (4, 'Los polares de la tierra', 'Ken Follonet', 400)");
            $consulta = $conexion->query("INSERT INTO libros VALUES (5, 'Jarry Choped y el peluquero de Azkaban', 'JK Bowling', 300)");
            $consulta = $conexion->query("INSERT INTO libros VALUES (6, 'Los juegos del Enjambre', 'Suzanne Collonins', 450)");
            $consulta = $conexion->query("INSERT INTO libros VALUES (7, 'Jarry Choped y el lapiz de fuego', 'JK Bowling', 304)");
            $consulta = $conexion->query("INSERT INTO libros VALUES (8, 'El Bolido da Vinci', 'Dan Black', 500)");
            $consulta = $conexion->query("SELECT * FROM LIBROS");
            $resultado = $consulta->fetch_object();
            $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
            while($resultado != null) {
                $mensaje .= "<tr><td>$resultado->id</td><td>$resultado->titulo</td><td>$resultado->autor</td><td>$resultado->paginas</td></tr>";
                $resultado = $consulta->fetch_object();
            }
            $mensaje .= "</table>";
            echo "Array de libros ordenados <br>";
            echo $mensaje;
            
            echo "<br>Orden descenente<br>";
            
            $consulta2 = $conexion->query("SELECT * FROM LIBROS ORDER BY PAGINAS DESC");
            $resultado = $consulta2->fetch_object();
            $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
            while($resultado != null) {
                $mensaje .= "<tr><td>$resultado->id</td><td>$resultado->titulo</td><td>$resultado->autor</td><td>$resultado->paginas</td></tr>";
                $resultado = $consulta2->fetch_object();
            }
            $mensaje .= "</table>";
            echo $mensaje;

            echo "<br>Titulos de JK Bowling<br>";
            $consulta3 = $conexion->query("SELECT titulo, paginas FROM libros WHERE autor = 'JK Bowling'");
            $resultado = $consulta3->fetch_object();
            $mensaje = "<table border><tr><th>NOMBRE</th><th>PÁGINAS</th></tr>";
            while($resultado != null) {
                $mensaje .= "<tr><td>$resultado->titulo</td><td>$resultado->paginas</td></tr>";
                $resultado = $consulta3->fetch_object();
            }
            $mensaje .= "</table>";
            echo $mensaje;

            echo "<br>Borrar los libros de JK Bowling<br>";
            $consulta4 = $conexion->query("DELETE FROM libros WHERE autor = 'JK Bowling'");
            if($consulta4) {
                echo "<p>$conexion->affected_rows registros borrados.</p>";
            }
            
            $consulta4 = $conexion->query("SELECT * FROM LIBROS");
            $resultado = $consulta4->fetch_object();
           
            $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
            while($resultado != null) {
                $mensaje .= "<tr><td>$resultado->id</td><td>$resultado->titulo</td><td>$resultado->autor</td><td>$resultado->paginas</td></tr>";
                $resultado = $consulta4->fetch_object();
            }
            $mensaje .= "</table>";
            echo $mensaje;

            $consulta = $conexion->query("UPDATE libros SET titulo = 'El Morbido Da Vinci' WHERE id = 8");
            if($consulta) {
                echo "<p>" . $conexion->affected_rows . "</p>"; 
            }
            $consulta = $conexion->query("SELECT * FROM LIBROS");

            $resultado = $consulta->fetch_object();

            $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
            while($resultado != null) {
                $mensaje .= "<tr><td>$resultado->id</td><td>$resultado->titulo</td><td>$resultado->autor</td><td>$resultado->paginas</td></tr>";
                $resultado = $consulta->fetch_object();
            }
            $mensaje .= "</table>";
            echo $mensaje;

            $consulta4 = $conexion->query("DELETE FROM libros");
           

        }
        
    ?>
    
</body>
</html>