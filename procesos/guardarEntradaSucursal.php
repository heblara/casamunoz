<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$tempo=new CasaMunoz;
$temporada=array($txtNombre,$txtFechaIni, $txtFechaFin);
//print_r($empleado);
if($tempo->registrar_temporada($temporada)){
	$consUltimaTemp=$tempo->consultar_ultima_temporada();
	$resUltimaTemp=$consUltimaTemp->fetch(PDO::FETCH_OBJ);
	$temp=$resUltimaTemp->last_id;
	//echo count($seleccion);
	//print_r($seleccion);
	for($i=0;$i<count($seleccion);$i++){ //Este for recorre el arreglo materia, que va desde 0 (cero) hasta el total de materias que se tengan seleccionadas
		//echo "<br />".$i;
		//echo $seleccion[$i];
		$sucursal=array($seleccion[$i],$temp);
	    $guardarsucursaltemporada=$tempo->guardar_sucursal_temporada($sucursal);
	}
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
