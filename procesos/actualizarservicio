<?php
include("header.php");
sleep(1);
session_start();

//echo "Sucursal: ".$_SESSION['sucursal'];
$respuesta = new stdClass();
extract($_POST)
$ObjServicio=new CasaMunoz;
$servicio=array($txtcodigo,$txtNombre,$message,$txtFechaRegistro,$txtDuracion,"1",$costo,$_SESSION['usuario']);

print_r($servicio);
if($ObjServicio->actualizar_servicio($servicio)){
		$respuesta->mensaje = 1;
	}else{
		$respuesta->mensaje = 2;
	}
echo json_encode($respuesta);
?>
