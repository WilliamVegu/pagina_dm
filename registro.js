
function validarFormulario() {
    // Validar nombre y apellido (solo letras)
    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const direccion = document.getElementById('direccion').value;
    const soloLetras = /^[a-zA-Z\s]+$/;
    if (!soloLetras.test(nombre)) {
        alert('El nombre solo puede contener letras.');
        return false;
    }
    if (!soloLetras.test(apellido)) {
        alert('El apellido solo puede contener letras.');
        return false;
    }

    // Validar código de estudiante (solo números)
    const dni = document.getElementById('dni').value;
    const soloNumeros = /^[0-9]+$/;
    if (!soloNumeros.test(dni)) {
        alert('El dni solo puede contener números.');
        return false;
    }



    return true;
}

function redirigirLogin() {
    window.location.href = 'login.html';
}

function redirigirHome() {
    window.location.href = 'web1.php';
}

function mostrarSeccion(seccion) {
    // Obtiene ambas secciones
    const formularioRegistro = document.getElementById('formulario-registro');
    const formularioIngreso = document.getElementById('formulario-ingreso');

    if (seccion === 'registro') {
        formularioRegistro.style.display = 'block'; // Muestra el formulario de registro
        formularioIngreso.style.display = 'none';  // Oculta el formulario de ingreso
    } else if (seccion === 'ingresar') {
        formularioRegistro.style.display = 'none'; // Oculta el formulario de registro
        formularioIngreso.style.display = 'block'; // Muestra el formulario de ingreso
    }
}
