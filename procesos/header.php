<?php 
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
require_once ('../DBManager.class.php'); //Clase de Conexión a las Base de Datos
require('../casamunoz.class.php');
require("../conf.php");
require("../conexion.php");
include("../phpmailer/class.phpmailer.php");
include("../funciones/funciones.php");
?>