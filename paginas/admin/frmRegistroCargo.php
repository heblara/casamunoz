<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
	function validar(){
    cargo=document.getElementById('txtNombreCargo').value;
    descripcion=document.getElementById('txtDesc').value;
	msg="";
    error=false;
    if(cargo=="" || cargo==null){
        msg+='* gargo';
        alert("Ingrese el nombre del cargo");
        //#hongkiat-form input.name
        document.getElementsByName('txtNombreCargo').style="border-color:#F80303;";
        document.getElementById('txtNombreCargo').focus();
        error=true;
    }else if(descripcion=="" || descripcion==null){
        msg+='* descripcion';
        alert("Ingrese la descripcion");
        //#hongkiat-form input.name
        document.getElementsByName('txtDesc').style="border-color:#F80303;";
        document.getElementById('txtDesc').focus();
        error=true;
    }
	if(error==true){
      return false;
    }else{
      //enviarDatos();
      return true;
    }
}
	

  $(function() {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd', 
      changeMonth: true, 
      changeYear: true, 
      yearRange: '-40:+0'
      });
    });

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
        url: "procesos/guardarCargo.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
	  document.getElementById('hongkiat-form').reset();
          document.getElementById('txtNombreCargo').focus();
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
        <h2>REGISTRO DE CARGO</h2>
        <label>Nombre Cargo:</label>
        <input type="text" name="txtNombreCargo" id="txtNombreCargo" placeholder="Nombre Cargo" tabindex="1" class="txtinput">
		<textarea name="txtDesc" id="txtDesc" placeholder="Descripci&oacute;n..." tabindex="11" class="txtblock"></textarea>
		
		</form>
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
