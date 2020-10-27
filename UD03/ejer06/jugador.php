<?php
    class Jugador 
    {
        private $nombre;
        private $dorsal;
        private $estatura;

        public function __set($name, $value)
        {
            switch($name) {
                case 'Nombre':
                    $this->nombre = $value;
                break;
                case 'Dorsal':
                    $this->dorsal = $value;
                break;
                case 'Estatura':
                    $this->$name = $value;
                break;
            }
        }

        public function __get($name) {
            switch($name) {
                case 'Nombre':
                    return $this->nombre;
                case 'Dorsal':
                    return $this->dorsal;
                case 'Estatura':
                    return $this->estatura;
            }
        }

        public function __construct($row)
        {
            $this->nombre = $row['nombre'];
            $this->dorsal = $row['dorsal'];
            $this->estatura = $row['estatura'];
        }
    }
?>