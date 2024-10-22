<?php 
// Configuración de la base de datos
$host = 'localhost';
$db = 'proyecto_db';
$user = 'edwin';
$pass = '1234';

try {
    // Crear conexión con la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Procesar el formulario si es una solicitud POST
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
            echo "Por favor, llene todos los campos.";
            exit;
        } elseif (!is_numeric($id_cheque)) {
            // Verificar si ID_Cheque es un número
            echo "El campo ID Cheque debe ser un número.";
            exit;
        } else {
            // Intentar insertar los datos en la base de datos
            try {
                // Consulta para insertar los datos
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
                echo "Cheque registrado exitosamente.";
            } catch (PDOException $e) {
                // Mostrar cualquier error de inserción
                echo "Error al guardar el cheque: " . $e->getMessage();
            }
        }
    }
} catch (PDOException $e) {
    // Error al conectar con la base de datos
    echo "Error de conexión: " . $e->getMessage();
}
?>
