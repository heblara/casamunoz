<?php 
require("../dompdf/dompdf_config.inc.php");
$dompdf=new DOMPDF();

include("funciones.php");
if(isset($_GET['fecha']) && isset($_GET['sucursal'])){
    $sucursal=$_GET['sucursal'];
    $fecha=$_GET['fecha'];
    if(file_exists("../reporte/ventas".$sucursal."-".$fecha.".pdf")){
        unlink("../reporte/ventas".$sucursal."-".$fecha.".pdf");
    }
    /*echo $sucursal;
    echo $fecha;*/
    $objeto=new Casamunoz;
    $consVentas=$objeto->consultar_reporte_ventas($sucursal,$fecha);
    //echo $consVentas->rowCount();
?>
    <?php
    $html="
    <style>
    th{
        text-align:center;
        border:1px solid;
    }
    td{
        text-align:left;
        border:1px solid;
    }
    h3{
        text-align:center;
        /*border:1px solid;*/
    }
    .header{
        border:0px;
    }
    </style>
    <h3 align='center'><img src='../images/logo.jpg' /><br />REPORTE DE VENTAS DIARIAS</h3>
    <link href='estilos.css' rel='stylesheet' />
    <table width='100%' style='font-size:12pt;'>";
    $i=0;
    $total=0;
    while ($resVentas=$consVentas->fetch(PDO::FETCH_OBJ)) {
        if($i==0){
            $html.="
            <tr>
                <td colspan='2' class='header'>Fecha: $fecha</td>
                <td colspan='2' class='header'>Nombre sucursal: $resVentas->nom_sucursal</td>
            </tr>
            <tr style='background:white;'>
                <th>No Fact</th>
                <th>Pedicurista</th>
                <th>Descripcion del servicio</th>
                <th>Monto</th>
            </tr>";
        }
        $total=$total+$resVentas->precio_Costo;
    $html.="
        <tr style='background:silver;'>
            <td>$resVentas->num_factura</td>
            <td>$resVentas->NombreCompletoCliente</td>
            <td>$resVentas->nom_servicio</td>
            <td>$$resVentas->precio_Costo</td>
            <td>$resVentas->NombreCompletoEmpleado</td>
        </tr>";
    }
    $html.="<tr><td>Total del d&iacute;a: $".$total."</td></tr>";
$html.="</table>";
//echo $html;
@$dompdf->load_html($html);
$dompdf->set_paper("letter","landscape");
@$dompdf->render();

// The next call will store the entire PDF as a string in $pdf

@$pdf = $dompdf->output();

// You can now write $pdf to disk, store it in a database or stream it
// to the client.
//echo $html;
file_put_contents("../reporte/ventas".$sucursal."-".$fecha.".pdf", $pdf);
    echo "<iframe src='reporte/ventas".$sucursal."-".$fecha.".pdf' width='100%' height='500px' />";
}
?>