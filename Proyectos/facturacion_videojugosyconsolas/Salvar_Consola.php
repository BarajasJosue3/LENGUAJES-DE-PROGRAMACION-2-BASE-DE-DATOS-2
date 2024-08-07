<?php
include 'app/Conecta.php'; // Incluye el archivo de conexión a la base de datos

// Verifica si el formulario fue enviado usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $lanzamiento = $_POST['lanzamiento'];

// Prepare la consulta SQL para insertar una nueva consola
    $sql = "INSERT INTO consolas (nombre, marca, lanzamiento) VALUES (?, ?, ?)";
    // Prepara la consulta SQL
    $stmt = $conn->prepare($sql);
    // Asigna los valores a los parámetros
    $stmt->bind_param("sss", $nombre, $marca, $lanzamiento);

    if ($stmt->execute()) {
        // Muestra un mensaje si la inserción fue exitosa
        echo "Consola guardada exitosamente."; 
    } else {
        // Muestra un mensaje de error si algo falló
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close(); // Cierra la declaración preparada
    $conn->close(); // Cierra la conexión a la base de datos
}
?>
