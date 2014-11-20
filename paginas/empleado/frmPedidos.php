<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="js/jquery.blockUI.js"></script>  
<script type="text/javascript">

	function validar(){
    nombre=document.getElementById('txtNombre').value;
    descripcion=document.getElementById('message').value;
    fechalimite=document.getElementById('txtFecLimite').value;
	descuento=document.getElementById('txtDescuento').value;
	servicio=document.getElementById('lstServicio').value;
    msg="";
    error=false;
	var ok = 0;
    var ckbox = document.getElementsByName('seleccion[]');
        for (var i=0; i < ckbox.length; i++){
            if(ckbox[i].checked == true){
            ok = 1;
            }
        }
	if(nombre=="" || nombre==null){
        msg+='* Nombre';
        alert("Ingrese el nombre de la oferta");
        //#hongkiat-form input.name
        document.getElementsByName('txtNombre').style="border-color:#F80303;";
        document.getElementById('txtNombre').focus();
        error=true;
    }else if(descripcion=="" || descripcion==null){
        msg+='* Descripcion';
        alert("Ingrese la descripcion");
        //#hongkiat-form input.name
        document.getElementsByName('message').style="border-color:#F80303;";
        document.getElementById('message').focus();
        error=true;
    }else if(fechalimite=="" || fechalimite==null){
        msg+='* Fecha';
        alert("Ingrese la fecha limite");
        //#hongkiat-form input.name
        document.getElementsByName('txtFecLimite').style="border-color:#F80303;";
        document.getElementById('txtFecLimite').focus();
        error=true;
	}else if(descuento=="" || descuento==null){
        msg+='* Descuento';
        alert("Ingrese el descuento");
        //#hongkiat-form input.name
        document.getElementsByName('txtDescuento').style="border-color:#F80303;";
        document.getElementById('txtDescuento').focus();
        error=true;
    }else if(servicio==0){
        msg+='* Servicio';
        alert("Seleccione un servicio");
        //#hongkiat-form input.name
        document.getElementsByName('lstServicio').style="border-color:#F80303;";
        error=true;
	}else if(ok == 0){
        alert('Indique una sucursal');
        return false;
    }
	if(error==true){
      return false;
    }else{
      //enviarDatos();
      return true;
    }
}




  $(function() {
    $('#txtFechaRegistro').datepicker({
      dateFormat: 'yy-mm-dd', 
      changeMonth: true, 
      changeYear: true, 
      yearRange: '+0:+10',
	  minDate: -0, maxDate: "+0D"
      });
    });

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
        url: "procesos/guardarOferta.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
		  document.getElementById('hongkiat-form').reset();
          document.getElementById('txtNombre').focus();
        }else if(respuesta.mensaje==2){
          alert("No fue posible registrar la Oferta");
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
<script src="js/mask.js"></script>
<script>
  jQuery(function($){
     $("#txtDescuento").mask("0.99");   
  });
</script>
<form name="hongkiat" id="hongkiat-form">
<div id="wrapping" class="clearfix">
  <section id="aligned" style='text-align:center;'>
  <h2> HOJA DE PEDIDOS</h2>
  <h3>Empleado:</h3>
  <?php 
        $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_empleado_sucursales($_SESSION['sucursal']);
	  
	       echo "<select name='lstEmpleadoSucursal' id='lstEmpleadoSucursal' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$sucu->cod_emp."'>".$sucu->NombreCompleto."</option>";
      }
      echo "</select>";
   ?> 
  
    <h3>Fecha de pedido:</h3>
    <input type="text" name="txtFechaRegistro" id="txtFechaRegistro" placeholder="Fecha de registro de oferta" autocomplete="off" tabindex="1" class="txtinput calendar" readonly="readonly">
    <h3>Sucursal:</h3>
     <?php 
        $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_sucursal_unica($_SESSION['sucursal']);
	  
      while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$sucu->cod_sucursal."'>".$sucu->nom_sucursal."</option>";
      }
      echo "</select>";
   ?> 
  </br>
    <label>PEDIDOS</label>
      <table width="100%" style="font-size:10pt;border-color:black;" border="1">
        <tr>
          <th>Cantidad</th>
          <th>Producto</th>
          <th>Seleccionar</th>
        </tr>

<?php 

 $consultarproducto=$objeto->consultar_producto();
        while($producto=$consultarproducto->fetch(PDO::FETCH_OBJ))
        {

		
		
		echo "<tr>
		  <td><input type='number' name='txtCantPedido[]' id='txtCantPedido[]' min=0 /></td>
            <td>".$producto->nom_producto."</td>
			<td><input type='checkbox' name='chkproducto[]' id='chkproducto[]' /></td>
            
          </tr>";
        }
        ?>
      </table>
	 
			

  </section>
</div>
<section id="buttons">
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
