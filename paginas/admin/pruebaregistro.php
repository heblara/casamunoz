<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">



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
        <h2>REGISTRO DE PRODUCTO</h2>
        <label>nombre de producto:</label>
        <input type="text" name="txtnombreproducto" id="txtnombreproducto" placeholder="nombreproducto" autocomplete="off" tabindex="1" >
        <label>cantidad de producto:</label>
        <input type="text" name="txtcantidaproducto" id="txtcantidadproducto" placeholder="cantidad producto" autocomplete="off" tabindex="1" >
      
      <label>rendimiento:</label>
        <input type="text" name="txtredimientoproducto" id="txtrendimientoproducto" placeholder="rendimiento de producto" autocomplete="off" tabindex="1" >
        </select>
        <br>
        <label>Fecha de ingreso:</label>
        <input type="text" name="txtFecIngre" id="txtFecIngre" placeholder="Fecha de ingreso" autocomplete="off" tabindex="1" >
		
        <br>
         <br>
          <br>
           <br>
    <section id="buttons">
        <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Limpiar">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
