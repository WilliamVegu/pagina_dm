document.addEventListener('DOMContentLoaded', function () {
    // Elementos del DOM donde se mostrarán los datos
    const nombreInput = document.getElementById('nombre');
    const apellidoInput = document.getElementById('apellido');
    const fechaNacimientoInput = document.getElementById('fechaNacimiento');
    const correoInput = document.getElementById('correo');
    const dniInput = document.getElementById('dni');
    const telefonoInput = document.getElementById('telefono');
    const planActualElement = document.getElementById('planActual');
    const diasRestantesElement = document.getElementById('diasRestantes');
    const progressBar = document.getElementById('progress');

    // Hacer la solicitud a datos.php
    fetch('/php/datos.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener los datos del usuario');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }

            // Llenar los campos del formulario con los datos del usuario
            nombreInput.value = data.nombre || '';
            apellidoInput.value = data.apellido || '';
            fechaNacimientoInput.value = data.fechaNacimiento || '';
            correoInput.value = data.correo || '';
            dniInput.value = data.dni || '';
            telefonoInput.value = data.telefono || '';

            // Mostrar información del plan
            planActualElement.textContent = `Plan: ${data.plan || 'No definido'}`;
            
            if (data.dias_restantes > 0) {
                diasRestantesElement.textContent = `Días restantes: ${data.dias_restantes}`;
            } else {
                diasRestantesElement.textContent = 'Su plan ha caducado.';
            }

            // Calcular el progreso del plan
            let totalDias;
            if (data.plan === 'mensual') totalDias = 30;
            else if (data.plan === 'semestral') totalDias = 180;
            else if (data.plan === 'anual') totalDias = 365;
            else totalDias = 1;

            const progreso = ((totalDias - data.dias_restantes) / totalDias) * 100;
            progressBar.style.width = `${Math.min(Math.max(progreso, 0), 100)}%`;
        })
        .catch(error => {
            console.error('Error al cargar los datos del usuario:', error);
            alert('No se pudieron cargar los datos del usuario.');
        });
});
