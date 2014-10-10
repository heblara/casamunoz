<?php
   include_once ("ConfigDB.class.php");
    //esta clase nos permitira conectarnos a la base de datos
    class DBManager{
        //Método constructor.
        function DBManager(){
        }
        //,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        //Método que se encargará de la verificar y realizar la conexión.
        function conectar($tipo) {
            $conectar = new ConfigDB();
            try {
                if($tipo=="mysql"){

    
                    $dbh = new PDO("mysql:host=$conectar->Server_MySQL;dbname=$conectar->DB_MySQL","$conectar->User_MySQL","$conectar->Password_MySQL",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    //$dbh->exec('SET CHARACTER SET utf8');
                }
            }
            catch (PDOException $e){
                echo $e->getMessage(); //En caso de error, saldría una excepción
            }
            return ($dbh);
        }
    }
?>