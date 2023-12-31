<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Usuarios extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "USUARIOS", $connection);
        }
        public function hola(){
            echo "Soy la clase Page";
        }
    }
?>