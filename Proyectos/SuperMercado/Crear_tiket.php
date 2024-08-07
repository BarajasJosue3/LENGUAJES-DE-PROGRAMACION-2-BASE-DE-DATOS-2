<?php 
include 'app/conecta.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $Productos = $_POST['productos'];
    $cantidades = $_POST['cantidades'];
    // crear el tiket 
    $Tiket = "INSERT INTO Tickets () VALUES ()";
    if($conecta->query($Tiket) === TRUE ){
        $ticket_id = $conecta->insert_id;
        foreach($Productos as $index =>$producto_id){
            $cantidad = $cantidades[$index];
            $Tiket = "INSERT INTO Ticket_Productos(Ticket_Id,Producto_Id,Cantidad)VALUES($ticket_id,$producto_id,$cantidad)";
            $conecta->query($Tiket);
        }
        echo "Tiket creado Exitosamente.";
    } 
    else{
        echo "Error al generar el Ticket ".$conecta->error;
    }

}
$conecta->close();
//HACER EL DIAGRAMA Y VER SI TIENE ALGUN ERROR


?>