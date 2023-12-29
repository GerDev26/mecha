<?php

class Controller{

    protected $dir="";

    protected function render($path, $layout = ""){
        $this->dir .= $path;
        ob_start();
        require_once(__DIR__ . "/../Views/$this->dir.view.php");
        $content = ob_get_clean();
        
        require_once(__DIR__ . "/../Views/layouts/". $layout .".layout.php");

    }
}

?>