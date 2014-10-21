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
$cod="";
$letraApe=substr($txtApellido1, 0,1);
$letraNom=substr($txtNombre1, 0,1);
if($consEmpleado->rowCount()>0){
	while($resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ)){
		if(substr($resEmpleado->cod_emp, 2,3)>$mayor){
			$mayor=substr($resEmpleado->cod_emp, 2,3);
		}
	}
	$mayor++;
	if($mayor>0 && $mayor<10){
		$cod="00".$mayor;
	}else if($mayor>=10 && $mayor<100){
		$cod="0".$mayor;
	}else if($mayor>=100 && $mayor<1000){
		$cod=$mayor;
	}
}else{
	$cod="001";
}
$codigo=$letraApe.$letraNom.$cod;
//$respuesta->mensaje=$codigo;
//echo "Codigo: ".$codigo;
$empleado=array($codigo,$txtNombre1,$txtNombre2,$txtApellido1,$txtApellido2,$txtDUI,$txtNIT,$lstGenero,$txtFecNac,$txtTelFijo,$txtTelMovil,$txtCorreo,$txtDireccion,"A",$txtFecIni,$txtFecFin,$lstCargo,$estados,$lstSucursal);
//print_r($empleado);
if($ObjEmpleado->registrar_empleado($empleado)){
	$conEmpleado=$ObjEmpleado->mostrar_empleado($codigo);
	//echo $conEmpleado->rowCount();
	if($conEmpleado->rowCount()>0){
		$respuesta->mensaje = 1;
	}else{
		$respuesta->mensaje = 2;
	}
}
echo json_encode($respuesta);
?>