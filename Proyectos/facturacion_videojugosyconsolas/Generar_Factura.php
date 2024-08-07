<?php
include 'app/Conecta.php'; // Incluye el archivo de conexión a la base de datos

// Genera un nombre de archivo único basado en la fecha y hora actual
$filename = "factura_" . date("Ymd_His") . ".txt"; 
// Crea un archivo para escribir
$file = fopen($filename, "w");

// Escribe "Factura" en el archivo
fwrite($file, "Factura\n\n");
fwrite($file, "Videojuegos:\n");

// Obtiene datos de videojuegos
$sql = "SELECT titulo, genero, lanzamiento FROM Videojuegos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Escribe los detalles de cada videojuego en el archivo, ademas si no se encuentra ningun dato de algun videojuego arrojara el siguiente mensaje No se encontraron videojuegos
        fwrite($file, "Título: " . $row['titulo'] . "\n");
        fwrite($file, "Género: " . $row['genero'] . "\n");
        fwrite($file, "Lanzamiento: " . $row['lanzamiento'] . "\n");
        fwrite($file, "\n");
    }
} else {
    fwrite($file, "No se encontraron videojuegos.\n");
}

fwrite($file, "\nConsolas:\n");

// Obtener datos de consolas
$sql = "SELECT nombre, marca, lanzamiento FROM consolas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Escribe los detalles de cada consola en el archivo, ademas de igual manera si no se encuentra ningun dato de alguna consola arrojara el siguiente mensaje No se encontraron consolas
        fwrite($file, "Nombre: " . $row['nombre'] . "\n");
        fwrite($file, "Marca: " . $row['marca'] . "\n");
        fwrite($file, "Lanzamiento: " . $row['lanzamiento'] . "\n");
        fwrite($file, "\n");
    }
} else {
    fwrite($file, "No se encontraron consolas.\n");
}

fclose($file);  // Esta lnea lo que hace es que cierra el archivo

// Envía el archivo para su descarga
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($filename));
header('Content-Length: ' . filesize($filename));

readfile($filename); // Aqui lo que hace es que lee el archivo y envía su contenido al navegador

// Y aqui lo que hace es eliminar el archivo después de descargar
unlink($filename);

$conn->close(); // Cierra la conexión a la base de datos
?>
