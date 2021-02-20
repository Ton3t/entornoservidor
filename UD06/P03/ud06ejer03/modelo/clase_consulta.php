<?php
class Consulta
{
    public function insertarProducto($id, $titulo, $autor, $paginas)
    {
        $conexion = new Conexion();
        $pdoObjeto = $conexion->getConexion();
        $sql = "INSERT INTO LIBROS (id, titulo, autor, paginas) VALUES (:id, :titulo, :autor, :paginas)";
        $consulta = $pdoObjeto->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':titulo', $titulo);
        $consulta->bindParam(':autor', $autor);
        $consulta->bindParam(':paginas', $paginas);
        if (@$consulta->execute()) {
            $mensaje = "Registro creado correctamente.";
        } else {
            $mensaje = "Fallo al crear el registro.";
        }
        return $mensaje;
    }

    public function insertarImagen($id, $titulo, $autor, $paginas, $imagen)
    {
        $conexion = new Conexion();
        $pdoObjeto = $conexion->getConexion();
        $sql = "INSERT INTO LIBROS (id, titulo, autor, paginas, imagen) VALUES (:id, :titulo, :autor, :paginas, :imagen)";
        $consulta = $pdoObjeto->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':titulo', $titulo);
        $consulta->bindParam(':autor', $autor);
        $consulta->bindParam(':paginas', $paginas);
        $consulta->bindParam(':imagen', $imagen);
        if (@$consulta->execute()) {
            $mensaje = "Registro creado correctamente.";
        } else {
            $mensaje = "Fallo al crear el registro.";
        }
        return $mensaje;
    }

    public function cargarProductos()
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM LIBROS";
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

    public function cargarProductosEliminar()
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM LIBROS";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $row = null;
        $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
        while ($row = $consulta->fetch()) {
            $mensaje .=  "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><tr/>";
        }
        $mensaje .= "</table>";
        return $mensaje;
    }

    public function buscarProducto($id)
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM LIBROS WHERE titulo = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->execute();
        $row = null;
        $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
        while ($row = $consulta->fetch()) {
            $mensaje .=  "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><tr/>";
        }
        $mensaje .= "</table>";
        return $mensaje;
    }

    public function modificarProducto($id, $titulo, $autor, $paginas)
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "UPDATE LIBROS SET titulo = ?, autor = ?, paginas = ? WHERE id = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $titulo);
        $consulta->bindParam(2, $autor);
        $consulta->bindParam(3, $paginas);
        $consulta->bindParam(4, $id);
        if (@$consulta->execute()) {
            $mensaje = "<h3>Registro modificado correctamente.</h3><br>";
        } else {
            $mensaje = "<h3>Fallo al modificar el registro.</h3>";
        }
        return $mensaje;
    }

    public function eliminarProducto($id)
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "DELETE FROM LIBROS WHERE id = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $id);
        if (@$consulta->execute()) {
            $mensaje = "<h3>Registro eliminado correctamente.</h3><br>";
        } else {
            $mensaje = "<h3>Fallo al eliminar el registro.</h3><br>";
        }
        return $mensaje;
    }
}
