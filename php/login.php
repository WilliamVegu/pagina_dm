<?php
// login.php
session_start();

require '../php/conexion.php';

// Verificar datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];

    // Consulta para verificar usuario
    $sql = "SELECT * FROM usuario WHERE correo = :correo AND dni = :dni";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Guardar información en la sesión
        $_SESSION['usuario'] = $usuario;
        header('Location: usuario.php');
    } else {
        echo "Credenciales incorrectas.";
    }
}
