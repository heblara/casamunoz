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
        <section id="aligned-center">
        <h2>REGISTRO DE OFERTA</h2>
        <label>Nombre:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de oferta" autocomplete="off" tabindex="1" class="txtinput offer">
        <fieldset>
        <legend>Sucursal(es): </legend>
        <input type="checkbox" name="chkSucursal1" id="chkSucursal1" value="1">
        <label for="chkSucursal1" class='checkbox'>La Joya</label>
        <br />
        <input type="checkbox" name="chkSucursal2" id="chkSucursal2" value="2">
        <label for="chkSucursal2" class='checkbox'>Merliot</label>
        <br />
        <input type="checkbox" name="chkSucursal3" id="chkSucursal3" value="3">
        <label for="chkSucursal3" class='checkbox'>Autopista Sur</label>
        <br />
        <input type="checkbox" name="chkSucursal4" id="chkSucursal4" value="4">
        <label for="chkSucursal4" class='checkbox'>Metro Sur</label>
        <br />
        <input type="checkbox" name="chkSucursal5" id="chkSucursal5" value="5">
        <label for="chkSucursal5" class='checkbox'>Las Cascadas</label>
        </fieldset>
        <br />
        <label>Descuento:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="staff">-- Elija descuento --</option>
            <option value="staff">10%</option>
            <option value="editor">20%</option>
            <option value="editor">50%</option>
        </select>
        <br /><br />
        <label>Servicio:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="staff">-- Elija un servicio --</option>
            <option value="staff">Pedicuro</option>
            <option value="staff">Extracion de u&ntilde;ero</option>
            <option value="editor">Eliminaci&oacute;n de verrugas</option>
        </select>
        <br />
        <label>Descripcion:</label>
        <textarea name="message" id="message" style="width:40%;" placeholder="Descripcion..." tabindex="5" class="txtblock"></textarea>
        <label>Fecha limite:</label>
        <input type="text" name="txtFecLimite" id="txtFecLimite" placeholder="Fecha limite" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" readonly="readonly">
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