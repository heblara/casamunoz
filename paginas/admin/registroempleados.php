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
        <h2>REGISTRO DE EMPLEADOS</h2>
        <label>Nombres:</label>
        <input type="text" name="txtNombres" id="txtNombres" placeholder="Nombres" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Apellidos:</label>
        <input type="text" name="txtApellidos" id="txtApellidos" placeholder="Apellidos" autocomplete="off" tabindex="1" class="txtinput name">
        <label>DUI:</label>
        <input type="text" name="txtDUI" id="txtDUI" placeholder="Documento &Uacute;nico de Identidad" autocomplete="off" tabindex="2" class="txtinput id">
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="N&uacute;mero de NIT" autocomplete="off" tabindex="2" class="txtinput id">
        <label>Genero:</label>
        <select id="recipient" name="recipient" tabindex="6" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
        <label>Cargo: </label>
            <?php 
      $objeto=new CasaMunoz;
      $consultarcargos=$objeto->consultar_cargos();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstCargo' id='lstCargo' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($cargo=$consultarcargos->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$cargo->cod_cargo."'>".$cargo->desc_cargo."</option>";
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

      while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$sucu->cod_sucursal."'>".$sucu->nom_sucursal."</option>";
      }
      echo "</select>";
   ?>
        <label>Departamento: </label>
<script type="text/javascript" src="funciones/select_dependientes.js"></script>>
    <?php 
      $objeto=new CasaMunoz;
      $consultarDepartamentos=$objeto->consultar_departamentos();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='paises' id='paises' onChange='cargaContenido(this.id)' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($registro=$consultarDepartamentos->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$registro->cod_dpto."'>".$registro->nom_dpto."</option>";
      }
      echo "</select>";
   ?>
        <label>Municipio: </label>
        <span id="demoDer">
        <select disabled="disabled" name="estados" id="estados" class='selmenu'>
          <option value="0">Selecciona opci&oacute;n...</option>
      </select>
        </span>
        <label>Direcci&oacute;n:</label>
        <textarea name="message" id="message" placeholder="Direcci&oacute;n..." tabindex="5" class="txtblock"></textarea>
        <label>Tel&eacute;fono fijo:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="4" class="txtinput telephone">
        <label>Tel&eacute;fono movil:</label>
        <input type="tel" name="txtTelMovil" id="txtTelMovil" placeholder="Telefono movil" tabindex="4" class="txtinput telephone">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="2" class="txtinput email">
        <label>Cubiculo:</label>
        <?php 
          $objeto=new CasaMunoz;
          $consultarsucu=$objeto->consultar_cubiculo();
          //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
          // Voy imprimiendo el primer select compuesto por los paises
          //echo $consultarDepartamentos->rowCount();
          echo "<select name='lstCubiculo' id='lstCubiculo' class='selmenu'>";
          echo "<option value='0'>Elige</option>";

          while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
          {
            echo "<option value='".$sucu->cod_cubiculo."'>".$sucu->cod_cubiculo."</option>";
          }
          echo "</select>";
       ?>
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