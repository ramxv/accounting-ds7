<div class="formulario-container">
	<h2>Formulario de Cuentas por Pagar</h2>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Aquí puedes procesar los datos del formulario
		echo "<p>Formulario enviado con éxito!</p>";

		// Capturar datos del formulario
		$idFactura = $_POST['id_factura'];
		$proveedorID = $_POST['id_proveedor'];
		$fechaEmision = $_POST['fecha_emision'];
		$fechaVencimiento = $_POST['fecha_vencimiento'];
		$montoPagar = $_POST['monto_pagar'];
		$estadoPago = $_POST['estado_pago'];
		$metodoPago = $_POST['metodo_pago'];
		$numeroCheque = $_POST['numero_cheque'];
		$comentarios = $_POST['comentarios'];

		// Mostrar los datos procesados (solo con fines de demostración)
		echo "<h3>Datos procesados:</h3>";
		echo "<ul>";
		echo "<li>ID Factura: $idFactura</li>";
		echo "<li>ID Proveedor: $proveedorID</li>";
		echo "<li>Fecha de Emisión: $fechaEmision</li>";
		echo "<li>Fecha de Vencimiento: $fechaVencimiento</li>";
		echo "<li>Monto a Pagar: $$montoPagar</li>";
		echo "<li>Estado de Pago: $estadoPago</li>";
		echo "<li>Método de Pago: $metodoPago</li>";
		echo "<li>Número de Cheque: $numeroCheque</li>";
		echo "<li>Comentarios: $comentarios</li>";
		echo "</ul>";
	}
	?>
	<form method="post" >
		<label for="id_factura">ID Factura:</label>
		<input type="text" id="id_factura" name="id_factura" required>

		<label for="id_proveedor">ID Proveedor:</label>
		<input type="text" id="id_proveedor" name="id_proveedor" required>

		<label for="fecha_emision">Fecha de Emisión:</label>
		<input type="date" id="fecha_emision" name="fecha_emision" required>

		<label for="fecha_vencimiento">Fecha de Vencimiento:</label>
		<input type="date" id="fecha_vencimiento" name="fecha_vencimiento" required>

		<label for="monto_pagar">Monto a Pagar ($):</label>
		<input type="number" id="monto_pagar" name="monto_pagar" step="0.01" required>

		<label for="estado_pago">Estado de Pago:</label>
		<select id="estado_pago" name="estado_pago" required>
			<option value="">Seleccione un estado</option>
			<option value="pendiente">Pendiente</option>
			<option value="pagado">Pagado</option>
		</select>

		<label for="metodo_pago">Método de Pago:</label>
		<select id="metodo_pago" name="metodo_pago" required>
			<option value="">Seleccione un método</option>
			<option value="cheque">Cheque</option>
			<option value="efectivo">Efectivo</option>
		</select>

		<label for="numero_cheque">Número de Cheque/Transacción:</label>
		<input type="text" id="numero_cheque" name="numero_cheque">

		<label for="comentarios">Comentarios:</label>
		<textarea id="comentarios" name="comentarios" rows="4"></textarea>

		<input type="submit" value="Enviar">
	</form>
</div>