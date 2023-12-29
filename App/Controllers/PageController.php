<?php

    class PageController extends Controller{
        public function __construct(PDO $conection){
            $this->dir="page/";
        }
        public function home(){
            $this->render("index", "navigation");
        }
        public function login(){
            $this->render("login", "login");
        }

        public function newUser(){
            $this->render("newUser", "index");
        }
    }

?>