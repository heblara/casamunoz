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
        <h2>RESERVA DE SERVICIO</h2>
        <label>Fecha:</label>
        <input type="text" name="txtFecha" id="txtFecha" placeholder="Seleccione una fecha" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
        <label>Sucursal: </label>
<script type="text/javascript" src="funciones/select_dependientes1.js"></script>>
    <?php 
      $objeto=new CasaMunoz;
      $consultarSucursal=$objeto->consultar_sucursal();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='paises' id='paises' onChange='cargaContenido(this.id)' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($registro=$consultarSucursal->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$registro->cod_sucursal."'>".$registro->nom_sucursal."</option>";
      }
      echo "</select>";
   ?>
        <label>Pedicurista: </label>
        <span id="demoDer">
        <select disabled="disabled" name="estados" id="estados" class='selmenu'>
          <option value="0">Selecciona opci&oacute;n...</option>
      </select>
        </span>
        <label for="txthora">Hora:</label>
        <input type="text" id="txtHora" placeholder='Hora' class="txtinput time" />
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
        <label for="recipient">Servicio:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija servicio --</option>
            <option value="1">Servicio de pedicuro</option>
            <option value="2">Extracci&oacute;n de u&ntilde;as</option>
            <option value="3">Eliminaci&oacute;n de Verrugas</option>
        </select>
        <br />
        <br />
        <br />
        
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Reservar">
        <br style="clear:both;">
    </section>
</form>