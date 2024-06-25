<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];

    // Consultar la respuesta de seguridad
    $sql = "SELECT respuesta_seguridad FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $respuestaSeguridad = $row["respuesta_seguridad"];

        echo "<form action='actualizar_contraseña.php' method='post'>";
        echo "<h2>Cambiar Contraseña</h2>";
        echo "<input type='hidden' name='correo' value='$correo'>";
        echo "<label for='nueva_contraseña'>Nueva Contraseña:</label>";
        echo "<input type='password' id='nueva_contraseña' name='nueva_contraseña' required>";
        echo "<button type='submit' id='boton'>Actualizar Contraseña</button>";
        echo "<a href='restaurar_contraseña.php'><button type='button' id='atras' class='boton-atras'>Atrás</button></a>";
        echo "</form>";
    } else {
        echo "Respuesta de seguridad no encontrada";
    }
}
?>
<link rel="stylesheet" type="text/css" href="../CSS/cambiar_contrasena.css">