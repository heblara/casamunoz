<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$prod=new CasaMunoz;
$producto=array($txtNombreProducto,$txtNombre1);
//print_r($empleado);
if($prod->registrar_producto($producto)){
	$respuesta->mensaje = 1;
}
echo json_encode($respuesta);
?>