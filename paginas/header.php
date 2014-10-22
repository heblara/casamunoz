<?php 
	if(isset($_SESSION['autenticado'])){
		$cm1=new CasaMunoz;
		$sucursal="";
		$nombre="";
		$nombre1="";
		//echo "Sucursal: ".$_SESSION['sucursal'];
		$consSucursal=$cm1->consultar_sucursal_unica($_SESSION['sucursal']);
		$resSucursal=$consSucursal->fetch(PDO::FETCH_OBJ);
		$sucursal=$resSucursal->nom_sucursal;
		
		$consEmpleado=$cm1->consultar_empleado_sucursal($_SESSION['sucursal']);
		$resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ);
		$nombre=$resEmpleado->NombreCompleto;
		
		$consNombre1=$cm1->consultar_nombre1($_SESSION['nombre1']);
		$resNombre1=$consNombre1->fetch(PDO::FETCH_OBJ);
		$nombre1=$resNombre1->NombreCompleto;
		
		$consNombre2=$cm1->consultar_nombre2($_SESSION['nombre1']);
		$resNombre2=$consNombre2->fetch(PDO::FETCH_OBJ);
		$nombre2=$resNombre2->NombreCompleto;
		
		if($_SESSION['tipo']==1){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido $nombre2 (<a href='?mod=logout'>Salir</a>)<br /></p><br/><br />";
		}else if($_SESSION['tipo']==2){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido $nombre (<a href='?mod=logout'>Salir</a>)<br />Sucursal: $sucursal</p><br/><br />";
		}else if($_SESSION['tipo']==3){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido $nombre1 (<a href='?mod=logout'>Salir</a>)<br /></p><br/><br />";
		}
	}
?>
