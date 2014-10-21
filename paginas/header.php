<?php 
	if(isset($_SESSION['autenticado'])){
		$cm1=new CasaMunoz;
		$sucursal="";
		//echo "Sucursal: ".$_SESSION['sucursal'];
		$consSucursal=$cm1->consultar_sucursal_unica($_SESSION['sucursal']);
		$resSucursal=$consSucursal->fetch(PDO::FETCH_OBJ);
		$sucursal=$resSucursal->nom_sucursal;
		if($_SESSION['tipo']==1){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido Administrador (<a href='?mod=logout'>Salir</a>)<br />Sucursal: $sucursal</p><br/><br />";
		}else if($_SESSION['tipo']==2){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido Empleado (<a href='?mod=logout'>Salir</a>)<br />Sucursal: $sucursal</p><br/><br />";
		}else if($_SESSION['tipo']==3){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido Cliente (<a href='?mod=logout'>Salir</a>)<br />Sucursal: $sucursal</p><br/><br />";
		}
	}
?>
