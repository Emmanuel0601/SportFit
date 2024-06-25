<?php
// Establecer la conexión a la base de datos
$conn = new mysqli("localhost", "root", "061823", "sportfit");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
