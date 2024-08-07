<?php
include 'app/Conecta.php'; // Incluye el archivo de conexión a la base de datos

// Consulta para obtener todos los videojuegos
$sql = "SELECT titulo, genero, lanzamiento FROM Videojuegos";
$result = $conn->query($sql);

// Si se encuentran resultados, los muestra en una tabla y de igual manera si no se encuentra nada arrojara el siguiente mensaje No se encontraron videojuegos
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Título</th><th>Género</th><th>Lanzamiento</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['titulo'] . "</td>";
        echo "<td>" . $row['genero'] . "</td>";
        echo "<td>" . $row['lanzamiento'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron videojuegos.";
}

$conn->close();
?>
