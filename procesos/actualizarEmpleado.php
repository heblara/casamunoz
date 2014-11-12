<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
//print_r($_POST);
//echo "<br />";
extract($_POST); //Extrae todos los elementos del array POST
$ObjEmpleado=new CasaMunoz;
$empleado=array($txtCodigo,$txtPrimerNombre,$txtSegundoNombre,$txtPrimerApellido,$txtSegundoApellido,$txtDUI,$txtNIT,
	$txtFecNac,$txtTelFijo,$txtTelMovil,$txtCorreo,$message,$lstEstado,$lstCargo,$estados,
	$lstSucursal);
//print_r($empleado);
if($ObjEmpleado->actualizar_empleado($empleado)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>