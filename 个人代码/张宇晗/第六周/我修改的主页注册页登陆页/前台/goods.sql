-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 07 日 10:41
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
  PRIMARY KEY (`goodid`),
  KEY `FK_Relationship_2` (`categoriesid`),
  KEY `FK_Relationship_3` (`grandid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodid`, `goodname`, `daily`, `count`, `goodprice`, `grandid`, `imageurl`, `categoriesid`, `introduction`, `mark1`, `mark2`) VALUES
(0, '打造水感瓷肌~雪花秀sulwhasoo超好用的气垫BB！', 1, 10, 113, 0, 'Public/uploads/20161128/g1.jpg', 1, '', 'BB霜', '雪花秀'),
(1, '倩碧(Clinique)眼部护理水凝霜，令你美丽的双眸恢复迷人的光彩！', 1, 34, 120, 1, 'Public/uploads/20161128/g2.jpg', 2, '', '凝霜', '倩碧'),
(2, 'VDL +PANTONE 限量版 炫彩12色眼影盘，适合每一个爱天马行空的你们。', 1, 70, 190, 0, 'Public/uploads/20161128/g3.jpg', 0, '', '眼影盘', 'VDL'),
(3, '莫杰(MarcJacobs)小雏菊淡香水50ml， 阳光照耀般的香氛!', 1, 100, 1, 1, 'Public/uploads/20161128/g4.jpg', 2, '', '香水', '莫杰'),
(4, '1', 0, 100, 1, 1, 'Public/uploads/20161128/583bd7d63e6f9.jpg', 0, '', '1', '1'),
(5, '1', 0, 1, 1, 0, 'Public/uploads/20161128/583bd7fd639a9.jpg', 0, '', '1', '1'),
(6, '1', 0, 100, 1, 0, 'Public/uploads/20161128/583bd860113dc.jpg', 0, '', '1', '1'),
(7, '', 0, 0, 0, 0, 'Public/uploads/20161128/583bd8ad95ea7.jpg', 0, '', '', ''),
(8, '温热', 0, 1, 100, 2, 'Public/uploads/20161130/583e3a9c61a4c.png', 2, '', '111', '111'),
(19, 'N.M.F面膜', 0, 111, 11, 0, 'Public/uploads/20161206/58466852ba378.jpg', 1, '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
