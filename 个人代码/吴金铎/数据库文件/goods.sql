-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-28 06:32:02
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easybuy`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `goodid` int(11) NOT NULL,
  `goodname` char(255) NOT NULL,
  `count` int(11) NOT NULL,
  `goodprice` float NOT NULL,
  `grandid` int(11) DEFAULT NULL,
  `imageurl` char(255) NOT NULL,
  `categoriesid` int(11) DEFAULT NULL,
  `introduction` text NOT NULL,
  `mark1` char(20) DEFAULT NULL,
  `mark2` char(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodid`, `goodname`, `count`, `goodprice`, `grandid`, `imageurl`, `categoriesid`, `introduction`, `mark1`, `mark2`) VALUES
(8, '1', 1, 100, 1, 'Public/uploads/20161128/583bc77b9125d.png', 1, '', '111', '111'),
(3, '男士香水', 34, 120, 1, '1121121212121212121121212121212', 2, '', '香水', '男士'),
(4, '男士香水', 34, 150, 1, 'dizhishendebuhui', 2, '', '香水222', '男士'),
(6, '男士香水', 34, 3333, 2, 'Public/uploads/20161124/583650d374951.png', 1, '', '香水', '男士'),
(9, '111', 111, 111, 2, 'Public/uploads/20161128/583bc823f09ed.png', 2, '', '111', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goodid`),
  ADD KEY `FK_Relationship_2` (`categoriesid`),
  ADD KEY `FK_Relationship_3` (`grandid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `goodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
