<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

<script language="JavaScript">
</script>
<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
		<h2>INGRESO PRODUCTO</h2>
		<h3>Fecha actual: <?php echo date('d-m-Y H:i a'); ?> </h3>
		<br></br>
    <label>Producto a entregar</label>
       <?php 
      $objeto=new CasaMunoz;
      $consultarproducto=$objeto->consultar_producto();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstCargo' id='lstCargo' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($producto=$consultarproducto->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$producto->cod_producto."'>".$producto->nom_producto."</option>";
      }
      echo "</select>";
   ?>
    <label>Cantidad a Entregar:</label>
        <input type="text" name="txtCantidadEntrega" id="txtCantidadEntrega" placeholder="Cantidad a Entregar" autocomplete="off" tabindex="1" class="txtinput">
		<label>Pedicurista</label>
		<input type="text" name="txtPedicurista" id="txtPedicurista" placeholder="Pedicurista" autocomplete="off" tabindex="1" class="txtinput">
   <label>Rendimientos:</label>
         <input type="text" name="txtrendimiento" id="txtRendimientos" placeholder="Digite la cantidad de Rendimientos" autocomplete="off" tabindex="1" class="txtinput">
        <label>N° de Servicios Realizados:</label>
        <input type="text" name="txtservicios" id="txtservicios" placeholder="Servicios Realizados" autocomplete="off" tabindex="1" class="txtinput">
  </section>
</div>
<section id="buttons">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
