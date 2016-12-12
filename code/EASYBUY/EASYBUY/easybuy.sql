-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-08 01:48:36
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
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminname` char(20) NOT NULL,
  `adminpswd` char(20) NOT NULL,
  `permission` char(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `adminpswd`, `permission`) VALUES
(0, 'admin', '111', '超级管理员'),
(4, 'zyh', '111', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `adress`
--

CREATE TABLE `adress` (
  `adressid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `adress` char(255) NOT NULL,
  `tel` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE `categories` (
  `categoriesid` int(11) NOT NULL,
  `categoriesnum` varchar(11) NOT NULL,
  `categoriesname` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`categoriesid`, `categoriesnum`, `categoriesname`) VALUES
(1, '0', '面膜'),
(2, '0', '洗面奶');

-- --------------------------------------------------------

--
-- 表的结构 `gc`
--

CREATE TABLE `gc` (
  `categoriesid` int(11) NOT NULL,
  `grandid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `gc`
--

INSERT INTO `gc` (`categoriesid`, `grandid`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `goodid` int(11) NOT NULL,
  `goodname` char(255) NOT NULL,
  `daily` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `goodprice` float NOT NULL,
  `grandid` int(11) DEFAULT NULL,
  `imageurl` char(255) NOT NULL,
  `categoriesid` int(11) DEFAULT NULL,
  `introduction` text NOT NULL,
  `mark1` char(20) DEFAULT NULL,
  `mark2` char(20) DEFAULT NULL,
  `brief` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodid`, `goodname`, `daily`, `count`, `goodprice`, `grandid`, `imageurl`, `categoriesid`, `introduction`, `mark1`, `mark2`, `brief`) VALUES
(0, '打造水感瓷肌~雪花秀sulwhasoo超好用的气垫BB！', 1, 10, 113, 0, 'Public/uploads/20161128/g1.jpg', 1, '', 'CC霜', '雪花秀', '1'),
(1, '倩碧(Clinique)眼部护理水凝霜，令你美丽的双眸恢复迷人的光彩！', 1, 34, 120, 1, 'Public/uploads/20161128/g2.jpg', 2, '', '凝霜', '倩碧', ''),
(2, 'VDL +PANTONE 限量版 炫彩12色眼影盘，适合每一个爱天马行空的你们。', 1, 70, 190, 0, 'Public/uploads/20161128/g3.jpg', 0, '', '眼影盘', 'VDL', ''),
(3, '莫杰(MarcJacobs)小雏菊淡香水50ml， 阳光照耀般的香氛!', 1, 100, 1, 1, 'Public/uploads/20161128/g4.jpg', 2, '', '香水', '莫杰', ''),
(4, '1', 0, 100, 1, 1, 'Public/uploads/20161128/583bd7d63e6f9.jpg', 0, '', '1', '1', ''),
(5, '1', 0, 1, 1, 0, 'Public/uploads/20161128/583bd7fd639a9.jpg', 0, '', '1', '1', ''),
(6, '1', 0, 100, 1, 0, 'Public/uploads/20161128/583bd860113dc.jpg', 0, '', '1', '1', ''),
(7, '', 0, 0, 0, 0, 'Public/uploads/20161128/583bd8ad95ea7.jpg', 0, '', '', '', ''),
(8, '温热', 0, 1, 100, 2, 'Public/uploads/20161130/583e3a9c61a4c.png', 2, '', '111', '111', ''),
(19, 'N.M.F面膜', 0, 111, 11, 0, 'Public/uploads/20161206/58466852ba378.jpg', 1, '', '', '', ''),
(20, '发不发给', 0, 111, 111, 0, 'Public/uploads/20161208/5848b6a4ee2e6.png', 1, '1', '111', '111', '1');

-- --------------------------------------------------------

--
-- 表的结构 `grand`
--

