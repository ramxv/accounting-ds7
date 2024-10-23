
<?php
require './config/conndb.php';
$conn = Database::getconnectiondb();


// Table querys

$consulta_ingresos = "SELECT ID_Registro, Fecha_Registro, Descripcion, Categoria, Monto, Fuente_Ingresos, ID_Metodo FROM registro_ingreso_gasto";

if ($conn) {
	try {
		// Prepare the statement
		$stmt = $conn->prepare($consulta_ingresos);

		// Execute the prepared statement
		$stmt->execute();

		// Fetch all results
		$result_ingresos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} else {
	echo "Connection failed.";
}

?>

<!Doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contabilidad</title>
	<!-- CSS -->
	<link rel="stylesheet" href="../public/css/style.css">
	<link rel="stylesheet" href="../public/css/style_cxc.css">
	<link rel="stylesheet" href="../public/css/style_registrogasto.css">
	<link rel="stylesheet" href="../public/css/style_conciliacion.css">
	<link rel="stylesheet" href="../public/css/style_cxp.css">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- DATA TABLES -->
	<link href="https://cdn.datatables.net/v/bs5/dt-2.1.8/datatables.min.css" rel="stylesheet">
	<!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container-fluid main-container">
		<div class="row">
			<div class="col-2 p-3 ">
				<div class="sticky-top">
					<span class="menu-title ms-3 pt-3">Home</span>
					<hr>
					<ul class="list-container p-0">
						<li>
							<a href="" class="child-list-container">
								<img src="../public/svg/dashboard.svg" alt="Dashboard Logo" width="30" height="24"
									class="d-inline-block align-text-top">
								Dashboard
							</a>
					</ul>

					<!-- SIDEBAR MENU -->
					<span class="menu-title ms-3">Menu</span>
					<hr>
					<ul class="list-container p-0">
						<!-- CXP -->
						<li>
							<a href="#" class="child-list-container" onclick="cargarPagina('cxPagar/index.php')">
								<img src="../public/svg/pagar.svg" alt="Cuentas por Pagar Logo" width="30" height="24"
									class="d-inline-block align-text-top">
								Cuentas por Pagar
							</a>
						</li>
						<!-- CXC -->
						<li>
							<a href="#" class="child-list-container" onclick="cargarPagina('cxCobrar/index.php')">
								<img src="../public/svg/cobrar.svg" alt="Cuentas por Cobrar Logo" width="30" height="24"
									class="d-inline-block align-text-top">
								Cuentas por Cobrar
							</a>
						</li>
						<!-- Conciliacion -->
							<li>
								<a href="#" class="child-list-container" onclick="cargarPagina('conciliacionBancaria/index.php')">
									<img src="../public/svg/conciliacion.svg" alt="Conciliación Bancaria Logo" width="30" height="24"
										class="d-inline-block align-text-top">
									Conciliación Bancaria
								</a>
							</li>
						<!-- Ingresos y Gasto -->
						<li>
							<a href="#" class="child-list-container" onclick="cargarPagina('registroIngresoGasto/index.php')">
								<img src="../public/svg/ingresos-gastos.svg" alt="Ingresos y Gastos Logo" width="30" height="24"
									class="d-inline-block align-text-top">
								Ingresos y Gastos
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col col-lg-10 p-3 dash-container" id="content">
				<div id="main-dash">
					<div class="col dash-child">
						<h1 class="ms-3">Movimiento Financiero de TechSynnergy</h1>
						<p class="ms-3">Análisis detallado de las transacciones y el rendimiento financiero de TechSynnergy</p>
						<div class="row gap-3 p-4 justify-content-evenly">
							<div class="col-3 dash-stats p-3 m-auto overflow-hidden">
								<h2>$75,000,000.00</h2>
								<p>Patrimonio</p>
							</div>
							<div class="col-2 dash-stats p-3 m-auto overflow-hidden">
								<h2>$15.7k</h2>
								<p>Ingresos</p>
							</div>
							<div class="col-2 dash-stats p-3 m-auto overflow-hidden">
								<h2>$5.4k</h2>
								<p>Gastos</p>
							</div>
							<div class="col-2 dash-stats p-3 m-auto overflow-hidden">
								<h2>$6.5k</h2>
								<p>Ventas Pendientes</p>
							</div>
							<div class="col-2 dash-stats p-3 m-auto overflow-hidden">
								<h2>1,230</h2>
								<p>Número de Clientes</p>
							</div>
						</div>
					</div>

					<!-- Charts Section -->
					<div class="col dash-middle-child mt-4">
						<div class="row gap-3 px-3 justify-content-evenly">
							<div class="col-5 p-3 m-auto">
								<div>
									<canvas id="myChart"></canvas>
								</div>
							</div>
							<div class="col-5 p-3 m-auto">
								<div>
									<canvas id="otherChart"></canvas>
								</div>
							</div>
						</div>
					</div>

					<!-- Dropdown Section -->
					<div class="col dash-child-2 mt-4">
						<div class="row mx-1">
							<div class="col-12 my-3">
								<h1>Visualización de Operaciones Comerciales</h1>

								<!-- DROPDOWN MOSTRAR -->
								<div class="dropdown my-3 d-inline">
									<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Operaciones Comerciales
									</a>
									<ul class="dropdown-menu" id="dd-oc">
										<li>
											<a class="dropdown-item" id="dd-item" href="#table-ingresos">
												Ingresos y Gastos
											</a>
										</li>
										<li>
											<a class="dropdown-item" id="dd-item" href="#table-compras">
												Compras
											</a>
										</li>
										<li>
											<a class="dropdown-item" id="dd-item" href="#table-ventas">
												Ventas
											</a>
										</li>
									</ul>
								</div>

								<!-- DROPDOWN LIMPIAR -->
								<div class="dropdown my-3 d-inline">
									<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Limpiar Tablas
									</a>
									<ul class="dropdown-menu" id="dd-oc-limpiar">
										<li>
											<a class="dropdown-item" id="dd-item" href="#table-ingresos">
												Ingresos y Gastos
											</a>
										</li>
										<li>
											<a class="dropdown-item" id="dd-item" href="#table-compras">
												Compras
											</a>
										</li>
										<li>
											<a class="dropdown-item" id="dd-item" href="#table-ventas">
												Ventas
											</a>
										</li>
									</ul>
								</div>

								<!-- TABLE INGRESOS Y GASTOS -->
								<div class="table-container my-3" id="table-ingresos" style="display: none;">
									<h4 id="list-item-1" class="mt-3">Ingresos y Gastos</h4>
									<table class="table table-hover display" id="ingresos-gastos">
										<thead>
											<tr>
												<th scope="col">Registros</th>
												<th scope="col">Fecha de Registro</th>
												<th scope="col">Descripción</th>
												<th scope="col">Categoría</th>
												<th scope="col">Monto</th>
												<th scope="col">Fuente De Ingreso</th>
												<th scope="col">Método Pago</th>
											</tr>
										</thead>
										<tbody>
											<?php if (empty($result_ingresos)): ?>
												<tr>
													<td colspan="7" class="text-center">No hay ingresos registrados</td>
												</tr>
											<?php else: ?>
												<?php foreach ($result_ingresos as $row_ingresos): ?>
													<tr>
														<th scope="row"><?= htmlspecialchars($row_ingresos["ID_Registro"]) ?></th>
														<td><?= htmlspecialchars($row_ingresos["Fecha_Registro"]) ?></td>
														<td><?= htmlspecialchars($row_ingresos["Descripcion"]) ?></td>
														<td><?= htmlspecialchars($row_ingresos["Categoria"]) ?></td>
														<td><?= htmlspecialchars($row_ingresos["Monto"]) ?></td>
														<td><?= htmlspecialchars($row_ingresos["Fuente_Ingresos"]) ?></td>
														<td><?= htmlspecialchars($row_ingresos["ID_Metodo"]) ?></td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>

								<!-- TABLE COMPRAS -->
								<div class="table-container mt-3" id="table-compras" style="display: none;">
									<h4 id="list-item-3">Compras</h4>
									<table class="table table-hover">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">First</th>
												<th scope="col">Last</th>
												<th scope="col">Handle</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Mark</td>
												<td>Otto</td>
												<td>@mdo</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td colspan="2">Larry the Bird</td>
												<td>@twitter</td>
											</tr>
										</tbody>
									</table>
								</div>

								<!-- TABLE VENTAS -->
								<div class="table-container mt-3" id="table-ventas" style="display: none;">
									<h4 id="list-item-4">Ventas</h4>
									<table class="table table-hover">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">First</th>
												<th scope="col">Last</th>
												<th scope="col">Handle</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Mark</td>
												<td>Otto</td>
												<td>@mdo</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td colspan="2">Larry the Bird</td>
												<td>@twitter</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- BOOTSTRAP -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
	<!-- DATA TABLES -->
	<script src="https://cdn.datatables.net/v/bs5/dt-2.1.8/datatables.min.js"></script>
	<!-- CHARTS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- COMMON FILES -->
	<script src="../public/js/index.js"></script>
	<script src="../public/js/config/charts.js"></script>
	<script src="../public/js/config/dataTables.js"></script>
	<script src="../public/js/conciliacion.js"></script>
	<script src="../../public/js/registroIngresoGasto.js" defer></script>

</body>

</html>