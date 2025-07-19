
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario";

// Function to fetch and display latest posts
function displayLatestPosts($limit = 10) {
    global $servername, $username, $password, $dbname;
    
    try {
      
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Query to fetch posts with user information, ordered by date descending
        $sql = "
            SELECT u.correo, p.contenido, p.fechaPublicacion, u.nombre, p.links, nombreUsuario
            FROM publicaciones AS p
            JOIN usuario u ON p.correo = u.correo
            ORDER BY p.fechaPublicacion DESC
            LIMIT :limit
        ";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Generate post cards
        foreach ($posts as $post) {
            // Calculate time ago
            $post_time = new DateTime($post['fechaPublicacion']);
            $now = new DateTime();
            $interval = $now->diff($post_time);
            
            if ($interval->d < 1 && $interval->h < 1) {
                $timestamp = "Hace " . $interval->i . " minutos";
            } elseif ($interval->d < 1) {
                $timestamp = "Hace " . $interval->h . " horas";
            } elseif ($interval->d == 1) {
                $timestamp = "Ayer";
            } else {
                $timestamp = "Hace " . $interval->d . " días";
            }
            
            // Sanitize output
            $nombreUsuario = htmlspecialchars($post['nombreUsuario']);
            $contenido = htmlspecialchars($post['contenido']);
            $nombre = htmlspecialchars($post['nombre']);
            $links = htmlspecialchars($post['links']);
            
            // Generate post card HTML
            echo '
            <div class="post-card">
                <div class="post-header">

            
                   
                 <div class="user-info">
                        <a href="../Terceros_perfil/Terceros_perfil.html" class="username">' . $nombre . '</a>
                        <span class="timestamp">' . $timestamp . '</span>
                    </div>
                </div>
                <div class="post-content">
                    <p>' . $contenido . '</p>';
            if (!empty($image_url)) {
                echo '<img src="' . $image_url . '" alt="Post Image">';
            }
            echo '
                </div>
            </div>';
        }
        
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Error al conectar con la base de datos: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muro de Publicaciones - Native Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="muro.css">
    <style>
        .create-post-card {
            padding: 20px;
            text-align: center;
        }
        .top-right-button {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <button type="button" class="btn btn-primary top-right-button">
        <i class="bi bi-person-fill me-2"></i> Buscar Usuario
    </button>

    <a href="../inicio/index.html" id="backHomeBtn" class="back-to-home-button">
        <i class="bi bi-house-fill"></i> Inicio
    </a>

    <div class="wall-container">
        <h1 class="main-title">Muro de Publicaciones</h1>

        <div class="search-section card p-3 mb-4">
            <h5 class="card-title">Buscar Publicaciones</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="searchEmail" class="form-label">Buscar por Correo:</label>
                    <input type="text" class="form-control" id="searchEmail" placeholder="ejemplo@correo.com">
                </div>
                <div class="col-md-6">
                    <label for="searchDate" class="form-label">Buscar por Fecha:</label>
                    <input type="date" class="form-control" id="searchDate">
                </div>
            </div>
            <div class="mt-3 text-end">
                <button type="button" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
            </div>
        </div>

        <div class="post-card create-post-card mb-4">
            <h5 class="card-title mb-3">¿Qué quieres compartir hoy?</h5>
            <a href="crearPublicacion.html" class="btn btn-success btn-lg w-100">
                <i class="bi bi-pencil-square me-2"></i> Crear Nueva Publicación
            </a>
        </div>

        <?php displayLatestPosts(10); ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```