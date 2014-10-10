<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:'yy-mm-dd'
    });
  });
</script>
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
<link rel="stylesheet" href="include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
    <link rel="stylesheet" href="include/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.position.min.js"></script>

    <script type="text/javascript" src="include/jquery.ui.timepicker.js?v=0.3.3"></script>

    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <style type="text/css">
        /* some styling for the page */
        body { font-size: 10px; /* for the widget natural size */ }
        #content { font-size: 1.2em; /* for the rest of the page to show at a normal size */
                   font-family: "Lucida Sans Unicode", "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
                   width: 950px; margin: auto;
        }
        .code { margin: 6px; padding: 9px; background-color: #fdf5ce; border: 1px solid #c77405; }
        fieldset { padding: 0.5em 2em }
        hr { margin: 0.5em 0; clear: both }
        a { cursor: pointer; }
        #requirements li { line-height: 1.6em; }
    </style>

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-24327002-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        function plusone_clicked() {
            $('#thankyou').fadeIn(300);
        }

        $(document).ready(function() {
            $('#floating_timepicker').timepicker({
                onSelect: function(time, inst) {
                    $('#floating_selected_time').html('You selected ' + time);
                }
            });

            $('#tabs').tabs();

        });


    </script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#txtHoraIni').timepicker({
                    showLeadingZero: false,
                    onSelect: tpStartSelect
                });
                $('#txtHoraFin').timepicker({
                    showLeadingZero: false,
                    onSelect: tpEndSelect
                });
            });

            // when start time change, update minimum for end timepicker
            function tpStartSelect( time, endTimePickerInst ) {
                $('#txtHoraFin').timepicker('option', {
                    minTime: {
                        hour: endTimePickerInst.hours,
                        minute: endTimePickerInst.minutes
                    }
                });
            }

            // when end time change, update maximum for start timepicker
            function tpEndSelect( time, startTimePickerInst ) {
                $('#txtHoraIni').timepicker('option', {
                    maxTime: {
                        hour: startTimePickerInst.hours,
                        minute: startTimePickerInst.minutes
                    }
                });
            }
        </script>
<h2>REGISTRO DE D&Iacute;A FESTIVO</h2>
<form name="hongkiat" id="hongkiat-form">
<div id="wrapping" class="clearfix">
  <section id="aligned" style='text-align:center;'>
    <label>Fecha:</label>
        <input type="text" name="txtFecReporte" id="txtFecReporte" placeholder="Fecha" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
        <br />
        <label for="txtHoraIni">Hora Inicio :</label>
        <input type="text" id="txtHoraIni" placeholder='Hora Inicial' class="txtinput time"  />
        <br />
        <label for="txtHoraFin">Hora Fin :</label>
        <input type="text" id="txtHoraFin" placeholder='Hora Final' class="txtinput time" />
        <fieldset>
  	<legend>Sucursal(es): </legend>
        <input type="checkbox" name="chkSucursal1" id="chkSucursal1" value="1">
        <label for="chkSucursal1" class='checkbox'>La Joya</label>
        <br />
        <input type="checkbox" name="chkSucursal2" id="chkSucursal2" value="2">
        <label for="chkSucursal2" class='checkbox'>Merliot</label>
        <br />
        <input type="checkbox" name="chkSucursal3" id="chkSucursal3" value="3">
        <label for="chkSucursal3" class='checkbox'>Autopista Sur</label>
        <br />
        <input type="checkbox" name="chkSucursal4" id="chkSucursal4" value="4">
        <label for="chkSucursal4" class='checkbox'>Metro Sur</label>
        <br />
        <input type="checkbox" name="chkSucursal5" id="chkSucursal5" value="5">
        <label for="chkSucursal5" class='checkbox'>Las Cascadas</label>
        </fieldset><br />
        <div id="resultado" style='background:black;font-size:15pt;'>
        <table width='100%'>
          <tr style="background:white;">
            <th>No.</th>
            <th>Fecha</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Sucursal</th>
            <th>Opcion</th>
          </tr>
          <tr style="background:silver;">
            <td>1</td>
            <td>17/06/2014</td>
            <td>08:00 a.m.</td>
            <td>12:00 p.m.</td>
            <td>Merliot, La Joya</td>
            <td><img src='img/edit.png' /></td>
          </tr>
          <tr style="background:white;">
            <td>2</td>
            <td>06/08/2014</td>
            <td>09:00 a.m.</td>
            <td>12:00 p.m.</td>
            <td>Las Cascadas, Merliot, Metrosur</td>
            <td><img src='img/edit.png' /></td>
          </tr>
          <tr style="background:silver;">
            <td>3</td>
            <td>24/12/2014</td>
            <td>09:00 a.m.</td>
            <td>01:00 p.m.</td>
            <td>Metro Sur, Merliot, La Joya</td>
            <td><img src='img/edit.png' /></td>
          </tr>
        </table>
      </div>
  </section>
  <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Modificar">
        <br style="clear:both;">
    </section>
</div>
</form>