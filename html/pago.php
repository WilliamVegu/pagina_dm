<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Pago</title>
</head>
<body>
    <h1 style="text-align: center;">METODO DE PAGO</h1>
    
    <div>
        <h2>CODIGO QR DE PAGO</h2>
        <h3>YAPE</h3>
        
        <div>
            <img src="/img/qr.png" alt="QR de Pago">
        </div>
        
        <form action="procesar_pago.php" method="POST" >
            <label for="codigoOperacion">CÓDIGO DE OPERACIÓN:</label>
            <input type="text" id="codigoOperacion" name="codigoOperacion" required><br><br>
            <label for="numero">Número de teléfono:</label>
            <input type="tel" id="numero" name="numero" required pattern="^\+?[0-9]{1,3}?[ -]?[0-9]{6,12}$" placeholder="+34 123 456 789"><br><br>
            <button type="submit">ENVIAR</button>
        </form> 
    </div>
</body>
</html>
