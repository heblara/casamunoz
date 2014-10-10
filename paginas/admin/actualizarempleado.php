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
        <h2>ACTUALIZAR EMPLEADO</h2>
        <label>Nombres:</label>
        <input type="text" name="txtNombres" id="txtNombres" placeholder="Nombres" autocomplete="off" tabindex="1" class="txtinput name" value="Roxana">
        <label>Apellidos:</label>
        <input type="text" name="txtApellidos" id="txtApellidos" placeholder="Apellidos" autocomplete="off" tabindex="1" class="txtinput name" value="Larin">
        <label>DUI:</label>
        <input type="text" name="txtDUI" id="txtDUI" placeholder="Documento &Uacute;nico de Identidad" autocomplete="off" tabindex="2" class="txtinput id" value="01010101-1">
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="N&uacute;mero de NIT" autocomplete="off" tabindex="2" class="txtinput id" value="0101-010101-010-1">
        <label>Genero:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F" selected="selected">Femenino</option>
            <option value="M">Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" value="1980-05-16">
        <label>Cargo: </label>
            <select id="recipient" name="recipient" tabindex="6" class="selmenu">
                <option value="0">-- Elija cargo --</option>
                <option value="2">Recepcionista</option>
                <option value="3" selected="">Pedicurista</option>
            </select>
        <label>Sucursal: </label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="staff">-- Elija sucursal --</option>
            <option value="1">La Joya</option>
            <option value="2">Merliot</option>
            <option value="3">Autopista Sur</option>
            <option value="4" selected="selected">Metrosur</option>
            <option value="5">Las Cascadas</option>
        </select>
        <label>Direcci&oacute;n:</label>
        <textarea name="message" id="message" placeholder="Direcci&oacute;n..." tabindex="5" class="txtblock">San Salvador</textarea>
        <label>Tel&eacute;fono fijo:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="4" class="txtinput telephone" value="2100-1000">
        <label>Tel&eacute;fono movil:</label>
        <input type="tel" name="txtTelMovil" id="txtTelMovil" placeholder="Telefono movil" tabindex="4" class="txtinput telephone" value="7100-1000">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="2" class="txtinput email" value="roxanalarin@gmail.com">
        <label>Cubiculo:</label>
        <input type="text" name="txtCubiculo" id="txtCubiculo" placeholder="Cubiculo" autocomplete="off" tabindex="2" class="txtinput desk" value="1">
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Actualizar informaci&oacute;n">
        <br style="clear:both;">
    </section>
</form>