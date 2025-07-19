<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener término de búsqueda
$busqueda = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';
$hasSearched = !empty($busqueda); // Track if a search was performed

// Prepare and execute query only if a search term is provided
$result = null;
if ($hasSearched) {
    $sql = "SELECT * FROM usuario WHERE nombre LIKE ? OR correo LIKE ?";
    $stmt = $conn->prepare($sql);
    $busqueda_param = "%" . $busqueda . "%";
    $stmt->bind_param("ss", $busqueda_param, $busqueda_param);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Perfil Oscuro - V2</title>
    <link rel="stylesheet" href="buscar_usuario.css">
</head>
<body>
    <a href="../../inicio/index.html" class="home-button">Inicio</a>

    <div class="container">
        <h1>Buscar Perfil</h1>

        <form method="post" action="">
            <div class="form-group">
                <label for="busqueda">Correo Electrónico o Nombre de Usuario:</label>
                <input type="text" id="busqueda" name="busqueda" placeholder="ej. usuario@ejemplo.com o mi_usuario" value="<?php echo htmlspecialchars($busqueda); ?>">
            </div>
            <button type="submit" class="search-button">Buscar Perfil</button>
        </form>

        <div class="profile-card" id="profileCard">
            <h2>Datos del Perfil</h2>
            <div class="profile-info">
                <?php
                if ($hasSearched && $result && $result->num_rows > 0) {
                    echo "<h2>Resultados de la búsqueda:</h2>";
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        $uniqueId = htmlspecialchars($row['id'] ?? uniqid()); // Use 'id' if available, else generate unique ID
                        echo "<li>";
                        echo "<p><strong>Nombre:</strong> <span id='profileName_$uniqueId' class='placeholder'>" . htmlspecialchars($row["nombre"]) . "</span></p>";
                        echo "<p><strong>Correo:</strong> <span id='profileEmail_$uniqueId' class='placeholder'>" . htmlspecialchars($row["correo"]) . "</span></p>";
                        echo "<p><strong>Usuario:</strong> <span id='profileUsername_$uniqueId' class='placeholder'>" . htmlspecialchars($row["nombreUsuario"]) . "</span></p>";
                        echo "<p><strong>Bio:</strong> <span id='profileBio_$uniqueId' class='placeholder'>" . htmlspecialchars($row["bio"]) . "</span></p>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } elseif ($hasSearched) {
                    echo "<p>No se encontraron resultados.</p>";
                    echo "<p><strong>Nombre:</strong> <span id='profileName' class='placeholder'>Aún no buscado</span></p>";
                    echo "<p><strong>Correo:</strong> <span id='profileEmail' class='placeholder'>Aún no buscado</span></p>";
                    echo "<p><strong>Usuario:</strong> <span id='profileUsername' class='placeholder'>Aún no buscado</span></p>";
                    echo "<p><strong>Bio:</strong> <span id='profileBio' class='placeholder'>Aún no buscado</span></p>";
                } else {
                    echo "<p>Por favor, ingrese un término de búsqueda.</p>";
                    echo "<p><strong>Nombre:</strong> <span id='profileName' class='placeholder'>Aún no buscado</span></p>";
                    echo "<p><strong>Correo:</strong> <span id='profileEmail' class='placeholder'>Aún no buscado</span></p>";
                    echo "<p><strong>Usuario:</strong> <span id='profileUsername' class='placeholder'>Aún no buscado</span></p>";
                    echo "<p><strong>Bio:</strong> <span id='profileBio' class='placeholder'>Aún no buscado</span></p>";
                }
                ?>
            </div>
            <div class="profile-actions">
                <button class="message-button" onclick="enviarMensaje()">Enviar Mensaje</button>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();
?>