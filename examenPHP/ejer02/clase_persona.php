<?php
    class Persona {
        private $nombre;
        private $apellidos;
        private $dni;

        public function __construct($row)
        {
            $this->nombre = $row['nombre'];
            $this->apellidos = $row['apellidos'];
            $this->dni = $row['dni'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'Nombre':
                    return $this->nombre;
                case 'Apellidos':
                    return $this->apellidos;
                case 'Dni':
                    return $this->dni;
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'Nombre':
                    $this->nombre = $value;
                break;
                case 'Apellidos':
                    $this->apellidos = $value;
                break;
                case 'Dni':
                    $this->dni = $value;
                break;
            }
        }
        public function __toString()
        {
            return "Nombre: " . $this->__get("Nombre") . " - Apellidos: " . $this->__get("Apellidos") . "DNI: " . $this->__get("Dni");
        }
    }
?>