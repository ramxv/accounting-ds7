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
    <style>
  .container {
    background-color: rgba(241, 240, 248); 
    border-radius: 15px; 
    border: 1px solid rgba(0, 0, 0, 0.2); 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
  }
</style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001b48;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Diddy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">skibidi</a>
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
        <form action="" method="POST" class="mt-4">
            <div class="row">
                 <!-- id de registro opakandasta-->
                 <div class="col-md-6 mb-3">
                    <label for="id_registro" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">id registro</label>
                    <input type="number" class="form-control" id="id_registro" name="id_registro" required>
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
                     <!-- categoría -->
                     <div class="col-md-6 mb-3">
                    <label for="depreciacion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Categoría </label>
                    <select class="form-select" id="depreciacion" name="depreciacion" required>
                        <option value="" selected>Selecciona la categoría</option>
                        <option value="cliente">Ingreso</option>
                        <option value="proyecto">Gasto</option>
                    </select>
                </div>

                <!--monto-->
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Monto</label>
                    <input type="number" class="form-control" id="precio" name="precio" required>
                </div>

                <!-- fuente de ingresos -->
                <div class="col-md-6 mb-3">
                    <label for="depreciacion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Fuente de ingresos</label>
                    <select class="form-select" id="depreciacion" name="depreciacion" required>
                        <option value="" selected>Selecciona la fuente de los ingresos</option>
                        <option value="cliente">Cliente</option>
                        <option value="proyecto">Proyecto</option>
                        <option value="otros_ingresos">Otros ingresos</option>
                    </select>
                </div>
            
 
            <!-- Destino de gastos -->
            <div class="col-md-6 mb-3">
                    <label for="proveedor" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Destino de los gastos</label></label></label>
                    <input type="text" class="form-control" id="proveedor" name="proveedor" required>
                </div>
            

                <div class="col-md-6 mb-3">
                <label for="metodo_de_pago" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Metodo de pago</label>
                <select class="form-select" id="metodo_de_pago" name="metodo_de_pago" required>
                        <option value="" selected>Selecciona el metodo de pago</option>
                        <option value="cliente">Efectivo</option>
                        <option value="proyecto">Con oro porque soy millonario</option>
                        <option value="otros_ingresos">cheque</option>
                    </select>
                </div>
        
                 <!-- -->
           
                 <div class="col-md-6 mb-3">
                    <label for="id_cheque" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Numero de Cheque</label></label></label>
                    <input type="text" class="form-control" id="id_cheque" name="id_cheque" required>
            </div>
        
                <!-- -->
                 <!-- Descripción -->
                 <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: bold;">Comentarios Adicionales</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="1" required></textarea>
                </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="text-center mt-4 mb-4">
                <button type="submit" class="btn" style="background-color: #1d75e9; color: #fff; font-family: 'Roboto', sans-serif;">Registrar</button>
                <button type="reset" class="btn" style="background-color: #03316d; color: #fff; font-family: 'Roboto', sans-serif;">Limpiar</button>
                <button class="btn btn-primary" id="openOffcanvas"></button>
            </div>
        </form>
    </div>




    <!-- Offcanvas personalizado 

<div id="myOffcanvas" class="offcanvas-custom">
  <div class="offcanvas-header">
    <h5>Formulario</h5>
    <button type="button" class="btn-close" id="closeOffcanvas"></button>
  </div>
  <div class="offcanvas-body ml-2">
    <form>
      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" placeholder="Ingresa tu nombre">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo">
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Mensaje</label>
        <textarea class="form-control" id="message" rows="3" placeholder="Escribe tu mensaje"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>
-->



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

</body>
</html>
>>>>>>> Stashed changes
