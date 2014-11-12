<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript">
  $(function() {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd', 
      changeMonth: true, 
      changeYear: true, 
      yearRange: '-40:+0'
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
        url: "procesos/actualizarservicio.php",
        data: formulario,
    }).done(function(respuesta){
        if(respuesta.mensaje==1){
          alert("Registro realizado con exito");
        }else if(respuesta.mensaje==2){
          alert("No fue posible registrar el servicio");
        }
    });
}
$(document).ready(function(){         
  $("#submitbtn").click(function(){
      enviarDatos();
      return false;
  });
});
</script>
<?php 
if(isset($_GET['id'])){
    $id=base64_decode($_GET['id']);
    $obj=new CasaMunoz;
    $consServicio=$obj->mostrar_servicio($id);
    $resServicio=$consServicio->fetch(PDO::FETCH_OBJ);
	
	$consCosto=$obj->mostrar_costo($id);
    $resCosto=$consCosto->fetch(PDO::FETCH_OBJ);
	
	$consSucursal=$obj->mostrar_sucursal_servicio($id);
    $resSucursal=$consSucursal->fetch(PDO::FETCH_OBJ);
}
?> 
<form name="hongkiat" id="hongkiat-form" method="post" action="#" onsubmit="return false;">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>ACTUALIZAR SERVICIOS</h2>
        <?php
      $objeto=new CasaMunoz;
      $id=base64_decode($_GET["id"]);
      $consultarserv=$objeto->mostrar_servicio($id);
      $resServicio=$consultarserv->fetch(PDO::FETCH_OBJ);
?>  
     
        <input type="hidden" name="txtcodigo" id="txtcodigo" placeholder="codigo  de servicio" autocomplete="off" tabindex="1" class="txtinput offer" value= "<?php echo $resServicio->cod_servicio; ?>" >
        <br />

        <label>Nombre del servicio:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de servicio" autocomplete="off" tabindex="1" class="txtinput offer" value= "<?php echo $resServicio->nom_servicio; ?>"  >
        <br />
        <label>Descripcion:</label>
       <textarea name="message" id="message" style="width:40%;" placeholder="Descripcion..." tabindex="5"  class="txtblock"><?php echo $resServicio->desc_servicio ?></textarea>
        
        <label>precio de servicio:</label>
        <input type="text" name="txtprecio" id="txtprecio" placeholder="precio de servicio" autocomplete="off" tabindex="1" value= "<?php echo $resCosto->precio_Costo;  ?>" class="txtinput money">
        <br />


        <label>Duraci&oacute;n (En minutos):</label>
        <input type="time" name="txtDuracion" id="txtDuracion" placeholder="Tiempo que dura el servicio (en minutos)" property="readOnly" autocomplete="off" tabindex="1" class="txtinput time"  value= "<?php echo $resServicio->duracion_servicio; ?>" >
        
	<?php 
    
	 $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_sucursal();
	$sucursal='';
		 while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
		  {
		    if($resSucursal->cod_sucursal==$sucu->cod_sucursal){$sucursal='checked';
			echo "<input type='checkbox' name='seleccion[]' value='".$sucu->cod_sucursal."' $sucursal>".$sucu->nom_sucursal."</option>";
			} else {
			echo "<input type='checkbox' name='seleccion[]' value='".$sucu->cod_sucursal."'>".$sucu->nom_sucursal."</option>";
			}
		  }

	   ?>

</fieldset>
        <br />
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Actualizar Servicio">
        <br style="clear:both;">
    </section>
</form>
