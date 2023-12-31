<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Tecnologias extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "TECNOLOGIAS", $connection);
        }
        public function hola(){
            echo "Soy la clase Page";
        }
    }
?>