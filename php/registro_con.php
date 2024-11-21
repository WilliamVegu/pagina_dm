<?php
require '..\php\conexion.php';
// Verificar si los datos fueron enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $plan = $_POST['plan'];
    
    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO usuario (nombre, apellido, fecha, direccion, correo, dni, plan) VALUES (:nombre, :apellido, :fecha, :direccion, :correo, :dni, :plan)";
    $stmt = $pdo->prepare($sql);

    // Vincular los parámetros y ejecutar la consulta
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':plan', $plan);
    
    // Ejecutar la consulta y verificar si se insertaron los datos correctamente
    if ($stmt->execute()) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos.";
    }
}
?>
