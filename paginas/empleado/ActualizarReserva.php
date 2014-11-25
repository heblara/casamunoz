<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
      $(function( $ ) {
        $(function() {
          $('.datepicker').datepicker({
              dateFormat: 'yy-mm-dd', 
              changeMonth: true, 
              changeYear: true, 
              //yearRange: '+0:+1',
              /*onClose: function( selectedDate ) {
                $( "#txtFechaRegistro" ).datepicker( "option", "minDate", selectedDate );
              },*/
              minDate:'-0',
              maxDate:'+3D'              
              //maxDate:'+1M +10D'
          });
        });
      });
  function validar(){
    sucursal=document.getElementById('lstEmpleadoSucursal').value;
    cantidad=document.getElementById('txtCantidadEntrega[]').value;
    error=false;
    if(sucursal==0){
        alert("Seleccione un empleado");
        error=true;
    }else if(isNaN(cantidad)){
        alert("Ingrese un numero en la cantidad");
        error=true;
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
        url: "procesos/actualizardoreserva.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar la entrada");
        }else if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
        }else if(respuesta.mensaje==3){
          alert("Las cantidades no deben sobrepasar las existencias");
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
        <h2>REPROGRAMACION DE RESERVA</h2>
          <?php 
          $objeto=new CasaMunoz;
            $id=base64_decode($_GET['id']);
            //echo $id;
            $conReserva=$objeto->consultar_reserva_cliente($id);
            if($conReserva->rowCount()==0){
              die("Reserva no encontrada");
            }
            $resReserva=$conReserva->fetch(PDO::FETCH_OBJ);
          ?>
          <label>Estado: </label>
          <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija Estado --</option>
            <?php 
            $consEstados=$objeto->consultar_estados();
            while($resEstados=$consEstados->fetch(PDO::FETCH_OBJ)){
              if($resEstados->cod_estado_rsv!=1 && $resEstados->cod_estado_rsv!=5){
                echo "<option value='".$resEstados->cod_estado_rsv."'>".$resEstados->estado_rsv."</option>";
              }
            }
            ?>
           <br> <br> <br>
        </select>
		
		
		<label>Fecha registro reprogramar</label>
        <input type="text" name="txtFechaRegistro" id="txtFechaRegistro" placeholder="Fecha de reprogramacion" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" readonly="readonly" value="<?php echo $resReserva->fec_estado_rsv ?>">  
        <br/>
		     <br> <br> <br>     
		
        <label for="txtHora">Hora:</label>
        <input type='time' min='' max='' class='txtinput time' value="<?php echo $resReserva->hora_rsv ?>"> 

   
            <label>Servicio: </label>
            <?php 
      $consultarservicios=$objeto->listar_servicios();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstServicio' id='lstServicio' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      $servicio1="";
      while($servicio=$consultarservicios->fetch(PDO::FETCH_OBJ))
      {
      if($servicio->cod_servicio==$resReserva->cod_servicio){$servicio1='selected';
        echo "<option value='".$servicio->cod_servicio."' selected='".$servicio1."'>".$servicio->nom_servicio." ($".$servicio->precio_Costo.")</option>";
      } else {
        echo "<option value='".$servicio->cod_servicio."' >".$servicio->nom_servicio." ($".$servicio->precio_Costo.")</option>";
      }
    }

      echo "</select>";
   ?>

   
            </select>
        <br> <br> <br> 
        <fieldset>
		
			 		 
		 
<label>Pedicurista: </label>
            <?php 
      $consultarpedicurista=$objeto->consultar_pedicurista($_SESSION['sucursal']);
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstPedicurista' id='lstPedicurista' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      $pedicurista1="";
      while($pedicurista=$consultarpedicurista->fetch(PDO::FETCH_OBJ))
      {
      if($pedicurista->cod_emp==$resReserva->cod_emp){$pedicurista1='selected';
        echo "<option value='".$pedicurista->cod_emp."' selected='".$pedicurista1."'>".$pedicurista->primer_nom."</option>";
      } else {
        echo "<option value='".$pedicurista->cod_emp."' >".$pedicurista->primer_nom."</option>";
      }
    }

      echo "</select>";
   ?>


          <legend><span style='font-size:12pt;'>Disponibilidad de pedicurista seleccionado</span></legend>
          <table width="100%" border='1' style="border:groove 1px;font-size:12pt;">
              <tr>
                <th>Hora</th>
                <th>Estado</th>
              </tr>
              <tr>
                <td>08:00</td>
                <td>Ocupado</td>
              </tr>
              <tr>
                <td>08:30</td>
                <td>Disponible</td>
              </tr>
              <tr>
                <td>09:00</td>
                <td>Ocupado</td>
              </tr>
            </table>
        </fieldset>
       <br> <br> <br>
         <select>
        
        <br />
        <br />
        <br />
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Reservar">
        <br style="clear:both;">
    </section>
</form>
