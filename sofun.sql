-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2014 年 01 月 16 日 19:31
-- 伺服器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `sofun`
--
CREATE DATABASE IF NOT EXISTS `sofun` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sofun`;

-- --------------------------------------------------------

--
-- 表的結構 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bid` int(9) NOT NULL AUTO_INCREMENT,
  `bname` varchar(20) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100000025 ;

--
-- 轉存資料表中的資料 `book`
--

INSERT INTO `book` (`bid`, `bname`) VALUES
(100000008, '好玩'),
(100000007, '開心'),
(100000006, '雄大'),
(100000024, '專題'),
(100000000, '未分類'),
(100000009, '新奇'),
(100000010, '可愛'),
(100000011, '幸福'),
(100000012, 'NUK'),
(100000013, '肥仔'),
(100000014, '假假'),
(100000015, '首手'),
(100000016, '畢業'),
(100000017, '肥咪'),
(100000018, '肥爹'),
(100000019, '玩樂'),
(100000021, '沉思'),
(100000022, '白癡'),
(100000023, '123');

-- --------------------------------------------------------

--
-- 表的結構 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `uid` int(9) NOT NULL,
  `bid` varchar(9) NOT NULL DEFAULT '100000000',
  `pid` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `collect`
--

INSERT INTO `collect` (`uid`, `bid`, `pid`) VALUES
(100000015, '100000021', 100000209),
(100000015, '100000023', 100000211),
(100000015, '100000019', 100000217),
(100000015, '100000008', 100000213),
(100000015, '100000000', 100000216),
(100000015, '100000000', 100000215),
(100000017, '100000006', 100000216),
(100000017, '100000007', 100000215),
(100000017, '100000024', 100000294),
(100000017, '100000019', 100000217),
(100000017, '100000000', 100000314),
(100000016, '100000008', 100000213),
(100000016, '100000000', 100000218),
(100000017, '100000000', 100000232),
(100000015, '100000000', 100000218),
(100000015, '100000000', 100000215),
(100000015, '100000000', 100000215),
(100000015, '100000000', 100000224),
(100000016, '100000019', 100000217),
(100000016, '100000009', 100000249),
(100000016, '100000000', 100000214),
(100000020, '100000000', 100000248),
(100000021, '100000000', 100000257),
(100000016, '100000000', 100000258),
(100000027, '100000011', 100000269),
(100000016, '100000000', 100000248),
(100000015, '100000000', 100000249),
(100000016, '100000000', 100000264),
(100000015, '100000000', 100000233),
(100000015, '100000000', 100000277),
(100000034, '100000016', 100000254),
(100000015, '100000000', 100000233),
(100000015, '100000000', 100000218),
(100000015, '100000000', 100000218),
(100000016, '100000000', 100000248),
(100000016, '100000000', 100000277),
(100000016, '100000000', 100000252);

-- --------------------------------------------------------

--
-- 表的結構 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `comment`
--

