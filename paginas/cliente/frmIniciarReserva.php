<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
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
<script>
  
</script>
<script type="text/javascript">
  function validarSucursal(){
  var sucursal=document.getElementById('lstSucursal').value;
  if(sucursal==0){
    //alert("Primero seleccione una sucursal");
    document.getElementById("txtFecha").setAttribute("disabled","disabled");
  }else{
    document.getElementById("txtFecha").removeAttribute("disabled");
    document.getElementById("txtFecha").setAttribute("readonly","readonly");
    document.getElementById("txtFecha").removeAttribute("class");
    document.getElementById("txtFecha").setAttribute("class","txtinput calendar datepicker");
    $(function() {
      $('.datepicker').datepicker({
          dateFormat: 'yy-mm-dd', 
          changeMonth: true, 
          changeYear: true, 
          yearRange: '+0:+1',
          minDate: -0, maxDate: "+3D"
          //maxDate:'+1M +10D'
      });
    });
  }
}
function validar(){
  /*alert(document.getElementById("rdSeleccionar").checked);
  if(document.getElementById("rdSeleccionar").checked){
    return true;
  }else{
    alert("Debe seleccionar un horario del listado");
    return false;
  }*/
}
</script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
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
        url: "procesos/guardarReserva.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar la reserva, intente de nuevo");
        }else if(respuesta.mensaje==1){
          alert("Reserva realizado con exito");
          location.href='?mod=imprimirreserva&id=<?php echo $_SESSION['reserva'] ?>';
        }
    });
}
$(document).ready(function(){         
  $("#submitbtn").click(function(){
    if($("input[id=rdSeleccionar]:checked").val()){
      enviarDatos();
    }else{
      alert("Seleccion un horario");
    }
  });
});
</script>


<form name="hongkiat" id="hongkiat-form">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>RESERVA DE SERVICIO</h2>
        <label>Sucursal: </label>
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
       ?>
       <label for="lstServicios">Servicio:</label>
        <select id="lstServicios" name="lstServicios" tabindex="6" class="selmenu">
            <option value="0">-- Elija servicio --</option>
            <?php 
            $conServicios=$objeto->listar_servicios();
            while($servicio=$conServicios->fetch(PDO::FETCH_OBJ)){
                echo "<option value='".$servicio->cod_servicio."'>".$servicio->nom_servicio."</option>";  
            }
            ?>
        </select>
        <label>Fecha:</label>
        <input type="text" name="txtFecha" id="txtFecha" placeholder="Seleccione una fecha" autocomplete="off" tabindex="1" class="txtinput calendar" disabled="disabled" onchange="leerDatos(document.getElementById('lstSucursal').value,this.value,document.getElementById('lstServicios').value)">
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