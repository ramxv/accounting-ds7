<?php 
// Configuración de la base de datos
$host = 'localhost';
$db = 'proyecto_db';
$user = 'edwin';
$pass = '1234';

try {
    // Crear conexión
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Procesar el formulario para registrar el cheque
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recoger los datos del formulario
        $id_cheque = $_POST['id_cheque'];
        $numero_cheque = $_POST['numero_cheque'];
        $fecha_emision = $_POST['fecha_emision'];
        $fecha_cobro = $_POST['fecha_cobro'];
        $monto = $_POST['monto'];
        $estado = $_POST['estado'];
        $proveedor = $_POST['proveedor'];
        $comentarios = $_POST['comentarios'];

        // Verificar si algún campo está vacío
        if (empty($id_cheque) || empty($numero_cheque) || empty($fecha_emision) || 
            empty($fecha_cobro) || empty($monto) || empty($estado) || empty($proveedor)) {
            $message = "Por favor, llene todos los campos.";
        } elseif (!is_numeric($id_cheque)) {
            // Verificar si ID_Cheque no es numérico
            $message = "El campo ID_Cheque debe ser un número.";
        } else {
            // Intentamos insertar los datos en la tabla cheques
            try {
                // Consulta para insertar los datos en la tabla cheques
                $insert_sql = "INSERT INTO cheques (ID_Cheque, Numero_Cheque, Fecha_Emision, Fecha_Cobro, Monto, Estado, Proveedor, Comentarios) 
                               VALUES (:id_cheque, :numero_cheque, :fecha_emision, :fecha_cobro, :monto, :estado, :proveedor, :comentarios)";
                
                $insert_stmt = $pdo->prepare($insert_sql);
                $insert_stmt->execute([
                    ':id_cheque' => $id_cheque,
                    ':numero_cheque' => $numero_cheque,
                    ':fecha_emision' => $fecha_emision,
                    ':fecha_cobro' => $fecha_cobro,
                    ':monto' => $monto,
                    ':estado' => $estado,
                    ':proveedor' => $proveedor,
                    ':comentarios' => $comentarios,
                ]);

                // Si la inserción fue exitosa
                $message = "Cheque registrado exitosamente!";
            } catch (PDOException $e) {
                // Mostrar cualquier error de inserción
                $message = "Error al guardar el cheque: " . $e->getMessage();
            }
        }

        // Imprimir el mensaje de respuesta
        echo $message; 
        exit; // Asegúrate de salir para evitar cualquier salida adicional
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
