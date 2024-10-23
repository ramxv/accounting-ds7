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

    // Consulta para obtener los métodos de pago con ID 1 y 2
    $sql = "SELECT ID_Metodo, Nombre FROM metodos_pago_cobro WHERE ID_Metodo IN (1, 2)";
    $stmt = $pdo->query($sql);
    $metodos_pago = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Inicializar variable para mensajes
    $message = '';

    // Procesar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recoger los datos del formulario
        $id_registro = $_POST['id_registro'];
        $fecha_registro = $_POST['fecha_registro'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['depreciacion'];
        $monto = $_POST['precio'];
        $fuente_ingresos = $_POST['Transaccion'];
        $metodo_pago = $_POST['metodo_de_pago'];
        $id_cheque = $_POST['id_cheque'];
        $comentarios_adicionales = $_POST['comentarios_adicionales'];

        // Verificar si algún campo está vacío o es NULL
        if (empty($id_registro) || empty($fecha_registro) || empty($descripcion) || empty($categoria) || 
            empty($monto) || empty($fuente_ingresos) || empty($metodo_pago) || empty($id_cheque)) {
            $message = "Por favor, llene todos los campos.";
        } elseif (!is_numeric($id_registro)) {
            // Verificar si id_registro no es numérico
            $message = "El campo ID_Registro debe ser un número.";
        } else {
            // Verificar si el ID ya existe en la base de datos
            $check_sql = "SELECT COUNT(*) FROM registro_ingreso_gasto WHERE ID_Registro = :id_registro";
            $check_stmt = $pdo->prepare($check_sql);
            $check_stmt->execute([':id_registro' => $id_registro]);
            $exists = $check_stmt->fetchColumn();

            if ($exists > 0) {
                $message = "Error: Ya existe un registro con este ID. Por favor, elija un ID diferente.";
            } else {
                // Verificar si el número de cheque existe en la base de datos
                $check_cheque_sql = "SELECT COUNT(*) FROM cheques WHERE ID_Cheque = :id_cheque";
                $check_cheque_stmt = $pdo->prepare($check_cheque_sql);
                $check_cheque_stmt->execute([':id_cheque' => $id_cheque]);
                $cheque_exists = $check_cheque_stmt->fetchColumn();

                if ($cheque_exists == 0) {
                    $message = "Número de cheque no existe. Registre el cheque para continuar.";
                } else {
                    // Intentamos insertar los datos
                    try {
                        // Consulta para insertar los datos en la tabla
                        $insert_sql = "INSERT INTO registro_ingreso_gasto (ID_Registro, Fecha_Registro, Descripcion, Categoria, Monto, Fuente_Ingresos, ID_Metodo, ID_Cheque, Comentarios_Adicionales) 
                                       VALUES (:id_registro, :fecha_registro, :descripcion, :categoria, :monto, :fuente_ingresos, :metodo_pago, :id_cheque, :comentarios_adicionales)";
                        
                        $insert_stmt = $pdo->prepare($insert_sql);
                        $insert_stmt->execute([
                            ':id_registro' => $id_registro,
                            ':fecha_registro' => $fecha_registro,
                            ':descripcion' => $descripcion,
                            ':categoria' => $categoria,
                            ':monto' => $monto,
                            ':fuente_ingresos' => $fuente_ingresos,
                            ':metodo_pago' => $metodo_pago,
                            ':id_cheque' => $id_cheque,
                            ':comentarios_adicionales' => $comentarios_adicionales,
                        ]);

                        // Si la inserción fue exitosa
                        $message = "Registro guardado exitosamente!";
                    } catch (PDOException $e) {
                        // Si se produce un error de clave duplicada, mostrar un mensaje personalizado
                        if ($e->getCode() == 23000) {
                            $message = "Error: Ya existe un registro con este ID. Por favor, elija un ID diferente.";
                        } else {
                            // Mostrar cualquier otro error de inserción
                            $message = "Error al guardar el registro: " . $e->getMessage();
                        }
                    }
                }
            }
        }
        
        // Imprimir el mensaje de respuesta directamente
        echo $message; 
        exit; // Asegúrate de salir para evitar cualquier salida adicional
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
