-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2019 at 06:38 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9352898_phonicapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_id` int(11) NOT NULL COMMENT 'รหัสแอดมิน',
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_fullname` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `admin_username`, `admin_password`, `admin_fullname`, `admin_email`, `create_date`) VALUES
(1, 'admin', 'rlqc.xnOtzQ6A', 'กัญธิญา วงษ์เวียน', 'kantiyachiablaem13@gmail.com', '2019-05-17 18:05:40'),
(2, 'phonratichai', 'rlxCGZggQHTOk', 'พรระติชัย ไวโรจนะพุทธะ', 'phonratichai11@gmail.com', '2019-05-25 07:18:13'),
(3, 'aum', 'rlSE61ciQsCrc', 'อาจารย์ อั้ม', 'aum@lru.ac.th', '2019-07-15 15:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `exam_detail`
--

CREATE TABLE `exam_detail` (
  `exam_id` int(10) NOT NULL COMMENT 'รหัสแบบทดสอบ',
  `level` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'level',
  `question_no` int(10) NOT NULL COMMENT 'ลำดับคำถาม',
  `question_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำถาม',
  `question_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปภาพคำถาม',
  `question_sound` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เสียงคำถาม',
  `answer_style` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปแบบของคำตอบ ''0'' คำตอบเป็นข้อความ, ''1'' คำตอบเป็นรูปภาพ, ''2'' คำตอบเป็นเสียง',
  `answer_a` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ a',
  `answer_b` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ b',
  `answer_c` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ c',
  `answer_d` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ d',
  `answer_e` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ e',
  `answer_key` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เฉลยคำตอบ',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_detail`
--

CREATE TABLE `lesson_detail` (
  `lesson_id` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT 'รหัสบทเรียน',
  `level` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Level No',
  `lesson_no` int(5) NOT NULL COMMENT 'ลำดับบทเรียน',
  `lesson_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อบทเรียน',
  `lesson_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำอธิบายบทเรียน',
  `small_image` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปบทเรียน',
  `big_image` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปบทเรียนใหญ่',
  `maxpage` int(11) NOT NULL,
  `youtube` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson_detail`
--

INSERT INTO `lesson_detail` (`lesson_id`, `level`, `lesson_no`, `lesson_name`, `lesson_desc`, `small_image`, `big_image`, `maxpage`, `youtube`, `create_date`) VALUES
('10', '2', 4, 'Lesson 4', 'Word with Final Double Consonant Blends', 'img/level2/4.jpg', 'img/level2/4.jpg', 2, 'IlrpXZ-qvcI', '2019-05-04 08:56:32'),
('11', '2', 5, 'Lesson 5', 'Word Ending with ‘ck’', 'img/level2/5.jpg', 'img/level2/5.jpg', 2, 'YrwksxKtguo', '2019-05-04 08:56:50'),
('12', '2', 6, 'Lesson 6', 'Word Ending with ‘ng’', 'img/level2/6.jpg', 'img/level2/6.jpg', 2, 'bDtadX27Byo', '2019-05-04 08:56:59'),
('13', '2', 7, 'Lesson 7', 'Word Ending with ‘nk’', 'img/level2/7.jpg', 'img/level2/7.jpg', 2, 'cipGKPTYlC8', '2019-05-04 08:57:11'),
('14', '2', 8, 'Lesson 8', 'Word Ending with ‘tch’', 'img/level2/8.jpg', 'img/level2/8.jpg', 2, 'Cv1a3KM3cjY', '2019-05-04 08:57:22'),
('15', '2', 9, 'Lesson 9', 'Word Beginning with ‘sh’ and Word Ending with ‘sh’', 'img/level2/9.jpg', 'img/level2/9.jpg', 2, 'K2lGEBCYR8M', '2019-05-04 08:57:31'),
('16', '2', 10, 'Lesson 10', 'Word Beginning with ‘ch’ and Word Ending with ‘ch’', 'img/level2/10.jpg', 'img/level2/10.jpg', 2, 'uRetoiZB8BI', '2019-05-04 08:57:42'),
('17', '2', 11, 'Lesson 11', 'Word Beginning with ‘th’ and Word Ending with ‘th’', 'img/level2/11.jpg', 'img/level2/11.jpg', 2, '8Bv0Ur_PFI8', '2019-05-04 08:57:55'),
('18', '2', 12, 'Lesson 12', 'Names', 'img/level2/12.jpg', 'img/level2/12.jpg', 4, 'NYeJtSe9m_c', '2019-05-04 09:05:25'),
('19', '3', 1, 'Lesson 1', 'Words with Silent ‘ e ’ - Long ‘ a ’ Sound', 'img/level3/1.jpg', 'img/level3/1.jpg', 3, '6I6Kz53Bo0M', '2019-05-04 09:11:32'),
('2', '1', 2, 'Lesson 2', 'Word with Short Vowel \' a \'', 'img/level1/2.jpg', 'img/level1/2big.jpg', 3, 'MIKPGMkfNQY', '2019-05-04 08:53:29'),
('20', '3', 2, 'Lesson 2', 'Words with Silent ‘ e ’ - Long ‘ i ’ Sound', 'img/level3/2.jpg', 'img/level3/2.jpg', 3, 'jHh49-K0y6c', '2019-05-04 09:11:41'),
('21', '3', 3, 'Lesson 3', 'Words with Silent ‘ e ’ - Long ‘ o ’ Sound', 'img/level3/3.jpg', 'img/level3/3.jpg', 3, '2FcfDfrxbvE', '2019-05-04 09:11:52'),
('22', '3', 4, 'Lesson 4', 'Words with Silent ‘ e ’ - Long ‘ u ’ Sound', 'img/level3/4.jpg', 'img/level3/4.jpg', 2, '7cFMPEZpafI', '2019-05-04 09:12:03'),
('23', '3', 5, 'Lesson 5', 'Words Ending with ‘ ce ’', 'img/level3/5.jpg', 'img/level3/5.jpg', 3, '-CY6BP-FGTU', '2019-05-04 09:12:17'),
('24', '3', 6, 'Lesson 6', 'Words with ‘ ee ’', 'img/level3/6.jpg', 'img/level3/6.jpg', 3, 't4-giUXk6a0', '2019-05-04 09:12:56'),
('25', '3', 7, 'Lesson 7', 'Words with ‘ ea ’', 'img/level3/7.jpg', 'img/level3/7.jpg', 3, 'C_NBZvkVGHs', '2019-05-04 09:13:03'),
('26', '3', 8, 'Lesson 8', 'Words with ‘ ai ’', 'img/level3/8.jpg', 'img/level3/8.jpg', 3, 'Pt8oFVud3C4', '2019-05-04 09:13:24'),
('27', '3', 9, 'Lesson 9', 'Words Ending with ‘ ay ’', 'img/level3/9.jpg', 'img/level3/9.jpg', 2, 'Li5a-jmOSBQ', '2019-05-04 09:14:26'),
('28', '3', 10, 'Lesson 10', 'Words with ‘ oa ’', 'img/level3/10.jpg', 'img/level3/10.jpg', 3, 'MmlIRDeofb4', '2019-05-04 09:14:33'),
('29', '3', 11, 'Lesson 11', 'Words with ‘ ow ’', 'img/level3/11.jpg', 'img/level3/11.jpg', 3, 'jdrCPpSAwPQ', '2019-05-04 09:14:41'),
('3', '1', 3, 'Lesson 3', 'Word with Short Vowel \' e \'', 'img/level1/3.jpg', 'img/level1/3big.jpg', 2, 'AmsRtWnzG0c', '2019-05-04 08:53:59'),
('30', '4', 1, 'Lesson 1', 'Words with ‘ oo ’', 'img/level4/1.jpg', 'img/level4/1.jpg', 3, 'EsubPT3M6Tg', '2019-05-04 09:23:07'),
('31', '4', 2, 'Lesson 2', 'Words with ‘ ar ’', 'img/level4/2.jpg', 'img/level4/2.jpg', 3, '-7ljCMjzS8s', '2019-05-04 09:23:07'),
('32', '4', 3, 'Lesson 3', 'Words with ‘ or ’', 'img/level4/3.jpg', 'img/level4/3.jpg', 2, 'dDSxLdiDPAc', '2019-05-04 09:23:07'),
('33', '4', 4, 'Lesson 4', 'Words with ‘ er ’', 'img/level4/4.jpg', 'img/level4/4.jpg', 1, '1XPBaAnxyT8', '2019-05-04 09:23:07'),
('34', '4', 5, 'Lesson 5', 'Double Syllabic Words with ‘ er ’', 'img/level4/5.jpg', 'img/level4/5.jpg', 3, 'bwqm4purgjY', '2019-05-04 09:23:07'),
('35', '4', 6, 'Lesson 6', 'Words with ‘ ir ’', 'img/level4/6.jpg', 'img/level4/6.jpg', 2, 'l00s9BluobM', '2019-05-04 09:23:07'),
('36', '4', 7, 'Lesson 7', 'Words with ‘ ur ’', 'img/level4/7.jpg', 'img/level4/7.jpg', 2, '8xe5U1S6HBM', '2019-05-04 09:23:07'),
('37', '4', 8, 'Lesson 8.1', 'Words with ‘ ore ’', 'img/level4/8.1.jpg', 'img/level4/8.1.jpg', 1, 'XVeEHsbdJVo', '2019-05-04 09:44:09'),
('38', '4', 8, 'Lesson 8.2', 'Words with ‘ ie ’', 'img/level4/8.2.jpg', 'img/level4/8.2.jpg', 1, 'biiLK2VKo-w', '2019-05-04 09:44:09'),
('3AYN2M3WCy', '1', 7, 'test', 'test', 'img/level1/Screenshot from 2019-05-23 14-33-10.png', 'img/level1/Screenshot from 2019-05-23 14-33-10.png', 1, 'a5f32AnfdEw', '2019-07-14 23:30:34'),
('4', '1', 4, 'Lesson 4', 'Word with Short Vowel \' i \'', 'img/level1/4.jpg', 'img/level1/4big.jpg', 2, 'g64yToVaiwY', '2019-05-04 08:54:23'),
('40', '4', 10, 'Lesson 10', 'Words with ‘ ou ’', 'img/level4/10.jpg', 'img/level4/10.jpg', 2, 'PeDgRDEUgHI', '2019-05-04 09:44:09'),
('41', '4', 11, 'Lesson 11', 'Words with ‘ ow ’', 'img/level4/11.jpg', 'img/level4/11.jpg', 2, 'Yf0jO1BYqrk', '2019-05-04 09:44:09'),
('42', '4', 12, 'Lesson 12', 'Words with ‘ aw ’', 'img/level4/12.jpg', 'img/level4/12.jpg', 2, 'f-4nC6cbOXU', '2019-05-04 09:44:09'),
('42IPDpwcaR', '2', 13, 'garbage', 'garbage detail', 'img/level2/garbage.jpg', 'img/level2/garbage.jpg', 1, '', '2019-07-14 23:19:27'),
('43', '4', 13, 'Lesson 13', 'Words with ‘ al ’', 'img/level4/13.jpg', 'img/level4/13.jpg', 2, '51bciw3UB4E', '2019-05-04 09:44:09'),
('44', '4', 14, 'Lesson 14', 'Words with ‘ oi ’ and Words with ‘ oy ’', 'img/level4/14.jpg', 'img/level4/14.jpg', 3, 'GSunbdMLr9M', '2019-05-04 09:44:09'),
('45', '4', 15, 'Lesson 15', 'Words with ‘ ear ’', 'img/level4/15.jpg', 'img/level4/15.jpg', 2, 'IIwfElZVF3g', '2019-05-04 09:44:09'),
('46', '4', 16, 'Lesson 16', 'Words with ‘ air ’ and Words with ‘ are ’', 'img/level4/16.jpg', 'img/level4/16.jpg', 2, 'd-CyzEADIp0', '2019-05-04 09:44:09'),
('5', '1', 5, 'Lesson 5', 'Word with Short Vowel \' o \'', 'img/level1/5.jpg', 'img/level1/5big.jpg', 3, 'fxcF3PzDT2g', '2019-05-04 08:55:07'),
('6', '1', 6, 'Lesson 6', 'Word with Short Vowel \' u \'', 'img/level1/6.jpg', 'img/level1/6big.jpg', 3, 'AVD7MPRoRDU', '2019-05-04 08:55:16'),
('7', '2', 1, 'Lesson 1', 'Word with Initial Consonant Blends', 'img/level2/1.jpg', 'img/level2/1.jpg', 2, '2V7m9MQFBIQ', '2019-05-04 08:55:47'),
('8', '2', 2, 'Lesson 2', 'Word with Final Consonant Blends', 'img/level2/2.jpg', 'img/level2/2.jpg', 2, 'bDVipbp9XaI', '2019-05-04 08:56:02'),
('9', '2', 3, 'Lesson 3', 'Word with Initial and Final Consonant Blends', 'img/level2/3.jpg', 'img/level2/3.jpg', 2, 'gxvsorQu1U4', '2019-05-04 08:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_detail`
--

CREATE TABLE `quiz_detail` (
  `quiz_id` int(10) NOT NULL COMMENT 'รหัสแบบทดสอบ',
  `lesson_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสบทเรียน',
  `question_no` int(10) NOT NULL COMMENT 'ลำดับคำถาม',
  `question_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำถาม',
  `question_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปภาพคำถาม',
  `question_sound` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เสียงคำถาม',
  `answer_style` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปแบบของคำตอบ ''0'' คำตอบเป็นข้อความ, ''1'' คำตอบเป็นรูปภาพ, ''2'' คำตอบเป็นเสียง',
  `answer_a` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ a',
  `answer_b` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ b',
  `answer_c` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ c',
  `answer_d` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ d',
  `answer_e` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำตอบข้อ e',
  `answer_key` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เฉลยคำตอบ',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quiz_detail`
--

INSERT INTO `quiz_detail` (`quiz_id`, `lesson_id`, `question_no`, `question_title`, `question_image`, `question_sound`, `answer_style`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `answer_e`, `answer_key`, `create_date`) VALUES
(1, '7', 1, 'Which one are the initial consonant blends that related to the picture?', 'img/quiz/7_1.jpg', 'clap', '0', 'cr', 'cl', 'sl', 'pl', '', 'b', '2019-05-10 01:19:43'),
(2, '7', 2, 'Which one are the initial consonant blends that related to the picture?', 'img/quiz/7_2.jpg', 'crab', '0', 'cr', 'cl', 'sl', 'fl', '', 'a', '2019-05-10 01:19:43'),
(3, '7', 3, 'Which one are the initial consonant blends that related to the picture?', 'img/quiz/7_3.jpg', 'slip', '0', 'cr', 'cl', 'sl', 'fl', '', 'c', '2019-05-10 01:33:37'),
(4, '7', 4, 'Which one are the initial consonant blends that related to the picture?', 'img/quiz/7_4.jpg', 'flag', '0', 'pl', 'cl', 'sl', 'fl', '', 'd', '2019-05-14 19:46:57'),
(5, '7', 5, 'Which one are the initial consonant blends that related to the picture?', 'img/quiz/7_5.jpg', 'plum', '0', 'pl', 'cl', 'sl', 'fl', '', 'a', '2019-05-14 19:47:41'),
(6, '8', 1, 'Which one are the final consonant blends that related to the picture?', 'img/quiz/8_1.jpg', 'west', '0', 'th', 'rd', 'st', 'nd', '', 'c', '2019-05-13 01:19:43'),
(7, '8', 2, 'Which one are the final consonant blends that related to the picture?', 'img/quiz/8_2.jpg', 'bulb', '0', 'lb', 'nd', 'st', 'lf', '', 'a', '2019-05-13 01:19:43'),
(8, '8', 3, 'Which one are the final consonant blends that related to the picture?', 'img/quiz/8_3.jpg', 'lamp', '0', 'nd', 'mp', 'st', 'lf', '', 'b', '2019-05-13 01:19:43'),
(9, '8', 4, 'Which one are the final consonant blends that related to the picture?', 'img/quiz/8_4.jpg', 'pond', '0', 'st', 'et', 'nd', 'mp', '', 'c', '2019-05-13 01:19:43'),
(10, '8', 5, 'Which one are the final consonant blends that related to the picture?', 'img/quiz/8_5.jpg', 'tent', '0', 'nd', 'st', 'lb', 'nt', '', 'd', '2019-05-13 01:19:43'),
(11, '9', 1, 'Which one are the initial and final consonant blends that related to the picture?', 'img/quiz/9_1.jpg', 'plump', '0', 'pl_mp', 'cl_mp', 'st_mp', 'st_nd', '', 'a', '2019-05-14 01:19:43'),
(12, '9', 2, 'Which one are the initial and final consonant blends that related to the picture?', 'img/quiz/9_2.jpg', 'stamp', '0', 'pl_mp', 'cl_mp', 'st_mp', 'st_nd', '', 'c', '2019-05-14 01:19:43'),
(13, '9', 3, 'Which one are the initial and final consonant blends that related to the picture?', 'img/quiz/9_3.jpg', 'stump', '0', 'pl_mp', 'cl_mp', 'st_mp', 'st_nd', '', 'c', '2019-05-14 01:19:43'),
(14, '9', 4, 'Which one are the initial and final consonant blends that related to the picture?', 'img/quiz/9_4.jpg', 'blond', '0', 'pl_mp', 'bl_nd', 'cl_mp', 'st_nd', '', 'b', '2019-05-14 01:19:43'),
(15, '9', 5, 'Which one are the initial and final consonant blends that related to the picture?', 'img/quiz/9_5.jpg', 'stand', '0', 'pl_mp', 'bl_nd', 'cl_mp', 'st_nd', '', 'd', '2019-05-14 01:19:43'),
(16, '1', 1, 'Choose the first letter of vocabulary that related to the picture.', 'img/quiz/1_1.jpg', 'egg', '0', 'a', 'd', 'e', 'g', '', 'c', '2019-05-15 01:19:43'),
(17, '1', 2, 'Choose the first letter of vocabulary that related to the picture.', 'img/quiz/1_2.jpg', 'ink', '0', 'e', 'f', 'h', 'i', '', 'd', '2019-05-15 01:19:43'),
(18, '1', 3, 'Choose the first letter of vocabulary that related to the picture.', 'img/quiz/1_3.jpg', 'jug', '0', 'h', 'i', 'j', 'k', '', 'c', '2019-05-15 01:19:43'),
(19, '1', 4, 'Choose the first letter of vocabulary that related to the picture.', 'img/quiz/1_4.jpg', 'orange', '0', 'm', 'n', 'o', 'p', '', 'c', '2019-05-15 01:19:43'),
(20, '1', 5, 'Choose the first letter of vocabulary that related to the picture.', 'img/quiz/1_5.jpg', 'yak', '0', 's', 't', 'x', 'y', '', 'd', '2019-05-15 01:19:43'),
(21, '2', 1, 'Matching the word to the picture.', 'img/quiz/', 'tap2', '0', 'fan', 'cab', 'tap', 'ham', 'hat', 'c', '2019-06-28 23:08:44'),
(22, '2', 2, 'Matching the word to the picture.', 'img/quiz/2_2.jpg', 'hat', '0', 'fan', 'cab', 'tap', 'ham', 'hat', 'e', '2019-05-14 20:25:31'),
(23, '2', 3, 'Matching the word to the picture.', 'img/quiz/2_3.jpg', 'fan', '0', 'fan', 'cab', 'tap', 'ham', 'hat', 'a', '2019-05-14 20:25:31'),
(24, '2', 4, 'Matching the word to the picture.', 'img/quiz/2_4.jpg', 'ham', '0', 'fan', 'cab', 'tap', 'ham', 'hat', 'd', '2019-05-14 20:25:31'),
(25, '2', 5, 'Matching the word to the picture.', 'img/quiz/2_5.jpg', 'cab', '0', 'fan', 'cab', 'tap', 'ham', 'hat', 'b', '2019-05-14 20:25:31'),
(26, '3', 1, 'Matching the word to the picture.', 'img/quiz/3_1.jpg', 'bed', '0', 'jet', 'red', 'bed', 'hen', 'net', 'c', '2019-05-14 20:34:47'),
(27, '3', 2, 'Matching the word to the picture.', 'img/quiz/3_2.jpg', 'red', '0', 'jet', 'red', 'bed', 'hen', 'net', 'b', '2019-05-14 20:34:47'),
(28, '3', 3, 'Matching the word to the picture.', 'img/quiz/3_3.jpg', 'hen', '0', 'jet', 'red', 'bed', 'hen', 'net', 'd', '2019-05-14 20:34:47'),
(29, '3', 4, 'Matching the word to the picture.', 'img/quiz/3_4.jpg', 'net', '0', 'jet', 'red', 'bed', 'hen', 'net', 'e', '2019-05-14 20:34:47'),
(30, '3', 5, 'Matching the word to the picture.', 'img/quiz/3_5.jpg', 'jet', '0', 'jet', 'red', 'bed', 'hen', 'net', 'a', '2019-05-14 20:34:47'),
(31, '4', 1, 'Matching the word to the picture.', 'img/quiz/4_1.jpg', 'dig', '0', 'dig', 'pin', 'hip', 'zip', 'win', 'a', '2019-05-14 20:34:47'),
(32, '4', 2, 'Matching the word to the picture.', 'img/quiz/4_2.jpg', 'win', '0', 'dig', 'pin', 'hip', 'zip', 'win', 'e', '2019-05-14 20:34:47'),
(33, '4', 3, 'Matching the word to the picture.', 'img/quiz/4_3.jpg', 'zip', '0', 'dig', 'pin', 'hip', 'zip', 'win', 'd', '2019-05-14 20:34:47'),
(34, '4', 4, 'Matching the word to the picture.', 'img/quiz/4_4.jpg', 'hip', '0', 'dig', 'pin', 'hip', 'zip', 'win', 'c', '2019-05-14 20:34:47'),
(35, '4', 5, 'Matching the word to the picture.', 'img/quiz/4_5.jpg', 'pin', '0', 'dig', 'pin', 'hip', 'zip', 'win', 'b', '2019-05-14 20:34:47'),
(36, '5', 1, 'Matching the word to the picture.', 'img/quiz/5_1.jpg', 'fox', '0', 'log', 'fox', 'cod', 'jog', 'cot', 'b', '2019-05-14 20:39:08'),
(37, '5', 2, 'Matching the word to the picture.', 'img/quiz/5_2.jpg', 'log', '0', 'log', 'fox', 'cod', 'jog', 'cot', 'a', '2019-05-14 20:39:08'),
(38, '5', 3, 'Matching the word to the picture.', 'img/quiz/5_3.jpg', 'jog', '0', 'log', 'fox', 'cod', 'jog', 'cot', 'd', '2019-05-14 20:39:08'),
(39, '5', 4, 'Matching the word to the picture.', 'img/quiz/5_4.jpg', 'cot', '0', 'log', 'fox', 'cod', 'jog', 'cot', 'e', '2019-05-14 20:39:08'),
(40, '5', 5, 'Matching the word to the picture.', 'img/quiz/5_5.jpg', 'cod', '0', 'log', 'fox', 'cod', 'jog', 'cot', 'c', '2019-05-14 20:39:08'),
(41, '6', 1, 'Matching the word to the picture.', 'img/quiz/6_1.jpg', 'tub', '0', 'bug', 'rug', 'hut', 'tub', 'mud', 'd', '2019-05-14 20:39:08'),
(42, '6', 2, 'Matching the word to the picture.', 'img/quiz/6_2.jpg', 'hut', '0', 'bug', 'rug', 'hut', 'tub', 'mud', 'c', '2019-05-14 20:39:08'),
(43, '6', 3, 'Matching the word to the picture.', 'img/quiz/6_3.jpg', 'mud', '0', 'bug', 'rug', 'hut', 'tub', 'mud', 'e', '2019-05-14 20:39:08'),
(44, '6', 4, 'Matching the word to the picture.', 'img/quiz/6_4.jpg', 'bug', '0', 'bug', 'rug', 'hut', 'tub', 'mud', 'a', '2019-05-14 20:39:08'),
(45, '6', 5, 'Matching the word to the picture.', 'img/quiz/6_5.jpg', 'rug', '0', 'bug', 'rug', 'hut', 'tub', 'mud', 'b', '2019-05-14 20:39:08'),
(46, '10', 1, 'Which one are the final double consonant blends that related to the picture?', 'img/quiz/10_1.jpg', 'bell', '0', 'll', 'ss', 'ff', 'zz', '', 'a', '2019-05-15 01:19:43'),
(47, '10', 2, 'Which one are the final double consonant blends that related to the picture?', 'img/quiz/10_2.jpg', 'ill', '0', 'll', 'ss', 'ff', 'zz', '', 'a', '2019-05-15 01:19:43'),
(48, '10', 3, 'Which one are the final double consonant blends that related to the picture?', 'img/quiz/10_3.jpg', 'dress', '0', 'll', 'ss', 'ff', 'zz', '', 'b', '2019-05-14 20:47:43'),
(49, '10', 4, 'Which one are the final double consonant blends that related to the picture?', 'img/quiz/10_4.jpg', 'off', '0', 'll', 'ss', 'ff', 'zz', '', 'c', '2019-05-14 20:47:43'),
(50, '10', 5, 'Which one are the final double consonant blends that related to the picture?', 'img/quiz/10_5.jpg', 'jazz', '0', 'll', 'ss', 'ff', 'zz', '', 'd', '2019-05-15 01:19:43'),
(51, '11', 1, 'Odd one out! which one is without ending with ‘ck’', '', '', '1', 'img/quiz/11_1.jpg', 'img/quiz/11_2.jpg', 'img/quiz/11_3.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(52, '11', 2, 'Odd one out! which one is without ending with ‘ck’', '', '', '1', 'img/quiz/11_4.jpg', 'img/quiz/11_5.jpg', 'img/quiz/11_6.jpg', '', '', 'b', '2019-05-15 01:19:43'),
(53, '11', 3, 'Odd one out! which one is without ending with ‘ck’', '', '', '1', 'img/quiz/11_7.jpg', 'img/quiz/11_8.jpg', 'img/quiz/11_9.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(54, '11', 4, 'Odd one out! which one is without ending with ‘ck’', '', '', '1', 'img/quiz/11_10.jpg', 'img/quiz/11_11.jpg', 'img/quiz/11_12.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(55, '11', 5, 'Odd one out! which one is without ending with ‘ck’', '', '', '1', 'img/quiz/11_13.jpg', 'img/quiz/11_14.jpg', 'img/quiz/11_15.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(56, '12', 1, 'Odd one out! which one is without ending with ‘ng’', '', '', '1', 'img/quiz/12_1.jpg', 'img/quiz/12_2.jpg', 'img/quiz/12_3.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(57, '12', 2, 'Odd one out! which one is without ending with ‘ng’', '', '', '1', 'img/quiz/12_4.jpg', 'img/quiz/12_5.jpg', 'img/quiz/12_6.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(58, '12', 3, 'Odd one out! which one is without ending with ‘ng’', '', '', '1', 'img/quiz/12_7.jpg', 'img/quiz/12_8.jpg', 'img/quiz/12_9.jpg', '', '', 'b', '2019-05-14 21:23:58'),
(59, '12', 4, 'Odd one out! which one is without ending with ‘ng’', '', '', '1', 'img/quiz/12_9.jpg', 'img/quiz/12_2.jpg', 'img/quiz/12_12.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(60, '12', 5, 'Odd one out! which one is without ending with ‘ng’', '', '', '1', 'img/quiz/12_13.jpg', 'img/quiz/12_3.jpg', 'img/quiz/12_4.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(61, '13', 1, 'Odd one out! which one is without ending with ‘nk’', '', '', '1', 'img/quiz/13_1.jpg', 'img/quiz/13_2.jpg', 'img/quiz/13_3.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(62, '13', 2, 'Odd one out! which one is without ending with ‘nk’', '', '', '1', 'img/quiz/13_4.jpg', 'img/quiz/13_5.jpg', 'img/quiz/13_6.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(63, '13', 3, 'Odd one out! which one is without ending with ‘nk’', '', '', '1', 'img/quiz/13_7.jpg', 'img/quiz/13_8.jpg', 'img/quiz/13_9.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(64, '13', 4, 'Odd one out! which one is without ending with ‘nk’', '', '', '1', 'img/quiz/13_1.jpg', 'img/quiz/13_6.jpg', 'img/quiz/13_12.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(65, '13', 5, 'Odd one out! which one is without ending with ‘nk’', '', '', '1', 'img/quiz/13_13.jpg', 'img/quiz/13_3.jpg', 'img/quiz/13_5.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(66, '14', 1, 'Odd one out! which one is without ending with ‘tch’', '', '', '1', 'img/quiz/14_1.jpg', 'img/quiz/14_2.jpg', 'img/quiz/14_3.jpg', '', '', 'b', '2019-05-15 01:19:43'),
(67, '14', 2, 'Odd one out! which one is without ending with ‘tch’', '', '', '1', 'img/quiz/14_4.jpg', 'img/quiz/14_5.jpg', 'img/quiz/14_6.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(68, '14', 3, 'Odd one out! which one is without ending with ‘tch’', '', '', '1', 'img/quiz/14_7.jpg', 'img/quiz/14_8.jpg', 'img/quiz/14_9.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(69, '14', 4, 'Odd one out! which one is without ending with ‘tch’', '', '', '1', 'img/quiz/14_1.jpg', 'img/quiz/14_11.jpg', 'img/quiz/14_3.jpg', '', '', 'b', '2019-05-15 01:19:43'),
(70, '14', 5, 'Odd one out! which one is without ending with ‘tch’', '', '', '1', 'img/quiz/14_4.jpg', 'img/quiz/14_8.jpg', 'img/quiz/14_15.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(71, '15', 1, 'Odd one out! which one is without beginning with ‘sh’ or ending with ‘sh’', '', '', '1', 'img/quiz/15_1.jpg', 'img/quiz/15_2.jpg', 'img/quiz/15_3.jpg', '', '', 'b', '2019-05-14 21:54:01'),
(72, '15', 2, 'Odd one out! which one is without beginning with ‘sh’ or ending with ‘sh’', '', '', '1', 'img/quiz/15_4.jpg', 'img/quiz/15_5.jpg', 'img/quiz/15_6.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(73, '15', 3, 'Odd one out! which one is without beginning with ‘sh’ or ending with ‘sh’', '', '', '1', 'img/quiz/15_7.jpg', 'img/quiz/15_8.jpg', 'img/quiz/15_9.jpg', '', '', 'c', '2019-05-15 01:19:43'),
(74, '15', 4, 'Odd one out! which one is without beginning with ‘sh’ or ending with ‘sh’', '', '', '1', 'img/quiz/15_10.jpg', 'img/quiz/15_11.jpg', 'img/quiz/15_12.jpg', '', '', 'b', '2019-05-15 01:19:43'),
(75, '15', 5, 'Odd one out! which one is without beginning with ‘sh’ or ending with ‘sh’', '', '', '1', 'img/quiz/15_13.jpg', 'img/quiz/15_14.jpg', 'img/quiz/15_15.jpg', '', '', 'a', '2019-05-15 01:19:43'),
(76, '16', 1, 'Odd one out! which one is without beginning with ‘ch’ or ending with ‘ch’', '', '', '1', 'img/quiz/16_1.jpg', 'img/quiz/16_2.jpg', 'img/quiz/16_3.jpg', '', '', 'a', '2019-05-16 01:19:43'),
(77, '16', 2, 'Odd one out! which one is without beginning with ‘ch’ or ending with ‘ch’', '', '', '1', 'img/quiz/16_4.jpg', 'img/quiz/16_5.jpg', 'img/quiz/16_6.jpg', '', '', 'c', '2019-05-16 01:19:43'),
(78, '16', 3, 'Odd one out! which one is without beginning with ‘ch’ or ending with ‘ch’', '', '', '1', 'img/quiz/16_7.jpg', 'img/quiz/16_8.jpg', 'img/quiz/16_9.jpg', '', '', 'c', '2019-05-16 01:19:43'),
(79, '16', 4, 'Odd one out! which one is without beginning with ‘ch’ or ending with ‘ch’', '', '', '1', 'img/quiz/16_10.jpg', 'img/quiz/16_11.jpg', 'img/quiz/16_12.jpg', '', '', 'a', '2019-05-16 01:19:43'),
(80, '16', 5, 'Odd one out! which one is without beginning with ‘ch’ or ending with ‘ch’', '', '', '1', 'img/quiz/16_13.jpg', 'img/quiz/16_14.jpg', 'img/quiz/16_15.jpg', '', '', 'b', '2019-05-16 01:19:43'),
(81, '17', 1, 'Odd one out! which one is without beginning with ‘th’ or ending with ‘th’', '', '', '1', 'img/quiz/17_1.jpg', 'img/quiz/17_2.jpg', 'img/quiz/17_3.jpg', '', '', 'a', '2019-05-17 01:19:43'),
(82, '17', 2, 'Odd one out! which one is without beginning with ‘th’ or ending with ‘th’', '', '', '1', 'img/quiz/17_4.jpg', 'img/quiz/17_5.jpg', 'img/quiz/17_6.jpg', '', '', 'b', '2019-05-17 01:19:43'),
(83, '17', 3, 'Odd one out! which one is without beginning with ‘th’ or ending with ‘th’', '', '', '1', 'img/quiz/17_7.jpg', 'img/quiz/17_8.jpg', 'img/quiz/17_9.jpg', '', '', 'c', '2019-05-17 01:19:43'),
(84, '17', 4, 'Odd one out! which one is without beginning with ‘th’ or ending with ‘th’', '', '', '1', 'img/quiz/17_10.jpg', 'img/quiz/17_11.jpg', 'img/quiz/17_12.jpg', '', '', 'a', '2019-05-17 01:19:43'),
(85, '17', 5, 'Odd one out! which one is without beginning with ‘th’ or ending with ‘th’', '', '', '1', 'img/quiz/17_2.jpg', 'img/quiz/17_14.jpg', 'img/quiz/17_4.jpg', '', '', 'b', '2019-05-17 01:19:43'),
(86, '19', 1, 'Which word does sound like ‘cake’ according to its vowel?', '', '', '0', 'spade', 'mad', 'port', 'dawn', '', 'a', '2019-05-15 11:19:43'),
(87, '19', 2, 'Which word does sond like ‘wave’ according to its vowel?', '', '', '0', 'glass', 'part', 'skate', 'card', '', 'c', '2019-05-15 11:19:43'),
(88, '19', 3, 'What letter is supposed to be in the blank?', 'img/quiz/19_1.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'c', '2019-05-15 11:19:43'),
(89, '19', 4, 'What letter is supposed to be in the blank?', 'img/quiz/19_2.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'a', '2019-05-15 11:19:43'),
(90, '19', 5, 'Which is Words with Silent ‘e’ - Long ‘a’ Sound?', '', '', '0', 'take', 'soup', 'green', 'great', '', 'a', '2019-05-15 11:19:43'),
(91, '19', 6, 'Does the ‘e’ have any sound when it is the last letter of words with the\r\nletter ‘a’?', '', '', '0', 'It sounds ‘ee’.', 'It has no sound.', 'It sounds like its name.', 'It has ‘e’ sound.', '', 'b', '2019-05-15 11:19:43'),
(92, '19', 7, 'Which picture is related to the words with silent ‘e’ and long ‘a’ sound?', '', '', '1', 'img/quiz/19_3.jpg', 'img/quiz/19_4.jpg', 'img/quiz/19_5.jpg', 'img/quiz/19_6.jpg', '', 'b', '2019-05-17 01:19:43'),
(93, '19', 8, 'Which picture <u>is not</u> related to the words with silent ‘e’ and long ‘a’\r\nsound?', '', '', '1', 'img/quiz/19_7.jpg', 'img/quiz/19_8.jpg', 'img/quiz/19_9.jpg', 'img/quiz/19_10.jpg', '', 'c', '2019-05-17 01:19:43'),
(94, '19', 9, 'Which is Words with Silent ‘e’ - Long ‘a’ Sound?', '', '', '0', 'job', 'sad', 'grade', 'hat', '', 'c', '2019-05-15 11:19:43'),
(95, '19', 10, 'Which <u>isn’t</u> Words with Silent ‘e’ - Long ‘a’ Sound?', '', '', '0', 'wake', 'date', 'ate', 'cat', '', 'd', '2019-05-15 11:19:43'),
(96, '20', 1, 'Which word does sound like ‘kite’ according to its vowel?', '', '', '0', 'five', 'chin', 'spin', 'skin', '', 'a', '2019-05-15 11:19:43'),
(97, '20', 2, 'Which word does sound like ‘drive’ according to its vowel?', '', '', '0', 'unit', 'side', 'drink', 'spin', '', 'b', '2019-05-15 11:19:43'),
(98, '20', 3, 'Which picture is related to the words with silent ‘e’ and long ‘i’ sound?', '', '', '1', 'img/quiz/20_1.jpg', 'img/quiz/20_2.jpg', 'img/quiz/20_3.jpg', 'img/quiz/20_4.jpg', '', 'c', '2019-05-17 01:19:43'),
(99, '20', 4, 'Which picture <u>is not</u> related to the words with silent ‘e’ and long ‘i’ sound?', '', '', '1', 'img/quiz/20_5.jpg', 'img/quiz/20_6.jpg', 'img/quiz/20_7.jpg', 'img/quiz/20_8.jpg', '', 'd', '2019-05-17 01:19:43'),
(100, '20', 5, 'Which Thai word does sound like English words with silent ‘e’ and long\r\n‘i’ sound?', '', '', '0', 'แมง', 'ไฟ', 'เกณฑ์', 'แสน', '', 'b', '2019-05-15 11:19:43'),
(101, '20', 6, 'Which word is the words with silent ‘e’ and long ‘i’ sound?', '', '', '0', 'rise', 'type', 'cave', 'keep', '', 'a', '2019-05-17 01:19:43'),
(102, '20', 7, 'Does the ‘e’ have any sound when it is the last letter of words with the\r\nletter ‘i’?', '', '', '0', 'It sounds ‘ee’.', 'It has no sound.', 'It sounds like its name.', 'It has ‘e’ sound.', '', 'b', '2019-05-15 11:19:43'),
(103, '20', 8, 'Which picture is related to the words with silent ‘e’ and long ‘i’ sound?', '', '', '1', 'img/quiz/20_9.jpg', 'img/quiz/20_10.jpg', 'img/quiz/20_11.jpg', 'img/quiz/20_12.jpg', '', 'b', '2019-05-17 01:19:43'),
(104, '20', 9, 'What letter is supposed to be in the blank?', 'img/quiz/20_13.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'c', '2019-05-15 11:19:43'),
(105, '20', 10, 'What letter is supposed to be in the blank?', 'img/quiz/20_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'b', '2019-05-15 11:19:43'),
(106, '21', 1, 'Which word does sound like ‘rope’ according to its vowel?', '', '', '0', 'cook', 'shone', 'mouse', 'count', '', 'b', '2019-05-27 01:19:43'),
(107, '21', 2, 'Which word does sound like ‘globe’ according to its vowel?', '', '', '0', 'monday', 'son', 'broke', 'lemon', '', 'c', '2019-05-27 01:19:43'),
(108, '21', 3, 'Which word <u>doesn’t</u> sound like ‘joke’ according to its vowel?', '', '', '0', 'note', 'stone', 'broke', 'lemon', '', 'd', '2019-05-27 01:19:43'),
(109, '21', 4, 'Which picture is related to the words with silent ‘e’ and long ‘o’ sound?', '', '', '1', 'img/quiz/21_1.jpg', 'img/quiz/21_2.jpg', 'img/quiz/21_3.jpg', 'img/quiz/21_4.jpg', '', 'd', '2019-05-27 01:19:43'),
(110, '21', 5, 'Which picture <u>is not</u> related to the words with silent ‘e’ and long ‘o’\r\nsound?', '', '', '1', 'img/quiz/21_5.jpg', 'img/quiz/21_6.jpg', 'img/quiz/21_7.jpg', 'img/quiz/21_8.jpg', '', 'd', '2019-05-27 01:19:43'),
(111, '21', 6, 'Which is the word with silent ‘e’ and long ‘o’ sound?', '', '', '0', 'close', 'born', 'type', 'king', '', 'a', '2019-05-27 01:19:43'),
(112, '21', 7, 'Does the ‘e’ have any sound when it is the last letter of words with the\r\nletter ‘o’?', '', '', '0', 'It sounds ‘ee’.', 'It has no sound.', 'It sounds like its name.', 'It has ‘e’ sound.', '', 'b', '2019-05-27 11:19:43'),
(113, '21', 8, 'Which picture is related to the words with silent ‘e’ and long ‘o’ sound?', '', '', '1', 'img/quiz/21_9.jpg', 'img/quiz/21_10.jpg', 'img/quiz/21_11.jpg', 'img/quiz/21_12.jpg', '', 'd', '2019-05-27 01:19:43'),
(114, '21', 9, 'What letter is supposed to be in the blank?', 'img/quiz/21_13.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'c', '2019-05-27 11:19:43'),
(115, '21', 10, 'What letter is supposed to be in the blank?', 'img/quiz/21_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'd', '2019-05-27 11:19:43'),
(116, '22', 1, 'Which word does sound like ‘cue’ according to its vowel?', '', '', '0', 'cruch', 'sun', 'cut', 'cute', '', 'd', '2019-05-27 01:19:43'),
(117, '22', 2, 'Which word does sound like ‘tube’ according to its vowel?', '', '', '0', 'food', 'fuse', 'picture', 'August', '', 'b', '2019-05-26 21:05:02'),
(118, '22', 3, 'Which word does sound like ‘rude’ according to its vowel?', '', '', '0', 'phone', 'true', 'gone', 'gun', '', 'b', '2019-05-26 21:05:02'),
(119, '22', 4, 'Which word does sound like ‘clue’ according to its vowel?', '', '', '0', 'done', 'June', 'glossy', 'come', '', 'b', '2019-05-26 21:05:02'),
(120, '22', 5, 'Which picture is related to the words with silent ‘e’ and long ‘u’ sound\r\nthat sounds like the name ', '', '', '1', 'img/quiz/22_1.jpg', 'img/quiz/22_2.jpg', 'img/quiz/22_3.jpg', 'img/quiz/22_4.jpg', '', 'c', '2019-05-26 21:10:18'),
(121, '22', 6, 'Which picture is related to the words with silent ‘e’ and long ‘u’ sound\r\nthat sounds like the ‘oo’ ', '', '', '1', 'img/quiz/22_5.jpg', 'img/quiz/22_6.jpg', 'img/quiz/22_7.jpg', 'img/quiz/22_8.jpg', '', 'd', '2019-05-26 21:10:18'),
(122, '22', 7, 'Which picture <u>is not</u> related to the words with silent ‘e’ and long ‘u’\r\nsound?', '', '', '1', 'img/quiz/22_9.jpg', 'img/quiz/22_10.jpg', 'img/quiz/22_11.jpg', 'img/quiz/22_12.jpg', '', 'd', '2019-05-26 21:10:18'),
(123, '22', 8, 'Which is the words with silent ‘e’ and long ‘u’ sound?', '', '', '0', 'cube', 'cup', 'scrub', 'gun', '', 'a', '2019-05-26 21:05:02'),
(124, '22', 9, 'Does the ‘e’ have any sound when it is the last letter of words with the\r\nletter ‘u’?', '', '', '0', 'It sounds ‘ee’.', 'It has no sound.', 'It sounds like its name.', 'It has ‘e’ sound.', '', 'b', '2019-05-27 11:19:43'),
(125, '22', 10, 'What letter is supposed to be in the blank?', 'img/quiz/22_13.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'c', '2019-05-27 11:19:43'),
(126, '23', 1, 'Which word does sound like ‘face’ according to its ending sound?', '', '', '0', 'pace', 'such', 'corn', 'Mac', '', 'a', '2019-05-27 01:19:43'),
(127, '23', 2, 'Which word does sound like ‘race’ according to its ending sound?', '', '', '0', 'kite', 'ice', 'sprite', 'cry', '', 'b', '2019-05-27 01:19:43'),
(128, '23', 3, 'Which word does sound like ‘twice’ according to its ending sound?', '', '', '0', 'twin', 'nice', 'skype', 'line', '', 'b', '2019-05-27 01:19:43'),
(129, '23', 4, 'Which word <u>doesn’t</u> sound like ‘nice’ according to its ending sound?', '', '', '0', 'fight', 'difference', 'spice', 'space', '', 'a', '2019-05-27 01:19:43'),
(130, '23', 5, 'Which word <u>doesn’t</u> sound like ‘mice’ according to its ending sound?', '', '', '0', 'space', 'place', 'rice', 'such', '', 'd', '2019-05-27 01:19:43'),
(131, '23', 6, 'Which picture is related to the Words Ending with ‘ce’ ?', '', '', '1', 'img/quiz/23_1.jpg', 'img/quiz/23_2.jpg', 'img/quiz/23_3.jpg', 'img/quiz/23_4.jpg', '', 'd', '2019-05-26 21:10:18'),
(132, '23', 7, 'Which picture is related to the Words Ending with ‘ce’ ?', '', '', '1', 'img/quiz/23_5.jpg', 'img/quiz/23_6.jpg', 'img/quiz/23_7.jpg', 'img/quiz/23_8.jpg', '', 'c', '2019-05-26 21:10:18'),
(133, '23', 8, 'Which picture <u>is not</u> related to the Words Ending with ‘ce’ ?', '', '', '1', 'img/quiz/23_9.jpg', 'img/quiz/23_10.jpg', 'img/quiz/23_11.jpg', 'img/quiz/23_12.jpg', '', 'd', '2019-05-26 21:10:18'),
(134, '23', 9, 'Which is the words Ending with ‘ce’.', '', '', '0', 'ice', 'king', 'cry', 'scene', '', 'a', '2019-05-27 01:19:43'),
(135, '23', 10, 'What letter is supposed to be in the blank?', 'img/quiz/23_13.jpg', '', '0', 's', 'e', 'c', 'p', '', 'b', '2019-05-27 11:19:43'),
(136, '24', 1, 'Which word does sound like ‘tree’ according to its vowel?', '', '', '0', 'get', 'see', 'spend', 'let', '', 'b', '2019-05-27 01:19:43'),
(137, '24', 2, 'Which word does sound like ‘cheek’ according to its vowel?', '', '', '0', 'peek', 'plus', 'school', 'wait', '', 'a', '2019-05-27 01:19:43'),
(138, '24', 3, 'Which word <u>doesn’t</u> sound like ‘teeth’ according to its vowel?', '', '', '0', 'speed', 'seem', 'steel', 'sport', '', 'd', '2019-05-27 01:19:43'),
(139, '24', 4, 'Which picture is related to the Words with ‘ee’?', '', '', '1', 'img/quiz/24_1.jpg', 'img/quiz/24_2.jpg', 'img/quiz/24_3.jpg', 'img/quiz/24_4.jpg', '', 'b', '2019-05-26 21:10:18'),
(140, '24', 5, 'Which picture <u>is not</u> related to the Words with ‘ee’?', '', '', '1', 'img/quiz/24_5.jpg', 'img/quiz/24_6.jpg', 'img/quiz/24_7.jpg', 'img/quiz/24_8.jpg', '', 'b', '2019-05-26 21:10:18'),
(141, '24', 6, 'Which is words with ‘ee’?', '', '', '0', 'feet', 'ten', 'cane', 'read', '', 'a', '2019-05-27 01:19:43'),
(142, '24', 7, 'Does the ‘e’ have any sound when it is the words according to this\r\nsheet?', '', '', '0', 'It sounds ‘ee’.', 'It has no sound.', 'It sounds like its name.', 'It has ‘e’ sound.', '', 'a', '2019-05-27 11:19:43'),
(143, '24', 8, 'Which picture is related to the Words with ‘ee’?', '', '', '1', 'img/quiz/24_9.jpg', 'img/quiz/24_10.jpg', 'img/quiz/24_11.jpg', 'img/quiz/24_12.jpg', '', 'd', '2019-05-26 21:10:18'),
(144, '24', 9, 'What letter is supposed to be in the blank?', 'img/quiz/24_13.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'c', '2019-05-27 11:19:43'),
(145, '24', 10, 'What letter is supposed to be in the blank?', 'img/quiz/24_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'c', '2019-05-27 11:19:43'),
(146, '25', 1, 'Which word is like ‘jeans’ according to its vowel and its form?', '', '', '0', 'family', 'speak', 'action', 'move', '', 'b', '2019-05-27 01:19:43'),
(147, '25', 2, 'Which word is like ‘peach’ according to its vowel and its form?', '', '', '0', 'lead', 'green', 'spin', 'sit', '', 'a', '2019-05-27 01:19:43'),
(148, '25', 3, 'Which word <u>isn’t like</u> ‘sea’ according to its vowel and its form?', '', '', '0', 'bee', 'peach', 'each', 'please', '', 'a', '2019-05-27 01:19:43'),
(149, '25', 4, 'Which word <u>isn’t like</u> ‘team’ according to its vowel and its form?', '', '', '0', 'treat', 'heat', 'cream', 'gene', '', 'd', '2019-05-27 01:19:43'),
(150, '25', 5, 'Which picture is related to the Words with ‘ea’?', '', '', '1', 'img/quiz/25_1.jpg', 'img/quiz/25_2.jpg', 'img/quiz/25_3.jpg', 'img/quiz/25_4.jpg', '', 'd', '2019-05-26 21:10:18'),
(151, '25', 6, 'Which picture <u>is not</u> related to the Words with ‘ea’?', '', '', '1', 'img/quiz/25_5.jpg', 'img/quiz/25_6.jpg', 'img/quiz/25_7.jpg', 'img/quiz/25_8.jpg', '', 'c', '2019-05-26 21:10:18'),
(152, '25', 7, 'Which is the Words with ‘ea’?', '', '', '0', 'deal', 'bee', 'seen', 'skin', '', 'a', '2019-05-27 01:19:43'),
(153, '25', 8, 'Which picture is related to the Words with ‘ea’?', '', '', '1', 'img/quiz/25_9.jpg', 'img/quiz/25_10.jpg', 'img/quiz/25_11.jpg', 'img/quiz/25_12.jpg', '', 'a', '2019-05-26 21:10:18'),
(154, '25', 9, 'What letter is supposed to be in the blank?', 'img/quiz/25_13.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'a', '2019-05-27 11:19:43'),
(155, '25', 10, 'What letter is supposed to be in the blank?', 'img/quiz/25_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'a', '2019-05-27 11:19:43'),
(156, '26', 1, 'Which word is like ‘train’ according to its vowel and its form?', '', '', '0', 'aid', 'fit', 'skin', 'sit', '', 'a', '2019-05-26 21:10:18'),
(157, '26', 2, 'Which word is like ‘main’ according to its vowel and its form?', '', '', '0', 'gain', 'exit', 'finish', 'skin', '', 'a', '2019-05-26 21:10:18'),
(158, '26', 3, 'Which word <u>isn’t</u> like ‘maid’ according to its vowel and its form?', '', '', '0', 'pain', 'paint', 'girl', 'snail', '', 'c', '2019-05-26 21:10:18'),
(159, '26', 4, 'Which word <u>isn’t</u> like ‘jail’ according to its vowel and its form?', '', '', '0', 'rail', 'fail', 'learn', 'mail', '', 'c', '2019-05-26 21:10:18'),
(160, '26', 5, 'Which picture is related to the Words with ‘ai’?', '', '', '1', 'img/quiz/26_1.jpg', 'img/quiz/26_2.jpg', 'img/quiz/26_3.jpg', 'img/quiz/26_4.jpg', '', 'a', '2019-05-26 23:11:46'),
(161, '26', 6, 'Which picture <u>is not</u> related to the Words with ‘ai’?', '', '', '1', 'img/quiz/26_5.jpg', 'img/quiz/26_6.jpg', 'img/quiz/26_7.jpg', 'img/quiz/26_8.jpg', '', 'c', '2019-05-26 23:11:46'),
(162, '26', 7, 'Which is the Words with ‘ai’?', '', '', '0', 'pain', 'skip', 'skin', 'top', '', 'a', '2019-05-27 01:19:43'),
(163, '26', 8, 'Which picture is related to the Words with ‘ai’?', '', '', '1', 'img/quiz/25_9.jpg', 'img/quiz/25_10.jpg', 'img/quiz/25_11.jpg', 'img/quiz/25_12.jpg', '', 'b', '2019-05-26 21:10:18'),
(164, '26', 9, 'What letter is supposed to be in the blank?', 'img/quiz/26_13.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'b', '2019-05-27 11:19:43'),
(165, '26', 10, 'What letter is supposed to be in the blank?', 'img/quiz/26_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'a', '2019-05-27 11:19:43'),
(166, '27', 1, 'Which word is like ‘pray’ according to its vowel and its form?', '', '', '0', 'may', 'paid', 'wake', 'click', '', 'a', '2019-05-26 21:10:18'),
(167, '27', 2, 'Which word is like ‘pay’ according to its vowel and its form?', '', '', '0', 'speak', 'say', 'talk', 'discuss', '', 'b', '2019-05-26 21:10:18'),
(168, '27', 3, 'Which word <u>isn’t</u> like ‘play’ according to its vowel and its form?', '', '', '0', 'stay', 'gray', 'lay', 'said', '', 'd', '2019-05-26 21:10:18'),
(169, '27', 4, 'Which word <u>isn’t</u> like ‘tray’ according to its vowel and its form?', '', '', '0', 'way', 'say', 'lay', 'trip', '', 'd', '2019-05-26 21:10:18'),
(170, '27', 5, 'Which picture is related to the Words with ‘ay’?', '', '', '1', 'img/quiz/26_1.jpg', 'img/quiz/26_2.jpg', 'img/quiz/26_3.jpg', 'img/quiz/26_4.jpg', '', 'c', '2019-05-26 23:11:46'),
(171, '27', 6, 'Which picture is related to the Words with ‘ay’?', '', '', '1', 'img/quiz/27_5.jpg', 'img/quiz/26_6.jpg', 'img/quiz/26_7.jpg', 'img/quiz/27_8.jpg', '', 'a', '2019-05-26 23:11:46'),
(172, '27', 7, 'Which is the Words with ‘ay’?', '', '', '0', 'way', 'bye', 'yark', 'sea', '', 'a', '2019-05-27 01:19:43'),
(173, '27', 8, 'Which picture is related to the Words with ‘ay’?', '', '', '1', 'img/quiz/25_9.jpg', 'img/quiz/25_10.jpg', 'img/quiz/25_11.jpg', 'img/quiz/25_12.jpg', '', 'c', '2019-05-26 21:10:18'),
(174, '27', 9, 'What letter is supposed to be in the blank?', 'img/quiz/27_13.jpg', '', '0', 'a', 'o', 'k', 'y', '', 'd', '2019-05-27 11:19:43'),
(175, '27', 10, 'What letter is supposed to be in the blank?', 'img/quiz/27_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'a', '2019-05-27 11:19:43'),
(176, '28', 1, 'Which word is like ‘load’ according to its vowel and its form?', '', '', '0', 'cola', 'cover', 'cool', 'coach', '', 'd', '2019-05-26 21:10:18'),
(177, '28', 2, 'Which word is like ‘oat’ according to its vowel and its form?', '', '', '0', 'smart', 'joke', 'folk', 'boat', '', 'd', '2019-05-26 21:10:18'),
(178, '28', 3, 'Which word <u>isn’t</u> like ‘road’ according to its vowel and its form?', '', '', '0', 'shoal', 'moan', 'chrome', 'roam', '', 'c', '2019-05-26 21:10:18'),
(179, '28', 4, 'Which word <u>isn’t</u> like ‘soap’ according to its vowel and its form?', '', '', '0', 'goes', 'poach', 'load', 'broach', '', 'a', '2019-05-26 21:10:18'),
(180, '28', 5, 'Which picture is related to the Words with ‘oa’?', '', '', '1', 'img/quiz/26_1.jpg', 'img/quiz/28_2.jpg', 'img/quiz/28_3.jpg', 'img/quiz/26_4.jpg', '', 'b', '2019-05-26 23:11:46'),
(181, '28', 6, 'Which picture is related to the Words with ‘oa’?', '', '', '1', 'img/quiz/28_5.jpg', 'img/quiz/26_6.jpg', 'img/quiz/26_7.jpg', 'img/quiz/28_8.jpg', '', 'd', '2019-05-26 23:11:46'),
(182, '28', 7, 'Which is the Words with ‘oa’?', '', '', '0', 'soap', 'hope', 'gun', 'both', '', 'a', '2019-05-27 01:19:43'),
(183, '28', 8, 'Which picture is related to the Words with ‘oa’?', '', '', '1', 'img/quiz/25_9.jpg', 'img/quiz/25_10.jpg', 'img/quiz/28_11.jpg', 'img/quiz/28_12.jpg', '', 'c', '2019-05-26 21:10:18'),
(184, '28', 9, 'What letter is supposed to be in the blank?', 'img/quiz/28_13.jpg', '', '0', 'a', 'o', 'k', 'y', '', 'a', '2019-05-27 00:03:08'),
(185, '28', 10, 'What letter is supposed to be in the blank?', 'img/quiz/28_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'd', '2019-05-27 00:03:12'),
(186, '29', 1, 'Which word is like ‘bow’ according to its vowel and its form?', '', '', '0', 'shy', 'show', 'got', 'book', '', 'b', '2019-05-26 21:10:18'),
(187, '29', 2, 'Which word is like ‘row’ according to its vowel and its form?', '', '', '0', 'grow', 'joke', 'coat', 'boat', '', 'a', '2019-05-26 21:10:18'),
(188, '29', 3, 'Which word <u>isn’t</u> like ‘blow’ according to its vowel and its form?', '', '', '0', 'know', 'show', 'snow', 'cord', '', 'd', '2019-05-26 21:10:18'),
(189, '29', 4, 'Which word <u>isn’t</u> like ‘snow’ according to its vowel and its form?', '', '', '0', 'goat', 'low', 'mow', 'slow', '', 'a', '2019-05-26 21:10:18'),
(190, '29', 5, 'Which picture is related to the Words with ‘ow’?', '', '', '1', 'img/quiz/29_1.jpg', 'img/quiz/28_2.jpg', 'img/quiz/28_3.jpg', 'img/quiz/29_4.jpg', '', 'a', '2019-05-26 23:11:46'),
(191, '29', 6, 'Which picture is related to the Words with ‘ow’?', '', '', '1', 'img/quiz/28_5.jpg', 'img/quiz/29_6.jpg', 'img/quiz/26_7.jpg', 'img/quiz/29_8.jpg', '', 'd', '2019-05-26 23:11:46'),
(192, '29', 7, 'Which is the Words with ‘ow’?', '', '', '0', 'slow', 'go', 'wallet', 'to', '', 'a', '2019-05-27 01:19:43'),
(193, '29', 8, 'Which picture is related to the Words with ‘ow’?', '', '', '1', 'img/quiz/29_9.jpg', 'img/quiz/29_10.jpg', 'img/quiz/29_11.jpg', 'img/quiz/28_12.jpg', '', 'c', '2019-05-26 21:10:18'),
(194, '29', 9, 'What letter is supposed to be in the blank?', 'img/quiz/29_13.jpg', '', '0', 't', 'u', 'v', 'w', '', 'd', '2019-05-27 11:19:43'),
(195, '29', 10, 'What letter is supposed to be in the blank?', 'img/quiz/29_14.jpg', '', '0', 'a', 'i', 'e', 'o', '', 'd', '2019-05-27 11:19:43'),
(196, '18', 1, 'Which is the Names with Short Vowels?', '', '', '0', 'Liz', 'Todd', 'Gwen', 'Beth', '', 'a', '2019-05-27 00:13:03'),
(197, '18', 2, 'Which is the Names with Consonant Blends?', '', '', '0', 'Liz', 'Todd', 'Gwen', 'Beth', '', 'c', '2019-05-27 00:13:19'),
(198, '18', 3, 'Which is the Names with Double Consonants?', '', '', '0', 'Liz', 'Todd', 'Gwen', 'Beth', '', 'b', '2019-05-27 01:19:43'),
(199, '18', 4, 'Which is the Names with Consonant Digraphs?', '', '', '0', 'Todd', 'Gwen', 'Beth', 'Gus', '', 'c', '2019-05-27 01:19:43'),
(200, '18', 5, 'Which is the Names with Short Vowels?', '', '', '0', 'Todd', 'Gwen', 'Beth', 'Gus', '', 'd', '2019-05-27 01:19:43'),
(201, '30', 1, 'Which word does sound like ‘foot’ according to its vowel?', '', '', '0', 'good', 'not', 'port', 'go', '', 'a', '2019-05-27 01:19:43'),
(202, '30', 2, 'Which word does sond like ‘look’ according to its vowel?', '', '', '0', 'but', 'fun', 'book', 'could', '', 'c', '2019-05-27 01:19:43'),
(203, '30', 3, 'Which word does sond like ‘groom’ according to its vowel?', '', '', '0', 'hug', 'food', 'fog', 'cup', '', 'b', '2019-05-27 01:19:43'),
(204, '30', 4, 'Which word does sond like ‘room’ according to its vowel?', '', '', '0', 'luck', 'duck', 'zoom', 'vowel', '', 'c', '2019-05-27 01:19:43'),
(205, '30', 5, 'Which is the words with ‘oo’?', '', '', '0', 'loose', 'glove', 'go', 'do', '', 'a', '2019-05-27 01:19:43'),
(206, '30', 6, 'Which picture is related to the words with ‘oo’?', '', '', '1', 'img/quiz/30_1.jpg', 'img/quiz/30_2.jpg', 'img/quiz/30_3.jpg', 'img/quiz/30_4.jpg', '', 'd', '2019-05-27 00:31:19'),
(207, '30', 7, 'Which picture <u>is not</u> related to the words with ‘oo’?', '', '', '1', 'img/quiz/30_5.jpg', 'img/quiz/30_6.jpg', 'img/quiz/30_7.jpg', 'img/quiz/30_8.jpg', '', 'd', '2019-05-27 00:31:19'),
(208, '30', 8, 'Which word is long ‘oo’ sound?', '', '', '0', 'good', 'cool', 'so', 'done', '', 'b', '2019-05-27 01:19:43'),
(209, '30', 9, 'Which word is short ‘oo’ sound?', '', '', '0', 'shock', 'got', 'cook', 'short', '', 'c', '2019-05-27 01:19:43'),
(210, '30', 10, 'Which word is not word with ‘oo’?', '', '', '0', 'good', 'could', 'book', 'bloom', '', 'b', '2019-05-27 01:19:43'),
(211, '31', 1, 'Which word does sound like ‘jar’ according to its vowel?', '', '', '0', 'pig', 'hard', 'port', 'cord', '', 'b', '2019-05-27 01:19:43'),
(212, '31', 2, 'Which word does sound like ‘shark’ according to its vowel?', '', '', '0', 'cord', 'cup', 'car', 'clam', '', 'c', '2019-05-27 01:19:43'),
(213, '31', 3, 'Which word does sound like ‘star’ according to its vowel?', '', '', '0', 'spark', 'job', 'cap', 'speak', '', 'a', '2019-05-27 01:19:43'),
(214, '31', 4, 'Which word does sound like ‘card’ according to its vowel?', '', '', '0', 'arm', 'gun', 'corn', 'climb', '', 'a', '2019-05-27 01:19:43'),
(215, '31', 5, 'Which is the words with ‘ar’?', '', '', '0', 'yard', 'raw', 'proud', 'reed', '', 'a', '2019-05-27 01:19:43'),
(216, '31', 6, 'Which picture is related to the words with ‘ar’?', '', '', '1', 'img/quiz/31_1.jpg', 'img/quiz/31_2.jpg', 'img/quiz/31_3.jpg', 'img/quiz/31_4.jpg', '', 'd', '2019-05-27 00:31:19'),
(217, '31', 7, 'Which picture <u>is not</u> related to the words with ‘ar’?', '', '', '1', 'img/quiz/31_5.jpg', 'img/quiz/31_6.jpg', 'img/quiz/31_7.jpg', 'img/quiz/31_8.jpg', '', 'b', '2019-05-27 00:31:19'),
(218, '31', 8, 'Which <u>isn\'t</u> the words with ‘ar’?', '', '', '0', 'starch', 'hard', 'past', 'yard', '', 'c', '2019-05-27 01:19:43'),
(219, '31', 9, 'Which <u>isn\'t</u> the words with ‘ar’?', '', '', '0', 'grape', 'dark', 'shark', 'large', '', 'a', '2019-05-27 01:19:43'),
(220, '31', 10, 'Which <u>isn\'t</u> the words with ‘ar’?', '', '', '0', 'barn', 'back', 'harsh', 'mark', '', 'b', '2019-05-27 01:19:43'),
(221, '32', 1, 'Which word does sound like ‘corn’ according to its vowel?', '', '', '0', 'stork', 'hard', 'pock', 'golf', '', 'a', '2019-05-27 01:19:43'),
(222, '32', 2, 'Which word does sound like ‘horse’ according to its vowel?', '', '', '0', 'cord', 'cup', 'car', 'clam', '', 'a', '2019-05-27 01:19:43'),
(223, '32', 3, 'Which word does sound like ‘cork’ according to its vowel?', '', '', '0', 'you', 'job', 'fork', 'speak', '', 'c', '2019-05-27 01:19:43'),
(224, '32', 4, 'Which word does sound like ‘horn’ according to its vowel?', '', '', '0', 'oat', 'born', 'front', 'crop', '', 'b', '2019-05-27 01:19:43'),
(225, '32', 5, 'Which is the words with ‘ar’?', '', '', '0', 'port', 'to', 'you', 'king', '', 'a', '2019-05-27 01:19:43'),
(226, '32', 6, 'Which picture is related to the words with ‘or’?', '', '', '1', 'img/quiz/32_1.jpg', 'img/quiz/31_2.jpg', 'img/quiz/32_3.jpg', 'img/quiz/31_4.jpg', '', 'a', '2019-05-27 00:31:19'),
(227, '32', 7, 'Which picture <u>is not</u> related to the words with ‘or’?', '', '', '1', 'img/quiz/32_5.jpg', 'img/quiz/32_6.jpg', 'img/quiz/32_7.jpg', 'img/quiz/32_8.jpg', '', 'd', '2019-05-27 00:31:19'),
(228, '32', 8, 'Which <u>isn\'t</u> the words with ‘or’?', '', '', '0', 'torn', 'short', 'port', 'soft', '', 'd', '2019-05-27 01:19:43'),
(229, '32', 9, 'Which <u>isn\'t</u> the words with ‘or’?', '', '', '0', 'good', 'horn', 'form', 'pork', '', 'a', '2019-05-27 01:19:43'),
(230, '32', 10, 'Which <u>isn\'t</u> the words with ‘or’?', '', '', '0', 'born', 'scorn', 'sworn', 'mark', '', 'd', '2019-05-27 01:19:43'),
(231, '33', 1, 'Which word does sound like ‘her’ according to its vowel?', '', '', '0', 'worm', 'hard', 'pock', 'verb', '', 'd', '2019-05-27 01:19:43'),
(232, '33', 2, 'Which word does sound like ‘herd’ according to its vowel?', '', '', '0', 'crop', 'verse', 'car', 'clam', '', 'b', '2019-05-27 01:19:43'),
(233, '33', 3, 'Which word does sound like ‘fern’ according to its vowel?', '', '', '0', 'you', 'jerk', 'joke', 'job', '', 'b', '2019-05-27 01:19:43'),
(234, '33', 4, 'Which word does sound like ‘herb’ according to its vowel?', '', '', '0', 'oat', 'top', 'front', 'term', '', 'd', '2019-05-27 01:19:43'),
(235, '33', 5, 'Which is the words with ‘er’?', '', '', '0', 'jerk', 'bed', 'rain', 'ten', '', 'a', '2019-05-27 01:19:43'),
(236, '33', 6, 'Which picture is related to the words with ‘er’?', '', '', '1', 'img/quiz/33_1.jpg', 'img/quiz/33_2.jpg', 'img/quiz/32_3.jpg', 'img/quiz/31_4.jpg', '', 'a', '2019-05-27 00:31:19'),
(237, '33', 7, 'Which picture is related to the words with ‘er’?', '', '', '1', 'img/quiz/31_5.jpg', 'img/quiz/33_6.jpg', 'img/quiz/33_7.jpg', 'img/quiz/32_8.jpg', '', 'b', '2019-06-04 22:42:41'),
(238, '33', 8, 'Which is words with ‘er’?', '', '', '0', 'torn', 'herb', 'port', 'soft', '', 'b', '2019-05-27 01:19:43'),
(239, '33', 9, 'Which is words with ‘er’?', '', '', '0', 'good', 'dark', 'from', 'kerb', '', 'd', '2019-05-27 01:19:43'),
(240, '33', 10, 'Which <u>isn’t</u> words with ‘er’?', '', '', '0', 'born', 'verb', 'perm', 'kerb', '', 'a', '2019-05-27 01:19:43'),
(241, '34', 1, 'Which word is Double Syllabic Words with ‘er’?', '', '', '0', 'best', 'boy', 'girl', 'hunger', '', 'd', '2019-05-27 01:19:43'),
(242, '34', 2, 'Which word is Double Syllabic Words with ‘er’?', '', '', '0', 'farmer', 'nurse', 'doctor', 'pilot', '', 'a', '2019-05-27 01:19:43'),
(243, '34', 3, 'Which word is Double Syllabic Words with ‘er’?', '', '', '0', 'soil', 'flower', 'per', 'hoe', '', 'b', '2019-05-27 01:19:43'),
(244, '34', 4, 'Which word is Double Syllabic Words with ‘er’?', '', '', '0', 'change', 'seller', 'thing', 'store', '', 'b', '2019-05-27 01:19:43'),
(245, '34', 5, 'Which is Double Syllabic Words with ‘er’?', '', '', '0', 'manner', 'burn', 'fern', 'ten', '', 'a', '2019-05-27 01:19:43'),
(246, '34', 6, 'Which picture is related to the Double Syllabic Words with ‘er’?', '', '', '1', 'img/quiz/33_1.jpg', 'img/quiz/34_2.jpg', 'img/quiz/34_3.jpg', 'img/quiz/31_4.jpg', '', 'b', '2019-05-27 00:31:19'),
(247, '34', 7, 'Which picture is related to the Double Syllabic Words with ‘er’?', '', '', '1', 'img/quiz/34_5.jpg', 'img/quiz/33_6.jpg', 'img/quiz/33_7.jpg', 'img/quiz/34_8.jpg', '', 'd', '2019-06-04 22:42:41'),
(248, '34', 8, 'Which <u>isn’t</u> Double Syllabic Words with ‘er’?', '', '', '0', 'greater', 'short', 'heater', 'butter', '', 'b', '2019-05-27 01:19:43'),
(249, '34', 9, 'Which is Double Syllabic Words with ‘er’?', '', '', '0', 'lobster', 'shrimp', 'fish', 'octopus', '', 'a', '2019-05-27 01:19:43'),
(250, '34', 10, 'Which is Double Syllabic Words with ‘er’?', '', '', '0', 'arm', 'foot', 'finger', 'hand', '', 'c', '2019-05-27 01:19:43'),
(251, '35', 1, 'Which word is Words with ‘ir’?', '', '', '0', 'best', 'boy', 'girl', 'hunger', '', 'c', '2019-05-27 01:19:43'),
(252, '35', 2, 'Which word is Words with ‘ir’?', '', '', '0', 'farmer', 'dirt', 'doctor', 'pilot', '', 'b', '2019-05-27 01:19:43'),
(253, '35', 3, 'Which word is Words with ‘ir’?', '', '', '0', 'third', 'flower', 'manner', 'hoe', '', 'a', '2019-05-27 01:19:43'),
(254, '35', 4, 'Which word is Words with ‘ir’?', '', '', '0', 'change', 'seller', 'thing', 'birth', '', 'd', '2019-05-27 01:19:43'),
(255, '35', 5, 'Which word is Words with ‘ir’?', '', '', '0', 'shirk', 'thin', 'talk', 'small', '', 'a', '2019-05-27 01:19:43'),
(256, '35', 6, 'Which picture is related to the Words with ‘ir’?', '', '', '1', 'img/quiz/33_1.jpg', 'img/quiz/34_2.jpg', 'img/quiz/34_3.jpg', 'img/quiz/35_4.jpg', '', 'd', '2019-05-27 00:31:19'),
(257, '35', 7, 'Which picture is related to the Words with ‘ir’?', '', '', '1', 'img/quiz/34_5.jpg', 'img/quiz/33_6.jpg', 'img/quiz/35_7.jpg', 'img/quiz/34_8.jpg', '', 'c', '2019-06-04 22:42:41'),
(258, '35', 8, 'Which <u>isn’t</u> Words with ‘ir’?', '', '', '0', 'swirl', 'stir', 'smirk', 'spirit', '', 'd', '2019-05-27 01:19:43'),
(259, '35', 9, 'Which <u>isn’t</u> Words with ‘ir’?', '', '', '0', 'term', 'chirp', 'third', 'shirt', '', 'a', '2019-05-27 01:19:43'),
(260, '35', 10, 'Which <u>isn’t</u> Words with ‘ir’?', '', '', '0', 'first', 'dirt', 'swim', 'girl', '', 'c', '2019-05-27 01:19:43'),
(261, '36', 1, 'Which word is Words with ‘ur’?', '', '', '0', 'best', 'boy', 'turn', 'hunger', '', 'c', '2019-05-27 01:19:43'),
(262, '36', 2, 'Which word is Words with ‘ur’?', '', '', '0', 'farmer', 'hurt', 'doctor', 'pilot', '', 'b', '2019-05-27 01:19:43'),
(263, '36', 3, 'Which word is Words with ‘ur’?', '', '', '0', 'third', 'flower', 'manner', 'slur', '', 'd', '2019-05-27 01:19:43'),
(264, '36', 4, 'Which word is Words with ‘ur’?', '', '', '0', 'blur', 'seller', 'thing', 'birth', '', 'a', '2019-05-27 01:19:43'),
(265, '36', 5, 'Which word is Words with ‘ur’?', '', '', '0', 'churn', 'gun', 'run', 'ant', '', 'a', '2019-05-27 01:19:43'),
(266, '36', 6, 'Which picture is related to the Words with ‘ur’?', '', '', '1', 'img/quiz/36_1.jpg', 'img/quiz/34_2.jpg', 'img/quiz/34_3.jpg', 'img/quiz/35_4.jpg', '', 'a', '2019-05-27 00:31:19'),
(267, '36', 7, 'Which picture is related to the Words with ‘ur’?', '', '', '1', 'img/quiz/34_5.jpg', 'img/quiz/36_6.jpg', 'img/quiz/35_7.jpg', 'img/quiz/34_8.jpg', '', 'b', '2019-06-04 22:42:41'),
(268, '36', 8, 'Which <u>isn’t</u> Words with ‘ur’?', '', '', '0', 'curt', 'lurch', 'smirk', 'burp', '', 'c', '2019-05-27 01:19:43'),
(269, '36', 9, 'Which <u>isn’t</u> Words with ‘ur’?', '', '', '0', 'hurt', 'curl', 'surf', 'shirt', '', 'd', '2019-05-27 01:19:43'),
(270, '36', 10, 'Which <u>isn’t</u> Words with ‘ur’?', '', '', '0', 'first', 'church', 'burn', 'fur', '', 'a', '2019-05-27 01:19:43'),
(271, '37', 1, 'Which word is Words with ‘ore’?', '', '', '0', 'best', 'boy', 'more', 'hunger', '', 'c', '2019-05-27 01:19:43'),
(272, '37', 2, 'Which word is Words with ‘ore’?', '', '', '0', 'snore', 'hurt', 'doctor', 'pilot', '', 'a', '2019-05-27 01:19:43'),
(273, '37', 3, 'Which picture is related to the Words with ‘ore’?', '', '', '1', 'img/quiz/36_1.jpg', 'img/quiz/37_2.jpg', 'img/quiz/34_3.jpg', 'img/quiz/35_4.jpg', '', 'b', '2019-05-27 00:31:19'),
(274, '37', 4, 'Which <u>isn’t</u> Words with ‘ore’?', '', '', '0', 'more', 'pore', 'school', 'score', '', 'c', '2019-05-27 01:19:43'),
(275, '37', 5, 'Which <u>isn’t</u> Words with ‘ore’?', '', '', '0', 'top', 'tore', 'core', 'snore', '', 'a', '2019-05-27 01:19:43'),
(276, '38', 1, 'Which word is Words with ‘ie’?', '', '', '0', 'third', 'flower', 'manner', 'cookie', '', 'd', '2019-05-27 01:19:43'),
(277, '38', 2, 'Which word is Words with ‘ie’?', '', '', '0', 'blur', 'yield', 'thing', 'birth', '', 'b', '2019-05-27 01:19:43'),
(278, '38', 3, 'Which picture is related to the Words with ‘ie’?', '', '', '1', 'img/quiz/34_5.jpg', 'img/quiz/36_6.jpg', 'img/quiz/35_7.jpg', 'img/quiz/38_8.jpg', '', 'd', '2019-06-04 22:42:41'),
(279, '38', 4, 'Which <u>isn’t</u> Words with ‘ie’?', '', '', '0', 'chief', 'wield', 'yield', 'skirt', '', 'd', '2019-05-27 01:19:43'),
(280, '38', 5, 'Which <u>isn’t</u> Words with ‘ie’?', '', '', '0', 'thief', 'cookie', 'skin', 'field', '', 'c', '2019-05-27 01:19:43'),
(281, '40', 1, 'Which word is Words with ‘ou’?', '', '', '0', 'by', 'sound', 'toy', 'myth', '', 'b', '2019-05-27 01:19:43'),
(282, '40', 2, 'Which word is Words with ‘ou’?', '', '', '0', 'count', 'hurt', 'doctor', 'my', '', 'a', '2019-05-27 01:19:43'),
(283, '40', 3, 'Which word is Words with ‘ou’?', '', '', '0', 'try', 'flower', 'out', 'slur', '', 'c', '2019-05-27 01:19:43'),
(284, '40', 4, 'Which word is Words with ‘ou’?', '', '', '0', 'blur', 'spy', 'thing', 'scout', '', 'd', '2019-05-27 01:19:43'),
(285, '40', 5, 'Which picture is related to the Words with ‘ou’?', '', '', '1', 'img/quiz/40_1.jpg', 'img/quiz/37_2.jpg', 'img/quiz/40_3.jpg', 'img/quiz/35_4.jpg', '', 'a', '2019-05-27 00:31:19'),
(286, '40', 6, 'Which picture is related to the Words with ‘ou’?', '', '', '1', 'img/quiz/34_5.jpg', 'img/quiz/40_6.jpg', 'img/quiz/35_7.jpg', 'img/quiz/38_8.jpg', '', 'b', '2019-06-04 22:42:41'),
(287, '40', 7, 'Which picture <u>isn’t</u> related to the Words with ‘ou’?', '', '', '1', 'img/quiz/40_9.jpg', 'img/quiz/40_10.jpg', 'img/quiz/40_11.jpg', 'img/quiz/40_12.jpg', '', 'c', '2019-06-04 22:42:41'),
(288, '40', 8, 'Which <u>isn’t</u> Words with ‘ou’?', '', '', '0', 'round', 'tore', 'found', 'house', '', 'b', '2019-05-27 01:19:43'),
(289, '40', 9, 'Which <u>isn’t</u> Words with ‘ou’?', '', '', '0', 'corn', 'mouse', 'scout', 'ground', '', 'a', '2019-05-27 01:19:43'),
(290, '40', 10, 'Which <u>isn’t</u> Words with ‘ou’?', '', '', '0', 'louse', 'south', 'flood', 'cloud', '', 'c', '2019-05-27 01:19:43'),
(291, '41', 1, 'Which word is Words with ‘ow’?', '', '', '0', 'by', 'boy', 'toy', 'bow', '', 'd', '2019-05-27 01:19:43'),
(292, '41', 2, 'Which word is Words with ‘ow’?', '', '', '0', 'how', 'hurt', 'doctor', 'my', '', 'a', '2019-05-27 01:19:43'),
(293, '41', 3, 'Which word is Words with ‘ow’?', '', '', '0', 'try', 'now', 'manner', 'slur', '', 'b', '2019-05-27 01:19:43'),
(294, '41', 4, 'Which word is Words with ‘ow’?', '', '', '0', 'blur', 'spy', 'wow', 'birth', '', 'c', '2019-05-27 01:19:43'),
(295, '41', 5, 'Which picture is related to the Words with ‘ow’?', '', '', '1', 'img/quiz/40_1.jpg', 'img/quiz/41_2.jpg', 'img/quiz/40_3.jpg', 'img/quiz/35_4.jpg', '', 'b', '2019-06-05 00:55:01'),
(296, '41', 6, 'Which picture is related to the Words with ‘ow’?', '', '', '1', 'img/quiz/34_5.jpg', 'img/quiz/40_6.jpg', 'img/quiz/41_7.jpg', 'img/quiz/38_8.jpg', '', 'c', '2019-06-04 22:42:41'),
(297, '41', 7, 'Which picture <u>isn’t</u> related to the Words with ‘ow’?', '', '', '1', 'img/quiz/41_9.jpg', 'img/quiz/41_10.jpg', 'img/quiz/41_11.jpg', 'img/quiz/41_12.jpg', '', 'a', '2019-06-04 22:42:41'),
(298, '41', 8, 'Which <u>isn’t</u> Words with ‘ow’?', '', '', '0', 'brow', 'crowd', 'drown', 'sound', '', 'd', '2019-06-05 00:58:21'),
(299, '41', 9, 'Which <u>isn’t</u> Words with ‘ow’?', '', '', '0', 'fowl', 'growl', 'ground', 'town', '', 'c', '2019-05-27 01:19:43'),
(300, '41', 10, 'Which <u>isn’t</u> Words with ‘ow’?', '', '', '0', 'should', 'owl', 'crown', 'cow', '', 'a', '2019-05-27 01:19:43'),
(301, '42', 1, 'Which word is Words with ‘aw’?', '', '', '0', 'claw', 'boy', 'toy', 'bow', '', 'a', '2019-05-27 01:19:43'),
(302, '42', 2, 'Which word is Words with ‘aw’?', '', '', '0', 'how', 'hurt', 'hawk', 'my', '', 'c', '2019-05-27 01:19:43'),
(303, '42', 3, 'Which word is Words with ‘aw’?', '', '', '0', 'try', 'saw', 'manner', 'slur', '', 'b', '2019-05-27 01:19:43'),
(304, '42', 4, 'Which word is Words with ‘aw’?', '', '', '0', 'blur', 'spy', 'vow', 'pawn', '', 'd', '2019-05-27 01:19:43');
INSERT INTO `quiz_detail` (`quiz_id`, `lesson_id`, `question_no`, `question_title`, `question_image`, `question_sound`, `answer_style`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `answer_e`, `answer_key`, `create_date`) VALUES
(305, '42', 5, 'Which picture is related to the Words with ‘aw’?', '', '', '1', 'img/quiz/42_1.jpg', 'img/quiz/41_2.jpg', 'img/quiz/40_3.jpg', 'img/quiz/35_4.jpg', '', 'a', '2019-06-05 00:55:01'),
(306, '42', 6, 'Which picture is related to the Words with ‘aw’?', '', '', '1', 'img/quiz/34_5.jpg', 'img/quiz/40_6.jpg', 'img/quiz/41_7.jpg', 'img/quiz/42_8.jpg', '', 'd', '2019-06-04 22:42:41'),
(307, '42', 7, 'Which picture <u>isn’t</u> related to the Words with ‘aw’?', '', '', '1', 'img/quiz/42_9.jpg', 'img/quiz/42_10.jpg', 'img/quiz/42_11.jpg', 'img/quiz/41_12.jpg', '', 'd', '2019-06-04 22:42:41'),
(308, '42', 8, 'Which <u>isn’t</u> Words with ‘aw’?', '', '', '0', 'straw', 'thaw', 'drown', 'flaw', '', 'c', '2019-06-05 00:58:21'),
(309, '42', 9, 'Which <u>isn’t</u> Words with ‘aw’?', '', '', '0', 'fowl', 'lawn', 'drawn', 'crawl', '', 'a', '2019-05-27 01:19:43'),
(310, '42', 10, 'Which <u>isn’t</u> Words with ‘aw’?', '', '', '0', 'fawn', 'brawl', 'shawl', 'cow', '', 'd', '2019-05-27 01:19:43'),
(311, '43', 1, 'Which word is Words with ‘al’?', '', '', '0', 'claw', 'stalk', 'toy', 'bow', '', 'b', '2019-05-27 01:19:43'),
(312, '43', 2, 'Which word is Words with ‘al’?', '', '', '0', 'how', 'hurt', 'hawk', 'all', '', 'd', '2019-05-27 01:19:43'),
(313, '43', 3, 'Which word is Words with ‘al’?', '', '', '0', 'try', 'call', 'manner', 'slur', '', 'b', '2019-05-27 01:19:43'),
(314, '43', 4, 'Which word is Words with ‘al’?', '', '', '0', 'blur', 'spy', 'gall', 'pawn', '', 'c', '2019-05-27 01:19:43'),
(315, '43', 5, 'Which picture is related to the Words with ‘al’?', '', '', '1', 'img/quiz/42_1.jpg', 'img/quiz/41_2.jpg', 'img/quiz/40_3.jpg', 'img/quiz/43_4.jpg', '', 'd', '2019-06-05 00:55:01'),
(316, '43', 6, 'Which picture is related to the Words with ‘al’?', '', '', '1', 'img/quiz/43_5.jpg', 'img/quiz/40_6.jpg', 'img/quiz/41_7.jpg', 'img/quiz/42_8.jpg', '', 'a', '2019-06-05 01:21:28'),
(317, '43', 7, 'Which picture <u>isn’t</u> related to the Words with ‘al’?', '', '', '1', 'img/quiz/43_9.jpg', 'img/quiz/43_10.jpg', 'img/quiz/42_11.jpg', 'img/quiz/43_12.jpg', '', 'c', '2019-06-04 22:42:41'),
(318, '43', 8, 'Which <u>isn’t</u> Words with ‘al’?', '', '', '0', 'call', 'chalk', 'talk', 'flaw', '', 'd', '2019-06-05 00:58:21'),
(319, '43', 9, 'Which <u>isn’t</u> Words with ‘al’?', '', '', '0', 'fowl', 'small', 'tall', 'mall', '', 'a', '2019-05-27 01:19:43'),
(320, '43', 10, 'Which <u>isn’t</u> Words with ‘al’?', '', '', '0', 'ball', 'brawl', 'wall', 'stall', '', 'b', '2019-05-27 01:19:43'),
(321, '44', 1, 'Which word is Words with ‘oi’?', '', '', '0', 'claw', 'voice', 'toy', 'bow', '', 'b', '2019-05-27 01:19:43'),
(322, '44', 2, 'Which word is Words with ‘oi’?', '', '', '0', 'how', 'hurt', 'hawk', 'choice', '', 'd', '2019-05-27 01:19:43'),
(323, '44', 3, 'Which word is Words with ‘oy’?', '', '', '0', 'moist', 'call', 'boy', 'slur', '', 'c', '2019-05-27 01:19:43'),
(324, '44', 4, 'Which word is Words with ‘oy’?', '', '', '0', 'blur', 'enjoy', 'gall', 'pawn', '', 'b', '2019-05-27 01:19:43'),
(325, '44', 5, 'Which picture is related to the Words with ‘oi’?', '', '', '1', 'img/quiz/42_1.jpg', 'img/quiz/41_2.jpg', 'img/quiz/44_3.jpg', 'img/quiz/43_4.jpg', '', 'c', '2019-06-05 00:55:01'),
(326, '44', 6, 'Which picture is related to the Words with ‘oy’?', '', '', '1', 'img/quiz/43_5.jpg', 'img/quiz/36_6.jpg', 'img/quiz/44_7.jpg', 'img/quiz/42_8.jpg', '', 'c', '2019-06-05 01:53:26'),
(327, '44', 7, 'Which picture <u>isn’t</u> related to the Words with ‘oi’?', '', '', '1', 'img/quiz/44_9.jpg', 'img/quiz/43_10.jpg', 'img/quiz/44_11.jpg', 'img/quiz/44_12.jpg', '', 'b', '2019-06-04 22:42:41'),
(328, '44', 8, 'Which <u>isn’t</u> Words with ‘oi’?', '', '', '0', 'noise', 'moist', 'soil', 'flaw', '', 'd', '2019-06-05 00:58:21'),
(329, '44', 9, 'Which <u>isn’t</u> Words with ‘oi’?', '', '', '0', 'void', 'small', 'spoil', 'toil', '', 'b', '2019-05-27 01:19:43'),
(330, '44', 10, 'Which <u>isn’t</u> Words with ‘oy’?', '', '', '0', 'ball', 'boy', 'coy', 'toy', '', 'a', '2019-05-27 01:19:43'),
(331, '45', 1, 'Which word is Words with ‘ear’?', '', '', '0', 'claw', 'voice', 'earth', 'bow', '', 'c', '2019-05-27 01:19:43'),
(332, '45', 2, 'Which word is Words with ‘ear’?', '', '', '0', 'how', 'hurt', 'hawk', 'learn', '', 'd', '2019-05-27 01:19:43'),
(333, '45', 3, 'Which word is Words with ‘ear’?', '', '', '0', 'moist', 'spear', 'boy', 'slur', '', 'b', '2019-05-27 01:19:43'),
(334, '45', 4, 'Which word is Words with ‘ear’?', '', '', '0', 'blur', 'fear', 'gall', 'pawn', '', 'b', '2019-05-27 01:19:43'),
(335, '45', 5, 'Which picture is related to the Words with ‘ear’?', '', '', '1', 'img/quiz/45_1.jpg', 'img/quiz/41_2.jpg', 'img/quiz/44_3.jpg', 'img/quiz/43_4.jpg', '', 'a', '2019-06-05 00:55:01'),
(336, '45', 6, 'Which picture is related to the Words with ‘ear’?', '', '', '1', 'img/quiz/43_5.jpg', 'img/quiz/36_6.jpg', 'img/quiz/45_7.jpg', 'img/quiz/42_8.jpg', '', 'c', '2019-06-05 01:53:17'),
(337, '45', 7, 'Which picture <u>isn’t</u> related to the Words with ‘ear’?', '', '', '1', 'img/quiz/45_9.jpg', 'img/quiz/43_10.jpg', 'img/quiz/45_11.jpg', 'img/quiz/45_12.jpg', '', 'b', '2019-06-04 22:42:41'),
(338, '45', 8, 'Which <u>isn’t</u> Words with ‘ear’?', '', '', '0', 'noise', 'pearl', 'hear', 'tear', '', 'a', '2019-06-05 00:58:21'),
(339, '45', 9, 'Which <u>isn’t</u> Words with ‘ear’?', '', '', '0', 'void', 'spear', 'earth', 'learn', '', 'a', '2019-05-27 01:19:43'),
(340, '45', 10, 'Which <u>isn’t</u> Words with ‘ear’?', '', '', '0', 'year', 'fear', 'coy', 'dear', '', 'c', '2019-05-27 01:19:43'),
(341, '46', 1, 'Which word is Words with ‘are’?', '', '', '0', 'claw', 'dare', 'earth', 'bow', '', 'b', '2019-05-27 01:19:43'),
(342, '46', 2, 'Which word is Words with ‘are’?', '', '', '0', 'how', 'hurt', 'hawk', 'spare', '', 'd', '2019-05-27 01:19:43'),
(343, '46', 3, 'Which word is Words with ‘air’?', '', '', '0', 'flair', 'spear', 'boy', 'slur', '', 'a', '2019-05-27 01:19:43'),
(344, '46', 4, 'Which word is Words with ‘air’?', '', '', '0', 'blur', 'fear', 'stair', 'pawn', '', 'c', '2019-05-27 01:19:43'),
(345, '46', 5, 'Which picture is related to the Words with ‘are’?', '', '', '1', 'img/quiz/45_1.jpg', 'img/quiz/46_2.jpg', 'img/quiz/44_3.jpg', 'img/quiz/43_4.jpg', '', 'b', '2019-06-05 00:55:01'),
(346, '46', 6, 'Which picture is related to the Words with ‘are’?', '', '', '1', 'img/quiz/46_5.jpg', 'img/quiz/36_6.jpg', 'img/quiz/45_7.jpg', 'img/quiz/42_8.jpg', '', 'a', '2019-06-05 01:21:28'),
(347, '46', 7, 'Which picture is related to the Words with ‘air’?', '', '', '1', 'img/quiz/46_9.jpg', 'img/quiz/43_10.jpg', 'img/quiz/45_11.jpg', 'img/quiz/45_12.jpg', '', 'a', '2019-06-04 22:42:41'),
(348, '46', 8, 'Which <u>isn’t</u> Words with ‘are’?', '', '', '0', 'bare', 'care', 'hear', 'dare', '', 'c', '2019-06-05 01:55:32'),
(349, '46', 9, 'Which <u>isn’t</u> Words with ‘are’?', '', '', '0', 'void', 'fare', 'mare', 'ware', '', 'a', '2019-05-27 01:19:43'),
(350, '46', 10, 'Which <u>isn’t</u> Words with ‘air’?', '', '', '0', 'air', 'fear', 'chair', 'pair', '', 'b', '2019-05-27 01:19:43'),
(351, '47', 1, 'Which word is Double Syllabic Words Ending with ‘y’?', '', '', '0', 'claw', 'lucky', 'earth', 'bow', '', 'b', '2019-05-27 01:19:43'),
(352, '47', 2, 'Which word is Double Syllabic Words Ending with ‘y’?', '', '', '0', 'how', 'hurt', 'rainy', 'spare', '', 'c', '2019-05-27 01:19:43'),
(353, '47', 3, 'Which word is Double Syllabic Words Ending with ‘y’?', '', '', '0', 'flair', 'spear', 'boy', 'story', '', 'd', '2019-05-27 01:19:43'),
(354, '47', 4, 'Which word is Double Syllabic Words Ending with ‘y’?', '', '', '0', 'blur', 'fear', 'lazy', 'pawn', '', 'c', '2019-05-27 01:19:43'),
(355, '47', 5, 'Which picture is related to the Double Syllabic Words Ending with ‘y’?', '', '', '1', 'img/quiz/45_1.jpg', 'img/quiz/46_2.jpg', 'img/quiz/47_3.jpg', 'img/quiz/43_4.jpg', '', 'c', '2019-06-05 00:55:01'),
(356, '47', 6, 'Which picture is related to the Double Syllabic Words Ending with ‘y’?', '', '', '1', 'img/quiz/46_5.jpg', 'img/quiz/36_6.jpg', 'img/quiz/45_7.jpg', 'img/quiz/47_8.jpg', '', 'd', '2019-06-05 01:21:28'),
(357, '47', 7, 'Which picture <u>isn’t</u> related to the Double Syllabic Words Ending with ‘y’?', '', '', '1', 'img/quiz/47_9.jpg', 'img/quiz/47_10.jpg', 'img/quiz/47_11.jpg', 'img/quiz/45_12.jpg', '', 'd', '2019-06-04 22:42:41'),
(358, '47', 8, 'Which <u>isn’t</u> Double Syllabic Words Ending with ‘y’?', '', '', '0', 'baby', 'sunny', 'teddy', 'dare', '', 'd', '2019-06-05 01:55:32'),
(359, '47', 9, 'Which <u>isn’t</u> Double Syllabic Words Ending with ‘y’?', '', '', '0', 'void', 'lady', 'lazy', 'happy', '', 'a', '2019-05-27 01:19:43'),
(360, '47', 10, 'Which <u>isn’t</u> Double Syllabic Words Ending with ‘y’?', '', '', '0', 'berry', 'pony', 'fairy', 'pair', '', 'd', '2019-05-27 01:19:43'),
(361, '48', 1, 'Which word is Words Ending with ‘le’?', '', '', '0', 'claw', 'lucky', 'earth', 'ankle', '', 'd', '2019-05-27 01:19:43'),
(362, '48', 2, 'Which word is Words Ending with ‘le’?', '', '', '0', 'muzzle', 'hurt', 'rainy', 'spare', '', 'a', '2019-05-27 01:19:43'),
(363, '48', 3, 'Which word is Words Ending with ‘le’?', '', '', '0', 'flair', 'uncle', 'boy', 'story', '', 'b', '2019-05-27 01:19:43'),
(364, '48', 4, 'Which word is Words Ending with ‘le’?', '', '', '0', 'blur', 'buckle', 'lazy', 'pawn', '', 'b', '2019-05-27 01:19:43'),
(365, '48', 5, 'Which picture is related to the Words Ending with ‘le’?', '', '', '1', 'img/quiz/45_1.jpg', 'img/quiz/46_2.jpg', 'img/quiz/47_3.jpg', 'img/quiz/48_4.jpg', '', 'd', '2019-06-05 00:55:01'),
(366, '48', 6, 'Which picture is related to the Words Ending with ‘le’?', '', '', '1', 'img/quiz/48_5.jpg', 'img/quiz/36_6.jpg', 'img/quiz/45_7.jpg', 'img/quiz/47_8.jpg', '', 'a', '2019-06-05 01:21:28'),
(367, '48', 7, 'Which picture <u>isn’t</u> related to the Words Ending with ‘le’?', '', '', '1', 'img/quiz/48_9.jpg', 'img/quiz/47_10.jpg', 'img/quiz/48_11.jpg', 'img/quiz/48_12.jpg', '', 'b', '2019-06-04 22:42:41'),
(368, '48', 8, 'Which <u>isn’t</u> Words Ending with ‘le’?', '', '', '0', 'pebble', 'nangle', 'teddy', 'simple', '', 'c', '2019-06-05 01:55:32'),
(369, '48', 9, 'Which <u>isn’t</u> Words Ending with ‘le’?', '', '', '0', 'hello', 'puzzle', 'cattle', 'jungle', '', 'a', '2019-06-05 01:55:32'),
(370, '48', 10, 'Which <u>isn’t</u> Words Ending with ‘le’?', '', '', '0', 'temple', 'candle', 'fairy', 'bottle', '', 'c', '2019-06-05 01:55:32'),
(371, '49', 1, 'Which word is Words Ending with ‘ght’?', '', '', '0', 'claw', 'might', 'earth', 'ankle', '', 'b', '2019-05-27 01:19:43'),
(372, '49', 2, 'Which word is Words Ending with ‘ght’?', '', '', '0', 'muzzle', 'sight', 'rainy', 'spare', '', 'b', '2019-05-27 01:19:43'),
(373, '49', 3, 'Which word is Words Ending with ‘ght’?', '', '', '0', 'flair', 'uncle', 'boy', 'fright', '', 'd', '2019-05-27 01:19:43'),
(374, '49', 4, 'Which word is Words Ending with ‘ght’?', '', '', '0', 'caught', 'buckle', 'lazy', 'pawn', '', 'a', '2019-05-27 01:19:43'),
(375, '49', 5, 'Which picture is related to the Words Ending with ‘ght’?', '', '', '1', 'img/quiz/49_1.jpg', 'img/quiz/46_2.jpg', 'img/quiz/47_3.jpg', 'img/quiz/48_4.jpg', '', 'a', '2019-06-05 00:55:01'),
(376, '49', 6, 'Which picture is related to the Words Ending with ‘ght’?', '', '', '1', 'img/quiz/48_5.jpg', 'img/quiz/49_6.jpg', 'img/quiz/45_7.jpg', 'img/quiz/47_8.jpg', '', 'b', '2019-06-05 01:21:28'),
(377, '49', 7, 'Which picture <u>isn’t</u> related to the Words Ending with ‘ght’?', '', '', '1', 'img/quiz/49_9.jpg', 'img/quiz/47_10.jpg', 'img/quiz/49_11.jpg', 'img/quiz/49_12.jpg', '', 'b', '2019-06-04 22:42:41'),
(378, '49', 8, 'Which <u>isn’t</u> Words Ending with ‘ght’?', '', '', '0', 'nice', 'fight', 'night', 'right', '', 'a', '2019-06-05 01:55:32'),
(379, '49', 9, 'Which <u>isn’t</u> Words Ending with ‘ght’?', '', '', '0', 'tight', 'hit', 'bright', 'height', '', 'b', '2019-06-05 01:55:32'),
(380, '49', 10, 'Which <u>isn’t</u> Words Ending with ‘ght’?', '', '', '0', 'sign', 'bought', 'caught', 'sight', '', 'a', '2019-06-05 01:55:32'),
(381, '50', 1, 'Which word is Words with ‘qu’?', '', '', '0', 'claw', 'might', 'quit', 'ankle', '', 'c', '2019-05-27 01:19:43'),
(382, '50', 2, 'Which word is Words with ‘qu’?', '', '', '0', 'muzzle', 'quick', 'rainy', 'spare', '', 'b', '2019-05-27 01:19:43'),
(383, '50', 3, 'Which picture is related to the Words with ‘qu’?', '', '', '1', 'img/quiz/49_1.jpg', 'img/quiz/50_2.jpg', 'img/quiz/50_3.jpg', 'img/quiz/48_4.jpg', '', 'c', '2019-06-05 00:55:01'),
(384, '50', 4, 'Which <u>isn’t</u> Words with ‘qu’?', '', '', '0', 'quack', 'fight', 'queer', 'queen', '', 'b', '2019-06-05 01:55:32'),
(385, '50', 5, 'Which <u>isn’t</u> Words with ‘qu’?', '', '', '0', 'tight', 'squirrel', 'squeak', 'quiz', '', 'a', '2019-06-05 01:55:32'),
(386, '51', 1, 'Which word is Words with ‘ph’?', '', '', '0', 'telephone', 'uncle', 'boy', 'fright', '', 'a', '2019-05-27 01:19:43'),
(387, '51', 2, 'Which word is Words with ‘ph’?', '', '', '0', 'caught', 'buckle', 'lazy', 'orphan', '', 'd', '2019-05-27 01:19:43'),
(388, '51', 3, 'Which picture is related to the Words with ‘ph’?', '', '', '1', 'img/quiz/48_5.jpg', 'img/quiz/51_6.jpg', 'img/quiz/51_7.jpg', 'img/quiz/47_8.jpg', '', 'c', '2019-06-05 01:21:28'),
(389, '51', 4, 'Which picture <u>isn’t</u> related to the Words with ‘ph’?', '', '', '1', 'img/quiz/51_9.jpg', 'img/quiz/50_2.jpg', 'img/quiz/49_11.jpg', 'img/quiz/51_7.jpg', '', 'c', '2019-06-04 22:42:41'),
(390, '51', 5, 'Which <u>isn’t</u> Words with ‘ph’?', '', '', '0', 'elephant', 'place', 'dolphin', 'cellophane', '', 'b', '2019-06-05 01:55:32'),
(391, '52', 1, 'Which word is Compound Words?', '', '', '0', 'claw', 'might', 'bookshop', 'ankle', '', 'c', '2019-05-27 01:19:43'),
(392, '52', 2, 'Which word is Compound Words?', '', '', '0', 'bedtime', 'quick', 'rainy', 'spare', '', 'a', '2019-05-27 01:19:43'),
(393, '52', 3, 'Which word is Compound Words?', '', '', '0', 'cowboy', 'uncle', 'boy', 'fright', '', 'a', '2019-05-27 01:19:43'),
(394, '52', 4, 'Which word is Compound Words?', '', '', '0', 'caught', 'buckle', 'lazy', 'hairbrush', '', 'd', '2019-05-27 01:19:43'),
(395, '52', 5, 'Which picture is related to the Compound Words?', '', '', '1', 'img/quiz/49_1.jpg', 'img/quiz/50_2.jpg', 'img/quiz/50_3.jpg', 'img/quiz/52_4.jpg', '', 'd', '2019-06-05 00:55:01'),
(396, '52', 6, 'Which picture is related to the Compound Words?', '', '', '1', 'img/quiz/48_5.jpg', 'img/quiz/51_6.jpg', 'img/quiz/51_7.jpg', 'img/quiz/52_8.jpg', '', 'd', '2019-06-05 01:21:28'),
(397, '52', 7, 'Which picture <u>isn’t</u> related to the Compound Words?', '', '', '1', 'img/quiz/52_9.jpg', 'img/quiz/50_2.jpg', 'img/quiz/52_11.jpg', 'img/quiz/52_12.jpg', '', 'b', '2019-06-05 02:56:36'),
(398, '52', 8, 'Which <u>isn’t</u> Compound Words?', '', '', '0', 'quack', 'lipstick', 'footstep', 'crossroad', '', 'a', '2019-06-05 01:55:32'),
(399, '52', 9, 'Which <u>isn’t</u> Compound Words?', '', '', '0', 'highway', 'squirrel', 'baseball', 'armchair', '', 'b', '2019-06-05 01:55:32'),
(400, '52', 10, 'Which <u>isn’t</u> Compound Words?', '', '', '0', 'elephant', 'toothbrush', 'airport', 'mushroom', '', 'a', '2019-06-05 01:55:32'),
(401, '3', 1, 'test2', 'img/quiz/rehealth.jpeg', 'sound', '0', 'a', 'a', 'a', 'a', 'a', 'a', '2019-06-26 21:07:01'),
(402, '2', 1, 'test22', 'img/quiz/', 'sound', '0', 'a', 'a', 'a', 'a', 'a', 'a', '2019-06-28 23:19:29'),
(404, 'BjQxK25Hag', 1, 'test2', 'img/quiz/re9.jpg', 'sound', '0', 's', 's', 's', 's', 's', 'a', '2019-06-29 00:20:47'),
(405, 'BjQxK25Hag', 1, 'test2dd', 'img/quiz/re2.jpg', 'sound', '0', 's', 's', 's', 's', 's', 'a', '2019-06-29 00:34:30'),
(406, 'WPEldc3m9p', 1, 'what is this picture?', 'img/quiz/garbage.jpg', 'garbage', '0', 'garbage', 's', 's', 's', 's', 'a', '2019-07-14 23:04:18'),
(407, '73IPiPf2PN', 1, 'what is this picture ?', 'img/quiz/regarbage.jpg', '', '0', 'garbage', 'bin', 'check', 'dog', 'yui', 'a', '2019-07-14 23:15:07'),
(408, '2', 6, 'dddd', 'img/quiz/reokabe.jpg', 'okabe', '0', 'w', 'w', 'w', 'w', 'w', 'a', '2019-08-02 22:41:19'),
(409, '3AYN2M3WCy', 1, 'dd', 'img/quiz/reokabe.jpg', 'sound', '0', 'd', 'd', 'd', 'd', 'd', 'a', '2019-08-02 22:41:53'),
(410, '3AYN2M3WCy', 2, 'test2', 'img/quiz/reyumi.jpg', 'd', '0', 's', 's', 's', 's', 's', 'a', '2019-08-02 22:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(10) NOT NULL COMMENT 'รหัสผู้ใช้',
  `user_name` varchar(30) NOT NULL,
  `user_pwd` varchar(20) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_position` varchar(50) NOT NULL,
  `user_school` varchar(50) NOT NULL,
  `user_group` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_name`, `user_pwd`, `user_fullname`, `user_position`, `user_school`, `user_group`, `user_email`, `create_date`) VALUES
(1, 'admin_secret', 'rlcuRMQ51jRDk', 'Golf', 'ผู้ปกครอง', 'มหาวิทยาลัยราชภัฏเลย', '', 'nrbs@hotmail.com', '2019-05-02 05:33:06'),
(2, 'Aum', 'rlCqQL5Ja2Ubc', 'อัมราภา', 'อาจารย์', 'มหาวิทยาลัยราชภัฏเลย', '', 'aummarapornenged@gmail.com', '2019-05-02 05:33:43'),
(4, 'Aum2', 'rlUAvTjD382y2', 'aaa', 'นักเรียน', 'sfsdf', '', 'fsdf@ccc', '2019-05-02 07:16:41'),
(5, 'aaa', 'rlUAvTjD382y2', 'aaa', 'นักเรียน', 'โรงเรียน aa', '', 'a@a', '2019-05-02 07:32:32'),
(6, 'admin2', 'rlqc.xnOtzQ6A', 'kantiya1', 'นักเรียน', 'test', '', 'kantiya@gmail.com', '2019-06-27 13:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_exam_score`
--

CREATE TABLE `user_exam_score` (
  `exam_score_id` int(10) NOT NULL COMMENT 'รหัสคะแนนข้อสอบ',
  `level` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Level No',
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผู้ใช้',
  `user_score` int(10) NOT NULL COMMENT 'คะแนนที่ได้',
  `total_score` int(10) NOT NULL COMMENT 'คะแนนเต็ม',
  `test_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_exam_score`
--

INSERT INTO `user_exam_score` (`exam_score_id`, `level`, `user_id`, `user_score`, `total_score`, `test_date`) VALUES
(1, '2', '2', 14, 15, '2019-06-11 20:43:08'),
(2, '1', '2', 15, 15, '2019-06-11 20:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_score`
--

CREATE TABLE `user_quiz_score` (
  `quiz_score_id` int(10) NOT NULL COMMENT 'รหัสคคะแนนบททดสอบ',
  `lesson_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสบทเรียน',
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผู้ใช้',
  `user_score` int(10) NOT NULL COMMENT 'คะแนนที่ได้',
  `total_score` int(10) NOT NULL COMMENT 'คะแนนเต็ม',
  `test_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_quiz_score`
--

INSERT INTO `user_quiz_score` (`quiz_score_id`, `lesson_id`, `user_id`, `user_score`, `total_score`, `test_date`) VALUES
(2, '7', '2', 5, 5, '2019-05-10 09:48:22'),
(4, '8', '2', 5, 5, '2019-05-13 04:13:04'),
(5, '9', '2', 5, 5, '2019-05-14 07:29:27'),
(7, '2', '2', 5, 5, '2019-05-15 02:59:59'),
(8, '3', '2', 5, 5, '2019-05-15 03:03:50'),
(9, '4', '2', 5, 5, '2019-05-15 03:07:33'),
(10, '5', '2', 5, 5, '2019-05-15 03:12:50'),
(11, '6', '2', 5, 5, '2019-05-15 03:16:23'),
(12, '1', '2', 5, 5, '2019-05-15 03:31:23'),
(16, '5', '2', 5, 5, '2019-05-15 03:42:11'),
(17, '6', '2', 5, 5, '2019-05-15 03:42:30'),
(18, '10', '2', 5, 5, '2019-05-15 03:47:12'),
(19, '11', '2', 5, 5, '2019-05-15 04:05:03'),
(20, '12', '2', 5, 5, '2019-05-15 04:25:02'),
(21, '13', '2', 5, 5, '2019-05-15 04:34:16'),
(22, '14', '2', 5, 5, '2019-05-15 04:43:50'),
(23, '15', '2', 5, 5, '2019-05-15 04:53:14'),
(24, '16', '2', 5, 5, '2019-05-15 06:23:22'),
(25, '17', '2', 5, 5, '2019-05-15 06:32:25'),
(26, '19', '2', 10, 10, '2019-05-15 06:59:55'),
(27, '20', '2', 10, 10, '2019-05-15 07:21:03'),
(28, '7', '2', 5, 5, '2019-05-15 11:57:00'),
(29, '1', '2', 5, 5, '2019-05-15 11:58:12'),
(30, 'BjQxK25Hag', '6', 1, 1, '2019-06-29 16:47:17'),
(31, 'WPEldc3m9p', '6', 1, 1, '2019-07-15 16:06:05'),
(32, '73IPiPf2PN', '6', 0, 1, '2019-07-15 16:16:08'),
(33, '73IPiPf2PN', '6', 0, 1, '2019-07-15 16:16:24'),
(34, '3AYN2M3WCy', '6', 0, 0, '2019-07-15 16:31:45'),
(35, '3AYN2M3WCy', '6', 0, 0, '2019-08-01 14:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `word_detail`
--

CREATE TABLE `word_detail` (
  `word_id` int(10) NOT NULL COMMENT 'รหัสคำศัพท์',
  `lesson_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสบทเรียน',
  `word_no` int(10) NOT NULL COMMENT 'ลำดับคำศัพท์',
  `page_no` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หน้าที่',
  `word_show` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อคำศัพท์',
  `word_speak` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เสียงคำศัพท์',
  `word_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปคำศัพท์',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `word_detail`
--

INSERT INTO `word_detail` (`word_id`, `lesson_id`, `word_no`, `page_no`, `word_show`, `word_speak`, `word_image`, `create_date`) VALUES
(28, '2', 2, '1', 'Rat', '\n        rat', 'img/word/rat2.jpg', '2019-06-22 00:59:37'),
(29, '2', 3, '1', 'Hat', '\n        hat', 'img/word/hat2.jpg', '2019-06-22 00:59:44'),
(30, '2', 4, '1', 'Fan', 'fan', 'img/word/fan2.jpg', '2019-04-20 01:49:37'),
(31, '2', 5, '2', 'Man', 'man', 'img/word/man.jpg', '2019-04-20 01:49:37'),
(32, '2', 6, '2', 'Pan', 'pan', 'img/word/pan.jpg', '2019-04-20 01:49:37'),
(33, '2', 7, '2', 'Jam', 'jam', 'img/word/jam.jpg', '2019-04-20 01:49:37'),
(34, '2', 8, '2', 'Ham', 'ham', 'img/word/ham.jpg', '2019-04-20 01:49:37'),
(35, '2', 9, '3', 'Bag', 'bag', 'img/word/bag2.jpg', '2019-04-20 01:49:37'),
(39, '3', 1, '1', 'Bed', 'bed', 'img/word/bed.jpg', '2019-04-20 01:52:34'),
(40, '3', 2, '1', 'Red', 'red', 'img/word/red.jpg', '2019-04-20 01:52:34'),
(41, '3', 3, '1', 'Hen', 'hen', 'img/word/hen.jpg', '2019-04-20 01:52:34'),
(42, '3', 4, '1', 'Net', 'net', 'img/word/net.jpg', '2019-04-20 01:52:34'),
(43, '3', 5, '2', 'Ten', 'ten', 'img/word/ten.jpg', '2019-04-20 01:52:34'),
(44, '3', 6, '2', 'Peg', 'peg', 'img/word/peg.jpg', '2019-04-20 01:52:34'),
(45, '3', 7, '2', 'Leg', 'leg', 'img/word/leg.jpg', '2019-04-20 01:52:34'),
(46, '3', 8, '2', 'Jet', 'jet', 'img/word/jet.jpg', '2019-04-20 01:52:34'),
(47, '4', 1, '1', 'Dig', 'dig', 'img/word/dig.jpg', '2019-04-20 01:52:34'),
(48, '4', 2, '1', 'Win', 'win', 'img/word/win.jpg', '2019-04-20 01:52:34'),
(49, '4', 3, '1', 'Zip', 'zip', 'img/word/zip2.jpg', '2019-04-20 01:52:34'),
(50, '4', 4, '1', 'Hip', 'hip', 'img/word/hip.jpg', '2019-04-20 01:52:34'),
(51, '4', 5, '2', 'Bin', 'bin', 'img/word/bin.jpg', '2019-04-20 01:52:34'),
(52, '4', 6, '2', 'Pin', 'pin', 'img/word/pin.jpg', '2019-04-20 01:52:34'),
(53, '4', 7, '2', 'Sit', 'sit', 'img/word/sit.jpg', '2019-04-20 01:52:34'),
(54, '4', 8, '2', 'Hit', 'hit', 'img/word/hit.jpg', '2019-04-20 01:52:34'),
(55, '5', 1, '1', 'Dog', 'dog', 'img/word/dog2.jpg', '2019-04-20 01:56:33'),
(56, '5', 2, '1', 'Log', 'log', 'img/word/log.jpg', '2019-04-20 01:56:33'),
(57, '5', 3, '1', 'Jog', 'jog', 'img/word/jog.jpg', '2019-04-20 01:56:33'),
(58, '5', 4, '1', 'Cot', 'cot', 'img/word/cot.jpg', '2019-04-20 01:56:33'),
(59, '5', 5, '2', 'Hop', 'hop', 'img/word/hop.jpg', '2019-04-20 01:56:33'),
(60, '5', 6, '2', 'Pot', 'pot', 'img/word/pot.jpg', '2019-04-20 01:56:33'),
(61, '5', 7, '2', 'Rod', 'rod', 'img/word/rod.jpg', '2019-04-20 01:56:33'),
(62, '5', 8, '2', 'Cod', 'cod', 'img/word/cod.jpg', '2019-04-20 01:56:33'),
(63, '5', 9, '3', 'Mop', 'mop', 'img/word/mop.jpg', '2019-04-20 01:56:33'),
(64, '5', 10, '3', 'Fox', 'fox', 'img/word/fox.jpg', '2019-04-20 01:56:33'),
(65, '5', 11, '3', 'Ox', 'ox', 'img/word/ox.jpg', '2019-04-20 01:56:33'),
(66, '5', 12, '3', 'Box', 'box', 'img/word/box.jpg', '2019-04-20 01:56:33'),
(67, '6', 1, '1', 'Tub', 'tub', 'img/word/tub.jpg', '2019-04-20 01:56:33'),
(68, '6', 2, '1', 'Hut', 'hut', 'img/word/hut.jpg', '2019-04-20 01:56:33'),
(69, '6', 3, '1', 'Mud', 'mud', 'img/word/mud.jpg', '2019-04-20 01:56:33'),
(70, '6', 4, '1', 'Bug', 'bug', 'img/word/bug.jpg', '2019-04-20 01:56:33'),
(71, '6', 5, '2', 'Hug', 'hug', 'img/word/hug.jpg', '2019-04-20 01:56:33'),
(72, '6', 6, '2', 'Jug', 'jug', 'img/word/jug2.jpg', '2019-04-20 01:56:33'),
(73, '6', 7, '2', 'Mug', 'mug', 'img/word/mug2.jpg', '2019-04-20 01:56:33'),
(74, '6', 8, '2', 'Rug', 'rug', 'img/word/rug.jpg', '2019-04-20 01:56:33'),
(75, '6', 9, '3', 'Bun', 'bun', 'img/word/bun.jpg', '2019-04-20 01:56:33'),
(76, '6', 10, '3', 'Gun', 'gun', 'img/word/gun2.jpg', '2019-04-20 01:56:33'),
(77, '6', 11, '3', 'Run', 'run', 'img/word/run.jpg', '2019-04-20 01:56:33'),
(78, '6', 12, '3', 'Cup', 'cup', 'img/word/cup.jpg', '2019-04-20 01:56:33'),
(79, '7', 1, '1', 'Clam', 'clam', 'img/word/clam.jpg', '2019-04-20 01:56:33'),
(80, '7', 2, '1', 'Clap', 'clap', 'img/word/clap.jpg', '2019-04-20 01:56:33'),
(81, '7', 3, '1', 'Clip', 'clip', 'img/word/clip.jpg', '2019-04-20 01:56:33'),
(82, '7', 4, '1', 'Crab', 'crab', 'img/word/crab.jpg', '2019-04-20 01:57:35'),
(83, '7', 5, '1', 'Flag', 'flag', 'img/word/flag.jpg', '2019-04-20 01:57:35'),
(84, '7', 6, '2', 'Slip', 'slip', 'img/word/slip.jpg', '2019-04-20 01:57:35'),
(85, '7', 7, '2', 'Plane', 'plane', 'img/word/plane.jpg', '2019-04-20 01:57:35'),
(86, '7', 8, '2', 'Plum', 'plum', 'img/word/plum.jpg', '2019-04-20 01:57:35'),
(87, '7', 9, '2', 'Slim', 'slim', 'img/word/slim.jpg', '2019-04-20 01:57:35'),
(88, '8', 1, '1', 'Lift', 'lift', 'img/word/lift.jpg', '2019-04-29 23:36:57'),
(89, '8', 2, '1', 'Desk', 'desk', 'img/word/desk.jpg', '2019-04-29 23:36:57'),
(90, '8', 3, '1', 'Golf', 'golf', 'img/word/golf.jpg', '2019-04-29 23:34:48'),
(91, '8', 4, '1', 'Belt', 'belt', 'img/word/belt.jpg', '2019-04-29 23:34:48'),
(92, '8', 5, '1', 'Milk', 'milk', 'img/word/milk.jpg', '2019-04-29 23:34:48'),
(93, '8', 6, '1', 'West', 'west', 'img/word/west.jpg', '2019-04-29 23:34:49'),
(94, '8', 7, '2', 'Lamp', 'lamp', 'img/word/lamp.jpg', '2019-04-29 23:34:49'),
(95, '8', 8, '2', 'Pond', 'pond', 'img/word/pond.jpg', '2019-04-29 23:34:49'),
(96, '8', 9, '2', 'Bulb', 'bulb', 'img/word/bulb.jpg', '2019-04-29 23:34:49'),
(97, '8', 10, '2', 'Camp', 'camp', 'img/word/camp.jpg', '2019-04-29 23:34:49'),
(98, '8', 11, '2', 'Hand', 'hand', 'img/word/hand.jpg', '2019-04-29 23:34:49'),
(99, '8', 12, '2', 'Tent', 'tent', 'img/word/tent.jpg', '2019-04-29 23:34:49'),
(100, '9', 1, '1', 'Clamp', 'clamp', 'img/word/clamp.jpg', '2019-04-29 23:43:52'),
(101, '9', 2, '1', 'Plump', 'plump', 'img/word/plump.jpg', '2019-04-29 23:43:52'),
(102, '9', 3, '1', 'Stamp', 'stamp', 'img/word/stamp.jpg', '2019-04-29 23:43:52'),
(103, '9', 4, '2', 'Stump', 'stump', 'img/word/stump.jpg', '2019-04-29 23:43:52'),
(104, '9', 5, '2', 'Blond', 'blond', 'img/word/blond.jpg', '2019-04-29 23:43:52'),
(105, '9', 6, '2', 'Stand', 'stand', 'img/word/stand.jpg', '2019-04-29 23:43:52'),
(106, '10', 1, '1', 'Bell', 'bell', 'img/word/bell.jpg', '2019-04-29 23:52:01'),
(107, '10', 2, '1', 'Smell', 'smell', 'img/word/smell.jpg', '2019-04-29 23:52:02'),
(108, '10', 3, '1', 'Well', 'well', 'img/word/well.jpg', '2019-04-29 23:52:02'),
(109, '10', 4, '1', 'Yell', 'yell', 'img/word/yell.jpg', '2019-04-29 23:52:02'),
(110, '10', 5, '1', 'Bill', 'bill', 'img/word/bill.jpg', '2019-04-29 23:52:02'),
(111, '10', 6, '1', 'Ill', 'ill', 'img/word/ill.jpg', '2019-04-29 23:52:02'),
(112, '10', 7, '2', 'Moss', 'moss', 'img/word/moss.jpg', '2019-04-29 23:52:02'),
(113, '10', 8, '2', 'Dress', 'dress', 'img/word/dress.jpg', '2019-04-29 23:52:02'),
(114, '10', 9, '2', 'Kiss', 'kiss', 'img/word/kiss.jpg', '2019-04-29 23:52:02'),
(115, '11', 1, '1', 'Cock', 'cock', 'img/word/cock.jpg', '2019-04-29 23:59:23'),
(116, '11', 2, '1', 'Clock', 'clock', 'img/word/clock.jpg', '2019-04-29 23:59:23'),
(117, '11', 3, '1', 'Duck', 'duck', 'img/word/duck.jpg', '2019-04-29 23:59:23'),
(118, '11', 4, '1', 'Sack', 'sack', 'img/word/sack.jpg', '2019-04-29 23:59:23'),
(119, '11', 5, '1', 'Lock', 'lock', 'img/word/lock.jpg', '2019-04-29 23:59:23'),
(120, '11', 6, '1', 'Neck', 'neck', 'img/word/neck.jpg', '2019-04-29 23:59:23'),
(124, '12', 1, '1', 'Ring', 'ring', 'img/word/ring.jpg', '2019-04-30 00:05:30'),
(125, '12', 2, '1', 'Sing', 'sing', 'img/word/sing.jpg', '2019-04-30 00:05:30'),
(126, '12', 3, '1', 'Swing', 'swing', 'img/word/swing.jpg', '2019-04-30 00:05:30'),
(127, '12', 4, '2', 'Lung', 'lung', 'img/word/lung.jpg', '2019-04-30 00:05:30'),
(128, '12', 5, '2', 'Gong', 'gong', 'img/word/gong.jpg', '2019-04-30 00:05:30'),
(129, '12', 6, '2', 'Strong', 'strong', 'img/word/strong.jpg', '2019-04-30 00:05:30'),
(130, '13', 1, '1', 'Bank', 'bank', 'img/word/bank.jpg', '2019-05-01 04:21:03'),
(131, '13', 2, '1', 'Tank', 'tank', 'img/word/tank.jpg', '2019-05-01 04:22:31'),
(132, '13', 3, '1', 'Drink', 'drink', 'img/word/drink.jpg', '2019-05-01 04:22:31'),
(133, '13', 4, '2', 'Ink', 'ink', 'img/word/ink2.jpg', '2019-05-01 04:24:00'),
(134, '13', 5, '2', 'Pink', 'pink', 'img/word/pink.jpg', '2019-05-01 04:22:31'),
(135, '13', 6, '2', 'Sink', 'sink', 'img/word/sink.jpg', '2019-05-01 04:22:31'),
(136, '14', 1, '1', 'Catch', 'catch', 'img/word/catch.jpg', '2019-05-01 04:30:57'),
(137, '14', 2, '1', 'Match', 'match', 'img/word/match.jpg', '2019-05-01 04:30:57'),
(138, '14', 3, '1', 'Witch', 'witch', 'img/word/witch.jpg', '2019-05-01 04:30:57'),
(139, '14', 4, '2', 'Switch', 'switch', 'img/word/switch.jpg', '2019-05-01 04:30:57'),
(140, '14', 5, '2', 'Sketch', 'sketch', 'img/word/sketch.jpg', '2019-05-01 04:30:57'),
(141, '14', 6, '2', 'Latch', 'latch', 'img/word/latch.jpg', '2019-05-01 04:30:57'),
(142, '15', 1, '1', 'Shed', 'shed', 'img/word/shed.jpg', '2019-05-01 04:45:35'),
(143, '15', 2, '1', 'Shelf', 'shelf', 'img/word/shelf.jpg', '2019-05-01 04:45:35'),
(144, '15', 3, '1', 'Shell', 'shell', 'img/word/shell.jpg', '2019-05-01 04:45:35'),
(145, '15', 4, '1', 'Shin', 'shin', 'img/word/shin.jpg', '2019-05-01 04:45:35'),
(146, '15', 5, '1', 'Shop', 'shop', 'img/word/shop.jpg', '2019-05-01 04:45:35'),
(147, '15', 6, '1', 'Shock', 'shock', 'img/word/shock.jpg', '2019-05-01 04:45:35'),
(148, '15', 7, '2', 'Cash', 'cash', 'img/word/cash.jpg', '2019-05-01 04:45:35'),
(149, '15', 8, '2', 'Dish', 'dish', 'img/word/dish.jpg', '2019-05-01 04:45:36'),
(150, '15', 9, '2', 'Fish', 'fish', 'img/word/fish.jpg', '2019-05-01 04:45:36'),
(151, '15', 10, '2', 'Brush', 'brush', 'img/word/brush.jpg', '2019-05-01 04:45:36'),
(152, '15', 11, '2', 'Splash', 'splash', 'img/word/splash.jpg', '2019-05-01 04:45:36'),
(153, '15', 12, '2', 'Flash', 'flash', 'img/word/flash.jpg', '2019-05-01 04:45:36'),
(154, '16', 1, '1', 'Chin', 'chin', 'img/word/chin.jpg', '2019-05-01 04:54:08'),
(155, '16', 2, '1', 'Chip', 'chip', 'img/word/chip.jpg', '2019-05-01 04:54:08'),
(156, '16', 3, '1', 'Chop', 'chop', 'img/word/chop.jpg', '2019-05-01 04:54:08'),
(157, '16', 4, '1', 'Chess', 'chess', 'img/word/chess.jpg', '2019-05-01 04:54:08'),
(158, '16', 5, '1', 'Chest', 'chest', 'img/word/chest.jpg', '2019-05-01 04:54:08'),
(159, '16', 6, '1', 'Chick', 'chick', 'img/word/chick.jpg', '2019-05-01 04:54:08'),
(160, '16', 7, '2', 'Bench', 'bench', 'img/word/bench.jpg', '2019-05-01 04:54:08'),
(161, '16', 8, '2', 'Lunch', 'lunch', 'img/word/lunch.jpg', '2019-05-01 04:54:08'),
(162, '16', 9, '2', 'Rich', 'rich', 'img/word/rich.jpg', '2019-05-01 04:54:08'),
(163, '16', 10, '2', 'Punch', 'punch', 'img/word/punch.jpg', '2019-05-01 04:54:08'),
(164, '17', 1, '1', 'Thin', 'thin', 'img/word/thin.jpg', '2019-05-01 05:06:01'),
(165, '17', 2, '1', 'Thick', 'thick', 'img/word/thick.jpg', '2019-05-01 05:06:01'),
(166, '17', 3, '1', 'Thumb', 'thumb', 'img/word/thumb.jpg', '2019-05-01 05:06:01'),
(167, '17', 4, '1', 'Think', 'think', 'img/word/think.jpg', '2019-05-01 05:06:01'),
(168, '17', 5, '2', 'Broth', 'broth', 'img/word/broth.jpg', '2019-05-01 05:06:01'),
(169, '17', 6, '2', 'Cloth', 'cloth', 'img/word/cloth.jpg', '2019-05-01 05:06:01'),
(170, '17', 7, '2', 'Moth', 'moth', 'img/word/moth.jpg', '2019-05-01 05:06:01'),
(171, '18', 1, '1', 'Max', 'max', 'img/word/max.jpg', '2019-05-01 05:14:30'),
(172, '18', 2, '1', 'Pat', 'pat', 'img/word/pat.jpg', '2019-05-01 05:14:30'),
(173, '18', 3, '1', 'Pam', 'pam', 'img/word/pam.jpg', '2019-05-01 05:14:30'),
(174, '18', 4, '1', 'Sam', 'sam', 'img/word/sam.jpg', '2019-05-01 05:14:30'),
(175, '18', 5, '1', 'Ben', 'ben', 'img/word/ben.jpg', '2019-05-04 09:00:23'),
(176, '18', 6, '1', 'Ted', 'ted', 'img/word/ted.jpg', '2019-05-04 09:00:30'),
(177, '18', 7, '2', 'Ned', 'ned', 'img/word/ned.jpg', '2019-05-01 05:14:30'),
(178, '18', 8, '2', 'Kim', 'kim', 'img/word/kim.jpg', '2019-05-01 05:14:30'),
(179, '18', 9, '2', 'Liz', 'liz', 'img/word/liz.jpg', '2019-05-04 09:00:36'),
(180, '18', 10, '2', 'Don', 'don', 'img/word/don.jpg', '2019-05-04 09:00:40'),
(181, '18', 11, '2', 'Ron', 'ron', 'img/word/ron.jpg', '2019-05-04 09:00:45'),
(182, '18', 12, '2', 'Gus', 'gus', 'img/word/gus.jpg', '2019-05-04 09:00:50'),
(183, '18', 13, '3', 'Brad', 'brad', 'img/word/brad.jpg', '2019-05-04 09:03:16'),
(184, '18', 14, '3', 'Stan', 'stan', 'img/word/stan.jpg', '2019-05-04 09:03:16'),
(185, '18', 15, '3', 'Gwen', 'gwen', 'img/word/gwen.jpg', '2019-05-04 09:03:16'),
(186, '18', 16, '3', 'Bill', 'bill', 'img/word/bill2.jpg', '2019-05-04 09:03:16'),
(187, '18', 17, '3', 'Todd', 'todd', 'img/word/todd.jpg', '2019-05-04 09:03:16'),
(188, '18', 18, '4', 'Jess', 'jess', 'img/word/jess.jpg', '2019-05-04 09:03:16'),
(189, '18', 19, '4', 'Nick', 'nick', 'img/word/nick.jpg', '2019-05-04 09:03:16'),
(190, '18', 20, '4', 'Bing', 'bing', 'img/word/bing.jpg', '2019-05-04 09:03:16'),
(191, '18', 21, '4', 'Beth', 'beth', 'img/word/beth.jpg', '2019-05-04 09:03:16'),
(192, '19', 1, '1', 'Cake', 'cake', 'img/word/cake.jpg', '2019-05-04 09:08:58'),
(193, '19', 2, '1', 'Snake', 'snake', 'img/word/snake.jpg', '2019-05-04 09:08:58'),
(194, '19', 3, '1', 'Plane', 'plane', 'img/word/plane2.jpg', '2019-05-04 09:08:58'),
(195, '19', 4, '2', 'Skate', 'skate', 'img/word/skate.jpg', '2019-05-04 09:08:58'),
(196, '19', 5, '2', 'Cave', 'cave', 'img/word/cave.jpg', '2019-05-04 09:08:58'),
(197, '19', 6, '2', 'Plate', 'plate', 'img/word/plate.jpg', '2019-05-04 09:08:58'),
(198, '19', 7, '3', 'Grapes', 'grapes', 'img/word/grapes.jpg', '2019-05-04 09:08:58'),
(199, '19', 8, '3', 'Wave', 'wave', 'img/word/wave.jpg', '2019-05-04 09:08:58'),
(200, '19', 9, '3', 'Crane', 'crane', 'img/word/crane.jpg', '2019-05-04 09:08:58'),
(201, '20', 1, '1', 'Bride', 'bride', 'img/word/bride.jpg', '2019-05-04 09:08:58'),
(202, '20', 2, '1', 'Mine', 'mine', 'img/word/mine.jpg', '2019-05-04 09:08:58'),
(203, '20', 3, '1', 'Knife', 'knife', 'img/word/knife.jpg', '2019-05-04 09:08:58'),
(204, '20', 4, '2', 'Smile', 'smile', 'img/word/smile.jpg', '2019-05-04 09:08:58'),
(205, '20', 5, '2', 'Kite', 'kite', 'img/word/kite.jpg', '2019-05-04 09:08:58'),
(206, '20', 6, '2', 'Drive', 'drive', 'img/word/drive.jpg', '2019-05-04 09:08:58'),
(207, '20', 7, '3', 'Five', 'five', 'img/word/five.jpg', '2019-05-04 09:08:58'),
(208, '20', 8, '3', 'Time', 'time', 'img/word/time.jpg', '2019-05-04 09:08:58'),
(209, '20', 9, '3', 'Lime', 'lime', 'img/word/lime.jpg', '2019-05-04 09:08:58'),
(210, '21', 1, '1', 'Toe', 'toe', 'img/word/toe.jpg', '2019-05-04 09:08:58'),
(211, '21', 2, '1', 'Mole', 'mole', 'img/word/mole.jpg', '2019-05-04 09:08:58'),
(212, '21', 3, '1', 'Cone', 'cone', 'img/word/cone.jpg', '2019-05-04 09:08:58'),
(213, '21', 4, '2', 'Bone', 'bone', 'img/word/bone.jpg', '2019-05-04 09:08:58'),
(214, '21', 5, '2', 'Rose', 'rose', 'img/word/rose.jpg', '2019-05-04 09:08:58'),
(215, '21', 6, '2', 'Nose', 'nose', 'img/word/nose2.jpg', '2019-05-04 09:08:58'),
(216, '21', 7, '3', 'Stone', 'stone', 'img/word/stone.jpg', '2019-05-04 09:08:58'),
(217, '21', 8, '3', 'Rope', 'rope', 'img/word/rope.jpg', '2019-05-04 09:08:58'),
(218, '21', 9, '3', 'Doe', 'doe', 'img/word/doe.jpg', '2019-05-04 09:08:58'),
(219, '22', 1, '1', 'Tune', 'tune', 'img/word/tune.jpg', '2019-05-04 09:08:58'),
(220, '22', 2, '1', 'Cube', 'cube', 'img/word/cube.jpg', '2019-05-04 09:08:58'),
(221, '22', 3, '1', 'Tube', 'tube', 'img/word/tube.jpg', '2019-05-04 09:08:58'),
(222, '22', 4, '2', 'Plume', 'plume', 'img/word/plume.jpg', '2019-05-04 09:08:58'),
(223, '22', 5, '2', 'June', 'june', 'img/word/june.jpg', '2019-05-04 09:08:58'),
(224, '22', 6, '2', 'Prune', 'prune', 'img/word/prune.jpg', '2019-05-04 09:08:58'),
(225, '23', 1, '1', 'Face', 'face', 'img/word/face.jpg', '2019-05-04 09:08:58'),
(226, '23', 2, '1', 'Prince', 'prince', 'img/word/prince.jpg', '2019-05-04 09:08:58'),
(227, '23', 3, '1', 'Ice', 'ice', 'img/word/ice.jpg', '2019-05-04 09:08:58'),
(228, '23', 4, '2', 'Race', 'race', 'img/word/race.jpg', '2019-05-04 09:08:58'),
(229, '23', 5, '2', 'Mice', 'mice', 'img/word/mice.jpg', '2019-05-04 09:08:58'),
(230, '23', 6, '2', 'Rice', 'rice', 'img/word/rice.jpg', '2019-05-04 09:08:58'),
(231, '23', 7, '3', 'Fence', 'fence', 'img/word/fence.jpg', '2019-05-04 09:08:58'),
(232, '23', 8, '3', 'Spice', 'spice', 'img/word/spice.jpg', '2019-05-04 09:08:58'),
(233, '23', 9, '3', 'Price', 'price', 'img/word/price.jpg', '2019-05-04 09:08:58'),
(234, '24', 1, '1', 'Bee', 'bee', 'img/word/bee.jpg', '2019-05-04 09:08:58'),
(235, '24', 2, '1', 'Tree', 'tree', 'img/word/tree.jpg', '2019-05-04 09:08:58'),
(236, '24', 3, '1', 'Three', 'three', 'img/word/three.jpg', '2019-05-04 09:08:58'),
(237, '24', 4, '2', 'Feed', 'feed', 'img/word/feed.jpg', '2019-05-04 09:08:58'),
(238, '24', 5, '2', 'Seed', 'seed', 'img/word/seed.jpg', '2019-05-04 09:08:58'),
(239, '24', 6, '2', 'Cheek', 'cheek', 'img/word/cheek.jpg', '2019-05-04 09:08:58'),
(240, '24', 7, '3', 'Teeth', 'teeth', 'img/word/teeth.jpg', '2019-05-04 09:08:58'),
(241, '24', 8, '3', 'Green', 'green', 'img/word/green.jpg', '2019-05-04 09:08:58'),
(242, '24', 9, '3', 'Jeep', 'jeep', 'img/word/jeep.jpg', '2019-05-04 09:08:58'),
(243, '25', 1, '1', 'Sea', 'sea', 'img/word/sea.jpg', '2019-05-04 09:08:58'),
(244, '25', 2, '1', 'Tea', 'tea', 'img/word/tea.jpg', '2019-05-04 09:08:58'),
(245, '25', 3, '1', 'Flea', 'flea', 'img/word/flea.jpg', '2019-05-04 09:08:58'),
(246, '25', 4, '2', 'Peach', 'peach', 'img/word/peach.jpg', '2019-05-04 09:08:58'),
(247, '25', 5, '2', 'Teach', 'teach', 'img/word/teach.jpg', '2019-05-04 09:08:58'),
(248, '25', 6, '2', 'Read', 'read', 'img/word/read.jpg', '2019-05-04 09:08:58'),
(249, '25', 7, '3', 'Leaf', 'leaf', 'img/word/leaf.jpg', '2019-05-04 09:08:58'),
(250, '25', 8, '3', 'Jeans', 'jeans', 'img/word/jeans.jpg', '2019-05-04 09:08:58'),
(251, '25', 9, '3', 'Seal', 'seal', 'img/word/seal.jpg', '2019-05-04 09:08:58'),
(252, '26', 1, '1', 'Maid', 'maid', 'img/word/maid.jpg', '2019-05-04 09:08:58'),
(253, '26', 2, '1', 'Nail', 'nail', 'img/word/nail.jpg', '2019-05-04 09:08:58'),
(254, '26', 3, '1', 'Rail', 'rail', 'img/word/rail.jpg', '2019-05-04 09:08:58'),
(255, '26', 4, '2', 'Snail', 'snail', 'img/word/snail.jpg', '2019-05-04 09:08:58'),
(256, '26', 5, '2', 'Chain', 'chain', 'img/word/chain.jpg', '2019-05-04 09:08:58'),
(257, '26', 6, '2', 'Paint', 'paint', 'img/word/paint.jpg', '2019-05-04 09:08:58'),
(258, '26', 7, '3', 'Rain', 'rain', 'img/word/rain.jpg', '2019-05-04 09:08:58'),
(259, '26', 8, '3', 'Train', 'train', 'img/word/train.jpg', '2019-05-04 09:08:58'),
(260, '26', 9, '3', 'Mail', 'mail', 'img/word/mail.jpg', '2019-05-04 09:08:58'),
(261, '27', 1, '1', 'Pay', 'pay', 'img/word/pay.jpg', '2019-05-04 09:08:58'),
(262, '27', 2, '1', 'Jay', 'jay', 'img/word/jay.jpg', '2019-05-04 09:08:58'),
(263, '27', 3, '1', 'Pray', 'pray', 'img/word/pray.jpg', '2019-05-04 09:08:58'),
(264, '27', 4, '2', 'Play', 'play', 'img/word/play.jpg', '2019-05-04 09:08:58'),
(265, '27', 5, '2', 'Tray', 'tray', 'img/word/tray.jpg', '2019-05-04 09:08:58'),
(266, '27', 6, '2', 'Spray', 'spray', 'img/word/spray.jpg', '2019-05-04 09:08:58'),
(267, '28', 1, '1', 'Road', 'road', 'img/word/road.jpg', '2019-05-04 09:08:58'),
(268, '28', 2, '1', 'Toad', 'toad', 'img/word/toad.jpg', '2019-05-04 09:08:58'),
(269, '28', 3, '1', 'Oak', 'oak', 'img/word/oak.jpg', '2019-05-04 09:08:58'),
(270, '28', 4, '2', 'Coal', 'coal', 'img/word/coal.jpg', '2019-05-04 09:08:58'),
(271, '28', 5, '2', 'Foal', 'foal', 'img/word/foal.jpg', '2019-05-04 09:08:58'),
(272, '28', 6, '2', 'Cloak', 'cloak', 'img/word/cloak.jpg', '2019-05-04 09:08:58'),
(273, '28', 7, '3', 'Soap', 'soap', 'img/word/soap.jpg', '2019-05-04 09:08:58'),
(274, '28', 8, '3', 'Boat', 'boat', 'img/word/boat.jpg', '2019-05-04 09:08:58'),
(275, '28', 9, '3', 'Goat', 'goat', 'img/word/goat.jpg', '2019-05-04 09:08:58'),
(276, '29', 1, '1', 'Bow', 'bow', 'img/word/bow.jpg', '2019-05-04 09:08:58'),
(277, '29', 2, '1', 'Blow', 'blow', 'img/word/blow.jpg', '2019-05-04 09:08:58'),
(278, '29', 3, '1', 'Row', 'row', 'img/word/row.jpg', '2019-05-04 09:08:58'),
(279, '29', 4, '2', 'Crow', 'crow', 'img/word/crow.jpg', '2019-05-04 09:08:58'),
(280, '29', 5, '2', 'Snow', 'snow', 'img/word/snow.jpg', '2019-05-04 09:08:58'),
(281, '29', 6, '2', 'Arrow', 'arrow', 'img/word/arrow.jpg', '2019-05-04 09:08:58'),
(282, '29', 7, '3', 'Pillow', 'pillow', 'img/word/pillow.jpg', '2019-05-04 09:08:58'),
(283, '29', 8, '3', 'Bowl', 'bowl', 'img/word/bowl.jpg', '2019-05-04 09:08:58'),
(284, '29', 9, '3', 'Sparrow', 'sparrow', 'img/word/sparrow.jpg', '2019-05-04 09:08:58'),
(285, '30', 1, '1', 'Hood', 'hood', 'img/word/hood.jpg', '2019-05-04 09:24:01'),
(286, '30', 2, '1', 'Foot', 'foot', 'img/word/foot.jpg', '2019-05-04 09:24:01'),
(287, '30', 3, '1', 'Book', 'book', 'img/word/book.jpg', '2019-05-04 09:24:01'),
(288, '30', 4, '1', 'Cook', 'cook', 'img/word/cook.jpg', '2019-05-04 09:24:01'),
(289, '30', 5, '2', 'Food', 'food', 'img/word/food.jpg', '2019-05-04 09:24:01'),
(290, '30', 6, '2', 'Pool', 'pool', 'img/word/pool.jpg', '2019-05-04 09:24:01'),
(291, '30', 7, '2', 'Stool', 'stool', 'img/word/stool.jpg', '2019-05-04 09:24:01'),
(292, '30', 8, '2', 'Broom', 'broom', 'img/word/broom.jpg', '2019-05-04 09:24:01'),
(293, '30', 9, '2', 'Moon', 'moon', 'img/word/moon.jpg', '2019-05-04 09:24:01'),
(294, '30', 10, '3', 'Hoop', 'hoop', 'img/word/hoop.jpg', '2019-05-04 09:24:01'),
(295, '30', 11, '3', 'Goose', 'goose', 'img/word/goose.jpg', '2019-05-04 09:24:01'),
(296, '30', 12, '3', 'Moose', 'moose', 'img/word/moose.jpg', '2019-05-04 09:24:01'),
(297, '30', 13, '3', 'Booth', 'booth', 'img/word/booth.jpg', '2019-05-04 09:24:01'),
(298, '31', 1, '1', 'Car', 'car', 'img/word/car.jpg', '2019-05-04 09:24:01'),
(299, '31', 2, '1', 'Jar', 'jar', 'img/word/jar.jpg', '2019-05-04 09:24:01'),
(300, '31', 3, '1', 'Star', 'star', 'img/word/star.jpg', '2019-05-04 09:24:01'),
(301, '31', 4, '2', 'Card', 'card', 'img/word/card.jpg', '2019-05-04 09:24:01'),
(302, '31', 5, '2', 'Bark', 'bark', 'img/word/bark.jpg', '2019-05-04 09:24:01'),
(303, '31', 6, '2', 'Harp', 'harp', 'img/word/harp.jpg', '2019-05-04 09:24:01'),
(304, '31', 7, '3', 'Shark', 'shark', 'img/word/shark.jpg', '2019-05-04 09:24:01'),
(305, '31', 8, '3', 'Farm', 'farm', 'img/word/farm.jpg', '2019-05-04 09:24:01'),
(306, '31', 9, '3', 'Tart', 'tart', 'img/word/tart.jpg', '2019-05-04 09:24:01'),
(307, '32', 1, '1', 'Torch', 'torch', 'img/word/torch.jpg', '2019-05-04 09:24:01'),
(308, '32', 2, '1', 'Cork', 'cork', 'img/word/cork.jpg', '2019-05-04 09:24:01'),
(309, '32', 3, '1', 'Corn', 'corn', 'img/word/corn.jpg', '2019-05-04 09:24:01'),
(310, '32', 4, '2', 'Horn', 'horn', 'img/word/horn.jpg', '2019-05-04 09:24:01'),
(311, '32', 5, '2', 'Horse', 'horse', 'img/word/horse.jpg', '2019-05-04 09:24:01'),
(312, '32', 6, '2', 'Fort', 'fort', 'img/word/fort.jpg', '2019-05-04 09:24:01'),
(313, '33', 1, '1', 'Herb', 'herb', 'img/word/herb.jpg', '2019-05-04 09:24:01'),
(314, '33', 2, '1', 'Perch', 'perch', 'img/word/perch.jpg', '2019-05-04 09:24:01'),
(315, '33', 3, '1', 'Fern', 'fern', 'img/word/fern.jpg', '2019-05-04 09:24:01'),
(316, '33', 4, '1', 'Herd', 'herd', 'img/word/herd.jpg', '2019-05-04 09:24:01'),
(317, '34', 1, '1', 'Barber', 'barber', 'img/word/barber.jpg', '2019-05-04 09:24:01'),
(318, '34', 2, '1', 'Cooker', 'cooker', 'img/word/cooker.jpg', '2019-05-04 09:24:01'),
(319, '34', 3, '1', 'Dagger', 'dagger', 'img/word/dagger.jpg', '2019-05-04 09:24:01'),
(320, '34', 4, '2', 'Driver', 'driver', 'img/word/driver.jpg', '2019-05-04 09:24:01'),
(321, '34', 5, '2', 'Farmer', 'farmer', 'img/word/farmer.jpg', '2019-05-04 09:24:01'),
(322, '34', 6, '2', 'Finger', 'finger', 'img/word/finger.jpg', '2019-05-04 09:24:01'),
(323, '34', 7, '3', 'Flower', 'flower', 'img/word/flower.jpg', '2019-05-04 09:24:01'),
(324, '34', 8, '3', 'Hammer', 'hammer', 'img/word/hammer.jpg', '2019-05-04 09:24:01'),
(325, '34', 9, '3', 'Lobster', 'lobster', 'img/word/lobster.jpg', '2019-05-04 09:24:01'),
(326, '35', 1, '1', 'Bird', 'bird', 'img/word/bird.jpg', '2019-05-04 09:24:01'),
(327, '35', 2, '1', 'First', 'first', 'img/word/first.jpg', '2019-05-04 09:24:01'),
(328, '35', 3, '1', 'Fir', 'fir', 'img/word/fir.jpg', '2019-05-04 09:24:01'),
(329, '35', 4, '2', 'Girl', 'girl', 'img/word/girl.jpg', '2019-05-04 09:24:01'),
(330, '35', 5, '2', 'Shirt', 'shirt', 'img/word/shirt.jpg', '2019-05-04 09:24:01'),
(331, '35', 6, '2', 'Skirt', 'skirt', 'img/word/skirt.jpg', '2019-05-04 09:24:01'),
(332, '36', 1, '1', 'Fur', 'fur', 'img/word/fur.jpg', '2019-05-04 09:24:01'),
(333, '36', 2, '1', 'Burn', 'burn', 'img/word/burn.jpg', '2019-05-04 09:24:01'),
(334, '36', 3, '1', 'Church', 'church', 'img/word/church.jpg', '2019-05-04 09:24:01'),
(335, '36', 4, '2', 'Curl', 'curl', 'img/word/curl.jpg', '2019-05-04 09:24:01'),
(336, '36', 5, '2', 'Surf', 'surf', 'img/word/surf.jpg', '2019-05-04 09:24:01'),
(337, '36', 6, '2', 'Nurse', 'nurse', 'img/word/nurse.jpg', '2019-05-04 09:24:01'),
(338, '37', 1, '1', 'Core', 'core', 'img/word/core.jpg', '2019-05-04 09:24:01'),
(339, '37', 2, '1', 'Store', 'store', 'img/word/store.jpg', '2019-05-04 09:24:01'),
(340, '37', 3, '1', 'Snore', 'snore', 'img/word/snore.jpg', '2019-05-04 09:24:01'),
(341, '38', 1, '1', 'Cookie', 'cookie', 'img/word/cookie.jpg', '2019-05-04 09:28:04'),
(342, '38', 2, '1', 'Field', 'field', 'img/word/field.jpg', '2019-05-04 09:28:04'),
(343, '38', 3, '1', 'Shield', 'shield', 'img/word/shield.jpg', '2019-05-04 09:28:04'),
(344, '40', 1, '1', 'Cloud', 'cloud', 'img/word/cloud.jpg', '2019-05-04 09:31:45'),
(345, '40', 2, '1', 'Loud', 'loud', 'img/word/loud.jpg', '2019-05-04 09:31:45'),
(346, '40', 3, '1', 'Ground', 'ground', 'img/word/ground.jpg', '2019-05-04 09:31:45'),
(347, '40', 4, '2', 'House', 'house', 'img/word/house.jpg', '2019-05-04 09:31:45'),
(348, '40', 5, '2', 'Mouse', 'mouse', 'img/word/mouse.jpg', '2019-05-04 09:31:45'),
(349, '40', 6, '2', 'Scout', 'scout', 'img/word/scout.jpg', '2019-05-04 09:31:45'),
(350, '41', 1, '1', 'Cow', 'cow', 'img/word/cow.jpg', '2019-05-04 09:31:45'),
(351, '41', 2, '1', 'Town', 'town', 'img/word/town.jpg', '2019-05-04 09:31:45'),
(352, '41', 3, '1', 'Brown', 'brown', 'img/word/brown.jpg', '2019-05-04 09:31:45'),
(353, '41', 4, '2', 'Crow', 'crow', 'img/word/crow2.jpg', '2019-05-04 09:31:45'),
(354, '41', 5, '2', 'Crown', 'crown', 'img/word/crown.jpg', '2019-05-04 09:31:45'),
(355, '41', 6, '2', 'Owl', 'owl', 'img/word/owl.jpg', '2019-05-04 09:31:45'),
(356, '42', 1, '1', 'Claw', 'claw', 'img/word/claw.jpg', '2019-05-04 09:31:45'),
(357, '42', 2, '1', 'Jaw', 'jaw', 'img/word/jaw.jpg', '2019-05-04 09:31:45'),
(358, '42', 3, '1', 'Paw', 'paw', 'img/word/paw.jpg', '2019-05-04 09:31:45'),
(359, '42', 4, '2', 'Saw', 'saw', 'img/word/saw.jpg', '2019-05-04 09:31:45'),
(360, '42', 5, '2', 'Hawk', 'hawk', 'img/word/hawk.jpg', '2019-05-04 09:31:45'),
(361, '42', 6, '2', 'Crawl', 'crawl', 'img/word/crawl.jpg', '2019-05-04 09:31:45'),
(362, '43', 1, '1', 'Chalk', 'chalk', 'img/word/chalk.jpg', '2019-05-04 09:31:45'),
(363, '43', 2, '1', 'Talk', 'talk', 'img/word/talk.jpg', '2019-05-04 09:31:45'),
(364, '43', 3, '1', 'Walk', 'walk', 'img/word/walk.jpg', '2019-05-04 09:31:45'),
(365, '43', 4, '2', 'Ball', 'ball', 'img/word/ball.jpg', '2019-05-04 09:31:45'),
(366, '43', 5, '2', 'Wall', 'wall', 'img/word/wall.jpg', '2019-05-04 09:31:45'),
(367, '43', 6, '2', 'Stall', 'stall', 'img/word/stall.jpg', '2019-05-04 09:31:45'),
(368, '44', 1, '1', 'Oil', 'oil', 'img/word/oil.jpg', '2019-05-04 09:31:45'),
(369, '44', 2, '1', 'Boil', 'boil', 'img/word/boil.jpg', '2019-05-04 09:31:45'),
(370, '44', 3, '1', 'Foil', 'foil', 'img/word/foil.jpg', '2019-05-04 09:31:45'),
(371, '44', 4, '2', 'Soil', 'soil', 'img/word/soil.jpg', '2019-05-04 09:31:45'),
(372, '44', 5, '2', 'Coin', 'coin', 'img/word/coin.jpg', '2019-05-04 09:31:45'),
(373, '44', 6, '2', 'Point', 'point', 'img/word/point.jpg', '2019-05-04 09:31:45'),
(374, '44', 7, '3', 'Boy', 'boy', 'img/word/boy.jpg', '2019-05-04 09:31:45'),
(375, '44', 8, '3', 'Joy', 'joy', 'img/word/joy.jpg', '2019-05-04 09:31:45'),
(376, '44', 9, '3', 'Toy', 'toy', 'img/word/toy.jpg', '2019-05-04 09:31:45'),
(377, '45', 1, '1', 'Earth', 'earth', 'img/word/earth.jpg', '2019-05-04 09:31:45'),
(378, '45', 2, '1', 'Learn', 'learn', 'img/word/learn.jpg', '2019-05-04 09:31:45'),
(379, '45', 3, '1', 'Pearl', 'pearl', 'img/word/pearl.jpg', '2019-05-04 09:31:45'),
(380, '45', 4, '2', 'Spear', 'spear', 'img/word/spear.jpg', '2019-05-04 09:31:45'),
(381, '45', 5, '2', 'Tear', 'tear', 'img/word/tear.jpg', '2019-05-04 09:31:45'),
(382, '45', 6, '2', 'Hear', 'hear', 'img/word/hear.jpg', '2019-05-04 09:31:45'),
(383, '46', 1, '1', 'Hare', 'hare', 'img/word/hare.jpg', '2019-05-04 09:31:45'),
(384, '46', 2, '1', 'Pare', 'pare', 'img/word/pare.jpg', '2019-05-04 09:31:45'),
(385, '46', 3, '1', 'Scare', 'scare', 'img/word/scare.jpg', '2019-05-04 09:31:45'),
(386, '46', 4, '2', 'Fair', 'fair', 'img/word/fair.jpg', '2019-05-04 09:31:45'),
(387, '46', 5, '2', 'Chair', 'chair', 'img/word/chair.jpg', '2019-05-04 09:31:45'),
(388, '46', 6, '2', 'Stair', 'stair', 'img/word/stair.jpg', '2019-05-04 09:31:45'),
(413, '50', 1, '1', 'Queen', 'queen', 'img/word/queen2.jpg', '2019-05-04 09:31:45'),
(414, '50', 2, '1', 'Squeeze', 'squeeze', 'img/word/squeeze.jpg', '2019-05-04 09:31:45'),
(415, '50', 3, '1', 'Squirrel', 'squirrel', 'img/word/squirrel.jpg', '2019-05-04 09:31:45'),
(416, '51', 1, '1', 'Photo', 'photo', 'img/word/photo.jpg', '2019-05-04 09:49:49'),
(417, '51', 2, '1', 'Telephone', 'telephone', 'img/word/telephone.jpg', '2019-05-04 09:49:49'),
(418, '51', 3, '1', 'Saxophone', 'saxophone', 'img/word/saxophone.jpg', '2019-05-04 09:49:49'),
(419, '51', 4, '1', 'Dolphin', 'dolphin', 'img/word/dolphin.jpg', '2019-05-04 09:49:50'),
(420, '51', 5, '1', 'Elephant', 'elephant', 'img/word/elephant.jpg', '2019-05-04 09:49:50'),
(421, '52', 1, '1', 'Cupcake', 'cupcake', 'img/word/cupcake.jpg', '2019-05-04 09:49:50'),
(422, '52', 2, '1', 'Butterfly', 'butterfly', 'img/word/butterfly.jpg', '2019-05-04 09:49:50'),
(423, '52', 3, '1', 'Toothbrush', 'toothbrush', 'img/word/toothbrush.jpg', '2019-05-04 09:49:50'),
(424, '52', 4, '2', 'Bedroom', 'bedroom', 'img/word/bedroom.jpg', '2019-05-04 09:49:50'),
(425, '52', 5, '2', 'Armchair', 'armchair', 'img/word/armchair.jpg', '2019-05-04 09:49:50'),
(426, '52', 6, '2', 'Football', 'football', 'img/word/football.jpg', '2019-05-04 09:49:50'),
(427, '52', 7, '3', 'Airport', 'airport', 'img/word/airport.jpg', '2019-05-04 09:49:50'),
(428, '52', 8, '3', 'Lighthouse', 'lighthouse', 'img/word/lighthouse.jpg', '2019-05-04 09:49:50'),
(429, '52', 9, '3', 'Mushroom', 'mushroom', 'img/word/mushroom.jpg', '2019-05-04 09:49:50'),
(432, '2CeJOLzIwS', 1, '1', 's', 's', 'img/word/garbage.jpg', '2019-06-26 21:44:26'),
(436, 'uJtJirMgnX', 1, '1', 'garbage', 'garbage', 'img/word/garbage.jpg', '2019-07-05 22:39:50'),
(437, 'wxJ8qOhaOo', 1, '1', 'health', 'health', 'img/word/health.jpeg', '2019-07-05 22:44:46'),
(442, '42IPDpwcaR', 1, '1', 'participation', 'participation', 'img/word/participation_orig.jpg', '2019-07-14 23:19:07'),
(443, '42IPDpwcaR', 2, '1', 'health', 'health', 'img/word/health.jpeg', '2019-07-14 23:19:23'),
(444, 'jCYRo7p9gj', 1, '1', 'healthy', 'healthy', 'img/word/health.jpeg', '2019-07-14 23:27:21'),
(445, 'Pu2S1QBoec', 1, '1', 'heal', 'heal', 'img/word/health.jpeg', '2019-07-14 23:28:06'),
(446, '3AYN2M3WCy', 1, '1', 'test', 'test', 'img/word/Screenshot from 2019-05-23 14-34-10.png', '2019-07-14 23:30:30'),
(447, 'aPU1yO7PxU', 1, '1', 'test', 'test', 'img/word/illustration-anime-anime-girls-Makise-Kurisu-Steins-Gate-1920x1200-px-539039-wallhere.com.p', '2019-07-31 22:05:38'),
(448, '3AYN2M3WCy', 1, '1', 'test', 'test', 'img/word/1920x1200-px-Makise-Kurisu-Steins-Gate-1035458-wallhere.com.jpg', '2019-08-01 22:36:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`) USING BTREE;

--
-- Indexes for table `exam_detail`
--
ALTER TABLE `exam_detail`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `lesson_detail`
--
ALTER TABLE `lesson_detail`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `quiz_detail`
--
ALTER TABLE `quiz_detail`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_quiz_score`
--
ALTER TABLE `user_quiz_score`
  ADD PRIMARY KEY (`quiz_score_id`);

--
-- Indexes for table `word_detail`
--
ALTER TABLE `word_detail`
  ADD PRIMARY KEY (`word_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแอดมิน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_detail`
--
ALTER TABLE `exam_detail`
  MODIFY `exam_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแบบทดสอบ';

--
-- AUTO_INCREMENT for table `quiz_detail`
--
ALTER TABLE `quiz_detail`
  MODIFY `quiz_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแบบทดสอบ', AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_quiz_score`
--
ALTER TABLE `user_quiz_score`
  MODIFY `quiz_score_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคคะแนนบททดสอบ', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `word_detail`
--
ALTER TABLE `word_detail`
  MODIFY `word_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำศัพท์', AUTO_INCREMENT=449;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
