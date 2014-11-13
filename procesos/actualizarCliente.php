<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
//print_r($_POST);
//echo "<br />";
extract($_POST); //Extrae todos los elementos del array POST
$ObjCliente=new CasaMunoz;
$cliente=array($txtCodigo,$txtNombre1,$txtNombre2,$txtApellido1,$txtApellido2,$txtFecNac,
	$estados,$txtTelFijo,$txtCorreo,$rdDiabetico,$txtenfer);
//print_r($empleado);
if($ObjCliente->actualizar_cliente($cliente)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
