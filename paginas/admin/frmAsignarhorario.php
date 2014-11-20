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
        url: "procesos/asignarhorario.php",
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
    if(validar()){
        enviarDatos();
      }
      return false;
  });
});
</script>
 
<script language="JavaScript">
</script>
<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>ASIGNAR HORARIO</h2>
          
          <label>Sucursal: </label>
         
            <?php 
            $objeto=new CasaMunoz;
            $consultarSucursal=$objeto->consultar_sucursal();
            //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
            // Voy imprimiendo el primer select compuesto por los paises
            //echo $consultarDepartamentos->rowCount();
            echo "<select name='lstSucursal' id='lstSucursal' class='selmenu'>";
            echo "<option value='0'>Elige</option>";

            while($registro=$consultarSucursal->fetch(PDO::FETCH_OBJ))
            {
              echo "<option value='".$registro->cod_sucursal."'>".$registro->nom_sucursal."</option>";
            }
            echo "</select>";
         ?>
           <br> <br> <br>
        </select>
		
		
		<label>Día: </label>
       <select name='lstDia' id='lstDia' class='selmenu'>"
        <option value='0'>Domingo</option>
        <option value='1'>Lunes</option>
        <option value='2'>Martes</option>
        <option value='3'>Miércoles</option>
        <option value='4'>Jueves</option>
        <option value='5'>Viernes</option>
        <option value='6'>Sábado</option>

   </select>
		
        <label >Hora de apertura:</label>
        <input type='time' format='hh:mm'  class='txtinput time' id='txtHoraA' name='txtHoraA' onkeypress="return soloNumeros(event)"> 
         <br> 
        <label >Hora de cierre:</label>
        <input type='time' class='txtinput time' id='txtHoraC' name='txtHoraC' onkeypress="return soloNumeros(event)"> 
            
        <br> <br> <br> 
        <fieldset>


    <section id="buttons">
      
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Reservar">
        <br style="clear:both;">
    </section>
</form>
