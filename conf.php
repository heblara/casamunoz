<?php
define('MODULO_DEFECTO','home');
define('LAYOUT_DEFECTO','inicio.php');//admin
define('LAYOUT_LOGIN','login.php');//admin
define('LAYOUT_INICIO','inicio.php');//Para cualquier tipo de usuario
define('MODULO_PATH',realpath('paginas'));
define('LAYOUT_PATH',realpath('plantillas'));

$conf['404']=array(
'archivo'=>'404.php',
'layout'=>LAYOUT_INICIO
);
$conf['home']=array(
'archivo'=>'home.php',
'layout'=>LAYOUT_INICIO
);
$conf['historia']=array(
'archivo'=>'historia.php',
'layout'=>LAYOUT_INICIO
);
$conf['servicios']=array(
'archivo'=>'servicios.php',
'layout'=>LAYOUT_INICIO
);
$conf['sucursales']=array(
'archivo'=>'sucursales.php',
'layout'=>LAYOUT_INICIO
);
$conf['autenticar']=array(
'archivo'=>'autenticar.php',
'layout'=>LAYOUT_INICIO
);
$conf['logout']=array(
'archivo'=>'logout.php',
'layout'=>LAYOUT_INICIO
);
$conf['login']=array(
'archivo'=>'login.php',
'layout'=>LAYOUT_INICIO
);
$conf['contact']=array(
'archivo'=>'contactenos.php',
'layout'=>LAYOUT_INICIO
);
$conf['cambiarcontrasena']=array(
'archivo'=>'frmCambiarContra.php',
'layout'=>LAYOUT_INICIO
);
//admin
$conf['registroempleado']=array(
'archivo'=>'admin/registroempleados.php',
'layout'=>LAYOUT_INICIO
);
$conf['buscarempleado']=array(
'archivo'=>'admin/buscarempleado.php',
'layout'=>LAYOUT_INICIO
);
$conf['actualizarempleado']=array(
'archivo'=>'admin/actualizarempleado.php',
'layout'=>LAYOUT_INICIO
);
$conf['registraroferta']=array(
'archivo'=>'admin/registrooferta.php',
'layout'=>LAYOUT_INICIO
);
$conf['registroimagenes']=array(
'archivo'=>'admin/registroimagenes.php',
'layout'=>LAYOUT_INICIO
);
$conf['buscarreporteventa']=array(
'archivo'=>'admin/buscarreporteventa.php',
'layout'=>LAYOUT_INICIO
);
$conf['buscarreportefestivo']=array(
'archivo'=>'admin/buscarreportefestivo.php',
'layout'=>LAYOUT_INICIO
);
$conf['registrarservicios']=array(
'archivo'=>'admin/frmRegistrarServicio.php',
'layout'=>LAYOUT_INICIO
);
$conf['buscarservicio']=array(
'archivo'=>'admin/buscarservicio.php',
'layout'=>LAYOUT_INICIO
);
$conf['actualizarservicio']=array(
'archivo'=>'admin/frmActualizarServicio.php',
'layout'=>LAYOUT_INICIO
);
$conf['registrarfestivo']=array(
'archivo'=>'admin/frmRegistrarFestivo.php',
'layout'=>LAYOUT_INICIO
);
$conf['registrartemporada']=array(
'archivo'=>'admin/frmRegistroTemporada.php',
'layout'=>LAYOUT_INICIO
);
$conf['registroproducto']=array(
'archivo'=>'admin/frmIngresoProducto.php',
'layout'=>LAYOUT_INICIO
);
//CLIENTE
$conf['iniciarreserva']=array(
'archivo'=>'cliente/frmIniciarReserva.php',
'layout'=>LAYOUT_INICIO
);
$conf['vistareserva']=array(
'archivo'=>'cliente/vistareserva.php',
'layout'=>LAYOUT_INICIO
);
$conf['reprogramarreserva']=array(
'archivo'=>'cliente/frmReprogramarReserva.php',
'layout'=>LAYOUT_INICIO
);
$conf['registrarse']=array(
'archivo'=>'cliente/frmRegistroCliente.php',
'layout'=>LAYOUT_INICIO
);

//EMPLEADO

$conf['hojamateriales']=array(
'archivo'=>'empleado/frmHojaMateriales.php',
'layout'=>LAYOUT_INICIO
);
$conf['pedidos']=array(
'archivo'=>'empleado/frmPedidos.php',
'layout'=>LAYOUT_INICIO
);
$conf['registrarcliente']=array(
'archivo'=>'empleado/frmRegistroCliente.php',
'layout'=>LAYOUT_INICIO
);
$conf['reservarservicio']=array(
'archivo'=>'empleado/frmIniciarReservaEmpleado.php',
'layout'=>LAYOUT_INICIO
);
$conf['vistareservaemp']=array(
'archivo'=>'empleado/frmVistaReservaEmpleado.php',
'layout'=>LAYOUT_INICIO
);
$conf['buscarcliente']=array(
'archivo'=>'empleado/frmBuscarCliente.php',
'layout'=>LAYOUT_INICIO
);
$conf['modificarcliente']=array(
'archivo'=>'empleado/frmModificarCliente.php',
'layout'=>LAYOUT_INICIO
);
$conf['reporteventas']=array(
'archivo'=>'empleado/frmReporteVenta.php',
'layout'=>LAYOUT_INICIO
);
$conf['ingresoproductos']=array(
'archivo'=>'empleado/frmIngresoProductos.php',
'layout'=>LAYOUT_INICIO
);
$conf['salidaproductos']=array(
'archivo'=>'empleado/frmSalidaProductos.php',
'layout'=>LAYOUT_INICIO
);
$conf['entregamateriales']=array(
'archivo'=>'empleado/frmEntregaMateriales.php',
'layout'=>LAYOUT_INICIO
);
$conf['buscaremp']=array(
'archivo'=>'empleado/frmBuscarEmpleado.php',
'layout'=>LAYOUT_INICIO
);
$conf['factura']=array(
'archivo'=>'empleado/frmFactura.php',
'layout'=>LAYOUT_INICIO
);

?>
