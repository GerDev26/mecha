<?php

    class TecnologyController extends Controller{
        public function __construct(PDO $conection){
            $this->dir="/tecnology/";
        }
        public function new(){
            $database = new Database();
            $conection = $database->getConnection();

            $this->includeClass([
                "Tecnologias"
            ]);

            $tecnologia = new Tecnologias($conection);

            $tecnologia->insert([
                "tecnologia" => $_POST["tecnologia"]
            ]);

            header("Location: ../vehicles/new");
        }
    }

?>