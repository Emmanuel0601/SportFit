<?php
include 'conexion.php';

// Obtener datos del formulario
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$correo = $_POST['Correo'];
$telefono = $_POST['Telefono'];
$fechaNacimiento = $_POST['Fecha'];
$contrasena = $_POST['Contraseña'];
$confirmarContrasena = $_POST['ConfirmarContraseña'];
$preguntaSeguridad = $_POST['PreguntaSeguridad'];
$respuestaSeguridad = $_POST['RespuestaSeguridad'];

// Validar contraseña
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\p{P}])[\p{L}\d\p{P}]{8,}$/', $contrasena)) {
    echo "<script>
            alert('La contraseña debe tener al menos 8 caracteres, incluyendo al menos una mayúscula, una minúscula, un número y un signo de puntuación.');
            setTimeout(function(){
                window.location.href = '../HTML/registro.html';
            }, 0);
          </script>";
    exit(); // Detener la ejecución del script si la contraseña no cumple con los requisitos
}


// Validar que las contraseñas coincidan
if ($contrasena != $confirmarContrasena) {
    echo "<script>
            alert('Las contraseñas no coinciden.');
            setTimeout(function(){
                window.location.href = '../HTML/registro.html';
            }, 0);
          </script>";
    exit(); // Detener la ejecución del script si las contraseñas no coinciden
}

// Verificar si el correo ya está en la base de datos
$sqlVerificarCorreo = "SELECT correo FROM usuarios WHERE correo = '$correo'";
$resultadoVerificarCorreo = $conn->query($sqlVerificarCorreo);

if ($resultadoVerificarCorreo->num_rows > 0) {
    echo "<script>
            alert('El correo introducido ya está registrado en la base de datos.');
            setTimeout(function(){
                window.location.href = '../HTML/registro.html';
            }, 0);
          </script>";
    exit(); // Detener la ejecución del script si el correo ya está en la base de datos
}

// Insertar datos en la tabla
$sql = "INSERT INTO usuarios (nombre, apellidos, correo, telefono, fecha_nacimiento, contrasena, pregunta_seguridad, respuesta_seguridad)
        VALUES ('$nombre', '$apellidos', '$correo', '$telefono', '$fechaNacimiento', '$contrasena', '$preguntaSeguridad', '$respuestaSeguridad')";

if ($conn->query($sql) === TRUE) {
    $mensaje = "Registro exitoso";
    $destino = '../HTML/registro.html';
} else {
    $mensaje = "Registro no Guardado: " . $conn->error;
    $destino = '../HTML/pagina_error.html';
}

echo "<script>
        alert('$mensaje');
        window.location.href = '$destino';
      </script>";

// Cerrar conexión
$conn->close();
?>
