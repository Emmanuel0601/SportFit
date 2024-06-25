<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $nuevaContraseña = $_POST["nueva_contraseña"];

    // Update password with hashed value
    $actualizarContraseña = $conn->prepare("UPDATE usuarios SET contrasena = ? WHERE correo = ?");
    $actualizarContraseña->bind_param("ss", $nuevaContraseña, $correo);

    if ($actualizarContraseña->execute()) {
        // Password updated successfully, redirect to login page
        header("Location: ../HTML/iniciarSesion.html");
        exit();
    } else {
        // Log the error and provide a generic message to the user
        error_log("Error updating password: " . $actualizarContraseña->error);
        echo "<script>
            alert('Error al actualizar la contraseña. Por favor, inténtelo de nuevo más tarde.');
            window.location.href = 'restaurar_contraseña.php';
        </script>";
    }

    // Close the prepared statement
    $actualizarContraseña->close();
} else {
    // Redirect if not a POST request
    header("Location: ../HTML/iniciarSesion.html");
    exit();
}
?>
