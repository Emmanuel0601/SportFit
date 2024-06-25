<?php
include 'conexion.php';

// Obtener datos del formulario
$correo = $_POST['Correo'];
$contrasena = $_POST['Contraseña'];

// Verificar si el usuario existe en la tabla
$sql = "SELECT * FROM usuadmin WHERE correo='$correo' AND contrasena='$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, redirigir a la página de productos
    header("Location: ../html/admin.html");
    exit();
} else {
    // Usuario no encontrado o contraseña incorrecta, redirigir a la página de error.html
    header("Location: ../HTML/error.html");
    exit();
}

// Cerrar conexión
$conn->close();
?>
