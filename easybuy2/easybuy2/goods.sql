-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 22 日 17:23
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
  `introduction` varchar(255) NOT NULL,
  `mark1` char(20) DEFAULT NULL,
  `mark2` char(20) DEFAULT NULL,
  `brief` varchar(255) NOT NULL,
  `spec` varchar(255) NOT NULL COMMENT '规格',
  `discount` float NOT NULL COMMENT '折扣',
  PRIMARY KEY (`goodid`),
  KEY `FK_Relationship_2` (`categoriesid`),
  KEY `FK_Relationship_3` (`grandid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodid`, `goodname`, `daily`, `count`, `goodprice`, `grandid`, `imageurl`, `categoriesid`, `introduction`, `mark1`, `mark2`, `brief`, `spec`, `discount`) VALUES
(0, '雅诗兰黛 (Estee Lauder)白金级紧颜眼部修护精华露15ml', 1, 10, 113, 0, 'Public/uploads/20161222/585b911ae9bd4.jpg', 1, '/EASYBUY/Uploads/20161222/585b8cb58454a.jpg', 'CC霜', '精华露', '', '150ml', 0.5),
(1, '兰蔻空气轻垫腮红，令你美丽的双腮绽放迷人的光彩！', 1, 34, 120, 0, 'Public/uploads/20161222/585b90a84ed18.jpg', 1, '/EASYBUY/Uploads/20161222/585b8e188daed.jpg', '腮红', '兰蔻', '', '100ml', 0.2),
(2, '梦魅五色眼影盘套组 DO4，适合每一个爱天马行空的你们。', 1, 70, 190, 0, 'Public/uploads/20161222/585b90d124a9f.jpg', 1, '/EASYBUY/Uploads/20161222/585b8da3647f0.jpg', '眼影盘', '梦魅', '', '200ml', 0.3),
(3, '兰蔻珍爱午夜玫瑰香水50ml， 阳光照耀般的香氛!', 1, 100, 1, 0, 'Public/uploads/20161222/585b91d0ed807.jpg', 1, '/EASYBUY/Uploads/20161222/585b8e5edb533.jpg', '香水', '兰蔻', '', '100ml', 0.6),
(4, '香奈儿（Chanel）可可小姐唇膏3.5g，缔造水润香唇', 0, 100, 100, 0, 'Public/uploads/20161222/585b928f19cd2.jpg', 1, '/EASYBUY/Uploads/20161222/585b928b170f5.jpg', '女士', '唇膏', '', '200ml', 0.3),
(5, '法国高端品牌倩碧保湿洁肤水2 200ml，缔造水润肌肤', 0, 100, 200, 0, 'Public/uploads/20161222/585b930621cfa.jpg', 1, '/EASYBUY/Uploads/20161222/585b9302e35eb.jpg', '女士', '洁肤水', '', '500ml', 0.2),
(6, '法国高端品牌倩碧男士液体洁面皂 200ml，缔造水润肌肤', 0, 100, 109, 0, 'Public/uploads/20161222/585b94264b305.jpg', 1, '/EASYBUY/Uploads/20161222/585b9422ed01e.jpg', '男士', '洁面皂', '', '200ml', 0.7),
(7, ' 法国倩碧真男人套装6（3件套），亲肤性佳、滋养、柔韧', 0, 300, 308, 0, 'Public/uploads/20161222/585b94a11210a.jpg', 1, '/EASYBUY/Uploads/20161222/585b9496a0027.jpg', '倩碧', '男士', '', '100ml', 0.3),
(8, '雅诗兰黛 (Estee Lauder)白金级奢宠紧颜精华露30ml，轻、薄、润', 0, 200, 360, 0, 'Public/uploads/20161222/585b9517d41b5.jpg', 1, '/EASYBUY/Uploads/20161222/585b951467e78.jpg', '雅诗兰黛', '女士', '', '200ml', 0.3),
(19, '雅诗兰黛 (Estee Lauder)花漾倾慕渐变腮红 7g，给你带来好气色', 0, 300, 201, 0, 'Public/uploads/20161222/585b95b0c69e1.jpg', 1, '/EASYBUY/Uploads/20161222/585b95ada88b6.jpg', '雅诗兰黛', '女士', '', '100ml', 0.3),
(20, '雅诗兰黛 (Estee Lauder)凝彩纤长睫毛膏 黑色 （01） 6ml,长睫毛即刻拥有', 0, 300, 169, 0, 'Public/uploads/20161222/585b96613debd.jpg', 1, '/EASYBUY/Uploads/20161222/585b965dbb9ae.jpg', '雅诗兰黛', '女士', '1', '100ml', 0.2),
(21, '雅诗兰黛 (Estee Lauder)倾慕唇膏丝绒系列3.5g，给你带来柔润感受', 0, 300, 208, 0, 'Public/uploads/20161222/585b96cf61e21.jpg', 1, '/EASYBUY/Uploads/20161222/585b96cbe81cc.jpg', '雅诗兰黛', '女士', '', '', 0),
(22, '悦诗风吟（innisfree)森林男士去角质洁面膏 150ml，给脸带来清新感受', 0, 300, 110, 0, 'Public/uploads/20161222/585b97661a805.jpg', 1, '/EASYBUY/Uploads/20161222/585b97628f654.jpg', '悦诗风吟', '去角质', '', '', 0),
(23, '悦诗风吟（innisfree)森林男士剃须洁面泡沫 150ml，清新、自然、舒爽', 0, 300, 150, 0, 'Public/uploads/20161222/585b97e73d437.jpg', 1, '/EASYBUY/Uploads/20161222/585b97e3e33ba.jpg', '悦诗风吟', '剃须洁面泡沫', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
