<?php
require '../config/conndb.php';


if (isset($_GET['numero_cheque'])) {
    $numeroCheque = $_GET['numero_cheque'];

    try {
        $conn = Database::getconnectiondb(); // Obtener la conexión

        // Consulta para validar el número de cheque
        $stmt = $conn->prepare("SELECT ID_Cheque FROM cheques WHERE Numero_Cheque = :numero_cheque");
        $stmt->bindParam(':numero_cheque', $numeroCheque);
        $stmt->execute();

        $chequeResult = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($chequeResult) {
            echo json_encode(['exists' => true, 'id_cheque' => $chequeResult['ID_Cheque']]);
        } else {
            echo json_encode(['exists' => false]);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // Si no hay número de cheque, devolver un mensaje de error
    echo json_encode(['error' => 'No se ha proporcionado un número de cheque.']);
}
?>

