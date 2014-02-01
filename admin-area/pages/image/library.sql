-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2013 at 07:48 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(44) NOT NULL,
  `book_name` varchar(44) NOT NULL,
  `member_id` int(55) NOT NULL,
  `no_of_books` int(44) NOT NULL,
  `subject_code` varchar(44) NOT NULL,
  `book_author` varchar(44) NOT NULL,
  `price` varchar(44) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `member_id`, `no_of_books`, `subject_code`, `book_author`, `price`) VALUES
(2, 'peshawar', 44, 34, 'life life life', 'fatima gul khan', '100rs'),
(11, 'pakistan', 0, 341, 'life of pakistan', 'fariha', '1003rs'),
(24, 'cricket', 0, 77, 'sports', 'majid khan', '90rs'),
(56, 'social network', 0, 11, 'science', 'queen', '100rs'),
(66, 'compiler', 0, 12, 'computer science', 'yasir', '600 rs'),
(77, 'i am malala', 0, 100, 'life of malala', 'malala yousafzai', '200rs'),
(1121, 'd.i.t', 0, 66, 'computer', 'zaib un nisa', '711 rs');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE IF NOT EXISTS `ebooks` (
  `book_id` varchar(33) NOT NULL,
  `book_name` varchar(33) NOT NULL,
  `book_author` varchar(33) NOT NULL,
  `book_category` varchar(33) NOT NULL,
  `file` varchar(44) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`book_id`, `book_name`, `book_author`, `book_category`, `file`) VALUES
('1', 'complier1', 'sherry khan', 'maths1', 'pages/image/'),
('55', 'maths', 'algebra', 'algorithm1', 'pages/image/451lects.pdf'),
('66', 'english', 'khan', 'poetry', 'pages/image/451lects.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `handouts`
--

CREATE TABLE IF NOT EXISTS `handouts` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `class` varchar(55) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `author` varchar(55) NOT NULL,
  `university` varchar(55) NOT NULL,
  `file` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8724 ;

--
-- Dumping data for table `handouts`
--

INSERT INTO `handouts` (`id`, `class`, `subject`, `author`, `university`, `file`) VALUES
(1, 'msc1', 'maths', 'nil', 'vu', 'pages/image/loan(1).pdf'),
(8723, 'msc', 'maths', 'nil', 'vu', 'pages/image/loan(1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `issue_status`
--

CREATE TABLE IF NOT EXISTS `issue_status` (
  `member_id` int(44) NOT NULL,
  `book_name` varchar(44) NOT NULL,
  `subject_code` varchar(44) NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_status`
--

INSERT INTO `issue_status` (`member_id`, `book_name`, `subject_code`, `issue_date`, `expiry_date`) VALUES
(33, 'gul makai', 'gul', '0000-00-00', '0000-00-00'),
(88, 'katrina kaif khan', 'movies', '0000-00-00', '0000-00-00'),
(345, 'sadaf khab', 'atv', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `f_name` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `session` varchar(55) NOT NULL,
  `contact_no` int(55) NOT NULL,
  `pic` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `confirm_password` varchar(55) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `f_name`, `address`, `gender`, `type`, `status`, `session`, `contact_no`, `pic`, `password`, `confirm_password`) VALUES
(12, 'sherry khan', 'haji ghulam nabi', 'lala rukh colony', 'male', 'faculty', 'not present', '2013', 2147483647, 'pages/image/1424460_724391327590602_1078420900_n.jpg', 'khan', '03149178520'),
(44, 'ali', 'khan', 'kohat road', 'female', 'faculty', 'present', '2013', 262626262, 'pages/image/1010054_496648800405920_1859967208_n.jpg', '777777', '262626262'),
(111, 'nawaz sharif', 'mian sharif', 'lahore', 'male', 'other', 'not present', '2000', 88888, 'pages/image/267838_140434419366674_8082741_n.jpg', '6666', '88888');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(44) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(44) NOT NULL,
  `news_date` date NOT NULL,
  `news` varchar(33) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1235 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_date`, `news`) VALUES
(1, 'new books', '0000-00-00', 'new book are available for comput'),
(5, 'new teachers ', '0000-00-00', 'dear students new teacher\r\nhase b'),
(1234, 'zafer khan', '0000-00-00', 'okkkkkkkkkkkkk ');

-- --------------------------------------------------------

--
-- Table structure for table `previous_papers`
--

CREATE TABLE IF NOT EXISTS `previous_papers` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `class` varchar(44) NOT NULL,
  `subject` varchar(44) NOT NULL,
  `year` int(44) NOT NULL,
  `paper` varchar(44) NOT NULL,
  `university` varchar(44) NOT NULL,
  `file` varchar(44) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `previous_papers`
--

INSERT INTO `previous_papers` (`id`, `class`, `subject`, `year`, `paper`, `university`, `file`) VALUES
(1, 'msc', 'computer10', 2009, 'dld', 'peshawar', 'pages/image/'),
(3, 'maths', 'algebra', 2012, 'compiler', 'vu', 'pages/image/');

-- --------------------------------------------------------

--
-- Table structure for table `return_status`
--

CREATE TABLE IF NOT EXISTS `return_status` (
  `member_id` int(44) NOT NULL,
  `book_name` varchar(44) NOT NULL,
  `subject_code` varchar(44) NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `fine` varchar(10) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_status`
--

INSERT INTO `return_status` (`member_id`, `book_name`, `subject_code`, `issue_date`, `expiry_date`, `fine`) VALUES
(324, 'pakistan', '324', '0000-00-00', '0000-00-00', '1000rs'),
(1234, 'pakistan', 'gul ', '0000-00-00', '0000-00-00', ''),
(3425, 'farsi', '124', '0000-00-00', '0000-00-00', '50rs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `member_id` int(44) NOT NULL,
  `name` varchar(44) NOT NULL,
  `member_type` varchar(44) NOT NULL,
  `status` varchar(44) NOT NULL,
  `address` varchar(44) NOT NULL,
  `date_of_issue` date NOT NULL,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`member_id`, `name`, `member_type`, `status`, `address`, `date_of_issue`, `expiry_date`) VALUES
(55, 'sadiq', 'student', 'present', 'kohat road', '0000-00-00', '0000-00-00'),
(66, 'janam', 'student', 'present', 'gulbahar', '0000-00-00', '0000-00-00'),
(77, 'jamal', 'student', 'present', 'lalalalalalalalallala', '0000-00-00', '0000-00-00'),
(345, 'azan', 'faculty', 'present', 'brians post graduate degree college', '0000-00-00', '0000-00-00');
