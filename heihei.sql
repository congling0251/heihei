-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 08 月 31 日 05:54
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `heihei`
--
CREATE DATABASE IF NOT EXISTS `heihei` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `heihei`;

-- --------------------------------------------------------

--
-- 表的结构 `hh_comment`
--

CREATE TABLE IF NOT EXISTS `hh_comment` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `comment_date` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `messageid` int(11) NOT NULL,
  `re_commentid` int(11) DEFAULT NULL,
  `forward_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`commentid`),
  KEY `userid` (`userid`),
  KEY `re_commentid` (`re_commentid`),
  KEY `messageid` (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hh_friends`
--

CREATE TABLE IF NOT EXISTS `hh_friends` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `friendid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`,`friendid`),
  KEY `friendid` (`friendid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hh_friends`
--

INSERT INTO `hh_friends` (`userid`, `friendid`) VALUES
(12, 1),
(14, 1),
(15, 1),
(1, 2),
(12, 2),
(1, 6),
(1, 11),
(13, 11),
(14, 12),
(14, 13);

-- --------------------------------------------------------

--
-- 表的结构 `hh_messages`
--

CREATE TABLE IF NOT EXISTS `hh_messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `message_date` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `comment_amount` int(11) DEFAULT '0',
  `forward_amount` int(11) DEFAULT '0',
  `new_comment_flag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`messageid`),
  UNIQUE KEY `messageid` (`messageid`),
  KEY `message_date` (`message_date`),
  KEY `message_date_2` (`message_date`),
  KEY `messageid_2` (`messageid`),
  KEY `userid` (`userid`),
  KEY `messageid_3` (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `hh_messages`
--

INSERT INTO `hh_messages` (`messageid`, `userid`, `message_date`, `message`, `comment_amount`, `forward_amount`, `new_comment_flag`) VALUES
(1, 1, 1377765199, 'ff', 0, 0, 0),
(2, 1, 1377779561, '谔谔', 0, 0, 0),
(3, 1, 1377852321, '333', 0, 0, 0),
(4, 6, 1377852370, '444', 0, 0, 0),
(5, 6, 1377852375, '443天天', 0, 0, 0),
(6, 6, 1377852380, '443天天嘎嘎然而噶尔噶我跟', 0, 0, 0),
(7, 11, 1377852408, '吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼吼', 0, 0, 0),
(8, 14, 1377886073, 'ff', 0, 0, 0),
(9, 14, 1377886084, 'fafwaefawgawg', 0, 0, 0),
(10, 13, 1377919554, 'maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"maxlength="30"max', 0, 0, 0),
(11, 15, 1377920981, 'rr', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `hh_users`
--

CREATE TABLE IF NOT EXISTS `hh_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `layout` varchar(255) DEFAULT 'userinfo,userstatus,usermessage,visitor,heiyoupanel,',
  `headphoto` varchar(255) DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `visitors_amount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userid` (`userid`),
  UNIQUE KEY `userid_2` (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `hh_users`
--

INSERT INTO `hh_users` (`userid`, `email`, `password`, `username`, `layout`, `headphoto`, `sex`, `age`, `college`, `company`, `visitors_amount`) VALUES
(1, 'afeiszh@gamil.com', 'b59c67bf196a4758191e42f76670ceba', 'afei', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', '6fa00eb9fc018457c5491091536cb03c.png', 'male', 22, '上海大学', '好耶', 7),
(2, '123@sina.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sina', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', NULL, 'female', NULL, NULL, NULL, 0),
(6, 'afeiszh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', NULL, 'male', NULL, NULL, NULL, 5),
(11, 'sss@163.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sss', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', 'ede3b4b36d1ceef5b9bce0048e5bada4.jpg', 'male', 33, '上海大学', '好耶', 30),
(12, 'fas@sina.com', '81dc9bdb52d04dc20036dbd8313ed055', '666', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', 'f2185d96992b0cb6909a41a7cf565a20.jpg', 'male', 22, '上海大学', '', 8),
(13, '2@Q.COM', '81dc9bdb52d04dc20036dbd8313ed055', 'fjlaf', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', NULL, 'male', NULL, NULL, NULL, 0),
(14, 'mm@mm.mm', '81dc9bdb52d04dc20036dbd8313ed055', 'mm', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', '6b44d6a79b8a3809d85622cd4079040a.jpg', 'male', NULL, '上海大学', '', 0),
(15, '123@qq.com', '117ce113bb7d3de6337bc8c30adfeae7', 'snj', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', 'c8fb4ecc3156f4f4bdd7b93a7120a1de.jpg', 'male', 12, '上海大学', '好耶', 0),
(16, '456@qq.com', '117ce113bb7d3de6337bc8c30adfeae7', 'snj', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', NULL, 'male', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `hh_visitors`
--

CREATE TABLE IF NOT EXISTS `hh_visitors` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `visitid` int(11) NOT NULL DEFAULT '0',
  `visitors_date` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`visitid`,`visitors_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hh_visitors`
--

INSERT INTO `hh_visitors` (`userid`, `visitid`, `visitors_date`) VALUES
(1, 11, 1377857667),
(1, 11, 1377857768),
(1, 11, 1377857859),
(1, 11, 1377857864),
(1, 11, 1377857893),
(1, 11, 1377857898),
(1, 15, 1377920736),
(6, 1, 1377918027),
(6, 1, 1377918302),
(6, 1, 1377918420),
(6, 1, 1377918444),
(6, 1, 1377918789),
(11, 1, 1377870922),
(11, 1, 1377871385),
(11, 1, 1377871413),
(11, 1, 1377871481),
(11, 1, 1377871533),
(11, 1, 1377871554),
(11, 1, 1377871614),
(11, 1, 1377871681),
(11, 1, 1377871709),
(11, 1, 1377871727),
(11, 1, 1377871945),
(11, 1, 1377872074),
(11, 1, 1377892520),
(11, 1, 1377892530),
(11, 1, 1377892762),
(11, 1, 1377892809),
(11, 1, 1377892873),
(11, 1, 1377892886),
(11, 1, 1377892947),
(11, 1, 1377892968),
(11, 1, 1377892997),
(11, 1, 1377893026),
(11, 1, 1377893042),
(11, 1, 1377893055),
(11, 1, 1377893768),
(11, 1, 1377893818),
(11, 1, 1377893833),
(11, 1, 1377893856),
(11, 1, 1377917961),
(11, 1, 1377918796),
(12, 1, 1377918692),
(12, 2, 1377918836),
(12, 2, 1377918912),
(12, 2, 1377918930),
(12, 2, 1377918996),
(12, 2, 1377919018),
(12, 2, 1377919052),
(12, 13, 1377919121);

-- --------------------------------------------------------

--
-- 表的结构 `yiisession`
--

CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
('mejgs99mvhklfmgf4rnm5ug510', 1377525690, '42d8006319f954f45259921a91306e89__returnUrl|s:16:"/taobao_predict/";');

--
-- 限制导出的表
--

--
-- 限制表 `hh_comment`
--
ALTER TABLE `hh_comment`
  ADD CONSTRAINT `hh_comment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`),
  ADD CONSTRAINT `hh_comment_ibfk_2` FOREIGN KEY (`re_commentid`) REFERENCES `hh_comment` (`commentid`),
  ADD CONSTRAINT `hh_comment_ibfk_3` FOREIGN KEY (`messageid`) REFERENCES `hh_messages` (`messageid`);

--
-- 限制表 `hh_friends`
--
ALTER TABLE `hh_friends`
  ADD CONSTRAINT `FK_FRIENDS` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`),
  ADD CONSTRAINT `hh_friends_ibfk_1` FOREIGN KEY (`friendid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_messages`
--
ALTER TABLE `hh_messages`
  ADD CONSTRAINT `FK_MESSAGES` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_visitors`
--
ALTER TABLE `hh_visitors`
  ADD CONSTRAINT `FK_VISITORS` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
