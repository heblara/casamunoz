<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script>
   $(function() {
	$('.datepicker').datepicker({
	dateFormat: 'yy-mm-dd', 
	changeMonth: true, 
	changeYear: true, 
	yearRange: '-40:+0'
	});
		});
</script>
<script language="JavaScript">
var objeto = false;
function procesaResultado() {
// Si aun esta revisando los datos...
if (objeto.readyState == 1) {
//  document.getElementById('resultado').innerHTML = "Cargando datos con ajax...";
  document.getElementById('resultado').innerHTML = "<td colspan='6'><img src='img/load.gif' title='Cargando datos' width='32' />";
}
// Si el estado es 4 significa que ya termino
if (objeto.readyState == 4) {
  // objeto.responseText trae el Resultado que metemos al DIV de arriba
  document.getElementById('resultado').innerHTML = objeto.responseText;
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

function cargarInfo(valor) {
  alert(valor);
  crearObjeto();
  if (objeto.readyState != 0) {
    alert('Error al crear el objeto XML. El Navegador no soporta AJAX');
  } else {
    // Preparar donde va a recibir el Resultado
    objeto.onreadystatechange = procesaResultado;
var ca=/^[ ]{1}/;
var com=ca.test(valor);
  if((!com=="") || (valor=="")){document.getElementById("resultado").innerHTML="";}else{
  // Enviar la consulta
      objeto.open("GET", "paginas/cargarInfo.php?&valor=" + valor, true);
      objeto.send(null);
  }
    
  }
}
// ------------------------------
</script>
<script src="js/mask.js"></script>
<script>
  jQuery(function($){
     $("#txtDUI").mask("99999999-9");   
  });
</script>
<script>
  jQuery(function($){
     $("#txtNIT").mask("9999-999999-999-9");   
  });
</script>
<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>FACTURA</h2>
        <label>No.:</label>
        <input type="text" name="txtNoFact" id="txtNoFact" placeholder="Numero de factura" autocomplete="off" tabindex="1" class="txtinput money">
        <label>Registro No.:</label>
        <input type="text" name="txtRegistro" id="txtRegistro" placeholder="No. Registro" autocomplete="off" tabindex="1" class="txtinput name" disabled="disabled" value="80742-7" >
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="Numero de NIT" autocomplete="off" tabindex="1" class="txtinput id" value="0614-180894-105-2">
        <fieldset>
          <legend>Servicios ejecutados este d&iacute;a</legend>
          <table style="font-size:12pt;border:1px solid;" border="1" width="100%">
          <?php 
          $objeto=new Casamunoz;
          $consReservas=$objeto->consultar_reservas_ejecutadas($_SESSION['sucursal']);
          $i=0;
          while($reserva=$consReservas->fetch(PDO::FETCH_OBJ)){
            $i++;
            if($i==0){
              echo "<tr>
              <th>Cod</th>
            <th>Servicio</th>
            <th>Hora</th>
            <th>Pedicurista</th>
            <th>Cliente</th>
            <th>Seleccionar</th>
          </tr>";
            }
            echo "<tr>
            <td>".$reserva->cod_rsv."</td>
            <td>".$reserva->nom_servicio."</td>
            <td>".$reserva->hora_rsv."</td>
            <td>".$reserva->NombreCompletoEmpleado."</td>
            <td>".$reserva->NombreCompletoCliente."</td>
            <td><input type='radio' class='radio' name='rdSeleccionar' id='rdSeleccionar' value='".$reserva->cod_servicio."' /></td>
          </tr>";
          ?>
          <?php
          }
          ?>
          <tr><td colspan="6" align="center"><input type="button" value="Seleccionar" class="submitbtn" onclick="cargarInfo(document.getElementById('rdSeleccionar').value)" /></td></tr>
          </table>
        </fieldset>
        <fieldset>
          <legend>Detalle</legend>
          <div id='resultado'>
          <table width='100%' style="font-size:12pt;">
            <tr style="background:white;">
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Total</th>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
          </div>
        </fieldset>
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Limpiar">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="" value="Guardar">
        <br style="clear:both;">
    </section>
</form>