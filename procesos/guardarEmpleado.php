<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$empleado=array($txtNombre1,$txtNombre2,$txtApellido1,$txtApellido2,$txtDUI,$txtNIT,$lstGenero,$txtFecNac,$lstCargo,$lstSucursal,$paises,$estados,$message,$txtTelFijo,$txtTelMovil,$txtCorreo,$lstCubiculo,$txtFecIni,$txtFecFin);
//$respuesta->mensaje = "1";
echo json_encode($respuesta);
?>