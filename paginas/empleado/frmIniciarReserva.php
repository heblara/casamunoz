<?php @session_start(); ?>
<form name="hongkiat" id="hongkiat-form">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>RESERVA DE SERVICIO</h2>
        <!--<label>Sucursal: </label>
        <script type="text/javascript" src="funciones/select_dependientes1.js"></script>
        <?php 
          $objeto=new CasaMunoz;
          $consultarSucursal=$objeto->consultar_sucursal();
          //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
          // Voy imprimiendo el primer select compuesto por los paises
          //echo $consultarDepartamentos->rowCount();
          echo "<select name='lstSucursal' id='lstSucursal' class='selmenu' onchange='validarSucursal()'>";
          echo "<option value='0'>Elige</option>";

          while($registro=$consultarSucursal->fetch(PDO::FETCH_OBJ))
          {
            echo "<option value='".$registro->cod_sucursal."'>".$registro->nom_sucursal."</option>";
          }
          echo "</select>";
       ?>-->
       <!--<label>Cliente:</label>-->
        <!--<input type="text" name="txtCliente" id="txtCliente" placeholder="Ingrese el nombre del cliente" autocomplete="off" tabindex="1" class="txtinput name">-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript">
      jQuery.noConflict();
      (function( $ ) {
        $(function() {
          $('.datepicker').datepicker({
              dateFormat: 'yy-mm-dd', 
              changeMonth: true, 
              changeYear: true, 
              yearRange: '+0:+1',
              minDate: -0, maxDate: "+15D"
              //maxDate:'+1M +10D'
          });
        });
      })(jQuery);
      // Code that uses other library's $ can follow here.
  </script>
<script language="JavaScript">
var objeto = false;
function procesaResultado() {
// Si aun esta revisando los datos...
if (objeto.readyState == 1) {
//  document.getElementById('resultado').innerHTML = "Cargando datos con ajax...";
  document.getElementById('demoDer').innerHTML = "<td colspan='6'>Cargando...";
}
// Si el estado es 4 significa que ya termino
if (objeto.readyState == 4) {
  // objeto.responseText trae el Resultado que metemos al DIV de arriba
  document.getElementById('demoDer').innerHTML = objeto.responseText;
}
}
function procesaTabla() {
// Si aun esta revisando los datos...
if (objeto.readyState == 1) {
//  document.getElementById('resultado').innerHTML = "Cargando datos con ajax...";
  document.getElementById('horarios').innerHTML = "<td colspan='6'><img src='img/load.gif' title='Cargando datos' width='32' />";
}
// Si el estado es 4 significa que ya termino
if (objeto.readyState == 4) {
  // objeto.responseText trae el Resultado que metemos al DIV de arriba
  document.getElementById('horarios').innerHTML = objeto.responseText;
}
}
function crearObjeto() {
  // --- Crear el Objeto dependiendo los diferentes Navegadores y versiones ---
  try { objeto = new ActiveXObject("Msxml2.XMLHTTP");  }
  catch (e) {
  try { objeto = new ActiveXObject("Microsoft.XMLHTTP"); }
  catch (E) {
  objeto = false; }
  }
  // --- Si no se pudo crear... intentar este ultimo metodo ---
  if (!objeto && typeof XMLHttpRequest!='undefined') {
    objeto = new XMLHttpRequest();
  }
}

// ------------------------------

function leerDatos(sucursal,fecha,servicio) {
  crearObjeto();
  if (objeto.readyState != 0) {
    alert('Error al crear el objeto XML. El Navegador no soporta AJAX');
  } else {
    // Preparar donde va a recibir el Resultado
    objeto.onreadystatechange = procesaResultado;
    var ca=/^[ ]{1}/;
    var com=ca.test(sucursal);
    if((!com=="") || (sucursal=="") || (fecha=="")){document.getElementById("demoDer").innerHTML="";}else{
    // Enviar la consulta
        objeto.open("GET", "paginas/cargarHorario.php?sucursal=" + sucursal + "&fecha="+fecha+"&serv="+servicio, true);
        objeto.send(null);
    } 
  }
}
function cargarHorario(sucursal,fecha2,hora) {
  //alert(hor);
  //alert(fecha2);
  crearObjeto();
  if (objeto.readyState != 0) {
    alert('Error al crear el objeto XML. El Navegador no soporta AJAX');
  } else {
    // Preparar donde va a recibir el Resultado
    objeto.onreadystatechange = procesaTabla;
    var ca=/^[ ]{1}/;
    var com=ca.test(sucursal);
    if((!com=="") || (sucursal=="") || (fecha2=="")){document.getElementById("horarios").innerHTML="";}else{
    // Enviar la consulta
        objeto.open("GET", "paginas/cargarEmpleado.php?sucursal=" + sucursal + "&fecha2="+fecha2+"&hora="+hora, true);
        objeto.send(null);
    } 
  }
}
</script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
jQuery.noConflict();
(function( $ ) {
  $(function() {
    // More code using $ as alias to jQuery
    //Se pone para que en todos los llamados ajax se bloquee la pantalla mostrando el mensaje Procesando...
    $.blockUI.defaults.message = 'Procesando información, por favor espere... <br /><img src=\'img/load.gif\' /><br />';
    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
  });
})(jQuery);
  