CREATE TABLE `grand` (
  `grandid` int(11) NOT NULL,
  `grandnum` varchar(11) NOT NULL,
  `grandname` char(20) NOT NULL,
  `imageurl` varchar(255) CHARACTER SET utf8 NOT NULL,
  `grandintroduction` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `grand`
--

INSERT INTO `grand` (`grandid`, `grandnum`, `grandname`, `imageurl`, `grandintroduction`) VALUES
(0, '4', 'N.M.F', 'Public/uploads/20161206/584619e626f9b.jpg', ''),
(1, '1', '雪花秀', 'Public/uploads/20161206/584616540a95f.jpg', ''),
(2, '2', 'SK-Ⅱ', 'Public/uploads/20161206/584618219f5d9.jpg', ''),
(3, '6', '我的心机', 'Public/uploads/20161206/5846209857922.jpg', ''),
(4, '5', 'ESTHAAR', 'Public/uploads/20161206/58461aceed0cf.jpg', ''),
(26, '6', 'KALISETIN', 'Public/uploads/20161206/58461b2f24fa4.jpg', ''),
(27, '7', 'Sulwhasoo', 'Public/uploads/20161206/58461b640f7ff.jpg', ''),
(30, '', 'WEQ', 'Public/uploads/20161208/5848ba628caaa.png', 'WE');

-- --------------------------------------------------------

--
-- 表的结构 `orderdate`
--

CREATE TABLE `orderdate` (
  `orderdateid` int(11) NOT NULL,
  `goodid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `orderdate`
--

INSERT INTO `orderdate` (`orderdateid`, `goodid`, `orderid`, `count`) VALUES
(0, 3, 3, 2),
(1, 9, 2, 1),
(2, 17, 1, 3),
(4, 17, 4, 5);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ordernumber` char(255) NOT NULL,
  `ordertime` datetime NOT NULL,
  `discount` float NOT NULL,
  `orderaddress` char(255) NOT NULL,
  `orderstate` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `ordernumber`, `ordertime`, `discount`, `orderaddress`, `orderstate`) VALUES
(1, 6, '1111153711279', '2016-11-03 00:00:00', 0.6, '河北师范大学新校区', 1),
(2, 4, '2221153711279', '2016-11-18 00:00:00', 0.8, '河北科技大学西门', 2),
(3, 8, '0001537113332', '2016-11-10 00:00:00', 0.9, '石家庄建设南大街20号', 3),
(4, 3, '1123153711277', '2016-11-16 00:00:00', 0.8, '西安唐延安路都市世纪城', 3);

-- --------------------------------------------------------

--
-- 表的结构 `shopingcar`
--

CREATE TABLE `shopingcar` (
  `shopid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `goodid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `state`
--

CREATE TABLE `state` (
  `stateid` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `statename` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `state`
--

INSERT INTO `state` (`stateid`, `orderid`, `statename`) VALUES
(3, 3, '未发货'),
(1, 1, '已发货'),
(2, 2, '已完成');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `createtime` date NOT NULL,
  `userpswd` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `createtime`, `userpswd`, `phone`) VALUES
(3, 'liki333', '2016-11-17', 'liki', NULL),
(8, '111zzz', '2016-11-16', '222', NULL),
(6, 'zzz132', '2016-11-04', 'zzz', NULL),
(4, 'zyh123', '2016-11-01', 'zyh', NULL),
(17, '1233axxx', '2016-12-07', '111', NULL),
(16, 'zzzzz', '2016-12-07', 'zzz', NULL),
(18, 'zyhhhh', '2016-12-07', 'bbb', NULL),
(19, 'zsxd123', '2016-12-07', 'zyh', '15230186900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`adressid`),
  ADD KEY `FK_Reference_7` (`userid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesid`);

--
-- Indexes for table `gc`
--
ALTER TABLE `gc`
  ADD PRIMARY KEY (`categoriesid`,`grandid`),
  ADD KEY `FK_Reference_9` (`grandid`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goodid`),
  ADD KEY `FK_Relationship_2` (`categoriesid`),
  ADD KEY `FK_Relationship_3` (`grandid`);

--
-- Indexes for table `grand`
--
ALTER TABLE `grand`
  ADD PRIMARY KEY (`grandid`);

--
-- Indexes for table `orderdate`
--
ALTER TABLE `orderdate`
  ADD PRIMARY KEY (`orderdateid`),
  ADD KEY `FK_Reference_4` (`goodid`),
  ADD KEY `FK_Reference_6` (`orderid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `shopingcar`
--
ALTER TABLE `shopingcar`
  ADD PRIMARY KEY (`shopid`),
  ADD KEY `USER_DEPARTMENT_FK` (`userid`),
  ADD KEY `USER_DEPARTMENT_FK2` (`goodid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`),
  ADD KEY `FK_Relationship_7` (`orderid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `goodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `grand`
--
ALTER TABLE `grand`
  MODIFY `grandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `orderdate`
--
ALTER TABLE `orderdate`
  MODIFY `orderdateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `shopingcar`
--
ALTER TABLE `shopingcar`
  MODIFY `shopid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
