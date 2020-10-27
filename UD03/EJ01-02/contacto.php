
<?php
    class Contacto {
        private static $ncontacto = 0;
        private $id = 0;
        private $nombre;
        private $telefono;

        public function __construct($nombre, $telefono)
        {
            $this->setId(self::$ncontacto);
            $this->setNombre($nombre);
            $this->setTelefono($telefono);
            self::$ncontacto++;
        }

        // Getters y Setters //

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

        // MEtodo de conversión //

        public function __toString()
        {
            return "Nombre: " . $this->getNombre() . " - Telefono: " . $this->getTelefono();
        }
    }
?>