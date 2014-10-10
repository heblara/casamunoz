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

</head>
<body>
<?php
    function generaMedioComunicacion()
	{
	    $objMedio=new Noticias;
	    $consultar=$objMedio->consultar_medio_comunicacion();
	    echo "<select name='lstMedio' id='lstMedio' onChange='leerDatos(this.options[this.selectedIndex].value,document.hongkiat.lstTipo.options[document.hongkiat.lstTipo.selectedIndex].value);'>";
		echo "<option value='0'>Elige</option>";
	    while ($data = $consultar->fetch(PDO::FETCH_OBJ))
		{
			echo "<option value='".$data->idMedioComunicacion."'>".$data->Nombre."</option>";
		}
		echo "</select>";
	}
?>
<script src="js/mask.js"></script>
<script>

jQuery(function($){
 $("#txtDUI").mask("99999999-9");   
});

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
<h2>Reserva realizada</h2>
<form name="hongkiat" id="hongkiat-form">
<div id="wrapping" class="clearfix">
  <section id="aligned" style='text-align:center;'>
    <div id="resultado" style='background:black;'>
    	<table width='100%' style="font-size:12pt;">
    		<tr style="background:white;">
    			<th>No.</th>
    			<th>Fecha</th>
    			<th>Hora</th>
    			<th>Nombre del Pedicurista</th>
    			<th>Sucursal</th>
          <th>Estado</th>
    			<th>Accion</th>
    		</tr>
    		<tr style="background:silver;">
    			<td>1</td>
    			<td>30/05/2014</td>
    			<td>10:00 a.m.</td>
    			<td>Roxana Larios</td>
    			<td>Las Cascadas</td>
          <td>Finalizada</td>
    			<td></td>
    		</tr>
        <tr style="background:white;">
          <td>2</td>
          <td>29/08/2014</td>
          <td>02:30 p.m.</td>
          <td>Maria Andrade</td>
          <td>La Joya</td>
          <td>Pendiente</td>
          <td><a href='?mod=reprogramarreserva'><img src="images/clock.png" title="Reprogramar" /></a></td>
        </tr>
    	</table>
    </div>
  </section>
</div>
</form>