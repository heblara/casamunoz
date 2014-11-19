<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script language="javascript">
function soloNumeros(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        alert("Solo se permiten números en este campo.");
        return false;
    }
    return true;
 }
</script>
<script type="text/javascript">
     $(function() {
	$('#txtFechaRegistro').datepicker({
	dateFormat: 'yy-mm-dd', 
	changeMonth: true, 
	changeYear: true, 
	   yearRange: '+0:+1',
           minDate: -0, maxDate: "+0D"
	});
		});
	function validar(){
    nombre=document.getElementById('txtNombre').value;
	descripcion=document.getElementById('message').value;
	precio=document.getElementById('txtprecio').value;
	duracion=document.getElementById('txtDuracion').value;
    msg="";
    error=false;
	precionum=parseFloat(precio);
	duracionnum=parseFloat(duracion);
		var ok = 0;
    var ckbox = document.getElementsByName('seleccion[]');
        for (var i=0; i < ckbox.length; i++){
            if(ckbox[i].checked == true){
            ok = 1;
            }
        }
		if(nombre=="" || nombre==null){
        msg+='* Primer Nombre';
        alert("Ingrese nombre del servicio");
        //#hongkiat-form input.name
        document.getElementsByName('txtNombre').style="border-color:#F80303;";
        document.getElementById('txtNombre').focus();
        error=true;
    }else if(descripcion=="" || descripcion==null){
        msg+='* Descripcion';
        alert("Ingrese la descripcion del servicio");
        //#hongkiat-form input.name
        document.getElementsByName('message').style="border-color:#F80303;";
        document.getElementById('message').focus();
        error=true;
    }else if(precio=="" || precio==null){
        msg+='* Precio';
        alert("Ingrese el precio del servicio");
        //#hongkiat-form input.name
        document.getElementsByName('txtprecio').style="border-color:#F80303;";
        document.getElementById('txtprecio').focus();
        error=true;
    }else if(precionum <= 0){
        msg+='* precio';
        alert("Precio debe ser mayor que cero");
        //#hongkiat-form input.name
        document.getElementsByName('txtprecio').style="border-color:#F80303;";
        document.getElementById('txtprecio').focus();
        error=true;
    }else if(duracion=="" || duracion==null){
        msg+='* Duracion';
        alert("Ingrese la duracion del servicio");
        //#hongkiat-form input.name
        document.getElementsByName('txtDuracion').style="border-color:#F80303;";
        document.getElementById('txtDuracion').focus();
        error=true;
    }else if(duracion <= 0){
        msg+='* Duracion';
        alert("Duracion debe ser mayor que cero minutos");
        //#hongkiat-form input.name
        document.getElementsByName('txtDuracion').style="border-color:#F80303;";
        document.getElementById('txtDuracion').focus();
        error=true;
    }else if(ok == 0){
        alert('Indique al menos una sucursal');
        return false;
    }

	  if(error==true){
      return false;
    }else{
      //enviarDatos();
      return true;
    }
}
	
    $(function() {
  //Se pone para que en todos los llamados ajax se bloquee la pantalla mostrando el mensaje Procesando...
  $.blockUI.defaults.message = 'Procesando información, por favor espere... <br /><img src=\'img/load.gif\' /><br />';
  $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
});
function enviarDatos(){
  var formulario = $("#hongkiat-form").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
        url: "procesos/guardarservicio.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
		  document.getElementById('hongkiat-form').reset();
          document.getElementById('txtNombre').focus();
        }else if(respuesta.mensaje==2){
          alert("No fue posible registrar el servicio");
        }
    });
}
$(document).ready(function(){         
  $("#submitbtn").click(function(){
    if(validar()){
        enviarDatos();
      }
      return false;
  });
});
</script>
<form name="hongkiat" id="hongkiat-form" method="post" action="#" onsubmit="return false;">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>REGISTRO DE SERVICIOS</h2>
       



        <label>Nombre del servicio:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de servicio" autocomplete="off" tabindex="1" class="txtinput offer">
        <br />
        <label>Descripcion:</label>
       <textarea name="message" id="message" style="width:40%;" placeholder="Descripcion..." tabindex="5" class="txtblock"></textarea>
        <label>Fecha registro de servicio:</label>
        <input type="text" name="txtFechaRegistro" id="txtFechaRegistro" placeholder="Fecha de registro de producto" autocomplete="off" tabindex="1" class="txtinput calendar" readonly="readonly" value="<?php echo date('Y-m-d H:i:s') ?>">  
        <br/>
        <label>precio de servicio:</label>
        <input type="text" name="txtprecio" id="txtprecio" placeholder="precio de servicio" autocomplete="off" tabindex="1" class="txtinput money"  onkeypress="return soloNumeros(event)">
        <br />

        <label>Duraci&oacute;n (En minutos):</label>
        <input type="time" name="txtDuracion" id="txtDuracion" placeholder="Tiempo que dura el servicio (en minutos)" property="readOnly" autocomplete="off" tabindex="1" class="txtinput time">
        
        <fieldset>
        <br><label>Sucursal: </label>
        
     <?php 
      $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_sucursal();
    while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
       echo "<input type='checkbox' name='seleccion[]' value='".$sucu->cod_sucursal."'>".$sucu->nom_sucursal."</option>";
      }
   ?>

</fieldset>
        <br />
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
