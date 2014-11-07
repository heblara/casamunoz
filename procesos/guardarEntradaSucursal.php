<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$tempo=new CasaMunoz;
$temporada=array($txtNombre,$txtFechaIni, $txtFechaFin);
//print_r($empleado);
if($tempo->registrar_temporada($temporada)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
