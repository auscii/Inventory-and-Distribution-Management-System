-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 03:46 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `pms_assembleheader`
--

CREATE TABLE `pms_assembleheader` (
  `pms_id` int(11) NOT NULL,
  `pms_fp_sku` int(11) NOT NULL,
  `pms_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_joborder` int(11) NOT NULL,
  `pms_remarks` text NOT NULL,
  `pms_assembleby` varchar(150) NOT NULL,
  `pms_checkedby` varchar(150) NOT NULL,
  `pms_supervisor` varchar(150) NOT NULL,
  `pms_posted` int(1) NOT NULL,
  `pms_expiration_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `pms_finishingdetails`
--

CREATE TABLE `pms_finishingdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_finishing` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_qty` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pms_finishingheader`
--

CREATE TABLE `pms_finishingheader` (
  `pms_id` int(11) NOT NULL,
  `pms_fp_sku` int(11) NOT NULL,
  `pms_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_joborder` int(11) NOT NULL,
  `pms_production_qty` decimal(16,2) NOT NULL,
  `pms_remarks` text NOT NULL,
  `pms_checkedby` varchar(150) NOT NULL,
  `pms_supervisor` varchar(150) NOT NULL,
  `pms_posted` int(1) NOT NULL,
  `pms_posteddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pms_joborder_qty` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pms_qty` decimal(16,2) NOT NULL,
  `pms_cost` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pms_purchaseorderheader`
--

CREATE TABLE `pms_purchaseorderheader` (
  `pms_id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `pms_rawmaterials`
--

CREATE TABLE `pms_rawmaterials` (
  `pms_id` int(11) NOT NULL,
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
  `pms_supplier_name` varchar(20) NOT NULL,
  `pms_safety_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pms_returnsdetails`
--

CREATE TABLE `pms_returnsdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_purchaseorder` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_qty` decimal(16,2) NOT NULL,
  `pms_cost` decimal(16,2) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `pms_salesorderdetails`
--

CREATE TABLE `pms_salesorderdetails` (
  `pms_id` int(11) NOT NULL,
  `pms_salesorder` int(11) NOT NULL,
  `pms_rm_sku` int(11) NOT NULL,
  `pms_qty` decimal(16,2) NOT NULL,
  `pms_price` decimal(16,2) NOT NULL,
  `pms_total` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `pms_stockcard`
--

CREATE TABLE `pms_stockcard` (
  `pms_id` int(11) NOT NULL,
  `pms_sku` int(11) NOT NULL,
  `pms_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pms_in` decimal(16,2) NOT NULL,
  `pms_out` decimal(16,2) NOT NULL,
  `pms_transtype` varchar(200) NOT NULL,
  `pms_transid` int(11) NOT NULL,
  `pms_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `pms_suppliers_product`
--

CREATE TABLE `pms_suppliers_product` (
  `pms_id` int(11) NOT NULL,
  `pms_cat_id` int(11) NOT NULL,
  `pms_suprod_image` text NOT NULL,
  `pms_suprod_itemname` varchar(50) NOT NULL,
  `pms_suprod_description` text NOT NULL,
  `pms_suprod_unit` int(11) NOT NULL,
  `pms_suprod_typeunit` varchar(20) NOT NULL,
  `pms_suprod_cost` decimal(16,2) NOT NULL,
  `pms_suprod_suppliername` varchar(20) NOT NULL,
  `pms_suprod_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(56, 'seann', '01dc8040a99b229c36807b5b6c5eab2b', 'Supervisor', 'Thanos Black Order', 'thanos.png', '2018-06-20 18:59:32'),
(80, 'alpha9', '6a8193fc8c8ac702549b5aa674830e65', 'Warehouse Man', 'Dylan Carlisle', 'huge_avatar', '2018-07-25 20:19:45'),
(85, 'op1', '4736b2b496ba3de748c6eea6c6b9ca65', 'Operator', 'Felicity Freya', '4.jpg', '2018-08-05 07:39:34');

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
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_assembledetails`
--
ALTER TABLE `pms_assembledetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_assembleheader`
--
ALTER TABLE `pms_assembleheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_customers`
--
ALTER TABLE `pms_customers`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_finishingdetails`
--
ALTER TABLE `pms_finishingdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_finishingheader`
--
ALTER TABLE `pms_finishingheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_joborderdetails`
--
ALTER TABLE `pms_joborderdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_joborderheader`
--
ALTER TABLE `pms_joborderheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_logs`
--
ALTER TABLE `pms_logs`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_purchaseorderdetails`
--
ALTER TABLE `pms_purchaseorderdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_purchaseorderheader`
--
ALTER TABLE `pms_purchaseorderheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_rawmaterials`
--
ALTER TABLE `pms_rawmaterials`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_returnsdetails`
--
ALTER TABLE `pms_returnsdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_returnsheader`
--
ALTER TABLE `pms_returnsheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_salesorderdetails`
--
ALTER TABLE `pms_salesorderdetails`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_salesorderheader`
--
ALTER TABLE `pms_salesorderheader`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_stockcard`
--
ALTER TABLE `pms_stockcard`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_suppliers`
--
ALTER TABLE `pms_suppliers`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_suppliers_product`
--
ALTER TABLE `pms_suppliers_product`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;
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
