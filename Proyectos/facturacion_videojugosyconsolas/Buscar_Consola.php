<?php
include 'app/Conecta.php'; // Incluye el archivo de conexión a la base de datos

// Verifica si el formulario fue enviado usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $lanzamiento = $_POST['lanzamiento'];

// Preparar la consulta SQL con parámetros para evitar una inyección SQL
    $sql = "SELECT nombre, marca, lanzamiento FROM consolas WHERE nombre LIKE ? AND marca LIKE ? AND lanzamiento LIKE ?";
    $stmt = $conn->prepare($sql);
    $nombre = "%$nombre%";
    $marca = "%$marca%";
    $lanzamiento = "%$lanzamiento%";
    $stmt->bind_param("sss", $nombre, $marca, $lanzamiento); // Asigne los valores a los parámetros

    $stmt->execute();
    $result = $stmt->get_result(); // Ejecuta la consulta y obtiene los resultados

// Si se encuentran resultados, los muestra en una tabla, en caso de que no se encuentren los resultados arrojara el siguiente mensaje No se encontraron consolas
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Nombre</th><th>Marca</th><th>Fecha de Lanzamiento</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nombre"]. "</td><td>" . $row["marca"]. "</td><td>" . $row["lanzamiento"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron consolas.";
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
    <title>Buscar Consola</title>
</head>
<body>
    <h1>Buscar Consola</h1>
    <!--Ingresa el nombre de la consola -->
    <form action="Buscar_Consola.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br>
    <!--Ingresa la marca de la consola o en este caso la empresa que la creo -->
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca">
        <br>
    <!--ngresa la fecha de lanzamiento de la consola -->
        <label for="lanzamiento">Fecha de lanzamiento:</label>
        <input type="date" id="lanzamiento" name="lanzamiento">
        <br>
    <!--Boton que al dar click arroja todos los datos que esten almacenados sobre la consola que nosotros deseemos buscar -->
        <button type="submit">Buscar</button>
    </form>
</body>
</html>

