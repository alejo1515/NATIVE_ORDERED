<?php

session_start();

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Native Social Media - Conecta con desarrolladores y encuentra oportunidades">
    <title>Native Social Media - Inicio</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../styles/main.css">
    
    <link rel="stylesheet" href="../../styles/bootstrap-overrides.css">
</head>

<body>
    <!-- Navegación Principal -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">
                <i class="bi bi-code-slash me-2"></i>
                Native Social Media
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú Lateral -->
            <div class="offcanvas offcanvas-start" id="menuLateral" tabindex="-1">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">
                        <i class="bi bi-code-slash me-2"></i>
                        Native Social Media
                    </h5>
                 
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas"></button>
                </div>

          
                    <ul class="navbar-nav fs-5">
                        
                        <li class="nav-item">
                            <a href="index.html" class="nav-link active">
                                <i class="bi bi-house-door"></i>
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../muro/muro.php" class="nav-link">
                                <i class="bi bi-grid-3x3-gap"></i>
                                Muro
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                Perfil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../chat/chat.html" class="nav-link">
                                <i class="bi bi-chat-dots"></i>
                                Chat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../config/configuracion.php" class="nav-link">
                                <i class="bi bi-gear"></i>
                                Configuración
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../validacion_ingreso/phpIngreso_credenciales.html" class="nav-link text-danger">
                                Salir
                            </a>
                        </li>


                              <div class="offcanvas-body d-flex flex-column justify-content-between">

                    <nav class="bs-example mb-0">
                       <div class="text-white bg-success p-2">
                    <?php
                     if(isset($_SESSION["nombre"]) && $_SESSION["correo"]){
                       echo "{$_SESSION["nombre"]} {$_SESSION["correo"]}";
                     }
                   
                    ?>

                    </div>

                    </nav>
                    </ul>

                    <!-- Redes Sociales -->
                    <div class="d-lg-none text-center py-3">
                        <a href="#" class="text-info fs-4 me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-info fs-4 me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-info fs-4 me-3"><i class="bi bi-github"></i></a>
                        <a href="#" class="text-info fs-4"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container-fluid mt-5 pt-4">
        <!-- Separador Visual -->
        <div class="content-separator"></div>

        <div class="row">
            <!-- Columna Principal -->
            <div class="col-lg-8 mx-auto">
                <!-- Header de la Página -->
                <div class="text-center mb-4 fade-in">
                    <h1 class="display-4 text-primary mb-3">Bienvenido a Native Social Media</h1>
                    <p class="lead text-secondary">Conecta con desarrolladores y encuentra las mejores oportunidades</p>
                </div>

                <!-- Tarjetas de Contenido -->
                <div class="row g-4">
                    <!-- Tarjeta de Perfil Destacado -->
                    <div class="col-md-6">
                        <div class="card fade-in">
                            <div class="card-header d-flex align-items-center">
                                <img src="" alt="Jorge Luis Carranza" class="rounded-circle me-3 user-avatar" width="50"
                                    height="50" data-user-name="Jorge Luis Carranza">
                                <div>
                                    <h6 class="card-title mb-0">Jorge Luis Carranza</h6>
                                    <small class="text-muted">Desarrollador Full Stack</small>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Se solicitan desarrolladores de software egresados del SENA con
                                    experiencia en tecnologías modernas.</p>
                                <div class="d-flex gap-2 mb-3">
                                    <span class="badge bg-primary">JavaScript</span>
                                    <span class="badge bg-secondary">React</span>
                                    <span class="badge bg-success">Node.js</span>
                                </div>
                                <div class="text-center">
                                    <img src="https://placehold.co/300x200/1e293b/6366f1?text=Proyecto+Demo"
                                        alt="Proyecto Demo" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta de Estadísticas -->
                    <div class="col-md-6">
                        <div class="card fade-in">
                            <div class="card-header">
                                <h6 class="card-title mb-0">
                                    <i class="bi bi-graph-up me-2"></i>
                                    Estadísticas de la Comunidad
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-6 mb-3">
                                        <div class="h4 text-primary">1,234</div>
                                        <small class="text-muted">Desarrolladores</small>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="h4 text-success">567</div>
                                        <small class="text-muted">Proyectos</small>
                                    </div>
                                    <div class="col-6">
                                        <div class="h4 text-warning">89</div>
                                        <small class="text-muted">Ofertas Activas</small>
                                    </div>
                                    <div class="col-6">
                                        <div class="h4 text-info">234</div>
                                        <small class="text-muted">Conexiones</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta de Acciones Rápidas -->
                        <div class="card mt-3 fade-in">
                            <div class="card-header">
                                <h6 class="card-title mb-0">
                                    <i class="bi bi-lightning me-2"></i>
                                    Acciones Rápidas
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="../muro/muro.php" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>
                                        Crear Publicación
                                    </a>
                                    <a href="../chat/chat.php" class="btn btn-secondary">
                                        <i class="bi bi-chat me-2"></i>
                                        Ver Chat
                                    </a>
                                    <a href="../config/configuracion.php" class="btn btn-outline-primary">
                                        <i class="bi bi-person me-2"></i>
                                        Editar Perfil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Publicaciones Recientes -->
                <div class="mt-5 fade-in">
                    <h3 class="text-primary mb-4">
                        <i class="bi bi-clock-history me-2"></i>
                        Publicaciones Recientes
                    </h3>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Buscando Frontend Developer</h6>
                                    <p class="card-text text-muted">Empresa tecnológica busca desarrollador React con 2+
                                        años de experiencia.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Hace 2 horas</small>
                                        <span class="badge bg-primary">React</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Proyecto Open Source</h6>
                                    <p class="card-text text-muted">Contribuye a nuestro proyecto de gestión de tareas
                                        con Vue.js y Node.js.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Hace 5 horas</small>
                                        <span class="badge bg-success">Vue.js</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">Mentoría de Python</h6>
                                    <p class="card-text text-muted">Ofrezco mentoría gratuita para principiantes en
                                        Python y Django.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Hace 1 día</small>
                                        <span class="badge bg-warning">Python</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-5 py-4 text-center text-muted">
        <div class="container">
            <p>&copy; 2024 Native Social Media. Desarrollado con ❤️ por la comunidad.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/app.js"></script>
</body>

</html>