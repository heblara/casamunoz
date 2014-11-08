<?php
include("header.php");
sleep(1);
session_start();
$cm=new CasaMunoz;
//echo "Sucursal: ".$_SESSION['sucursal'];
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$ser=new CasaMunoz;
if($cm->registrar_costo($txtprecio)){
	//echo "Entra a costo";
	$consUltimoID=$cm->consultar_ultimo_costo();
	$resID=$consUltimoID->fetch(PDO::FETCH_OBJ);
	$costo=0;
	/*if($consUltimoID->rowCount()==0){
		$costo=1;
	}else{
		
	}*/
	$costo=$resID->last_id;
	echo $_SESSION['empleado'];
	$servicio=array($txtNombre,$message,$txtFechaRegistro,$txtDuracion,"1",$costo,$_SESSION['usuario']);
	//print_r($servicio);

	if($ser->registrar_servicio($servicio)){
		$consUltimoServicio=$cm->consultar_ultimo_servicio();
		$resUltimoServicio=$consUltimoServicio->fetch(PDO::FETCH_OBJ);
		$servicio=$resUltimoServicio->last_id;
		//print_r($seleccion);
		for($i=0;$i<count($seleccion);$i++){ //Este for recorre el arreglo materia, que va desde 0 (cero) hasta el total de materias que se tengan seleccionadas
			$sucursal=array($seleccion[$i],$servicio);
		    $guardarsucursalservicio=$cm->guardar_sucursal_servicio($sucursal);
		}
		$respuesta->mensaje = 1;
	}else{
		$respuesta->mensaje = 2;
	}
}
echo json_encode($respuesta);
?>