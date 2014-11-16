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
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd', 
      changeMonth: true, 
      changeYear: true, 
      yearRange: '+0:+10'
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
<form name="hongkiat" id="hongkiat-form" method="post" action="#">
    <div id="wrapping" class="clearfix">
        <section id="aligned-center">
        <h2>REGISTRO DE OFERTA</h2>
        <label>Nombre:</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de oferta" autocomplete="off" tabindex="1" class="txtinput offer">
		<br><label>Descripcion:</label>
        <textarea name="message" id="message" style="width:40%;" placeholder="Descripcion..." tabindex="5" class="txtblock"></textarea>
		</br>
		<label>Fecha registro de Oferta:</label>
        <input type="text" name="txtFechaRegistro" id="txtFechaRegistro" placeholder="Fecha de registro de oferta" autocomplete="off" tabindex="1" class="txtinput calendar" readonly="readonly" value="<?php echo date('Y-m-d H:i:s') ?>">  
        <br/>
		<label>Fecha limite:</label>
        <input type="text" name="txtFecLimite" id="txtFecLimite" placeholder="Fecha limite" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">
       
 <br />
        <label>Descuento:</label>
         <input type="text" name="txtDescuento" id="txtDescuento" placeholder="Digite el Descuento" autocomplete="off" tabindex="1" class="txtinput offer">
        <br />
        <label>Servicio: </label>
            <?php 
      $objeto=new CasaMunoz;
      $consultarservicios=$objeto->consultar_servicio();
      //$consulta=mysql_query("SELECT cod_dpto, nom_dpto FROM DEPARTAMENTO");
      // Voy imprimiendo el primer select compuesto por los paises
      //echo $consultarDepartamentos->rowCount();
      echo "<select name='lstServicio' id='lstServicio' class='selmenu'>";
      echo "<option value='0'>Elige</option>";

      while($servicio=$consultarservicios->fetch(PDO::FETCH_OBJ))
      {
        echo "<option value='".$servicio->cod_servicio."'>".$servicio->nom_servicio."</option>";
      }
      echo "</select>";
   ?>
    <form >
      <br><label>Sucursal: </label>
        <?php 
      $objeto=new CasaMunoz;
      $consultarsucu=$objeto->consultar_sucursal();
	  while($sucu=$consultarsucu->fetch(PDO::FETCH_OBJ))
      {
       echo "<input type='checkbox' name='seleccion[]' value='".$sucu->cod_sucursal."'>".$sucu->nom_sucursal."</option>";
      }
   ?>
</form>
    <br/>
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
