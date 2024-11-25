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
    $telf = $_POST['telefono'];
    $plan = $_POST['plan'];
    $contr = $_POST['contrase'];
    
    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO usuario (nombre, apellido, fecha, direccion, correo, dni, telefono, plan, contrase) VALUES (:nombre, :apellido, :fecha, :direccion, :correo, :dni, :telefono, :plan, :contrase)";
    $stmt = $pdo->prepare($sql);

    // Vincular los parámetros y ejecutar la consulta
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':telefono', $telf);
    $stmt->bindParam(':plan', $plan);
    $stmt->bindParam(':contrase', $contr);
    
    // Ejecutar la consulta y verificar si se insertaron los datos correctamente
    if ($stmt->execute()) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos.";
    }
}
?>
