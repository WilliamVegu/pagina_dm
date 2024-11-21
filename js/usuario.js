fetch('/php/datos.php')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Rellenar los campos con los datos del usuario
                    document.getElementById('nombre').value = data.nombre;
                    document.getElementById('apellido').value = data.apellido;
                    document.getElementById('fechaNacimiento').value = data.fecha;
                    document.getElementById('correo').value = data.correo;
                    document.getElementById('dni').value = data.dni;
                    document.getElementById('planActual').textContent += data.plan;
                    document.getElementById('diasRestantes').textContent = `Le restan ${data.dias_restantes} días a su plan de suscripción`;
                    document.getElementById('planSemestral').classList.add('active'); // Ejemplo de activación de un plan
                }
            })
            .catch(error => {
                console.error('Error al obtener datos:', error);
                alert('Hubo un error al cargar los datos del usuario.');
            });
