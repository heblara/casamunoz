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
        <h2>REPROGRAMACI&OacutelN DE SERVICIO</h2>
        <label>Fecha:</label>
        <input type="text" name="txtFecha" id="txtFecha" placeholder="Seleccione una fecha" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" value="2014-08-29">
        <label>Sucursal: </label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="staff">-- Elija sucursal --</option>
            <option value="staff" selected="selected">La Joya</option>
            <option value="editor">Merliot</option>
            <option value="editor">Autopista Sur</option>
            <option value="editor">Metrosur</option>
            <option value="editor">Las Cascadas</option>
        </select>
        
        <label>Pedicurista: </label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija pedicurista --</option>
            <option value="1">Roxana Larios</option>
            <option value="2" selected="selected">Maria Andrade</option>
            <option value="3">Maritza Escobar</option>
        </select>
        <label for="txtHora">Hora:</label>
        <input type="text" id="txtHora" placeholder='Hora' class="txtinput time" value="02:30 p.m." />
        <label for="txtHora">Servicio:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija servicio --</option>
            <option value="1" selected="selected">Servicio de pedicuro</option>
            <option value="2">Extracci&oacute;n de u&ntilde;as</option>
            <option value="3">Eliminaci&oacute;n de Verrugas</option>
        </select>
        <br />
        <br />
        <br />
        <fieldset>
          <legend><span style='font-size:12pt;'>Disponibilidad de pedicurista seleccionado</span></legend>
          <table width="100%" border='1' style="border:groove 1px;font-size:12pt;">
              <tr>
                <th>Hora</th>
                <th>Estado</th>
              </tr>
              <tr>
                <td>08:00</td>
                <td>Ocupado</td>
              </tr>
              <tr>
                <td>08:30</td>
                <td>Disponible</td>
              </tr>
              <tr>
                <td>09:00</td>
                <td>Ocupado</td>
              </tr>
            </table>
        </fieldset>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Reservar">
        <br style="clear:both;">
    </section>
</form>