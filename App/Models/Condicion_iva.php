<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Condicion_iva extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "CONDICION_IVA", $connection);
        }
        public function hola(){
            echo "Soy la clase Page";
        }
    }
?>