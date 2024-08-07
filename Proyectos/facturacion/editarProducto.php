<?php 
include 'app/Conecta.php';
include 'app/consultas.php';
    $idProducto = $_GET['IdProducto'];
// Generar una consulta 
    $EditarProducto = "SELECT * FROM productos WHERE Id_productos = '$idProducto'";
    $EEditarProducto = $Connecta->query($EditarProducto);
    $DatosProducto = $EEditarProducto->fetch_assoc();
// Recuperar datos para la actualizacion 
    if(isset($_POST['btnUpdate'])){
    $DescripUpdate = $Connecta->real_escape_string($_POST['Descript']);
    $CantidadUpdate = $Connecta->real_escape_string($_POST['Cantidad']);
    $PrecioUpdate = $Connecta->real_escape_string($_POST['Precio']);
// Mostrar los datos recuperados 
    //echo "La nueva descripcion es: ".$DescripUpdate." y la nueva cantidad es: ".$CantidadUpdate." y el nuevo precio es: ".$PrecioUpdate;
// Consulta para actualizar los datos 
    $UpdateData = "UPDATE productos SET descripcion = '$DescripUpdate' , cantidad = '$CantidadUpdate', precio = '$PrecioUpdate' WHERE Id_productos = '$idProducto'";
    $EUpdateData = $Connecta->query($UpdateData);
    if($EUpdateData > 0){
        echo "Los datos de actualizaron correctamente";
        header("refresh:3;Mostrar_productos.php");
    }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="IdProducto" placeholder="Id Produto" value="<?php echo $DatosProducto['Id_productos'];?>"><br>
        <input type="text" name="Descript" placeholder="Descripcion" value="<?php echo $DatosProducto['descripcion'];?>"><br>
        <input type="text" name="Cantidad" placeholder="Cantidad" value="<?php echo $DatosProducto['cantidad'];?>"><br>
        <input type="text" name="Precio" placeholder="Precio" value="<?php echo $DatosProducto['precio'];?>"><br>
        <input type="submit" value="Actualizar" name="btnUpdate">
    </form>
    <br>
    <button type="button" onclick="location.href='Mostrar_Productos.php'">Regresar a Mostrar Productos</button>
</body>
</html>