function enviarDatos(){
  //var formulario = 
    var j = jQuery.noConflict();
    j.ajax({
      type: "POST",
      dataType: 'json',
        url: "procesos/guardarReservaEmp.php",
        data: j("#hongkiat-form").serializeArray(),
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar la reserva, intente de nuevo");
        }else if(respuesta.mensaje==1){
          alert("Reserva realizado con exito");
          location.href='?mod=imprimirreserva&id=<?php echo $_SESSION['reserva'] ?>';
        }
    });
}
$.noConflict();
jQuery( document ).ready(function( $ ) {
  // Code that uses jQuery's $ can follow here.
  $("#submitbtn").click(function(){
        if(validar()){
          if($("input[id=rdSeleccionar]:checked").val()){
            enviarDatos();
          }else{
            alert("Seleccione un horario");
          }
        }else{
          //alert("Seleccione un cliente");
        }
    });
});

</script>
        <!-- RECURSOS PARA EL BUSCADOR DE CLIENTES-->
  <link rel="stylesheet" href="test.css" type="text/css" media="screen" title="Test Stylesheet" charset="utf-8" />
  <script src="js/search/protoculous-effects-shrinkvars.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/search/textboxlist.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/search/test.js" type="text/javascript" charset="utf-8"></script>
  <script>
  function validar(){
    var cliente=document.getElementById("txtCliente").value;
    var dato=$F('facebook-demo').split("###");
    tlist2.update();
    //alert("Valor: "+dato[0]);
    if($F('facebook-demo')!=""){
      document.getElementById("txtCliente").value=$F('facebook-demo');
      //enviarnot
      return true;
      //return true;  
    }else{
      alert("Es necesario ingresar un cliente");
      return false;
    }
  }
  </script>

<label>Cliente:</label>
       <div id="facebook-list" class="txt-input">
        <textarea id="facebook-demo" name="facebook-demo" placeholder="Comience a digitar el nombre del cliente"></textarea>

        <input type="hidden" id="txtCliente" name="txtCliente" /> 
        <div id="facebook-auto">
          <div class="default">Listado de clientes</div> 
          <ul class="feed">
          </ul>
        </div>
    </div>
    
          <script language="JavaScript">
          document.observe('dom:loaded', function() {
            // init
            tlist2 = new FacebookList('facebook-demo', 'facebook-auto',{fetchFile:'fetched.php'});
            // fetch and feed
            new Ajax.Request('json.php', {
              onSuccess: function(transport) {
                  transport.responseText.evalJSON(true).each(function(t){tlist2.autoFeed(t)});
              }
            });
          });    
    </script>
<!-- FIN DE RECURSOS FUNCIONARIOS-->
<br /><br />
        <label for="lstServicios">Servicio:</label>
        <?php 
        //echo $_SESSION['sucursal'];
        ?>
        <select id="lstServicios" name="lstServicios" tabindex="6" class="selmenu">
            <option value="0">-- Elija servicio --</option>
            <?php 
            $conServicios=$objeto->listar_servicios($_SESSION["sucursal"]);
            while($servicio=$conServicios->fetch(PDO::FETCH_OBJ)){
                echo "<option value='".$servicio->cod_servicio."'>".$servicio->nom_servicio." ($".$servicio->precio_Costo.")</option>";  
            }
            ?>
        </select>
        <label>Fecha:</label>
        <?php 
        $fecha = date('Y-m-d');
        $fecha = strtotime ( '-1 day' , strtotime ( $fecha ) );
        $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        ?>
        <input type="text" name="txtFecha" id="txtFecha" placeholder="Seleccione una fecha" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" min="<?php echo $fecha ?>" max="<?php echo $nuevafecha ?>" onchange="leerDatos(<?php echo $_SESSION['sucursal'] ?>,this.value)">
        <!--<label>Pedicurista: </label>
        <span id="demoDer">
        <select disabled="disabled" name="estados" id="estados" class='selmenu'>
          <option value="0">Selecciona opci&oacute;n...</option>
      </select>
        </span>-->
        
        <label>Hora de Inicio: </label>
        <span id="demoDer">
        <select class='selmenu' id='txtHora' name='txtHora' disabled='disabled'>
          <option value='0'>Seleccione una fecha</option>
        </select>
        <!--<input type='time' min='' max='' class='txtinput time' disabled="disabled">-->
        </span>
        <!--<label for="txthora">Hora:</label>
        <input type="text" id="txtHora" placeholder='Hora' class="txtinput time" />-->
        <div id="horarios"></div>
        <br />
        <br />
        <br />
        
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id='buttons'>
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type='button' name='submit' id='submitbtn' class='submitbtn' tabindex='7' value='Reservar'>
        <br style='clear:both;'>
    </section>
</form>