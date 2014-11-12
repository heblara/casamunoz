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
		<td>Dui</td>
		<td>Nit</td>
		<td>Telefono</td>
		<td>Correo</td>
		<td>Fecha Contrato</td>
		<td>Fin Contrato</td>
		<td>codigo</td>
		</tr>";
		$i=0;	
		while($resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ)){
			$i++;
			echo "<tr>
			<td>".$i."</td>
			<td>".$resEmpleado->NombreCompleto."</td>
			<td>".$resEmpleado->dui_emp."</td>
			<td>".$resEmpleado->nit_emp."</td>
			<td>".$resEmpleado->tel_fijo."</td>
			<td>".$resEmpleado->correo_emp."</td>
			<td>".$resEmpleado->fec_ini_cont."</td>
			<td>".$resEmpleado->fec_fin_cont."</td>
			<td>".$resEmpleado->cod_emp."</td>
			
			<td><a href='?mod=consultaempleado&id=".base64_encode($resEmpleado->cod_emp)."'><img src='img/edit.png' /></a></td>
			</tr>";
		}
		echo "</table>";
	}else{
		echo "Su busqueda no devolvio resultados";
	}
}
?>
