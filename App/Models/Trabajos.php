<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Trabajos extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "TRABAJOS", $connection);
        }
        public function hola(){
            echo "Soy la clase Page";
        }
    }
?>