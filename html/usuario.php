<?php
session_start();
require '../php/conexion.php'; // Asegúrate de ajustar la ruta al archivo de conexión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Por favor, inicie sesión primero.');
        window.location.href = '/html/registro.php';
    </script>";
    exit;
}

// Obtener el nombre de usuario de la sesión
$username = $_SESSION['username'];

try {
    // Consulta para verificar el estado del pago
    $sql = "SELECT estado FROM pagos 
            INNER JOIN usuario ON pagos.id_est = usuario.id_est
            WHERE usuario.correo = :username
            ORDER BY pagos.id DESC LIMIT 1"; // Ordena por ID para obtener el pago más reciente
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si existe un pago asociado y su estado
    if ($result && $result['estado'] === 'aprobado') {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admisión Smart</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <header>
                <nav>
                    <ul>
                        <li><a href="main.php">Admisión Smart</a></li>
                        <li><a href="registro.php">Registrarse/Iniciar sesión</a></li>
                        <li><a href="#nosotros">Nosotros</a></li>
                        <li><a href="#planes">Planes</a></li>
                        <li><a href="pago.php">Pago</a></li>
                        <li><a href="usuario.php">Usuario</a></li>
                    </ul>
                </nav>
            </header>
            <div class="container">
                <div class="personal-info">
                    <h2>ADMISIÓN SMART</h2>
                    <img src="/img/estudiante.png" alt="Avatar" class="avatar">
                    <form>
                        <label for="nombre">Nombres:</label>
                        <input type="text" id="nombre" readonly value="<?php echo htmlspecialchars($username); ?>">

                        <label for="apellido">Apellidos:</label>
                        <input type="text" id="apellido" readonly>

                        <label for="fechaNacimiento">Fecha de nacimiento:</label>
                        <input type="date" id="fechaNacimiento" readonly>

                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" id="correo" readonly>

                        <label for="dni">DNI:</label>
                        <input type="text" id="dni" readonly>

                        <label for="telefono">Número de Contacto:</label>
                        <input type="telefono" id="telefono" readonly>

                        <button type="button" id="editar" disabled>Editar</button>
                    </form>
                </div>

                <div class="subscription-info">
                    <h3>PLAN DE SUSCRIPCIÓN</h3>
                    <div class="subscription-info">
                        <h3>PLAN DE SUSCRIPCIÓN</h3>
                        <div class="plan-actual">
                            <p id="planActual"></p>
                        </div>
                        <p>Progreso de Plan:</p>
                        <div class="progress-bar">
                            <div id="progress"></div>
                        </div>
                        <p id="diasRestantes"></p>
                    </div>

                </div>

                <div class="extra-info">
                    <div class="ranking">
                        <h3>Posición Ranking</h3>
                        <div id="ranking-list">
                        </div>
                    </div>
                    <div class="courses">
                        <h3>Cursos Activos</h3>
                        <p>Comprensión Lectora</p>
                        <p>Matemáticas</p>
                    </div>
                    <div class="apk">
                        <h3>Descarga APK</h3>
                        <button id="downloadApk">Android Version</button>
                    </div>
                </div>
            </div>
        </body>
        <script src="/js/usuario.js"></script>
        </html>
        <?php
    }else if ($result && $result['estado'] === 'denegado') {
        echo "<h1>Su pago ha sido revisado y denegado/invalidado.</h1>";
        echo "Si no esta de acuerdo con la desicion o necesita ayuda adicional, seleccione el siguiente botón: ";
        echo "<button onclick=window.location.href='/html/ayuda.php'>ayuda</button>";
        }
         else {
        // El estado no es aprobado o no existe pago
        echo "<h1>Usted aun no ha realizado el pago correctamente o su pago aun esta en proceso. Por favor, espere a que sea aprobado.</h1>";
        echo "<button onclick=window.location.href='/html/ayuda.php'>Ir a otro sitio</button>";
        echo "Si su pago lleva mas de 24 horas sin ser aprobado o necesita ayuda adicional, seleccione el siguiente botón: ";
        }
} catch (PDOException $e) {
    // Manejar errores de la consulta
    error_log("Error en la consulta: " . $e->getMessage());
    echo "<h1>Ocurrió un error. Intente nuevamente más tarde.</h1>";
    exit;
}


?>
