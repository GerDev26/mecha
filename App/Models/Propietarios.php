<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Propietarios extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "PROPIETARIOS", $connection);
        }
        public function hola(){
            echo "Soy la clase Page";
        }
    }
?>