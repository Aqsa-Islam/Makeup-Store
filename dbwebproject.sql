-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2023 at 02:21 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwebproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(200) DEFAULT NULL,
  `post` int(11) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `post`) VALUES
(12, ' Makeup Palettes', 10),
(13, 'Foundations', 8),
(14, 'Makeup Brushes', 6),
(15, 'Eye-Liners and Mascaras', 9),
(17, 'Tints ', 6);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `descripition` varchar(200) DEFAULT NULL,
  `catageroy` int(11) DEFAULT NULL,
  `postDate` date DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `postImg` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `title`, `descripition`, `catageroy`, `postDate`, `author`, `postImg`) VALUES
(45, 'Revolution Makeup Palette', '3500', 12, '2023-02-16', 'admin', 'eyeshadow.png'),
(46, 'NYX Pallete', '5000', 12, '2023-02-16', 'admin', 'NYX.jfif'),
(47, 'NYX Ultimate Makeup', '5500', 12, '2023-02-16', 'admin', 'NYXUltimate.jfif'),
(48, 'Huda Makeup', '7500', 12, '2023-02-16', 'admin', 'HUDA MAKEUP.jpg'),
(49, 'KRYOLAN Stick ', '6000', 13, '2023-02-16', 'admin', 'KRYOLAN.jpg'),
(50, 'Huda Foundation Stick', '4000', 13, '2023-02-16', 'admin', 'HUDA.JPG'),
(51, 'MAYBELLINE Fit Me Foundation', '3500', 13, '2023-02-16', 'admin', 'MAYBELLINEFOUNADATION.jfif'),
(52, 'NARS Foundation', '8000', 13, '2023-02-16', 'admin', 'narsfoundation.jfif'),
(53, 'Eye-Shadow Brushes', '2300', 14, '2023-02-16', 'admin', 'eyesbrushes.jfif'),
(54, 'Premium Brushes', '2800', 14, '2023-02-16', 'admin', 'PREMIUMBRUSHES.jpg'),
(55, 'Makeup Brushes', '3299', 14, '2023-02-16', 'admin', 'NEWBRUSH.jfif'),
(56, 'Ckeek and Lip Tint', '2500', 17, '2023-02-16', 'admin', 'CHEEL TINT.jfif'),
(57, 'Focallure Eyeliner', '4500', 15, '2023-02-16', 'admin', 'focalluremascara.jfif'),
(58, 'Focallure Two in one', '5500', 15, '2023-02-16', 'admin', 'focularetwo.jpg'),
(59, 'Maybelline Lash Extention', '2400', 15, '2023-02-16', 'admin', 'MAYBELLINEMASCARA.png'),
(60, 'Maybelline Sky High Mascara', '3500', 15, '2023-02-16', 'admin', 'MASCARA.jfif'),
(61, 'Pink Velvet Tint', '2400', 17, '2023-02-16', 'admin', 'liptint.jpg'),
(62, 'Organic Tint', '2200', 17, '2023-02-16', 'admin', 'TINT.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(200) DEFAULT NULL,
  `firstName` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userRole` int(11) NOT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `lastName`, `firstName`, `userName`, `password`, `userRole`) VALUES
(37, 'Islam', 'Aqsa', 'AI', '21232f297a57a5a743894a0e4a801fc3', 1),
(39, 'Rehman', 'Aman', 'ARehman', '21232f297a57a5a743894a0e4a801fc3', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
