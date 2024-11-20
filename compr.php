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
// Verificar que el formulario fue enviado con el método POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener datos del formulario
        $user = $_POST['correo'];
        $pass = $_POST['contra'];

        try {
            // Preparar la consulta SQL
            $sql = "SELECT * FROM usuario WHERE correo = :correo AND contraseña = :contra";
            $stmt = $pdo->prepare($sql);

            // Enlazar parámetros
            $stmt->bindParam(':correo', $user, PDO::PARAM_STR);
            $stmt->bindParam(':contra', $pass, PDO::PARAM_STR);

            // Ejecutar la consulta
            $stmt->execute();

            // Verificar si el usuario existe
            if ($stmt->rowCount() > 0) {
                $_SESSION['username'] = $user; // Almacenar el nombre de usuario en la sesión
                echo "<script>
        window.location.href = 'usuario.php';
    </script>";
            } else {
                echo "<script>
        alert('Usuario o contraseña incorrectos');
        window.location.href = 'registro.php';
    </script>";
            }
        } catch (PDOException $e) {
            // Manejar el error de la consulta
            error_log("Error en la consulta: " . $e->getMessage()); // Registra el error en el archivo de log del servidor
            die("Error en la consulta: " . $e->getMessage());
        }
    } else {
        die("Método de solicitud no válido. Por favor, use el método POST.");
    }

    // Cerrar la conexión (PDO se cierra automáticamente al finalizar el script)