<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
//print_r($_POST);
//echo "<br />";
extract($_POST); //Extrae todos los elementos del array POST
$ObjEmpleado=new CasaMunoz;
$servicio=array($txtcodigo,$txtNombre,$message,$txtDuracion,$txtprecio);
//print_r($empleado);
if($ObjEmpleado->actualizar_servicio($servicio)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>on_encode($respuesta);
?>
	
