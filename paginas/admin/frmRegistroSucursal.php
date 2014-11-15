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
    nombre=document.getElementById('txtNombre').value;
    direccion=document.getElementById('txtDireccion').value;
    telefono=document.getElementById('txtTelefono').value;
    correo=document.getElementById('txtCorreo').value;
	departamento=document.getElementById('paises').value;
	municipio=document.getElementById('estados').value;
	msg="";
    error=false;
    if(nombre=="" || nombre==null){
        msg+='* Nombre';
        alert("Ingrese el nombre de la sucursal");
        //#hongkiat-form input.name
        document.getElementsByName('txtNombre').style="border-color:#F80303;";
        document.getElementById('txtNombre').focus();
        error=true;
    }else if(direccion=="" || direccion==null){
        msg+='* Direccion';
        alert("Ingrese la direccion");
        //#hongkiat-form input.name
        document.getElementsByName('txtDireccion').style="border-color:#F80303;";
        document.getElementById('txtDireccion').focus();
        error=true;
    }else if(telefono=="" || telefono==null){
        msg+='* Telefono';
        alert("Ingrese el Telefono de la Sucursal");
        //#hongkiat-form input.name
        document.getElementsByName('txtTelefono').style="border-color:#F80303;";
        document.getElementById('txtTelefono').focus();
        error=true;
    }else if(correo=="" || correo==null){
        msg+='* Correo ';
        alert("Ingrese el correo");
        //#hongkiat-form input.name
        document.getElementsByName('txtCorreo').style="border-color:#F80303;";
        document.getElementById('txtCorreo').focus();
        error=true;
    }else if(!validarEmail(document.getElementById("txtCorreo").value)){ // validamos el correo valido
		alert("Ingrese un correo valido");
		error=true;
	}else if(departamento==0){
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
    }
	
    if(error==true){
      return false;
    }else{
      //enviarDatos();
      return true;
    }
}



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
        url: "procesos/guardarSucursal.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
          document.getElementById('hongkiat-form').reset();
          document.getElementById('txtNombre').focus();
        }else if(respuesta.mensaje==2){
          alert("No fue posible registrar el servicio");
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
<script src="js/mask.js"></script>
<script>
  jQuery(function($){
     $("#txtTelefono").mask("9999-9999");   
  });
</script>
<form name="hongkiat" id="hongkiat-form" method="post" action="#" onsubmit="return false;">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>REGISTRO DE SUCURSALES</h2>
        <label>Nombre de Sucursal:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de Sucursal" autocomplete="off" tabindex="1" class="txtinput offer">
        <br />
        <label>Direccion:</label>
       <textarea name="txtDireccion" id="txtDireccion" style="width:40%;" placeholder="Direccion" tabindex="5" class="txtblock"></textarea>
        <label>Telefono:</label>
        <input type="text" name="txtTelefono" id="txtTelefono" placeholder="Telefono" autocomplete="off" tabindex="1" class="txtinput offer" >  
        <br/>
        <label>Correo:</label>
        <input type="text" name="txtCorreo" id="txtCorreo" placeholder="ejemplo@casamunoz.com" autocomplete="off" tabindex="1" class="txtinput offer">
        <br />

		
		
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
		
     
        <br />
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
