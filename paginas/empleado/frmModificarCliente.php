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
        url: "procesos/actualizarCliente.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Actualizacion realizado con exito");
        }else if(respuesta.mensaje==2){
          alert("No fue posible actualizar el empleado");
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
<?php 
if(isset($_GET['id'])){
    $id=base64_decode($_GET['id']);
    $obj=new CasaMunoz;
    $consCliente=$obj->mostrar_cliente($id);
    $resCliente=$consCliente->fetch(PDO::FETCH_OBJ);
}
?>
<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>MODIFICACI&Oacute;N DE CLIENTES</h2>
		<label>Codigo:</label>
        <input type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $resCliente->cod_cliente ?>" class="txtinput id" readonly="readonly">
        <label>Primer Nombre:</label>
        <input type="text" name="txtNombre1" id="txtNombre1" placeholder="Primer nombre" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resCliente->primer_nom; ?>">
        <label>Segundo Nombre:</label>
        <input type="text" name="txtNombre2" id="txtNombre2" placeholder="Segundo nombre" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resCliente->segundo_nom; ?>">
        <label>Primero Apellido:</label>
        <input type="text" name="txtApellido1" id="txtApellido1" placeholder="Primer apellido" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resCliente->primer_ape; ?>">
        <label>Segundo Apellido:</label>
        <input type="text" name="txtApellido2" id="txtApellido2" placeholder="Segundo apellido" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resCliente->segundo_ape; ?>">
        <label>Genero:</label>
        <?php 
        $m='';
        $f='';
        if($resCliente->genero_cliente=='M'){
            $m=' selected ';
        }else if($resCliente->genero_cliente=='F'){
            $f=' selected ';
        }
        ?>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F" <?php echo $f ?>>Femenino</option>
            <option value="M" <?php echo $m ?>>Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <?php echo $resCliente->fecha_nac ?>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" value="<?php echo $resCliente->fec_nac; ?>">
        <label>Departamento: </label>
           <script type="text/javascript" src="funciones/select_dependientes.js"></script>>
    <?php 
      $consultarDepartamentos=$obj->consultar_departamentos();
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
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="4" class="txtinput telephone" value="<?php echo $resCliente->tel_cliente ?>">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="2" class="txtinput email" value="<?php echo $resCliente->correo_cliente ?>">
        <label>Di&aacute;betico:</label>
		 <?php 
        $si='';
        $no='';
        if($resCliente->diabetico_cliente=='si'){
            $si=' checked ';
        }else if($resCliente->diabetico_cliente=='no'){
            $no=' checked ';
        }
        ?>
      	
        <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio" Value="si" <?php echo $si ?>><label for='rdDiabetico'>SI</label>
       <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio" value="no" <?php echo $no ?> ><label for='rdDiabetico'>NO</label><br><br>
		<label>Otras enfermedades:</label>
       <textarea name="txtenfer" id="txtenfer" placeholder="Otras enfermedades..." tabindex="5" class="txtblock"><?php echo $resCliente->enfer_cliente; ?></textarea>
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
