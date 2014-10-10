<?php
date_default_timezone_set('America/Chicago'); 
ob_start();
session_start();
include("funciones/funciones.php");
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro para el Examen de Notariado - Corte Suprema de Justicia</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.2.js"></script>
<!--<script src="js/jquery-1.8.2.js"></script>-->
</head>
<body>
<div style="min-height:0px;">
    <div id="ie6-container-wrap">
        <div id="container">
            <div id="content">
            <?php include("paginas/header.php") ?>
            <?php 
                include(MODULO_PATH . "/" . $conf[$modulo]['archivo']);
            ?>  
            </div>
      </div>
    </div>
</div>
<?php 
//if(isset($_GET["mod"])){
  //if($_GET["mod"]!="bandejaentrada"){
?>
 <?php //} }  ?>
</body>
</html>
<?php
ob_end_flush();
?>