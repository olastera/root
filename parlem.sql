-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-01-2023 a las 16:05:39
-- Versión del servidor: 10.5.15-MariaDB-0+deb11u1
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parlem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `docType` varchar(100) NOT NULL,
  `docNum` varchar(100) NOT NULL,
  `email` varchar(254) NOT NULL,
  `customerId` int(11) NOT NULL,
  `givenName` varchar(254) NOT NULL,
  `familyName1` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `datealta` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateMod` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id`, `docType`, `docNum`, `email`, `customerId`, `givenName`, `familyName1`, `phone`, `datealta`, `dateMod`) VALUES
(2, 'nif', '46626636r', 'oscar@iespai.com', 11112, 'oscar', 'Parlem', 653791226, '2023-01-10 12:04:12', '2023-01-10 12:04:12'),
(3, 'nif', '7615372163r', 'info@iespai.com', 11113, 'info_iespai.com', 'Parlem', 653791226, '2023-01-11 14:33:49', '2023-01-11 14:33:49'),
(4, 'nif', '7615372163r', 'info@iespai.com', 11113, 'info_iespai.com', 'Parlem', 653791226, '2023-01-11 14:35:02', '2023-01-11 14:35:02'),
(5, 'nif', '295236546r', 'info4@iespai.com', 11117, 'info4_iespai.com', 'Parlem', 24534534, '2023-01-11 14:35:02', '2023-01-11 14:35:02'),
(6, 'nif', '24534544r', 'info5@iespai.com', 11119, 'info5_iespai.com', 'telecosIespai', 2423434, '2023-01-11 14:35:02', '2023-01-11 14:35:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_producte`
--

CREATE TABLE `customer_producte` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_producte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producte`
--

CREATE TABLE `producte` (
  `id` int(11) NOT NULL,
  `productName` varchar(254) NOT NULL,
  `productTypeName` varchar(100) NOT NULL,
  `numeracioTerminal` int(11) NOT NULL,
  `soldAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producte`
--

INSERT INTO `producte` (`id`, `productName`, `productTypeName`, `numeracioTerminal`, `soldAt`, `customerId`) VALUES
(1, 'FIBRA 1000 ADAMO', 'ftth', 933933933, '2023-01-11 07:54:35', 11112);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer_producte`
--
ALTER TABLE `customer_producte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producte`
--
ALTER TABLE `producte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
