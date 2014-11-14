<?php
$user=base64_decode($_GET["e"]);
if($user=="" || $user==null || trim($user)==""){
    header("Location:?mod=home");
}else{
	$objUser=new Casamunoz;
	$consultarCliente=$objUser->mostrar_cliente($user);
	if($consultarCliente->rowCount()==1){
		$cuenta=$consultarCliente->fetch(PDO::FETCH_OBJ);
		$codigo=generarCodigo(8);
		$usuario = array($cuenta->cod_cliente,md5($codigo),"Activo","3");
        //if($validar=$objUser->ValidarCuenta($user)){
        if($objUser->guardar_usuario($usuario)){
        	echo "Su cuenta ha sido validada con exito<br>Su contrase&ntilde;a se ha enviado a su Correo Personal<br>Para ingresar a su cuenta haga <a href='http://localhost/casamunoz2/?mod=login'>clic aqui</a>";
        	$mensaje="Su cuenta ha sido validada con exito<br>Para ingresar a su cuenta haga <a href='http://localhost/casamunoz2/?mod=login'>clic aqui</a><br /><br />
        	Datos de acceso:<br />
        	Usuario: ".$user."<br />
        	Contrase&ntilde;a: ".$codigo."<br />
        	<br />
        	<hr />
        	<h3>Instrucciones básicas de acceso:</h3><br />
        	Debe cambiar su contrase&ntilde;a al primer inicio para que su contrase&ntilde;a sea m&aacute;s segura.";
        	//echo $mensaje;
            $nombre=$cuenta->primer_nom." ".$cuenta->segundo_nom." ".$cuenta->primer_ape." ".$cuenta->segundo_ape;
        	Enviar_Email($cuenta->correo_cliente,$nombre,$mensaje,"Casa Munoz","","Activacion realizada con exito","");
        }
    }
}
?>