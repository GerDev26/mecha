<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class VEH_TEC extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "VEH_TEC", $connection);
        }
        public function getVehTec($id, $tabla){
            $sql = "SELECT TECNOLOGIAS.tecnologia, TECNOLOGIAS.idTecnologias
            FROM
                $this->table
            JOIN
                VEHICULOS ON VEH_TEC.fkVehiculo = VEHICULOS.idVehiculos
            JOIN
                TECNOLOGIAS ON VEH_TEC.fkTecnologia = TECNOLOGIAS.idTecnologias
            WHERE
                $tabla.id$tabla = $id;";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        }

        public function deleteTecnologyAsociated($vehId, $tecIds){
            $placeholders = "";
            foreach ($tecIds as $key) {
                $placeholders .= $key . ", ";
            }
            $placeholders = trim($placeholders,  ", ");

            $sql = "SELECT * 
                    FROM {$this->table} 
                    WHERE fktecnologia IN ($placeholders)
                    AND fkvehiculo = $vehId";
                    
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $vehtec = $stm->fetchAll();
            foreach ($vehtec as $key) {
                $this->deleteById($key["idVEH_TEC"]);
            }

        }
    }
?>