<?php
    class Conexion {
        public function getConexion() {
            $host = "localhost";
            $db = "examen";
            $user = "root";
            $pass = "tutuha";
            $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            return $conexion;
        }
    }
?>