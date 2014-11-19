<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['sucursal']) && isset($_GET['fecha']) && isset($_GET['serv'])){
	$objeto=new CasaMunoz;
	$sucursal=$_GET['sucursal'];
	$fecha=$_GET['fecha'];
	$servicio=$_GET['serv'];
	$fecha2=explode("-", $fecha);
	$fec=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
	//echo $fecha;
	$dia=date("w",strtotime($fecha));
	//echo "----- ".$dia;
	//echo "***** ".$dia;
	$consHorSuc=$objeto->consultar_horario_sucursal($sucursal,$dia);

	$consServ=$objeto->mostrar_servicio($servicio);
	$servicio=$consServ->fetch(PDO::FETCH_OBJ);
	echo $servicio->precio_Costo;
	$horsucu=$consHorSuc->fetch(PDO::FETCH_OBJ);
	$horaIni=$horsucu->hora_ini;
	$horaFin=$horsucu->hora_fin;
	$diff=abs(calcular_tiempo_trasnc($horaIni,$horaFin));
	$hora=explode(":", $horaFin);
	$hora2=$hora[0]-1;
	if($hora[1]=="00"){
		$hora[1]=60;
	}
	$duracion=date("i",strtotime($servicio->duracion_servicio));
	//echo "Minutos: ".$duracion;
	$minutos=$hora[1]-$duracion;
	//echo $minutos;
	$horaFin=$hora2.":".abs($minutos);
	//echo $horaFin;
	//echo $horaIni."- ".$horaFin;
	$horain=explode(":", $horaIni);
	//$horai=$horain[0]."-".$horain[1]."-".$horain[2];
	//echo "Fecha: ".$_GET['fecha'];
	$fecha=explode("-", $fecha);
	$date=$fecha[0].$fecha[1].$fecha[2];
	?>
	<select class="selmenu" id="txtHora" name="txtHora" onchange='cargarHorario(<?php echo $sucursal ?>,<?php echo $date ?>,this.value)'>
		<option value="0">Seleccione un horario</option>
		<?php 
		for($i=$horain[0];$i<=$hora2;$i++){
			echo "<option value='".$i.":00'>".$i.":00</option>";
			echo "<option value='".$i.":30'>".$i.":30</option>";
		}
		?>
	</select>
	<?php
	//echo "<input type='time' name='txtHora' id='txtHora' min='".$horaIni."' max='".$horaFin."' class='txtinput time' onchange='cargarHorario(".$sucursal.",".$date.",this.value)'>";
}
?>