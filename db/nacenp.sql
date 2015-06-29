-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2015 at 07:02 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nacenp`
--
CREATE DATABASE IF NOT EXISTS `nacenp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nacenp`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('00bd536a32d9cd750e24b1e1e8c23695', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1428408148, 'a:8:{s:9:"user_data";s:0:"";s:7:"user_id";s:3:"237";s:9:"user_name";s:5:"admin";s:17:"user_display_name";s:13:"Administrator";s:11:"user_access";s:1:"A";s:13:"user_batch_id";s:2:"18";s:17:"user_def_batch_id";i:-1;s:9:"logged_in";b:1;}'),
('4b75a7ba2ead343dc5e7102900059c07', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1428653982, ''),
('9d7dc7b2d6a5ccb839b4a392f7a2e724', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1428479490, ''),
('eab1352fa7f60ec4ff32969122c48516', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1428477780, 'a:8:{s:9:"user_data";s:0:"";s:7:"user_id";s:3:"237";s:9:"user_name";s:5:"admin";s:17:"user_display_name";s:13:"Administrator";s:11:"user_access";s:1:"A";s:13:"user_batch_id";s:2:"18";s:17:"user_def_batch_id";i:-1;s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_announcements`
--

CREATE TABLE IF NOT EXISTS `nacenp_announcements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_title` varchar(1000) NOT NULL,
  `announcement_msg` text NOT NULL,
  `announcement_batch_id` int(11) NOT NULL,
  `announcement_date` date NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `last_updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `nacenp_announcements`
--

INSERT INTO `nacenp_announcements` (`announcement_id`, `announcement_title`, `announcement_msg`, `announcement_batch_id`, `announcement_date`, `last_updated_by`, `last_updated_date`) VALUES
(2, 'test22222', '2test21', 17, '2015-03-08', 2, '2015-03-17 08:55:13'),
(3, 'test31', 'test3', 18, '2015-03-09', 2, '2015-03-17 09:08:28'),
(4, 'test4', 'test4', 18, '2015-03-05', 2, '2015-03-17 02:19:57'),
(5, 'test5', 'test5', 18, '2015-03-06', 2, '2015-03-05 18:30:00'),
(6, 'test61', 'test6', 18, '2015-03-05', 2, '2015-03-17 06:51:35'),
(7, 'test8', 'test8', 18, '2015-03-08', 2, '2015-03-17 02:25:25'),
(8, 'test9', 'test91', 18, '2015-03-16', 2, '2015-03-21 05:10:51'),
(9, 'test10', 'test', 18, '2015-03-03', 2, '0000-00-00 00:00:00'),
(10, 'test11', 'test11', 18, '2015-03-05', 2, '0000-00-00 00:00:00'),
(11, 'test11', 'test11', 18, '2015-03-03', 2, '0000-00-00 00:00:00'),
(12, 'Test1', 'Test1', 17, '2015-03-03', 2, '0000-00-00 00:00:00'),
(13, 'Test13', '!While not "true" caching, Active Record enables you to save (or "cache") certain parts of your queries for reuse at a later point in your script''s execution. Normally, when an Active Record call is completed, all stored information is reset for the next call. With caching, you can prevent this reset, and reuse information easily.\n\nCached calls are cumulative. If you make 2 cached select() calls, and then 2 uncached select() calls, this will result in 4 select() calls. There are three Caching functions available:While not "true" caching, Active Record enables you to save (or "cache") certain parts of your queries for reuse at a later point in your script''s execution. Normally, when an Active Record call is completed, all stored information is reset for the next call. With caching, you can prevent this reset, and reuse information easily.\n\nCached calls are cumulative. If you make 2 cached select() calls, and then 2 uncached select() calls, this will result in 4 select() calls. There are three Caching functions available:While not "true" caching, Active Record enables you to save (or "cache") certain parts of your queries for reuse at a later point in your script''s execution. Normally, when an Active Record call is completed, all stored information is reset for the next call. With caching, you can prevent this reset, and reuse information easily.\n\nCached calls are cumulative. If you make 2 cached select() calls, and then 2 uncached select() calls, this will result in 4 select() calls. There are three Caching functions available:While not "true" caching, Active Record enables you to save (or "cache") certain parts of your queries for reuse at a later point in your script''s execution. Normally, when an Active Record call is completed, all stored information is reset for the next call. With caching, you can prevent this reset, and reuse information easily.\n\nCached calls are cumulative. If you make 2 cached select() calls, and then 2 uncached select() calls, this will result in 4 select() calls. There are three Caching functions available:While not "true" caching, Active Record enables you to save (or "cache") certain parts of your queries for reuse at a later point in your script''s execution. Normally, when an Active Record call is completed, all stored information is reset for the next call. With caching, you can prevent this reset, and reuse information easily.\n\nCached calls are cumulative. If you make 2 cached select() calls, and then 2 uncached select() calls, this will result in 4 select() calls. There are three Caching functions available:While not "true" caching, Active Record enables you to save (or "cache") certain parts of your queries for reuse at a later point in your script''s execution. Normally, when an Active Record call is completed, all stored information is reset for the next call. With caching, you can prevent this reset, and reuse information easily.\n\nCached calls are cumulative. If you make 2 cached select() calls, and then 2 uncached select() calls, this will result in 4 select() calls. There are three Caching functions available:', 18, '2015-03-04', 2, '2015-03-26 14:45:26'),
(14, 'Test Lal la', 'la', 17, '2015-03-05', 2, '0000-00-00 00:00:00'),
(16, '2010 ann', 'ada', 16, '2015-03-08', 2, '0000-00-00 00:00:00'),
(17, 'Wa', 'wa', 18, '2015-03-09', 12, '0000-00-00 00:00:00'),
(18, 'dgcei attachments related', 'dgcei attachments related', 18, '2015-03-03', 2, '0000-00-00 00:00:00'),
(19, 'Na na na', 'na na', 18, '2015-03-08', 2, '0000-00-00 00:00:00'),
(20, 'test111', 'test111', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(21, '', '', 17, '1970-01-01', 2, '0000-00-00 00:00:00'),
(22, '', '', 17, '1970-01-01', 2, '0000-00-00 00:00:00'),
(25, 'test', 'test', 18, '2015-03-01', 2, '0000-00-00 00:00:00'),
(26, 'test111x', 'test111', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(27, '1212', '1212', 18, '2015-03-15', 2, '0000-00-00 00:00:00'),
(28, '12121', '12', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(29, '1313', '12', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(30, '141', '11', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(31, '1112', '11', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(32, '12121', '11', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(33, '11121', '11', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(34, 'adfa', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(35, 'adfa', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(36, 'asdadas', 'asd', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(37, 'sdas', 'sad', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(38, '111', '111', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(39, 'fsdf', 'sdfdsf', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(40, 'dad', 'dsad', 18, '2015-03-10', 2, '0000-00-00 00:00:00'),
(41, 'asd', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(42, 'asdasdasda', 'asd', 18, '2015-03-15', 2, '0000-00-00 00:00:00'),
(43, 'asd', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(44, 'asd', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(45, 'sdad', 'ad', 18, '2015-03-04', 2, '0000-00-00 00:00:00'),
(46, 'asda', 'sad', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(47, 'Instn', 'asdsad', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(48, 'asda', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(49, 'asdasdas', 'd', 18, '2015-03-12', 2, '0000-00-00 00:00:00'),
(50, 'xasd', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(51, 'asdasd', 'asd', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(52, '3 attachments', '123', 18, '2015-03-16', 2, '0000-00-00 00:00:00'),
(53, '333', 'dfad', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(54, '333444', 'dfad', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(55, '122334', '111', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(56, 'NaNaNa', 'zcad', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(57, 'qaqa', 'qa', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(58, '', '', 18, '1970-01-01', 2, '0000-00-00 00:00:00'),
(59, '', '', 18, '1970-01-01', 2, '0000-00-00 00:00:00'),
(60, 'aqaq', 'qqq', 18, '2015-03-15', 2, '0000-00-00 00:00:00'),
(61, 'lalalal', 'aasd', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(62, 'kakakakka', 'sda', 18, '2015-03-29', 2, '0000-00-00 00:00:00'),
(63, 'bbabbababa', 'zz', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(64, 'dsadAAAA', 'sfdsf', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(65, 'dsasd', 'dsad', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(66, 'dsasd', 'dsad', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(67, 'dfdfdf', 'sdfdsfsdf', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(68, 'AQAQAQ', 'adsd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(69, 'sgsfgsdfsd', 'fsdf', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(70, 'adad', 'asdasd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(71, 'ddfd', 'sdfsdf', 18, '2015-03-29', 2, '0000-00-00 00:00:00'),
(72, 'dsfds', 'fsdfs', 18, '2015-03-29', 2, '0000-00-00 00:00:00'),
(73, 'sdad', 'asd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(74, 'eqwe', 'qweqwe', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(75, 'sadasd', 'asdasdsa', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(76, 'adad', 'adasd', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(77, 'xczxc', 'zcxzc', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(78, 'sadas', 'dasd', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(79, 'sadas', 'dasd', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(80, 'Heola', 'adsa', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(81, 'dzxfc', 'zcz', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(82, 'Big One', 'asdasd', 18, '2015-03-02', 2, '0000-00-00 00:00:00'),
(83, 'GoGO', 'sadasd', 18, '2015-03-16', 2, '0000-00-00 00:00:00'),
(84, 'Hello', 'Hello', 18, '2015-03-04', 2, '0000-00-00 00:00:00'),
(85, 'Hello', 'Hello', 18, '2015-03-04', 2, '0000-00-00 00:00:00'),
(86, 'dfdaf', 'sdfdsf', 18, '2015-03-24', 2, '0000-00-00 00:00:00'),
(87, 'zxcxc', 'zxczxc', 18, '2015-03-15', 2, '0000-00-00 00:00:00'),
(88, 'dasdasd', 'asdasdasd', 18, '2015-03-15', 2, '0000-00-00 00:00:00'),
(89, 'adadasdasd', 'asdasd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(90, 'adadasdasd', 'asdasd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(91, '123122', 'adasd', 18, '2015-03-03', 2, '0000-00-00 00:00:00'),
(92, 'asdasdas', 'dsadasd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(93, 'Kelly', 'adasd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(94, 'dssdfsdfs', 'dfsdfsd', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(95, 'asdasd', 'asad', 18, '2015-03-03', 2, '0000-00-00 00:00:00'),
(96, 'asdasd', 'asdasd', 18, '2015-03-15', 2, '0000-00-00 00:00:00'),
(97, 'xzczxczxcz', 'zczxczx', 18, '2015-03-15', 2, '0000-00-00 00:00:00'),
(98, 'zzxczc', 'zcxzczc', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(99, 'zxczxc', 'zxczxc', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(100, 'zxczxc', 'zxczx', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(101, 'adfadfasdasd', 'adasd', 18, '2015-03-22', 2, '0000-00-00 00:00:00'),
(102, 'sfadfqredsa', 'asdas', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(103, 'New New', 'asdasdasd', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(104, 'Test update', 'adadasd', 18, '2015-03-31', 2, '0000-00-00 00:00:00'),
(105, 'ereqr', 'ewrwerew', 18, '2015-03-23', 2, '0000-00-00 00:00:00'),
(106, 'Attachment Instns', 'fgegefg', 18, '2015-03-31', 2, '0000-00-00 00:00:00'),
(107, 'Junk Junk', 'sadasdasd', 18, '2015-04-01', 2, '0000-00-00 00:00:00'),
(108, 'dafasd', 'asdasd', 18, '2015-03-27', 2, '0000-00-00 00:00:00'),
(109, 'zczxc', 'zxczxczx', 18, '2015-03-31', 2, '0000-00-00 00:00:00'),
(110, 'MaMa', 'fdfsdf', 18, '2015-03-31', 2, '0000-00-00 00:00:00'),
(111, 'twrwer', 'ewrewrewr', 18, '2015-04-04', 237, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_batches`
--

CREATE TABLE IF NOT EXISTS `nacenp_batches` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(500) NOT NULL,
  `batch_year` int(11) NOT NULL,
  `batch_num` int(11) NOT NULL,
  `batch_size` int(11) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `nacenp_batches`
--

INSERT INTO `nacenp_batches` (`batch_id`, `batch_name`, `batch_year`, `batch_num`, `batch_size`) VALUES
(2, '2011', 2011, 63, 110),
(3, '2012', 2012, 64, 80),
(4, '2013', 2013, 65, 200),
(6, '2014', 2014, 66, 212),
(16, '2010', 2010, 62, 160),
(17, '2015 1st batch', 2015, 671, 110),
(18, '2015 2nd Batch', 2015, 67, 112);

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_class_sessions`
--

CREATE TABLE IF NOT EXISTS `nacenp_class_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_name` varchar(1000) NOT NULL,
  `session_date` date NOT NULL,
  `session_from` time NOT NULL,
  `session_to` time NOT NULL,
  `session_speaker` varchar(500) NOT NULL,
  `session_batch_id` int(11) NOT NULL,
  `session_num` int(2) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `nacenp_class_sessions`
--

INSERT INTO `nacenp_class_sessions` (`session_id`, `session_name`, `session_date`, `session_from`, `session_to`, `session_speaker`, `session_batch_id`, `session_num`) VALUES
(8, 'Test4', '2015-03-04', '00:00:00', '00:00:00', 'Gopi', 17, 0),
(9, 'Test5', '2015-03-03', '00:00:00', '00:00:00', 'Gopi2', 18, 0),
(10, '1111', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(11, '11111', '2015-03-03', '01:15:00', '00:00:00', '1', 18, 0),
(12, '111111', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(13, '1111111', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(14, '11111111', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(15, '12111111', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(16, '1211112', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(17, '1211212', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(18, '12121212', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 3),
(19, '121212122', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(20, '1212212122', '2015-03-03', '00:00:00', '00:00:00', '1', 18, 0),
(21, 'Lala', '2015-03-03', '00:00:00', '00:00:00', 'sad', 18, 0),
(22, 'Test223', '2015-03-01', '00:00:00', '00:00:00', 'weqe', 17, 0),
(23, 'Ka ka', '2015-03-23', '00:00:00', '00:00:00', 'adsasd', 6, 0),
(24, 'QAQA', '2015-03-01', '00:00:00', '00:00:00', 'dsfsdf', 18, 2),
(25, 'Service Tax Rules', '2015-04-02', '14:30:00', '16:30:00', 'John', 18, -1),
(26, 'Service Tax: Overview', '2015-04-02', '10:30:00', '13:00:00', 'Gopi', 18, -1),
(27, 'Hindi', '2015-04-02', '16:30:00', '17:30:00', 'Venky', 18, -1),
(28, 'Mama', '2015-04-03', '07:00:00', '08:30:00', 'sad', 18, -1),
(29, 'Sports test', '2015-04-06', '09:30:00', '10:00:00', 'George', 18, -1),
(30, 'Excise', '2015-04-07', '10:30:00', '12:30:00', 'Aditya', 18, -1);

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_fb`
--

