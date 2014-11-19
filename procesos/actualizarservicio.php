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
	for($i=0;$i<count($seleccion);$i++){ //Este for recorre el arreglo materia, que va desde 0 (cero) hasta el total de materias que se tengan seleccionadas
			$sucursal=array($seleccion[$i],$txtcodigo);
		    $guardarsucursalservicio=$ObjEmpleado->guardar_sucursal_servicio($sucursal);
		}
	$respuesta->mensaje = 1;
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>on_encode($respuesta);
?>
	
