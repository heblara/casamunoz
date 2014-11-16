<?php
include 'config.inc.php';

if ($_GET[buscar]=="hijos")
{
	$consulta="SELECT * FROM hijo WHERE idpadre='".mysql_real_escape_string(intval($_GET["idpadre"]))."' order by hijo";
	mysql_select_db($dbname);
	$todos=mysql_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label>Hijo:</label><select name='idhijo' id='idhijo'>";
	echo "<option value=''>Selecciona un Hijo...</option>";
	while($registro=mysql_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["idhijo"]."'";
		if ($registro["idhijo"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["hijo"])."</option>";
	}
	echo "</select>";
}

if ($_GET[buscar]=="nietos")
{
	$consulta="SELECT * FROM nieto WHERE idhijo='".mysql_real_escape_string(intval($_GET[idhijo]))."' order by nieto";
	mysql_select_db($dbname);
	$todos=mysql_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label>Nieto:</label><select name='idnieto' id='idnieto'>";
	echo "<option value=''>Selecciona un Nieto...</option>";
	while($registro=mysql_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["idnieto"]."'";
		if ($registro["idnieto"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["nieto"])."</option>";
	}
	echo "</select>";
}
?>