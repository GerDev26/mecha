<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Localidades extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "LOCALIDADES", $connection);
        }
        public function hola(){
            echo "Soy la clase Page";
        }
    }
?>