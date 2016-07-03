-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2016 at 06:45 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `advancedweb`
--
CREATE DATABASE IF NOT EXISTS `advancedweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `advancedweb`;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `uid` varchar(40) COLLATE utf8_bin NOT NULL,
  `word` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`uid`, `word`) VALUES
('manish', 'undefined'),
('manish', '复旦'),
('manish', '复旦'),
('manish', '复旦'),
('manish', '复旦');

-- --------------------------------------------------------

--
-- Table structure for table `juji`
--

CREATE TABLE IF NOT EXISTS `juji` (
  `uid` varchar(40) COLLATE utf8_bin NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(1) COLLATE utf8_bin NOT NULL,
  `pname` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` varchar(2000) COLLATE utf8_bin NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `address` varchar(150) COLLATE utf8_bin NOT NULL,
  `tag` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `tag0` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`pid`, `type`, `pname`, `description`, `latitude`, `longitude`, `address`, `tag`, `tag0`) VALUES
(1, '校', '复旦大学张江校区', '复旦大学的张江校区（软件学院，计算机学院）', 31.188635, 121.596326, '浦东新区，张衡路', '#great', '#crowdy'),
(3, '校', '上海电影艺术学院海艺剧场', '电影学院与电影院', 31.191192, 121.591691, '浦东新区蔡伦路', NULL, NULL),
(4, '园', '上海博览中心', '国际博览城', 31.208461, 121.564191, '浦东新区罗山路', NULL, NULL),
(5, '校', '上海中医药大学', '中国传统药学和医疗学校', 31.192187, 121.597751, '蔡伦率', NULL, NULL),
(6, '园', '上海汤臣豪园三期', '上海汤臣豪园三期', 31.2007864, 121.5963798, '高科中路', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `uid` varchar(40) COLLATE utf8_bin NOT NULL,
  `pid` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`uid`, `pid`, `rating`) VALUES
('manish', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `pid` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8_bin NOT NULL,
  `type` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `uid` varchar(40) COLLATE utf8_bin NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` varchar(40) COLLATE utf8_bin NOT NULL,
  `pword` varchar(40) COLLATE utf8_bin NOT NULL,
  `profile` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `pword`, `profile`) VALUES
('manish', 'merotauko', 'manish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `xinyuan`
--

CREATE TABLE IF NOT EXISTS `xinyuan` (
  `uid` varchar(40) COLLATE utf8_bin NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
