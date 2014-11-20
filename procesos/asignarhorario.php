<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$obj=new CasaMunoz;
$horario=array($txtHoraA,$txtHoraC,$lstDia);
//print_r($empleado);
if($obj->insertar_horario($horario)){
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
