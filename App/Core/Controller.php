<?php

class Controller{

    protected $dir="";

    protected function render($path, $layout = "", $variables = []){
        $this->dir .= $path;
        ob_start();
        extract($variables);
        require_once(__DIR__ . "/../Views/$this->dir.view.php");
        $content = ob_get_clean();
        
        require_once(__DIR__ . "/../Views/layouts/". $layout .".layout.php");

    }

    protected function includeClass($class = []){
        foreach ($class as $key) {
            require_once(__DIR__ . "/../Models/". $key .".php");
        }
    }

    protected function getName($name = []){
        foreach ($name as $key => $value) {
            $key=$value;
            $datos[$key]=$_POST["$value"];
        }
        return $datos;
    }

}

?>