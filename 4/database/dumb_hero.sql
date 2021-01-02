-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 03:47 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumb_hero`
--

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `name`, `id_role`, `image`, `description`) VALUES
(1, 'Alucard', 1, 'img/alucard.webp', 'Demons shall bathe in their blood! The light belongs to the righteous!'),
(2, 'Aldous', 2, 'img/aldous.webp', 'My fists... are unflinching!'),
(3, 'Gord', 3, 'img/gord.webp', 'There\'s no time to chit-chat.'),
(4, 'Brody', 4, 'img/brody.webp', 'Pain, is the proof that I\'m still alive.'),
(5, 'Kaja', 5, 'img/kaja.webp', 'Mmhp, I am the power of light incarnate.'),
(6, 'Akai', 6, 'img/akai.webp', 'Let\'s go out and relax.'),
(7, 'Lapu-Lapu', 1, 'img/lapu-lapu.webp', 'This land is our homeland. And it will soon be your burial ground.'),
(8, 'Alpha', 2, 'img/alpha.webp', 'Test: Alpha is online.'),
(9, 'Zhask', 3, 'img/zhask.webp', 'Hehehehehehe, Grovel before your king, human!'),
(10, 'Bruno', 4, 'img/bruno.webp', 'Wait for it...'),
(11, 'Faramis', 5, 'img/faramis.webp', 'Pain! Is my greatest gift to you.'),
(12, 'Atlas', 6, 'img/atlas.webp', 'The ocean is not just our home, it is who we are.'),
(13, 'Saber', 1, 'img/saber.webp', 'Kill! All! At once!'),
(29, 'Argus', 2, 'img/argus.webp', 'All shall perish by my sword.'),
(30, 'Cyclops', 3, 'img/cyclops.webp', 'You got a good taste!'),
(31, 'Granger', 4, 'img/granger.webp', 'Experience the euphony of suffering.');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Assassin'),
(2, 'Fighter'),
(3, 'Mage'),
(4, 'Marksman'),
(5, 'Support'),
(6, 'Tank'),
(11, 'Bomber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
