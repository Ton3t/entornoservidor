<?php

    class Pivot extends Jugador {
        private $rebotes;

        public function __construct($row)
        {
            parent::__construct($row);
            $this->rebotes = $row['rebotes'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'Rebotes':
                    return $this->rebotes;
                default:
                return parent::__get($name);
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'Rebotes':
                    $this->rebotes = $value;
                break;
            }
        }
    }
?>