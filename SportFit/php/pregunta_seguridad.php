<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar la existencia de la variable POST
    if (isset($_POST["correo"])) {
        $correo = $_POST["correo"];

        // Consultar la pregunta de seguridad
        $sql = "SELECT pregunta_seguridad FROM usuarios WHERE correo = '$correo'";
        $result = $conn->query($sql);

        if ($result) {
            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $preguntaSeguridad = $row["pregunta_seguridad"];

                echo "<form action='cambiar_contraseña.php' method='post'>";
                echo "<h2>Pregunta de Seguridad</h2>";
                echo "<p>{$preguntaSeguridad}</p>";
                echo "<input type='hidden' name='correo' value='$correo'>";
                echo "<label for='respuesta'>Respuesta:</label>";
                echo "<input type='text' id='respuesta' name='respuesta' required>";
                echo "<button type='submit' id='boton'>Continuar</button>";
                echo "<a href='restaurar_contraseña.php'><button type='button' id='atras' class='boton-atras'>Atrás</button></a>";
                echo "</form>";
            } else {
                echo "Correo no encontrado";
            }
        } else {
            // Manejar errores en la consulta
            echo "Error en la consulta: " . $conn->error;
        }
        
        // Liberar el resultado
        $result->free_result();
    } else {
        echo "Correo no proporcionado";
    }
}
?>
<link rel="stylesheet" type="text/css" href="../CSS/pregunta_seguridad.css">