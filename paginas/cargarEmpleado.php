<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['sucursal']) && isset($_GET['fecha2'])){
	$objeto=new CasaMunoz;
	$sucursal=$_GET['sucursal'];
	$fecha=$_GET['fecha2'];
	$date=substr($fecha, 0,4)."-".substr($fecha, 4,2)."-".substr($fecha, 6,2);

	$hora=$_GET['hora'];
	//echo "Fecha: ".$date."<br />";
	//echo $hora;
	$consEmpSucu=$objeto->consultar_empleados_sucursal($sucursal);
	$tabla="
	<fieldset>
  <legend><span style='font-size:12pt;'>Disponibilidad de horario seleccionado</span></legend>
  <table width='100%' border='1' style='border:groove 1px;font-size:12pt;'>
      ";
    $l=0;
	$i=0;
	//echo $date." ".$hora.":00<br />".date('Y-m-d H:i:s');
	$consTemporada=$objeto->consultar_temporadas();
	$tempo=false;
	while ($temporada=$consTemporada->fetch(PDO::FETCH_OBJ)) {
		$fechaIni=$temporada->fec_ini;
		$fechaFin=$temporada->fec_fin;
		if(strtotime($date)>strtotime($fechaIni) && strtotime($date)<strtotime($fechaFin)){
			$tempo=true;
			break;
		}
	}
	if($tempo==false){


	if(strtotime($date." ".$hora.":00") > strtotime(date('Y-m-d H:i:s'))){
		while($resEmpSucu=$consEmpSucu->fetch(PDO::FETCH_OBJ)){
			//$fec=$date;
			$consEmpleado=$objeto->consultar_disponibilidad_empleado($sucursal,$date,$resEmpSucu->cod_emp);
			//echo $sucursal."-".$fecha."-".$resEmpSucu->cod_emp;
			//echo $consEmpleado->rowCount();
			if($consEmpleado->rowCount() == 0 && $resEmpSucu->cod_cargo==2){
				$consReservaEmp=$objeto->consultar_empleado_reserva($resEmpSucu->cod_emp,$date,$hora);
				if($consReservaEmp->rowCount() == 0){
					if($i==0){
							$tabla.= "<tr>
					        <th>Hora</th>
					        <th>Nombre del pedicurista</th>
					        <th>Seleccionar</th>
					      </tr>";
					}
					$l=1;
					$i++;
					$tabla.="
				      <tr>
				        <td>".$hora."</td>
				        <td>".$resEmpSucu->cod_emp."- ".$resEmpSucu->NombreCompleto."</td>
				        <td><input type='radio' name='rdSeleccionar' id='rdSeleccionar' value='".$resEmpSucu->cod_emp."' class='radio' /></td>
				      </tr>";
					//echo "<option value='".$resEmpSucu->cod_emp."'>".$resEmpSucu->cod_emp."- ".$resEmpSucu->NombreCompleto."</option>";
				}
			}
			/*else{
				
			}*/
		}
		if($i==0){
			$tabla.="<tr><td><h1>No se encuentran pedicuristas disponibles en esta sucursal para la hora y fecha seleccionada
			<br />Por favor seleccione otra hora o si lo desea puede seleccionar otra sucursal.</h3></td></tr>";
		}
	}else{
		$tabla.="<tr><td><h1>No se puede reservar en horas pasadas</h3></td></tr>";
	}

}else{
	$tabla.="<tr><td><h1>Lo sentimos, el sistema est&aacute; inactivo por la temporada: ".$temporada->nom_temp."<br />
	Favor visite la sucursal m&aacute;s cercana donde ser&aacute; atendido por orden de llegada.</h3></td></tr>";
}
      $tabla.="
    </table>
</fieldset>
";
	/*echo "<select name='estados' id='estados' class='selmenu'>
	          <option value='0'>-- Elija pedicurista --</option>";*/
	//echo "</select>";
	//echo $i;
	          echo $tabla;
}
?>