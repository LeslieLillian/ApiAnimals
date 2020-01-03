<?php
    require "conexion.php";

    class Animales
    {
        function __construct()
        {
            
        }
        public static function ver_todos()
        {
            $consulta = "SELECT * FROM gatos";
            try {
                $comando = ConexionMySQL::conectaDb()->prepare($consulta);
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return false;
            }
        }

        public static function ver_fechas($fecha_inicio, $fecha_final)
        {
                $consulta = "SELECT * FROM gatos WHERE Fecha BETWEEN ? and ?";
            try {
                $comando = ConexionMySQL::conectaDb()->prepare($consulta);
                $comando->execute(array(
                    $fecha_inicio,
                    $fecha_final
                ));
                return $comando->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return false;
            }
        }

        public static function insertar($arreglo)
        {
            $consulta = "INSERT INTO gatos2 (Nombre, Tipo, Fecha) VALUES (?, ?, ?)";
            try{
                $Array = json_decode($arreglo);
                foreach ($Array->animal as $key => $value) {
                    $comando = ConexionMySQL::conectaDb()->prepare($consulta);
                    $comando->execute(array(
                        $value->Nombre,
                        $value->Tipo,
                        $value->Fecha
                    ));
                }
                return [true];
            } catch (PDOException $e) {
                return [false, $e];
            }
        }
    }
?>