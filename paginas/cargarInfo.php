<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['valor'])){
	$objeto=new Casamunoz;
	$valor=$_GET['valor'];
	//echo $valor;
	$descuento=$_GET['desc'];
	$cantidad=1;
	$consCliente=$objeto->consultar_reserva_servicio($valor);
	if($consCliente->rowCount()){
		//echo $consCliente->rowCount();
		echo "<table border='1' width='100%' style='font-size:12pt;border:1px solid;'>
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
			//echo "Hola";
			//echo $resCliente->nom_servicio."- ".$resCliente->precio_Costo;
			?><tr style='background:white;text-align:center;'>
              <td><?php echo $resCliente->nom_servicio ?></td>
              <td><input type='text' id='txtCantidad' name='txtCantidad' value='<?php echo $cantidad ?>' onchange='calcular(this.value)' ></td>
              <td><input type='text' id='txtPrecio' name='txtPrecio' value='<?php echo $resCliente->precio_Costo ?>' ></td>
              <td><input type='text' id='txtDescuento' name='txtDescuento' value='<?php echo $descuento ?>' >
              <input type='hidden' id='txtServicio' name='txtServicio' value='<?php echo $resCliente->cod_servicio ?>' >
              </td>
              <td><input type='text' id='txtTotal' name='txtTotal' value='<?php echo $resCliente->precio_Costo - ($resCliente->precio_Costo*$descuento) ?>' ></td>
            </tr>
            <?php
			$i++;
		}
		echo "</table>";
	}else{
		echo "Su busqueda no devolvio resultados";
	}
}
?>