INSERT INTO `comment` (`pid`, `uid`, `time`, `content`) VALUES
(100000214, 100000016, '2013-11-25 03:20:27', '你們好棒'),
(100000249, 100000015, '2013-11-25 03:07:38', 'good'),
(100000224, 100000017, '2013-11-24 20:32:46', 'fight'),
(100000264, 100000016, '2013-11-25 02:27:46', '好好唷'),
(100000232, 100000017, '2013-11-24 20:26:34', '奔向自由!'),
(100000215, 100000023, '2013-11-25 02:11:54', '好棒！'),
(100000258, 100000022, '2013-11-25 02:09:26', '好可憐'),
(100000218, 100000018, '2013-11-24 08:32:38', '怎麼比得過哇嗚牛奶的肚子!'),
(100000258, 100000016, '2013-11-25 02:06:09', '好帥'),
(100000213, 100000018, '2013-11-24 08:30:09', '超危險的 連闖兩個紅燈><'),
(100000222, 100000016, '2013-11-24 07:52:18', '辛苦了'),
(100000248, 100000020, '2013-11-25 01:09:57', '你畢不了業!'),
(100000222, 100000018, '2013-11-24 08:26:31', '加油!!!'),
(100000215, 100000017, '2013-11-23 21:37:59', ':('),
(100000213, 100000017, '2013-11-23 21:36:37', '注意交通'),
(100000216, 100000028, '2013-11-25 02:54:22', '有正妹~~~~~ <3'),
(100000211, 100000016, '2013-11-24 21:47:36', '好可愛喲'),
(100000216, 100000015, '2013-11-23 20:59:04', '衝阿'),
(100000211, 100000019, '2013-11-23 20:56:36', '哈哈好笑喔'),
(100000216, 100000016, '2013-11-23 20:41:08', '好好喲'),
(100000213, 100000017, '2013-11-23 20:31:32', '你好可愛噢～～'),
(100000209, 100000017, '2013-11-23 20:31:22', '你   最     帥'),
(100000211, 100000017, '2013-11-23 20:31:09', '好可愛  最愛生態教學'),
(100000216, 100000017, '2013-11-23 20:28:41', '耶耶耶耶耶～:))'),
(100000214, 100000017, '2013-11-23 20:28:00', '永遠不寒冷'),
(100000214, 100000017, '2013-11-23 20:27:52', '暖呼乎的專題組'),
(100000215, 100000015, '2013-11-23 20:26:32', '嗚嗚'),
(100000214, 100000015, '2013-11-23 20:25:42', '超冷'),
(100000214, 100000016, '2013-11-23 20:25:13', '不怕冷喲？？'),
(100000211, 100000015, '2013-11-23 20:15:29', '胖米：你有病'),
(100000215, 100000017, '2013-11-25 00:25:43', '真捨不得'),
(100000217, 100000017, '2013-11-24 05:37:29', '耶 拍影片樂趣多'),
(100000218, 100000017, '2013-11-24 05:37:56', '誰能比你臉大'),
(100000221, 100000016, '2013-11-24 05:45:07', '那我幫你按贊'),
(100000264, 100000016, '2013-11-25 03:41:40', 'good'),
(100000264, 100000033, '2013-11-25 03:57:05', '好帥'),
(100000218, 100000019, '2013-11-27 20:45:17', '溝追喔'),
(100000313, 100000017, '2013-11-28 03:04:03', '日出很美'),
(100000218, 100000016, '2013-11-29 11:38:39', 'good'),
(100000258, 100000016, '2013-11-25 04:43:52', 'haha'),
(100000249, 100000017, '2013-11-25 07:14:55', '美麗'),
(100000294, 100000016, '2013-11-25 07:31:48', '你好');

-- --------------------------------------------------------

--
-- 表的結構 `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `uid1` int(11) NOT NULL,
  `uid2` int(11) NOT NULL,
  `relation` int(11) NOT NULL,
  PRIMARY KEY (`uid1`,`uid2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `friend`
--

INSERT INTO `friend` (`uid1`, `uid2`, `relation`) VALUES
(100000019, 100000016, 2),
(100000019, 100000018, 1),
(100000016, 100000015, 2),
(100000019, 100000015, 2),
(100000015, 100000019, 2),
(100000018, 100000016, 2),
(100000018, 100000015, 2),
(100000017, 100000018, 2),
(100000018, 100000017, 2),
(100000015, 100000017, 2),
(100000015, 100000016, 2),
(100000017, 100000015, 2),
(100000015, 100000018, 2),
(100000016, 100000017, 2),
(100000016, 100000019, 2),
(100000017, 100000019, 0),
(100000017, 100000016, 2),
(100000021, 100000018, 1),
(100000024, 100000018, 1),
(100000029, 100000015, 2),
(100000015, 100000029, 2),
(100000033, 100000016, 1),
(100000036, 100000023, 1),
(100000016, 100000018, 2);

-- --------------------------------------------------------

--
-- 表的結構 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `nid` int(9) NOT NULL AUTO_INCREMENT,
  `uid1` int(9) NOT NULL,
  `uid2` int(9) NOT NULL,
  `pid` int(9) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `n_read` int(11) NOT NULL DEFAULT '0',
  `n_content` varchar(30) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100000442 ;

--
-- 轉存資料表中的資料 `notice`
--

