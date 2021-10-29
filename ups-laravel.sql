-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2021 at 03:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ups-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_books`
--

CREATE TABLE `address_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'from',
  `country` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instruction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trans_type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Residential|Business',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Parcel|Envelop'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_books`
--

INSERT INTO `address_books` (`id`, `user_id`, `type`, `country`, `province`, `city`, `name`, `line_1`, `line_2`, `attention`, `instruction`, `postal_code`, `created_at`, `updated_at`, `trans_type`, `phone`, `email`, `service_type`) VALUES
(1, 3, 'to', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', '', 'sefesf', 'sefesf', 'H7V2V2', '2021-06-29 05:04:57', '2021-06-29 05:04:57', 'business', '23', 'sef@sef', 'parcel'),
(2, 3, 'from', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', '2021-06-29 05:04:57', '2021-06-29 05:04:57', 'residential', '123', 'em@em', 'parcel'),
(3, 3, 'to', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MbVey', '', 'sefesf', 'sefesf', 'H7V2V2', '2021-06-29 05:36:33', '2021-06-29 05:36:33', 'business', '23', 'sef@sef', 'envelop'),
(4, 3, 'from', 'CA', 'QC', 'lasalle', 'env from', '75 Rue McVey', '', 'test', 'test', 'H8R3T3', '2021-06-29 05:36:33', '2021-06-29 05:36:33', 'residential', '123', 'em@em', 'envelop'),
(5, 1, 'to', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', '2021-07-11 16:31:11', '2021-07-11 16:31:11', 'business', '0123456', 'agent@email.com', 'parcel'),
(6, 1, 'from', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', '2021-07-11 16:31:11', '2021-07-11 16:31:11', 'residential', '0123456', 'agent@email.com', 'parcel'),
(7, 1, 'to', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', '2021-07-11 16:33:36', '2021-07-11 16:33:36', 'business', '0123456', 'agent@email.com', 'envelop'),
(8, 1, 'from', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', '2021-07-11 16:33:36', '2021-07-11 16:33:36', 'residential', '0123456', 'agent@email.com', 'envelop'),
(11, 1, 'to', 'CA', 'QC', 'lasalle', 'last company', 'address shohada', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', '2021-08-21 01:25:02', '2021-08-21 01:25:02', 'business', '111222333', 'user@email.com', 'parcel'),
(12, 1, 'from', 'CA', 'QC', 'laval', 'nehtech', 'hashempoor', 'hash 10', 'atten', 'instr', 'H7V2V2', '2021-08-21 01:25:02', '2021-08-21 01:25:02', 'residential', '123', 'agent@email.com', 'parcel'),
(13, 1, 'to', 'CA', 'QC', 'laval', 'comp to env', 'addr line env', 'addr line 2 env to', 'atten 2 to env', 'ubstry', 'H7V2V2', '2021-08-21 01:34:27', '2021-08-21 01:34:27', 'residential', '987654123', 'newagent@email.com', 'parcel'),
(14, 1, 'from', 'CA', 'QC', 'lasalle', 'env comp', 'addre line env', 'line env 2', 'env from atten', 'env from inst', 'H8R3T3', '2021-08-21 01:34:27', '2021-08-21 01:34:27', 'residential', '4432', 'em.alban@em.com', 'parcel'),
(15, 1, 'to', 'CA', 'te', 'awda', 'I have', '22eedd55', '44eedd1122', 'test', 'test', 'H7V2V2', '2021-08-21 04:34:36', '2021-08-21 04:34:36', '', '0123456', 'agent@email.com', 'envelop'),
(16, 3, 'to', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', 'sefsfdrd', 'sefesf', 'sefesf', 'H7V2V2', '2021-08-21 11:51:56', '2021-08-21 11:51:56', 'residential', '23', 'sef@sef', 'parcel'),
(17, 3, 'from', 'CA', 'QC', 'lasalle', 'sefsf', '75 Rue McVey', 'saesefes', 'test', 'test', 'H8R3T3', '2021-08-21 11:51:57', '2021-08-21 11:51:57', 'residential', '123', 'em@em', 'parcel'),
(18, 3, 'to', 'CA', 'QC', 'laval', 'sefasas', '75 Rue McVey', '', 'sefesf', 'sefesf', 'H7V2V2', '2021-08-21 11:58:52', '2021-08-21 11:58:52', 'residential', '23', 'sef@sef', 'envelop'),
(19, 1, 'to', 'CA', 'QC', 'user city', 'test', 'address', '', 'atten 2 to env', 'sefesf', 'H7V2V2', '2021-08-24 01:59:11', '2021-08-25 06:03:19', 'residential', '02120112', 'sef@sef', 'envelop'),
(20, 1, 'to', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', '2021-08-25 12:25:59', '2021-08-27 07:33:55', 'residential', '4386224980', 'user@email.com', 'parcel'),
(21, 3, 'to', 'US', 'CA', 'Los Angeles', 'test', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', '2021-08-27 08:11:55', '2021-08-27 08:11:55', '', '4386224980', 'agent@email.com', 'parcel'),
(22, 3, 'from', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', '2021-08-27 08:12:22', '2021-08-27 08:12:22', '', '4386224980', 'agent@email.com', 'parcel');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'UPS', 'This is UPS Store', '2021-07-04 08:58:48', '2021-07-04 09:12:06'),
(2, 'Fedex', 'It is Fedex', '2021-08-21 04:53:36', '2021-08-21 04:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `agent_services`
--

CREATE TABLE `agent_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sandbox` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_services`
--

