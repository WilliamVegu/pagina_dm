<?php
// Configuración de la base de datos
$host = 'localhost';    // El servidor MySQL (generalmente localhost)
$dbname = 'dm';     // Nombre de la base de datos
$username = 'root';     // Nombre de usuario de MySQL (por defecto en XAMPP es 'root')
$password = '';         // Contraseña de MySQL (por defecto en XAMPP es vacío)

// Establecer la conexión a la base de datos usando PDO
try { 
    // Usamos PDO para la conexión
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}

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
