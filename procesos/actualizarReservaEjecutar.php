<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
$objeto=new CasaMunoz;
if($objeto->actualizar_estado_reservado($idReserva)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>

