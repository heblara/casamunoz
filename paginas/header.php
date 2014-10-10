<?php 
	if(isset($_SESSION['autenticado'])){
		if($_SESSION['tipo']==1){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido Administrador (<a href='?mod=logout'>Salir</a>)</p><br/><br />";
		}else if($_SESSION['tipo']==2){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido Cliente (<a href='?mod=logout'>Salir</a>)</p><br/><br />";
		}else if($_SESSION['tipo']==3){
			echo "<p style='font-size:12pt;float:right;'>Bienvenido Empleado (<a href='?mod=logout'>Salir</a>)</p><br/><br />";
		}
	}
?>