<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
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
        <label>Primer Nombre:</label>
        <input type="text" name="txtNombres" id="txtNombres" placeholder="Primer nombre" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Nombre:</label>
        <input type="text" name="txtNombres" id="txtNombres" placeholder="Segundo nombre" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Primero Apellido:</label>
        <input type="text" name="txtApellidos" id="txtApellidos" placeholder="Primer apellido" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Apellido:</label>
        <input type="text" name="txtApellidos" id="txtApellidos" placeholder="Segundo apellido" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Genero:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
        <label>Departamento: </label>
            <select id="recipient" name="recipient" tabindex="6" class="selmenu">
                <option value="0">-- Elija departamento --</option>
                <option value="1">San Salvador</option>
                <option value="2">La Libertad</option>
            </select>
        <label>Municipio: </label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija municipio --</option>
            <option value="1">San Salvador</option>
            <option value="2">Soyapango</option>
            <option value="3">Ilopango</option>
            <option value="4">Mejicanos</option>
            <option value="5">Santa Tecla</option>
            <option value="6">Antiguo Cuscatlan</option>
            <option value="7">Col&oacute;n</option>
        </select>
        <label>Tel&eacute;fono:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="4" class="txtinput telephone">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="2" class="txtinput email">
        <label>Di&aacute;betico:</label>
        <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio"><label for='rdDiabetico'>Si</label>
        <input type="radio" name="rdDiabetico" id="rdDiabetico" class="radio"><label for='rdDiabetico'>No</label>
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Limpiar">
        <input type="button" name="submit" id="submitbtn" class="submitbtn" tabindex="" value="Guardar" onclick="alert('Su registro ha sido proceso, su contrase&ntilde;a ha sido enviada a su correo electr&oacute;nico.');">
        <br style="clear:both;">
    </section>
</form>