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
		</tr>";
		$i=0;	
		while($resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ)){
			$i++;
			echo "<tr>
			<td>".$i."</td>
			<td>".$resEmpleado->NombreCompleto."</td>
			<td><a href='?mod=buscaremp&id=".base64_encode($resEmpleado->cod_emp)."'><img src='img/edit.png' /></a></td>
			</tr>";
		}
		echo "</table>";
	}else{
		echo "Su busqueda no devolvio resultados";
	}
}
?>