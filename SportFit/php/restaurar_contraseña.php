<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/restaurar_contraseña.css">
    <title>Restaurar Contraseña</title>
</head>
<body>
    <form action="pregunta_seguridad.php" method="post">
        
        <h2>Restaurar Contraseña</h2>
        
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <button type="submit" id="boton">Continuar</button>

        <a href="../HTML/iniciarSesion.html"><button type="button" id="atras" class="boton-atras">Atrás</button></a>

    </form>
</body>
</html>
