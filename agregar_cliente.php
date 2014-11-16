<?php
session_start();
include("../config.php");
$link =mysql_connect($datos[0],$datos[1],$datos[2]);
mysql_select_db($datos[3]);

if(!isset($_SESSION["usuario"])){
header("Location:../pantalla_error.html");
} else {
if ($_SESSION["rol"]=="recepcionista" ){
		
	
$query1 = sprintf("SELECT l.hor_log
FROM log AS l, USUARIO AS u
WHERE l.USUARIO_id_usuario = u.id_usuario
AND u.id_usuario =%s
ORDER BY l.id_log DESC
LIMIT 1 ",
mysql_real_escape_string($_SESSION["id_usu"]));
$result1 = mysql_db_query($datos[3],$query1,$link);

if(mysql_num_rows($result1)){
$array = mysql_fetch_array($result1);
$hora_entrada = $array["hor_log"];

date_default_timezone_set('America/El_Salvador');
$hora_salida= date("H:i:s");

$tiempo_transcurrido = (strtotime($hora_salida)-strtotime($hora_entrada));
    //comparamos el tiempo transcurrido 
	if($tiempo_transcurrido >= 6000) {
     //si pasaron n minutos o más
$link =mysql_connect($datos[0],$datos[1],$datos[2]);
$db = mysql_select_db($datos[3]);

$query2= sprintf("UPDATE LOG SET hor_sal_log= '%s' WHERE hor_sal_log='N/A' and USUARIO_id_usuario= %s", mysql_real_escape_string($hora_salida),mysql_real_escape_string($_SESSION["id_usu"]));

$result2 = mysql_db_query($datos[3],$query2,$link);



$result2 = mysql_db_query($datos[3],$query2,$link);

session_unset();
session_destroy(); // destruyo la sesión 
header("Location:../pantalla_error.html");    }else {
    
   } //cierra tiempo transcurrido 
}else{
echo "error al seleccionar la hora de entrada";	
}//cierra if mysql_num_rows

function fecha_minima(){

date_default_timezone_set('America/El_Salvador');

$dia= date("Ymd");
$dia_posterior = $dia - 1000000;

echo $dia_posterior;	
}//cierra funcion

function fecha_maxima(){

date_default_timezone_set('America/El_Salvador');

$dia= date("Ymd");
$dia_posterior = $dia - 130000;

echo $dia_posterior;	
}//cierra funcion
 ?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8">
		<title>Optica Especial</title>
		<!-- calendario -->
    <link rel="stylesheet" type="text/css" href="../css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../css/steel/steel.css" />
    <script type="text/javascript" src="../js/jscal2.js"></script>
    <script type="text/javascript" src="../js/es.js"></script>
		<!-- CSS -->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/social-icons.css" type="text/css" media="screen" />
         <link href="../css/bootstrap.css" rel="stylesheet">
         <link href="../css/datepicker.css" rel="stylesheet">
         <script src="../js/bootstrap-datepicker.js"></script>
	
        <!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="../css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->	
		
		<!-- GOOGLE FONTS 
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->
		
		<!-- JS -->
        		<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
	<!--	<script type="text/javascript" src="../js/jquery-2.0.0.min.js"></script> -->
		<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="../js/easing.js"></script>
		<script type="text/javascript" src="../js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="../js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="../js/jquery.isotope.min.js"></script>
		
		<!--[if IE]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="../js/DD_belatedPNG.js"></script>
			<script>
	      		/* EXAMPLE */
	      		//DD_belatedPNG.fix('*');
	    	</script>
		<![endif]-->
		<!-- ENDS JS -->
		
		
		<!-- Nivo slider -->
		<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
		<script src="../js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="../css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		<!-- prettyPhoto -->
		<script type="text/javascript" src="../js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="../js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="../css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="../css/superfish-left.css" /> 
		<script type="text/javascript" src="../js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="../js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="../js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="../js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="../js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="../js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="../css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="../js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- Fancybox -->
		<link rel="stylesheet" href="../js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<!-- ENDS Fancybox -->
<style>
.claseparrafo{
	color:#CCC; 
}
</style>        
		

 <?php
 function ramdom(){
	 $ramdom= rand(10,100);
	 echo $ramdom;
 }
 ?>       
		
 
		

	</head>
	
	<body class="home">
 <?php
   
   function fecha(){     // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
        date_default_timezone_set('America/El_Salvador');
        //Imprimimos la fecha actual dandole un formato
        echo date("Y-m-d");  //http://www.anerbarrena.com/php-date-1018/
   }
        ?>
<script>
function rellena_usuario(txtapellido1cli,txtapellido2cli, ramdom, txtfechanaccli){
	var ap1= txtapellido1cli.toUpperCase();
	var ap2= txtapellido2cli.toUpperCase();
	var ram= ramdom;
	var fecha_na = txtfechanaccli;
	return  ap1.substr(0,1) + ap2.substr(0,1) + ram + fecha_na.substr(1,3);
	}

function IsNumeric(valor) 
{ 
var log=valor.length; var sw="S"; 
for (x=0; x<log; x++) 
{ v1=valor.substr(x,1); 
v2 = parseInt(v1); 
//Compruebo si es un valor num�rico 
if (isNaN(v2)) { sw= "N";} 
} 
if (sw=="S") {return true;} else {return false; } 
} 
var primerslap=false; 
var segundoslap=false;
 
	
</script> 

<!-- Validacion de boton -->

<script type="text/javascript">

$('content').bind('change keyup', function() {

    if($(this).validate().checkForm()) {

        $('bottom').attr('disabled', false);

    } else {

        $('bottom').attr('disabled', true);

    } });

</script>
		
	<!-- HEADER -->
			<div id="header">
            
            
              <!-- wrapper-header -->
              
				<div class="wrapper">
				  <a href="index.html"><img src="img/logo2.png" alt="Nova" width="157" height="111" id="logo" /></a>
<!-- search -->
					<div class="top-search">
<p class="claseparrafo"><?php echo "Bienvenido, ".$_SESSION["nombre"]." ".$_SESSION["apellido"];  ?> &nbsp;&nbsp;</p><p><a href="../cerrar_sesion.php" class="link-button"><span>Cerrar sesión</span></a></p>
					</div>
					<!-- ENDS search -->
			  </div>
				<!-- ENDS wrapper-header -->					
			</div>
			<!-- ENDS HEADER -->
  <script>
function validarn(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
	 if (tecla==9) return true; // 3
	 if (tecla==11) return true; // 3
    patron = /[A-Za-zñÑ'áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛÑñäëïöüÄËÏÖÜ\s\t]/; // 4
 
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 
</script>

<script>
function validarnumero(e) { 
    tecla = (document.all) ? e.keyCode : e.which; 
if (tecla==8) return true; 
if (tecla==9) return true; 
if (tecla==11) return true; 
if (tecla==34) return false;
if (tecla==39) return false;
if (tecla==48) return true;
if (tecla==49) return true;
if (tecla==50) return true;
if (tecla==51) return true;
if (tecla==52) return true;
if (tecla==53) return true;
if (tecla==54) return true;
if (tecla==55) return true;
if (tecla==56) return true;
if (tecla==57) return true;
if (tecla==46) return true;
if(tecla==32) return false;

    patron = /[ñÑ'áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛÑñäëïöüÄËÏÖÜ\s\t]/; 
 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
} 
</script>			
			
			<!-- Menu -->
			<div id="menu">
			
			
			
				<!-- ENDS menu-holder -->
				<div id="menu-holder">
					<!-- wrapper-menu -->
					<div class="wrapper">
						<!-- Navigation -->
						<ul id="nav" class="sf-menu">

							<li class="current-menu-item"><a href="agregar_cliente.php">Clientes<span class="subheader">Administracion de clientes</span></a>
	<ul>
									
									<li><a href="agregar_cliente.php"><span>Agregar cliente</span></a></li> <li><a href="agregar_afiliado.php"><span>Agregar Afiliado</span></a></li>  
 
 <li><a href="admin_clientes.php"><span>Administrar Clientes</span></a></li>

<li><a href="admin_afiliados.php"><span>Administrar Afiliado</span></a></li>


								</ul>
							</li>
							<li ><a href="admin_citas.php">Citas y consultas<span class="subheader">Administración de citas y consultas</span></a>	<ul>
					<li><a href="admin_citas.php"><span>Administrar citas</span></a></li>
                                    <li><a href="tipo_cita.php"><span>Crear cita</span></a></li>
  <li><a href="admin_consulta.php"><span>Administrar consultas</span></a></li>                                    
								</ul>
                           </li>
							<li><a href="generar_compra.php">Compras<span class="subheader">Admistración de compras</span></a>
							<ul>
                            <li><a href="generar_compra.php"><span>Generar Compra</span></a></li> <li><a href="pro_comp.php"><span>Productos Comprados</span></a></li>
                            
                            </ul>
                            </li>
                 										
									
                 							<li><a href="material.php">Producto<span class="subheader">Administracion de Producto</span></a>
							<ul>
									
									<li><a href="material.php"><span>Crear Material</span></a></li>
									<li><a href="admin_material.php"><span>Administra Materiales</span></a></li>
                                    <li><a href="accesorio.php"><span>Crear Accesorio</span></a></li>
                                    <li><a href="admin_accesorio.php"><span>Administra Accesorios</span></a></li>
                                    <li><a href="#"><span>Crear Lentes</span></a></li>

								</ul>
							</li>
	<li><a href="generar_venta.php">Ventas<span class="subheader">Control de ventas</span></a>
								<ul>
									
									<li><a href="generar_venta.php"><span>Generar venta</span></a></li> <li><a href="productos_vendidos.php"><span>Productos vendidos Cliente</span></a></li>
    
	</ul>
	</li>                                    <li><a href="facturar.php">Facturas<span class="subheader">Control de facturas</span></a>
                            <ul>
									
									<li><a href="facturar.php"><span>Crear factura</span></a></li>
                                    <li><a href="admin_consulta.php"><span>Control de facturas</span></a></li>

                                    </ul>
							</li> <!-- Navigation -->
					</div>
					<!-- wrapper-menu -->
				</div>
				<!-- ENDS menu-holder -->
			</div>
			<!-- ENDS Menu -->
            <!-- MAIN -->
			<div id="main">
				<!-- wrapper-main -->
				<div class="wrapper">
					
					
					
					<!-- content -->
					<div id="content">
                    
                    					<!-- title -->
						<div id="page-title">
							<span class="title">Agregar Cliente</span>
							<span class="subtitle">Llena el siguiente formulario</span>
						</div>
						<!-- ENDS title -->
						
						
			<form name="frmpersonas" id="frmpersonas" action="../clases/recepcionista/guardar_cliente.php" method="post">
								<fieldset>
								
                                
                                    <label>Fecha de Nacimiento </label>
                                    
 <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
      <input type="text" class="form-control" id="txtfechanaccli" name="txtfechanaccli" OnKeyUp="document.frmpersonas.txtusuariocli.value = rellena_usuario(document.frmpersonas.txtapellido1cli.value,document.frmpersonas.txtapellido2cli.value,<?php ramdom();?>,this.value);" required readonly>
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="calendar-trigger">...</button>
      </span>
    </div>
    <script>
    Calendar.setup({
        trigger    : "calendar-trigger",
        inputField : "txtfechanaccli",
		onSelect   : function() { this.hide() },
		min: <?php  fecha_minima() ?>,
    	max: <?php  fecha_maxima() ?>
    });
</script>

                                    <label>Primer Nombre</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
  


  <input type="text" name="txtnombre1cli" class="form-control" placeholder="Primer Nombre" onKeypress="return validarn(event)"  required>
  </div>
  
 
 
 

                                    <label>Segundo Nombre</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
  
  <input type="text" class="form-control" name="txtnombre2cli" placeholder="Segundo Nombre" onKeypress= "return validarn(event)">
</div>         

                                    <label>Primer Apellido</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
  <input type="text" class="form-control" name="txtapellido1cli" id="txtapellido1cli" placeholder="Primer Apellido"  onKeyUp="document.frmpersonas.txtusuariocli.value = rellena_usuario(this.value,document.frmpersonas.txtapellido2cli.value,<?php ramdom();?>,document.frmpersonas.txtfechanaccli.value);" onKeypress= "return validarn(event)" required>
</div>

                                    <label>Segundo Apellido</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
  <input type="text" class="form-control" name="txtapellido2cli" placeholder="Segundo Apellido" id="txtapellido2cli" onKeyUp="document.frmpersonas.txtusuariocli.value = rellena_usuario(document.frmpersonas.txtapellido1cli.value,this.value,<?php ramdom();?>,document.frmpersonas.txtfechanaccli.value);" onKeypress= "return validarn(event)">
</div>

 
  

	<label>Genero</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
  <select class="form-control" name="cmbgenerocli">
  <option value="masculino">Masculino</option>
  <option value="femenino">Femenino</option>
  

</select>
</div>

	<label>Tipo de documento</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-credit-card"></span></span>
  <select class="form-control" name="cmbtipodoccli">
  <option value="dui">DUI</option>
  <option value="otro">Otro</option>
  

</select>
</div>

                                    <label>Numero de documento</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card "></span></span>
  <input type="text" class="form-control" name="txtnumdoccli" placeholder="898762718-6" onKeyPress=" return validarnumero(event)">
</div>

                                    <label>Numero del contribuyente</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card "></span></span>
  <input type="text" class="form-control" name="txtnumcontribuyentecli" placeholder="numero contribuyente"  onKeyPress=" return validarnumero(event)">
</div>

                                    <label>Dirección</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-home"></span></span>
  <input type="text" class="form-control" name="txtdireccioncli" placeholder="Dirección" required>
</div>

                                    <label>Correo electrónico</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-envelope"></span></span>
  <input type="email" class="form-control" name="txtcorreocli" placeholder="Correo electrónico">
</div>


                                    <label>Telefono fijo</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
  <input type="text" class="form-control" name="txttelfijocli" placeholder="Telefono fijo" onKeyPress=" return validarnumero(event)">
</div>

                                    <label>Telefono celular</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
  <input type="text" class="form-control" name="txttelcelcli" placeholder="Telefono celular" required onKeyPress=" return validarnumero(event)"required>
</div>




                                    <label>Usuario</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
  <input type="text" name="txtusuariocli" id="txtusuariocli" class="form-control" placeholder="Usuario autogenerado" readonly  >
</div>


                                    <label>Contraseña</label>
                                    <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
  <input type="password" name="txtpasscli" class="form-control" placeholder="Contraseña por defecto" value="12345"  readonly> <!--LUEGO DESHABILITAR -->
</div>
 
<input type="hidden" name="tipousuario" value="cliente">
									
								


							
								</fieldset>
 <br></br>	                               
							        <input type="submit" class="link-button"  value="Guardar" name="submit" id="submit"  />
								<input type="hidden" name="fechaact" value="<?php fecha() ?>">
							</form>
                            
		
					</div>
					<!-- ENDS content -->
				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->
			
			


		
		
			<!-- Bottom -->
			<div id="bottom">
				<!-- wrapper-bottom -->
				<div class="wrapper">
					<div id="bottom-text">2014 ASI2-G06 Todos los derechos reservados.</div>
					<!-- Social -->
					<ul class="social ">
						<li><a href="http://www.facebook.com" class="poshytip  facebook" title="Dale me gusta en"></a></li>
						<li><a href="http://www.twitter.com" class="poshytip twitter" title="Sigue nuestros tweets"></a></li>
						<li><a href="http://www.youtube.com" class="poshytip youtube" title="Veanos en"></a></li>
					</ul>
					<!-- ENDS Social -->
					<div id="to-top" class="poshytip" title="To top"></div>
				</div>
				<!-- ENDS wrapper-bottom -->
			</div>
			<!-- ENDS Bottom -->
	
	</body>
</html>
<?php }}?>