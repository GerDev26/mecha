<?php
$folderPath = dirname($_SERVER['SCRIPT_NAME']);
$urlPath = $_SERVER['REQUEST_URI'];
$url = substr($urlPath, strlen($folderPath));
define("URL", $url); //Page/listar
define("URL_PATH", $folderPath); //nuevoMVC/Public
?>