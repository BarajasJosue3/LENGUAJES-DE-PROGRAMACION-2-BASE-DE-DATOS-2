<?php 
$Servidor = "localhost";
$UsuarioServer = "root";
$PasswordServer = "";
$NomDb = "supermercado";

// crear la conexion 
$conecta = new mysqli($Servidor, $UsuarioServer, $PasswordServer, $NomDb);

// Verificar conexion 
if($conecta->connect_error){
     die("Conexion erronea".$conecta->connect_error);


}




?>