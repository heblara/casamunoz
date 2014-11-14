<?php
include("header.php");
sleep(1);
session_start();
$respuesta = new stdClass();
extract($_POST);
//print_r($_POST);
$ObjCliente=new CasaMunoz;
$consCliente=$ObjCliente->consultar_clientes();
$mayor=0;
$codigo="";
$num=0;
$cod="";
$letraApe=substr($txtApellido1, 0,1);
$letraNom=substr($txtNombre1, 0,1);
if($consCliente->rowCount()>0){
	while($resCliente=$consCliente->fetch(PDO::FETCH_OBJ)){
		if(substr($resCliente->cod_cliente, 2,3)>$mayor){
			$mayor=substr($resCliente->cod_cliente, 2,3);
		}
	}
	$mayor++;
	if($mayor>0 && $mayor<10){
		$cod="00".$mayor;
	}else if($mayor>=10 && $mayor<100){
		$cod="0".$mayor;
	}else if($mayor>=100 && $mayor<1000){
		$cod=$mayor;
	}
}else{
	$cod="001";
}
$codigo="C-".$letraApe.$letraNom.$cod;
//$respuesta->mensaje=$codigo;
//echo "Codigo: ".$codigo;
$Cliente=array($codigo,$txtNombre1,$txtNombre2,$txtApellido1,$txtApellido2,$lstGenero,$txtFecNac,$txtTelFijo,$txtCorreo,$rdDiabetico,$txtenfer,1,$estados);
//print_r($Cliente);
if($ObjCliente->registrar_Ccliente($Cliente)){
	$consCliente=$ObjCliente->mostrar_cliente($codigo);
	//echo $consCliente->rowCount();
	if($consCliente->rowCount()>0){
		//ENVIAR CORREO AL USUARIO
		$respuesta->mensaje = 1;
	}else{
		$respuesta->mensaje = 2;
	}
}
echo json_encode($respuesta);
?>
