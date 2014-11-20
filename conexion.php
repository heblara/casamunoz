<?php
if(@$link=mysql_connect("casamunoz.db.11835788.hostedresource.com", "casamunoz", "Admin2014!")){
	@mysql_select_db("casamunoz");
}else{
	echo "No se pudo establecer la conexion";
}
function conectar(){
	if(@$link=mysql_connect("casamunoz.db.11835788.hostedresource.com", "casamunoz", "Admin2014!")){
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
