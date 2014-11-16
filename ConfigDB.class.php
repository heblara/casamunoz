<?php
class ConfigDB{
        var $DB_MySQL; //BASE DE DATOS MYSQL
        var $Server_MySQL; //SERVIDOR MYSQL
        var $User_MySQL; //USUARIO MYSQL
        var $Password_MySQL; //CONTRASENA MYSQL
        function configDB(){
                $this->DB_MySQL="casamunoz"; 
                $this->Server_MySQL="localhost";
                $this->User_MySQL="root";
                $this->Password_MySQL="";
        }
}
?>