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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Pago</title>
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
    <h1 style="text-align: center;">METODO DE PAGO</h1>
    
    <div>
        <h2>CODIGO QR DE PAGO</h2>
        <h3>YAPE</h3>
        
        <div>
            <img src="/img/qr.png" alt="QR de Pago">
        </div>
        <br>
            <a href="/img/Instructivo.pdf" download>Seleccione AQUÍ si tiene dudas </a>
        
        <form action="/php/renovarp.php" method="POST" >
            <label for="codigo">CÓDIGO DE OPERACIÓN:</label>
            <input type="text" id="codigo" name="codigo" required><br><br>
            <label for="numero">Número de teléfono con el que se realizará el yapeo:</label>
            <input type="tel" id="numero" name="numero" required pattern="^\+?[0-9]{1,3}?[ -]?[0-9]{6,12}$" placeholder="+34 123 456 789"><br><br>
            <label for="plan">Seleccione el nuevo plan:</label>
            <select id="plan" name="plan" required>
                <option value="Mensual">Mensual</option>
                <option value="Semestral">Semestral</option>
                <option value="Anual">Anual</option>
            </select>
            <button type="submit">ENVIAR</button>
        </form> 

    </div>
    <script src="/js/renovar.js"></script>
</body>
</html>
