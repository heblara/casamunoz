<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
  function validar(){
    sucursal=document.getElementById('lstEmpleadoSucursal').value;
    cantidad=document.getElementById('txtCantidadEntrega[]').value;
    error=false;
    if(sucursal==0){
        alert("Seleccione un empleado");
        error=true;
    }else if(isNaN(cantidad)){
        alert("Ingrese un numero en la cantidad");
        error=true;
    }
    if(error==true){
      return false;
    }else{
      return true;
    }
  }
</script>
<script type="text/javascript">
  $(function() {
  //Se pone para que en todos los llamados ajax se bloquee la pantalla mostrando el mensaje Procesando...
  $.blockUI.defaults.message = 'Procesando información, por favor espere... <br /><img src=\'img/load.gif\' /><br />';
  $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
});
function enviarDatos(){
  var formulario = $("#hongkiat-form").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
        url: "procesos/guardarSalida.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar la entrada");
        }else if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
        }else if(respuesta.mensaje==3){
          alert("Las cantidades no deben sobrepasar las existencias");
        }
    });
}
$(document).ready(function(){         
  $("#submitbtn").click(function(){
      if(validar()){
        enviarDatos();
      }
      return false;
  });
});
</script>
<script language="JavaScript">
</script>
<form name="hongkiat" id="hongkiat-form" method="post" onsubmit="return false;">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
		<h2>INGRESO PRODUCTO</h2>
		<h3>Fecha actual: <?php echo date('d-m-Y H:i a'); ?> </h3>
		<br>
    <label>Empleado: </label>
        <?php 
        $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_empleado_sucursal($_SESSION['sucursal']);
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstEmpleadoSucursal' id='lstEmpleadoSucursal' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$sucu->cod_emp."'>".$sucu->NombreCompleto."</option>";
      }
      echo "</select>";
   ?>  
    </br>
    <label>Producto a entregar:</label>
      <table width="100%" style="font-size:10pt;border-color:black;" border="1">
        <tr>
          <th>No.</th>
          <th>Producto</th>
          <th>Existencia</th>
          <th>Cantidad a entregar</th>
        </tr>
        <?php 
        $i=0;
        $consultarproducto=$objeto->consultar_inventario_sucursal($_SESSION['sucursal']);
        while($producto=$consultarproducto->fetch(PDO::FETCH_OBJ))
        {
          $i++;
          echo "<tr>
            <td>$i</td>
            <td>".$producto->nom_producto."</td>
            <td>".$producto->cant_inventario."
            <input type='hidden' name='txtExistencia[]' id='txtExistencia[]' value='".$producto->cant_inventario."' />
            <input type='hidden' name='txtProducto[]' id='txtProducto[]' value='".$producto->cod_producto."' /></td>
            <td><input type='number' name='txtCantidadEntrega[]' id='txtCantidadEntrega[]' /></td>
          </tr>";
        }
        ?>
      </table>
       <?php 
      /*$objeto=new CasaMunoz;
      session_start();
      echo "-- ".$_SESSION['sucursal'];
      $consultarproducto=$objeto->consultar_inventario_sucursal($_SESSION['sucursal']);
      while($producto=$consultarproducto->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$producto->cod_producto."'>".$producto->nom_producto."</option>";
      }*/
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarproducto->rowCount();
      /*echo "<select name='lstProducto' id='lstProducto' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($producto=$consultarproducto->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$producto->cod_producto."'>".$producto->nom_producto."</option>";
      }
      echo "</select>";*/
   ?>
  </section>
</div>
<section id="buttons">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
