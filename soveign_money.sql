-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 12:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soveign_money`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_information`
--

CREATE TABLE `billing_information` (
  `id` int(10) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `country` varchar(127) NOT NULL,
  `adress1` varchar(127) NOT NULL,
  `adress2` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip_code` varchar(127) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_information`
--

INSERT INTO `billing_information` (`id`, `first_name`, `last_name`, `country`, `adress1`, `adress2`, `city`, `state`, `zip_code`) VALUES
(1, 'gfdgfdg', 'gfdgfdg', 'US', 'fgfgfdg', 'dgfdgfdgfd', 'fdgfdgf', 'fdgfgfd', 'fdgfdgfdg'),
(2, 'gfdgfdg', 'gfdgfdg', 'US', 'fgfgfdg', 'dgfdgfdgfd', 'fdgfdgf', 'fdgfgfd', 'fdgfdgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(127) NOT NULL,
  `order_no` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `order_no`) VALUES
(17, 'Fall', 1),
(18, 'Summer', 2),
(19, 'Winter ', 3),
(20, 'Spring ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People''s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(10) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `code`, `name`, `symbol`) VALUES
(1, 'ALL', 'Leke', 'Lek'),
(2, 'USD', 'Dollars', '$'),
(3, 'AFN', 'Afghanis', '?'),
(4, 'ARS', 'Pesos', '$'),
(5, 'AWG', 'Guilders', 'ƒ'),
(6, 'AUD', 'Dollars', '$'),
(7, 'AZN', 'New Manats', '???'),
(8, 'BSD', 'Dollars', '$'),
(9, 'BBD', 'Dollars', '$'),
(10, 'BYR', 'Rubles', 'p.'),
(11, 'EUR', 'Euro', '€'),
(12, 'BZD', 'Dollars', 'BZ$'),
(13, 'BMD', 'Dollars', '$'),
(14, 'BOB', 'Bolivianos', '$b'),
(15, 'BAM', 'Convertible Marka', 'KM'),
(16, 'BWP', 'Pula', 'P'),
(17, 'BGN', 'Leva', '??'),
(18, 'BRL', 'Reais', 'R$'),
(19, 'GBP', 'Pounds', '£'),
(20, 'BND', 'Dollars', '$'),
(21, 'KHR', 'Riels', '?'),
(22, 'CAD', 'Dollars', '$'),
(23, 'KYD', 'Dollars', '$'),
(24, 'CLP', 'Pesos', '$'),
(25, 'CNY', 'Yuan Renminbi', '¥'),
(26, 'COP', 'Pesos', '$'),
(27, 'CRC', 'Colón', '?'),
(28, 'HRK', 'Kuna', 'kn'),
(29, 'CUP', 'Pesos', '?'),
(30, 'CZK', 'Koruny', 'K?'),
(31, 'DKK', 'Kroner', 'kr'),
(32, 'DOP ', 'Pesos', 'RD$'),
(33, 'XCD', 'Dollars', '$'),
(34, 'EGP', 'Pounds', '£'),
(35, 'SVC', 'Colones', '$'),
(36, 'FKP', 'Pounds', '£'),
(37, 'FJD', 'Dollars', '$'),
(38, 'GHC', 'Cedis', '¢'),
(39, 'GIP', 'Pounds', '£'),
(40, 'GTQ', 'Quetzales', 'Q'),
(41, 'GGP', 'Pounds', '£'),
(42, 'GYD', 'Dollars', '$'),
(43, 'HNL', 'Lempiras', 'L'),
(44, 'HKD', 'Dollars', '$'),
(45, 'HUF', 'Forint', 'Ft'),
(46, 'ISK', 'Kronur', 'kr'),
(47, 'INR', 'Rupees', 'Rp'),
(48, 'IDR', 'Rupiahs', 'Rp'),
(49, 'IRR', 'Rials', '?'),
(50, 'IMP', 'Pounds', '£'),
(51, 'ILS', 'New Shekels', '?'),
(52, 'JMD', 'Dollars', 'J$'),
(53, 'JPY', 'Yen', '¥'),
(54, 'JEP', 'Pounds', '£'),
(55, 'KZT', 'Tenge', '??'),
(56, 'KPW', 'Won', '?'),
(57, 'KRW', 'Won', '?'),
(58, 'KGS', 'Soms', '??'),
(59, 'LAK', 'Kips', '?'),
(60, 'LVL', 'Lati', 'Ls'),
(61, 'LBP', 'Pounds', '£'),
(62, 'LRD', 'Dollars', '$'),
(63, 'CHF', 'Switzerland Francs', 'CHF'),
(64, 'LTL', 'Litai', 'Lt'),
(65, 'MKD', 'Denars', '???'),
(66, 'MYR', 'Ringgits', 'RM'),
(67, 'MUR', 'Rupees', '?'),
(68, 'MXN', 'Pesos', '$'),
(69, 'MNT', 'Tugriks', '?'),
(70, 'MZN', 'Meticais', 'MT'),
(71, 'NAD', 'Dollars', '$'),
(72, 'NPR', 'Rupees', '?'),
(73, 'ANG', 'Guilders', 'ƒ'),
(74, 'NZD', 'Dollars', '$'),
(75, 'NIO', 'Cordobas', 'C$'),
(76, 'NGN', 'Nairas', '?'),
(77, 'NOK', 'Krone', 'kr'),
(78, 'OMR', 'Rials', '?'),
(79, 'PKR', 'Rupees', '?'),
(80, 'PAB', 'Balboa', 'B/.'),
(81, 'PYG', 'Guarani', 'Gs'),
(82, 'PEN', 'Nuevos Soles', 'S/.'),
(83, 'PHP', 'Pesos', 'Php'),
(84, 'PLN', 'Zlotych', 'z?'),
(85, 'QAR', 'Rials', '?'),
(86, 'RON', 'New Lei', 'lei'),
(87, 'RUB', 'Rubles', '???'),
(88, 'SHP', 'Pounds', '£'),
(89, 'SAR', 'Riyals', '?'),
(90, 'RSD', 'Dinars', '???.'),
(91, 'SCR', 'Rupees', '?'),
(92, 'SGD', 'Dollars', '$'),
(93, 'SBD', 'Dollars', '$'),
(94, 'SOS', 'Shillings', 'S'),
(95, 'ZAR', 'Rand', 'R'),
(96, 'LKR', 'Rupees', '?'),
(97, 'SEK', 'Kronor', 'kr'),
(98, 'SRD', 'Dollars', '$'),
(99, 'SYP', 'Pounds', '£'),
(100, 'TWD', 'New Dollars', 'NT$'),
(101, 'THB', 'Baht', '?'),
(102, 'TTD', 'Dollars', 'TT$'),
(103, 'TRY', 'Lira', 'TL'),
(104, 'TRL', 'Liras', '£'),
(105, 'TVD', 'Dollars', '$'),
(106, 'UAH', 'Hryvnia', '?'),
(107, 'UYU', 'Pesos', '$U'),
(108, 'UZS', 'Sums', '??'),
(109, 'VEF', 'Bolivares Fuertes', 'Bs'),
(110, 'VND', 'Dong', '?'),
(111, 'YER', 'Rials', '?'),
(112, 'ZWD', 'Zimbabwe Dollars', 'Z$');

-- --------------------------------------------------------

--
-- Table structure for table `dealoftheday`
--

CREATE TABLE `dealoftheday` (
  `id` int(10) NOT NULL,
  `products_id` int(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealoftheday`
--

INSERT INTO `dealoftheday` (`id`, `products_id`, `status`) VALUES
(1, 11, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `currency_id` int(10) DEFAULT NULL,
  `transactionid` varchar(127) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `users_id`, `subject`, `description`, `currency_id`, `transactionid`, `amount`, `refference`, `date_time_created`, `date_time_updated`) VALUES
(1, 10, 'deposited from card', 'deposited from card', 2, '5T0575890Y994470R', '1.00', '4764290997745315', '2018-11-15 07:23:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) NOT NULL,
  `name` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `roles` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `roles`) VALUES
(10, 'à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦•', 'assign_task,data_approve,issue_report,super'),
(11, 'à¦‰à¦ªà¦ªà¦°à¦¿à¦šà¦¾à¦²à¦•', 'assign_task, data_approve'),
(12, 'à¦¸à¦¿à¦¨à¦¿à§Ÿà¦° à¦•à§‡à¦®à¦¿à¦¸à§à¦Ÿ', 'coding, lab_data, prepare_report, report_preparation, sample_collection, standard'),
(13, 'à¦œà§à¦¨à¦¿à§Ÿà¦° à¦•à§‡à¦®à¦¿à¦¸à§à¦Ÿ', 'lab_data, prepare_report, report_preparation, sample_collection'),
(15, 'à¦¸à¦¹à¦•à¦¾à¦°à§€ à¦¬à¦¾à§Ÿà§‹à¦•à§‡à¦®à¦¿à¦¸à§à¦Ÿ', 'lab_data, prepare_report, report_preparation, sample_collection'),
(16, 'à¦—à¦¬à§‡à¦·à¦¨à¦¾à¦—à¦¾à¦° à¦¸à¦¹à¦•à¦¾à¦°à§€', 'sample_collection'),
(17, 'à¦¨à¦®à§à¦¨à¦¾ à¦¸à¦‚à¦—à§à¦°à¦¹à¦•à¦¾à¦°à§€', 'sample_collection'),
(18, 'à¦²à§à¦¯à¦¾à¦¬ à¦à¦Ÿà§‡à¦¨à¦¡à§‡à¦¨à§à¦¡à¦Ÿ', 'application'),
(19, 'admin', 'application, assign_task, coding, data_approve, issue_report, lab_data, prepare_report, report_preparation, sample_collection, standard, super');

-- --------------------------------------------------------

--
-- Table structure for table `escrow`
--

CREATE TABLE `escrow` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `currency_id` int(10) DEFAULT NULL,
  `amount` double(10,2) DEFAULT '0.00',
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invite_friends`
--

CREATE TABLE `invite_friends` (
  `id` int(10) NOT NULL,
  `from_users_id` int(10) DEFAULT NULL,
  `invited_email` varchar(127) DEFAULT NULL,
  `sending_date_time` datetime DEFAULT NULL,
  `joining_date_time` datetime DEFAULT NULL,
  `joining_status` enum('pending','completed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `orders_id` int(10) NOT NULL,
  `os0` varchar(127) NOT NULL,
  `item_name` varchar(127) NOT NULL,
  `item_number` varchar(127) NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `orders_id`, `os0`, `item_name`, `item_number`, `quantity`, `amount`) VALUES
(9, 3, 'AKC Self Warming Thermal Pet Bed, Brown, $40 Value!', 'Home / Garden', '65696', 1, '2.99'),
(6, 3, 'Fino FT64 T.V. Tilt Mount with HDMI Cable $148.00 Value!', 'Furniture', '88001', 1, '5.29'),
(7, 3, 'FJORDS SCANSIT 110 LEATHER RECLINER AND OTTOMAN  LARGE $2595 value', 'Furniture', '67981', 1, '29.99'),
(8, 3, 'Tike Tech Double Stroller Car Seat Adapter, $70 Value!', 'Home / Garden', '57959', 1, '2.99'),
(10, 4, 'Juno Lighting Trac-Master Quick Jack Low Profile 12V Electronic Transformer', 'Home / Garden', '57629', 1, '2.99');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `currency_id` int(10) DEFAULT NULL,
  `debit` decimal(10,2) DEFAULT '0.00',
  `credit` decimal(10,2) DEFAULT NULL,
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loans_request`
--

CREATE TABLE `loans_request` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `action_by_users_id` int(10) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `currency_id` int(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL,
  `status` enum('accepted','rejected','pending') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `my_currency`
--

CREATE TABLE `my_currency` (
  `id` int(10) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(10) NOT NULL,
  `name` varchar(127) NOT NULL,
  `content` text NOT NULL,
  `date_time_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `products_id` int(10) DEFAULT NULL,
  `users_id` int(10) NOT NULL,
  `shipping_address_id` int(10) NOT NULL,
  `billing_information_id` int(10) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL,
  `delivery_status` enum('escrow','pending','completed','return') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `products_id`, `users_id`, `shipping_address_id`, `billing_information_id`, `shipping_cost`, `total_amount`, `date_created`, `delivery_status`) VALUES
(3, NULL, 9, 1, 1, '0.00', '41.26', '2013-08-29 02:08:37', 'pending'),
(4, NULL, 9, 2, 2, '0.00', '2.99', '2013-08-29 02:45:28', 'return');

-- --------------------------------------------------------

--
-- Table structure for table `popular_products`
--

CREATE TABLE `popular_products` (
  `id` int(10) NOT NULL,
  `products_id` int(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `popular_products`
--

INSERT INTO `popular_products` (`id`, `products_id`, `status`) VALUES
(2, 11, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(10) NOT NULL,
  `content` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `users_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `model` varchar(64) NOT NULL,
  `title` varchar(127) NOT NULL,
  `product_condition` enum('new','used') NOT NULL,
  `sale_type` enum('retail','wholesale') NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `product_details` text NOT NULL,
  `size` varchar(127) NOT NULL,
  `weight` varchar(127) NOT NULL,
  `color` varchar(127) NOT NULL,
  `company_name` varchar(127) NOT NULL,
  `agreement_year` varchar(64) NOT NULL,
  `made_in` varchar(64) NOT NULL,
  `shipping_desc` text NOT NULL,
  `delivery_desc` text NOT NULL,
  `payment_desc` text NOT NULL,
  `return_desc` text NOT NULL,
  `file_image1` varchar(127) NOT NULL,
  `file_image2` varchar(127) NOT NULL,
  `product_type` enum('normal','hot','premium') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `users_id`, `category_id`, `model`, `title`, `product_condition`, `sale_type`, `quantity`, `price`, `discount`, `shipping_cost`, `description`, `product_details`, `size`, `weight`, `color`, `company_name`, `agreement_year`, `made_in`, `shipping_desc`, `delivery_desc`, `payment_desc`, `return_desc`, `file_image1`, `file_image2`, `product_type`) VALUES
(31, 13, 41, '', '655708-B21 500GB 6G SATA 7.2k 2.5in SC MDL Hard Drive with Price', 'new', 'wholesale', 1, '7000.00', '0.00', '0.00', '', '', '', '2gr', '', 'Best Technologies', '', 'chaina', '', '', '', '', 'products_images/31_1_avi212.jpg', 'products_images/31_2_avi212.jpg', 'normal'),
(26, 11, 31, '', 'Test', 'new', 'retail', 1, '111111.00', '0.00', '0.00', 'A big product', '', '3', '4', 'w', 'KKKKKKKKKKKK', '', 'Cccccccccc', '', '', '', '', 'products_images/26_transmission_gear.jpg_220x220.jpg', '', 'hot'),
(25, 11, 31, '', 'hart product', 'new', 'retail', 0, '30000.00', '0.00', '0.00', '', '', '', '', '', 'Futhhhh vhlj; khglj;k', '', 'chaina', '', '', '', '', 'products_images/25_new-brand-car-alloy-wheel-rim-for.jpg_220x220.jpg', 'products_images/25_new-brand-car-alloy-wheel-rim-for.jpg_220x220.jpg', 'hot'),
(29, 0, 0, '', 'Hot Sale Frozen Mango Meat Stick For Sale With High Quality, Mango', 'new', 'wholesale', 1, '0.00', '0.00', '0.00', '', '', '', '', '', 'Save Foods Limited', '', 'Bangladesh', '', '', '', '', 'products_images/29_fresh-mango-good-quality-competitive-price.jpg_220x220.jpg', '', 'normal'),
(24, 11, 0, '', 'Kona', 'new', 'retail', 1, '18000.00', '0.00', '0.00', '', '', '', '', 'black', 'vigy', '', 'america', '', '', '', '', 'products_images/24_1_avi212.jpg', 'products_images/24_2_avi212.jpg', 'normal'),
(27, 13, 39, '', 'BEST PRODUCT', 'new', 'wholesale', 1, '0.00', '0.00', '0.00', '', '', '4', '', 'W', 'Kajol brother Limited-2', '', 'BD', '', '', '', '', 'products_images/27_cheap_winter_jacket_for_girls.jpg_220x220.jpg', '', 'normal'),
(30, 13, 49, '', ' Hot Sale Frozen Mango Meat Stick For Sale With High Quality, Mango ', 'new', 'retail', 1, '60.00', '0.00', '0.00', 'ecommend matching suppliers if this supplier doesnâ€™t contact me on Message Center within 24 ', '', '', '', '', 'Save Foods Limited', '', 'Bangladesh', '', '', '', '', 'products_images/30_fresh-mango-good-quality-competitive-price.jpg_220x220.jpg', '', 'normal'),
(32, 13, 41, 'Rokon', 'tt', 'new', 'wholesale', 0, '0.00', '0.00', '0.00', '1, Kamal\r\n2, Kajol\r\n3, Hakim\r\nGood Number Place', '1, Black\r\n2, Goood\r\n3,Samon', '', '', '', 'YYYYYYYYYYYYYYYYYYYYYYYYYYY', '', 'Made in (chaina)', 'Amon\r\n1, voket\r\n2 Ronon\r\n$bazit', '', '', '', 'products_images/32_best-selling-2015-mlc-2-5inch-ssd.jpg_220x220.jpg', '', 'normal'),
(33, 10, 49, '', 'adad', 'new', 'retail', 0, '0.00', '0.00', '0.00', 'ddasd', '', 'asdasdasd', 'asdsad', 'asdsadsad', 'asdsadsa', 'dasdsad', 'sadsad', 'sadasd', 'asdsad', 'dsadsads', 'adasdsad', 'products_images/33_1_avi212.jpg', 'products_images/33_2_avi212.jpg', 'normal'),
(34, 11, 49, '', 'Langra', 'new', 'wholesale', 11, '111.00', '11.00', '11.00', '1, Kamal\r\n2, Shagor\r\n3, khffhjjj\r\n4,hjukjljkdkh\r\n5,ijjikfkfkkek', '1, Kamal\r\n2, Shagor\r\n3, khffhjjj\r\n4,hjukjljkdkh\r\n5,ijjikfkfkkek', 'Langra  Langra  Langra  Langra  ', 'Langra  Langra  Langra  Langra  Langra  Langra  Langra  ', 'Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  ', 'Langra  LLangra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  ', 'LangLangra  Langra  Langra  Langra  Langra  Langra  ', 'Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  ', 'Shipping Desc  Shipping Desc Shipping DescShipping DescShipping DescShipping DescShipping Desc ', 'Delivery Desc Delivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery DescDelivery Desc', 'Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  ', 'Langra  Langra  Langra  Langra  Langra  Langra  Langra  Langra  ', 'products_images/34_1_avi212.jpg', 'products_images/34_2_avi212.jpg', 'premium'),
(35, 15, 49, '5345345', '345345435', 'new', 'retail', 354, '543534.00', '99999999.99', '34535.00', '345345345', '345345345', '345345', '345345345', '345345', '345435', '345345', '535', '355345', '435345', '345345345', '345345', 'products_images/35_pata.jpg', 'products_images/35_pata.jpg', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(1227) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(10) NOT NULL,
  `ship_first_name` varchar(127) NOT NULL,
  `ship_last_name` varchar(127) NOT NULL,
  `ship_adress1` varchar(127) NOT NULL,
  `ship_adress2` varchar(127) NOT NULL,
  `ship_zip_code` varchar(127) NOT NULL,
  `ship_city` varchar(127) NOT NULL,
  `ship_state` varchar(127) NOT NULL,
  `ship_country` varchar(127) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `ship_first_name`, `ship_last_name`, `ship_adress1`, `ship_adress2`, `ship_zip_code`, `ship_city`, `ship_state`, `ship_country`) VALUES
(1, 'gffdgfd', 'gfgfdgfdgfdg', 'dfgdgdgdf', 'gdfgdfgdg', 'dgdgdfg', 'fdgfdgdfgdg', 'dfgdfgdfg', 'gdfgfdg'),
(2, 'gffdgfd', 'gfgfdgfdgfdg', 'dfgdgdgdf', 'gdfgdfgdg', 'dgdgdfg', 'fdgfdgdfgdg', 'dfgdfgdfg', 'gdfgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `signup_bonus`
--

CREATE TABLE `signup_bonus` (
  `id` int(11) NOT NULL,
  `currency_id` int(10) DEFAULT NULL,
  `bonus_amount` decimal(10,2) DEFAULT '0.00',
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slide_images`
--

CREATE TABLE `slide_images` (
  `id` int(10) NOT NULL,
  `order_no` int(10) NOT NULL,
  `title` varchar(127) NOT NULL,
  `file_images` varchar(127) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide_images`
--

INSERT INTO `slide_images` (`id`, `order_no`, `title`, `file_images`, `status`) VALUES
(25, 1, '3323', 'slide_images_images/1_slid1.jpg', 'active'),
(26, 2, '', 'slide_images_images/26_fast-delivery.png', 'active'),
(27, 3, '', 'slide_images_images/27_shipping.png', 'active'),
(28, 1, 'Fantasy baseball', 'slide_images_images/28_hl_building_sip_int_edited-3.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL,
  `status` enum('subscribe','unsubscribe') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

CREATE TABLE `terms_condition` (
  `id` int(10) NOT NULL,
  `content` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `currency_id` int(10) DEFAULT NULL,
  `debit` double(10,2) DEFAULT '0.00',
  `credit` double(10,2) DEFAULT '0.00',
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_fee`
--

CREATE TABLE `transfer_fee` (
  `id` int(11) NOT NULL,
  `currency_id` int(10) DEFAULT NULL,
  `fee_amount` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_funds`
--

CREATE TABLE `transfer_funds` (
  `id` int(10) NOT NULL,
  `from_users_id` int(10) NOT NULL,
  `to_users_id` int(10) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `to_email` varchar(127) DEFAULT NULL,
  `currency_id` int(10) DEFAULT NULL,
  `amount` double(10,2) DEFAULT '0.00',
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `company` varchar(127) NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip` varchar(127) NOT NULL,
  `ABN` varchar(127) DEFAULT NULL,
  `commercial_address` text,
  `passport` varchar(127) DEFAULT NULL,
  `residential_address` text,
  `country_id` varchar(127) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_type` enum('super','staff','client','visitor') NOT NULL,
  `is_merchant` enum('yes','no') DEFAULT 'no',
  `facebook` varchar(256) DEFAULT NULL,
  `linkedin` varchar(256) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `google_plus` varchar(256) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `file_picture`, `company`, `address`, `city`, `state`, `zip`, `ABN`, `commercial_address`, `passport`, `residential_address`, `country_id`, `created_at`, `updated_at`, `user_type`, `is_merchant`, `facebook`, `linkedin`, `twitter`, `google_plus`, `status`) VALUES
(9, 'xx@xx.com', 'xx', 'Mr.', 'Anil', 'kumar', NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, '231', '2011-10-19 00:00:00', '2011-10-19 00:00:00', 'super', 'no', NULL, NULL, NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `currency_id` int(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `coin_type` enum('blockchain','etherium','litecoin') DEFAULT NULL,
  `coin` varchar(256) DEFAULT NULL,
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_request`
--

CREATE TABLE `withdraw_request` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `action_by_users_id` int(10) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `currency_id` int(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `coin_type` enum('blockchain','etherium','litecoin') DEFAULT NULL,
  `coin` varchar(256) DEFAULT NULL,
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL,
  `status` enum('accepted','rejected','pending') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_information`
--
ALTER TABLE `billing_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealoftheday`
--
ALTER TABLE `dealoftheday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escrow`
--
ALTER TABLE `escrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invite_friends`
--
ALTER TABLE `invite_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans_request`
--
ALTER TABLE `loans_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_currency`
--
ALTER TABLE `my_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_products`
--
ALTER TABLE `popular_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_bonus`
--
ALTER TABLE `signup_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_images`
--
ALTER TABLE `slide_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_condition`
--
ALTER TABLE `terms_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_fee`
--
ALTER TABLE `transfer_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_funds`
--
ALTER TABLE `transfer_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_request`
--
ALTER TABLE `withdraw_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_information`
--
ALTER TABLE `billing_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `dealoftheday`
--
ALTER TABLE `dealoftheday`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `escrow`
--
ALTER TABLE `escrow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invite_friends`
--
ALTER TABLE `invite_friends`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loans_request`
--
ALTER TABLE `loans_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `my_currency`
--
ALTER TABLE `my_currency`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `popular_products`
--
ALTER TABLE `popular_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `signup_bonus`
--
ALTER TABLE `signup_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terms_condition`
--
ALTER TABLE `terms_condition`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_fee`
--
ALTER TABLE `transfer_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_funds`
--
ALTER TABLE `transfer_funds`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `withdraw_request`
--
ALTER TABLE `withdraw_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
