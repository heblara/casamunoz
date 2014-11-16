<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$prod=new CasaMunoz;
$sucursal=array($txtNombre,$txtDireccion, $txtTelefono,$txtCorreo,$estados);
//print_r($empleado);
if($prod->registrar_sucursal($sucursal)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
