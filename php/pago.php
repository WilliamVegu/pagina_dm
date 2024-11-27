<?php
session_start();
require '../php/conexion.php'; // Asegúrate de que este archivo conecta correctamente a tu base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['username'])) {
        echo "<script>
            alert('Debe iniciar sesión para realizar un pago.');
            window.location.href = '../html/registro.php';
        </script>";
        exit;
    }

    // Obtener datos del formulario
    $codigo = $_POST['codigo'];
    $numero = $_POST['numero'];

    // Obtener los datos de sesión
    $correo = $_SESSION['username'];

    try {
        // Obtener el ID y el nombre del usuario desde la base de datos
        $sqlUsuario = "SELECT id_est, nombre, correo FROM usuario WHERE correo = :correo";
        $stmtUsuario = $pdo->prepare($sqlUsuario);
        $stmtUsuario->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmtUsuario->execute();

        if ($stmtUsuario->rowCount() > 0) {
            $row = $stmtUsuario->fetch(PDO::FETCH_ASSOC);
            $idEst = $row['id_est'];
            $nombreUsuario = $row['nombre'];
            $correoUsuario = $row['correo'];

            // Insertar los datos en la tabla "pagos"
            $sqlInsert = "INSERT INTO pagos (id_est, usuario, correo, codigo, numero, estado) VALUES (:id_est, :usuario, :correo, :codigo, :numero, :estado)";
            $stmtInsert = $pdo->prepare($sqlInsert);
            $stmtInsert->bindParam(':id_est', $idEst, PDO::PARAM_INT);
            $stmtInsert->bindParam(':usuario', $nombreUsuario, PDO::PARAM_STR);
            $stmtInsert->bindParam(':correo', $correoUsuario, PDO::PARAM_STR);
            $stmtInsert->bindParam(':codigo', $codigo, PDO::PARAM_INT);
            $stmtInsert->bindParam(':numero', $numero, PDO::PARAM_INT);
            $stmtInsert->bindValue(':estado', 'en espera', PDO::PARAM_STR);

            if ($stmtInsert->execute()) {
                echo "<script>
                    alert('Pago registrado exitosamente.');
                    window.location.href = '../html/main.php';
                </script>";
            } else {
                echo "<script>
                    alert('Hubo un error al registrar el pago.');
                    window.history.back();
                </script>";
            }
        } else {
            echo "<script>
                alert('Usuario no encontrado.');
                window.history.back();
            </script>";
        }
    } catch (PDOException $e) {
        error_log("Error en la base de datos: " . $e->getMessage());
        echo "<script>
            alert('Error al procesar la solicitud.');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Método no permitido.');
        window.history.back();
    </script>";
}


