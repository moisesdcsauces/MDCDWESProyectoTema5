USE DBMDCDWESProyectoTema5;

-- Inserción de departamentos de prueba
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
('INF', 'Departamento de Informática', NOW(), 1500.50, NULL),
('CON', 'Departamento de Contabilidad', NOW(), 2500.00, NULL),
('VEN', 'Departamento de Ventas', NOW(), 3500.75, NULL);

-- Inserción de usuarios de prueba (contraseñas encriptadas en SHA256)
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumConexiones, T01_Perfil) VALUES
('admin', SHA2('adminpaso', 256), 'Administrador del sistema', NOW(), 1, 'administrador'),
('moises', SHA2('moisespaso', 256), 'Moisés Alberto Domínguez Cruz', NOW(), 1, 'usuario');
