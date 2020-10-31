<?php
        require("datosconexion.php");
        $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasenya);

        if(mysqli_connect_errno()) {
            echo "Houston, tenemos un problema...";
            exit();
        }
        if(!empty(["enviar"]) && !empty(["seccion"]) && !empty(["articulo"]) && !empty(["precio"]) && !empty(["paisorigen"])) {
            mysqli_select_db($conexion, $db_nombre) or die ("No encuentro la base de datos.");
            mysqli_set_charset($conexion, "utf8");
            $sql = "INSERT INTO PRODUCTOS (seccion, articulo, precio, paisorigen) VALUES (?, ?, ?, ?)";
            $resultado = mysqli_prepare($conexion, $sql);

            $seccion = $_POST['seccion'];
            $articulo = $_POST['articulo'];
            $precio = $_POST['precio'];
            $paisorigen = $_POST['paisorigen'];
                
            mysqli_stmt_bind_param($resultado, 'ssis', $seccion, $articulo, $precio, $paisorigen);

            $ok = mysqli_stmt_execute($resultado);

            if(!$ok) {
                echo "Error al ejecutar la consulta.";
            }
            else {
                $sql = "SELECT seccion, articulo, precio, paisorigen FROM PRODUCTOS";
                $resultado = mysqli_prepare($conexion, $sql);
                $ok = mysqli_stmt_execute($resultado);
                mysqli_stmt_bind_result($resultado, $miseccion, $miarticulo, $miprecio, $mipais);
                $mensaje = "<table border><tr><th>SECCIÓN</th><th>ARTICULO</th><th>PRECIO</th><th>PAIS</th></tr>";
                while(mysqli_stmt_fetch($resultado)) {
                    $mensaje .= "<tr><td>$miseccion</td><td>$miarticulo</td><td>$miprecio €</td><td>$mipais</td></tr>";
                }
                $mensaje .= "</table>";
                echo $mensaje;
                echo "<a href='formulariointroduccion.php'>Atrás</a>";
                mysqli_stmt_close($resultado);
            }
        }
        mysqli_close($conexion);
?>