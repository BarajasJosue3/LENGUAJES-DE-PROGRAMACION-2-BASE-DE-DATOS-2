<?php 
    include 'app/Conecta.php';
    if(isset($_POST['btn_Guardar'])){
        $cliente = $Connecta->real_escape_string($_POST['cliente']);
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $total = 0;
        foreach($precio as $key =>$value){
            $total += $cantidad[$key] * $value;
        }
        $InsertarFac = "INSERT INTO facturas(cliente,total)VALUES('$cliente','$total')";
        if($Connecta->query($InsertarFac) === TRUE){
            $factura_id = $Connecta->insert_id;
            foreach($descripcion as $key =>$value){
                $desc = $value;
                $cant = $cantidad[$key];
                $prec = $precio[$key];
                $InsertarProd = "INSERT INTO productos(factura_id,descripcion,cantidad,precio)VALUES('$factura_id','$desc','$cant','$prec')";
                $Connecta->query($InsertarProd);
            }
            echo "Factura guardada correctamente";
            header("refresh:3;factura.html");
        } else {
            echo "Error: ".$InsertarFac."<br>".$Connecta->error;
        }
        $Connecta->close();

    }

?>