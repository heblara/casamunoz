<?php
class CasaMunoz {
    //constructor
    function CasaMunoz() {

    }
    function consultar_cliente($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM CLIENTE WHERE CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) LIKE'%".$dato."%'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_sucursal_unica($sucursal) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM SUCURSAL WHERE cod_sucursal='".$sucursal."'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_inventario($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM INVENTARIO WHERE cod_producto=:producto and cod_sucursal=:sucursal";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":producto",$dato[0]);
        $query->bindParam(":sucursal",$dato[1]);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function mostrar_cliente($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM CLIENTE WHERE cod_cliente = '".$dato."'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function registrar_empleado($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `EMPLEADO`(`cod_emp`, `primer_nom`, `segundo_nom`, `primer_ape`, `segundo_ape`, `dui_emp`, 
            `nit_emp`, `genero_emp`, `fec_nac`, `tel_fijo`, `tel_movil`, `correo_emp`, `direc_emp`, `estado_emp`, 
            `fec_ini_cont`, `fec_fin_cont`, `cod_cargo`, `cod_municipio`, `cod_sucursal`) 
        VALUES (:cod_emp,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:dui,:nit,:genero,:fechanac,
            :telfijo,:telmovil,:correo,:direccion,:estado,:fecha_ini_cont,:fecha_fin_cont,:cargo,:municipio,:sucursal)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":cod_emp",$dato[0]);
        $query->bindParam(":primer_nombre",$dato[1]);
        $query->bindParam(":segundo_nombre",$dato[2]);
        $query->bindParam(":primer_apellido",$dato[3]);
        $query->bindParam(":segundo_apellido",$dato[4]);
        $query->bindParam(":dui",$dato[5]);
        $query->bindParam(":nit",$dato[6]);
        $query->bindParam(":genero",$dato[7]);
        $query->bindParam(":fechanac",$dato[8]);
        $query->bindParam(":telfijo",$dato[9]);
        $query->bindParam(":telmovil",$dato[10]);
        $query->bindParam(":correo",$dato[11]);
        $query->bindParam(":direccion",$dato[12]);
        $query->bindParam(":estado",$dato[13]);
        $query->bindParam(":fecha_ini_cont",$dato[14]);
        $query->bindParam(":fecha_fin_cont",$dato[15]);
        $query->bindParam(":cargo",$dato[16]);
        $query->bindParam(":municipio",$dato[17]);
        $query->bindParam(":sucursal",$dato[18]);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());
        unset($dbh);
        unset($query);
    }
    function consultar_departamentos() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM DEPARTAMENTO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        //$query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }  
  
    function consultar_sucursal() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM SUCURSAL";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        //$query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }  
    function consultar_cubiculo() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM CUBICULO WHERE estado_cubiculo='D'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        //$query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }  
    function consultar_cargos() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM CARGO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        //$query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    } 
    function consultar_usuario($username, $password){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *, COUNT(*) as count FROM USUARIO where usuario='".$username."' and contra_usuario=md5('".$password."')";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":usuario",$username);
        $query->bindParam(":contra",$password);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
	function consultar_empleados() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM EMPLEADO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
	function consultar_empleado($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM EMPLEADO WHERE CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) LIKE'%".$dato."%'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_empleado_codigo($codigo) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM EMPLEADO WHERE cod_emp=:codigo";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$codigo);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_empleado_sucursal($sucursal) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM EMPLEADO WHERE cod_sucursal=:codigo";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$sucursal);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
	function mostrar_empleado($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM EMPLEADO WHERE cod_emp = :nombre";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    
    
    function consultar_municipio() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM MUNICIPIO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        //$query->bindParam(":nombre",$dato);
        $query->execute(); // Ejecutamos la consulta
     
               if ($query) {
            return $query;
        } //pasamos el query para utilizarlo luego con fetch
        else {
            return false;
        }
        unset($dbh);
        unset($query);
    }  
    
