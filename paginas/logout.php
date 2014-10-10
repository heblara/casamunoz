<?php 
if(isset($_SESSION['autenticado'])){
	session_destroy();
	header("Location:?mod=home");
}
?>