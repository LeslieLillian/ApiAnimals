<?php
    require "animales.php";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $animales = Animales::ver_todos();

        if($animales) {
            $datos["estado"] = 1;
            $datos["animal"] = $animales;
            print json_encode($datos);
        } else {
            print json_encode(array(
                "estado" => 2,
                "mensaje" => "Ha ocurrido un error"
            ));
        }
    
    }
?>