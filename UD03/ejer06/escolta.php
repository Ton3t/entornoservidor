<?php
    class Escolta extends Jugador {
        private $robos;

        public function __construct($row) 
        {
            parent::__construct($row);
            $this->Robos = $row['robos'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'Robos':
                    return $this->robos;
                default:
                return parent::__get($name);
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'Robos':
                    $this->robos = $value;
                break;
            }
        }
    }
?>