    function registar_cliente($datos) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `CLIENTE`(`cod_cliente`, `primer_nom`, `segundo_nom`, `primer_ape`, `segundo_ape`, `genero_cliente`, 
            `fec_nac`, `direc_cliente`, `tel_cliente`,`correo_cliente`, `diabetico_cliente`, `enfer_cliente`, 
             `cod_usuario`, `cod_tipo_cliente`, `cod_municipio`) 
        VALUES (:cod_cliente,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:genero,:fecha_nac,:direct_cliente,:tel_cliente,:correo_cliente,:diabetico_cliente,:enfer_cliente,
            :cod_usuario,:cod_tipo,:cod_municipio)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":cod_cliente",$dato[0]);
        $query->bindParam(":primer_nombre",$dato[1]);
        $query->bindParam(":segundo_nombre",$dato[2]);
        $query->bindParam(":primer_apellido",$dato[3]);
        $query->bindParam(":segundo_apellido",$dato[4]);
        $query->bindParam(":genero",$dato[5]);
        $query->bindParam(":fecha_nac",$dato[6]);
        $query->bindParam(":direct_cliente",$dato[7]);
        $query->bindParam(":tel_cliente",$dato[8]);
        $query->bindParam(":correo_cliente",$dato[9]);
        $query->bindParam(":diabetico_cliente",$dato[10]);
        $query->bindParam(":enfer_cliente",$dato[11]);
        $query->bindParam(":cod_usuario",$dato[12]);
        $query->bindParam(":cod_tipo",$dato[13]);
        $query->bindParam(":cod_municipio",$dato[14]);
        
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    
       function consultar_cod_usuario($username, $password){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM USUARIO INNER JOIN EMPLEADO ON USUARIO.cod_usuario = EMPLEADO.cod_usuario where usuario='".$username."' and contra_usuario=md5('".$password."')";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":usuario",$username);
        $query->bindParam(":contra",$password);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    
    function consultar_producto() { 
    	$con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager 
    	$dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL. 
    	$sql = "SELECT * FROM PRODUCTO"; $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion //
    	$query->execute(); // Ejecutamos la consulta 
    	if ($query) 
    	return $query; //pasamos el query para utilizarlo luego con fetch 
    	else 
    	return false; 
    	unset($dbh); 
    	unset($query); 
	}
    function consultar_inventario_sucursal($sucursal){ 
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager 
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL. 
        $sql = "SELECT * FROM INVENTARIO AS i
        INNER JOIN PRODUCTO AS p ON i.cod_producto=p.cod_producto
        WHERE i.cod_sucursal=".$sucursal; 
        //echo $sql;
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion //
        //$query->bindParam(":sucursal",$sucursal);
        $query->execute(); // Ejecutamos la consulta 
        if($query->execute()){
            return $query;
        }else{
            echo "\nPDOStatement::errorInfo():\n";
            $arr = $query->errorInfo();
            print_r($arr);
            return false;
        } 
        unset($dbh); 
        unset($query); 
    }
    
     function registrar_producto($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `PRODUCTO`(`nom_producto`, `deta_producto`, `rendimiento`, `fec_registro_producto`) 
        VALUES (:nom_producto,:deta_producto,:rendimiento,:fec_registro_producto)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nom_producto",$dato[0]);
        $query->bindParam(":deta_producto",$dato[1]);
        $query->bindParam(":rendimiento",$dato[2]);
        $query->bindParam(":fec_registro_producto",$dato[3]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function guardar_entrada($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `DETALLE_INGRESO`(`fec_ingreso`, `cant_ingreso`, `cod_producto`, `cod_sucursal`) 
        VALUES (:fecha,:cantidad,:producto,:sucursal)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $hoy=date('Y-m-d H:i:s');
        $query->bindParam(":fecha",$hoy);
        $query->bindParam(":cantidad",$dato[1]);
        $query->bindParam(":producto",$dato[0]);
        $query->bindParam(":sucursal",$dato[2]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function guardar_inventario($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `INVENTARIO`(`cod_sucursal`, `cod_producto`, `cant_inventario`) 
        VALUES (:sucursal,:producto,:cantidad)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":producto",$dato[0]);
        $query->bindParam(":sucursal",$dato[1]);
        $query->bindParam(":cantidad",$dato[2]);
        if($query->execute()){
            return $query;
        }else{
            echo "\nPDOStatement::errorInfo():\n";
            $arr = $query->errorInfo();
            print_r($arr);
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function actualizar_inventario($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "UPDATE `INVENTARIO` SET `cant_inventario`=:cantidad WHERE `cod_sucursal`=:sucursal and `cod_producto`=:producto";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":producto",$dato[0]);
        $query->bindParam(":sucursal",$dato[1]);
        $query->bindParam(":cantidad",$dato[2]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
}
?>
