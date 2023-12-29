<?php
class Orm{
    protected $id;
    protected $table;
    protected $db;

    public function __construct($id, $table, PDO $connection){
        $this->id = $id;
        $this->table = $table;
        $this->db = $connection;
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
        $sql .= " WHERE id = :id ";
        $stm = $this->db->prepare($sql);

        foreach ($datos as $key => $value) {
            $stm->bindValue(":{$key}", $value);
        }

        $stm->bindValue(":id", $id);      
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