<?php
    class Equipo {
        private $nombre;
        private $jugadores = [];

        public function __construct($row)
        {
            $this->nombre = $row['nombre'];

            foreach($row['jugadores'] as $item) {
                array_push($this->jugadores, $item);
            }
        }

        public function __get($name)
        {
            switch($name) {
                case 'Nombre':
                    return $this->nombre;
                case 'Jugadores':
                    return $this->jugadores;
            }
        }

        public function estaturaMedia() {
            $estaturaTotal = 0;
            foreach($this->jugadores as $item) {
                $estaturaTotal += $item->Estatura;
            }
            $media = $estaturaTotal / count($this->jugadores);
            return $media;
        }

        public function estaturaMax() {
            $max = 0;
            $estaturaTotal = 0;
            foreach($this->jugadores as $item) {
                $estaturaTotal = $item->Estatura;
                if($estaturaTotal > $max) {
                    $max = $estaturaTotal;
                }
            }
            return $max;
        }

        public function __toString()
        {
            $mensaje = "<table border><tr><th>NOMBRE<th/><th>DORSAL<th/><th>ESTATURA<th/><th>POSICION<th/><th>STATS<th/><tr/>";
            foreach($this->jugadores as $item) {
                $mensaje .= "<tr><td>" . $item->Nombre . "<td/><td>" . $item->Dorsal . "<td/><td>" . $item->Estatura . "<td/><td>" . get_class($item) . "<td/>";
                if(get_class($item) == "Base") {
                    $mensaje .= "<td>" . $item->Asistencias . "<td/><tr/>";
                }
                else if(get_class($item) == "Escolta") {
                    $mensaje .= "<td>" . $item->Robos . "<td/><tr/>";
                }
                else if(get_class($item) == "Alapivot") {
                    $mensaje .= "<td>" . $item->Tapones . "<td/><tr/>";
                }
                else if(get_class($item) == "Alero") {
                    $mensaje .= "<td>" . $item->Puntos . "<td/><tr/>";
                }
                else if(get_class($item) == "Pivot") {
                    $mensaje .= "<td>" . $item->Rebotes . "<td/><tr/>";
                }

            }
            $mensaje .= "<tr><td>" . $this->estaturaMedia() . "<td/><td>" . $this->estaturaMax() . "<td/><tr/></table>";
            return $mensaje;
        }
    }
?>