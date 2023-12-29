<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class User extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "USUARIOS", $connection);
        }
    }
?>