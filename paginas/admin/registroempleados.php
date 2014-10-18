<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript">
function validar(){
    nombre1=document.getElementById('txtNombre1').value;
    apellido1=document.getElementById('txtApellido1').value;
    dui=document.getElementById('txtDUI').value;
    nit=document.getElementById('txtNIT').value;
    genero=document.getElementById('lstGenero').value;
    fecnac=document.getElementById('txtFecNac').value;
    cargo=document.getElementById('lstCargo').value;
    sucursal=document.getElementById('lstSucursal').value;
    paises=document.getElementById('lstSucursal').value;
    direccion=document.getElementById('txtDireccion').value;
    telfijo=document.getElementById('txtTelFijo').value;
    telmovil=document.getElementById('txtTelMovil').value;
    correo=document.getElementById('txtCorreo').value;
    cubiculo=document.getElementById('lstCubiculo').value;
    fecini=document.getElementById('txtFecIni').value;
    fecfin=document.getElementById('txtFecFin').value;
    msg="";
    error=false;
    if(nombre1=="" || nombre1==null){
        msg+='* Primer Nombre';
        alert("Ingrese primer nombre");
        //#hongkiat-form input.name
        document.getElementsByName('txtNombre1').style="border-color:#F80303;";
        document.getElementById('txtNombre1').focus();
        error=true;
    }else if(apellido1=="" || apellido1==null){
        msg+='* Primer Apellido';
        alert("Ingrese primer Apellido");
        //#hongkiat-form input.name
        document.getElementsByName('txtApellido1').style="border-color:#F80303;";
        document.getElementById('txtApellido1').focus();
        error=true;
    }else if(dui==null || dui==""){
        msg+='* DUI';
        alert("Ingrese Numero de DUI");
        //#hongkiat-form input.name
        document.getElementsByName('txtDUI').style="border-color:#F80303;";
        document.getElementById('txtDUI').focus();
        error=true;
    }else if(nit==null || nit==""){
        msg+='* NIT';
        alert("Ingrese Numero de NIT");
        //#hongkiat-form input.name
        document.getElementsByName('txtNIT').style="border-color:#F80303;";
        document.getElementById('txtNIT').focus();
        error=true;
    }else if(genero==0){
        msg+='* Genero';
        alert("Seleccione un genero");
        //#hongkiat-form input.name
        document.getElementsByName('lstGenero').style="border-color:#F80303;";
        error=true;
    }else if(fecnac==null || fecnac==""){
        msg+='* Fecha nacimiento';
        alert("Ingrese fecha de nacimiento");
        //#hongkiat-form input.name
        document.getElementsByName('txtFecNac').style="border-color:#F80303;";
        document.getElementById('txtFecNac').focus();
        error=true;
    }else if(cargo==0){
        msg+='* Cargo';
        alert("Seleccione un cargo");
        //#hongkiat-form input.name
        document.getElementsByName('lstCargo').style="border-color:#F80303;";
        error=true;
    }else if(sucursal==0){
        msg+='* Sucursal';
        alert("Seleccione sucursal");
        //#hongkiat-form input.name
        document.getElementsByName('lstSucursal').style="border-color:#F80303;";
        error=true;
    }else if(paises==0){
        msg+='* Departamento';
        alert("Seleccion un Departamento");
        //#hongkiat-form input.name
        document.getElementsByName('paises').style="border-color:#F80303;";
        error=true;
    }else if(direccion==null || direccion==""){
        msg+='* Direccion';
        alert("Ingrese direccion");
        //#hongkiat-form input.name
        document.getElementsByName('txtDireccion').style="border-color:#F80303;";
        document.getElementById('txtDireccion').focus();
        error=true;
    }else if(telmovil==null || telmovil==""){
        msg+='* Telefono movil';
        alert("Ingrese Numero de Telefono Movil");
        //#hongkiat-form input.name
        document.getElementsByName('txtTelMovil').style="border-color:#F80303;";
        document.getElementById('txtTelMovil').focus();
        error=true;
    }else if(telfijo==null || telfijo==""){
        msg+='* Telefono Fijo';
        alert("Ingrese Numero de Telefono Fijo");
        //#hongkiat-form input.name
        document.getElementsByName('txtTelFijo').style="border-color:#F80303;";
        document.getElementById('txtTelFijo').focus();
        error=true;
    }else if(correo==null || correo==""){
        msg+='* Correo';
        alert("Ingrese Correo electronico");
        //#hongkiat-form input.name
        document.getElementsByName('txtCorreo').style="border-color:#F80303;";
        document.getElementById('txtCorreo').focus();
        error=true;
    }else if(cubiculo==0){
        msg+='* Cubiculo';
        alert("Seleccione cubiculo");
        //#hongkiat-form input.name
        document.getElementsByName('lstCubiculo').style="border-color:#F80303;";
        document.getElementById('lstCubiculo').focus();
        error=true;
    }else if(fecini==null || fecini==""){
        msg+='* Fecha inicio';
        alert("Ingrese fecha de inicio de contrato");
        //#hongkiat-form input.name
        document.getElementsByName('txtFecIni').style="border-color:#F80303;";
        document.getElementById('txtFecIni').focus();
        error=true;
    }else if(fecfin==null || fecfin==""){
        msg+='* Fecha fin';
        alert("Ingrese fecha fin de contrato");
        //#hongkiat-form input.name
        document.getElementsByName('txtFecFin').style="border-color:#F80303;";
        document.getElementById('txtFecFin').focus();
        error=true;
    }

    if(error==true){
      return false;
    }else{
      //enviarDatos();
      return false;
    }
}
function enviarDatos(){
  var formulario = $("#hongkiat-form").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
        url: "procesos/guardarEmpleado.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("No fue posible registrar el empleado");
        }else if(respuesta.mensaje==2){
          alert("Registro realizado con exito");
        }
    });
}
$(document).ready(function(){         
  $("#submitbtn").click(function(){
      enviarDatos();
  });
});
</script>
<script>
 $(function() {
  $('.datepicker').datepicker({
  dateFormat: 'yy-mm-dd', 
  changeMonth: true, 
  changeYear: true, 
  yearRange: '-100:+0'
  });
    });
 $(function() {
  $('#txtFecNac').datepicker({
  dateFormat: 'yy-mm-dd', 
  changeMonth: true, 
  changeYear: true, 
  yearRange: '-100:-18'
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
<form name="hongkiat" id="hongkiat-form" method="post" action="#" onsubmit="return validar();">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
            <h2>REGISTRO DE EMPLEADOS</h2>
        <label>Primer Nombre:</label>
        <input type="text" name="txtNombre1" id="txtNombre1" placeholder="Primer Nombre" autocomplete="off" tabindex="1" class="txtinput name">
        <label>Segundo Nombre:</label>
        <input type="text" name="txtNombre2" id="txtNombre2" placeholder="Segundo Nombre" autocomplete="off" tabindex="2" class="txtinput name">
        <label>Primer Apellido:</label>
        <input type="text" name="txtApellido1" id="txtApellido1" placeholder="Primero Apellido" autocomplete="off" tabindex="3" class="txtinput name">
        <label>Segundo Apellido:</label>
        <input type="text" name="txtApellido2" id="txtApellido2" placeholder="Segundo Apellido" autocomplete="off" tabindex="4" class="txtinput name">
        <label>DUI:</label>
        <input type="text" name="txtDUI" id="txtDUI" placeholder="Documento &Uacute;nico de Identidad" autocomplete="off" tabindex="5" class="txtinput id">
        <label>NIT:</label>
        <input type="text" name="txtNIT" id="txtNIT" placeholder="N&uacute;mero de NIT" autocomplete="off" tabindex="6" class="txtinput id">
        <label>Genero:</label>
        <select id="lstGenero" name="lstGenero" tabindex="7" class="selmenu">
            <option value="0">-- Elija genero --</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
        <label>Fecha de Nacimiento:</label>
        <input type="text" name="txtFecNac" id="txtFecNac" placeholder="Fecha de Nacimiento" autocomplete="off" tabindex="8" class="txtinput calendar">
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
        <textarea name="txtDireccion" id="txtDireccion" placeholder="Direcci&oacute;n..." tabindex="11" class="txtblock"></textarea>
        <label>Tel&eacute;fono fijo:</label>
        <input type="tel" name="txtTelFijo" id="txtTelFijo" placeholder="Telefono fijo" tabindex="12" class="txtinput telephone">
        <label>Tel&eacute;fono movil:</label>
        <input type="tel" name="txtTelMovil" id="txtTelMovil" placeholder="Telefono movil" tabindex="13" class="txtinput telephone">
        <label>Correo electr&oacute;nico:</label>
        <input type="email" name="txtCorreo" id="txtCorreo" placeholder="Direcci&oacute;n de correo" autocomplete="off" tabindex="14" class="txtinput email">
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
       <label>Fecha Inicio Contrato:</label>
        <input type="text" name="txtFecIni" id="txtFecIni" placeholder="Fecha Inicio de Contrato" autocomplete="off" tabindex="16" class="txtinput calendar datepicker">
        <label>Fecha Fin Contrato:</label>
        <input type="text" name="txtFecFin" id="txtFecFin" placeholder="Fecha Fin de Contrato" autocomplete="off" tabindex="17" class="txtinput calendar datepicker">
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