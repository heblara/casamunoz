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
<?php 
if(isset($_GET['id'])){
    $id=base64_decode($_GET['id']);
    $obj=new CasaMunoz;
    $consEmpleado=$obj->mostrar_empleado($id);
    $resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ);
}
?>
<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>ACTUALIZAR EMPLEADO</h2>
		<label>Primer Nombre:</label>
        <input type="text" name="txtNombres" id="txtNombres" placeholder="Primer nombre" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resEmpleado->primer_nom; ?>">
        <label>Segundo Nombre:</label>
        <input type="text" name="txtNombres" id="txtNombres" placeholder="Segundo nombre" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resEmpleado->segundo_nom; ?>">
        <label>Primero Apellido:</label>
        <input type="text" name="txtApellidos" id="txtApellidos" placeholder="Primer apellido" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resEmpleado->primer_ape; ?>">
        <label>Segundo Apellido:</label>
        <input type="text" name="txtApellidos" id="txtApellidos" placeholder="Segundo apellido" autocomplete="off" tabindex="1" class="txtinput name" value="<?php echo $resEmpleado->segundo_ape; ?>">
        <label>DUI:</label>
        <input type="text" name="txtDUI" id="txtDUI" placeholder="Documento &Uacute;nico de Identidad" autocomplete="off" tabindex="2" class="txtinput id" value="<?php echo $resEmpleado->dui_emp; ?>">
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="N&uacute;mero de NIT" autocomplete="off" tabindex="2" class="txtinput id" value="<?php echo $resEmpleado->nit_emp; ?>">
        
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="1" class="txtinput calendar datepicker" value="<?php echo $resEmpleado->fec_nac; ?>">
        <label>Cargo: </label>
        <?php 
		  $objeto=new CasaMunoz;
		  $consultarcargos=$objeto->consultar_cargos();
		  //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
		  // Voy imprimiendo el primer select compuesto por los paises
		  //echo $consultarDepartamentos->rowCount();
		  echo "<select name='lstCargo' id='lstCargo' class='selmenu'>";
		  echo "<option value='0'>Elige</option>";
		
        $cargo1='';
		  while($cargo=$consultarcargos->fetch(PDO::FETCH_OBJ))
		  {
			if($resEmpleado->cod_cargo==$cargo->cod_cargo){$cargo1='selected';
			echo "<option value='".$cargo->cod_cargo."' $cargo1>".$cargo->desc_cargo."</option>";}
		  }
		  echo "</select>";
   ?>
        <label>Sucursal: </label>
       <?php 
		  $objeto=new CasaMunoz;
		  $consultarsucu=$objeto->consultar_sucursal();
		  //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
		  // Voy imprimiendo el primer select compuesto por los paises
		  //echo $consultarDepartamentos->rowCount();
		  echo "<select name='lstSucursal' id='lstSucursal' class='selmenu'>";
		  echo "<option value='0'>Elige</option>";
		 $sucursal='';
		 while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
		  {
		    if($resEmpleado->cod_sucursal==$sucu->cod_sucursal){$sucursal='selected';
			echo "<option value='".$sucu->cod_sucursal."' $sucursal>".$sucu->nom_sucursal."</option>";}
		  }
		  echo "</select>";
	   ?>
        <label>Direcci&oacute;n:</label>
        <textarea name="message" id="message" placeholder="Direcci&oacute;n..." tabindex="5" class="txtblock"><?php echo $resEmpleado->direc_emp; ?></textarea>
        <label>Tel&eacute;fono fijo:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="4" class="txtinput telephone" value="<?php echo $resEmpleado->tel_fijo; ?>">
        <label>Tel&eacute;fono movil:</label>
        <input type="tel" name="txtTelMovil" id="txtTelMovil" placeholder="Telefono movil" tabindex="4" class="txtinput telephone" value="<?php echo $resEmpleado->tel_movil; ?>">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="2" class="txtinput email" value="<?php echo $resEmpleado->correo_emp; ?>">
        <label>Cubiculo:</label>
        <input type="text" name="txtCubiculo" id="txtCubiculo" placeholder="Cubiculo" autocomplete="off" tabindex="2" class="txtinput desk" value="<?php echo $resEmpleado->cod_cubiculo; ?>">
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
