<?php 
$id=base64_decode($_GET["id"]);
$objCliente=new CasaMunoz;
$consCliente=$objCliente->mostrar_cliente($id);
$cliente=$consCliente->fetch(PDO::FETCH_OBJ);
$codigo=generarCodigo(8);
$usuario = array($id,md5($codigo),"Activo","3");
if($objCliente->guardar_usuario($usuario)){
	$consId=$objCliente->consultar_ultimo_usuario();
	$resId=$consId->fetch(PDO::FETCH_OBJ);
	//echo $resId->last_id."- ".$id;
	$objCliente->actualizar_usuario_cliente($resId->last_id,$id);
	$nombre=$cliente->primer_nom." ".$cliente->segundo_nom." ".$cliente->primer_ape." ".$cliente->segundo_ape;
	echo "<br /><br /><br /><h1>La cuenta del cliente ".$nombre." ha sido creada en el sistema, los datos de acceso son:<br /><br />Usuario: ".$id."</h1>";
	echo "<h1>Contrase&ntilde;a: ".$codigo."</h1>";
}else{
	echo "Error al crear el usuario";
}
?>