-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2024 a las 01:28:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemagestorproyectos`
--
CREATE SCHEMA if not exists `sistemagestorproyectos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivosadjuntos`
--

CREATE TABLE `archivosadjuntos` (
  `ArchivoID` int(11) NOT NULL,
  `NombreArchivo` varchar(255) DEFAULT NULL,
  `RutaArchivo` varchar(255) DEFAULT NULL,
  `TareaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivotarearelacion`
--

CREATE TABLE `archivotarearelacion` (
  `ArchivoID` int(11) DEFAULT NULL,
  `TareaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `AsignacionID` int(11) NOT NULL,
  `TareaID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ComentarioID` int(11) NOT NULL,
  `Contenido` text DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `TareaID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariotarearelacion`
--

CREATE TABLE `comentariotarearelacion` (
  `ComentarioID` int(11) DEFAULT NULL,
  `TareaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialtareas`
--

CREATE TABLE `historialtareas` (
  `HistorialID` int(11) NOT NULL,
  `TareaID` int(11) DEFAULT NULL,
  `EstadoAnterior` varchar(255) DEFAULT NULL,
  `EstadoNuevo` varchar(255) DEFAULT NULL,
  `FechaCambio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `NotificacionID` int(11) NOT NULL,
  `Contenido` text DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `ProyectoID` int(11) NOT NULL,
  `NombreProyecto` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFinalizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectotarearelacion`
--

CREATE TABLE `proyectotarearelacion` (
  `ProyectoID` int(11) DEFAULT NULL,
  `TareaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectousuariorelacion`
--

CREATE TABLE `proyectousuariorelacion` (
  `ProyectoID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `RolID` int(11) NOT NULL,
  `Nombre_Rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roltarearelacion`
--

CREATE TABLE `roltarearelacion` (
  `RolID` int(11) DEFAULT NULL,
  `TareaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusuariorelacion`
--

CREATE TABLE `rolusuariorelacion` (
  `RolID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE `seguidores` (
  `SeguidorID` int(11) NOT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `ProyectoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `TareaID` int(11) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `FechaVencimiento` date DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `AsignadoA` int(11) DEFAULT NULL,
  `Creador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UserID` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `CorreoElectronico` varchar(255) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `RolID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivosadjuntos`
--
ALTER TABLE `archivosadjuntos`
  ADD PRIMARY KEY (`ArchivoID`),
  ADD KEY `TareaID` (`TareaID`);

--
-- Indices de la tabla `archivotarearelacion`
--
ALTER TABLE `archivotarearelacion`
  ADD KEY `ArchivoID` (`ArchivoID`),
  ADD KEY `TareaID` (`TareaID`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`AsignacionID`),
  ADD KEY `TareaID` (`TareaID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ComentarioID`),
  ADD KEY `TareaID` (`TareaID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `comentariotarearelacion`
--
ALTER TABLE `comentariotarearelacion`
  ADD KEY `ComentarioID` (`ComentarioID`),
  ADD KEY `TareaID` (`TareaID`);

--
-- Indices de la tabla `historialtareas`
--
ALTER TABLE `historialtareas`
  ADD PRIMARY KEY (`HistorialID`),
  ADD KEY `TareaID` (`TareaID`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`NotificacionID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`ProyectoID`);

--
-- Indices de la tabla `proyectotarearelacion`
--
ALTER TABLE `proyectotarearelacion`
  ADD KEY `ProyectoID` (`ProyectoID`),
  ADD KEY `TareaID` (`TareaID`);

--
-- Indices de la tabla `proyectousuariorelacion`
--
ALTER TABLE `proyectousuariorelacion`
  ADD KEY `ProyectoID` (`ProyectoID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RolID`);

--
-- Indices de la tabla `roltarearelacion`
--
ALTER TABLE `roltarearelacion`
  ADD KEY `RolID` (`RolID`),
  ADD KEY `TareaID` (`TareaID`);

--
-- Indices de la tabla `rolusuariorelacion`
--
ALTER TABLE `rolusuariorelacion`
  ADD KEY `RolID` (`RolID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`SeguidorID`),
  ADD KEY `UsuarioID` (`UsuarioID`),
  ADD KEY `ProyectoID` (`ProyectoID`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`TareaID`),
  ADD KEY `AsignadoA` (`AsignadoA`),
  ADD KEY `Creador` (`Creador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RolID` (`RolID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivosadjuntos`
--
ALTER TABLE `archivosadjuntos`
  MODIFY `ArchivoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `AsignacionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ComentarioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialtareas`
--
ALTER TABLE `historialtareas`
  MODIFY `HistorialID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `NotificacionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `ProyectoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `RolID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `SeguidorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `TareaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivosadjuntos`
--
ALTER TABLE `archivosadjuntos`
  ADD CONSTRAINT `archivosadjuntos_ibfk_1` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`);

--
-- Filtros para la tabla `archivotarearelacion`
--
ALTER TABLE `archivotarearelacion`
  ADD CONSTRAINT `archivotarearelacion_ibfk_1` FOREIGN KEY (`ArchivoID`) REFERENCES `archivosadjuntos` (`ArchivoID`),
  ADD CONSTRAINT `archivotarearelacion_ibfk_2` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`);

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UserID`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UserID`);

--
-- Filtros para la tabla `comentariotarearelacion`
--
ALTER TABLE `comentariotarearelacion`
  ADD CONSTRAINT `comentariotarearelacion_ibfk_1` FOREIGN KEY (`ComentarioID`) REFERENCES `comentarios` (`ComentarioID`),
  ADD CONSTRAINT `comentariotarearelacion_ibfk_2` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`);

--
-- Filtros para la tabla `historialtareas`
--
ALTER TABLE `historialtareas`
  ADD CONSTRAINT `historialtareas_ibfk_1` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UserID`);

--
-- Filtros para la tabla `proyectotarearelacion`
--
ALTER TABLE `proyectotarearelacion`
  ADD CONSTRAINT `proyectotarearelacion_ibfk_1` FOREIGN KEY (`ProyectoID`) REFERENCES `proyectos` (`ProyectoID`),
  ADD CONSTRAINT `proyectotarearelacion_ibfk_2` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`);

--
-- Filtros para la tabla `proyectousuariorelacion`
--
ALTER TABLE `proyectousuariorelacion`
  ADD CONSTRAINT `proyectousuariorelacion_ibfk_1` FOREIGN KEY (`ProyectoID`) REFERENCES `proyectos` (`ProyectoID`),
  ADD CONSTRAINT `proyectousuariorelacion_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UserID`);

--
-- Filtros para la tabla `roltarearelacion`
--
ALTER TABLE `roltarearelacion`
  ADD CONSTRAINT `roltarearelacion_ibfk_1` FOREIGN KEY (`RolID`) REFERENCES `roles` (`RolID`),
  ADD CONSTRAINT `roltarearelacion_ibfk_2` FOREIGN KEY (`TareaID`) REFERENCES `tareas` (`TareaID`);

--
-- Filtros para la tabla `rolusuariorelacion`
--
ALTER TABLE `rolusuariorelacion`
  ADD CONSTRAINT `rolusuariorelacion_ibfk_1` FOREIGN KEY (`RolID`) REFERENCES `roles` (`RolID`),
  ADD CONSTRAINT `rolusuariorelacion_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UserID`);

--
-- Filtros para la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UserID`),
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`ProyectoID`) REFERENCES `proyectos` (`ProyectoID`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`AsignadoA`) REFERENCES `usuarios` (`UserID`),
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`Creador`) REFERENCES `usuarios` (`UserID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`RolID`) REFERENCES `roles` (`RolID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
