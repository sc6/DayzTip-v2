-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2014 at 04:09 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `item`, `username`, `points`, `timestamp`, `type`) VALUES
(32, 'You insert your battery into your flashlight.', 'alkaline_battery_9v', 'helios', 0, '2014-07-15 22:46:28', 'dialogue'),
(24, 'Powers headlamp', 'alkaline_battery_9v', 'helios', 0, '2014-07-08 01:51:05', 'uses'),
(23, 'Powers flashlight', 'alkaline_battery_9v', 'cid', 0, '2014-07-08 01:35:37', 'uses'),
(20, 'Randomly generated loot', 'alkaline_battery_9v', 'steve', 0, '2014-07-07 22:20:47', 'HTG'),
(18, 'Inventory at respawn', 'alkaline_battery_9v', 'cid', 0, '2014-07-07 22:14:35', 'HTG'),
(34, 'This item always spawns with you in your inventory.', 'alkaline_battery_9v', 'cid', 3, '2014-07-16 01:09:48', 'other'),
(51, 'You can consume this item to relieve hunger and thirst.', 'apple', 'cid', 0, '2014-07-25 19:09:41', 'uses'),
(50, 'A common misconception is that you can die when licking a battery. This is false and there exists no direct evidence to prove this fact.', 'alkaline_battery_9v', 'cid', 5, '2014-07-22 05:46:49', 'other'),
(48, 'Item conditions have no effect on this item.', 'alkaline_battery_9v', 'cid', 0, '2014-07-21 19:49:00', 'condition'),
(46, 'Lick', 'alkaline_battery_9v', 'cid', 0, '2014-07-19 18:54:01', 'options');

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE IF NOT EXISTS `item_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_raw` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_image` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`id`, `item_raw`, `item_name`, `item_image`, `item_description`, `link`) VALUES
(1, 'alkaline_battery_9v', 'Alkaline Battery 9V', 'alkaline_battery_9v', 'BebulCell alkaline 9V battery. Both electrical contacts on one side of the battery, the positive one being the smaller one.', 'http://dayztip.com/items/alkaline_battery_9v.php'),
(11, 'ballistic_helmet', 'Ballistic Helmet', 'ballistic_helmet', '', 'http://dayztip.com/items/ballistic_helmet.php'),
(10, 'autumn_hunter_pants', 'Autumn Hunter Pants', 'autumn_hunter_pants', '', 'http://dayztip.com/items/autumn_hunter_pants.php'),
(8, 'anti-stab_vest', 'Anti-Stab Vest', 'anti-stab_vest', 'A standard vest worn by Police that consists of several layers of woven para-aramid fibers which are capable of reducing the impact of knife attacks.', 'http://dayztip.com/items/anti-stab_vest.php'),
(9, 'apple', 'Apple', 'apple', 'A fresh apple.', 'http://dayztip.com/items/apple.php'),
(12, 'banana', 'Banana', 'banana', '', 'http://dayztip.com/items/banana.php'),
(13, 'black_motobike_helmet', 'Black Motobike Helmet', 'black_motobike_helmet', '', 'http://dayztip.com/items/black_motobike_helmet.php'),
(14, 'blood_bag_kit', 'Blood Bag Kit', 'blood_bag_kit', '', 'http://dayztip.com/items/blood_bag_kit.php'),
(15, 'blue_baseball_cap', 'Blue Baseball Cap', 'blue_baseball_cap', '', 'http://dayztip.com/items/blue_baseball_cap.php'),
(16, 'blue_cargo_pants', 'Blue Cargo Pants', 'blue_cargo_pants', '', 'http://dayztip.com/items/blue_cargo_pants.php'),
(17, 'blue_hoodie', 'Blue Hoodie', 'blue_hoodie', '', 'http://dayztip.com/items/blue_hoodie.php'),
(18, 'blue_jeans', 'Blue Jeans', 'blue_jeans', '', 'http://dayztip.com/items/blue_jeans.php'),
(19, 'blue_motobike_helmet', 'Blue Motobike Helmet', 'blue_motobike_helmet', '', 'http://dayztip.com/items/blue_motobike_helmet.php'),
(20, 'blue_ushanka', 'Blue Ushanka', 'blue_ushanka', '', 'http://dayztip.com/items/blue_ushanka.php'),
(21, 'camo_baseball_cap', 'Camo Baseball Cap', 'camo_baseball_cap', '', 'http://dayztip.com/items/camo_baseball_cap.php'),
(22, 'canned_baked_beans', 'Canned Baked Beans', 'canned_baked_beans', '', 'http://dayztip.com/items/canned_baked_beans.php'),
(23, 'canned_sardines', 'Canned Sardines', 'canned_sardines', '', 'http://dayztip.com/items/canned_sardines.php'),
(24, 'canned_tuna', 'Canned Tuna', 'canned_tuna', '', 'http://dayztip.com/items/canned_tuna.php'),
(25, 'charcoal_tabs', 'Charcoal Tabs', 'charcoal_tabs', '', 'http://dayztip.com/items/charcoal_tabs.php'),
(26, 'crowbar', 'Crowbar', 'crowbar', '', 'http://dayztip.com/items/crowbar.php'),
(27, 'crunchin_crisps_cereal', 'Crunchin Crisps Cereal', 'crunchin_crisps_cereal', '', 'http://dayztip.com/items/crunchin_crisps_cereal.php'),
(28, 'dallas_mask', 'Dallas Mask', 'dallas_mask', '', 'http://dayztip.com/items/dallas_mask.php'),
(29, 'defibrillator', 'Defibrillator', 'defibrillator', '', 'http://dayztip.com/items/defibrillator.php'),
(30, 'disinfectant_spray', 'disinfectant_spray', 'disinfectant_spray', '', 'http://dayztip.com/items/disinfectant_spray.php'),
(31, 'duct_tape', 'Duct Tape', 'duct_tape', '', 'http://dayztip.com/items/duct_tape.php'),
(32, 'firefighter_axe', 'Firefighter Axe', 'firefighter_axe', '', 'http://dayztip.com/items/firefighter_axe.php'),
(33, 'gas_mask', 'Gas Mask', 'gas_mask', '', 'http://dayztip.com/items/gas_mask.php'),
(34, 'gray_hoodie', 'Gray Hoodie', 'gray_hoodie', '', 'http://dayztip.com/items/gray_hoodie.php'),
(35, 'green_hoodie', 'Green Hoodie', 'green_hoodie', '', 'http://dayztip.com/items/green_hoodie.php'),
(36, 'grey_headtorch', 'Grey Headtorch', 'grey_headtorch', '', 'http://dayztip.com/items/grey_headtorch.php'),
(37, 'hammer', 'Hammer', 'hammer', '', 'http://dayztip.com/items/hammer.php'),
(38, 'jungle_boots', 'Jungle Boots', 'jungle_boots', '', 'http://dayztip.com/items/jungle_boots.php'),
(39, 'kiwi', 'Kiwi', 'kiwi', '', 'http://dayztip.com/items/kiwi.php'),
(40, 'low_hiking_boots', 'Low Hiking Boots', 'low_hiking_boots', '', 'http://dayztip.com/items/low_hiking_boots.php'),
(41, 'military_boots', 'Military Boots', 'military_boots', '', 'http://dayztip.com/items/military_boots.php'),
(42, 'pink_baseball_cap', 'Pink Baseball Cap', 'pink_baseball_cap', '', 'http://dayztip.com/items/pink_baseball_cap.php'),
(43, 'radar_cap', 'Radar Cap', 'radar_cap', '', 'http://dayztip.com/items/radar_cap.php'),
(44, 'radar_cap_blue', 'Radar Cap (Blue)', 'radar_cap_blue', '', 'http://dayztip.com/items/radar_cap_blue.php'),
(45, 'radar_cap_green', 'Radar Cap (Green)', 'radar_cap_green', '', 'http://dayztip.com/items/radar_cap_green.php'),
(46, 'radar_cap_red', 'Radar Cap (Red)', 'radar_cap_red', '', 'http://dayztip.com/items/radar_cap_red.php'),
(47, 'rags', 'Rags', 'rags', '', 'http://dayztip.com/items/rags.php'),
(48, 'red_baseball_cap', 'Red Baseball Cap', 'red_baseball_cap', '', 'http://dayztip.com/items/red_baseball_cap.php'),
(49, 'respirator', 'Respirator', 'respirator', '', 'http://dayztip.com/items/respirator.php'),
(50, 'rice', 'Rice', 'rice', '', 'http://dayztip.com/items/rice.php'),
(51, 'rocket_aviators', 'Rocket Aviators', 'rocket_aviators', '', 'http://dayztip.com/items/rocket_aviators.php'),
(52, 'rotten_apple', 'Rotten Apple', 'rotten_apple', '', 'http://dayztip.com/items/rotten_apple.php'),
(53, 'rotten_banana', 'Rotten Banana', 'rotten_banana', '', 'http://dayztip.com/items/rotten_banana.php'),
(54, 'rotten_kiwi', 'Rotten Kiwi', 'rotten_kiwi', '', 'http://dayztip.com/items/rotten_kiwi.php'),
(55, 'rotten_orange', 'Rotten Orange', 'rotten_orange', '', 'http://dayztip.com/items/rotten_orange.php'),
(56, 'shovel', 'Shovel', 'shovel', '', 'http://dayztip.com/items/shovel.php'),
(57, 'tactical_vest', 'Tactical Vest', 'tactical_vest', '', 'http://dayztip.com/items/tactical_vest.php'),
(58, 't-shirt_redblackstripes', 'T-Shirt (Red-Black Stripes)', 't-shirt_redblackstripes', '', 'http://dayztip.com/items/t-shirt_redblackstripes.php'),
(59, 'ttsko_pants', 'TTSKO Pants', 'ttsko_pants', '', 'http://dayztip.com/items/ttsko_pants.php'),
(60, 'uk_assault_vest_DPM_camo', 'UK Assault Vest (DPM Camo)', 'uk_assault_vest_DPM_camo', '', 'http://dayztip.com/items/uk_assault_vest_DPM_camo.php'),
(61, 'uk_assault_vest_olive', 'UK Assault Vest (Olive)', 'uk_assault_vest_olive', '', 'http://dayztip.com/items/uk_assault_vest_olive.php'),
(62, 'wellies', 'Wellies', 'wellies', '', 'http://dayztip.com/items/wellies.php'),
(63, 'white_check_shirt', 'White Check Shirt', 'white_check_shirt', '', 'http://dayztip.com/items/white_check_shirt.php'),
(64, 'White Motobike Helmet', 'white_motobike_helmet', 'White Motobike Helmet', '', 'http://dayztip.com/items/White Motobike Helmet.php'),
(65, 'zluta_kolaloka_soda', 'Zluta Kolaloka Soda', 'zluta_kolaloka_soda', '', 'http://dayztip.com/items/zluta_kolaloka_soda.php'),
(66, 'zluta_malinovka_soda', 'Zluta Malinovka Soda', 'zluta_malinovka_soda', '', 'http://dayztip.com/items/zluta_malinovka_soda.php');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
('cid', 2, 1389),
('steve', 1, 9991),
('helios', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
