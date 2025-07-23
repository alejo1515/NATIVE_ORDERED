
<?php

session_start();


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Native Social Media - Confirmar Eliminación de Perfil">
    <title>Native Social Media - Confirmar Eliminación</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/bootstrap-overrides.css">
       <link rel="stylesheet" href="csseliminar.css">

 
</head>

<body>

 <div class="container-fluid">
            <a class="navbar-brand" href="../inicio/index.html"> <i class="bi bi-house-door-fill me-2"></i> Inicio
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

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="confirmation-box text-center">
                <i class="bi bi-shield-lock display-3 mb-4" style="color: #0d6efd;"></i> <h2 class="mb-3" style="color: #0d6efd;">Confirmar Eliminación de Perfil</h2>
                <p class="text-lead-custom">
                    Para verificar que deseas eliminar tu perfil de usuario, por favor ingresa tu contraseña.
                    Esta acción es **irreversible** y eliminará todos tus datos.
                </p>

                <form action="eliminarphp.php" method="POST"> <div class="mb-4">
                        <label for="passwordInput" class="form-label visually-hidden">Contraseña</label> <input type="password" class="form-control form-control-lg" id="passwordInput" name="contrasenaEliminar" placeholder="Ingresa tu contraseña" required autofocus>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <a href="../validacion_ingreso/phpIngreso_credenciales.php" class="btn btn-secondary btn-lg px-4 me-md-3">
                            <i class="bi bi-arrow-left me-2"></i>Atrás
                        </a>
                        <button type="submit" name="eliminar" class="btn btn-danger btn-lg px-4">
                            <i class="bi bi-check-circle me-2"></i>Confirmar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>