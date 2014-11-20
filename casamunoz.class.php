<?php
class CasaMunoz {
    //constructor
    function CasaMunoz() {

    }

    function consultar_servicios_dia() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * from SERVICIO ";
        //$sql = "SELECT * FROM SERVICIO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_estados() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM ESTADO_RESERVA ";
        //$sql = "SELECT * FROM SERVICIO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_reserva_cliente($cod) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM RESERVA AS r
        INNER JOIN CONTROL AS c ON c.cod_rsv=r.cod_rsv
        INNER JOIN ESTADO_RESERVA AS es ON es.cod_estado_rsv=c.cod_estado
        WHERE r.cod_rsv=:cod AND es.cod_estado_rsv=1";
        //$sql = "SELECT * FROM SERVICIO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":cod",$cod);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
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
    function consultar_clientes() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM CLIENTE";
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
    //INSERT INTO `RESERVA`(`cod_rsv`, `cod_cliente`, `cod_sucursal`, `cod_servicio`, `cod_emp`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
    function registrar_reserva($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `RESERVA`(`cod_cliente`, `cod_sucursal`, `cod_servicio`, `cod_emp`) 
        VALUES (:cliente,:sucursal,:servicio,:empleado)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":cliente",$dato[0]);
        $query->bindParam(":sucursal",$dato[1]);
        $query->bindParam(":servicio",$dato[2]);
        $query->bindParam(":empleado",$dato[3]);
        
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function guardar_control($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `CONTROL`(`cod_estado`, `cod_rsv`, `fec_estado_rsv`,`hora_rsv`) 
        VALUES (:estado,:reserva,:fecha,:hora)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":estado",$dato[0]);
        $query->bindParam(":reserva",$dato[1]);
        $query->bindParam(":fecha",$dato[2]);
        $query->bindParam(":hora",$dato[3]);
        if($query->execute()){
            return $query;
        }else{
            echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function registrar_temporada($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `TEMPORADA` (`nom_temp`, `fec_ini`, `fec_fin`) 
        VALUES (:nombre,:fechainicio,:fechafin)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $hoy=date('Y-m-d H:i:s');
        $query->bindParam(":nombre",$dato[0]);
        $query->bindParam(":fechainicio",$dato[1]);
        $query->bindParam(":fechafin",$dato[2]);
		
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function registrar_oferta($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `OFERTA` (`nom_oferta`, `desc_oferta`, `fec_publi`, `fec_limite`, `desct_oferta`, `cod_servicio`) 
        VALUES (:nom_oferta,:desc_oferta,:fec_publi,:fec_limite,:desct_oferta,:cod_servicio)";
        $query = $dbh->prepare($sql);
        $hoy=date('Y-m-d H:i:s'); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nom_oferta",$dato[0]);
        $query->bindParam(":desc_oferta",$dato[1]);
        $query->bindParam(":fec_publi",$hoy);
        $query->bindParam(":fec_limite",$dato[3]);
        $query->bindParam(":desct_oferta",$dato[4]);
        $query->bindParam(":cod_servicio",$dato[5]);
		
        if($query->execute()){
            return $query;
        }else{
            echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());
        }
        unset($dbh);
        unset($query);
    }
	function guardar_oferta_sucursal($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `DISPONIBILIDAD_OFERTA`(`cod_sucursal`, `cod_oferta`) 
        VALUES (:sucursal,:oferta)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$dato[0]);
        $query->bindParam(":oferta",$dato[1]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function consultar_ultimo_id($tabla,$campo) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT LAST_INSERT_ID( $campo ) AS last_id
        FROM $tabla
        ORDER BY last_id DESC ";
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
	function consultar_ultima_oferta() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT LAST_INSERT_ID( cod_oferta ) AS last_id
        FROM OFERTA
        ORDER BY last_id DESC ";
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
	function consultar_servicio() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM SERVICIO";
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
    function registrar_cliente($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `CLIENTE`(`cod_cliente`, `primer_nom`, `segundo_nom`, `primer_ape`, `segundo_ape`, `genero_cliente`, 
            `fec_nac`, `tel_cliente`, `correo_cliente`, `diabetico_cliente`, `enfer_cliente`, `cod_usuario`, `cod_tipo_cliente`, 
            `cod_municipio`)
        VALUES (:cod_cliente,:primer_nom,:segundo_nom,:primer_ape,:segundo_ape,:genero_cliente,:fec_nac, :tel_cliente, 
            :correo_cliente,:diabetico_cliente,:enfer_cliente,:cod_usuario,:cod_tipo_cliente,:cod_municipio)";
        $query = $dbh->prepare($sql);
        $query->bindParam(":cod_cliente",$dato[0]);
        $query->bindParam(":primer_nom",$dato[1]);
        $query->bindParam(":segundo_nom",$dato[2]);
        $query->bindParam(":primer_ape",$dato[3]);
        $query->bindParam(":segundo_ape",$dato[4]);
        $query->bindParam(":genero_cliente",$dato[5]);
        $query->bindParam(":fec_nac",$dato[6]);
        $query->bindParam(":tel_cliente",$dato[7]);
        $query->bindParam(":correo_cliente",$dato[8]);
        $query->bindParam(":diabetico_cliente",$dato[9]);
        $query->bindParam(":enfer_cliente",$dato[10]);
        $query->bindParam(":cod_usuario",$dato[11]);
        $query->bindParam(":cod_tipo_cliente",$dato[12]);
        $query->bindParam(":cod_municipio",$dato[13]);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());
        unset($dbh);
        unset($query);
    }
    function registrar_costo($dato) {
        try{
            $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
            $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
            $sql = "INSERT INTO `COSTO` (`precio_Costo`, `fec_registro`) 
            VALUES (:costo,:fecha)";
            $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
            $hoy=date('Y-m-d H:i:s');
            $query->bindParam(":costo",$dato);
            $query->bindParam(":fecha",$hoy);
            if($query->execute()){            
                return $query;
            }
            //else{
                //print "Error!: " . $e->getMessage() . "</br>"; 
             //   return false;
           // }
        } catch(PDOExecption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
        /*$con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `COSTO` (`precio_costo`, `fec_registro`) 
        VALUES (:costo,:fecha)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $hoy=date('Y-m-d H:i:s');
        $query->bindParam(":costo",$dato);
        $query->bindParam(":fecha",$hoy);
        if($query->execute()){            
            return $query;
        }else{
            print "Error!: " . $e->getMessage() . "</br>"; 
            return false;
        }
        unset($dbh);
        unset($query);*/
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
	  function consultar_nombre1($usuario) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM CLIENTE WHERE cod_cliente='".$usuario."'";
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
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM CLIENTE WHERE cod_cliente = '".$dato."'";
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
    function actualizar_empleado($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "UPDATE `EMPLEADO` SET `primer_nom` = :primer_nombre, `segundo_nom`=:segundo_nombre, `primer_ape`=:primer_apellido, 
        `segundo_ape`=:segundo_apellido, `dui_emp`=:dui, 
            `nit_emp`=:nit, `fec_nac`=:fechanac, `fec_ini_cont`=:fechainicio, `fec_fin_cont`=:fechafin, `tel_fijo`=:telfijo, `tel_movil`=:telmovil, 
            `correo_emp`=:correo, `direc_emp`=:direccion, `estado_emp`=:estado,`cod_cargo`=:cargo, `cod_municipio`=:municipio,
            `cod_sucursal`=:sucursal WHERE `cod_emp`=:cod_emp";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":cod_emp",$dato[0]);
        $query->bindParam(":primer_nombre",$dato[1]);
        $query->bindParam(":segundo_nombre",$dato[2]);
        $query->bindParam(":primer_apellido",$dato[3]);
        $query->bindParam(":segundo_apellido",$dato[4]);
        $query->bindParam(":dui",$dato[5]);
        $query->bindParam(":nit",$dato[6]);
        $query->bindParam(":fechanac",$dato[7]);
		$query->bindParam(":fechainicio",$dato[8]);
		$query->bindParam(":fechafin",$dato[9]);
        $query->bindParam(":telfijo",$dato[10]);
        $query->bindParam(":telmovil",$dato[11]);
        $query->bindParam(":correo",$dato[12]);
        $query->bindParam(":direccion",$dato[13]);
        $query->bindParam(":estado",$dato[14]);
        $query->bindParam(":cargo",$dato[15]);
        $query->bindParam(":municipio",$dato[16]);
        $query->bindParam(":sucursal",$dato[17]);
         // Ejecutamos la consulta
        if ($query->execute()){
            return $query; //pasamos el query para utilizarlo luego con fetch
        }else{
            echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());
            return false;
        }
            
        unset($dbh);
        unset($query);
    }
    function registrar_Ccliente($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `CLIENTE`(`cod_cliente`, `primer_nom`, `segundo_nom`, `primer_ape`, `segundo_ape`, `genero_cliente`, 
            `fec_nac`, `tel_cliente`, `correo_cliente`, `diabetico_cliente`, `enfer_cliente`, `cod_tipo_cliente`, 
            `cod_municipio`)
        VALUES (:cod_cliente,:primer_nom,:segundo_nom,:primer_ape,:segundo_ape,:genero_cliente,:fec_nac, :tel_cliente, 
            :correo_cliente,:diabetico_cliente,:enfer_cliente,:cod_tipo_cliente,:cod_municipio)";
        $query = $dbh->prepare($sql);
        $query->bindParam(":cod_cliente",$dato[0]);
        $query->bindParam(":primer_nom",$dato[1]);
        $query->bindParam(":segundo_nom",$dato[2]);
        $query->bindParam(":primer_ape",$dato[3]);
        $query->bindParam(":segundo_ape",$dato[4]);
        $query->bindParam(":genero_cliente",$dato[5]);
        $query->bindParam(":fec_nac",$dato[6]);
        $query->bindParam(":tel_cliente",$dato[7]);
        $query->bindParam(":correo_cliente",$dato[8]);
        $query->bindParam(":diabetico_cliente",$dato[9]);
        $query->bindParam(":enfer_cliente",$dato[10]);
        //$query->bindParam(":cod_usuario",$dato[11]);
        $query->bindParam(":cod_tipo_cliente",$dato[11]);
        $query->bindParam(":cod_municipio",$dato[12]);
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
        $sql = "SELECT * FROM CARGO WHERE cod_cargo!='4'";
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
        $sql = "SELECT * FROM USUARIO where usuario=:usuario and contra_usuario=md5(:contra)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":usuario",$username);
        $query->bindParam(":contra",$password);
        $query->execute(); // Ejecutamos la consulta
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function buscar_usuario($username){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM USUARIO where usuario=:usuario";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":usuario",$username);
        $query->execute(); // Ejecutamos la consulta
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
	function consultar_empleados() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM EMPLEADO WHERE cod_cargo<>4";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }

function consultar_empleado_reporte($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto  FROM EMPLEADO WHERE cod_emp='".$dato."' GROUP BY cod_emp";
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
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM EMPLEADO WHERE CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) LIKE'%".$dato."%' and estado_emp='A'";
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
    /*$sql="SELECT * 
        FROM EMPLEADO AS e
        LEFT JOIN DIA_LIBRE AS dl ON e.cod_emp = dl.cod_emp
        LEFT JOIN RESERVA AS r ON r.cod_emp = e.cod_emp AND 
        LEFT JOIN CONTROL AS c ON c.cod_rsv = r.cod_rsv
        LEFT JOIN ESTADO_RESERVA AS er ON er.cod_estado_rsv = c.cod_estado
        WHERE dl.cod_emp IS NULL and r.cod_emp IS NULL and e.cod_sucursal=:sucursal and dl.cod_emp=:empleado";*/
    function consultar_empleado_reserva($empleado,$fec,$hora){
        //echo $sucursal."- ".$date."- ".$empleado;
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql="SELECT * 
        FROM RESERVA AS r
        INNER JOIN CONTROL AS c ON c.cod_rsv = r.cod_rsv
        INNER JOIN ESTADO_RESERVA AS er ON er.cod_estado_rsv = c.cod_estado
        WHERE r.cod_emp=:empleado and c.fec_estado_rsv='".$fec."' and c.hora_rsv='".$hora."'";
        //echo $sql."<br />";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        /*$query->bindParam(":fecha",$date);
        $query->bindParam(":hora",$hora);*/
        $query->bindParam(":empleado",$empleado);
         // Ejecutamos la consulta
        if ($query->execute())
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_disponibilidad_empleado($sucursal,$date,$empleado){
        //echo $sucursal."- ".$date."- ".$empleado;
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * 
        FROM DIA_LIBRE AS dl
        INNER JOIN EMPLEADO AS e ON dl.cod_emp = e.cod_emp
        WHERE e.cod_sucursal=:sucursal and dl.cod_emp=:empleado and dl.fec_libre=:fecha";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$sucursal);
        $query->bindParam(":fecha",$date);
        $query->bindParam(":empleado",$empleado);
         // Ejecutamos la consulta
        if ($query->execute())
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_empleados_sucursal($sucursal) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto 
        FROM EMPLEADO WHERE cod_sucursal=:codigo";
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
    function actualizar_usuario_empleado($dato,$emp){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "UPDATE EMPLEADO SET cod_usuario=:usuario WHERE cod_emp=:emp";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":usuario",$dato);
        $query->bindParam(":emp",$emp);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function actualizar_usuario_cliente($dato,$cliente){
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "UPDATE CLIENTE SET cod_usuario=:usuario WHERE cod_cliente=:cliente";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":usuario",$dato);
        $query->bindParam(":cliente",$cliente);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_ultimo_usuario() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT LAST_INSERT_ID( cod_usuario ) AS last_id
                FROM USUARIO
                ORDER BY last_id DESC  ";
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
    function consultar_empleado_sucursal($sucursal,$empleado) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto 
        FROM EMPLEADO WHERE cod_emp=:empleado and cod_sucursal=:codigo";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$sucursal);
        $query->bindParam(":empleado",$empleado);
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
            `fec_nac`, `direc_cliente`, `tel_cliente`,`correo_cliente`, `diabetico_cliente`, `enfer_cliente`, `cod_tipo_cliente`, `cod_municipio`) 
        VALUES (:cod_cliente,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:genero,:fecha_nac,
            :direct_cliente,:tel_cliente,:correo_cliente,:diabetico_cliente,:enfer_cliente,
            :cod_tipo,:cod_municipio)";
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
        //$query->bindParam(":cod_usuario",$dato[12]);
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
    function consultar_inventario_sucursal($sucursal){ 
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager 
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL. 
        $sql = "SELECT p.cod_producto,p.nom_producto,i.cant_inventario,MAX(DI.fec_ingreso) as fec_ingreso FROM INVENTARIO AS i
        INNER JOIN PRODUCTO AS p ON i.cod_producto=p.cod_producto
		INNER JOIN DETALLE_INGRESO AS DI ON p.cod_producto=DI.cod_producto
        WHERE i.cod_sucursal='".$sucursal."'
        GROUP BY i.cod_producto
		ORDER BY i.cod_producto,fec_ingreso DESC";
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
        $query->bindParam(":producto",$dato[0]);
        $query->bindParam(":cantidad",$dato[1]);
        $query->bindParam(":sucursal",$dato[2]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function guardar_sucursal_servicio($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `DISPONIBILIDAD_SERVICIO`(`cod_sucursal`, `cod_servicio`) 
        VALUES (:sucursal,:servicio)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$dato[0]);
        $query->bindParam(":servicio",$dato[1]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function guardar_sucursal_temporada($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `SUCURSAL_TEMPORADA`(`cod_sucursal`, `cod_temp`) 
        VALUES (:sucursal,:temporada)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$dato[0]);
        $query->bindParam(":temporada",$dato[1]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function guardar_salida($dato) {
        try{
            $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
            $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
            $sql = "INSERT INTO `DETALLE_SALIDA`(`fec_salida`, `cant_salida`, `cod_emp`,`cod_producto`) 
            VALUES (:fecha,:cantidad,:empleado,:producto)";
            $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
            $hoy=date('Y-m-d H:i:s');
            $query->bindParam(":fecha",$hoy);
            $query->bindParam(":cantidad",$dato[1]);
            $query->bindParam(":producto",$dato[0]);
            $query->bindParam(":empleado",$dato[2]);
            if ($query->execute()){
                return $query; //pasamos el query para utilizarlo luego con fetch
            }else{
                /*echo "\nPDO::errorInfo():\n";
                print_r($dbh->errorInfo());*/
                return false;
            }
        } catch(PDOExecption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
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
            echo "\nInventario PDOStatement::errorInfo():\n";
            $arr = $query->errorInfo();
            print_r($arr);
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function actualizar_inventario($dato) {
        try{
            $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
            $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
            $sql = "UPDATE `INVENTARIO` SET `cant_inventario`=:cantidad WHERE `cod_sucursal`=:sucursal and `cod_producto`=:producto";
            $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
            $query->bindParam(":producto",$dato[0]);
            $query->bindParam(":sucursal",$dato[1]);
            $query->bindParam(":cantidad",$dato[2]);
            if ($query->execute()){
                return $query; //pasamos el query para utilizarlo luego con fetch
            }else{
                /*echo "\nInventario PDO::errorInfo():\n";
                print_r($dbh->errorInfo());*/
                return false;
            }
        } catch(PDOExecption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
        unset($dbh);
        unset($query);
    }
    
    
    function consultar_costo() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM costo";
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
    function consultar_ultimo_costo() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT LAST_INSERT_ID( cod_costo ) AS last_id
        FROM COSTO
        ORDER BY last_id DESC ";
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
    function consultar_ultima_temporada() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT LAST_INSERT_ID( cod_temp ) AS last_id
        FROM TEMPORADA
        ORDER BY last_id DESC ";
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
    function consultar_temporadas() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM TEMPORADA";
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
    function consultar_ultimo_servicio() {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT LAST_INSERT_ID( cod_servicio ) AS last_id
        FROM SERVICIO
        ORDER BY last_id DESC ";
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

    function consultar_nombre2($usuario) { 
    	$con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager 
    	$dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL. 
    	$sql = "SELECT *,CONCAT_WS(' ',primer_nom,segundo_nom,primer_ape,segundo_ape) as NombreCompleto FROM EMPLEADO WHERE cod_cargo='1' and cod_emp=:usuario"; 
    	$query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion 
        $query->bindParam(":usuario",$usuario);
    	$query->execute(); // Ejecutamos la consulta 
    	if ($query) 
    	return $query; //pasamos el query para utilizarlo luego con fetch 
    	else 
    	return false; 
    	unset($dbh); 
    	unset($query); 
    }
    
    function insertar_imagen($dato) {
		$con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager 
    	$dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL. 
    	$sql = "INSERT INTO `IMAGEN`(`fec_limite`, `ruta_img`,`cod_emp`)   
        VALUES (:fec_limite,:ruta_img,:cod_emp)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $hoy=date('Y-m-d H:i:s');
        $query->bindParam(":fec_limite",$dato[0]);
        $query->bindParam(":ruta_img",$dato[1]);
        $query->bindParam(":cod_emp",$dato[2]);

        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
	}
    function registrar_servicio($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `SERVICIO`(`nom_servicio`, `desc_servicio`, `fec_registro`, `duracion_servicio`,`cod_tipo_servicio`,`cod_costo`,`EMPLEADO_cod_emp`)   
                                 VALUES (:nom_servicio,:desc_servicio,:fec_registro,:duracion_servicio,:cod_tipo_servicio,:cod_costo,:usuario)";
        $query = $dbh->prepare($sql);
        $hoy=date('Y-m-d H:i:s'); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nom_servicio",$dato[0]);
        $query->bindParam(":desc_servicio",$dato[1]);
        $query->bindParam(":fec_registro",$hoy);
        $query->bindParam(":duracion_servicio",$dato[3]);
        $query->bindParam(":cod_tipo_servicio",$dato[4]);
        $query->bindParam(":cod_costo",$dato[5]);
        $query->bindParam(":usuario",$dato[6]);


        if($query->execute()){
            return $query;
        }else{
            /*echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());*/
            return false;
        }
        unset($dbh);
        unset($query);
    }
    
    
    
function actualizar_servicio($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "UPDATE `SERVICIO` SET `nom_servicio`=:nom_servicio,`desc_servicio`=:desc_servicio,`duracion_servicio`=:duracion_servicio,`cod_costo`=:costo
                    WHERE    `cod_servicio`=:cod_servicio";
        $query=$dbh->prepare($sql);
         $query->bindParam(":cod_servicio",$dato[0]);
        $query->bindParam(":nom_servicio",$dato[1]);
        $query->bindParam(":desc_servicio",$dato[2]);
        $query->bindParam(":duracion_servicio",$dato[3]);
        $query->bindParam(":costo",$dato[4]);
       

        
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





function consultar_servicios($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM servicio WHERE nom_servicio LIKE'%".$dato."%'";

        //$sql = "SELECT * FROM SERVICIO";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }





    function mostrar_servicio($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM SERVICIO WHERE cod_servicio = :codigo";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function listar_servicios($sucursal) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM SERVICIO AS s 
        INNER JOIN DISPONIBILIDAD_SERVICIO AS ds ON ds.cod_servicio=s.cod_servicio
        INNER JOIN COSTO as c ON c.cod_costo=s.cod_costo
        ORDER BY c.fec_registro AND ds.cod_sucursal=:sucursal";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$sucursal);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    
    function consultar_horario_sucursal($sucursal,$dia) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM HORARIO AS h 
        INNER JOIN SUCURSAL_HORARIO AS sh ON h.cod_horario=sh.cod_horario
        WHERE sh.cod_sucursal=:sucursal AND h.dia_horario=:dia";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$sucursal);
        //$dia=date('w');
        $query->bindParam(":dia",$dia);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }


    function registrar_cargo($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `CARGO` (`nom_cargo`, `desc_cargo`) 
        VALUES (:nombre,:descripcion)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nombre",$dato[0]);
        $query->bindParam(":descripcion",$dato[1]);
       	
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
    function guardar_usuario($usuario) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `USUARIO` (`usuario`, `contra_usuario`,`estado_usuario`,`ROL_cod_rol`) 
        VALUES (:usuario,:contrasena,:estado,:rol)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":usuario",$usuario[0]);
        $query->bindParam(":contrasena",$usuario[1]);
        $query->bindParam(":estado",$usuario[2]);
        $query->bindParam(":rol",$usuario[3]);
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
    }
	function registrar_sucursal($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `SUCURSAL` (`nom_sucursal`, `direc_sucursal`, `tel_sucursal`, `correo_sucursal`, `cod_municipio`) 
        VALUES (:nombre,:direccion,:telefono,:correo,:municipio)";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":nombre",$dato[0]);
        $query->bindParam(":direccion",$dato[1]);
        $query->bindParam(":telefono",$dato[2]);
		$query->bindParam(":correo",$dato[3]);
		$query->bindParam(":municipio",$dato[4]);
		
        if($query->execute()){
            return $query;
        }else{
            return false;
        }
        unset($dbh);
        unset($query);
		}
		
	function mostrar_costo($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM COSTO WHERE cod_costo = :codigo";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    	}
    	
    function consultar_reservas_cliente($cliente) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT r.cod_rsv,s.nom_servicio, su.nom_sucursal,MAX(co.fec_estado_rsv) as fec_estado_rsv,
    es.estado_rsv ,CONCAT_WS(' ',c.primer_nom,c.segundo_nom,c.primer_ape,c.segundo_ape) 
as NombreCompletoCliente,
CONCAT_WS(' ',e.primer_nom,e.segundo_nom,e.primer_ape,e.segundo_ape) 
as NombreCompletoEmpleado
    FROM EMPLEADO as e 
INNER JOIN RESERVA r ON r.cod_emp=e.cod_emp
INNER JOIN CONTROL co ON co.cod_rsv=r.cod_rsv
INNER JOIN ESTADO_RESERVA as es ON es.cod_estado_rsv=co.cod_estado
INNER JOIN CLIENTE c ON c.cod_cliente = r.cod_cliente
INNER JOIN SERVICIO s ON s.cod_servicio = r.cod_servicio
INNER JOIN SUCURSAL su ON su.cod_sucursal = r.cod_sucursal
WHERE cod_cliente = :cliente
GROUP BY fec_estado_rsv";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":cliente",$cliente);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_reporte_ventas($sucursal,$fecha) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT *,r.cod_rsv,s.nom_servicio, su.nom_sucursal,MAX(co.fec_estado_rsv) as fec_estado_rsv,
    es.estado_rsv ,CONCAT_WS(' ',c.primer_nom,c.segundo_nom,c.primer_ape,c.segundo_ape) 
as NombreCompletoCliente,
CONCAT_WS(' ',e.primer_nom,e.segundo_nom,e.primer_ape,e.segundo_ape) 
as NombreCompletoEmpleado, cos.precio_Costo,f.num_factura
    FROM EMPLEADO as e 
INNER JOIN RESERVA as r ON r.cod_emp=e.cod_emp
INNER JOIN FACTURA as f ON f.cod_rsv=r.cod_rsv
INNER JOIN CONTROL as co ON co.cod_rsv=r.cod_rsv
INNER JOIN ESTADO_RESERVA as es ON es.cod_estado_rsv=co.cod_estado
INNER JOIN CLIENTE AS c ON c.cod_cliente = r.cod_cliente
INNER JOIN SERVICIO AS s ON s.cod_servicio = r.cod_servicio
INNER JOIN COSTO AS cos ON s.cod_costo=cos.cod_costo
INNER JOIN SUCURSAL as su ON su.cod_sucursal = r.cod_sucursal
WHERE r.cod_rsv= :sucursal and co.fec_estado_rsv=:fecha and co.cod_estado=5
GROUP BY fec_estado_rsv";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$sucursal);
        $query->bindParam(":fecha",$fecha);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_reserva($sucursal) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT r.cod_rsv,s.nom_servicio, su.nom_sucursal,MAX(co.fec_estado_rsv) as fec_estado_rsv,
    es.estado_rsv ,CONCAT_WS(' ',c.primer_nom,c.segundo_nom,c.primer_ape,c.segundo_ape) 
as NombreCompletoCliente,
CONCAT_WS(' ',e.primer_nom,e.segundo_nom,e.primer_ape,e.segundo_ape) 
as NombreCompletoEmpleado
    FROM EMPLEADO as e 
INNER JOIN RESERVA r ON r.cod_emp=e.cod_emp
INNER JOIN CONTROL co ON co.cod_rsv=r.cod_rsv
INNER JOIN ESTADO_RESERVA as es ON es.cod_estado_rsv=co.cod_estado
INNER JOIN CLIENTE c ON c.cod_cliente = r.cod_cliente
INNER JOIN SERVICIO s ON s.cod_servicio = r.cod_servicio
INNER JOIN SUCURSAL su ON su.cod_sucursal = r.cod_sucursal
WHERE r.cod_sucursal=:sucursal
OR CONCAT_WS(' ',c.primer_nom,c.segundo_nom,c.primer_ape,c.segundo_ape) LIKE '%".$sucursal."%'
AND co.fec_estado_rsv LIKE '%".$sucursal."%'
GROUP BY fec_estado_rsv";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":sucursal",$sucursal);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    function consultar_datos_reserva($id) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT su.nom_sucursal,r.cod_rsv,s.nom_servicio, su.nom_sucursal,MAX(co.fec_estado_rsv) AS fec_estado_rsv,
        co.hora_rsv, es.estado_rsv ,CONCAT_WS(' ',c.primer_nom,c.segundo_nom,c.primer_ape,c.segundo_ape) AS NombreCompletoCliente,
        CONCAT_WS(' ',e.primer_nom,e.segundo_nom,e.primer_ape,e.segundo_ape) AS NombreCompletoEmpleado
        FROM EMPLEADO as e 
        INNER JOIN RESERVA r ON r.cod_emp=e.cod_emp
        INNER JOIN CONTROL co ON co.cod_rsv=r.cod_rsv
        INNER JOIN ESTADO_RESERVA as es ON es.cod_estado_rsv=co.cod_estado
        INNER JOIN CLIENTE c ON c.cod_cliente = r.cod_cliente
        INNER JOIN SERVICIO s ON s.cod_servicio = r.cod_servicio
        INNER JOIN SUCURSAL su ON su.cod_sucursal = r.cod_sucursal
        WHERE r.cod_rsv=:cod";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":cod",$id);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
    	function mostrar_sucursal_servicio($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM DISPONIBILIDAD_SERVICIO WHERE cod_servicio = :codigo";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":codigo",$dato);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
        unset($dbh);
        unset($query);
    }
}
?>
