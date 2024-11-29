<?php
session_start();

// Destruir la sesión
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión actual
header("Location: /html/main.php");
exit;

?>
