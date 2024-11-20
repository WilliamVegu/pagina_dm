<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Admisión Smart</title>
    <style>
        #formulario-registro, #formulario-ingreso {
            display: none; /* Oculta ambas secciones por defecto */
        }
    </style>
</head>
<body>
    <div id="registro-container">
        <div id="descripcion">
            <img src="image copy.png" alt="Logo de Admisión Smart">
            <h1>ADMISIÓN SMART</h1>
            <p>
                Lorem Ipsum es simplemente el texto ficticio de la industria de impresión y composición tipográfica. 
                Ha sido el texto estándar de la industria desde el siglo XVI.
            </p>
            <button onclick="mostrarSeccion('registro')">Registrarse</button>
            <button onclick="mostrarSeccion('ingresar')">Iniciar sesión</button>
        </div>

        <div id="formulario-registro">
            <h2>REGISTRARSE</h2>
            <form id="form-registro" action="registro_con.php" method="POST" onsubmit="return validarFormulario()">
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

                <label for="plan">Elección de plan</label>
                <select id="plan" name="plan" required>
                    <option value="">Seleccione un plan</option>
                    <option value="mensual">Plan Mensual</option>
                    <option value="semestral">Plan Semestral</option>
                    <option value="anual">Plan Anual</option>
                </select>

                <button type="submit">Enviar</button>
            </form>
        </div>

        <div id="formulario-ingreso">
            <h2>INICIAR SESIÓN</h2>
            <form id="form-ingreso" action="compr.php" method="POST">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correoIngreso" name="correo" required>

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="contra" required>

                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>

    <script src="registro.js"></script>
</body>
</html>
