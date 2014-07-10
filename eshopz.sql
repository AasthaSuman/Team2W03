-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2014 at 05:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eshopz`
--

-- --------------------------------------------------------

--
-- Table structure for table `items_list`
--

CREATE TABLE IF NOT EXISTS `items_list` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `number` int(11) NOT NULL,
  `date_upload` datetime NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT '0',
  `details` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `items_list`
--

INSERT INTO `items_list` (`item_id`, `seller_id`, `user_id`, `item_name`, `number`, `date_upload`, `category`, `selling_price`, `discount`, `details`, `image`) VALUES
(11, 0, 8, '', 0, '2014-07-06 20:55:58', 'others', 200, 0, '', '599021_102305356598481_1189826027_n.jpg'),
(12, 0, 20, '', 0, '2014-07-06 21:15:58', 'books', 123, 0, '', '578598_707473155961248_640943044_n.jpg'),
(13, 0, 3, 'basket', 0, '2014-07-07 01:26:22', 'others', 150, 0, '', '1505627_713373948703550_1996202086_n.jpg'),
(14, 0, 3, 'bucket', 0, '2014-07-07 01:28:18', 'lab', 200, 0, '', '62963_712636062110672_1896918615_n.jpg'),
(15, 0, 3, 'bucket', 0, '2014-07-07 01:39:17', 'lab', 200, 0, '', '62963_712636062110672_1896918615_n.jpg'),
(16, 0, 3, 'damn', 0, '2014-07-07 03:29:04', 'books', 1, 0, '', '1796601_480796458693743_500589045_n.jpg'),
(17, 0, 3, 'Labcoat', 0, '2014-07-07 11:55:41', 'lab', 100, 0, '', '1463876_696089110432034_6561102_n.jpg'),
(18, 0, 3, 'whydis', 0, '2014-07-07 11:57:28', 'books', 12, 0, '', '1959368_599317843488366_1249474489_n.jpg'),
(19, 0, 3, 'door', 0, '2014-07-09 21:36:17', 'others', 234, 10, '', '1897996_508642272501335_495049611_n.jpg'),
(20, 0, 3, 'mirror', 30, '2014-07-09 22:27:26', 'others', 50, 0, '', '10151126_508035865985336_3706455943054665146_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shops_list`
--

CREATE TABLE IF NOT EXISTS `shops_list` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_made` datetime NOT NULL,
  `shop_name` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `mobile_no` int(11) NOT NULL,
  `details` text,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_list`
--

CREATE TABLE IF NOT EXISTS `users_list` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `email` text,
  `gender` char(6) DEFAULT NULL,
  `shop` tinyint(4) NOT NULL DEFAULT '0',
  `Sale` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users_list`
--

INSERT INTO `users_list` (`user_id`, `date_time`, `first_name`, `last_name`, `username`, `password`, `email`, `gender`, `shop`, `Sale`) VALUES
(2, '0000-00-00 00:00:00', 'Aastha', '', 'aastha suman', '83b04e2653917150804a1a71da678664e3e509b5', 'aastha.suman@gmail.com', 'Female', 0, 0),
(3, '0000-00-00 00:00:00', 'Kriti', '', 'kriti', '0ec09ef9836da03f1add21e3ef607627e687e790', 'kritipragya@gmail.com', 'Female', 1, 1),
(7, '2014-06-26 01:20:11', 'yogita', '', 'yogita', 'ab5c9672f60f050f46ff5738621fd95fb5d5137d', 'yogitta.choudhary@gmail.com', 'Female', 0, 0),
(8, '2014-06-26 01:21:43', 'Aastha', '', 'aastha', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'aastha.suman717@gmail.com', 'Female', 0, 1),
(20, '2014-07-06 21:04:24', 'asd', '', 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 'yogita.choudhary@gmail.com', 'Male', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
