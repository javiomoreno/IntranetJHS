-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2016 a las 18:02:02
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intranetjhsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `ArchivoID` int(11) NOT NULL,
  `ArchivoNombre` varchar(50) DEFAULT NULL,
  `ArchivoDescripcion` varchar(200) DEFAULT NULL,
  `ArchivoRuta` varchar(100) DEFAULT NULL,
  `ArchivoFechaReg` date DEFAULT NULL,
  `EmpresaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrador', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Administrador', 1, 'Administrador del Sistema', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `CargoID` int(11) NOT NULL,
  `CargoNombre` varchar(45) NOT NULL,
  `CargoDescripcion` varchar(45) DEFAULT NULL,
  `CargoFechaReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`CargoID`, `CargoNombre`, `CargoDescripcion`, `CargoFechaReg`) VALUES
(1, 'cargo 1', 'cargo 1', '2016-07-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `DepartamentoID` int(11) NOT NULL,
  `DepartamentoNombre` varchar(50) DEFAULT NULL,
  `DepartamentoDescripcion` varchar(200) DEFAULT NULL,
  `DepartamentoFechaReg` date DEFAULT NULL,
  `EmpresaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`DepartamentoID`, `DepartamentoNombre`, `DepartamentoDescripcion`, `DepartamentoFechaReg`, `EmpresaID`) VALUES
(2, 'recursos humanos', 'RRHH', '2016-07-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `EmpresaID` int(11) NOT NULL,
  `EmpresaNombre` varchar(50) NOT NULL,
  `EmpresaDescripcion` varchar(100) DEFAULT NULL,
  `EmpresaFechaReg` date NOT NULL,
  `EmpresaRIF` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`EmpresaID`, `EmpresaNombre`, `EmpresaDescripcion`, `EmpresaFechaReg`, `EmpresaRIF`) VALUES
(1, 'Empresa 1', 'Empresa 1', '2016-07-04', 'j-123456-4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1467681210),
('m140506_102106_rbac_init', 1467681215);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `ParametroID` int(11) NOT NULL,
  `ParametroCodigo` varchar(10) DEFAULT NULL,
  `ParametroDescripcion` varchar(100) DEFAULT NULL,
  `ParametroValorAuxiliar` varchar(20) DEFAULT NULL,
  `ParametroAsignaciones` double DEFAULT NULL,
  `ParametroDeducciones` double DEFAULT NULL,
  `ParametroNetoaCobrar` double DEFAULT NULL,
  `ParametroFechaReg` date NOT NULL,
  `ReciboID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametroempresa`
--

CREATE TABLE `parametroempresa` (
  `ParametroID` int(11) NOT NULL,
  `ParametroNombre` varchar(20) DEFAULT NULL,
  `ParametroValor` varchar(1000) DEFAULT NULL,
  `ParametroFechaReg` date DEFAULT NULL,
  `EmpresaID` int(11) DEFAULT NULL,
  `Departamento_DepartamentoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parametroempresa`
--

INSERT INTO `parametroempresa` (`ParametroID`, `ParametroNombre`, `ParametroValor`, `ParametroFechaReg`, `EmpresaID`, `Departamento_DepartamentoID`) VALUES
(2, 'vision', 'visionar', '2016-07-14', 1, NULL),
(3, 'mision', 'misionar', '2016-07-14', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `ReciboID` int(11) NOT NULL,
  `ReciboFechaInicio` date DEFAULT NULL,
  `ReciboFechaFin` date DEFAULT NULL,
  `ReciboNumero` int(11) DEFAULT NULL,
  `Recibocol` varchar(45) DEFAULT NULL,
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `RolID` int(11) NOT NULL,
  `RolNombre` varchar(40) NOT NULL,
  `RolDescripcion` varchar(100) DEFAULT NULL,
  `RolFechaReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`RolID`, `RolNombre`, `RolDescripcion`, `RolFechaReg`) VALUES
