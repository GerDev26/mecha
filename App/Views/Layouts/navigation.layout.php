<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>/Assets/css/articles copy.css"> 
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>/Assets/css/navBar.css">
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>/Assets/css/body copy.css"> 
  <title>Menu</title>
</head>
<body>
  <?php 
  require_once(__DIR__ . "/resorces/navBar.php"); //Barra De Navegacion
  
  echo $content; 
  
  ?>
  <script src="<?php echo URL_PATH ?>/assets/js/modal.js"></script>
</body>
</html>