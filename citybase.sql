-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 20 Μάη 2014 στις 16:07:02
-- Έκδοση διακομιστή: 5.6.12-log
-- Έκδοση PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `citybase`
--
CREATE DATABASE IF NOT EXISTS `citybase` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `citybase`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `anafores`
--

CREATE TABLE IF NOT EXISTS `anafores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` double(10,10) NOT NULL,
  `y` double(10,10) NOT NULL,
  `lythike` int(1) NOT NULL,
  `perigrafi` varchar(3000) NOT NULL,
  `lysi` varchar(3000) NOT NULL,
  `hmer_katag` date NOT NULL,
  `hmer_lysi` date NOT NULL,
  `emai_user` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `onoma_kat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `katigories`
--

CREATE TABLE IF NOT EXISTS `katigories` (
  `onoma_kat` varchar(100) NOT NULL,
  PRIMARY KEY (`onoma_kat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `photografies`
--

CREATE TABLE IF NOT EXISTS `photografies` (
  `onoma_arxeiou` varchar(100) NOT NULL,
  `id_anaforas` int(11) NOT NULL,
  PRIMARY KEY (`onoma_arxeiou`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `onoma` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`email`, `password`, `onoma`, `phone`, `user_type`) VALUES
('admin@admin.com', '123', 'test', 'test', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
