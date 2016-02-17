-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-02-17 17:05:13
-- 服务器版本： 5.5.24
-- PHP Version: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dos_webinfo_crm`
--
CREATE DATABASE IF NOT EXISTS `dos_webinfo_crm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dos_webinfo_crm`;

-- --------------------------------------------------------

--
-- 表的结构 `dos_webinfo`
--

CREATE TABLE IF NOT EXISTS `dos_webinfo` (
  `Id` int(11) NOT NULL,
  `BackAddress` varchar(1024) DEFAULT NULL,
  `BackAccount` varchar(256) DEFAULT NULL,
  `BackPassword` varchar(256) DEFAULT NULL,
  `FTPAddress` varchar(1024) DEFAULT NULL,
  `FTPAccount` varchar(256) DEFAULT NULL,
  `FTPPassword` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dos_webinfo`
--

INSERT INTO `dos_webinfo` (`Id`, `BackAddress`, `BackAccount`, `BackPassword`, `FTPAddress`, `FTPAccount`, `FTPPassword`) VALUES
(1, 'www.baidu.com', 'admin', '123', 'ftp:110.12.23.23', 'admin', 'amdin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dos_webinfo`
--
ALTER TABLE `dos_webinfo`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dos_webinfo`
--
ALTER TABLE `dos_webinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
