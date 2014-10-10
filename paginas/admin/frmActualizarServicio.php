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
        <h2>REGISTRO DE SERVICIOS</h2>
        <label>Nombre del servicio:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de servicio" autocomplete="off" tabindex="1" class="txtinput offer" value="Extracci&oacute;n de u&ntilde;eros">
        <br />
        <label>Descripcion:</label>
        <textarea name="message" id="message" style="width:40%;" placeholder="Descripcion..." tabindex="5" class="txtblock">Limpieza de U&ntilde;as</textarea>
        <label>Duraci&oacute;n (En minutos):</label>
        <input type="text" name="txtDuracion" id="txtDuracion" placeholder="Tiempo que dura el servicio (en minutos)" autocomplete="off" tabindex="1" class="txtinput time" value="35">
        <label>Precio:</label>
        <input type="text" name="txtPrecio" id="txtPrecio" placeholder="Precio del servicio" autocomplete="off" tabindex="1" class="txtinput money" value="15">
        <fieldset>
        <legend>Sucursal(es): </legend>
        <input type="checkbox" name="chkSucursal1" id="chkSucursal1" value="1" checked='checked'>
        <label for="chkSucursal1" class='checkbox'>La Joya</label>
        <br />
        <input type="checkbox" name="chkSucursal2" id="chkSucursal2" value="2" checked='checked'>
        <label for="chkSucursal2" class='checkbox' checked='checked'>Merliot</label>
        <br />
        <input type="checkbox" name="chkSucursal3" id="chkSucursal3" value="3" checked='checked'>
        <label for="chkSucursal3" class='checkbox' checked='checked'>Autopista Sur</label>
        <br />
        <input type="checkbox" name="chkSucursal4" id="chkSucursal4" value="4">
        <label for="chkSucursal4" class='checkbox'>Metro Sur</label>
        <br />
        <input type="checkbox" name="chkSucursal5" id="chkSucursal5" value="5" checked='checked'>
        <label for="chkSucursal5" class='checkbox' checked='checked'>Las Cascadas</label>
        </fieldset>
        <br />
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar cambios">
        <br style="clear:both;">
    </section>
</form>