INSERT INTO `notice` (`nid`, `uid1`, `uid2`, `pid`, `time`, `n_read`, `n_content`) VALUES
(100000152, 100000015, 100000017, 100000215, '2013-11-23 20:26:24', 0, '在你的照片按讚'),
(100000150, 100000015, 100000016, 100000214, '2013-11-23 20:25:53', 0, '在你的照片按讚'),
(100000438, 100000016, 100000018, 100000218, '2013-11-29 11:38:39', 0, '在你的照片留言'),
(100000147, 100000015, 100000018, 100000213, '2013-11-23 20:25:05', 0, '在你的照片留言'),
(100000248, 100000016, 100000019, 100000232, '2013-11-24 21:17:57', 0, '在你的照片留言'),
(100000146, 100000015, 100000018, 100000213, '2013-11-23 20:24:56', 0, '在你的照片按讚'),
(100000142, 100000015, 100000017, 0, '2013-11-23 20:18:39', 0, '已接受你的交友邀請'),
(100000140, 100000015, 100000018, 100000211, '2013-11-23 20:15:29', 0, '在你的照片留言'),
(100000139, 100000015, 100000018, 100000211, '2013-11-23 20:15:01', 0, '在你的照片按讚'),
(100000136, 100000015, 100000016, 0, '2013-11-23 20:04:20', 0, '邀請你成為好友'),
(100000133, 100000015, 100000017, 0, '2013-11-23 20:04:08', 0, '開始追蹤你'),
(100000132, 100000015, 100000018, 0, '2013-11-23 20:03:59', 0, '邀請你成為好友'),
(100000131, 100000015, 100000018, 0, '2013-11-23 20:03:56', 0, '開始追蹤你'),
(100000239, 100000017, 100000016, 0, '2013-11-24 20:21:41', 0, '開始追蹤你'),
(100000168, 100000015, 100000019, 0, '2013-11-23 20:58:25', 0, '開始追蹤你'),
(100000169, 100000015, 100000019, 0, '2013-11-23 20:58:27', 0, '邀請你成為好友'),
(100000170, 100000015, 100000018, 100000216, '2013-11-23 20:58:42', 0, '在你的照片按讚'),
(100000171, 100000015, 100000018, 100000216, '2013-11-23 20:59:04', 0, '在你的照片留言'),
(100000173, 100000015, 100000016, 100000217, '2013-11-23 20:59:21', 0, '在你的照片按讚'),
(100000175, 100000015, 100000018, 100000218, '2013-11-23 20:59:29', 0, '在你的照片按讚'),
(100000253, 100000016, 100000018, 100000211, '2013-11-24 21:47:36', 0, '在你的照片留言'),
(100000187, 100000015, 100000016, 100000217, '2013-11-24 06:04:56', 0, '在你的照片按讚'),
(100000188, 100000015, 100000018, 100000218, '2013-11-24 06:05:41', 0, '在你的照片按讚'),
(100000193, 100000016, 100000015, 0, '2013-11-24 12:01:53', 0, '已接受你的交友邀請'),
(100000202, 100000015, 100000016, 100000217, '2013-11-24 17:22:48', 0, '在你的照片按讚'),
(100000203, 100000015, 100000019, 100000248, '2013-11-24 17:33:24', 0, '在你的照片按讚'),
(100000204, 100000015, 100000017, 100000215, '2013-11-24 17:33:55', 0, '推薦了一張照片給你'),
(100000206, 100000015, 100000017, 100000215, '2013-11-24 17:34:19', 0, '在你的照片按讚'),
(100000208, 100000015, 100000017, 0, '2013-11-24 17:48:45', 0, '邀請你成為好友'),
(100000249, 100000016, 100000015, 100000249, '2013-11-24 21:18:23', 0, '在你的照片留言'),
(100000214, 100000016, 100000019, 0, '2013-11-24 18:20:16', 0, '已接受你的交友邀請'),
(100000238, 100000017, 100000016, 0, '2013-11-24 20:21:07', 0, '邀請你成為好友'),
(100000433, 100000019, 100000018, 100000218, '2013-11-27 20:45:17', 0, '在你的照片留言'),
(100000434, 100000015, 100000016, 100000294, '2013-11-28 02:48:25', 0, '在你的照片按讚'),
(100000435, 100000017, 100000019, 100000292, '2013-11-28 02:54:25', 0, ''),
(100000436, 100000017, 100000017, 100000314, '2013-11-28 03:01:49', 0, ''),
(100000437, 100000016, 100000017, 100000248, '2013-11-29 11:37:26', 0, '推薦了一張照片給你'),
(100000310, 100000021, 100000018, 0, '2013-11-25 01:55:48', 0, '邀請你成為好友'),
(100000311, 100000016, 100000021, 100000258, '2013-11-25 02:06:09', 0, '在你的照片留言'),
(100000313, 100000022, 100000021, 100000258, '2013-11-25 02:09:26', 0, '在你的照片留言'),
(100000319, 100000024, 100000018, 0, '2013-11-25 02:26:46', 0, '邀請你成為好友'),
(100000441, 100000017, 100000018, 100000216, '2013-12-28 10:38:10', 0, ''),
(100000439, 100000016, 100000018, 100000218, '2013-11-29 11:38:49', 0, '在你的照片按讚'),
(100000440, 100000017, 100000019, 100000315, '2013-12-28 10:37:57', 0, ''),
(100000300, 100000020, 100000019, 100000248, '2013-11-25 01:09:57', 0, '在你的照片留言');

