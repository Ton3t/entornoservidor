<?php
    require("contacto.php");

    class EContacto extends Contacto {
        private $email;
        private $url;

        public function __construct($row)
        {
            parent:: __construct($row);
            $this->email = $row['email'];
            $this->url = $row['url'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'email':
                    return $this->email;
                case 'url':
                    return $this->url;
                default:
                return parent::__get($name);
            }
            
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'email':
                    $this->email = $value;
                break;
                case 'url':
                    $this->url = $value;
                break;
            }
        }

        public function __toString()
        {
            return "Email: " . $this->__get("email") . "<br>" . "Url: " . $this->__get("url");
        }
    }

    class PContacto extends Contacto {
        private $direccion;
        private $provincia;
        private $ciudad;

        public function __construct($row) {
            parent::__construct($row);
            $this->direccion = $row['direccion'];
            $this->provincia = $row['provincia'];
            $this->ciudad = $row['ciudad'];
        }

        public function __get($name)
        {
            switch($name) {
                case 'direccion':
                    return $this->direccion;
                case 'provincia':
                    return $this->provincia;
                case 'ciudad':
                    return $this->ciudad;
                default:
                    return parent::__get($name);
            }
        }

        public function __set($name, $value)
        {
            switch($name) {
                case 'direccion':
                    $this->direccion = $value;
                break;
                case 'provincia':
                    $this->provincia = $value;
                break;
                case 'ciudad':
                    $this->ciudad = $value;
                break;
            }
        }

        public function __toString()
        {
            return "Dirección: " . $this->__get("direccion") . "Provincia: " . $this->__get("provincia") . "Ciudad: " . $this->__get("ciudad");
        }
    }
?>