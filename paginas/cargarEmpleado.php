<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['sucursal'] && isset($_GET['fecha']))){
	$objeto=new CasaMunoz;
	$sucursal=$_GET['sucursal'];
	$fecha=$_GET['fecha'];
	
	$consCliente=$objeto->consultar_cliente($valor);
	if($consCliente->rowCount()){
		echo "<table style='background-color:white;' width=100%>";
		echo "<tr>
		<td>No.</td>
		<td>Nombre</td>
		</tr>";
		$i=0;	
		while($resCliente=$consCliente->fetch(PDO::FETCH_OBJ)){
			$i++;
			echo "<tr>
			<td>".$i."</td>
			<td>".$resCliente->NombreCompleto."</td>
			<td><a href='?mod=modificarcliente&id=".base64_encode($resCliente->cod_cliente)."'><img src='img/edit.png' /></a></td>
			</tr>";
		}
		echo "</table>";
	}else{
		echo "Su busqueda no devolvio resultados";
	}
}
?>