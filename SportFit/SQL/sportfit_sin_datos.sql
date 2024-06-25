-- Active: 1708669982119@@127.0.0.1@3306@sportfit

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `pregunta_seguridad` varchar(100) NOT NULL,
  `respuesta_seguridad` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `productos`;
CREATE TABLE Productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    tipoProducto VARCHAR(50) NOT NULL,
    imagen MEDIUMBLOB NOT NULL
);


DROP TABLE IF EXISTS `usuadmin`;

CREATE TABLE usuadmin(
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario VARCHAR(100) NOT NULL,
  contrasena varchar(50) NOT NULL
);