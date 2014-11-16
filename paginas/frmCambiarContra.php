<script type="text/javascript" src="lib/alertify.js"></script>
<link rel="stylesheet" href="themes/alertify.core.css" />
<link rel="stylesheet" href="themes/alertify.default.css" />
<script src="lib/eventos.js">
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){					
$("#submitbtn").click(function(){
	var formulario = $("#hongkiat-form").serializeArray();
	$.ajax({
		type: "POST",
		dataType: 'json',
		url: "procesos/procesoFrmCambiarContra.php",
		data: formulario,
	}).done(function(respuesta){
		//$("#mensaje").html(respuesta.mensaje);
		//alerta(respuesta.mensaje);
		if(respuesta.mensaje==1){
			ok("Contraseña cambiada");
			location.href='?mod=logout';
		}else if(respuesta.mensaje==2){
			error("No fue posible actualizar la contraseña");
		}else if(respuesta.mensaje==3){
			error("La contraseña actual es invalida");
		}else{
			error(respuesta.mensaje);
		}
	});
});
});
</script>
<div id="divCon" align="center">
<!--
<form name="frmCambiarContra" id="frmCambiarContra" action='?mod=cambiarPwd' method="post">
-->
<form name="hongkiat" id="hongkiat-form">
<table cellpadding="1" cellspacing="4" border="0" class="tAgregar" align="center" width="100%">
<caption><h1>Cambiar contrase&ntilde;a</h1></caption>
<tr>
<th><label>Contrase&ntilde;a actual:</label></th>
<td><input type="password" name="txtContraActual" id="txtContraActual" class="inputText txtinput" placeholder="••••••••••••••••••"></td>
<th><div id="errortxtContraActual"></div></th>
</tr>
<tr>
<th><label>Contrase&ntilde;a nueva:</label></th>
<td><input type="password" name="txtContraNueva" id="txtContraNueva" class="inputText txtinput" placeholder="••••••••••••••••••"></td>
<td><div id="errortxtContraNueva"></div></td>
</tr>
<tr>
<th><label>Confirmacion de contrase&ntilde;a:</label></th>
<td><input type="password" name="txtContraConfir" id="txtContraConfir" class="inputText txtinput" placeholder="••••••••••••••••••"></td>
<td><div id="errortxtContraConfir"></div></td>
</tr>
<td>
<section id="buttons">
<input type="button" name="btnCambiar" id="submitbtn" value="Cambiar contrase&ntilde;a" class="submitbtn">
</section></td>
</table>
</form>
</div>
<div class="error" align="center" id="divError"></div>