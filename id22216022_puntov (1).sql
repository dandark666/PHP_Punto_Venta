-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-07-2024 a las 23:08:23
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id22216022_puntov`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id22216022_rojo`@`%` PROCEDURE `InsertCategoria` (IN `p_clav` VARCHAR(255), IN `p_descrip` TEXT)   BEGIN
    INSERT INTO categoria (clav, descrip) VALUES (p_clav, p_descrip);
END$$

CREATE DEFINER=`id22216022_rojo`@`%` PROCEDURE `ObtenerCategorias` ()   BEGIN
    SELECT * FROM categoria;
END$$

CREATE DEFINER=`id22216022_rojo`@`%` PROCEDURE `ObtenerMarcas` ()   BEGIN
    SELECT * FROM marca;
END$$

CREATE DEFINER=`id22216022_rojo`@`%` PROCEDURE `ObtenerPresentaciones` ()   BEGIN
    SELECT * FROM presentacion;
END$$

CREATE DEFINER=`id22216022_rojo`@`%` PROCEDURE `ObtenerProductos` ()   BEGIN
    SELECT p.clvProd, p.nombreProd, p.descripcionProd, p.precioAct, p.stockMIn, p.stockMax, p.stockAct,
           pr.descripcionPres AS nombrePresentacion,
           m.descripcionmarca AS nombreMarca,
           c.descripcionCat AS nombreCategoria,
           p.estatus
    FROM producto p
    INNER JOIN presentacion pr ON p.idPresentacion = pr.idPresentacion
    INNER JOIN marca m ON p.idMarca = m.idMarca
    INNER JOIN categoria c ON p.idCategoria = c.idCategoria;
END$$

CREATE DEFINER=`id22216022_rojo`@`%` PROCEDURE `ObtenerUsuarios` ()   BEGIN
    SELECT u.idUsuario, u.Nombre, u.ApellidoP, u.ApellidoM, u.Usuario, u.Clave, r.rol AS nombreRol, u.estatus
    FROM usuario u
    INNER JOIN rol r ON u.idrol = r.idrol;
END$$

CREATE DEFINER=`id22216022_rojo`@`%` PROCEDURE `ObtenerVentas` ()   BEGIN
    SELECT v.folioVenta, v.fechaVenta, v.totalVenta, u.Nombre AS nombreUsuario
    FROM venta v
    INNER JOIN usuario u ON v.idusuario = u.idUsuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `descripcionCat` varchar(255) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `descripcionCat`, `estatus`) VALUES
(62, 'hsgtay', 1),
(123, 'sasas', 1),
(342, 'sal', 1),
(563, 'ba', 1),
(1312, 'CCCCC', 1),
(1650, 'coca de latita', 1),
(1892, 'bebida', 0),
(2321, 'as', 0),
(3030, 'Salu', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idComp` int(11) NOT NULL,
  `folioComp` varchar(15) NOT NULL,
  `fechaComp` date NOT NULL,
  `totalComp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `idDetComp` int(11) NOT NULL,
  `cantidadDc` int(11) NOT NULL,
  `precioComp` float NOT NULL,
  `idCompra` int(11) NOT NULL,
  `clvProd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `idDetVent` int(11) NOT NULL,
  `precioVent` float NOT NULL,
  `cantidadVent` int(11) NOT NULL,
  `folioVenta` varchar(25) NOT NULL,
  `clvProd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`idDetVent`, `precioVent`, `cantidadVent`, `folioVenta`, `clvProd`) VALUES
(4, 30, 2, '6652339f37d83', '67382'),
(17, 70, 2, '665757b7e9f6b', '1679'),
(22, 30, 1, '66575acad0f0d', '67382'),
(23, 30, 2, '66575b1c54d56', '67382'),
(24, 30, 2, '66575be03802a', '67382'),
(25, 70, 1, '66575be03802a', '1679'),
(26, 70, 2, '6657eedf1e38c', '1679'),
(27, 70, 1, '6659be4864e69', '1679'),
(28, 15, 1, '6659be4864e69', '23342'),
(29, 70, 2, '665c941a04843', '1679'),
(30, 70, 1, '665c945760c17', '1679'),
(31, 70, 7, '665fbb188fb07', '1679'),
(32, 70, 1, '6660c6521032b', '1679'),
(33, 30, 1, '6660c6d93751d', '67382'),
(34, 30, 1, '66635973979c9', '52'),
(35, 70, 3, '666870d390b2b', '1679'),
(36, 15, 1, '6668773147427', '23342'),
(37, 70, 1, '6668773147427', '1679'),
(38, 70, 1, '666b4b5a37942', '1679'),
(39, 50, 3, '667244525a17e', '6742'),
(40, 50, 2, '6672447697bb1', '6742'),
(41, 50, 5, '667244ea13c5a', '6742'),
(42, 20, 2, '6672dda1a5508', '5621'),
(43, 20, 2, '6672de8b19c95', '5621'),
(44, 15, 2, '6672de8b19c95', '168903'),
(45, 20, 45, '6672deb6eef0f', '5621');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `descripcionmarca` varchar(255) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `descripcionmarca`, `estatus`) VALUES
(1, 'cocacoloca', 1),
(2, 'Bimbo', 1),
(4, 'Nestle', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `idPresentacion` int(11) NOT NULL,
  `descripcionPres` varchar(255) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`idPresentacion`, `descripcionPres`, `estatus`) VALUES
