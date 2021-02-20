<?php
    class Mascotas {
        private $nombre;
        private $vacunas;
        private $propietario;

        public function __set($name, $value)
        {
            switch($name) {
                case 'Nombre':
                    $this->nombre = $value;
                break;
                case 'Vacunas':
                    $this->vacunas = $value;
                break;
                case 'Propietario':
                    $this->propietario = $value;
                break;
            }
        }

        public function __get($name)
        {
            switch($name) {
                case 'Nombre':
                    return $this->nombre;
                case 'Vacunas':
                    return $this->apellidos;
                case 'Propietario':
                    return $this->propietario;
            }
        }
    }
?>