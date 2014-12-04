<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$factura=new CasaMunoz;
$ResFactura=array($txtNoFact, $rdSeleccionar, $_SESSION['sucursal']);
//print_r($Resfactura);
if($factura->guardar_factura($ResFactura)){
		$detallefactura=array($txtCantidad,$txtDescuento,$txtTotal,$txtNoFact,$txtServicio,1);
		if($factura->guardar_detalle_factura($detallefactura)){
			$factura->actualizar_estado_reserva($rdSeleccionar);
        	$respuesta->mensaje = 1;
		}
}else{
        $respuesta->mensaje = 2;
}
echo json_encode($respuesta);
?>
