<?php 
$objeto=new CasaMunoz;
?>
<table width="100%" style="font-size:10pt;border-color:black;" border="1">
        <caption><h1>Inventario de productos por sucursal</h1></caption>
        <tr>
          <th>No.</th>
          <th>Producto</th>
          <th>Existencia</th>
		  <th>fecha de ingreso </th>
        </tr>
        <?php 
        $i=0;
        $consultarproducto=$objeto->consultar_inventario_sucursal($_SESSION['sucursal']);
        while($producto=$consultarproducto->fetch(PDO::FETCH_OBJ))
        {
          $i++;
          echo "<tr>
            <td>$i</td>
            <td>".$producto->nom_producto."</td>
            <td>".$producto->cant_inventario."</td>
			<td>".$producto->fec_ingreso."
            <input type='hidden' name='txtExistencia[]' id='txtExistencia[]' value='".$producto->cant_inventario."' /></td>
          </tr>";
        }
        ?>
      </table>
