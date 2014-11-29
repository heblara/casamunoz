<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['valor'])){
	$objeto=new Casamunoz;
	$valor=$_GET['valor'];
	$consCliente=$objeto->consultar_servicio($valor);
	if($consCliente->rowCount()){
		echo "<table width='100%' style='font-size:12pt;'>
            <tr style='background:white;'>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Descuento</th>
              <th>Total</th>
            </tr>
            ";
		$i=0;	
		while($resCliente=$consCliente->fetch(PDO::FETCH_OBJ)){
			echo "<tr style='background:white;'>
              <td>".$resCliente->nom_servicio."</td>
              <td>".$resCliente->precio_Costo."</td>
              <td>".$descuento."</td>
              <td>".$resCliente->precio_Costo - $descuento."</td>
            </tr>";
			$i++;
		}
		echo "</table>";
	}else{
		echo "Su busqueda no devolvio resultados";
	}
}
?>