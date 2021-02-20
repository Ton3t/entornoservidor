<?php
  $ciudades = array("Alicante", "Sella", "Orxeta", "Villajoyosa", "Finestrat", "Benidorm", "Callosa", "Altea", "Calpe", "La Nucia", "San Juan", "Campello", "Coveta Fumà", "Penaguila", "Relleu", "Alcoleja", "Barcelona", "Tarragona", "Madrid", "Caceres", "Badajoz", "Granada", "Almería", "Huelva", "Sevilla", "Malaga", "Cádiz", "Córdoba", "Segovia", "San Sebastian", "Vitoria", "Bilbao", "Coruña", "La Rioja", "Castellón", "Valencia");
  $nombre = $_POST["nombre"];
  $sugerencia = "";
  if($nombre !== "") {
      $nombre = strtolower($nombre);
      $long = strlen($nombre);

      foreach($ciudades as $nom) {
          if(stristr($nombre, substr($nom, 0, $long))) {
              if($sugerencia === "") {
                  $sugerencia = $nom;
              }
              else {
                  $sugerencia = "$sugerencia, $nom";
              }
          }
      }
  }
  echo ($sugerencia === "") ? "No hay sugerencias" : $sugerencia;
?>
