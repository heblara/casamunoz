<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">

function validarEmail(valor) {
  if (/(\w+)(\.?)(\w*)(\@{1})(\w+)(\.?)(\w*)(\.{1})(\w{2,3})/.test(valor)){
  return true;
  } else {
  return false;
  }
}


function validar(){
    nombre1=document.getElementById('txtNombre1').value;
    apellido1=document.getElementById('txtApellido1').value;
    dui=document.getElementById('txtDUI').value;
    nit=document.getElementById('txtNIT').value;
    genero=document.getElementById('lstGenero').value;
    fecnac=document.getElementById('txtFecNac').value;
    cargo=document.getElementById('lstCargo').value;
    sucursal=document.getElementById('lstSucursal').value;
    paises=document.getElementById('paises').value;
	municipio=document.getElementById('estados').value;
    direccion=document.getElementById('txtDireccion').value;
    telfijo=document.getElementById('txtTelFijo').value;
    telmovil=document.getElementById('txtTelMovil').value;
    correo=document.getElementById('txtCorreo').value;
    fecini=document.getElementById('txtFecIni').value;
    fecfin=document.getElementById('txtFecFin').value;
    msg="";
    error=false;
    if(nombre1=="" || nombre1==null){
        msg+='* Primer Nombre';
        alert("Ingrese primer nombre");
        //#hongkiat-form input.name
        document.getElementsByName('txtNombre1').style="border-color:#F80303;";
        document.getElementById('txtNombre1').focus();
        error=true;
    }else if(apellido1=="" || apellido1==null){
        msg+='* Primer Apellido';
        alert("Ingrese primer Apellido");
        //#hongkiat-form input.name
        document.getElementsByName('txtApellido1').style="border-color:#F80303;";
        document.getElementById('txtApellido1').focus();
        error=true;
    }else if(dui==null || dui==""){
        msg+='* DUI';
        alert("Ingrese Numero de DUI");
        //#hongkiat-form input.name
        document.getElementsByName('txtDUI').style="border-color:#F80303;";
        document.getElementById('txtDUI').focus();
        error=true;
    }else if(nit==null || nit==""){
        msg+='* NIT';
        alert("Ingrese Numero de NIT");
        //#hongkiat-form input.name
        document.getElementsByName('txtNIT').style="border-color:#F80303;";
        document.getElementById('txtNIT').focus();
        error=true;
    }else if(genero==0){
        msg+='* Genero';
        alert("Seleccione un genero");
        //#hongkiat-form input.name
        document.getElementsByName('lstGenero').style="border-color:#F80303;";
        error=true;
    }else if(fecnac==null || fecnac==""){
        msg+='* Fecha nacimiento';
        alert("Ingrese fecha de nacimiento");
        //#hongkiat-form input.name
        document.getElementsByName('txtFecNac').style="border-color:#F80303;";
        document.getElementById('txtFecNac').focus();
        error=true;
    }else if(cargo==0){
        msg+='* Cargo';
        alert("Seleccione un cargo");
        //#hongkiat-form input.name
        document.getElementsByName('lstCargo').style="border-color:#F80303;";
        error=true;
    }else if(sucursal==0){
        msg+='* Sucursal';
        alert("Seleccione sucursal");
        //#hongkiat-form input.name
        document.getElementsByName('lstSucursal').style="border-color:#F80303;";
        error=true;
    }else if(paises==0){
        msg+='* Departamento';
        alert("Seleccion un Departamento");
        //#hongkiat-form input.name
        document.getElementsByName('paises').style="border-color:#F80303;";
        error=true;
    }else if(municipio==0){
        msg+='* Municipio';
        alert("Seleccion un Municipio");
        //#hongkiat-form input.name
        document.getElementsByName('estados').style="border-color:#F80303;";
        error=true;
    }else if(direccion==null || direccion==""){
        msg+='* Direccion';
        alert("Ingrese direccion");
        //#hongkiat-form input.name
        document.getElementsByName('txtDireccion').style="border-color:#F80303;";
        document.getElementById('txtDireccion').focus();
        error=true;
    }else if(fecini==null || fecini==""){
        msg+='* Fecha inicio';
        alert("Ingrese fecha de inicio de contrato");
        //#hongkiat-form input.name
        document.getElementsByName('txtFecIni').style="border-color:#F80303;";
        document.getElementById('txtFecIni').focus();
        error=true;
    }else if(!validarEmail(document.getElementById("txtCorreo").value)){ // validamos el correo valido
		alert("Ingrese un correo valido");
		error=true;
	}

    if(error==true){
      return false;
    }else{
      //enviarDatos();
      return true;
    }
}
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
        url: "procesos/guardarEmpleado.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar el empleado");
        }else if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
          document.getElementById('hongkiat-form').reset();
          document.getElementById('txtNombre1').focus();
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
<script>
  $(function() {
      $( "#txtFecIni" ).datepicker({
        defaultDate: "+1w",
        dateFormat:'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1,
        minDate: "+0D",
        onClose: function( selectedDate ) {
          $( "#txtFecFin" ).datepicker( "option", "minDate", selectedDate );
        }
      });
      $( "#txtFecFin" ).datepicker({
        defaultDate: "+1w",
        dateFormat:'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
          $( "#txtFecIni" ).datepicker( "option", "maxDate", selectedDate );
        }
      });
    });
    /*$(function() {
      $('#txtFecIni').datepicker({
        dateFormat: 'yy-mm-dd', 
        changeMonth: true, 
        changeYear: true, 
        //yearRange: '-90:-18',
        minDate: '-100Y', maxDate: "+0D"
      });
    });
    $(function() {
      $('#txtFecFin').datepicker({
        dateFormat: 'yy-mm-dd', 
        changeMonth: true, 
        changeYear: true, 
        //yearRange: '-90:-18',
        minDate: document.getElementById('txtFecIni').value, maxDate: "+10Y"
      });
    });*/
  $(function() {
      $('#txtFecNac').datepicker({
            dateFormat: 'yy-mm-dd', 
            changeMonth: true, 
            changeYear: true, 
            yearRange: '-90:-18',
            minDate: '-100Y', maxDate: "-18Y +0D"
      });
    });
