<?php
class Consulta
{
    public function insertarProducto($nombre, $anyo, $foto)
    {
        $conexion = new Conexion();
        $pdoObjeto = $conexion->getConexion();
        $sql = "INSERT INTO MASCOTAS (nombre, anyo_nac, foto) VALUES (:nombre, :anyo_nac, :foto)";
        $consulta = $pdoObjeto->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':anyo_nac', $anyo);
        $consulta->bindParam(':foto', $foto);
        if (@$consulta->execute()) {
            $mensaje = "Registro creado correctamente.";
            header("Refresh:1; url=muestra.php");
        } else {
            $mensaje = "Fallo al crear el registro.";
            header("Refresh:1; url=insercion.php");
        }
        return $mensaje;
    }

  

    public function cargarProductos()
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM MASCOTAS";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $row = null;
        $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th><th>IMÁGEN</th><th>MODIFICAR</th><th>ELIMINAR</th></tr>";
        while ($row = $consulta->fetch()) {
            
            $contador = $row["id"];
            $imagen_base64 = $row['imagen'];
            $mensaje .=  "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td>" . "<td><img width='200px' src='data:image/jpeg; base64, $imagen_base64' alt= 'No existe imagen de este libro'/>" .  "</td><td><a href='./controlador/modificarlibro.php?id=$contador'>Modificar</a></td><td><a href='./controlador/eliminarlibro.php?id=$contador'>Eliminar</a></td><tr/>";
        }
        $mensaje .= "</table>";
        return $mensaje;
    }

 
}