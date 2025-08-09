<?php

session_start();

if (empty($_SESSION["correo"])) {
    header("location:../index.html");
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=usuario", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$correo_session = $_SESSION["correo"];

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$date = isset($_GET['searchDate']) ? $_GET['searchDate'] : '';

$sql = "SELECT id_mensaje, contenido, fecha_envio, correo_usuario, correo_destinatario 
        FROM mensajes 
        WHERE (correo_usuario = :correo_session OR correo_destinatario = :correo_session)";

$params = [':correo_session' => $correo_session];

if (!empty($keyword)) {
    $sql .= " AND contenido LIKE :keyword";
    $params[':keyword'] = '%' . $keyword . '%';
}

if (!empty($date)) {
    $sql .= " AND DATE(fecha_envio) = :date";
    $params[':date'] = $date;
}

$sql .= " ORDER BY fecha_envio DESC LIMIT 10";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

<title>Chat de Mensajes - Native Software</title>
   <link href="chatcss.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Native Software</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link active" aria-current="page" href="../inicio/index.php">Inicio</a>
                 
                </div>
                <div class="d-flex">
                    <span class="text-white me-3 d-flex align-items-center">
                        <?php if (isset($_SESSION["nombre"]) && $_SESSION["correo"]): ?>
                            <i class="bi bi-person-circle me-2"></i>
                            <?php echo "{$_SESSION["nombre"]} ({$_SESSION["correo"]})"; ?>
                        <?php endif; ?>
                    </span>
                    <a href="../muro/buscar_usuario/prueba_envedido.php" class="btn btn-outline-light d-flex align-items-center">
                        <i class="bi bi-search me-2"></i> Buscar Usuario 
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="chat-container">
        <div class="messages-panel">
            <div class="form-container">
                <h2 class="mb-4">Enviar Nuevo Mensaje</h2>

                <form action="crearmensaje.php" method="POST">
                    
                    <div class="mb-3">
                        <label for="correo_destinatario" class="form-label">Correo del Destinatario</label>
                        <input type="email" class="form-control" id="correo_destinatario" name="correo_destinatario" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido del Mensaje</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" name="enviar" class="btn btn-primary">Enviar Mensaje</button>
                </form>


            </div>
            
            <h1 class="main-title mb-4">Mensajes</h1>
            
            <?php foreach ($posts as $post): ?>
            <div class="message-card">
                <div class="message-header">
                    <div class="user-info">
                        <a href="../Terceros_perfil/Terceros_perfil.html" class="message-user">
                            <?php 
                                if ($post['correo_usuario'] == $correo_session) {
                                    echo htmlspecialchars($post['correo_destinatario']);
                                } else {
                                    echo htmlspecialchars($post['correo_usuario']);
                                }
                            ?>
                        </a>
                        <span class="message-timestamp"><?php echo timeAgo($post['fecha_envio']); ?></span>
                    </div>
                </div>
                <div class="message-content">
                    <p><?php echo htmlspecialchars($post['contenido']); ?></p>
                    <p>
                        <small>
                        <?php 
                            if ($post['correo_usuario'] == $correo_session) {
                                echo "Enviado a: ";
                            } else {
                                echo "Recibido de: ";
                            }
                            echo htmlspecialchars($post['correo_usuario']);
                        ?>
                        </small>
                    </p>
                    <p><small>ID: <?php echo htmlspecialchars($post['id_mensaje']); ?></small></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="search-panel">
            <h5 class="card-title">Buscar Mensajes</h5>
            <form action="" method="GET">
                <div class="mb-3">
                    <label for="keyword" class="form-label">Palabra Clave:</label>
                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ingresa palabra clave" value="<?php echo htmlspecialchars($keyword); ?>">
                </div>
                <div class="mb-3">
                    <label for="searchDate" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" id="searchDate" name="searchDate" value="<?php echo htmlspecialchars($date); ?>">
                </div>
                <div class="mt-3 d-grid">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>