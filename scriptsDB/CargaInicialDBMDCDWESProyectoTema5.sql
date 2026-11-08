USE DBMDCDWESProyectoTema5;

-- Insercion de departamentos de prueba
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
('INF', 'Departamento de Informática', NOW(), 1500.50, NULL),
('CON', 'Departamento de Contabilidad', NOW(), 2500.00, NULL),
('VEN', 'Departamento de Ventas', NOW(), 3500.75, NULL);

-- Insercion de usuarios de prueba
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumConexiones, T01_Perfil) VALUES
('admin', SHA2(CONCAT('admin', 'adminpaso'), 256), 'Administrador del sistema', NOW(), 1, 'administrador'),
('moises', SHA2(CONCAT('moises', 'moisespaso'), 256), 'Moisés Alberto Domínguez Cruz', NOW(), 1, 'usuario');