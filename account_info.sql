-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2019-07-25 21:05:31
-- 伺服器版本： 5.7.24
-- PHP 版本： 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `account`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account_info`
--

CREATE TABLE `account_info` (
  `id` int(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `mailbox` varchar(255) NOT NULL,
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `account_info`
--

INSERT INTO `account_info` (`id`, `account`, `name`, `gender`, `birthday`, `mailbox`, `remarks`) VALUES
(1, 'ck79land2@gmail.com', '羅奇而', '男', '1994-02-24', 'ck79land2@gmail.com', 'TEST TEXT'),
(3, 'ck79land4@gmail.com', '易大師', '男', '2005-08-12', 'ck79land4@gmail.com', 'TEST3'),
(4, 'ck79land5@gmail.com', '好吃的', '男', '2005-08-11', 'ck79land5@gmail.com', 'TEST4'),
(5, 'ck79land6@gmail.com', '水蓮花', '女', '2005-08-13', 'ck79land6@gmail.com', 'TEST5'),
(6, 'ck79land7@gmail.com', '阿隆索', '男', '2006-08-13', 'ck79land7@gmail.com', 'TEST6'),
(7, 'ck79land8@gmail.com', '詹姆士', '男', '2006-08-17', 'ck79land8@gmail.com', 'TEST6');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `帳號` (`account`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
