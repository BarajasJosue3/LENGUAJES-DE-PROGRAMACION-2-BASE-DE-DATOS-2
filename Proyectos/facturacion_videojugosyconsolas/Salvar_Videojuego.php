<?php
include 'app/Conecta.php'; // Incluye el archivo de conexión a la base de datos

// Verifica si el formulario fue enviado usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $lanzamiento = $_POST['lanzamiento'];

// Prepara la consulta SQL para insertar un nuevo videojuego
    $sql = "INSERT INTO Videojuegos (titulo, genero, lanzamiento) VALUES (?, ?, ?)";
    // Prepara la consulta SQL
    $stmt = $conn->prepare($sql);
    // Asigna los valores a los parámetros
    $stmt->bind_param("sss", $titulo, $genero, $lanzamiento);

    if ($stmt->execute()) {
        // Muestra un mensaje si la inserción fue exitosa
        echo "Videojuego guardado exitosamente.";
    } else {
        // Muestra un mensaje de error si algo falló
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close(); // Cierra la declaración preparada
    $conn->close(); // Cierra la conexión a la base de datos
}
?>


