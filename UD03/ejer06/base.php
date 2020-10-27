<?php

    class Base extends Jugador {
        private $asistencias;

        public function __construct($row) 
        {
            parent::__construct($row);
            $this->asistencias = $row['asistencias'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'Asistencias':
                    return $this->asistencias;
                default:
                return parent::__get($name);
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'Asistencias':
                    $this->asistencias = $value;
                break;
            }
        }
    }
?>