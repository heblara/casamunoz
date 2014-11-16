<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
  function validar(){
    producto=document.getElementById('lstProducto').value;
    cantidad=document.getElementById('txtCantidadEntrega').value;
    error=false;
	cant=parseInt(cantidad);
    if(producto==0){
        alert("Seleccione un producto");
        error=true;
    }else if(isNaN(cantidad)){
        alert("Ingrese un numero en la cantidad");
        error=true;
    }else if(cant <= 0 ){
        alert("La cantidad debe ser mayor que cero");
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
        url: "procesos/guardarEntrada.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==2){
          alert("No fue posible registrar la entrada");
        }else if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
		  document.getElementById('hongkiat-form').reset();
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
		<br></br>
    <label>Producto a ingresar</label>
       <?php 
      $objeto=new CasaMunoz;
      $consultarproducto=$objeto->consultar_producto();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstProducto' id='lstProducto' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($producto=$consultarproducto->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$producto->cod_producto."'>".$producto->nom_producto."</option>";
      }
      echo "</select>";
   ?>
    <label>Cantidad:</label>
        <input type="text" name="txtCantidadEntrega" id="txtCantidadEntrega" placeholder="Cantidad a Entregar" autocomplete="off" tabindex="1" class="txtinput">
	  </section>
</div>
<section id="buttons">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
