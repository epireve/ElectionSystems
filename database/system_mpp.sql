-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2012 at 07:01 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `system_mpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `images` varchar(200) NOT NULL DEFAULT 'http://www.greenend.org.uk/rjk/junk/avatar-small.png',
  `courses_id` int(2) DEFAULT NULL,
  `matrix` varchar(10) NOT NULL,
  `gender_id` int(2) DEFAULT NULL,
  `position_id` int(2) DEFAULT NULL,
  `candidate_number` varchar(10) NOT NULL,
  `hold` tinyint(1) NOT NULL,
  `vote_count` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `courses_id` (`courses_id`),
  KEY `gender_id` (`gender_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `images`, `courses_id`, `matrix`, `gender_id`, `position_id`, `candidate_number`, `hold`, `vote_count`) VALUES
(1, 'Nazreen Abdul Rahman', '../candidates_images/K12208030.png', 9, 'K12208030', 2, 1, '', 0, 4),
(7, 'Fina Fedora', '../candidates_images/S12208021.jpg', 10, 'S12208021', 3, 1, '', 1, 39),
(8, 'Firdaus Adib', '../candidates_images/16979.png', 10, '16979', 2, 1, '', 1, 6),
(9, 'Ridhuan Halim', '../candidates_images/17235.JPG', 13, '17235', 2, 2, '', 1, 0),
(10, 'Fikry Abdul Razak', '../candidates_images/17454.jpg', 9, '17454', 2, 2, '', 1, 0),
(11, 'Zakiyah Zamri', '../candidates_images/18528.jpg', 11, '18528', 3, 2, '', 1, 0),
(13, 'Suria Kadir', '../candidates_images/18756.jpg', 11, '18756', 3, 1, '', 1, 0),
(15, 'Zaki Nanyan', '../candidates_images/12762.jpg', 12, '12762', 2, 2, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(9, 'Information Communication Technology'),
(10, 'Software Engineering Technology'),
(11, 'Electronic Engineering Technology'),
(12, 'Mechanical Engineering Technology'),
(13, 'Business Information System');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(2, 'Male'),
(3, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(3) DEFAULT NULL,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `prefix`, `name`) VALUES
(1, 'GNR', 'General'),
(2, 'DPT', 'Department');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lvl` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `lvl`) VALUES
(1, 'suadmin', '42f8fa6a60345251252ea93cb1d71f05', 'rained23@pelajarbijak.com', 4),
(2, 'epireve', 'e99a18c428cb38d5f260853678922e03', 'i@firdaus.my', 1),
(4, 'registrar', 'e99a18c428cb38d5f260853678922e03', 'asdasd@asd.com', 2),
(5, 'admin', 'e99a18c428cb38d5f260853678922e03', 'admin@admin.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `mykad` varchar(12) NOT NULL,
  `matrix` varchar(10) NOT NULL,
  `unique_ticket` varchar(10) NOT NULL,
  `vote` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mykad` (`mykad`),
  UNIQUE KEY `matrix` (`matrix`),
  UNIQUE KEY `mykad_2` (`mykad`,`matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Voters tables' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `mykad`, `matrix`, `unique_ticket`, `vote`, `timestamp`) VALUES
(1, '900523126889', '12230', 'YVW5528496', 0, '2011-12-07 18:20:57'),
(2, '810816055071', '2344567', 'GLM2243146', 1, '2011-12-07 19:21:27'),
(4, '90121546871', '12221', 'OLV2909576', 1, '2011-12-08 09:09:42'),
(5, '901216115519', '22020', 'VGY1128459', 1, '2011-12-26 01:59:53'),
(13, '901215454848', '168794', 'IDI9128083', 1, '2011-12-26 09:50:35'),
(14, '12', '123', 'JYP5513924', 0, '2012-01-14 01:37:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidates_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
