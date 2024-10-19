<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cxcobrar</title>
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
        <h2>Formulario de Cuentas por Cobrar</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Aquí puedes procesar los datos del formulario
            echo "<p>Formulario enviado con éxito!</p>";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id_factura"># Factura:</label>
            <input type="text" id="id_factura" name="id_factura" required>

            <label for="id_cliente">Cliente:</label>
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
                <option value="pagado">Pagado</option>
            </select>

            <label for="metodo_cobro">Método de Cobro:</label>
            <select id="metodo_cobro" name="metodo_cobro" required>
                <option value="">Seleccione un método</option>
                <option value="efectivo">Efectivo</option>
                <option value="cheque">cheque</option>
            </select>

            <label for="numero_recibo">Número de Recibo:</label>
            <input type="text" id="numero_recibo" name="numero_recibo">

            <label for="comentarios">Comentarios:</label>
            <textarea id="comentarios" name="comentarios" rows="4"></textarea>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
