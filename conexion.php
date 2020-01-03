<?php
    class ConexionMySQL{
        public static function conectaDb()
        {
            try {
                $mbd = new PDO('mysql:host=localhost:3306;dbname=animales',"root","");
                $mbd->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
                return $mbd;

            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }
?>