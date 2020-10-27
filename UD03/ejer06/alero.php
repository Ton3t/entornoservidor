<?php
    class Alero extends Jugador {
        private $puntos;

        public function __construct($row)
        {
            parent::__construct($row);
            $this->Puntos = $row['puntos'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'Puntos':
                    return $this->puntos;
                default:
                return parent::__get($name);
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'Puntos':
                    $this->puntos = $value;
            }
        }
    }
?>