</script>
<script src="js/mask.js"></script>
<script>
  jQuery(function($){
     $("#txtDUI").mask("99999999-9");
     $("#txtTelFijo").mask("9999-9999");
     $("#txtTelMovil").mask("9999-9999");
  });
</script>
<script>
  jQuery(function($){
     $("#txtNIT").mask("9999-999999-999-9");   
  });
</script>
<form name="hongkiat" id="hongkiat-form" method="post" action="#" onsubmit="return false;">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
            <h2>REGISTRO DE EMPLEADOS</h2>
        <label>Primer Nombre:</label>
        <input type="text" name="txtNombre1" id="txtNombre1" placeholder="Primer Nombre" MaxLength="45" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Nombre:</label>
        <input type="text" name="txtNombre2" id="txtNombre2" placeholder="Segundo Nombre" MaxLength="45" autocomplete="off" tabindex="2" class="txtinput name">
        <label>Primer Apellido:</label>
        <input type="text" name="txtApellido1" id="txtApellido1" placeholder="Primero Apellido" MaxLength="45" autocomplete="off" tabindex="3" class="txtinput name">
        <label>Segundo Apellido:</label>
        <input type="text" name="txtApellido2" id="txtApellido2" placeholder="Segundo Apellido" MaxLength="45" autocomplete="off" tabindex="4" class="txtinput name">
        <label>DUI:</label>
        <input type="text" name="txtDUI" id="txtDUI" placeholder="Documento &Uacute;nico de Identidad" autocomplete="off" tabindex="5" class="txtinput id">
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="N&uacute;mero de NIT" autocomplete="off" tabindex="6" class="txtinput id">
        <label>Genero:</label>
        <select id="lstGenero" name="lstGenero" tabindex="7" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="8" class="txtinput calendar">
        <label>Cargo: </label>
            <?php 
      $objeto=new CasaMunoz;
      $consultarcargos=$objeto->consultar_cargos();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstCargo' id='lstCargo' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

   while($cargo=$consultarcargos->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$cargo->cod_cargo."'>".$cargo->nom_cargo."</option>";
      }
      echo "</select>";
   ?>
        <label>Sucursal: </label>
        <?php 
      $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_sucursal();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstSucursal' id='lstSucursal' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$sucu->cod_sucursal."'>".$sucu->nom_sucursal."</option>";
      }
      echo "</select>";
   ?>
        <label>Departamento: </label>
<script type="text/javascript" src="funciones/select_dependientes.js"></script>>
    <?php 
      $objeto=new CasaMunoz;
      $consultarDepartamentos=$objeto->consultar_departamentos();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='paises' id='paises' onChange='cargaContenido(this.id)' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($registro=$consultarDepartamentos->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$registro->cod_dpto."'>".$registro->nom_dpto."</option>";
      }
      echo "</select>";
   ?>
        <label>Municipio: </label>
        <span id="demoDer">
        <select disabled="disabled" name="estados" id="estados" class='selmenu'>
          <option value="0">Selecciona opci&oacute;n...</option>
      </select>
        </span>
        <label>Direcci&oacute;n:</label>
        <textarea name="txtDireccion" id="txtDireccion" placeholder="Direcci&oacute;n..." tabindex="11" class="txtblock"></textarea>
        <label>Tel&eacute;fono fijo:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" MaxLength="9" tabindex="12" class="txtinput telephone">
        <label>Tel&eacute;fono movil:</label>
        <input type="tel" name="txtTelMovil" id="txtTelMovil" placeholder="Telefono movil" MaxLength="9" tabindex="13" class="txtinput telephone">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" MaxLength="60" autocomplete="off" tabindex="14" class="txtinput email">
        <!--<label>Cubiculo:</label>
        <?php 
          $objeto=new CasaMunoz;
          $consultarsucu=$objeto->consultar_cubiculo();
          //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
          // Voy imprimiendo el primer select compuesto por los paises
          //echo $consultarDepartamentos->rowCount();
          echo "<select name='lstCubiculo' id='lstCubiculo' class='selmenu'>";
          echo "<option value='NULL'>Elige</option>";

          while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
          {
            echo "<option value='".$sucu->cod_cubiculo."'>".$sucu->cod_cubiculo."</option>";
          }
          echo "</select>";
       ?>-->
       <label>Fecha Inicio Contrato:</label>
        <input type="text" name="txtFecIni" id="txtFecIni" placeholder="Fecha Inicio de Contrato" autocomplete="off" tabindex="16" class="txtinput calendar datepicker">
        <label>Fecha Fin Contrato:</label>
        <input type="text" name="txtFecFin" id="txtFecFin" placeholder="Fecha Fin de Contrato" autocomplete="off" tabindex="17" class="txtinput calendar datepicker">
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
