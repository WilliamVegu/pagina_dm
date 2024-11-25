<?php
session_start();
require '..\php\conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

// Supongamos que el nombre del usuario está guardado en la sesión o se obtiene de la base de datos
try {
    require '../php/conexion.php';
    $sql = "SELECT nombre FROM usuario WHERE correo = :correo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo', $_SESSION['username'], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['nombre' => $usuario['nombre']]);
    } else {
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
} catch (PDOException $e) {
    error_log("Error al recuperar datos: " . $e->getMessage());
    echo json_encode(['error' => 'Error al recuperar datos']);
}
