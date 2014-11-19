<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['valor'])){
	$objeto=new CasaMunoz;
	$valor=$_GET['valor'];
	$consCliente=$objeto->consultar_expediente($valor);
	if($consCliente->rowCount()){
		echo "<table style='background-color:white;' width=100%>";
		echo "<tr>
		<td>No.</td>
		<td>Nombre cliente</td>
		<td>Sucursal</td>
		<td>Fecha</td>
		<td>Hora</td>
		<td>Pedicurista</td>
		<td>Servicio</td>
		<td>Diabético</td>
		</tr>";
		$i=0;	
		while($resCliente=$consCliente->fetch(PDO::FETCH_OBJ)){
			$i++;
			echo "<tr>
			<td>".$i."</td>
			<td>".$resCliente->NombreCompletoCliente."</td>
			<td>".$resCliente->nom_sucursal."</td>
			<td>".$resCliente->fec_estado_rsv."</td>
			<td>".$resCliente->hora_rsv."</td>
			<td>".$resCliente->NombreCompletoEmpleado."</td>
			<td>".$resCliente->nom_servicio."</td>
			<td>".$resCliente->diabetico_cliente."</td>
			</tr>";
		}
		echo "</table>";
	}else{
		echo "Su busqueda no devolvio resultados";
	}
}
?>