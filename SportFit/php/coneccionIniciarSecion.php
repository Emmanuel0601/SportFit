<?php
session_start();
include 'conexion.php';

// Obtener datos del formulario
$correo = $_POST['Correo'];
$contrasena = $_POST['Contraseña'];

// Verificar si el usuario existe en la tabla
$sql = "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, almacenar datos en variables de sesión
    $_SESSION['correo'] = $correo;
    $_SESSION['contrasena'] = $contrasena;

    echo '<script>';
    echo 'alert("Inicio de sesión exitoso");
            setTimeout((alert) => {
            window.location = "productos.php";
            }, 0);';
    echo '</script>';
} else {
    // Usuario no encontrado o contraseña incorrecta, redirigir a la página de error.html
    // header("Location: ../HTML/error.html");
  echo '<script>';
  echo 'alert("Usuario no encontrado o contraseña incorrecta");
            setTimeout((alert) => {
            window.location = "../HTML/iniciarSesion.html";
            }, 0);';
  echo '</script>';

}

// Cerrar conexión
$conn->close();
?>
