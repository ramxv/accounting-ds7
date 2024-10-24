<?php include 'Registro.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
/* Cuando el input es válido
.is-valid {
    border-color: #28a745;
}

/* Cuando el input es inválido 
.is-invalid {
    border-color: #dc3545;
}  */
</style>

<div class="container mt-5 mb-5">
    <div class="alert alert-success position-absolute w-100" id='successMessage' style="top: 350px; left: 50%; transform: translateX(-50%); width: 100%; max-width: 600px; display: none; opacity: 1.0;">
        <?php echo $message; ?>
    </div>
    
    <!-- Título -->
    <h1 class="text-center" style="font-family: 'Poppins', sans-serif; color: #001b48;">Registro de Ingresos o Gasto</h1>

    <!-- Dropdown para seleccionar el método de pago -->
    <div class="dropdown my-3 d-inline">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Seleccionar Método de Pago
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" id="metodo-efectivo" href="#">Efectivo</a></li>
            <li><a class="dropdown-item" id="metodo-cheque" href="#">Cheque</a></li>
        </ul>
    </div>

    <!-- Formulario de registro de ingresos/gastos -->
    <div id="form-ingreso-gasto" style="display: block;"> <!-- Se muestra siempre -->
        <h4 class="mt-3">Registro de Ingresos/Gastos</h4>
        <form id="registroForm" method="POST" action="Registro.php" class="mt-4">
            <div class="row">
                 <!-- Campo nuevo para la categoría -->
                 <div class="col-md-6 mb-3">
                    <label for="depreciacion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Categoría</label>
                    <select class="form-select" id="depreciacion" name="depreciacion" required>
                        <option value="" selected>Selecciona la categoría</option>
                        <option value="ingreso">Ingreso</option>
                        <option value="gasto">Gasto</option>
                    </select>
                </div>
                
                <!-- Fecha de Registro -->
                <div class="col-md-6 mb-3">
                    <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
                </div>

                <!-- Descripción -->
                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold; display: block;">Descripción</label>
                    <textarea class="form-control text-center" id="descripcion" name="descripcion" rows="1" required></textarea>
                </div>

                <!-- Monto -->
                <div class="col-md-6 mb-3">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" class="form-control" id="monto" name="monto" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="comentarios_adicionales" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold; display: block;">Comentarios Adicionales</label>
                    <textarea class="form-control text-center" id="comentarios_adicionales" name="comentarios_adicionales" rows="1" required></textarea>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="Transaccion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Transacción</label>
                    <select class="form-select" id="Transaccion" name="fuente_ingresos" required>
                        <option value="" selected>Selecciona Transacción</option>
                        <option value="cliente">Cliente</option>
                        <option value="proyecto">Proyecto</option>
                        <option value="otros_ingresos">Otras transacciones</option>
                    </select>
                </div>

                <!-- Sección de ID de Cheque (oculta por defecto) -->
                <div class="col-md-6 mb-3" id="cheque-section" style="display: none;">
                    <label for="numero_cheque" class="form-label">Número de Cheque</label>
                    <input type="text" class="form-control" id="numero_cheque" name="numero_cheque">
                    <div id="cheque-id" style="display:none;"></div>
                </div>

                <div class="text-center mt-4 mb-4">
                <button type="button" class="btn btn-success" id="submitBtn" style="background-color: #1d75e9; border-color: #1d75e9; color: white;">Registrar</button>
                <button type="reset" class="btn btn-secondary" style="background-color: #03316d; border-color: #03316d; color: white;">Limpiar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../../public/js/registroIngresoGasto.js" defer></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
