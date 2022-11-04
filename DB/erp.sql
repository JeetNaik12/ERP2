-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 04:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(10) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `company_name`, `description`, `status`) VALUES
(1, 'Microsoft', 'Microsoft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `rate` int(20) NOT NULL DEFAULT 0,
  `qnt` int(10) NOT NULL DEFAULT 0,
  `description` varchar(200) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_receive`
--

CREATE TABLE `tbl_material_receive` (
  `id` int(10) NOT NULL,
  `cmp_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `m_r_no` varchar(10) NOT NULL,
  `create_from` varchar(50) NOT NULL,
  `supplier` int(10) NOT NULL,
  `salesman` varchar(50) NOT NULL,
  `with_bill` varchar(10) NOT NULL,
  `transport_name` varchar(100) NOT NULL,
  `g_r_no` varchar(20) NOT NULL,
  `motor_no` varchar(50) NOT NULL,
  `station` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `challan_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_receive_detail`
--

CREATE TABLE `tbl_material_receive_detail` (
  `id` int(10) NOT NULL,
  `m_r_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `alt_unit_id` int(10) NOT NULL,
  `qnt` int(50) NOT NULL,
  `alt_qnt` int(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_request`
--

CREATE TABLE `tbl_material_request` (
  `id` int(10) NOT NULL,
  `cmp_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `req_type` varchar(50) DEFAULT NULL,
  `req_code` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `req_name` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_request_detail`
--

CREATE TABLE `tbl_material_request_detail` (
  `id` int(11) NOT NULL,
  `m_req_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `qnt` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(10) NOT NULL,
  `cmp_id` int(10) NOT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_bill_entry`
--

CREATE TABLE `tbl_purchase_bill_entry` (
  `id` int(10) NOT NULL,
  `cmp_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `p_o_no` varchar(20) NOT NULL,
  `create_from` int(10) NOT NULL,
  `supplier` int(10) NOT NULL,
  `salesman` varchar(50) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `bill_img` varchar(200) DEFAULT NULL,
  `other_charges` int(10) NOT NULL DEFAULT 0,
  `remark` varchar(100) DEFAULT NULL,
  `on_value` int(10) NOT NULL DEFAULT 0,
  `other_charge_total` int(10) NOT NULL DEFAULT 0,
  `total_bill_amt` int(10) NOT NULL DEFAULT 0,
  `grand_total` int(10) NOT NULL DEFAULT 0,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_bill_entry_detail`
--

CREATE TABLE `tbl_purchase_bill_entry_detail` (
  `id` int(10) NOT NULL,
  `purchase_bii_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `alt_unit_id` int(10) NOT NULL,
  `qnt` int(10) NOT NULL DEFAULT 0,
  `alt_qnt` int(10) NOT NULL,
  `rate` int(10) NOT NULL DEFAULT 0,
  `per` int(10) NOT NULL DEFAULT 0,
  `basic_amt` int(10) NOT NULL,
  `gst` int(10) NOT NULL DEFAULT 0,
  `gst_amt` int(10) NOT NULL DEFAULT 0,
  `basic_amt_total` int(10) NOT NULL DEFAULT 0,
  `gst_amt_total` int(10) NOT NULL,
  `grand_total` int(10) NOT NULL DEFAULT 0,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order_entry`
--

CREATE TABLE `tbl_purchase_order_entry` (
  `id` int(10) NOT NULL,
  `cmp_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `p_o_no` varchar(50) DEFAULT NULL,
  `create_from` varchar(50) DEFAULT NULL,
  `supplier` int(10) NOT NULL,
  `salesman` varchar(100) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `grand_total` int(10) NOT NULL DEFAULT 0,
  `note` varchar(200) DEFAULT NULL,
  `company_note` varchar(10) DEFAULT NULL,
  `receiver_name` varchar(200) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `basic_amt_tot` int(10) NOT NULL DEFAULT 0,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order_entry_detail`
--

CREATE TABLE `tbl_purchase_order_entry_detail` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `alt_unit_id` int(11) NOT NULL,
  `qnt` int(11) NOT NULL,
  `alt_qnt` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `per` int(11) NOT NULL DEFAULT 0,
  `basic_amt` int(11) NOT NULL DEFAULT 0,
  `gst` int(11) NOT NULL,
  `gst_amt` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_quotation`
--

CREATE TABLE `tbl_request_quotation` (
  `id` int(11) NOT NULL,
  `cmp_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `r_no` int(11) NOT NULL DEFAULT 0,
  `create_form` int(11) NOT NULL,
  `supplier` int(11) NOT NULL DEFAULT 0,
  `grand_total` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_quotation_detail`
--

CREATE TABLE `tbl_request_quotation_detail` (
  `id` int(11) NOT NULL,
  `req_q_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `alt_unit_id` int(11) NOT NULL,
  `qnt` int(11) NOT NULL,
  `alt_qnt` int(11) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` int(10) NOT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(10) NOT NULL,
  `unit_name` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_material_receive`
--
ALTER TABLE `tbl_material_receive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmp_id` (`cmp_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `tbl_material_receive_detail`
--
ALTER TABLE `tbl_material_receive_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_r_id` (`m_r_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tbl_material_request`
--
ALTER TABLE `tbl_material_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmp_id` (`cmp_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `tbl_material_request_detail`
--
ALTER TABLE `tbl_material_request_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_req_id` (`m_req_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmp_id` (`cmp_id`);

--
-- Indexes for table `tbl_purchase_bill_entry`
--
ALTER TABLE `tbl_purchase_bill_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmp_id` (`cmp_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `tbl_purchase_bill_entry_detail`
--
ALTER TABLE `tbl_purchase_bill_entry_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `purchase_bii_id` (`purchase_bii_id`);

--
-- Indexes for table `tbl_purchase_order_entry`
--
ALTER TABLE `tbl_purchase_order_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmp_id` (`cmp_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `tbl_purchase_order_entry_detail`
--
ALTER TABLE `tbl_purchase_order_entry_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tbl_request_quotation`
--
ALTER TABLE `tbl_request_quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmp_id` (`cmp_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `tbl_request_quotation_detail`
--
ALTER TABLE `tbl_request_quotation_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_q_id` (`req_q_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material_receive`
--
ALTER TABLE `tbl_material_receive`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material_receive_detail`
--
ALTER TABLE `tbl_material_receive_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material_request`
--
ALTER TABLE `tbl_material_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material_request_detail`
--
ALTER TABLE `tbl_material_request_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_bill_entry`
--
ALTER TABLE `tbl_purchase_bill_entry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_bill_entry_detail`
--
ALTER TABLE `tbl_purchase_bill_entry_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_order_entry`
--
ALTER TABLE `tbl_purchase_order_entry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_order_entry_detail`
--
ALTER TABLE `tbl_purchase_order_entry_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request_quotation`
--
ALTER TABLE `tbl_request_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request_quotation_detail`
--
ALTER TABLE `tbl_request_quotation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`id`),
  ADD CONSTRAINT `tbl_item_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`id`);

--
-- Constraints for table `tbl_material_receive`
--
ALTER TABLE `tbl_material_receive`
  ADD CONSTRAINT `tbl_material_receive_ibfk_1` FOREIGN KEY (`cmp_id`) REFERENCES `tbl_company` (`id`),
  ADD CONSTRAINT `tbl_material_receive_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`);

--
-- Constraints for table `tbl_material_receive_detail`
--
ALTER TABLE `tbl_material_receive_detail`
  ADD CONSTRAINT `tbl_material_receive_detail_ibfk_1` FOREIGN KEY (`m_r_id`) REFERENCES `tbl_material_receive` (`id`),
  ADD CONSTRAINT `tbl_material_receive_detail_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`id`),
  ADD CONSTRAINT `tbl_material_receive_detail_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`id`);

--
-- Constraints for table `tbl_material_request`
--
ALTER TABLE `tbl_material_request`
  ADD CONSTRAINT `tbl_material_request_ibfk_1` FOREIGN KEY (`cmp_id`) REFERENCES `tbl_company` (`id`),
  ADD CONSTRAINT `tbl_material_request_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`);

--
-- Constraints for table `tbl_material_request_detail`
--
ALTER TABLE `tbl_material_request_detail`
  ADD CONSTRAINT `tbl_material_request_detail_ibfk_1` FOREIGN KEY (`m_req_id`) REFERENCES `tbl_material_request` (`id`),
  ADD CONSTRAINT `tbl_material_request_detail_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`id`),
  ADD CONSTRAINT `tbl_material_request_detail_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`id`);

--
-- Constraints for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD CONSTRAINT `tbl_project_ibfk_1` FOREIGN KEY (`cmp_id`) REFERENCES `tbl_company` (`id`);

--
-- Constraints for table `tbl_purchase_bill_entry`
--
ALTER TABLE `tbl_purchase_bill_entry`
  ADD CONSTRAINT `tbl_purchase_bill_entry_ibfk_1` FOREIGN KEY (`cmp_id`) REFERENCES `tbl_company` (`id`),
  ADD CONSTRAINT `tbl_purchase_bill_entry_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`);

--
-- Constraints for table `tbl_purchase_bill_entry_detail`
--
ALTER TABLE `tbl_purchase_bill_entry_detail`
  ADD CONSTRAINT `tbl_purchase_bill_entry_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`id`),
  ADD CONSTRAINT `tbl_purchase_bill_entry_detail_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`id`),
  ADD CONSTRAINT `tbl_purchase_bill_entry_detail_ibfk_3` FOREIGN KEY (`purchase_bii_id`) REFERENCES `tbl_purchase_bill_entry` (`id`);

--
-- Constraints for table `tbl_purchase_order_entry`
--
ALTER TABLE `tbl_purchase_order_entry`
  ADD CONSTRAINT `tbl_purchase_order_entry_ibfk_1` FOREIGN KEY (`cmp_id`) REFERENCES `tbl_company` (`id`),
  ADD CONSTRAINT `tbl_purchase_order_entry_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`);

--
-- Constraints for table `tbl_purchase_order_entry_detail`
--
ALTER TABLE `tbl_purchase_order_entry_detail`
  ADD CONSTRAINT `tbl_purchase_order_entry_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_purchase_order_entry` (`id`),
  ADD CONSTRAINT `tbl_purchase_order_entry_detail_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`id`),
  ADD CONSTRAINT `tbl_purchase_order_entry_detail_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`id`);

--
-- Constraints for table `tbl_request_quotation`
--
ALTER TABLE `tbl_request_quotation`
  ADD CONSTRAINT `tbl_request_quotation_ibfk_1` FOREIGN KEY (`cmp_id`) REFERENCES `tbl_company` (`id`),
  ADD CONSTRAINT `tbl_request_quotation_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`);

--
-- Constraints for table `tbl_request_quotation_detail`
--
ALTER TABLE `tbl_request_quotation_detail`
  ADD CONSTRAINT `tbl_request_quotation_detail_ibfk_1` FOREIGN KEY (`req_q_id`) REFERENCES `tbl_request_quotation` (`id`),
  ADD CONSTRAINT `tbl_request_quotation_detail_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`id`),
  ADD CONSTRAINT `tbl_request_quotation_detail_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
