<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">


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
<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>REGISTRO DE CLIENTES</h2>
       <label>Codigo Cliente:</label>
        <input type="text" name="txtCodigo" id="txtCodigo" placeholder="Codigo Cliente" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Primer Nombre:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Primer nombre" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Nombre:</label>
        <input type="text" name="txtNombre2" id="txtNombre2" placeholder="Segundo nombre" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Primero Apellido:</label>
        <input type="text" name="txtApellidos" id="txtApellido" placeholder="Primer apellido" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Apellido:</label>
        <input type="text" name="txtApellido2" id="txtApellido2" placeholder="Segundo apellido" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Genero:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
         <label>Direcci&oacute;n:</label>
        <textarea name="txtDireccion" id="txtDireccion" placeholder="Direcci&oacute;n..." tabindex="11" class="txtblock"></textarea>
        <label>Tel&eacute;fono:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="4" class="txtinput telephone">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="2" class="txtinput email">
        <label>Di&aacute;betico:</label>
        <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio"><label for='rdDiabetico'>Si</label>
        <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio"><label for='rdDiabetico'>No</label>
        <label>Enfermedad:</label>
        <input type="text" name="txtenfer" id="txtCodigo" placeholder="Enfermedad del Cliente" autocomplete="off" tabindex="1" class="txtinput name">
       
        
        <label>Municipio: </label>          
    <?php 

      $objeto=new CasaMunoz;
      $consultarMunicipio=$objeto->consultar_municipio();
      echo "<select name='municipio' id='municipio' onChange='cargaContenido(this.id)' class='selmenu'>";
      echo "<option value='0'>Seleccione una opcion</option>";

      while($muni=$consultarMunicipio->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$muni->cod_municipio."'>".$muni->nom_municipio."</option>";
      }
      echo "</select>";
   ?>
        
    </div>
    <section id="buttons">
        <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Limpiar">
        <input type="button" name="submit" id="submitbtn" class="submitbtn" tabindex="" value="Guardar" onclick="alert('Registro realizado satisfactoriamente');">
        <br style="clear:both;">
    </section>
</form>