-- --------------------------------------------------------

--
-- 表的結構 `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `uid` int(9) NOT NULL,
  `pid` int(9) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL DEFAULT '0',
  `description` varchar(100) NOT NULL,
  `latitude` float NOT NULL DEFAULT '22.7334',
  `altitude` float NOT NULL DEFAULT '120.287',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100000319 ;

--
-- 轉存資料表中的資料 `photo`
--

INSERT INTO `photo` (`uid`, `pid`, `location`, `time`, `type`, `description`, `latitude`, `altitude`) VALUES
(100000016, 100000209, '台南市北區臨安路二段68巷3號', '2013-11-24 09:17:19', 5, '好煩啊阿啊阿啊阿啊阿啊啊～～～～～～', 23.0027, 120.197),
(100000017, 100000215, '811台灣高雄市楠梓區大學南路', '2013-11-23 20:25:13', 1, '不想畢業嗚嗚嗚嗚～～～\r\n想跟大家永遠在一起;(((', 22.7337, 120.282),
(100000019, 100000316, '813台灣高雄市左營區新左營火車站', '2013-11-28 03:28:16', 1, '看起來很好吃啊!!!', 22.6875, 120.307),
(100000018, 100000211, '南投縣國姓鄉長安路', '2013-11-24 09:16:57', 3, '今天到山上戶外教學，沒想到可以這麼近的看到螳螂耶，\r\n我們每個人眼睛都睜超大的o_o', 24.0752, 120.829),
(100000018, 100000213, '新竹縣橫山鄉中華街200號', '2013-11-24 09:18:50', 4, '誰能贏的了我!!輕輕鬆鬆遙遙領先^_^', 24.7124, 121.115),
(100000016, 100000214, '台灣高雄市楠梓區久昌街365號', '2013-11-24 09:18:42', 0, '吃冰囉～～～', 22.7145, 120.281),
(100000018, 100000216, '高雄市楠梓區大學南路', '2013-11-24 09:16:06', 4, '雄大戰鬥團隊畢業囉Q_Q\r\npinGO gogogo衝了!!!', 22.7349, 120.281),
(100000016, 100000217, '台灣高雄市鼓山區臨海新路', '2013-11-24 09:18:36', 0, '放風箏', 22.621, 120.276),
(100000018, 100000218, '花蓮縣萬榮鄉花45鄉道', '2013-11-24 09:16:31', 3, '誰能比我眼睛大 come on', 23.7022, 121.41),
(100000015, 100000222, '大學南路 393號', '2013-11-24 09:17:37', 3, '天蒙蒙亮的管院', 22.733, 120.288),
(100000017, 100000318, '104台灣台北市中山區台北大學', '2013-12-28 10:16:56', 5, '想說的話\r\n', 25.0579, 121.543),
(100000016, 100000317, 'No. 9-3 太明路成豐巷438弄 Wurih District Taichung City 414 Taiwan', '2013-11-29 11:35:16', 1, 'Soup', 24.0705, 120.65),
(100000019, 100000232, '台灣台南市中西區國立台南大學樹林街二段33號', '2013-11-24 09:18:57', 2, '跑啊孩子!!!!!!!!', 22.9851, 120.208),
(100000019, 100000248, '106台灣台北市大安區新生南路三段88號2樓之5', '2013-11-24 16:44:32', 3, '畢業囉!!!!~~', 25.0184, 121.534),
(100000015, 100000249, '蓮池潭, 台灣 813 高雄市 左營區 蓮潭路 121號–122號', '2013-11-24 17:03:09', 5, '美麗的煙火', 22.6844, 120.296),
(100000015, 100000254, '台灣 811 高雄市 高雄市 大學南路', '2013-11-25 05:43:40', 0, '', 22.7334, 120.287),
(100000021, 100000257, '220台灣新北市板橋區貴興路50號', '2013-11-25 01:57:46', 2, '', 25.0033, 121.457),
(100000016, 100000264, '中山大學', '2013-11-25 05:41:51', 4, '中山寧', 22.6251, 120.265),
(100000027, 100000269, '972台灣花蓮縣秀林鄉和平林道', '2013-11-25 02:49:32', 7, 'HI', 24.2346, 121.597),
(100000032, 100000277, '961台灣台東縣成功鎮南美山產業道路', '2013-11-25 03:49:50', 1, '你好', 23.1532, 121.367),
(100000017, 100000280, '114台灣台北市內湖區成功路五段450巷21弄43號', '2013-11-25 04:07:08', 11, '老爹好胖', 25.0733, 121.608),
(100000017, 100000313, '713台灣台南市左鎮區南162鄉道', '2013-11-28 01:59:34', 0, 'HI', 22.9927, 120.41),
(100000017, 100000314, '713台灣台南市左鎮區南162鄉道', '2013-11-28 03:01:27', 1, '來看日出', 22.9927, 120.41),
(100000019, 100000315, '811台灣高雄市楠梓區大學南路', '2013-11-28 03:25:29', 10, '好難過', 22.7349, 120.281),
(100000016, 100000285, '中華人民共和國廣東省中山市松苑路1号 邮政编码: 528403', '2013-11-25 04:34:50', 8, 'www', 22.5176, 113.393),
(100000016, 100000286, 'National University of Kaohsiung, Dasyue South Road Kaohsiung  Kaohsiung City 811 Taiwan', '2013-11-25 04:45:54', 3, 'Food', 22.7345, 120.285),
(100000019, 100000290, '400台灣台中市中區中山路24號', '2013-11-25 06:34:16', 4, '鳥兒好可愛啊~~~~', 24.1378, 120.683),
(100000019, 100000292, '804台灣高雄市鼓山區臨海新路', '2013-11-25 06:42:18', 2, '風箏飛阿飛阿~~', 22.621, 120.276),
(100000016, 100000294, '811台灣高雄市楠梓區大學南路', '2013-11-25 07:31:08', 1, '耶耶耶', 22.7349, 120.281),
(100000016, 100000295, 'Gangwon, South Korea', '2013-11-25 07:30:43', 7, '小胖', 37.6471, 128.616);

-- --------------------------------------------------------

--
-- 表的結構 `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rating` varchar(7) NOT NULL DEFAULT 'like',
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `ratings`
--

INSERT INTO `ratings` (`rating`, `pid`, `uid`) VALUES
('like', 100000215, 100000015),
('like', 100000214, 100000015),
('like', 100000213, 100000015),
('like', 100000214, 100000016),
('like', 100000215, 100000016),
('like', 100000209, 100000017),
('like', 100000211, 100000015),
('like', 100000209, 100000015),
('like', 100000218, 100000016),
('like', 100000214, 100000017),
('like', 100000216, 100000018),
('like', 100000213, 100000018),
('like', 100000211, 100000018),
('like', 100000216, 100000016),
('like', 100000214, 100000019),
('like', 100000217, 100000016),
('like', 100000217, 100000018),
('like', 100000216, 100000015),
('like', 100000217, 100000015),
('like', 100000218, 100000015),
('like', 100000211, 100000019),
('like', 100000213, 100000019),
('like', 100000222, 100000015),
('like', 100000217, 100000017),
('like', 100000222, 100000017),
('like', 100000315, 100000017),
('like', 100000213, 100000017),
('like', 100000209, 100000016),
('like', 100000248, 100000015),
('like', 100000211, 100000016),
('like', 100000218, 100000021),
('like', 100000258, 100000022),
('like', 100000215, 100000023),
('like', 100000264, 100000016),
('like', 100000265, 100000015),
('like', 100000268, 100000015),
('like', 100000265, 100000016),
('like', 100000216, 100000028),
('like', 100000249, 100000015),
('like', 100000268, 100000017),
('like', 100000269, 100000030),
('like', 100000216, 100000017),
('like', 100000264, 100000033),
('like', 100000277, 100000016),
('like', 100000268, 100000034),
('like', 100000277, 100000015),
('like', 100000285, 100000016),
('like', 100000258, 100000016),
('like', 100000249, 100000036),
('like', 100000277, 100000017),
('like', 100000280, 100000017),
('like', 100000248, 100000016),
('like', 100000267, 100000016),
('like', 100000257, 100000017),
('like', 100000283, 100000016),
('like', 100000295, 100000016),
('like', 100000292, 100000017);

-- --------------------------------------------------------

--
-- 表的結構 `read`
--

CREATE TABLE IF NOT EXISTS `read` (
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`uid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `last_nid` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100000038 ;

