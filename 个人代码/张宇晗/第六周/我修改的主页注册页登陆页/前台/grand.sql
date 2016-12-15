-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 08 日 08:44
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
-- 表的结构 `grand`
--

CREATE TABLE IF NOT EXISTS `grand` (
  `grandid` int(11) NOT NULL AUTO_INCREMENT,
  `grandnum` varchar(11) NOT NULL,
  `grandname` char(20) NOT NULL,
  `imageurl` varchar(255) CHARACTER SET utf8 NOT NULL,
  `grandintroduction` text NOT NULL,
  PRIMARY KEY (`grandid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=30 ;

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
(27, '7', 'Sulwhasoo', 'Public/uploads/20161206/58461b640f7ff.jpg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
