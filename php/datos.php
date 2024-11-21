<?php
session_start();
require '../php/conexion.php';

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    // Enviar una respuesta de error si el usuario no está autenticado
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

try {
    // Consulta para obtener los datos del usuario
    $sql = "SELECT * FROM usuario WHERE correo = :correo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo', $_SESSION['username'], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Enviar los datos del usuario como JSON
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    } else {
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
} catch (PDOException $e) {
    error_log("Error al recuperar datos: " . $e->getMessage());
    echo json_encode(['error' => 'Error al recuperar datos']);
} 