INSERT INTO `agent_services` (`id`, `agent_id`, `name`, `access_key`, `username`, `password`, `account_number`, `sandbox`, `created_at`, `updated_at`) VALUES
(2, 3, 'agent@email.com', 'CD97722D88D5ECD5', 'TUPSS370', 'H7v2v2845', 'V3685E', 0, '2021-07-04 22:35:56', '2021-08-22 00:49:14'),
(4, 7, 'agent1@email.com', 'CD97722D88D5ECD5', 'TUPSS370', 'H7v2v2845', 'V3685E', 0, '2021-07-04 22:35:56', '2021-08-22 01:00:40'),
(7, 21, 'owner@test', 'tester', 'tester', 'tester', 'tester', 0, '2021-08-21 09:20:44', '2021-08-21 09:20:44'),
(8, 2, 'admin@email.com', 'CD97722D88D5ECD5', 'TUPSS370', 'H7v2v2845', 'V3685E', 0, '2021-08-21 09:23:00', '2021-08-22 00:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `bank_info`
--

CREATE TABLE `bank_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `back_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_info`
--

INSERT INTO `bank_info` (`id`, `back_name`, `transaction_number`, `branch_code`, `default`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'agent_bank_name', 'agent_trans_num', 'agent_branch_code', '1', 3, '2021-07-09 20:12:40', '2021-08-15 02:06:03'),
(6, 'tester', '885544eee', 'eedd55', '0', 3, '2021-08-15 02:05:53', '2021-08-15 02:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'package',
  `width` double(8,2) DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `length` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `insurance` decimal(8,2) DEFAULT NULL,
  `pickup` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Congo', 242),
(50, 'CD', 'Congo The Democratic Republic Of The', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_transaction_id` bigint(20) UNSIGNED NOT NULL,
  `end_transaction_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `balance_value` double(8,2) NOT NULL,
  `sent_msg_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `seen_msg_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `withdraw_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `suspend_msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `start_transaction_id`, `end_transaction_id`, `invoice_number`, `agent_id`, `balance_value`, `sent_msg_status`, `seen_msg_status`, `withdraw_status`, `suspend_msg`, `created_at`, `updated_at`) VALUES
(19, 18, 21, '20210711-041000-101', 3, -461.14, '0', '0', '1', NULL, '2021-07-11 00:12:00', '2021-08-22 03:00:00'),
(20, 23, 23, '20210711-081000-761', 3, -314.87, '0', '0', '1', NULL, '2021-07-11 03:40:00', '2021-08-22 03:00:00'),
(21, 25, 26, '20210711-083000-941', 3, 650.00, '0', '0', '1', NULL, '2021-07-11 04:00:00', '2021-08-22 03:00:00'),
(22, 27, 27, '20210711-091000-321', 3, 248.00, '0', '0', '1', NULL, '2021-07-11 04:40:00', '2021-08-22 03:00:00'),
(23, 38, 42, '20210714-120000-651', 3, -74.02, '0', '0', '1', NULL, '2021-07-14 07:30:00', '2021-08-22 03:00:00'),
(24, 43, 146, '20210814-054600-661', 3, 2314.91, '0', '0', '1', NULL, '2021-08-14 01:16:00', '2021-08-22 03:00:00'),
(25, 44, 44, '20210814-054600-672', 7, 248.00, '0', '0', '1', NULL, '2021-08-14 01:16:00', '2021-08-22 03:00:00'),
(26, 147, 147, '20210815-071000-951', 3, -3.98, '0', '0', '1', NULL, '2021-08-15 02:40:00', '2021-08-22 03:00:00'),
(27, 153, 171, '20210821-172000-431', 3, 420.66, '0', '0', '1', NULL, '2021-08-21 12:50:00', '2021-08-22 03:00:00'),
(28, 172, 173, '20210822-051000-211', 3, 18.58, '0', '0', '1', NULL, '2021-08-22 00:40:00', '2021-08-22 03:00:00'),
(29, 176, 179, '20210822-053000-431', 3, 39.24, '0', '0', '1', NULL, '2021-08-22 01:00:00', '2021-08-22 04:56:22'),
(30, 177, 177, '20210822-053000-932', 7, 44.00, '0', '0', '1', NULL, '2021-08-22 01:00:00', '2021-08-22 03:00:00'),
(31, 180, 180, '20210822-054000-631', 7, -1.29, '0', '0', '1', NULL, '2021-08-22 01:10:00', '2021-08-22 03:00:00'),
(32, 181, 181, '20210822-064000-821', 7, 289.47, '0', '0', '1', NULL, '2021-08-22 02:10:00', '2021-08-22 03:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `mailboxes`
--

CREATE TABLE `mailboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` smallint(6) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'small, large...',
  `is_empty` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_temp` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailboxes`
--

INSERT INTO `mailboxes` (`id`, `number`, `type`, `is_empty`, `is_temp`, `agent_id`, `created_at`, `updated_at`) VALUES
(3934, 1, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-14 12:45:01'),
(3935, 2, 'small', '0', '0', 3, '2021-08-02 05:03:08', '2021-08-21 12:22:07'),
(3936, 3, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-14 12:45:00'),
(3937, 4, 'small', '0', '0', 3, '2021-08-02 05:03:08', '2021-08-06 03:09:37'),
(3938, 5, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3939, 6, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-14 12:45:01'),
(3940, 7, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3941, 8, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3942, 9, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-14 12:45:01'),
(3943, 10, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-14 12:45:00'),
(3944, 11, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3945, 12, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3946, 13, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3947, 14, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3948, 15, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3949, 16, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3950, 17, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3951, 18, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-02 05:03:13'),
(3952, 19, 'small', '1', '0', 3, '2021-08-02 05:03:08', '2021-08-14 12:45:00'),
(6293, 200, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-14 12:45:00'),
(6294, 201, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-14 12:45:00'),
(6295, 202, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-14 12:45:00'),
(6296, 203, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-08 10:19:15'),
(6297, 204, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-08 10:19:15'),
(6298, 205, 'small', '0', '0', 3, '2021-08-08 10:12:47', '2021-08-18 02:19:30'),
(6299, 206, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-14 12:45:01'),
(6300, 207, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-14 12:45:01'),
(6301, 208, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-14 12:45:01'),
(6302, 209, 'small', '1', '0', 3, '2021-08-08 10:12:47', '2021-08-14 12:45:01'),
(6353, 220, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-16 04:24:34'),
(6354, 221, 'small', '1', '0', 3, '2021-08-16 04:23:44', '2021-08-16 04:24:34'),
(6355, 222, 'small', '1', '0', 3, '2021-08-16 04:23:44', '2021-08-16 04:24:34'),
(6356, 223, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-18 09:23:08'),
(6357, 224, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-18 09:22:19'),
(6358, 225, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-18 05:11:28'),
(6359, 226, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-16 05:16:22'),
(6360, 227, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-16 05:10:05'),
(6361, 228, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-16 04:47:09'),
(6362, 229, 'small', '0', '0', 3, '2021-08-16 04:23:44', '2021-08-16 04:46:39'),
(6383, 210, 'small', '0', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6384, 211, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6385, 212, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6386, 213, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6387, 214, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6388, 215, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6389, 216, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6390, 217, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6391, 218, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-18 09:50:02'),
(6392, 219, 'small', '1', '0', 3, '2021-08-18 09:49:35', '2021-08-21 12:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox_prices`
--

CREATE TABLE `mailbox_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_2` decimal(5,2) NOT NULL,
  `customer_3` decimal(5,2) NOT NULL,
  `personal_mode` decimal(5,2) NOT NULL,
  `personal_plus_mode` decimal(5,2) NOT NULL,
  `business_mode` decimal(5,2) NOT NULL,
  `corporate_mode` decimal(5,2) NOT NULL,
  `rental_fee` decimal(5,2) NOT NULL,
  `refundable_deposit` decimal(5,2) NOT NULL,
  `rental_month` decimal(5,2) DEFAULT NULL,
  `rental_year` decimal(5,2) DEFAULT NULL,
  `expired_msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailbox_prices`
--

INSERT INTO `mailbox_prices` (`id`, `customer_2`, `customer_3`, `personal_mode`, `personal_plus_mode`, `business_mode`, `corporate_mode`, `rental_fee`, `refundable_deposit`, `rental_month`, `rental_year`, `expired_msg`, `agent_id`, `created_at`, `updated_at`) VALUES
(1, '11.25', '20.00', '21.00', '230.00', '52.20', '1.23', '20.00', '25.00', NULL, NULL, NULL, 3, '2021-08-01 09:28:08', '2021-08-01 09:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox_types`
--

CREATE TABLE `mailbox_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `box_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'small, normal, large',
  `price` decimal(5,2) NOT NULL,
  `expired_time` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1|2|3...',
  `expired_type` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'months|year',
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailbox_types`
--

INSERT INTO `mailbox_types` (`id`, `box_type`, `price`, `expired_time`, `expired_type`, `agent_id`, `created_at`, `updated_at`) VALUES
(1, 'small', '12.00', '12', 'month', 3, '2021-07-30 01:40:50', '2021-07-30 01:40:50'),
(2, 'mediumxx', '300.00', '6', 'year', 3, '2021-08-06 15:06:21', '2021-08-06 15:06:21'),
(3, 'small', '12.22', '2', 'year', 3, '2021-08-07 10:59:36', '2021-08-07 10:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2017_05_06_172817_create_cities_table', 1),
(5, '2017_05_06_173711_create_states_table', 1),
(6, '2017_05_06_173745_create_countries_table', 1),
(7, '2018_07_16_074619_create_options', 1),
(8, '2018_07_16_074620_add_users_info', 1),
(9, '2018_07_16_074621_create_roles', 1),
(10, '2018_07_16_074622_create_permissions', 1),
(11, '2018_07_16_074623_create_permission_role', 1),
(12, '2018_07_16_074624_create_user_metas', 1),
(13, '2018_07_16_074626_create_user_permissions', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2020_05_21_100000_create_teams_table', 1),
(17, '2020_05_21_200000_create_team_user_table', 1),
(18, '2020_05_21_300000_create_team_invitations_table', 1),
(19, '2021_04_04_120921_create_sessions_table', 1),
(20, '2021_04_21_062610_create_address_book', 1),
(21, '2021_05_09_203535_create_agents_table', 1),
(23, '2021_05_14_160503_create_orders', 1),
(24, '2021_05_14_160512_create_transactions', 1),
(25, '2021_05_14_160528_create_carts', 1),
(26, '2021_06_21_181834_add_address_info_to_users_table', 1),
(27, '2021_06_22_150417_add_agent_info_to_users_table', 1),
(28, '2021_06_22_153248_change_address_books_table', 1),
(35, '2021_06_23_134339_create_percentage_rate_systems_table', 1),
(36, '2021_06_24_135905_add_operator_to_users_table', 1),
(40, '2021_06_29_135939_create_payment_info_table', 3),
(41, '2021_05_14_142438_create_agent_service', 4),
(43, '2021_06_22_153742_create_order_scanning_table', 6),
(44, '2021_06_22_153732_create_order_printing_table', 7),
(45, '2021_06_22_153659_create_order_faxing_table', 8),
(46, '2021_06_22_153711_create_order_parcel_table', 9),
(47, '2021_06_22_153721_create_order_envelop_table', 10),
(59, '2021_06_23_080456_add_info_to_transactions_table', 11),
(60, '2021_07_05_105143_create_services_table', 11),
(61, '2021_07_08_015236_create_invoices_table', 11),
(66, '2021_07_08_210108_create_withdraws_table', 12),
(68, '2021_07_09_220514_create_bank_info_table', 13),
(88, '2021_07_14_113229_create_temp_table', 14),
(89, '2021_07_26_100253_create_mailboxes_table', 14),
(90, '2021_07_26_100330_create_mailbox_prices_table', 14),
(91, '2021_07_26_100356_create_mailbox_types_table', 14),
(92, '2021_07_26_141026_create_user_mailboxes_table', 14),
(93, '2021_08_02_150731_add_mailbox_id_to_transactions_table', 15),
(96, '2021_08_02_151729_add_track_code_to_user_mailboxes_table', 16),
(97, '2021_08_06_065259_add_photos_id_to_user_mailboxes_table', 17),
(98, '2021_08_06_075157_add_admin_conf_status_to_user_mailboxes_table', 17),
(99, '2021_08_09_052431_add_key_status_to_user_mailboxes_table', 18),
(100, '2021_08_12_063452_add_renewal_display_alert_status_to_user_mailboxes_table', 19),
(101, '2021_08_13_053204_add_mailbox_status_to_user_mailboxes_table', 20),
(102, '2021_08_13_122322_add_percentage_to_transactions_table', 21),
(103, '2021_08_22_060453_add_withdraw_status_to_invoices_table', 22),
(104, '2021_08_24_073510_add_shipping_fields_to_parcel_table', 23),
(105, '2021_08_24_073535_add_shipping_fields_to_envelop_table', 23),
(106, '2021_08_24_120841_create_taxes_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `from_address_id` bigint(20) UNSIGNED NOT NULL,
  `to_address_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_envelop`
--

CREATE TABLE `order_envelop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_code` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_code_1` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_from` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_from` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_1_from` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_2_from` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attention_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_type_from` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Residential|Business',
  `phone_from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_to` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_to` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_1_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_2_to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attention_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_type_to` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Residential|Business',
  `phone_to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_of_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_of_content` decimal(10,2) DEFAULT NULL,
  `insurance` decimal(10,2) DEFAULT NULL,
  `width` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimen_type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_envelop`
--

INSERT INTO `order_envelop` (`id`, `tracking_code`, `tracking_code_1`, `label`, `weight`, `weight_type`, `length`, `service_code`, `service_name`, `country_from`, `province_from`, `city_from`, `name_from`, `line_1_from`, `line_2_from`, `attention_from`, `instruction_from`, `postal_code_from`, `trans_type_from`, `phone_from`, `email_from`, `country_to`, `province_to`, `city_to`, `name_to`, `line_1_to`, `line_2_to`, `attention_to`, `instruction_to`, `postal_code_to`, `trans_type_to`, `phone_to`, `email_to`, `desc_of_content`, `user_id`, `created_at`, `updated_at`, `unit`, `value_of_content`, `insurance`, `width`, `height`, `dimen_type`) VALUES
(9, '1ZV3685E1534738643', '', '1ZV3685E1534738643.png', '3', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test', '75 Rue McVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', 'sregdg', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-07-10 23:03:33', '2021-07-10 23:03:33', NULL, NULL, NULL, '', '', ''),
(10, '1ZV3685E1529721269', '', '1ZV3685E1529721269.png', '3', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 12:04:53', '2021-07-11 12:04:53', NULL, NULL, NULL, '', '', ''),
(11, '1ZV3685E1522280687', '', '1ZV3685E1522280687.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'business', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 16:33:36', '2021-07-11 16:33:36', NULL, NULL, NULL, '', '', ''),
(12, '1ZV3685E0494465953', '', '1ZV3685E0494465953.png', '2', 'LBS', '', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 16:45:22', '2021-07-11 16:45:22', NULL, NULL, NULL, '', '', ''),
(13, '1ZV3685E1593574763', '', '1ZV3685E1593574763.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 16:47:26', '2021-07-11 16:47:26', NULL, NULL, NULL, '', '', ''),
(14, '1ZV3685E1522296312', '', '1ZV3685E1522296312.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'address1', NULL, 'test', 'test', 'H8R3T3', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 17:57:48', '2021-07-11 17:57:48', NULL, NULL, NULL, '', '', ''),
(15, '1ZV3685E1726017924', '', '1ZV3685E1726017924.png', '2', 'KGS', '', '02', 'UPS 2nd Day Air', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-07-13 08:18:55', '2021-07-13 08:18:55', NULL, NULL, NULL, '', '', ''),
(17, '1ZV3685E0494712444', '', '1ZV3685E0494712444.png', '3', 'LBS', '', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 15:08:51', '2021-07-24 15:09:16', NULL, NULL, NULL, '', '', ''),
(18, '6RB74668PC155594D', '', 'pending', '2', 'LBS', '', '01', 'UPS Next Day Air', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 15:10:22', '2021-07-24 15:10:22', NULL, NULL, NULL, '', '', ''),
(19, '1ZV3685E1592682335', '', '1ZV3685E1592682335.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-06 00:11:59', '2021-08-06 00:12:29', NULL, NULL, NULL, '', '', ''),
(20, '1ZV3685E1591032744', '', '1ZV3685E1591032744.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-06 00:53:15', '2021-08-06 00:53:39', NULL, NULL, NULL, '', '', ''),
(21, '1ZV3685E1524903456', '', '1ZV3685E1524903456.png', '2', 'KGS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-15 02:39:25', '2021-08-15 02:39:25', NULL, NULL, NULL, '', '', ''),
(22, '1ZV3685E1593170430', '', '1ZV3685E1593170430.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-20 11:16:53', '2021-08-20 11:17:10', NULL, NULL, NULL, '', '', ''),
(23, '1ZV3685E1533576963', '', '1ZV3685E1533576963.png', '3', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'env comp', 'addre line env', NULL, 'env from atten', 'env from inst', 'H8R3T3', 'residential', '4432', 'em.alban@em.com', 'CA', 'QC', 'laval', 'comp to env', 'addr line env', NULL, 'atten 2 to env', 'ubstry', 'H7V2V2', 'residential', '987654123', 'newagent@email.com', NULL, 1, '2021-08-21 01:34:27', '2021-08-21 01:34:45', NULL, NULL, NULL, '', '', ''),
(24, '1ZV3685E1531301575', '', '1ZV3685E1531301575.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', 'env line 2 from', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', 'env line 2 to', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-21 01:52:23', '2021-08-21 01:52:39', NULL, NULL, NULL, '', '', ''),
(25, '1ZV3685E0434609393', '', '1ZV3685E0434609393.png', '3', 'LBS', '', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'lasalle', 'test agent', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sefasas', '75 Rue McVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-21 11:58:52', '2021-08-21 11:58:52', NULL, NULL, NULL, '', '', ''),
(26, '1ZV3685E1525622016', '', '1ZV3685E1525622016.png', '2', 'KGS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-22 00:57:44', '2021-08-22 00:57:44', NULL, NULL, NULL, '', '', ''),
(27, '1ZV3685E1591951322', '', '1ZV3685E1591951322.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'user city', 'test', 'address1 to canada', '', 'atten', '', 'H8R3T3', 'residential', '987654123', '', 'CA', 'QC', 'user city', 'test', 'address1', '', 'atten 2 to env', '', 'H7V2V2', 'residential', '02120112', '', NULL, 1, '2021-08-24 01:59:11', '2021-08-24 01:59:32', NULL, NULL, NULL, '', '', ''),
(28, '1ZV3685E1522073704', '', '1ZV3685E1522073704.png', '3', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'lasalle', 'last company', 'address shohada', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', NULL, 1, '2021-08-24 10:35:36', '2021-08-24 10:35:52', NULL, NULL, NULL, '', '', ''),
(29, '1ZV3685E1591306636', '', '1ZV3685E1591306636.png', '2', 'KGS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-24 10:42:05', '2021-08-24 10:42:05', NULL, NULL, NULL, '', '', ''),
(30, '1ZV3685E1594506709', '', '1ZV3685E1594506709.png', '2', 'LBS', '', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'env from', '75 Rue McVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', 'sefsfdrd', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 02:42:19', '2021-08-27 02:42:19', NULL, NULL, NULL, '', '', ''),
(31, '2BG80072RM8532525', '', 'pending', '3', 'LBS', '1', '02', 'UPS 2nd Day Air', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'Description of Conten Description of Conten Description of Conten', 1, '2021-08-27 03:40:10', '2021-08-27 03:40:10', '4', '2.00', '5.00', '2', '1', 'IN'),
(32, '1ZV3685E1539122585', '871619', '1ZV3685E1539122585.png', '3', 'LBS', '1', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'Description of Conten Description of Conten Description of Conten', 1, '2021-08-27 03:43:01', '2021-08-27 03:43:16', '4', '2.00', '5.00', '2', '1', 'IN'),
(33, '6YN96022C92338309', '', 'pending', '2', 'LBS', '4', '59', 'UPS Second Day Air AM', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'if (isset($this->package[\'weight-', 1, '2021-08-27 07:55:08', '2021-08-27 07:55:08', '3', '3.00', '4.00', '4', '1', 'IN'),
(34, '1ZV3685E1530649649', '271510', '1ZV3685E1530649649.png', '2', 'LBS', '4', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'if (isset($this->package[\'weight-', 1, '2021-08-27 07:56:48', '2021-08-27 08:08:01', '3', '3.00', '4.00', '4', '1', 'IN'),
(35, '1ZV3685E8620482875', '', '1ZV3685E8620482875.png', '2', 'LBS', '', '65', 'UPS Saver', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'agent@email.com', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 08:38:48', '2021-08-27 08:38:48', NULL, NULL, NULL, '', '', ''),
(36, '1ZV3685E0439871680', '', '1ZV3685E0439871680.png', '2', 'LBS', '', '65', 'UPS Saver', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'US', 'CA', 'Los Angeles', 'test', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'agent@email.com', NULL, 3, '2021-08-27 08:42:23', '2021-08-27 08:42:23', NULL, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_faxing`
--

CREATE TABLE `order_faxing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_count` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_accept_status` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Accept|Reject',
  `reject_reason_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_faxing`
--

INSERT INTO `order_faxing` (`id`, `tracking_code`, `phone`, `paper_count`, `agent_accept_status`, `reject_reason_message`, `agent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, '693560', '23423', '50', NULL, NULL, 3, 1, '2021-07-11 04:37:03', '2021-07-11 04:37:03'),
(9, '749611', '01254', '50', NULL, NULL, 3, 1, '2021-07-16 12:11:08', '2021-07-16 12:11:08'),
(10, '773459', '01254', '50', NULL, NULL, 7, 1, '2021-07-16 12:48:26', '2021-07-16 12:48:26'),
(11, '512421', '01254', '3', NULL, NULL, 3, 1, '2021-07-24 23:35:57', '2021-07-24 23:35:57'),
(12, '968756', '01254', '3', NULL, NULL, 3, 1, '2021-07-24 23:37:16', '2021-07-24 23:37:16'),
(13, '631947', '3322332', '3', NULL, NULL, 3, 1, '2021-07-24 23:38:01', '2021-07-24 23:38:01'),
(14, '929526', '3322332', '3', 'reject', 'bad page\n', 3, 1, '2021-08-06 01:19:35', '2021-08-21 12:17:22'),
(15, '762003', '9856', '5', NULL, NULL, 3, 1, '2021-08-22 00:55:47', '2021-08-22 00:55:47'),
(16, '820667', '9856', '5', NULL, NULL, 7, 1, '2021-08-22 00:56:22', '2021-08-22 00:56:22'),
(17, '255801', '9856', '5', NULL, NULL, 7, 1, '2021-08-22 00:56:51', '2021-08-22 00:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_parcel`
--

CREATE TABLE `order_parcel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_code` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_code_1` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimen_type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_from` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_from` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_1_from` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_2_from` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attention_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_type_from` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Residential|Business',
  `phone_from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_to` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_to` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_1_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_2_to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attention_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_type_to` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Residential|Business',
  `phone_to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_of_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_of_content` decimal(10,2) DEFAULT NULL,
  `insurance` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_parcel`
--

INSERT INTO `order_parcel` (`id`, `tracking_code`, `tracking_code_1`, `label`, `weight`, `weight_type`, `length`, `width`, `height`, `dimen_type`, `service_code`, `service_name`, `country_from`, `province_from`, `city_from`, `name_from`, `line_1_from`, `line_2_from`, `attention_from`, `instruction_from`, `postal_code_from`, `trans_type_from`, `phone_from`, `email_from`, `country_to`, `province_to`, `city_to`, `name_to`, `line_1_to`, `line_2_to`, `attention_to`, `instruction_to`, `postal_code_to`, `trans_type_to`, `phone_to`, `email_to`, `desc_of_content`, `user_id`, `created_at`, `updated_at`, `unit`, `value_of_content`, `insurance`) VALUES
(18, '1ZV3685E1527978639', '', '1ZV3685E1527978639.png', '30', 'LBS', '22', '30', '40', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test', '75 Rue McVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'dsrgdgdr', 'sfgsef', 'sregdg', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-07-10 23:02:09', '2021-07-10 23:02:09', NULL, NULL, NULL),
(19, '1ZV3685E1592929935', '', '1ZV3685E1592929935.png', '30', 'LBS', '22', '30', '40', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test', '75 Rue McVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'dsrgdgdr', 'sfgsef', 'sregdg', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-07-10 23:32:13', '2021-07-10 23:32:13', NULL, NULL, NULL),
(20, '1ZV3685E1590512343', '', '1ZV3685E1590512343.png', '12', 'LBS', '22', '30', '40', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test', '75 Rue McVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'dsrgdgdr', 'sfgsef', 'sregdg', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-07-11 03:33:36', '2021-07-11 03:33:36', NULL, NULL, NULL),
(21, '1ZV3685E1532704852', '', '1ZV3685E1532704852.png', '30', 'LBS', '22', '30', '50', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H8R3T3', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 12:03:29', '2021-07-11 12:03:29', NULL, NULL, NULL),
(22, '1ZV3685E1536911871', '', '1ZV3685E1536911871.png', '80', 'LBS', '22', '30', '50', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'business', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 16:31:10', '2021-07-11 16:31:10', NULL, NULL, NULL),
(23, '1ZV3685E1536311699', '', '1ZV3685E1536311699.png', '2', 'LBS', '1', '30', '11', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 16:43:39', '2021-07-11 16:43:39', NULL, NULL, NULL),
(24, '1ZV3685E0429568901', '', '1ZV3685E0429568901.png', '2', 'LBS', '1', '30', '11', 'IN', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 16:44:31', '2021-07-11 16:44:31', NULL, NULL, NULL),
(25, '1ZV3685E2092502779', '', '1ZV3685E2092502779.png', '5', 'LBS', '1', '1', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'city', 'test', 'test', NULL, 'test', 'test', 'H8R3T3', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-11 17:56:37', '2021-07-11 17:56:37', NULL, NULL, NULL),
(26, '1ZV3685E1593393986', '', '1ZV3685E1593393986.png', '55', 'LBS', '3', '5', '2', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-07-13 08:07:37', '2021-07-13 08:07:37', NULL, NULL, NULL),
(27, '1ZV3685E1520516837', '', '1ZV3685E1520516837.png', '6', 'LBS', '2', '5', '4', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-23 15:58:34', '2021-07-23 15:58:34', NULL, NULL, NULL),
(30, 'pending', '', 'pending', '2', 'LBS', '11', '30', '50', 'IN', '02', 'UPS 2nd Day Air', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:01:29', '2021-07-24 03:01:29', NULL, NULL, NULL),
(32, '94X12511023574331', '', 'pending', '11', 'LBS', '11', '12', '50', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:08:28', '2021-07-24 03:08:28', NULL, NULL, NULL),
(33, '9UC104491H929532E', '', 'pending', '5', 'KGS', '22', '30', '50', 'CM', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:14:39', '2021-07-24 03:14:39', NULL, NULL, NULL),
(34, '1ZV3685E2036691055', '', '1ZV3685E2036691055.png', '30', 'LBS', '11', '30', '50', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:16:24', '2021-07-24 03:16:42', NULL, NULL, NULL),
(35, '1ZV3685E0494472392', '', '1ZV3685E0494472392.png', '80', 'LBS', '11', '30', '50', 'IN', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:18:34', '2021-07-24 03:18:54', NULL, NULL, NULL),
(36, '1ZV3685E2090642005', '', '1ZV3685E2090642005.png', '5', 'LBS', '3', '12', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:20:39', '2021-07-24 03:20:56', NULL, NULL, NULL),
(37, '1ZV3685E2091086810', '', '1ZV3685E2091086810.png', '5', 'LBS', '3', '3', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:23:06', '2021-07-24 03:23:21', NULL, NULL, NULL),
(38, '1ZV3685E2093870825', '', '1ZV3685E2093870825.png', '30', 'LBS', '22', '11', '11', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:40:01', '2021-07-24 03:40:31', NULL, NULL, NULL),
(39, '6TJ69009UX845670K', '', 'pending', '5', 'LBS', '3', '11', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-24 03:41:39', '2021-07-24 03:41:39', NULL, NULL, NULL),
(40, '1ZV3685E2091078865', '', '1ZV3685E2091078865.png', '5', 'LBS', '6', '6', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-07-25 02:19:36', '2021-07-25 02:21:20', NULL, NULL, NULL),
(41, '1ZV3685E1536146510', '', '1ZV3685E1536146510.png', '5', 'KGS', '3', '30', '11', 'CM', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'parcel', 'new address neh', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 02:57:42', '2021-08-05 02:58:09', NULL, NULL, NULL),
(42, '1ZV3685E2026992123', '', '1ZV3685E2026992123.png', '5', 'LBS', '1', '30', '11', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 03:09:40', '2021-08-05 03:10:01', NULL, NULL, NULL),
(43, '1ZV3685E2093634107', '', '1ZV3685E2093634107.png', '5', 'LBS', '22', '30', '11', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 03:15:07', '2021-08-05 03:15:36', NULL, NULL, NULL),
(44, '1G951412NP316290V', '', 'pending', '30', 'LBS', '22', '30', '50', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 03:16:20', '2021-08-05 03:16:20', NULL, NULL, NULL),
(45, '1ZV3685E2036209228', '', '1ZV3685E2036209228.png', '50', 'LBS', '22', '1', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 03:20:06', '2021-08-05 04:06:36', NULL, NULL, NULL),
(46, '9M3370180V0554109', '', 'pending', '5', 'LBS', '22', '30', '11', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 07:28:52', '2021-08-05 07:28:52', NULL, NULL, NULL),
(47, '2D4187861M383194S', '', 'pending', '5', 'LBS', '1', '11', '4', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 07:31:03', '2021-08-05 07:31:03', NULL, NULL, NULL),
(48, '2F982516EW651793R', '', 'pending', '5', 'LBS', '22', '1', '1', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 07:34:18', '2021-08-05 07:34:18', NULL, NULL, NULL),
(49, '1ZV3685E1593239116', '', '1ZV3685E1593239116.png', '5', 'LBS', '22', '1', '1', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 07:39:51', '2021-08-05 13:37:16', NULL, NULL, NULL),
(50, '1ZV3685E2094759123', '', '1ZV3685E2094759123.png', '80', 'LBS', '22', '1', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-05 13:26:46', '2021-08-05 13:27:21', NULL, NULL, NULL),
(51, '1ZV3685E2038326188', '', '1ZV3685E2038326188.png', '55', 'LBS', '3', '5', '2', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-13 08:12:14', '2021-08-13 08:12:14', NULL, NULL, NULL),
(52, '1ZV3685E2020567193', '', '1ZV3685E2020567193.png', '55', 'LBS', '3', '5', '2', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-13 08:49:05', '2021-08-13 08:49:05', NULL, NULL, NULL),
(53, '1ZV3685E1537571817', '', '1ZV3685E1537571817.png', '55', 'LBS', '3', '5', '2', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-13 08:51:42', '2021-08-13 08:51:42', NULL, NULL, NULL),
(54, '1ZV3685E2032103429', '', '1ZV3685E2032103429.png', '55', 'LBS', '3', '5', '2', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-13 12:17:08', '2021-08-13 12:17:08', NULL, NULL, NULL),
(55, '1ZV3685E1525051866', '', '1ZV3685E1525051866.png', '80', 'LBS', '22', '1', '1', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-16 08:46:48', '2021-08-16 08:47:18', NULL, NULL, NULL),
(56, '1ZV3685E1530195282', '', '1ZV3685E1530195282.png', '80', 'LBS', '22', '1', '1', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-18 01:11:35', '2021-08-18 01:14:18', NULL, NULL, NULL),
(57, '1ZV3685E2031278298', '', '1ZV3685E2031278298.png', '80', 'LBS', '22', '1', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-18 01:20:16', '2021-08-18 01:20:33', NULL, NULL, NULL),
(58, '1ZV3685E0423827507', '', '1ZV3685E0423827507.png', '80', 'LBS', '22', '1', '1', 'IN', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-18 01:34:51', '2021-08-18 01:35:11', NULL, NULL, NULL),
(59, '2S737572MS5030640', '', 'pending', '80', 'LBS', '22', '1', '1', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-18 01:36:32', '2021-08-18 01:36:32', NULL, NULL, NULL),
(60, '1ZV3685E1736886913', '', '1ZV3685E1736886913.png', '55', 'LBS', '3', '5', '2', 'IN', '02', 'UPS 2nd Day Air', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-18 01:38:41', '2021-08-18 01:38:41', NULL, NULL, NULL),
(61, '1ZV3685E2026780521', '', '1ZV3685E2026780521.png', '4', 'LBS', '5', '4', '5', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-20 10:12:50', '2021-08-20 10:13:22', NULL, NULL, NULL),
(62, '1ZV3685E2030712337', '', '1ZV3685E2030712337.png', '3', 'LBS', '4', '3', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-20 10:20:06', '2021-08-20 10:20:23', NULL, NULL, NULL),
(63, '1ZV3685E2094232790', '', '1ZV3685E2094232790.png', '5', 'LBS', '8', '6', '7', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-20 10:41:05', '2021-08-20 10:41:24', NULL, NULL, NULL),
(64, '1ZV3685E1592463214', '', '1ZV3685E1592463214.png', '5', 'LBS', '8', '6', '7', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', NULL, 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-20 11:07:17', '2021-08-20 11:07:36', NULL, NULL, NULL),
(65, '1ZV3685E2039506553', '', '1ZV3685E2039506553.png', '6', 'LBS', '5', '3', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'laval', 'nehtech', 'hashempoor', NULL, 'atten', 'instr', 'H7V2V2', 'residential', '123', 'agent@email.com', 'CA', 'QC', 'lasalle', 'last company', 'address shohada', NULL, 'Attenstuin 3', 'inst to', 'H8R3T3', 'business', '111222333', 'user@email.com', NULL, 1, '2021-08-21 01:25:02', '2021-08-21 01:25:27', NULL, NULL, NULL),
(66, '1ZV3685E2092712846', '', '1ZV3685E2092712846.png', '5', 'LBS', '2', '1', '3', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', 'line 2 from', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', 'line 2 to', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-21 01:50:19', '2021-08-21 01:50:44', NULL, NULL, NULL),
(67, '1ZV3685E1590826451', '', '1ZV3685E1590826451.png', '55', 'LBS', '3', '5', '2', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', NULL, 'test', 'test', 'H8R3T3', 'business', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', NULL, 'sefesf', 'sefesf', 'H7V2V2', 'business', '23', 'sef@sef', NULL, 3, '2021-08-21 11:30:24', '2021-08-21 11:30:24', NULL, NULL, NULL),
(68, '1ZV3685E2038284385', '', '1ZV3685E2038284385.png', '4', 'LBS', '3', '4', '2', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MbVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-21 11:49:17', '2021-08-21 11:49:17', NULL, NULL, NULL),
(69, '1ZV3685E0490295260', '', '1ZV3685E0490295260.png', '8', 'LBS', '9', '8', '7', 'IN', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'lasalle', 'sefsf', '75 Rue McVey', 'saesefes', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', 'sefsfdrd', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-21 11:51:56', '2021-08-21 11:51:56', NULL, NULL, NULL),
(70, '1ZV3685E0494783270', '', '1ZV3685E0494783270.png', '8', 'LBS', '9', '8', '7', 'IN', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'lasalle', 'sefsf', '75 Rue McVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-22 00:31:37', '2021-08-22 00:31:37', NULL, NULL, NULL),
(71, '55235763U3472113G', '', 'pending', '5', 'LBS', '2', '1', '3', 'IN', '14', 'UPS Next Day Air Early', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-22 00:52:49', '2021-08-22 00:52:49', NULL, NULL, NULL),
(72, '1ZV3685E2032440609', '', '1ZV3685E2032440609.png', '5', 'LBS', '2', '1', '3', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-22 00:54:32', '2021-08-22 00:54:46', NULL, NULL, NULL),
(73, '1ZV3685E1731277625', '', '1ZV3685E1731277625.png', '2', 'LBS', '2', '3', '1', 'IN', '02', 'UPS 2nd Day Air', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'efsef', 'sefsefsef', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'sefsef', 'sefs', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 7, '2021-08-22 01:01:01', '2021-08-22 01:01:01', NULL, NULL, NULL),
(74, '1ZV3685E2090434481', '', '1ZV3685E2090434481.png', '2', 'LBS', '2', '3', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'efsef', 'sefsefsef', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'sefsef', 'sefs', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 7, '2021-08-22 02:02:03', '2021-08-22 02:02:03', NULL, NULL, NULL),
(75, '1ZV3685E2037208674', '', '1ZV3685E2037208674.png', '2', 'LBS', '3', '2', '3', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'user city', 'comp to env', 'address1 to canada', '', 'atten 2 to env', '', 'H8R3T3', 'residential', '987654123', '', 'CA', 'QC', 'user city', 'comp to env', 'new address neh', '', 'atten 2 to env', '', 'H7V2V2', 'residential', '02120112', '', NULL, 1, '2021-08-24 00:21:41', '2021-08-24 00:54:47', NULL, NULL, NULL),
(76, '1ZV3685E2092399365', '', '1ZV3685E2092399365.png', '9', 'LBS', '2', '5', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-24 02:32:45', '2021-08-24 02:35:44', NULL, NULL, NULL),
(77, '1ZV3685E2090199370', '', '1ZV3685E2090199370.png', '34', 'LBS', '5', '34', '5', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'lasalle', 'last company', 'address shohada', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', NULL, 1, '2021-08-24 02:39:14', '2021-08-24 02:39:47', NULL, NULL, NULL),
(78, '1ZV3685E2094002583', '', '1ZV3685E2094002583.png', '6', 'LBS', '1', '6', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'laval', 'comp to env', 'addr line env', 'addr line 2 env to', 'atten 2 to env', 'ubstry', 'H7V2V2', 'residential', '987654123', 'newagent@email.com', NULL, 1, '2021-08-24 02:43:24', '2021-08-24 02:43:57', NULL, NULL, NULL),
(79, '1ZV3685E0494832994', '', '1ZV3685E0494832994.png', '6', 'LBS', '1', '6', '4', 'IN', '13', 'UPS Next Day Air Saver', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'laval', 'comp to env', 'addr line env', '', 'atten 2 to env', 'ubstry', 'H7V2V2', 'residential', '987654123', 'newagent@email.com', NULL, 1, '2021-08-24 02:48:29', '2021-08-24 02:48:48', NULL, NULL, NULL),
(80, '1ZV3685E2026593484', '', '1ZV3685E2026593484.png', '4', 'LBS', '4', '3', '5', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'laval', 'nehtech', 'hashempoor', 'hash 10', 'atten', 'instr', 'H7V2V2', 'residential', '123', 'agent@email.com', 'CA', 'QC', 'lasalle', 'last company', 'address shohada', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', NULL, 1, '2021-08-24 08:20:36', '2021-08-24 08:20:57', NULL, NULL, NULL),
(81, '3VT265748E6718945', '', 'pending', '4', 'LBS', '4', '3', '6', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', 'I have', '22eedd55', '44eedd1122', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-24 08:23:22', '2021-08-24 08:23:22', NULL, NULL, NULL),
(82, '92723954P6247332X', '', 'pending', '5', 'LBS', '6', '6', '7', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-24 08:32:06', '2021-08-24 08:32:06', NULL, NULL, NULL),
(83, '1ZV3685E2091394602', '228900', '1ZV3685E2091394602.png', '4', 'LBS', '5', '4', '5', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'laval', 'nehtech', 'hashempoor', 'hash 10', 'atten', 'instr', 'H7V2V2', 'residential', '123', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', NULL, 1, '2021-08-24 08:40:45', '2021-08-24 08:41:05', NULL, NULL, NULL),
(84, '1ZV3685E2092671417', '883862', '1ZV3685E2092671417.png', '4', 'LBS', '56', '4', '5', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'azdsfg a dsfgasdr gaesdrg erg aserg', 1, '2021-08-24 10:10:39', '2021-08-24 10:11:03', '4', '5.00', '5.00'),
(85, '1ZV3685E2034560495', '342889', '1ZV3685E2034560495.png', '4', 'LBS', '4', '5', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'sfsefsefazdawdawdasaef', 1, '2021-08-24 10:19:12', '2021-08-24 10:19:28', '2', '3.00', '1.00'),
(86, '1ZV3685E2092527421', '743219', '1ZV3685E2092527421.png', '4', 'LBS', '4', '5', '4', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'drgd', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'sretegdgdgdr dr dr gedrgd rgd gdg ', 1, '2021-08-24 10:33:52', '2021-08-24 10:34:11', '', '0.00', '0.00'),
(87, '1ZV3685E2027777113', '', '1ZV3685E2027777113.png', '8', 'LBS', '9', '8', '7', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'sefsf', '75 Rue McVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-24 10:41:32', '2021-08-24 10:41:32', NULL, NULL, NULL),
(88, '83W105683B576593C', '', 'pending', '9', 'LBS', '5', '4', '6', 'IN', '11', 'UPS Standard', 'US', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'sesrg s efsef sef sef sef sefsef sef sef se', 1, '2021-08-25 07:09:04', '2021-08-25 07:09:04', '2', '2.00', '4.00'),
(89, '1YL948474C732224J', '', 'pending', '4', 'LBS', '3', '3', '3', 'IN', '12', 'UPS 3 Day Select', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'MD', 'lasalle', 'last company', 'address shohada', 'new line 2', 'Attenstuin 3', 'inst to', '21201', 'residential', '111222333', 'user@email.com', 'sefs sefdrgdrg drgfhthad sdrgdrgd rgsdefsefs e', 1, '2021-08-25 07:30:24', '2021-08-25 07:30:24', '1', '5.00', '2.00'),
(90, '33235256XA884230J', '', 'pending', '2', 'LBS', '4', '4', '5', 'IN', '12', 'UPS 3 Day Select', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'nek', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '02120112', 'user@email.com', 'sefsf sefsef sfwaqdfythftdgdr srgtgd ssef', 1, '2021-08-25 12:25:59', '2021-08-25 12:25:59', '1', '3.00', '2.00'),
(91, '6JG27577SN963090C', '', 'pending', '2', 'LBS', '3', '4', '3', 'IN', '12', 'UPS 3 Day Select', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '02120112', 'user@email.com', 'ss\nDescription of Content\nThe package.desc of content must be at least 12 characters.\n', 1, '2021-08-25 12:34:42', '2021-08-25 12:34:42', '3', '4.00', '4.00'),
(92, '1ZV3685E1291423461', '300887', '1ZV3685E1291423461.png', '5', 'LBS', '22', '4', '50', 'IN', '12', 'UPS 3 Day Select', 'CA', 'QC', 'awda', 'parcel', 'new address neh', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'Description of Content Description of Content', 1, '2021-08-25 12:40:35', '2021-08-25 12:40:53', '3', '5.00', '2.00'),
(93, '1ZV3685E2091935474', '', '1ZV3685E2091935474.png', '1', 'LBS', '2', '1', '2', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 01:37:46', '2021-08-27 01:37:46', NULL, NULL, NULL),
(94, '1ZV3685E2091290689', '', '1ZV3685E2091290689.png', '3', 'LBS', '3', '2', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sefasas', '75 Rue McVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 02:01:59', '2021-08-27 02:01:59', NULL, NULL, NULL),
(95, '1ZV3685E2029594727', '', '1ZV3685E2029594727.png', '5', 'LBS', '3', '2', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue MeVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 02:07:39', '2021-08-27 02:07:39', NULL, NULL, NULL),
(96, '1ZV3685E2038330539', '', '1ZV3685E2038330539.png', '4', 'LBS', '3', '2', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', 'sefsfdrd', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 02:14:55', '2021-08-27 02:14:55', NULL, NULL, NULL),
(97, '1ZV3685E2094313096', '', '1ZV3685E2094313096.png', '3', 'LBS', '3', '2', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', 'sefsfdrd', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 02:16:27', '2021-08-27 02:16:27', NULL, NULL, NULL),
(98, '1ZV3685E2023268546', '', '1ZV3685E2023268546.png', '4', 'LBS', '3', '2', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', 'sefsfdrd', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 02:19:25', '2021-08-27 02:19:25', NULL, NULL, NULL),
(99, '1ZV3685E2038935770', '', '1ZV3685E2038935770.png', '4', 'LBS', '3', '2', '1', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'test agent شل خان', '75 Rue MxVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', 'sefsfdrd', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 02:36:05', '2021-08-27 02:36:05', NULL, NULL, NULL),
(100, '1ZV3685E1235131597', '120763', '1ZV3685E1235131597.png', '4', 'LBS', '5', '4', '3', 'IN', '12', 'UPS 3 Day Select', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'Description of Content The package.desc of content must be at least 12 characters', 1, '2021-08-27 04:47:08', '2021-08-27 04:47:36', '2', '4.00', '2.00'),
(101, '57A50952C19727134', '', 'pending', '3', 'LBS', '4', '3', '4', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', 'address shohada', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', 'Description of Content Description of Content', 1, '2021-08-27 05:05:55', '2021-08-27 05:05:55', '4', '3.00', '5.00'),
(102, '2PK215558W0206332', '', 'pending', '3', 'LBS', '4', '2', '4', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'Description of Content Description of Content', 1, '2021-08-27 05:39:12', '2021-08-27 05:39:12', '1', '2.00', '5.00'),
(103, '2BW13627AL234290N', '', 'pending', '4', 'LBS', '2', '1', '2', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'awda', '2', 'address1 to canada', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', 'Description of Content Description of Content', 1, '2021-08-27 05:40:59', '2021-08-27 05:40:59', '3', '7.00', '5.00'),
(104, '1ZV3685E2036726802', '929992', '1ZV3685E2036726802.png', '3', 'LBS', '4', '1', '2', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'env comp', 'addre line env', 'line env 2', 'env from atten', 'env from inst', 'H8R3T3', 'residential', '4432', 'em.alban@em.com', 'CA', 'QC', 'awda', 'test', 'test', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', '$shipperAddress $shipperAddress $shipperAddress', 1, '2021-08-27 05:45:11', '2021-08-27 05:45:29', '6', '7.00', '5.00'),
(105, '9MA74863P7504852K', '', 'pending', '4', 'LBS', '2', '1', '3', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'laval', '2', '845, boul Curé-Labelle', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', '845, boul Curé-Labelle845, boul Curé-Labelle ', 1, '2021-08-27 05:48:48', '2021-08-27 05:48:48', '5', '7.00', '6.00'),
(106, '9WP67212G7524430P', '', 'pending', '3', 'LBS', '2', '4', '1', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'laval', '2', '845, boul Curé-Labelle', '', 'test', 'test', 'H7V2V2', 'residential', '0123456', 'agent@email.com', '845, boul Curé-Labelle 845, boul Curé-Labelle', 1, '2021-08-27 06:37:05', '2021-08-27 06:37:05', '6', '7.00', '5.00'),
(107, '0VD79125XL9877628', '', 'pending', '5', 'LBS', '6', '5', '4', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', '75 Rue McVey', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', ' 75 rue Mcvey  75 rue Mcvey', 1, '2021-08-27 07:04:16', '2021-08-27 07:04:16', '2', '3.00', '1.00'),
(108, '14W55965MG033391T', '', 'pending', '2', 'LBS', '5', '6', '4', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', '75 Rue McVey', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', 'Description of Content The package.desc of content must be at least 12 characters.\n', 1, '2021-08-27 07:18:20', '2021-08-27 07:18:20', '6', '2.00', '6.00'),
(109, '1R5094849B0262213', '', 'pending', '5', 'LBS', '4', '4', '1', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', '75 Rue McVey', 'new line 2', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', 'new Address() new Address() new Address()', 1, '2021-08-27 07:22:18', '2021-08-27 07:22:18', '3', '3.00', '4.00'),
(110, '1ZV3685E9125731827', '633232', '1ZV3685E9125731827.png', '5', 'LBS', '4', '4', '1', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', '75 Rue McVey', '', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', 'new Address() new Address() new Address()', 1, '2021-08-27 07:28:08', '2021-08-27 07:28:28', '3', '3.00', '4.00'),
(111, '34N29317RH086272W', '', 'pending', '5', 'LBS', '4', '4', '1', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', '75 Rue McVey', '', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', 'new Address() new Address() new Address()', 1, '2021-08-27 07:30:12', '2021-08-27 07:30:12', '3', '3.00', '4.00'),
(112, '1ZV3685E9139469630', '451669', '1ZV3685E9139469630.png', '5', 'LBS', '4', '4', '1', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', '75 Rue McVey', '', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', 'new Address() new Address() new Address()', 1, '2021-08-27 07:32:33', '2021-08-27 07:32:52', '3', '3.00', '4.00'),
(113, '1M48617151292925G', '', 'pending', '5', 'LBS', '3', '5', '1', 'IN', '12', 'UPS 3 Day Select', 'CA', 'QC', 'lasalle', 'env comp', '75 Rue McVey', 'line env 2', 'env from atten', 'env from inst', 'H8R3T3', 'residential', '4432', 'em.alban@em.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', '$returnService = new ReturnService();', 1, '2021-08-27 07:35:27', '2021-08-27 07:35:27', '6', '2.00', '5.00'),
(114, '1ZV3685E1291655514', '492056', '1ZV3685E1291655514.png', '5', 'LBS', '3', '5', '1', 'IN', '12', 'UPS 3 Day Select', 'CA', 'QC', 'lasalle', 'env comp', '75 Rue McVey', '', 'env from atten', 'env from inst', 'H8R3T3', 'residential', '4432', 'em.alban@em.com', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', '$returnService = new ReturnService();', 1, '2021-08-27 07:39:24', '2021-08-27 07:39:48', '6', '2.00', '5.00'),
(115, '1ZV3685E9191423527', '378519', '1ZV3685E9191423527.png', '5', 'LBS', '4', '4', '1', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'user@email.com', 'CA', 'QC', 'lasalle', 'last company', '75 Rue McVey', '', 'Attenstuin 3', 'inst to', 'H8R3T3', 'residential', '111222333', 'user@email.com', 'new Address() new Address() new Address()', 1, '2021-08-27 07:40:32', '2021-08-27 07:40:49', '3', '3.00', '4.00'),
(116, '1ZV3685E9133435856', '', '1ZV3685E9133435856.png', '4', 'LBS', '3', '2', '1', 'IN', '11', 'UPS Standard', 'US', 'CA', 'Los Angeles', 'last company', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'agent@email.com', 'CA', 'QC', 'laval', 'sfgsef', '75 Rue McVey', '', 'sefesf', 'sefesf', 'H7V2V2', 'residential', '23', 'sef@sef', NULL, 3, '2021-08-27 08:34:25', '2021-08-27 08:34:25', NULL, NULL, NULL),
(117, '1ZV3685E6823672260', '', '1ZV3685E6823672260.png', '3', 'LBS', '4', '1', '2', 'IN', '11', 'UPS Standard', 'CA', 'QC', 'lasalle', 'env from', '75 Rue McVey', '', 'test', 'test', 'H8R3T3', 'residential', '123', 'em@em', 'US', 'CA', 'Los Angeles', 'test', '2800 E Observatory Rd', '', 'atten 2 to env', 'sefesf', '90027', 'residential', '4386224980', 'agent@email.com', NULL, 3, '2021-08-27 08:37:35', '2021-08-27 08:37:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_printing`
--

CREATE TABLE `order_printing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A3|A4|A5',
  `color_type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'colorful|gery',
  `paper_count` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_accept_status` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Accept|Reject',
  `reject_reason_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_printing`
--

INSERT INTO `order_printing` (`id`, `tracking_code`, `paper_type`, `color_type`, `paper_count`, `uploaded_file`, `agent_accept_status`, `reject_reason_message`, `agent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '805806', 'A5', 'colorful', '50', 'PIMS Review - v1.0.5.pdf', NULL, NULL, 3, 1, '2021-07-11 03:57:22', '2021-07-11 03:57:22'),
(4, '340634', 'A5', 'colorful', '3', '8ce872a5bc25ad67fba0f4d73f457f6b', NULL, NULL, 3, 1, '2021-07-14 06:49:22', '2021-07-14 06:49:22'),
(5, '345605', 'A5', 'grey', '3', '2e694f563ed112aa99dfc09a6a1afefc', NULL, NULL, 3, 1, '2021-07-14 06:51:37', '2021-07-14 06:51:37'),
(6, '865698', 'A5', 'colorful', '3', 'b3959f0b3b922ec3bbe445f3a1095d2c', 'reject', 'bad request', 3, 1, '2021-07-14 07:18:25', '2021-08-21 12:15:46'),
(7, '616256', 'A5', 'colorful', '5', '5dc34732468e87fe56946b79c5a4a0e3', NULL, NULL, 3, 1, '2021-07-26 15:49:18', '2021-07-26 15:49:18'),
(8, '197728', 'A5', 'colorful', '4', '22ececb2354495318c5e10b166110c2c', NULL, NULL, 3, 1, '2021-07-26 15:50:48', '2021-07-26 15:50:48'),
(9, '924931', 'A5', 'grey', '3', '3d46a66717ad3037a4459eedff593c1d', 'accept', '', 3, 1, '2021-07-26 15:57:58', '2021-08-21 12:14:10'),
(10, '872713', 'A5', 'colorful', '50', '5dbfbc66d8951e7ad2b5795ba9629ffb', NULL, NULL, 3, 1, '2021-07-26 15:58:38', '2021-07-26 15:58:38'),
(11, '883166', 'A5', 'colorful', '3', 'a7f5f735657e16730b6e0abef24d4b06', 'accept', '', 3, 1, '2021-08-06 01:18:47', '2021-08-21 12:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_scanning`
--

CREATE TABLE `order_scanning` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_count` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_accept_status` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Accept|Reject',
  `reject_reason_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_scanning`
--

INSERT INTO `order_scanning` (`id`, `tracking_code`, `email`, `paper_count`, `agent_accept_status`, `reject_reason_message`, `agent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, '826717', 'agent@email.com', '50', NULL, NULL, 3, 1, '2021-07-10 23:00:49', '2021-07-10 23:00:49'),
(14, '499551', 'user@email.com', '50', NULL, NULL, 3, 1, '2021-07-11 03:56:06', '2021-07-11 03:56:06'),
(15, '738249', 'agent@email.com', '3', NULL, NULL, 3, 1, '2021-07-20 12:09:56', '2021-07-20 12:09:56'),
(16, '552620', 'agent@email.com', '3', NULL, NULL, 3, 1, '2021-07-22 03:11:32', '2021-07-22 03:11:32'),
(17, '760838', 'agent@email.com', '3', NULL, NULL, 3, 1, '2021-07-22 03:18:33', '2021-07-22 03:18:33'),
(18, '666464', 'agent@email.com', '3', NULL, NULL, 3, 1, '2021-07-23 11:52:58', '2021-07-23 11:52:58'),
(19, '781974', 'agent@email.com', '4', NULL, NULL, 3, 1, '2021-07-23 13:22:05', '2021-07-23 13:22:05'),
(20, '699170', 'agent@email.com', '6', NULL, NULL, 3, 1, '2021-07-23 13:23:08', '2021-07-23 13:23:08'),
(21, '255719', 'agent@email.com', '4', NULL, NULL, 3, 1, '2021-07-23 13:23:51', '2021-07-23 13:23:51'),
(22, '957120', 'agent@email.com', '5', NULL, NULL, 3, 1, '2021-07-23 15:00:07', '2021-07-23 15:00:07'),
(23, '552988', 'agent@email.com', '3', NULL, NULL, 3, 1, '2021-07-23 15:03:29', '2021-07-23 15:03:29'),
(24, '316098', 'user@email.com', '4', NULL, NULL, 3, 1, '2021-07-23 15:04:19', '2021-07-23 15:04:19'),
(25, '860573', 'agent@email.com', '4', NULL, NULL, 3, 1, '2021-07-23 15:04:57', '2021-07-23 15:04:57'),
(26, '981268', 'user@email.com', '3', NULL, NULL, 3, 1, '2021-07-23 15:09:35', '2021-07-23 15:09:35'),
(27, '213009', 'user@email.com', '4', NULL, NULL, 3, 1, '2021-07-23 15:11:15', '2021-07-23 15:11:15'),
(28, '862332', 'user@email.com', '3', NULL, NULL, 3, 1, '2021-07-23 15:26:05', '2021-07-23 15:26:05'),
(29, '454328', 'user@email.com', '3', NULL, NULL, 3, 1, '2021-07-23 15:30:42', '2021-07-23 15:30:42'),
(30, '614394', 'agent@email.com', '4', NULL, NULL, 3, 1, '2021-07-23 15:32:24', '2021-07-23 15:32:24'),
(31, '432674', 'admin@email.com', '3', NULL, NULL, 3, 1, '2021-07-23 15:33:02', '2021-07-23 15:33:02'),
(32, '427181', 'agent@email.com', '3', NULL, NULL, 3, 1, '2021-07-25 01:10:02', '2021-07-25 01:10:02'),
(33, '502194', 'agent@email.com', '3', NULL, NULL, 3, 1, '2021-08-06 00:59:30', '2021-08-06 00:59:30'),
(34, '420124', 'user@email.com', '3', NULL, NULL, 3, 1, '2021-08-06 01:15:18', '2021-08-06 01:15:18'),
(35, '873424', 'user@email.com', '3', 'accept', '', 3, 1, '2021-08-21 01:55:11', '2021-08-21 12:04:05'),
(36, '516920', 'yaser_mohammadkhah@yahoo.com', '3', NULL, NULL, 3, 1, '2021-08-22 00:37:02', '2021-08-22 00:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ex_month` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ex_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvd_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`id`, `address1`, `name_of_card`, `address2`, `credit_card`, `country`, `ex_month`, `ex_year`, `postal`, `cvd_code`, `city`, `province`, `default`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'tester', 'visit card man test', '', '7412', 'CA', '3', '22', 'H7V2V2', '145236', 'awda', 'test', '0', 1, '2021-07-11 16:25:58', '2021-08-22 00:34:01'),
(7, 'new line 1', 'card 221', '', '334422eee', 'US', '3', '11', 'H7V2V2', '145236', 'awda', 'test', '0', 1, '2021-08-21 03:06:21', '2021-08-21 03:06:35'),
(8, 'address1', 'visit card', '44eedd1122', '741258963', 'CA', '1', '11', 'H8R3T3', '145236', 'city', 'QC', '0', 3, '2021-08-21 12:33:28', '2021-08-21 12:33:28'),
(9, 'teste', 'card', '', 'credit card', 'CA', '1', '11', 'sefsef', '3232', 'nek', 'state', '1', 1, '2021-08-22 00:44:08', '2021-08-22 00:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `percentage_rate_systems`
--

CREATE TABLE `percentage_rate_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_type` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_type` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_first_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_more_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_percentage` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `color_type`, `paper_type`, `price_first_page`, `price_more_page`, `service_percentage`, `service_type`, `created_at`, `updated_at`) VALUES
(1, 'colorful', 'A5', '7', '8', NULL, 'printing', '2021-07-08 20:25:46', '2021-08-21 09:23:35'),
(2, 'grey', 'A5', '4', '5', NULL, 'printing', '2021-07-08 20:26:18', '2021-08-21 09:23:43'),
(3, '', '', '6', '7', NULL, 'scanning', '2021-07-08 20:26:18', '2021-08-21 09:23:51'),
(4, '', '', '', '', '6', 'agent', '2021-07-08 20:26:18', '2021-08-21 09:24:09'),
(5, '', '', '', '', '31', 'user', '2021-07-08 20:26:18', '2021-08-21 09:24:17'),
(6, '', '', '8', '9', NULL, 'faxing', '2021-07-08 20:26:18', '2021-08-21 09:24:00'),
(7, '', '', '', '', '11', 'mailbox', '2021-07-08 20:26:18', '2021-08-21 09:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ZqHcXInyicKRvtwjbdYQIUHwlEkiQLWEiwXNtSlQ', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:88.0) Gecko/20100101 Firefox/88.0', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IjcyNHNQcWdKbFRLUTJ4Um10WG5WM1hDUWg0V0VqTW1JOHJQZHlLOWwiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWdlbnQvZW52ZWxvcC9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkZlpaT1BkRjNHZ3lRNkl6VmVIQUh1ZWVZN2FxeGRiSEM2VWc3OWdmcU80NHdVVU5NOW5ONUciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGZaWk9QZEYzR2d5UTZJelZlSEFIdWVlWTdhcXhkYkhDNlVnNzlnZnFPNDR3VVVOTTluTjVHIjtzOjU6ImltYWdlIjtpOjM2O3M6MTA6ImxhYmVsLXR5cGUiO3M6NzoiZW52ZWxvcCI7czo3OiJpbnZvaWNlIjtpOjM2O3M6MTI6Imludm9pY2UtdHlwZSI7czo3OiJlbnZlbG9wIjt9', 1630069943);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` double(8,2) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `province`, `tax`, `country`, `created_at`, `updated_at`) VALUES
(1, 'AB', 14.97, 'Canada', NULL, NULL),
(2, 'BC', 12.00, 'Canada', NULL, NULL),
(3, 'MB', 2.00, 'Canada', NULL, NULL),
(4, 'NB', 3.00, 'Canada', NULL, NULL),
(5, 'NL', 4.00, 'Canada', NULL, NULL),
(6, 'NT', 5.00, 'Canada', NULL, NULL),
(7, 'NS', 6.00, 'Canada', NULL, NULL),
(8, 'NU', 7.00, 'Canada', NULL, NULL),
(9, 'ON', 8.00, 'Canada', NULL, NULL),
(10, 'PE', 9.00, 'Canada', NULL, NULL),
(11, 'QC', 1.15, 'Canada', NULL, NULL),
(12, 'SK', 11.00, 'Canada', NULL, NULL),
(13, 'YT', 13.00, 'Canada', NULL, NULL),
(14, 'Alabama', 0.00, 'USA', NULL, NULL),
(15, 'Alaska', 0.00, 'USA', NULL, NULL),
(16, 'Arizona', 0.00, 'USA', NULL, NULL),
(17, 'Arkansas', 0.00, 'USA', NULL, NULL),
(18, 'California', 25.00, 'USA', NULL, NULL),
(19, 'Colorado', 0.00, 'USA', NULL, NULL),
(20, 'Connecticut', 0.00, 'USA', NULL, NULL),
(21, 'Delaware', 0.00, 'USA', NULL, NULL),
(22, 'Florida', 0.00, 'USA', NULL, NULL),
(23, 'Georgia', 0.00, 'USA', NULL, NULL),
(24, 'Hawaii', 0.00, 'USA', NULL, NULL),
(25, 'Idaho', 0.00, 'USA', NULL, NULL),
(26, 'Illinois', 0.00, 'USA', NULL, NULL),
(27, 'Indiana', 0.00, 'USA', NULL, NULL),
(28, 'Iowa', 0.00, 'USA', NULL, NULL),
(29, 'Kansas', 0.00, 'USA', NULL, NULL),
(30, 'Kentucky', 0.00, 'USA', NULL, NULL),
(31, 'Louisiana', 0.00, 'USA', NULL, NULL),
(32, 'Maine', 0.00, 'USA', NULL, NULL),
(33, 'Maryland', 0.00, 'USA', NULL, NULL),
(34, 'Massachusetts', 0.00, 'USA', NULL, NULL),
(35, 'Michigan', 0.00, 'USA', NULL, NULL),
(36, 'Minnesota', 0.00, 'USA', NULL, NULL),
(37, 'Mississippi', 0.00, 'USA', NULL, NULL),
(38, 'Missouri', 0.00, 'USA', NULL, NULL),
(39, 'Montana', 0.00, 'USA', NULL, NULL),
(40, 'Nebraska', 0.00, 'USA', NULL, NULL),
(41, 'Nevada', 0.00, 'USA', NULL, NULL),
(42, 'New Hampshire', 0.00, 'USA', NULL, NULL),
(43, 'New Jersey', 0.00, 'USA', NULL, NULL),
(44, 'New Mexico', 0.00, 'USA', NULL, NULL),
(45, 'New York', 0.00, 'USA', NULL, NULL),
(46, 'North Carolina', 0.00, 'USA', NULL, NULL),
(47, 'North Dakota', 0.00, 'USA', NULL, NULL),
(48, 'Oregon', 0.00, 'USA', NULL, NULL),
(49, 'Pennsylvania', 0.00, 'USA', NULL, NULL),
(50, 'Rhode Island', 0.00, 'USA', NULL, NULL),
(51, 'South Carolina', 0.00, 'USA', NULL, NULL),
(52, 'South Dakota', 0.00, 'USA', NULL, NULL),
(53, 'Tennessee', 0.00, 'USA', NULL, NULL),
(54, 'Texas', 0.00, 'USA', NULL, NULL),
(55, 'Utah', 0.00, 'USA', NULL, NULL),
(56, 'Vermont', 0.00, 'USA', NULL, NULL),
(57, 'Virginia', 0.00, 'USA', NULL, NULL),
(58, 'Washington', 0.00, 'USA', NULL, NULL),
(59, 'West Virginia', 0.00, 'USA', NULL, NULL),
(60, 'Wisconsin', 0.00, 'USA', NULL, NULL),
(61, 'Wyoming', 0.00, 'USA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `temp_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CAD',
  `status` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'successful|unsuccessful',
  `payed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'paypal|credit_card',
  `system_check` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:not check, 1: check',
  `parcel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `envelop_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faxing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `printing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `scanning_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_mailbox_id` bigint(20) UNSIGNED DEFAULT NULL,
  `percentage` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `trans_code`, `price`, `currency`, `status`, `payed_by`, `system_check`, `parcel_id`, `envelop_id`, `faxing_id`, `printing_id`, `scanning_id`, `agent_id`, `user_id`, `created_at`, `updated_at`, `user_mailbox_id`, `percentage`) VALUES
(18, '6LG59038KX8486117', 248, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 13, 3, 1, '2021-07-10 23:00:49', '2021-07-10 23:40:00', NULL, NULL),
(19, NULL, -314.87, 'CAD', 'successful', 'agent', '1', 18, NULL, NULL, NULL, NULL, 3, 3, '2021-07-10 23:02:09', '2021-07-10 23:40:00', NULL, NULL),
(20, NULL, -79.4, 'CAD', 'successful', 'agent', '1', NULL, 9, NULL, NULL, NULL, 3, 3, '2021-07-10 23:03:33', '2021-07-10 23:40:00', NULL, NULL),
(21, NULL, -314.87, 'CAD', 'successful', 'agent', '1', 19, NULL, NULL, NULL, NULL, 3, 3, '2021-07-10 23:32:13', '2021-07-10 23:40:00', NULL, NULL),
(22, '4KH435744J464394Y', 461.14, 'CAD', 'successful', 'agent', '1', NULL, NULL, NULL, NULL, NULL, 3, 3, '2021-07-11 03:08:30', '2021-07-11 03:08:30', NULL, NULL),
(23, NULL, -314.87, 'CAD', 'successful', 'agent', '1', 20, NULL, NULL, NULL, NULL, 3, 3, '2021-07-11 03:33:36', '2021-07-11 03:40:00', NULL, NULL),
(24, '4W14420753822442V', 314.87, 'CAD', 'successful', 'agent', '1', NULL, NULL, NULL, NULL, NULL, 3, 3, '2021-07-11 03:44:14', '2021-07-11 03:44:14', NULL, NULL),
(25, '8S5953532T6685011', 248, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 14, 3, 1, '2021-07-11 03:56:06', '2021-07-11 04:00:00', NULL, NULL),
(26, '4FD048781D654272B', 402, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, 3, NULL, 3, 1, '2021-07-11 03:57:22', '2021-07-11 04:00:00', NULL, NULL),
(27, '1F3706092R307572G', 248, 'CAD', 'successful', 'paypal', '1', NULL, NULL, 8, NULL, NULL, 3, 1, '2021-07-11 04:37:04', '2021-07-11 04:40:00', NULL, NULL),
(28, '4J6224361M602784D', 331.64, 'CAD', 'successful', 'paypal', '1', 21, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-11 12:03:29', '2021-07-11 12:10:00', NULL, NULL),
(29, '4K0965264S9603118', 71.46, 'CAD', 'successful', 'paypal', '1', NULL, 10, NULL, NULL, NULL, NULL, 1, '2021-07-11 12:04:53', '2021-07-11 12:10:00', NULL, NULL),
(30, '5XW076247N109343V', 331.64, 'CAD', 'successful', 'paypal', '1', 22, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-11 16:31:11', '2021-07-11 16:40:00', NULL, NULL),
(31, '0YC16438HR7631729', 71.46, 'CAD', 'successful', 'paypal', '1', NULL, 11, NULL, NULL, NULL, NULL, 1, '2021-07-11 16:33:36', '2021-07-11 16:40:00', NULL, NULL),
(32, '80072024J4726922A', 71.57, 'CAD', 'successful', 'paypal', '1', 23, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-11 16:43:39', '2021-07-11 16:50:00', NULL, NULL),
(33, '8PX63308BY4842628', 19.95, 'CAD', 'successful', 'paypal', '1', 24, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-11 16:44:32', '2021-07-11 16:50:00', NULL, NULL),
(34, '74H87315K4527934L', 19.8, 'CAD', 'successful', 'paypal', '1', NULL, 12, NULL, NULL, NULL, NULL, 1, '2021-07-11 16:45:22', '2021-07-11 16:50:00', NULL, NULL),
(35, '45L41056LX5531837', 71.46, 'CAD', 'successful', 'paypal', '1', NULL, 13, NULL, NULL, NULL, NULL, 1, '2021-07-11 16:47:26', '2021-07-11 16:50:00', NULL, NULL),
(36, '9NH5661075423430A', 18.59, 'CAD', 'successful', 'paypal', '1', 25, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-11 17:56:37', '2021-07-11 18:00:00', NULL, NULL),
(37, '9RK67711F2753522L', 71.46, 'CAD', 'successful', 'paypal', '1', NULL, 14, NULL, NULL, NULL, NULL, 1, '2021-07-11 17:57:48', '2021-07-11 18:00:00', NULL, NULL),
(38, NULL, -117.25, 'CAD', 'successful', 'agent', '1', 26, NULL, NULL, NULL, NULL, 3, 3, '2021-07-13 08:07:37', '2021-07-14 07:30:00', NULL, NULL),
(39, NULL, -21.77, 'CAD', 'successful', 'agent', '1', NULL, 15, NULL, NULL, NULL, 3, 3, '2021-07-13 08:18:55', '2021-07-14 07:30:00', NULL, NULL),
(40, '0TN6139924005894J', 26, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, 4, NULL, 3, 1, '2021-07-14 06:49:22', '2021-07-14 07:30:00', NULL, NULL),
(41, '8D230299PW453130C', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, 5, NULL, 3, 1, '2021-07-14 06:51:37', '2021-07-14 07:30:00', NULL, NULL),
(42, '6ML15337BE6216803', 26, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, 6, NULL, 3, 1, '2021-07-14 07:18:25', '2021-07-14 07:30:00', NULL, NULL),
(43, 'payed_manual', 248, 'CAD', 'successful', 'paypal', '1', NULL, NULL, 9, NULL, NULL, 3, 1, '2021-07-16 12:11:08', '2021-08-14 01:16:00', NULL, NULL),
(44, 'payed_manual', 248, 'CAD', 'successful', 'paypal', '1', NULL, NULL, 10, NULL, NULL, 7, 1, '2021-07-16 12:48:26', '2021-08-14 01:16:00', NULL, NULL),
(45, '7C703802SC285971M', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 15, 3, 1, '2021-07-20 12:09:57', '2021-08-14 01:16:00', NULL, NULL),
(46, 'payed_manual', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 16, 3, 1, '2021-07-22 03:11:32', '2021-08-14 01:16:00', NULL, NULL),
(47, 'payed_manual', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 17, 3, 1, '2021-07-22 03:18:33', '2021-08-14 01:16:00', NULL, NULL),
(48, '0EE09554XB6428606', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 18, 3, 1, '2021-07-23 11:52:58', '2021-08-14 01:16:00', NULL, NULL),
(49, '75M616729D3087624', 18, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 19, 3, 1, '2021-07-23 13:22:05', '2021-08-14 01:16:00', NULL, NULL),
(50, '81B743580G496464M', 28, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 20, 3, 1, '2021-07-23 13:23:08', '2021-08-14 01:16:00', NULL, NULL),
(51, '7V400785WK067093J', 18, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 21, 3, 1, '2021-07-23 13:23:51', '2021-08-14 01:16:00', NULL, NULL),
(52, '0C416626WW100164U', 23, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 22, 3, 1, '2021-07-23 15:00:07', '2021-08-14 01:16:00', NULL, NULL),
(53, '0AK12423GV889981E', 13, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 23, 3, 1, '2021-07-23 15:03:29', '2021-08-14 01:16:00', NULL, NULL),
(54, '94250932JW851923P', 18, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 24, 3, 1, '2021-07-23 15:04:20', '2021-08-14 01:16:00', NULL, NULL),
(55, '52485386P2324350Y', 18, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 25, 3, 1, '2021-07-23 15:04:57', '2021-08-14 01:16:00', NULL, NULL),
(56, '2L484372V03915614', 13, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 26, 3, 1, '2021-07-23 15:09:35', '2021-08-14 01:16:00', NULL, NULL),
(57, '9W1814112C481802P', 18, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 27, 3, 1, '2021-07-23 15:11:15', '2021-08-14 01:16:00', NULL, NULL),
(58, '3AV73560HJ3236258', 13, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 28, 3, 1, '2021-07-23 15:26:05', '2021-08-14 01:16:00', NULL, NULL),
(59, '9CV03318DC231802K', 13, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 29, 3, 1, '2021-07-23 15:30:42', '2021-08-14 01:16:00', NULL, NULL),
(60, '80537072TL3179935', 18, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 30, 3, 1, '2021-07-23 15:32:24', '2021-08-14 01:16:00', NULL, NULL),
(61, '1GV699939R5169134', 13, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, NULL, 31, 3, 1, '2021-07-23 15:33:02', '2021-08-14 01:16:00', NULL, NULL),
(62, 'payed_manual', 71.61, 'CAD', 'successful', 'paypal', '1', 27, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-23 15:58:34', '2021-08-14 01:16:00', NULL, NULL),
(63, '13D10029YY1435046', 162.42, 'CAD', 'pending', 'paypal', '1', 30, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:01:29', '2021-08-14 01:16:00', NULL, NULL),
(64, '94X12511023574331', 59.09, 'CAD', 'pending', 'paypal', '1', 32, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:08:28', '2021-08-14 01:16:00', NULL, NULL),
(65, '9UC104491H929532E', 23.75, 'CAD', 'pending', 'paypal', '1', 33, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:14:39', '2021-08-14 01:16:00', NULL, NULL),
(66, '3HX131089Y235900C', 162.99, 'CAD', 'successful', 'paypal', '1', 34, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:16:24', '2021-08-14 01:16:00', NULL, NULL),
(67, '8YK54970HN157481E', 165.34, 'CAD', 'successful', 'paypal', '1', 35, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:18:34', '2021-08-14 01:16:00', NULL, NULL),
(68, '7SY35975H39248501', 18.67, 'CAD', 'successful', 'paypal', '1', 36, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:20:39', '2021-08-14 01:16:00', NULL, NULL),
(69, '4HD67528G4378143D', 18.67, 'CAD', 'successful', 'paypal', '1', 37, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:23:06', '2021-08-14 01:16:00', NULL, NULL),
(70, '39L58804WS6567204', 29.93, 'CAD', 'successful', 'paypal', '1', 38, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:40:01', '2021-08-14 01:16:00', NULL, NULL),
(71, '6TJ69009UX845670K', 18.67, 'CAD', 'pending', 'paypal', '1', 39, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-24 03:41:39', '2021-08-14 01:16:00', NULL, NULL),
(73, '0X173016M13552606', 19.76, 'CAD', 'successful', 'paypal', '1', NULL, 17, NULL, NULL, NULL, NULL, 1, '2021-07-24 15:08:51', '2021-08-14 01:16:00', NULL, NULL),
(74, '6RB74668PC155594D', 31.22, 'CAD', 'pending', 'paypal', '1', NULL, 18, NULL, NULL, NULL, NULL, 1, '2021-07-24 15:10:22', '2021-08-14 01:16:00', NULL, NULL),
(76, '3MT96091G3333831B', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, 12, NULL, NULL, 3, 1, '2021-07-24 23:37:16', '2021-08-14 01:16:00', NULL, NULL),
(77, '5GH19970239806215', 13, 'CAD', 'pending', 'paypal', '1', NULL, NULL, 13, NULL, NULL, 3, 1, '2021-07-24 23:38:01', '2021-08-14 01:16:00', NULL, NULL),
(78, '79L18815JY3871406', 13, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, NULL, NULL, 32, 3, 1, '2021-07-25 01:10:02', '2021-08-14 01:16:00', NULL, NULL),
(79, '1YP32444H54062154', 18.67, 'CAD', 'successful', 'paypal', '1', 40, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-25 02:19:37', '2021-08-14 01:16:00', NULL, NULL),
(80, '0UV55531BF1391646', 42, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, NULL, 7, NULL, 3, 1, '2021-07-26 15:49:18', '2021-08-14 01:16:00', NULL, NULL),
(81, '1YC18868B7026601G', 34, 'CAD', 'pending', 'paypal', '1', NULL, NULL, NULL, 8, NULL, 3, 1, '2021-07-26 15:50:48', '2021-08-14 01:16:00', NULL, NULL),
(82, '3NB557923X4804536', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, 9, NULL, 3, 1, '2021-07-26 15:57:58', '2021-08-14 01:16:00', NULL, NULL),
(83, '6B129214V71175333', 402, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, NULL, 10, NULL, 3, 1, '2021-07-26 15:58:38', '2021-08-14 01:16:00', NULL, NULL),
(106, '47868450802700910', 73.85, 'CAD', 'successful', 'paypal', '1', 41, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 02:57:42', '2021-08-14 01:16:00', NULL, NULL),
(107, '8X500087ED451863W', 18.75, 'CAD', 'successful', 'paypal', '1', 42, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 03:09:40', '2021-08-14 01:16:00', NULL, NULL),
(108, '9NN25256UJ872145R', 40.75, 'CAD', 'successful', 'paypal', '1', 43, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 03:15:07', '2021-08-14 01:16:00', NULL, NULL),
(109, '1G951412NP316290V', 330.19, 'CAD', 'unsuccessful', 'paypal', '1', 44, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 03:16:20', '2021-08-14 01:16:00', NULL, NULL),
(110, '2PV05105283991405', 39.12, 'CAD', 'successful', 'paypal', '1', 45, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 03:20:06', '2021-08-14 01:16:00', NULL, NULL),
(111, '9M3370180V0554109', 40.75, 'CAD', 'pending', 'paypal', '1', 46, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 07:28:52', '2021-08-14 01:16:00', NULL, NULL),
(112, '2D4187861M383194S', 71.41, 'CAD', 'unsuccessful', 'paypal', '1', 47, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 07:31:03', '2021-08-14 01:16:00', NULL, NULL),
(113, '2F982516EW651793R', 71.41, 'CAD', 'unsuccessful', 'paypal', '1', 48, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 07:34:18', '2021-08-14 01:16:00', NULL, NULL),
(114, '10H06912LX5155127', 71.41, 'CAD', 'successful', 'paypal', '1', 49, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 07:39:51', '2021-08-14 01:16:00', NULL, NULL),
(115, '07T099591E5648003', 80.3, 'CAD', 'unsuccessful', 'paypal', '1', 50, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-05 13:26:46', '2021-08-14 01:16:00', NULL, NULL),
(116, '94S35104SF167210P', 71.15, 'CAD', 'unsuccessful', 'paypal', '1', NULL, 19, NULL, NULL, NULL, NULL, 1, '2021-08-06 00:11:59', '2021-08-14 01:16:00', NULL, NULL),
(117, '89D03073EB091693V', 71.15, 'CAD', 'successful', 'paypal', '1', NULL, 20, NULL, NULL, NULL, NULL, 1, '2021-08-06 00:53:15', '2021-08-14 01:16:00', NULL, NULL),
(118, '8T759118WD384110N', 13, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, NULL, NULL, 33, 3, 1, '2021-08-06 00:59:30', '2021-08-14 01:16:00', NULL, NULL),
(119, '2D013331MG692192V', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 34, 3, 1, '2021-08-06 01:15:18', '2021-08-14 01:16:00', NULL, NULL),
(120, '9JS31289WF160652Y', 26, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, 11, NULL, 3, 1, '2021-08-06 01:18:47', '2021-08-14 01:16:00', NULL, NULL),
(121, '1N5888862F2851802', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, 14, NULL, NULL, 3, 1, '2021-08-06 01:19:35', '2021-08-14 01:16:00', NULL, NULL),
(128, '7PD78358L48605148', 287, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-06 05:52:53', '2021-08-14 01:16:00', 55, NULL),
(129, '4HG580472H369135B', 89.25, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-07 08:48:26', '2021-08-14 01:16:00', 56, NULL),
(130, '9J303432AV280283L', 78, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-07 08:49:37', '2021-08-14 01:16:00', 57, NULL),
(131, '5W5023611M828810Y', 78, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-08 09:05:53', '2021-08-14 01:16:00', 59, NULL),
(132, '5HC98991K8021901F', 366, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-09 08:53:21', '2021-08-14 01:16:00', 63, NULL),
(133, '9T648988JE602950N', 78, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-09 09:37:50', '2021-08-14 01:16:00', 64, NULL),
(134, '8MN7541132064181Y', 78, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-09 15:54:58', '2021-08-14 01:16:00', 65, NULL),
(135, '5FG973520H584110H', 287, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-11 04:51:46', '2021-08-14 01:16:00', 66, NULL),
(136, '7LK29572NM073352T', 287, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-13 02:46:09', '2021-08-14 01:16:00', 66, NULL),
(137, '0HP07562UW192682W', 287, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-13 03:28:56', '2021-08-14 01:16:00', 66, NULL),
(138, NULL, -2.29, 'CAD', 'successful', 'agent', '1', 51, NULL, NULL, NULL, NULL, 3, 3, '2021-08-13 08:12:14', '2021-08-14 01:16:00', NULL, NULL),
(139, NULL, -2.29, 'CAD', 'successful', 'agent', '1', 52, NULL, NULL, NULL, NULL, 3, 3, '2021-08-13 08:49:05', '2021-08-14 01:16:00', NULL, NULL),
(140, NULL, -5.86, 'CAD', 'successful', 'agent', '1', 53, NULL, NULL, NULL, NULL, 3, 3, '2021-08-13 08:51:42', '2021-08-14 01:16:00', NULL, 0.05),
(141, '7D1442647C407791H', 96.1, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-13 11:31:32', '2021-08-14 01:16:00', 67, 0.12),
(142, '63R2434403655780P', 287, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-13 11:43:26', '2021-08-14 01:16:00', 68, 0.12),
(143, '9WP310761G419814Y', 0, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-13 11:54:42', '2021-08-14 01:16:00', 69, 0.12),
(144, '1VL93542UE311034T', 34.44, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-13 11:56:51', '2021-08-14 01:16:00', 70, 0.12),
(145, '17G531078X959823B', 96.1, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-13 11:58:42', '2021-08-18 02:19:30', 71, 0.12),
(146, NULL, -2.29, 'CAD', 'successful', 'agent', '1', 54, NULL, NULL, NULL, NULL, 3, 3, '2021-08-13 12:17:08', '2021-08-14 01:16:00', NULL, 0.05),
(147, NULL, -3.98, 'CAD', 'successful', 'agent', '1', NULL, 21, NULL, NULL, NULL, 3, 3, '2021-08-15 02:39:25', '2021-08-15 02:40:00', NULL, 0.05),
(148, '0MN767438N558723S', 140.05, 'CAD', 'successful', 'paypal', '1', 55, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-16 08:46:48', '2021-08-21 12:50:00', NULL, NULL),
(149, '68824533XW348951L', 140.05, 'CAD', 'unsuccessful', 'paypal', '1', 56, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-18 01:11:36', '2021-08-21 12:50:00', NULL, NULL),
(150, '7408327894931212N', 80.3, 'CAD', 'successful', 'paypal', '1', 57, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-18 01:20:16', '2021-08-21 12:50:00', NULL, NULL),
(151, '3F807768L4843574U', 80.5, 'CAD', 'successful', 'paypal', '1', 58, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-18 01:34:51', '2021-08-21 12:50:00', NULL, NULL),
(152, '2S737572MS5030640', 140.05, 'CAD', 'unsuccessful', 'paypal', '1', 59, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-18 01:36:32', '2021-08-21 12:50:00', NULL, NULL),
(153, NULL, -2.31, 'CAD', 'successful', 'agent', '1', 60, NULL, NULL, NULL, NULL, 3, 3, '2021-08-18 01:38:41', '2021-08-21 12:50:00', NULL, 0.05),
(154, '5JY28858W13105333', 96.1, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-18 02:18:55', '2021-08-21 12:50:00', 71, NULL),
(155, '4DK70100BN781235Y', 18.64, 'CAD', 'successful', 'paypal', '1', 61, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-20 10:12:50', '2021-08-21 12:50:00', NULL, NULL),
(156, '55J64295VW3468749', 18.59, 'CAD', 'successful', 'paypal', '1', 62, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-20 10:20:06', '2021-08-21 12:50:00', NULL, NULL),
(157, '2A629243R64538547', 18.75, 'CAD', 'successful', 'paypal', '1', 63, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-20 10:41:05', '2021-08-21 12:50:00', NULL, NULL),
(158, '9UB2419086370401M', 71.41, 'CAD', 'successful', 'paypal', '1', 64, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-20 11:07:17', '2021-08-21 12:50:00', NULL, NULL),
(159, '2ST71605US2501136', 71.15, 'CAD', 'successful', 'paypal', '1', NULL, 22, NULL, NULL, NULL, NULL, 1, '2021-08-20 11:16:53', '2021-08-21 12:50:00', NULL, NULL),
(160, '1T116533DV3847528', 18.95, 'CAD', 'successful', 'paypal', '1', 65, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-21 01:25:02', '2021-08-21 12:50:00', NULL, NULL),
(161, '2GJ581672A154450H', 71.15, 'CAD', 'successful', 'paypal', '1', NULL, 23, NULL, NULL, NULL, NULL, 1, '2021-08-21 01:34:27', '2021-08-21 12:50:00', NULL, NULL),
(162, '7YY15218C28167033', 18.75, 'CAD', 'successful', 'paypal', '1', 66, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-21 01:50:19', '2021-08-21 12:50:00', NULL, NULL),
(163, '3KF59219ND985484K', 71.15, 'CAD', 'successful', 'paypal', '1', NULL, 24, NULL, NULL, NULL, NULL, 1, '2021-08-21 01:52:23', '2021-08-21 12:50:00', NULL, NULL),
(164, '2RH37271PJ572752T', 13, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 35, 3, 1, '2021-08-21 01:55:11', '2021-08-21 12:50:00', NULL, NULL),
(165, '3322wewwqwq', -2314.91, 'CAD', 'successful', 'admin', '1', NULL, NULL, NULL, NULL, NULL, 3, 2, '2021-08-21 04:51:58', '2021-08-21 04:51:58', NULL, NULL),
(166, NULL, -7, 'CAD', 'successful', 'agent', '1', 67, NULL, NULL, NULL, NULL, 3, 3, '2021-08-21 11:30:24', '2021-08-21 12:50:00', NULL, 0.06),
(167, NULL, -1.24, 'CAD', 'successful', 'agent', '1', 68, NULL, NULL, NULL, NULL, 3, 3, '2021-08-21 11:49:18', '2021-08-21 12:50:00', NULL, 0.06),
(168, NULL, -1.42, 'CAD', 'successful', 'agent', '1', 69, NULL, NULL, NULL, NULL, 3, 3, '2021-08-21 11:51:56', '2021-08-21 12:50:00', NULL, 0.06),
(169, NULL, -1.32, 'CAD', 'successful', 'agent', '1', NULL, 25, NULL, NULL, NULL, 3, 3, '2021-08-21 11:58:52', '2021-08-21 12:50:00', NULL, 0.06),
(170, '3X990238W1855172U', 69.42, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-21 12:21:48', '2021-08-21 12:50:00', 81, 0.11),
(171, '2V703336UW746530L', 255.43, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-08-21 12:28:43', '2021-08-21 12:50:00', 82, 0.11),
(172, NULL, -1.42, 'CAD', 'successful', 'agent', '1', 70, NULL, NULL, NULL, NULL, 3, 3, '2021-08-22 00:31:37', '2021-08-22 00:40:00', NULL, 0.06),
(173, '64651510W4035762E', 20, 'CAD', 'successful', 'paypal', '1', NULL, NULL, NULL, NULL, 36, 3, 1, '2021-08-22 00:37:02', '2021-08-22 00:40:00', NULL, NULL),
(174, '55235763U3472113G', 54.74, 'CAD', 'unsuccessful', 'paypal', '1', 71, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-22 00:52:49', '2021-08-22 01:00:00', NULL, NULL),
(175, '86Y8747395277631R', 14.37, 'CAD', 'successful', 'paypal', '1', 72, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-22 00:54:32', '2021-08-22 01:00:00', NULL, NULL),
(176, '7CD485711H2565051', 44, 'CAD', 'successful', 'paypal', '1', NULL, NULL, 15, NULL, NULL, 3, 1, '2021-08-22 00:55:47', '2021-08-22 01:00:00', NULL, NULL),
(177, '9JS44735DW617021J', 44, 'CAD', 'successful', 'paypal', '1', NULL, NULL, 16, NULL, NULL, 7, 1, '2021-08-22 00:56:22', '2021-08-22 01:00:00', NULL, NULL),
(178, '9TY28792G7702993M', 44, 'CAD', 'unsuccessful', 'paypal', '1', NULL, NULL, 17, NULL, NULL, 7, 1, '2021-08-22 00:56:51', '2021-08-22 01:00:00', NULL, NULL),
(179, NULL, -4.76, 'CAD', 'successful', 'agent', '1', NULL, 26, NULL, NULL, NULL, 3, 3, '2021-08-22 00:57:44', '2021-08-22 01:00:00', NULL, 0.06),
(180, NULL, -1.29, 'CAD', 'successful', 'agent', '1', 73, NULL, NULL, NULL, NULL, 7, 7, '2021-08-22 01:01:01', '2021-08-22 01:10:00', NULL, 0.06),
(181, NULL, -1.24, 'CAD', 'successful', 'agent', '1', 74, NULL, NULL, NULL, NULL, 7, 7, '2021-08-22 02:02:03', '2021-08-22 02:10:00', NULL, 0.06),
(182, '10A33889V89953507', 14.21, 'CAD', 'successful', 'paypal', '0', 75, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 00:21:41', '2021-08-24 00:54:47', NULL, NULL),
(183, '7D22671324792331V', 54.54, 'CAD', 'successful', 'paypal', '0', NULL, 27, NULL, NULL, NULL, NULL, 1, '2021-08-24 01:59:11', '2021-08-24 01:59:32', NULL, NULL),
(184, '7AS85666C8546322K', 15.54, 'CAD', 'successful', 'paypal', '0', 76, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 02:32:45', '2021-08-24 02:35:44', NULL, NULL),
(185, '1JU28279076681432', 24.38, 'CAD', 'successful', 'paypal', '0', 77, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 02:39:14', '2021-08-24 02:39:47', NULL, NULL),
(186, '8M097170H0030642S', 14.53, 'CAD', 'successful', 'paypal', '0', 78, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 02:43:24', '2021-08-24 02:43:57', NULL, NULL),
(187, '2ME30738EF424950D', 15.9, 'CAD', 'successful', 'paypal', '0', 79, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 02:48:29', '2021-08-24 02:48:48', NULL, NULL),
(188, '1CD538295E045315C', 14.29, 'CAD', 'successful', 'paypal', '0', 80, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 08:20:36', '2021-08-24 08:20:58', NULL, NULL),
(189, '3VT265748E6718945', 14.29, 'CAD', 'unsuccessful', 'paypal', '0', 81, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 08:23:22', '2021-08-24 08:29:34', NULL, NULL),
(190, '92723954P6247332X', 15.52, 'CAD', 'unsuccessful', 'paypal', '0', 82, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 08:32:07', '2021-08-24 08:32:21', NULL, NULL),
(191, '3K956302LM702473N', 15.44, 'CAD', 'successful', 'paypal', '0', 83, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 08:40:45', '2021-08-24 08:41:05', NULL, NULL),
(192, '9EH47776FP4788347', 32.71, 'CAD', 'successful', 'paypal', '0', 84, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 10:10:39', '2021-08-24 10:11:03', NULL, NULL),
(193, '71P96990MU601232T', 16.44, 'CAD', 'successful', 'paypal', '0', 85, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 10:19:12', '2021-08-24 10:19:28', NULL, NULL),
(194, '55Y2038043462992F', 15.44, 'CAD', 'successful', 'paypal', '0', 86, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 10:33:52', '2021-08-24 10:34:12', NULL, NULL),
(195, '4S920934NU5617337', 54.54, 'CAD', 'successful', 'paypal', '0', NULL, 28, NULL, NULL, NULL, NULL, 1, '2021-08-24 10:35:36', '2021-08-24 10:35:52', NULL, NULL),
(196, NULL, -1.32, 'CAD', 'successful', 'agent', '0', 87, NULL, NULL, NULL, NULL, 3, 3, '2021-08-24 10:41:32', '2021-08-24 10:41:32', NULL, 0.06),
(197, NULL, -4.76, 'CAD', 'successful', 'agent', '0', NULL, 29, NULL, NULL, NULL, 3, 3, '2021-08-24 10:42:05', '2021-08-24 10:42:05', NULL, 0.06),
(198, '83W105683B576593C', 20.69, 'CAD', 'pending', 'paypal', '0', 88, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-25 07:09:04', '2021-08-25 07:09:04', NULL, NULL),
(199, '1YL948474C732224J', 14.64, 'USD', 'pending', 'paypal', '0', 89, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-25 07:30:24', '2021-08-25 07:30:24', NULL, NULL),
(200, '33235256XA884230J', 12.5, 'USD', 'pending', 'paypal', '0', 90, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-25 12:25:59', '2021-08-25 12:25:59', NULL, NULL),
(201, '6JG27577SN963090C', 14.5, 'USD', 'pending', 'paypal', '0', 91, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-25 12:34:42', '2021-08-25 12:34:42', NULL, NULL),
(202, '43N250372L012972H', 47.45, 'USD', 'successful', 'paypal', '0', 92, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-25 12:40:35', '2021-08-25 12:40:53', NULL, NULL),
(203, NULL, -1.23, 'CAD', 'successful', 'agent', '0', 93, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 01:37:46', '2021-08-27 01:37:46', NULL, 0.06),
(204, NULL, -1.24, 'CAD', 'successful', 'agent', '0', 94, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 02:01:59', '2021-08-27 02:01:59', NULL, 0.06),
(205, NULL, -1.25, 'CAD', 'successful', 'agent', '0', 95, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 02:07:39', '2021-08-27 02:07:39', NULL, 0.06),
(206, NULL, -1.24, 'CAD', 'successful', 'agent', '0', 96, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 02:14:55', '2021-08-27 02:14:55', NULL, 0.06),
(207, NULL, -1, 'CAD', 'successful', 'agent', '0', 97, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 02:16:27', '2021-08-27 02:16:27', NULL, 0.06),
(208, NULL, -1, 'CAD', 'successful', 'agent', '0', 98, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 02:19:25', '2021-08-27 02:19:25', NULL, 0.06),
(209, NULL, -1.2426, 'CAD', 'successful', 'agent', '0', 99, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 02:36:05', '2021-08-27 02:36:05', NULL, 0.06),
(210, NULL, -4.743, 'CAD', 'successful', 'agent', '0', NULL, 30, NULL, NULL, NULL, 3, 3, '2021-08-27 02:42:19', '2021-08-27 02:42:19', NULL, 0.06),
(211, '2BG80072RM8532525', 22.02, 'USD', 'pending', 'paypal', '0', NULL, 31, NULL, NULL, NULL, NULL, 1, '2021-08-27 03:40:10', '2021-08-27 03:40:10', NULL, NULL),
(212, '71Y81143FN1407612', 55.16, 'USD', 'successful', 'paypal', '0', NULL, 32, NULL, NULL, NULL, NULL, 1, '2021-08-27 03:43:01', '2021-08-27 03:43:17', NULL, NULL),
(213, '5FP116961C021930M', 14.64, 'USD', 'successful', 'paypal', '0', 100, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 04:47:08', '2021-08-27 04:47:36', NULL, NULL),
(214, '57A50952C19727134', 19.25, 'CAD', 'pending', 'paypal', '0', 101, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 05:05:55', '2021-08-27 05:05:55', NULL, NULL),
(215, '2PK215558W0206332', 19.25, 'CAD', 'unsuccessful', 'paypal', '0', 102, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 05:39:12', '2021-08-27 05:39:58', NULL, NULL),
(216, '2BW13627AL234290N', 19.29, 'CAD', 'pending', 'paypal', '0', 103, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 05:40:59', '2021-08-27 05:40:59', NULL, NULL),
(217, '0DT50469RG656151H', 20.4, 'CAD', 'successful', 'paypal', '0', 104, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 05:45:11', '2021-08-27 05:45:29', NULL, NULL),
(218, '9MA74863P7504852K', 20.29, 'CAD', 'pending', 'paypal', '0', 105, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 05:48:48', '2021-08-27 05:48:48', NULL, NULL),
(219, '9WP67212G7524430P', 19.25, 'CAD', 'unsuccessful', 'paypal', '0', 106, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 06:37:05', '2021-08-27 06:53:01', NULL, NULL),
(220, '0VD79125XL9877628', 15.37, 'CAD', 'pending', 'paypal', '0', 107, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:04:16', '2021-08-27 07:04:16', NULL, NULL),
(221, '14W55965MG033391T', 20.21, 'CAD', 'pending', 'paypal', '0', 108, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:18:20', '2021-08-27 07:18:20', NULL, NULL),
(222, '1R5094849B0262213', 18.37, 'CAD', 'pending', 'paypal', '0', 109, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:22:18', '2021-08-27 07:22:18', NULL, NULL),
(223, '2UK18485W1253394G', 18.37, 'CAD', 'successful', 'paypal', '0', 110, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:28:08', '2021-08-27 07:28:28', NULL, NULL),
(224, '34N29317RH086272W', 18.37, 'CAD', 'pending', 'paypal', '0', 111, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:30:12', '2021-08-27 07:30:12', NULL, NULL),
(225, '75937029TK861764W', 18.37, 'CAD', 'successful', 'paypal', '0', 112, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:32:33', '2021-08-27 07:32:52', NULL, NULL),
(226, '1M48617151292925G', 18.36, 'USD', 'pending', 'paypal', '0', 113, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:35:27', '2021-08-27 07:35:27', NULL, NULL),
(227, '8T3165455C3758354', 18.36, 'USD', 'successful', 'paypal', '0', 114, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:39:25', '2021-08-27 07:39:48', NULL, NULL),
(228, '8FF0575603967082T', 18.37, 'CAD', 'successful', 'paypal', '0', 115, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:40:32', '2021-08-27 07:40:49', NULL, NULL),
(229, '6YN96022C92338309', 21.69, 'USD', 'pending', 'paypal', '0', NULL, 33, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:55:08', '2021-08-27 07:55:08', NULL, NULL),
(230, '8S013986C18299847', 51.95, 'USD', 'successful', 'paypal', '0', NULL, 34, NULL, NULL, NULL, NULL, 1, '2021-08-27 07:56:48', '2021-08-27 08:08:01', NULL, NULL),
(231, NULL, -1.812, 'USD', 'successful', 'agent', '0', 116, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 08:34:25', '2021-08-27 08:34:25', NULL, 0.06),
(232, NULL, -2.2842, 'CAD', 'successful', 'agent', '0', 117, NULL, NULL, NULL, NULL, 3, 3, '2021-08-27 08:37:35', '2021-08-27 08:37:35', NULL, 0.06),
(233, NULL, -5.782, 'USD', 'successful', 'agent', '0', NULL, 35, NULL, NULL, NULL, 3, 3, '2021-08-27 08:38:48', '2021-08-27 08:38:48', NULL, 0.06),
(234, NULL, -5.408, 'CAD', 'successful', 'agent', '0', NULL, 36, NULL, NULL, NULL, 3, 3, '2021-08-27 08:42:23', '2021-08-27 08:42:23', NULL, 0.06);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=>male|2=>female',
  `birthday` date DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `def_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `def_pass_status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `agent_id`, `name`, `family`, `email`, `username`, `mobile`, `type`, `gender`, `birthday`, `mobile_verified_at`, `last_login_at`, `email_verified_at`, `password`, `level`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`, `status`, `address`, `postal`, `company_name`, `city`, `province`, `def_pass`, `def_pass_status`, `web_link`, `fax`, `operator_name`) VALUES
(1, NULL, 'user', 'main', 'user@email.com', NULL, '78412', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XCB8yu.bnawpEs9mI9nYjuVtjHMaNzEokCf6rIXj4qyuVMhTYPxmO', NULL, NULL, NULL, 'dPRNEMYj5YBuJEL2YPSbqazvkQlOyKO0vWXeCSjbzgt8erGTEIWwrOFc0kpL', NULL, NULL, '2021-06-27 18:01:57', '2021-08-21 03:04:50', NULL, '1', 'address neh', '701145', NULL, 'neh city', 'khor', NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'admin', NULL, 'admin@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$0H/ulNvmUrTpF8l2Q2ge2ORnzLQFqKnNGVB7N7N9b89ymNZ/Njn0W', 'admin', NULL, NULL, 'nBd7YyOFszKMdGox8okoXpa1u8k5uMzBwQ8OzHtlThjZpLMaIwi34nc5xkqK', NULL, NULL, '2021-06-27 18:02:33', '2021-06-27 18:02:33', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'agent', NULL, 'agent@email.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$fZZOPdF3GgyQ6IzVeHAHueeY7aqxdbHC6Ug79gfqO44wUUNM9nN5G', 'agent', NULL, NULL, 'gZB2JnxY7iqqd7cfNFi1lAmAGsoMTL0bUi9QO9RyNUApHCYuLYyZu2Achi7Z', NULL, NULL, '2021-06-27 18:02:45', '2021-08-19 10:50:08', NULL, '1', 'address first', 'post code', NULL, 'city', 'por', NULL, NULL, NULL, '541254', 'my op name'),
(5, NULL, 'new user', 'my famil', 'usernew@email.com', NULL, '123543', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Y.k9xJRvNqUDNrWbY8eazO34fILDXRqvDEI3EjVUFeq0sNi458eh.', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-03 23:20:22', '2021-07-03 23:20:22', NULL, '1', 'My Neh address', 'H8R3T3', NULL, 'neh city', 'QC', NULL, NULL, NULL, NULL, NULL),
(7, 1, 'new edit', NULL, 'agent1@email.com', NULL, '43211234', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$fZZOPdF3GgyQ6IzVeHAHueeY7aqxdbHC6Ug79gfqO44wUUNM9nN5G', 'agent', NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:18:18', '2021-08-21 04:55:40', NULL, '1', 'new agent address', '543ert', NULL, 'agent city', 'por', NULL, NULL, NULL, '4321', 'op name'),
(8, NULL, 'another', NULL, 'another@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 05:08:44', '2021-08-01 05:08:44', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 'testesr123', NULL, 'testesr@testes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 05:21:38', '2021-08-01 05:21:38', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 'newe teste', NULL, 'tester@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-01 05:29:52', '2021-08-01 05:29:52', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 'user111', NULL, 'user111@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-08 10:19:14', '2021-08-08 10:19:14', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 'tester123', NULL, 'tester123@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$oRtLc/X765LCs8TorJ5JWeY0dfTNdWm5Nn1h3xVwJmiHko3xymRES', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16 04:24:34', '2021-08-16 04:24:34', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 'eeeeee', NULL, 'testesreee@eee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wwwwwwwww', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16 04:39:16', '2021-08-16 04:39:16', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 'eeeeee', NULL, 'testesreee@eee.cpm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wwwwwwwww', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16 04:46:39', '2021-08-16 04:46:39', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 'yaser', NULL, 'yaser@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123456789', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16 05:10:05', '2021-08-16 05:10:05', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 'yasser111', 'mohmmadi', 'yasser_kachall@email.com', NULL, '7896542123', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$vc/Ukml1dNbJP57FixFXdO4qcPj19Scvsp/Vw5DP3PG0QXTPcalqu', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16 05:16:22', '2021-08-21 04:38:00', NULL, '1', 'maskan mehr', '7854eedd12', NULL, 'nehbandan', 'khor', NULL, NULL, NULL, NULL, NULL),
(19, NULL, 'zeynab', 'mohmmadi', 'zeynab@test', NULL, '987555222', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$PRzWu2G5w5r3o2YNeMr8Zex2DHMdJubyPBOxei3Uz3Vth520wTUTq', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-21 04:46:19', '2021-08-21 04:46:19', NULL, '1', 'maskan mehr', '987456fff', NULL, 'nehbandan', 'khor', NULL, NULL, NULL, NULL, NULL),
(20, NULL, 'new user', 'my famil', 'agentee@email.com', NULL, '11221122', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tzPBDzrQeFj5C9qZ8X6ZDe4vMltTYhfkCDzQEYN5/Gc2Iz0CepA5q', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-21 04:48:29', '2021-08-21 04:48:29', NULL, '1', 'address neh-r', 'H7V2V2', NULL, 'awda', 'test', NULL, NULL, NULL, NULL, NULL),
(21, 1, 'owner', NULL, 'owner@test', NULL, '7744112369', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$J2IElhkaHtidmx9FU0pEKu5zxC6J3/3tyEEAYbRE8QA0gfmFci7By', 'agent', NULL, NULL, NULL, NULL, NULL, '2021-08-21 04:57:27', '2021-08-21 09:06:34', NULL, '0', 'address tester', '987456321', NULL, 'city', 'iran', NULL, NULL, NULL, '741258963', 'salam'),
(22, NULL, 'name', 'tester ', 'user3@email.com', NULL, '3322113', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$AmnLUdMR6k9pwbzhwO7YlOTivAhqQPfq2L4UESgsKyb7KaWqjfKpG', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 06:04:55', '2021-08-26 06:04:55', NULL, '1', 'maskan mehr', '7477', 'nehtech', 'neh', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_mailboxes`
--

CREATE TABLE `user_mailboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renewal_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailbox_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'personal, personal_plus, business, corporation',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `box_id` bigint(20) UNSIGNED NOT NULL,
  `mailbox_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1:confirmed, 0:new request, 2:not confirmed',
  `key_status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renewal_alert_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `prevent_display_alert_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mailbox_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'suspended, terminated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_mailboxes`
--

INSERT INTO `user_mailboxes` (`id`, `customer_1`, `customer_2`, `customer_3`, `renewal_date`, `mailbox_type`, `user_id`, `box_id`, `mailbox_type_id`, `created_at`, `updated_at`, `tracking_code`, `photo1`, `photo2`, `confirm_status`, `key_status`, `renewal_alert_status`, `prevent_display_alert_status`, `mailbox_status`) VALUES
(55, 'sefsefad', '', '', '2021-08-14 11:37:00', 'personal_plus', 1, 3935, 1, '2021-08-06 05:52:53', '2021-08-14 13:13:00', '680702', '8e0bdb950879e8080a733c7861f494dc', '174f55f3b9237c08de86e9afbf1b8225', '1', NULL, '0', '0', 'terminated'),
(56, 'sefsefs', '', '', '2021-08-14 11:37:00', 'personal', 1, 3935, 1, '2021-08-07 08:48:26', '2021-08-14 13:13:00', '997904', '5a78f682e92326be86f5f9fde27cd434', 'fbfbd45d5868d5f0c9884de8477d6554', '0', NULL, '0', '0', 'terminated'),
(57, 'sefsefad', '', '', '2021-08-14 11:37:00', 'personal', 1, 3935, 1, '2021-08-07 08:49:36', '2021-08-14 13:13:00', '543935', '92d55173c645000296d30b7c06b111ca', 'a49b1c44f3c22e6208ce509fec76105e', '0', NULL, '0', '0', 'terminated'),
(58, 'sesfsefsesefsef', '', '', '2021-08-14 11:37:00', 'personal', 1, 3952, 2, '2021-08-08 01:06:15', '2021-08-14 13:13:00', '', NULL, NULL, '2', NULL, '0', '0', 'terminated'),
(59, 'sefsefad', '', '', '2021-08-14 11:37:00', 'personal', 1, 3936, 1, '2021-08-08 09:05:53', '2021-08-14 13:13:00', '746728', 'e502d83d239cebdb4e0b6e040085fa48', '0889db7e54f5319f930a9c82be5cab70', '0', NULL, '0', '0', 'terminated'),
(60, 'testesr', '', '', '2021-08-14 11:37:00', 'personal', 1, 6293, 1, '2021-08-08 10:19:14', '2021-08-14 13:13:00', '883192', NULL, NULL, '1', NULL, '0', '0', 'terminated'),
(61, 'tester', '', '', '2021-08-14 11:37:00', 'business', 5, 6294, 1, '2021-08-08 10:19:14', '2021-08-14 13:13:00', '507007', NULL, NULL, '1', NULL, '0', '0', 'terminated'),
(62, 'user111', '', '', '2021-08-14 11:37:00', 'personal', 12, 6295, 1, '2021-08-08 10:19:15', '2021-08-14 13:13:00', '405081', NULL, NULL, '1', NULL, '0', '0', 'terminated'),
(63, 'testesr', '', '', '2021-08-14 11:37:00', 'personal', 1, 3943, 2, '2021-08-09 08:53:21', '2021-08-14 13:13:00', '437204', '578c62954d1f5f6ad7607c15a7097db7', 'af66e6f5d4611cd9936662c95aaa433b', '0', '1', '0', '0', 'terminated'),
(64, 'sefsefad', '', '', '2021-08-14 11:37:00', 'personal', 1, 3942, 1, '2021-08-09 09:37:50', '2021-08-14 13:13:00', '823524', '079dd65e032545a6602492793c9dc34c', 'b09c3e6a1feb661bb2d74fdf59de470d', '0', '1', '0', '0', 'terminated'),
(65, 'sefsefad', '', '', '2021-08-14 11:37:00', 'personal', 1, 3939, 1, '2021-08-09 15:54:58', '2021-08-14 13:13:00', '840378', '9f18b65322c4dfda300e8c879cd06063', 'e7bbc93e184c3434e17064db9b40165d', '0', '1', '0', '0', 'terminated'),
(66, 'testesr', '', '', '2021-08-14 11:37:00', 'personal_plus', 1, 3934, 1, '2021-08-11 04:51:46', '2021-08-14 13:13:00', '628280', '543b54e9a313a54e1706ce282fb4bc81.jpg', '4b52788c8e501fb5e871c4efc3867586.png', '0', '1', '0', '1', 'terminated'),
(67, 'sefsefad', '', '', '2021-08-14 11:37:00', 'business', 1, 6302, 1, '2021-08-13 11:31:32', '2021-08-14 13:13:00', '551406', '576dfeb9463ddd34b4712268ff343980.png', '576dfeb9463ddd34b4712268ff343980.png', '0', '1', '0', '0', 'terminated'),
(68, 'sefsefad', '', '', '2021-08-14 11:37:00', 'personal_plus', 1, 6301, 1, '2021-08-13 11:43:26', '2021-08-14 13:13:00', '275265', 'adc02adc75b7b0480a4ba01955ca3ccc.png', '79954b956e91633df9106946e4399cb2.png', '0', '1', '0', '0', NULL),
(69, 'sefsefad', '', '', '2021-08-14 11:37:00', 'business', 1, 6300, 1, '2021-08-13 11:54:42', '2021-08-14 13:13:00', '765140', '6cb9de466d6488f0eec886f493e41dbb.png', '17c712a19e74a9ec11d524c4154c575c.png', '0', '1', '0', '0', NULL),
(70, 'sefsefad', '', '', '2021-08-14 08:01:00', 'personal_plus', 1, 6299, 1, '2021-08-13 11:56:51', '2021-08-14 13:13:00', '213336', 'ffb05f040cf258beea1d5a1750f05e43.png', '189fd7df2c6a068784fcc8dcc13f38d9.png', '0', '1', '0', '0', NULL),
(71, 'testesr', '', '', '2022-08-14 18:02:00', 'business', 1, 6298, 1, '2021-08-13 11:58:42', '2021-08-18 02:19:30', '999335', 'e29b32fd3fc435c144ccb410015ab87e.png', 'f1249a8016b9d6a941214ef657170c47.png', '1', '1', '0', '0', NULL),
(72, 'tester123', '', '', '2022-08-16 08:54:34', 'business', 13, 6353, 1, '2021-08-16 04:24:34', '2021-08-16 04:24:34', '634036', NULL, NULL, '1', NULL, '0', '0', NULL),
(73, 'tester321', '', '', '2022-08-16 09:16:39', 'business', 16, 6362, 1, '2021-08-16 04:46:39', '2021-08-16 04:46:39', '218591', NULL, NULL, '1', NULL, '0', '0', NULL),
(74, 'sefsefsd', '', '', '2023-08-16 09:17:09', 'personal_plus', 1, 6361, 3, '2021-08-16 04:47:09', '2021-08-16 04:47:09', '113723', NULL, NULL, '1', NULL, '0', '0', NULL),
(75, 'tester', '', '', '2022-08-16 09:40:05', 'personal_plus', 17, 6360, 1, '2021-08-16 05:10:05', '2021-08-16 05:10:05', '569757', NULL, NULL, '1', NULL, '0', '0', NULL),
(76, 'yasser', '', '', '2027-08-16 09:46:22', 'personal_plus', 18, 6359, 2, '2021-08-16 05:16:22', '2021-08-16 05:16:22', '392376', NULL, NULL, '1', NULL, '0', '0', NULL),
(77, 'testesr', '', '', '2022-08-18 09:41:28', 'corporation', 1, 6358, 1, '2021-08-18 05:11:28', '2021-08-18 05:11:28', '936412', NULL, NULL, '1', NULL, '0', '0', NULL),
(78, 'tester', '', '', '2022-08-18 13:52:19', 'corporation', 1, 6357, 1, '2021-08-18 09:22:19', '2021-08-18 09:22:19', '482955', NULL, NULL, '1', '0', '0', '0', NULL),
(79, 'testr', '', '', '2022-08-18 13:53:08', 'personal_plus', 1, 6356, 1, '2021-08-18 09:23:08', '2021-08-18 09:23:08', '868764', NULL, NULL, '1', '1', '0', '0', NULL),
(80, 'tester', '', '', '2022-08-18 14:20:02', 'personal', 1, 6383, 1, '2021-08-18 09:50:02', '2021-08-18 09:50:02', '680876', NULL, NULL, '1', '1', '0', '0', NULL),
(81, 'testesr', '', '', '2022-08-21 16:51:48', 'personal', 1, 3935, 1, '2021-08-21 12:21:48', '2021-08-21 12:21:48', '229074', 'a20cc741edef60fdfcae1a4358ccb4ed.png', '800a498211297906fe5e360f1727200c.jpg', '0', '1', '0', '0', NULL),
(82, 'tester', '', '', '2022-08-21 16:58:43', 'personal_plus', 1, 6392, 1, '2021-08-21 12:28:43', '2021-08-21 12:32:00', '703751', '12f7cbfba47400afee60f13a318a9d14.jpg', '319dd8ddedc389b679f53f0547fc74f4.png', '1', '1', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `relation_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` int(10) UNSIGNED NOT NULL,
  `has` tinyint(1) NOT NULL,
  `operator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'successful|unsuccessful',
  `admin_fail_msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_check_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `invoice_id`, `transaction_id`, `status`, `admin_fail_msg`, `admin_check_status`, `created_at`, `updated_at`) VALUES
(10, 21, NULL, NULL, NULL, '0', '2021-07-14 10:05:06', '2021-07-14 10:05:06'),
(11, 24, 165, 'successful', NULL, '1', '2021-08-15 02:04:01', '2021-08-21 04:51:58'),
(12, 32, NULL, NULL, NULL, '0', '2021-08-22 03:03:23', '2021-08-22 03:03:23'),
(13, 29, NULL, NULL, NULL, '0', '2021-08-22 04:56:22', '2021-08-22 04:56:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_books`
--
ALTER TABLE `address_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_services`
--
ALTER TABLE `agent_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_services_agent_id_index` (`agent_id`);

--
-- Indexes for table `bank_info`
--
ALTER TABLE `bank_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_info_user_id_index` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_id_index` (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_id_index` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_agent_id_index` (`agent_id`);

--
-- Indexes for table `mailboxes`
--
ALTER TABLE `mailboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailboxes_agent_id_index` (`agent_id`);

--
-- Indexes for table `mailbox_prices`
--
ALTER TABLE `mailbox_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailbox_prices_agent_id_index` (`agent_id`);

--
-- Indexes for table `mailbox_types`
--
ALTER TABLE `mailbox_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailbox_types_agent_id_index` (`agent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_envelop`
--
ALTER TABLE `order_envelop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_envelop_tracking_code_unique` (`tracking_code`),
  ADD KEY `order_envelop_user_id_index` (`user_id`);

--
-- Indexes for table `order_faxing`
--
ALTER TABLE `order_faxing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_faxing_agent_id_index` (`agent_id`),
  ADD KEY `order_faxing_user_id_index` (`user_id`);

--
-- Indexes for table `order_parcel`
--
ALTER TABLE `order_parcel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_parcel_tracking_code_unique` (`tracking_code`),
  ADD KEY `order_parcel_user_id_index` (`user_id`);

--
-- Indexes for table `order_printing`
--
ALTER TABLE `order_printing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_printing_agent_id_index` (`agent_id`),
  ADD KEY `order_printing_user_id_index` (`user_id`);

--
-- Indexes for table `order_scanning`
--
ALTER TABLE `order_scanning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_scanning_agent_id_index` (`agent_id`),
  ADD KEY `order_scanning_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_info_user_id_index` (`user_id`);

--
-- Indexes for table `percentage_rate_systems`
--
ALTER TABLE `percentage_rate_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_operator_id_foreign` (`operator_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_id_index` (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temp_user_id_index` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_parcel_id_index` (`parcel_id`),
  ADD KEY `transactions_envelop_id_index` (`envelop_id`),
  ADD KEY `transactions_faxing_id_index` (`faxing_id`),
  ADD KEY `transactions_printing_id_index` (`printing_id`),
  ADD KEY `transactions_scanning_id_index` (`scanning_id`),
  ADD KEY `transactions_agent_id_index` (`agent_id`),
  ADD KEY `transactions_user_id_index` (`user_id`),
  ADD KEY `transactions_user_mailbox_id_index` (`user_mailbox_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_mailboxes`
--
ALTER TABLE `user_mailboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_mailboxes_user_id_index` (`user_id`),
  ADD KEY `user_mailboxes_box_id_index` (`box_id`),
  ADD KEY `user_mailboxes_mailbox_type_id_index` (`mailbox_type_id`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_metas_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_permissions_user_id_foreign` (`user_id`),
  ADD KEY `user_permissions_operator_id_foreign` (`operator_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_invoice_id_index` (`invoice_id`),
  ADD KEY `withdraws_transaction_id_index` (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_books`
--
ALTER TABLE `address_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agent_services`
--
ALTER TABLE `agent_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bank_info`
--
ALTER TABLE `bank_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mailboxes`
--
ALTER TABLE `mailboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6393;

--
-- AUTO_INCREMENT for table `mailbox_prices`
--
ALTER TABLE `mailbox_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mailbox_types`
--
ALTER TABLE `mailbox_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_envelop`
--
ALTER TABLE `order_envelop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_faxing`
--
ALTER TABLE `order_faxing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_parcel`
--
ALTER TABLE `order_parcel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `order_printing`
--
ALTER TABLE `order_printing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_scanning`
--
ALTER TABLE `order_scanning`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `percentage_rate_systems`
--
ALTER TABLE `percentage_rate_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_mailboxes`
--
ALTER TABLE `user_mailboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_services`
--
ALTER TABLE `agent_services`
  ADD CONSTRAINT `agent_services_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_info`
--
ALTER TABLE `bank_info`
  ADD CONSTRAINT `bank_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mailboxes`
--
ALTER TABLE `mailboxes`
  ADD CONSTRAINT `mailboxes_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mailbox_prices`
--
ALTER TABLE `mailbox_prices`
  ADD CONSTRAINT `mailbox_prices_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mailbox_types`
--
ALTER TABLE `mailbox_types`
  ADD CONSTRAINT `mailbox_types_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_envelop`
--
ALTER TABLE `order_envelop`
  ADD CONSTRAINT `order_envelop_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_faxing`
--
ALTER TABLE `order_faxing`
  ADD CONSTRAINT `order_faxing_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_faxing_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_parcel`
--
ALTER TABLE `order_parcel`
  ADD CONSTRAINT `order_parcel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_printing`
--
ALTER TABLE `order_printing`
  ADD CONSTRAINT `order_printing_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_printing_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_scanning`
--
ALTER TABLE `order_scanning`
  ADD CONSTRAINT `order_scanning_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_scanning_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD CONSTRAINT `payment_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `temp`
--
ALTER TABLE `temp`
  ADD CONSTRAINT `temp_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_envelop_id_foreign` FOREIGN KEY (`envelop_id`) REFERENCES `order_envelop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_faxing_id_foreign` FOREIGN KEY (`faxing_id`) REFERENCES `order_faxing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_parcel_id_foreign` FOREIGN KEY (`parcel_id`) REFERENCES `order_parcel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_printing_id_foreign` FOREIGN KEY (`printing_id`) REFERENCES `order_printing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_scanning_id_foreign` FOREIGN KEY (`scanning_id`) REFERENCES `order_scanning` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_mailbox_id_foreign` FOREIGN KEY (`user_mailbox_id`) REFERENCES `user_mailboxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_mailboxes`
--
ALTER TABLE `user_mailboxes`
  ADD CONSTRAINT `user_mailboxes_box_id_foreign` FOREIGN KEY (`box_id`) REFERENCES `mailboxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_mailboxes_mailbox_type_id_foreign` FOREIGN KEY (`mailbox_type_id`) REFERENCES `mailbox_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_mailboxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD CONSTRAINT `user_metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `withdraws_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
