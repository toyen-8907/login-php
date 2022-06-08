-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-05 08:56:36
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `torf_homework`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `ac_id` int(20) NOT NULL,
  `accountName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`ac_id`, `accountName`, `password`, `address`) VALUES
(1, 'admin', 'xxx8907', ''),
(84, 'fang', '123456', 'taichung'),
(85, 'chen', '12345687', 'tainan'),
(86, 'ken', '123456', 'hualien'),
(87, 'jack', '123456', 'taitung'),
(88, 'jason', '123456', 'taipei'),
(90, 'aaaa', '0831', '5 東區 115, TWN');

-- --------------------------------------------------------

--
-- 資料表結構 `buylist`
--

CREATE TABLE `buylist` (
  `list_id` int(20) NOT NULL,
  `pd_num` int(10) NOT NULL DEFAULT 1,
  `pdID` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `buylist`
--

INSERT INTO `buylist` (`list_id`, `pd_num`, `pdID`, `order_id`) VALUES
(1, 1, 1, 2),
(5, 1, 5, 3),
(6, 1, 4, 4),
(7, 1, 6, 5),
(8, 1, 5, 6),
(9, 1, 2, 7),
(24, 1, 4, 9),
(25, 1, 8, 10),
(26, 1, 9, 11),
(27, 1, 7, 12),
(39, 1, 3, 14),
(40, 1, 1, 15),
(41, 1, 8, 16),
(42, 1, 1, 17),
(43, 1, 3, 18),
(45, 1, 3, 19),
(52, 3, 2, 357),
(53, 2, 2, 358),
(54, 2, 4, 359),
(55, 2, 2, 360);

-- --------------------------------------------------------

--
-- 資料表結構 `pd_list`
--

CREATE TABLE `pd_list` (
  `pd_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(5) NOT NULL,
  `pd_id` int(20) NOT NULL,
  `pd_img_address` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `pd_list`
--

INSERT INTO `pd_list` (`pd_name`, `price`, `pd_id`, `pd_img_address`) VALUES
('university_blue', 8000, 1, 'img/uni.jpg'),
('coast', 10000, 2, 'img/56_工作區域 1.png'),
('georgetown', 7500, 3, 'img/S__152002567.jpg'),
('AF1', 3000, 4, 'img/af1.jpg'),
('team_green', 8900, 5, 'img/S__152002569.jpg'),
('light_bone', 6100, 6, 'img/S__152002570.jpg'),
('next_nature', 4200, 7, 'img/工作區域 1 複本 2.png'),
('harvest_moon', 4330, 8, 'img/工作區域 1 複本 3.png'),
('light_violet', 5190, 9, 'img/工作區域 1 複本 4.png');

-- --------------------------------------------------------

--
-- 資料表結構 `pd_order`
--

CREATE TABLE `pd_order` (
  `order_id` int(20) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '下單成功',
  `ac_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `pd_order`
--

INSERT INTO `pd_order` (`order_id`, `order_date`, `order_status`, `ac_id`) VALUES
(2, '2022-05-22', '運送中', 84),
(3, '2022-05-29', '運送中', 85),
(4, '2022-05-29', '運送中', 86),
(5, '2022-05-29', '運送中', 87),
(6, '2022-05-29', '運送中', 87),
(7, '2022-05-29', '運送中', 85),
(9, '2022-05-29', ' 賣家包貨中', 88),
(10, '2022-05-29', ' 賣家包貨中', 88),
(11, '2022-05-29', '運送中', 85),
(12, '2022-05-29', ' 賣家包貨中', 86),
(14, '2022-05-29', ' 賣家包貨中', 88),
(15, '2022-05-29', '下單成功', 88),
(16, '2022-05-29', '運送中', 85),
(17, '2022-05-29', '下單成功', 86),
(18, '2022-05-29', '下單成功', 87),
(19, '2022-05-29', '下單成功', 88),
(357, '2022-05-29', '下單成功', 85),
(358, '2022-05-29', '下單成功', 85),
(359, '2022-05-30', '下單成功', 85),
(360, '2022-05-31', '下單成功', 85);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_id`);

--
-- 資料表索引 `buylist`
--
ALTER TABLE `buylist`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pdID` (`pdID`);

--
-- 資料表索引 `pd_list`
--
ALTER TABLE `pd_list`
  ADD PRIMARY KEY (`pd_id`);

--
-- 資料表索引 `pd_order`
--
ALTER TABLE `pd_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ac_id` (`ac_id`) USING BTREE;

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account`
--
ALTER TABLE `account`
  MODIFY `ac_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `buylist`
--
ALTER TABLE `buylist`
  MODIFY `list_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pd_list`
--
ALTER TABLE `pd_list`
  MODIFY `pd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pd_order`
--
ALTER TABLE `pd_order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `buylist`
--
ALTER TABLE `buylist`
  ADD CONSTRAINT `buylist_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `pd_order` (`order_id`),
  ADD CONSTRAINT `buylist_ibfk_2` FOREIGN KEY (`pdID`) REFERENCES `pd_list` (`pd_id`);

--
-- 資料表的限制式 `pd_order`
--
ALTER TABLE `pd_order`
  ADD CONSTRAINT `pd_order_ibfk_1` FOREIGN KEY (`ac_id`) REFERENCES `account` (`ac_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
