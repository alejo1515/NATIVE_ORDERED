<?php
session_start();

if(!isset($_SESSION['correo']))
{
    header("Location: ../index.html");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <link href="crearPublicacion.css" rel="stylesheet">
  
</head>
<body>

    <div class="container">
        <div class="form-wrapper">
            <h2>Crear Nueva Publicación</h2>
            
            <form action="conexion.php" method="POST" >
                <div class="post-header-form">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf6258f9" alt="Tu Foto de Perfil" class="profile-thumb-form" id="displayedProfilePicForm">
                    <div class="user-info-form">
                        <span class="username-display-form">
                            <?php echo htmlspecialchars($_SESSION['nombre']); ?>
                        </span>
                        <br>
                        <span class="user-email-display-form">
                            <?php echo htmlspecialchars($_SESSION['correo']); ?>
                        </span>
                    </div>
                </div>

                <div class="mb-3"> 
                    <label for="contenido" class="form-label">Contenido de la Publicación:</label>
                    <textarea class="form-control" id="contenido" name="contenido" rows="6" placeholder="¿Qué estás pensando?" required></textarea>
                </div>
                
                <div class="mb-3"> 
                    <label for="postImage" class="form-label">Adjuntar Imagen (opcional):</label>
                    <input type="file" class="form-control" id="postImage" name="post_image" accept="image/*">
                    <div class="form-text">Adjuntar imagen a tu publicación (formatos: JPG, PNG, GIF).</div>
                </div>
                
                <div class="mb-3"> 
                    <label for="links" class="form-label">Enlaces Relevantes (opcional):</label>
                    <input type="text" class="form-control" id="links" name="links" placeholder="Ej: https://tuproyecto.com">
                    <div class="form-text">URL's a tus proyectos, artículos, etc.</div>
                </div>

                <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($_SESSION['nombre']); ?>">
                <input type="hidden" name="correo" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>">
                
                <div class="d-flex justify-content-between mt-4"> 
                    <button type="submit" name="publicar" class="btn-primary-custom">
                        <i class="bi bi-send-fill"></i> Publicar
                    </button>
                    <a href="../muro/index.php" class="btn-cancel-custom">
                        <i class="bi bi-x-circle-fill"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>