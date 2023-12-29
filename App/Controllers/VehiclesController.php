<?php
    class VehiclesController extends Controller{
        public function __construct(PDO $conection){
            $this->dir="/vehicles/";
        }
        public function list(){
            $this->render("vehiclesList", "navigation");
        }
        public function login(){
            $this->render("login", "login");
        }

        public function newUser(){
            $this->render("newUser", "index");
        }
    }

?>