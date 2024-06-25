<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/productos.css">
  <title>Productos de Gimnasio</title>
</head>
<body>
<header>
  <div class="navbar">
    <div class="logo"><a href="../index.html">SportFit</a></div>
    <ul class="link">
      <li><a href="../index.html">Inicio</a></li>
      <li class="dropdown">
        <a href="#">Productos</a>
        <ul class="dropdown-content">
          <li><a href="../php/ProductosHombre.php">Hombre</a></li>
          <li><a href="../php/ProductosMujer.php">Mujer</a></li>
          <li><a href="../php/ProductosArticulos.php">Accesorios</a></li>
        </ul>
      </li>
      <li><a href="../HTML/contactanos.html">Contáctanos</a></li>
    </ul>
  </div>
</header>

<main>
  <section id="product">
    <?php
      // Establecer la conexión a la base de datos
      $conn = new mysqli("localhost", "root", "061823", "sportfit");

      // Verificar la conexión
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Consulta para obtener los productos de Articulos
      $sql = "SELECT * FROM productos WHERE tipoProducto = 'Articulos' ORDER BY id DESC ";
      $result = $conn->query($sql);

      // Muestra los productos en la página
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="product-details">';
          echo '<img src="data:image/jpeg;base64,' . $row['imagen'] . '" alt="' . $row['nombre'] . '">';
          echo '<div class="info">';
          echo '<h2>' . $row['nombre'] . '</h2>';
          echo '<p>' . $row['descripcion'] . '</p>';
          echo '<p>Precio: $' . $row['precio'] . '</p>';
          echo '<button class="buy-btn">Comprar</button>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "No hay productos de Articulos disponibles.";
      }

      // Cierra la conexión
      $conn->close();
    ?>
  </section>
</main>

<footer>
  <div class="contenedor-footer">
    <div class="box">
      <h2>Contactos</h2>
      <div class="footer-texto">
        <p>Tel: 849-474-0775</p>
        <p>Correo Electrónico: <span><a href="sportfit.info4@gmail.com">sportfit.info4@gmail.com</a></span></p>
      </div>
    </div>
    <div class="box">
      <h2>Menú</h2>
      <a href="../HTML/main.html">Inicio</a>
      <a href="../HTML/NOSOTROS.html">Nosotros</a>
      <a href="../HTML/insertar_tarea.html">Insertar tarea</a>
      <a href="../HTML/mostrar_tarea.html">Mostrar tarea</a>
    </div>
    <div class="box">
      <h2>Nosotros</h2>
      <a href="../HTML/NOSOTROS.html#mision">Misión</a>
      <a href="../HTML/NOSOTROS.html#vision">Visión</a>
      <a href="../HTML/NOSOTROS.html#valores">Valores</a>
    </div>
    <div class="box">
      <h2>Redes</h2>
      <a href="https://www.facebook.com/MDefensaRD/" target="_blank"><i class='bx bxl-facebook-circle'></i>Facebook</a>
      <a href="https://www.instagram.com/mdefensard/?hl=es-la" target="_blank"><i class='bx bxl-instagram'></i>Instagram</a>
      <a href="https://twitter.com/MDefensaRD?ref_src=twsrc%5Egoogle%7Ctwcamp%5Es" target="_blank"><i class='bx bxl-twitter' ></i>Twitter</a>
      <a href="https://www.youtube.com/channel/UCU7L-KI9z3GpKwh2oH0dtkQ" target="_blank"><i class='bx bxl-youtube'></i>YouTube</a>
        </div>
        </div>
        <!--Derechos de autor-->
        <div class="copyright">
            <hr>
            <p>&copy; 2024 Sportfit. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
