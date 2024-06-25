<?php
session_start();

// Verificar si hay una sesión iniciada y si existen datos de correo y contraseña
if (isset($_SESSION['correo']) && isset($_SESSION['contrasena'])) {
    $correo = $_SESSION['correo'];
    $contrasena = $_SESSION['contrasena'];

    // Log de mensajes
    echo '<script>';
    echo 'console.log("Sesión iniciada con correo: ' . $correo . ' y contraseña: ' . $contrasena . '");';
    echo '</script>';

    // Verificar en la base de datos
    include 'conexion.php'; // Asegúrate de incluir el archivo de conexión a la base de datos

    // Sanitizar los datos para prevenir inyección SQL
    $correo = mysqli_real_escape_string($conn, $correo);
    $contrasena = mysqli_real_escape_string($conn, $contrasena);

    // Consultar en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario autenticado, redirigir a la página de productos.php
        header("Location: productos.php");
        exit();
    } else {
        // Usuario no encontrado en la base de datos
        echo '<script>';
        echo 'console.log("Usuario no encontrado en la base de datos");';
        echo '</script>';
        // Redirigir a iniciarSesion.html
        header("Location: iniciarSesion.html");
        exit();
    }

    // Cerrar conexión
    $conn->close();
} else {
    // No hay sesión o los datos no están presentes
    echo '<script>';
    echo 'console.log("No hay sesión o los datos no están presentes");';
    echo '</script>';
    // Redirigir a iniciarSesion.html
    header("Location: iniciarSesion.html");
    exit();
}
?>
