CREATE USER IF NOT EXISTS 'myuser'@'%' IDENTIFIED BY 'pato';

-- Conceder permisos completos sobre la base de datos
GRANT ALL PRIVILEGES ON *.* TO 'myuser'@'%';

-- Conceder permisos específicos sobre la base de datos 'my_database'
GRANT ALL PRIVILEGES ON my_database.* TO 'myuser'@'%';

-- Actualizar los privilegios
FLUSH PRIVILEGES;
-- Crear la base de datos
CREATE DATABASE my_database;

-- Usar la base de datos recién creada
USE my_database;

-- Crear la tabla
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar algunos datos de ejemplo
INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane@example.com');