(1, 'coca peque', 1),
(2, 'coca vidrio', 1),
(3, 'hsajhsj', 1),
(4, 'Ventia', 1),
(21, 'qwq', 1),
(221, 'DAWD', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `clvProd` varchar(18) NOT NULL,
  `nombreProd` varchar(50) NOT NULL,
  `descripcionProd` varchar(255) NOT NULL,
  `precioAct` float NOT NULL,
  `stockMIn` int(11) NOT NULL,
  `stockMax` int(11) NOT NULL,
  `stockAct` int(11) NOT NULL,
  `idPresentacion` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`clvProd`, `nombreProd`, `descripcionProd`, `precioAct`, `stockMIn`, `stockMax`, `stockAct`, `idPresentacion`, `idCategoria`, `idMarca`, `estatus`) VALUES
('1679', 'Condones A', 'grande', 70, 10, 100, 1, 1, 1892, 1, 1),
('168903', 'cocacola', 'cocacola clasica', 15, 10, 50, 26, 1, 1650, 1, 1),
('23342', 'Cocacola', 'Lata 450ml', 15, 10, 50, 18, 1, 1650, 1, 1),
('2354', 'Te', 'ice te', 20, 10, 30, 20, 4, 1650, 1, 0),
('321', 'papas', 'asa', 18, 10, 100, 10, 4, 342, 2, 1),
('52', 'KSAKS', 'ASLKAKS', 30, 30, 50, 9, 2, 1650, 1, 1),
('54', 'KSAKS', 'ASLKAKS', 30, 30, 50, 10, 2, 1650, 1, 1),
('543', 'addw', 'wadf', 21, 10, 50, 20, 2, 123, 2, 1),
('5621', 'whga', 'hwja', 20, 10, 100, 1, 1, 62, 1, 0),
('67382', 'coca de naranja', 'coca N', 30, 10, 30, 9, 1, 1892, 1, 1),
('6742', 'wjqk', 'jqjwqj', 50, 10, 100, 60, 1, 123, 2, 1),
('wqww', 'Efe', 'CocaCola Normal', 70, 10, 100, 50, 1, 1650, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(3) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estadoRol` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`, `descripcion`, `estadoRol`) VALUES
(1, 'admin', 'accesde a todo', '1'),
(2, 'cajero', 'acceso limitado', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `ApellidoP` varchar(50) NOT NULL,
  `ApellidoM` varchar(50) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Clave` varchar(40) NOT NULL,
  `idrol` int(3) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombre`, `ApellidoP`, `ApellidoM`, `Usuario`, `Clave`, `idrol`, `estatus`) VALUES
(3, 'Daniel', 'Rojo', 'Reyes', 'Rojo', '202cb962ac59075b964b07152d234b70', 1, 1),
(4, 'Juan Carlos', 'Santiago', 'Arce', 'juana    ', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, 1),
(5, 'Mauricio', 'Sanchez', 'Alvares', 'maulink  ', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, 0),
(6, 'luis', 'Santiago', 'Arce', 'luise', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `folioVenta` varchar(25) NOT NULL,
  `fechaVenta` date NOT NULL,
  `totalVenta` float NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`folioVenta`, `fechaVenta`, `totalVenta`, `idusuario`) VALUES
('6652339f37d83', '2024-05-25', 60, 3),
('665757b7e9f6b', '2024-05-29', 140, 3),
('66575acad0f0d', '2024-05-29', 30, 3),
('66575b1c54d56', '2024-05-29', 60, 4),
('66575be03802a', '2024-05-29', 130, 4),
('6657eedf1e38c', '2024-05-29', 140, 3),
('6659be4864e69', '2024-05-31', 85, 3),
('665c941a04843', '2024-06-02', 140, 3),
('665c945760c17', '2024-06-02', 70, 3),
('665fbb188fb07', '2024-06-05', 490, 3),
('6660c6521032b', '2024-06-05', 70, 3),
('6660c6d93751d', '2024-06-05', 30, 3),
('66635973979c9', '2024-06-07', 30, 3),
('666870d390b2b', '2024-06-11', 210, 3),
('6668773147427', '2024-06-11', 85, 3),
('666b4b5a37942', '2024-06-13', 70, 3),
('667244525a17e', '2024-06-19', 150, 3),
('6672447697bb1', '2024-06-19', 100, 3),
('667244ea13c5a', '2024-06-19', 250, 4),
('6672dda1a5508', '2024-06-19', 40, 3),
('6672de8b19c95', '2024-06-19', 70, 6),
('6672deb6eef0f', '2024-06-19', 900, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idComp`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`idDetComp`),
  ADD KEY `idCompra` (`idCompra`,`clvProd`),
  ADD KEY `clvProd` (`clvProd`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`idDetVent`),
  ADD KEY `folioVenta` (`folioVenta`,`clvProd`),
  ADD KEY `clvProd` (`clvProd`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`idPresentacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`clvProd`),
  ADD KEY `idPresentacion` (`idPresentacion`,`idCategoria`,`idMarca`),
  ADD KEY `idMarca` (`idMarca`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fkrol` (`idrol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`folioVenta`),
  ADD KEY `fkusers` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3031;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idComp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `idDetComp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `idDetVent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `idPresentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detalleCompra_ibfk_1` FOREIGN KEY (`clvProd`) REFERENCES `producto` (`clvProd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleCompra_ibfk_2` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`idComp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleVenta_ibfk_1` FOREIGN KEY (`folioVenta`) REFERENCES `venta` (`folioVenta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleVenta_ibfk_2` FOREIGN KEY (`clvProd`) REFERENCES `producto` (`clvProd`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idPresentacion`) REFERENCES `presentacion` (`idPresentacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fkrol` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fkusers` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
