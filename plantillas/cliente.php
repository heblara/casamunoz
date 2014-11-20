<?php
date_default_timezone_set('America/El_Salvador'); 
ob_start();
session_start();
include("funciones/funciones.php");
include("seguridadCliente.php");
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Casa Mu&ntilde;oz - Al cuidado de tus pies</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.2.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
<link rel="stylesheet" type="text/css" media="all" href="css/responsive.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
</head>
<body>
<section id="container">
        <?php include("menu.php"); ?>
        <h2><img src='images/logo.png' /></h2>
        <?php include("paginas/header.php") ?>
        <?php 
                include(MODULO_PATH . "/" . $conf[$modulo]['archivo']);
        ?>
        <section id="footer">
            <br /><a href="#">Condiciones de uso</a>
        </section>
</section>
</body>
</html>
<?php
ob_end_flush();
?>