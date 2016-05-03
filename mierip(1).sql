-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2013 at 03:46 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mierip`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES
(1, 'Salam kenal para pecinta mie goreng!', 'Hallo, sekarang kami hadir di hadapan anda. MieRip. Bukan mie biasa, karena mie disajikan persis sesuai gambar bungkusnya. Silahkan hubungi kami untuk pemesanan!\r\n\r\nRegards,\r\nAdmin', '2013-10-20 21:28:01'),
(2, 'Coming Soon! MieRip Rendang!', 'Bagi para pecinta indomie rendang yang baru, jangan khawatir! Dalam waktu dekat ini kami akan membuka menu MieRip Rendang! Dan seperti mie-mie kerabatnya, MieRip rendang akan disajikan sesuai dengan gambar yang ada di bungkusnya! Stay tuned!\r\n\r\nRegards,\r\nAdmin', '2013-10-20 21:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `imagepath` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `imagepath`) VALUES
(1, 'MieRip Goreng', 'MieRip goreng, dilengkapi dengan telur setengah matang, setengah jeruk nipis, tomat dan juga irisan seledri yang menyempurnakan tampilan indomie goreng, jadi nikmatilah dengan harga yang cukup ekonomis hanya Rp 7.500', 7500, 'indomie-goreng.png', 'C:/xampp/htdocs/mierip/assets/products/'),
(2, 'MieRip Kari', 'MieRip kari, disajikan dengan setengah telur rebus, irisan kentang dan wortel, serta dilengkapi dengan paha ayam dan bumbu kari yang begitu menempel di lidah, jadi nikmatilah dengan harga yang menjanjikan sesuai dengan kualitas sebesar Rp 9.000', 9000, 'indomie-kuah.png', 'C:/xampp/htdocs/mierip/assets/products/'),
(3, 'MieRip Jumbo', 'Komposisi mie sama seperti MieRip goreng, bedanya disajikan dengan porsi jumbo. Anda bisa langsung menikmatinya hanya dengan harga 10.000', 10000, 'indomie-jumbo.png', 'C:/xampp/htdocs/mierip/assets/products/');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `email`, `comment`, `date`) VALUES
(1, 'Denny', 'thevirionz@yahoo.com', 'Great! Keep up the good work! Menunggu menu-menu yang lainnya dibuka!', '2013-10-20 21:35:14'),
(2, 'Dedy', 'dedy@gmail.com', 'MieRip nya keren gan! Ane demen banget sama telornya!', '2013-10-20 21:35:54'),
(3, 'Lina', 'email@example.com', 'Ge-je x_x', '2013-10-20 21:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@email.com', 'admin');
