<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class Tecnologias extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "TECNOLOGIAS", $connection);
        }
        public function getTecDifference($tecnologias = []) {
            $placeholders="";
            foreach ($tecnologias as $key) {
                $placeholders .= "'". $key['tecnologia']. "', ";
            }
            $placeholders = trim($placeholders, ", ");
            
            $sql = "SELECT *
                    FROM $this->table
                    WHERE tecnologia NOT IN ($placeholders);";

            echo $sql;
            
            $stm = $this->db->prepare($sql);
            $stm->execute();
            
            return $stm->fetchAll();
        }
    }
?>