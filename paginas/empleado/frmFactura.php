<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript" src="js/jquery.blockUI.js"></script>


<script type="text/javascript">
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
        url: "procesos/guardarFactura.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar la entrada");
        }else if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
          location.reload();
     // document.getElementById('hongkiat-form').reset();
         }
    });
}

$(document).ready(function(){         
  $("#submitbtn").click(function(){
        enviarDatos();
        return false;
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
function calcular(cantidad){
    alert(cantidad);
    var precio=document.getElementById('txtPrecio').value;
    var descuento=document.getElementById('txtDescuento').value;
    var subtotal=(cantidad*precio);
    var total=subtotal-(subtotal*descuento);
    alert(total);
    document.getElementById('txtTotal').value=total;
}
function cargarInfo(valor,desc) {
  //alert(valor);
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
          objeto.open("GET", "paginas/cargarInfo.php?&valor=" + valor + "&desc="+desc, true);
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
<form name="hongkiat" id="hongkiat-form" method="post" action="#" onsubmit="return false;">
    <div id="wrapping" class="clearfix">
<?php
      $ObjSucu=new CasaMunoz;
		$consSucu=$ObjSucu->consultar_factura($_SESSION['sucursal']);
		//$resID=$consSucu->fetch(PDO::FETCH_OBJ);
		$mayor=0;
		$codigo="";
		$num=0;
		$cod="";
		$consSucu1=$ObjSucu->consultar_sucursal_unica($_SESSION['sucursal']);
		$letraSucu=$resSucu1=$consSucu1->fetch(PDO::FETCH_OBJ);
		$letraSucu1=substr(preg_replace('[\s+]',"",($resSucu1->nom_sucursal)),  0,3);
		//$cadena = preg_replace('[\s+]',"", $letraSucu1);
		
    //$mayor=$resID->last_id;
    if($consSucu->rowCount()>0){
    while($resID=$consSucu->fetch(PDO::FETCH_OBJ)){
    if(substr($resID->num_factura, 4,3)>$mayor){
      $mayor=substr($resID->num_factura, 4,3);
      }
    }
			 $mayor++;
			if($mayor>0 && $mayor<10){
				$cod="000".$mayor;
			}else if($mayor>=10 && $mayor<100){
				$cod="00".$mayor;
			}else if($mayor>=100 && $mayor<1000){
				$cod="0".$mayor;
      }else{
        $cod="0001";
       }
		}else{
			$cod="0001";
		}

		$codigo=$letraSucu1.$cod;
?>  
        <section id="aligned">
        <h2>FACTURA</h2>
        <label>No.:</label>
        <input type="text" name="txtNoFact" id="txtNoFact" placeholder="Numero de factura" autocomplete="off" tabindex="1" class="txtinput money" 
		value= "<?php echo $codigo; ?>" readonly >
        <label>Registro No.:</label>
        <input type="text" name="txtRegistro" id="txtRegistro" placeholder="No. Registro" autocomplete="off" tabindex="1" class="txtinput name" disabled="disabled" value="80742-7" >
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="Numero de NIT" autocomplete="off" tabindex="1" class="txtinput id" value="0614-180894-105-2">
        <label>Descuento:</label>
        <input type="text" name="txtDescuento" id="txtDescuento" placeholder="Descuento" autocomplete="off" tabindex="1" class="txtinput id" value="0">
        <fieldset>
          <legend>Servicios ejecutados este d&iacute;a</legend>
          <table style="font-size:12pt;border:1px solid;" border="1" width="100%">
          <?php 
          $objeto=new Casamunoz;
          $consReservas=$objeto->consultar_reservas_ejecutadas($_SESSION['sucursal']);
          $i=0;
          while($reserva=$consReservas->fetch(PDO::FETCH_OBJ)){
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
            $i++;
            echo "<tr>
            <td>".$reserva->cod_rsv."</td>
            <td>".$reserva->nom_servicio."</td>
            <td>".$reserva->hora_rsv."</td>
            <td>".$reserva->NombreCompletoEmpleado."</td>
            <td>".$reserva->NombreCompletoCliente."</td>
            <td><input type='radio' class='radio' name='rdSeleccionar' id='rdSeleccionar' value='".$reserva->cod_rsv."' onclick='cargarInfo(this.value,document.getElementById(\"txtDescuento\").value)' /></td>
          </tr>";
          ?>
          <?php
          }
          ?>
          <tr><td colspan="6" align="center"><input type="button" value="Seleccionar" class="submitbtn" onclick="cargarInfo(document.getElementById('rdSeleccionar').checked)" /></td></tr>
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