--
-- 轉存資料表中的資料 `user`
--

INSERT INTO `user` (`uid`, `account`, `password`, `last_nid`) VALUES
(100000023, 'betty', 'betty1130', 0),
(100000022, 'a1013304', 'a1013304', 0),
(100000021, 'tandy207', 'tandy0203', 0),
(100000020, 'handsomeyi', '123456', 0),
(100000019, 'consir', 'consir81620', 0),
(100000018, 'goodman', '123456', 0),
(100000017, 'test', 'test', 0),
(100000016, 'a7891905', 'd122459912', 0),
(100000015, 'genius', '123456', 0),
(100000024, 'QQ123', '123456', 0),
(100000025, 'Miya Zhan', '123456', 0),
(100000026, 'et0743', 'ET1234', 0),
(100000027, 'babyaaa', '123456', 0),
(100000028, 's92061032', 'eyre2012', 0),
(100000029, 'maido', '19920402', 0),
(100000030, 'marco', 'polo12568', 0),
(100000031, 'a1011818', 'r124302159', 0),
(100000032, 'wade10903', 'oymvqlrd', 0),
(100000033, 'teolll', '31031992', 0),
(100000034, 'casse', 'yabi1234', 0),
(100000035, 'leevv', '800216', 0),
(100000036, 'Ding123', '123456', 0);

