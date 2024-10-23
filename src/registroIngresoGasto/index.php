<div class="container mt-5 mb-5">
    <!-- Título -->
    <h1 class="text-center" style="font-family: 'Poppins', sans-serif; color: #001b48;">Registro de Ingresos de Gasto</h1>

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
        <form id="registroForm" method="POST" class="mt-4">
            <div class="row">
                <!-- ID de Registro -->
                <div class="col-md-6 mb-3">
                    <label for="id_registro" class="form-label">ID Registro</label>
                    <input type="number" class="form-control" id="id_registro" name="id_registro" required>
                </div>

                <!-- Fecha de Registro -->
                <div class="col-md-6 mb-3">
                    <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
                </div>

                <!-- Descripción -->
                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="1" required></textarea>
                </div>

                <!-- Monto -->
                <div class="col-md-6 mb-3">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" class="form-control" id="monto" name="monto" required>
                </div>

                <!-- Sección de ID de Cheque (oculta por defecto) -->
                <div class="col-md-6 mb-3" id="cheque-section" style="display: none;">
                    <label for="id_cheque" class="form-label">ID de Cheque</label>
                    <input type="text" class="form-control" id="id_cheque" name="id_cheque">
                </div>

                <div class="text-center mt-4 mb-4">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Asegurarse de que el DOM esté completamente cargado antes de ejecutar el script
    document.addEventListener('DOMContentLoaded', function () {
        // Manejadores para mostrar el formulario según el método de pago
        document.getElementById('metodo-efectivo').addEventListener('click', function () {
            mostrarFormulario('efectivo');
        });

        document.getElementById('metodo-cheque').addEventListener('click', function () {
            mostrarFormulario('cheque');
        });

        function mostrarFormulario(metodo) {
            var chequeSection = document.getElementById('cheque-section');

            // Mostrar u ocultar la sección del cheque según el método seleccionado
            if (metodo === 'efectivo') {
                chequeSection.style.display = 'none';  // Ocultar campo de cheque si el método es efectivo
            } else if (metodo === 'cheque') {
                chequeSection.style.display = 'block'; // Mostrar campo de cheque si el método es cheque
            }
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
