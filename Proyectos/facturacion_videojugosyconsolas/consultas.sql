-- Crear la base de datos
CREATE DATABASE videojuegos_consolas;

-- Usar la base de datos creada
USE videojuegos_consolas;

-- Crear la tabla 'consolas'
CREATE TABLE consolas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    lanzamiento DATE NOT NULL);

-- Crear la tabla 'videojuegos'
CREATE TABLE videojuegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    lanzamiento DATE NOT NULL);

