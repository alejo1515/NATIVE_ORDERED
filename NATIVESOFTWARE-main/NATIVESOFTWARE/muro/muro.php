<?php

include 'conexion.php'; 


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
      
</head>
<body>

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
                <form class="d-flex search-form" action="buscar_usuarios.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar usuarios (correo, nombre de usuario, nombre)" aria-label="Search" name="busqueda">
                    <button class="btn" type="submit"><i class="bi bi-search"></i> Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="wall-container">
        <h1 class="main-title">Muro de Publicaciones</h1>

        <div class="create-post-area" data-bs-toggle="modal" data-bs-target="#createPostModal">
            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf6258f9?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Tu Foto de Perfil" class="profile-thumb">
            <span class="prompt-text">¿Qué estás pensando, Juan?</span>
            <i class="bi bi-plus-circle-fill post-icon"></i>
        </div>

        <div class="post-card">
            <div class="post-header">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf6258f9?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Foto de Perfil" class="profile-thumb">
                <div class="user-info">
                    <a href="Terceros_perfil.php?username=juanperez" class="username">Juan Pérez <i class="bi bi-patch-check-fill ms-1" style="color: #007bff;"></i></a>
                    <span class="timestamp">Hace 2 horas</span>
                </div>
            </div>
            <div class="post-content">
                <p>¡Emocionado de compartir mi nuevo proyecto de desarrollo web! Es un sistema de gestión de tareas construido con React y Node.js. Estoy muy orgulloso del progreso hasta ahora. ¡El código estará pronto en GitHub!</p>
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Project Screenshot">
            </div>
            <div class="post-footer">
                <div class="post-action">
                    <i class="bi bi-heart-fill"></i> <span>124</span>
                </div>
                <div class="post-action">
                    <i class="bi bi-chat-dots-fill"></i> <span>32</span>
                </div>
                <div class="post-action">
                    <i class="bi bi-share-fill"></i> <span>8</span>
                </div>
            </div>
        </div>

        <div class="post-card">
            <div class="post-header">
                <img src="https://images.unsplash.com/photo-1520452352726-218274712613?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Foto de Perfil Carlos Ruiz" class="profile-thumb">
                <div class="user-info">
                    <a href="Terceros_perfil.php?username=carlosruiz" class="username">Carlos Ruiz</a>
                    <span class="timestamp">Ayer</span>
                </div>
            </div>
            <div class="post-content">
                <p>Estuve trabajando en un diseño de UI/UX para una nueva aplicación móvil. Aquí les dejo un pequeño adelanto de la pantalla de inicio. ¡Espero sus comentarios!✨</p>
                <img src="https://images.unsplash.com/photo-1614741369325-103366885368?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="UI/UX Design Screenshot">
            </div>
            <div class="post-footer">
                <div class="post-action">
                    <i class="bi bi-heart-fill"></i> <span>210</span>
                </div>
                <div class="post-action">
                    <i class="bi bi-chat-dots-fill"></i> <span>45</span>
                </div>
                <div class="post-action">
                    <i class="bi bi-share-fill"></i> <span>12</span>
                </div>
            </div>
        </div>
        </div>

    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createPostModalLabel">Crear Nueva Publicación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="murophp.php" method="POST" enctype="multipart/form-data" id="formulario">
                <div class="mb-3">
                    <label for="publicacion" class="form-label">Tu publicación:</label>
                    <textarea class="form-control" id="publicacion" name="post_content" placeholder="¿Qué estás pensando?" rows="5" required></textarea>
                </div>
                 <div class="mb-3">
                    <label for="correo" class="form-label">Tu correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="deja tu correo electronico" required>
                </div>
                 <div class="mb-3">
                    <label for="nombre" class="form-label">Tu nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                </div>
                 <div class="mb-3">
                    <label for="link" class="form-label">Links adicionales (separados por coma):</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="ej. https://github.com/mi-proyecto, https://mi-sitio.com">
                </div>
                <div class="mb-3">
                    <label for="postImage" class="form-label">Adjuntar imagen (opcional):</label>
                    <input type="file" class="form-control" id="postImage" name="post_image" accept="image/*">
                </div>

                <input type="hidden" name="user_id" value="current_user_id_here"> 
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="submitPostBtn">Publicar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Optional: If you want to use jQuery for AJAX submission or other things, keep this.
        // Otherwise, Bootstrap's JS is enough for the modal.
        // If you submit the form directly to murophp.php, you don't necessarily need this client-side JS for submission.
        // document.getElementById('submitPostBtn').addEventListener('click', function() {
        //     document.getElementById('postForm').submit();
        // });
    </script>
</body>
</html>