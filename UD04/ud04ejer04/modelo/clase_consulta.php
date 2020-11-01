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

    public function cargarProductos()
    {
        $bbdd = new Conexion();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM LIBROS";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $row = null;
        $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th><th>MODIFICAR</th><th>ELIMINAR</th></tr>";
        while ($row = $consulta->fetch()) {
            $contador = $row["id"];
            $mensaje .=  "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><td><a href='./controlador/modificarlibro.php?id=$contador'>Modificar</a></td><td><a href='./controlador/eliminarlibro.php?id=$contador'>Eliminar</a></td><tr/>";
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
}
