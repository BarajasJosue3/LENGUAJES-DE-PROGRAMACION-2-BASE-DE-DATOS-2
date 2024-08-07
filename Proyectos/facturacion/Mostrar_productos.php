<?php 
//echo "Estas dentro de Mostrar productos";

include 'app/Conecta.php';
include 'app/consultas.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Productos</title>
</head>
<body>
<table style="border:1px solid;">
        <thead>
        <tr>
            <td>Id Productos</td>
            <td>Numero Factura</td>
            <td>Descripcion</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Opciones</td>
        </tr>
        </thead>
        <tbody>
<!-- aqui se genera un arreglo -->
            <?php while($ArregloP = $EProductos->fetch_assoc()){ ?>
            <tr>
                <td style="border:1px solid;"><?php echo $ArregloP['Id_productos']; ?></td>
                <td style="border:1px solid;"><?php echo $ArregloP['factura_id']; ?></td>
                <td style="border:1px solid;"><?php echo $ArregloP['descripcion']; ?></td>
                <td style="border:1px solid;"><?php echo $ArregloP['cantidad']; ?></td>
                <td style="border:1px solid;"><?php echo $ArregloP['precio']; ?></td>
                <td style="border:1px solid;"><a href="editarProducto.php?IdProducto=<?php echo $ArregloP['Id_productos'];?>">Editar</a> -<a href="eliminarProducto.php">Eliminar</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <button type="button" onclick="location.href='factura.html'">Regresar a facturar</button>
</body>
</html>