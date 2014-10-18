<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$ObjEmpleado=new CasaMunoz;
$consEmpleado=$ObjEmpleado->consultar_empleados();
$mayor=0;
$codigo="";
$num=0;
$letraApe=substr($txtApellido1, 0,1);
$letraNom=substr($txtNombre1, 0,1);
if($consEmpleado->rowCount()>0){
	while($resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ)){
		if(substr($resEmpleado->cod_emp, 2,6)>$mayor){
			$mayor=substr($resEmpleado->cod_emp, 2,6);
		}
	}
	$mayor++;
	$codigo=$letraApe+$letraNom+$mayor;
}else{
	$codigo=$letraApe.$letraNom."00001";
}
$empleado=array($codigo,$txtNombre1,$txtNombre2,$txtApellido1,$txtApellido2,$txtDUI,$txtNIT,$lstGenero,$txtFecNac,$txtTelFijo,$txtTelMovil,$txtCorreo,$txtDireccion,"A",$txtFecIni,$txtFecFin,$lstCargo,$lstCubiculo,$estados,$codigo,$lstSucursal);
if($ObjEmpleado->registrar_empleado($empleado)){
	$consEmpleado=$ObjEmpleado->consultar_empleado($codigo);
	if($consEmpleado->rowCount()>0){
		$respuesta->mensaje = 2;
	}else{
		$respuesta->mensaje = 1;
	}
}
echo json_encode($respuesta);
?>