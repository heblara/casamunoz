<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>  
<script type="text/javascript">
  function validar(){
    nombre=document.getElementById('txtNombre').value;
    FechaInicio=document.getElementById('txtFechaIni').value;
    FechaFin=document.getElementById('txtFechaFin').value;
    var ok = 0;
    var ckbox = document.getElementsByName('seleccion[]');
        for (var i=0; i < ckbox.length; i++){
            if(ckbox[i].checked == true){
            ok = 1;
            }
        }
        
    error=false;
    if(nombre==0){
        alert("Digite un Nombre de TEMPORADA");
        error=true;
    }else if(FechaInicio==0){
        alert("Seleccione una Fecha de Inicio");
        error=true;
    }else if(FechaFin==0){
        alert("Seleccione una Fecha de Fin");
        error=true;
    }
    if(ok == 0){
        alert('Indique al menos una sucursal');
        return false;
    }
    if(error==true){
      return false;
    }else{
      return true;
    }
  }
</script>
<script type="text/javascript">
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
        url: "procesos/guardarEntradaSucursal.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar la temporada");
        }else if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
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
<script>
 $(function() {
      $( "#txtFechaIni" ).datepicker({
        defaultDate: "+1w",
        dateFormat:'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1,
        minDate: "+0D",
        onClose: function( selectedDate ) {
          $( "#txtFechaFin" ).datepicker( "option", "minDate", selectedDate );
        }
      });
      $( "#txtFechaFin" ).datepicker({
        defaultDate: "+1w",
        dateFormat:'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
          $( "#txtFechaIni" ).datepicker( "option", "maxDate", selectedDate );
        }
      });
    });
</script>
<script language="JavaScript">
  </script>
<form name="hongkiat" id="hongkiat-form" method="post" action="#" >
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>REGISTRO DE TEMPORADA</h2>
        <label>Nombre:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre temporada" tabindex="1" class="txtinput name">
        <label>Fecha inicial:</label>
        <input type="text" name="txtFechaIni" id="txtFechaIni" placeholder="Fecha inicial" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" readonly="readonly">
        <br />
        <label>Fecha Final:</label>
        <input type="text" name="txtFechaFin" id="txtFechaFin" placeholder="Fecha final" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" readonly="readonly">
        <form >
		<fieldset>
      <br><label>Sucursal: </label>
        <?php 
      $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_sucursal();
	  while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
       echo "<input type='checkbox' name='seleccion[]' id='chkSucursal' value='".$sucu->cod_sucursal."'>".$sucu->nom_sucursal."</option>";
      }
   ?>
   </fieldset>
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
