<?php 
require("dompdf/dompdf_config.inc.php");
$id=$_GET['id'];
$objeto=new Casamunoz;
$dompdf=new DOMPDF();
$consReserva=$objeto->consultar_datos_reserva($id);
if($consReserva->rowCount()>0){
	if(file_exists("reporte/reserva".$id.".pdf")){
		unlink("reporte/reserva".$id.".pdf");

	}
	$reserva=$consReserva->fetch(PDO::FETCH_OBJ);
	// include Barcode39 class 
	include "Barcode39.php"; 

	// set Barcode39 object 
	$bc = new Barcode39($id); 

	// display new barcode 
	$bc->draw("reporte/reserva".$id.".gif");
	$html="<style>
	th{
		text-align:left;
		border:1px solid;
	}
	</style>
	<h3 align='center'><img src='images/logo.jpg' /><br />INFORMACI&Oacute;N DE RESERVA</h3>
	";
	$html.="<br /><br />
	<table border='1' width='100%'>
		<tr>
			<th>N&uacute;mero de reserva:</th>
			<td>".$id."</td>
		</tr>
		<tr>
			<th>Nombre cliente:</th>
			<td>".$reserva->NombreCompletoCliente."</td>
		</tr>
		<tr>
			<th>Fecha:</th>
			<td>".$reserva->fec_estado_rsv."</td>
		</tr>
		<tr>
			<th>Hora:</th>
			<td>".$reserva->hora_rsv."</td>
		</tr>
		<tr>
			<th>Sucursal:</th>
			<td>".$reserva->nom_sucursal."</td>
		</tr>
		<tr>
			<th>Pedicurista asignado:</th>
			<td>".$reserva->NombreCompletoEmpleado."</td>
		</tr>
		<tr>
			<th>Estado:</th>
			<td>".$reserva->estado_rsv."</td>
		</tr>
		<tr>
			<td colspan='2' align='center'><img src='reporte/reserva".$id.".gif' /></td>
		</tr>
	</table>";
	//echo $html;
	$html=$html."<hr />".$html;
	$dompdf = new DOMPDF();
	//$dompdf->set_paper("Letter", "portrait");
	@$dompdf->load_html($html);
	@$dompdf->render();

	// The next call will store the entire PDF as a string in $pdf

	@$pdf = $dompdf->output();

	// You can now write $pdf to disk, store it in a database or stream it
	// to the client.

	file_put_contents("reporte/reserva".$id.".pdf", $pdf);
	echo "<iframe src='reporte/reserva".$id.".pdf' width='100%' height='500px' />";
}else{
	echo "<h3><Reserva no encontrada</h3>";
}
?>