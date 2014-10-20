<link rel="stylesheet" href="css/styles.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/script.js"></script>
<div id='cssmenu'>
<ul>
<?php 
@session_start();
if(isset($_SESSION['autenticado'])){
    if($_SESSION['tipo']==1){
    ?>
    <li><a href='index.php'><span>Inicio</span></a></li>
    <li class='active has-sub'><a href='#'><span>Empleado</span></a>
      <ul>
         <li><a href='?mod=registroempleado'><span>Agregar</span></a></li>
          <li class='last'><a href='?mod=buscarempleado'><span>Buscar</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Promocion</span></a>
      <ul>
         <li><a href='?mod=registraroferta'><span>Registrar Oferta</span></a></li>
          <li class='last'><a href='?mod=registroimagenes'><span>Imagenes slide</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Reporte</span></a>
      <ul>
         <li><a href='?mod=buscarreporteventa'><span>Reportes de ventas</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Servicio</span></a>
      <ul>
         <li><a href='?mod=registrarservicios'><span>Agregar</span></a></li>
          <li class='last'><a href='?mod=buscarservicio'><span>Buscar</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Sucursal</span></a>
      <ul>
          <li class='last'><a href='?mod=registrartemporada'><span>Temporadas</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Cuenta</span></a>
      <ul>
         <li><a href='?mod=cambiarcontrasena'><span>Cambiar Contrase&ntilde;a</span></a></li>
          <li class='last'><a href='?mod=logout'><span>Cerrar Sesi&oacute;n</span></a></li>
      </ul>
    </li>

    <!--<li class='active has-sub'><a href='#'><span>Historia</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Sucursales</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Product 2</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
      </ul>
    </li>-->
    <?php
    }else if($_SESSION['tipo']==2){
      ?>
    <li><a href='index.php'><span>Inicio</span></a></li>
    <li class='active has-sub'><a href='#'><span>Clientes</span></a>
      <ul>
        <li><a href='?mod=registrarcliente'><span>Registrar</span></a></li>
        <li><a href='?mod=reservarservicio'><span>Reserva</span></a></li>
        <li><a href='?mod=buscarcliente'><span>Expediente</span></a></li>
        <li class='last'><a href='?mod=vistareservaemp'><span>Vista de reserva</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Reporte</span></a>
      <ul>
         <li><a href='?mod=reporteventas'><span>Ventas</span></a></li>
          <li class='last'><a href='?mod=reporteproductos'><span>Productos</span></a></li>
      </ul>
    </li>
    <li><a href='?mod=factura'><span>Factura</span></a></li>
    <li class='active has-sub'><a href='#'><span>Empleado</span></a>
      <ul>
         <li><a href='?mod=buscaremp'><span>Dias libres</span></a></li>
         <li><a href='?mod=hojamateriales'><span>Hoja de materiales</span></a></li>
         <li><a href='?mod=pedidos'><span>Pedidos</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Cuenta</span></a>
      <ul>
         <li><a href='?mod=cambiarcontrasena'><span>Cambiar Contrase&ntilde;a</span></a></li>
          <li class='last'><a href='?mod=logout'><span>Cerrar Sesi&oacute;n</span></a></li>
      </ul>
    </li>
      <?php
    }else if($_SESSION['tipo']==3){
      ?>
	  <li><a href='index.php'><span>Inicio</span></a></li>
    <li class='active has-sub'><a href='#'><span>Reserva</span></a>
      <ul>
         <li><a href='?mod=iniciarreserva'><span>Iniciar reserva</span></a></li>
          <li class='last'><a href='?mod=vistareserva'><span>Vista de reservas</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Cuenta</span></a>
      <ul>
         <li><a href='?mod=cambiarcontrasena'><span>Cambiar Contrase&ntilde;a</span></a></li>
          <li class='last'><a href='?mod=logout'><span>Cerrar Sesi&oacute;n</span></a></li>
      </ul>
    </li>
    
      <?php
    }
}else{
?>
<li><a href='index.php'><span>Inicio</span></a></li>
<li><a href='?mod=historia'><span>Historia</span></a>
<!--<li class='active has-sub'><a href='#'><span>Historia</span></a>
  <ul>
     <li class='has-sub'><a href='#'><span>Sucursales</span></a>
        <ul>
           <li><a href='#'><span>Sub Product</span></a></li>
           <li class='last'><a href='#'><span>Sub Product</span></a></li>
        </ul>
     </li>
     <li class='has-sub'><a href='#'><span>Product 2</span></a>
        <ul>
           <li><a href='#'><span>Sub Product</span></a></li>
           <li class='last'><a href='#'><span>Sub Product</span></a></li>
        </ul>
     </li>
  </ul>
</li>-->
<li><a href='?mod=servicios'><span>Servicios</span></a></li>
<li><a href='?mod=sucursales'><span>Sucursales</span></a></li>
<li><a href='?mod=login'><span>Iniciar Sesi&oacute;n</span></a>
<li class="last" style="float:right;"><link rel="stylesheet" type="text/css" href="css/menu-login.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$('.active-links').click(function () {
        if ($('#signin-dropdown').is(":visible")) {
            $('#signin-dropdown').hide()
      $('#session').removeClass('active');
        } else {
            $('#signin-dropdown').show()
      $('#session').addClass('active');
        }
    return false;
    });
  $('#signin-dropdown').click(function(e) {
        e.stopPropagation();
    });
    $(document).click(function() {
        $('#signin-dropdown').hide();
    $('#session').removeClass('active');
    });
});     
</script>
        <div class="active-links">
            <div id="session">
            <a id="signin-link" href="#">
            <strong>Iniciar Sesi&oacute;n</strong>
            </a>
            </div>
              <div id="signin-dropdown">
            <form method="post" class="signin" action="?mod=autenticar">
                <fieldset class="textbox">
              <label class="username">
                <span>Usuario o correo</span>
                <input name="username" value="" type="text" autocomplete="on">
                </label>
                <label class="password">
                <span>Contrase&ntilde;a</span>
                <input name="password" value="" type="password">
                </label>
                </fieldset>
                
                <fieldset class="remb">
                <button class="button" type="submit" name="login">Iniciar Sesi&oacute;n</button>
                </fieldset>
                <p>
                <a class="forgot" href="#">Olvid&oacute; su contrase&ntilde;a</a>
                </p>
                <p>
                <a class="forgot" href="?mod=registrarse">Registrate</a>
                </p>
            </form>
        </div>
    </div>
</li>
<?php 
}
?>
</ul>
</div>
