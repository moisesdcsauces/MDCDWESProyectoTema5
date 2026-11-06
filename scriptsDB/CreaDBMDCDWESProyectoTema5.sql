-- Creación de la base de datos utilizando tus iniciales MDC
CREATE DATABASE IF NOT EXISTS DBMDCDWESProyectoTema5;

-- Uso de la base de datos
USE DBMDCDWESProyectoTema5;

-- Creación de la tabla T02_Departamento
CREATE TABLE IF NOT EXISTS T02_Departamento (
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255) NOT NULL,
    T02_FechaCreacionDepartamento DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    T02_VolumenDeNegocio FLOAT(10,2) NOT NULL,
    T02_FechaBajaDepartamento DATETIME DEFAULT NULL
) ENGINE=InnoDB;

-- Creación de la tabla T01_Usuario
CREATE TABLE IF NOT EXISTS T01_Usuario (
    T01_CodUsuario VARCHAR(8) PRIMARY KEY,
    T01_Password VARCHAR(255) NOT NULL,
    T01_DescUsuario VARCHAR(255) NOT NULL,
    T01_FechaHoraUltimaConexion DATETIME NOT NULL DEFAULT NULL,
    T01_NumConexiones INT NOT NULL DEFAULT 0,
    T01_Perfil ENUM('usuario', 'administrador') DEFAULT 'usuario',
    T01_ImagenUsuario MEDIUMBLOB DEFAULT NULL
) ENGINE=InnoDB;

-- Creación del usuario para la aplicación
CREATE USER IF NOT EXISTS 'userMDCDWESProyectoTema5'@'%' IDENTIFIED BY 'paso';

-- Asignación de permisos al usuario sobre la base de datos
GRANT ALL PRIVILEGES ON DBMDCDWESProyectoTema4.* TO 'userMDCDWESProyectoTema5'@'%';

FLUSH PRIVILEGES;