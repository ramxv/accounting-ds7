<?php
require '../config/conndb.php';

// Inicializar variable para mensajes
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $fechaRegistro = $_POST['fecha_registro'];
    $descripcion = $_POST['descripcion'];
    $monto = $_POST['monto'];
    $comentariosAdicionales = $_POST['comentarios_adicionales'];
    $fuenteIngresos = $_POST['fuente_ingresos'];
    $numeroCheque = isset($_POST['numero_cheque']) ? $_POST['numero_cheque'] : null;

    // Validar que todos los campos requeridos estén llenos
    if (empty($fechaRegistro) || empty($descripcion) || empty($monto) || empty($fuenteIngresos)) {
        $message = "Por favor, llene todos los campos.";
        echo json_encode(['error' => $message]);
        exit;
    }

    try {
        $conn = Database::getconnectiondb(); // Obtener la conexión

        // Verificar si se ha ingresado un número de cheque y obtener su ID
        $idCheque = null;
        if ($numeroCheque) {
            $stmtCheque = $conn->prepare("SELECT ID_Cheque FROM cheques WHERE Numero_Cheque = :numero_cheque");
            $stmtCheque->bindParam(':numero_cheque', $numeroCheque);
            $stmtCheque->execute();
            $resultCheque = $stmtCheque->fetch(PDO::FETCH_ASSOC);
            $idCheque = $resultCheque ? $resultCheque['ID_Cheque'] : null;

            if ($idCheque === null) {
                // Manejar el caso de que el cheque no se encuentre
                $message = 'Número de cheque no encontrado, pero se procederá a registrar.';
                echo json_encode(['warning' => $message]);
            }
        }

        // Insertar datos en la tabla
        $sql = "INSERT INTO registro_ingreso_gasto (Fecha_Registro, Descripcion, Monto, ID_Cheque, Comentarios_Adicionales, Fuente_Ingresos) 
                VALUES (:fecha_registro, :descripcion, :monto, :id_cheque, :comentarios_adicionales, :fuente_ingresos)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fecha_registro', $fechaRegistro);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':monto', $monto);
        $stmt->bindParam(':comentarios_adicionales', $comentariosAdicionales);
        $stmt->bindParam(':fuente_ingresos', $fuenteIngresos);

        if ($idCheque !== null) {
            $stmt->bindParam(':id_cheque', $idCheque);
        } else {
            $stmt->bindValue(':id_cheque', null, PDO::PARAM_NULL);
        }

        $stmt->execute();
        $message = 'Registro insertado correctamente';
        echo json_encode(['success' => $message]);
    } catch (PDOException $e) {
        $message = "Error al insertar el registro: " . $e->getMessage();
        echo json_encode(['error' => $message]);
    }
}