CREATE TABLE IF NOT EXISTS `nacenp_fb` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_batch_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `fb_duration` varchar(2) NOT NULL,
  `fb_content` varchar(1) NOT NULL,
  `fb_pres` varchar(1) NOT NULL,
  `fb_relevance` varchar(1) NOT NULL,
  `fb_class` varchar(1) NOT NULL,
  `fb_reading` varchar(1) NOT NULL,
  `fb_interactive` varchar(1) NOT NULL,
  `fb_visual` varchar(1) NOT NULL,
  `fb_comments` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `nacenp_fb`
--

INSERT INTO `nacenp_fb` (`fb_id`, `user_id`, `user_batch_id`, `session_id`, `fb_duration`, `fb_content`, `fb_pres`, `fb_relevance`, `fb_class`, `fb_reading`, `fb_interactive`, `fb_visual`, `fb_comments`, `created_at`) VALUES
(1, 2, 18, 9, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', 'Hello', '2015-03-23 04:11:09'),
(2, 2, 18, 10, 'LN', 'V', 'G', 'E', 'A', 'V', 'G', 'E', 'Hello heola', '2015-03-23 04:11:09'),
(3, 2, 18, 10, 'ST', 'V', 'G', 'E', 'A', 'V', 'G', 'E', 'Hello heola', '2015-03-22 23:42:36'),
(4, 222, 18, 9, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', 'asdad', '2015-03-24 02:41:28'),
(5, 221, 18, 9, 'SF', 'V', 'V', 'V', 'V', 'E', 'V', 'V', '', '2015-03-26 05:43:11'),
(6, 220, 18, 9, 'ST', 'V', 'E', 'V', 'V', 'E', 'V', 'E', '', '2015-03-24 02:42:10'),
(7, 219, 18, 9, 'LN', 'A', 'A', 'V', 'G', 'V', 'G', 'G', '', '2015-03-24 02:42:31'),
(8, 216, 18, 9, 'LN', 'G', 'G', 'G', 'E', 'A', 'E', 'G', '', '2015-03-24 02:51:36'),
(9, 215, 18, 9, 'LN', 'E', 'A', 'A', 'A', 'G', 'A', 'A', '', '2015-03-24 02:52:06'),
(10, 214, 18, 9, 'SF', 'G', 'V', 'G', 'V', 'E', 'V', 'G', 'Hola Hola', '2015-03-24 02:52:30'),
(11, 213, 18, 9, 'ST', 'E', 'V', 'E', 'E', 'V', 'V', 'E', 'Baba', '2015-03-24 02:52:59'),
(12, 212, 18, 9, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 02:55:33'),
(13, 212, 18, 10, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:05:01'),
(14, 212, 18, 12, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:05:34'),
(15, 212, 18, 16, 'SF', 'V', 'V', 'V', 'V', 'E', 'V', 'V', '', '2015-03-24 03:07:38'),
(16, 212, 18, 20, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:08:42'),
(17, 212, 18, 21, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:14:59'),
(18, 212, 18, 11, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:17:48'),
(19, 212, 18, 13, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:17:52'),
(20, 212, 18, 14, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:17:57'),
(21, 212, 18, 15, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:18:01'),
(22, 212, 18, 17, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:18:03'),
(23, 212, 18, 18, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:18:06'),
(24, 212, 18, 19, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:18:09'),
(25, 211, 18, 9, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:35:24'),
(26, 211, 18, 10, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:37:45'),
(27, 211, 18, 11, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:37:48'),
(28, 211, 18, 12, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:37:51'),
(29, 211, 18, 13, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:37:54'),
(30, 211, 18, 14, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:37:57'),
(31, 211, 18, 15, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:37:59'),
(32, 211, 18, 16, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:38:02'),
(33, 211, 18, 17, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:38:05'),
(34, 211, 18, 18, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:38:07'),
(35, 211, 18, 19, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:38:10'),
(36, 211, 18, 20, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:38:13'),
(37, 211, 18, 21, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 03:38:16'),
(38, 2, 18, 11, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-24 12:03:13'),
(39, 2, 18, 12, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', 'adasd', '2015-03-26 01:44:57'),
(40, 0, 0, 24, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-31 03:23:32'),
(41, 2, 18, 24, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-31 03:24:02'),
(42, 2, 18, 21, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-31 03:24:23'),
(43, 2, 18, 13, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-31 03:42:32'),
(44, 222, 18, 10, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-03-31 04:07:35'),
(45, 237, 18, 27, 'SF', 'V', 'V', 'V', 'V', 'V', 'V', 'V', '', '2015-04-04 14:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_file_attachments`
--

CREATE TABLE IF NOT EXISTS `nacenp_file_attachments` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` varchar(25) NOT NULL,
  `file_type_id` int(11) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `file_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `nacenp_file_attachments`
--

INSERT INTO `nacenp_file_attachments` (`file_id`, `file_type`, `file_type_id`, `file_path`, `file_name`) VALUES
(1, 'ANNOUNCEMENT', 102, '/Applications/XAMPP/xamppfiles/htdocs/nacenp/writereadfolder/uploads/announcements/102/02437_ontheroadagain_1440x900.jpg', ''),
(2, 'ANNOUNCEMENT', 102, '/Applications/XAMPP/xamppfiles/htdocs/nacenp/writereadfolder/uploads/announcements/102/4322_01-01-2012To31-03-2012_Part II.pdf', ''),
(3, 'ANNOUNCEMENT', 103, 'writereadfolder/uploads/announcements/103', '02437_ontheroadagain_1440x900.jpg'),
(4, 'ANNOUNCEMENT', 103, 'writereadfolder/uploads/announcements/103', '4322_01-01-2012To31-03-2012_Part II.pdf'),
(11, 'ANNOUNCEMENT', 62, 'writereadfolder/uploads/announcements/62', '1001292_10151534632049141_1441537381_n.jpg'),
(13, 'ANNOUNCEMENT', 105, 'writereadfolder/uploads/announcements/105', '96C04112-A89A-4C63-B04F-9BD310FD3F8F.jpg'),
(14, 'ANNOUNCEMENT', 105, 'writereadfolder/uploads/announcements/105', '293E1FF9-A1AE-4874-82AE-B0ACB85CE20B.jpg'),
(15, 'ANNOUNCEMENT', 106, 'writereadfolder/uploads/announcements/106', '02437_ontheroadagain_1440x900.jpg'),
(16, 'ANNOUNCEMENT', 106, 'writereadfolder/uploads/announcements/106', '4322_03-06-2013To31-03-2014_Part II.pdf'),
(17, 'ANNOUNCEMENT', 107, 'writereadfolder/uploads/announcements/107', '96C04112-A89A-4C63-B04F-9BD310FD3F8F.jpg'),
(18, 'ANNOUNCEMENT', 13, 'writereadfolder/uploads/announcements/13', '96C04112-A89A-4C63-B04F-9BD310FD3F8F.jpg'),
(19, 'ANNOUNCEMENT', 111, 'writereadfolder/uploads/announcements/111', '96C04112-A89A-4C63-B04F-9BD310FD3F8F.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_leaves`
--

CREATE TABLE IF NOT EXISTS `nacenp_leaves` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_batch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `prefix` varchar(1) NOT NULL,
  `suffix` varchar(1) NOT NULL,
  `leave_type` varchar(1) NOT NULL,
  `leave_title` varchar(200) NOT NULL,
  `leave_message` varchar(2000) NOT NULL,
  `station_leave` varchar(1) NOT NULL,
  `leave_status` varchar(1) NOT NULL,
  `approver_comments` varchar(1000) DEFAULT NULL,
  `last_updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `last_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `nacenp_leaves`
--

INSERT INTO `nacenp_leaves` (`leave_id`, `user_batch_id`, `user_id`, `days`, `prefix`, `suffix`, `leave_type`, `leave_title`, `leave_message`, `station_leave`, `leave_status`, `approver_comments`, `last_updated_date`, `last_updated_by`) VALUES
(1, 18, 223, 0, '', '', 'C', 'Hello', 'Need leave please!', 'Y', 'N', NULL, '0000-00-00 00:00:00', 223),
(2, 18, 237, 0, '', '', '0', '0', '0', '1', '1', NULL, '0000-00-00 00:00:00', 0),
(3, 18, 237, 0, '', '', '0', '0', '0', '0', 'N', NULL, '2015-04-02 13:02:50', 237),
(4, 18, 237, 0, '', '', '0', '0', '0', '0', 'N', NULL, '2015-04-02 13:04:40', 237),
(5, 18, 237, 0, '', '', '0', '0', '0', '0', 'N', NULL, '2015-04-02 13:07:51', 237),
(6, 18, 237, 0, '', '', 'E', 'xdasd1', 'xdasd1', 'Y', 'N', NULL, '2015-04-02 18:14:59', 237),
(7, 18, 237, 0, '', '', 'E', 'asdasd', 'asdasd', 'Y', 'N', NULL, '2015-04-02 13:17:37', 237),
(8, 18, 237, 0, '', '', 'E', 'asdasd', 'asdasd', 'Y', 'N', NULL, '2015-04-02 13:26:06', 237),
(9, 18, 237, 0, '', '', 'E', 'Goa trip', 'Need to go', 'Y', 'N', NULL, '2015-04-03 04:10:37', 237),
(10, 18, 222, 0, '', '', 'C', 'To Delhi', 'Test', 'N', 'N', NULL, '2015-04-03 04:48:04', 222),
(11, 18, 237, 0, '', '', 'C', 'I am sick', 'Sick', 'Y', 'R', 'adasdasdsad', '2015-04-07 12:01:25', 237),
(12, 18, 237, 0, '', '', 'C', '123', 'adas', 'N', 'N', NULL, '2015-04-06 06:03:22', 237),
(13, 18, 237, 0, '', '', 'C', '2342', 'asdas2', 'Y', 'N', NULL, '2015-04-06 11:11:30', 237),
(14, 18, 237, 0, '', '', 'C', '456', 'ewrwer', 'Y', 'N', NULL, '2015-04-06 11:19:50', 237),
(15, 18, 237, 0, '', '', 'C', 'dasd', 'asd', 'Y', 'N', NULL, '2015-04-06 15:34:13', 237),
(16, 18, 237, 0, '', '', 'C', 'asasdasd', 'adasdasd', 'Y', 'N', NULL, '2015-04-06 15:35:38', 237),
(17, 18, 237, 0, '', '', 'E', 'asdasd', 'asadasd', 'N', 'N', NULL, '2015-04-06 12:05:59', 237),
(18, 18, 237, 0, '', '', 'E', 'dasdadasdasdasdas', 'asdsa', 'Y', 'N', NULL, '2015-04-06 12:06:23', 237),
(19, 18, 237, 0, '', '', 'E', 'JoJo', 'sdsd', 'Y', 'N', NULL, '2015-04-06 12:16:12', 237),
(20, 18, 237, 10, 'N', 'N', 'C', '23adasd', 'asdasd', 'N', 'N', NULL, '2015-04-06 16:09:30', 237),
(21, 18, 237, 1, 'N', 'N', 'C', 'sd', 'asd', 'N', 'P', NULL, '2015-04-07 03:48:45', 237),
(22, 18, 222, 4, 'N', 'N', 'C', 'Goa Trip', 'asdasd', 'N', 'R', 'adasdasd', '2015-04-07 12:00:57', 222);

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_leave_comments`
--

CREATE TABLE IF NOT EXISTS `nacenp_leave_comments` (
  `leave_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_id` int(11) NOT NULL,
  `leave_comment` varchar(2000) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`leave_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_leave_items`
--

CREATE TABLE IF NOT EXISTS `nacenp_leave_items` (
  `leave_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  PRIMARY KEY (`leave_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `nacenp_leave_items`
--

INSERT INTO `nacenp_leave_items` (`leave_item_id`, `leave_id`, `leave_from`, `leave_to`) VALUES
(31, 13, '2015-04-02', '2015-04-04'),
(32, 13, '2015-04-02', '2015-04-05'),
(34, 14, '2015-04-01', '2015-04-03'),
(36, 15, '2015-04-01', '2015-04-02'),
(38, 16, '2015-04-05', '2015-04-06'),
(39, 17, '2015-04-01', '2015-04-02'),
(40, 18, '2015-04-01', '2015-04-02'),
(41, 19, '2015-04-01', '2015-04-03'),
(42, 19, '2015-04-05', '2015-04-08'),
(51, 20, '2015-04-01', '2015-04-02'),
(52, 20, '2015-04-05', '2015-04-06'),
(53, 21, '2015-04-01', '2015-04-03'),
(54, 22, '2015-04-01', '2015-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_lookups`
--

CREATE TABLE IF NOT EXISTS `nacenp_lookups` (
  `lookup_id` int(11) NOT NULL AUTO_INCREMENT,
  `lookup_code` varchar(100) NOT NULL,
  `lookup_val` varchar(2) NOT NULL,
  `lookup_display_val` varchar(250) NOT NULL,
  `lookup_val_display_order` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nacenp_lookups`
--

INSERT INTO `nacenp_lookups` (`lookup_id`, `lookup_code`, `lookup_val`, `lookup_display_val`, `lookup_val_display_order`) VALUES
(1, 'LEAVE_TYPE', 'C', 'Casual Leave', 1),
(2, 'LEAVE_TYPE', 'E', 'Earned Leave', 2),
(3, 'LEAVE_TYPE', 'S', 'Sick Leave', 3),
(4, 'LEAVE_TYPE', 'H', 'Half day Leave', 4),
(5, 'LEAVE_STATUS', 'P', 'Pending Approval', 1),
(6, 'LEAVE_STATUS', 'A', 'Approved', 2),
(7, 'LEAVE_STATUS', 'R', 'Rejected', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_prefs`
--

CREATE TABLE IF NOT EXISTS `nacenp_prefs` (
  `pref_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `def_batch_id` int(11) NOT NULL,
  PRIMARY KEY (`pref_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nacenp_prefs`
--

INSERT INTO `nacenp_prefs` (`pref_id`, `user_id`, `def_batch_id`) VALUES
(1, 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `nacenp_users`
--

CREATE TABLE IF NOT EXISTS `nacenp_users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_display_name` varchar(100) NOT NULL,
  `user_sex` varchar(1) DEFAULT NULL,
  `user_contact` varchar(15) DEFAULT NULL,
  `user_emergency_contact` varchar(15) DEFAULT NULL,
  `user_address` varchar(1000) DEFAULT NULL,
  `user_emergency_address` varchar(1000) DEFAULT NULL,
  `user_passwd` varchar(500) NOT NULL,
  `user_access` varchar(1) NOT NULL,
  `user_batch_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `nacenp_users`
--

INSERT INTO `nacenp_users` (`user_id`, `user_name`, `user_display_name`, `user_sex`, `user_contact`, `user_emergency_contact`, `user_address`, `user_emergency_address`, `user_passwd`, `user_access`, `user_batch_id`) VALUES
(7, 'admin12', 'admin12', '', '', '', '', '', 'QW7Xe3oBEOsoyCiWFqxcv7l4VxFvkGzH8RC9YXeBHvL7vYETjaNCgVq9kK/3s9Pss4jhena5xuSj5Yqnd2bWlStP3FjPg1Bxj5LfrfJSU8UZ6VP3B89iQl5DzrD421Jk', 'A', 3),
(9, 'admin5', 'admin5', '', '', '', '', '', '/drqW2DL4HfGN+RsLnPSw0e3g6K4M8sGSV8LR5Bod87bNmRn5JuzqPrVYpqYHYEJAYZWz7aFjqVN/pNXc3RXohoEZQcuFGk50VD/qQ12947zNV8pI6Ab4hluP06WRVLS', 'R', 4),
(10, 'admin6', 'admin6', '', '', '', '', '', 'T0sL2XecB7nFUw6R8Mek2Rzv8q1raS1/6Sq47gpaaaE6QKpXQouhK7oKNo1fENIm9+JC3KuIv4oCe2+6oaLSzgbUYL4oW8RusyHB1IwOE69Y4Jr0kIHoK25KuXmIDwU3', 'A', 2),
(12, 'gopi', 'gopi', '', '', '', '', '', 'buJxH+/nXVrn6oZ3nRlY3uVPrjuJ3z9C/OZbCZ1ZUHqbMCs5vjmg2SaHvSyos/MdgGI31pG4bPtbk0UR4EVh0ILhdOR5gwmzOZEP/o1Xd6hqgd0PM7/OKWOx4bxvTqsR', 'A', 6),
(13, 'nacen671_0', 'nacen671_0', '', '', '', '', '', 'SDO361VvBiQrbEwBBTVqUaEiWJeAG6VgWNhQl3ltL4hVUJmTu+U8zxIPNJ47DVMOGyA2yKC0BveK0MmXbVUFPmeHr79nx70GZQ5l7ErbOizG6x12fyiMec8QOrQ6Lp9t', 'R', 17),
(14, 'nacen671_1', 'nacen671_1', '', '', '', '', '', 'Cv0DhugLAjHnzF32BCQSM4fcLcZyOs1E6hEAwOaMcrGQ/ILLW3pwMLyanXxwdjXMylPioeXX1dsOqJurmKZ7Fd/eK1OwY+vogC1ib0GF2LTAWXBbRfDKdEBvenUoH523', 'R', 17),
(15, 'nacen671_2', 'nacen671_2', '', '', '', '', '', 'BNgU8P9SIa6bT92ey0WqBaeEVQQzqjfWaFtrWZ68WkDNWH0Dx861sbtsYCOr7OaOB+DPBQzVB5TIiubU/urmrS0h+ODxtZsNuZSeR/2frCq4/acFRZbKAGkoCPgyvq+k', 'R', 17),
(16, 'nacen671_3', 'nacen671_3', '', '', '', '', '', 'uh3orUtMzI5+sp8EfIWPDSBJx6zYdLY9cWxozzFvZjrPMStKfhUJH5CkauUghGFWM0GedOFkdCXcQZRW0+oR8Y5stKDuWa0WP3zSV+F2LtVdhC8X1pgqt2Oce2MjTSh5', 'R', 17),
(17, 'nacen671_4', 'nacen671_4', '', '', '', '', '', 'W+9Sbmhwue5WpVX7jNbEuMI/jERUdN4RzMq+xIa2XhmjLfqJwLfe1TaVLz0fbl5JkRzhbw+QtCNy4kmoWBRvkxgnDVa6/TGGxNGYgFzj+90WCoaVdQbKl1F106YHZ0Uy', 'R', 17),
(18, 'nacen671_5', 'nacen671_5', '', '', '', '', '', 'BGNgtjusmAB2YXm7bwfPpOP3QrtsM4+QEHsTM9ytdnvuiPkOy2Ogpa4W0mDxvf0qjz3RbvjHaQU/a70VckbcBjsufmQ8i8KyG9oPQtVcVvshMC+SMiszLKVTvDneurup', 'R', 17),
(19, 'nacen671_6', 'nacen671_6', '', '', '', '', '', 'bgwG+TvezbnVWVMJRyb4vR/vUAtDiinxTlTE9HKs4aHwnT1dkWjAqxFL4Z2NfzgRJiLCqvAXg2B+6mvJ0yf3lFGr+JxsuvoTeiNYb/PbjL/YYrjsppEaMlRCtGkYYIT2', 'R', 17),
(20, 'nacen671_7', 'nacen671_7', '', '', '', '', '', 'uE9iMxKRYE6IurMDSY4Yca3w24EHG5BlCGaeTESsirIpRgQ2eAyynUg7YKzbyQyR0UzRLeOjjBoXIgsL9J0HkciCn3UyFf9T00Ut7V3XdFvR+9tMIb3bxMqdKrnz8d2Y', 'R', 17),
(21, 'nacen671_8', 'nacen671_8', '', '', '', '', '', '7K9xYihdMyp82vxit3cX5JWIL7UQbzn5mH7LaKLIy7fIskd8QTv3BfD045wLSxAN3ndE7tK0LU9OBlxFWlURrr2PRTAkW6X5EAdWK92w4i69W2guaA993fFE/aH0ehSj', 'R', 17),
(22, 'nacen671_9', 'nacen671_9', '', '', '', '', '', 'SYlmbs/yMaH6DKAD9flvw6r2D1WYt4dM1nd0EgxaSQe6+43w+odupd+baQTeh1AYT8kW5JNq+PvhQpWHfxjAOpLKLzr6qzY1iRXq4Lg4EMixyqkEghgGKN+xJHofZcUZ', 'R', 17),
(23, 'nacen671_10', 'nacen671_10', '', '', '', '', '', 'GsNHzK35mnNb4HTuSpy2eA27bNtHpitbPdM2JyohtHqsSBYLbEPhxKtYuQRRpnAaNhEB2LHW7n/J+zWMEhcc/W4EAZ8tBAuP3vP22yn0g/Cvb2RNES48iiVIkdZ3UTdc', 'R', 17),
(24, 'nacen671_11', 'nacen671_11', '', '', '', '', '', 'JU5+jGb1es16uWU7wrkvBNWTse67JuJKD5yB6osQtsVJk+KnGpN7tqquQ7+2iOt18ZVmPMk6Sb0rXajeVPKb2cGgPQYaUugzfU1yUjt8OqjE/Aj1xZuNYKiVfGF1RKiY', 'R', 17),
(25, 'nacen671_12', 'nacen671_12', '', '', '', '', '', 'd2bupXPbXBqnntMOiU8RfvRYsYC5TS80w2i0roZ8Lv6PVOpoPnqDvxkvb3a1f2694y4102jwMYOWz0sf42TArwOh4GghzZeVQd4yhH8xmOuLvDRiuPYGAeEmhAYwRHvv', 'R', 17),
(26, 'nacen671_13', 'nacen671_13', '', '', '', '', '', '/mF+QxtTiaoQ5YEqoha/xPVwFQiy7ribZsnOZzTJs+ez5mtxHx7wVaBPGmm/QGQQIOjv5dCb20lu7+h40657TtIg76PoATqiqNaRjMBSF6zs/Nea62CvcJzG8C4Dttdh', 'R', 17),
(27, 'nacen671_14', 'nacen671_14', '', '', '', '', '', 'Js3OVwGoDfO+85xJRusvS7AX8H1YsMe5LThjyAD9+vuYQU8I3RXslOyAwfuz/rH16ymiajejiW/d3/7KloCqZmF9Qwmjdd5Em/vNF14XeV3SXw4uL8CitMUtZRPryO8S', 'R', 17),
(28, 'nacen671_15', 'nacen671_15', '', '', '', '', '', 'QiX92jFrQQ6b0DPcd3SoXZW7ktlBqkktgvnI/vjynJNs/uysAcn4uBBsRDnkYEsY0QjqXYZEMtoQI7LviCC1I2NShkwx18lq/95QpdOn+hkvPbLTcw5tdjQx5YWBBmPy', 'R', 17),
(29, 'nacen671_16', 'nacen671_16', '', '', '', '', '', 'oA9YaP9tn1ltbEqSNa3Hip5SRdDzup+DqVScsQAG6WT/BX6CTgPmGHZDY9hSQ1h3ELo6+B8EaNrz55SyDYrqKZRcRlzhHf5ybJonNxoD+/yKT1lekzwlYDiW8W1tw0Nx', 'R', 17),
(30, 'nacen671_17', 'nacen671_17', '', '', '', '', '', 'uybB27jtuIQegxf6e98YGBBqtBcBkjGbz9degVts5gx6FmTMBi3Z9FOZYna34+HbbPDW+aziJ4dyxGbwJEpZBBp/0LqHnzTqJazotCugb43mwGES4DVf93AOzA1CTMx6', 'R', 17),
(31, 'nacen671_18', 'nacen671_18', '', '', '', '', '', '81r+rtATICmNbKM9sVWO5kKtMbnT92QlJTJWwJHiZHI2tIdDgr6K37m1+4IxREITyr+tZzeQ/48REPPQvp/+Me4+XJlVaS6dhbT8cSYhC9pBkom5RmqYQkpSHxCBooLn', 'R', 17),
(32, 'nacen671_19', 'nacen671_19', '', '', '', '', '', 'eO3AdyyirbMC0cQNqY3SnER9cu1y9BwhUYQeYYtQDC12Cvmz0drzzM/X018/Ye+R7WRV7lS2LxUnN8+8boqBAtE3/Xu54pY8aVdQJLUw/KXvcYuQH5rYphDIBqdcmNxC', 'R', 17),
(33, 'nacen671_20', 'nacen671_20', '', '', '', '', '', '9VJRiQue/cijk04k9bDJF287qGItWlGpGbzvLJfPDpiHNpq64ZdYzweqht28rCnIh4v3mRFHYv6MvEXIilxy+/U/vwLfZ6xnkodCF8ScOh227wAKUy8FwpmyE6HuMfd8', 'R', 17),
(34, 'nacen671_21', 'nacen671_21', '', '', '', '', '', 'eX3uernYXWT+9plqtzqFw6zTXCWaUt2hVOGx4PVZ8SrbDhh0oXZyDGs+2V+WtHOKhcIEeoZu6X6COXivFiB/KrHJ1N5QmPS2aVBGT+5tw/a/o0mWWj6LAFb+FutUEOSP', 'R', 17),
(35, 'nacen671_22', 'nacen671_22', '', '', '', '', '', 'nz3JH/aIZbEAxYbQK8Sg8XRlz0HuLEQywlG3Vik6pqvJ0l7pi/8yLRWCRhw5ryDFLV3MM4x6kHvxy4kkl3NnrMu54ch86XoiS5wX0eYcuTSbZHNNmTrc6RgYRNhwiIUH', 'R', 17),
(36, 'nacen671_23', 'nacen671_23', '', '', '', '', '', 'W0OhTdWft+raZ7ddyyU/K2J77gE+upJl+8SD/S+URzvdrgOtuSQyKtCCqOQ+Ceqr+HU8GMu9XRi6UDP1g5sJ4sH+eq6xHGl8m0aV3CsU8Pd+/YYO0i8TLOkKRLl/XU3S', 'R', 17),
(37, 'nacen671_24', 'nacen671_24', '', '', '', '', '', 'iv6CA9V7l7zWLzggugTSjaGrsQZ/ZnjnWBy3KU5Wp7PR6h6cZJaUsfpjKxa6OZw55a7wTWM5NO7T7/ko+qWj4S6ys/X/r0LSfd8Rpr3/x/z/scritwUhI6D1xui0oxp+', 'R', 17),
(38, 'nacen671_25', 'nacen671_25', '', '', '', '', '', 'gRY/ub57a+7XKIpPto6Axjx6Vz4P3O5zjude27ukJfSaoLFYd4S/9Ps2ZRW4wYbsfhSEEUjPIM/QX6HZAJqJL2+EAWKIQpWQ/E9y5R2U8BJmmTIz5oRX2Jq5x7Rp/95C', 'R', 17),
(39, 'nacen671_26', 'nacen671_26', '', '', '', '', '', 'TQPFS7TqQS5e/fWjigGCa7LyTn3tBYUYJQiM6KgIjC7Sh/+FMCWVvlbLZBrXGbqU3TK7CboTvWJRDqaz5DmRVlrwjeTqT79oqDUJUpFwpWkRhrbcR+WYHuz/UrpeKId1', 'R', 17),
(40, 'nacen671_27', 'nacen671_27', '', '', '', '', '', 'iDPsmBkkBgKiVfSnWysZ6AkXyi6bCD+ISpplaKLA3BvMxC3KdWkvlSqi+naIzNlRypNgBSSIjv9GDFf2nPsuAcxhUUqg5RB3G9hVWdqDZIzkOhNr4nJuUSU8egQYrcaC', 'R', 17),
(41, 'nacen671_28', 'nacen671_28', '', '', '', '', '', 'SMUK33ARJgspOzhb/BbPhiKiz8rP6GAJfbcrKZr1xZRFj7iNULF7bQlMvajBxIlm/1Ziw54DqZmNaEn8w+y/P+YsmZnpsZrIYkYFrtuxB3qW8dWDGahBGzajTyAxC3hi', 'R', 17),
(42, 'nacen671_29', 'nacen671_29', '', '', '', '', '', 'Fe7UqNlK0S0L9zk0MjJkB51OnKhhKTn/i7EBtmGti5rP4iVpO4cCEBIL16+WduIFotl8pHy+KeSX673kt9niXjnBipN/2V2++YZ0tSAWjh/z1O2wgoAg/ilaV8t5Y63i', 'R', 17),
(43, 'nacen671_30', 'nacen671_30', '', '', '', '', '', '49xo5fm0RoYLM+YSjCJBiFgNhuGmaaZnN9uQbn5DbSlB2aeZ1c5vHX6f6neb7YwOrQTsMftDRn7aYPE4wtscy0cmO9LJ/U9FcSMKZygFDFV/UtXSa/wnhkILTSyNsg8F', 'R', 17),
(44, 'nacen671_31', 'nacen671_31', '', '', '', '', '', 'jnXeG8M96BJ1bP8ixQCl49yBBeRgJ7/nsbWkgKos8J9wgcRsQS7mKnt9Ha3PMdIwT2k+9Iy3oS/FR8c+RVPgPLJl23Qo3VhgMjez8AeYs+d5f0yz5o8sjnLEFTW4kbTP', 'R', 17),
(45, 'nacen671_32', 'nacen671_32', '', '', '', '', '', 'p4kXOyzekEZMjJBtfFjWifrUR6gu9gOzxzpXFLYEcpnbsWDz7CMhsftTaNyFk871o8SJRpENnzmiwtSrfP8ZIhB7APEbCqxKcXioh3faNo32z5tVC8rAd2IZkxKvmW3H', 'R', 17),
(46, 'nacen671_33', 'nacen671_33', '', '', '', '', '', 'HV+B9uoyEuQ3bYYkhS39SBik1R/gMTiiMqEAtAYpX1TJ8hjcrHrDYCA1Xch1oHwXnmV1l7fJYX7OxTHoDp2y9bb8mko0/ql4/rnTjidn5oLgjHgp6HWAamKQQLVCbgqj', 'R', 17),
(47, 'nacen671_34', 'nacen671_34', '', '', '', '', '', 'EOZ2k/pSRjmZTFjpeR7MhAGe6km7dtQExgIuWfzwWqonuTGxCRaMziKZWxgDnegh9JkdpAoFlOF9Gt/0kFtk7nGr+xleWZG2MTdUlh7IZJ/EG+1+KFrMJ9cfBtL3ScBe', 'R', 17),
(48, 'nacen671_35', 'nacen671_35', '', '', '', '', '', 'vTgcT1lxDfqo8+akvs+0Bb6UnMrJLkDppCp41ZLZqJoyVo+++853VmbjgcwhYGfUjUzJMFwJmrU37EBgeVBVqiZFNctC1hR7ZS8H/GGsvkKQXEa8IIHnCyGwUV2Xp8/R', 'R', 17),
(49, 'nacen671_36', 'nacen671_36', '', '', '', '', '', 'mJDjNgXmTeq+FA/40FF6XPmpC4Qhp0fADXnhWAEa4o//wdIOGML96LtEXE6VSvHUpzdY1cIqBCnfZTdiuE4NyFk0ownAcIvxmoLQpd/KyJdorl41waMyVMJ3kpHQ7tDD', 'R', 17),
(50, 'nacen671_37', 'nacen671_37', '', '', '', '', '', 'TPEW6IzBOYrtim83MI+QaSY/UVl82K9h52d7W4dmfJBFKVSSUbJmzJtRhFqEinHatNhHgpg7D3a7ZawSOPPdbWIYQBPDwezmtIihQQ4QN50jAtEAyCDWyBUpBWd6sh3O', 'R', 17),
(51, 'nacen671_38', 'nacen671_38', '', '', '', '', '', 'fkfOTSwXa3m94nNnWRxfUlPQJnvgGIrvzRCioVafJ10oyyG3rUe+8CE8qgo05xz3nBXYFpQZT92t28FOmLof8mk8vhxhrlSNMHIWmTikwtSHzqiiA1yZuiRsLS8I3Kiv', 'R', 17),
(52, 'nacen671_39', 'nacen671_39', '', '', '', '', '', '/B8WaNQLzrsP7oLKldPAXeGjYR6GwVh0EaBNVwCftsH4D9xZGQnHx07UjjPgcZ/G9yW0oQdWh9kzM5OHk94aKUwqHrSZaPR0D0W0I6q4u/cyoV49D1UvEUBydB2ACxF/', 'R', 17),
(53, 'nacen671_40', 'nacen671_40', '', '', '', '', '', 'piRZO1p1WSbRhopL2tAxP6Jd49WxcNT8GnIF243JkJjpKYSlFgNu8v01cu42l3xorWD4Jlr3qbKNpSu2JsJyixUfUvfMrnYB7QYPiD3hcAesrQnPOccB6A4t2ximtL6H', 'R', 17),
(54, 'nacen671_41', 'nacen671_41', '', '', '', '', '', 'dsJP705mykg9jiBLIM8oBl1XN63qCyp/ihkNwyz/vrMLs9d5ibZLSVx/EDpMjGbecG+GqMB/u2rDCKSnQm2InVynkUY4DlJZ+2UG5jpgUSQLsBb8vOH5tewuFzY9oNvz', 'R', 17),
(55, 'nacen671_42', 'nacen671_42', '', '', '', '', '', 'dzuWyvYPsDzygqPfqkkmkI9WyxkwpEHr6ZYjnzpuk9gyQ58eEo4NSJ0vKp9jmA02mM3K/Izvzfcxnj4utv7xjCCE968DbO82ya7Rn4pVbCHw9ucvfigFEkCpQeJt6E/C', 'R', 17),
(56, 'nacen671_43', 'nacen671_43', '', '', '', '', '', 'eYbosELpT6skdy0c6d/iOpyYeJ0/UjKPUu2vnDJ8efSvOzQ+4DMtPOmZjhgMu/f4fVLVW2U0lMsoST0swJwoDD7ifCT7TYl4ZwcxlxgDvHKTTGKUj+rK7wWcgFTP/0/C', 'R', 17),
(57, 'nacen671_44', 'nacen671_44', '', '', '', '', '', '4+bh4qCXLSOGfQcPvMRK0EJrUZcE6YDQ2o0AgWd20yz2oeslUdhJiKYzejy+Mx/KwiErM8pwh5HtTy/UJ8u7yGpKLYN0pBDjpnjghoa8+il+2SYA5gEuKJ0PoyBZXGMd', 'R', 17),
(58, 'nacen671_45', 'nacen671_45', '', '', '', '', '', 'Hv8Dy09ZHaDpv6T6nVxbvQaW1seLnNZdyExALJ8VLYCfi38s489B2V2+P0cEy0lweXUxxgFffIlzuceV/JNEyet57IpntxXzooLb++GtRrYMfuv9FJAg9P1FVzHD+i/D', 'R', 17),
(59, 'nacen671_46', 'nacen671_46', '', '', '', '', '', 'FXL8RoU4du0aVgKu0HdyBUIVDRRFp57mTGBzJMaK5vxPQW3/jukzaP1CU5iqeGFne/pqi3KsKxr9D4TYtWzUeiLB/LlfNLcy/iBN0XvAs9zGiE0iAbXh464Q/+dvpqcU', 'R', 17),
(60, 'nacen671_47', 'nacen671_47', '', '', '', '', '', 'c7rr8te1KsZiK4KpdWEP9/iX6ISMA9bh74+lPXCnzK339ep/nm5INqeN/c4Y4xm1nLkQhiRAaUD4/wdz7PLYJdbyQ5ssiE/j+Qp9NY84lrpwiZGVsRp541JDBbIY+lKH', 'R', 17),
(61, 'nacen671_48', 'nacen671_48', '', '', '', '', '', '87BgnW/g5bA6aLioa8GO8bMrRUxq38RPgyDa116vMoNYweUz2sIUEpLY5JZXcVOzrcSEnDQ4PMT831GgKSiDxcEdFGH767aHCvUtkhuvlgEIQo36qTcYn2rfLGPC8bLU', 'R', 17),
(62, 'nacen671_49', 'nacen671_49', '', '', '', '', '', '1QTdpERpedor0Cav+vJeg++dV44fXKk9IyjaCdIdL17YR0vVPxmFbRTkSWgysmDGEqDhV/UxhlrTY3Sz87nE7vi+L82+3jG+oi+oU/ry1gV9Lz+pL93nn43SP+lO3tbj', 'R', 17),
(63, 'nacen671_50', 'nacen671_50', '', '', '', '', '', '9+WTTEPJotK3cowQq+9SK11fMGqlw3KA1HU6zX9089gUE1VoV+VmIF1Yi5xbNWKL82ze7qw7Peg1TW87xCkllmUfhbndBw7XpJueopwA6GD55+Fhf5pINhhwIdvRpMc+', 'R', 17),
(64, 'nacen671_51', 'nacen671_51', '', '', '', '', '', 'iP/4ZDpPBCI9dLOfIHV7PzGKUJdkIsZkrmJUYrtCKlFYb/CtF87ILHJeDcOhEwn0G+uPoeERGliUeR/ITw/NmaoptidPu1OugFC7OwhckqOT/vRnBkfBFGX8nOBNb8jL', 'R', 17),
(65, 'nacen671_52', 'nacen671_52', '', '', '', '', '', 'HCIYW8xVlp1MgMpdp4sSONKcISKgxzJzk28OZe4PEu5L8Rzy/D8E6lqJ/nNgA5BfNIDRg7ASWTexbr0yuRX9ETyP/1bZUK/QpLW4HqvbhSH4oANlOznbG4KKc2vmvyCR', 'R', 17),
(66, 'nacen671_53', 'nacen671_53', '', '', '', '', '', 'ujHh8Ef6CyBf77z2CHCU2y8HK4hswMezT17jEfjXA/YqSfQ8E4WfPkGT6APusLm0CmS7ZkSULX7eMVztUZR/FtBkwCu5nwl6VWkMpyAXprwDZmJdo6i+mIxMvmRa5Xfi', 'R', 17),
(67, 'nacen671_54', 'nacen671_54', '', '', '', '', '', 'MnK1rum+AS2oP1S8Q5lofvj2TK39deHeOYF6vF9/2rAEv9h2ijWlQrpnukau0ONlasLZekdf2N/thT2V390DHdUFFGrqNqCQ2VYlbxY3qdtA7ydscyauodd6Y1RhXwQg', 'R', 17),
(68, 'nacen671_55', 'nacen671_55', '', '', '', '', '', 'gN9tU9820mZ+TZeFCIyZfa//eMI+sdX55L96OrNdwVoJeFTqyvoK2J7EUOnBE/CWHeLO+2xNIpOrRoT17cgruBf5imMu9N41du/hd2FFA39O3lYYHMdf7IT/NQNtXvQb', 'R', 17),
(69, 'nacen671_56', 'nacen671_56', '', '', '', '', '', 'z6XfAlc7yTiMyphbsYAsXN6gJvImV9rOSolbh9H/DfnsAefOPDYkzgEbVCJFtEBw1yRmhCFwrdoYHr30Z3FqMXmvD4rPm5eFUSDM01zTgmS7gOga09ozCN91wzJZseao', 'R', 17),
(70, 'nacen671_57', 'nacen671_57', '', '', '', '', '', 'IWaAl8gV6/rv6WTsws28l4Q8zriTXvEKaPmSz9ttdbcCPxmNbrqIXUdUJ10OrUoxU/m+xIeaugOHCh1w/DoxwXJnk2ppie6vuHFVGGLU7aPnP6a2UrlILfRUTEm/NM/E', 'R', 17),
(71, 'nacen671_58', 'nacen671_58', '', '', '', '', '', '1vbdQwaz96QbGepVjjZZ0tuLedQ9bmfuCmhfNCzJo7/7IVC0ZyCQ922JMnH8sBJFHVRCFyM53o4Ue0aixpHMu1UFZsoVIqNrZSiKBn349OqgJdtL/lKNvB7PrTL8Cp0o', 'R', 17),
(72, 'nacen671_59', 'nacen671_59', '', '', '', '', '', 'JeahBkPmXTQQ4nCgKoodBWTnDyFDtQnXqPvS7h7OkUwGtK1nGVTOyVnr4RcITGf5dSHtEe2xPJQbFbrXvOro0pck56w2GMB3qGQxUSlRPNiahaFCclSl7waD7xQhNzxW', 'R', 17),
(73, 'nacen671_60', 'nacen671_60', '', '', '', '', '', 'hN+Es+vZRxnHme/H7EK/fX41wggGC1lO+QOnVokPhvw7Op7cNSRNhOQLwfoZad1C/nC9DVfj1hO1+5MNinm7j7z9ZnORBPMMDhfhvCiipvX4plgvhBlIGLyKKsUfRG5K', 'R', 17),
(74, 'nacen671_61', 'nacen671_61', '', '', '', '', '', 'S19mogzBUo0GsXkgTRSat49YWqMPVkBxgJV6Z8nZwNQmX5wIKC+M1x7qAok8uoGXHP/BpUuxxPN1+zg4XxinpWF0oVXz5qZRVzGyhF6dqSZcoTIa0b6g/GhoXx5+6Wgv', 'R', 17),
(75, 'nacen671_62', 'nacen671_62', '', '', '', '', '', 'Dmn/SlDcF+IAjsKo7EaY+2CDxDkpnT7wvUcRgfXgCPFoVbTLVtcWsHNlNgpWP//xfJl74UuUxZiDVmNK7ntQDWs4+W8OCA+Egewls+A7g/Bl3s3Oh5zcdKKZcTUl4pDw', 'R', 17),
(76, 'nacen671_63', 'nacen671_63', '', '', '', '', '', 'kEMm6Wf4HVLZemwr3RHRZo2KMSJh376R5YG0KvHPGdLMLkRoYW0TxS0bEQBbpO6PNM6BbvNFPD8hpwkMy5E22nseCPUPT28gbA38TljAgodTSJPxZyL+/SNq09nx6QSg', 'R', 17),
(77, 'nacen671_64', 'nacen671_64', '', '', '', '', '', '7GpIDQxBG1gLXGzt5ibq6rDXfduAIgrH8oprltJN4wpCykRImupVEZ9oNsgjhNtFvaLiE5F3D6H4RdYTAqCkdgWFSEapy3DjE1q8sn1fq9dabinTrGZ8RzwIU7oHTmTJ', 'R', 17),
(78, 'nacen671_65', 'nacen671_65', '', '', '', '', '', 'S0yegpJvbriUZc5wvqdsAChFes7K07JZhO6x8SmKiPUpCrM7kz/9svfLz9G4occm5itk8ibzYPEhNQ8rTlYOM7cz7GqsPb9OOzvYa8MzC/ASPLf7qEUfjDIokwdYlKY2', 'R', 17),
(79, 'nacen671_66', 'nacen671_66', '', '', '', '', '', 'CP94ROZn2ZgGo12CdCwbM9VzKmSBFkobfNbMV4BBp/DFBg7uK4I+1xLa5nTd6wldFDr+PAE2SBOJk81tcXmBJnw5ulVpPQRKHxy/Q+pKWmQ60j+Nf+i2LaAtLArFaf4m', 'R', 17),
(80, 'nacen671_67', 'nacen671_67', '', '', '', '', '', 'MlpIdISEMHXPAc1rXl93DVNKVK+qEuWvwi7H299UEOoMpyU7yB8GEkRi+wnbowSiFCWdRHmJxAbNv28rJpxboPZAgO/KaS1jMT2O2AFQpqTnLtnlNhKOZyPnCB5SsMAL', 'R', 17),
(81, 'nacen671_68', 'nacen671_68', '', '', '', '', '', 'Y1oGbFrnWBmUCxtToE/uZleOUdlyOOQrvzGpRJ3efyOqNURGniqku9aVgyazkiJnOfbZnh3HSGMISqkvTqCe2FrZZBp3ChKCLYMQBfb4N21FHFeaAB49yP8d6XYJ/Cm8', 'R', 17),
(82, 'nacen671_69', 'nacen671_69', '', '', '', '', '', 'yQTbptO805uUJHau9Z770mWsR5CM6Z4bqMSasTPMCVC4Outz+U6ir/sS7Cxrcc84sj4tyriitaCVRJrk3qLCg9cI4HRXmbwy76PNkTZfdGxqlLkqnVQ3proloMnyegdQ', 'R', 17),
(83, 'nacen671_70', 'nacen671_70', '', '', '', '', '', '61Y3aL9uwU7MPqxlDrtXkCy5+OuKfANkIHkoOf7Hoa+twmeiJyYBzCnrrs3qUYndPtgnZt+7yKNfHsfjMuz9dIS7AIihOw2joLn6ptaGwM2ncKxzS0+PDhuOabg0jC+t', 'R', 17),
(84, 'nacen671_71', 'nacen671_71', '', '', '', '', '', 'Zk2l8JSK7WD8uNHjUMegGyDkJyDtn4lsRG3KFXm17qIbyjg5sy2QzyuHgF9y235ddL3FpsTEB/RS5cz00AtIzQHx0CzXX1QaCvDZTWpM6i1d2vAeCYra5IHh2o/pOMHj', 'R', 17),
(85, 'nacen671_72', 'nacen671_72', '', '', '', '', '', 'wNRPjqA+HePayyivM6RGgLt+Qi+Tj2nb0im1nBGr0l9OCyyBkQSLSX6qeGai9R2g5w3vqQUBhZs3DNlRCs24RWRyub5N94k9EkDshSoMHNrNAzvt08lkBmKYx6586zGd', 'R', 17),
(86, 'nacen671_73', 'nacen671_73', '', '', '', '', '', 'EgPTU3U7OBrMMi8cvZhbPcy3Wt0yDfprqsplAyWeUOtEr/3k9kaWUGndo2W6WAuWScy1jTNf2zoEQpcdLSirTXVVWr1BL2tUe/mS4WtwE52/MR1arcyBUPg9+kLyOmZB', 'R', 17),
(87, 'nacen671_74', 'nacen671_74', '', '', '', '', '', 'Q7xhgdyZ4r1V4LduebmnjWQNlLZ3DbsCCwxr1o8Dc+6C/+M8s6zQ3wakxqorsCGgU2CgoYEaeaiDPBX4pxyStRjz1qssQq2FwRpK80IEARjz83zlkLCXtwSn/S5MfuxQ', 'R', 17),
(88, 'nacen671_75', 'nacen671_75', '', '', '', '', '', 'XprY64lYvjytXowjbd/UL84a69LtDp6gyPBI+hGekZ4gsD/rMPoO7sV2Nx2ztmewTYMu0Z/Aq0bdbmi3KXJBQl0j65sIKvvs7U6Kilxkoweoq8DHaYGSKHsBCtjfjw8Z', 'R', 17),
(89, 'nacen671_76', 'nacen671_76', '', '', '', '', '', '2+DH07RpLv0QD3EIx0fl00EEY6JteRYEvGjIUMw8CTW7VvkpXL1t/2EdKbXGQBi/EgMy9nqDxSmEZlwpkBtZpUdE6Bw9M+9bLyU48czkgh46oAW8hFxE7JklfoGbsDN1', 'R', 17),
(90, 'nacen671_77', 'nacen671_77', '', '', '', '', '', 'z/ayYE0NzK6Km7LB79e4FndwlDRmvzEsgxh4s4p07JwDNM2RnCqghLgzgCtKvNpUOlz9x22yYPL1zK3ScgjKA0n1zKsYe14zXr+mTrc+xGnAkHJuCnhEIhwkvb6NliP4', 'R', 17),
(91, 'nacen671_78', 'nacen671_78', '', '', '', '', '', 'unonfd1t/7JRKRfXBLGOdCi2HqN13m+qqQ/asbokO2mw3qhxay7aUvRNLXulHUeeBz9Lk6hS9f8LGAfFbaHAV/Y1hhMLEFR3Sf7h3r+PercWKB7iGZZz22QK5zPLcWvd', 'R', 17),
(92, 'nacen671_79', 'nacen671_79', '', '', '', '', '', 'cUnucMGwfHgDR6uGWbXXsxgliDUzAnj4vfjrSH1AcC0XPsD4ULuC8dM4P++EZrFmZWCzM7uRhioT/dRVJDqPQQ6aPRc1LkGDzNJn0CJ29Yl1oJhxQ+wxU5TFApwPJKgO', 'R', 17),
(93, 'nacen671_80', 'nacen671_80', '', '', '', '', '', 'llftmRfg39xRaJIMyIDJco0T/msxCUNlBqBPQw+6WSiM5KKFEcU/1euYHk6VfGRHn4Ysk44LdZGbdr3ppJ4d1TDK6HyPpFhZHHsBL9uHoh1AXJ9hMzvobvdvL7At7gEd', 'R', 17),
(94, 'nacen671_81', 'nacen671_81', '', '', '', '', '', 't/4+0poiGDQ8cYiUhVVqqfTpQhOSX3aQXsyvL/Jy4RHDdiFczFxkI/deEjIwVHf4AnQb2PogCnZ4ZDRB8TPuVo16uzC9mu/6bDmrzKb1l+wyUIl84SxIqsX8M4fOu2tb', 'R', 17),
(95, 'nacen671_82', 'nacen671_82', '', '', '', '', '', 'WUj8m8I5kiTQpz7PzwCvbOJaZcqbrOjxSeje77d2Qel+KQP1D5jYvPjp02hIihFu6IzO8ZT0xJJhh4pXUUtCdohrGcAqfQj8bK+hbUvuQ4b8Z/4eAYgcJqoaFYdOHCTC', 'R', 17),
(96, 'nacen671_83', 'nacen671_83', '', '', '', '', '', 'uKZZ3H9MFBi7E7nLqEb1CN30vQJIk/3mJ7FhbJTbjgc/R9JfJeZO6XkyW4HtTuob4jMS7dZhtXdwGa9SZ5vIYIY33+MirH0C829rwWDUxISJTWy3nvUQ4zc7b8/VbZmI', 'R', 17),
(97, 'nacen671_84', 'nacen671_84', '', '', '', '', '', 'gfB2+2oK18G9w97Zbf6I0r5CP0Wbe+kCY7VnsrsYUrK6AZEW5PShGpCg3hqpxnslVdi91GCr1oh6Qy4NM+P3Rvfi3r7+kvJk5FtjAh1eZXAHtB36uMYeU52nqCWqEH4k', 'R', 17),
(98, 'nacen671_85', 'nacen671_85', '', '', '', '', '', 'KaQ2w1WBgY1Ir+i7VVlErVRFiBK9dzPhCxdaPuIH2ZL51Jq424XPOYR+5F/IVo0QukdTiPpDNrL8O2mEjJPM0ybct3OGIMPScMjFv59xoDQrJ2zXhOyVSRJrQCcCdXbZ', 'R', 17),
(99, 'nacen671_86', 'nacen671_86', '', '', '', '', '', 'ay/jvTl7vKpXdFv+kOB+BPEkI9QGDqxdgZWM1bbXfdnP5wctkbx2t9SsGaC3yqGXuljrT5mFE4Gge84HnfNx1pKQDyQ9ykqsc+UAB2wfeE8+Q40ycNKEqrTLgr13e9C5', 'R', 17),
(100, 'nacen671_87', 'nacen671_87', '', '', '', '', '', 'IY3XIlTidMraMEFlPQFycNmQVGTVYaJqivIfYp/t1yvsu2nVWew+gejCajMWJS/XW3UeYFLZ07g8FVjXQDDgz+5CE0lbUxzEVutZKUnHYyttMsNd0oxD8spcNOinntZT', 'R', 17),
(101, 'nacen671_88', 'nacen671_88', '', '', '', '', '', '957eqq6NBr9rXX7U5oL8sqv5o8xXQthcntcbanqNS3qhtlIihvK204/QzI/8Oiqg5BrqZD5paMK8/Px69T6C3LhdUs0NJt1X+fZn13CE+HuZf+rPopQ36lf+9JhzY/PT', 'R', 17),
(102, 'nacen671_89', 'nacen671_89', '', '', '', '', '', 'OGwCcKagxTAicFyXajOBxrT+LZOJZE8lPW2wFvs9+/TRQkWJPScbtkBrt3UH0JYpNDUi4ClB+6MAwWa91h1g2Yi8CPqSM8Zmm58/rZofoa2sTuCuesxjh6mpZrNKY7Fe', 'R', 17),
(103, 'nacen671_90', 'nacen671_90', '', '', '', '', '', 'V6pquaQ66mjEg9XHxZnUXZafP18gcpP2GY4IKH7/eckPpDo4tXw63/lNFKdYZ3drZ6R0oVK8w9N9Ma6m3gWFoJp1PLn8DsyFy9ee4apqTqatg/J7DNwsmdfA17n05HYu', 'R', 17),
(104, 'nacen671_91', 'nacen671_91', '', '', '', '', '', 'xC5vQwoADIWOC8xaq37sEx9To1LyNHP7Q1/LgnSgeq4HVga6o7pqo3zQonTNQ08b6Ydv8hXAaHH8Bqz7B+ch+4pP+gil9QyWKezgWLlPaHg9OJWRGcNM+7JQQ2SDbzSC', 'R', 17),
(105, 'nacen671_92', 'nacen671_92', '', '', '', '', '', 'fRvk9InwunsW8qDGyclhn4bjFgL5878QMeoAa9QDoLTMhaYaYrxeW/oS1Tmf3WatDAdoJYxlybhXFo/xDsgR79drx1NN9d2O+Cf7ogxhmGd7WmC6qWKzDVl4OSn538YL', 'R', 17),
(106, 'nacen671_93', 'nacen671_93', '', '', '', '', '', 'Gmdr9xyKSFwyj9Tr3BazRrXoR6aZlPAAyluj71gc70/RI9HQ12v3CaVjzS+qIu0b5+Lvlht4qpZ3jsHMMJQf6jMGSy06EYRimEMs/LinHPQg+vb1IjiO3v5miSPQEtWX', 'R', 17),
(107, 'nacen671_94', 'nacen671_94', '', '', '', '', '', 'PrNDRcsXDgcrvPID7peXMyGA42wAKoTDwk829rI+VCUUifB7S+KRll2nk5b/B7Ho082htclOLnY1J1i+7Ej4OFEV2m6wuG5iKPI44cBdUiiao+bc2+yNgo6xqQvYpLNo', 'R', 17),
(108, 'nacen671_95', 'nacen671_95', '', '', '', '', '', 'loS/YHlIUWiucovaqwNP2Hy4pNnMVFbJhIun9fa7wWII2MFb759qKo53ZkWqP8NoyyWulLp3rSsWseYC2QF57qrK09c+9Wuk7eJfdvY/MEG0FzvHaFhlETDm00DEwVdD', 'R', 17),
(109, 'nacen671_96', 'nacen671_96', '', '', '', '', '', 'COUV6YLMX1aFTzhSBfkuW7Uqb27k5yp0SzWAt95YEEucMxBCuljEqaFxkDL0rlaM2+yA7wa8xZL1Z7vvTifDQ4gx/macL7ctq+vOSPJOKRSkFj91spfKjf+7JCvzfNMl', 'R', 17),
(110, 'nacen671_97', 'nacen671_97', '', '', '', '', '', 'wja4/WANG6u8iH6bZ2TMRMXRevpSgOtNzGOFjUayDvBxj7qP9tdjXa0hF3abNBAF3dyJth7+www4Jz99ZqQehF84EcYqyb6nDB7RraU2PkgstDF+/YcTlQmaFH9M0Z6O', 'R', 17),
(111, 'nacen671_98', 'nacen671_98', '', '', '', '', '', 'At+YnVCdGYdvRZ337Erigkt9GJbueHxdVVvTPbzTuZHAkHJ1U2SGYimT0swsYcnUpUMZb2ITC+sCh+sHRzpmSvtG5ivYqbVY2fSzyweVRDTuEhLBL9yumVxB8ZhQxqoE', 'R', 17),
(112, 'nacen671_99', 'nacen671_99', '', '', '', '', '', 'jnMpJ655h5OeeRPx5dXgBe14PllMNVxd9iQIkj0JL5IvfOd8stFr8AfH/o+ZSU9lZUtOTnxL3SrcohCROmRt2QxZ0EsaReyXfRjiXbZ4R3g/C4dR8rEzr9c8bVvyXhWr', 'R', 17),
(113, 'nacen671_100', 'nacen671_100', '', '', '', '', '', '0HKzOhBW+qG+ZJSUF+6F6oYdJQ5yeOTq3gcUd7ZY9MKStknFDuEK7otoh5B58rFnZzGdNSgYcgCvBZPSfuCzuCNO4zYGDbHKDZsII6KWV7ydAeIuYqf4Fvq7oqWEzJyk', 'R', 17),
(114, 'nacen671_101', 'nacen671_101', '', '', '', '', '', 'VLwMDR7Vjxj2cVCJFh9cs3BtkRUdpE95Yzf2rYZSmnJxBGrw+9DV2txmkMh9RUC1Fjsgy4wMy80SrQxdZbeMXXee6HClJf7NQObqiPUW1J+Sh64BIhCg99/3aUpFk2q8', 'R', 17),
(115, 'nacen671_102', 'nacen671_102', '', '', '', '', '', '4s6ona0nxNQ6JndWlTpuO4pNQmgTBTdoF/J61L2m33IoxFG1Q6QSClBEpazDVH7q2LGxeJskzj4kP4RNs9tHe4R1vVo59AyplibbtmcIOnGErBrtOEUyOb50hjBYMUNe', 'R', 17),
(116, 'nacen671_103', 'nacen671_103', '', '', '', '', '', 'gq4bXP2J55UM+AJtIhBd/OMi8jfO1VXQ8a/7vsRsRVMQA4NbgwrFwln5/Ck4piwBmctoZSdIW+nq/vfTvQscsQEIM1wOmiYRd1URYb2xziDY3vKc6FBDEdGpXKDuSUs1', 'R', 17),
(117, 'nacen671_104', 'nacen671_104', '', '', '', '', '', 'KWsYKhqmQ/PZ8j55SXreDL7NEVEgHsBSgEpf5YcS6yvphpTsL28dl517BjdySKCSmhvNLN/K/rN8xoqoFBTBzU3oUwaXcqBmC5sauxwXULqZbZGvps9wNYi7AwPnXBU5', 'R', 17),
(118, 'nacen671_105', 'nacen671_105', '', '', '', '', '', 'hi9d4zgt/0JEkTGEG3Sv05I0VxWrumPCyqRlrVJ9T860hr7AH3NGa1YdiWrZ1Q+mMur9FanThvbPdqaNCUyo2REXPx4UtwecUxJI7xQPO+LqUIgxur2NQQ0CFIYBm0uz', 'R', 17),
(119, 'nacen671_106', 'nacen671_106', '', '', '', '', '', '1NQ2iYFBYNE6awQsjKdiN/Pu7LCT6bnmbl3k4MGjfXfUilKqxRradwolx+8/Ij01QoYqdQQOfnb4rj9WVbq4z2S/2iLYfw+DxLLM9Jo257KucpPoEydSoDmvGu/nDWDI', 'R', 17),
(120, 'nacen671_107', 'nacen671_107', '', '', '', '', '', 'KXqC2dfo2IOZz1X7+R1f/fm3/lH6P8Wz3TtcLPphSX0NND0zke7SJLEUGiQNOE6nU4hzZDc1c2qdpfM786ONY54F6efIT5dZ66c/lEwe7oYVmV+Lyg2+xBx2V8wflhbj', 'R', 17),
(121, 'nacen671_108', 'nacen671_108', '', '', '', '', '', 'OW0Uz3XWgs8v0SnhnY710vvW1Y8TTvErhRDJBmDwq5V4vK/TGZA6vUKVxWb6bGf3V6ZRP2Xv83fu9TxyiS0Tvqc2gB/HvER7JmSGnFF+756ZkSSCu3AlYJ/FG4aX4W3C', 'R', 17),
(122, 'nacen671_109', 'nacen671_109', '', '', '', '', '', 'ZPHrBOu6I1B3hgDbumMaCC2Ld+zF0Heg7IcR9i9kLotcI53ORiGGCbhQcW1XaPJGrzEuO2y5XzAy8KR5JNYIy3c5xeD0bFQBEZbpPWY59VTT4zdHgf2gTGF+RYsnl59P', 'R', 17),
(123, 'nacen671_110', 'nacen671_110', '', '', '', '', '', '+M+aQJ3jiM0pBtsN84p2SDgRkb8aNqmYoTeDNnlgJuTVWA01RdOsj8P/2GYfa+R5UuqEcWg2DcBAcWe2tPRgzgkNr6aEOt8PQsRzKrnc3WnpuRpxxcvw0wiEoJEhbmXo', 'R', 17),
(124, 'nacen67_1', 'nacen67_1', '', '', '', '', '', 'ha+PjVNYl1/bVwp8HMXRW0j639NEl/RTex1ZU1WXTSTmGdM5DrQMTrldeXSH4C080BH63tPEexy3AMmdaEorguHborCwS618lz3xFL33EbNDZ7kCv1a8a2ZsCAOIa5Gm', 'R', 18),
(125, 'nacen67_2', 'nacen67_2', '', '', '', '', '', 'kFCVFfwhuqT/mkDUIx0y12hsap1bnx7xjOZgbpmlFqchf5LwqSeYcKVHxZ5LTD5TZZHVNJsaLtuiZVetORaQuELCSowolCFgNwSGQ1A9D8vTftNFbGWPFbWsFAfUiTbQ', 'R', 18),
(126, 'nacen67_3', 'nacen67_3', '', '', '', '', '', '6Vvgn/zLPxsAVpOQuyy5FnGbRilpCyA14OB5JIH1xXaHl361EDnjrqgmEUwThF2Z/sAT3FaUHlE62wqTQs+KYTGLnuHlDlgUqNCT1/2GGVXIt0sLCJWmj2C6OntBiZUd', 'R', 18),
(127, 'nacen67_4', 'nacen67_4', '', '', '', '', '', 'D6KXy+t3H4CrjHPE8FGakf1sOngy0JFxmOWzmDM3IHFgNpErMoQKQGwDWDwqt4KW/CJbbHtdzXLpRrqOIciqIkUTZjzt2yFSumDt1InEDY8Ij9eqSb/efN5cIeimD3Yp', 'R', 18),
(128, 'nacen67_5', 'nacen67_5', '', '', '', '', '', '3rNfiNX3JT4+5lHyn/joC2+W1G/OmJS/lyKQW7gOqYKH05H7bNvrSqx15RI3EvrPXc+bB6XX7lO8843JqrPBbrhx5pqEkCdy0go5S4UiUGjPiRh1eJojE75CXoWLSiR9', 'R', 18),
(129, 'nacen67_6', 'nacen67_6', '', '', '', '', '', 'YTuZuo8gkDx90Elz9paLM16Rr+NZSW9TrDUhIctiktK6opBiplZimksmY+yhFyCTH4zfXu8sF/+Yh5v0pWOfMWQW9z/b2gV1dq+/g9G7vL6bjpHrZ6HbT8UmT7j+H4cK', 'R', 18),
(130, 'nacen67_7', 'nacen67_7', '', '', '', '', '', 'z01VBR5VoZj3uDvvoJ8PXQ95NW1S1R3XrDPLjrX4bvWr52T0usB7d92CYWl4ZUVSG8UUm5BcRPJyrH3HD+BOzym+v0A0DtaShaAky60d6zFRgEJcg2821iSZ6ponxgRF', 'R', 18),
(131, 'nacen67_8', 'nacen67_8', '', '', '', '', '', 'ieyOKE99B32P6g4qV4pXmVG47ITepK7bgzgf4LlQFo30ok6FU3CHYk4KDgXo1dO7+6Hn+lsC21D63nomtQYr9vEHAtWgVFPI9cZ/Fhqjxh7PvgrKw5kJr9GmYF7B3U0U', 'R', 18),
(132, 'nacen67_9', 'nacen67_9', '', '', '', '', '', 'BeOuwoz9aJjgI8KX+Avx/htmCRJLgYcw0kLkK+0ODHArqswJXnrUvIV0W2qwAT7fRfX9g2F2A+UrKI/qCM8cvFBkUAwzJWjiZly+PEUAG59mqCPJxZfiT0zEZbeGPshk', 'R', 18),
(133, 'nacen67_10', 'nacen67_10', '', '', '', '', '', '/EQeonB3J+IbYq245r5dgCxR8r9svBbCofWeplC+w4ZKs22hx5e/Wh01xyW5efD1YzRPlage5sgrzG5v0ivpJFSFzNm18p9of8W6Fih/gOr53XAINaloPEkR1ycaersF', 'R', 18),
(134, 'nacen67_11', 'nacen67_11', '', '', '', '', '', 'PhyjvVOb0+VclO+t3cFpVEKqWVKzOMFe/WOpcO8X0qyPS5g5fFuVwECuzlhln7mucA5XzD4nMOwEYlb5xkKVMJyFi7YPdfv88ZNhkKYGSQTACYOy3lxxM42Il3p5GKwL', 'R', 18),
(135, 'nacen67_12', 'nacen67_12', '', '', '', '', '', 'MsBLHrVqsCxIToyXVSsP2bZN0/FBWfdY1h35rk74BUFaiKHgwnnHAVWF9yluNuaulRN6ALb2n6SFcCRnzIynHximqO/dtw00+wEAN74d0YnVSqpN8XsziBFKCXJ/EZpA', 'R', 18),
(136, 'nacen67_13', 'nacen67_13', '', '', '', '', '', 'ADn1EDhw+U3ryM/z5bbPf8ej0n4jtgucpRAGg2dNihumeYQfA1eDAAgwQlOiBPRtyMO2QHm+JA1FJxlhvNPZDgrEODAJS/fRvkbHAWZPsboZTQg0PhlvsE1wHROGFCg7', 'R', 18),
(137, 'nacen67_14', 'nacen67_14', '', '', '', '', '', '9R1o11BrFnRl36xMVxfllZouKKyetTmJwuLgWmszVkvdharn+IPU+lqRsoNKugWfbeXjiw2M01r8iKmwrrx2jd8Ctq/WOhoyTdexDkAFXU9g0l1VI+T+D45UQoiqdSGT', 'R', 18),
(138, 'nacen67_15', 'nacen67_15', '', '', '', '', '', 'ICDHxV3kkbnFXtSFXSlBQTkowDTFwmyDVBWrAYEsIYi7mMbKZD58edSQ7eC5jR7K356l/z11aC8wRSAgTzCZJXEK97Nixyi74yDYvkl6e8LoY7iq52bqg6uFM6rXhSSe', 'R', 18),
(139, 'nacen67_16', 'nacen67_16', '', '', '', '', '', '++0jdf4/4m4TNw6O1eUige73ojz1qtwpFXogyFJuHbPVckj463tsv2E6Mr3M3lSKN/c5kmY9m3gEeOhW9u0pvGnoqI2wtG08LD1e2MNrICu7GBR2MdERs7wQu1IbW4T/', 'R', 18),
(140, 'nacen67_17', 'nacen67_17', '', '', '', '', '', 'bgB8jjfKn/X8mEbD6UQci9U3zOV+BKOrP1gxSnEZKwtfirsvUbU9+LHmfU6zxQkZ+ZXKyTVm0LuT6X/lRRq2NoCmQMEW9vfUZmFM7cc6jYe7AoCs6wEmfuz+uW1MS34h', 'R', 18),
(141, 'nacen67_18', 'nacen67_18', '', '', '', '', '', '52KsoSbnWsziyGAgL/tCnXr95H9e3hPhkG6gGlur6nIu1S2mz4FfwdYRtQeOmPUcHu9LxHPZWDzuHX4CU6ycY1n33f7VjVyDfGKLDT41yEYwDCiTBMHWGrbCsQKqsFJJ', 'R', 18),
(142, 'nacen67_19', 'nacen67_19', '', '', '', '', '', 'zTLLmH2kIBCvcugW9FQfBIsiJH/fV/rJKXwYfRkO3WLdHBMIOupnXEl50CduRxvFxqvdvBck78ITbA4ayucDg55/UWGNReCze8Z2tHy8IngZ+YXaP4eJ2EGPLGQSDfK6', 'R', 18),
(143, 'nacen67_20', 'nacen67_20', '', '', '', '', '', 'l3TDUNjLuXV/TYajAkkjG7zOX0d5boRkvovLKY+zEnRYwDkhiZ4OHdsu8TXpG706fWoobM2PeLF53xpjFtvqnmGKZUpRmxqaVAIdgEmm9dd5zruetfod5aFiuA1PxcZV', 'R', 18),
(144, 'nacen67_21', 'nacen67_21', '', '', '', '', '', 'vE4nSOjuuc1HJkcGCy3pmZKf2AYZOgc78fgZwmjx96CZP+JU6uXrOTZfb7djQpX0K3wAvsDBhVx7L/2xyXHX6lIMcNLPNVurup6KxoLxtT6KAQufsNBHFdB91Zdzaau0', 'R', 18),
(145, 'nacen67_22', 'nacen67_22', '', '', '', '', '', 'LyWScpyAfojIxwAv5A5RDWoiiGHGGeopLw6EKUvvEOoGc/dCj1uqveFo3DYeK86Sxqtqo2d2U6U8/MLfPSWOzew7Z6viZ+paIC5KBBPUorHA9OGrGY88A0/X1FruEUTL', 'R', 18),
(146, 'nacen67_23', 'nacen67_23', '', '', '', '', '', 'Hi333TAMf/OiOKdO0xO11Jem5hly8/F5XDfxaTVH5W5wsDv4gs6JIEpYTYnYflRJBB4jIrUos+dD44qiekJc8gSCnRuCLwszSffn7TcZ3ZzTR3Eb8xykq7k5p3MQsGU2', 'R', 18),
(147, 'nacen67_24', 'nacen67_24', '', '', '', '', '', '84+WeKKktPmk363loqqnhD6SMfkyvHSCet/zNa8fRahT3JecfCaqXiVfVGVgLuXYHNFgZK9XrC23Jnti/pvNRpqu8v1+CSSa5PRJ92Q4MTMHcRi1kyFjtFEB6Av7jH2i', 'R', 18),
(148, 'nacen67_25', 'nacen67_25', '', '', '', '', '', 'pFYLKZS4x1FIXM6CGyM9ZuiTIvWMwCP7vsbqcXpvf6a4JxmiymHc06+Jk6R1ryo86H/PwvtAumESnbdNoTQ5HsxDVDqX1Ym3vrsgQGL6tDjgnCqvz4YIzGwPvYQOCtFo', 'R', 18),
(149, 'nacen67_26', 'nacen67_26', '', '', '', '', '', 'lMZxa1VWk1/zEsrWL6Jw3u1MAxiZoVYNRfVNf2XpllbLlvpQOVeUSWCz363DPd5fq1rKYnOZNHk6O3tae5E7tJYKhEIRlKoVQjjcbPgBkQbLLXtGfM2lLhldBPfEUdmj', 'R', 18),
(150, 'nacen67_27', 'nacen67_27', '', '', '', '', '', 'bNqQxngFikLibOC33QFVNjmyKev6DkhMpQZYzO7FgdF2GN14TSQLXlw59BietW+jM+zKsXkCLDjXB2krIIFCLKKywtpT1F+lQudh9JRlPh9M9huVzj6LeeJsCDJe0ox3', 'R', 18),
(151, 'nacen67_28', 'nacen67_28', '', '', '', '', '', '+q2jS3ME7uC9IYmvo1I3HNw1KjYyqG2w3b3Kx0YmcNsohFKU+R02jasi+yQBKnnDApR006LCS4/ffTi2NOIxy1GobL1gCuQCXdsV32/iu0j/4ERxVSnyq4YmA8Qg5Zgx', 'R', 18),
(152, 'nacen67_29', 'nacen67_29', '', '', '', '', '', 'iFa31Y5GZ3gDm7tXQc42wpLj7gY96Txw5/NmbUQLpN5xRQ7C6HelOrjrQ0hB63oyzMVr8dvd0Mufm0aroB8c2RcQv8IArKKMI4BwhoB6Jm+che8TyBJsVa/UjPrlhUyU', 'R', 18),
(153, 'nacen67_30', 'nacen67_30', '', '', '', '', '', 't6PYvU29OqthK3cdjRDKZjX6kgOe33YB0usnlzGXMibHZWtYcPaeYxk8By+TxNt3IWQyIpagimqLoinFSTP0WSYDUXuBb5SucCbODfPLB8fJla3Zb1NZ8TutgL7XFvqb', 'R', 18),
(154, 'nacen67_31', 'nacen67_31', '', '', '', '', '', 'WWgDr+OcC1uAh1MJilv6nTXpNmDqbS9Q/q88MQq0C9Wtos8vPcJ4JlpNnYTC1dVB3718hDBADwTE7qajL8HgAkzYRMyGAT+yLc9VQu1TqUcwTfYIzaGJ2ViRKjJ5R0TU', 'R', 18),
(155, 'nacen67_32', 'nacen67_32', '', '', '', '', '', 'IluLdTVfpbqsQuCGJo6bTGs/tV0//IdHQnp6J6ku7NkiI9QvLOGgN/LXHS26YQvuirJTTuAA7NAXeAvT2RRcSBlijHtO2GibgZ+UMGlxK7aa6SXlh6EoVq7ZsyeDMLke', 'R', 18),
(156, 'nacen67_33', 'nacen67_33', '', '', '', '', '', 'bT6tV02N/wyJ2ZkDkYuLOsz8Aw/H9LrT5R2u0wiXW0Nj8JxVe6rZOZ1UEPCeSan2xVJtJHtkTJ19O9fl/6GkaWDRDuGweodECEFDmHqcPKupJ5hV5Gt2TqUXVh1ihHEn', 'R', 18),
(157, 'nacen67_34', 'nacen67_34', '', '', '', '', '', '5ddEQJ1Cx3olc61OTQgce96RUzP6h5FV8Pv8UkRCpdLHCbPaRI7XjDt+ozxiaIuioh1iwrnexLDUXHNx8E5spQcH188+AWSEe1dOJYD4qv57OZWIT8tPfCzCBSFCIvX7', 'R', 18),
(158, 'nacen67_35', 'nacen67_35', '', '', '', '', '', 'aOXK4DEt0SbCx5F8BlM36W0uL4KGzo+8BGeN5aT16rR2QdBQ7Z1rqobiscAwGRXnrqVsGBmHjBLSDVjcZiiQhW25xT8PcIauOq1EmC+wnc9ZKQ3FeqzhkkUEZvPFjlG0', 'R', 18),
(159, 'nacen67_36', 'nacen67_36', '', '', '', '', '', 'cSNyHe3Hh0HGkaLUMw6r53BXEhcgFEcIvtjbNwHYq3+/BvuZ9QJNG+54vsWHZfQeCiQyu5416UDi+DlMmYoQyJtI6YVlGeWs7p8uU12+N1PcbDmGkPj5eNIsicQhG+p0', 'R', 18),
(160, 'nacen67_37', 'nacen67_37', '', '', '', '', '', 'abR8rHaUb43X3zjKfdqR2Q6BkrdHawSZek+zp74/zOhdLFd6JH5tazNk7k4BnOf4zfA9jOzZdmSE3NeoS2H2ZDQJvj/XEQg7gb14yBIXsI0GuD25NeM9k5r2QD+yJm2U', 'R', 18),
(161, 'nacen67_38', 'nacen67_38', '', '', '', '', '', 'CNdnIKHt2CipfexRCUGCbyqmQeHO8bCB2qXedljywxNhdkE8srH0jwKZmL6D8oOBJjmkFaAurXnUEaVDhLub6tCc5Df8msE3z3OPtWAEhvrEmoyOjYI2/tvc9W/ibHxg', 'R', 18),
(162, 'nacen67_39', 'nacen67_39', '', '', '', '', '', 'C17uQ4dTD5vjW/TuFatr9Qgp1yk1YUe8w7ZvdwgsmvXzAc6g+TtgdzXYc/pMs0T4jN6QfC+K4jqXCuOs5sVFfbOBrJ/1SxibVCF5Kkp+pOGwh2tyyy5tYOtyGCMilt5d', 'R', 18),
(163, 'nacen67_40', 'nacen67_40', '', '', '', '', '', 'kHbDaJ2hro9Lk7HjFItXVdysTXjZVAAYT/4zyWngW1Qy0RRHpeP3n1VNfQhnqGfWQk6t6UglZQej4M2Jc5+Bdoye9ZOr/UpbotM6jYHQmD84xdNMdn74zxIvl3c1Ia0f', 'R', 18),
(164, 'nacen67_41', 'nacen67_41', '', '', '', '', '', 'pTaJ59hOWaTi8CeHCsk+VhuyYlYM5Wn9PHNgWFDEJ+lLfb9OIHwBBeuDin7ETgaHHfVzsm2igofUbMsoSE2kcW6B37Rx8B4sdZSEQQZyCrmoTgpLtYuNHzbG1TIK+PMa', 'R', 18),
(165, 'nacen67_42', 'nacen67_42', '', '', '', '', '', 'vHpEbQdJF1SiAS0zhHJzLM+pUAnDzwjW84LQKnLAy3tywRfLj0vw/t2qDx701EjOZdxxQLHQVk+rqeeoFFqP9aBTkzeG/sEHjtxe3TSLLvPqvy+XwDKijDr0dMDUs3Q1', 'R', 18),
(166, 'nacen67_43', 'nacen67_43', '', '', '', '', '', 'pvRj+Gsk6DJP100umoBql2T3h8deDte+e2cY2qH6Ctl9AnLhCP/3pIBFAQT0RZ9NHn+Vfj4a9N4xT4MxmgnsJq8cXGHjSE2GxbKGp4RvoUavPiXw2ssowFhRYtAfMArU', 'R', 18),
(167, 'nacen67_44', 'nacen67_44', '', '', '', '', '', 'bZ5uYCq0MGd7RbB8WQyYWtoWVNPpjq2MX/4X1rATvzl22HMAa7T64rHLQ6rfRfk3IE6APYVCsNpUTRs40wUFOe510BS2lg3glUcJ+oId3y7kutvfcyzEYxgDRMSjg8Pr', 'R', 18),
(168, 'nacen67_45', 'nacen67_45', '', '', '', '', '', 'p/O/27lcoo1jJY8wD3/pw4zcj8E5qM3O7p+EmGzogvfDvSLzrtclvZ3eZT8bMHLkxsu8P7DPznbHzPCrLMjm9ph+xkwmOnmv/+jDhOb/uJXvYTuoUfT5CZ3oVfif5OJ0', 'R', 18),
(169, 'nacen67_46', 'nacen67_46', '', '', '', '', '', 'j9JzsF26JbYyAUbZAlWzAqw0fHre0EqGyAIaL0HfrQtkzGdLjEYaQ1JwtmA71B3CQykI/UByKQ6aPypNDyiYFf198Tfe7SKuVEXSlqT+3ULbWMOELFW8Ypcz8y9npDkl', 'R', 18),
(170, 'nacen67_47', 'nacen67_47', '', '', '', '', '', '5YchJymL6a1fZ7rdmO3/71Kqn+A0m8Qj7VI8nbecg+qPN4o7p5EkXnsQTC1tgz//Du+t9T8AIOzPSUfAMmxCstRkEUPyvJspFwgTHTvc1vc7aPBgqFm/32//9E/nZzHo', 'R', 18),
(171, 'nacen67_48', 'nacen67_48', '', '', '', '', '', 'YwRLH1H+MV4G36eN5HQ7N0NNm+QyIaa6HWpZLqpp9HAoxFK5FRmICWjp9cH3TLipCGxC813D7yBPW2szxHaRYv/OfvasanXrepeVWHZ8w9SlGkAJEgx1vw6Fm1GirqKf', 'R', 18),
(172, 'nacen67_49', 'nacen67_49', '', '', '', '', '', 'y61y7nyp2JCJEZFfb+UgEWmrOcGeHYciG8XfltXYPwl3U3DfjQwo+eo+BxgH91eqx+Mdn1FXWuB+kCaG14TYnH8tEGsQrupe4mw9BimIgvmgYc4a6fqL6+l694m4oa0O', 'R', 18),
(173, 'nacen67_50', 'nacen67_50', '', '', '', '', '', 'GJWlyfwyi0LoGpyM9r9jyLd9CzVLkFzyIp/ONLBsV3y/dL3k8ml7ThmaNcJSqFr5jDHKtnCe0tdHkLqarySzOnZx1uYOuwfjNB8W0tQE/HR/aI9zUK9ezOJNUOS2F1oc', 'R', 18),
(174, 'nacen67_51', 'nacen67_51', '', '', '', '', '', 'quw/DwXkn3EZpBcLHzDYxKEXxGqXd7/KXI7Qn5mV0sb8XZmdhmN5xlbb6Ve964lSOqyOJrDpBOjetpLvXdXGmvdcv159p/fBKSAqQr8eOSHCBGcg3T+nU7NfBLyYtUHO', 'R', 18),
(175, 'nacen67_52', 'nacen67_52', '', '', '', '', '', 'ct+kwmjzt4weCh/iVLAzevcBBMSXHF+Wtkg6IRgOUty2y9e63zucnAgz0HuQlmJkTxulDggRzCVndxHGH7RIA6DbVKsn8jx5lpt8vCUSEDIXOuKENDjOoDukv/LAfZsW', 'R', 18),
(176, 'nacen67_53', 'nacen67_53', '', '', '', '', '', 'jWzv9yxMh54VzBm9EUMGX1VVkGyUvsc6Vwk89oFXvsGZxl2B2A9r3SkuqQDr/75E26bjOtgG7qFVuyVtiibv+fdlqkl/Alml8gYvsJO6NV4iF3axQh4CIsQ4qyLItFNp', 'R', 18),
(177, 'nacen67_54', 'nacen67_54', '', '', '', '', '', 'WEmQC+5gUCpkPdb6iz9I/ZQFWsXmNZbk0jZ/zgzZlHlJknJnMV20E+kSUdMO2mM+3Xn1B9PcA0FOKiJoUm6rBk4q+6Dd7PyZmJapqCDbpiv0tpBMd2QeFUSX4HtK3EXZ', 'R', 18),
(178, 'nacen67_55', 'nacen67_55', '', '', '', '', '', 'oIRg3l5TgoeWW2mfWmEwkT7xq9CT1tY4H/8EcFsx8u6QrT8Uas5xUksUzNTAQmM9oqqZ6DIu4BZv0vKRoyhFTR/eINi5gxEi7JMECsHh856KacuTaGvpnH6yaSPocysq', 'R', 18),
(179, 'nacen67_56', 'nacen67_56', '', '', '', '', '', 'VGFxZPInOEn6Hfmo7NKnft9GsN4+7pPXixxjiSrHhRzVEjav3rujp1HfsB+bMd5j9jooEVoqetXMtRR9w3GKrVVPliz7yIbiW3xTzqy27QEQGrMOTMakddpG+9agYtlj', 'R', 18),
(180, 'nacen67_57', 'nacen67_57', '', '', '', '', '', 'MtiynraNYofLcoG225clZBJTHySqCtU1/UUDWudK+MHoEJRjOPhvhHZBx2bdmghtcmeaWR4veK6SSprH/h25S56Oo+ooU24pB+Ur7VMQ89vNLMYgTxW0rUOJ+8GOCovt', 'R', 18),
(181, 'nacen67_58', 'nacen67_58', '', '', '', '', '', 'Xsr3E8lblmDVQS+D2vFqU37Skar2b+o79T7I9W/l83baXq2s73sSdfJrQIw7fGZUW7+OF8tx6v5nETe8dZmo/2jjUBgCdGpab2RjeB+dZ/GZSVnsdFhnIf8R5mHlesbf', 'R', 18),
(182, 'nacen67_59', 'nacen67_59', '', '', '', '', '', '7wORZtcCovdqgJQ/Dod3vBSEtVA9EiD8TBB0R0mZgbUMMEni2vkc+3/Jc69qRddMw6paPPyeE1lxjy4ZTpFGiJBSkBkaRGipF2iytnFbXcg2KK3UDusGSlSgV7hFXsLb', 'R', 18),
(183, 'nacen67_60', 'nacen67_60', '', '', '', '', '', 'CWYcWalV/HeuMQfqK7u+HRQ2CelYtZVwqOGx4MEDbdzNbp0ZEo3rliiK7Hjry1VXIbCfnUKaQOLq+dFZoTiPA8eBVVMSaXlmLbDGNKTnNGywTuK4roQQJe1UDBEF1Fe5', 'R', 18),
(184, 'nacen67_61', 'nacen67_61', '', '', '', '', '', '32Hmt4q7zmVEspsAaZ1hrtmlU0vHTaNHJk0U69OXO1V0hCNCJF+wTpkaeIBYggMZpxc6AWdtJHjgXUUIzhtFRfZip2261JakGWRGPYqKDu8wle7KA5pRinN5xDnDr47C', 'R', 18),
(185, 'nacen67_62', 'nacen67_62', '', '', '', '', '', 'm7mv2wyKKYkwpuwAx2/N920u+U+MhFup7W5p3HV+yOt3M5AxKiegGdvYw8FJnBVDp/l0KUUe+RL+xqxfxJ0/2LKDQza7eD9G+mLNDbc7Rg8Wbh35NBgEnvqtUX3LPHD5', 'R', 18),
(186, 'nacen67_63', 'nacen67_63', '', '', '', '', '', 'KHmfERAgl2pGRXPxeAFtqKH8PjrFP6Lf433lcLzbCEPNIEGu1k+YCVmfWfK1sC3jUC38DWHnuaAqkALd9mLDMEG6KfUHCLtOyTHkJNZGNZOve/HZmAjS9uXzAgpMjjNa', 'R', 18),
(187, 'nacen67_64', 'nacen67_64', '', '', '', '', '', 'XGamFXBoq5KIwi1S4B1HHwxGFvTaShYJtTXJCoCwJXJtfaw7zXKywRDXSKGueNimCwGD9Hi+HPKnlmqL9pUkEFjNm/XZ6HCkBGqwClzKtSAbplnedqT7syuXICrn16lU', 'R', 18),
(188, 'nacen67_65', 'nacen67_65', '', '', '', '', '', 'eIM8DVoQnHjRbf5zSHCtJ/aPQmi5LbEthMZ6sD+n55bIx+YbRrsRyzNDfjTAgIFoULwC9Nrfhyy6UuP04IcP+uB2eHM4m5oXDzXfk2vu/vVs4uNfElKiHl8Qq8n5dN8C', 'R', 18),
(189, 'nacen67_66', 'nacen67_66', '', '', '', '', '', '8X6tLzlmJ18+UPT54rxjn9ryVUMy9mA0bZLkdDyC++0V3oHQi8NQXYAVZl95shrIP5ezTdj8v8ifxqKviw767/S4hs+NX7KHusk9CH2elmb9uSHVUPVaIjFL6q51FQQm', 'R', 18),
(190, 'nacen67_67', 'nacen67_67', '', '', '', '', '', 'B6hjwOgfR+0YGfftQNxhd2Gkd1EAtFwls8YntYb40XRdr+XfVCXICsx0MyMG2b2btG++mEQHIhiVwehDjZoSCW4H2LQHfcDFVFoEE+/tEDRQik3Jjm0kdoXNSlorDBJH', 'R', 18),
(191, 'nacen67_68', 'nacen67_68', '', '', '', '', '', 'JV0RU4ilJPztPec1iQKlyynIzEOeWC21iNi7l1JZcf8hbR0plqV1K6WzPNHbrc5FY5lgzxvEL6PUaZFmMSgvdPFuOFOWr0f9r2cBdWfLiXZg+MU7hr5f9wVbRmBHHieN', 'R', 18),
(192, 'nacen67_69', 'nacen67_69', '', '', '', '', '', 'AawU4LjzA5mclqfUDZ9UCX1Rx0JeLtaEwd24QIJEhk56UgkyMrxkOYqaUNiC2nCHyGNxRccdwGI7+eetbpZhcXoGQD0OgeFdvyQ6bfcmct0mp23h1lpzaJ9RPqXh3TYl', 'R', 18),
(193, 'nacen67_70', 'nacen67_70', '', '', '', '', '', 'uNybfwwqnmGj448+qyz+B4dfFQ4X9Kc/x9jKeURQwWabIfeRzOhwTPUQj9SMJsru+SVt9i7+ebkdGdEJ4kLhX+jG8rtkBEfime6DJB6kxuM2vDKCu2ogqKTrRIWjwugI', 'R', 18),
(194, 'nacen67_71', 'nacen67_71', '', '', '', '', '', 'Isl2JkPUwPj4zYzMj9ymgZl45iEmt22Cz9c9xj7I/Sdr4WlMkf+/jjIoOP2nswg3MoF3U5h8DkGUgllXOY+tJtaVy6f6IlOXCJ4UHGJwhdqzU1Ogykn7vYLyq4YthE19', 'R', 18),
(195, 'nacen67_72', 'nacen67_72', '', '', '', '', '', 'jkUqfFWcO2KKntTGCTuibRPEKiJi45yq7ESfn6IrYz4DtQSRM/4reStJmlGkUVE5M2stc7h9PKOccZbnjN9s9Lrel+XayaL4/DpughvrXYCi2nkuczGwe8JelzYi9noO', 'R', 18),
(196, 'nacen67_73', 'nacen67_73', '', '', '', '', '', 'nDWwcNmnepGDFYlV7x/pWX2tGqHQhtYXU1Ld35T8QlhlpArD/J7JHmtFXL5wypd+BjF+3xpP0xgySAy9XSbnWwBAHHXpHSNOO6Cjv8MiJvm8U9MPJKTsgnCtRH+nIfHi', 'R', 18),
(197, 'nacen67_74', 'nacen67_74', '', '', '', '', '', 'I2Idk/gjFrx8qHUfipP+ZQre30GXYohgwWDr3jr7Abz9fkD+PqROa4oNajb1dqcP/yFbCousWNi/2tj1OvmlGwSngNe0vVAm0u5MI5dQts+ocDx3A/S67tmY7mhft4iU', 'R', 18),
(198, 'nacen67_75', 'nacen67_75', '', '', '', '', '', 'jRoOzyno5soh+uWa43KN9E/5WHskq/xMQ/omGGYpLuoU/xtB1movMV7FJr4McRx5b/twj2+NhZD7HK7Dj/kcZDFSzJy54CPKtmr7fIJkboo7MtzfzYaCeqfP2vL3i3x6', 'R', 18),
(199, 'nacen67_76', 'nacen67_76', '', '', '', '', '', 'xWl46g2YD3OgX74JoviNOHwaDhgBRR/vUNRWOr6/FAejlewMl61aIZsVe3dgdVlweT9WVxu3UQ524pNcyZ4ZsNg0GRohSiYhGRYJdKW7o8lICnhkCf/Z3gGYIvMY87HO', 'R', 18),
(200, 'nacen67_77', 'nacen67_77', '', '', '', '', '', 'zxoKpIjdYdIBAPTDxclt649zwuct2Dh+B1LATC5Q+FeqrSub9jhlTHsnBkoShtUFyuCiOPH1E7hQETlVZK/oViFdEEsNr5f5Kp8m6Zzn8LNPXahHQALlmIF3WrVSXrN6', 'R', 18),
(201, 'nacen67_78', 'nacen67_78', '', '', '', '', '', '2y2QOpCwYyBavfG8ICQvjsdlhWwMQQqPQ5K5+7jJPM29XGxOM413Djihrz7eCKKSBI+E5bxDLS7GSlvmdiay7SPsSq7DA9FXQZiEmPwtmsIKs4RLtspx25qNpTJg/8Cl', 'R', 18),
(202, 'nacen67_79', 'nacen67_79', '', '', '', '', '', 'dmq3DMHFsLtmOYt5QwLvt0nK60s5tic22UWOfy5fx5ZnWmhaywzGE9WmTiD9rlkU9ibuZ6t1K1j0AWMvke5Q0m/FXf5wuDiSCQV9NKqQYVVqOqbMKij5VH0wUkcDBEX3', 'R', 18),
(203, 'nacen67_80', 'nacen67_80', '', '', '', '', '', 'zJV6r1FMLHm7oPo0n/YRVRoOyfP7L2kYJhJTJWZxmUoIzBxWKpS/KJZwms93p4PhQp1+SVgxTEJzmpKpi5sLE7F9PtCcrod6m9Dh9QwjedQGqtYa/LBpVoEu8wv5TG/o', 'R', 18),
(204, 'nacen67_81', 'nacen67_81', '', '', '', '', '', 'yE1sFrIR0Tjyvj2tZ9EaY5ojtdQ/12y0C5uuKKL+1t6p/+gvebtB/KaEdSa23rYfTEJq/c3IQPHBDebiTTimjoYVGG+iIarC4VelU2xG97tHUFcOnh98/V/HtqzsP1zf', 'R', 18),
(205, 'nacen67_82', 'nacen67_82', '', '', '', '', '', '/vGDHVty5njwDNntf1AYAVBHSX7jVih4R7FvyNI3GwwOxrqWR9CMV304/XTUlY+Uzw1zV2kI2FUq1tqkUNrtwhWwG1oVvdB2Zj27T+P3VfMTEIVMu3jUZVVGxyzvOysI', 'R', 18),
(206, 'nacen67_83', 'nacen67_83', '', '', '', '', '', 'OJbE+coOq+DlcSyh5FQvJz3fcszGWuKxqOvqZtCd+GrB8usuIPMrE3AeUBJdL56EPjJ23PB7KnFPxI53VUjg2viRbL8q3iRZAQlY9RjpKmIYi6Xe3xu2QZpn7aV398I3', 'R', 18),
(207, 'nacen67_84', 'nacen67_84', '', '', '', '', '', 'L6j906OjQ90JbWVe7CeZe6tFrxQ+/wLbagZb7YzTA4jFUev6Qc+aDfv6J8Rn5BahIjMNxUaN5VSB2U/P0lKnFLNCIaHr254Q/9KwHlFYGZpByD9Yfui6EThs9aR/+gts', 'R', 18),
(208, 'nacen67_85', 'nacen67_85', '', '', '', '', '', 'TNeYrNoq4ju5eCkP0vETpW3qb4J2WjPKTZMqp1eHTczBo/FqKHdup+zvCCTDe5eZohJfOVIRLVmsQTzHAa/++YFOj1CKW1HjkNS79kffx1u1Ndkua2KfXedi2PL3KfZQ', 'R', 18),
(209, 'nacen67_86', 'nacen67_86', '', '', '', '', '', 'rCO8Jwogw5N40eNyfJ+wnTS+7B+HMhFv7RWeV/VuLrDp+f3owPzhlBFoW/KcS8cdFp9SyYUlpsVVs671C38ssfH8YfUAaGSoYZbbYLlQA2eNwKHPHMOy6CFmm6pGtw9Z', 'R', 18),
(210, 'nacen67_87', 'nacen67_87', '', '', '', '', '', 'u4rAMg/XqRv+wIqfre0ka9iEHsyFkT/OOW0f/6xtY7ZQ+eQHDaaQOoV+o2hHGs/2a8wk0viX4kpKBm2fPaxTu2ow9KWDiskaQhucyole2ziugMo5609hqIcTtKtPnHAB', 'R', 18),
(211, 'nacen67_88', 'nacen67_88', '', '', '', '', '', '4DFFHqn2kqsX8jQwWKgO6WMfKIh91ckagJg95os0x+7JXxL6Hif8iCMx+c/XzIA+h/ijHULWhZTaVv6rtdsiE4jVFFmRaF4Yuq5S3TShreeyFfBQcn+TmenDsg81fNal', 'R', 18),
(212, 'nacen67_89', 'nacen67_89', '', '', '', '', '', 'bex4wT6BsVQJ8/STPzfHP0UdlOzxpCPTVq5scls4N9f5a/5GvqqjXY+fBLBH6z24eT1aWGg5ewyb26C0m9+WcH2NK0QzODOnqklW+Q3c9w/byu7wII6xgWWlr16WuGjG', 'R', 18),
(213, 'nacen67_90', 'nacen67_90', '', '', '', '', '', '8rjSpX4hYfAUGHL0c7JpENoyrCsiv/ig/bPeX4mU9HqCm+aS31GNeIn+Nu047i0tvfMqIw51Qbx25vFXuXuOYI7HlpdruZp5L/+kUiiiZraijnT/+4HXs486m6tBteN1', 'R', 18),
(214, 'nacen67_91', 'nacen67_91', '', '', '', '', '', 'vdrWWBlZuqkM0XpRIZZHXIqUVwrvVr4sZV6X+o5IHJEl7C/RvwQtJ0HX54NMnzVsJkL2RWK6LNFGncYaC/dX2C8ALUO4KryBHK+77XLx9b/JwoJ9b7df7sczUsGQAXo1', 'R', 18),
(215, 'nacen67_92', 'nacen67_92', '', '', '', '', '', 'pNYIEktqcSaBUJ8MpwH7h0hlo3sQP4RvgI0TiVUX8r0jMhU3NSxyaDkIekR/jkr38sr30ioIjOsR1EoOSfSn983J5MnMISX9AcXFB+ZDqtKzlUR0mDT/ElDrh7fCkL9e', 'R', 18),
(216, 'nacen67_93', 'nacen67_93', '', '', '', '', '', 'U0UVuNN75PRhsrVulZo2uFo1IGIi6x8QCz/u0ezFv8YYUdPf4LzkLQEfEnYzkftyEVIkjQUW4l/a0QYVg4dBmJY/N+e6aNBFNfOUYwT88jifEfTiolQCp1fjHXgQS028', 'R', 18),
(217, 'nacen67_94', 'nacen67_94', '', '', '', '', '', 'QGMVzEML675qqQyqrY5cb2DCmzeel3ilpevnyQ0K25++Xsh5FmQq7n8Tg8czpthina5wHh/AeQERla3/SaM/srXtNBB6sZDaPB6Sz/nb5odIzfRbFSTlmUSHyYq0WhF4', 'R', 18),
(218, 'nacen67_95', 'nacen67_95', '', '', '', '', '', 'UgWmwvd+4GBtDabjBzE+juywlA2GAtK3lJuhJCMYP7wXtsMvTeDuhkKGJbbZta3PbfNuDjcgn6xxs/3jojTgbqcI7m06e/nJ1EWV3S8FXnVYS5fipIHgroB4YZRJ1K3f', 'R', 18),
(219, 'nacen67_96', 'nacen67_96', '', '', '', '', '', 'uYJvNmOlxNXefiazdU51wq5D5rCMZ3zoEdh4j3JB76+4iPkwflhmyp1LphjGkrIOZchDABja9jmpuxuh3/GaOOhgkJmNsCQVnPcNtHuxnO97kRMwxIbLkURQHRX9zWHW', 'R', 18),
(220, 'nacen67_97', 'nacen67_97', '', '', '', '', '', '3Wxr4eUjp+PyOlJRwAeTPflELMjMGUGFvTlsClb2lCgGDUyQK2BlqfTm95pG3UWWyDVqrQ3u//2GsnlCXu3pm5DSAFZ65YerTWPelESGmDhdrGARcLSQRRrapVpO2zI6', 'R', 18),
(221, 'nacen67_98', 'nacen67_98', '', '', '', '', '', 'O2JenbYsZwh5fJTJ7o7gzTXXnogTiry17gHWnnH/Msl8hCs3c886Fe8APDNE1Om3stZWyIsjLkYRT6x08DkKbzlQj2SOpGarrbYrsXKwWYpwYbnu9BkMO+fJiyxWFkfy', 'R', 18),
(222, 'nacen67_99', 'Gopi Don', 'M', '9885146496', '08683-24141089', 'Hyd', 'Hyd', 'zuAnBvIG3vPur1/s/XQvm2NYHw9nNv2nAP33X4QKqPTinAH6wPDOnKLXuM1SIpKH2p/t1vOYoFT6yZdkY1LugyexiXtKO8Mvg94AEp98vlewhCdmfpio8Lirtlgl8rl5', 'R', 18),
(223, 'nacen67_100', 'nacen67_100', '', '', '', '', '', '5r88TmgGuULPT0QDlTyifHwdw35YZs0BB8LhzWnsuMW44pt7pmt7FTvtIR4LZqrIAilNo3Ijb1eaShgpaLs/UF6cw/FNN2a0Lqj9461gpn2VfcPY6et5oHtQVyEWcKib', 'R', 18),
(224, 'nacen67_101', 'nacen67_101', '', '', '', '', '', 'I/QhkUGdiidmvKBYUYZ9flhAP2z6UQnlKQN7XSkbfb5IYQXZ1+mSeisk90wrTBakUG7kVjwEjPjEVszvVwrS0kSdQhcenFADUm5k9Yhgzd18bn/R15yqpcaFbpvreamv', 'R', 18),
(225, 'nacen67_102', 'nacen67_102', '', '', '', '', '', 'uDwAe0pHjuw4KJRFJwsM/yCG5TNk1VNhC2G5WmUZ4WmVlumt691wWfFDHd035ze6JY9bMNwXbdiSV7iHy0DGNRCVQffP2pqPxmrvLJngvG0lM5yiRbLoDiFz1SdQ0MAx', 'R', 18),
(226, 'nacen67_103', 'nacen67_103', '', '', '', '', '', 'gMqV/0SVMv19I6LFUK2aPOyNk36iPfnYCoPm3qXoJayA71vBnhujWnMSXdt9/+fYEgzP3JdDrOf+89eiSb+pOJ2GBzmdPmOCe3owfgBO1XtLH7ToWEisk9by/MxAVU/C', 'R', 18),
(227, 'nacen67_104', 'nacen67_104', '', '', '', '', '', '1o3DfUA0G3UhvnVZpoUfEZty2++7fr2mDN4PaQHwg4ZitRrXOgKdffSZ4jwA+R0iw+0DrhE0mNn2tZuYEzBc8dE2IpHeHT05V51XK0/umnIZTvgQmnBqjNEaSUYmHAbH', 'R', 18),
(228, 'nacen67_105', 'nacen67_105', '', '', '', '', '', 'rrGayQxIOsQ5Pdr3gFDrVhFmm5EAWRZ6zvcfXBikTxGw5THEnrSNvrDvEv16WkGVWDh2YihU8CNLbEAyluFYc4z4aDySL8MS09WlJWcPGCdBXyKTcjkNE9KHxN+md4Mt', 'R', 18),
(229, 'nacen67_106', 'nacen67_106', '', '', '', '', '', 'roWCJggLwXMvsmyg3WMtFkvdjoQCWEnaiU8mRK6TJrNkWMgaK3yRYdfCMOF40BVPkDIC0R3mZ97hUF+eboUV90RQ5d27HBeupj4N638p6JhmxPsDtHC5riwjFisiqWGR', 'R', 18),
(230, 'nacen67_107', 'nacen67_107', '', '', '', '', '', 'oFDxWtSoDOHROVOSbtSO/V4qMtgVhqr7tLATDlUn6HN1/5tVcCyefTDPJZdnOwOadzPxnwyj+YGV6v+b0VlUrQB3XuoQcR4NmiriVK5srI+APSZ0Pmf3gzxgEd6JRf/V', 'R', 18),
(231, 'nacen67_108', 'nacen67_108', '', '', '', '', '', 'oLQQKEf8ayFZ+0irj0PBLD3sAs/EB/1VIdcNW1DASaR4xI4nGrXaQbBllnjIu1/1494R7GBluepr41YMLQ5ZmT22RG07vtnqM29ADAnNYWWG353pLa+ORi9R/6ZLkDfU', 'R', 18),
(232, 'nacen67_109', 'nacen67_109', '', '', '', '', '', 'KITXMRVeVCFIkOhbmyB8IPk4wlwyBrvLchIvUR28RiQrs2P0yhn4c8SVFBomUjGGYsxnDyl+R3q1VB4IR17HPFEmJTyZXZiEskAplUUcq51TAuYHqJAdgSfww0NxFbk9', 'R', 18),
(233, 'nacen67_110', 'nacen67_110', '', '', '', '', '', 'i1qOz2NGLGdhBkV0Iun097XS3yUO18Mb1hzCQNcSEegspOdPVNynsn29UmzeBUPYWhQPY38f7K5U+Bg13hlQXYsHnHO+nPVVy2BAQ5RZwaqI4v4o1muoKOA9Eh3+Xhtl', 'R', 18),
(234, 'nacen67_111', 'nacen67_111', '', '', '', '', '', '3MzOn3OvRdh9ON5LOgtu9lGEZukFw2pK5fHo/kguPmpWQmmvBIJTK7OjbPEfSCqiie9G8c+3c2lZ8vyH0GDCh4RNn1yZZlPfi5CvGkcurMkQKtZLEcV+BNjMQ5wkGbUY', 'R', 18),
(235, 'nacen67_112', 'nacen67_112', '', '', '', '', '', '6vgYQE6IpuNGL9CiFs0s+/of8ZQFnY6Gxyp/s3PwzNbFbzjDzLWsg8rXbtbvShOUtsDdYlYwG+pOf+WiQpoWHb7mnuHZFGem1m9uj7lwPhyZB6smSzDFsoUOQRsr1rvu', 'R', 18),
(237, 'admin', 'Administrator', 'M', '1234', '2345', 'xws', 'swa', '6FQK+lfUnBFFv0cpd2i6neszAsXZRuHKIkt/V0riRBmNo44xTIeMfsC75rIn/1ai/ZbXMuyj2g0+yT0iEVzlKgvp5wMfyneE9YlSf47mywSONIm4qIdCBJdS50sMyZtD', 'A', 18);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
