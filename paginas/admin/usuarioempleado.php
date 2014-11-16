<?php 
$id=base64_decode($_GET["id"]);
$objEmp=new CasaMunoz;
$consEmp=$objEmp->mostrar_empleado($id);
$empleado=$consEmp->fetch(PDO::FETCH_OBJ);
$codigo=generarCodigo(8);
$usuario = array($id,md5($codigo),"Activo","2");
if($objEmp->guardar_usuario($usuario)){
	$consId=$objEmp->consultar_ultimo_usuario();
	$resId=$consId->fetch(PDO::FETCH_OBJ);
	//echo $resId->last_id."- ".$id;
	$objEmp->actualizar_usuario_empleado($resId->last_id,$id);
	$nombre=$empleado->primer_nom." ".$empleado->segundo_nom." ".$empleado->primer_ape." ".$empleado->segundo_ape;
	echo "<br /><br /><br /><h1>La cuenta del empleado ".$nombre." ha sido creada en el sistema, los datos de acceso son:<br /><br />Usuario: ".$id."</h1>";
	echo "<h1>Contrase&ntilde;a: ".$codigo."</h1>";
}else{
	echo "Error al crear el usuario";
}
?>