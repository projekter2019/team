-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2019 at 12:34 PM
-- Server version: 5.6.45-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `penzkorh_projekter`
--
CREATE DATABASE IF NOT EXISTS `penzkorh_projekter` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `penzkorh_projekter`;

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

DROP TABLE IF EXISTS `developers`;
CREATE TABLE `developers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `username`, `password`, `email`, `name`, `price`) VALUES
(2, 'testuser1', 'pKO81apWkkDp2/Gg+e3wtp08xlEKTvfG3psJjQVIp46YvwwHG6R0xBYO4fF5Xq9DXXTO+AP7/hcb5fmOJJIqRqNTwfNXPjOASsDUha2DiplUsBv8afPKiuKFmM67R7PJ+79AG+LbRA0s8kRgmZFOiIswt3F/2olS90OfXL0yHto=', 'test1@test.com', 'Test User', 123456),
(4, 'test', 'XyIwwjbbYwwHrJqT4T4O7cb+HS//eHC21FYMJAO3460mhx3FC5Ki6El/1MkaKKSEZl06BsKXJTk2bgvE4s+b+mPdIKhEhIidb5+fiP79uSa2nDlX5C/GCqDTPYIZDI1J82/MoQUtzWNnPboCQTffiX2RdEP1HO3MCa4JSlat4Ss=', 'test@test.com', 'Test Tester', 123459),
(5, 'nj', 'mRj/g9Xextaxn3umUgq+5rPgNYsZZ2AmDMx7ErOiOUlGg5kI85XiQBH22auS1KusZQXOcGDJ2JEOXQ08PY2Kzi4sRncdUI70JJs7cPCfzDbVwTc+PoBfOSZy2rsMl1CcycJk0n5fKfKnHAFkIh5H8jZmMAClptDmELl0tUrW2T4=', '', '', 0),
(6, 'gebirkas', 'ghFpv1zzn+R3m7mITNOQJsl+nJp5OjcM1Oisq4T9BXNSFn8CuzjlsXGV1wAKeWZUVKO30u2ET8AkxkVXnnIF+krNxkl0qbitjHu+ey1UbURoX4uKjACdJBmtr3mwXyrmVlMiKp3Yx2WyNP9n5Ngki/hUzkfkMNXKhSMP5pL+5Sw=', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `megrendelok`
--

DROP TABLE IF EXISTS `megrendelok`;
CREATE TABLE `megrendelok` (
  `m_id` int(10) UNSIGNED NOT NULL,
  `m_nev` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `m_cim` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `m_elerhetoseg` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `megrendelok`
--

INSERT INTO `megrendelok` (`m_id`, `m_nev`, `m_cim`, `m_elerhetoseg`) VALUES
(1, 'Első megrendelő', 'Debrecen', '70/5555555'),
(2, 'Második megrendelő', 'Eger', '20/2222222'),
(3, 'Elso megrendelo', 'Debrecen', '212131212');

-- --------------------------------------------------------

--
-- Table structure for table `projektek`
--

DROP TABLE IF EXISTS `projektek`;
CREATE TABLE `projektek` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_nev` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `p_leiras` varchar(200) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `m_id` int(10) UNSIGNED DEFAULT NULL,
  `p_megrendelo` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `p_hatarido` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `projektek`
--

INSERT INTO `projektek` (`id`, `p_nev`, `p_leiras`, `m_id`, `p_megrendelo`, `p_hatarido`) VALUES
(7, 'Végső régi', 'Egy ujabb ismeretlen projekt', NULL, 'Nem tudjuk', '2019-11-26'),
(12, 'Közös projekt', 'Közösen elkészí­tett projekt', NULL, 'Debreceni Egyetem', '2019-11-30'),
(13, 'Hasznos  projekt', 'Ez egy nagyon hasznos projekt lesz', NULL, 'Debrecen város', '2019-12-28'),
(14, 'Fontos projekt', 'Ez egy nagyon fontos projekt lesz', NULL, 'Miskolc Megyei Jogú Város', '2019-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` int(10) UNSIGNED NOT NULL,
  `proj_id` int(10) UNSIGNED DEFAULT NULL,
  `dev_id` int(10) UNSIGNED DEFAULT NULL,
  `leiras` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `allapot` int(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='feladatok';

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `id` int(10) UNSIGNED NOT NULL,
  `dev_id` int(10) UNSIGNED DEFAULT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='idők';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `megrendelok`
--
ALTER TABLE `megrendelok`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `projektek`
--
ALTER TABLE `projektek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proj_id` (`proj_id`),
  ADD KEY `dev_id` (`dev_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dev_id` (`dev_id`),
  ADD KEY `task_id` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `megrendelok`
--
ALTER TABLE `megrendelok`
  MODIFY `m_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projektek`
--
ALTER TABLE `projektek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projektek`
--
ALTER TABLE `projektek`
  ADD CONSTRAINT `projektek_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `megrendelok` (`m_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `projektek` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`dev_id`) REFERENCES `developers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `time_ibfk_1` FOREIGN KEY (`dev_id`) REFERENCES `developers` (`id`),
  ADD CONSTRAINT `time_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;
