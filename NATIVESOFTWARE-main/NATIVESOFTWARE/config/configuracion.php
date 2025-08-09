
<?php

session_start();

if (empty($_SESSION["correo"])) {

    header("location:../index.html");
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Perfil - Native Social Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="configuracion.css">
    
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">
                <i class="bi bi-code-slash me-2"></i>
                Native Social Media
            </a>


        <div class="container-fluid">
            <a class="navbar-brand" href="../inicio/index.php"> <i class="bi bi-house-door-fill me-2"></i> Inicio
            </a>
            </div>

    <div class="text-white bg-success p-2">
                    <?php
                     if(isset($_SESSION["nombre"]) && $_SESSION["correo"]){
                       echo "{$_SESSION["nombre"]} {$_SESSION["correo"]}";
                     }
                   
                    ?>

                    </div>


    </nav>


    <div style="margin-top: 70px;"> 
        <h1 class="mb-4 text-center">Native Social Media</h1>
        <h2 class="text-center mb-4">Configuración de Perfil</h2>

        <div class="main-content-wrapper">
            <div class="config-menu-container">
                <h2>Menú de Configuración</h2>
                

                <a href="../visualizacion_perfil/perfilVisualizacion.html">
                <button class="config-menu-button">
                    <i class="bi bi-person-fill"></i> Ver Perfil
                </button></a>
             
 
                <a href="eliminar.php">
                <button class="config-menu-button delete-action">
                    <i class="bi bi-person-x-fill"></i> Eliminar Usuario
                </button></a>
                


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>






<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-white" style="background-color: #212529;"> <div class="modal-header border-bottom border-primary"> <h5 class="modal-title" id="confirmDeleteModalLabel" style="color: #0d6efd;">Confirmar Eliminación de Perfil</h5> <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p class="lead text-center mb-4">¿Estás seguro de que deseas eliminar tu perfil de usuario?</p>
        <p class="text-center text-muted mb-4">Esta acción es irreversible y eliminará todos tus datos.</p>

        <form>
          <div class="mb-3">
            <label for="passwordInput" class="form-label text-primary">Ingresa tu contraseña para confirmar:</label>
            <input type="password" class="form-control bg-dark text-white border-primary" id="passwordInput" placeholder="Contraseña" required>
          </div>
        </form>
      </div>
      <div class="modal-footer border-top border-primary justify-content-center"> <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Sí, Eliminar</button>
      </div>
    </div>
</div>
</div>








                <a href="cerrar.php"></a>
                <button class="config-menu-button logout-action">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </button>

            </div>

            <div class="container-fluid">
                <p class="text-center mb-4">Actualiza tu información personal y preferencias.</p>

                <form action ="update_client.php" method="POST" enctype="multipart/form-data">

                    <h3 class="section-title"><i class="bi bi-shield-lock-fill me-2"></i>Confirmar Identidad</h3>
                    <hr>
                  
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Contraseña Actual</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="txtcontrasena" name="txtcontrasena" placeholder="Confirma tu contraseña actual" required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmIdentityPasswordVisibility" style="background-color: #3b3d57; border-color: #5a5c70; color: #ffffff;">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                    </div>
                    <hr class="mb-4"> <h3 class="section-title"><i class="bi bi-person-circle me-2"></i>Foto de Perfil</h3>
                    <hr>
                    <div class="profile-pic-section">
                        <img id="profilePicPreview" src="https://via.placeholder.com/150/282a3e/FFFFFF?text=Tu+Foto" alt="Foto de Perfil" class="profile-pic-preview">
                        <input type="file" class="custom-file-input" id="profilePicInput" accept="image/*">
                        <label for="profilePicInput" class="custom-file-label">
                            <i class="bi bi-upload me-2"></i>Cambiar Foto
                        </label>
                    </div>

                    <h3 class="section-title"><i class="bi bi-info-circle-fill me-2"></i>Información Personal</h3>
                    <hr>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nombre Completo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="fullName" name="nombre" placeholder="Tu nombre completo" value="Juan Pérez">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-at"></i></span>
                            <input type="text" class="form-control" id="username" name="nombreUsuario" placeholder="Tu nombre de usuario" value="juanperezdev">
                        </div>
                    </div>

             

                    <div class="mb-3">
                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-calendar-date-fill"></i></span>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="2000-08-30">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-phone-fill"></i></span>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Tu número de teléfono" value="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Biografía</label>
                        <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Cuentanos un poco sobre ti y tus intereses como desarrollador...">Soy un desarrollador full-stack apasionado por las tecnologías web y el código abierto. Me encanta aprender y colaborar en proyectos innovadores.</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Ubicación</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" id="location" name="ubicacion" placeholder="Tu ciudad, país" value="Bogotá, Colombia">
                        </div>
                    </div>

                    <h3 class="section-title"><i class="bi bi-key-fill me-2"></i>Contraseña</h3>
                    <hr>
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Contraseña Actual</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="currentPassword" placeholder="Ingresa tu contraseña actual">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Nueva Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="newPassword" name="contrasena" placeholder="Deja en blanco para no cambiar">
                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPasswordVisibility" style="background-color: #3b3d57; border-color: #5a5c70; color: #ffffff;">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPassword" class="form-label">Confirmar Nueva Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="confirmNewPassword" placeholder="Confirma tu nueva contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPasswordVisibility" style="background-color: #3b3d57; border-color: #5a5c70; color: #ffffff;">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                    </div>

                    <h3 class="section-title"><i class="bi bi-globe me-2"></i>Links Adicionales</h3>
                    <hr>
                    <div class="mb-3">
                        <label for="additionalLinks" class="form-label">Portafolio y Redes (separar por comas o saltos de línea)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-link-45deg"></i></span>
                            <textarea class="form-control" id="additionalLinks" name="redes" rows="4" placeholder="Ej:&#10;https://tuportfolio.com&#10;https://github.com/tuusuario&#10;https://linkedin.com/in/tuperfil"></textarea>
                        </div>
                    </div>
                    <hr class="mt-5">

                    <button type="submit" class="btn btn-primary" name="registro" id="registro">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
