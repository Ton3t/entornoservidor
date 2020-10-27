<?php

    class Alapivot extends Jugador {
        private $tapones;

        public function __construct($row) 
        {
            parent::__construct($row);
            $this->tapones = $row['tapones'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'Tapones':
                    return $this->tapones;
                default:
                return parent::__get($name);
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'Tapones':
                    $this->tapones = $value;
                break;
            }
        }
    }
?>