-- --------------------------------------------------------

--
-- 表的結構 `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `uid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` int(20) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `user_profile`
--

INSERT INTO `user_profile` (`uid`, `name`, `sex`, `birthday`, `email`) VALUES
(100000023, 'betty', 1, '1992-11-30', 'kuttunbetty@gmail.com'),
(100000022, '相會', 0, '1993-09-13', 'cm491648@gmail.com'),
(100000021, '田博鈞', 0, '1994-02-03', 'tandy308@gmail.com'),
(100000020, '小帥', 0, '1991-09-18', 'hll9257@gmail.com'),
(100000019, '傑瑞', 0, '1992-06-20', 'consir81620@yahoo.com.tw'),
(100000018, '好小子', 0, '2013-11-24', 'cchaha902@yahoo.com.tw'),
(100000017, '張靜儀', 1, '1992-04-24', 'wowmilk@livemail.tw'),
(100000016, 'ChengHan', 0, '1990-07-24', 'a7891905@gmail.com'),
(100000015, '天才爹', 0, '2013-11-24', 'genius761112@hotmail.com'),
(100000024, 'QQ', 1, '1993-08-25', 'wa712112@hotmail.com.tw'),
(100000025, 'Miya', 1, '1992-03-11', 'wind3411@hotmail.com'),
(100000026, 'ET', 1, '1990-12-23', 'esther@g.com'),
(100000027, '黃梔陳', 1, '1991-11-04', 'baby0401aaa@yahoo.com.tw'),
(100000028, '蔡佩思', 1, '1992-06-26', 's92061032@yahoo.com.tw'),
(100000029, '麥兜', 0, '1992-04-02', 'question8142@gmail.com'),
(100000030, '鄭皓中', 1, '1992-12-03', 'rockon40100@yahoo.com.tw'),
(100000031, '廖偉翔', 0, '1993-09-14', 'abc4121737@yahoo.com.tw'),
(100000032, '巫沅霖', 0, '1991-09-04', 'wade10903@hotmail.com'),
(100000033, 'teochunlong', 0, '1992-03-31', 'teolllong1992@gmail.com'),
(100000034, 'Casse', 1, '1992-08-26', 'casse82665@gmail.com'),
(100000035, '李薇薇', 1, '1991-02-16', 'vitata.lee@gmail.com'),
(100000036, 'Ding', 1, '2013-01-01', 'sandytkps@yahoo.com.tw'),
(100000037, '宏祐', 0, '1992-06-20', 'consir81620@yahoo.com.tw');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
