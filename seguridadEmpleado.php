<?php
if($_SESSION["autenticado"]!="si"){
	header("Location:?mod=home");
}else{
	if($_SESSION['tipo']!=2){
		header("Location:?mod=home");	
	}
}
?>