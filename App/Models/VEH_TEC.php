<?php
require_once(__DIR__ . "/../Core/Orm.php");
    class VEH_TEC extends Orm{
        public function __construct(PDO $connection){
            parent::__construct("id", "VEH_TEC", $connection);
        }
        public function getVehTec($id){
            $sql = "SELECT TECNOLOGIAS.tecnologia
            FROM
                VEH_TEC
            JOIN
                VEHICULOS ON VEH_TEC.fkVehiculo = VEHICULOS.idVehiculos
            JOIN
                TECNOLOGIAS ON VEH_TEC.fkTecnologia = TECNOLOGIAS.idTecnologias
            WHERE
                VEHICULOS.idVehiculos = $id;";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        }
    }
?>