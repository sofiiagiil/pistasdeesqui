CREATE DATABASE IF NOT EXISTS `pistasesqui`;
USE `pistasesqui`;

-- Tablas Maestras
CREATE TABLE IF NOT EXISTS `esquiador` (
  `id_esquiador` INT PRIMARY KEY,
  `Nombre` VARCHAR(40),
  `Apellido` VARCHAR(40),
  `Edad` SMALLINT,
  `Nivel` VARCHAR(255),
  `Especialidad` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `esquiador_libre` (
  `id_esquiador` INT PRIMARY KEY,
  FOREIGN KEY (`id_esquiador`) REFERENCES `esquiador`(`id_esquiador`)
);

CREATE TABLE IF NOT EXISTS `profesor` (
  `id_esquiador` INT PRIMARY KEY,
  `Turno` VARCHAR(255),
  `Idiomas` VARCHAR(255),
  `Años_experiencia` INT,
  `Sueldo` DOUBLE,
  `Titulacion` VARCHAR(255),
  FOREIGN KEY (`id_esquiador`) REFERENCES `esquiador`(`id_esquiador`)
);

CREATE TABLE IF NOT EXISTS `tipo_forfait` (
  `id_tipo_forfait` INT PRIMARY KEY,
  `Nombre` VARCHAR(255),
  `Precio_dia` INT
);

CREATE TABLE IF NOT EXISTS `forfait` (
  `id_forfait` INT PRIMARY KEY,
  `id_tipo_forfait` INT,
  `Precio` INT,
  `Fecha_inicio` DATETIME,
  `Fecha_fin` DATETIME,
  `id_esquiador` INT,
  FOREIGN KEY (`id_tipo_forfait`) REFERENCES `tipo_forfait`(`id_tipo_forfait`),
  FOREIGN KEY (`id_esquiador`) REFERENCES `esquiador`(`id_esquiador`)
);

CREATE TABLE IF NOT EXISTS `sector` (
  `id_sector` INT PRIMARY KEY,
  `Nombre` VARCHAR(255),
  `Dificultad_media` VARCHAR(255),
  `Altitud` INT,
  `Extension_km` INT
);

CREATE TABLE IF NOT EXISTS `acceso` (
  `id_sector` INT,
  `id_forfait` INT,
  PRIMARY KEY (`id_sector`, `id_forfait`),
  FOREIGN KEY (`id_sector`) REFERENCES `sector`(`id_sector`),
  FOREIGN KEY (`id_forfait`) REFERENCES `forfait`(`id_forfait`)
);

CREATE TABLE IF NOT EXISTS `pista` (
  `id_pista` INT PRIMARY KEY,
  `Nombre` VARCHAR(255),
  `Dificultad` VARCHAR(255),
  `Extension_km` INT,
  `id_sector` INT,
  `Tipo_nieve` VARCHAR(255),
  FOREIGN KEY (`id_sector`) REFERENCES `sector`(`id_sector`)
);

CREATE TABLE IF NOT EXISTS `comunica` (
  `id_Pista_inicio` INT,
  `id_Pista_fin` INT,
  PRIMARY KEY (`id_Pista_inicio`, `id_Pista_fin`),
  FOREIGN KEY (`id_Pista_inicio`) REFERENCES `pista`(`id_pista`),
  FOREIGN KEY (`id_Pista_fin`) REFERENCES `pista`(`id_pista`)
);

CREATE TABLE IF NOT EXISTS `clase` (
  `id_clase` INT PRIMARY KEY,
  `Nombre` VARCHAR(255),
  `Fecha` DATETIME,
  `Hora` DATETIME,
  `Duracion` INT,
  `Nivel` VARCHAR(255),
  `id_esquiador` INT,
  FOREIGN KEY (`id_esquiador`) REFERENCES `profesor`(`id_esquiador`)
);

CREATE TABLE IF NOT EXISTS `alumno` (
  `id_esquiador` INT PRIMARY KEY,
  `Nivel_inicial` VARCHAR(255),
  `Fecha_inscripcion` DATETIME,
  `Grupo` VARCHAR(255),
  FOREIGN KEY (`id_esquiador`) REFERENCES `esquiador`(`id_esquiador`)
);

CREATE TABLE IF NOT EXISTS `asiste` (
  `id_esquiador` INT,
  `id_clase` INT,
  PRIMARY KEY (`id_esquiador`, `id_clase`),
  FOREIGN KEY (`id_esquiador`) REFERENCES `alumno`(`id_esquiador`),
  FOREIGN KEY (`id_clase`) REFERENCES `clase`(`id_clase`)
);

-- Tablas de Material
CREATE TABLE IF NOT EXISTS `material_tipo` (
  `Id` INT PRIMARY KEY,
  `Tipo_material` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `material_marcas` (
  `Id` INT PRIMARY KEY,
  `Nombre` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `material` (
  `id_material` INT PRIMARY KEY,
  `id_tipo` INT,
  `Talla` VARCHAR(255),
  `Id_Marca` INT,
  FOREIGN KEY (`id_tipo`) REFERENCES `material_tipo`(`Id`),
  FOREIGN KEY (`Id_Marca`) REFERENCES `material_marcas`(`Id`)
);

CREATE TABLE IF NOT EXISTS `alquiler` (
  `id_alquiler` INT PRIMARY KEY,
  `id_esquiador` INT,
  `id_material` INT,
  `Fecha_inicio` DATETIME,
  `Fecha_fin` DATETIME,
  FOREIGN KEY (`id_esquiador`) REFERENCES `esquiador`(`id_esquiador`),
  FOREIGN KEY (`id_material`) REFERENCES `material`(`id_material`)
);