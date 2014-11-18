<?php
if(@$link=mysql_connect("192.168.56.101", "root", "admin2014")){
	@mysql_select_db("casamunoz");
}else{
	echo "No se pudo establecer la conexion";
}
function conectar(){
	if(@$link=mysql_connect("192.168.56.101", "root", "admin2014")){
		@mysql_select_db("casamunoz");
	}else{
		echo "No se pudo establecer la conexion";
	}
}
function desconectar()
{
	@mysql_close();
}
?>
