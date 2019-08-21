-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2016 at 06:35 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `paultours`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_api`
--

CREATE TABLE IF NOT EXISTS `cms_api` (
  `api_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apikey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`api_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cms_api`
--

INSERT INTO `cms_api` (`api_id`, `name`, `apikey`, `updated`) VALUES
(1, 'reCAPTCHA', '6LfdDigTAAAAACGAuXtzdjCv11N-sw6TGeXo6Ovr', '2016-09-15 09:14:39'),
(2, 'googlemap', 'AIzaSyB3yNzerralCPAke1Kx9T1sAhQM1IMuVlk', '2016-09-15 09:12:11'),
(3, 'Google Analytics', 'UA-999888777', '2016-08-22 07:01:29'),
(4, 'Google Translate', 'AIzaSyBtdE5leBAmVt4oGbVzef6JBYWdxXxrCjI', '2016-09-22 14:20:08'),
(5, 'Disqus', 'codepaul-1', '2016-10-01 12:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `cms_article`
--

CREATE TABLE IF NOT EXISTS `cms_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `article_allow_subcontent` int(11) NOT NULL,
  `guid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_meta` text COLLATE utf8_unicode_ci NOT NULL,
  `article_description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `article_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_date` datetime NOT NULL,
  `article_view` int(11) NOT NULL,
  `article_comment` int(11) NOT NULL,
  `article_share` int(11) NOT NULL,
  `article_display_gallery` int(11) NOT NULL,
  `article_status` int(11) NOT NULL,
  `shortcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `featured` int(11) NOT NULL,
  `thumbnail` int(11) NOT NULL,
  `article_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `article_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_article`
--

INSERT INTO `cms_article` (`article_id`, `category_id`, `parent_id`, `article_allow_subcontent`, `guid`, `article_slug`, `article_title`, `article_meta`, `article_description`, `article_detail`, `user_id`, `member_id`, `article_date`, `article_view`, `article_comment`, `article_share`, `article_display_gallery`, `article_status`, `shortcode`, `featured`, `thumbnail`, `article_updated`, `article_entered`) VALUES
(1, 4, 0, 0, 'tours-inbound/chiangmai', 'lorem-ipsum-dolor-sit-amet-ut-cum-novum', 'Lorem ipsum dolor sit amet, ut cum novum', '', 'Lorem ipsum dolor sit amet, ut cum novum doctus, id aeque paulo dictas qui. Duo quodsi equidem democritum cu. Magna philosophia cum ex, verear numquam', '<p>Lorem ipsum dolor sit amet, ut cum novum doctus, id aeque paulo dictas qui. Duo quodsi equidem democritum cu. Magna philosophia cum ex, verear numquam denique eu nec. Ad simul insolens recusabo usu, mea ei porro assum nulla, sit cibo meliore ad. Rebum regione virtute mei id. No pri lorem graeco dissentias.<br><br>At quo purto philosophia. Cu numquam veritus mei. An sit tempor eruditi sententiae, quodsi utamur comprehensam nam ex. No cum tempor commune, eam ut percipit sententiae. Has option omittam iracundia ne, libris ullamcorper ut his.<br><br>Ut per quem volumus. Iuvaret vivendum scripserit ad sit. Et mel omnium tractatos torquatos, dolor clita viderer nec et. Nec ei legere impetus, an vis velit sanctus salutandi. Qui id latine inimicus. Duo ne quot noluisse perfecto, in ius tota philosophia delicatissimi, nemore praesent te sed. Mea no alia integre ceteros, ne erroribus forensibus eloquentiam eam.<br></p>', 1, 0, '2016-09-24 05:41:00', 15, 0, 0, 0, 1, '', 0, 19, '2016-10-01 23:12:36', '2016-09-23 17:42:55'),
(2, 1, 0, 0, 'tours-inbound', 'per-cu-reque-menandri-dicta-eleifend-intellegebat-ad-his', 'Per cu reque menandri, dicta eleifend intellegebat ad his', '', 'Per cu reque menandri, dicta eleifend intellegebat ad his, mel vitae dicam nusquam ne. Mel nostro maiorum cu. Pri tempor periculis ad, eam sapientem s', '<p>Per cu reque menandri, dicta eleifend intellegebat ad his, mel vitae dicam nusquam ne. Mel nostro maiorum cu. Pri tempor periculis ad, eam sapientem signiferumque an. Alii prima audire duo at.<br><br>Eu quaeque dissentiunt nec. Duis putant id est, ei debet ornatus eloquentiam sea, cum brute affert legere ad. Odio alterum an est. Ea reque indoctum partiendo eos. Recusabo quaerendum ne mel, mea modo primis fuisset eu, pri ei case qualisque.<br><br>Te sed graece iisque evertitur. Illum homero ex usu, stet verterem posidonium nam ad, ei pro tollit legendos. Natum petentium vix id, solum percipit patrioque vix an. Causae epicuri commune eos ex, vim laudem populo discere at. Ius eu alia dolores vituperatoribus. Vix habeo reque vituperatoribus eu.<br><br>Sit ne inani appetere posidonium. At vim partem mollis, ad choro exerci nam, mea nisl oporteat mandamus at. No rebum assueverit consectetuer mei, cu cibo equidem utroque sea. Ius stet quidam graeco in. Cum velit facete cu, ut vidisse molestiae pri, qui causae phaedrum vulputate ea.<br><br>Choro legendos sensibus ex usu. Cum vocent noluisse cu, iisque integre cu sit. Harum eleifend reprehendunt eos ut, dicam vocent adipiscing vix no. Ut vim liber invenire, tation lobortis praesent te vis. His iisque probatus repudiare ea, debitis deleniti percipitur cu per. Cum no quas doctus facilisi, duis oblique usu cu.<br><br>Nec an impetus impedit accusam. Vel te elitr ceteros. Eum et eros possit accommodare. Id corpora voluptua maluisset duo, ne nec nobis audiam commune. Modo complectitur ea qui.<br><br>Sea aeque voluptatum ut. Ad feugiat omnesque sit, est iusto vulputate consequuntur id, vitae maiorum nusquam qui ei. Qui sonet noluisse ponderum at, doming vivendum cu usu. Sint dolor omittantur cu mel. Oratio habemus dissentias ut quo.<br><br>Quo ea legendos tractatos, vim eripuit deleniti in. Cu habemus imperdiet quo. An facilisis salutatus vel. Cu mea dicit saperet vituperata, eius minim vel eu. No vitae labitur senserit vel, habeo alienum petentium per ut. Esse eloquentiam deterruisset ut pri, agam appareat iudicabit his in.<br><br>Adhuc iriure constituto ne sea, nec at iudico molestie reprimique. Nostro iuvaret mea no, cum alii aeterno inimicus no. Te mea numquam fabulas. Eam iuvaret fabellas eu. Reprimique reformidans contentiones at has, integre atomorum ex nam.<br><br>Quodsi alterum cu mei. Vis ex tempor atomorum. Ut vis detraxit theophrastus. Sed imperdiet quaerendum referrentur ex, eum inani eruditi vituperatoribus at.<br></p>', 1, 0, '2016-09-24 05:47:00', 59, 0, 0, 0, 1, '', 0, 18, '2016-10-01 23:07:38', '2016-09-23 17:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `cms_article_comment`
--

CREATE TABLE IF NOT EXISTS `cms_article_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_article_upload`
--

CREATE TABLE IF NOT EXISTS `cms_article_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(11) NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_banner`
--

CREATE TABLE IF NOT EXISTS `cms_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_displayorder` int(11) NOT NULL,
  `banner_on` datetime NOT NULL,
  `banner_off` datetime NOT NULL,
  `banner_status` int(11) NOT NULL,
  `banner_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banner_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_car`
--

CREATE TABLE IF NOT EXISTS `cms_car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `car_year` year(4) NOT NULL,
  `car_passenger_capacity` int(11) NOT NULL,
  `car_luggage_large_capacity` int(11) NOT NULL,
  `car_luggage_small_capacity` int(11) NOT NULL,
  `car_transmission` text COLLATE utf8_unicode_ci NOT NULL,
  `car_entertainment` text COLLATE utf8_unicode_ci NOT NULL,
  `car_brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `car_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `car_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `car_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_car`
--

INSERT INTO `cms_car` (`car_id`, `car_model`, `car_year`, `car_passenger_capacity`, `car_luggage_large_capacity`, `car_luggage_small_capacity`, `car_transmission`, `car_entertainment`, `car_brand`, `car_photo`, `car_updated`, `car_entered`) VALUES
(1, 'Camry Hybrid', 2016, 4, 3, 6, 'Auto', 'DVD', 'TOYOTA', '', '2016-11-13 07:23:17', '2016-11-13 00:53:34'),
(2, 'Altis', 2016, 4, 3, 6, 'Auto', 'DVD', 'TOYOTA', '', '2016-11-13 07:24:31', '2016-11-13 00:53:47'),
(3, 'Vios', 2016, 4, 3, 6, 'Auto', 'DVD', 'TOYOTA', '', '2016-11-13 07:24:52', '2016-11-13 00:53:54'),
(5, 'Avanza', 2016, 4, 3, 6, 'Auto', 'DVD', 'TOYOTA', '', '2016-11-13 07:25:57', '2016-11-13 00:54:24'),
(6, 'Yaris', 2016, 4, 3, 6, 'Auto', 'DVD', 'TOYOTA', 'uploads/car/00006.jpg', '2016-11-13 07:26:14', '2016-11-13 00:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `cms_cart`
--

CREATE TABLE IF NOT EXISTS `cms_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `item` text COLLATE utf8_unicode_ci NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `adults` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `cost` float(8,2) NOT NULL,
  `tax` float(8,2) NOT NULL,
  `total` float(8,2) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- Dumping data for table `cms_cart`
--

INSERT INTO `cms_cart` (`cart_id`, `session_id`, `product_id`, `item`, `checkin`, `checkin_time`, `adults`, `child`, `cost`, `tax`, `total`, `currency`, `updated`, `entered`) VALUES
(5, 'fcI0ZbTUjv1klqX', 1, 'Phuket 5 days 4 nights/The charm (Twin or triple charring) ', '2016-11-23', '00:00:00', 2, 0, 3600.00, 360.00, 3960.00, 'THB', '2016-11-05 15:27:24', '2016-11-05 09:27:24'),
(6, 'fcI0ZbTUjv1klqX', 1, 'Phuket 5 days 4 nights/The charm (Twin or triple charring) ', '2016-11-16', '00:00:00', 2, 0, 3600.00, 360.00, 3960.00, 'THB', '2016-11-05 15:50:33', '2016-11-05 09:50:33'),
(7, 'Fcuu8fPefBf44Zo', 0, ' Phi Phi Islands + Bamboo Island by Speedboat', '2016-11-29', '00:00:00', 3, 2, 4950.00, 495.00, 5445.00, 'THB', '2016-11-28 15:31:32', '2016-11-28 15:31:32'),
(9, 'ochKvNKtTs76PY7', 0, ' Phi Phi Islands + Bamboo Island by Speedboat', '2016-12-16', '00:00:00', 7, 2, 9150.00, 915.00, 10065.00, 'THB', '2016-12-01 05:41:01', '2016-12-01 05:41:01'),
(14, 'BeK1kMYT4d6wzpu', 0, ' Phi Phi Islands + Bamboo Island by Speedboat', '2016-12-20', '00:00:00', 6, 2, 8100.00, 810.00, 8910.00, 'THB', '2016-12-08 05:04:53', '2016-12-08 05:04:53'),
(15, 'BKUGQb4tP3RG3', 0, ' Phi Phi Islands + Bamboo Island by Speedboat', '2016-12-21', '00:00:00', 6, 2, 8100.00, 810.00, 8910.00, 'THB', '2016-12-09 00:44:07', '2016-12-09 00:44:07'),
(17, 'BKUGQb4tP3RG3', 0, ' oneway Altis Area 1 - Area 2', '2016-12-08', '08:00:00', 4, 0, 0.00, 0.00, 0.00, 'THB', '2016-12-09 00:49:23', '2016-12-09 00:49:23'),
(18, 'KFeLmCVQLJ2FvAv', 0, ' Phi Phi Islands + Bamboo Island by Speedboat', '2016-12-15', '00:00:00', 4, 3, 6900.00, 690.00, 7590.00, 'THB', '2016-12-13 10:34:32', '2016-12-13 10:34:32'),
(19, 'znw4HHPrdVt5TMm', 0, ' oneway Camry Hybrid Area 1 - Area 3', '2016-12-13', '05:15:00', 4, 0, 1300.00, 130.00, 1430.00, 'THB', '2016-12-13 22:12:07', '2016-12-13 22:12:07'),
(20, 'WiTe5b5USM7iA8e', 0, 'At sed inermis perpetua, eos viris ridens tibique', '2016-12-22', '00:00:00', 3, 1, 3000.00, 300.00, 3300.00, 'THB', '2016-12-15 11:16:27', '2016-12-15 11:16:27'),
(21, '5vUoaFvon4GYRGH', 0, ' roundtrip Altis Area 1 - Area 10', '2016-12-16', '19:15:00', 4, 0, 588.00, 58.80, 646.80, 'THB', '2016-12-16 12:06:46', '2016-12-16 12:06:46'),
(22, '5vUoaFvon4GYRGH', 0, ' oneway Altis Area 5 - Area 7', '2016-12-16', '19:30:00', 4, 0, 888.00, 88.80, 976.80, 'THB', '2016-12-16 12:27:51', '2016-12-16 12:27:51'),
(23, '5vUoaFvon4GYRGH', 0, 'Eam vocent vulputate persequeris ut', '2016-12-28', '00:00:00', 4, 0, 12000.00, 1200.00, 13200.00, 'THB', '2016-12-16 13:07:08', '2016-12-16 13:07:08'),
(24, 'beAsxNYC4uLmr1L', 0, 'Coral Island Tour - Full Day ', '2017-05-29', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-19 19:09:10', '2016-12-19 19:09:10'),
(25, 'GdZhw2fMnacbqq', 0, 'Coral Island Tour - Full Day ', '2016-12-26', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-19 19:21:00', '2016-12-19 19:21:00'),
(26, '5A3zpF0EwT3Srfr', 0, 'Coral Island Tour - Haftday', '2016-12-26', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-19 19:39:56', '2016-12-19 19:39:56'),
(27, 'G2Gwx5jRmXsA87a', 0, 'Elephant Trekking', '2016-12-21', '00:00:00', 1, 2, 2300.00, 230.00, 2530.00, 'THB', '2016-12-19 20:36:24', '2016-12-19 20:36:24'),
(28, 'MepFX4UJwgkpNO', 0, 'Siam Niramit Show', '2016-12-22', '00:00:00', 3, 4, 10500.00, 1050.00, 11550.00, 'THB', '2016-12-19 20:41:54', '2016-12-19 20:41:54'),
(29, 'Zn8hZ1Aivfn5ehA', 0, 'Coral Island Tour - Full Day ', '2016-12-22', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-19 21:00:23', '2016-12-19 21:00:23'),
(30, 'xwBVqHjgWPygiGB', 0, 'Coral Island Tour - Haftday', '2017-04-07', '00:00:00', 5, 3, 7000.00, 700.00, 7700.00, 'THB', '2016-12-19 21:01:59', '2016-12-19 21:01:59'),
(31, 'xwBVqHjgWPygiGB', 0, 'Simon Cabaret Phuket', '2017-03-15', '00:00:00', 8, 0, 8000.00, 800.00, 8800.00, 'THB', '2016-12-19 21:06:29', '2016-12-19 21:06:29'),
(32, 'w3jWMltX8hMrTJ5', 0, 'Volunteer Guide Tours', '2016-12-28', '00:00:00', 1, 0, 12000.00, 1200.00, 13200.00, 'THB', '2016-12-19 21:08:33', '2016-12-19 21:08:33'),
(33, 'YOzk6gXE94J3Nn', 0, 'Siam Niramit Show', '2016-12-21', '00:00:00', 3, 0, 4500.00, 450.00, 4950.00, 'THB', '2016-12-19 21:17:23', '2016-12-19 21:17:23'),
(34, 'V3LakGBaKYmhXJ', 0, 'Coral Island Tour - Haftday', '2016-12-20', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-19 21:36:38', '2016-12-19 21:36:38'),
(35, 'ovnQw3EmmgUuhvH', 0, 'Coral Island Tour - Haftday', '2016-12-21', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-19 22:41:39', '2016-12-19 22:41:39'),
(36, 'ZTjSzmoi9WwbVl', 0, 'Coral Island Tour - Full Day ', '2016-12-21', '00:00:00', 6, 3, 8700.00, 870.00, 9570.00, 'THB', '2016-12-19 22:56:52', '2016-12-19 22:56:52'),
(37, 'ITSo8pl5ijbLe71', 0, 'Coral Island Tour - Haftday', '2016-12-26', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-19 23:09:31', '2016-12-19 23:09:31'),
(38, 'qaZVK90r0qk82w', 0, 'Eam vocent vulputate persequeris ut', '2016-12-21', '00:00:00', 1, 0, 3000.00, 300.00, 3300.00, 'THB', '2016-12-19 23:22:46', '2016-12-19 23:22:46'),
(40, 'XiX0rvGQUo3sJR', 0, 'Coral Island Tour - Full Day ', '2016-12-21', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 02:09:03', '2016-12-20 02:09:03'),
(41, 'OwHXl5sVHgZ2hVf', 0, 'Coral Island Tour - Haftday', '2016-12-27', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 02:09:27', '2016-12-20 02:09:27'),
(42, '2ESzkg2BjUD7exl', 0, 'Siam Niramit Show', '2016-12-29', '00:00:00', 1, 0, 1500.00, 150.00, 1650.00, 'THB', '2016-12-20 02:17:00', '2016-12-20 02:17:00'),
(43, 'oH6QjQekU5a0VNr', 0, 'Phuket FantaSea Show', '2016-12-21', '00:00:00', 1, 0, 2000.00, 200.00, 2200.00, 'THB', '2016-12-20 03:30:12', '2016-12-20 03:30:12'),
(44, 'DJgoVB5r0XJf8Do', 0, 'Coral Island Tour - Haftday', '2016-12-21', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 04:02:57', '2016-12-20 04:02:57'),
(45, 'ZP2RRHUhzg4qLQ5', 0, 'Coral Island Tour - Full Day ', '2016-12-22', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 04:09:11', '2016-12-20 04:09:11'),
(46, 'tctmwAzwJ7TVxO9', 0, 'Coral Island Tour - Full Day ', '2016-12-21', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 05:30:32', '2016-12-20 05:30:32'),
(47, 'NwSsbJqvGPxCGZs', 0, 'Coral Island Tour - Haftday', '2016-12-28', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 06:34:52', '2016-12-20 06:34:52'),
(48, 'y41XzzDDifqOGJH', 0, 'Volunteer Guide Tours', '2016-12-28', '00:00:00', 1, 0, 12000.00, 1200.00, 13200.00, 'THB', '2016-12-20 06:35:33', '2016-12-20 06:35:33'),
(49, 'xhtbiUOJO42xJxN', 0, 'Coral Island Tour - Full Day ', '2016-12-22', '00:00:00', 7, 4, 10550.00, 1055.00, 11605.00, 'THB', '2016-12-20 07:10:22', '2016-12-20 07:10:22'),
(50, 'iHARF5oHN0dHqhV', 0, 'Coral Island Tour - Haftday', '2016-12-26', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 07:21:22', '2016-12-20 07:21:22'),
(51, '0uA34aoDzh8zV6B', 0, 'Coral Island Tour - Haftday', '2016-12-24', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 07:41:48', '2016-12-20 07:41:48'),
(52, 'J20GcThyxRhMKdK', 0, 'Coral Island Tour - Haftday', '2016-12-21', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 07:45:51', '2016-12-20 07:45:51'),
(54, 'sEKXhIl14wAJIFu', 0, 'Coral Island Tour - Haftday', '2016-12-21', '00:00:00', 1, 5, 4700.00, 470.00, 5170.00, 'THB', '2016-12-20 08:22:14', '2016-12-20 08:22:14'),
(55, 'oErBCcwEk2UASHZ', 0, 'Coral Island Tour - Full Day ', '2016-12-21', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 08:22:54', '2016-12-20 08:22:54'),
(56, '3IBchY4l2YgICS', 0, 'Coral Island Tour - Full Day ', '2016-12-28', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 08:44:21', '2016-12-20 08:44:21'),
(58, 'Kq7PA1wXVeZ8eNr', 0, 'Coral Island Tour - Full Day ', '2016-12-22', '00:00:00', 7, 3, 9750.00, 975.00, 10725.00, 'THB', '2016-12-20 09:15:15', '2016-12-20 09:15:15'),
(59, 'vG23JaHZQfV7zvL', 0, 'Elephant Trekking', '2016-12-28', '00:00:00', 1, 0, 900.00, 90.00, 990.00, 'THB', '2016-12-20 09:26:26', '2016-12-20 09:26:26'),
(60, 'sZucHenzWGysfH9', 0, 'Coral Island Tour - Haftday', '2016-12-26', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 09:27:58', '2016-12-20 09:27:58'),
(62, 'GMBhKUsXksNrXG3', 0, 'Coral Island Tour - Full Day ', '2016-12-31', '00:00:00', 2, 0, 2100.00, 210.00, 2310.00, 'THB', '2016-12-20 09:55:06', '2016-12-20 09:55:06'),
(63, 'UTffeC1uJ1IQU', 0, 'Eam vocent vulputate persequeris ut', '2016-12-28', '00:00:00', 2, 0, 0.00, 0.00, 0.00, 'THB', '2016-12-20 10:12:24', '2016-12-20 10:12:24'),
(64, '9dxzdT7pe7QH4v', 0, 'Coral Island Tour - Haftday', '2016-12-27', '00:00:00', 1, 0, 950.00, 95.00, 1045.00, 'THB', '2016-12-20 10:26:36', '2016-12-20 10:26:36'),
(66, '3IBchY4l2YgICS', 0, 'Coral Island Tour - Full Day ', '2016-12-21', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 10:30:52', '2016-12-20 10:30:52'),
(67, 'jMoSedvXDoUmBa7', 0, 'Coral Island Tour - Full Day ', '2016-12-21', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 10:32:01', '2016-12-20 10:32:01'),
(68, 'xeL5322GBP2bN7', 0, 'Coral Island Tour - Full Day ', '2016-12-21', '00:00:00', 1, 0, 1050.00, 105.00, 1155.00, 'THB', '2016-12-20 11:28:09', '2016-12-20 11:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `cms_car_pricelist`
--

CREATE TABLE IF NOT EXISTS `cms_car_pricelist` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` int(11) NOT NULL,
  `area_id_1` int(11) NOT NULL,
  `area_id_2` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=506 ;

--
-- Dumping data for table `cms_car_pricelist`
--

INSERT INTO `cms_car_pricelist` (`price_id`, `destination_id`, `area_id_1`, `area_id_2`, `car_id`, `price`, `currency`, `updated`, `entered`) VALUES
(56, 2, 2, 4, 1, 1200, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(57, 2, 4, 2, 1, 1200, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(58, 2, 2, 5, 1, 1300, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(59, 2, 5, 2, 1, 1300, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(60, 2, 2, 6, 1, 1400, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(61, 2, 6, 2, 1, 1400, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(62, 2, 2, 7, 1, 1500, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(63, 2, 7, 2, 1, 1500, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(64, 2, 2, 8, 1, 1600, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(65, 2, 8, 2, 1, 1600, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(66, 2, 2, 9, 1, 1700, 'THB', '2016-11-14 23:06:42', '2016-11-14 17:06:42'),
(67, 2, 9, 2, 1, 1700, 'THB', '2016-11-14 23:06:43', '2016-11-14 17:06:42'),
(68, 2, 2, 10, 1, 1800, 'THB', '2016-11-14 23:06:43', '2016-11-14 17:06:43'),
(69, 2, 10, 2, 1, 1800, 'THB', '2016-11-14 23:06:43', '2016-11-14 17:06:43'),
(70, 2, 2, 11, 1, 1900, 'THB', '2016-11-14 23:06:43', '2016-11-14 17:06:43'),
(71, 2, 11, 2, 1, 1900, 'THB', '2016-11-14 23:06:43', '2016-11-14 17:06:43'),
(72, 2, 2, 12, 1, 2000, 'THB', '2016-11-14 23:06:43', '2016-11-14 17:06:43'),
(73, 2, 12, 2, 1, 2000, 'THB', '2016-11-14 23:06:43', '2016-11-14 17:06:43'),
(74, 2, 2, 4, 2, 810, 'THB', '2016-12-16 12:06:32', '2016-11-14 17:06:43'),
(75, 2, 4, 2, 2, 810, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:43'),
(76, 2, 2, 5, 2, 820, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:43'),
(77, 2, 5, 2, 2, 820, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:43'),
(78, 2, 2, 6, 2, 830, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:43'),
(79, 2, 6, 2, 2, 830, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:43'),
(80, 2, 2, 7, 2, 999, 'THB', '2016-12-16 12:02:05', '2016-11-14 17:06:43'),
(81, 2, 7, 2, 2, 999, 'THB', '2016-12-16 12:02:05', '2016-11-14 17:06:43'),
(82, 2, 2, 8, 2, 835, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:43'),
(83, 2, 8, 2, 2, 835, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:43'),
(84, 2, 2, 9, 2, 803, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(85, 2, 9, 2, 2, 803, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(86, 2, 2, 10, 2, 890, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(87, 2, 10, 2, 2, 890, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(88, 2, 2, 11, 2, 821, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(89, 2, 11, 2, 2, 821, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(90, 2, 2, 12, 2, 294, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(91, 2, 12, 2, 2, 294, 'THB', '2016-12-16 12:06:33', '2016-11-14 17:06:44'),
(92, 2, 2, 4, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(93, 2, 4, 2, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(94, 2, 2, 5, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(95, 2, 5, 2, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(96, 2, 2, 6, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(97, 2, 6, 2, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(98, 2, 2, 7, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(99, 2, 7, 2, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(100, 2, 2, 8, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(101, 2, 8, 2, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(102, 2, 2, 9, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(103, 2, 9, 2, 3, 700, 'THB', '2016-11-14 23:06:44', '2016-11-14 17:06:44'),
(104, 2, 2, 10, 3, 700, 'THB', '2016-11-14 23:06:45', '2016-11-14 17:06:45'),
(105, 2, 10, 2, 3, 700, 'THB', '2016-11-14 23:06:45', '2016-11-14 17:06:45'),
(106, 2, 2, 11, 3, 700, 'THB', '2016-11-14 23:06:45', '2016-11-14 17:06:45'),
(107, 2, 11, 2, 3, 700, 'THB', '2016-11-14 23:06:45', '2016-11-14 17:06:45'),
(108, 2, 2, 12, 3, 700, 'THB', '2016-11-14 23:06:45', '2016-11-14 17:06:45'),
(109, 2, 12, 2, 3, 700, 'THB', '2016-11-14 23:06:45', '2016-11-14 17:06:45'),
(110, 2, 2, 4, 5, 600, 'THB', '2016-11-14 23:06:45', '2016-11-14 17:06:45'),
(111, 2, 4, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:45'),
(112, 2, 2, 5, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(113, 2, 5, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(114, 2, 2, 6, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(115, 2, 6, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(116, 2, 2, 7, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(117, 2, 7, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(118, 2, 2, 8, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(119, 2, 8, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(120, 2, 2, 9, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(121, 2, 9, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(122, 2, 2, 10, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(123, 2, 10, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(124, 2, 2, 11, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(125, 2, 11, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(126, 2, 2, 12, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(127, 2, 12, 2, 5, 600, 'THB', '2016-11-14 23:06:46', '2016-11-14 17:06:46'),
(128, 2, 2, 4, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(129, 2, 4, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(130, 2, 2, 5, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(131, 2, 5, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(132, 2, 2, 6, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(133, 2, 6, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(134, 2, 2, 7, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(135, 2, 7, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(136, 2, 2, 8, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(137, 2, 8, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(138, 2, 2, 9, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(139, 2, 9, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(140, 2, 2, 10, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(141, 2, 10, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(142, 2, 2, 11, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(143, 2, 11, 2, 6, 500, 'THB', '2016-11-14 23:06:47', '2016-11-14 17:06:47'),
(144, 2, 2, 12, 6, 500, 'THB', '2016-11-14 23:06:48', '2016-11-14 17:06:48'),
(145, 2, 12, 2, 6, 500, 'THB', '2016-11-14 23:06:48', '2016-11-14 17:06:48'),
(146, 2, 4, 5, 1, 2030, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(147, 2, 5, 4, 1, 2030, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(148, 2, 4, 6, 1, 800, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(149, 2, 6, 4, 1, 800, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(150, 2, 4, 7, 1, 900, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(151, 2, 7, 4, 1, 900, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(152, 2, 4, 8, 1, 1990, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(153, 2, 8, 4, 1, 1990, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(154, 2, 4, 9, 1, 1200, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(155, 2, 9, 4, 1, 1200, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(156, 2, 4, 10, 1, 1300, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(157, 2, 10, 4, 1, 1300, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(158, 2, 4, 11, 1, 1400, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(159, 2, 11, 4, 1, 1400, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(160, 2, 4, 12, 1, 1300, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(161, 2, 12, 4, 1, 1300, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(162, 2, 4, 5, 2, 850, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(163, 2, 5, 4, 2, 850, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(164, 2, 4, 6, 2, 1930, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(165, 2, 6, 4, 2, 1930, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(166, 2, 4, 7, 2, 2049, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(167, 2, 7, 4, 2, 2049, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(168, 2, 4, 8, 2, 949, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(169, 2, 8, 4, 2, 949, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(170, 2, 4, 9, 2, 880, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(171, 2, 9, 4, 2, 880, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(172, 2, 4, 10, 2, 770, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(173, 2, 10, 4, 2, 770, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(174, 2, 4, 11, 2, 660, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(175, 2, 11, 4, 2, 660, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(176, 2, 4, 12, 2, 933, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(177, 2, 12, 4, 2, 933, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(178, 2, 4, 5, 3, 876, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(179, 2, 5, 4, 3, 876, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(180, 2, 4, 6, 3, 964, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(181, 2, 6, 4, 3, 964, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(182, 2, 4, 7, 3, 837, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(183, 2, 7, 4, 3, 837, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(184, 2, 4, 8, 3, 746, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(185, 2, 8, 4, 3, 746, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(186, 2, 4, 9, 3, 983, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(187, 2, 9, 4, 3, 983, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(188, 2, 4, 10, 3, 989, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(189, 2, 10, 4, 3, 989, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(190, 2, 4, 11, 3, 898, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(191, 2, 11, 4, 3, 898, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(192, 2, 4, 12, 3, 223, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(193, 2, 12, 4, 3, 223, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(194, 2, 4, 5, 5, 930, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(195, 2, 5, 4, 5, 930, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(196, 2, 4, 6, 5, 938, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(197, 2, 6, 4, 5, 938, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(198, 2, 4, 7, 5, 238, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(199, 2, 7, 4, 5, 238, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(200, 2, 4, 8, 5, 294, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(201, 2, 8, 4, 5, 294, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(202, 2, 4, 9, 5, 394, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(203, 2, 9, 4, 5, 394, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(204, 2, 4, 10, 5, 858, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(205, 2, 10, 4, 5, 858, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(206, 2, 4, 11, 5, 736, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(207, 2, 11, 4, 5, 736, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(208, 2, 4, 12, 5, 1830, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(209, 2, 12, 4, 5, 1830, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(210, 2, 4, 5, 6, 1903, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(211, 2, 5, 4, 6, 1903, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(212, 2, 4, 6, 6, 903, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(213, 2, 6, 4, 6, 903, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(214, 2, 4, 7, 6, 299, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(215, 2, 7, 4, 6, 299, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(216, 2, 4, 8, 6, 200, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(217, 2, 8, 4, 6, 200, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(218, 2, 4, 9, 6, 300, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(219, 2, 9, 4, 6, 300, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(220, 2, 4, 10, 6, 499, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(221, 2, 10, 4, 6, 499, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(222, 2, 4, 11, 6, 590, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(223, 2, 11, 4, 6, 590, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(224, 2, 4, 12, 6, 600, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(225, 2, 12, 4, 6, 600, 'THB', '2016-12-16 11:58:18', '2016-12-16 11:58:18'),
(226, 2, 5, 6, 1, 900, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(227, 2, 6, 5, 1, 900, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(228, 2, 5, 7, 1, 999, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(229, 2, 7, 5, 1, 999, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(230, 2, 5, 8, 1, 888, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(231, 2, 8, 5, 1, 888, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(232, 2, 5, 9, 1, 666, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(233, 2, 9, 5, 1, 666, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(234, 2, 5, 10, 1, 554, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(235, 2, 10, 5, 1, 554, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(236, 2, 5, 11, 1, 552, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(237, 2, 11, 5, 1, 552, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(238, 2, 5, 12, 1, 443, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(239, 2, 12, 5, 1, 443, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(240, 2, 5, 6, 2, 667, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(241, 2, 6, 5, 2, 667, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(242, 2, 5, 7, 2, 888, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(243, 2, 7, 5, 2, 888, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(244, 2, 5, 8, 2, 999, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(245, 2, 8, 5, 2, 999, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(246, 2, 5, 9, 2, 772, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(247, 2, 9, 5, 2, 772, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(248, 2, 5, 10, 2, 655, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(249, 2, 10, 5, 2, 655, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(250, 2, 5, 11, 2, 122, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(251, 2, 11, 5, 2, 122, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(252, 2, 5, 12, 2, 987, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(253, 2, 12, 5, 2, 987, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(254, 2, 5, 6, 3, 736, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(255, 2, 6, 5, 3, 736, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(256, 2, 5, 7, 3, 836, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(257, 2, 7, 5, 3, 836, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(258, 2, 5, 8, 3, 647, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(259, 2, 8, 5, 3, 647, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(260, 2, 5, 9, 3, 236, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(261, 2, 9, 5, 3, 236, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(262, 2, 5, 10, 3, 483, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(263, 2, 10, 5, 3, 483, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(264, 2, 5, 11, 3, 653, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(265, 2, 11, 5, 3, 653, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(266, 2, 5, 12, 3, 345, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(267, 2, 12, 5, 3, 345, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(268, 2, 5, 6, 5, 837, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(269, 2, 6, 5, 5, 837, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(270, 2, 5, 7, 5, 983, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(271, 2, 7, 5, 5, 983, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(272, 2, 5, 8, 5, 837, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(273, 2, 8, 5, 5, 837, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(274, 2, 5, 9, 5, 228, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(275, 2, 9, 5, 5, 228, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(276, 2, 5, 10, 5, 748, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(277, 2, 10, 5, 5, 748, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(278, 2, 5, 11, 5, 284, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(279, 2, 11, 5, 5, 284, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(280, 2, 5, 12, 5, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(281, 2, 12, 5, 5, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(282, 2, 5, 6, 6, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(283, 2, 6, 5, 6, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(284, 2, 5, 7, 6, 838, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(285, 2, 7, 5, 6, 838, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(286, 2, 5, 8, 6, 393, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(287, 2, 8, 5, 6, 393, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(288, 2, 5, 9, 6, 998, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(289, 2, 9, 5, 6, 998, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(290, 2, 5, 10, 6, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(291, 2, 10, 5, 6, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(292, 2, 5, 11, 6, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(293, 2, 11, 5, 6, 384, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(294, 2, 5, 12, 6, 388, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(295, 2, 12, 5, 6, 388, 'THB', '2016-12-16 11:59:48', '2016-12-16 11:59:48'),
(296, 2, 6, 7, 1, 993, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(297, 2, 7, 6, 1, 993, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(298, 2, 6, 8, 1, 383, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(299, 2, 8, 6, 1, 383, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(300, 2, 6, 9, 1, 938, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(301, 2, 9, 6, 1, 938, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(302, 2, 6, 10, 1, 478, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(303, 2, 10, 6, 1, 478, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(304, 2, 6, 11, 1, 767, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(305, 2, 11, 6, 1, 767, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(306, 2, 6, 12, 1, 883, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(307, 2, 12, 6, 1, 883, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(308, 2, 6, 7, 2, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:01:02'),
(309, 2, 7, 6, 2, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:01:02'),
(310, 2, 6, 8, 2, 990, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(311, 2, 8, 6, 2, 990, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(312, 2, 6, 9, 2, 776, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(313, 2, 9, 6, 2, 776, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(314, 2, 6, 10, 2, 668, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(315, 2, 10, 6, 2, 668, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(316, 2, 6, 11, 2, 293, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(317, 2, 11, 6, 2, 293, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(318, 2, 6, 12, 2, 383, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(319, 2, 12, 6, 2, 383, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(320, 2, 6, 7, 3, 555, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:01:02'),
(321, 2, 7, 6, 3, 555, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:01:02'),
(322, 2, 6, 8, 3, 437, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(323, 2, 8, 6, 3, 437, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(324, 2, 6, 9, 3, 384, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(325, 2, 9, 6, 3, 384, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(326, 2, 6, 10, 3, 849, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(327, 2, 10, 6, 3, 849, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(328, 2, 6, 11, 3, 387, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(329, 2, 11, 6, 3, 387, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(330, 2, 6, 12, 3, 382, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(331, 2, 12, 6, 3, 382, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(332, 2, 6, 7, 5, 382, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(333, 2, 7, 6, 5, 382, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(334, 2, 6, 8, 5, 232, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(335, 2, 8, 6, 5, 232, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(336, 2, 6, 9, 5, 938, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(337, 2, 9, 6, 5, 938, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(338, 2, 6, 10, 5, 847, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(339, 2, 10, 6, 5, 847, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(340, 2, 6, 11, 5, 773, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(341, 2, 11, 6, 5, 773, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(342, 2, 6, 12, 5, 229, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(343, 2, 12, 6, 5, 229, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(344, 2, 6, 7, 6, 876, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(345, 2, 7, 6, 6, 876, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(346, 2, 6, 8, 6, 873, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(347, 2, 8, 6, 6, 873, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(348, 2, 6, 9, 6, 388, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:01:02'),
(349, 2, 9, 6, 6, 388, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:01:02'),
(350, 2, 6, 10, 6, 382, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(351, 2, 10, 6, 6, 382, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(352, 2, 6, 11, 6, 499, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(353, 2, 11, 6, 6, 499, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(354, 2, 6, 12, 6, 363, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(355, 2, 12, 6, 6, 363, 'THB', '2016-12-16 12:01:02', '2016-12-16 12:01:02'),
(356, 2, 7, 8, 1, 499, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(357, 2, 8, 7, 1, 499, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(358, 2, 7, 9, 1, 788, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(359, 2, 9, 7, 1, 788, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(360, 2, 7, 10, 1, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(361, 2, 10, 7, 1, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(362, 2, 7, 11, 1, 777, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(363, 2, 11, 7, 1, 777, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(364, 2, 7, 12, 1, 888, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(365, 2, 12, 7, 1, 888, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(366, 2, 7, 8, 2, 777, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(367, 2, 8, 7, 2, 777, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(368, 2, 7, 9, 2, 888, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(369, 2, 9, 7, 2, 888, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(370, 2, 7, 10, 2, 999, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(371, 2, 10, 7, 2, 999, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(372, 2, 7, 11, 2, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(373, 2, 11, 7, 2, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(374, 2, 7, 12, 2, 999, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(375, 2, 12, 7, 2, 999, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(376, 2, 7, 8, 3, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(377, 2, 8, 7, 3, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(378, 2, 7, 9, 3, 888, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(379, 2, 9, 7, 3, 888, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(380, 2, 7, 10, 3, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(381, 2, 10, 7, 3, 666, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(382, 2, 7, 11, 3, 554, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(383, 2, 11, 7, 3, 554, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(384, 2, 7, 12, 3, 446, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(385, 2, 12, 7, 3, 446, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(386, 2, 7, 8, 5, 998, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(387, 2, 8, 7, 5, 998, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(388, 2, 7, 9, 5, 777, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(389, 2, 9, 7, 5, 777, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(390, 2, 7, 10, 5, 999, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(391, 2, 10, 7, 5, 999, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(392, 2, 7, 11, 5, 199, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(393, 2, 11, 7, 5, 199, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(394, 2, 7, 12, 5, 1189, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(395, 2, 12, 7, 5, 1189, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(396, 2, 7, 8, 6, 1827, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(397, 2, 8, 7, 6, 1827, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(398, 2, 7, 9, 6, 298, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:02:05'),
(399, 2, 9, 7, 6, 298, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:02:05'),
(400, 2, 7, 10, 6, 388, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(401, 2, 10, 7, 6, 388, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(402, 2, 7, 11, 6, 3747, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(403, 2, 11, 7, 6, 3747, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(404, 2, 7, 12, 6, 378, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(405, 2, 12, 7, 6, 378, 'THB', '2016-12-16 12:02:05', '2016-12-16 12:02:05'),
(406, 2, 8, 9, 1, 938, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(407, 2, 9, 8, 1, 938, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(408, 2, 8, 10, 1, 99, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(409, 2, 10, 8, 1, 99, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(410, 2, 8, 11, 1, 199, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(411, 2, 11, 8, 1, 199, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(412, 2, 8, 12, 1, 283, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(413, 2, 12, 8, 1, 283, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(414, 2, 8, 9, 2, 111, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(415, 2, 9, 8, 2, 111, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(416, 2, 8, 10, 2, 999, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(417, 2, 10, 8, 2, 999, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(418, 2, 8, 11, 2, 299, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(419, 2, 11, 8, 2, 299, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(420, 2, 8, 12, 2, 949, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(421, 2, 12, 8, 2, 949, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(422, 2, 8, 9, 3, 990, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(423, 2, 9, 8, 3, 990, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(424, 2, 8, 10, 3, 990, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(425, 2, 10, 8, 3, 990, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(426, 2, 8, 11, 3, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(427, 2, 11, 8, 3, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(428, 2, 8, 12, 3, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(429, 2, 12, 8, 3, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(430, 2, 8, 9, 5, 398, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(431, 2, 9, 8, 5, 398, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(432, 2, 8, 10, 5, 288, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(433, 2, 10, 8, 5, 288, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(434, 2, 8, 11, 5, 993, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(435, 2, 11, 8, 5, 993, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(436, 2, 8, 12, 5, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(437, 2, 12, 8, 5, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(438, 2, 8, 9, 6, 288, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(439, 2, 9, 8, 6, 288, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(440, 2, 8, 10, 6, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(441, 2, 10, 8, 6, 883, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(442, 2, 8, 11, 6, 773, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(443, 2, 11, 8, 6, 773, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(444, 2, 8, 12, 6, 748, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(445, 2, 12, 8, 6, 748, 'THB', '2016-12-16 12:02:51', '2016-12-16 12:02:51'),
(446, 2, 9, 10, 1, 939, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(447, 2, 10, 9, 1, 939, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(448, 2, 9, 11, 1, 838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(449, 2, 11, 9, 1, 838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(450, 2, 9, 12, 1, 939, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(451, 2, 12, 9, 1, 939, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(452, 2, 9, 10, 2, 929, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(453, 2, 10, 9, 2, 929, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(454, 2, 9, 11, 2, 3838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(455, 2, 11, 9, 2, 3838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(456, 2, 9, 12, 2, 838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(457, 2, 12, 9, 2, 838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(458, 2, 9, 10, 3, 399, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(459, 2, 10, 9, 3, 399, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(460, 2, 9, 11, 3, 838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(461, 2, 11, 9, 3, 838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(462, 2, 9, 12, 3, 383, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(463, 2, 12, 9, 3, 383, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(464, 2, 9, 10, 5, 1838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(465, 2, 10, 9, 5, 1838, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(466, 2, 9, 11, 5, 399, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(467, 2, 11, 9, 5, 399, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(468, 2, 9, 12, 5, 888, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(469, 2, 12, 9, 5, 888, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(470, 2, 9, 10, 6, 438, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(471, 2, 10, 9, 6, 438, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(472, 2, 9, 11, 6, 399, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(473, 2, 11, 9, 6, 399, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(474, 2, 9, 12, 6, 288, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(475, 2, 12, 9, 6, 288, 'THB', '2016-12-16 12:03:28', '2016-12-16 12:03:28'),
(476, 2, 10, 11, 1, 876, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(477, 2, 11, 10, 1, 876, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(478, 2, 10, 12, 1, 876, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(479, 2, 12, 10, 1, 876, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(480, 2, 10, 11, 2, 273, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(481, 2, 11, 10, 2, 273, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(482, 2, 10, 12, 2, 984, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(483, 2, 12, 10, 2, 984, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(484, 2, 10, 11, 3, 283, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(485, 2, 11, 10, 3, 283, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(486, 2, 10, 12, 3, 949, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(487, 2, 12, 10, 3, 949, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(488, 2, 10, 11, 5, 383, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(489, 2, 11, 10, 5, 383, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(490, 2, 10, 12, 5, 848, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(491, 2, 12, 10, 5, 848, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(492, 2, 10, 11, 6, 383, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(493, 2, 11, 10, 6, 383, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(494, 2, 10, 12, 6, 848, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(495, 2, 12, 10, 6, 848, 'THB', '2016-12-16 12:03:56', '2016-12-16 12:03:56'),
(496, 2, 11, 12, 1, 389, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(497, 2, 12, 11, 1, 389, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(498, 2, 11, 12, 2, 3838, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(499, 2, 12, 11, 2, 3838, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(500, 2, 11, 12, 3, 283, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(501, 2, 12, 11, 3, 283, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(502, 2, 11, 12, 5, 2938, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(503, 2, 12, 11, 5, 2938, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(504, 2, 11, 12, 6, 1828, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28'),
(505, 2, 12, 11, 6, 1828, 'THB', '2016-12-16 12:04:28', '2016-12-16 12:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `cms_car_service`
--

CREATE TABLE IF NOT EXISTS `cms_car_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `term_id` int(11) NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_car_service`
--

INSERT INTO `cms_car_service` (`id`, `title`, `description`, `term_id`, `entered`) VALUES
(1, 'Our Transfers Services', 'Lorem ipsum dolor sit amet, his et ornatus percipitur persequeris. Agam possim no ius, vidit abhorreant ea eos. Nam dicunt cetero sapientem cu, vide fabulas oporteat ad vix. Ei mel vocibus indoctum patrioque, no quem doming dolorum mea, has populo oporteat ex. Sit nonumy accumsan an, summo aliquid euripidis sit ea, et duis munere mea. Ei eum graeco aliquando, nam at esse voluptua, alterum recusabo electram ne per. Pro an ignota lobortis intellegat, ne omnis insolens mea, quo clita tation ne.\r\n\r\nSit vivendo blandit rationibus an. Te vidit sonet audire sit. His ea agam dictas, duo primis euismod vocibus an. Ut eam quodsi eloquentiam, at ipsum soleat partiendo qui. Nihil nobis ubique ad mei, mel ut laudem integre persecuti. No pri putant conceptam dissentiunt, ea has laudem scaevola adversarium. Vix ex legere periculis philosophia.\r\n\r\nAn per nisl delicata, ei maiorum assentior sed, ei vel dicit omnesque. Cum fabellas interpretaris ne, ad alia discere quo. Volumus adversarium necessitatibus ex qui, eos ea mutat percipitur. Veri verear nec ea, mea vidisse deserunt ne.\r\n', 3, '2016-12-01 12:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `cms_category`
--

CREATE TABLE IF NOT EXISTS `cms_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_meta` text COLLATE utf8_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_display_order` int(11) NOT NULL,
  `category_active` int(11) NOT NULL,
  `category_count_item` int(11) NOT NULL,
  `category_published_article` int(11) NOT NULL,
  `thumbnail` int(11) NOT NULL,
  `category_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_category`
--

INSERT INTO `cms_category` (`category_id`, `parent_id`, `category_slug`, `category_title`, `category_meta`, `category_description`, `category_display_order`, `category_active`, `category_count_item`, `category_published_article`, `thumbnail`, `category_updated`, `category_entered`) VALUES
(1, 0, 'tours-inbound', 'Tours Inbound', '', '', 1, 1, 0, 0, 7, '2016-11-06 02:29:03', '2016-11-05 20:29:03'),
(2, 0, 'tours-outbound', 'Tours Outbound', '', '', 2, 1, 0, 0, 8, '2016-11-06 04:02:20', '2016-11-05 22:02:20'),
(3, 1, 'bangkok', 'Bangkok', '', '<p><br></p>', 1, 1, 0, 0, 9, '2016-09-26 13:19:21', '2016-09-26 08:19:20'),
(4, 1, 'chiangmai', 'Chiangmai', '', '<p><br></p>', 3, 1, 0, 0, 10, '2016-09-26 13:20:05', '2016-09-26 08:20:04'),
(5, 1, 'phangnga', 'Phangnga', '', '<p><br></p>', 4, 1, 0, 0, 11, '2016-09-26 13:20:49', '2016-09-26 08:20:48'),
(6, 1, 'phuket', 'Phuket', '', '<p><br></p>', 0, 1, 0, 0, 25, '2016-10-13 09:51:32', '2016-10-13 04:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `cms_contact`
--

CREATE TABLE IF NOT EXISTS `cms_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contactname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_country`
--

CREATE TABLE IF NOT EXISTS `cms_country` (
  `code` char(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_caps` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `iso3_code` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `num_code` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_country`
--

INSERT INTO `cms_country` (`code`, `name_caps`, `name`, `iso3_code`, `num_code`) VALUES
('AD', 'ANDORRA', 'Andorra', 'AND', 20),
('AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
('AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
('AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
('AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
('AL', 'ALBANIA', 'Albania', 'ALB', 8),
('AM', 'ARMENIA', 'Armenia', 'ARM', 51),
('AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
('AO', 'ANGOLA', 'Angola', 'AGO', 24),
('AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
('AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
('AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
('AT', 'AUSTRIA', 'Austria', 'AUT', 40),
('AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
('AW', 'ARUBA', 'Aruba', 'ABW', 533),
('AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
('BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
('BB', 'BARBADOS', 'Barbados', 'BRB', 52),
('BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
('BE', 'BELGIUM', 'Belgium', 'BEL', 56),
('BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
('BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
('BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
('BI', 'BURUNDI', 'Burundi', 'BDI', 108),
('BJ', 'BENIN', 'Benin', 'BEN', 204),
('BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
('BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
('BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
('BR', 'BRAZIL', 'Brazil', 'BRA', 76),
('BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
('BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
('BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
('BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
('BY', 'BELARUS', 'Belarus', 'BLR', 112),
('BZ', 'BELIZE', 'Belize', 'BLZ', 84),
('CA', 'CANADA', 'Canada', 'CAN', 124),
('CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180),
('CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
('CG', 'CONGO', 'Congo', 'COG', 178),
('CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
('CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384),
('CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
('CL', 'CHILE', 'Chile', 'CHL', 152),
('CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
('CN', 'CHINA', 'China', 'CHN', 156),
('CO', 'COLOMBIA', 'Colombia', 'COL', 170),
('CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
('CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
('CU', 'CUBA', 'Cuba', 'CUB', 192),
('CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
('CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
('CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
('CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
('DE', 'GERMANY', 'Germany', 'DEU', 276),
('DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
('DK', 'DENMARK', 'Denmark', 'DNK', 208),
('DM', 'DOMINICA', 'Dominica', 'DMA', 212),
('DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
('DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
('EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
('EE', 'ESTONIA', 'Estonia', 'EST', 233),
('EG', 'EGYPT', 'Egypt', 'EGY', 818),
('EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
('ER', 'ERITREA', 'Eritrea', 'ERI', 232),
('ES', 'SPAIN', 'Spain', 'ESP', 724),
('ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
('FI', 'FINLAND', 'Finland', 'FIN', 246),
('FJ', 'FIJI', 'Fiji', 'FJI', 242),
('FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
('FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
('FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
('FR', 'FRANCE', 'France', 'FRA', 250),
('GA', 'GABON', 'Gabon', 'GAB', 266),
('GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
('GD', 'GRENADA', 'Grenada', 'GRD', 308),
('GE', 'GEORGIA', 'Georgia', 'GEO', 268),
('GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
('GH', 'GHANA', 'Ghana', 'GHA', 288),
('GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
('GL', 'GREENLAND', 'Greenland', 'GRL', 304),
('GM', 'GAMBIA', 'Gambia', 'GMB', 270),
('GN', 'GUINEA', 'Guinea', 'GIN', 324),
('GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
('GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
('GR', 'GREECE', 'Greece', 'GRC', 300),
('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
('GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
('GU', 'GUAM', 'Guam', 'GUM', 316),
('GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
('GY', 'GUYANA', 'Guyana', 'GUY', 328),
('HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
('HN', 'HONDURAS', 'Honduras', 'HND', 340),
('HR', 'CROATIA', 'Croatia', 'HRV', 191),
('HT', 'HAITI', 'Haiti', 'HTI', 332),
('HU', 'HUNGARY', 'Hungary', 'HUN', 348),
('ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
('IE', 'IRELAND', 'Ireland', 'IRL', 372),
('IL', 'ISRAEL', 'Israel', 'ISR', 376),
('IN', 'INDIA', 'India', 'IND', 356),
('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
('IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
('IS', 'ICELAND', 'Iceland', 'ISL', 352),
('IT', 'ITALY', 'Italy', 'ITA', 380),
('JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
('JO', 'JORDAN', 'Jordan', 'JOR', 400),
('JP', 'JAPAN', 'Japan', 'JPN', 392),
('KE', 'KENYA', 'Kenya', 'KEN', 404),
('KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
('KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
('KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
('KM', 'COMOROS', 'Comoros', 'COM', 174),
('KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
('KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408),
('KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
('KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
('KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
('KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
('LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418),
('LB', 'LEBANON', 'Lebanon', 'LBN', 422),
('LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
('LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
('LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
('LR', 'LIBERIA', 'Liberia', 'LBR', 430),
('LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
('LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
('LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
('LV', 'LATVIA', 'Latvia', 'LVA', 428),
('LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
('MA', 'MOROCCO', 'Morocco', 'MAR', 504),
('MC', 'MONACO', 'Monaco', 'MCO', 492),
('MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
('MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
('MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807),
('ML', 'MALI', 'Mali', 'MLI', 466),
('MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
('MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
('MO', 'MACAO', 'Macao', 'MAC', 446),
('MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
('MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
('MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
('MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
('MT', 'MALTA', 'Malta', 'MLT', 470),
('MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
('MV', 'MALDIVES', 'Maldives', 'MDV', 462),
('MW', 'MALAWI', 'Malawi', 'MWI', 454),
('MX', 'MEXICO', 'Mexico', 'MEX', 484),
('MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
('MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
('NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
('NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
('NE', 'NIGER', 'Niger', 'NER', 562),
('NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
('NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
('NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
('NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
('NO', 'NORWAY', 'Norway', 'NOR', 578),
('NP', 'NEPAL', 'Nepal', 'NPL', 524),
('NR', 'NAURU', 'Nauru', 'NRU', 520),
('NU', 'NIUE', 'Niue', 'NIU', 570),
('NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
('OM', 'OMAN', 'Oman', 'OMN', 512),
('PA', 'PANAMA', 'Panama', 'PAN', 591),
('PE', 'PERU', 'Peru', 'PER', 604),
('PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
('PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
('PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
('PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
('PL', 'POLAND', 'Poland', 'POL', 616),
('PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
('PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
('PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
('PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
('PW', 'PALAU', 'Palau', 'PLW', 585),
('PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
('QA', 'QATAR', 'Qatar', 'QAT', 634),
('RE', 'REUNION', 'Reunion', 'REU', 638),
('RO', 'ROMANIA', 'Romania', 'ROM', 642),
('RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
('RW', 'RWANDA', 'Rwanda', 'RWA', 646),
('SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
('SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
('SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
('SD', 'SUDAN', 'Sudan', 'SDN', 736),
('SE', 'SWEDEN', 'Sweden', 'SWE', 752),
('SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
('SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
('SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
('SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
('SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
('SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
('SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
('SN', 'SENEGAL', 'Senegal', 'SEN', 686),
('SO', 'SOMALIA', 'Somalia', 'SOM', 706),
('SR', 'SURINAME', 'Suriname', 'SUR', 740),
('ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
('SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
('SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
('SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
('TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
('TD', 'CHAD', 'Chad', 'TCD', 148),
('TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
('TG', 'TOGO', 'Togo', 'TGO', 768),
('TH', 'THAILAND', 'Thailand', 'THA', 764),
('TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
('TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
('TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
('TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
('TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
('TO', 'TONGA', 'Tonga', 'TON', 776),
('TR', 'TURKEY', 'Turkey', 'TUR', 792),
('TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
('TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
('TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
('UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
('UG', 'UGANDA', 'Uganda', 'UGA', 800),
('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
('US', 'UNITED STATES', 'United States', 'USA', 840),
('UY', 'URUGUAY', 'Uruguay', 'URY', 858),
('UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
('VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
('VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
('VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
('VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
('VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
('VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
('VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
('WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
('WS', 'SAMOA', 'Samoa', 'WSM', 882),
('YE', 'YEMEN', 'Yemen', 'YEM', 887),
('YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
('ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
('ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
('ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Table structure for table `cms_currency`
--

CREATE TABLE IF NOT EXISTS `cms_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_usd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sym` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=181 ;

--
-- Dumping data for table `cms_currency`
--

INSERT INTO `cms_currency` (`id`, `code`, `name`, `value_usd`, `sym`, `active`, `updated`, `entered`) VALUES
(1, 'USD', 'US Dollar', '1', '$', 1, '2016-08-19 06:41:27', '2014-04-23 17:18:22'),
(5, 'AUD', 'Australian Dollar', '1.3534', '$', 0, '2016-12-15 11:15:18', '2014-04-23 17:18:36'),
(25, 'EUR', 'Euro', '0.9544', '€', 1, '2016-12-15 11:15:18', '2014-04-23 17:18:36'),
(27, 'GBP', 'British Pound Sterling', '0.7978', '£', 0, '2016-12-15 11:15:18', '2014-04-23 17:18:36'),
(53, 'MYR', 'Malaysian Ringgit', '4.462', '$', 0, '2016-12-15 11:15:18', '2014-04-23 17:18:36'),
(70, 'RUB', 'Russian Ruble', '61.587', '₽', 0, '2016-12-15 11:15:18', '2014-04-23 17:18:36'),
(74, 'SGD', 'Singapore Dollar', '1.4392', '$', 0, '2016-12-15 11:15:18', '2014-04-23 17:18:36'),
(78, 'THB', 'Thai Baht', '35.77', '฿', 1, '2016-12-15 11:15:18', '2014-04-23 17:18:36'),
(95, 'JPY', 'Japanese Yen', '118.311', '¥', 0, '2016-12-15 11:15:18', '0000-00-00 00:00:00'),
(96, 'AED', 'United Arab Emirates Dirham', '3.6723', 'د.إ.', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:07'),
(97, 'ANG', 'Netherlands Antillean Guilder', '1.77', 'ƒ', 0, '2016-12-14 23:15:52', '2015-05-24 07:02:07'),
(98, 'ARS', 'Argentine Peso', '15.959', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:07'),
(99, 'BDT', 'Bangladeshi Taka', '78.85', '৳', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:08'),
(100, 'BGN', 'Bulgarian Lev', '1.8375', 'лв', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:09'),
(101, 'BHD', 'Bahraini Dinar', '0.3769', 'دينار', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:09'),
(102, 'BND', 'Brunei Dollar', '1.437', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:09'),
(103, 'BOB', 'Bolivian Boliviano', '6.88', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:09'),
(104, 'BRL', 'Brazilian Real', '3.374', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:10'),
(105, 'BWP', 'Botswana Pula', '10.7709', 'P', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:10'),
(106, 'CAD', 'Canadian Dollar', '1.3327', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:10'),
(107, 'CHF', 'Swiss Franc', '1.0272', 'CHF', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:10'),
(108, 'CLP', 'Chilean Peso', '661.5', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:11'),
(109, 'CNY', 'Chinese Yuan Renminbi', '6.9316', '元', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:11'),
(110, 'COP', 'Colombian Peso', '2961.2', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:11'),
(111, 'CRC', 'Costa Rican Colon', '544.05', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:11'),
(112, 'CZK', 'Czech Republic Koruna', '25.7947', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:12'),
(113, 'DKK', 'Danish Krone', '7.0973', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:12'),
(114, 'DOP', 'Dominican Peso', '46.1', '', 0, '2016-11-06 10:46:56', '2015-05-24 07:02:12'),
(115, 'DZD', 'Algerian Dinar', '110.976', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:12'),
(116, 'EEK', 'Estonian Kroon', '14.9331', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:13'),
(117, 'EGP', 'Egyptian Pound', '18.25', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:13'),
(118, 'FJD', 'Fiji Dollar', '2.088', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:14'),
(119, 'HKD', 'Hong Kong Dollar', '7.7594', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:15'),
(120, 'HNL', 'Honduran Lempira', '23.38', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:15'),
(121, 'HRK', 'Croatian Kuna', '7.1617', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:15'),
(122, 'HUF', 'Hungarian Forint', '299.74', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:16'),
(123, 'IDR', 'Indonesian Rupiah', '13395', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:16'),
(124, 'ILS', 'Israeli New Sheqel', '3.8345', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:16'),
(125, 'INR', 'Indian Rupee', '67.84', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:16'),
(126, 'ISK', 'Icelandic Krona', '111.75', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:17'),
(127, 'JOD', 'Jordanian Dinar', '0.7083', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:17'),
(128, 'KES', 'Kenyan Shilling', '101.9', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:18'),
(129, 'KRW', 'South Korean Won', '1184.8101', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:18'),
(130, 'KWD', 'Kuwaiti Dinar', '0.3054', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:18'),
(131, 'KYD', 'Cayman Islands Dollar', '0.82', '', 0, '2015-06-18 09:38:54', '2015-05-24 07:02:18'),
(132, 'KZT', 'Kazakhstan Tenge', '334.6', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:18'),
(133, 'LBP', 'Lebanese Pound', '1505.7', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:18'),
(134, 'LKR', 'Sri Lanka Rupee', '148.5', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:18'),
(135, 'LTL', 'Lithuanian Lita', '3.0487', '', 0, '2015-08-19 08:51:51', '2015-05-24 07:02:18'),
(136, 'LVL', 'Latvian Lat', '0.6205', '', 0, '2015-08-19 08:51:51', '2015-05-24 07:02:18'),
(137, 'MAD', 'Moroccan Dirham', '10.152', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:18'),
(138, 'MDL', 'Moldovan Leu', '20.035', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:19'),
(139, 'MKD', 'Macedonian Denar', '58.46', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:19'),
(140, 'MUR', 'Mauritian Rupee', '36.62', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:19'),
(141, 'MVR', 'Maldivian Rufiyaa', '15.05', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:19'),
(142, 'MXN', 'Mexican Peso', '20.6306', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:19'),
(143, 'NAD', 'Namibian Dollar', '14.057', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:19'),
(144, 'NGN', 'Nigerian Naira', '315', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:19'),
(145, 'NIO', 'Nicaraguan Cordoba Oro', '29.2617', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(146, 'NOK', 'Norwegian Krone', '8.581', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(147, 'NPR', 'Nepalese Rupee', '108.05', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(148, 'NZD', 'New Zealand Dollar', '1.4136', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(149, 'OMR', 'Omani Rial', '0.3848', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(150, 'PEN', 'Peruvian Nuevo Sol', '3.3829', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(151, 'PGK', 'Papua New Guinean Kina', '3.1721', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(152, 'PHP', 'Philippine Peso', '49.93', '₱', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(153, 'PKR', 'Pakistani Rupee', '104.8', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(154, 'PLN', 'Polish Zloty', '4.2533', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(155, 'PYG', 'Paraguayan Guarani', '5814.7002', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(156, 'QAR', 'Qatari Rial', '3.641', '', 0, '2016-11-06 10:46:58', '2015-05-24 07:02:20'),
(157, 'RON', 'Romanian Leu', '4.3102', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:20'),
(158, 'RSD', 'Serbian Dinar', '117.1322', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(159, 'SAR', 'Saudi Riyal', '3.7503', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(160, 'SCR', 'Seychellois Rupee', '13.296', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(161, 'SEK', 'Swedish Krona', '9.3135', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(162, 'SKK', 'Slovak Koruna', '22.206', '', 0, '2015-06-18 09:38:54', '2015-05-24 07:02:21'),
(163, 'SLL', 'Sierra Leonean Leone', '5503', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(164, 'SVC', 'Salvadoran Colon', '8.7222', '', 0, '2016-11-06 10:46:59', '2015-05-24 07:02:21'),
(165, 'TND', 'Tunisian Dinar', '2.3157', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(166, 'TRY', 'Turkish Lira', '3.5264', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(167, 'TTD', 'Trinidad and Tobago Dollar', '6.7195', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(168, 'TWD', 'New Taiwan Dollar', '31.977', '$', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:21'),
(169, 'TZS', 'Tanzanian Shilling', '2174', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(170, 'UAH', 'Ukrainian Hryvnia', '26.21', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(171, 'UGX', 'Ugandan Shilling', '3587', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(172, 'UYU', 'Uruguayan Peso', '28.55', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(173, 'UZS', 'Uzbekistan Som', '3200', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(174, 'VEF', 'Venezuelan Bolivar Fuerte', '9.9748', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(175, 'VND', 'Vietnamese Dong', '22739', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(176, 'XOF', 'CFA Franc BCEAO', '612', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(177, 'YER', 'Yemeni Rial', '249.95', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(178, 'ZAR', 'South African Rand', '14.1347', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22'),
(179, 'ZMK', 'Zambian Kwacha', '5189.5', '', 0, '2015-06-18 09:38:54', '2015-05-24 07:02:22'),
(180, 'IQD', 'Iraqi Dinar', '1181', '', 0, '2016-12-15 11:15:18', '2015-05-24 07:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `cms_destination`
--

CREATE TABLE IF NOT EXISTS `cms_destination` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `destination_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination_country` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `destination_geolocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination_geolocation_zoom` int(11) NOT NULL,
  `destination_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination_overview` text COLLATE utf8_unicode_ci NOT NULL,
  `destination_guide` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` int(11) NOT NULL,
  `destination_status` int(11) NOT NULL,
  `destination_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `destination_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`destination_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cms_destination`
--

INSERT INTO `cms_destination` (`destination_id`, `destination_slug`, `destination_code`, `destination_name`, `destination_country`, `destination_geolocation`, `destination_geolocation_zoom`, `destination_description`, `destination_overview`, `destination_guide`, `thumbnail`, `destination_status`, `destination_updated`, `destination_entered`) VALUES
(2, 'phuket-thialand', 'HKT', 'Phuket', 'TH', '7.9671179,98.0797246', 10, 'Lorem ipsum dolor sit amet, cum erant vivendo dignissim an, sumo efficiantur nec at, te vitae commune his. In ullum mundi repudiare vel, vim dolores dissentiet ea. Movet regione id pri, ea lorem aeterno impedit vim, cibo repudiare scribentur et per. Te hi', ' Vivamus scelerisque facilisis imperdiet. Quisque sollicitudin eros arcu, sed commodo mauris sagittis et. Fusce lorem odio, maximus eu congue sed, blandit vel nibh. Proin lacinia dui vel mi dignissim tempus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sed bibendum sapien, sit amet ultrices dui. Nunc auctor lorem vel dui ullamcorper imperdiet. Vivamus tellus ex, efficitur sit amet ligula eu, efficitur dignissim nulla. Etiam sit amet faucibus tortor. Quisque convallis consequat sodales. Quisque pharetra massa ornare arcu ullamcorper dapibus. Nam vulputate tellus eu nisi semper, eget efficitur augue vehicula. Curabitur et libero quis nisl hendrerit tempor vel sit amet ex. Quisque semper lacus quis metus rutrum, id sollicitudin orci ornare. Morbi eu augue suscipit odio rhoncus convallis.\r\n\r\nMorbi eget nulla vehicula, ullamcorper augue viverra, gravida turpis. Fusce hendrerit neque congue, vehicula tellus at, sollicitudin urna. Donec volutpat ipsum at dignissim consequat. Pellentesque condimentum suscipit iaculis. Nulla aliquam sem at eleifend mattis. Sed in ligula eget massa pulvinar elementum. Morbi ut leo at metus porta volutpat. Suspendisse tincidunt a mauris id porttitor. Sed pellentesque tempus lobortis. ', ' Vivamus scelerisque facilisis imperdiet. Quisque sollicitudin eros arcu, sed commodo mauris sagittis et. Fusce lorem odio, maximus eu congue sed, blandit vel nibh. Proin lacinia dui vel mi dignissim tempus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sed bibendum sapien, sit amet ultrices dui. Nunc auctor lorem vel dui ullamcorper imperdiet. Vivamus tellus ex, efficitur sit amet ligula eu, efficitur dignissim nulla. Etiam sit amet faucibus tortor. Quisque convallis consequat sodales. Quisque pharetra massa ornare arcu ullamcorper dapibus. Nam vulputate tellus eu nisi semper, eget efficitur augue vehicula. Curabitur et libero quis nisl hendrerit tempor vel sit amet ex. Quisque semper lacus quis metus rutrum, id sollicitudin orci ornare. Morbi eu augue suscipit odio rhoncus convallis.\r\n\r\nMorbi eget nulla vehicula, ullamcorper augue viverra, gravida turpis. Fusce hendrerit neque congue, vehicula tellus at, sollicitudin urna. Donec volutpat ipsum at dignissim consequat. Pellentesque condimentum suscipit iaculis. Nulla aliquam sem at eleifend mattis. Sed in ligula eget massa pulvinar elementum. Morbi ut leo at metus porta volutpat. Suspendisse tincidunt a mauris id porttitor. Sed pellentesque tempus lobortis. ', 66, 1, '2016-12-13 21:36:43', '0000-00-00 00:00:00'),
(3, 'suamui-thailand', 'USM', 'Samui', 'TH', '9.5012493,99.9313714', 12, ' Vivamus scelerisque facilisis imperdiet. Quisque sollicitudin eros arcu, sed commodo mauris sagittis et. Fusce lorem odio, maximus eu congue sed, blandit vel nibh. Proin lacinia dui vel mi dignissim tempus. Cum sociis natoque penatibus et magnis dis part', ' Vivamus scelerisque facilisis imperdiet. Quisque sollicitudin eros arcu, sed commodo mauris sagittis et. Fusce lorem odio, maximus eu congue sed, blandit vel nibh. Proin lacinia dui vel mi dignissim tempus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sed bibendum sapien, sit amet ultrices dui. Nunc auctor lorem vel dui ullamcorper imperdiet. Vivamus tellus ex, efficitur sit amet ligula eu, efficitur dignissim nulla. Etiam sit amet faucibus tortor. Quisque convallis consequat sodales. Quisque pharetra massa ornare arcu ullamcorper dapibus. Nam vulputate tellus eu nisi semper, eget efficitur augue vehicula. Curabitur et libero quis nisl hendrerit tempor vel sit amet ex. Quisque semper lacus quis metus rutrum, id sollicitudin orci ornare. Morbi eu augue suscipit odio rhoncus convallis.\r\n\r\nMorbi eget nulla vehicula, ullamcorper augue viverra, gravida turpis. Fusce hendrerit neque congue, vehicula tellus at, sollicitudin urna. Donec volutpat ipsum at dignissim consequat. Pellentesque condimentum suscipit iaculis. Nulla aliquam sem at eleifend mattis. Sed in ligula eget massa pulvinar elementum. Morbi ut leo at metus porta volutpat. Suspendisse tincidunt a mauris id porttitor. Sed pellentesque tempus lobortis. ', ' Vivamus scelerisque facilisis imperdiet. Quisque sollicitudin eros arcu, sed commodo mauris sagittis et. Fusce lorem odio, maximus eu congue sed, blandit vel nibh. Proin lacinia dui vel mi dignissim tempus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sed bibendum sapien, sit amet ultrices dui. Nunc auctor lorem vel dui ullamcorper imperdiet. Vivamus tellus ex, efficitur sit amet ligula eu, efficitur dignissim nulla. Etiam sit amet faucibus tortor. Quisque convallis consequat sodales. Quisque pharetra massa ornare arcu ullamcorper dapibus. Nam vulputate tellus eu nisi semper, eget efficitur augue vehicula. Curabitur et libero quis nisl hendrerit tempor vel sit amet ex. Quisque semper lacus quis metus rutrum, id sollicitudin orci ornare. Morbi eu augue suscipit odio rhoncus convallis.\r\n\r\nMorbi eget nulla vehicula, ullamcorper augue viverra, gravida turpis. Fusce hendrerit neque congue, vehicula tellus at, sollicitudin urna. Donec volutpat ipsum at dignissim consequat. Pellentesque condimentum suscipit iaculis. Nulla aliquam sem at eleifend mattis. Sed in ligula eget massa pulvinar elementum. Morbi ut leo at metus porta volutpat. Suspendisse tincidunt a mauris id porttitor. Sed pellentesque tempus lobortis. ', 67, 1, '2016-12-13 21:42:05', '0000-00-00 00:00:00'),
(4, 'chiang-mai-thailand', 'CNX', 'Chiang Mai', 'TH', '18.7719015,98.3961714', 7, 'Thailand''s northern capital is an escape from the whirlwind pace of life of its southern rival. Despite the constant arrival of planes and trains full of sightseers, the former seat of the Lanna kingdom is still blissfully calm and laid-back.', 'Thailand''s northern capital is an escape from the whirlwind pace of life of its southern rival. Despite the constant arrival of planes and trains full of sightseers, the former seat of the Lanna kingdom is still blissfully calm and laid-back. This is a place to relax after the chaos of Bangkok and recharge your batteries with fabulous food and leisurely wandering. If you don''t want to participate in the vast array of activities on offer, just stroll around the backstreets, and discover a city that is still firmly Thai in its aspect, atmosphere, and attitude.', 'Nestled amongst forested foothills, Chiang Mai is much older than it first appears. During the city''s medieval heyday, almost everything was made of teak hauled by elephant from the surrounding rainforest, with the notable exception of its towering wát. The monasteries still remain, centred on ancient brick chedi (stupas) in a remarkable range of shapes and styles, but the gaps between them have been filled in with modern Thai houses and traveller hotels. Despite this, the historic centre of Chiang Mai still feels overwhelmingly residential, more like a sleepy country town than a bustling capital.\r\n\r\nA sprawling modern city has grown up around ancient Chiang Mai, ringed by a tangle of superhighways, but if you drive in a straight line in any direction, you''ll soon find yourself in the lush green countryside of northern Thailand. A short ride by motorcycle or chartered rót daang (''red truck'') will deliver you to pristine rainforest reserves, churning waterfalls, serene forest wát, bubbling hot springs and peaceful country villages – as well as a host of adventure camps, elephant sanctuaries and souvenir markets.', 61, 1, '2016-12-13 13:21:37', '0000-00-00 00:00:00'),
(5, 'phi-phi-thailand', 'ppx', 'Phi Phi Island', 'TH', '7.7526506,98.7390835', 13, 'Phi Phi Island is Thailand''s island-superstar. It''s been in the movies. It''s the topic of conversation for travelers all over Thailand. ', ' Vivamus scelerisque facilisis imperdiet. Quisque sollicitudin eros arcu, sed commodo mauris sagittis et. Fusce lorem odio, maximus eu congue sed, blandit vel nibh. Proin lacinia dui vel mi dignissim tempus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sed bibendum sapien, sit amet ultrices dui. Nunc auctor lorem vel dui ullamcorper imperdiet. Vivamus tellus ex, efficitur sit amet ligula eu, efficitur dignissim nulla. Etiam sit amet faucibus tortor. Quisque convallis consequat sodales. Quisque pharetra massa ornare arcu ullamcorper dapibus. Nam vulputate tellus eu nisi semper, eget efficitur augue vehicula. Curabitur et libero quis nisl hendrerit tempor vel sit amet ex. Quisque semper lacus quis metus rutrum, id sollicitudin orci ornare. Morbi eu augue suscipit odio rhoncus convallis.\r\n\r\nMorbi eget nulla vehicula, ullamcorper augue viverra, gravida turpis. Fusce hendrerit neque congue, vehicula tellus at, sollicitudin urna. Donec volutpat ipsum at dignissim consequat. Pellentesque condimentum suscipit iaculis. Nulla aliquam sem at eleifend mattis. Sed in ligula eget massa pulvinar elementum. Morbi ut leo at metus porta volutpat. Suspendisse tincidunt a mauris id porttitor. Sed pellentesque tempus lobortis. ', ' Vivamus scelerisque facilisis imperdiet. Quisque sollicitudin eros arcu, sed commodo mauris sagittis et. Fusce lorem odio, maximus eu congue sed, blandit vel nibh. Proin lacinia dui vel mi dignissim tempus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sed bibendum sapien, sit amet ultrices dui. Nunc auctor lorem vel dui ullamcorper imperdiet. Vivamus tellus ex, efficitur sit amet ligula eu, efficitur dignissim nulla. Etiam sit amet faucibus tortor. Quisque convallis consequat sodales. Quisque pharetra massa ornare arcu ullamcorper dapibus. Nam vulputate tellus eu nisi semper, eget efficitur augue vehicula. Curabitur et libero quis nisl hendrerit tempor vel sit amet ex. Quisque semper lacus quis metus rutrum, id sollicitudin orci ornare. Morbi eu augue suscipit odio rhoncus convallis.\r\n\r\nMorbi eget nulla vehicula, ullamcorper augue viverra, gravida turpis. Fusce hendrerit neque congue, vehicula tellus at, sollicitudin urna. Donec volutpat ipsum at dignissim consequat. Pellentesque condimentum suscipit iaculis. Nulla aliquam sem at eleifend mattis. Sed in ligula eget massa pulvinar elementum. Morbi ut leo at metus porta volutpat. Suspendisse tincidunt a mauris id porttitor. Sed pellentesque tempus lobortis. ', 65, 1, '2016-12-13 21:35:30', '0000-00-00 00:00:00'),
(6, 'khaolak-thailand', 'kxx', 'Khao Lak', 'TH', '8.6852009,98.1951721', 12, 'Per eu unum nostrud vivendo, est nisl stet impedit id, est vidisse interesset accommodare ut. Quo semper prompta assueverit ex. Sit no vocent viderer. Eius equidem democritum qui no, eam elit etiam possim ut, errem graeco cum in. No vel vidit adversarium ', '\r\nAt sed inermis perpetua, eos viris ridens tibique id, at nulla iudicabit ius. Nulla eruditi cotidieque mei et. Amet novum nostrud his ea. Ex est pericula evertitur reformidans. At qui postea recteque, an nostro recusabo dignissim ius.\r\n\r\nSea an utroque mediocrem maluisset, ad quaeque legimus vel. Id quis adolescens vel, cum et alii apeirian. Nec zril rationibus at, no nam intellegat persequeris reformidans, unum aliquando pri ad. His ei hinc disputando, falli mundi te eam, vide minim assueverit sit ad. Nec ne augue vitae, est dicant labores antiopam an, explicari complectitur ex mei. Nam cu inermis intellegam, his prima affert pericula te.\r\n\r\nCu qui habemus salutandi adolescens, an vix probo alterum. Ei appellantur reformidans usu, simul accommodare ex vix. Omnis illud aliquid in quo, discere facilis eos ut. Eam ad dicat assum hendrerit, modo indoctum ex mel. In suas agam dolor pro, invenire percipitur vis ex.\r\n\r\nIn soluta ignota mea. Sed putant sadipscing mediocritatem an, at odio nisl audire ius, eum ei iriure gloriatur assueverit. Nam nusquam perfecto inimicus ut, eu electram explicari vix. Pri dissentias conclusionemque at. Inani torquatos reprehendunt ad mei, meliore accusamus vis ei. Sit te saepe appetere, porro deterruisset ei qui.\r\n\r\nTempor scriptorem cu vix, et eam erroribus democritum. Ex nonumes salutatus his, ei sea quodsi integre accommodare. Illum aliquam et nec, est aeque nominati adipiscing et, quaeque minimum percipit vim te. In sit fugit minimum fierent.\r\n\r\nAn sit unum feugiat torquatos. Cum dicant vocent molestie ei, sed at meliore dissentiunt. Et posse iracundia his, causae liberavisse quo eu, natum aliquid eum id. Causae persius vocibus vim an, mundi mnesarchum per ex.\r\n\r\nQuo homero aeterno euismod ut. Eum vidit labore id, id libris doming patrioque pri. Scripta luptatum abhorreant his at, reque adolescens voluptatibus ad has, ei pro dicat percipit accusata. Novum eirmod te duo, viris scripta vel eu.\r\n\r\nId mel simul tantas audiam, mazim veniam cu cum. In commodo tibique eam. Zril patrioque cu eam, ut nec quaeque scaevola. Ubique impedit intellegat mei te.\r\n\r\nQuo discere argumentum ad. Ad nam postea erroribus assentior, sit mazim molestie iudicabit at. Te putent voluptatum usu, pri duis dolore in. Ne exerci docendi postulant mel. Justo putant interesset ad pro.', '\r\nAt sed inermis perpetua, eos viris ridens tibique id, at nulla iudicabit ius. Nulla eruditi cotidieque mei et. Amet novum nostrud his ea. Ex est pericula evertitur reformidans. At qui postea recteque, an nostro recusabo dignissim ius.\r\n\r\nSea an utroque mediocrem maluisset, ad quaeque legimus vel. Id quis adolescens vel, cum et alii apeirian. Nec zril rationibus at, no nam intellegat persequeris reformidans, unum aliquando pri ad. His ei hinc disputando, falli mundi te eam, vide minim assueverit sit ad. Nec ne augue vitae, est dicant labores antiopam an, explicari complectitur ex mei. Nam cu inermis intellegam, his prima affert pericula te.\r\n\r\nCu qui habemus salutandi adolescens, an vix probo alterum. Ei appellantur reformidans usu, simul accommodare ex vix. Omnis illud aliquid in quo, discere facilis eos ut. Eam ad dicat assum hendrerit, modo indoctum ex mel. In suas agam dolor pro, invenire percipitur vis ex.\r\n\r\nIn soluta ignota mea. Sed putant sadipscing mediocritatem an, at odio nisl audire ius, eum ei iriure gloriatur assueverit. Nam nusquam perfecto inimicus ut, eu electram explicari vix. Pri dissentias conclusionemque at. Inani torquatos reprehendunt ad mei, meliore accusamus vis ei. Sit te saepe appetere, porro deterruisset ei qui.\r\n\r\nTempor scriptorem cu vix, et eam erroribus democritum. Ex nonumes salutatus his, ei sea quodsi integre accommodare. Illum aliquam et nec, est aeque nominati adipiscing et, quaeque minimum percipit vim te. In sit fugit minimum fierent.\r\n\r\nAn sit unum feugiat torquatos. Cum dicant vocent molestie ei, sed at meliore dissentiunt. Et posse iracundia his, causae liberavisse quo eu, natum aliquid eum id. Causae persius vocibus vim an, mundi mnesarchum per ex.\r\n\r\nQuo homero aeterno euismod ut. Eum vidit labore id, id libris doming patrioque pri. Scripta luptatum abhorreant his at, reque adolescens voluptatibus ad has, ei pro dicat percipit accusata. Novum eirmod te duo, viris scripta vel eu.\r\n\r\nId mel simul tantas audiam, mazim veniam cu cum. In commodo tibique eam. Zril patrioque cu eam, ut nec quaeque scaevola. Ubique impedit intellegat mei te.\r\n\r\nQuo discere argumentum ad. Ad nam postea erroribus assentior, sit mazim molestie iudicabit at. Te putent voluptatum usu, pri duis dolore in. Ne exerci docendi postulant mel. Justo putant interesset ad pro.', 72, 1, '2016-12-13 22:35:22', '0000-00-00 00:00:00'),
(7, 'suratthani-thailand', 'kha', 'Suratthani', 'TH', '9.0505576,98.1455004', 8, 'Per eu unum nostrud vivendo, est nisl stet impedit id, est vidisse interesset accommodare ut. Quo semper prompta assueverit ex. Sit no vocent viderer. Eius equidem democritum qui no, eam elit etiam possim ut, errem graeco cum in. No vel vidit adversarium ', 'Per eu unum nostrud vivendo, est nisl stet impedit id, est vidisse interesset accommodare ut. Quo semper prompta assueverit ex. Sit no vocent viderer. Eius equidem democritum qui no, eam elit etiam possim ut, errem graeco cum in. No vel vidit adversarium deterruisset.\r\n\r\nAt sed inermis perpetua, eos viris ridens tibique id, at nulla iudicabit ius. Nulla eruditi cotidieque mei et. Amet novum nostrud his ea. Ex est pericula evertitur reformidans. At qui postea recteque, an nostro recusabo dignissim ius.\r\n\r\nSea an utroque mediocrem maluisset, ad quaeque legimus vel. Id quis adolescens vel, cum et alii apeirian. Nec zril rationibus at, no nam intellegat persequeris reformidans, unum aliquando pri ad. His ei hinc disputando, falli mundi te eam, vide minim assueverit sit ad. Nec ne augue vitae, est dicant labores antiopam an, explicari complectitur ex mei. Nam cu inermis intellegam, his prima affert pericula te.\r\n\r\nCu qui habemus salutandi adolescens, an vix probo alterum. Ei appellantur reformidans usu, simul accommodare ex vix. Omnis illud aliquid in quo, discere facilis eos ut. Eam ad dicat assum hendrerit, modo indoctum ex mel. In suas agam dolor pro, invenire percipitur vis ex.\r\n\r\nIn soluta ignota mea. Sed putant sadipscing mediocritatem an, at odio nisl audire ius, eum ei iriure gloriatur assueverit. Nam nusquam perfecto inimicus ut, eu electram explicari vix. Pri dissentias conclusionemque at. Inani torquatos reprehendunt ad mei, meliore accusamus vis ei. Sit te saepe appetere, porro deterruisset ei qui.\r\n\r\nTempor scriptorem cu vix, et eam erroribus democritum. Ex nonumes salutatus his, ei sea quodsi integre accommodare. Illum aliquam et nec, est aeque nominati adipiscing et, quaeque minimum percipit vim te. In sit fugit minimum fierent.\r\n\r\nAn sit unum feugiat torquatos. Cum dicant vocent molestie ei, sed at meliore dissentiunt. Et posse iracundia his, causae liberavisse quo eu, natum aliquid eum id. Causae persius vocibus vim an, mundi mnesarchum per ex.\r\n\r\nQuo homero aeterno euismod ut. Eum vidit labore id, id libris doming patrioque pri. Scripta luptatum abhorreant his at, reque adolescens voluptatibus ad has, ei pro dicat percipit accusata. Novum eirmod te duo, viris scripta vel eu.\r\n\r\nId mel simul tantas audiam, mazim veniam cu cum. In commodo tibique eam. Zril patrioque cu eam, ut nec quaeque scaevola. Ubique impedit intellegat mei te.\r\n\r\nQuo discere argumentum ad. Ad nam postea erroribus assentior, sit mazim molestie iudicabit at. Te putent voluptatum usu, pri duis dolore in. Ne exerci docendi postulant mel. Justo putant interesset ad pro.', 'Per eu unum nostrud vivendo, est nisl stet impedit id, est vidisse interesset accommodare ut. Quo semper prompta assueverit ex. Sit no vocent viderer. Eius equidem democritum qui no, eam elit etiam possim ut, errem graeco cum in. No vel vidit adversarium deterruisset.\r\n\r\nAt sed inermis perpetua, eos viris ridens tibique id, at nulla iudicabit ius. Nulla eruditi cotidieque mei et. Amet novum nostrud his ea. Ex est pericula evertitur reformidans. At qui postea recteque, an nostro recusabo dignissim ius.\r\n\r\nSea an utroque mediocrem maluisset, ad quaeque legimus vel. Id quis adolescens vel, cum et alii apeirian. Nec zril rationibus at, no nam intellegat persequeris reformidans, unum aliquando pri ad. His ei hinc disputando, falli mundi te eam, vide minim assueverit sit ad. Nec ne augue vitae, est dicant labores antiopam an, explicari complectitur ex mei. Nam cu inermis intellegam, his prima affert pericula te.\r\n\r\nCu qui habemus salutandi adolescens, an vix probo alterum. Ei appellantur reformidans usu, simul accommodare ex vix. Omnis illud aliquid in quo, discere facilis eos ut. Eam ad dicat assum hendrerit, modo indoctum ex mel. In suas agam dolor pro, invenire percipitur vis ex.\r\n\r\nIn soluta ignota mea. Sed putant sadipscing mediocritatem an, at odio nisl audire ius, eum ei iriure gloriatur assueverit. Nam nusquam perfecto inimicus ut, eu electram explicari vix. Pri dissentias conclusionemque at. Inani torquatos reprehendunt ad mei, meliore accusamus vis ei. Sit te saepe appetere, porro deterruisset ei qui.\r\n\r\nTempor scriptorem cu vix, et eam erroribus democritum. Ex nonumes salutatus his, ei sea quodsi integre accommodare. Illum aliquam et nec, est aeque nominati adipiscing et, quaeque minimum percipit vim te. In sit fugit minimum fierent.\r\n\r\nAn sit unum feugiat torquatos. Cum dicant vocent molestie ei, sed at meliore dissentiunt. Et posse iracundia his, causae liberavisse quo eu, natum aliquid eum id. Causae persius vocibus vim an, mundi mnesarchum per ex.\r\n\r\nQuo homero aeterno euismod ut. Eum vidit labore id, id libris doming patrioque pri. Scripta luptatum abhorreant his at, reque adolescens voluptatibus ad has, ei pro dicat percipit accusata. Novum eirmod te duo, viris scripta vel eu.\r\n\r\nId mel simul tantas audiam, mazim veniam cu cum. In commodo tibique eam. Zril patrioque cu eam, ut nec quaeque scaevola. Ubique impedit intellegat mei te.\r\n\r\nQuo discere argumentum ad. Ad nam postea erroribus assentior, sit mazim molestie iudicabit at. Te putent voluptatum usu, pri duis dolore in. Ne exerci docendi postulant mel. Justo putant interesset ad pro.', 74, 1, '2016-12-13 22:41:26', '0000-00-00 00:00:00'),
(8, 'tokyo-japan', 'NRT', 'Narita', 'JP', '35.8132752,140.2210642', 11, 'In brute epicurei adolescens has. Ferri sententiae per et. Te meliore vulputate vel. Suavitate euripidis complectitur et nec, no justo veritus vel.\r\n\r\nEam tantas molestie fabellas cu, te eam admodum pertinax moderatius, eu quaeque laoreet eam. Eos an dico', 'In brute epicurei adolescens has. Ferri sententiae per et. Te meliore vulputate vel. Suavitate euripidis complectitur et nec, no justo veritus vel.\r\n\r\nEam tantas molestie fabellas cu, te eam admodum pertinax moderatius, eu quaeque laoreet eam. Eos an dico populo rationibus, at rebum scaevola democritum per. Ut his invenire instructior. An munere cotidieque omittantur sed, mucius efficiendi eu vel, no modus prompta euripidis sea.', 'In brute epicurei adolescens has. Ferri sententiae per et. Te meliore vulputate vel. Suavitate euripidis complectitur et nec, no justo veritus vel.\r\n\r\nEam tantas molestie fabellas cu, te eam admodum pertinax moderatius, eu quaeque laoreet eam. Eos an dico populo rationibus, at rebum scaevola democritum per. Ut his invenire instructior. An munere cotidieque omittantur sed, mucius efficiendi eu vel, no modus prompta euripidis sea.', 78, 1, '2016-12-15 22:14:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_destination_area`
--

CREATE TABLE IF NOT EXISTS `cms_destination_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` int(11) NOT NULL,
  `area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `area_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cms_destination_area`
--

INSERT INTO `cms_destination_area` (`area_id`, `destination_id`, `area_name`, `area_updated`, `area_entered`) VALUES
(2, 2, 'Area 1', '2016-11-13 08:02:11', '2016-11-10 16:56:31'),
(3, 3, 'Samui International Airport', '2016-11-11 00:39:16', '2016-11-10 18:39:16'),
(4, 2, 'Area 2', '2016-11-13 08:02:26', '2016-11-13 02:01:20'),
(5, 2, 'Area 3', '2016-11-13 08:02:42', '2016-11-13 02:02:42'),
(6, 2, 'Area 4', '2016-11-13 08:03:31', '2016-11-13 02:03:31'),
(7, 2, 'Area 5', '2016-11-13 08:03:47', '2016-11-13 02:03:47'),
(8, 2, 'Area 6', '2016-11-13 08:04:02', '2016-11-13 02:04:02'),
(9, 2, 'Area 7', '2016-11-13 08:04:21', '2016-11-13 02:04:21'),
(10, 2, 'Area 8', '2016-11-13 08:04:33', '2016-11-13 02:04:33'),
(11, 2, 'Area 9', '2016-11-13 08:04:47', '2016-11-13 02:04:47'),
(12, 2, 'Area 10', '2016-11-13 08:05:19', '2016-11-13 02:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `cms_destination_period`
--

CREATE TABLE IF NOT EXISTS `cms_destination_period` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `period_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination_id` int(11) NOT NULL,
  `dd1` int(2) NOT NULL,
  `mm1` int(2) NOT NULL,
  `dd2` int(2) NOT NULL,
  `mm2` int(2) NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`period_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cms_destination_period`
--

INSERT INTO `cms_destination_period` (`period_id`, `period_name`, `destination_id`, `dd1`, `mm1`, `dd2`, `mm2`, `entered`) VALUES
(6, 'Low Season', 2, 1, 5, 31, 10, '2016-10-13 09:41:46'),
(7, 'High Season', 2, 1, 11, 19, 12, '2016-10-13 09:42:04'),
(8, 'Peak Season', 2, 20, 12, 20, 1, '2016-10-13 09:43:04'),
(9, 'High Season', 2, 21, 1, 30, 4, '2016-10-13 09:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `cms_featured`
--

CREATE TABLE IF NOT EXISTS `cms_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `cms_featured`
--

INSERT INTO `cms_featured` (`id`, `destination_id`, `tour_id`, `entered`) VALUES
(18, 2, 3, '2016-12-14 23:12:34'),
(19, 2, 4, '2016-12-14 23:12:34'),
(20, 2, 2, '2016-12-14 23:12:34'),
(21, 2, 5, '2016-12-14 23:12:34'),
(22, 2, 7, '2016-12-14 23:12:34'),
(23, 2, 6, '2016-12-14 23:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `cms_hotel`
--

CREATE TABLE IF NOT EXISTS `cms_hotel` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_rating` int(1) NOT NULL,
  `hotel_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_stateprovince` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_county` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_description` text COLLATE utf8_unicode_ci NOT NULL,
  `hotel_facility` text COLLATE utf8_unicode_ci NOT NULL,
  `hotel_geolocation` int(11) NOT NULL,
  `hotel_price` float(8,2) NOT NULL,
  `hotel_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hotel_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_language`
--

CREATE TABLE IF NOT EXISTS `cms_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `cms_language`
--

INSERT INTO `cms_language` (`id`, `code`, `name`, `active`, `updated`, `entered`) VALUES
(1, 'en_US', 'English\r', 1, '2016-09-26 13:16:34', '2015-04-20 00:29:15'),
(2, 'ar_SA', 'Arabic\r', 0, '2016-08-13 04:54:43', '2015-04-20 00:29:15'),
(3, 'cs_CZ', 'Czech\r', 0, '2016-07-14 04:59:58', '2015-04-20 00:29:15'),
(4, 'da_DK', 'Danish\r', 0, '2016-07-14 05:00:00', '2015-04-20 00:29:15'),
(5, 'de_DE', 'German\r', 0, '2016-09-16 05:57:31', '2015-04-20 00:29:15'),
(6, 'el_GR', 'Greek\r', 0, '2016-07-14 04:59:59', '2015-04-20 00:29:15'),
(7, 'es_ES', 'Spanish', 0, '2016-11-20 08:57:05', '2015-04-20 00:29:15'),
(9, 'et_EE', 'Estonian\r', 0, '2016-07-14 04:59:54', '2015-04-20 00:29:15'),
(10, 'fi_FI', 'Finnish\r', 0, '2016-07-14 04:59:52', '2015-04-20 00:29:15'),
(11, 'fr_FR', 'French\r', 0, '2016-07-14 04:59:51', '2015-04-20 00:29:15'),
(13, 'hu_HU', 'Hungarian\r', 0, '2016-07-14 04:59:41', '2015-04-20 00:29:16'),
(14, 'hr_HR', 'Croatian\r', 0, '2016-07-14 04:59:39', '2015-04-20 00:29:16'),
(15, 'in_ID', 'Indonesian\r', 0, '2016-07-14 04:59:35', '2015-04-20 00:29:16'),
(16, 'is_IS', 'Icelandic\r', 0, '2016-07-14 04:59:34', '2015-04-20 00:29:16'),
(17, 'it_IT', 'Italian\r', 0, '2016-07-14 04:59:32', '2015-04-20 00:29:16'),
(18, 'ja_JP', 'Japanese\r', 0, '2016-07-14 04:58:40', '2015-04-20 00:29:16'),
(19, 'ko_KR', 'Korean\r', 0, '2016-07-14 04:57:27', '2015-04-20 00:29:16'),
(20, 'ms_MY', 'Malay\r', 0, '2016-07-23 04:33:26', '2015-04-20 00:29:16'),
(21, 'lv_LV', 'Latvian\r', 0, '2016-07-14 04:57:18', '2015-04-20 00:29:16'),
(22, 'lt_LT', 'Lithuanian\r', 0, '2016-07-23 06:44:55', '2015-04-20 00:29:16'),
(23, 'nl_NL', 'Dutch\r', 0, '2016-07-14 04:59:50', '2015-04-20 00:29:16'),
(24, 'no_NO', 'Norwegian\r', 0, '2016-07-14 04:59:42', '2015-04-20 00:29:16'),
(25, 'pl_PL', 'Polish\r', 0, '2016-07-14 04:59:41', '2015-04-20 00:29:16'),
(27, 'pt_PT', 'Portuguese\n', 0, '2016-11-20 08:57:59', '2015-04-20 00:29:16'),
(28, 'ru_RU', 'Russian\r', 0, '2016-07-14 04:59:46', '2015-04-20 00:29:16'),
(29, 'sv_SE', 'Swedish\r', 0, '2016-07-14 04:59:43', '2015-04-20 00:29:16'),
(30, 'sk_SK', 'Slovak\r', 0, '2016-07-14 04:59:44', '2015-04-20 00:29:16'),
(31, 'th_TH', 'Thai\r', 0, '2016-10-11 05:36:46', '2015-04-20 00:29:16'),
(32, 'tr_TR', 'Turkish\r', 0, '2016-07-14 04:59:38', '2015-04-20 00:29:16'),
(33, 'uk_UA', 'Ukranian\r', 0, '2016-07-14 04:59:35', '2015-04-20 00:29:16'),
(34, 'vi_VN', 'Vietnamese\r', 0, '2016-07-14 04:58:43', '2015-04-20 00:29:16'),
(35, 'zh_TW', 'Traditional Chinese\r', 0, '2016-07-14 04:58:15', '2015-04-20 00:29:16'),
(36, 'zh_CN', 'Simplified Chinese', 0, '2016-07-22 09:04:06', '2015-04-20 00:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `cms_member`
--

CREATE TABLE IF NOT EXISTS `cms_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery` text COLLATE utf8_unicode_ci NOT NULL,
  `member_status` int(11) NOT NULL,
  `member_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `member_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `cms_member`
--

INSERT INTO `cms_member` (`member_id`, `title`, `firstname`, `middlename`, `lastname`, `nickname`, `email`, `password`, `avatar`, `address`, `city`, `state`, `zipcode`, `country`, `phone`, `fax`, `delivery`, `member_status`, `member_updated`, `member_entered`) VALUES
(10, 'Mr.', 'P.Pana', '', 'Suwannawut', 'Dave', 'dimeoxide@gmail.com', '1234', 'uploads/avatar/members/00010/avatar.jpeg', '60/85 M1 Chalong', 'Muang', 'Phuket', '83130', 'TH', '12345678', '987654321', '{"address":"60\\/85 M1 Chalong","city":"Muang","state":"Phuket","zipcode":"83130","country":"TH"}', 1, '2016-09-08 04:45:57', '2016-08-15 22:08:56'),
(21, '', 'P.Pana', '', 'Suwannawut', '', 'codepaul.s@gmail.com', '1234', '', '60/85 M 1 Chalong', 'Maung', 'Phuket', '83130', 'TH', '12345678', '23456789', '', 0, '2016-12-09 00:47:40', '0000-00-00 00:00:00'),
(22, '', '', '', '', '', 'dj44@yahoo.com', 'dj44', '', '', '', '', '', '', '', '', '', 0, '2016-12-19 19:04:29', '0000-00-00 00:00:00'),
(23, '', '', '', '', '', 'admin@example.com', 'demo', '', '', '', '', '', '', '', '', '', 0, '2016-12-20 02:03:58', '0000-00-00 00:00:00'),
(24, '', '', '', '', '', 'tiguw@fulvie.com', '123456', '', '', '', '', '', '', '', '', '', 0, '2016-12-20 08:43:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_newsletter`
--

CREATE TABLE IF NOT EXISTS `cms_newsletter` (
  `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unsubscribe` int(11) NOT NULL,
  `newsletter_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `newsletter_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`newsletter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cms_newsletter`
--

INSERT INTO `cms_newsletter` (`newsletter_id`, `email`, `unsubscribe`, `newsletter_updated`, `newsletter_entered`) VALUES
(7, 'dimeoxide@gmail.com', 0, '2016-08-24 02:46:10', '2016-08-23 21:46:10'),
(8, 'dd@sss.cc', 0, '2016-08-25 04:01:54', '2016-08-24 23:01:54'),
(9, 'ddd@ss.cccc', 0, '2016-08-25 04:02:07', '2016-08-24 23:02:07'),
(10, 'ddd@sss.aaaa', 0, '2016-09-24 15:42:46', '2016-09-24 10:42:46'),
(11, 'eeee@sssssss.dddd', 0, '2016-09-24 15:43:03', '2016-09-24 10:43:03'),
(12, 'lala@www.ccc', 0, '2016-09-24 15:46:03', '2016-09-24 10:46:03'),
(13, 'bakkk2@www.cc', 0, '2016-09-24 15:49:17', '2016-09-24 10:49:17'),
(14, 'codepaul.s@gmail.net', 0, '2016-09-24 15:49:58', '2016-09-24 10:49:58'),
(15, 'doeo@ww.cc', 0, '2016-09-30 01:12:30', '2016-09-29 20:12:30'),
(16, 'ddd@sss.cccc', 0, '2016-09-30 23:22:45', '2016-09-30 18:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE IF NOT EXISTS `cms_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `page_display_order` int(11) NOT NULL,
  `page_status` int(11) NOT NULL,
  `page_date` datetime NOT NULL,
  `page_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `page_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`page_id`, `page_slug`, `page_menu`, `page_title`, `page_detail`, `page_display_order`, `page_status`, `page_date`, `page_updated`, `page_entered`) VALUES
(1, 'about-us', 'About Us', 'About Us', '<p>Ei mel laudem comprehensam. Ex mel mandamus concludaturque, duo ut magna aliquam laboramus. Sea zril utamur viderer et. Eos vidisse assueverit ei, diam dolore urbanitas an per. Eam in dicta inermis recteque, id mei eros appareat, melius regione accommodare in has.<br><br>Pro at maiorum appareat, vim an aperiam neglegentur, mel amet homero numquam te. Duis equidem moderatius qui at. Amet legimus perpetua id per, quem ullum consectetuer pri cu. Ne mea impetus invenire, ex singulis definitionem pri. Per in vivendum aliquando tincidunt. In laoreet posidonium definitiones eam.<br></p>', 1, 1, '1969-12-31 19:00:00', '2016-09-20 22:53:14', '2016-09-17 03:15:42'),
(2, 'contact-us', 'Contact Us', 'Contact Us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>', 2, 1, '2016-09-17 00:00:00', '2016-09-30 00:55:06', '2016-09-17 03:28:44'),
(3, 'faqs', 'FAQs', 'FAQs', '<div class="solidBgTitle">\r\n  <div class="panel-group" id="accordionSolid">\r\n    <div class="panel panel-default"> <a class="panel-heading accordion-toggle active" data-toggle="collapse" data-parent="#accordionSolid" href="#collapse-aa" aria-expanded="true"> <span>How can I manage Instant Book settings?</span> <i class="indicator fa  pull-right fa-minus"></i> </a>\r\n      <div id="collapse-aa" class="panel-collapse active collapse in" aria-expanded="true" style="">\r\n        <div class="panel-body">\r\n          <div class="media">\r\n            <div class="media-body">\r\n              <h4 class="media-heading">Story &amp; History</h4>\r\n              <p>Lorem ipsum dolor sit amet, consectetur adipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet.</p>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n    <div class="panel panel-default"> <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionSolid" href="#collapse-bb" aria-expanded="false"> <span>How do I list multiple rooms?</span> <i class="indicator fa  pull-right fa-plus"></i> </a>\r\n      <div id="collapse-bb" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">\r\n        <div class="panel-body">\r\n          <div class="media"> \r\n            <div class="media-body">\r\n              <h4 class="media-heading">Story &amp; History</h4>\r\n              <p>Lorem ipsum dolor sit amet, consectetur adipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet.</p>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n    <div class="panel panel-default"> <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionSolid" href="#collapse-cc" aria-expanded="false"> <span>How do I use my calendar?</span> <i class="indicator fa fa-plus  pull-right"></i> </a>\r\n      <div id="collapse-cc" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">\r\n        <div class="panel-body">\r\n          <div class="media"> \r\n            <div class="media-body">\r\n              <h4 class="media-heading">Story &amp; History</h4>\r\n              <p>Lorem ipsum dolor sit amet, consectetur adipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet.</p>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n    <div class="panel panel-default"> <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionSolid" href="#collapse-dd" aria-expanded="false"> <span>How do I make reservation?</span> <i class="indicator fa fa-plus  pull-right"></i> </a>\r\n      <div id="collapse-dd" class="panel-collapse collapse" aria-expanded="false">\r\n        <div class="panel-body">\r\n          <div class="media"> \r\n            <div class="media-body">\r\n              <h4 class="media-heading">Story &amp; History</h4>\r\n              <p>Lorem ipsum dolor sit amet, consectetur adipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet.</p>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>', 3, 1, '2016-09-16 11:34:00', '2016-09-30 00:12:51', '2016-09-17 03:35:37'),
(4, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, sea an justo ornatus philosophia, atqui ceteros tractatos est ea. In sit habeo populo placerat. Ut nam enim sapientem. Cum ad veri virtute bonorum, elit delicata nec ex. Has ea brute equidem, nullam persecuti accommodare cum ut. Te rebum maiorum consulatu pri.<br><br>Te sea prompta praesent eloquentiam, veri nostrum disputationi his et, eu option oporteat quo. Salutandi scripserit intellegebat ex eum. No pri minimum periculis, illum liber virtute te mea. Appareat mandamus qui te, nam sale appareat ut. Novum eloquentiam id sit, mea ne nominavi elaboraret.<br><br>Movet alienum expetendis eu per. Te quod repudiare constituam nec. Harum perfecto pri id. Nobis oporteat no eam, eum soleat dolores cu, sea quas diceret disputando ei.<br><br>Elit viris delectus et eos, ad has oblique noluisse mandamus. An platonem assentior vel. Ex elit fastidii eam, pro omnes pericula eu. Ex mollis constituam persequeris ius, iusto scribentur dissentiet eu cum, noster dolorum assueverit ne has.<br><br>An zril detraxit accommodare eam, posidonium suscipiantur est id, eum ex postea meliore minimum. Ad fierent gloriatur intellegebat mei. Per ne aliquam dissentiet, oratio possim nusquam sit eu, mea tollit mandamus ne. Te vitae quodsi nec, his aperiri vocibus id. Per legere oportere forensibus id, sit ridens delicata instructior et, cum meliore maluisset definiebas ex.<br></p>', 4, 1, '2016-09-29 03:04:00', '2016-09-29 13:05:08', '2016-09-29 08:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `cms_payment`
--

CREATE TABLE IF NOT EXISTS `cms_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `customer` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_delivery` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` text COLLATE utf8_unicode_ci NOT NULL,
  `cost` float(8,2) NOT NULL,
  `tax` float(8,2) NOT NULL,
  `delivery` float(8,2) NOT NULL,
  `total` float(8,2) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `pickup_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_payment`
--

INSERT INTO `cms_payment` (`id`, `code`, `member_id`, `customer`, `customer_delivery`, `customer_email`, `item`, `cost`, `tax`, `delivery`, `total`, `currency`, `payment_type`, `payment_status`, `payment_detail`, `pickup_area`, `payment_updated`, `payment_entered`) VALUES
(1, '', 10, '{"firstname":"P.Pana","lastname":"Suwannawut","address":"60\\/85 M1 Chalong","city":"Muang","state":"Phuket","zipcode":"83130","country":"TH","phone":"12345678","fax":"987654321"}', '{"address":"60\\/85 M1 Chalong","city":"Muang","state":"Phuket","zipcode":"83130","country":"TH"}', 'dimeoxide@gmail.com', '[{"id":"4","code":"PD16103","name":"Skid Row","options":"","unit":"1","unit_price":"18000.00","total_cost":18000,"total_tax":"0.00","total":"18000.00"}]', 18000.00, 0.00, 800.00, 18800.00, 'THB', 'Bank Transfer', 'Pending', 'Bank Transfer', '', '2016-09-21 13:01:50', '2016-09-21 08:01:50'),
(2, '', 0, '{"firstname":"P.Pana","lastname":"Suwannawut","address":"34\\/17 Moo 3, Chaofa West Rd., Vichit","city":"Muang","state":"Phuket","zipcode":"83000","country":"TH","phone":"123456","fax":"123456789"}', '', 'codepaul.s@gmail.com', '[{"id":"11","name":" Phi Phi Islands + Bamboo Island by Speedboat","checkin":"2016-12-29","adults":"4","child":"2","cost":"6000.00","tax":"600.00","total":"6600.00","currency":"THB"},{"id":"10","name":" Phi Phi Islands + Bamboo Island by Speedboat","checkin":"2016-12-29","adults":"5","child":"2","cost":"7050.00","tax":"705.00","total":"7755.00","currency":"THB"}]', 14355.00, 1305.00, 0.00, 14355.00, 'THB', 'Bank Transfer', 'Pending', 'Bank Transfer', '', '2016-12-01 10:50:05', '2016-12-01 10:50:05'),
(3, '', 0, '{"firstname":"P.Pana","lastname":"Suwannawut","address":"60\\/85 M 1 Chalong","city":"Maung","state":"Phuket","zipcode":"83130","country":"TH","phone":"123123123","fax":"234234234"}', '', 'codepaul.s@gmail.com', '[{"id":"13","name":" Phi Phi Islands + Bamboo Island by Speedboat","checkin":"2017-02-14","adults":"4","child":"2","cost":"6000.00","tax":"600.00","total":"6600.00","currency":"THB"},{"id":"12","name":" Phi Phi Islands + Bamboo Island by Speedboat","checkin":"2016-12-21","adults":"5","child":"2","cost":"7050.00","tax":"705.00","total":"7755.00","currency":"THB"}]', 14355.00, 1305.00, 0.00, 14355.00, 'THB', 'Bank Transfer', 'Pending', 'Bank Transfer', '', '2016-12-01 13:12:21', '2016-12-01 13:12:21'),
(4, '', 0, '{"firstname":"P.Pana","lastname":"Suwannawut","address":"Phuket","city":"qwe","state":"wqewqe","zipcode":"qeq","country":"TH","phone":"123123","fax":"123123"}', '', 'dimeoxide@gmail.com', '[{"id":"57","name":" oneway Altis Area 3 - Area 4","checkin":"2016-12-20","time":"16:15:00","adults":"4","child":"0","cost":"667.00","tax":"66.70","total":"733.70","currency":"THB"}]', 733.70, 66.70, 0.00, 733.70, 'THB', 'Bank Transfer', 'Pending', 'Bank Transfer', ' Pick up area', '2016-12-20 09:12:57', '2016-12-20 09:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `cms_payment_setting`
--

CREATE TABLE IF NOT EXISTS `cms_payment_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `default_payment` int(1) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_payment_setting`
--

INSERT INTO `cms_payment_setting` (`id`, `type`, `detail`, `default_payment`, `updated`, `entered`) VALUES
(2, 'PayPal', '{"username":"codepaul.s@gmail.com"}', 0, '2016-09-15 07:56:16', '2016-08-11 07:44:29'),
(3, 'Bank Transfer', '{"swift":"BKKBTHBK","bankname":"Bangkok Bank","branch":"Pathum Thani","accountnumber":"101-3-44471-4","accounttype":"Saving","accountname":"CodePaul Co., Ltd"}', 1, '2016-12-01 13:06:59', '2016-08-11 07:45:48'),
(6, 'Credit Card', '{"credit":["VISA","MasterCard"]}', 0, '2016-12-01 13:07:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_property`
--

CREATE TABLE IF NOT EXISTS `cms_property` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jwplayer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `property_tax` int(11) NOT NULL,
  `property_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `property_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_property`
--

INSERT INTO `cms_property` (`property_id`, `property_name`, `property_address`, `property_city`, `property_state`, `property_zipcode`, `property_country`, `property_email`, `property_website`, `property_phone`, `property_mobile`, `property_fax`, `property_location`, `jwplayer`, `social`, `lang`, `currency`, `property_tax`, `property_updated`, `property_entered`) VALUES
(1, 'CodePaul Co., Ltd.', '60/85 Chaofah Rd.,  Vichit  ', 'Mueang', 'Phuket', '83100', 'TH', 'codepaul.s@gmail.com', 'http://www.codepaul.com/', '084 555 7896', '084 559 8874', '084 254 8874', '7.8512576,98.3586893', '9058HSN0BefgrDtxIJ/kXQtFaGYAxIhxI+NMug==', '{"facebook":"#","twitter":"#","google":"#","instagram":"#","pinterest":"#","linkedin":"#","youtube":"#"}', 'en_US', 'THB', 10, '2016-11-06 05:01:15', '2016-07-12 06:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `cms_seo`
--

CREATE TABLE IF NOT EXISTS `cms_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_seo`
--

INSERT INTO `cms_seo` (`id`, `title`, `description`, `keywords`, `author`, `lang`, `updated`, `entered`) VALUES
(1, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', 'Te sea iuvaret menandri, quidam audiam definitiones an pri, te facer eirmod consulatu pro. Minim reformidans ius et, sed cu paulo iracundia appellantur.', 'Lorem, ipsum, dolor, sit, amet ', '', 'en_US', '2016-12-13 10:46:12', '2016-08-20 03:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `cms_shipping`
--

CREATE TABLE IF NOT EXISTS `cms_shipping` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `weight1` int(11) NOT NULL,
  `weight2` int(11) NOT NULL,
  `rate` float(8,2) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cms_shipping`
--

INSERT INTO `cms_shipping` (`shipping_id`, `country`, `weight1`, `weight2`, `rate`, `currency`, `entered`) VALUES
(1, 'TH', 0, 1000, 150.00, 'THB', '2016-09-02 09:19:47'),
(2, 'TH', 1001, 2000, 200.00, 'THB', '2016-09-02 09:19:51'),
(3, 'TH', 2001, 3000, 250.00, 'THB', '2016-09-02 09:19:54'),
(4, 'TH', 3001, 4000, 300.00, 'THB', '2016-09-02 09:20:03'),
(5, 'TH', 4001, 5000, 350.00, 'THB', '2016-09-02 09:20:07'),
(6, 'TH', 5001, 6000, 400.00, 'THB', '2016-09-02 09:20:10'),
(7, 'TH', 6001, 7000, 450.00, 'THB', '2016-09-02 09:20:14'),
(8, 'TH', 7001, 8000, 500.00, 'THB', '2016-09-02 09:20:17'),
(9, 'TH', 8001, 9000, 550.00, 'THB', '2016-09-02 09:20:21'),
(10, 'TH', 9001, 10000, 600.00, 'THB', '2016-09-02 09:20:23'),
(11, 'TH', 10001, 1100, 650.00, 'THB', '2016-09-02 09:20:28'),
(12, 'TH', 11001, 13000, 700.00, 'THB', '2016-09-02 09:20:31'),
(13, 'TH', 13001, 15000, 750.00, 'THB', '2016-09-02 09:20:37'),
(14, 'TH', 15001, 20000, 800.00, 'THB', '2016-09-02 09:20:39'),
(15, 'TH', 21000, 25000, 1000.00, 'THB', '2016-09-02 09:20:43'),
(16, 'TH', 25001, 30000, 1200.00, 'THB', '2016-09-02 09:20:50'),
(17, 'TH', 30001, 35000, 1400.00, 'THB', '2016-09-02 09:20:56'),
(18, 'TH', 35001, 40000, 1600.00, 'THB', '2016-09-02 09:21:02'),
(19, 'TH', 40001, 45000, 1800.00, 'THB', '2016-09-02 09:21:07'),
(20, 'TH', 45001, 50000, 2000.00, 'THB', '2016-09-02 09:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `cms_slider`
--

CREATE TABLE IF NOT EXISTS `cms_slider` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slide_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_slider`
--

INSERT INTO `cms_slider` (`slide_id`, `slide_title`, `slide_description`, `slide_message`, `slide_label`, `url`, `slide_updated`, `slide_entered`) VALUES
(1, 'Veri tation ad sit', 'Mei dicam veritus cotidieque', 'Has eu novum inermis explicari', 'Read More', '#', '2016-09-16 05:58:03', '2016-08-21 22:21:06'),
(2, 'Veri tation ad sit', 'Mei dicam veritus cotidieque', 'Has eu novum inermis explicari', 'Read More', '#', '2016-09-16 05:56:18', '2016-08-21 22:26:28'),
(4, 'Veri tation ad sit', 'Mei dicam veritus cotidieque', 'Has eu novum inermis explicari', 'Read More', '#', '2016-09-16 05:55:43', '2016-08-21 23:07:57'),
(5, 'Veri tation ad sit', 'Mei dicam veritus cotidieque', 'Has eu novum inermis explicari', 'Read More', '#', '2016-09-16 05:52:19', '2016-08-21 23:08:28'),
(6, '  Pimaflex Multipipe', 'Pimaflex multipipe', ' combines all the benefits of plastic  and metal in one pipe.', 'See More', '#', '2016-09-03 08:45:30', '2016-09-03 02:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `cms_slider_lang`
--

CREATE TABLE IF NOT EXISTS `cms_slider_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `slide_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_slider_lang`
--

INSERT INTO `cms_slider_lang` (`id`, `lang`, `slide_id`, `title`, `description`, `message`, `label`, `entered`) VALUES
(1, 'th_TH', 5, 'การเดินทางขากลับคงจะเหงา', 'ฉันเฝ้าดูพายุ มันทั้งสวยงามและน่ากลัว', 'ดวงจันทร์ซ่อนหน้าอยู่ในเงามืด', 'อ่านต่อ', '2016-09-16 12:49:37'),
(2, 'th_TH', 4, 'การเดินทางขากลับคงจะเหงา', 'ฉันเฝ้าดูพายุ มันทั้งสวยงามและน่ากลัว', 'ดวงจันทร์ซ่อนหน้าอยู่ในเงามืด', 'อ่านต่อ', '2016-09-16 12:50:21'),
(3, 'th_TH', 2, 'การเดินทางขากลับคงจะเหงา', 'ฉันเฝ้าดูพายุ มันทั้งสวยงามและน่ากลัว', 'ดวงจันทร์ซ่อนหน้าอยู่ในเงามืด', 'อ่านต่อ', '2016-09-16 12:51:39'),
(4, 'th_TH', 1, 'การเดินทางขากลับคงจะเหงา', 'ฉันเฝ้าดูพายุ มันทั้งสวยงามและน่ากลัว', 'ดวงจันทร์ซ่อนหน้าอยู่ในเงามืด', 'อ่านต่อ', '2016-09-16 12:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `cms_slider_upload`
--

CREATE TABLE IF NOT EXISTS `cms_slider_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_id` int(11) NOT NULL,
  `upload_id` int(11) NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `cms_slider_upload`
--

INSERT INTO `cms_slider_upload` (`id`, `slide_id`, `upload_id`, `entered`) VALUES
(4, 3, 4, '2016-08-22 03:58:32'),
(30, 4, 2, '2016-09-26 12:27:26'),
(32, 5, 4, '2016-09-26 12:31:14'),
(33, 2, 5, '2016-09-26 12:32:28'),
(34, 1, 6, '2016-09-26 12:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `cms_term`
--

CREATE TABLE IF NOT EXISTS `cms_term` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `term_description` text COLLATE utf8_unicode_ci NOT NULL,
  `term_default` int(11) NOT NULL,
  `term_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `term_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_term`
--

INSERT INTO `cms_term` (`term_id`, `term_title`, `term_description`, `term_default`, `term_updated`, `term_entered`) VALUES
(2, 'Default - Terms & Conditions', 'Lorem ipsum dolor sit amet, eu pri facer graecis, mei dolor timeam singulis ex. Vis cibo verterem consectetuer ut, dicam fastidii conclusionemque eum et. Tibique incorrupte pri ea, nam omnesque expetenda consequat et. Id mea maiorum partiendo, ne modo aliquid mei, cu affert tritani his. Et quod oporteat adolescens has, vis aperiam atomorum ea. Vis dicant maiorum ad, prima paulo nobis ut per, saperet posidonium te vel.\r\n\r\nNec an homero deleniti nominati, vix agam maiestatis adversarium no. Ne mei prompta moderatius constituam. Eum te movet fuisset dissentiunt, putent recteque principes ne ius. Impedit alienum omnesque an vim. Pertinax vulputate cu nam, stet erroribus eos in.\r\n\r\nElit novum aperiri vis ei. Vix inani salutatus deseruisse at. Te alienum appareat mei, utinam mucius te mel, augue quidam constituto vel ex. Eos id justo atomorum, no atomorum disputationi consequuntur has, insolens inciderint ius et. Enim iuvaret repudiare per ad, sea an sale everti aeterno.\r\n\r\nEi decore semper qui, pro in singulis gloriatur honestatis. Id reque justo quaestio nam. Quod augue accusata id nec. Feugait accusamus persequeris ne cum. Ius erant iudico propriae te. At pro placerat verterem signiferumque.\r\n\r\nVim congue oratio et, ex mei fugit inermis. Per dolore essent oportere id, electram expetendis adipiscing has te. Ex vitae admodum intellegebat nam, oratio deleniti vivendum in nec. An natum voluptua sed, vis ei dolorem indoctum.', 1, '2016-11-09 21:49:24', '0000-00-00 00:00:00'),
(3, 'Transfer Terms', 'Transfer Terms & Conditions\r\n\r\nPer eu unum nostrud vivendo, est nisl stet impedit id, est vidisse interesset accommodare ut. Quo semper prompta assueverit ex. Sit no vocent viderer. Eius equidem democritum qui no, eam elit etiam possim ut, errem graeco cum in. No vel vidit adversarium deterruisset.\r\n\r\nAt sed inermis perpetua, eos viris ridens tibique id, at nulla iudicabit ius. Nulla eruditi cotidieque mei et. Amet novum nostrud his ea. Ex est pericula evertitur reformidans. At qui postea recteque, an nostro recusabo dignissim ius.\r\n\r\nSea an utroque mediocrem maluisset, ad quaeque legimus vel. Id quis adolescens vel, cum et alii apeirian. Nec zril rationibus at, no nam intellegat persequeris reformidans, unum aliquando pri ad. His ei hinc disputando, falli mundi te eam, vide minim assueverit sit ad. Nec ne augue vitae, est dicant labores antiopam an, explicari complectitur ex mei. Nam cu inermis intellegam, his prima affert pericula te.\r\n\r\nCu qui habemus salutandi adolescens, an vix probo alterum. Ei appellantur reformidans usu, simul accommodare ex vix. Omnis illud aliquid in quo, discere facilis eos ut. Eam ad dicat assum hendrerit, modo indoctum ex mel. In suas agam dolor pro, invenire percipitur vis ex.\r\n\r\nIn soluta ignota mea. Sed putant sadipscing mediocritatem an, at odio nisl audire ius, eum ei iriure gloriatur assueverit. Nam nusquam perfecto inimicus ut, eu electram explicari vix. Pri dissentias conclusionemque at. Inani torquatos reprehendunt ad mei, meliore accusamus vis ei. Sit te saepe appetere, porro deterruisset ei qui.\r\n\r\nTempor scriptorem cu vix, et eam erroribus democritum. Ex nonumes salutatus his, ei sea quodsi integre accommodare. Illum aliquam et nec, est aeque nominati adipiscing et, quaeque minimum percipit vim te. In sit fugit minimum fierent.\r\n\r\nAn sit unum feugiat torquatos. Cum dicant vocent molestie ei, sed at meliore dissentiunt. Et posse iracundia his, causae liberavisse quo eu, natum aliquid eum id. Causae persius vocibus vim an, mundi mnesarchum per ex.\r\n\r\nQuo homero aeterno euismod ut. Eum vidit labore id, id libris doming patrioque pri. Scripta luptatum abhorreant his at, reque adolescens voluptatibus ad has, ei pro dicat percipit accusata. Novum eirmod te duo, viris scripta vel eu.\r\n\r\nId mel simul tantas audiam, mazim veniam cu cum. In commodo tibique eam. Zril patrioque cu eam, ut nec quaeque scaevola. Ubique impedit intellegat mei te.\r\n\r\nQuo discere argumentum ad. Ad nam postea erroribus assentior, sit mazim molestie iudicabit at. Te putent voluptatum usu, pri duis dolore in. Ne exerci docendi postulant mel. Justo putant interesset ad pro.', 0, '2016-12-13 22:13:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_tour`
--

CREATE TABLE IF NOT EXISTS `cms_tour` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` enum('inbound','outbound') COLLATE utf8_unicode_ci NOT NULL,
  `destination_id` int(11) NOT NULL,
  `tour_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tour_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tour_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tour_rating` int(11) NOT NULL,
  `tour_description` text COLLATE utf8_unicode_ci NOT NULL,
  `tour_overview` text COLLATE utf8_unicode_ci NOT NULL,
  `tour_specifications` text COLLATE utf8_unicode_ci NOT NULL,
  `tour_inclusion` text COLLATE utf8_unicode_ci NOT NULL,
  `tour_period` int(11) NOT NULL,
  `tour_cutof` int(11) NOT NULL,
  `tour_price` float(8,2) NOT NULL,
  `tour_price_cross` float(8,2) NOT NULL,
  `tour_price_child` float(8,2) NOT NULL,
  `tour_currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `tour_status` int(11) NOT NULL,
  `thumbnail` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `tour_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tour_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cms_tour`
--

INSERT INTO `cms_tour` (`tour_id`, `type`, `category`, `destination_id`, `tour_code`, `tour_slug`, `tour_name`, `tour_rating`, `tour_description`, `tour_overview`, `tour_specifications`, `tour_inclusion`, `tour_period`, `tour_cutof`, `tour_price`, `tour_price_cross`, `tour_price_child`, `tour_currency`, `tour_status`, `thumbnail`, `term_id`, `tour_updated`, `tour_entered`) VALUES
(1, 'Boat tour', 'inbound', 5, 'HKT1600001', 'phi-phi-islands-bamboo-island-by-speedboat-phuket-00001', ' Phi Phi Islands + Bamboo Island by Speedboat', 5, 'The most popular of all Phuket Tours. A speedboat tour that lets you see more and get off at every stop. Great snorkeling outside Mosquito Island. ', 'Lorem ipsum dolor sit amet, tota dicam volutpat ea pri. Alii idque viderer at pro, omnis perfecto ei his. Atqui minim qui ex, vim eu erant principes. Cum corrumpit pertinacia interesset eu, vide rationibus complectitur et mea.\r\n\r\nNisl viris voluptatibus has at, erat temporibus ex nec. Eu lorem putent qualisque eam. Everti offendit quaestio ius ad, ipsum nostrum quaerendum vim et. Dolore detraxit atomorum te duo. Te error epicuri verterem ius, amet officiis nec cu.\r\n', 'Mucius scripta dissentiet id duo, his et civibus alienum referrentur. Est ad noster oblique denique. Saepe quaeque te eum, quo illum antiopam eu, illud epicurei ne qui. Mel purto delicata euripidis ad, vix id cibo impetus ornatus. Choro legere his ut, nobis laudem pericula ut ius. Est eripuit fabellas ex, quot singulis et vix.\r\n\r\nDicunt quaerendum ne qui, et alienum tractatos eos. Ut has suscipit expetenda, alia eros utinam mel te, eos alii hendrerit complectitur no. Agam philosophia an quo, cu sea dicant putant concludaturque, ius ut eius erat quaerendum. Vel instructior contentiones ut, pri stet nonumes blandit et. No sed nisl pertinax, bonorum evertitur in ius. Graecis laboramus vim no.', 'Mucius scripta dissentiet id duo, his et civibus alienum referrentur. Est ad noster oblique denique. Saepe quaeque te eum, quo illum antiopam eu, illud epicurei ne qui. \r\n\r\nMel purto delicata euripidis ad, vix id cibo impetus ornatus. Choro legere his ut, nobis laudem pericula ut ius. Est eripuit fabellas ex, quot singulis et vix.\r\n', 0, 1, 1050.00, 1800.00, 900.00, 'THB', 1, 55, 2, '2016-12-13 21:45:20', '2016-11-24 05:48:50'),
(2, 'Animal rides', 'inbound', 2, 'HKT1600002', 'elephant-trekking-phuket-00002', 'Elephant Trekking', 5, 'Go on a fun and exciting elephant trekking at the greatest safari camp in Phuket at the Big Buddha area with fantastic views over Phuket Town, Chalong Bay, Rawai and the Andaman Archipelago. ', 'Enjoy elephant trekking at a Big Buddha Safari Camp, located on the highest point in Phuket with fantastic views over Phuket Town, Chalong Bay, Rawai and the Andaman Archipelago.\r\n\r\nEach tour includes a meeting with a baby elephant and the Elephant + ATV tour includes a 20-minutes visit to the Big Buddha statue.\r\n\r\nElephant trekking is an unforgettable experience and a great activity for kids. A platform will easily bring you into the two passenger seat on the back of the elephant. The tour guide will take you through paths on the high plain.\r\n\r\nATVs are powerful quad bikes. The tour guide will take you through dirt roads in the jungle and over hill tops.\r\n\r\n', 'The tour starts at the safari camp at 09.30, 13.00 and 16.00 ', 'Transfer round-trip\r\nAccident insurance\r\nRaincoat\r\nEnglish-speaking tour guide', 0, 1, 900.00, 0.00, 700.00, 'THB', 1, 62, 2, '2016-12-13 21:16:43', '2016-12-13 21:02:44'),
(3, 'Boat tour', 'inbound', 2, 'HKT1600003', 'coral-island-phuket-00003', 'Coral Island Tour - Haftday', 4, 'Coral Island (Koh Hae) is situated 10 km south of Phuket. The island is surrounded by multicolored coral reefs, hence the name Coral Island.', 'Take the short speedboat trip to Coral Island and enjoy great relaxing, swimming and snorkeling. In addition to that you can enjoy the following sea activities on the island:\r\n\r\n•  Scuba Diving 	-   15-60 years old, no license required, 45 minutes\r\n•  Parasailing 	-   10-60 years old, max 80 kg, 800 meters trip\r\n•  Sea Walking 	-   10-60 years old, 15-20 minutes\r\n•  Banana Boat 	-   10-60 years old, 20 minutes', 'The times and order of activities are approximate and for guideline only.\r\n11.00-12.00 	Pick-up from your hotel.\r\n12.15-12.30 	Departure by speedboat from Chalong Pier to Coral Island.\r\n12.45-16.00 	Arrive at Coral Island for relaxing and snorkeling over great coral reefs with colorful fishes and partake in various sea activities.\r\n16.00-16.15 	Return to Chalong Pier and transfer to your hotel.', 'Transfer round-trip\r\nSpeedboat with full insurance\r\nMask, snorkel and life jacket\r\nBeach chair\r\nEnglish speaking tour guide', 0, 1, 950.00, 0.00, 750.00, 'THB', 1, 63, 2, '2016-12-14 23:25:34', '2016-12-13 21:22:13'),
(4, 'Boat tour', 'inbound', 2, 'HKT1600004', 'coral-island-tour-full-day-phuket-00004', 'Coral Island Tour - Full Day ', 3, 'Coral Island (Koh Hae) is situated 10 km south of Phuket. The island is surrounded by multicolored coral reefs, hence the name Coral Island', 'Take the short speedboat trip to Coral Island and enjoy great relaxing, swimming and snorkeling. In addition to that you can enjoy the following sea activities on the island:\r\n\r\n•  Scuba Diving 	-   15-60 years old, no license required, 45 minutes\r\n•  Parasailing 	-   10-60 years old, max 80 kg, 800 meters trip\r\n•  Sea Walking 	-   10-60 years old, 15-20 minutes\r\n•  Banana Boat 	-   10-60 years old, 20 minutes', 'The times and order of activities are approximate and for guideline only.\r\n08.00-09.00 	Pick-up from your hotel.\r\n09.15-09.30 	Departure by speedboat from Chalong Pier to Coral Island.\r\n09.45-12.00 	Arrive at Coral Island. Enjoy the white sandy beach and turquoise waters as you partake in various sea activities.\r\n12.00-13.00 	Lunch at Hey Restaurant.\r\n13.00-15.00 	Back to the beach for more swimming, snorkeling and sunbathing.\r\n15.00-15.15 	Return to Chalong Pier and transfer to your hotel.', 'Transfer round-trip\r\nSpeedboat with full insurance\r\nMask, snorkel and life jacket\r\nLunch\r\nBeach chair\r\nEnglish speaking tour guide', 0, 1, 1050.00, 0.00, 800.00, 'THB', 1, 64, 2, '2016-12-13 21:29:36', '2016-12-13 21:27:08'),
(5, 'Family entertainment center', 'inbound', 2, 'HKT1600005', 'phuket-fantasea-show-phuket-00005', 'Phuket FantaSea Show', 5, 'Phuket FantaSea Show, or Fantasy of a Kingdom, is a Las Vegas style Thai cultural show infused with cutting edge technology and state-of-the-art show ', 'Phuket FantaSea Show, or Fantasy of a Kingdom, is a Las Vegas style Thai cultural show infused with cutting edge technology and state-of-the-art show elements. The essence of being Thai, everything from the love for freedom and fun, courage and compassion, is being represented in each scene.\r\n\r\nSee nine exciting shows featuring Thai culture, magic illusion, acrobatics, animal performance, pyrotechnics, stunts, aerial performance, 4-D effects, special effects. \r\n\r\n* Children under 4 years old free of charge\r\n', 'Phuket FantaSea dinner buffet is served at 18.00-21.00.\r\nPhuket FantaSea show is shown at 21.00-22.15. ', 'Free Transfer\r\nBuffet Dinner', 0, 1, 2000.00, 0.00, 2000.00, 'THB', 1, 68, 2, '2016-12-13 22:21:26', '2016-12-13 22:17:40'),
(6, 'Family entertainment center', 'inbound', 2, 'HKT1600006', 'simon-cabaret-phuket-phuket-00006', 'Simon Cabaret Phuket', 3, 'Simon Cabaret Phuket has established itself as a market leader in professional entertainment. The set designs are outstanding.', 'Simon Cabaret Phuket has established itself as a market leader in professional entertainment. The set designs are outstanding, the costumes extravagant and the performers glamorous. The show is truly international featuring modern and traditional acts from around the globe in English and alternative languages. You will arrive relaxed but will leave confused as our performers are more of a man than you will ever be and even more of a woman too! ', 'Simon Cabaret Phuket Show is shown at the following functions:\r\nCoral Islands  18.00\r\nCoral Islands  19.30\r\nCoral Islands  21.00 ', 'Free Transfer', 0, 1, 1000.00, 0.00, 800.00, 'THB', 1, 69, 2, '2016-12-13 22:24:40', '2016-12-13 22:22:59'),
(7, 'Family entertainment center', 'inbound', 2, 'HKT1600007', 'siam-niramit-show-phuket-00007', 'Siam Niramit Show', 2, 'Siam Niramit is a world-class performance of Thailand''s arts and cultural heritage.This must-see spectacular show features over 100 performers', 'Siam Niramit is a world-class performance of Thailand''s arts and cultural heritage.\r\n\r\nThis must-see spectacular show features over 100 performers, lavish costumes and stunning set designs.\r\n\r\nEnhanced special effects and the world''s most advanced technology are used to produce a very realistic, stimulating and inspiring experience. \r\n\r\n* Siam Niramit Phuket is closed on Tuesdays ', 'Siam Niramit Phuket show is shown at 20.30-21.40.\r\nSiam Niramit Phuket dinner buffet is served at 18.00-20.30. ', 'Free Transfer\r\nDinner', 0, 1, 1500.00, 0.00, 1500.00, 'THB', 1, 70, 2, '2016-12-13 22:28:37', '2016-12-13 22:26:15'),
(8, 'Boat tour', 'inbound', 2, 'HKT1600008', 'big-game-fishing-at-raya-yai-island-phuket-00008', 'Big Game Fishing at Raya Yai Island', 2, 'The game fishing is typically carried out around the Raya (Racha) Islands, 25 km south of Phuket. In these warm waters there are plentiful.', 'The game fishing is typically carried out around the Raya (Racha) Islands, 25 km south of Phuket. In these warm waters there are plentiful of catch all year around such as sailfish, black marlin, billfish and several varieties of tuna to name a few. During the monsoon season from late May until November the catch may also include wahoo, barracuda and varieties of mackerel. ', 'Transfer round-trip\r\nFishing Equipment\r\nFishing boat with full insurance\r\nMask and snorkel\r\nLunch', 'This fishing tour is taking you trolling back and forth to Raya Yai Island where you will enjoy bottom fishing. \r\n\r\nThe times and order of activities are approximate and for guideline only.\r\n08.00-08.30 	Pick-up from your hotel.\r\n09.00 	Departure from Chalong Pier.\r\n09.30 	Trolling starts to Raya Yai Island.\r\n12.00 	Lunch, swimming and relaxing.\r\n13.45 	Bottom fishing and trolling back to Chalong Bay.\r\n17.00 	Return to Chalong Pier and transfer to your hotel.', 0, 1, 1400.00, 2000.00, 1200.00, 'THB', 1, 71, 2, '2016-12-13 22:31:40', '2016-12-13 22:30:20'),
(9, 'Heritage trails', 'inbound', 6, 'kxx1600009', 'khao-lak-safari-1-day-tour-khao-lak-00009', 'Khao Lak Safari - 1 Day Tour ', 1, 'A full-fledged jungle safari can be experienced in Khao Sok National Park, 110 km north of Phuket, rivaling the jungle safari tours offered.', 'A full-fledged jungle safari can be experienced in Khao Sok National Park, 110 km north of Phuket, rivaling the jungle safari tours offered in Northern Thailand. Experience elephant trekking, walking jungle trekking, river canoeing, bamboo rafting, jungle or floating lodging, long-tail boat trips and lake boat night safaris in the jungle and in the tropical rain forest. Khao Lak National Park offers a lighter version of jungle safari. \r\n\r\nTry bamboo rafting, elephant trekking and walking trekking to a waterfall where you can enjoy a relaxing swim. ', 'The times and order of activities are approximate and for guideline only.\r\n07.30 	Pick-up from your hotel\r\n08.40 	Pineapple farm\r\n	Temple\r\n	Elephant trekking 30 minutes\r\n	Elephant show\r\n	Lunch\r\n	Bamboo rafting\r\n	Turtle farm\r\n	Fruit market\r\n17.00 	Return to your hotel', 'Transfer round-trip\r\nLunch\r\nEnglish-speaking tour guide\r\nNational park fee\r\nInsurance', 0, 1, 1200.00, 0.00, 1000.00, 'THB', 1, 73, 2, '2016-12-13 22:38:17', '2016-12-13 22:36:54'),
(10, 'Boat tour', 'inbound', 7, 'kha1600010', 'khao-sok-safari-1-day-tour-suratthani-00010', 'Khao Sok Safari - 1 Day Tour       ', 5, 'A full-fledged jungle safari can be experienced in Khao Sok National Park, 110 km north of Phuket, rivaling the jungle', 'Per eu unum nostrud vivendo, est nisl stet impedit id, est vidisse interesset accommodare ut. Quo semper prompta assueverit ex. Sit no vocent viderer. Eius equidem democritum qui no, eam elit etiam possim ut, errem graeco cum in. No vel vidit adversarium deterruisset.\r\n\r\nAt sed inermis perpetua, eos viris ridens tibique id, at nulla iudicabit ius. Nulla eruditi cotidieque mei et. Amet novum nostrud his ea. Ex est pericula evertitur reformidans. At qui postea recteque, an nostro recusabo dignissim ius.', 'The times and order of activities are approximate and for guideline only.\r\n07.00-08.30 	Pick-up from your hotel.\r\n09.00 	Coffee break in a restaurant at Khao Lak View Point.\r\n09.30 	Visit Tsunami Museum.\r\n10.45 	Arrive at Khao Sok National Park for elephant trekking (60 min) following the creek into the tropical rainforest.\r\n12.15 	Stop at Khao Sok scenic viewpoint.\r\n12.30 	Visit Monkey Cave temple.\r\n13.00 	Lunch in the jungle camp restaurant by Khao Sok river.\r\n14.00 	Canoeing or bamboo rafting (60 min) down Khao Sok river to watch animals and limestone mountains.\r\n15.30 	Departure from Khao Sok.\r\n18.00-19.00 	Arrival at your hotel.', 'Transfer round-trip\r\nElephant riding\r\nCanoeing or bamboo rafting\r\nLunch\r\nEnglish-speaking tour guide\r\nNational park fee\r\nInsurance', 0, 1, 1900.00, 2900.00, 1500.00, 'THB', 1, 75, 2, '2016-12-13 22:48:34', '2016-12-13 22:46:44'),
(11, 'Animal rides', 'inbound', 7, 'kha1600011', 'at-sed-inermis-perpetua-eos-viris-ridens-tibique-suratthani-00011', 'At sed inermis perpetua, eos viris ridens tibique', 1, 'Per eu unum nostrud vivendo, est nisl stet impedit id, est vidisse interesset accommodare ut. Quo semper prompta assueverit ex. Sit no vocent viderer.', 'Duo cu sumo omnes, vis ut complectitur voluptatibus, nec legere euripidis ne. Quo summo sensibus cu, illum senserit ne eum. Qui at case regione petentium. An enim quas ocurreret quo. Nonumy quaestio scripserit ne pri, diam essent interesset ei eam. Diam propriae at est.\r\n\r\nHabeo adolescens ut eos. Nullam labore gloriatur sed ut, sit et cibo conceptam. Quis persequeris et his. Cu duo eirmod postulant, est eu wisi dissentiet, per ea veniam decore. Vis cu liber nusquam, eu amet deserunt sit.', 'Duo cu sumo omnes, vis ut complectitur voluptatibus, nec legere euripidis ne. Quo summo sensibus cu, illum senserit ne eum. Qui at case regione petentium. An enim quas ocurreret quo. Nonumy quaestio scripserit ne pri, diam essent interesset ei eam. Diam propriae at est.\r\n\r\nHabeo adolescens ut eos. Nullam labore gloriatur sed ut, sit et cibo conceptam. Quis persequeris et his. Cu duo eirmod postulant, est eu wisi dissentiet, per ea veniam decore. Vis cu liber nusquam, eu amet deserunt sit.', 'Duo cu sumo omnes, vis ut complectitur voluptatibus, nec legere euripidis ne. Quo summo sensibus cu, illum senserit ne eum. Qui at case regione petentium. An enim quas ocurreret quo. Nonumy quaestio scripserit ne pri, diam essent interesset ei eam. Diam propriae at est.\r\n\r\nHabeo adolescens ut eos. Nullam labore gloriatur sed ut, sit et cibo conceptam. Quis persequeris et his. Cu duo eirmod postulant, est eu wisi dissentiet, per ea veniam decore. Vis cu liber nusquam, eu amet deserunt sit.', 0, 1, 800.00, 1200.00, 600.00, 'THB', 1, 76, 2, '2016-12-13 22:51:24', '2016-12-13 22:50:36'),
(12, 'Duck tour', 'inbound', 2, 'HKT1600012', 'eam-vocent-vulputate-persequeris-ut-phuket-00012', 'Eam vocent vulputate persequeris ut', 5, 'Lorem ipsum dolor sit amet, in per deserunt dissentiet, no cum nostrud utroque. Ius ei modus summo hendrerit, facete perfecto insolens mel et. Has cu ', 'Eam vocent vulputate persequeris ut. Error partiendo qui ea, no vivendum appellantur duo. Omnis homero comprehensam no vis, brute libris platonem his an. Vix in etiam labore liberavisse. Est iusto aliquando in. Veniam eloquentiam disputationi ei pri.\r\n\r\nLudus possit voluptua cu vel, omnis molestiae elaboraret id qui. Minim movet oporteat ius ea, has ne integre petentium inciderint. Cu est posse liber, utamur invenire ne nec. Pri te tota commodo similique.', 'Eam vocent vulputate persequeris ut. Error partiendo qui ea, no vivendum appellantur duo. Omnis homero comprehensam no vis, brute libris platonem his an. Vix in etiam labore liberavisse. Est iusto aliquando in. Veniam eloquentiam disputationi ei pri.\r\n\r\nCommodo equidem ad sit, ei eos epicurei insolens inimicus. Vix iusto inermis eu, mei ea assum homero consulatu. Nam ad sumo eruditi oporteat, nusquam eleifend at his, doming detraxit ei has. Cu sit rebum fabellas repudiare. Eum erant veritus tibique ea.\r\n\r\nEt impedit menandri consetetur pri, eu soluta vocibus maiorum vix. Id nam illum homero. Mutat admodum conceptam sea ex, cum offendit deseruisse ex, id mea aeterno ponderum petentium. Assum munere vis et, cu meliore accommodare pro. Everti partiendo ea pri.', 'Eam vocent vulputate persequeris ut. Error partiendo qui ea, no vivendum appellantur duo. Omnis homero comprehensam no vis, brute libris platonem his an. Vix in etiam labore liberavisse. Est iusto aliquando in. Veniam eloquentiam disputationi ei pri.\r\n', 1, 1, 1200.00, 1800.00, 850.00, 'THB', 1, 77, 2, '2016-12-14 11:53:40', '2016-12-14 11:49:20'),
(13, 'Active mobility', 'outbound', 8, 'NRT1600013', 'volunteer-guide-tours-narita-00013', 'Volunteer Guide Tours', 4, 'In brute epicurei adolescens has. Ferri sententiae per et. Te meliore vulputate vel. Suavitate euripidis complectitur et nec, no justo veritus vel.', 'In brute epicurei adolescens has. Ferri sententiae per et. Te meliore vulputate vel. Suavitate euripidis complectitur et nec, no justo veritus vel.\r\n\r\nEam tantas molestie fabellas cu, te eam admodum pertinax moderatius, eu quaeque laoreet eam. Eos an dico populo rationibus, at rebum scaevola democritum per. Ut his invenire instructior. An munere cotidieque omittantur sed, mucius efficiendi eu vel, no modus prompta euripidis sea.', 'In brute epicurei adolescens has. Ferri sententiae per et. Te meliore vulputate vel. Suavitate euripidis complectitur et nec, no justo veritus vel.\r\n\r\nEam tantas molestie fabellas cu, te eam admodum pertinax moderatius, eu quaeque laoreet eam. Eos an dico populo rationibus, at rebum scaevola democritum per. Ut his invenire instructior. An munere cotidieque omittantur sed, mucius efficiendi eu vel, no modus prompta euripidis sea.', 'In brute epicurei adolescens has. Ferri sententiae per et. Te meliore vulputate vel. Suavitate euripidis complectitur et nec, no justo veritus vel.\r\n\r\nEam tantas molestie fabellas cu, te eam admodum pertinax moderatius, eu quaeque laoreet eam. Eos an dico populo rationibus, at rebum scaevola democritum per. Ut his invenire instructior. An munere cotidieque omittantur sed, mucius efficiendi eu vel, no modus prompta euripidis sea.', 0, 3, 12000.00, 15000.00, 8000.00, 'THB', 1, 79, 2, '2016-12-15 22:20:02', '2016-12-15 22:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `cms_tour_rate`
--

CREATE TABLE IF NOT EXISTS `cms_tour_rate` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `adult` float(8,2) NOT NULL,
  `child` float(8,2) NOT NULL,
  `rate_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_tour_rate`
--

INSERT INTO `cms_tour_rate` (`rate_id`, `tour_id`, `period_id`, `adult`, `child`, `rate_entered`) VALUES
(1, 12, 6, 1200.00, 800.00, '2016-12-14 11:50:24'),
(2, 12, 7, 2500.00, 1200.00, '2016-12-14 11:50:24'),
(3, 12, 8, 3000.00, 1800.00, '2016-12-14 11:50:24'),
(4, 12, 9, 2500.00, 1200.00, '2016-12-14 11:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `cms_upload`
--

CREATE TABLE IF NOT EXISTS `cms_upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filecaption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filedisplayorder` int(11) NOT NULL,
  `fileupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fileentered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `cms_upload`
--

INSERT INTO `cms_upload` (`upload_id`, `session_id`, `type`, `filetype`, `filepath`, `filecaption`, `filedisplayorder`, `fileupdated`, `fileentered`) VALUES
(2, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/c99420c8b6d44501f6c5c25f6404bfb7.jpeg', '', 0, '2016-09-26 12:27:26', '2016-09-26 07:27:26'),
(4, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/740732deec84c3cc2dc91b429c4b4bf8.jpeg', '', 0, '2016-09-26 12:31:14', '2016-09-26 07:31:14'),
(5, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/995b09f753114110b2f280d872df38a2.jpeg', '', 0, '2016-09-26 12:32:28', '2016-09-26 07:32:28'),
(6, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/97462a92939fe19e2705c81990c9eb31.jpeg', '', 0, '2016-09-26 12:37:36', '2016-09-26 07:37:36'),
(7, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/7a67110f14e95709325fdb333f3b64c2.jpeg', '', 0, '2016-09-26 13:13:33', '2016-09-26 08:13:33'),
(8, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/e60ae0251bc88e18e05d048ee95a65ec.jpeg', '', 0, '2016-09-26 13:14:06', '2016-09-26 08:14:06'),
(9, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/4a8835fb5524e12df467984afd0ffabe.jpeg', '', 0, '2016-09-26 13:19:21', '2016-09-26 08:19:21'),
(10, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/4f56762ee7534aa38a793d542f6b7b79.jpeg', '', 0, '2016-09-26 13:20:04', '2016-09-26 08:20:04'),
(11, '', 'image', 'image/jpeg', 'uploads/images/2016/09/26/0127e1cd5cebd9b96e4b93dd87eda8ae.jpeg', '', 0, '2016-09-26 13:20:49', '2016-09-26 08:20:49'),
(12, '', 'image', 'image/png', 'uploads/images/2016/09/29/86757b7184898ced95ba6a7fc58a058b.png', '', 0, '2016-09-29 12:00:20', '2016-09-29 07:00:20'),
(13, '', 'image', 'image/png', 'uploads/images/2016/09/29/444085651777a81d8915e0684aefa4a1.png', '', 0, '2016-09-29 12:14:33', '2016-09-29 07:14:33'),
(14, '', 'image', 'image/png', 'uploads/images/2016/09/29/c2d8bce7fee13592db75c80dc3344de4.png', '', 0, '2016-09-29 12:17:14', '2016-09-29 07:17:14'),
(15, '', 'image', 'image/png', 'uploads/images/2016/09/29/6967b375de57e813660416fbb562dcf4.png', '', 0, '2016-09-29 12:17:42', '2016-09-29 07:17:42'),
(16, '', 'image', 'image/png', 'uploads/images/2016/09/29/a8230fbf30426cee7353812252c6ceb5.png', '', 0, '2016-09-29 12:18:43', '2016-09-29 07:18:43'),
(17, '', 'image', 'image/png', 'uploads/images/2016/09/29/4a4dd3c7f04016d36ab21a3141e61c17.png', '', 0, '2016-09-29 12:19:09', '2016-09-29 07:19:09'),
(18, '', 'image', 'image/jpeg', 'uploads/images/2016/10/01/ab7fd85cc55f100dcb6fc5ba9e93ceec.jpeg', '', 0, '2016-10-01 12:08:21', '2016-10-01 07:08:21'),
(19, '', 'image', 'image/jpeg', 'uploads/images/2016/10/01/1c9f0a94f8a0f12602e49759d285f27e.jpeg', '', 0, '2016-10-01 12:13:08', '2016-10-01 07:13:08'),
(20, '', 'image', 'image/jpeg', 'uploads/images/2016/10/05/556ec9c94f0f4431df1610e33af4b154.jpeg', '', 0, '2016-10-04 22:26:15', '2016-10-04 17:26:15'),
(21, '', 'image', 'image/jpeg', 'uploads/images/2016/10/05/0eb406651566cc4e59e0021650c88f90.jpeg', '', 0, '2016-10-04 22:34:55', '2016-10-04 17:34:55'),
(22, '', 'image', 'image/png', 'uploads/images/2016/10/07/fb7dc1c870532ac57bff9ec58c23d69d.png', '', 0, '2016-10-06 22:53:11', '2016-10-06 17:53:11'),
(23, '', 'image', 'image/png', 'uploads/images/2016/10/07/c044638e2f116317078405776d953742.png', '', 0, '2016-10-06 22:54:50', '2016-10-06 17:54:50'),
(24, '', 'image', 'image/png', 'uploads/images/2016/10/11/dffe8d73fdd76617d6e7a3befb4bbb75.png', '', 0, '2016-10-11 05:51:44', '2016-10-11 00:51:44'),
(25, '', 'image', 'image/jpeg', 'uploads/images/2016/10/13/1ab866a3cdd79070bffd0582bfded71f.jpeg', '', 0, '2016-10-13 09:51:32', '2016-10-13 04:51:32'),
(26, '', 'image', 'image/jpeg', 'uploads/images/2016/10/13/75012ad300079f9753341ea26323b589.jpeg', '', 0, '2016-10-13 09:53:52', '2016-10-13 04:53:52'),
(27, '', 'image', 'image/jpeg', 'uploads/images/2016/10/23/f1f11af77a27a2524c124abd1467c635.jpeg', '', 0, '2016-10-23 09:37:28', '2016-10-23 04:37:28'),
(28, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/4ed7a7f3830f72602a6afdcefa2c1561.jpeg', '', 0, '2016-11-02 23:05:58', '2016-11-02 17:05:58'),
(29, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/80c834ac55f578add5aede6933ab86e2.jpeg', '', 1, '2016-11-02 23:05:58', '2016-11-02 17:05:58'),
(30, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/8eb6afefb20c97984139bd316dd7b60c.jpeg', '', 2, '2016-11-02 23:05:58', '2016-11-02 17:05:58'),
(31, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/e36b523ed95c513499a000b65d638ef0.jpeg', '', 3, '2016-11-02 23:05:58', '2016-11-02 17:05:58'),
(32, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/4aa56ab7a1814920f001f77a288d79fd.jpeg', '', 4, '2016-11-02 23:05:59', '2016-11-02 17:05:59'),
(33, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/ffca03928526187db804b9ac835700f1.jpeg', '', 5, '2016-11-02 23:05:59', '2016-11-02 17:05:59'),
(34, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/3d93f3368dd4b82986af5e80871163b9.jpeg', '', 6, '2016-11-02 23:05:59', '2016-11-02 17:05:59'),
(35, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/73955674977c164f795200525f68df31.jpeg', '', 7, '2016-11-02 23:05:59', '2016-11-02 17:05:59'),
(36, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/1cac04123fe7f9ce9b12a733520fde9a.jpeg', '', 8, '2016-11-02 23:05:59', '2016-11-02 17:05:59'),
(37, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/3cfa10321df2c7219ced9d13077e2b0e.jpeg', '', 9, '2016-11-02 23:05:59', '2016-11-02 17:05:59'),
(38, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/901a2978da2a1cdf946bebc6e7a9bde6.jpeg', '', 0, '2016-11-02 23:26:40', '2016-11-02 17:26:40'),
(39, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/4d092319806e5ac831ad36ba0fa4abe1.jpeg', '', 1, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(40, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/e6dfff09df3fa3d632a8cc170b2a1b8f.jpeg', '', 2, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(41, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/0a9dbb7a4595529ece2b8412927c9239.jpeg', '', 3, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(42, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/09b231b195dda5647123e331988446ab.jpeg', '', 4, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(43, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/ae8c58958fe71e97c9d3d68e951147af.jpeg', '', 5, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(44, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/56a1ea6ab911b1af0e063478d23de700.jpeg', '', 6, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(45, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/1d5fa1fb0d771d9efe9b54efc2712f67.jpeg', '', 7, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(46, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/6462e32bbe4c63db76fb6aaa7b152f9a.jpeg', '', 8, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(47, 'q6QJFBw1kJ8JLXJ', 'image', 'image/jpeg', 'uploads/images/2016/11/03/2fc57d2835c8fd62d2164ad65361348b.jpeg', '', 9, '2016-11-02 23:26:41', '2016-11-02 17:26:41'),
(48, '', 'image', 'image/jpeg', 'uploads/images/2016/11/11/d1bc40653d4b27bf967a38ba31cdcac2.jpeg', '', 0, '2016-11-11 00:31:54', '2016-11-10 18:31:54'),
(49, '', 'image', 'image/jpeg', 'uploads/images/2016/11/16/5e9e20e84d107fdda873f4ad759036c4.jpeg', '', 0, '2016-11-16 12:11:12', '2016-11-16 06:11:12'),
(50, '', 'image', 'image/jpeg', 'uploads/images/2016/11/16/b42e2809101102d14f200b56a9a8da47.jpeg', '', 0, '2016-11-16 12:11:50', '2016-11-16 06:11:50'),
(52, '', 'image', 'image/png', 'uploads/images/2016/11/17/5b5f964bc744dd196c19ec6783d65f9f.png', '', 0, '2016-11-17 00:00:41', '2016-11-16 18:00:41'),
(53, '', 'image', 'image/png', 'uploads/images/2016/11/17/15bc8aacb0b1f3035ce9e4480d7b6fad.png', '', 0, '2016-11-17 00:01:11', '2016-11-16 18:01:11'),
(55, '', 'image', 'image/jpeg', 'uploads/images/2016/12/01/f576fca579790fb843d8c7279d30be11.jpeg', '', 0, '2016-12-01 13:04:22', '2016-12-01 13:04:22'),
(56, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/eb26c6dd93bcf2c1cf8417b7bf51745b.jpeg', '', 0, '2016-12-13 13:10:07', '2016-12-13 13:10:07'),
(57, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/71fcbccb9e27f1f73b939835dfa57cbf.jpeg', '', 0, '2016-12-13 13:10:36', '2016-12-13 13:10:36'),
(58, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/22b448964b86c2c32692d93b7a0308b7.jpeg', '', 0, '2016-12-13 13:11:08', '2016-12-13 13:11:08'),
(59, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/1ff4f8de7c4e779c71c3ffe97af4c564.jpeg', '', 0, '2016-12-13 13:11:35', '2016-12-13 13:11:35'),
(60, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/da153b85227c213941bc99b094c11d52.jpeg', '', 0, '2016-12-13 13:12:29', '2016-12-13 13:12:29'),
(61, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/72c2e1fc972e43ed8be37cc2965cfb59.jpeg', '', 0, '2016-12-13 13:18:42', '2016-12-13 13:18:42'),
(62, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/88f330c6623df0429dcbc2f1e20cc06d.jpeg', '', 0, '2016-12-13 21:02:44', '2016-12-13 21:02:44'),
(63, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/39129e31ec28a6447869704c945d769c.jpeg', '', 0, '2016-12-13 21:22:13', '2016-12-13 21:22:13'),
(64, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/9ea1ef4adc05fc29b814295a153aed35.jpeg', '', 0, '2016-12-13 21:27:08', '2016-12-13 21:27:08'),
(65, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/f3985eb2380f8e791cfe360ec191fb4d.jpeg', '', 0, '2016-12-13 21:34:12', '2016-12-13 21:34:12'),
(66, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/3ec967c25c85523b910fa361b2c2b08e.jpeg', '', 0, '2016-12-13 21:36:43', '2016-12-13 21:36:43'),
(67, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/01ca1221815ac4d2bc387ceaed3cba84.jpeg', '', 0, '2016-12-13 21:42:05', '2016-12-13 21:42:05'),
(68, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/5035738fe2f44bc15e1cf0274c50b2a7.jpeg', '', 0, '2016-12-13 22:17:40', '2016-12-13 22:17:40'),
(69, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/7a8565c3492130ece9fa97cf55acaeb2.jpeg', '', 0, '2016-12-13 22:22:59', '2016-12-13 22:22:59'),
(70, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/b26bc658abd216019181c2d2a59be158.jpeg', '', 0, '2016-12-13 22:26:15', '2016-12-13 22:26:15'),
(71, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/f6ad520e3d0901a551fedd4d9226c7bc.jpeg', '', 0, '2016-12-13 22:30:20', '2016-12-13 22:30:20'),
(72, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/19ea6395f5f9cf969bbd050d63995478.jpeg', '', 0, '2016-12-13 22:34:22', '2016-12-13 22:34:22'),
(73, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/3f55a5900ea620b94fc7a498f8217c3b.jpeg', '', 0, '2016-12-13 22:36:54', '2016-12-13 22:36:54'),
(74, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/0be28c7b6c89e2eca067cda6b3f3dce2.jpeg', '', 0, '2016-12-13 22:40:24', '2016-12-13 22:40:24'),
(75, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/026516c25c15e1654b33b817e753d572.jpeg', '', 0, '2016-12-13 22:46:44', '2016-12-13 22:46:44'),
(76, '', 'image', 'image/jpeg', 'uploads/images/2016/12/13/7b1d7660919d169cf5cf0d6582fac6e8.jpeg', '', 0, '2016-12-13 22:50:36', '2016-12-13 22:50:36'),
(77, '', 'image', 'image/jpeg', 'uploads/images/2016/12/14/2adec507fc54b49ff98e3942f1833606.jpeg', '', 0, '2016-12-14 11:49:20', '2016-12-14 11:49:20'),
(78, '', 'image', 'image/jpeg', 'uploads/images/2016/12/15/b029777491d8c381469ddf44b81df6c6.jpeg', '', 0, '2016-12-15 22:13:46', '2016-12-15 22:13:46'),
(79, '', 'image', 'image/jpeg', 'uploads/images/2016/12/15/2fb17bd5e873799ac65e6da1a6a7c5fb.jpeg', '', 0, '2016-12-15 22:15:42', '2016-12-15 22:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `cms_user`
--

CREATE TABLE IF NOT EXISTS `cms_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_avatar` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_social` text COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `languages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_active` int(11) NOT NULL,
  `user_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_user`
--

INSERT INTO `cms_user` (`user_id`, `email`, `password`, `user_avatar`, `user_firstname`, `user_lastname`, `user_nickname`, `user_intro`, `user_phone`, `user_location`, `user_social`, `user_type`, `languages`, `user_active`, `user_updated`, `user_entered`) VALUES
(1, 'codepaul.s@gmail.com', '1111', 'uploads/avatar/1/830090725820048805b519ec853f0eab.jpeg', 'Paul', 'Mccartney', 'Tum', 'kp', '084 580 5775', 'Phuket Thailand', '{"facebook":"1","twitter":"12","google":"op","instagram":"kpo","pinterest":"kp","linkedin":"ok","youtube":"po"}', 'admin', '', 1, '2016-12-16 12:38:23', '2016-12-15 11:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `cms_user_activity_2016`
--

CREATE TABLE IF NOT EXISTS `cms_user_activity_2016` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=135 ;

--
-- Dumping data for table `cms_user_activity_2016`
--

INSERT INTO `cms_user_activity_2016` (`id`, `user_id`, `message`, `entered`) VALUES
(1, 0, '$username Login false', '2016-09-26 12:24:42'),
(2, 0, '$username Login false', '2016-09-26 12:24:48'),
(3, 0, '$username Login false', '2016-09-26 12:24:54'),
(4, 1, 'Login to system', '2016-09-26 12:25:02'),
(5, 0, '$username Login false', '2016-09-26 12:27:44'),
(6, 1, 'Login to system', '2016-09-26 12:27:51'),
(7, 1, 'Add new category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=1\\">Tours Inbound</a>', '2016-09-26 13:13:33'),
(8, 1, 'Add new category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=2\\">Tours Outbound</a>', '2016-09-26 13:14:06'),
(9, 1, 'Update property information', '2016-09-26 13:14:42'),
(10, 1, 'Update property information', '2016-09-26 13:16:21'),
(11, 1, 'Update property information', '2016-09-26 13:16:52'),
(12, 1, 'Add new category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=3\\">Bangkok</a>', '2016-09-26 13:19:20'),
(13, 1, 'Add new category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=4\\">Chiangmai</a>', '2016-09-26 13:20:04'),
(14, 1, 'Add new category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=5\\">Phangnga</a>', '2016-09-26 13:20:48'),
(15, 0, '$username Login false', '2016-09-27 05:33:59'),
(16, 0, '$username Login false', '2016-09-27 05:34:05'),
(17, 1, 'Login to system', '2016-09-27 05:34:11'),
(18, 0, '$username Login false', '2016-09-28 00:46:26'),
(19, 0, '$username Login false', '2016-09-28 00:46:41'),
(20, 1, 'Login to system', '2016-09-28 00:46:46'),
(21, 0, '$username Login false', '2016-09-28 05:24:21'),
(22, 1, 'Login to system', '2016-09-28 05:24:28'),
(23, 1, 'Login to system', '2016-09-28 23:37:38'),
(24, 1, 'Login to system', '2016-09-29 11:55:07'),
(25, 1, 'Update property information', '2016-09-29 12:25:26'),
(26, 1, 'Login to system', '2016-09-29 23:59:20'),
(27, 0, '$username Login false', '2016-09-30 22:20:21'),
(28, 1, 'Login to system', '2016-09-30 22:20:27'),
(29, 0, '$username Login false', '2016-10-01 11:56:50'),
(30, 1, 'Login to system', '2016-10-01 11:56:58'),
(31, 1, 'Update article <a href=\\"http://localhost/cms_ecommerce/admin/post/edit?article_id=2\\">Per cu reque menandri, dicta eleifend intellegebat ad his</a>', '2016-10-01 12:05:59'),
(32, 1, 'Update article <a href=\\"http://localhost/cms_ecommerce/admin/post/edit?article_id=1\\">Lorem ipsum dolor sit amet, ut cum novum</a>', '2016-10-01 12:12:59'),
(33, 0, '$username Login false', '2016-10-02 23:15:32'),
(34, 1, 'Login to system', '2016-10-02 23:15:38'),
(35, 0, '$username Login false', '2016-10-03 05:40:18'),
(36, 1, 'Login to system', '2016-10-03 05:40:25'),
(37, 1, 'Login to system', '2016-10-03 23:04:39'),
(38, 0, '$username Login false', '2016-10-04 12:28:47'),
(39, 1, 'Login to system', '2016-10-04 12:28:53'),
(40, 0, '$username Login false', '2016-10-04 21:39:07'),
(41, 1, 'Login to system', '2016-10-04 21:39:12'),
(42, 1, 'Login to system', '2016-10-05 05:26:20'),
(43, 1, 'Login to system', '2016-10-05 05:44:59'),
(44, 1, 'Login to system', '2016-10-05 12:58:30'),
(45, 1, 'Login to system', '2016-10-05 23:45:37'),
(46, 0, '$username Login false', '2016-10-06 12:10:02'),
(47, 1, 'Login to system', '2016-10-06 12:10:08'),
(48, 1, 'Login to system', '2016-10-06 22:50:37'),
(49, 1, 'Login to system', '2016-10-07 13:06:26'),
(50, 1, 'Login to system', '2016-10-07 22:06:37'),
(51, 1, 'Login to system', '2016-10-08 13:36:36'),
(52, 1, 'Login to system', '2016-10-09 05:29:48'),
(53, 0, '$username Login false', '2016-10-10 00:08:29'),
(54, 1, 'Login to system', '2016-10-10 00:08:36'),
(55, 0, '$username Login false', '2016-10-10 05:37:10'),
(56, 1, 'Login to system', '2016-10-10 05:37:19'),
(57, 1, 'Login to system', '2016-10-10 12:33:05'),
(58, 1, 'Login to system', '2016-10-10 22:48:53'),
(59, 1, 'Login to system', '2016-10-11 05:35:33'),
(60, 1, 'Add new category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=6\\">Hotels Packages</a>', '2016-10-11 05:51:44'),
(61, 1, 'Update category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=6\\">Packages</a>', '2016-10-11 05:52:21'),
(62, 1, 'Delete category Packages', '2016-10-11 05:52:49'),
(63, 1, 'Login to system', '2016-10-11 12:19:54'),
(64, 1, 'Login to system', '2016-10-13 08:09:56'),
(65, 1, 'Add new category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=6\\">Phuket</a>', '2016-10-13 09:51:32'),
(66, 0, '$username Login false', '2016-10-13 23:52:03'),
(67, 0, '$username Login false', '2016-10-13 23:52:07'),
(68, 1, 'Login to system', '2016-10-13 23:52:18'),
(69, 1, 'Login to system', '2016-10-14 00:53:41'),
(70, 1, 'Login to system', '2016-10-18 13:14:27'),
(71, 1, 'Login to system', '2016-10-18 21:55:55'),
(72, 1, 'Login to system', '2016-10-19 05:44:29'),
(73, 1, 'Login to system', '2016-10-19 10:43:27'),
(74, 1, 'Update user information <a href=\\"http://localhost/cms_ecommerce/admin/users/edit?user_id=1\\">codepaul.s@gmail.com</a>', '2016-10-19 10:47:38'),
(75, 1, 'Login to system', '2016-10-19 22:56:37'),
(76, 1, 'Login to system', '2016-10-21 05:30:09'),
(77, 1, 'Login to system', '2016-10-21 12:27:56'),
(78, 1, 'Login to system', '2016-10-22 14:15:45'),
(79, 1, 'Login to system', '2016-10-23 01:47:50'),
(80, 1, 'Login to system', '2016-10-23 06:15:51'),
(81, 1, 'Login to system', '2016-10-26 05:44:14'),
(82, 1, 'Login to system', '2016-10-26 09:17:46'),
(83, 1, 'Login to system', '2016-10-26 23:14:37'),
(84, 1, 'Login to system', '2016-10-28 05:58:26'),
(85, 1, 'Login to system', '2016-10-29 13:31:17'),
(86, 1, 'Login to system', '2016-10-29 22:57:53'),
(87, 1, 'Login to system', '2016-10-31 05:42:16'),
(88, 1, 'Login to system', '2016-11-01 00:37:50'),
(89, 1, 'Login to system', '2016-11-02 23:05:25'),
(90, 1, 'Login to system', '2016-11-05 15:07:31'),
(91, 1, 'Logout', '2016-11-05 16:27:06'),
(92, 0, '$username Login false', '2016-11-05 16:33:58'),
(93, 1, 'Login to system', '2016-11-05 16:34:07'),
(94, 1, 'Logout', '2016-11-05 16:36:07'),
(95, 1, 'Login to system', '2016-11-05 16:54:57'),
(96, 1, 'Update category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=1\\">Tours Inbound</a>', '2016-11-06 02:26:27'),
(97, 1, 'Update category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=1\\">Tours Inbound</a>', '2016-11-06 02:29:03'),
(98, 1, 'Update category <a href=\\"http://localhost/cms_ecommerce/admin/category/edit?category_id=2\\">Tours Outbound</a>', '2016-11-06 04:02:21'),
(99, 1, 'Login to system', '2016-11-06 04:09:39'),
(100, 1, 'Logout', '2016-11-06 04:41:11'),
(101, 1, 'Login to system', '2016-11-06 04:41:18'),
(102, 1, 'Update profile', '2016-11-06 04:41:32'),
(103, 1, 'Update property information', '2016-11-06 05:01:15'),
(104, 1, 'Update profile', '2016-11-06 05:03:11'),
(105, 1, 'Update profile', '2016-11-06 05:08:11'),
(106, 1, 'Update user information <a href=\\"http://localhost/cms_ecommerce/admin/users/edit?user_id=1\\">codepaul.s@gmail.com</a>', '2016-11-07 19:09:00'),
(107, 1, 'Logout', '2016-11-07 19:34:22'),
(108, 1, 'Login to system', '2016-11-07 19:34:29'),
(109, 1, 'Login to system', '2016-11-24 11:46:13'),
(110, 1, 'Login to system', '2016-11-25 00:50:13'),
(111, 1, 'Login to system', '2016-11-26 05:38:02'),
(112, 0, '$username Login false', '2016-12-01 13:01:50'),
(113, 1, 'Login to system', '2016-12-01 13:01:58'),
(114, 1, 'Login to system', '2016-12-13 10:34:42'),
(115, 0, '$username Login false', '2016-12-15 11:05:21'),
(116, 0, '$username Login false', '2016-12-15 11:05:30'),
(117, 0, '$username Login false', '2016-12-15 11:05:47'),
(118, 0, '$username Login false', '2016-12-15 11:06:04'),
(119, 0, '$username Login false', '2016-12-15 11:06:13'),
(120, 0, '$username Login false', '2016-12-15 11:06:21'),
(121, 1, 'Login to system', '2016-12-15 11:07:10'),
(122, 1, 'Update user information <a href=\\"http://codepaul.com/paultours/admin/users/edit?user_id=1\\">codepaul.s@gmail.com</a>', '2016-12-15 11:07:34'),
(123, 1, 'Logout', '2016-12-15 11:16:04'),
(124, 1, 'Logout', '2016-12-16 12:36:55'),
(125, 0, '$username Login false', '2016-12-16 12:37:40'),
(126, 0, '$username Login false', '2016-12-16 12:37:47'),
(127, 0, '$username Login false', '2016-12-16 12:37:57'),
(128, 1, 'Login to system', '2016-12-16 12:39:11'),
(129, 0, '$username Login false', '2016-12-19 22:55:59'),
(130, 1, 'Login to system', '2016-12-19 22:56:05'),
(131, 0, '$username Login false', '2016-12-20 02:02:46'),
(132, 0, '$username Login false', '2016-12-20 02:02:55'),
(133, 0, '$username Login false', '2016-12-20 02:03:04'),
(134, 0, '$username Login false', '2016-12-20 02:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `cms_widget`
--

CREATE TABLE IF NOT EXISTS `cms_widget` (
  `widget_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `widget_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `widget_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` int(11) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `widget_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `widget_entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`widget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `cms_widget`
--

INSERT INTO `cms_widget` (`widget_id`, `type`, `widget_title`, `widget_description`, `link`, `button`, `icon`, `thumbnail`, `displayorder`, `widget_updated`, `widget_entered`) VALUES
(1, 'slide', 'Sample Title Slide 1', 'Sample Description Slide 1', '', '', '', 60, 1, '2016-12-13 13:12:29', '0000-00-00 00:00:00'),
(2, 'slide', 'Sample Title Slide 2', 'Sample Description Slide 2', '', '', '', 59, 2, '2016-12-13 13:11:35', '0000-00-00 00:00:00'),
(3, 'slide', 'Sample Title Slide 3', 'Sample Description Slide 3', '', '', '', 58, 3, '2016-12-13 13:11:08', '0000-00-00 00:00:00'),
(4, 'slide', 'Sample Title Slide 4', 'Sample Description Slide 4', '', '', '', 57, 4, '2016-12-13 13:10:36', '0000-00-00 00:00:00'),
(5, 'slide', 'Sample Title Slide 5', 'Sample Description Slide 5', '', '', '', 56, 5, '2016-12-13 13:10:07', '0000-00-00 00:00:00'),
(6, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:39:57', '0000-00-00 00:00:00'),
(7, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:13', '0000-00-00 00:00:00'),
(8, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:16', '0000-00-00 00:00:00'),
(9, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:28', '0000-00-00 00:00:00'),
(10, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:32', '0000-00-00 00:00:00'),
(11, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:33', '0000-00-00 00:00:00'),
(12, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:40', '0000-00-00 00:00:00'),
(13, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:38', '0000-00-00 00:00:00'),
(14, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:41', '0000-00-00 00:00:00'),
(15, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:43', '0000-00-00 00:00:00'),
(16, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:47', '0000-00-00 00:00:00'),
(17, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:50', '0000-00-00 00:00:00'),
(18, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:52', '0000-00-00 00:00:00'),
(19, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:40:59', '0000-00-00 00:00:00'),
(20, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:41:01', '0000-00-00 00:00:00'),
(21, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:41:04', '0000-00-00 00:00:00'),
(22, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:41:07', '0000-00-00 00:00:00'),
(23, 'populartours', 'In brute epicurei adolescens has', '฿99', '#', '', '', 0, 0, '2016-12-16 00:41:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_wishlist`
--

CREATE TABLE IF NOT EXISTS `cms_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `session_admin`
--

CREATE TABLE IF NOT EXISTS `session_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ipaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logout` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=145 ;

--
-- Dumping data for table `session_admin`
--

INSERT INTO `session_admin` (`id`, `session_id`, `user_id`, `ipaddress`, `action`, `logout`, `updated`, `entered`) VALUES
(3, '3D5SgU3SZMGbp4W', 1, '127.0.0.1', '', 0, '2016-07-09 06:41:22', '2016-07-09 01:41:22'),
(4, 'BnRlaPbv7NvA2Z', 1, '127.0.0.1', '', 1, '2016-07-11 06:57:51', '2016-07-11 01:50:34'),
(5, 'BnRlaPbv7NvA2Z', 1, '127.0.0.1', '', 1, '2016-07-11 06:58:00', '2016-07-11 01:57:56'),
(6, 'BnRlaPbv7NvA2Z', 1, '127.0.0.1', '', 0, '2016-07-11 07:05:55', '2016-07-11 02:05:55'),
(7, 'tvpJEUhUQhxLho', 1, '127.0.0.1', '', 1, '2016-07-12 08:26:21', '2016-07-11 23:05:29'),
(8, 'tvpJEUhUQhxLho', 1, '127.0.0.1', '', 1, '2016-07-12 10:26:44', '2016-07-12 03:26:26'),
(9, 'tvpJEUhUQhxLho', 1, '127.0.0.1', '', 1, '2016-07-12 10:43:21', '2016-07-12 05:30:05'),
(10, 'tvpJEUhUQhxLho', 1, '127.0.0.1', '', 0, '2016-07-12 10:43:25', '2016-07-12 05:43:25'),
(11, 'IoA0gDcRgjyxAS', 1, '127.0.0.1', '', 1, '2016-07-13 04:24:30', '2016-07-12 20:48:26'),
(12, 'IoA0gDcRgjyxAS', 1, '127.0.0.1', '', 0, '2016-07-13 04:24:34', '2016-07-12 23:24:34'),
(13, 'ME4y73eLOy6fWnw', 1, '127.0.0.1', '', 0, '2016-07-13 07:35:00', '2016-07-13 02:35:00'),
(14, '4Tu7N7TfuRYY07l', 1, '127.0.0.1', '', 1, '2016-07-14 06:03:05', '2016-07-13 20:41:20'),
(15, '4Tu7N7TfuRYY07l', 8, '127.0.0.1', '', 0, '2016-07-14 06:03:19', '2016-07-14 01:03:19'),
(16, 'FBjqSJJXQfwgS1', 8, '127.0.0.1', '', 1, '2016-07-15 03:06:59', '2016-07-14 21:17:25'),
(17, 'FBjqSJJXQfwgS1', 1, '127.0.0.1', '', 1, '2016-07-15 03:35:33', '2016-07-14 22:07:09'),
(18, 'FBjqSJJXQfwgS1', 8, '127.0.0.1', '', 0, '2016-07-15 03:35:38', '2016-07-14 22:35:38'),
(19, 'H429XfrDTose6f', 8, '127.0.0.1', '', 0, '2016-07-16 02:19:17', '2016-07-15 21:19:17'),
(20, 'zZMh6WN806qJri', 8, '127.0.0.1', '', 0, '2016-07-16 06:06:58', '2016-07-16 01:06:58'),
(21, 'PTsuC35APZOHGxA', 8, '127.0.0.1', '', 0, '2016-07-16 08:18:20', '2016-07-16 03:18:20'),
(22, 'pzTqGkFN1Q0HKzX', 8, '127.0.0.1', '', 0, '2016-07-18 01:54:17', '2016-07-17 20:54:17'),
(23, 'YPvavjZfPVtZKzy', 8, '127.0.0.1', '', 0, '2016-07-21 02:33:02', '2016-07-20 21:33:02'),
(24, 'cwBV24uNWB2hUKV', 8, '::1', '', 0, '2016-07-21 06:22:04', '2016-07-21 01:22:04'),
(25, 'SXsroYu4YJ5cWIh', 8, '127.0.0.1', '', 0, '2016-07-22 02:01:56', '2016-07-21 21:01:55'),
(26, 'YKhOoIFV5AVlC3n', 8, '127.0.0.1', '', 0, '2016-07-23 01:50:56', '2016-07-22 20:50:56'),
(27, 'Hs2TUCshHrdnWTS', 8, '127.0.0.1', '', 0, '2016-07-25 01:51:55', '2016-07-24 20:51:55'),
(28, '9MnxuEYcV0Kg0v3', 8, '127.0.0.1', '', 0, '2016-07-26 01:50:37', '2016-07-25 20:50:37'),
(29, 'yKMftKJkkqyzS8J', 8, '127.0.0.1', '', 0, '2016-07-27 06:11:27', '2016-07-27 01:11:27'),
(30, 'sLQahiK3bRhx0a', 8, '127.0.0.1', '', 0, '2016-07-28 02:18:19', '2016-07-27 21:18:19'),
(31, 'h5DraRvkcszmsy', 8, '127.0.0.1', '', 0, '2016-07-29 02:20:07', '2016-07-28 21:20:07'),
(32, 'kOs309g7YuRZzhk', 8, '127.0.0.1', '', 0, '2016-08-04 08:02:19', '2016-08-04 03:02:19'),
(33, 'cthHeCWVu6ZdcJp', 8, '127.0.0.1', '', 0, '2016-08-05 02:23:36', '2016-08-04 21:23:36'),
(34, 'f9ZYZv3L9CcyVmq', 8, '127.0.0.1', '', 0, '2016-08-06 04:49:38', '2016-08-05 23:49:38'),
(35, 'rTCMQg2PSfvsgbu', 8, '127.0.0.1', '', 0, '2016-08-08 02:02:34', '2016-08-07 21:02:34'),
(36, 'ocpXm0qoTlQ42su', 8, '127.0.0.1', '', 0, '2016-08-10 03:26:29', '2016-08-09 22:26:29'),
(37, 'vTgBujobSNtz9', 8, '127.0.0.1', '', 0, '2016-08-11 08:36:03', '2016-08-11 03:36:03'),
(38, 'E34MWihC0Ew6F4l', 8, '127.0.0.1', '', 0, '2016-08-18 02:31:12', '2016-08-17 21:31:12'),
(39, 'BSUkICNlOKbmPRP', 8, '127.0.0.1', '', 1, '2016-08-19 04:56:14', '2016-08-18 23:53:47'),
(40, 'BSUkICNlOKbmPRP', 8, '127.0.0.1', '', 0, '2016-08-19 04:56:28', '2016-08-18 23:56:28'),
(41, 'JSiW9iKKQT9W4st', 1, '127.0.0.1', '', 0, '2016-08-20 01:43:31', '2016-08-19 20:43:31'),
(42, 'TvVHNokaK2hc6TS', 1, '127.0.0.1', '', 0, '2016-08-22 02:56:02', '2016-08-21 21:56:02'),
(43, 'embx753Eu4aWPrQ', 1, '127.0.0.1', '', 0, '2016-08-24 01:54:09', '2016-08-23 20:54:09'),
(44, '5z7rWxiRchAh7EW', 1, '127.0.0.1', '', 0, '2016-08-25 01:56:23', '2016-08-24 20:56:23'),
(45, 'lBKqhJf74rYyN0J', 1, '127.0.0.1', '', 0, '2016-08-27 02:08:55', '2016-08-26 21:08:55'),
(46, 'uyUcNviaoPS5Um', 1, '183.88.111.190', '', 0, '2016-08-27 08:03:35', '2016-08-27 02:03:35'),
(47, 'IdNQEw0VxdIZnTF', 1, '::1', '', 0, '2016-08-29 10:01:10', '2016-08-29 05:01:10'),
(48, 'oCC4Ze1D6HaAyXF', 1, '::1', '', 0, '2016-08-30 01:45:33', '2016-08-29 20:45:33'),
(49, 'Iat0yRWlcKjPgyY', 1, '::1', '', 0, '2016-08-31 02:05:28', '2016-08-30 21:05:28'),
(50, 'wnpJg1IDBQMuMJB', 1, '::1', '', 0, '2016-08-31 07:18:51', '2016-08-31 02:18:51'),
(51, '31XNtzxRDBxQdp', 1, '::1', '', 0, '2016-09-01 03:57:19', '2016-08-31 22:57:19'),
(52, 'bZWY1VeFoMokM2', 1, '::1', '', 0, '2016-09-03 04:55:59', '2016-09-02 23:55:59'),
(53, 'c4SnSsct56MBx8', 1, '::1', '', 0, '2016-09-05 09:35:53', '2016-09-05 04:35:53'),
(54, 'KnLU0F7MBkx8mnC', 1, '::1', '', 0, '2016-09-07 09:17:55', '2016-09-07 04:17:55'),
(55, 'wvawVhtkCmW6GXo', 1, '::1', '', 0, '2016-09-08 07:44:35', '2016-09-08 02:44:35'),
(56, '1xKu7649CAEoDdm', 1, '::1', '', 0, '2016-09-09 04:51:13', '2016-09-08 23:51:13'),
(57, 'w0VxdIZnTFoCC4Z', 1, '::1', '', 0, '2016-09-10 04:24:21', '2016-09-09 23:24:21'),
(58, 'Cqmz83CsA3plZ2p', 1, '::1', '', 0, '2016-09-12 01:51:32', '2016-09-11 20:51:32'),
(59, 'nYcjiOZOiYL66M0', 1, '::1', '', 0, '2016-09-13 02:51:34', '2016-09-12 21:51:34'),
(60, 'MBkx8mnCCFhswjZ', 1, '::1', '', 0, '2016-09-13 07:55:55', '2016-09-13 02:55:55'),
(61, 'OKCt10QhWMM0UeY', 1, '183.89.52.90', '', 0, '2016-09-15 07:54:01', '2016-09-15 07:54:01'),
(62, 'CERghDJK1S8aU', 1, '183.89.52.90', '', 1, '2016-09-15 09:01:22', '2016-09-15 08:52:17'),
(63, 'CERghDJK1S8aU', 1, '183.89.52.90', '', 1, '2016-09-15 10:59:15', '2016-09-15 09:01:43'),
(64, 'uOCjYCbOrx1CXJQ', 1, '183.89.52.90', '', 1, '2016-09-15 09:18:08', '2016-09-15 09:13:12'),
(65, 'OEQMmkTcYP8523', 1, '::1', '', 0, '2016-09-15 14:33:58', '2016-09-15 09:33:58'),
(66, 'G5LvUN9cGTKxedx', 1, '::1', '', 0, '2016-09-15 20:42:22', '2016-09-15 15:42:22'),
(67, 'iyyYtxq1HJmmVH6', 1, '::1', '', 0, '2016-09-16 05:42:39', '2016-09-16 00:42:39'),
(68, 'DoloJ53P74c6Tm', 1, '183.89.194.240', '', 0, '2016-09-16 06:12:54', '2016-09-16 06:12:54'),
(69, '7JxnL2geJD0dN8', 1, '49.228.139.34', '', 0, '2016-09-16 11:23:57', '2016-09-16 11:23:57'),
(70, 'dEtIE8syTNX62T8', 1, '183.89.194.240', '', 0, '2016-09-17 03:14:25', '2016-09-17 03:14:25'),
(71, 'WSMY9tyuOg9Unya', 1, '183.89.199.31', '', 0, '2016-09-20 02:40:11', '2016-09-20 02:40:11'),
(72, 'FJZs2SijeM1xf2P', 1, '::1', '', 0, '2016-09-20 22:52:41', '2016-09-20 17:52:41'),
(73, 'HKSikQ5e3XVNPE8', 1, '::1', '', 0, '2016-09-22 14:23:08', '2016-09-22 09:23:08'),
(74, 'MuNkU60IxRkEht8', 1, '::1', '', 0, '2016-09-23 05:16:14', '2016-09-23 00:16:14'),
(75, 'CcdAVDX1w9bTBm', 1, '::1', '', 0, '2016-09-23 22:40:24', '2016-09-23 17:40:24'),
(76, '2pgPOvSmRFJnM7', 1, '::1', '', 0, '2016-09-25 10:20:29', '2016-09-25 05:20:29'),
(77, 'LXw6Fs3HNiZmnjh', 1, '::1', '', 0, '2016-09-25 10:29:54', '2016-09-25 05:29:54'),
(78, '1IeiM4GZO0CNXvG', 1, '::1', '', 0, '2016-09-26 12:25:02', '2016-09-26 07:25:02'),
(79, 'hnZpisBSUkICNlO', 1, '::1', '', 0, '2016-09-26 12:27:51', '2016-09-26 07:27:51'),
(80, 'PGnzOTMEtSbM3z', 1, '::1', '', 0, '2016-09-27 05:34:11', '2016-09-27 00:34:11'),
(81, 'vmdkpsket4hTW23', 1, '::1', '', 0, '2016-09-28 00:46:46', '2016-09-27 19:46:46'),
(82, 'pJX4rgv3mPytK8q', 1, '::1', '', 0, '2016-09-28 05:24:28', '2016-09-28 00:24:28'),
(83, 'hmMORrc5ZCvO8ZT', 1, '::1', '', 0, '2016-09-28 23:37:38', '2016-09-28 18:37:38'),
(84, 'w3lCX2JJDTZamr', 1, '::1', '', 0, '2016-09-29 11:55:06', '2016-09-29 06:55:06'),
(85, 'z79ZgWLpRW3RMad', 1, '::1', '', 0, '2016-09-29 23:59:20', '2016-09-29 18:59:20'),
(86, 'XOV5TgiKEu5Md3X', 1, '::1', '', 0, '2016-09-30 22:20:27', '2016-09-30 17:20:27'),
(87, '9WsfBOtfZi303v', 1, '::1', '', 0, '2016-10-01 11:56:58', '2016-10-01 06:56:58'),
(88, 'PhxmACZ3CzWRL4Z', 1, '::1', '', 0, '2016-10-02 23:15:38', '2016-10-02 18:15:38'),
(89, 'r367mHabfTXQWz1', 1, '::1', '', 0, '2016-10-03 05:40:25', '2016-10-03 00:40:25'),
(90, 'hv3KwjZ3dssAXEQ', 1, '::1', '', 0, '2016-10-03 23:04:39', '2016-10-03 18:04:39'),
(91, '7wgfePeDQzGJgcH', 1, '::1', '', 0, '2016-10-04 12:28:53', '2016-10-04 07:28:53'),
(92, 'QR8rVW0DHAHjLxw', 1, '::1', '', 0, '2016-10-04 21:39:12', '2016-10-04 16:39:12'),
(93, 'smeLAll13UHiylM', 1, '::1', '', 0, '2016-10-05 05:26:20', '2016-10-05 00:26:20'),
(94, 'NHnNVuNDf49jEo2', 1, '::1', '', 0, '2016-10-05 05:44:59', '2016-10-05 00:44:59'),
(95, 'ifiLR5wNCQSehSO', 1, '::1', '', 0, '2016-10-05 12:58:30', '2016-10-05 07:58:30'),
(96, 'jsbyPBUORKy37dC', 1, '::1', '', 0, '2016-10-05 23:45:37', '2016-10-05 18:45:37'),
(97, 'nHtWVN3fAiwQQj', 1, '::1', '', 0, '2016-10-06 12:10:08', '2016-10-06 07:10:08'),
(98, 'HOcCy2CgbbQYATD', 1, '::1', '', 0, '2016-10-06 22:50:37', '2016-10-06 17:50:37'),
(99, 'DGNoWtYxZ63eYo1', 1, '::1', '', 0, '2016-10-07 13:06:26', '2016-10-07 08:06:26'),
(100, 'rQoiyXGf3J8KmfX', 1, '::1', '', 0, '2016-10-07 22:06:36', '2016-10-07 17:06:36'),
(101, 'EnqDUclVBlQskwd', 1, '::1', '', 0, '2016-10-08 13:36:36', '2016-10-08 08:36:36'),
(102, 'dq9mdhZnAVJIwE', 1, '::1', '', 0, '2016-10-09 05:29:48', '2016-10-09 00:29:48'),
(103, 'ol5ndWu5nVZeIh8', 1, '::1', '', 0, '2016-10-10 00:08:36', '2016-10-09 19:08:36'),
(104, 'yzu2fNvh5JNZdcl', 1, '::1', '', 0, '2016-10-10 05:37:18', '2016-10-10 00:37:18'),
(105, 'BbESs0Ls5pka9J', 1, '::1', '', 0, '2016-10-10 12:33:04', '2016-10-10 07:33:04'),
(106, 'ltG64RSVKidACGH', 1, '::1', '', 0, '2016-10-10 22:48:53', '2016-10-10 17:48:53'),
(107, 'vuA2AsivkTU1yLY', 1, '::1', '', 0, '2016-10-11 05:35:33', '2016-10-11 00:35:33'),
(108, 'EqlLdm7nUak3L3S', 1, '::1', '', 0, '2016-10-11 12:19:54', '2016-10-11 07:19:54'),
(109, 'gwX01bMJCtNfAS', 1, '::1', '', 0, '2016-10-13 08:09:56', '2016-10-13 03:09:56'),
(110, 'vjHURMSScSGUakq', 1, '::1', '', 0, '2016-10-13 23:52:18', '2016-10-13 18:52:18'),
(111, 'vl76LNEs4i6wt4h', 1, '::1', '', 0, '2016-10-14 00:53:41', '2016-10-13 19:53:41'),
(112, 'zCoXZvflADAkQ4D', 1, '::1', '', 0, '2016-10-18 13:14:27', '2016-10-18 08:14:27'),
(113, 'vzPoI4CR5drEHh9', 1, '::1', '', 0, '2016-10-18 21:55:55', '2016-10-18 16:55:55'),
(114, 'cuNDELVOXu4ajwd', 1, '::1', '', 0, '2016-10-19 05:44:29', '2016-10-19 00:44:29'),
(115, 'p6WHMbKJJEuhnG4', 1, '::1', '', 0, '2016-10-19 10:43:27', '2016-10-19 05:43:27'),
(116, 'kucQmGmUSBnRXs3', 1, '::1', '', 0, '2016-10-19 22:56:37', '2016-10-19 17:56:37'),
(117, 'Rw3KjJw2QGxTKQb', 1, '::1', '', 0, '2016-10-21 05:30:09', '2016-10-21 00:30:09'),
(118, 'BomTTcF5sXEy7', 1, '::1', '', 0, '2016-10-21 12:27:56', '2016-10-21 07:27:56'),
(119, 'EsmfmTARHWR4pXG', 1, '::1', '', 0, '2016-10-22 14:15:45', '2016-10-22 09:15:45'),
(120, 'XHLZ9gIfImFtfGX', 1, '::1', '', 0, '2016-10-23 01:47:50', '2016-10-22 20:47:50'),
(121, 'PdIA5OWAPGsJxWt', 1, '::1', '', 0, '2016-10-23 06:15:50', '2016-10-23 01:15:50'),
(122, 'dCet3GAHwl0xmZW', 1, '::1', '', 0, '2016-10-26 05:44:14', '2016-10-26 00:44:14'),
(123, '4LqmSs1L4GA6d8u', 1, '::1', '', 0, '2016-10-26 09:17:45', '2016-10-26 04:17:45'),
(124, '17kM3R68ux74rmf', 1, '::1', '', 0, '2016-10-26 23:14:37', '2016-10-26 18:14:37'),
(125, '0SkKqG2jPSeU3H', 1, '::1', '', 0, '2016-10-28 05:58:26', '2016-10-28 00:58:26'),
(126, 'yZnbCFZIRpTfTXr', 1, '::1', '', 0, '2016-10-29 13:31:17', '2016-10-29 08:31:17'),
(127, 'Xb7jFcVcW1eowYv', 1, '::1', '', 0, '2016-10-29 22:57:53', '2016-10-29 17:57:53'),
(128, 'lzqBb4bxJYzoGE2', 1, '::1', '', 0, '2016-10-31 05:42:16', '2016-10-30 23:42:16'),
(129, 'oUJKxxaNsmWpDd', 1, '::1', '', 0, '2016-11-01 00:37:50', '2016-10-31 18:37:50'),
(130, 'q6QJFBw1kJ8JLXJ', 1, '::1', '', 0, '2016-11-02 23:05:25', '2016-11-02 17:05:25'),
(131, 'fcI0ZbTUjv1klqX', 1, '::1', '', 1, '2016-11-05 16:27:06', '2016-11-05 09:07:31'),
(132, 'fcI0ZbTUjv1klqX', 1, '::1', '', 1, '2016-11-05 16:36:07', '2016-11-05 10:34:07'),
(133, 'fcI0ZbTUjv1klqX', 1, '::1', '', 0, '2016-11-05 16:54:57', '2016-11-05 10:54:57'),
(134, 'McRYnia4NrfHLZx', 1, '::1', '', 0, '2016-11-06 04:09:39', '2016-11-05 22:09:39'),
(135, 'NOek6UMESzYglFM', 1, '::1', '', 0, '2016-11-06 04:41:18', '2016-11-05 22:41:18'),
(136, '8vK7ddelAeTzlLw', 1, '::1', '', 0, '2016-11-07 19:34:29', '2016-11-07 13:34:29'),
(137, 'cm8AuClqyYAUemp', 1, '::1', '', 0, '2016-11-24 11:46:13', '2016-11-24 05:46:12'),
(138, 'bG0jX3XWo8SDZ21', 1, '::1', '', 0, '2016-11-25 00:50:13', '2016-11-24 18:50:13'),
(139, 'qrI8lS5UhNTaXxA', 1, '::1', '', 0, '2016-11-26 05:38:02', '2016-11-25 23:38:02'),
(140, '7y2kr4756ZO3wUX', 1, '49.228.137.51', '', 0, '2016-12-01 13:01:58', '2016-12-01 13:01:58'),
(141, 'KFeLmCVQLJ2FvAv', 1, '183.88.108.150', '', 0, '2016-12-13 10:34:42', '2016-12-13 10:34:42'),
(142, 'WiTe5b5USM7iA8e', 1, '183.88.108.150', '', 1, '2016-12-15 11:16:04', '2016-12-15 11:07:10'),
(143, '5vUoaFvon4GYRGH', 1, '49.228.136.187', '', 0, '2016-12-16 12:39:11', '2016-12-16 12:39:11'),
(144, 'ZTjSzmoi9WwbVl', 1, '49.228.137.200', '', 0, '2016-12-19 22:56:05', '2016-12-19 22:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `session_website`
--

CREATE TABLE IF NOT EXISTS `session_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `ipaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `login` int(11) NOT NULL,
  `logout` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=386 ;

--
-- Dumping data for table `session_website`
--

INSERT INTO `session_website` (`id`, `session_id`, `member_id`, `ipaddress`, `action`, `lang`, `currency`, `login`, `logout`, `updated`, `entered`) VALUES
(3, 'Yi3BlK7wavIH2jd', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-20 09:11:05', '2016-11-20 03:11:05'),
(4, 'cVB3uvbW7bv7bcm', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-21 07:41:55', '2016-11-21 01:41:55'),
(5, 'YgKnyiyEJ0GDkjI', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-22 11:35:31', '2016-11-22 05:35:31'),
(6, 'OD2g6RedjUvV5ua', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-23 05:30:05', '2016-11-22 23:30:05'),
(7, 'MwHSW3fuXIt8jEB', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-23 22:59:58', '2016-11-23 16:59:58'),
(8, 's7Pw5vDxOpwXim', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-24 05:31:05', '2016-11-23 23:31:05'),
(9, 'cm8AuClqyYAUemp', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-24 12:03:51', '2016-11-24 06:03:51'),
(10, 'bG0jX3XWo8SDZ21', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-25 00:51:04', '2016-11-24 18:51:04'),
(11, 'gIl4a2afbU7iFOd', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-25 05:17:52', '2016-11-24 23:17:52'),
(12, 'qrI8lS5UhNTaXxA', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-26 05:15:24', '2016-11-25 23:15:24'),
(13, 'xWtSbaKkessZFqk', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-26 12:58:18', '2016-11-26 06:58:18'),
(14, 'nKo4eYNIT82pgPO', 0, '::1', '', 'en_US', 'THB', 0, 0, '2016-11-26 17:12:48', '2016-11-26 11:12:48'),
(15, 'AocOLYdVrpA3FMo', 0, '49.228.136.8', '', 'en_US', 'THB', 0, 0, '2016-11-26 20:32:03', '2016-11-26 20:32:03'),
(16, 'PhIWacf02ujLCoZ', 0, '119.76.124.107', '', 'en_US', 'THB', 0, 0, '2016-11-27 03:40:18', '2016-11-27 03:40:18'),
(17, 'Fcuu8fPefBf44Zo', 0, '49.228.137.51', '', 'en_US', 'THB', 0, 0, '2016-11-28 15:29:45', '2016-11-28 15:29:45'),
(18, '9CVmb3hFSJIPOR', 0, '49.228.137.51', '', 'en_US', 'THB', 0, 0, '2016-11-29 10:16:02', '2016-11-29 10:16:02'),
(19, 'dAbutRJNV0GfOJ', 0, '203.104.145.38', '', 'en_US', 'THB', 0, 0, '2016-11-29 10:17:38', '2016-11-29 10:17:38'),
(20, 'POBWJpkTZsBrrsu', 0, '183.88.106.145', '', 'en_US', 'THB', 0, 0, '2016-11-29 12:31:10', '2016-11-29 12:31:10'),
(21, 'Ev9hcZuaVtRI5sR', 0, '49.228.137.51', '', 'en_US', 'THB', 0, 0, '2016-11-30 12:44:04', '2016-11-30 12:44:04'),
(22, 'ochKvNKtTs76PY7', 0, '182.232.134.47', '', 'en_US', 'THB', 0, 0, '2016-12-01 05:24:31', '2016-12-01 05:24:31'),
(23, 'Eokd3awHRO88aZ9', 0, '66.249.82.196', '', 'en_US', 'THB', 0, 0, '2016-12-01 05:47:19', '2016-12-01 05:47:19'),
(24, 'kjBuxTuPRBwePj', 0, '183.89.194.61', '', 'en_US', 'THB', 0, 0, '2016-12-01 10:31:52', '2016-12-01 10:31:52'),
(25, '7y2kr4756ZO3wUX', 0, '49.228.137.51', '', 'en_US', 'THB', 0, 0, '2016-12-01 12:53:30', '2016-12-01 12:53:30'),
(26, 'iX0qWxHSwXSPX2j', 0, '66.249.82.194', '', 'en_US', 'THB', 0, 0, '2016-12-05 09:21:04', '2016-12-05 09:21:04'),
(27, 'VHzHELTCIkm13u', 0, '66.249.82.198', '', 'en_US', 'THB', 0, 0, '2016-12-06 13:26:48', '2016-12-06 13:26:48'),
(28, 'jGhOMCzabX3Ycr2', 0, '66.249.82.194', '', 'en_US', 'THB', 0, 0, '2016-12-06 13:26:48', '2016-12-06 13:26:48'),
(29, 'pHi9umj8SFB9pa', 0, '49.228.138.0', '', 'en_US', 'THB', 0, 0, '2016-12-06 13:35:12', '2016-12-06 13:35:12'),
(30, 'oHFeiftB0Kt7oyv', 0, '49.228.138.0', '', 'en_US', 'THB', 0, 0, '2016-12-06 15:14:51', '2016-12-06 15:14:51'),
(31, 'pgqwum1d5Oha869', 0, '203.104.145.40', '', 'en_US', 'THB', 0, 0, '2016-12-06 16:12:08', '2016-12-06 16:12:08'),
(32, 'BeK1kMYT4d6wzpu', 21, '183.88.107.67', '', 'en_US', 'THB', 1, 0, '2016-12-08 04:46:43', '2016-12-08 04:44:44'),
(33, 'Iq7OlIh6xVaL2rx', 21, '49.228.137.44', '', 'en_US', 'THB', 1, 0, '2016-12-08 13:49:30', '2016-12-08 13:43:46'),
(34, 'BKUGQb4tP3RG3', 21, '49.228.137.44', '', 'en_US', 'THB', 1, 0, '2016-12-09 00:42:52', '2016-12-09 00:42:35'),
(35, 'EI1CJQD6XqWmVxe', 0, '49.228.139.186', '', 'en_US', 'THB', 0, 0, '2016-12-10 03:28:58', '2016-12-10 03:28:58'),
(36, '2hCewsxBljr2tXC', 0, '49.228.136.185', '', 'en_US', 'THB', 0, 0, '2016-12-11 23:12:53', '2016-12-11 23:12:53'),
(37, 'V57Wut7kCe48f9', 0, '49.228.136.185', '', 'en_US', 'THB', 0, 0, '2016-12-13 00:32:10', '2016-12-13 00:32:10'),
(38, 'KFeLmCVQLJ2FvAv', 0, '183.88.108.150', '', 'en_US', 'THB', 0, 0, '2016-12-13 10:33:46', '2016-12-13 10:33:46'),
(39, 'bSSuRymihdEPpaf', 0, '49.228.136.185', '', 'en_US', 'THB', 0, 0, '2016-12-13 12:53:55', '2016-12-13 12:53:55'),
(40, 'znw4HHPrdVt5TMm', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-13 20:59:58', '2016-12-13 20:59:58'),
(41, 'aZUF7CIxMRCHLE5', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-14 11:35:01', '2016-12-14 11:35:01'),
(42, 'WnQfVkOOHxV5c2', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-14 12:55:04', '2016-12-14 12:55:04'),
(43, 'c53ZQQDplL8TX0', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-14 22:22:24', '2016-12-14 22:22:24'),
(44, 'UmwlqrnuUew8lEf', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-14 22:25:26', '2016-12-14 22:25:26'),
(45, 'aCDW0dnMgWDNVOE', 0, '66.249.82.196', '', 'en_US', 'THB', 0, 0, '2016-12-15 10:04:29', '2016-12-15 10:04:29'),
(46, '6UszJWKcXMKanc7', 0, '66.249.82.196', '', 'en_US', 'THB', 0, 0, '2016-12-15 10:04:29', '2016-12-15 10:04:29'),
(47, 'WiTe5b5USM7iA8e', 0, '183.88.108.150', '', 'en_US', 'THB', 0, 0, '2016-12-15 11:06:51', '2016-12-15 11:06:51'),
(48, 'OsudpxCMIhiyxSG', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-15 12:43:54', '2016-12-15 12:43:54'),
(49, 'na5tiHH2Da0AphV', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-15 12:55:44', '2016-12-15 12:55:44'),
(50, 'AuOK2mGfKLELMc', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-15 12:56:11', '2016-12-15 12:56:11'),
(51, '9fEGqLw82Sebyzw', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-15 22:02:38', '2016-12-15 22:02:38'),
(52, '5vUoaFvon4GYRGH', 0, '49.228.136.187', '', 'en_US', 'THB', 0, 0, '2016-12-16 12:04:51', '2016-12-16 12:04:51'),
(53, 'gDITWrrHcfTU7ZC', 0, '187.235.96.224', '', 'en_US', 'THB', 0, 0, '2016-12-19 18:53:54', '2016-12-19 18:53:54'),
(54, 'JeSGEoXcapvqj9Q', 22, '209.74.103.9', '', 'en_US', 'THB', 1, 0, '2016-12-19 19:04:53', '2016-12-19 18:56:46'),
(55, 'XxZk1PIqUBHxOzP', 0, '88.8.92.81', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:02:11', '2016-12-19 19:02:11'),
(56, 'beAsxNYC4uLmr1L', 0, '201.17.159.248', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:02:26', '2016-12-19 19:02:26'),
(57, 'BZUQzRslmTViEv', 0, '51.252.6.246', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:10:25', '2016-12-19 19:10:25'),
(58, 'eIVWUgS3TPPWq7O', 0, '89.114.177.6', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:16:47', '2016-12-19 19:16:47'),
(59, 'D17FxSk5PnO5cW3', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:18:28', '2016-12-19 19:18:28'),
(60, 'eZbmmZ0kTwTM4xp', 0, '46.39.230.134', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:19:32', '2016-12-19 19:19:32'),
(61, 'GdZhw2fMnacbqq', 0, '90.213.30.88', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:19:51', '2016-12-19 19:19:51'),
(62, 'MqNWN9WxI8drpQw', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:20:33', '2016-12-19 19:20:33'),
(63, 'MLcEmyj2RA9eK6r', 0, '62.82.113.153', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:20:40', '2016-12-19 19:20:40'),
(64, 'Bs68dEzxER2gyt', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:21:02', '2016-12-19 19:21:02'),
(65, 'VatDu6yoClERXoV', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:21:19', '2016-12-19 19:21:19'),
(66, 'kUEv2gZosU9aLwS', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:21:29', '2016-12-19 19:21:29'),
(67, 'FbkZFxeji4U4p6', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:22:02', '2016-12-19 19:22:02'),
(68, 'Ad8CWjacLxcQoBT', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:22:27', '2016-12-19 19:22:27'),
(69, '3Vl47yTXICirecO', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:22:59', '2016-12-19 19:22:59'),
(70, 'AdaHoRVEtLPkAJ', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:23:35', '2016-12-19 19:23:35'),
(71, 'nc3ENbRuLtJq399', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:23:38', '2016-12-19 19:23:38'),
(72, 'CBepyftVhjYOSJk', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:24:22', '2016-12-19 19:24:22'),
(73, '2QoYOn1hNoLtfSR', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:24:38', '2016-12-19 19:24:38'),
(74, 'SF94Zbj4d5f3Kaj', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:25:03', '2016-12-19 19:25:03'),
(75, 'YCB51qCTfi9zpIU', 0, '80.128.76.161', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:25:21', '2016-12-19 19:25:21'),
(76, 'fRLcm8Ux3yKGtNs', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:25:25', '2016-12-19 19:25:25'),
(77, 'YolQSZSyjtSSJLR', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:26:13', '2016-12-19 19:26:13'),
(78, 'ZG2Uwrp4O9pfJFP', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:26:37', '2016-12-19 19:26:37'),
(79, 'fiDz2RIVdYq2DXA', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:28:26', '2016-12-19 19:28:26'),
(80, 'OWZGsF6bG5ogI7C', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:28:49', '2016-12-19 19:28:49'),
(81, 'JpoiZnLtfojNpBa', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:28:56', '2016-12-19 19:28:56'),
(82, '5GbZfaUoafad0fv', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:29:39', '2016-12-19 19:29:39'),
(83, 'YNTRHSnafVYOu1U', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:30:31', '2016-12-19 19:30:31'),
(84, '4BUprHV4D5GfGC0', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:30:37', '2016-12-19 19:30:37'),
(85, '5LaoD0p8GB3TYC', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:31:18', '2016-12-19 19:31:18'),
(86, 'ACE3ygLLaItWTgv', 0, '190.213.114.166', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:31:19', '2016-12-19 19:31:19'),
(87, 'xsF0NAo13zvJmKt', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:33:30', '2016-12-19 19:33:30'),
(88, 'rr5tD3c0VBArUcK', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:34:56', '2016-12-19 19:34:56'),
(89, 'MOVM5fVVqu6E0s', 0, '24.133.167.145', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:35:05', '2016-12-19 19:35:05'),
(90, 'pzrAxO0gMsQSobv', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:35:47', '2016-12-19 19:35:47'),
(91, 'PTcRAYRrEIFEM2', 0, '201.50.174.11', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:36:11', '2016-12-19 19:36:11'),
(92, '6wixGCSJqp01bl', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:38:38', '2016-12-19 19:38:38'),
(93, '5A3zpF0EwT3Srfr', 0, '185.27.217.92', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:39:30', '2016-12-19 19:39:30'),
(94, 'TC0rAUvkfjQqxls', 0, '88.243.195.173', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:42:50', '2016-12-19 19:42:50'),
(95, 'xUjZDCHLeQa1NB7', 0, '197.157.155.50', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:46:27', '2016-12-19 19:46:27'),
(96, 'xCB57lNfcnWrx2', 0, '84.52.135.223', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:46:53', '2016-12-19 19:46:53'),
(97, 'DP6fJa0uagP6KEo', 0, '85.177.53.252', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:47:05', '2016-12-19 19:47:05'),
(98, 'ThBZHstijwo1CjD', 0, '85.177.53.252', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:47:09', '2016-12-19 19:47:09'),
(99, 'jRlkj5bD1yDqxOi', 0, '85.177.53.252', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:47:21', '2016-12-19 19:47:21'),
(100, '44Hlt5ZjaACQiQS', 0, '81.44.39.122', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:53:22', '2016-12-19 19:53:22'),
(101, '9KSbUyKbjtPdBrL', 0, '188.146.158.53', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:56:14', '2016-12-19 19:56:14'),
(102, 'daIDPEVAYOPc3Tm', 0, '130.43.8.92', '', 'en_US', 'THB', 0, 0, '2016-12-19 19:58:08', '2016-12-19 19:58:08'),
(103, 'F4tQ9rmH1WlX1EQ', 0, '72.208.51.167', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:00:32', '2016-12-19 20:00:32'),
(104, 'v2yFNnfsYHlCwJ5', 0, '72.208.51.167', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:00:39', '2016-12-19 20:00:39'),
(105, 'u4WRnrQZbj36BJK', 0, '72.208.51.167', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:00:45', '2016-12-19 20:00:45'),
(106, 'FF9qONtsOfeHAz', 0, '82.145.221.243', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:02:20', '2016-12-19 20:02:20'),
(107, 'VKKLGDxtz2aWFn', 0, '78.191.145.81', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:06:30', '2016-12-19 20:06:30'),
(108, 'OL90Ach7np6YbR', 0, '47.11.248.191', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:10:04', '2016-12-19 20:10:04'),
(109, 'HQdyFK6nzjjK4LW', 0, '92.60.18.201', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:11:00', '2016-12-19 20:11:00'),
(110, 'thJ1a2u7RB58upd', 0, '37.182.132.220', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:12:06', '2016-12-19 20:12:06'),
(111, 'Yuu0yNnNQcb2Sy', 0, '5.31.6.86', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:18:23', '2016-12-19 20:18:23'),
(112, 'mrmjwny9qUI1t1C', 0, '159.203.196.79', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:18:24', '2016-12-19 20:18:24'),
(113, '2jxHfyOvN1lH6', 0, '178.175.100.189', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:18:48', '2016-12-19 20:18:48'),
(114, 'wpMRk5LzsxbRQL', 0, '94.194.169.51', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:23:01', '2016-12-19 20:23:01'),
(115, 'cIfyKaNY2VYpgNj', 0, '202.83.16.173', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:26:39', '2016-12-19 20:26:39'),
(116, 'uZdlw4I4gYLHjpd', 0, '81.196.137.215', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:27:22', '2016-12-19 20:27:22'),
(117, 'EIUB8IZPirq87ss', 0, '212.252.0.180', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:28:56', '2016-12-19 20:28:56'),
(118, 'pCAYTmF1rWT6Uk8', 0, '41.100.110.151', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:29:22', '2016-12-19 20:29:22'),
(119, 'wog7R5hKkAfKlG', 0, '207.107.70.174', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:33:30', '2016-12-19 20:33:30'),
(120, '1Q4ErNbEFkR1Rf6', 0, '82.102.81.39', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:33:53', '2016-12-19 20:33:53'),
(121, 'fejHZKJetkfRR10', 0, '84.73.22.135', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:34:01', '2016-12-19 20:34:01'),
(122, 'PXZFN6opqSxux8q', 0, '180.178.173.203', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:34:05', '2016-12-19 20:34:05'),
(123, 'G2Gwx5jRmXsA87a', 0, '81.203.244.201', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:36:04', '2016-12-19 20:36:04'),
(124, 'urJsgQKNnQmgEh7', 0, '81.151.48.217', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:40:03', '2016-12-19 20:40:03'),
(125, 'MepFX4UJwgkpNO', 0, '82.102.224.109', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:41:25', '2016-12-19 20:41:25'),
(126, 'njhRdGOiNRUbnx', 0, '65.50.0.4', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:45:27', '2016-12-19 20:45:27'),
(127, 'qEFATeyST6hnDws', 0, '150.70.173.59', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:47:35', '2016-12-19 20:47:35'),
(128, 'ZgrYPlJtghy3n22', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:47:47', '2016-12-19 20:47:47'),
(129, 'FnMBfiAvO8h9R1s', 0, '78.122.207.24', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:49:38', '2016-12-19 20:49:38'),
(130, 'Vo9hzvt4aNr5x9O', 0, '62.1.211.99', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:50:40', '2016-12-19 20:50:40'),
(131, '7jDYuAyYaaHuKVh', 0, '88.116.239.10', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:59:03', '2016-12-19 20:59:03'),
(132, 'Zn8hZ1Aivfn5ehA', 0, '85.143.12.43', '', 'en_US', 'THB', 0, 0, '2016-12-19 20:59:52', '2016-12-19 20:59:52'),
(133, 'xwBVqHjgWPygiGB', 0, '191.248.75.33', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:01:21', '2016-12-19 21:01:21'),
(134, 'VMgcTXK937Ueenl', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:02:20', '2016-12-19 21:02:20'),
(135, 'SLmgSdUqVzJVuy', 0, '177.143.115.113', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:02:33', '2016-12-19 21:02:33'),
(136, 'ofZoFGVH0hkvfE', 0, '185.18.245.222', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:05:02', '2016-12-19 21:05:02'),
(137, 'MOyizGpT9JIWC6j', 0, '86.103.182.95', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:06:37', '2016-12-19 21:06:37'),
(138, 'w3jWMltX8hMrTJ5', 0, '78.176.120.75', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:07:39', '2016-12-19 21:07:39'),
(139, 'v8gYxv5cXPRjkjE', 0, '150.70.173.21', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:08:47', '2016-12-19 21:08:47'),
(140, 'YOzk6gXE94J3Nn', 0, '80.109.110.199', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:16:58', '2016-12-19 21:16:58'),
(141, 'Ryt9yvrFQ94hZed', 0, '139.162.248.201', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:18:07', '2016-12-19 21:18:07'),
(142, 'X3Xc72CA2G7c7', 0, '150.70.173.21', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:18:50', '2016-12-19 21:18:50'),
(143, '1eiW3MOGKS75Nb', 0, '93.84.56.7', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:21:25', '2016-12-19 21:21:25'),
(144, 'kPVTk7aisdIQwq2', 0, '93.84.56.7', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:21:37', '2016-12-19 21:21:37'),
(145, '9I2t9qg9rNs2xAJ', 0, '49.49.250.59', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:32:51', '2016-12-19 21:32:51'),
(146, 'hg8BevWv1BuUIjZ', 0, '170.22.76.184', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:33:56', '2016-12-19 21:33:56'),
(147, '4k8enrACHukPeqs', 0, '199.19.249.196', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:33:57', '2016-12-19 21:33:57'),
(148, 'WG9irlzF7off6JK', 0, '191.5.146.137', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:34:14', '2016-12-19 21:34:14'),
(149, '9TebMeiFiXmoAMr', 0, '88.71.246.3', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:35:34', '2016-12-19 21:35:34'),
(150, 'V3LakGBaKYmhXJ', 0, '84.227.251.147', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:36:22', '2016-12-19 21:36:22'),
(151, 'grp7YZHWBIrcj6G', 0, '41.82.2.63', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:39:30', '2016-12-19 21:39:30'),
(152, 'fn7kzdOlKqPJFF4', 0, '66.249.93.56', '', 'en_US', 'THB', 0, 0, '2016-12-19 21:46:51', '2016-12-19 21:46:51'),
(153, 'n2NnTmZogfeyg3W', 0, '5.94.253.60', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:31:08', '2016-12-19 22:31:08'),
(154, 'miaUftBrM9Fj07Q', 0, '179.252.60.156', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:33:55', '2016-12-19 22:33:55'),
(155, 'LICaQY1tNIiaLms', 0, '80.39.140.20', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:36:13', '2016-12-19 22:36:13'),
(156, 'PhlysbC2onHA8Xe', 0, '197.237.110.162', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:37:06', '2016-12-19 22:37:06'),
(157, 'pIYkxsqVd8hGwVQ', 0, '41.212.20.76', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:37:52', '2016-12-19 22:37:52'),
(158, '6UoMXZlF87JGMGO', 0, '105.156.95.164', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:38:32', '2016-12-19 22:38:32'),
(159, 'ovnQw3EmmgUuhvH', 0, '109.128.80.250', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:41:20', '2016-12-19 22:41:20'),
(160, 'ALfoVCGamJ8teud', 0, '217.79.45.11', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:42:54', '2016-12-19 22:42:54'),
(161, '83frlsKiKm5MAYm', 0, '217.79.45.11', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:42:55', '2016-12-19 22:42:55'),
(162, '9fVaPWAiElVyBN', 0, '88.167.26.21', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:43:23', '2016-12-19 22:43:23'),
(163, 'rxn3p2zq1oo8t', 0, '177.70.176.68', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:47:05', '2016-12-19 22:47:05'),
(164, 'tiLuER4lCORABdm', 0, '107.167.116.228', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:51:18', '2016-12-19 22:51:18'),
(165, '0CPsiZhm61WR4Tb', 0, '172.56.23.17', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:53:45', '2016-12-19 22:53:45'),
(166, 'ZTjSzmoi9WwbVl', 0, '49.228.137.200', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:55:28', '2016-12-19 22:55:28'),
(167, 'LjWfdMnW3CMBM5o', 0, '87.13.4.166', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:56:31', '2016-12-19 22:56:31'),
(168, 'pzrv37vs4V6p6h0', 0, '41.109.147.49', '', 'en_US', 'THB', 0, 0, '2016-12-19 22:58:17', '2016-12-19 22:58:17'),
(169, 'FNujpduPcTX6D0', 0, '64.233.173.143', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:02:55', '2016-12-19 23:02:55'),
(170, 'lD09uou0DEvpnxy', 0, '191.32.68.252', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:03:00', '2016-12-19 23:03:00'),
(171, 'cWbyVYcfz4ybfJB', 0, '94.190.193.51', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:06:36', '2016-12-19 23:06:36'),
(172, 'CNGYfN6Y4qEhGHx', 0, '2.137.98.60', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:07:08', '2016-12-19 23:07:08'),
(173, 'qImOF7ObWxnIrK', 0, '176.46.102.212', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:07:10', '2016-12-19 23:07:10'),
(174, 'd0y6jAcaEznR2Xr', 0, '78.19.176.141', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:07:11', '2016-12-19 23:07:11'),
(175, 'ZHQeKlcU4LZeHO', 0, '31.221.51.243', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:07:46', '2016-12-19 23:07:46'),
(176, 'ITSo8pl5ijbLe71', 0, '189.208.21.59', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:08:58', '2016-12-19 23:08:58'),
(177, 'vDVTcqmfnrBg3uc', 0, '84.209.115.62', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:12:08', '2016-12-19 23:12:08'),
(178, 'qaZVK90r0qk82w', 0, '188.250.220.164', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:21:42', '2016-12-19 23:21:42'),
(179, '2e5PhzapUCP7UeH', 0, '181.67.235.67', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:36:47', '2016-12-19 23:36:47'),
(180, 'as2o77ynJIB9fJV', 0, '105.157.255.212', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:55:25', '2016-12-19 23:55:25'),
(181, 'SIOcmyUScxikhgx', 0, '93.203.141.196', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:58:38', '2016-12-19 23:58:38'),
(182, '33m4bLO0xkdyRlR', 0, '191.248.75.33', '', 'en_US', 'THB', 0, 0, '2016-12-19 23:59:00', '2016-12-19 23:59:00'),
(183, 'R1u5Qjuj1UTds4d', 0, '190.92.44.84', '', 'en_US', 'THB', 0, 0, '2016-12-20 00:14:49', '2016-12-20 00:14:49'),
(184, 'CTYcTxoYC5Vfv', 0, '143.208.77.71', '', 'en_US', 'THB', 0, 0, '2016-12-20 00:20:57', '2016-12-20 00:20:57'),
(185, 'lTwyFPf1lHUENdT', 0, '78.180.124.236', '', 'en_US', 'THB', 0, 0, '2016-12-20 00:24:10', '2016-12-20 00:24:10'),
(186, 'GunBQ0NTAxb0ihz', 0, '217.236.63.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 00:28:35', '2016-12-20 00:28:35'),
(187, 'xjfGRSkfU6DkIrM', 0, '187.62.190.154', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:02:04', '2016-12-20 01:02:04'),
(188, 'T9KuVyZfSvQv2r', 0, '191.98.189.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:04:34', '2016-12-20 01:04:34'),
(189, 'cQmN7HwSUR9HHiS', 0, '76.170.177.27', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:08:01', '2016-12-20 01:08:01'),
(190, 'w3YcIzAJM7VCrJM', 0, '119.93.241.151', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:09:46', '2016-12-20 01:09:46'),
(191, 'MP0pVaSMNEuy2e3', 0, '68.180.228.107', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:16:44', '2016-12-20 01:16:44'),
(192, 'V1XQDcmFxV5bIjA', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:26:38', '2016-12-20 01:26:38'),
(193, 'TMjzYHYPRiFj0qp', 0, '66.249.79.178', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:26:38', '2016-12-20 01:26:38'),
(194, 'eniL1Cmdwo1mFxL', 0, '91.126.20.12', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:30:43', '2016-12-20 01:30:43'),
(195, 'c97EhsIknGSqxw', 0, '196.217.16.42', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:34:20', '2016-12-20 01:34:20'),
(196, 'Kd8BwYkvDfBi5A', 0, '73.110.45.246', '', 'en_US', 'THB', 0, 0, '2016-12-20 01:37:08', '2016-12-20 01:37:08'),
(197, '0TSDbnwvyI2T0L4', 0, '187.148.135.182', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:02:17', '2016-12-20 02:02:17'),
(198, 'XiX0rvGQUo3sJR', 23, '142.234.115.35', '', 'en_US', 'THB', 1, 0, '2016-12-20 02:04:11', '2016-12-20 02:02:20'),
(199, 'OwHXl5sVHgZ2hVf', 0, '89.114.177.6', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:08:45', '2016-12-20 02:08:45'),
(200, 'Yh0qGAzkr23lMNt', 0, '94.134.136.91', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:16:02', '2016-12-20 02:16:02'),
(201, '2ESzkg2BjUD7exl', 0, '140.0.234.67', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:16:39', '2016-12-20 02:16:39'),
(202, '3ZGEqVrtXVfXn9i', 0, '190.189.225.12', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:18:07', '2016-12-20 02:18:07'),
(203, '2iCPY5RazeWuftD', 0, '180.150.16.86', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:18:24', '2016-12-20 02:18:24'),
(204, 'p6K0D3KxgNPZqJS', 0, '202.80.212.19', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:20:30', '2016-12-20 02:20:30'),
(205, 'VtUFL895GiDKMHJ', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:37:31', '2016-12-20 02:37:31'),
(206, 'xtjvbsaAAtMxetN', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:40:32', '2016-12-20 02:40:32'),
(207, '48ufWNjMYUeFYkv', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:40:41', '2016-12-20 02:40:41'),
(208, 'KhGOwcvnftO6aQp', 0, '66.249.79.172', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:40:51', '2016-12-20 02:40:51'),
(209, 'nJ2J8Vxhmddht3o', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:41:02', '2016-12-20 02:41:02'),
(210, 'tALgWOMBIjeO9px', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:41:13', '2016-12-20 02:41:13'),
(211, 'GxQO9GfkKByBN4Z', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:41:24', '2016-12-20 02:41:24'),
(212, 'B5P1UFgOFaxsVwm', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:41:37', '2016-12-20 02:41:37'),
(213, 'ywuyyGbeoq00Cu', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:41:58', '2016-12-20 02:41:58'),
(214, 'MlwHdx0GLDGIuBM', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:42:22', '2016-12-20 02:42:22'),
(215, 'jszyGzSy94p9qdT', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:42:46', '2016-12-20 02:42:46'),
(216, 'e7BStNawijHlDMo', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:43:10', '2016-12-20 02:43:10'),
(217, 'uAe3XJKeJDoeaR8', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:43:35', '2016-12-20 02:43:35'),
(218, 'MmdGSMaLFyPJaof', 0, '66.249.79.175', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:44:01', '2016-12-20 02:44:01'),
(219, '5m6ORGMPBiX4SyB', 0, '66.249.79.172', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:45:20', '2016-12-20 02:45:20'),
(220, 'jBctWeLXEbfgyjz', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:45:37', '2016-12-20 02:45:37'),
(221, 'NFm7L8KUKyEP4sZ', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:45:53', '2016-12-20 02:45:53'),
(222, 'nl7dP0Ob6qRVGpD', 0, '66.249.79.178', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:46:11', '2016-12-20 02:46:11'),
(223, 'oV7QzVKgVkGtq0', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:46:27', '2016-12-20 02:46:27'),
(224, '9xpz0lpaL9R0dbR', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:46:43', '2016-12-20 02:46:43'),
(225, 'IEbYCmjTec5QPo', 0, '66.249.79.172', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:47:00', '2016-12-20 02:47:00'),
(226, 'UCdL0FGEJGtQzth', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:47:16', '2016-12-20 02:47:16'),
(227, 'qaMNHPaxlL1Siki', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:47:32', '2016-12-20 02:47:32'),
(228, 'btSARn0zMZt1XJ5', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:50:30', '2016-12-20 02:50:30'),
(229, 'GTvIbhNN4gOnci', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:54:17', '2016-12-20 02:54:17'),
(230, 'aJ3MQPprfYAkByz', 0, '66.249.79.175', '', 'en_US', 'THB', 0, 0, '2016-12-20 02:58:04', '2016-12-20 02:58:04'),
(231, 'WzcfYAfuBjIR9yj', 0, '103.208.159.135', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:00:53', '2016-12-20 03:00:53'),
(232, 'UCOMbMxyTJCXRVQ', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:01:51', '2016-12-20 03:01:51'),
(233, 'VevQTbmuQNDCHk1', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:05:38', '2016-12-20 03:05:38'),
(234, '6x393KK4les1Nsf', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:09:25', '2016-12-20 03:09:25'),
(235, 'Xgtf3XXjOCaCHqv', 0, '189.216.56.78', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:09:44', '2016-12-20 03:09:44'),
(236, 'TcHxPI9b7SLyErj', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:13:12', '2016-12-20 03:13:12'),
(237, '9B1KeypeVAPLhYW', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:16:59', '2016-12-20 03:16:59'),
(238, 'twGIVwUaxvdkce', 0, '202.153.81.161', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:18:28', '2016-12-20 03:18:28'),
(239, '1ZE35rsLTijAhH', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:20:46', '2016-12-20 03:20:46'),
(240, 'gUXKkNtmNlZ9gN3', 0, '52.71.155.178', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:23:54', '2016-12-20 03:23:54'),
(241, 'Erfa5BcqPhKsdK9', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:24:33', '2016-12-20 03:24:33'),
(242, 'YMLVPpKsrFJ8qem', 0, '52.71.155.178', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:25:13', '2016-12-20 03:25:13'),
(243, 'JB4f9PBTQZdP2nS', 0, '14.207.173.231', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:26:39', '2016-12-20 03:26:39'),
(244, 'YaX2LNwhg6OAMcT', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:28:20', '2016-12-20 03:28:20'),
(245, 'oH6QjQekU5a0VNr', 0, '88.27.160.68', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:28:46', '2016-12-20 03:28:46'),
(246, 'YxvoRy5ge5i6rB4', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:32:07', '2016-12-20 03:32:07'),
(247, 'nswkDWvEtgxp3Qa', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:35:54', '2016-12-20 03:35:54'),
(248, 'YYyVDYFd4qceXwu', 0, '66.249.79.175', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:39:43', '2016-12-20 03:39:43'),
(249, '59Og3XIeDhLwWI', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:43:29', '2016-12-20 03:43:29'),
(250, '6hmv9SK4ywbDHno', 0, '14.207.169.239', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:45:00', '2016-12-20 03:45:00'),
(251, 'c61JdG7oGk3YTe8', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:47:15', '2016-12-20 03:47:15'),
(252, 'pqO779YP5EH4EU', 0, '84.120.5.188', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:47:42', '2016-12-20 03:47:42'),
(253, 'ytmLe3fcPe79IJu', 0, '88.27.160.68', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:49:28', '2016-12-20 03:49:28'),
(254, '7cFjLnvt1enc8AX', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:51:02', '2016-12-20 03:51:02'),
(255, 'fuq5Pv03gCM0OX', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:54:49', '2016-12-20 03:54:49'),
(256, 'vsJJfyY5OBBABY9', 0, '103.68.7.255', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:57:32', '2016-12-20 03:57:32'),
(257, 'JuZfcKwA2kZPLk', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 03:59:04', '2016-12-20 03:59:04'),
(258, 'DJgoVB5r0XJf8Do', 0, '97.96.0.128', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:02:23', '2016-12-20 04:02:23'),
(259, '8fsGVDG1fdwPknn', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:02:23', '2016-12-20 04:02:23'),
(260, 'F6md40rLsyHVzE', 0, '37.113.1.181', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:04:10', '2016-12-20 04:04:10'),
(261, 'U0FF256MMTSYGSc', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:06:10', '2016-12-20 04:06:10'),
(262, 'nqmmkGNc6oHzA32', 0, '203.125.53.62', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:07:44', '2016-12-20 04:07:44'),
(263, 'ZP2RRHUhzg4qLQ5', 0, '180.183.147.68', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:08:47', '2016-12-20 04:08:47'),
(264, 'e2fxfnQfXxklnGD', 0, '66.249.79.178', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:09:57', '2016-12-20 04:09:57'),
(265, 'LY2t2bYZEgYDQf', 0, '1.162.72.174', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:10:04', '2016-12-20 04:10:04'),
(266, 'SfCtPTigTlBkr', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:14:01', '2016-12-20 04:14:01'),
(267, 'pcFO3HIvgS3JCof', 0, '94.122.250.4', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:16:16', '2016-12-20 04:16:16'),
(268, 'ft4N2ZEP9mWnm94', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:17:32', '2016-12-20 04:17:32'),
(269, '2Qpzgau5UY5hx4Q', 0, '66.249.79.175', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:21:18', '2016-12-20 04:21:18'),
(270, 'A6d6hb0N4DwbGGe', 0, '70.88.179.241', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:24:05', '2016-12-20 04:24:05'),
(271, 'eArJK2W5lNyP7Y', 0, '66.249.71.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:25:05', '2016-12-20 04:25:05'),
(272, 'jejpBoCgupEFARb', 0, '103.68.7.255', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:27:31', '2016-12-20 04:27:31'),
(273, 'xErhrjvMF2jZmuy', 0, '66.249.79.178', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:28:52', '2016-12-20 04:28:52'),
(274, 'DFUXuPbuxd4IbqZ', 0, '97.85.143.27', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:29:00', '2016-12-20 04:29:00'),
(275, 'yG04kb4K2qV7U8g', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:32:39', '2016-12-20 04:32:39'),
(276, 'yvLQC20YDuPNj17', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:36:26', '2016-12-20 04:36:26'),
(277, '9uD2Afg5fRcXQsD', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:40:13', '2016-12-20 04:40:13'),
(278, 'ZkOpAGYGoDwZ0iP', 0, '66.249.79.178', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:44:00', '2016-12-20 04:44:00'),
(279, '29stXa06xu6gGWE', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:47:47', '2016-12-20 04:47:47'),
(280, 'TQc1td0BjITjlOq', 0, '66.249.71.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:51:34', '2016-12-20 04:51:34'),
(281, 'IoDxiNycmqs8nc6', 0, '65.255.63.14', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:55:01', '2016-12-20 04:55:01'),
(282, '84EvFVeFwnqYxF5', 0, '66.249.71.132', '', 'en_US', 'THB', 0, 0, '2016-12-20 04:55:21', '2016-12-20 04:55:21'),
(283, '5cVg51aNejW6RDg', 0, '122.179.168.133', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:03:07', '2016-12-20 05:03:07'),
(284, 'YwhS9GCOFPAS1y', 0, '207.244.89.75', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:03:48', '2016-12-20 05:03:48'),
(285, 'MuIBg1dyVnPjbJC', 0, '98.113.136.128', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:05:54', '2016-12-20 05:05:54'),
(286, '0VrBldVxICVMzFU', 0, '113.162.125.26', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:06:56', '2016-12-20 05:06:56'),
(287, 'mP7AImyFOw5oM3X', 0, '110.143.92.60', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:12:26', '2016-12-20 05:12:26'),
(288, 'sv324RrMtNHmiTo', 0, '58.247.3.26', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:15:00', '2016-12-20 05:15:00'),
(289, 'KeTKbriDtPXzI1f', 0, '101.226.125.105', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:15:19', '2016-12-20 05:15:19'),
(290, 'Lu3ugniHwmB5nR', 0, '103.44.18.226', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:25:33', '2016-12-20 05:25:33'),
(291, 'Ubd2Tc1oFFTj5B', 0, '120.56.230.29', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:25:49', '2016-12-20 05:25:49'),
(292, 'UZllq9sxQaOONtX', 0, '210.56.98.32', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:30:09', '2016-12-20 05:30:09'),
(293, 'tctmwAzwJ7TVxO9', 0, '73.138.123.53', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:30:10', '2016-12-20 05:30:10'),
(294, 'hR9I6FI5otpNnta', 0, '37.222.247.212', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:33:24', '2016-12-20 05:33:24'),
(295, 'gQGQl5Ivc4iXXP', 0, '217.236.63.134', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:38:28', '2016-12-20 05:38:28'),
(296, 'GtANp6SWAbDQOP', 0, '68.5.181.116', '', 'en_US', 'THB', 0, 0, '2016-12-20 05:57:38', '2016-12-20 05:57:38'),
(297, 'iAYcnRRzCGekPbP', 0, '14.188.127.39', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:23:16', '2016-12-20 06:23:16'),
(298, 'oUQnBxEQmyE1hfw', 0, '77.246.52.52', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:24:00', '2016-12-20 06:24:00'),
(299, 'aUGIBailcrL4okP', 0, '223.179.151.61', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:26:38', '2016-12-20 06:26:38'),
(300, 'bjsl5Bo0vFOw6vC', 0, '166.216.157.91', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:32:39', '2016-12-20 06:32:39'),
(301, 'mJUnrWMio8anWUG', 0, '166.216.157.91', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:32:47', '2016-12-20 06:32:47'),
(302, 'tilLTOYm4hroHon', 0, '166.216.157.91', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:32:47', '2016-12-20 06:32:47'),
(303, 'y41XzzDDifqOGJH', 0, '166.216.157.91', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:32:48', '2016-12-20 06:32:48'),
(304, 'NwSsbJqvGPxCGZs', 0, '1.22.42.204', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:34:14', '2016-12-20 06:34:14'),
(305, 'G2D1XS3MgA4ft', 0, '193.34.160.14', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:36:00', '2016-12-20 06:36:00'),
(306, 'kwtaaEfHaACV5yS', 0, '69.181.171.39', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:39:03', '2016-12-20 06:39:03'),
(307, '65986oJxMnmWsPn', 0, '175.143.12.107', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:42:23', '2016-12-20 06:42:23'),
(308, '9HVUagZe5c34d3t', 0, '103.236.194.54', '', 'en_US', 'THB', 0, 0, '2016-12-20 06:48:18', '2016-12-20 06:48:18'),
(309, 'PcQ2569N6U2DYRn', 0, '105.231.167.10', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:01:03', '2016-12-20 07:01:03'),
(310, 'WQLEOGVNMjgzAAv', 0, '5.254.65.142', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:04:07', '2016-12-20 07:04:07'),
(311, 'YA9j1SbfCgyVtf', 0, '43.224.221.70', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:09:26', '2016-12-20 07:09:26'),
(312, 'xhtbiUOJO42xJxN', 0, '185.140.28.6', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:09:55', '2016-12-20 07:09:55'),
(313, 'Rwr02zbvq6RCmCo', 0, '115.108.7.124', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:14:54', '2016-12-20 07:14:54'),
(314, 'iHARF5oHN0dHqhV', 0, '153.207.129.146', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:21:07', '2016-12-20 07:21:07'),
(315, 'TrfkasbVX4F58n', 0, '196.206.14.29', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:21:45', '2016-12-20 07:21:45'),
(316, '4NNxu8ohfwZvusN', 0, '49.228.137.15', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:25:29', '2016-12-20 07:25:29'),
(317, 'eWhdc1cnV9hUFOu', 0, '183.89.198.199', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:25:31', '2016-12-20 07:25:31'),
(318, 'ZrDc2y6Jy7TBo2r', 0, '171.246.33.204', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:31:54', '2016-12-20 07:31:54'),
(319, 'tTBWzT7azzjrxBf', 0, '123.231.106.12', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:34:42', '2016-12-20 07:34:42'),
(320, 'dj4LWj9X3W9Jlln', 0, '103.20.81.11', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:36:28', '2016-12-20 07:36:28'),
(321, '0uA34aoDzh8zV6B', 0, '58.26.203.16', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:41:19', '2016-12-20 07:41:19'),
(322, 'FdKHgJdR5eOPfua', 0, '1.128.96.44', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:44:57', '2016-12-20 07:44:57'),
(323, 'J20GcThyxRhMKdK', 0, '1.128.96.44', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:45:00', '2016-12-20 07:45:00'),
(324, 'yDtzrPQj6EzrXxD', 0, '2.14.155.250', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:47:12', '2016-12-20 07:47:12'),
(325, 'hayTIt511CekLhV', 0, '202.69.15.70', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:52:19', '2016-12-20 07:52:19'),
(326, '7gDUELxVvwToOC', 0, '202.69.15.70', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:52:54', '2016-12-20 07:52:54'),
(327, 'wco6HMVMlwMfgRq', 0, '129.122.211.234', '', 'en_US', 'THB', 0, 0, '2016-12-20 07:53:14', '2016-12-20 07:53:14'),
(328, 'Dx37A49cJOZ89H', 0, '213.14.142.238', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:07:56', '2016-12-20 08:07:56'),
(329, 'W3afQXcnN58VMXn', 0, '95.144.18.99', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:11:03', '2016-12-20 08:11:03'),
(330, 'ZU5ZtcQoub6dLv', 0, '61.19.71.133', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:12:26', '2016-12-20 08:12:26'),
(331, 'm4xgNNnp7eul0gv', 0, '110.170.172.66', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:15:27', '2016-12-20 08:15:27'),
(332, 'nDTfAizlJcGb9', 0, '37.135.26.202', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:15:49', '2016-12-20 08:15:49'),
(333, 'KyxwM5V89l4jKNZ', 0, '169.149.36.119', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:17:23', '2016-12-20 08:17:23'),
(334, 'ghEeR1C30PMDFpG', 0, '175.214.44.29', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:18:48', '2016-12-20 08:18:48'),
(335, 'YjPaLckYyECJvL', 0, '175.214.44.29', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:18:53', '2016-12-20 08:18:53'),
(336, 'Fmew3lU5djObBGP', 0, '85.220.37.99', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:19:30', '2016-12-20 08:19:30'),
(337, 'oErBCcwEk2UASHZ', 0, '223.30.158.94', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:21:46', '2016-12-20 08:21:46'),
(338, 'sEKXhIl14wAJIFu', 0, '217.121.223.210', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:21:57', '2016-12-20 08:21:57'),
(339, 'IHdrfwl6mNaxnhh', 0, '88.187.124.166', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:22:46', '2016-12-20 08:22:46'),
(340, '1cS8QszsriguqFt', 0, '95.224.173.122', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:23:36', '2016-12-20 08:23:36'),
(341, 'i1WalD16npJc60R', 0, '88.253.123.78', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:24:07', '2016-12-20 08:24:07'),
(342, 'FftmZtLcw57X4j', 0, '118.200.126.101', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:24:25', '2016-12-20 08:24:25'),
(343, '3IBchY4l2YgICS', 24, '88.147.80.243', '', 'en_US', 'THB', 1, 0, '2016-12-20 08:43:36', '2016-12-20 08:26:01'),
(344, '5R7jiprM2tP4k2B', 0, '79.36.247.185', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:26:44', '2016-12-20 08:26:44'),
(345, '7Mt9fk5Rw5TbmZ', 0, '85.96.243.147', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:30:19', '2016-12-20 08:30:19'),
(346, 'U7HZGE6MaPPPDsp', 0, '176.37.178.116', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:34:44', '2016-12-20 08:34:44'),
(347, '7PyPcxtxZIURxxe', 0, '109.220.10.165', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:35:58', '2016-12-20 08:35:58'),
(348, 'E9eC5UtJ5Nu6LI', 0, '109.220.10.165', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:35:59', '2016-12-20 08:35:59'),
(349, '2s1a8oGlep3rqed', 0, '106.51.235.123', '', 'en_US', 'THB', 0, 0, '2016-12-20 08:56:55', '2016-12-20 08:56:55'),
(350, 'Km79l9hbttb878', 0, '175.145.87.229', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:05:56', '2016-12-20 09:05:56'),
(351, 'Kq7PA1wXVeZ8eNr', 0, '14.207.78.131', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:12:19', '2016-12-20 09:12:19'),
(352, 'DOFUxMrw7wOgS4', 0, '121.121.36.194', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:16:24', '2016-12-20 09:16:24'),
(353, '0M1CZSWygAuWqL', 0, '78.188.180.56', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:20:57', '2016-12-20 09:20:57'),
(354, '1GM6stcSs04Yljx', 0, '2.237.46.52', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:25:57', '2016-12-20 09:25:57'),
(355, 'vG23JaHZQfV7zvL', 0, '83.110.232.203', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:26:03', '2016-12-20 09:26:03'),
(356, 'sZucHenzWGysfH9', 0, '45.116.228.58', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:26:56', '2016-12-20 09:26:56'),
(357, 'jmosXHQsrK2oImn', 0, '62.80.178.194', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:50:45', '2016-12-20 09:50:45'),
(358, 'GMBhKUsXksNrXG3', 0, '83.53.122.2', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:50:53', '2016-12-20 09:50:53'),
(359, 'HhpPPvdEDghML1P', 0, '179.191.206.173', '', 'en_US', 'THB', 0, 0, '2016-12-20 09:58:29', '2016-12-20 09:58:29'),
(360, 'h95sh3pcTtJWnrL', 0, '114.79.32.233', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:00:07', '2016-12-20 10:00:07'),
(361, 'jocCD42lr34Q3N', 0, '146.52.194.87', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:04:33', '2016-12-20 10:04:33'),
(362, '1EQiTuMG83U97vH', 0, '146.52.194.87', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:04:48', '2016-12-20 10:04:48'),
(363, 'Vd4c0BThTs71mk', 0, '146.52.194.87', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:04:56', '2016-12-20 10:04:56'),
(364, 'mRIP0hLTgQItYBR', 0, '95.242.171.11', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:08:22', '2016-12-20 10:08:22'),
(365, 'UTffeC1uJ1IQU', 0, '95.242.171.11', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:08:23', '2016-12-20 10:08:23'),
(366, 'mffebVyK90zVOiI', 0, '213.160.16.34', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:11:06', '2016-12-20 10:11:06'),
(367, 'hEaNXbokkiyde7J', 0, '92.207.195.20', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:17:41', '2016-12-20 10:17:41'),
(368, 'I0E95jInGPgTLw2', 0, '103.225.228.130', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:24:11', '2016-12-20 10:24:11'),
(369, '9dxzdT7pe7QH4v', 0, '79.6.225.243', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:26:13', '2016-12-20 10:26:13'),
(370, 'i56cEEyBqKwtKdO', 0, '94.243.94.120', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:29:55', '2016-12-20 10:29:55'),
(371, 'Hq1WbPBjgf8HUHd', 0, '106.51.235.123', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:30:28', '2016-12-20 10:30:28'),
(372, 'jMoSedvXDoUmBa7', 0, '81.130.185.253', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:31:45', '2016-12-20 10:31:45'),
(373, 'Kpkd2c02OXLq00I', 0, '77.127.29.154', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:36:57', '2016-12-20 10:36:57'),
(374, 'DjrFI0jXAADd9ET', 0, '107.184.50.76', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:41:28', '2016-12-20 10:41:28'),
(375, 'xUNXGhYFSOMq0vk', 0, '125.254.23.190', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:52:32', '2016-12-20 10:52:32'),
(376, '1JjTjuy4ZnW1XDs', 0, '197.41.38.82', '', 'en_US', 'THB', 0, 0, '2016-12-20 10:53:34', '2016-12-20 10:53:34'),
(377, 'xHSCnLjumyhDVE', 0, '217.73.139.83', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:07:37', '2016-12-20 11:07:37'),
(378, 'gehPzV6yXYfjamk', 0, '203.171.210.19', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:19:02', '2016-12-20 11:19:02'),
(379, 'NRLPyUrqHMJMM4j', 0, '191.5.146.137', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:20:48', '2016-12-20 11:20:48'),
(380, 'TfOpuU83Ir8S4B2', 0, '84.21.23.220', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:22:43', '2016-12-20 11:22:43'),
(381, 'NLkpdQlX4FPLyOY', 0, '120.59.109.115', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:26:26', '2016-12-20 11:26:26'),
(382, 'xeL5322GBP2bN7', 0, '189.111.235.199', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:27:38', '2016-12-20 11:27:38'),
(383, 'jFfh19WjhfNL98Z', 0, '91.231.206.100', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:34:09', '2016-12-20 11:34:09'),
(384, 'gl7ip5V88kWjuDO', 0, '49.228.137.200', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:34:18', '2016-12-20 11:34:18'),
(385, '5MCd1K7PvDkQa', 0, '119.2.19.101', '', 'en_US', 'THB', 0, 0, '2016-12-20 11:34:45', '2016-12-20 11:34:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
