-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2018 at 08:51 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revelsoft_charoenphan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `about_id` int(11) NOT NULL,
  `about_header` varchar(100) NOT NULL,
  `about_header_detail` varchar(100) NOT NULL,
  `about_description` varchar(500) NOT NULL,
  `about_image` varchar(200) NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`about_id`, `about_header`, `about_header_detail`, `about_description`, `about_image`, `updateby`, `lastupdate`) VALUES
(1, 'ABOUT US', 'เจริญภัณฑ์ เบเกอรี่', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', '03082018152035-22851778_1600164090046434_6757097085378243945_n.jpg', 1, '2018-08-03 15:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_about_slide`
--

CREATE TABLE `tb_about_slide` (
  `about_slide_id` int(11) NOT NULL,
  `about_slide_header` varchar(100) DEFAULT NULL,
  `about_slide_header_detail` varchar(100) NOT NULL,
  `about_slide_description` varchar(500) DEFAULT NULL,
  `about_slide_image` varchar(200) DEFAULT NULL,
  `about_slide_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_about_slide`
--

INSERT INTO `tb_about_slide` (`about_slide_id`, `about_slide_header`, `about_slide_header_detail`, `about_slide_description`, `about_slide_image`, `about_slide_show`) VALUES
(1, 'ขนม', 'เจริญภัณฑ์เบเกอรี่', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_auditory`
--

CREATE TABLE `tb_auditory` (
  `auditory_id` int(11) NOT NULL,
  `auditory_name` varchar(100) DEFAULT NULL,
  `auditory_price` int(11) DEFAULT NULL,
  `auditory_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bakery`
--

CREATE TABLE `tb_bakery` (
  `bakery_id` int(11) NOT NULL,
  `bakery_type_id` int(11) DEFAULT NULL,
  `bakery_name` varchar(100) DEFAULT NULL,
  `bakery_detail` text,
  `bakery_price` varchar(100) DEFAULT NULL,
  `bakery_image` varchar(200) DEFAULT NULL,
  `bakery_like` int(11) DEFAULT NULL,
  `bakery_suggest` int(11) DEFAULT NULL,
  `bakery_show` int(11) DEFAULT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bakery`
--

INSERT INTO `tb_bakery` (`bakery_id`, `bakery_type_id`, `bakery_name`, `bakery_detail`, `bakery_price`, `bakery_image`, `bakery_like`, `bakery_suggest`, `bakery_show`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 1, 'ขนมปังสังขยานมสด', 'Baked goods have been around for thousands of years.', '20', '25072018110236-11845613.jpg', NULL, 1, 1, 1, '2018-07-25 11:02:37', 1, '2018-07-26 09:57:09'),
(2, 2, 'เค้กฝอยทอง', 'Baked goods have been around for thousands of years.', '20', '25072018112227-6784651.jpg', NULL, NULL, 1, 1, '2018-07-25 11:22:27', 0, '0000-00-00 00:00:00'),
(3, 3, 'พายไก่', 'Baked goods have been around for thousands of years.', '20', '25072018112306-46513.jpg', NULL, 1, 1, 1, '2018-07-25 11:23:06', 0, '0000-00-00 00:00:00'),
(4, 1, 'บัตเตอร์', 'Baked goods have been around for thousands of years.', '20', '25072018112820-94561.jpg', NULL, NULL, 1, 1, '2018-07-25 11:28:14', 1, '2018-07-25 11:28:20'),
(5, 2, 'อัลมอนด์', 'Baked goods have been around for thousands of years.', '20', '25072018112910-496511.jpg', NULL, NULL, 1, 1, '2018-07-25 11:29:10', 0, '0000-00-00 00:00:00'),
(7, 1, 'กระต่าย', 'Baked goods have been around for thousands of years.', '20', '26072018094039-4651.jpg', NULL, 1, 1, 1, '2018-07-26 09:40:39', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bakery_image`
--

CREATE TABLE `tb_bakery_image` (
  `bakery_image_id` int(11) NOT NULL,
  `bakery_id` int(11) NOT NULL,
  `bakery_image_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bakery_image`
--

INSERT INTO `tb_bakery_image` (`bakery_image_id`, `bakery_id`, `bakery_image_image`) VALUES
(1, 7, '31072018171655-10553367_907234099303323_992191704090783247_n.jpg'),
(2, 7, '01082018092922-13237583_1738770313071021_7297286578294395649_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bakery_type`
--

CREATE TABLE `tb_bakery_type` (
  `bakery_type_id` int(11) NOT NULL,
  `bakery_type_name` varchar(100) DEFAULT NULL,
  `bakery_type_image` varchar(200) DEFAULT NULL,
  `bakery_type_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bakery_type`
--

INSERT INTO `tb_bakery_type` (`bakery_type_id`, `bakery_type_name`, `bakery_type_image`, `bakery_type_show`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 'ขนมปัง', '25072018095013-avb16056-kerry-testimonials-bakery.png', 1, 1, '2018-07-25 09:50:13', 0, '0000-00-00 00:00:00'),
(2, 'เค้ก', '25072018095144-cake_png13126.png', 1, 1, '2018-07-25 09:51:45', 0, '0000-00-00 00:00:00'),
(3, 'พาย', '25072018095646-images.jpg', 1, 1, '2018-07-25 09:53:59', 1, '2018-07-25 09:56:46'),
(4, 'เค้กโรล', '25072018095747-img_3714.jpg', 1, 1, '2018-07-25 09:57:47', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_branch`
--

CREATE TABLE `tb_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(150) DEFAULT NULL,
  `branch_detail` text NOT NULL,
  `branch_phone` varchar(20) DEFAULT NULL,
  `branch_email` varchar(100) DEFAULT NULL,
  `branch_facebook` varchar(100) DEFAULT NULL,
  `branch_line` varchar(100) NOT NULL,
  `branch_address` varchar(200) DEFAULT NULL,
  `branch_district` varchar(100) DEFAULT NULL,
  `branch_amphur` varchar(100) DEFAULT NULL,
  `branch_province` varchar(100) DEFAULT NULL,
  `branch_zipcode` varchar(20) DEFAULT NULL,
  `branch_image` varchar(200) DEFAULT NULL,
  `branch_location_lat` varchar(200) DEFAULT NULL,
  `branch_location_long` varchar(200) NOT NULL,
  `branch_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_branch`
--

INSERT INTO `tb_branch` (`branch_id`, `branch_name`, `branch_detail`, `branch_phone`, `branch_email`, `branch_facebook`, `branch_line`, `branch_address`, `branch_district`, `branch_amphur`, `branch_province`, `branch_zipcode`, `branch_image`, `branch_location_lat`, `branch_location_long`, `branch_show`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 'สาขา มหาดไทย', '', '044 255 767', 'nookhawaii@gmail.com', 'www.facebook.com', 'LINE', '143 ถนนมหาดไทย', 'ในเมือง', 'เมืองเทศบาลนครราชสีมา', 'นครราชสีมา', '30000', '23072018115241-d6439786cd424dbeb5fdb13ba95ddd5e.jpg', '14.973483769647292', '102.1026744215153', 1, 1, '2018-07-23 11:10:59', 1, '2018-07-23 11:52:41'),
(2, 'สาขา หัวรถไฟ', '', '044 243 147', '', 'https://www.facebook.com/jpbakery1983/', '', '24/8 ถนน มุขมนตรี', 'ในเมือง', 'เมืองนครราชสีมา', 'นครราชสีมา', '30000', '23072018114057-d6439786cd424dbeb5fdb13ba95ddd5e.jpg', '14.973291787400873', '102.08053839236152', 1, 1, '2018-07-23 11:40:58', 0, '0000-00-00 00:00:00'),
(3, 'สาขา จอหอ', '', '044 203 990', '', 'https://www.facebook.com/pg/jpbakery1983', '', '167 ม.4 ถนนโยธาธิการ', 'จอหอ', 'เมืองนครราชสีมา', 'นครราชสีมา', '30310', '23072018114827-d6439786cd424dbeb5fdb13ba95ddd5e.jpg', '15.04148490437572', '102.15292455551116', 1, 1, '2018-07-23 11:48:27', 0, '0000-00-00 00:00:00'),
(4, 'สาขา คลังพลาซ่า', '', '', '', '', '', 'คลังพลาซ่าจอมสุรางค์', 'ในเมือง', 'เมืองนครราชสีมา', 'นครราชสีมา', '30000', '23072018115421-d6439786cd424dbeb5fdb13ba95ddd5e.jpg', '14.9731963', '102.0973229', 1, 1, '2018-07-23 11:54:21', 0, '0000-00-00 00:00:00'),
(5, 'สาขา เดอะมอลล์นครราชสีมา', '', '', 'nookhawaii@gmail.com', 'https://www.facebook.com/jpbakery1983/', 'LINE', 'ชั้น 1 เดอะมอลล์ Food Hall  ถนนมิตรภาพ', 'ในเมือง', 'เมืองนครราชสีมา', 'นครราชสีมา', '30000', '23072018115630-d6439786cd424dbeb5fdb13ba95ddd5e.jpg', '14.9807305', '102.07641060000003', 1, 1, '2018-07-23 11:56:23', 1, '2018-07-23 11:56:30'),
(6, 'สาขา หน้ามหาวิทยาลัยราชภัฏนครราชสีมา', '', '044 272 273', 'nookhawaii@gmail.com', 'https://www.facebook.com/jpbakery1983/', 'LINE', 'หน้ามหาวิทยาลัยราชภัฏนครราชสีมา', 'ในเมือง', 'เมืองนครราชสีมา', 'นครราชสีมา', '30000', '23072018115759-d6439786cd424dbeb5fdb13ba95ddd5e.jpg', '14.984877', '102.11325099999999', 1, 1, '2018-07-23 11:57:52', 1, '2018-07-23 11:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `contact_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `contact_firstname` varchar(100) DEFAULT NULL,
  `contact_lastname` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `contact_email` varchar(200) DEFAULT NULL,
  `contact_message` varchar(300) DEFAULT NULL,
  `contact_see` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`contact_id`, `branch_id`, `contact_firstname`, `contact_lastname`, `contact_phone`, `contact_email`, `contact_message`, `contact_see`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(3, 1, 'Jirawat', 'Dumpho', '0901906559', NULL, 'HHHHHHHHHHHHHHHHHHHHH', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 1, 'Jirawat', 'Dumpho', '0901906559', NULL, 'HHHHHHHHHHHHHHHHHHHHH', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 1, 'Jirawat', 'Dumpho', '0901906559', NULL, 'HHHHHHHHHHHHHHHHHHHHH', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_tag` varchar(200) NOT NULL,
  `event_description` text NOT NULL,
  `event_detail` text NOT NULL,
  `event_date_begin` datetime NOT NULL,
  `event_date_end` datetime NOT NULL,
  `event_image_1` varchar(200) NOT NULL,
  `event_image_2` varchar(200) NOT NULL,
  `event_image_3` varchar(200) NOT NULL,
  `event_image_4` varchar(200) NOT NULL,
  `event_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`event_id`, `event_title`, `event_tag`, `event_description`, `event_detail`, `event_date_begin`, `event_date_end`, `event_image_1`, `event_image_2`, `event_image_3`, `event_image_4`, `event_show`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 'TOPICS', 'event', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', '2018-07-28 00:00:00', '2018-07-28 00:00:00', '03082018152320-39238572-bakery-wallpapers.jpg', '03082018152320-avb16056-kerry-testimonials-bakery.png', '03082018152320-4558312a63e47f1.jpg', '03082018152320-bakery-making-business.jpg', 1, 1, '2018-07-31 16:10:42', 1, '2018-08-03 15:23:21'),
(2, 'TOPICS', 'event', 'event', 'event', '2018-08-01 00:00:00', '2018-07-28 00:00:00', '03082018152350-4.jpg', '03082018152350-4 (1).jpg', '03082018152350-4558312a63e47f1.jpg', '03082018152350-making-bakery-in-the-kitchen_1101-153.jpg', 1, 1, '2018-07-31 17:01:00', 1, '2018-08-03 15:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_image`
--

CREATE TABLE `tb_event_image` (
  `event_image_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_image_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_food`
--

CREATE TABLE `tb_food` (
  `food_id` int(11) NOT NULL,
  `food_type_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_detail` text NOT NULL,
  `food_price` varchar(100) NOT NULL,
  `food_image` varchar(200) NOT NULL,
  `food_like` int(11) NOT NULL,
  `food_suggest` int(11) NOT NULL,
  `food_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_food`
--

INSERT INTO `tb_food` (`food_id`, `food_type_id`, `food_name`, `food_detail`, `food_price`, `food_image`, `food_like`, `food_suggest`, `food_show`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 1, 'ผัดเต้าหู้', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', '100', '03082018152134-making-bakery-in-the-kitchen_1101-153.jpg', 0, 1, 1, 1, '2018-08-01 10:22:26', 1, '2018-08-03 15:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_food_image`
--

CREATE TABLE `tb_food_image` (
  `food_image_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_image_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_food_type`
--

CREATE TABLE `tb_food_type` (
  `food_type_id` int(11) NOT NULL,
  `food_type_name` varchar(100) NOT NULL,
  `food_type_image` varchar(200) NOT NULL,
  `food_type_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_food_type`
--

INSERT INTO `tb_food_type` (`food_type_id`, `food_type_name`, `food_type_image`, `food_type_show`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 'ต้ม', '01082018101544-13237583_1738770313071021_7297286578294395649_n.jpg', 1, 1, '2018-08-01 10:15:44', 0, '0000-00-00 00:00:00'),
(5, 'ผัด', '', 1, 1, '2018-08-01 10:21:16', 0, '0000-00-00 00:00:00'),
(6, 'ทอด', '', 1, 1, '2018-08-01 10:21:52', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_meeting_room`
--

CREATE TABLE `tb_meeting_room` (
  `meeting_room_id` int(11) NOT NULL,
  `meeting_room_title` varchar(100) NOT NULL,
  `meeting_room_description_1` text NOT NULL,
  `meeting_room_description_2` text NOT NULL,
  `meeting_room_image_1` varchar(200) NOT NULL,
  `meeting_room_image_2` varchar(200) NOT NULL,
  `meeting_room_image_3` varchar(200) NOT NULL,
  `meeting_room_image_4` varchar(200) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_meeting_room`
--

INSERT INTO `tb_meeting_room` (`meeting_room_id`, `meeting_room_title`, `meeting_room_description_1`, `meeting_room_description_2`, `meeting_room_image_1`, `meeting_room_image_2`, `meeting_room_image_3`, `meeting_room_image_4`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 'TOPIC', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', '03082018152601-4 (1).jpg', '03082018151453-bakery-making-business.jpg', '03082018151453-39238572-bakery-wallpapers.jpg', '03082018151453-avb16056-kerry-testimonials-bakery.png', 1, '2018-07-31 22:17:43', 1, '2018-08-03 15:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_tag` varchar(200) NOT NULL,
  `news_description` varchar(500) NOT NULL,
  `news_detail` text NOT NULL,
  `news_date` datetime NOT NULL,
  `news_image_1` varchar(200) NOT NULL,
  `news_image_2` varchar(200) NOT NULL,
  `news_image_3` varchar(200) NOT NULL,
  `news_image_4` varchar(200) NOT NULL,
  `news_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`news_id`, `news_title`, `news_tag`, `news_description`, `news_detail`, `news_date`, `news_image_1`, `news_image_2`, `news_image_3`, `news_image_4`, `news_show`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(3, 'TOPICS', 'news', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', '2018-07-25 00:00:00', '03082018152418-4.jpg', '03082018152418-4 (1).jpg', '26072018170608-13139231_1732443557037030_3525324265288656824_n.jpg', '03082018152418-avb16056-kerry-testimonials-bakery.png', 1, 1, '2018-07-26 17:06:08', 1, '2018-08-03 15:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news_image`
--

CREATE TABLE `tb_news_image` (
  `news_image_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `news_image_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_page`
--

CREATE TABLE `tb_page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(45) DEFAULT NULL,
  `page_header_image` varchar(200) DEFAULT NULL,
  `page_image_1` varchar(200) DEFAULT NULL,
  `page_image_2` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion`
--

CREATE TABLE `tb_promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_name` varchar(100) DEFAULT NULL,
  `promotion_description` varchar(500) DEFAULT NULL,
  `promotion_begin` date NOT NULL,
  `promotion_end` date NOT NULL,
  `promotion_show` int(11) NOT NULL,
  `promotion_image_1` varchar(200) DEFAULT NULL,
  `promotion_image_2` varchar(200) DEFAULT NULL,
  `promotion_image_3` varchar(200) DEFAULT NULL,
  `promotion_image_4` varchar(200) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promotion`
--

INSERT INTO `tb_promotion` (`promotion_id`, `promotion_name`, `promotion_description`, `promotion_begin`, `promotion_end`, `promotion_show`, `promotion_image_1`, `promotion_image_2`, `promotion_image_3`, `promotion_image_4`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 'ข้อเสนอพิเศษ', 'Baked goods have been around for thousands of years. The art of baking was developed early during the Roman Empire. It was a highly famous art as Roman citizens loved baked goods and demanded for them frequently for important occasions such as feasts and weddings etc. Due to the fame and desire that the art of baking received, around 300 BC', '2018-07-26', '2018-09-20', 1, '', '', '', '', 1, '2018-07-31 17:25:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion_image`
--

CREATE TABLE `tb_promotion_image` (
  `promotion_image_id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `promotion_image_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_title` varchar(100) DEFAULT NULL,
  `setting_logo` varchar(200) DEFAULT NULL,
  `setting_icon` varchar(200) DEFAULT NULL,
  `setting_tag` varchar(200) DEFAULT NULL,
  `setting_description` varchar(500) NOT NULL,
  `setting_phone` varchar(20) DEFAULT NULL,
  `setting_email` varchar(100) DEFAULT NULL,
  `setting_facebook` varchar(100) DEFAULT NULL,
  `setting_line` varchar(100) DEFAULT NULL,
  `setting_location` varchar(200) DEFAULT NULL,
  `setting_address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`setting_id`, `setting_title`, `setting_logo`, `setting_icon`, `setting_tag`, `setting_description`, `setting_phone`, `setting_email`, `setting_facebook`, `setting_line`, `setting_location`, `setting_address`) VALUES
(1, 'เจริญภัณฑ์เบเกอรี่', '', '', 'เจริญภัณฑ์เบเกอรี่,เบเกอรี่,เบเกอร์รี่,โคราช,ขนมหวาน,ขนมกล่อง,ขนมปัง,ขนมเบรค,ขนมกล่องโคราช', '', '044 255 767', '', 'https://www.facebook.com/jpbakery1983/', '', '1897465498465978465498465', '143 ถนนมหาดไทย ต.ในเมือง อ.เมือง เทศบาลนครนครราชสีมา');

-- --------------------------------------------------------

--
-- Table structure for table `tb_snack`
--

CREATE TABLE `tb_snack` (
  `snack_id` int(11) NOT NULL,
  `snack_type_id` int(11) NOT NULL,
  `snack_name` varchar(100) NOT NULL,
  `snack_detail` text NOT NULL,
  `snack_price` varchar(100) NOT NULL,
  `snack_image` varchar(200) NOT NULL,
  `snack_like` int(11) NOT NULL,
  `snack_suggest` int(11) NOT NULL,
  `snack_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_snack_image`
--

CREATE TABLE `tb_snack_image` (
  `snack_image_id` int(11) NOT NULL,
  `snack_id` int(11) NOT NULL,
  `snack_image_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_snack_type`
--

CREATE TABLE `tb_snack_type` (
  `snack_type_id` int(11) NOT NULL,
  `snack_type_name` varchar(100) NOT NULL,
  `snack_type_image` varchar(200) NOT NULL,
  `snack_type_show` int(11) NOT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_status_id` int(11) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_firstname` varchar(45) DEFAULT NULL,
  `user_lastname` varchar(45) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_facebook` varchar(200) NOT NULL,
  `user_line` varchar(100) NOT NULL,
  `user_username` varchar(45) DEFAULT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `user_district` varchar(100) DEFAULT NULL,
  `user_amphur` varchar(100) DEFAULT NULL,
  `user_province` varchar(100) DEFAULT NULL,
  `user_zipcode` varchar(20) DEFAULT NULL,
  `user_image` varchar(200) DEFAULT NULL,
  `addby` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `lastupdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_status_id`, `user_type_id`, `user_firstname`, `user_lastname`, `user_phone`, `user_email`, `user_facebook`, `user_line`, `user_username`, `user_password`, `user_address`, `user_district`, `user_amphur`, `user_province`, `user_zipcode`, `user_image`, `addby`, `adddate`, `updateby`, `lastupdate`) VALUES
(1, 1, 1, 'Jirawat', 'Dumpho', '0875553269', 'admin@gmail.com', 'FACEBOOK URL', 'LINE ID update', 'admin', '123456', 'Example : 271/55.', 'จอหอ', 'เมืองนครราชสีมา', 'นครราชสีมา', '30310', '23072018110247-mqdefault.jpg', 1, '0000-00-00 00:00:00', 1, '2018-07-23 14:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_status`
--

CREATE TABLE `tb_user_status` (
  `user_status_id` int(11) NOT NULL,
  `user_status_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_status`
--

INSERT INTO `tb_user_status` (`user_status_id`, `user_status_name`) VALUES
(1, 'ทำงาน'),
(2, 'ลาออก');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_type`
--

CREATE TABLE `tb_user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_type`
--

INSERT INTO `tb_user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'ผู้ดูเเล'),
(2, 'ผู้ใช้งาน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tb_about_slide`
--
ALTER TABLE `tb_about_slide`
  ADD PRIMARY KEY (`about_slide_id`);

--
-- Indexes for table `tb_auditory`
--
ALTER TABLE `tb_auditory`
  ADD PRIMARY KEY (`auditory_id`);

--
-- Indexes for table `tb_bakery`
--
ALTER TABLE `tb_bakery`
  ADD PRIMARY KEY (`bakery_id`);

--
-- Indexes for table `tb_bakery_image`
--
ALTER TABLE `tb_bakery_image`
  ADD PRIMARY KEY (`bakery_image_id`);

--
-- Indexes for table `tb_bakery_type`
--
ALTER TABLE `tb_bakery_type`
  ADD PRIMARY KEY (`bakery_type_id`);

--
-- Indexes for table `tb_branch`
--
ALTER TABLE `tb_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tb_event_image`
--
ALTER TABLE `tb_event_image`
  ADD PRIMARY KEY (`event_image_id`);

--
-- Indexes for table `tb_food`
--
ALTER TABLE `tb_food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `tb_food_image`
--
ALTER TABLE `tb_food_image`
  ADD PRIMARY KEY (`food_image_id`);

--
-- Indexes for table `tb_food_type`
--
ALTER TABLE `tb_food_type`
  ADD PRIMARY KEY (`food_type_id`);

--
-- Indexes for table `tb_meeting_room`
--
ALTER TABLE `tb_meeting_room`
  ADD PRIMARY KEY (`meeting_room_id`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tb_news_image`
--
ALTER TABLE `tb_news_image`
  ADD PRIMARY KEY (`news_image_id`);

--
-- Indexes for table `tb_page`
--
ALTER TABLE `tb_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `tb_promotion_image`
--
ALTER TABLE `tb_promotion_image`
  ADD PRIMARY KEY (`promotion_image_id`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tb_snack`
--
ALTER TABLE `tb_snack`
  ADD PRIMARY KEY (`snack_id`);

--
-- Indexes for table `tb_snack_image`
--
ALTER TABLE `tb_snack_image`
  ADD PRIMARY KEY (`snack_image_id`);

--
-- Indexes for table `tb_snack_type`
--
ALTER TABLE `tb_snack_type`
  ADD PRIMARY KEY (`snack_type_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_user_status`
--
ALTER TABLE `tb_user_status`
  ADD PRIMARY KEY (`user_status_id`);

--
-- Indexes for table `tb_user_type`
--
ALTER TABLE `tb_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_about_slide`
--
ALTER TABLE `tb_about_slide`
  MODIFY `about_slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_auditory`
--
ALTER TABLE `tb_auditory`
  MODIFY `auditory_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_bakery`
--
ALTER TABLE `tb_bakery`
  MODIFY `bakery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_bakery_image`
--
ALTER TABLE `tb_bakery_image`
  MODIFY `bakery_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_bakery_type`
--
ALTER TABLE `tb_bakery_type`
  MODIFY `bakery_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_branch`
--
ALTER TABLE `tb_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_event_image`
--
ALTER TABLE `tb_event_image`
  MODIFY `event_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_food`
--
ALTER TABLE `tb_food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_food_image`
--
ALTER TABLE `tb_food_image`
  MODIFY `food_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_food_type`
--
ALTER TABLE `tb_food_type`
  MODIFY `food_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_meeting_room`
--
ALTER TABLE `tb_meeting_room`
  MODIFY `meeting_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_news_image`
--
ALTER TABLE `tb_news_image`
  MODIFY `news_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_page`
--
ALTER TABLE `tb_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_promotion_image`
--
ALTER TABLE `tb_promotion_image`
  MODIFY `promotion_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_snack`
--
ALTER TABLE `tb_snack`
  MODIFY `snack_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_snack_image`
--
ALTER TABLE `tb_snack_image`
  MODIFY `snack_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_snack_type`
--
ALTER TABLE `tb_snack_type`
  MODIFY `snack_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user_status`
--
ALTER TABLE `tb_user_status`
  MODIFY `user_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user_type`
--
ALTER TABLE `tb_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
