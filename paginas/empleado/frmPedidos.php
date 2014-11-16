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
  <h2> HOJA DE PEDIDOS</h2>
    <h3>Nombre de supervisora:</h3>
    <div id="dui" style='display:;clear:both;'> 
  		<input type="text" name="txtSupervisora" class="search txtinput" id="txtSupervisora" placeholder="nombre, apellido, usuario" autocomplete="off" tabindex="1" style="width:25%;" value="SUPERVISORA ANDREA">
  	</div>
    <h3>Fecha de pedido:</h3>
    <input type="text" name="txtFecha" class="datepicker calendar txtinput" id="txtFecha" placeholder="Fecha a buscar" autocomplete="off" tabindex="1">
    <h3>Sucursal:</h3>
    <div id="dui" style='display:;clear:both;'> 
      <input type="text" name="txtSucursal" class="search txtinput" id="txtSucursal" placeholder="nombre, apellido, usuario" autocomplete="off" tabindex="1" style="width:25%;" value="LA JOYA">
    </div>

    <div id="resultado" style='background:black;'>
    	<table width='100%' style="font-size:12pt;">
    		<tr style="background:white;">
    			<th>Cantidad</th>
    			<th>Descripcion</th>
    			<th>Si</th>
    			<th>No</th>
    		</tr>
    		<tr style="background:silver;">
          <td>Litro</td>
    			<td>Ablandador</td>
    			<td><input type="radio" name="rdSi1"  checked="checked" /></td>
    			<td><input type="radio" name="rdSi1" /></td>
    		</tr>
    		<tr style="background:white;">
          <td>4 onzas</td>
          <td>Acetona</td>
          <td><input type="radio" name="rdSi2" /></td>
          <td><input type="radio" name="rdSi2" checked="checked" /></td>
    		</tr>
    		<tr style="background:silver;">
    			<td>4 onzas</td>
          <td>Agua oxigenada</td>
          <td><input type="radio" name="rdSi3" checked="checked" /></td>
          <td><input type="radio" name="rdSi3" /></td>
    		</tr>
    	</table>
    </div>
  </section>
</div>
</form>
