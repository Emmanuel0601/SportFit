<?php

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Configurar correo electrónico
$asunto = "Contacto desde Tienda SportFit";
$destinatario = "sportfit.info4@gmail.com";
$cabecera = "From: $nombre <$email>";

// Enviar correo electrónico
mail($destinatario, $asunto, $mensaje, $cabecera);

// Mostrar mensaje de éxito
echo "¡Tu mensaje ha sido enviado!";

?>
