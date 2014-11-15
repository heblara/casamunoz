
<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['valor'])){
  $objeto=new CasaMunoz;
  $valor=$_GET['valor'];
  $consReserva=$objeto->consultar_reserva($valor);
  if($consReserva->rowCount()){
    echo "<table style='background-color:white;' width=100%>";
    echo "<tr>
    <td>No.</td>
    <td>Nombre de cliente</td>
        <td>Nombre servicio</td>
            <td>Nombre de empleado</td>
			<td>Estado</td>
			<td>Fecha de reserva</td>
            
    </tr>";
    $i=0; 
    while($resReserva=$consReserva->fetch(PDO::FETCH_OBJ)){
      $i++;
      echo "<tr>
      <td>".$i."</td>
       <td>".$resReserva->cod_rsv."</td>
        <td>".$resReserva->cod_cliente."</td>
        <td>".$resReserva->cod_sucursal."</td>
        <td>".$resReserva->cod_servicio."</td>    
    <td>".$resReserva->cod_emp."</td> 
      <td><a href='?mod=actualizarreserva&id=".base64_encode($resReserva->cod_rsv)."'><img src='img/edit.png' /></a></td>
      </tr>";
    }
    echo "</table>";
  }else{
    echo "Su busqueda no devolvio resultados";
  }
}
?>

  


  
