<?php
if(@$link=mysql_connect("localhost", "root", "gambito")){
	@mysql_select_db("casamunoz");
}else{
	echo "No se pudo establecer la conexion";
}
function conectar(){
	if(@$link=mysql_connect("localhost", "root", "gambito")){
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