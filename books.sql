-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2019 at 02:05 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `year_of_birth` date NOT NULL,
  `gender` varchar(12) NOT NULL,
  `biography` varchar(1500) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `name`, `year_of_birth`, `gender`, `biography`) VALUES
(1, 'Samantha Downing', '1983-07-08', 'female', 'lorem ipsum sic amet dolor'),
(2, 'Angir Thomas', '1975-04-03', 'female', 'lorem ipsum sic amet dolor'),
(3, 'Pam Jenoff', '1958-07-02', 'male', 'lorem ipsum'),
(4, 'Christina Lauren', '1977-07-23', 'female', 'lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(3) NOT NULL AUTO_INCREMENT,
  `cover` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `format` varchar(20) NOT NULL,
  `authorId` int(11) NOT NULL,
  `stock` int(3) NOT NULL,
  `sold` int(3) NOT NULL,
  `price` int(7) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `authorId` (`authorId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `cover`, `title`, `release_date`, `category`, `format`, `authorId`, `stock`, `sold`, `price`) VALUES
(0, '', 'The Silent Patient', '2019-02-05', 'drama', 'hardcover', 1, 20, 8, 12),
(2, '', 'On the Come Up', '2019-02-05', 'young fiction', 'hardcover', 2, 15, 4, 8),
(3, '', 'The Unhoneymooners', '2017-07-09', 'romance', 'paperback', 3, 27, 10, 21),
(4, '', 'The lost Girls of Paris', '2014-07-10', 'crime', 'paperback', 4, 12, 3, 15),
(5, '', 'I Owe You One', '2013-07-15', 'family', 'hardcover', 2, 33, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `customerId` int(11) NOT NULL,
  `bookId` int(3) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customerId` (`customerId`),
  KEY `bookId` (`bookId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `customerId`, `bookId`) VALUES
(1, '2019-07-01', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `bookId` int(3) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `bookId` (`bookId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `bookId`, `address`) VALUES
(1, 'gabriel', 'orbulescu', 'gabriel.orbulescu@gmail.com', 'gabriel', 2, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
