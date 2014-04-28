-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 08 月 29 日 02:19
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
CREATE DATABASE IF NOT EXISTS `heihei` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `heihei`;

-- --------------------------------------------------------

--
-- 表的结构 `hh_articles`
--

CREATE TABLE IF NOT EXISTS `hh_articles` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `article_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `article_title` varchar(255) DEFAULT NULL,
  `article` text,
  `attachment` varchar(255) DEFAULT NULL,
  `comment_amount` int(11) NOT NULL DEFAULT '0',
  `favourite_amount` int(11) NOT NULL DEFAULT '0',
  `forward_amount` int(11) NOT NULL DEFAULT '0',
  `comment_amount_before` int(11) NOT NULL DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`,`article_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_comment_articles`
--

CREATE TABLE IF NOT EXISTS `hh_comment_articles` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `article_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `commentid` int(11) NOT NULL DEFAULT '0',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`,`article_date`,`commentid`,`comment_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_comment_messages`
--

CREATE TABLE IF NOT EXISTS `hh_comment_messages` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `message_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `commentid` int(11) NOT NULL DEFAULT '0',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`,`message_date`,`commentid`,`comment_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_favourite_articles`
--

CREATE TABLE IF NOT EXISTS `hh_favourite_articles` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `article_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `favouriteid` int(11) NOT NULL DEFAULT '0',
  `favourite_date` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`,`article_date`,`favouriteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_favourite_messages`
--

CREATE TABLE IF NOT EXISTS `hh_favourite_messages` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `message_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `favouriteid` int(11) NOT NULL DEFAULT '0',
  `favourite_date` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`,`message_date`,`favouriteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_friends`
--

CREATE TABLE IF NOT EXISTS `hh_friends` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `friendid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`,`friendid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_messages`
--

CREATE TABLE IF NOT EXISTS `hh_messages` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `message_date` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `comment_amount` int(11) DEFAULT '0',
  `favourite_amount` int(11) DEFAULT '0',
  `forward_amount` int(11) DEFAULT '0',
  `new_comment_flag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`userid`,`message_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hh_messages`
--

INSERT INTO `hh_messages` (`userid`, `message_date`, `message`, `comment_amount`, `favourite_amount`, `forward_amount`, `new_comment_flag`) VALUES
(1, 1377716315, 'ee', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `hh_replys`
--

CREATE TABLE IF NOT EXISTS `hh_replys` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `reply_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reply` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `reply_type` enum('message','article') DEFAULT NULL,
  PRIMARY KEY (`userid`,`reply_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_reply_replys`
--

CREATE TABLE IF NOT EXISTS `hh_reply_replys` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `reply_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `replyid` int(11) NOT NULL DEFAULT '0',
  `reply_reply_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reply` varchar(255) DEFAULT NULL,
  `flag` enum('true','false') NOT NULL DEFAULT 'false',
  `reply_type` enum('message','article') DEFAULT NULL,
  PRIMARY KEY (`userid`,`reply_date`,`replyid`,`reply_reply_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hh_users`
--

CREATE TABLE IF NOT EXISTS `hh_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `layout` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `hh_users`
--

INSERT INTO `hh_users` (`userid`, `email`, `password`, `username`, `layout`, `headphoto`, `sex`, `age`, `college`, `company`, `visitors_amount`) VALUES
(1, 'afeiszh@gamil.com', 'b59c67bf196a4758191e42f76670ceba', 'afei', 'userinfo,userstatus,usermessage,visitor,heiyoupanel,', '6fa00eb9fc018457c5491091536cb03c.png', 'male', 22, '上海大学', '好耶', 0),
(6, 'afeiszh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '商煜', NULL, NULL, 'male', NULL, NULL, NULL, 0),
(10, '123@sina.com', '81dc9bdb52d04dc20036dbd8313ed055', '张三', NULL, NULL, 'female', NULL, NULL, NULL, 0),
(11, 'sss@163.com', '81dc9bdb52d04dc20036dbd8313ed055', '黄申', NULL, NULL, 'male', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `hh_visitors`
--

CREATE TABLE IF NOT EXISTS `hh_visitors` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `visitid` int(11) NOT NULL DEFAULT '0',
  `visitors_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`userid`,`visitid`,`visitors_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- 限制表 `hh_articles`
--
ALTER TABLE `hh_articles`
  ADD CONSTRAINT `FK_ARTICLES` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_comment_articles`
--
ALTER TABLE `hh_comment_articles`
  ADD CONSTRAINT `FK_COMMENT_ARTICLES` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_comment_messages`
--
ALTER TABLE `hh_comment_messages`
  ADD CONSTRAINT `FK_COMMENT_MESSAGES` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_favourite_articles`
--
ALTER TABLE `hh_favourite_articles`
  ADD CONSTRAINT `FK_FAVOURITE_ARTICLES` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_favourite_messages`
--
ALTER TABLE `hh_favourite_messages`
  ADD CONSTRAINT `FK_FAVOURITE_MESSAGES` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_friends`
--
ALTER TABLE `hh_friends`
  ADD CONSTRAINT `FK_FRIENDS` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_messages`
--
ALTER TABLE `hh_messages`
  ADD CONSTRAINT `FK_MESSAGES` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_replys`
--
ALTER TABLE `hh_replys`
  ADD CONSTRAINT `FK_REPLYS` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_reply_replys`
--
ALTER TABLE `hh_reply_replys`
  ADD CONSTRAINT `FK_REPLY_REPLYS` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

--
-- 限制表 `hh_visitors`
--
ALTER TABLE `hh_visitors`
  ADD CONSTRAINT `FK_VISITORS` FOREIGN KEY (`userid`) REFERENCES `hh_users` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
