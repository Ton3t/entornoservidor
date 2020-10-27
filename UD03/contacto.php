
<?php
    class Contacto {
        private static $ncontacto = 0;
        private $id = 0;
        private $nombre;
        private $telefono;

        public function __construct($row)
        {
            $this->id = (self::$ncontacto);
            $this->nombre = $row['nombre'];
            $this->telefono = $row['telefono'];
            self::$ncontacto++;
        }

        // Getters y Setters //

        public function __get($name)
        {
            switch($name) {
                case 'nombre':
                    return $this->nombre;
                case 'telefono':
                    return $this->telefono;
                case 'id':
                    return $this->id;
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'nombre':
                    $this->nombre = $value;
                break;
                case 'telefono':
                    $this->telefono = $value;
                break;
                case 'id':
                    $this->id = $value;
                break;
            }
        }

        /*

        public function setId($id) {
            $this->id = $id;
        }

        public function getId() {
            return $this->id;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        public function getTelefono() {
            return $this->telefono;
        }

        */

        // MEtodo de conversión //

        public function __toString()
        {
            return "Nombre: " . $this->__get("nombre") . " - Telefono: " . $this->__get("telefono");
        }
    }
?>