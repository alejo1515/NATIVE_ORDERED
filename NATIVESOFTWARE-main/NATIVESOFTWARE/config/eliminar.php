<?php

session_start();
?>


<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
  Eliminar Perfil
</button>

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

