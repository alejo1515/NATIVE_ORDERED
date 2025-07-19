<?php

// Database connection
try {
    $pdo = new PDO("mysql:host=localhost;dbname=usuario", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle search parameters
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$date = isset($_GET['searchDate']) ? $_GET['searchDate'] : '';

// Build the SQL query
$sql = "SELECT idpublicacion, contenido, fechaPublicacion, nombre, links, correo 
        FROM publicaciones 
        WHERE 1=1";
$params = [];

if (!empty($keyword)) {
    $sql .= " AND contenido LIKE :keyword";
    $params[':keyword'] = '%' . $keyword . '%';
}

if (!empty($date)) {
    $sql .= " AND DATE(fechaPublicacion) = :date";
    $params[':date'] = $date;
}

$sql .= " ORDER BY fechaPublicacion DESC LIMIT 10";

// Fetch the posts
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Function to format timestamp as human-readable (e.g., "Hace 2 horas")
function timeAgo($datetime) {
    $now = new DateTime();
    $postTime = new DateTime($datetime);
    $interval = $now->diff($postTime);

    if ($interval->y > 0) return "Hace " . $interval->y . " año" . ($interval->y > 1 ? "s" : "");
    if ($interval->m > 0) return "Hace " . $interval->m . " mes" . ($interval->m > 1 ? "es" : "");
    if ($interval->d > 0) return $interval->d == 1 ? "Ayer" : "Hace " . $interval->d . " días";
    if ($interval->h > 0) return "Hace " . $interval->h . " hora" . ($interval->h > 1 ? "s" : "");
    if ($interval->i > 0) return "Hace " . $interval->i . " minuto" . ($interval->i > 1 ? "s" : "");
    return "Justo ahora";
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
            padding: Ricci    20px;
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

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Native Software</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link active" aria-current="page" href="../inicio/index.html">Inicio</a>
                </div>
                <form class="d-flex search-form" action="/buscar/buscar_usuarios.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar usuarios (correo, nombre de usuario, nombre)" aria-label="Search" name="busqueda">
                    <button class="btn" type="submit"><i class="bi bi-search"></i> Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <a href="../inicio/index.html" id="backHomeBtn" class="back-to-home-button">
        <i class="bi bi-house-fill"></i> Inicio
    </a>

    <div class="wall-container">
        <h1 class="main-title">Muro de Publicaciones</h1>

        <div class="search-section card p-3 mb-4">
            <h5 class="card-title">Buscar Publicaciones</h5>
            <form action="" method="GET">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="keyword" class="form-label">Buscar por Palabra Clave:</label>
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ingresa palabra clave" value="<?php echo htmlspecialchars($keyword); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="searchDate" class="form-label">Buscar por Fecha (Opcional):</label>
                        <input type="date" class="form-control" id="searchDate" name="searchDate" value="<?php echo htmlspecialchars($date); ?>">
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                </div>
            </form>
        </div>

        <div class="post-card create-post-card mb-4">
            <h5 class="card-title mb-3">¿Qué quieres compartir hoy?</h5>
            <a href="crearPublicacion.html" class="btn btn-success btn-lg w-100">
                <i class="bi bi-pencil-square me-2"></i> Crear Nueva Publicación
            </a>
        </div>

        <div class="create-post-button-area mb-4">
            <button class="btn btn-lg btn-block create-post-btn" data-bs-toggle="modal" data-bs-target="#createPostModal">
                <i class="bi bi-plus-circle-fill me-2"></i> <a href="crearPublicacion.html"> Nueva Publicación</a>
            </button>
        </div>

        <?php foreach ($posts as $post): ?>
        <div class="post-card">
            <div class="post-header">
                <div class="user-info">
                    <a href="../Terceros_perfil/Terceros_perfil.html" class="username">
                        <?php echo htmlspecialchars($post['nombre']); ?>
                    </a>
                    <span class="timestamp"><?php echo timeAgo($post['fechaPublicacion']); ?></span>
                </div>
            </div>
            <div class="post-content">
                <p><?php echo htmlspecialchars($post['contenido']); ?></p>
                <?php if (!empty($post['links'])): ?>
                    <a href="<?php echo htmlspecialchars($post['links']); ?>" target="_blank">Enlace</a>
                <?php endif; ?>
                <p><small>Correo: <?php echo htmlspecialchars($post['correo']); ?></small></p>
                <p><small>ID: <?php echo htmlspecialchars($post['idpublicacion']); ?></small></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Crear Nueva Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>