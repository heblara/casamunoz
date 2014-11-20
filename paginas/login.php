<link rel="stylesheet" type="text/css" href="css/style2.css">
<?php 
if(isset($_SESSION['autenticado'])){
	if($_SESSION['autenticado']=="si"){
			header("Location:?mod=home");
	}else{

	}
}
?>
<style type="text/css">
p{
	text-align: left;
}
#login{
	padding-left: 200px;
}
#error{
	color:red;
	border-radius: 10px;
	border-color: black;
	border-width: 5px;
	text-align: left;
}
</style>
<script>
$(document).ready(function(){					
	$("#submit").click(function(){
		var formulario = $("#frmLogin").serializeArray();
		$.ajax({
			type: "POST",
			dataType: 'json',
				url: "procesos/autenticar.php",
				data: formulario,
		}).done(function(respuesta){
			//$("#mensaje").html(respuesta.mensaje);
			//alert(respuesta.mensaje);
			if(respuesta.mensaje==1){
				alert("Usuario inactivo");
			}else if(respuesta.mensaje==2){
				alert("Usuario o contrasena incorrecta");
			}else if(respuesta.mensaje==3){
				alert("Acceso correcto");
				location.href='?mod=home';
			}
		});
	});
});
</script>
<h2>INICIAR SESI&Oacute;N</h2>
<div id="box" style="">
<div class="elements">
<div class="avatar"></div>
<form id="frmLogin">
	<input type="text" name="username" class="username" placeholder="Usuario" autocomplete='off' value="" />
	<input type="password" name="password" class="password" placeholder="Contrase&ntilde;a" autocomplete='off' />
	<input type="button" name="login" class="submit" id="submit" value="Ingresar" />
	<h3><a class="forgot" href="?mod=registrarse">Registrate</a></h3>
</form>
</div>
<br>
<div id='error'><?php 
if(isset($_GET['msj'])){
	$msj=$_GET['msj'];
	if($msj==1){
		echo "Llene todos los campos";
	}else if($msj==2){
		echo "Combinaci&oacute;n de usuario y contrase&ntilde;a incorrecta";
	}
}
?></div>
</div>
<!--<div id='login'>
<form method="post" id="signin" action="?mod=autenticar">
<p>
<label for="username">Correo Electr&oacute;nico Personal:</label>
<input id="username" name="username" value="" title="username" tabindex="4" type="text" required>
</p>
<p>
<label for="password">Contrase&ntilde;a</label>
<input id="password" name="password" value="" title="password" tabindex="5" type="password" required>
</p>
<input id="signin_submit" value="Iniciar Sesi&oacute;n" tabindex="6" type="submit">
</form>
<div id='error'><?php 
if(isset($_GET['msj'])){
	$msj=$_GET['msj'];
	if($msj==1){
		echo "Llene todos los campos";
	}else if($msj==2){
		echo "Combinaci&oacute;n de usuario y contrase&ntilde;a incorrecta";
	}
}
?></div>
</div>-->