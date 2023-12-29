<?php
    require_once(__DIR__ . "/../Core/Orm.php");
    class Product extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "PRODUCTOS", $connection);
        }
    }
?>