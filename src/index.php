	<!doctype html>
	<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contabilidad</title>
		<!-- CSS -->
		<link rel="stylesheet" href="../public/css/style.css">
		<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

						<!-- Menu -->
						<span class="menu-title ms-3">Menu</span>
						<hr>
						<ul class="list-container p-0">
							<!-- CXP -->
							<li>
								<a href="" class="child-list-container">
									<img src="../public/svg/pagar.svg" alt="Cuentas por Pagar Logo" width="30" height="24"
										class="d-inline-block align-text-top">
									Cuentas por Pagar
								</a>
							</li>
							<!-- CXC -->
							<li>
								<a href="" class="child-list-container">
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
								<a href="" class="child-list-container">
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
								<div class="col-3 dash-stats p-3 m-auto">
									<h2>$34,343.00</h2>
									<p>Patrimonio</p>
								</div>
								<div class="col-2 dash-stats p-3 m-auto">
									<h2>$15.7k</h2>
									<p>Ingresos</p>
								</div>
								<div class="col-2 dash-stats p-3 m-auto">
									<h2>$5.4k</h2>
									<p>Gastos</p>
								</div>
								<div class="col-2 dash-stats p-3 m-auto">
									<h2>$6.5k</h2>
									<p>Ventas Pendientes</p>
								</div>
								<div class="col-2 dash-stats p-3 m-auto">
									<h2>1,230</h2>
									<p>Número de Clientes</p>
								</div>
							</div>
						</div>
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
						<div class="col dash-child-2 mt-4">
							<div class="row custom-dash2-background gap-3 mt-4 mx-1 ">
								<div class="col-12">
									<div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
										<h4 id="list-item-1">Ingresos</h4>
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
										<h4 id="list-item-2">Gastos</h4>
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

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
			crossorigin="anonymous"></script>
		<script src="../public/js/index.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<script>
			const ctx = document.getElementById('myChart');

			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
					datasets: [{
						label: '# of Votes',
						data: [12, 19, 3, 5, 2, 3],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});

			const linechart = document.getElementById("otherChart").getContext('2d')
			new Chart(linechart, {
				type: 'line', // Change to 'line' for a line chart
				data: {
					labels: ['January', 'February', 'March', 'April', 'May', 'June'], // X-axis labels
					datasets: [{
						label: 'Monthly Sales', // Legend label
						data: [10, 20, 15, 25, 30, 22], // Data points
						borderColor: 'rgba(0, 27, 72, 1)', // Line color
						backgroundColor: 'rgba(67, 8, 156, 0.5)', // Fill color
						borderWidth: 2, // Width of the line
						fill: true, // Fill area under the line
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true // Start y-axis from 0
						}
					},
					responsive: true, // Make chart responsive
					plugins: {
						legend: {
							display: true, // Display legend
						},
						tooltip: {
							enabled: true, // Enable tooltips
						}
					}
				}
			});
		</script>

	</body>

	</html>