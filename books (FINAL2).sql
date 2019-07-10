-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2019 at 02:50 PM
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
(1, 'Victor Hugo', '1888-07-01', 'male', 'lorem ipsum in french'),
(2, 'Pam Jenoff', '1983-07-03', 'male', 'lorem iposum ipsos hippy'),
(3, 'Christina Lauren', '1977-07-17', 'female', 'lorem ipsum dolor sic amet');

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
  `stock` int(3) NOT NULL,
  `sold` int(3) NOT NULL,
  `price` int(7) NOT NULL,
  `author_author_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`,`author_author_id`),
  KEY `fk_book_author1_idx` (`author_author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `cover`, `title`, `release_date`, `category`, `format`, `stock`, `sold`, `price`, `author_author_id`) VALUES
(1, '', 'The Unhoneymooners', '2019-06-18', 'drama', 'paperback', 33, 10, 12, 3),
(2, '', 'Les Miserables', '1900-07-15', 'horror', 'hardcover', 15, 4, 8, 1),
(3, '', 'I owe you one', '1999-07-09', 'young fiction', 'paperback', 22, 12, 9, 2),
(4, '', 'Love at first fight', '2018-07-11', 'romantic', 'hardcover', 22, 10, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `book_has_orders`
--

DROP TABLE IF EXISTS `book_has_orders`;
CREATE TABLE IF NOT EXISTS `book_has_orders` (
  `book_book_id` int(3) NOT NULL,
  `orders_order_id` int(11) NOT NULL,
  PRIMARY KEY (`book_book_id`,`orders_order_id`),
  KEY `fk_book_has_orders_orders1_idx` (`orders_order_id`),
  KEY `fk_book_has_orders_book_idx` (`book_book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `customerId` int(11) NOT NULL,
  `users_user_id` int(3) NOT NULL,
  PRIMARY KEY (`order_id`,`users_user_id`),
  KEY `customerId` (`customerId`),
  KEY `fk_orders_users1_idx` (`users_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `address`) VALUES
(1, 'gabriel', 'orbulescu', 'gabriel.orbulescu@gmail.com', 'gabriel', 'lux limperstberg'),
(2, 'zoltan', 'szabo', 'zoltan@gmail.com', 'zoltan', 'belair lux'),
(3, 'hello', 'welt', 'hello@welt.com', 'hellowelt', 'Luxembourg Kirchberg'),
(4, 'billy', 'thekid', 'billy@kid.com', '$2y$10$ywOfN9mUAX5j4dj.9lm0/e7JqmTf6IIysna/bV6vbLSV7ar8.Fno.', 'lux belval');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
