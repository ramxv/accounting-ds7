
<div class="formulario-container">
<h3 class="form-header p-3 border-bottom border-secondary-subtle custom-title">Cuentas por Cobrar</h3>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Aquí puedes procesar los datos del formulario
		echo "<p>Formulario enviado con éxito!</p>";
	}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="id_factura">ID Factura:</label>
		<input type="text" id="id_factura" name="id_factura" required>

		<label for="id_cliente">ID Cliente:</label>
		<input type="text" id="id_cliente" name="id_cliente" required>

		<label for="fecha_emision">Fecha de Emisión:</label>
		<input type="date" id="fecha_emision" name="fecha_emision" required>

		<label for="fecha_vencimiento">Fecha de Vencimiento:</label>
		<input type="date" id="fecha_vencimiento" name="fecha_vencimiento" required>

		<label for="monto_cobrar">Monto a Cobrar:</label>
		<input type="number" id="monto_cobrar" name="monto_cobrar" step="0.01" required>

		<label for="estado_cobro">Estado de Cobro:</label>
		<select id="estado_cobro" name="estado_cobro" required>
			<option value="">Seleccione un estado</option>
			<option value="pendiente">Pendiente</option>
			<option value="parcial">Parcial</option>
			<option value="pagado">Pagado</option>
		</select>

		<label for="metodo_cobro">Método de Cobro:</label>
		<select id="metodo_cobro" name="metodo_cobro" required>
			<option value="">Seleccione un método</option>
			<option value="efectivo">Efectivo</option>
			<option value="transferencia">Transferencia Bancaria</option>
			<option value="tarjeta">Tarjeta de Crédito/Débito</option>
		</select>

		<label for="numero_recibo">Número de Recibo:</label>
		<input type="text" id="numero_recibo" name="numero_recibo">

		<label for="comentarios">Comentarios:</label>
		<textarea id="comentarios" name="comentarios" rows="4"></textarea>

		<input type="submit" value="Enviar">
	</form>
</div>