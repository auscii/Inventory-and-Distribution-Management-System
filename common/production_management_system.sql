-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 05:04 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production_management_system`
--
CREATE DATABASE IF NOT EXISTS `production_management_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `production_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `pms_activitylogs`
--

CREATE TABLE `pms_activitylogs` (
  `pms_id` int(11) NOT NULL,
  `pms_user` varchar(100) NOT NULL,
  `pms_date` date NOT NULL,
  `pms_action` varchar(100) NOT NULL,
  `pms_position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_activitylogs`
--

INSERT INTO `pms_activitylogs` (`pms_id`, `pms_user`, `pms_date`, `pms_action`, `pms_position`) VALUES
(1, 'Thanos Black Order', '2018-09-21', 'Added Seven Eleven (Customer)', 'Operator'),
(2, 'Thanos Black Order', '2018-09-21', 'Added Costumer Seven Eleven (Customer)', 'Operator'),
(3, 'Thanos Black Order', '2018-09-21', 'Added Lawson (Customer)', 'Operator'),
(4, 'Thanos Black Order', '2018-09-21', 'Added Family Mart (Customer)', 'Operator'),
(5, 'Thanos Black Order', '2018-09-21', 'Added All Day (Customer)', 'Operator'),
(6, 'Thanos Black Order', '2018-09-21', 'Added Alfa Mart (Customer)', 'Operator'),
(7, 'Thanos Black Order', '2018-09-21', 'Added 10Q Convenience Store (Customer)', 'Operator'),
(8, 'Thanos Black Order', '2018-09-21', 'Added Everyday Conveniece Store (Customer)', 'Operator'),
(9, 'Thanos Black Order', '2018-09-21', 'Added Circle K Supply (Customer)', 'Operator'),
(10, 'Thanos Black Order', '2018-09-21', 'Added San Mig Food Ave. (Customer)', 'Operator'),
(11, 'Thanos Black Order', '2018-09-21', 'Added Mini Stop (Customer)', 'Operator'),
(12, 'Thanos Black Order', '2018-09-21', 'Added Euro-Swiss Food Incorporated (Supplier)', 'Operator'),
(13, 'Thanos Black Order', '2018-09-21', 'Added Frankfurters (Supplier)', 'Operator'),
(14, 'Thanos Black Order', '2018-09-21', 'Added Vanilla Chocolate Ice Cream (Supplier Product)', 'Operator'),
(15, 'Thanos Black Order', '2018-09-21', 'Added Ice Cream Premix (Supplier Product)', 'Operator'),
(16, 'Thanos Black Order', '2018-09-21', 'Added Hazel Nuts (Supplier Product)', 'Operator'),
(17, 'Thanos Black Order', '2018-09-21', 'Added Red Meat (Supplier Product)', 'Operator'),
(18, 'Thanos Black Order', '2018-09-21', 'Added Vanilla Chocolate Ice Cream (Raw Material)', 'Operator'),
(19, 'Thanos Black Order', '2018-09-21', 'Added Ice Cream Premix (Raw Material)', 'Operator'),
(20, 'Thanos Black Order', '2018-09-21', 'Added Hazel Nuts (Raw Material)', 'Operator'),
(21, 'Thanos Black Order', '2018-09-21', 'Added Red Meat (Raw Material)', 'Operator'),
(22, 'Felicity Freya', '2018-09-23', 'Added Hazel Nuts (Finished Product)', 'Operator'),
(23, 'Felicity Freya', '2018-09-23', 'Added Ice Cream Premix (Raw Material)', 'Operator'),
(24, 'Felicity Freya', '2018-09-23', 'Added Ice Cream Premix (Raw Material)', 'Operator'),
(25, 'Felicity Freya', '2018-09-23', 'Added Ice Cream Premix (Raw Material)', 'Operator'),
(26, 'Felicity Freya', '2018-09-23', 'Added Hazel Nuts (Raw Material)', 'Operator'),
(27, 'Felicity Freya', '2018-09-23', 'Added Vanilla Chocolate Ice Cream (Raw Material)', 'Operator'),
(28, 'Felicity Freya', '2018-09-23', 'Added Red Meat (Finished Product)', 'Operator'),
(29, 'Felicity Freya', '2018-09-29', 'Added qwe (Supplier Product)', 'Operator'),
(30, 'Felicity Freya', '2018-09-29', 'Added  (Supplier Product)', 'Operator'),
(31, 'Felicity Freya', '2018-09-29', 'Added  (Supplier Product)', 'Operator'),
(32, 'Felicity Freya', '2018-09-29', 'Added Hazel Nuts (Reference Product)', 'Operator'),
(33, 'Felicity Freya', '2018-09-29', 'Added Vanilla Chocolate Ice Cream (Reference Product)', 'Operator'),
(34, 'Felicity Freya', '2018-09-30', 'Added Ice Cream Premix (Reference Product)', 'Operator'),
(35, 'Felicity Freya', '2018-09-30', 'Added Hazel Nuts (Reference Product)', 'Operator'),
(36, 'Felicity Freya', '2018-09-30', 'Added Ice Cream Premix (Reference Product)', 'Operator'),
(37, 'Felicity Freya', '2018-09-30', 'Added Vanilla Chocolate Ice Cream (Finished Product)', 'Operator'),
(38, 'Felicity Freya', '2018-09-30', 'Added Hazel Nuts (Reference Product)', 'Operator'),
(39, 'Felicity Freya', '2018-09-30', 'Added Vanilla Chocolate Ice Cream (Reference Product)', 'Operator'),
(40, 'Felicity Freya', '2018-09-30', 'Added Liquid Cheese (Supplier Product)', 'Operator'),
(41, 'Felicity Freya', '2018-09-30', 'Added Selecta Ice Cream (Supplier Product)', 'Operator'),
(42, 'Felicity Freya', '2018-09-30', 'Added Selecta Ice Cream (Supplier Product)', 'Operator'),
(43, 'Felicity Freya', '2018-09-30', 'Added Yellow Cheese liquid (Supplier Product)', 'Operator'),
(44, 'Felicity Freya', '2018-09-30', 'Added Selecta Ice Cream (Supplier Product)', 'Operator'),
(45, 'Felicity Freya', '2018-09-30', 'Added Selecta Ice Cream (Supplier Product)', 'Operator'),
(46, 'Felicity Freya', '2018-09-30', 'Added Food Coloring yellow (Supplier Product)', 'Operator'),
(47, 'Felicity Freya', '2018-09-30', 'Added Yellow Cheese Liquid (Supplier Product)', 'Operator'),
(48, 'Felicity Freya', '2018-09-30', 'Added Food Coloring yellow (Raw Material)', 'Operator'),
(49, 'Felicity Freya', '2018-09-30', 'Added Yellow Cheese Liquid (Raw Material)', 'Operator'),
(50, 'Felicity Freya', '2018-09-30', 'Added Selecta Ice Cream (Finished Product)', 'Operator'),
(51, 'Felicity Freya', '2018-09-30', 'Added Selecta Ice Cream (Finished Product)', 'Operator'),
(52, 'Felicity Freya', '2018-09-30', 'Added Food Coloring yellow (Reference Product)', 'Operator'),
(53, 'Felicity Freya', '2018-09-30', 'Added Yellow Cheese Liquid (Reference Product)', 'Operator'),
(54, 'Felicity Freya', '2018-09-30', 'Added Food Coloring yellow (Raw Material)', 'Operator'),
(55, 'Felicity Freya', '2018-09-30', 'Added Frozen Meat (Supplier Product)', 'Operator'),
(56, 'Felicity Freya', '2018-09-30', 'Added Frozen Meat (Finished Product)', 'Operator'),
(57, 'Felicity Freya', '2018-09-30', 'Added Yellow Cheese Liquid (Reference Product)', 'Operator'),
(58, 'Felicity Freya', '2018-09-30', 'Added Yellow Cheese Liquid (Reference Product)', 'Operator'),
(59, 'Felicity Freya', '2018-09-30', 'Added Grains (Supplier Product)', 'Operator'),
(60, 'Felicity Freya', '2018-09-30', 'Added Grains (Raw Material)', 'Operator'),
(61, 'Felicity Freya', '2018-09-30', 'Added Grains (Reference Product)', 'Operator'),
(62, 'Felicity Freya', '2018-10-03', 'Added Baskin Robbins (Supplier)', 'Operator'),
(63, 'Felicity Freya', '2018-10-03', 'Added Selecta Black Forest (Supplier Product)', 'Operator'),
(64, 'Felicity Freya', '2018-10-03', 'Added Selecta Cookies & cream (Supplier Product)', 'Operator'),
(65, 'Felicity Freya', '2018-10-03', 'Added Selecta Cookies & cream (Supplier Product)', 'Operator'),
(66, 'Felicity Freya', '2018-10-03', 'Added Selecta Coffee crumble (Supplier Product)', 'Operator'),
(67, 'Felicity Freya', '2018-10-03', 'Added Selecta Chocolate (Supplier Product)', 'Operator'),
(68, 'Felicity Freya', '2018-10-03', 'Added Selecta Caramel cheesecake (Supplier Product)', 'Operator'),
(69, 'Felicity Freya', '2018-10-03', 'Added Selecta Strawberry (Supplier Product)', 'Operator'),
(70, 'Felicity Freya', '2018-10-03', 'Added Selecta Mango (Supplier Product)', 'Operator'),
(71, 'Felicity Freya', '2018-10-03', 'Added Virginia (Supplier)', 'Operator'),
(72, 'Felicity Freya', '2018-10-03', 'Added Judea (Supplier)', 'Operator'),
(73, 'Felicity Freya', '2018-10-03', 'Added Chicken Tocino (Supplier Product)', 'Operator'),
(74, 'Felicity Freya', '2018-10-03', 'Added Hotdog (Supplier Product)', 'Operator'),
(75, 'Felicity Freya', '2018-10-03', 'Added Ham (Supplier Product)', 'Operator'),
(76, 'Felicity Freya', '2018-10-03', 'Added Bacon (Supplier Product)', 'Operator'),
(77, 'Felicity Freya', '2018-10-03', 'Added Gallon (Supplier Product)', 'Operator'),
(78, 'Felicity Freya', '2018-10-03', 'Added Label (Supplier Product)', 'Operator'),
(79, 'Felicity Freya', '2018-10-03', 'Added Condensed Milk (Supplier Product)', 'Operator'),
(80, 'Felicity Freya', '2018-10-03', 'Added Cocoa Powder (Supplier Product)', 'Operator'),
(81, 'Felicity Freya', '2018-10-03', 'Added Chopped mixed nuts (Supplier Product)', 'Operator'),
(82, 'Felicity Freya', '2018-10-03', 'Added Marshmallow (Supplier Product)', 'Operator'),
(83, 'Felicity Freya', '2018-10-03', 'Added Selecta Black Forest (Finished Product)', 'Operator'),
(84, 'Felicity Freya', '2018-10-03', 'Added Selecta Coffee crumble (Finished Product)', 'Operator'),
(85, 'Felicity Freya', '2018-10-03', 'Added Selecta Chocolate (Finished Product)', 'Operator'),
(86, 'Felicity Freya', '2018-10-03', 'Added Selecta Caramel cheesecake (Finished Product)', 'Operator'),
(87, 'Felicity Freya', '2018-10-03', 'Added Gallon (Raw Material)', 'Operator'),
(88, 'Felicity Freya', '2018-10-03', 'Added Label (Raw Material)', 'Operator'),
(89, 'Felicity Freya', '2018-10-03', 'Added Condensed Milk (Raw Material)', 'Operator'),
(90, 'Felicity Freya', '2018-10-03', 'Added Cocoa Powder (Raw Material)', 'Operator'),
(91, 'Felicity Freya', '2018-10-03', 'Added Chopped mixed nuts (Raw Material)', 'Operator'),
(92, 'Felicity Freya', '2018-10-03', 'Added Marshmallow (Raw Material)', 'Operator'),
(93, 'Felicity Freya', '2018-10-03', 'Added Selecta Mango (Finished Product)', 'Operator'),
(94, 'Felicity Freya', '2018-10-03', 'Added Selecta Strawberry (Finished Product)', 'Operator'),
(95, 'Felicity Freya', '2018-10-03', 'Added 7/11 (Customer)', 'Operator'),
(96, 'Felicity Freya', '2018-10-03', 'Added Lawson (Customer)', 'Operator'),
(97, 'Felicity Freya', '2018-10-03', 'Added All Day (Customer)', 'Operator'),
(98, 'Felicity Freya', '2018-10-03', 'Added FamiltMart (Customer)', 'Operator'),
(99, 'Felicity Freya', '2018-10-03', 'Added Gallon (Reference Product)', 'Operator'),
(100, 'Felicity Freya', '2018-10-03', 'Added Label (Reference Product)', 'Operator'),
(101, 'Felicity Freya', '2018-10-03', 'Added Condensed Milk (Reference Product)', 'Operator'),
(102, 'Felicity Freya', '2018-10-03', 'Added Cocoa Powder (Reference Product)', 'Operator'),
(103, 'Felicity Freya', '2018-10-03', 'Added Chopped mixed nuts (Reference Product)', 'Operator'),
(104, 'Felicity Freya', '2018-10-03', 'Added Marshmallow (Reference Product)', 'Operator'),
(105, 'Giesel Ebar', '2018-10-03', 'Added 5 (Assemble Product)', 'Warehouse Man'),
(106, 'Giesel Ebar', '2018-10-03', 'Added 6 (Assemble Product)', 'Warehouse Man'),
(107, 'Giesel Ebar', '2018-10-03', 'Added 7 (Assemble Product)', 'Warehouse Man'),
(108, 'Giesel Ebar', '2018-10-03', 'Added 8 (Assemble Product)', 'Warehouse Man'),
(109, 'Giesel Ebar', '2018-10-03', 'Added 9 (Assemble Product)', 'Warehouse Man'),
(110, 'Giesel Ebar', '2018-10-03', 'Added 10 (Assemble Product)', 'Warehouse Man'),
(111, 'Alexandra Slavetzky', '2018-10-03', 'Added Chicken Tocino (Finished Product)', 'Operator'),
(112, 'Alexandra Slavetzky', '2018-10-09', 'Added Gallon (Raw Material)', 'Operator'),
(113, 'Giesel Ebar', '2018-10-09', 'Added 8 (Assemble Product)', 'Warehouse Man'),
(114, 'Giesel Ebar', '2018-10-09', 'Added 14 (Assemble Product)', 'Warehouse Man'),
(115, 'Giesel Ebar', '2018-10-09', 'Added 10 (Assemble Product)', 'Warehouse Man'),
(116, 'Giesel Ebar', '2018-10-09', 'Added 7 (Assemble Product)', 'Warehouse Man'),
(117, 'Giesel Ebar', '2018-10-09', 'Added 7 (Assemble Product)', 'Warehouse Man'),
(118, 'Giesel Ebar', '2018-10-09', 'Added 8 (Assemble Product)', 'Warehouse Man'),
(119, 'Giesel Ebar', '2018-10-09', 'Added 10 (Assemble Product)', 'Warehouse Man'),
(120, 'Giesel Ebar', '2018-10-09', 'Added 9 (Assemble Product)', 'Warehouse Man'),
(121, 'Giesel Ebar', '2018-10-09', 'Added 10 (Assemble Product)', 'Warehouse Man'),
(122, 'Giesel Ebar', '2018-10-09', 'Added 6 (Assemble Product)', 'Warehouse Man'),
(123, 'Giesel Ebar', '2018-10-09', 'Added 5 (Assemble Product)', 'Warehouse Man'),
(124, 'Giesel Ebar', '2018-10-09', 'Added 6 (Assemble Product)', 'Warehouse Man'),
(125, 'Giesel Ebar', '2018-10-09', 'Added 10 (Assemble Product)', 'Warehouse Man'),
(126, 'Giesel Ebar', '2018-10-09', 'Added 9 (Assemble Product)', 'Warehouse Man'),
(127, 'Giesel Ebar', '2018-10-09', 'Added 7 (Assemble Product)', 'Warehouse Man'),
(128, 'Alexandra Slavetzky', '2018-10-16', 'Added red meat (Supplier Product)', 'Operator'),
(129, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Supplier Product)', 'Operator'),
(130, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(131, 'Alexandra Slavetzky', '2018-10-16', 'Added Gallon (Raw Material)', 'Operator'),
(132, 'Alexandra Slavetzky', '2018-10-16', 'Added Gallon (Raw Material)', 'Operator'),
(133, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(134, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(135, 'Alexandra Slavetzky', '2018-10-16', 'Added red meat (Raw Material)', 'Operator'),
(136, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(137, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(138, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(139, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(140, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(141, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(142, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(143, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(144, 'Alexandra Slavetzky', '2018-10-16', 'Added TAO (Raw Material)', 'Operator'),
(145, 'Alexandra Slavetzky', '2018-10-16', 'Added Bacon (Finished Product)', 'Operator'),
(146, 'Alexandra Slavetzky', '2018-10-16', 'Added Hotdog (Finished Product)', 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `pms_assembledetails`
--

CREATE TABLE `pms_assembledetails` (
  `pms_id` int(11) NOT NULL,
  `pms_assemble` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_assembledetails`
