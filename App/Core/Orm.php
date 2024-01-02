<?php
class Orm{
    protected $table;
    protected $db;

    public function __construct($id, $table, PDO $connection){
        $this->id = $id;
        $this->table = $table;
        $this->db = $connection;
    }

    public function getAllJoin($tableJoin, $fk){
        $stm = $this->db->prepare("SELECT * FROM $this->table JOIN $tableJoin ON $this->table.$fk = $tableJoin.id$tableJoin;");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function getAllActiveJoin($tableJoin, $fk){
        $stm = $this->db->prepare("SELECT * FROM $this->table JOIN $tableJoin ON $this->table.$fk = $tableJoin.id$tableJoin WHERE estado = 1;");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function getAllActive(){
        $stm = $this->db->prepare("SELECT * FROM $this->table WHERE estado = 1;");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function getAll(){
        $stm = $this->db->prepare("SELECT * FROM $this->table;");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function getById($id){
        $stm = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = {$id}");
        $stm->execute();
        return $stm->fetch();
    }

    public function getByIdJoin($tableJoin, $fk, $id){
        $stm = $this->db->prepare("SELECT * FROM $this->table JOIN $tableJoin ON $this->table.$fk = $tableJoin.id$tableJoin WHERE idVehiculos = $id;");
        $stm->execute();
        return $stm->fetch();
    }

    public function searchLike($busqueda, $campo){
        if(is_string($busqueda)){
            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE $campo LIKE '%$busqueda%'");
        }
        else{
            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE $campo LIKE $busqueda;");
        }
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function searchBy($busqueda, $campo){
        if(is_string($busqueda)){
            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE $campo = '$busqueda'");
        }
        else{
            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE $campo = $busqueda");
        }
        $stm->execute();
        return $stm->fetchAll();
    }

    public function issetRows($busqueda, $campo){
        if(is_string($busqueda)){
            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE $campo = '$busqueda'");
        }
        else{
            $stm = $this->db->prepare("SELECT * FROM $this->table WHERE $campo = $busqueda");
        }
        $stm->execute();

        if($stm->rowCount()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteById($id){
        $stm = $this->db->prepare("DELETE FROM {$this->table} WHERE id = {$id};");
        $stm->execute();
    }
    public function updateById($id, $datos) {
        $sql = "UPDATE {$this->table} SET ";
        foreach ($datos as $key => $value) {
            $sql .= "{$key} = :{$key},";
        }
        $sql = trim($sql, ',');
        $sql .= " WHERE id$this->table = :id$this->table ";
        $stm = $this->db->prepare($sql);

        foreach ($datos as $key => $value) {
            $stm->bindValue(":{$key}", $value);
        }

        $stm->bindValue(":id$this->table", $id);      
        $stm->execute();
    }

    public function insert($datos){
        $sql = "INSERT INTO {$this->table} (";
        foreach ($datos as $key => $value) {
            $sql .= "{$key}, ";
        }
        $sql = trim($sql, ", ");
        $sql .= ") VALUES (";

        foreach ($datos as $key => $value) {
            $sql .= ":{$key}, ";
        }
        $sql = trim($sql, ", ");
        $sql .= ");";
        $stm = $this->db->prepare($sql);
        
        foreach ($datos as $key => $value) {
            $stm->bindValue(":{$key}", $value);
        }
        $stm->execute();
    }
    

}
?>