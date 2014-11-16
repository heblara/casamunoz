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
        <h2>FACTURA</h2>
        <label>No.:</label>
        <input type="text" name="txtNoFact" id="txtNoFact" placeholder="Numero de factura" autocomplete="off" tabindex="1" class="txtinput money">
        <label>Registro No.:</label>
        <input type="text" name="txtRegistro" id="txtRegistro" placeholder="No. Registro" autocomplete="off" tabindex="1" class="txtinput name">
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="Numero de NIT" autocomplete="off" tabindex="1" class="txtinput id">
        <fieldset>
          <legend>Factura</legend>
          <label>Fecha:</label>
          <input type="text" name="txtFecha" id="txtFecha" placeholder="Fecha" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">  
          <label>Empleado.:</label>
          <input type="text" name="txtEmpleado" id="txtEmpleado" placeholder="Nombre del Empleado" autocomplete="off" tabindex="1" class="txtinput name">
          <label>Cliente.:</label>
          <input type="text" name="txtCliente" id="txtCliente" placeholder="Nombre del Cliente" autocomplete="off" tabindex="1" class="txtinput name">
          <label>Tipo de pago:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija --</option>
            <option value="F">Efectivo</option>
            <option value="M">Tarjeta</option>
        </select>
        <label>Tipo de tarjeta:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija --</option>
            <option value="1">Visa</option>
            <option value="2">Mastercard</option>
            <option value="3">American Express</option>
        </select>
        </fieldset>
        <fieldset>
          <legend>Detalle</legend>
          <table width='100%' style="font-size:12pt;">
            <tr style="background:white;">
              <th>Cantidad</th>
              <th>Descripcion</th>
              <th>Precio</th>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr style="background:white;">
              <td>Total:</td>
              <td>&nbsp;</td>
              <td>$ ----</td>
            </tr>
            <tr style="background:white;">
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
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