<?php
include 'conexion.php';

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$tipoProducto = $_POST['tipoProducto'];

// Procesar la imagen y convertirla a formato base64
$imagenTmp = $_FILES['imagen']['tmp_name'];
$imagenData = base64_encode(file_get_contents($imagenTmp));

// Insertar datos en la base de datos
$sql = "INSERT INTO Productos (nombre, descripcion, precio, tipoProducto, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$tipoProducto', '$imagenData')";

if ($conn->query($sql) === TRUE) {
    echo '<script>';
    echo 'alert("Producto agregado con éxito");
              setTimeout((alert) => {
              window.location = "../HTML/admin.html";
              }, 0);';
    echo '</script>';
} else {
    echo "Error al agregar el producto: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
