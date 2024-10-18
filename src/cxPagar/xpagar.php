<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cuentas por Pagar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .formulario-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #1d75e9;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #03316d;
        }
    </style>
</head>
<body>
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
</body>
</html>
