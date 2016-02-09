-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 10:24 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestamo`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

CREATE TABLE `articulos` (
  `codigo` varchar(6) NOT NULL,
  `nombre_articulo` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`codigo`, `nombre_articulo`, `descripcion`) VALUES
('adap01', 'adaptador mac', 'adaptador vga para mac'),
('adap02', 'adaptador 2', 'adaptador ipad');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `id` varchar(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `escuela` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `carrera`, `escuela`) VALUES
('00154459', 'raul cordero', 'ingenieria en sistemas', 'ingenieria'),
('00000000', 'elvis cocho', 'medicina', 'medicina');

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `id_persona` varchar(8) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `hora_prestamo` varchar(50) DEFAULT NULL,
  `hora_entrega` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`id_persona`, `codigo`, `hora_prestamo`, `hora_entrega`) VALUES
('00154459', 'adap01', '2016-02-02 05:13:29', '2016-02-02 12:30:28'),
('00154459', 'adap03', NULL, NULL),
('00144444', 'BLABLA', '2016-02-02 19:24:55', '2016-02-03 01:24:55'),
('00144444', 'BLABLA', '2016-02-03 02:29:21', '2016-02-03 01:29:21'),
('00000000', 'adap00', '2016-02-03 02:30:02', NULL),
('00000000', 'adap02', '2016-02-03 22:07:24', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
