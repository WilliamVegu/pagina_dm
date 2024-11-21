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