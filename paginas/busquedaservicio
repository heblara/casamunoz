<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['valor'])){
  $objeto=new CasaMunoz;
  $valor=$_GET['valor'];
  $consServicio=$objeto->consultar_servicios($valor);
  if($consServicio->rowCount()){
    echo "<table style='background-color:white;' width=100%>";
    echo "<tr>
    <td>No.</td>
    <td>Nombre</td>
        <td>Descripcion</td>
            <td>Fecha de registro</td>
                <td>Duracion</td>
                <td>Usuario que lo ingreso</td>
    </tr>";
    $i=0; 
    while($resServicio=$consServicio->fetch(PDO::FETCH_OBJ)){
      $i++;
      echo "<tr>
      <td>".$i."</td>
       <td>".$resServicio->nom_servicio."</td>
        <td>".$resServicio->desc_servicio."</td>
        <td>".$resServicio->fec_registro."</td>
        <td>".$resServicio->duracion_servicio."</td>    
    <td>".$resServicio->EMPLEADO_cod_emp."</td> 
      <td><a href='?mod=actualizarservicio&id=".base64_encode($resServicio->cod_servicio)."'><img src='img/edit.png' /></a></td>
      </tr>";
    }
    echo "</table>";
  }else{
    echo "Su busqueda no devolvio resultados";
  }
}
?>

  
