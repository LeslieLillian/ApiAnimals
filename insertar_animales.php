<?php
    require "animales.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $animales = Animales::insertar($_POST["arreglo"]);

        if ($animales[0] == true) {
            $datos["estado"] = 1;
            $datos["animal"] = true;
            print json_encode($datos);
        } else {
            print json_encode(array(
                "estado" => 2,
                "mensaje" => "Ha ocurrido un error: " .$animales[1]
            ));
        }
    }
?>