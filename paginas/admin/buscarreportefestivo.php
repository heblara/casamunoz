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
<script src="js/mask.js"></script>
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
       $('#txtHora').timepicker({
           showLeadingZero: false,
           onSelect: tpStartSelect
       });
       $('#timepicker_end').timepicker({
           showLeadingZero: false,
           onSelect: tpEndSelect
       });
    });

    // when start time change, update minimum for end timepicker
    function tpStartSelect( time, endTimePickerInst ) {
       $('#timepicker_end').timepicker('option', {
           minTime: {
               hour: endTimePickerInst.hours,
               minute: endTimePickerInst.minutes
           }
       });
    }

    // when end time change, update maximum for start timepicker
    function tpEndSelect( time, startTimePickerInst ) {
       $('#txtHora').timepicker('option', {
           maxTime: {
               hour: startTimePickerInst.hours,
               minute: startTimePickerInst.minutes
           }
       });
    }
    </script>
<br />
<br />
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:'yy-mm-dd'
    });
  });
</script>
<h2>GENERAR REPORTE DE DIA FESTIVO</h2>
<form name="hongkiat" id="hongkiat-form">
<div id="wrapping" class="clearfix">
  <section id="aligned" style='text-align:center;'>
    <label>Fecha del dia festivo:</label>
        <input type="text" name="txtFecReporte" id="txtFecReporte" placeholder="Fecha" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
        <br />
  	<label>Sucursal: </label>
    <select id="recipient" name="recipient" tabindex="6" class="selmenu">
        <option value="staff">-- Elija sucursal --</option>
        <option value="staff">La Joya</option>
        <option value="editor">Merliot</option>
        <option value="editor">Autopista Sur</option>
        <option value="editor">Metrosur</option>
        <option value="editor">Las Cascadas</option>
    </select><br />
    <label for="txtHora">Hora:</label>
        <input type="text" id="txtHora" placeholder='Hora' class="txtinput time" />
  </section>
  <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Generar reporte">
        <br style="clear:both;">
    </section>
</div>
</form>