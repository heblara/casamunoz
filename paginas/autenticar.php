<?php        
if (isset($_POST['login'])) {
extract($_POST);
$objeto = new CasaMunoz;
$consulta = $objeto->consultar_usuario($username, $password);
if ($consulta->rowCount()>0){
  	  $resUser = $consulta->fetch(PDO::FETCH_OBJ);
  	  $consEmpleado=$objeto->consultar_empleado_codigo($username);
  	  $resEmpleado=$consEmpleado->fetch(PDO::FETCH_OBJ);
  	  session_start();
	  if($resUser->estado_usuario=='Activo'){   
	  	$_SESSION['sucursal']=$resEmpleado->cod_sucursal;
		$_SESSION['nombre1']=$resUser->cod_usuario;
		$_SESSION['usuario']=$resUser->usuario;
	  	$_SESSION['autenticado']='si'; 
	  	$_SESSION["tipo"]=$resUser->ROL_cod_rol;
	    /*if( $resUser->ROL_cod_rol == 1)     {
	    	$_SESSION['tipo']=1;
	    } elseif($resUser->ROL_cod_rol == 2) {
	    	$_SESSION['tipo']=2;
	    } elseif($resUser->ROL_cod_rol == 3) {
	    	$_SESSION['tipo']=3;
	    }*/
		header("Location:?mod=home");
	  }else  {
	    	echo "USUARIO INACTIVO";
	  }
}else {
	echo "USUARIO O CONTRA INCORRECTOS";
}        
    
  }    
?>

