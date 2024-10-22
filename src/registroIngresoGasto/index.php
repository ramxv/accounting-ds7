<?php  include 'Registro.php';?>
<?php  include 'chequeform.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro ingreso o gasto </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/contabilidad-ds7/public/css/styleRegistroGasto.css">
      
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001b48;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Diddy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">s</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">RRHH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Compras</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5"  >
        <!-- Title -->
        <h1 class="text-center" style="font-family: 'Poppins', sans-serif; color: #001b48;">Registro de Ingresos de Gasto</h1>

        <!-- Formulario de registro de ingresos de gastos-->
        <form  id="registroForm" method="POST" class="mt-4">
            <div class="row">
                  <!-- categoría -->
                  <div class="col-md-6 mb-3">
                    <label for="depreciacion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Categoría </label>
                    <select class="form-select" id="depreciacion" name="depreciacion" required>
                        <option value="" selected>Selecciona la categoría</option>
                        <option value="ingreso">Ingreso</optison>
                        <option value="gasto">Gasto</option>
                    </select>
                </div>
                  <!-- id de registro opakandasta-->
                  <div class="col-md-6 mb-3">
                    <label for="id_registro" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">ID registro</label>
                    <input type="number" class="form-control" id="id_registro" name="id_registro" value="<?php echo htmlspecialchars($inputData['id_registro']); ?>" required>
                    </div>
        
                <!-- fecha de registro woppaaa-->
                <div class="col-md-6 mb-3">
                    <label for="fecha_registro" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Fecha de registro</label>
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
                </div>

                 <!-- Descripción -->
                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="1" required></textarea>
                </div>
                   

                <!--monto-->
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Monto</label>
                    <input type="number" class="form-control" id="precio" name="precio" required>
                </div>

                <!-- fuente de ingresos -->
                <div class="col-md-6 mb-3">
                    <label for="depreciacion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Transacción</label>
                    <select class="form-select" id="Transaccion" name="Transaccion" required>
                        <option value="" selected>Selecciona Transacción</option>
                        <option value="cliente">Cliente</option>
                        <option value="proyecto">Proyecto</option>
                        <option value="otros_ingresos">Otras transacciones</option>
                    </select>
                </div>
            
 
                <div class="col-md-6 mb-3">
                <label for="metodo_de_pago" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Método de pago</label> 
                <select class="form-select" id="metodo_de_pago" name="metodo_de_pago" required>
            <option value="" selected>Selecciona el método de pago</option>
            <?php foreach ($metodos_pago as $metodo): ?>
                <option value="<?php echo $metodo['ID_Metodo']; ?>">
                    <?php echo $metodo['Nombre']; ?>
                </option>
            <?php endforeach; ?>
        </select>

                </div>
        
                 <!-- -->
           
                 <div class="col-md-6 mb-3">
                    <label for="id_cheque" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">ID de Cheque</label></label></label>
                    <input type="text" class="form-control" id="id_cheque" name="id_cheque" required>
            </div>
        
                <!-- -->
                 <!-- Descripción -->
                 <div class="col-md-6 mb-3 mx-auto">
                 <label for="comentarios_adicionales" class="form-label text-center" style="font-family: 'Roboto', sans-serif; font-weight: bold; display: block;">Comentarios Adicionales</label>
                 <textarea class="form-control text-center" id="comentarios_adicionales" name="comentarios_adicionales" rows="1" required></textarea>
                 </div>
                
                </div>
            </div>
            <!-- Mostrar el mensaje en el mismo div -->
<div class='alert alert-success' id='successMessage'>
    <?php echo $message; ?>
</div>
<div id="responseMessage"></div>

            <!-- Botones -->
            <div class="text-center mt-4 mb-4">
            <button type="button" class="btn" id="submitBtn" style="background-color: #1d75e9; color: #fff; font-family: 'Roboto', sans-serif;">Registrar</button>
            <button type="reset" class="btn" style="background-color: #03316d; color: #fff; font-family: 'Roboto', sans-serif;">Limpiar</button>
                <button class="btn btn-primary" id="openOffcanvas">Crear cheque</button>
            </div>
        </form>
    </div>




    <!-- Offcanvas personalizado  -->


    <div id="myOffcanvas" class="offcanvas-custom">
  <div class="offcanvas-header">
    <h5>Formulario de Cheque</h5>
    <button type="button" class="btn-close" id="closeOffcanvas"></button>
  </div>
  <div class="offcanvas-body ml-2">
    <form id="chequeForm" method="POST">
      <div class="mb-3">
        <label for="id_cheque" class="form-label">ID Cheque</label>
        <input type="text" class="form-control" id="id_cheque" name="id_cheque" placeholder="Ingresa el ID del cheque" required>
      </div>
      <div class="mb-3">
        <label for="numero_cheque" class="form-label">Número de Cheque</label>
        <input type="text" class="form-control" id="numero_cheque" name="numero_cheque" placeholder="Ingresa el número de cheque" required>
      </div>
      <div class="mb-3">
        <label for="fecha_emision" class="form-label">Fecha de Emisión</label>
        <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" required>
      </div>
      <div class="mb-3">
        <label for="fecha_cobro" class="form-label">Fecha de Cobro</label>
        <input type="date" class="form-control" id="fecha_cobro" name="fecha_cobro" required>
      </div>
      <div class="mb-3">
        <label for="monto" class="form-label">Monto</label>
        <input type="number" class="form-control" id="monto" name="monto" placeholder="Ingresa el monto" step="0.01" required>
      </div>
      <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" id="estado" name="estado" required>
          <option value="">Selecciona un estado</option>
          <option value="Pendiente">Pendiente</option>
          <option value="Cobrado">Cobrado</option>
          <option value="Anulado">Anulado</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="proveedor" class="form-label">Proveedor</label>
        <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Ingresa el proveedor" required>
      </div>
      <div class="mb-3">
        <label for="comentarios" class="form-label">Comentarios</label>
        <textarea class="form-control" id="comentarios" name="comentarios" rows="3" placeholder="Escribe tus comentarios"></textarea>
      </div>
      <button type="button" class="btn btn-primary" id="registrarCheque">Registrar Cheque</button>
   
      </form>
  </div>
</div>





    <footer class="text-light text-center py-4" style="background-color: #001b48;">
    <p>&copy; 2024  Jordi wild. Todos los derechos reservados.</p>
</footer>


    <script src="/contabilidad-ds7/public/js/registroIngresoGasto.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript (necesario para el offcanvas) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script> 
 
</script>


</body>
</html>
