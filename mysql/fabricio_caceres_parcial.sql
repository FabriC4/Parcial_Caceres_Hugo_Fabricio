/*CREATE DATABASE fc_parcial_plp3*/

/*CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);
*/

/*CREATE TABLE propiedades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    disponibilidad INT NOT NULL DEFAULT 3 -- Cantidad inicial de propiedades disponibles
);
*/

/*CREATE TABLE adquisiciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    propiedad_id INT NOT NULL,
    fecha_adquisicion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (propiedad_id) REFERENCES propiedades(id)
);
*/

INSERT INTO propiedades (nombre, descripcion, precio, disponibilidad) VALUES 
('Casa en el campo', 'Gran casa en una zona tranquila.', 300000, 3),
('Apartamento céntrico', 'Apartamento moderno en el corazón de la ciudad.', 180000, 3),
('Casa de lujo', 'Residencia de lujo con jardín y piscina.', 550000, 3);


/*CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    mensaje TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);*/







