<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$objReserva=new CasaMunoz;
$reserva=array($txtCliente,$_SESSION["sucursal"],$lstServicios,$rdSeleccionar);
//print_r($reserva);
if($objReserva->registrar_reserva($reserva)){
	$consUltimoID=$objReserva->consultar_ultimo_id("RESERVA","cod_rsv");
	$resID=$consUltimoID->fetch(PDO::FETCH_OBJ);
	$codrsv=$resID->last_id;
	$fecha=$txtFecha.' '.$txtHora;
	$control=array("1",$codrsv,$fecha,$hora);
	if($objReserva->guardar_control($control)){
		$consCliente=$objReserva->mostrar_cliente($_SESSION['usuario']);
		$cliente=$consCliente->fetch(PDO::FETCH_OBJ);
		//$Correo_Envio, $Nombre_Envio, $Mensaje_Envio, $Firma_Envio, $Correo_Envia, $Asunto_Mensaje,$Imagen
		$mensaje="Se ha procesado la reserva en el sistema, le solicitamos ser puntual con el horario.
		<br /><br />Su reserva ha sido creada para el dia ".date("d-m-Y",strtotime($txtFecha))." a las ".$txtHora." horas";
		//echo $mensaje;
		Enviar_Email($cliente->correo_cliente,$cliente->NombreCompleto,$mensaje,"Casa munoz","","Estado de reserva","");
		$respuesta->mensaje = 1;
	}else{
		$respuesta->mensaje = 2;
	}
}else{
	$respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
