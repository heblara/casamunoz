<?php        
//if (isset($_POST['login'])) {
	include("header.php");
	sleep(1);
	session_start();
	extract($_POST);
	$respuesta = new stdClass();
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
			$_SESSION['empleado']=$username;
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
			$respuesta->mensaje = 3;
		  }else  {
		    	//echo "USUARIO INACTIVO";
		  		$respuesta->mensaje = 1;
		  }
	}else {
		$respuesta->mensaje = 2;
		//echo "USUARIO O CONTRA INCORRECTOS";
	}        
//}
 echo json_encode($respuesta);    
?>