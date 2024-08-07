<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "videojuegos_consolas";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    // En caso de fallo muestra un mensaje y termina la ejecución si la conexión falla
    die("Conexión fallida: " . $conn->connect_error);
}

?>
