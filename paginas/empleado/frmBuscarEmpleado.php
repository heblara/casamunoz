<script type="text/javascript" src="js/calendar/scripts/epoch_classes.js"></script>
<link rel="stylesheet" type="text/css" href="js/calendar/epoch_styles.css" />
<script language="JavaScript">
var objeto = false;
function procesaResultado() {
// Si aun esta revisando los datos...
if (objeto.readyState == 1) {
//  document.getElementById('resultado').innerHTML = "Cargando datos con ajax...";
  document.getElementById('resultado').innerHTML = "<td colspan='6'><img src='paginas/5-0.gif' title='Cargando datos' width='32' />";
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

function leerDatos(valor,sel,opcion) {
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
	    objeto.open("GET", "paginas/busqueda.php?opc="+sel+"&usuario=" + valor + "&inscrito="+opcion, true);
	    objeto.send(null);
	}
    
  }
}
function leerDatosPag(valor,sel,pag,opcion) {
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
	    objeto.open("GET", "paginas/busqueda.php?opc="+sel+"&usuario=" + valor + "&pagina="+pag+ "&inscrito="+opcion, true);
	    objeto.send(null);
	}
    
  }
}
// ------------------------------
</script>

<script type='text/javascript' language='Javascript'>
function seleccionar(){
	/*document.getElementById("cargarCaja").style="display:none;";
	document.getElementById("fecha").style.diplay="none";*/
	var tipo=document.hongkiat.lstTipo.options[document.hongkiat.lstTipo.selectedIndex].value;
	//document.getElementById("txtFecha").style="display:none;";
	document.getElementById("dui").style.display="none";
	if(tipo==1){
		document.getElementById("cargarCaja").style.display="none";
		document.getElementById("dui").style.display="";
	}else if(tipo==2){
		document.getElementById("cargarCaja").innerHTML="<input type='text' name='txtTarjeta' onKeyPress='leerDatos(document.hongkiat.txtTarjeta.value,document.hongkiat.lstTipo.value,document.hongkiat.inscrito.value);' class='id txtinput' id='txtTarjeta' placeholder='Digite el numero de Tarjeta' autocomplete='off' tabindex='1' style='width:25%;'>";
	}else if(tipo==3){
		document.getElementById("cargarCaja").innerHTML="<input type='text' name='txtNombre' onKeyPress='leerDatos(document.hongkiat.txtNombre.value,document.hongkiat.lstTipo.value,document.hongkiat.inscrito.value);' class='id txtinput' id='txtNombre' placeholder='Digite el nombre a buscar' autocomplete='off' tabindex='1' style='width:25%;'>";
	}else{
		document.getElementById("cargarCaja").innerHTML="";
	}
}
</script>
<br />
<br />
<form name="hongkiat" id="hongkiat-form">
<div id="wrapping" class="clearfix">
  <section id="aligned" style='text-align:center;'>
    <h3>Digite t&eacute;rmino a buscar:</h3>
	<div id="cargarCaja" style="clear:both;"></div>
    <div id="dui" style='display:;clear:both;'> 
		<input type="text" name="txtBuscar" onKeyPress="leerDatos(this.value,document.hongkiat.lstTipo.value,document.hongkiat.inscrito.value);" class="search txtinput" id="txtBuscar" placeholder="nombre, apellido, usuario" autocomplete="off" tabindex="1" style="width:25%;">
	</div>
    <div id="resultado" style='background:black;font-size:12pt;'>
    	<table width='100%'>
    		<tr style="background:white;">
    			<th>Apellidos</th>
    			<th>Nombres</th>
    			<th>Dia libre</th>
          <th>Jornada</th>
    		</tr>
    		<tr style="background:silver;">
    			<td>Martinez</td>
    			<td>Rosa</td>
    			<td>15-08-2014</td>
          <td>
            <input type="checkbox" value="manana" checked="checked">Ma&ntilde;ana
            <input type="checkbox" value="tarde">Tarde
          </td>
    		</tr>
    		<tr style="background:white;">
    			<td>Andrade</td>
          <td>Maria</td>
          <td>16-08-2014</td>
          <td>
            <input type="checkbox" value="manana" checked="checked">Ma&ntilde;ana
            <input type="checkbox" value="tarde"  checked="checked">Tarde
          </td>
    		</tr>
    		<tr style="background:silver;">
    			<td>Larin</td>
    			<td>Roxana</td>
    			<td>17-08-2014</td>
          <td>
            <input type="checkbox" value="manana" checked="checked">Ma&ntilde;ana
            <input type="checkbox" value="tarde" checked="checked">Tarde
          </td>
    		</tr>
    	</table>
    </div>
  </section>
</div>
</form>