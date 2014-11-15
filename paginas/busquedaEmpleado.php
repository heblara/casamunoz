<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['valor'])){
	$objeto=new CasaMunoz;
	$valor=$_GET['valor'];
	$consEmpleado=$objeto->consultar_empleado($valor);
	if($consEmpleado->rowCount()){
		echo "<table style='background-color:white;' width=100%>";
		echo "<tr>
		<td>No.</td>
		<td>Nombre</td>
		<td>DUI</td>
		<td>NIT</td>
		<td>Codigo</td>
		<td>Opcion</td>
		</tr>";
		$i=0;	
		while($resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ)){
			$i++;
			echo "<tr>
			<td>".$i."</td>
			<td>".$resEmpleado->NombreCompleto."</td>
			<td>".$resEmpleado->dui_emp."</td>
			<td>".$resEmpleado->nit_emp."</td>
			<td>".$resEmpleado->cod_emp."</td>
			<td><a href='?mod=consultaempleado&id=".base64_encode($resEmpleado->cod_emp)."'><img src='img/edit.png' /></a>
			";
			if($resEmpleado->cod_cargo==1 || $resEmpleado->cod_cargo==3){
				echo "<a href='?mod=usuarioempleado&id=".base64_encode($resEmpleado->cod_emp)."'><img src='images/user.png' />";
			}
			echo "
			</td>
			</tr>";
		}
		echo "</table>";
	}else{
		echo "Su busqueda no devolvio resultados";
	}
}
?>
