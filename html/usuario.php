<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Por favor, inicie sesión primero.');
        window.location.href = '/html/registro.php';
    </script>";
    exit;
}
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
    <div class="container">
        <div class="personal-info">
            <h2>ADMISIÓN SMART</h2>
            <img src="/img/estudiante.png" alt="Avatar" class="avatar">
            <form>
                <label for="nombre">Nombres:</label>
                <input type="text" id="nombre" readonly>

                <label for="apellido">Apellidos:</label>
                <input type="text" id="apellido" readonly>

                <label for="fechaNacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fechaNacimiento" readonly>

                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" readonly>

                <label for="dni">DNI:</label>
                <input type="text" id="dni" readonly>

                <label for="numeroContacto">Número de Contacto:</label>
                <input type="tel" id="numeroContacto" readonly>

                <button type="button" id="editar" disabled>Editar</button>
            </form>
        </div>

        <div class="subscription-info">
            <h3>PLAN DE SUSCRIPCIÓN</h3>
            <div class="plans">
                <button id="planMensual">Plan Mensual</button>
                <button id="planSemestral" class="active">Plan Semestral</button>
                <button id="planAnual">Plan Anual</button>
            </div>
            <p>Progreso de Plan:</p>
            <div class="progress-bar">
                <div id="progress"></div>
            </div>
            <p id="diasRestantes">Le restan 15 días a su plan de suscripción</p>
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
