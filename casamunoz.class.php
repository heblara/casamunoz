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
    function registar_empleado($datos) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "INSERT INTO `EMPLEADO`(`cod_emp`, `primer_nom`, `segundo_nom`, `primer_ape`, `segundo_ape`, `dui_emp`, 
            `nit_emp`, `genero_emp`, `fec_nac`, `tel_fijo`, `tel_movil`, `correo_emp`, `direc_emp`, `estado_emp`, 
            `fec_ini_cont`, `fec_fin_cont`, `cod_cargo`, `cod_cubiculo`, `cod_municipio`, `cod_usuario`, `cod_sucursal`) 
        VALUES (:cod_emp,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:dui,:nit,:genero,:fechanac,:telfijo,:telmovil,:correo,
            :direccion,:estado,:fecha_ini_cont,:fecha_fin_cont,:cargo,:cubiculo,:municipio,:usuario,:sucursal)";
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
        $query->bindParam(":cubiculo",$dato[17]);
        $query->bindParam(":municipio",$dato[18]);
        $query->bindParam(":usuario",$dato[19]);
        $query->bindParam(":sucursal",$dato[20]);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
        else
            return false;
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
	function mostrar_empleado($dato) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM EMPLEADO WHERE cod_emp = '".$dato."'";
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
}
?>
