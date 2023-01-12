-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2022 a las 19:32:40
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tablas_just`
--
CREATE DATABASE IF NOT EXISTS `tablas_just` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tablas_just`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablas_perfiles_hea`
--

CREATE TABLE `tablas_perfiles_hea` (
  `Id` int(4) NOT NULL,
  `Perfil` varchar(10) COLLATE utf8_bin NOT NULL,
  `Alto` int(3) NOT NULL,
  `Ancho` int(3) NOT NULL,
  `Cm2` decimal(4,1) NOT NULL,
  `Kg/m` decimal(4,1) NOT NULL,
  `Ix_cm4` int(6) NOT NULL,
  `Sx_cm3` int(5) NOT NULL,
  `Rx_cm` decimal(4,2) NOT NULL,
  `Iy_cm4` int(5) NOT NULL,
  `Sy_cm3` decimal(4,1) NOT NULL,
  `Ry_cm` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tablas_perfiles_hea`
--

INSERT INTO `tablas_perfiles_hea` (`Id`, `Perfil`, `Alto`, `Ancho`, `Cm2`, `Kg/m`, `Ix_cm4`, `Sx_cm3`, `Rx_cm`, `Iy_cm4`, `Sy_cm3`, `Ry_cm`) VALUES
(1, 'HEA - 100', 96, 100, '21.2', '16.7', 349, 73, '4.05', 134, '26.7', '2.51'),
(2, 'HEA - 120', 114, 120, '25.3', '19.9', 606, 106, '4.89', 231, '38.4', '3.02'),
(3, 'HEA - 140', 133, 140, '31.4', '27.7', 1030, 155, '5.73', 389, '55.6', '3.52'),
(4, 'HEA - 160', 152, 160, '38.8', '30.4', 1670, 220, '6.57', 615, '76.9', '3.98'),
(5, 'HEA - 180', 171, 180, '45.3', '35.5', 2510, 294, '7.45', 924, '103.0', '4.52'),
(6, 'HEA - 200', 190, 200, '53.8', '42.3', 3690, 389, '8.28', 1330, '133.0', '4.98'),
(7, 'HEA - 220', 210, 220, '64.3', '50.5', 5410, 515, '9.17', 1950, '178.0', '5.51'),
(8, 'HEA - 240', 230, 240, '76.8', '60.3', 7760, 675, '10.10', 2770, '231.0', '6.00'),
(9, 'HEA - 260', 250, 260, '86.8', '68.2', 10500, 836, '11.00', 3660, '282.0', '6.50'),
(10, 'HEA - 280', 270, 280, '97.3', '76.4', 13700, 1010, '11.90', 4760, '340.0', '7.00'),
(11, 'HEA - 300', 290, 300, '113.0', '88.3', 18300, 1260, '12.70', 6310, '420.0', '7.49'),
(12, 'HEA - 320', 310, 300, '124.0', '97.6', 22900, 1480, '13.60', 6980, '465.0', '7.49'),
(13, 'HEA - 340', 330, 300, '133.0', '105.0', 27700, 1680, '14.40', 7430, '495.0', '7.46'),
(14, 'HEA - 360', 350, 300, '143.0', '112.0', 33100, 1890, '15.20', 7880, '525.0', '7.43'),
(15, 'HEA - 400', 390, 300, '159.0', '125.0', 45100, 2310, '16.80', 8560, '571.0', '7.34'),
(16, 'HEA - 450', 440, 300, '178.0', '140.0', 63700, 2900, '18.90', 9460, '631.0', '7.29'),
(17, 'HEA - 500', 490, 300, '198.0', '155.0', 87000, 3550, '21.00', 10400, '691.0', '7.24'),
(18, 'HEA - 550', 540, 300, '212.0', '166.0', 112000, 4150, '23.00', 10800, '721.0', '7.15'),
(19, 'HEA - 600', 590, 300, '226.0', '178.0', 141000, 4790, '25.00', 11300, '751.0', '7.05'),
(20, 'HEA - 650', 640, 300, '242.0', '190.0', 175000, 5470, '26.90', 11700, '781.0', '6.96'),
(21, 'HEA - 700', 690, 300, '260.0', '204.0', 215000, 6240, '28.70', 12200, '812.0', '6.84'),
(22, 'HEA - 800', 790, 300, '286.0', '224.0', 303000, 7680, '32.60', 12600, '842.0', '6.65'),
(23, 'HEA - 900', 890, 300, '321.0', '252.0', 422000, 9480, '36.30', 13500, '903.0', '6.50'),
(24, 'HEA - 1000', 990, 300, '347.0', '272.0', 554000, 11200, '40.00', 14000, '933.0', '6.35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablas_perfiles_ipe`
--

CREATE TABLE `tablas_perfiles_ipe` (
  `Id` int(11) NOT NULL,
  `Perfil` varchar(9) DEFAULT NULL,
  `Alto` int(3) DEFAULT NULL,
  `Ancho` int(3) DEFAULT NULL,
  `cm2` decimal(5,2) DEFAULT NULL,
  `Kg/m` decimal(4,1) DEFAULT NULL,
  `Ix_cm4` int(5) DEFAULT NULL,
  `Sx_cm3` int(4) DEFAULT NULL,
  `Rx_cm` decimal(4,2) DEFAULT NULL,
  `Iy_cm4` decimal(6,2) DEFAULT NULL,
  `Sy_cm3` decimal(5,2) DEFAULT NULL,
  `Ry_cm` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablas_perfiles_ipe`
--

INSERT INTO `tablas_perfiles_ipe` (`Id`, `Perfil`, `Alto`, `Ancho`, `cm2`, `Kg/m`, `Ix_cm4`, `Sx_cm3`, `Rx_cm`, `Iy_cm4`, `Sy_cm3`, `Ry_cm`) VALUES
(1, 'IPE - 80', 80, 46, '7.64', '6.0', 80, 20, '3.24', '8.48', '3.69', '1.05'),
(2, 'IPE - 100', 100, 55, '10.30', '8.1', 171, 34, '4.07', '15.90', '5.78', '1.24'),
(3, 'IPE - 120', 120, 64, '13.20', '10.4', 318, 53, '4.90', '27.60', '8.64', '1.45'),
(4, 'IPE - 140', 140, 73, '16.40', '12.9', 541, 77, '5.74', '44.90', '12.30', '1.65'),
(5, 'IPE - 160', 160, 82, '20.10', '15.8', 869, 109, '6.58', '68.20', '16.60', '1.84'),
(6, 'IPE - 180', 180, 91, '23.90', '18.8', 1320, 146, '7.42', '101.00', '22.10', '2.05'),
(7, 'IPE - 200', 200, 100, '28.50', '22.4', 1940, 194, '8.26', '142.00', '28.40', '2.23'),
(8, 'IPE - 220', 220, 110, '33.40', '26.2', 2770, 252, '9.11', '205.00', '37.20', '2.48'),
(9, 'IPE - 240', 240, 120, '39.10', '30.7', 3890, 324, '9.97', '283.00', '47.20', '2.69'),
(10, 'IPE - 270', 270, 135, '45.90', '36.1', 5790, 429, '11.20', '419.00', '62.10', '3.02'),
(11, 'IPE - 300', 300, 150, '53.80', '42.2', 8360, 557, '12.50', '603.00', '80.40', '3.35'),
(12, 'IPE - 330', 330, 160, '62.60', '49.1', 11800, 713, '13.70', '787.00', '98.40', '3.55'),
(13, 'IPE - 360', 360, 170, '72.70', '57.1', 16300, 904, '15.00', '1040.00', '123.00', '3.79'),
(14, 'IPE - 400', 400, 180, '84.50', '66.3', 23100, 1160, '16.50', '1320.00', '146.00', '3.95'),
(15, 'IPE - 450', 450, 190, '98.80', '77.6', 33700, 1500, '18.50', '1670.00', '176.00', '4.12'),
(16, 'IPE - 500', 500, 200, '116.00', '90.7', 48200, 1930, '20.40', '2140.00', '214.00', '4.30'),
(17, 'IPE - 550', 550, 210, '134.00', '106.0', 67100, 2440, '22.30', '2660.00', '254.00', '4.45'),
(18, 'IPE - 600', 600, 220, '156.00', '122.0', 92100, 3070, '24.30', '3380.00', '308.00', '4.66');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_k1_k2`
--

CREATE TABLE `tabla_k1_k2` (
  `Id` int(4) NOT NULL,
  `a/M` decimal(3,2) DEFAULT NULL,
  `K1` decimal(3,1) DEFAULT NULL,
  `K2` decimal(4,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_k1_k2`
--

INSERT INTO `tabla_k1_k2` (`Id`, `a/M`, `K1`, `K2`) VALUES
(1, '0.01', '83.0', '115.0'),
(2, '0.02', '83.0', '115.0'),
(3, '0.03', '83.0', '115.0'),
(4, '0.04', '83.0', '114.8'),
(5, '0.05', '83.0', '114.5'),
(6, '0.06', '83.0', '114.0'),
(7, '0.07', '83.0', '114.0'),
(8, '0.08', '83.0', '113.8'),
(9, '0.09', '82.8', '113.5'),
(10, '0.10', '82.5', '113.0'),
(11, '0.11', '82.2', '112.8'),
(12, '0.12', '82.8', '112.4'),
(13, '0.13', '81.8', '111.8'),
(14, '0.14', '81.2', '111.5'),
(15, '0.15', '80.8', '110.8'),
(16, '0.16', '80.5', '110.2'),
(17, '0.17', '80.0', '109.8'),
(18, '0.18', '79.5', '109.0'),
(19, '0.19', '79.0', '108.5'),
(20, '0.20', '78.5', '107.8'),
(21, '0.21', '77.8', '107.0'),
(22, '0.22', '77.5', '106.0'),
(23, '0.23', '76.8', '105.5'),
(24, '0.24', '76.0', '104.6'),
(25, '0.25', '75.5', '103.8'),
(26, '0.26', '74.8', '103.0'),
(27, '0.27', '74.0', '102.0'),
(28, '0.28', '73.5', '101.0'),
(29, '0.29', '72.5', '100.5'),
(30, '0.30', '71.3', '99.6'),
(31, '0.31', '70.8', '98.6'),
(32, '0.32', '70.0', '97.6'),
(33, '0.33', '69.2', '96.6'),
(34, '0.34', '68.5', '95.6'),
(35, '0.35', '67.5', '94.5'),
(36, '0.36', '67.0', '93.5'),
(37, '0.37', '66.0', '92.0'),
(38, '0.38', '65.0', '91.0'),
(39, '0.39', '64.0', '90.0'),
(40, '0.40', '63.0', '89.0'),
(41, '0.41', '62.0', '88.0'),
(42, '0.42', '61.0', '86.0'),
(43, '0.43', '60.0', '85.0'),
(44, '0.44', '59.0', '84.0'),
(45, '0.45', '58.0', '83.0'),
(46, '0.46', '57.0', '81.0'),
(47, '0.47', '56.0', '80.0'),
(48, '0.48', '55.0', '79.0'),
(49, '0.49', '54.0', '77.0'),
(50, '0.50', '53.0', '76.0'),
(51, '0.51', '51.5', '74.0'),
(52, '0.52', '50.5', '73.0'),
(53, '0.53', '49.5', '71.0'),
(54, '0.54', '48.0', '70.0'),
(55, '0.55', '47.0', '69.0'),
(56, '0.56', '46.0', '67.5'),
(57, '0.57', '45.0', '66.0'),
(58, '0.58', '44.0', '64.5'),
(59, '0.59', '42.5', '63.0'),
(60, '0.60', '41.5', '61.5'),
(61, '0.61', '40.5', '60.0'),
(62, '0.62', '39.5', '58.5'),
(63, '0.63', '38.0', '57.0'),
(64, '0.64', '37.0', '55.5'),
(65, '0.65', '36.0', '54.0'),
(66, '0.66', '35.0', '53.5'),
(67, '0.67', '34.0', '51.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `to_calculos`
--

CREATE TABLE `to_calculos` (
  `id` int(11) NOT NULL,
  `id_thesaurus` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `valoresEntrada` text,
  `valoresSalida` text,
  `id_calculoPadre` int(11) DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cod` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `to_calculos`
--

INSERT INTO `to_calculos` (`id`, `id_thesaurus`, `id_proyecto`, `valoresEntrada`, `valoresSalida`, `id_calculoPadre`, `date`, `cod`) VALUES
(1, 31656, 2, '{\"Esp_1\":\"1.2\",\"Esp_2\":\"1.2\",\"Esp_3\":\"1.2\",\"A\":\"2\",\"Long_Pte\":\"1000\",\"X_1\":\"2\",\"Flecha_X\":\"1000\",\"Flecha_Y\":\"1000\",\"Pes_Poli\":\"4000\",\"Carga_Nom\":\"15\",\"Ix_Iy\":\"5000\",\"Ancho_Test\":\"30\",\"Ap_VC_a_PG\":\"Apoyada\",\"Cam_Rod\":\"40x30\",\"P_Test\":\"1500\",\"P_E_Elect\":\"500\",\"id_proyecto\":\"2\"}', '{\"Esp_1\":\"1.2\",\"Esp_2\":\"1.2\",\"Esp_3\":\"1.2\",\"A\":\"2\",\"Long_Pte\":\"1000\",\"X_1\":\"2\",\"Flecha_X\":\"1000\",\"Flecha_Y\":\"1000\",\"Pes_Poli\":\"4000\",\"Carga_Nom\":\"15\",\"Ix_Iy\":\"5000\",\"Ancho_Test\":\"30\",\"Ap_VC_a_PG\":\"Apoyada\",\"Cam_Rod\":\"40x30\",\"P_Test\":\"1500\",\"P_E_Elect\":\"500\",\"id_proyecto\":\"2\",\"X_X\":211,\"Y_Y\":20,\"Carga_viga\":4015,\"Iyv\":4774071.279999999,\"Iyn\":4770958.08531746,\"Ixv\":117119.74399999999,\"Ixn\":95419.1617063492,\"Long_viga_caj\":1030,\"Q\":8965.2024,\"d\":0,\"Fx_Real\":1227.4237365492054,\"Fx_Real_Cm\":0.8147145685901535,\"Fx_pp_cm\":0.38668288653199107,\"Fx_pp\":2586.0984150827376,\"Fx_carg\":2940.3910822415933,\"Fx_carg_cm\":0.3400908151434246,\"\\u03c3x_Peso\":95.98723166608015,\"\\u03c3x_Carga\":107.1662465382438,\"\\u03c3x_Tot\":203.15347820432396,\"Radio_contraflecha\":323262.4952267854,\"Fy_Real\":1000.6525302940976,\"Fy_Real_Cm\":0.9993478952240238,\"Fy_pp_cm\":0.5821845678433191,\"Fy_pp\":1717.6683396203075,\"Fy_carg_cm\":0.4171633273807049,\"Fy_carg\":2397.142640219178,\"\\u03c3y_Peso\":3.3272112665230256,\"\\u03c3y_Carga\":3.714710140963794,\"\\u03c3y_Tot\":7.04192140748682,\"Kg\\/m_Cam_Rod\":9.6,\"Peso_Cam_Rod\":192,\"Ancho_chapa\":207,\"Alto_chapa\":22.4,\"P_chapa\":21.839328,\"T_P_chapa\":87.357312,\"Num_cost\":8,\"dist_1a_cost\":20,\"dist_entre_cost\":180,\"Ancho_cost\":204.6,\"Alto_cost\":19,\"Peso_cost\":18.309654000000002,\"Tot_cost\":16,\"Peso_tot_cost\":292.95446400000003,\"P_Tot\":9345.514176}', 0, '2022-11-07 10:49:13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `to_proyectos`
--

CREATE TABLE `to_proyectos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_thesaurus` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `date_ini` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datos` longtext,
  `cod` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `to_proyectos`
--

INSERT INTO `to_proyectos` (`id`, `id_usuario`, `id_thesaurus`, `nombre`, `descripcion`, `date_ini`, `date_mod`, `datos`, `cod`) VALUES
(8, 3, 31643, 'Insertar proyecto', '<p>Insertar proyectoInsertar proyectoInsertar proyectoInsertar proyectoInsertar proyecto</p>', '2022-10-28 10:03:00', '2022-10-28 10:03:00', 'LhIHkfv0xjuenlR0L3/9DqQx5nR7p2qyUK0PKe7gA3WqlEZpjwWDuWPBQdFPGGGpE0tAIWVpDYI4csEzN5+Tt+3xb0LT5lbiw8bjNfKDJjmjBwapkdFfsKAw31/Ou8GtV2qKMsM74JFRlCx3Nax3Nvl6zq9bigjxmj3ZPLGNk72KtVCJGTbdRDAlzScMhTJrcjUk78b4fbAXFyra4se92g==', 1),
(11, 2, 31643, 'prueba 1', '<p>ddasdas</p>', '2022-10-31 07:13:50', '2022-10-31 07:24:15', 'AyQt51ZwTe6NMgHSRlXTlj219RodH2NT/RT9LP6Og53ghToXrXQJxTBGINmYkVAyWuGApd27HVNUmQi3yKQcxir95UxQOZE+7uQvrdUA71E=', 1),
(12, 2, 31643, 'prueba 2 ', '<p>prueba 2 prueba 2 prueba 2 prueba 2&nbsp;</p>', '2022-10-31 07:25:14', '2022-10-31 07:25:14', 'OlsxbcAs59VRJJH8K9Kc0Ur55EkFDC9m2ccyIgxRDGzzJ4Vzxc6mS7ChvHsq5lJcmfROY6V7XZNcqwHsqRr7yr42xBVrWhTrMckQA1r422AHBjfGuz0Onaf5CFzKnJKe0KXwdBE9p1a37WhpCuvkCkzvwrkkDT0PUY7m2b+PhZoWWUSeJHhhEFkNRRb4NtfWcTCiB4T5rmm3vGNil6qN+A==', 1),
(13, 2, 31643, 'prueba 3', '<p>prueba 3prueba 3prueba 3prueba 3prueba 3prueba 3prueba 3</p>', '2022-10-31 07:26:08', '2022-10-31 07:26:08', 'OlsxbcAs59VRJJH8K9Kc0Ur55EkFDC9m2ccyIgxRDGzzJ4Vzxc6mS7ChvHsq5lJcmfROY6V7XZNcqwHsqRr7yr42xBVrWhTrMckQA1r422AHBjfGuz0Onaf5CFzKnJKe0KXwdBE9p1a37WhpCuvkCkzvwrkkDT0PUY7m2b+PhZoWWUSeJHhhEFkNRRb4NtfWcTCiB4T5rmm3vGNil6qN+A==', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `to_thesaurus`
--

CREATE TABLE `to_thesaurus` (
  `id` int(11) NOT NULL,
  `idpadre` int(11) DEFAULT NULL,
  `id_idioma` int(11) DEFAULT NULL,
  `texto` varchar(1024) DEFAULT NULL,
  `slug` varchar(1024) DEFAULT NULL,
  `descripcion` text,
  `etiquetas` text,
  `clavearborea` text,
  `cod` int(11) DEFAULT '1',
  `orden` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `to_thesaurus`
--

INSERT INTO `to_thesaurus` (`id`, `idpadre`, `id_idioma`, `texto`, `slug`, `descripcion`, `etiquetas`, `clavearborea`, `cod`, `orden`) VALUES
(31640, 0, NULL, 'Opciones', NULL, '', '', '0000', 1, 0),
(31641, 0, NULL, 'Calculos', NULL, '', '', '0001', 1, 1),
(31642, 0, NULL, 'tipo de proyectos', NULL, '', '', '0002', 1, 1),
(31643, 31642, NULL, 'Calculo Puente Grua', 'calculo-puente-grua', '', '', '0002000', 1, 1),
(31644, 0, NULL, 'Selects', 'selects', '', '', '0003', 1, 0),
(31645, 31644, NULL, 'Unión de Viga Cajón al puente grua', 'union-de-viga-cajon-al-puente-grua', '', '', '0003000', 1, 1),
(31646, 31645, NULL, 'Nivel Testero', 'nivel-testero', '', '', '0003000000', 1, 4),
(31647, 31645, NULL, 'Pata Interior', 'pata-interior', '', '', '0003000001', 1, 2),
(31648, 31645, NULL, 'Pata exterior', 'pata-exterior', '', '', '0003000002', 1, 3),
(31649, 31644, NULL, 'Camino de rodadura', 'camino-de-rodadura', '', '', '0003001', 1, 2),
(31650, 31649, NULL, '40x30', '40x30', '', '', '0003001000', 1, 1),
(31651, 31649, NULL, '40x40', '40x40', '', '', '0003001001', 1, 2),
(31652, 31649, NULL, '50x30', '50x30', '', '', '0003001002', 1, 3),
(31653, 31649, NULL, '50x50', '50x50', '', '', '0003001003', 1, 4),
(31654, 31645, NULL, 'Apoyada', 'apoyada', '', '', '0003000003', 1, 1),
(31655, 0, NULL, 'Tipos de Calculo', 'tipos-de-calculo', '', '', '0004', 1, 1),
(31656, 31655, NULL, 'Calculo Puente Grua', 'calculo-puente-grua', '', '', '0004000', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(10) DEFAULT 'user',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `visible` int(11) DEFAULT '1',
  `revistas` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `visible`, `revistas`) VALUES
(2, 'admin', 'oscar@iespai.com', '03813244e78a269c3abc1188322dde38', 'Oscar Lastera', 1, ''),
(3, 'user', 'oscar@publimasdigital.com', '03813244e78a269c3abc1188322dde38', 'prueba ', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tablas_perfiles_hea`
--
ALTER TABLE `tablas_perfiles_hea`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tablas_perfiles_ipe`
--
ALTER TABLE `tablas_perfiles_ipe`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tabla_k1_k2`
--
ALTER TABLE `tabla_k1_k2`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `to_calculos`
--
ALTER TABLE `to_calculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `to_proyectos`
--
ALTER TABLE `to_proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `to_thesaurus`
--
ALTER TABLE `to_thesaurus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tablas_perfiles_hea`
--
ALTER TABLE `tablas_perfiles_hea`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tablas_perfiles_ipe`
--
ALTER TABLE `tablas_perfiles_ipe`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tabla_k1_k2`
--
ALTER TABLE `tabla_k1_k2`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `to_calculos`
--
ALTER TABLE `to_calculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `to_proyectos`
--
ALTER TABLE `to_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `to_thesaurus`
--
ALTER TABLE `to_thesaurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31657;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
