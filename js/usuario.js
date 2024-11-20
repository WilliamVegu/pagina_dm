fetch('/php/usuario_con.php')
    .then((response) => response.json())
    .then((data) => {
        // Verificar si hay un error
        if (data.error) {
            console.error("Error al cargar los datos:", data.error);
            return;
        }

        // Insertar los datos en los campos del formulario
        document.getElementById('nombre').value = data.nombre || '';
        document.getElementById('apellido').value = data.apellido || '';
        document.getElementById('fechaNacimiento').value = data.fecha_nacimiento || '';
        document.getElementById('correo').value = data.correo || '';
        document.getElementById('dni').value = data.dni || '';
        document.getElementById('numeroContacto').value = data.numero_contacto || '';

        // Actualizar el plan de suscripción
        document.getElementById('diasRestantes').textContent = `Le restan ${data.dias_restantes} días a su plan de suscripción`;
        document.getElementById('planSemestral').classList.add('active'); // Ejemplo de activación de un plan
    })
    .catch((error) => {
        console.error("Error en la solicitud:", error);
    });
