<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
     $(function() {
	$('#txtFechaRegistro').datepicker({
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
        url: "procesos/guardarProducto.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
        }else if(respuesta.mensaje==2){
          alert("No fue posible registrar el producto");
        }
    });
}
$(document).ready(function(){         
  $("#submitbtn").click(function(){
      enviarDatos();
      return false;
  });
});
</script>
<form name="hongkiat" id="hongkiat-form" method="post">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>REGISTRO DE PRODUCTO</h2>
        <label>Nombre de producto:</label>
        <input type="text" name="txtNombreProducto" id="txtNombreProducto" placeholder="Nombre del producto" autocomplete="off" tabindex="1" class="txtinput">  
        <label>Nombre de Rendimiento:</label>
        <input type="text" name="txtRendimiento" id="txtRendimiento" placeholder="Rendimiento del producto" autocomplete="off" tabindex="1" class="txtinput">  
        <label>Fecha registro de producto:</label>
        <input type="text" name="txtFechaRegistro" id="txtFechaRegistro" placeholder="Fecha de registro del producto" autocomplete="off" tabindex="1" class="txtinput calendar">  
        <br/>
      <label>Detalle del producto:</label>
        <textarea name="txtDetalle" id="txtDetalle" placeholder="Detalle del producto" autocomplete="off" tabindex="1" class="txtblock">
        </textarea>
    <section id="buttons">
        <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Limpiar">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
