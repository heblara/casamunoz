<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$ofer=new CasaMunoz;
$oferta=array($txtNombre,$message, $txtFechaRegistro, $txtFecLimite, $txtDescuento, $lstServicio);
//print_r($empleado);
if($ofer->registrar_oferta($oferta)){
	$consUltimaOfer=$ofer->consultar_ultima_oferta();
	$resUltimaOfer=$consUltimaOfer->fetch(PDO::FETCH_OBJ);
	$offer=$resUltimaOfer->last_id;
	
	for($i=0;$i<count($seleccion);$i++){ //Este for recorre el arreglo materia, que va desde 0 (cero) hasta el total de materias que se tengan seleccionadas
		$sucursal=array($seleccion[$i],$offer);
		$guardarsucursaloferta=$ofer->guardar_oferta_sucursal($sucursal);
	}
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
