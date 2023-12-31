<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Marcas extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "MARCAS", $connection);
        }
        public function issetMarca($busqueda){
            $stm = $this->searchBy($busqueda, "descripcion");
            $filasAfectadas = $this->rowCount();
        }
        public function saludar(){
            echo "hola";
        }
    }
?>