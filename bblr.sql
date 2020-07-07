-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2020 at 07:46 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bblr`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `featured_image` varchar(100) DEFAULT NULL,
  `featured_video` varchar(100) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE `babies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birth` int(11) NOT NULL,
  `weight_on_register` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bblr_rules`
--

CREATE TABLE `bblr_rules` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `from_weight` double DEFAULT NULL,
  `to_weight` double NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `bblr_rule_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moms`
--

CREATE TABLE `moms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birth` int(11) NOT NULL,
  `hospital` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `phc_name` varchar(100) NOT NULL,
  `phc_address` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `mom_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_logs`
--

CREATE TABLE `treatment_logs` (
  `id` int(11) NOT NULL,
  `asi_qty` int(11) DEFAULT NULL,
  `asi_method` varchar(20) DEFAULT NULL,
  `asi_amount` double DEFAULT NULL,
  `suhu` int(11) DEFAULT NULL,
  `bb` int(11) DEFAULT NULL,
  `mom_id` int(11) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `treatment_id` int(11) NOT NULL,
  `baby_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `token` text,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `level`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'igun997', 'igun997', 'indra@imceria.com', '081214267695', 0, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpZCI6MSwibGV2ZWwiOjAsImV4cGlyZWQiOjE1OTM0NjY2NTd9.ueqbUK-Ut0cWoIiYmJ_wrUyzxG6N6uilJQjNC2KYeoLHlLFpEeFo4WGt8epSK4Eg1dEy2F8bgscLN-iK_tXbjNQU9O24IghATgHgE66yQiqBBgxHzClNHfDFg-HnEwO6bOv-uYdxPsnKrhttcbtugkX4qMOdrVdeEhSFLPimbydn78Y-I9YvU754DpPgOk3S6-xfDmSo70Ef7PVaSqrxLhvUnWpEaVo5VKM2lvCjEUwMl2dH8WdP6zZJWpAzvh8SP_x4GqlrrJbfHgfpf2m7qQMYccTT_PUcLvnAdNESHdIIODp-PZlF09CUTd-XY_nxPhTeCf2Ac-W8U-4p1vq4GBf8FGkXypmqqqvwXcQTA3Kg-JjatplFaxYqxFpkzwnw6jUGkGnrixOpVyCFuUv2hOMu1TQ0Q3fA2DEE8mG92W0yCZaNsv311XvO_OerDC1B4jvSvUSaeYjBuof4Bu8xqRktIe5aF8YdDZC7yLl2YB8KdIMT52OUp4cvGQpp-hRRYCVIUxukvM-Dwht8nGPqaV3q7tO737wkqFYSQ6-FYqVspM1Y7OHaRjKZ29QZtjWeE-kYYYAOhHtqWNrRKzKT7gIEElAvuzaoeZ5CvtP-asSFxgPtBTOJOCJqaChNNTLPf-oDdCoTTeOXBVTKulQ7TPPoVT0-Nm2AHDqEl9_78Q8', '2020-06-28', '2020-06-29'),
(2, 'igun998', 'igun998', 'indra.kintil@gmail.com', '0869465443', 2, 1, NULL, '2020-06-29', '2020-06-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`category_id`);

--
-- Indexes for table `babies`
--
ALTER TABLE `babies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mom_of_babies` (`user_id`);

--
-- Indexes for table `bblr_rules`
--
ALTER TABLE `bblr_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bblr_rules` (`bblr_rule_id`),
  ADD KEY `parent_categories` (`parent_id`);

--
-- Indexes for table `moms`
--
ALTER TABLE `moms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mom_id` (`mom_id`),
  ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `treatment_logs`
--
ALTER TABLE `treatment_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mom_id` (`mom_id`),
  ADD KEY `nurse_id` (`nurse_id`),
  ADD KEY `treatment_id` (`treatment_id`),
  ADD KEY `baby_id` (`baby_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `babies`
--
ALTER TABLE `babies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bblr_rules`
--
ALTER TABLE `bblr_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moms`
--
ALTER TABLE `moms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment_logs`
--
ALTER TABLE `treatment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `babies`
--
ALTER TABLE `babies`
  ADD CONSTRAINT `babies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`bblr_rule_id`) REFERENCES `bblr_rules` (`id`);

--
-- Constraints for table `moms`
--
ALTER TABLE `moms`
  ADD CONSTRAINT `moms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `nurses`
--
ALTER TABLE `nurses`
  ADD CONSTRAINT `nurses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_ibfk_1` FOREIGN KEY (`mom_id`) REFERENCES `moms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatments_ibfk_2` FOREIGN KEY (`nurse_id`) REFERENCES `nurses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment_logs`
--
ALTER TABLE `treatment_logs`
  ADD CONSTRAINT `treatment_logs_ibfk_1` FOREIGN KEY (`mom_id`) REFERENCES `moms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_logs_ibfk_2` FOREIGN KEY (`nurse_id`) REFERENCES `nurses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_logs_ibfk_3` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_logs_ibfk_4` FOREIGN KEY (`baby_id`) REFERENCES `babies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
