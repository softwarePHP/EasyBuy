-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 12 日 20:59
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `easybuy`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` char(20) NOT NULL,
  `adminpswd` char(20) NOT NULL,
  `permission` char(100) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `adress` (
  `adressid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adress` char(255) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adressid`),
  KEY `FK_Reference_7` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `adress`
--

INSERT INTO `adress` (`adressid`, `userid`, `name`, `adress`, `tel`) VALUES
(3, 19, 'zyh', 'zyh', '15238906708'),
(2, 4, 'zyh11', '衡水桃城区新街南路193', '13087909670'),
(4, 19, 'zyh123', '衡水桃城区报社街16号', '13087689060'),
(5, 4, 'zyh11', '石家庄胜利北大街路193', '13056786789'),
(6, 4, 'zyh11', '衡水市桃城区胜利东路40号', '13098680909');

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoriesid` int(11) NOT NULL AUTO_INCREMENT,
  `categoriesnum` varchar(11) NOT NULL,
  `categoriesname` char(255) NOT NULL,
  PRIMARY KEY (`categoriesid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `gc` (
  `categoriesid` int(11) NOT NULL,
  `grandid` int(11) NOT NULL,
  PRIMARY KEY (`categoriesid`,`grandid`),
  KEY `FK_Reference_9` (`grandid`)
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

CREATE TABLE IF NOT EXISTS `goods` (
  `goodid` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`goodid`),
  KEY `FK_Relationship_2` (`categoriesid`),
  KEY `FK_Relationship_3` (`grandid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodid`, `goodname`, `daily`, `count`, `goodprice`, `grandid`, `imageurl`, `categoriesid`, `introduction`, `mark1`, `mark2`, `brief`) VALUES
(0, '打造水感瓷肌~雪花秀sulwhasoo超好用的气垫BB！', 1, 10, 113, 1, 'Public/uploads/20161128/g1.jpg', 1, '', 'CC霜', '雪花秀', '1'),
(1, '倩碧(Clinique)眼部护理水凝霜，令你美丽的双眸恢复迷人的光彩！', 1, 34, 120, 0, 'Public/uploads/20161128/g2.jpg', 2, '', '凝霜', '倩碧', ''),
(2, 'VDL +PANTONE 限量版 炫彩12色眼影盘，适合每一个爱天马行空的你们。', 1, 70, 190, 0, 'Public/uploads/20161128/g3.jpg', 0, '', '眼影盘', 'VDL', ''),
(3, '莫杰(MarcJacobs)小雏菊淡香水50ml， 阳光照耀般的香氛!', 1, 100, 1, 0, 'Public/uploads/20161128/g4.jpg', 2, '', '香水', '莫杰', ''),
(4, '雪花秀润致焕/优活肌底精华露60ml，缔造水润肌肤', 0, 100, 100, 1, 'Public/uploads/20161208/1.jpg', 1, '', '1', '1', ''),
(5, '知名品牌雪花秀滋晶温和清洁洁面乳，缔造水润肌肤', 0, 1, 200, 1, 'Public/uploads/20161208/2.jpg', 1, '', '1', '1', ''),
(6, '雪花秀采淡致美气垫粉底液15g*2，缔造水润肌肤', 0, 100, 109, 1, 'Public/uploads/20161208/3.jpg', 1, '', '1', '1', ''),
(7, '我的心机山羊奶乳蛋白滋养身体乳250ml，亲肤性佳、滋养、柔韧', 0, 0, 0, 3, 'Public/uploads/20161208/11.jpg', 0, '', '', '', ''),
(8, '我的心机面膜盛典22片装，隐形蚕丝面膜布，轻、薄、透', 0, 1, 100, 3, 'Public/uploads/20161208/22.jpg', 2, '', '111', '111', ''),
(19, '我的心机美姬继承者礼盒装20片入（蜗牛25g*7片+红薏仁25g*6片）', 0, 111, 11, 3, 'Public/uploads/20161208/33.jpg', 1, '', '', '', ''),
(20, '发不发给', 0, 111, 111, 0, 'Public/uploads/20161208/5848b6a4ee2e6.png', 1, '1', '111', '111', '1');

-- --------------------------------------------------------

--
-- 表的结构 `grand`
--

CREATE TABLE IF NOT EXISTS `grand` (
  `grandid` int(11) NOT NULL AUTO_INCREMENT,
  `grandnum` varchar(11) NOT NULL,
  `grandname` varchar(255) NOT NULL,
  `imageurl` varchar(255) CHARACTER SET utf8 NOT NULL,
  `grandintroduction` text NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`grandid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `grand`
--

INSERT INTO `grand` (`grandid`, `grandnum`, `grandname`, `imageurl`, `grandintroduction`, `mark`) VALUES
(0, '4', 'N.M.F', 'Public/uploads/20161206/584619e626f9b.jpg', '', 1),
(1, '1', '雪花秀', 'Public/uploads/20161206/584616540a95f.jpg', '', 1),
(2, '2', 'SK-Ⅱ', 'Public/uploads/20161206/584618219f5d9.jpg', '', 2),
(3, '6', '我的心机', 'Public/uploads/20161206/5846209857922.jpg', '', 2),
(4, '5', 'ESTHAAR', 'Public/uploads/20161206/58461aceed0cf.jpg', '', 3),
(26, '6', 'KALISETIN', 'Public/uploads/20161206/58461b2f24fa4.jpg', '', 3),
(27, '7', 'Sulwhasoo', 'Public/uploads/20161206/58461b640f7ff.jpg', '', 2),
(30, '', 'WEQ', 'Public/uploads/20161208/5848ba628caaa.png', 'WE', 1);

-- --------------------------------------------------------

--
-- 表的结构 `orderdate`
--

CREATE TABLE IF NOT EXISTS `orderdate` (
  `orderdateid` int(11) NOT NULL AUTO_INCREMENT,
  `goodid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderdateid`),
  KEY `FK_Reference_4` (`goodid`),
  KEY `FK_Reference_6` (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `orderdate`
--

INSERT INTO `orderdate` (`orderdateid`, `goodid`, `orderid`, `count`) VALUES
(0, 3, 3, 2),
(1, 9, 2, 1),
(2, 17, 1, 3),
(4, 17, 4, 5),
(5, 9, 1, 2),
(6, 17, 5, 2),
(7, 3, 6, 6),
(8, 9, 7, 8),
(9, 3, 8, 6),
(10, 9, 9, 4),
(11, 17, 10, 2);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `ordernumber` char(255) NOT NULL,
  `ordertime` datetime NOT NULL,
  `discount` float NOT NULL,
  `orderaddress` char(255) NOT NULL,
  `orderstate` int(10) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `ordernumber`, `ordertime`, `discount`, `orderaddress`, `orderstate`) VALUES
(1, 6, '1111153711279', '2016-11-03 02:17:10', 0.6, '河北师范大学新校区', 1),
(2, 4, '2221153711279', '2016-11-18 00:00:00', 0.8, '河北科技大学西门', 2),
(3, 8, '0001537113332', '2016-11-10 00:00:00', 0.9, '石家庄建设南大街20号', 2),
(4, 3, '1123153711277', '2016-11-16 00:00:00', 0.8, '西安唐延安路都市世纪城', 3),
(5, 4, '1111112223456', '2016-12-15 09:23:17', 0.3, '河北师大', 1),
(6, 4, '1111113232324', '2016-12-29 08:21:36', 0.2, '师大西门', 3),
(7, 4, '1111112345432', '2016-12-15 07:22:18', 0.8, '师大东门', 2),
(8, 4, '1212121212112', '2016-12-08 03:04:15', 0.8, '呼呼呼', 4),
(9, 4, '1234567899876', '2016-12-28 06:15:17', 0.9, '哈哈哈', 5),
(10, 4, '1323456543234', '2016-12-15 06:14:30', 0.1, '嘿嘿', 6);

-- --------------------------------------------------------

--
-- 表的结构 `shopingcar`
--

CREATE TABLE IF NOT EXISTS `shopingcar` (
  `shopid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `goodid` int(11) NOT NULL,
  `shopcount` int(3) NOT NULL,
  PRIMARY KEY (`shopid`),
  KEY `USER_DEPARTMENT_FK` (`userid`),
  KEY `USER_DEPARTMENT_FK2` (`goodid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `shopingcar`
--

INSERT INTO `shopingcar` (`shopid`, `userid`, `goodid`, `shopcount`) VALUES
(1, 3, 3, 3),
(2, 3, 17, 1),
(3, 6, 9, 2),
(4, 3, 9, 6),
(5, 4, 2, 14),
(6, 4, 1, 2),
(11, 4, 0, 1),
(10, 4, 3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateid` int(11) NOT NULL AUTO_INCREMENT,
  `orderstate` int(11) DEFAULT NULL,
  `statename` char(20) NOT NULL,
  PRIMARY KEY (`stateid`),
  KEY `FK_Relationship_7` (`orderstate`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `state`
--

INSERT INTO `state` (`stateid`, `orderstate`, `statename`) VALUES
(1, 1, '未发货'),
(2, 2, '已发货'),
(5, 3, '已完成'),
(7, 4, '待付款'),
(8, 5, '已取消'),
(9, 6, '已退货');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `createtime` date NOT NULL,
  `userpswd` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=20 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
