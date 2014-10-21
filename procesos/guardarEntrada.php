<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$obj=new CasaMunoz;
$entrada=array($lstProducto,$txtCantidadEntrega, $lstSucursal);
//print_r($empleado);
if($obj->guardar_entrada($entrada)){
	$inventario=array($lstProducto,$lstSucursal);
	$consInventario=$obj->consultar_inventario($inventario);
	if($consInventario->rowCount()>0){
		$resInventario=$consInventario->fetch(PDO::FETCH_OBJ);
		$cantidad=IntVal($txtCantidadEntrega)+IntVal($resInventario->cant_inventario);
		$invent=array($lstProducto,$lstSucursal,$cantidad);
		if($obj->actualizar_inventario($invent)){
			$respuesta->mensaje = 1;
		}else{
			$respuesta->mensaje = 2;
		}
	}else{
		$cantidad=$txtCantidadEntrega;
		$inventario=array($lstProducto,$lstSucursal,$cantidad);
		if($obj->guardar_inventario($inventario)){
			$respuesta->mensaje = 1;
		}else{
			$respuesta->mensaje = 4;
		}
	}
}else{
	$respuesta->mensaje = 3;
}
echo json_encode($respuesta);
?>
