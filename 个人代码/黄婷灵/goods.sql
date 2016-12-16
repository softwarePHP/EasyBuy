-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-16 02:59:26
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easybuy2`
--

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
  `brief` varchar(255) NOT NULL,
  `spec` varchar(255) NOT NULL COMMENT '规格',
  `discount` float NOT NULL COMMENT '折扣'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodid`, `goodname`, `daily`, `count`, `goodprice`, `grandid`, `imageurl`, `categoriesid`, `introduction`, `mark1`, `mark2`, `brief`, `spec`, `discount`) VALUES
(0, '打造水感瓷肌~雪花秀sulwhasoo超好用的气垫BB！', 1, 10, 113, 1, 'Public/uploads/20161128/g1.jpg', 1, '', 'CC霜', '雪花秀', '1', '150ml', 0.5),
(1, '倩碧(Clinique)眼部护理水凝霜，令你美丽的双眸恢复迷人的光彩！', 1, 34, 120, 0, 'Public/uploads/20161128/g2.jpg', 2, '', '凝霜', '倩碧', '', '100ml', 0.2),
(2, 'VDL +PANTONE 限量版 炫彩12色眼影盘，适合每一个爱天马行空的你们。', 1, 70, 190, 0, 'Public/uploads/20161128/g3.jpg', 0, '', '眼影盘', 'VDL', '', '200ml', 0.3),
(3, '莫杰(MarcJacobs)小雏菊淡香水50ml， 阳光照耀般的香氛!', 1, 100, 1, 0, 'Public/uploads/20161128/g4.jpg', 2, '', '香水', '莫杰', '', '100ml', 0.6),
(4, '雪花秀润致焕/优活肌底精华露60ml，缔造水润肌肤', 0, 100, 100, 1, 'Public/uploads/20161208/1.jpg', 1, '', '1', '1', '', '200ml', 0.3),
(5, '知名品牌雪花秀滋晶温和清洁洁面乳，缔造水润肌肤', 0, 1, 200, 1, 'Public/uploads/20161208/2.jpg', 1, '', '1', '1', '', '500ml', 0.2),
(6, '雪花秀采淡致美气垫粉底液15g*2，缔造水润肌肤', 0, 100, 109, 1, 'Public/uploads/20161208/3.jpg', 1, '', '1', '1', '', '200ml', 0.7),
(7, '我的心机山羊奶乳蛋白滋养身体乳250ml，亲肤性佳、滋养、柔韧', 0, 0, 0, 3, 'Public/uploads/20161208/11.jpg', 0, '', '', '', '', '100ml', 0.3),
(8, '我的心机面膜盛典22片装，隐形蚕丝面膜布，轻、薄、透', 0, 1, 100, 3, 'Public/uploads/20161208/22.jpg', 2, '', '111', '111', '', '200ml', 0.3),
(19, '我的心机美姬继承者礼盒装20片入（蜗牛25g*7片+红薏仁25g*6片）', 0, 111, 11, 3, 'Public/uploads/20161208/33.jpg', 1, '', '', '', '', '100ml', 0.3),
(20, '发不发给', 0, 111, 111, 0, 'Public/uploads/20161208/5848b6a4ee2e6.png', 1, '1', '111', '111', '1', '100ml', 0.2);

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
  MODIFY `goodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
