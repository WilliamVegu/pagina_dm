<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Admisión Smart</title>
    <style>
        #formulario-registro, #formulario-ingreso {
            display: none; 
        }
    </style>
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
                
            </ul>
        </nav>
    </header>
    <div id="registro-container">
        <div id="descripcion">
            <img src="/img/image copy.png" alt="Logo de Admisión Smart">
            <h1>ADMISIÓN SMART</h1>
            <p>
                Lorem Ipsum es simplemente el texto ficticio de la industria de impresión y composición tipográfica. 
                Ha sido el texto estándar de la industria desde el siglo XVI.
            </p>
            <button onclick="mostrarSeccion('registro')">Registrarse</button>
            <button onclick="mostrarSeccion('ingresar')">Iniciar sesión</button>
            <form action="/php/cerrar.php" method="POST">
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>

        <div id="formulario-registro">
            <h2>REGISTRARSE</h2>
            <form id="form-registro" action="/php/registro_con.php" method="POST" onsubmit="return validarFormulario()">
                <label for="nombres">Nombres</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" id="fecha" name="fecha" required>

                <label for="direccion">Dirección de domicilio</label>
                <input type="text" id="direccion" name="direccion" required>

                <label for="email">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required>

                <label for="dni">DNI</label>
                <input type="text" id="dni" name="dni" required>

                <label for="telefono">Numero de teléfono</label>
                <input type="text" id="telefono" name="telefono" required>

                <label for="plan">Elección de plan</label>
                <select id="plan" name="plan" required>
                    <option value="">Seleccione un plan</option>
                    <option value="mensual">Plan Mensual</option>
                    <option value="semestral">Plan Semestral</option>
                    <option value="anual">Plan Anual</option>
                </select>

                <label for="contrase">Contraseña</label>
                <input type="text" id="contrase" name="contrase" required>

                <button type="submit">Registrarse</button>
            </form>
        </div>

        <div id="formulario-ingreso">
            <h2>INICIAR SESIÓN</h2>
            <form id="form-ingreso" action="/php/compr.php" method="POST">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correoIngreso" name="correo" required>

                <label for="contrase">Contraseña</label>
                <input type="contrase" id="contrase" name="contrase" required>

                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>

    <script src="/js/registro.js"></script>
</body>
</html>
