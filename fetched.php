[
<?php
include_once ('DBManager.class.php');
include("casamunoz.class.php");
$objMedio=new Casamunoz;
$consultar=$objMedio->consultar_clientes();
$i=0;
while ($data = $consultar->fetch(PDO::FETCH_OBJ))
{
	$i++;
?>
{"caption":"<?php echo $data->NombreCompleto." (".$data->correo_cliente.")"; ?>","value":"<?php echo $data->cod_cliente; ?>"},
<?php	
}	
?>
]