
<

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Native Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="estilophpIngreso.css">
  

</head>
<body>

    <div class="login-container">
        <h1 class="login-title">Native Software</h1>
        <p class="tagline">Ingresa para conectar con la comunidad de desarrolladores.</p>
        <div class="login-icon"><i class="bi bi-cpu-fill"></i></div>

        <form id="loginForm" method="post" action="phpIngreso.php" name="usuario">

            <?php
            include"phpIngreso.php"
            ?>
            
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" name="txtusuario" id="usuario" class="form-control" placeholder="Ingresa tu nombre de usuario" aria-required="true" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" name="txtcontrasena" id="contrasena" class="form-control" placeholder="Ingresa tu contraseña" aria-required="true" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordVisibility" style="background-color: #2a3d50; border-color: #4a6781; color: #ffffff;">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
            </div>
            <input type="submit" value="INGRESAR" class="login-button" name="btningresar">
            <a href="#" class="forgot-password-link">¿Olvidaste tu contraseña?</a>
        </form>
        <div id="mensajeError" class="mt-3"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordVisibility = document.getElementById('togglePasswordVisibility');
            const passwordInput = document.getElementById('contrasena');

            if (togglePasswordVisibility && passwordInput) {
                togglePasswordVisibility.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('bi-eye-fill');
                    this.querySelector('i').classList.toggle('bi-eye-slash-fill');
                });
            }
        });
    </script>
</body>
</html>