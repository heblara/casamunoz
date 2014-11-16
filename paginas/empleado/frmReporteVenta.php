<?php
sleep(1);
?>

<script type='text/javascript'>
function goBack()
{
//window.history.back()
}
</script> 
<?php 
@session_start();
$objeto=new CasaMunoz;
      $consultarServicios=$objeto->consultar_servicios_dia();
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarServicios->rowCount();
if($consultarServicios->rowCount()){
  $html="";
    $html.= "<table style='background-color:white;' width=100%>";
    $html.= "<tr>
    <td>No.</td>
    <td>Nombre de Servicio</td>
    <td>Fecha del Servicio</td>
    <td>Nombre de Pedicurista</td>
    </tr>";
    $i=0; 
    while($reporte=$consultarServicios->fetch(PDO::FETCH_OBJ)){
      $i++;
      
    $control=$reporte->EMPLEADO_cod_emp;
    $consultarEmpleado=$objeto->consultar_empleado_reporte($control);
    $reporte2=$consultarEmpleado->fetch(PDO::FETCH_OBJ);
      $html.= "<tr>
      <td>".$i."</td>
      <td>".$reporte->nom_servicio."</td>
      <td>".$reporte->fec_registro."</td>
      <td>".$reporte2->NombreCompleto."</td>";

      $html.= "
      </td>
      </tr>";
    }
   } 
    $html.= "</table>";
    ?>
    <?php 
echo $html;
require_once("dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$pdf=$dompdf->output();
//chmod(777,"reporte/");
file_put_contents("reporte/reporte.pdf", $pdf);
?>
<iframe src="reporte/reporte.pdf" width="100%" height="500px"></iframe>
