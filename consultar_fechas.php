<?php
    require "animales.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $animales = Animales::ver_fechas($_POST["fecha_inicio"],$_POST["fecha_final"]);
        
        if ($animales) {
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