<?php
    class Agenda {

        public $agenda = array();

        public function anyadirContacto($contacto) {
            array_push($this->agenda, $contacto);
        }

        public function eliminarContato($id) {
            unset($this->agenda[$id]);
        }

        public function __toString()
        {
            $mensaje = "<table border><tr><th>ID</th><th>Nombre</th><th>Nombre</th>";
            $agenda = $this->agenda;
            foreach($agenda as $item) {
                $mensaje .= "<tr><td>" . $item->getId() . "</td><td>" . $item->getNombre() . "</td><td>" . $item->getTelefono() . "</td></tr>";
            }
            $mensaje .= "</table>";
            return $mensaje;
        }
    }
?>