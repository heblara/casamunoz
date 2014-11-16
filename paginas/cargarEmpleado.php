<?php 
include("funciones.php");
sleep(1);
if(isset($_GET['sucursal']) && isset($_GET['fecha2'])){
	$objeto=new CasaMunoz;
	$sucursal=$_GET['sucursal'];
	$fecha=$_GET['fecha2'];
	$date=substr($fecha, 0,4)."-".substr($fecha, 4,2)."-".substr($fecha, 6,2);
	$hora=$_GET['hora'];
	echo "Fecha: ".$date."<br />";
	echo $hora;
	$consEmpSucu=$objeto->consultar_empleados_sucursal($sucursal);
	$tabla="
	<fieldset>
  <legend><span style='font-size:12pt;'>Disponibilidad de horario seleccionado</span></legend>
  <table width='100%' border='1' style='border:groove 1px;font-size:12pt;'>
      <tr>
        <th>Hora</th>
        <th>Estado</th>
        <td>Seleccionar</td>
      </tr>";

      $l=0;
	$i=0;
	while($resEmpSucu=$consEmpSucu->fetch(PDO::FETCH_OBJ)){
		$consEmpleado=$objeto->consultar_disponibilidad_empleado($sucursal,$fecha,$resEmpSucu->cod_emp);
		//echo $sucursal."-".$fecha."-".$resEmpSucu->cod_emp;
		//echo $consEmpleado->rowCount();
		if($consEmpleado->rowCount() == 0 && $resEmpSucu->cod_cargo==2){
			$l=1;
			$i++;
			$tabla.="
		      <tr>
		        <td>".$hora."</td>
		        <td>".$resEmpSucu->NombreCompleto."</td>
		        <td><input type='radio' name='rdSeleccionar' id='rdSeleccionar' value='".$resEmpSucu->cod_emp."'></td>
		      </tr>";
			//echo "<option value='".$resEmpSucu->cod_emp."'>".$resEmpSucu->cod_emp."- ".$resEmpSucu->NombreCompleto."</option>";
		}
	}

      $tabla.="
    </table>
</fieldset>";
	/*echo "<select name='estados' id='estados' class='selmenu'>
	          <option value='0'>-- Elija pedicurista --</option>";*/
	//echo "</select>";
	//echo $i;
	          echo $tabla;
}
?>