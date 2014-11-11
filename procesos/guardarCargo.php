<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$cargo=new CasaMunoz;
$ResCargo=array($txtNombreCargo,$txtDesc);
//print_r($empleado);
if($cargo->registrar_cargo($ResCargo)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