--

INSERT INTO `pms_assembledetails` (`pms_id`, `pms_assemble`, `pms_rm_sku`, `pms_date`, `pms_qty`) VALUES
(1, 1, 6, '2018-10-09 22:49:44', 1),
(2, 2, 5, '2018-10-09 22:50:48', 55),
(3, 2, 6, '2018-10-09 22:51:02', 10),
(4, 3, 10, '2018-10-09 22:52:36', 1),
(5, 3, 9, '2018-10-09 22:52:48', 2),
(6, 3, 7, '2018-10-09 22:53:09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pms_assembleheader`
--

CREATE TABLE `pms_assembleheader` (
  `pms_id` int(11) NOT NULL,
  `pms_fp_sku` int(11) NOT NULL,
  `pms_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_joborder` varchar(11) NOT NULL,
  `pms_remarks` text NOT NULL,
  `pms_assembleby` varchar(150) NOT NULL,
  `pms_checkedby` varchar(150) NOT NULL,
  `pms_supervisor` varchar(150) NOT NULL,
  `pms_posted` int(1) NOT NULL,
  `pms_expiration_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_assembleheader`
--

INSERT INTO `pms_assembleheader` (`pms_id`, `pms_fp_sku`, `pms_datetime`, `pms_joborder`, `pms_remarks`, `pms_assembleby`, `pms_checkedby`, `pms_supervisor`, `pms_posted`, `pms_expiration_date`) VALUES
(1, 4, '2018-10-09 22:48:32', 'JO0287', 'NACHZ', 'Giesel Ebar', '', 'Sean Narvasa', 1, '2018-04-15'),
(2, 11, '2018-10-09 22:50:21', 'JO0287', 'AZXC', 'Giesel Ebar', '', 'Sean Narvasa', 1, '2016-04-24'),
(3, 13, '2018-10-09 22:51:52', 'JO0287', 'NZXC', 'Giesel Ebar', '', 'Sean Narvasa', 1, '2016-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `pms_customers`
--

CREATE TABLE `pms_customers` (
  `pms_id` int(11) NOT NULL,
  `pms_fullname` varchar(150) NOT NULL,
  `pms_address` text NOT NULL,
  `pms_phone` varchar(20) NOT NULL,
  `pms_email` varchar(150) NOT NULL,
  `pms_image` text NOT NULL,
  `pms_terms` int(3) NOT NULL,
  `pms_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_archive_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_customers`
--

INSERT INTO `pms_customers` (`pms_id`, `pms_fullname`, `pms_address`, `pms_phone`, `pms_email`, `pms_image`, `pms_terms`, `pms_created`, `pms_archive_status`) VALUES
(1, '7/11', 'Pasay City', '09298558779', 'seven11@gmail.com', 'Seven Eleven.PNG', 15, '2018-10-03 14:42:23', 0),
(2, 'Lawson', 'Makati, Metro Manila', '09159857214', 'lawson101@gmail.com', 'lawson.PNG', 30, '2018-10-03 14:43:37', 0),
(3, 'All Day', '#704 Valencia St. Adventure Food Park', '09298558779', 'hubbys@yahoo.com', '', 45, '2018-10-03 14:44:08', 0),
(4, 'FamiltMart', 'Taguig City', '09099907112', 'familymart@gmail.com', 'FamilyMart.PNG', 15, '2018-10-03 14:44:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pms_finishingdetails`
--

CREATE TABLE `pms_finishingdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_finishing` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_finishingdetails`
--

INSERT INTO `pms_finishingdetails` (`pms_id`, `pms_finishing`, `pms_rm_sku`, `pms_date`, `pms_qty`) VALUES
(1, 1, 6, '2018-10-09 22:49:53', 1),
(2, 2, 5, '2018-10-09 22:51:16', 55),
(3, 2, 6, '2018-10-09 22:51:17', 10),
(4, 3, 10, '2018-10-09 22:53:31', 1),
(5, 3, 9, '2018-10-09 22:53:31', 2),
(6, 3, 7, '2018-10-09 22:53:31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pms_finishingheader`
--

CREATE TABLE `pms_finishingheader` (
  `pms_id` int(11) NOT NULL,
  `pms_fp_sku` int(11) NOT NULL,
  `pms_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_joborder` varchar(11) NOT NULL,
  `pms_production_qty` decimal(16,2) NOT NULL,
  `pms_remarks` text NOT NULL,
  `pms_checkedby` varchar(150) NOT NULL,
  `pms_supervisor` varchar(150) NOT NULL,
  `pms_posted` int(1) NOT NULL,
  `pms_posteddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_finishing_confirm` int(1) NOT NULL,
  `pms_finishing_distribute` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_finishingheader`
--

INSERT INTO `pms_finishingheader` (`pms_id`, `pms_fp_sku`, `pms_datetime`, `pms_joborder`, `pms_production_qty`, `pms_remarks`, `pms_checkedby`, `pms_supervisor`, `pms_posted`, `pms_posteddate`, `pms_finishing_confirm`, `pms_finishing_distribute`) VALUES
(1, 4, '2018-10-09 22:49:53', 'JO0287', '0.00', 'NACHZ', 'Giesel Ebar', 'Sean Narvasa', 0, '2018-10-09 22:49:53', 0, 0),
(2, 11, '2018-10-09 22:51:16', 'JO0287', '0.00', 'AZXC', 'Giesel Ebar', 'Sean Narvasa', 0, '2018-10-09 22:51:16', 0, 0),
(3, 13, '2018-10-09 22:53:31', 'JO0287', '0.00', 'NZXC', 'Giesel Ebar', 'Sean Narvasa', 1, '2018-10-09 22:53:31', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pms_joborderdetails`
--

CREATE TABLE `pms_joborderdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_joborder` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_orderqty` int(10) NOT NULL,
  `pms_unit` varchar(50) NOT NULL,
  `pms_description` text NOT NULL,
  `pms_unitprice` decimal(16,2) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pms_joborderheader`
--

CREATE TABLE `pms_joborderheader` (
  `pms_id` int(11) NOT NULL,
  `pms_jo_no` varchar(100) NOT NULL,
  `pms_operator_name` varchar(50) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_purchaseorder` int(11) NOT NULL,
  `pms_customer` varchar(100) NOT NULL,
  `pms_deliverydate` date NOT NULL,
  `pms_total` decimal(16,2) NOT NULL,
  `pms_remarks` text NOT NULL,
  `pms_job_description` text NOT NULL,
  `pms_joborder_qty` int(50) NOT NULL,
  `pms_joborder_prod_item` varchar(100) NOT NULL,
  `pms_month` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_joborderheader`
--

INSERT INTO `pms_joborderheader` (`pms_id`, `pms_jo_no`, `pms_operator_name`, `pms_date`, `pms_purchaseorder`, `pms_customer`, `pms_deliverydate`, `pms_total`, `pms_remarks`, `pms_job_description`, `pms_joborder_qty`, `pms_joborder_prod_item`, `pms_month`) VALUES
(1, 'JO0287', 'Alexandra Slavetzky', '2018-10-09 19:13:18', 0, 'Lawson', '2018-12-31', '0.00', 'NA', '', 10000, 'Selecta Black Forest', 'October'),
(2, 'JO0326', 'Alexandra Slavetzky', '2018-10-10 01:01:41', 0, 'FamiltMart', '2021-02-05', '0.00', 'NA', '', 500, 'Selecta Coffee crumble', '');

-- --------------------------------------------------------

--
-- Table structure for table `pms_logs`
--

CREATE TABLE `pms_logs` (
  `pms_id` int(11) NOT NULL,
  `pms_user` int(11) NOT NULL,
  `pms_module` varchar(250) NOT NULL,
  `pms_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pms_purchaseorderdetails`
--

CREATE TABLE `pms_purchaseorderdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_purchaseorder` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_qty` int(11) NOT NULL,
  `pms_cost` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_purchaseorderdetails`
--

INSERT INTO `pms_purchaseorderdetails` (`pms_id`, `pms_purchaseorder`, `pms_rm_sku`, `pms_qty`, `pms_cost`) VALUES
(1, 1, 15, 10, '45.00');

-- --------------------------------------------------------

--
-- Table structure for table `pms_purchaseorderheader`
--

CREATE TABLE `pms_purchaseorderheader` (
  `pms_id` int(11) NOT NULL,
  `pms_po_number` varchar(255) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_duedate` date NOT NULL,
  `pms_supplier` varchar(100) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL,
  `pms_paid` decimal(16,2) NOT NULL,
  `pms_settled` int(1) NOT NULL,
  `pms_debitmemo` decimal(16,2) NOT NULL,
  `pms_posted` int(1) NOT NULL,
  `pms_posteddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_reference` varchar(50) NOT NULL,
  `pms_checkno` varchar(50) NOT NULL,
  `pms_checkdate` date NOT NULL,
  `pms_bankname` varchar(150) NOT NULL,
  `pms_bankaccountno` varchar(50) NOT NULL,
  `pms_bankaccountname` varchar(150) NOT NULL,
  `pms_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_purchaseorderheader`
--

INSERT INTO `pms_purchaseorderheader` (`pms_id`, `pms_po_number`, `pms_date`, `pms_duedate`, `pms_supplier`, `pms_total`, `pms_paid`, `pms_settled`, `pms_debitmemo`, `pms_posted`, `pms_posteddate`, `pms_reference`, `pms_checkno`, `pms_checkdate`, `pms_bankname`, `pms_bankaccountno`, `pms_bankaccountname`, `pms_remarks`) VALUES
(1, 'PO0526', '2018-10-09 20:10:05', '2020-02-03', 'Judea', '0.00', '100.00', 0, '0.00', 1, '2018-10-09 20:10:05', '', '123123', '2018-12-31', 'Land Bank of the Philippines (LBP)', '1123123', 'BPOASD', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `pms_rawmaterials`
--

CREATE TABLE `pms_rawmaterials` (
  `pms_id` int(11) NOT NULL,
  `pms_supplier_number` int(11) NOT NULL,
  `pms_sku` varchar(50) NOT NULL,
  `pms_item` varchar(250) NOT NULL,
  `pms_description` text NOT NULL,
  `pms_qty` int(11) NOT NULL,
  `pms_unit` int(11) NOT NULL,
  `pms_type` varchar(50) NOT NULL,
  `pms_cost` decimal(16,2) NOT NULL,
  `pms_wtpc_thickness` decimal(16,2) NOT NULL,
  `pms_wtpc_width` decimal(16,2) NOT NULL,
  `pms_finishedproduct` int(1) NOT NULL,
  `pms_finishedproduct_code` int(11) NOT NULL,
  `pms_image` text NOT NULL,
  `pms_archive_status` int(1) NOT NULL,
  `pms_type_of_units` varchar(50) NOT NULL,
  `pms_supplier_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_rawmaterials`
--

INSERT INTO `pms_rawmaterials` (`pms_id`, `pms_supplier_number`, `pms_sku`, `pms_item`, `pms_description`, `pms_qty`, `pms_unit`, `pms_type`, `pms_cost`, `pms_wtpc_thickness`, `pms_wtpc_width`, `pms_finishedproduct`, `pms_finishedproduct_code`, `pms_image`, `pms_archive_status`, `pms_type_of_units`, `pms_supplier_name`) VALUES
(1, 0, 'FPIDMS711', 'Selecta Black Forest', 'Selecta Ice cream', 310, 250, 'Plastics Packaging', '149.00', '10.00', '5.00', 1, 0, 'Selecta black forest.png', 0, 'Gram (g)', 'Baskin Robbins'),
(2, 0, 'FPIDMS443', 'Selecta Coffee crumble', 'Selecta Ice cream', 140, 250, 'Plastics Packaging', '149.00', '2.00', '15.00', 1, 0, 'Selecta Coffee crumble.png', 0, 'Gram (g)', 'Baskin Robbins'),
(3, 0, 'FPIDMS222', 'Selecta Chocolate', 'Selecta Ice cream', 200, 500, 'Plastics Packaging', '250.00', '10.00', '20.00', 1, 0, 'Selecta Chocolate.png', 0, '', 'Baskin Robbins'),
(4, 0, 'FPIDMS231', 'Selecta Caramel cheesecake', 'Selecta Ice cream', 75, 600, 'Plastics Packaging', '349.00', '4.00', '15.00', 1, 0, 'Selecta Caramel cheesecake.png', 0, 'Kilogram (kg)', 'Baskin Robbins'),
(5, 13, 'RMIDMS651', 'Gallon', 'Used for storing ice cream', 100, 40, 'Flexible Packaging', '150.00', '10.00', '20.00', 0, 0, 'gallon.png', 0, 'Gram (g)', 'Judea'),
(6, 14, 'RMIDMS123', 'Label', 'Nutrition Facts for Ice cream', 75, 10, 'Flexible Packaging', '50.00', '4.00', '6.00', 0, 0, 'label.png', 0, 'Miligram (mg)', 'Judea'),
(7, 15, 'RMIDMS321', 'Condensed Milk', 'used for sweetening the product', 30, 60, 'Preservation Packaging', '45.00', '37.00', '45.00', 0, 0, 'Condensed milk.png', 0, 'Gram (g)', 'Judea'),
(8, 16, 'RMIDMS121', 'Cocoa Powder', 'Used for flavoring ', 40, 1, 'Preservation Packaging', '60.00', '2.00', '7.00', 0, 0, 'cocoa powder.png', 0, 'Kilogram (kg)', 'Judea'),
(9, 17, 'RMIDMS441', 'Chopped mixed nuts', 'added ingredients for black forest ice cream', 35, 20, 'Plastics Packaging', '75.00', '5.00', '9.00', 0, 0, 'Chopped mixed nuts.png', 0, 'Kilogram (kg)', 'Judea'),
(10, 18, 'RMIDMS143', 'Marshmallow', 'added ingredient for black forest ice cream', 45, 15, '', '40.00', '10.00', '20.00', 0, 0, 'marshmallow.png', 0, 'Kilogram (kg)', 'Judea'),
(11, 0, 'FPIDMS911', 'Selecta Mango', 'Selecta Ice cream', 150, 500, 'Plastics Packaging', '250.00', '3.00', '6.00', 1, 1, 'Selecta Mango.png', 0, 'Gram (g)', 'Baskin Robbins'),
(12, 0, 'FPIDMS989', 'Selecta Strawberry', 'Selecta Ice cream', 125, 500, 'Plastics Packaging', '350.00', '60.00', '20.00', 1, 1, 'Selecta Strawberry.png', 0, 'Kilogram (kg)', 'Baskin Robbins'),
(13, 9, 'FPIDMS814', 'Chicken Tocino', 'Tocino Product', 80, 1, 'Plastics Packaging', '50.00', '34.00', '20.00', 1, 0, 'Chicken tocino.png', 0, 'Kilogram (kg)', 'Virginia'),
(22, 20, 'RMIDMS852', 'TAO', 'TAOOOO', 5, 990, 'Flexible Packaging', '99.00', '0.00', '0.00', 0, 0, '1.jpg', 0, 'Miligram (mg)', 'Judea'),
(23, 12, 'FPIDMS171', 'Bacon', 'Bacon Product', 5, 1, 'Flexible Packaging', '350.00', '0.00', '0.00', 1, 0, 'Bacon.PNG', 0, 'Kilogram (kg)', 'Virginia'),
(24, 10, 'FPIDMS666', 'Hotdog', 'Hotdog Product', 20, 2, 'Flexible Packaging', '48.00', '0.00', '0.00', 1, 0, 'Hotdog.PNG', 0, 'Kilogram (kg)', 'Virginia');

-- --------------------------------------------------------

--
-- Table structure for table `pms_referenceproducts`
--

CREATE TABLE `pms_referenceproducts` (
  `pms_id` int(11) NOT NULL,
  `pms_reference_product_itemname` varchar(100) NOT NULL,
  `pms_order_quantity` int(250) NOT NULL,
  `pms_unit` int(11) NOT NULL,
  `pms_typeunit` varchar(20) NOT NULL,
  `pms_unit_price` decimal(16,2) NOT NULL,
  `pms_image` text NOT NULL,
  `pms_archive_status` int(1) NOT NULL,
  `pms_product_item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_referenceproducts`
--

INSERT INTO `pms_referenceproducts` (`pms_id`, `pms_reference_product_itemname`, `pms_order_quantity`, `pms_unit`, `pms_typeunit`, `pms_unit_price`, `pms_image`, `pms_archive_status`, `pms_product_item_name`) VALUES
(1, 'Gallon', 100, 40, 'Gram (g)', '150.00', 'gallon.png', 0, 'Selecta Black Forest'),
(2, 'Label', 100, 10, 'Miligram (mg)', '50.00', 'label.png', 0, 'Selecta Black Forest'),
(3, 'Condensed Milk', 100, 60, 'Gram (g)', '45.00', '', 0, 'Selecta Black Forest'),
(4, 'Cocoa Powder', 100, 1, 'Kilogram (kg)', '60.00', 'cocoa powder.png', 0, 'Selecta Black Forest'),
(5, 'Chopped mixed nuts', 100, 20, 'Kilogram (kg)', '75.00', 'Chopped mixed nuts.png', 0, 'Selecta Black Forest'),
(6, 'Marshmallow', 100, 15, 'Kilogram (kg)', '40.00', 'marshmallow.png', 0, 'Selecta Black Forest');

-- --------------------------------------------------------

--
-- Table structure for table `pms_returns_customer_details`
--

CREATE TABLE `pms_returns_customer_details` (
  `pms_id` int(11) NOT NULL,
  `pms_purchaseorder` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_qty` int(11) NOT NULL,
  `pms_cost` decimal(16,2) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pms_returns_customer_header`
--

CREATE TABLE `pms_returns_customer_header` (
  `pms_id` int(11) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_customer` varchar(100) NOT NULL,
  `pms_jo_no` varchar(100) NOT NULL,
  `pms_operator_name` varchar(50) NOT NULL,
  `pms_deliverydate` date NOT NULL,
  `pms_joborder_prod_item` varchar(50) NOT NULL,
  `pms_prod_qty` int(255) NOT NULL,
  `pms_remarks` text NOT NULL,
  `pms_posted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_returns_customer_header`
--

INSERT INTO `pms_returns_customer_header` (`pms_id`, `pms_date`, `pms_customer`, `pms_jo_no`, `pms_operator_name`, `pms_deliverydate`, `pms_joborder_prod_item`, `pms_prod_qty`, `pms_remarks`, `pms_posted`) VALUES
(8, '2018-10-09 19:31:02', 'Lawson', 'JO0287', 'Alexandra Slavetzky', '2018-12-31', 'Selecta Black Forest', 20, 'NA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pms_returnsdetails`
--

CREATE TABLE `pms_returnsdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_purchaseorder` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_qty` int(11) NOT NULL,
  `pms_cost` decimal(16,2) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_returnsdetails`
--

INSERT INTO `pms_returnsdetails` (`pms_id`, `pms_purchaseorder`, `pms_rm_sku`, `pms_qty`, `pms_cost`, `pms_total`) VALUES
(1, 1, 11, 8, '250.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `pms_returnsheader`
--

CREATE TABLE `pms_returnsheader` (
  `pms_id` int(11) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_supplier` varchar(100) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL,
  `pms_paid` decimal(16,2) NOT NULL,
  `pms_settled` int(1) NOT NULL,
  `pms_debitmemo` decimal(16,2) NOT NULL,
  `pms_posted` int(1) NOT NULL,
  `pms_posteddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_reference` varchar(50) NOT NULL,
  `pms_checkno` varchar(50) NOT NULL,
  `pms_checkdate` date NOT NULL,
  `pms_bankname` varchar(150) NOT NULL,
  `pms_bankaccountno` varchar(50) NOT NULL,
  `pms_bankaccountname` varchar(150) NOT NULL,
  `pms_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_returnsheader`
--

INSERT INTO `pms_returnsheader` (`pms_id`, `pms_date`, `pms_supplier`, `pms_total`, `pms_paid`, `pms_settled`, `pms_debitmemo`, `pms_posted`, `pms_posteddate`, `pms_reference`, `pms_checkno`, `pms_checkdate`, `pms_bankname`, `pms_bankaccountno`, `pms_bankaccountname`, `pms_remarks`) VALUES
(1, '2018-10-04 01:26:17', 'Judea', '0.00', '7000.00', 0, '424.00', 1, '2018-10-04 01:26:17', 'NA', '13323', '2018-10-09', 'BDO', '1333', 'Giesel BDO', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `pms_salesorderdetails`
--

CREATE TABLE `pms_salesorderdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_salesorder` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_qty` int(11) NOT NULL,
  `pms_price` decimal(16,2) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_salesorderdetails`
--

INSERT INTO `pms_salesorderdetails` (`pms_id`, `pms_salesorder`, `pms_rm_sku`, `pms_qty`, `pms_price`, `pms_total`) VALUES
(1, 1, 3, 10, '250.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `pms_salesorderheader`
--

CREATE TABLE `pms_salesorderheader` (
  `pms_id` int(11) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_duedate` date NOT NULL,
  `pms_deliveryreceipt` int(11) NOT NULL,
  `pms_purchaseorder` int(11) NOT NULL,
  `pms_customer` varchar(150) NOT NULL,
  `pms_shippingmark` text NOT NULL,
  `pms_carriers` text NOT NULL,
  `pms_checkedby` varchar(150) NOT NULL,
  `pms_salesman` varchar(150) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL,
  `pms_paid` decimal(16,2) NOT NULL,
  `pms_settled` int(1) NOT NULL,
  `pms_creditmemo` decimal(16,2) NOT NULL,
  `pms_posted` int(1) NOT NULL,
  `pms_posteddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_reference` varchar(50) NOT NULL,
  `pms_checkno` varchar(50) NOT NULL,
  `pms_checkdate` date NOT NULL,
  `pms_bankname` varchar(150) NOT NULL,
  `pms_bankaccountno` varchar(50) NOT NULL,
  `pms_bankaccountname` varchar(150) NOT NULL,
  `pms_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_salesorderheader`
--

INSERT INTO `pms_salesorderheader` (`pms_id`, `pms_date`, `pms_duedate`, `pms_deliveryreceipt`, `pms_purchaseorder`, `pms_customer`, `pms_shippingmark`, `pms_carriers`, `pms_checkedby`, `pms_salesman`, `pms_total`, `pms_paid`, `pms_settled`, `pms_creditmemo`, `pms_posted`, `pms_posteddate`, `pms_reference`, `pms_checkno`, `pms_checkdate`, `pms_bankname`, `pms_bankaccountno`, `pms_bankaccountname`, `pms_remarks`) VALUES
(1, '2018-10-09 20:12:53', '2020-02-03', 0, 0, 'All Day', '', '', 'Alexandra Slavetzky', '', '0.00', '0.00', 0, '0.00', 0, '2018-10-09 20:12:53', '', '123123', '2018-12-31', 'Land Bank of the Philippines (LBP)', '1123123', 'BPOASD', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `pms_stockcard`
--

CREATE TABLE `pms_stockcard` (
  `pms_id` int(11) NOT NULL,
  `pms_sku` varchar(50) NOT NULL,
  `pms_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_in` decimal(16,2) NOT NULL,
  `pms_out` decimal(16,2) NOT NULL,
  `pms_transtype` varchar(200) NOT NULL,
  `pms_transid` int(11) NOT NULL,
  `pms_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_stockcard`
--

INSERT INTO `pms_stockcard` (`pms_id`, `pms_sku`, `pms_datetime`, `pms_in`, `pms_out`, `pms_transtype`, `pms_transid`, `pms_user`) VALUES
(1, 'Chicken Tocino', '2018-10-09 22:58:34', '0.00', '0.00', 'Finishing Product', 3, 'Giesel Ebar');

-- --------------------------------------------------------

--
-- Table structure for table `pms_suppliers`
--

CREATE TABLE `pms_suppliers` (
  `pms_id` int(11) NOT NULL,
  `pms_fullname` varchar(150) NOT NULL,
  `pms_address` text NOT NULL,
  `pms_phone` varchar(20) NOT NULL,
  `pms_email` varchar(150) NOT NULL,
  `pms_image` text NOT NULL,
  `pms_terms` int(3) NOT NULL,
  `pms_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_archive_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_suppliers`
--

INSERT INTO `pms_suppliers` (`pms_id`, `pms_fullname`, `pms_address`, `pms_phone`, `pms_email`, `pms_image`, `pms_terms`, `pms_created`, `pms_archive_status`) VALUES
(1, 'Baskin Robbins', 'Paco, Manila, Metro Manila', '09101601305', 'gieselebar@gmail.com', 'Baskin Robbins.png', 30, '2018-10-03 13:41:28', 0),
(2, 'Virginia', '#704 Valencia St. Adventure Food Park', '09298558779', 'virginia@gmail.com', 'Virginia.png', 30, '2018-10-03 14:07:07', 0),
(3, 'Judea', 'Pasig ', '09154889048', 'judea101@gmail.com', 'Judea.PNG', 15, '2018-10-03 14:10:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pms_suppliers_product`
--

CREATE TABLE `pms_suppliers_product` (
  `pms_id` int(11) NOT NULL,
  `pms_cat_id` int(11) NOT NULL,
  `pms_suprod_letter_id` varchar(100) NOT NULL,
  `pms_suprod_image` text NOT NULL,
  `pms_suprod_itemname` varchar(50) NOT NULL,
  `pms_suprod_description` text NOT NULL,
  `pms_suprod_unit` int(11) NOT NULL,
  `pms_suprod_typeunit` varchar(20) NOT NULL,
  `pms_suprod_cost` decimal(16,2) NOT NULL,
  `pms_suprod_suppliername` varchar(20) NOT NULL,
  `pms_suprod_status` int(1) NOT NULL,
  `pms_suprod_finishproduct` int(1) NOT NULL,
  `pms_suprod_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_suppliers_product`
--

INSERT INTO `pms_suppliers_product` (`pms_id`, `pms_cat_id`, `pms_suprod_letter_id`, `pms_suprod_image`, `pms_suprod_itemname`, `pms_suprod_description`, `pms_suprod_unit`, `pms_suprod_typeunit`, `pms_suprod_cost`, `pms_suprod_suppliername`, `pms_suprod_status`, `pms_suprod_finishproduct`, `pms_suprod_quantity`) VALUES
(1, 1, 'IDMS711', 'Selecta black forest.png', 'Selecta Black Forest', 'Selecta Ice cream', 250, 'Gram (g)', '149.00', 'Baskin Robbins', 0, 1, 1000),
(2, 1, 'IDMS912', 'Selecta Cookies & cream.png', 'Selecta Cookies & cream', 'Ice cream', 250, 'Gram (g)', '149.00', 'Baskin Robbins', 0, 1, 200),
(3, 1, 'IDMS990', 'Selecta Cookies & cream.png', 'Selecta Cookies & cream', 'Ice cream', 250, 'Gram (g)', '149.00', 'Baskin Robbins', 1, 1, 200),
(4, 1, 'IDMS443', 'Selecta Coffee crumble.png', 'Selecta Coffee crumble', 'Selecta Ice cream', 250, 'Gram (g)', '149.00', 'Baskin Robbins', 0, 1, 350),
(5, 1, 'IDMS222', 'Selecta Chocolate.png', 'Selecta Chocolate', 'Selecta Ice cream', 500, '', '250.00', 'Baskin Robbins', 0, 1, 400),
(6, 1, 'IDMS231', 'Selecta Caramel cheesecake.png', 'Selecta Caramel cheesecake', 'Selecta Ice cream', 600, 'Kilogram (kg)', '349.00', 'Baskin Robbins', 0, 1, 100),
(7, 1, 'IDMS989', 'Selecta Strawberry.png', 'Selecta Strawberry', 'Selecta Ice cream', 500, 'Kilogram (kg)', '350.00', 'Baskin Robbins', 0, 1, 150),
(8, 1, 'IDMS911', 'Selecta Mango.png', 'Selecta Mango', 'Selecta Ice cream', 500, 'Gram (g)', '250.00', 'Baskin Robbins', 0, 1, 245),
(9, 2, 'IDMS814', 'Chicken tocino.png', 'Chicken Tocino', 'Tocino Product', 1, 'Kilogram (kg)', '50.00', 'Virginia', 0, 1, 150),
(10, 2, 'IDMS666', 'Hotdog.PNG', 'Hotdog', 'Hotdog Product', 2, 'Kilogram (kg)', '48.00', 'Virginia', 0, 1, 330),
(11, 2, 'IDMS331', 'Ham.PNG', 'Ham', 'Ham Product', 1, 'Kilogram (kg)', '37.00', 'Virginia', 0, 1, 100),
(12, 2, 'IDMS171', 'Bacon.PNG', 'Bacon', 'Bacon Product', 1, 'Kilogram (kg)', '350.00', 'Virginia', 0, 1, 145),
(13, 3, 'IDMS651', 'gallon.png', 'Gallon', 'Used for storing ice cream', 40, 'Gram (g)', '150.00', 'Judea', 0, 0, 180),
(14, 3, 'IDMS123', 'label.png', 'Label', 'Nutrition Facts for Ice cream', 10, 'Miligram (mg)', '50.00', 'Judea', 0, 0, 200),
(15, 3, 'IDMS321', 'Condensed milk.png', 'Condensed Milk', 'used for sweetening the product', 60, 'Gram (g)', '45.00', 'Judea', 0, 0, 40),
(16, 3, 'IDMS121', 'cocoa powder.png', 'Cocoa Powder', 'Used for flavoring ', 1, 'Kilogram (kg)', '60.00', 'Judea', 0, 0, 65),
(17, 3, 'IDMS441', 'Chopped mixed nuts.png', 'Chopped mixed nuts', 'added ingredients for black forest ice cream', 20, 'Kilogram (kg)', '75.00', 'Judea', 0, 0, 50),
(18, 3, 'IDMS143', 'marshmallow.png', 'Marshmallow', 'added ingredient for black forest ice cream', 15, 'Kilogram (kg)', '40.00', 'Judea', 0, 0, 50),
(19, 3, 'IDMS287', '36684030_1687747077941611_6611036291632988160_n (1).png', 'red meat', 'red meatred meatred meatred meat', 50, 'Kilogram (kg)', '231231231.00', 'Judea', 0, 0, 90),
(20, 3, 'IDMS852', '1.jpg', 'TAO', 'TAOOOO', 990, 'Miligram (mg)', '99.00', 'Judea', 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pms_units`
--

CREATE TABLE `pms_units` (
  `pms_id` int(11) NOT NULL,
  `pms_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pms_users`
--

CREATE TABLE `pms_users` (
  `pms_id` int(11) NOT NULL,
  `pms_username` varchar(50) NOT NULL,
  `pms_password` varchar(50) NOT NULL,
  `pms_usertype` varchar(30) NOT NULL,
  `pms_fullname` varchar(150) NOT NULL,
  `pms_image` text NOT NULL,
  `pms_datetime_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_users`
--

INSERT INTO `pms_users` (`pms_id`, `pms_username`, `pms_password`, `pms_usertype`, `pms_fullname`, `pms_image`, `pms_datetime_reg`) VALUES
(56, 'seann', '01dc8040a99b229c36807b5b6c5eab2b', 'Supervisor', 'Sean Narvasa', 'thanos.png', '2018-06-20 18:59:32'),
(80, 'alpha9', '6a8193fc8c8ac702549b5aa674830e65', 'Warehouse Man', 'Giesel Ebar', 'huge_avatar', '2018-07-25 20:19:45'),
(85, 'op1', '4736b2b496ba3de748c6eea6c6b9ca65', 'Operator', 'Alexandra Slavetzky', 'KatyPerry2.jpg', '2018-08-05 07:39:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pms_activitylogs`
--
ALTER TABLE `pms_activitylogs`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_assembledetails`
--
ALTER TABLE `pms_assembledetails`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_assembleheader`
--
ALTER TABLE `pms_assembleheader`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_customers`
--
ALTER TABLE `pms_customers`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_finishingdetails`
--
ALTER TABLE `pms_finishingdetails`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_finishingheader`
--
ALTER TABLE `pms_finishingheader`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_joborderdetails`
--
ALTER TABLE `pms_joborderdetails`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_joborderheader`
--
ALTER TABLE `pms_joborderheader`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_logs`
--
ALTER TABLE `pms_logs`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_purchaseorderdetails`
--
ALTER TABLE `pms_purchaseorderdetails`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_purchaseorderheader`
--
ALTER TABLE `pms_purchaseorderheader`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_rawmaterials`
--
ALTER TABLE `pms_rawmaterials`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_referenceproducts`
--
ALTER TABLE `pms_referenceproducts`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_returns_customer_details`
--
ALTER TABLE `pms_returns_customer_details`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_returns_customer_header`
--
ALTER TABLE `pms_returns_customer_header`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_returnsdetails`
--
ALTER TABLE `pms_returnsdetails`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_returnsheader`
--
ALTER TABLE `pms_returnsheader`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_salesorderdetails`
--
ALTER TABLE `pms_salesorderdetails`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_salesorderheader`
--
ALTER TABLE `pms_salesorderheader`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_stockcard`
--
ALTER TABLE `pms_stockcard`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_suppliers`
--
ALTER TABLE `pms_suppliers`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_suppliers_product`
--
ALTER TABLE `pms_suppliers_product`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_units`
--
ALTER TABLE `pms_units`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `pms_users`
--
ALTER TABLE `pms_users`
  ADD PRIMARY KEY (`pms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pms_activitylogs`
--
ALTER TABLE `pms_activitylogs`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `pms_assembledetails`
--
ALTER TABLE `pms_assembledetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pms_assembleheader`
--
ALTER TABLE `pms_assembleheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pms_customers`
--
ALTER TABLE `pms_customers`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pms_finishingdetails`
--
ALTER TABLE `pms_finishingdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pms_finishingheader`
--
ALTER TABLE `pms_finishingheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pms_joborderdetails`
--
ALTER TABLE `pms_joborderdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_joborderheader`
--
ALTER TABLE `pms_joborderheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pms_logs`
--
ALTER TABLE `pms_logs`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_purchaseorderdetails`
--
ALTER TABLE `pms_purchaseorderdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_purchaseorderheader`
--
ALTER TABLE `pms_purchaseorderheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_rawmaterials`
--
ALTER TABLE `pms_rawmaterials`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pms_referenceproducts`
--
ALTER TABLE `pms_referenceproducts`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pms_returns_customer_details`
--
ALTER TABLE `pms_returns_customer_details`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_returns_customer_header`
--
ALTER TABLE `pms_returns_customer_header`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pms_returnsdetails`
--
ALTER TABLE `pms_returnsdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_returnsheader`
--
ALTER TABLE `pms_returnsheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_salesorderdetails`
--
ALTER TABLE `pms_salesorderdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_salesorderheader`
--
ALTER TABLE `pms_salesorderheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_stockcard`
--
ALTER TABLE `pms_stockcard`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_suppliers`
--
ALTER TABLE `pms_suppliers`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pms_suppliers_product`
--
ALTER TABLE `pms_suppliers_product`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pms_units`
--
ALTER TABLE `pms_units`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_users`
--
ALTER TABLE `pms_users`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
