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
        <h2>REGISTRO DE TEMPORADA</h2>
        <label>Nombre:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre temporada" tabindex="1" class="txtinput time">
        <label>Fecha inicial:</label>
        <input type="text" name="txtFechaIni" id="txtFechaIni" placeholder="Fecha inicial" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
        <br />
        <label>Fecha inicial:</label>
        <input type="text" name="txtFechaFin" id="txtFechaFin" placeholder="Fecha final" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
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
        <div id="resultado" style='background:black;font-size:15pt;'>
        <table width='100%'>
          <tr style="background:white;">
            <th>No.</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Sucursal</th>
            <th>Opcion</th>
          </tr>
          <tr style="background:silver;">
            <td>1</td>
            <td>Semana Santa</td>
            <td>14/04/2014</td>
            <td>20/04/2014</td>
            <td>Merliot, La Joya</td>
            <td><img src='img/edit.png' /></td>
          </tr>
          <tr style="background:white;">
            <td>2</td>
            <td>Fiestas Agostinas</td>
            <td>01/08/2014</td>
            <td>06/08/2014</td>
            <td>Merliot, La Joya, Metro sur, Las Cascadas</td>
            <td><img src='img/edit.png' /></td>
          </tr>
          <tr style="background:silver;">
            <td>3</td>
            <td>Fiestas navide&ntilde;as</td>
            <td>25/12/2014</td>
            <td>31/12/2014</td>
            <td>Merliot, Metro Sur, Autopista Sur, Las Cascadas</td>
            <td><img src='img/edit.png' /></td>
          </tr>
        </table>
      </div>
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