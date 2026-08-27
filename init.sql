-- Archivo: init.sql
CREATE TABLE IF NOT EXISTS usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nombre, email) VALUES
('José Rodríguez', 'jose@ejemplo.com'),
('María López', 'maria@ejemplo.com'),
('Carlos Pérez', 'carlos@ejemplo.com');