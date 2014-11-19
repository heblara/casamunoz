
<?php 
session_start();
include("funciones.php");
sleep(1);
if(isset($_GET['valor'])){
  $objeto=new CasaMunoz;
  $valor=$_GET['valor'];

  $consReserva=$objeto->consultar_reserva($_SESSION['sucursal']);

  if($consReserva->rowCount()){
    echo "<table style='background-color:white;' width=100%>";
    echo "<tr>
    <td>No.</td>
    <td>Nombre de cliente</td>
    <td>Nombre de empleado</td>
       <td>Nombre servicio</td>
      <td>Fecha de reserva</td>
      <td>Estado</td>
            
    </tr>";
    $i=0; 
    while($resReserva=$consReserva->fetch(PDO::FETCH_OBJ)){
      $i++;
      echo "<tr>
      <td>".$i."</td>
     
        <td>".$resReserva->NombreCompletoCliente."</td>
        <td>".$resReserva->NombreCompletoEmpleado."</td>
      <td>".$resReserva->nom_servicio."</td>    
    <td>".$resReserva->fec_estado_rsv."</td> 
   <td>".$resReserva->estado_rsv."</td>
      <td><a href='?mod=actualizarreserva&id=".base64_encode($resReserva->cod_rsv)."'><img src='img/edit.png' /></a></td>
      </tr>";
    }
    echo "</table>";
  }else{
    echo "Su busqueda no devolvio resultados";
  }
}
?>
