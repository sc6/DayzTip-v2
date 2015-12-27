-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2014 at 08:40 PM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dayztbns_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `item` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `points` int(6) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `item`, `username`, `points`, `timestamp`, `type`) VALUES
(12, 'test', 'alkaline_battery_9v', 'cid', 0, '2014-07-05 22:26:40', 'other'),
(3, 'This item will be available in your inventory at respawn inside of your flashlight.', 'alkaline_battery_9v', 'cid', 3, '2014-07-03 16:34:34', 'other'),
(11, 'hi', 'alkaline_battery_9v', 'cid', 0, '2014-07-04 04:00:35', 'other'),
(10, 'hello', 'alkaline_battery_9v', 'cid', 0, '2014-07-04 00:48:12', 'other'),
(9, 'This item may be used to power appliances such as the flashlight or the headlamp.', 'alkaline_battery_9v', 'cid', 0, '2014-07-03 20:13:17', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `pulse_votes`
--

CREATE TABLE IF NOT EXISTS `pulse_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `vote_value` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thanks` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `username`, `description`, `thanks`, `timestamp`, `link`) VALUES
(1, 'cid', 'This comment has been flagged for sql-injection. START: &lt;tag&gt; :END', 'comment_flag_bot', '2014-07-03 16:51:15', 'alkaline_battery_9v');

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE IF NOT EXISTS `user_stats` (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(7) NOT NULL DEFAULT '1',
  `gold` int(9) NOT NULL DEFAULT '0',
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_stats`
--

INSERT INTO `user_stats` (`username`, `level`, `gold`) VALUES
('cid', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(1, 'helios', '$2y$10$j3i4kOGOXhoKTKafS3s17OfmZfDW0VJKlFpQKzf1DlstTGdmTEEQ6', 'helios@example.com'),
(2, 'cid', '$2y$10$fa86eCCPaQgII7.CBScIbezzrqOigz31yh7CtZG/ePQxQ9LqNk2wm', 'steverb916@gmail.com'),
(3, 'tekkenman', '$2y$10$g8BJJAS5Usgz4a2g/nhGoOAxMdNallLbeJNs1SM8dsQS8we4Q2tiS', 'tekkenman@example.com'),
(4, 'steve', '$2y$10$NM9JbHqQBRGz.P.9LhoPvON7nGGEmIj1gcqO.xcDjiL0UeqeGVFBO', 'steve.chang.1994@gmail.com'),
(5, 'warmachine', '$2y$10$qinjhg1QwR2nfUZ5jsY7ge6g9fm.vceI8DNa.uWVq3C1Pius3AYKS', 'warmachine@example.com'),
(6, 'richard', '$2y$10$nFV3Ex2ZonkA4xeX.d6wnuK9QyCmvoad.yBrY0m2aLFkTmHhf.w9y', 'richard@example.com'),
(7, 'test', '$2y$10$z5xpfoXwnd7NIXYmPyD5Q.mdY152MrEIXQDLQRNGW7bzCfZPt7C.e', 'test@example.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
