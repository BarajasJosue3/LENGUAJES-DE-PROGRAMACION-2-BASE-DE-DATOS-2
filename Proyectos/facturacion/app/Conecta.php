<?php 
$Server = "localhost";
$UsuarioBd = "root";
$Password = "";
$DbName = "FacturaDB";

// Crear la conexion 
$Connecta = new mysqli($Server, $UsuarioBd, $Password, $DbName);
// verificar la conexion 
    if($Connecta->connect_error){
        die("Fallo al conectar la BD" .$Connecta->connect_error);
}


?>