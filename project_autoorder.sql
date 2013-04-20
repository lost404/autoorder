-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 20 日 10:25
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `project_autoorder`
--

-- --------------------------------------------------------

--
-- 表的结构 `ao_member`
--

CREATE TABLE IF NOT EXISTS `ao_member` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `salt` int(11) NOT NULL,
  `regTime` text COLLATE utf8_bin NOT NULL,
  `group` int(11) NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `qq` text COLLATE utf8_bin NOT NULL,
  `phone` text COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ao_member`
--

INSERT INTO `ao_member` (`uid`, `username`, `password`, `salt`, `regTime`, `group`, `email`, `qq`, `phone`) VALUES
(1, 'admin', '028d43536048af7cc2ccd7534a8d594b', 530828857, '1366451899', 1, 'mail@domain.com', '123456789', '12345678901');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
