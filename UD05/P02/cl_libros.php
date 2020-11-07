<?php
class ConexionLibros
{
    public function getConexion()
    {
        $host = "localhost";
        $db = "bdlibros";
        $user = "root";
        $pass = "tutuha";
        $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
        return $conexion;
    }

    function libroslvl1()
    {
        $bbdd = new ConexionLibros();
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

    public function modificarProducto($id, $titulo, $autor, $paginas)
    {
        $bbdd = new ConexionLibros();
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

    public function cargarProductos()
    {
        $bbdd = new ConexionLibros();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM LIBROS";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $row = null;
        $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th><th>ELIMINAR</th></tr>";
        while ($row = $consulta->fetch()) {
            $contador = $row["id"];
            $mensaje .=  "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><td><a href='eliminarlibro.php?id=$contador'>Eliminar</a></td><tr/>";
        }
        $mensaje .= "</table>";
        return $mensaje;
    }

    public function lvl2()
    {
        $bbdd = new ConexionLibros();
        $conexion = $bbdd->getConexion();
        $sql = "SELECT * FROM LIBROS";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $row = null;
        $mensaje = "<table border><tr><th>ID</th><th>NOMBRE</th><th>AUTOR</th><th>PÁGINAS</th></tr>";
        while ($row = $consulta->fetch()) {
            $contador = $row["id"];
            $mensaje .=  "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . "</td><td><a href='./controlador/modificarlibro.php?id=$contador'>Modificar</a></td><tr/>";
        }
        $mensaje .= "</table>";
        return $mensaje;
    }

    function insLibro($id, $titulo, $autor, $paginas)
    {
        $bbdd = new ConexionLibros();
        $conexion = $bbdd->getConexion();
        $sql = "INSERT INTO libros (id, titulo, autor, paginas) VALUES (?, ?, ?, ?)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->bindParam(2, $titulo);
        $consulta->bindParam(3, $autor);
        $consulta->bindParam(4, $paginas);
        if($consulta->execute()) {
            echo "Libro ingresado correctamente";
            header("refresh:1; url = pagina.php");
        }
        else {
            echo "No se ha podido insertar el libro revise los campos...";
            header("refresh:0; url = pagina.php");
        }
    }

    public function eliminarProducto($id)
    {
        $bbdd = new ConexionLibros();
        $conexion = $bbdd->getConexion();
        $sql = "DELETE FROM LIBROS WHERE id = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $id);
        if (@$consulta->execute()) {
            echo "<h3>Registro eliminado correctamente.</h3><br>";
            header("refresh:1; url = pagina.php");

            
        } else {
            echo "<h3>Fallo al eliminar el registro.</h3><br>";
            header("refresh:1; url = pagina.php");
        }
    }
}
