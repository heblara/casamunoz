<?php 
$id=base64_decode($_GET["id"]);
$objCliente=new CasaMunoz;
$consCliente=$objCliente->mostrar_cliente($id);
$cliente=$consCliente->fetch(PDO::FETCH_OBJ);
$codigo=generarCodigo(8);
$usuario = array($id,md5($codigo),"Activo","4");
if($objCliente->guardar_usuario($usuario)){
	$nombre=$cliente->primer_nom." ".$cliente->segundo_nom." ".$cliente->primer_ape." ".$cliente->segundo_ape;
	echo "<br /><br /><br /><h1>La cuenta del cliente ".$nombre." ha sido creada en el sistema, los datos de acceso son:<br /><br />Usuario: ".$id."</h1>";
	echo "<h1>Contrase&ntilde;a: ".$codigo."</h1>";
}else{
	echo "Error al crear el usuario";
}
?>