<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$_SESSION['empleado']=$_REQUEST[''];

$ser=new CasaMunoz;
$ser=array($txtnombre,$message,$txtFechaRegistro,$txtprecio, $txtDuracion);
//print_r($empleado);
if($ser->registrar_costo($servicio)){

	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
