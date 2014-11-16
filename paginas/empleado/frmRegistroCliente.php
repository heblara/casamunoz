<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">


function validar(){
    nombre1=document.getElementById('txtNombre1').value;
	apellido1=document.getElementById('txtApellido1').value;
	genero=document.getElementById('lstGenero').value;
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
    }else if(genero==0){
        msg+='* Genero';
        alert("Seleccione un genero");
        //#hongkiat-form input.name
        document.getElementsByName('lstGenero').style="border-color:#F80303;";
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
        url: "procesos/guardarCliente.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar el empleado");
        }else if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
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
      $('.datepicker').datepicker({
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
     $("#txtTelFijo").mask("9999-9999");   
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
        <h2>REGISTRO DE CLIENTES</h2>
        <label>Primer Nombre:</label>
        <input type="text" name="txtNombre1" id="txtNombre1" placeholder="Primer nombre" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Nombre:</label>
        <input type="text" name="txtNombre2" id="txtSegundoNombre" placeholder="Segundo nombre" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Primero Apellido:</label>
        <input type="text" name="txtApellido1" id="txtApellido1" placeholder="Primer apellido" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Apellido:</label>
        <input type="text" name="txtApellido2" id="txtSegundoApellido" placeholder="Segundo apellido" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Genero:</label>
        <select id="lstGenero" name="lstGenero" tabindex="6" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
    
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
        <label>Tel&eacute;fono:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="4" class="txtinput telephone">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="2" class="txtinput email">
        <label>Di&aacute;betico:</label>
        <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio" value="SI"><label for='rdDiabetico'>Si</label>
       <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio" value="NO"><label for='rdDiabetico'>No</label><br><br>
		<label>Otras enfermedades:</label>
       <textarea name="txtenfer" id="txtenfer" style="width:40%;" placeholder="Otras enfermedades..." tabindex="5" class="txtblock"></textarea>
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
