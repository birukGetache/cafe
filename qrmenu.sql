-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 06:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrmenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `totalprice` int(100) NOT NULL,
  `totalamount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `photo`, `title`, `price`, `quantity`, `totalprice`, `totalamount`) VALUES
(37, 'foodmenu/shekilatibs.jpeg', 'Shekila Tibs', 500, 1, 500, 500),
(38, 'foodmenu/water.jpeg', 'Water', 30, 1, 30, 30),
(39, 'foodmenu/shekilatibs.jpeg', 'Shekila Tibs', 500, 1, 500, 500),
(40, 'foodmenu/beyayint.jpeg', 'Beyayinet', 200, 1, 200, 200),
(41, 'foodmenu/water.jpeg', 'Water', 30, 1, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `titledes` varchar(200) NOT NULL,
  `des` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `fastingor` varchar(100) NOT NULL,
  `foodor` varchar(100) NOT NULL,
  `portion` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `titledes`, `des`, `price`, `fastingor`, `foodor`, `portion`, `photo`) VALUES
(1, 'Shekila Tibs', 'Shekila Tibs with Bread', 'Shekila tibs made of beef and crispy and tasty.', 500, 'Non Fasting', 'food', '3 Peoples', 'foodmenu/shekilatibs.jpeg'),
(2, 'Beyayinet', 'Beyayinet with many options', 'Beyayinet made of beef and crispy and tasty', 200, 'fasting', 'food', '2 Peoples', 'foodmenu/beyayint.jpeg'),
(3, 'St Gorge Beer', 'St Gorge Bear cold', 'St Gorge tibs made of beef and crispy and tasty', 100, 'Drink', 'drink', '1 People', 'foodmenu/beer.jpeg'),
(4, 'Water', 'Daily Water', 'Daily water made of beef and crispy and tasty', 30, 'Drink', 'drink', '1 People', 'foodmenu/water.jpeg'),
(5, 'Kitfo', 'Kifto withalsdjflaksd', 'Shekila tibs made of beef and crispy and tasty', 400, 'None Fasting', 'food', '3 Peoples', 'foodmenu/kitfo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pricetag`
--

CREATE TABLE `pricetag` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `Fullprice` int(200) NOT NULL,
  `Halfprice` int(100) NOT NULL,
  `Quarterprice` int(100) NOT NULL,
  `TwoL` int(100) NOT NULL,
  `OneL` int(100) NOT NULL,
  `Halfliter` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricetag`
--

INSERT INTO `pricetag` (`id`, `title`, `Fullprice`, `Halfprice`, `Quarterprice`, `TwoL`, `OneL`, `Halfliter`) VALUES
(1, 'Shekila Tibs', 500, 300, 200, 0, 0, 0),
(4, 'Water', 0, 0, 0, 30, 20, 15),
(5, 'Kitfo', 400, 300, 150, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricetag`
--
ALTER TABLE `pricetag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pricetag`
--
ALTER TABLE `pricetag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
