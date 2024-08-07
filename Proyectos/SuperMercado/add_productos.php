<?php 
include 'app/conecta.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Nombre = $_POST['nombre'];
    $Precio = $_POST['precio'];

    // prueba para ver si recuperamos datos 
    // echo "El Nombre del producto es: ".$Nombre." y el precio es: ".$Precio;
    if($Nombre == ""){
        echo "Por favor coloca el nombre del producto";
    }
    else if($Precio == ""){
        echo "Por favor Coloca el Precio del producto";
    }
    else{

    // insertar los datos dentro de la base de datos
    $Rproducto = "INSERT INTO Productos(NombreProducto,Precio)VALUES('$Nombre','$Precio')";
    $ERproducto = $conecta->query($Rproducto );
        if($ERproducto > 0){
            echo "Registro exitoso";
        }
        else{
            echo "No se registro en la base de datos";
        }
    }
}


?>