<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class VEH_TEC extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "VEH_TEC", $connection);
        }
        public function hola(){
            echo "Soy la clase Page";
        }
    }
?>