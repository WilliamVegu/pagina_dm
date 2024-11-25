window.addEventListener('beforeunload', function (event) {
    // Si deseas bloquear la salida, establece un mensaje.
    event.preventDefault();
    event.returnValue = ''; // Necesario para que funcione en algunos navegadores.
});
