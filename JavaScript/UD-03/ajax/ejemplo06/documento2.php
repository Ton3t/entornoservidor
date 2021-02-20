<?php

   $pp=["menu_almuerzo"=>["comida"=>[["nombre"=>"Waffles","precio"=>"$2.00","descripcion"=>"Waffles baratos de McDonalds","calorias"=>650],
                                     ["nombre"=>"Hamburguesa","precio"=>"$5.00","descripcion"=>"La hamburguesa mas comun de McDonalds","calorias"=>1500]
                                    ]
                         ]
       ]; 

echo json_encode($pp);

?>

