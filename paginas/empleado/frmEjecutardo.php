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
        url: "procesos/actualizarReservaEjecutar.php",
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
        <h2>EJECUTAR RESERVA</h2>
      <?php 
       $objeto=new CasaMunoz;
            $id=base64_decode($_GET['id']);
            //echo $id;
    
      ?>
      <input type="hidden" value="<?php echo $id; ?>" name="idReserva" id="idReserva"/>
    El servicio se esta ejecutando 
        
</fieldset>
        <br />
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Ejecutar">
        <br style="clear:both;">
    </section>
</form>
