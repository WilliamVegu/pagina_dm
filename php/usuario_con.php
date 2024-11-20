<?php
// Configuración de la conexión a la base de datos
$host = "localhost"; 
$dbname = "dm"; 
$username = "root"; 
$password = ""; 

try {
    session_start(); // Asegúrate de iniciar la sesión

    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    // Consulta a la base de datos
    $sql = "SELECT nombre, apellido, fecha, direccion, correo, dni, plan FROM usuario WHERE id_est = :id";
    $stmt = $pdo->prepare($sql);
    
    // Obtener y enviar los datos del usuario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        echo json_encode($usuario);
    } else {
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
    
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
}
?>