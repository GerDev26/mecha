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

            $this->render("new", "form");
        }
    }

?>