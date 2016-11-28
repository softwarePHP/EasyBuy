-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-28 06:41:38
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
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL COMMENT '订单id',
  `userid` int(11) DEFAULT NULL COMMENT AS `用户id`,
  `ordernumber` char(255) NOT NULL COMMENT '订单编号',
  `ordertime` datetime NOT NULL COMMENT '订单时间',
  `discount` float NOT NULL COMMENT '折扣',
  `orderaddress` char(255) NOT NULL COMMENT '收货地址',
  `orderstate` int(10) NOT NULL COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `ordernumber`, `ordertime`, `discount`, `orderaddress`, `orderstate`) VALUES
(1, 1, '11111111', '2013-02-17 13:20:16', 0, '河北师范大学新校区', 1),
(2, 2, '22222222', '2013-02-17 13:30:00', 0, '河北科技大学', 2),
(3, 3, '33333333', '2013-02-17 13:32:16', 0, '河北医科大学', 3),
(4, 2, '44444444', '2016-11-01 00:00:00', 0, '河北工程大学', 2),
(5, 3, '55555555', '2016-11-08 00:00:00', 0, '河北大学', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `FK_Reference_5` (`userid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id', AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
