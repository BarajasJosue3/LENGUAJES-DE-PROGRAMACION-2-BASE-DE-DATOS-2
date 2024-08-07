<?php
include 'app/Conecta.php'; // Incluye el archivo de conexión a la base de datos

// Verifica si el formulario fue enviado usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];

// Prepare la consulta SQL con parámetros para evitar una inyección SQL
    $sql = "SELECT titulo, genero, lanzamiento FROM Videojuegos WHERE titulo LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $titulo . "%";
    $stmt->bind_param("s", $searchTerm); // Asigna el valor del título a buscar

    if ($stmt->execute()) {
        $result = $stmt->get_result();
// Si se encuentran resultados, los muestra en una tabla y de igual manera si no se encuentra arrojara el siguiente mensaje No se encontraron videojuegos
        if ($result->num_rows > 0) { 
            echo "<table>";
            echo "<tr><th>Título</th><th>Género</th><th>Lanzamiento</th></tr>";
            while ($row = $result->fetch_assoc()) {
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
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close(); // Cierra la declaración preparada
    $conn->close(); // Cierra la conexión a la base de datos
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/factura.css">
    <title>Buscar Videojuego</title>
</head>
<body>
    <h1>Buscar Videojuego</h1>
    <form action="Buscar_Videojuego.php" method="post">
<!--Ingresar el nombre del videojuego que se es deseado buscar -->
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
<!--Boton que al dar click arrojara los datos de dicho juego que ingresamos anteriormente su nombre -->
        <button type="submit">Buscar</button>
    </form>
</body>
</html>
