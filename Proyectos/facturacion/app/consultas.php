<?php 
    include 'Conecta.php';
// Consulta para extraer los datos de facturas 
    $Facturas = "SELECT * FROM facturas ORDER BY cliente ASC";
    $EFacturas = $Connecta->query($Facturas);
// Consulta para extraer los datos de productos 
    $Productos = "SELECT * FROM productos ORDER BY descripcion ASC";
    $EProductos = $Connecta->query($Productos);


?>