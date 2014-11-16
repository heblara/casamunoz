<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$obj=new CasaMunoz;
//print_r($empleado);
for ($i=0;$i<count($txtProducto);$i++){	
	if($txtCantidadEntrega[$i] > $txtExistencia[$i]){
		//echo $txtCantidadEntrega[$i]."- ".$txtExistencia[$i]."<br />";
		$respuesta->mensaje = 3;
	}else{
		$salida=array($txtProducto[$i],$txtCantidadEntrega[$i],$lstEmpleadoSucursal,$_SESSION['sucursal']);
		print_r($salida);
		if($obj->guardar_salida($salida)){
			$inventario=array($txtProducto[$i],$_SESSION['sucursal']);
			$consInventario=$obj->consultar_inventario($inventario);
			if($consInventario->rowCount()>0){
				$resInventario=$consInventario->fetch(PDO::FETCH_OBJ);
				$cantidad=IntVal($resInventario->cant_inventario)-IntVal($txtCantidadEntrega[$i]);
				//echo $cantidad;
				$invent=array($txtProducto[$i],$_SESSION['sucursal'],$cantidad);
				if($obj->actualizar_inventario($invent)){
					$respuesta->mensaje = 1;
				}else{
					$respuesta->mensaje = 2;
				}
			}
		}else{
			$respuesta->mensaje = 2;
		}
	}
}
echo json_encode($respuesta);
?>