(1, 'Administrador', 'Usuario Administrador', '2016-07-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `UsuarioID` int(11) NOT NULL,
  `UsuarioNombre` varchar(100) NOT NULL,
  `UsuarioApellido` varchar(100) NOT NULL,
  `UsuarrioCedula` varchar(20) NOT NULL,
  `UsuarioCorreo` varchar(100) NOT NULL,
  `UsuarioClave` varchar(100) NOT NULL,
  `UsuarioFechaNac` date DEFAULT NULL,
  `UsuarioFechaIng` date NOT NULL,
  `UsuarioBanco` varchar(50) NOT NULL,
  `UsuarioCuentaBanco` varchar(100) DEFAULT NULL,
  `UsuarioFechaReg` date NOT NULL,
  `RolID` int(11) NOT NULL,
  `EmpresaID` int(11) NOT NULL,
  `CargoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`UsuarioID`, `UsuarioNombre`, `UsuarioApellido`, `UsuarrioCedula`, `UsuarioCorreo`, `UsuarioClave`, `UsuarioFechaNac`, `UsuarioFechaIng`, `UsuarioBanco`, `UsuarioCuentaBanco`, `UsuarioFechaReg`, `RolID`, `EmpresaID`, `CargoID`) VALUES
(1, 'Administrador', 'Administrador', '123456', 'admin@gmail.com', 'MTIzNDU2', NULL, '2016-07-04', 'admin', '', '2016-07-04', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`ArchivoID`),
  ADD KEY `fk_Archivo_Empresa1_idx` (`EmpresaID`);

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`CargoID`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`DepartamentoID`),
  ADD KEY `fk_Departamento_Empresa1_idx` (`EmpresaID`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`EmpresaID`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`ParametroID`),
  ADD KEY `fk_Parametro_Recibo1_idx` (`ReciboID`);

--
-- Indices de la tabla `parametroempresa`
--
ALTER TABLE `parametroempresa`
  ADD PRIMARY KEY (`ParametroID`),
  ADD KEY `fk_Parametro_Empresa1_idx` (`EmpresaID`),
  ADD KEY `fk_Parametro_Departamento1_idx` (`Departamento_DepartamentoID`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`ReciboID`),
  ADD KEY `fk_Recibo_Usuario1_idx` (`UsuarioID`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`RolID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`UsuarioID`),
  ADD UNIQUE KEY `UsuarrioCedula_UNIQUE` (`UsuarrioCedula`),
  ADD UNIQUE KEY `UsuarioCorreo_UNIQUE` (`UsuarioCorreo`),
  ADD KEY `fk_Usuario_Rol_idx` (`RolID`),
  ADD KEY `fk_Usuario_Empresa1_idx` (`EmpresaID`),
  ADD KEY `fk_Usuario_Cargo1_idx` (`CargoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `DepartamentoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `parametroempresa`
--
ALTER TABLE `parametroempresa`
  MODIFY `ParametroID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `fk_Archivo_Empresa1` FOREIGN KEY (`EmpresaID`) REFERENCES `empresa` (`EmpresaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_Departamento_Empresa1` FOREIGN KEY (`EmpresaID`) REFERENCES `empresa` (`EmpresaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD CONSTRAINT `fk_Parametro_Recibo1` FOREIGN KEY (`ReciboID`) REFERENCES `recibo` (`ReciboID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parametroempresa`
--
ALTER TABLE `parametroempresa`
  ADD CONSTRAINT `fk_Parametro_Departamento1` FOREIGN KEY (`Departamento_DepartamentoID`) REFERENCES `departamento` (`DepartamentoID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Parametro_Empresa1` FOREIGN KEY (`EmpresaID`) REFERENCES `empresa` (`EmpresaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `fk_Recibo_Usuario1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`UsuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Cargo1` FOREIGN KEY (`CargoID`) REFERENCES `cargo` (`CargoID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Empresa1` FOREIGN KEY (`EmpresaID`) REFERENCES `empresa` (`EmpresaID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`RolID`) REFERENCES `rol` (`RolID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
