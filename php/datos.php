<?php
session_start();
require '../php/conexion.php'; // Ajusta la ruta según tu estructura de archivos

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    http_response_code(401); // Usuario no autorizado
    echo json_encode(['error' => 'Por favor, inicie sesión primero.']);
    exit;
}

// Obtener el correo del usuario desde la sesión
$username = $_SESSION['username'];

try {
    // Consulta para obtener la información del usuario
    $sql = "
        SELECT 
            usuario.nombre, usuario.apellido, usuario.fecha AS fechaNacimiento, usuario.correo,
            usuario.dni, usuario.telefono, usuario.plan, usuario.dias_restantes, 
            pagos.estado AS estado_pago
        FROM 
            usuario
        LEFT JOIN 
            pagos ON usuario.id_est = pagos.id_est
        WHERE 
            usuario.correo = :username
        ORDER BY 
            pagos.id DESC
        LIMIT 1
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result); // Devolver los datos del usuario como JSON
    } else {
        echo json_encode(['error' => 'No se encontraron datos para este usuario.']);
    }
} catch (PDOException $e) {
    http_response_code(500); // Error interno del servidor
    echo json_encode(['error' => 'Error al consultar los datos.']);
}
?>
