<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
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
        url: "procesos/guardarservicio.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
        }else if(respuesta.mensaje==2){
          alert("No fue posible registrar el servicio");
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
        <input type="text" name="txtprecio" id="txtprecio" placeholder="precio de servicio" autocomplete="off" tabindex="1" class="txtinput money">
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