<?php 
//echo "Estas dentro de Mostrar facturas";

    include 'app/Conecta.php';
    include 'app/consultas.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Facturas</title>
</head>
<body>
    <table style="border:1px solid;">
        <thead>
        <tr>
            <td>Id Factura</td>
            <td>Cliente</td>
            <td>Total</td>
            <td>Fecha</td>
        </tr>
        </thead>
        <tbody>
<!-- aqui se genera un arreglo -->
            <?php while($Arreglo = $EFacturas->fetch_assoc()){ ?>
            <tr>
                <td style="border:1px solid;"><?php echo $Arreglo['Id_factura'];?></td>
                <td style="border:1px solid;"><?php echo $Arreglo['cliente'];?></td>
                <td style="border:1px solid;"><?php echo $Arreglo['total'];?></td>
                <td style="border:1px solid;"><?php echo $Arreglo['fecha'];?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <button type="button" onclick="location.href='factura.html'">Regresar a facturar</button>
</body>
</html>