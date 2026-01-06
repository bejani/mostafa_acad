-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2025 at 11:45 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvto`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `started_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `finished_at` datetime DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL,
  `duration_seconds` int DEFAULT NULL,
  `question_order` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `quiz_id`, `user_id`, `started_at`, `finished_at`, `score`, `duration_seconds`, `question_order`) VALUES
(109, 15, 4, '2025-11-21 12:00:32', '2025-11-21 12:00:46', 15.00, 14, '[497, 490, 494, 499, 501, 480, 476, 489, 486, 492, 500, 477, 498, 481, 487, 493, 478, 483, 484, 502]'),
(110, 15, 4, '2025-11-21 14:02:23', '2025-11-21 14:02:37', 10.00, 14, '[487, 507, 503, 510, 497, 506, 499, 478, 529, 522, 481, 520, 474, 518, 514, 494, 483, 480, 502, 485]'),
(111, 15, 4, '2025-11-21 14:03:03', '2025-11-21 14:03:18', 15.00, 15, '[480, 510, 489, 522, 523, 496, 525, 485, 520, 492, 503, 500, 524, 507, 508, 511, 506, 501, 474, 504]'),
(112, 16, 4, '2025-11-21 20:32:20', NULL, 0.00, 0, '[536, 539, 543, 547, 532, 540, 548, 546, 535, 537, 545, 542, 534, 550, 533, 541, 549, 544, 538]'),
(113, 16, 4, '2025-11-21 20:32:40', NULL, 0.00, 0, '[546, 542, 537, 548, 541, 532, 550, 549, 544, 545, 539, 538, 536, 547, 535, 533, 534, 543, 540]'),
(114, 16, 4, '2025-11-21 20:32:41', NULL, 0.00, 0, '[537, 539, 545, 549, 533, 536, 540, 544, 541, 546, 543, 547, 548, 535, 534, 538, 542, 532, 550]'),
(115, 16, 4, '2025-11-21 20:32:43', NULL, 0.00, 0, '[534, 532, 537, 540, 536, 545, 549, 535, 546, 547, 550, 533, 541, 539, 543, 538, 544, 548, 542]'),
(116, 16, 4, '2025-11-21 20:32:44', NULL, 0.00, 0, '[546, 534, 532, 533, 550, 541, 535, 544, 545, 538, 547, 539, 540, 537, 549, 542, 548, 536, 543]'),
(117, 16, 4, '2025-11-21 20:32:45', NULL, 0.00, 0, '[542, 538, 548, 536, 550, 544, 532, 535, 543, 539, 546, 541, 545, 540, 534, 537, 549, 533, 547]'),
(118, 16, 4, '2025-11-22 23:07:24', '2025-11-22 23:07:30', 33.33, 6, '[553, 552, 551]'),
(119, 15, 4, '2025-11-23 12:09:09', '2025-11-23 12:09:35', 0.00, 26, '[497, 501, 485, 506, 531, 498, 511, 499, 475, 523, 474, 513, 476, 526, 529, 483, 508, 521, 515, 490]');

-- --------------------------------------------------------

--
-- Table structure for table `attempt_answers`
--

CREATE TABLE `attempt_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `attempt_id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `answer_text` text,
  `selected_option_ids` json DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attempt_answers`
--

INSERT INTO `attempt_answers` (`id`, `attempt_id`, `question_id`, `answer_text`, `selected_option_ids`, `is_correct`) VALUES
(1099, 109, 497, NULL, '[\"2105\"]', 1),
(1100, 109, 490, NULL, '[\"2077\"]', 1),
(1101, 109, 494, NULL, '[null]', 0),
(1102, 109, 499, NULL, '[null]', 0),
(1103, 109, 501, NULL, '[null]', 0),
(1104, 109, 480, NULL, '[null]', 0),
(1105, 109, 476, NULL, '[null]', 0),
(1106, 109, 489, NULL, '[null]', 0),
(1107, 109, 486, NULL, '[null]', 0),
(1108, 109, 492, NULL, '[null]', 0),
(1109, 109, 500, NULL, '[null]', 0),
(1110, 109, 477, NULL, '[null]', 0),
(1111, 109, 498, NULL, '[null]', 0),
(1112, 109, 481, NULL, '[null]', 0),
(1113, 109, 487, NULL, '[null]', 0),
(1114, 109, 493, NULL, '[null]', 0),
(1115, 109, 478, NULL, '[null]', 0),
(1116, 109, 483, NULL, '[null]', 0),
(1117, 109, 484, NULL, '[null]', 0),
(1118, 109, 502, NULL, '[\"2125\"]', 1),
(1119, 110, 487, NULL, '[\"2065\"]', 1),
(1120, 110, 507, NULL, '[null]', 0),
(1121, 110, 503, NULL, '[null]', 0),
(1122, 110, 510, NULL, '[null]', 0),
(1123, 110, 497, NULL, '[null]', 0),
(1124, 110, 506, NULL, '[null]', 0),
(1125, 110, 499, NULL, '[null]', 0),
(1126, 110, 478, NULL, '[null]', 0),
(1127, 110, 529, NULL, '[null]', 0),
(1128, 110, 522, NULL, '[null]', 0),
(1129, 110, 481, NULL, '[null]', 0),
(1130, 110, 520, NULL, '[null]', 0),
(1131, 110, 474, NULL, '[null]', 0),
(1132, 110, 518, NULL, '[null]', 0),
(1133, 110, 514, NULL, '[null]', 0),
(1134, 110, 494, NULL, '[null]', 0),
(1135, 110, 483, NULL, '[null]', 0),
(1136, 110, 480, NULL, '[null]', 0),
(1137, 110, 502, NULL, '[null]', 0),
(1138, 110, 485, NULL, '[\"2057\"]', 1),
(1139, 111, 480, NULL, '[\"2037\"]', 1),
(1140, 111, 510, NULL, '[null]', 0),
(1141, 111, 489, NULL, '[null]', 0),
(1142, 111, 522, NULL, '[null]', 0),
(1143, 111, 523, NULL, '[null]', 0),
(1144, 111, 496, NULL, '[null]', 0),
(1145, 111, 525, NULL, '[null]', 0),
(1146, 111, 485, NULL, '[null]', 0),
(1147, 111, 520, NULL, '[null]', 0),
(1148, 111, 492, NULL, '[null]', 0),
(1149, 111, 503, NULL, '[\"2129\"]', 1),
(1150, 111, 500, NULL, '[null]', 0),
(1151, 111, 524, NULL, '[null]', 0),
(1152, 111, 507, NULL, '[null]', 0),
(1153, 111, 508, NULL, '[null]', 0),
(1154, 111, 511, NULL, '[null]', 0),
(1155, 111, 506, NULL, '[null]', 0),
(1156, 111, 501, NULL, '[null]', 0),
(1157, 111, 474, NULL, '[null]', 0),
(1158, 111, 504, NULL, '[\"2133\"]', 1),
(1159, 118, 553, NULL, '[\"2329\"]', 1),
(1160, 118, 552, NULL, '[\"2326\"]', 0),
(1161, 118, 551, NULL, '[\"2321\"]', 0),
(1162, 119, 497, NULL, '[\"2106\"]', 0),
(1163, 119, 501, NULL, '[\"2122\"]', 0),
(1164, 119, 485, NULL, '[null]', 0),
(1165, 119, 506, NULL, '[null]', 0),
(1166, 119, 531, NULL, '[null]', 0),
(1167, 119, 498, NULL, '[null]', 0),
(1168, 119, 511, NULL, '[null]', 0),
(1169, 119, 499, NULL, '[null]', 0),
(1170, 119, 475, NULL, '[null]', 0),
(1171, 119, 523, NULL, '[null]', 0),
(1172, 119, 474, NULL, '[null]', 0),
(1173, 119, 513, NULL, '[null]', 0),
(1174, 119, 476, NULL, '[\"2023\"]', 0),
(1175, 119, 526, NULL, '[\"2223\"]', 0),
(1176, 119, 529, NULL, '[null]', 0),
(1177, 119, 483, NULL, '[null]', 0),
(1178, 119, 508, NULL, '[null]', 0),
(1179, 119, 521, NULL, '[null]', 0),
(1180, 119, 515, NULL, '[null]', 0),
(1181, 119, 490, NULL, '[null]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'عمومی',
  `path` text,
  `link_url` text,
  `description` text,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `type`, `category`, `path`, `link_url`, `description`, `is_published`, `created_by`, `created_at`, `views`) VALUES
(5, 'نحوه انتقال از اسلاید به اسلاید دیگر', 'video', 'PowerPoint', '/uploads/videos/f_690e16493f010.mp4', NULL, 'نحوه درج فیلم و عکس و صوت و معادله و سمبل در اسلاید و  همچنین نحوه افکت گذاری برای انتقال از اسلایدی به اسلاید دیگر', 1, NULL, '2025-11-07 15:54:49', 2),
(7, 'آموزش ورد مقدماتی- تلاش 1', 'word', 'word', 'https://www.aparat.com/v/qribgin', NULL, 'صض', 1, NULL, '2025-11-10 20:18:31', 0),
(8, 'آموزش ورد مقدماتی- تلاش 3', 'video', 'Word', 'https://www.aparat.com/video/video/embed/videohash/qribgin/vt/frame', NULL, 'مقدمات ورد - تلاش 3', 1, NULL, '2025-11-10 20:23:42', 0),
(9, 'افکتهای انتقال اسلایدها به یکدیگر در پاور پوینت', 'video', 'PowerPoint', 'https://www.aparat.com/video/video/embed/videohash/vck0oqg/vt/frame', NULL, 'برای انتقال از اسلایدی به اسلاید دیگر از افکتهای جذاب استفاده می کنیم در این ویدئو در این باره و بیشتر گفته می شود.', 1, NULL, '2025-11-10 20:40:01', 1),
(10, 'فرمت پینتر جدید - تلاش 1', 'video', 'Word', NULL, 'https://www.aparat.com/v/yns7no3', '4563 - تلاش 1', 1, NULL, '2025-11-13 12:40:53', 0),
(11, 'فرمت پینتر جدید - تلاش 2', 'video', 'Word', 'https://www.aparat.com/video/video/embed/videohash/yns7no3/vt/frame', 'https://www.aparat.com/v/yns7no3', 'تلاش 2', 1, NULL, '2025-11-13 12:50:05', 3),
(14, 'توسعه وب با php', 'pdf', 'Word', '/uploads/1763039678_10_q_word.docx', '', '4562', 1, NULL, '2025-11-13 13:06:08', 2),
(27, 'تست جدید - شماره 7', 'pdf', 'Word', 'php_sample.pdf', '', '77777777', 1, 1, '2025-11-24 08:05:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `body`, `is_correct`) VALUES
(2013, 474, 'File → Open', 1),
(2014, 474, 'File → Save', 0),
(2015, 474, 'File → Close', 0),
(2016, 474, 'File → Exit', 0),
(2017, 475, 'File → Print', 1),
(2018, 475, 'View → Print Preview', 0),
(2019, 475, 'Home → Print', 0),
(2020, 475, 'Layout → Print', 0),
(2021, 476, 'File → Save As', 0),
(2022, 476, 'File → New', 1),
(2023, 476, 'Insert → Blank Page', 0),
(2024, 476, 'View → New Window', 0),
(2025, 477, 'File → Exit', 0),
(2026, 477, 'File → Close', 1),
(2027, 477, 'View → Hide', 0),
(2028, 477, 'Home → Delete', 0),
(2029, 478, 'Home → Font', 1),
(2030, 478, 'Layout → Font', 0),
(2031, 478, 'Insert → Font', 0),
(2032, 478, 'View → Font', 0),
(2033, 479, 'Insert → Icons', 0),
(2034, 479, 'Insert → Shapes', 1),
(2035, 479, 'Layout → SmartArt', 0),
(2036, 479, 'View → Draw', 0),
(2037, 480, 'Insert → Page Number → Bottom of Page', 1),
(2038, 480, 'Layout → Margins', 0),
(2039, 480, 'View → Footer', 0),
(2040, 480, 'Home → Paragraph', 0),
(2041, 481, 'Layout → Page Color', 1),
(2042, 481, 'Insert → Background', 0),
(2043, 481, 'Home → Page Color', 0),
(2044, 481, 'View → Design', 0),
(2045, 482, 'View → Ruler', 1),
(2046, 482, 'Layout → Gridlines', 0),
(2047, 482, 'Home → Show Ruler', 0),
(2048, 482, 'Insert → Tools', 0),
(2049, 483, 'Layout → Line Numbers', 1),
(2050, 483, 'Home → Paragraph', 0),
(2051, 483, 'View → Lines', 0),
(2052, 483, 'Insert → Number', 0),
(2053, 484, 'Paste', 0),
(2054, 484, 'Format Painter', 1),
(2055, 484, 'Replace', 0),
(2056, 484, 'Copy Style', 0),
(2057, 485, 'Insert → Link → Hyperlink', 1),
(2058, 485, 'Layout → Hyperlink', 0),
(2059, 485, 'Home → Insert', 0),
(2060, 485, 'Review → Add Link', 0),
(2061, 486, 'Layout → Margins', 1),
(2062, 486, 'Insert → Indent', 0),
(2063, 486, 'View → Ruler', 0),
(2064, 486, 'Home → Spacing', 0),
(2065, 487, 'Layout → Orientation → Landscape', 1),
(2066, 487, 'View → Rotate → Landscape', 0),
(2067, 487, 'Insert → Page Setup', 0),
(2068, 487, 'Home → Alignment', 0),
(2069, 488, 'Insert → Header &amp; Footer', 1),
(2070, 488, 'View → Page Setup', 0),
(2071, 488, 'Layout → Template', 0),
(2072, 488, 'Home → Styles', 0),
(2073, 489, 'Insert → Caption', 0),
(2074, 489, 'References → Insert Table of Figures', 1),
(2075, 489, 'Layout → Figures', 0),
(2076, 489, 'View → References', 0),
(2077, 490, 'File → Options → Advanced', 1),
(2078, 490, 'File → Options → Display', 0),
(2079, 490, 'Layout → Ruler Units', 0),
(2080, 490, 'View → Page Layout', 0),
(2081, 491, 'Review → New Comment', 1),
(2082, 491, 'Insert → Text Box', 0),
(2083, 491, 'Layout → Notes', 0),
(2084, 491, 'View → Comments', 0),
(2085, 492, 'File → Info → Protect Document', 1),
(2086, 492, 'File → Save As → Lock', 0),
(2087, 492, 'View → Hide Editing', 0),
(2088, 492, 'Home → Security', 0),
(2089, 493, 'Ctrl + H', 0),
(2090, 493, 'Ctrl + F', 1),
(2091, 493, 'Ctrl + N', 0),
(2092, 493, 'Ctrl + G', 0),
(2093, 494, 'Ctrl + F', 0),
(2094, 494, 'Ctrl + R', 0),
(2095, 494, 'Ctrl + H', 1),
(2096, 494, 'Ctrl + P', 0),
(2097, 495, 'Insert → Header → Page Number', 1),
(2098, 495, 'Layout → Header', 0),
(2099, 495, 'View → Header', 0),
(2100, 495, 'Home → Header', 0),
(2101, 496, 'Home → Show/Hide ¶', 1),
(2102, 496, 'Layout → Marks', 0),
(2103, 496, 'View → Formatting', 0),
(2104, 496, 'Insert → Symbols', 0),
(2105, 497, 'Home → Paragraph → Bullets', 1),
(2106, 497, 'Insert → Numbering', 0),
(2107, 497, 'Layout → Lists', 0),
(2108, 497, 'View → Outline', 0),
(2109, 498, 'Insert → Table → Convert Text to Table', 1),
(2110, 498, 'Layout → Table → Convert', 0),
(2111, 498, 'Home → Insert Table', 0),
(2112, 498, 'View → Format Table', 0),
(2113, 499, 'Home → Font → Advanced', 1),
(2114, 499, 'Layout → Paragraph → Spacing', 0),
(2115, 499, 'Insert → Text → Spacing', 0),
(2116, 499, 'View → Font Options', 0),
(2117, 500, 'References → Caption', 0),
(2118, 500, 'References → Table of Contents → Options', 1),
(2119, 500, 'Layout → Headings', 0),
(2120, 500, 'Home → Numbering', 0),
(2121, 501, 'File → Print Preview', 1),
(2122, 501, 'View → Page Preview', 0),
(2123, 501, 'Layout → Print Setup', 0),
(2124, 501, 'Insert → Preview', 0),
(2125, 502, 'Home → Paragraph → Text Direction', 1),
(2126, 502, 'Layout → Orientation', 0),
(2127, 502, 'Insert → Language', 0),
(2128, 502, 'View → Ruler', 0),
(2129, 503, 'File → Open', 1),
(2130, 503, 'File → Save', 0),
(2131, 503, 'File → Close', 0),
(2132, 503, 'File → Exit', 0),
(2133, 504, 'File → Print', 1),
(2134, 504, 'View → Print Preview', 0),
(2135, 504, 'Home → Print', 0),
(2136, 504, 'Layout → Print', 0),
(2137, 505, 'File → Save As', 0),
(2138, 505, 'File → New', 1),
(2139, 505, 'Insert → Blank Page', 0),
(2140, 505, 'View → New Window', 0),
(2141, 506, 'File → Exit', 0),
(2142, 506, 'File → Close', 1),
(2143, 506, 'View → Hide', 0),
(2144, 506, 'Home → Delete', 0),
(2145, 507, 'Home → Font', 1),
(2146, 507, 'Layout → Font', 0),
(2147, 507, 'Insert → Font', 0),
(2148, 507, 'View → Font', 0),
(2149, 508, 'Insert → Icons', 0),
(2150, 508, 'Insert → Shapes', 1),
(2151, 508, 'Layout → SmartArt', 0),
(2152, 508, 'View → Draw', 0),
(2153, 509, 'Insert → Page Number → Bottom of Page', 1),
(2154, 509, 'Layout → Margins', 0),
(2155, 509, 'View → Footer', 0),
(2156, 509, 'Home → Paragraph', 0),
(2157, 510, 'Layout → Page Color', 1),
(2158, 510, 'Insert → Background', 0),
(2159, 510, 'Home → Page Color', 0),
(2160, 510, 'View → Design', 0),
(2161, 511, 'View → Ruler', 1),
(2162, 511, 'Layout → Gridlines', 0),
(2163, 511, 'Home → Show Ruler', 0),
(2164, 511, 'Insert → Tools', 0),
(2165, 512, 'Layout → Line Numbers', 1),
(2166, 512, 'Home → Paragraph', 0),
(2167, 512, 'View → Lines', 0),
(2168, 512, 'Insert → Number', 0),
(2169, 513, 'Paste', 0),
(2170, 513, 'Format Painter', 1),
(2171, 513, 'Replace', 0),
(2172, 513, 'Copy Style', 0),
(2173, 514, 'Insert → Link → Hyperlink', 1),
(2174, 514, 'Layout → Hyperlink', 0),
(2175, 514, 'Home → Insert', 0),
(2176, 514, 'Review → Add Link', 0),
(2177, 515, 'Layout → Margins', 1),
(2178, 515, 'Insert → Indent', 0),
(2179, 515, 'View → Ruler', 0),
(2180, 515, 'Home → Spacing', 0),
(2181, 516, 'Layout → Orientation → Landscape', 1),
(2182, 516, 'View → Rotate → Landscape', 0),
(2183, 516, 'Insert → Page Setup', 0),
(2184, 516, 'Home → Alignment', 0),
(2185, 517, 'Insert → Header &amp; Footer', 1),
(2186, 517, 'View → Page Setup', 0),
(2187, 517, 'Layout → Template', 0),
(2188, 517, 'Home → Styles', 0),
(2189, 518, 'Insert → Caption', 0),
(2190, 518, 'References → Insert Table of Figures', 1),
(2191, 518, 'Layout → Figures', 0),
(2192, 518, 'View → References', 0),
(2193, 519, 'File → Options → Advanced', 1),
(2194, 519, 'File → Options → Display', 0),
(2195, 519, 'Layout → Ruler Units', 0),
(2196, 519, 'View → Page Layout', 0),
(2197, 520, 'Review → New Comment', 1),
(2198, 520, 'Insert → Text Box', 0),
(2199, 520, 'Layout → Notes', 0),
(2200, 520, 'View → Comments', 0),
(2201, 521, 'File → Info → Protect Document', 1),
(2202, 521, 'File → Save As → Lock', 0),
(2203, 521, 'View → Hide Editing', 0),
(2204, 521, 'Home → Security', 0),
(2205, 522, 'Ctrl + H', 0),
(2206, 522, 'Ctrl + F', 1),
(2207, 522, 'Ctrl + N', 0),
(2208, 522, 'Ctrl + G', 0),
(2209, 523, 'Ctrl + F', 0),
(2210, 523, 'Ctrl + R', 0),
(2211, 523, 'Ctrl + H', 1),
(2212, 523, 'Ctrl + P', 0),
(2213, 524, 'Insert → Header → Page Number', 1),
(2214, 524, 'Layout → Header', 0),
(2215, 524, 'View → Header', 0),
(2216, 524, 'Home → Header', 0),
(2217, 525, 'Home → Show/Hide ¶', 1),
(2218, 525, 'Layout → Marks', 0),
(2219, 525, 'View → Formatting', 0),
(2220, 525, 'Insert → Symbols', 0),
(2221, 526, 'Home → Paragraph → Bullets', 1),
(2222, 526, 'Insert → Numbering', 0),
(2223, 526, 'Layout → Lists', 0),
(2224, 526, 'View → Outline', 0),
(2225, 527, 'Insert → Table → Convert Text to Table', 1),
(2226, 527, 'Layout → Table → Convert', 0),
(2227, 527, 'Home → Insert Table', 0),
(2228, 527, 'View → Format Table', 0),
(2229, 528, 'Home → Font → Advanced', 1),
(2230, 528, 'Layout → Paragraph → Spacing', 0),
(2231, 528, 'Insert → Text → Spacing', 0),
(2232, 528, 'View → Font Options', 0),
(2233, 529, 'References → Caption', 0),
(2234, 529, 'References → Table of Contents → Options', 1),
(2235, 529, 'Layout → Headings', 0),
(2236, 529, 'Home → Numbering', 0),
(2237, 530, 'File → Print Preview', 1),
(2238, 530, 'View → Page Preview', 0),
(2239, 530, 'Layout → Print Setup', 0),
(2240, 530, 'Insert → Preview', 0),
(2241, 531, 'Home → Paragraph → Text Direction', 1),
(2242, 531, 'Layout → Orientation', 0),
(2243, 531, 'Insert → Language', 0),
(2244, 531, 'View → Ruler', 0),
(2321, 551, 'COUNT', 0),
(2322, 551, 'COUNTBLANK', 1),
(2323, 551, 'COUNTA', 0),
(2324, 551, 'ISNUMBER', 0),
(2325, 552, 'Font Color', 1),
(2326, 552, 'Alignment', 0),
(2327, 552, 'Border', 0),
(2328, 552, 'Wrap Text', 0),
(2329, 553, 'Sort A → Z', 1),
(2330, 553, 'Sort Z → A', 0),
(2331, 553, 'Filter', 0),
(2332, 553, 'AutoSum', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `type` enum('mcq_single','mcq_multi','true_false','fill_blank') NOT NULL,
  `body` text NOT NULL,
  `explanation` text,
  `difficulty` tinyint UNSIGNED DEFAULT '2',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `type`, `body`, `explanation`, `difficulty`, `created_at`) VALUES
(474, 15, 'mcq_single', 'برای باز کردن فایل ذخیره‌شده از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(475, 15, 'mcq_single', 'برای چاپ سند از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(476, 15, 'mcq_single', 'برای ایجاد سند جدید از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(477, 15, 'mcq_single', 'برای بستن فایل جاری از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(478, 15, 'mcq_single', 'برای تغییر نوع قلم از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(479, 15, 'mcq_single', 'برای درج شکل‌های هندسی از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(480, 15, 'mcq_single', 'برای درج شماره صفحه در پایین هر صفحه از کدام مسیر استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(481, 15, 'mcq_single', 'برای تغییر رنگ پس‌زمینه صفحه از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(482, 15, 'mcq_single', 'برای دیدن خطوط راهنما (Ruler) چه باید کرد؟', '', 2, '2025-11-21 08:27:34'),
(483, 15, 'mcq_single', 'برای قرار دادن شماره سطرها در سند از کدام بخش استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(484, 15, 'mcq_single', 'برای انتخاب بخشی از متن با ماوس چه باید کرد؟ الف) سه‌بار کلیک ب) یک‌بار کلیک ج) دوبار کلیک د) کشیدن ماوس روی متن پاسخ: د برای کپی کردن قالب نوشته از یک متن به متن دیگر از کدام ابزار استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(485, 15, 'mcq_single', 'برای درج پیوند (Hyperlink) از کدام مسیر استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(486, 15, 'mcq_single', 'برای تغییر فاصله از لبه صفحه از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(487, 15, 'mcq_single', 'برای تغییر جهت صفحه از عمودی به افقی چه باید کرد؟', '', 2, '2025-11-21 08:27:34'),
(488, 15, 'mcq_single', 'برای اضافه کردن سرصفحه و پاصفحه آماده از قالب‌های پیش‌فرض، از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(489, 15, 'mcq_single', 'برای افزودن فهرست تصاویر (Table of Figures) از کدام بخش استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(490, 15, 'mcq_single', 'برای تغییر واحد اندازه‌گیری (مثلاً از اینچ به سانتی‌متر) چه باید کرد؟', '', 2, '2025-11-21 08:27:34'),
(491, 15, 'mcq_single', 'برای افزودن توضیح در کنار متن از کدام ابزار استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(492, 15, 'mcq_single', 'برای جلوگیری از ویرایش سند توسط دیگران چه باید کرد؟', '', 2, '2025-11-21 08:27:34'),
(493, 15, 'mcq_single', 'برای پیدا کردن کلمه‌ای خاص در سند از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(494, 15, 'mcq_single', 'برای جایگزینی یک کلمه با کلمه دیگر از کدام ترکیب استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(495, 15, 'mcq_single', 'برای افزودن شماره به سرصفحه از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(496, 15, 'mcq_single', 'برای نمایش یا پنهان کردن علائم قالب‌بندی (¶) از چه گزینه‌ای استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(497, 15, 'mcq_single', 'برای ایجاد فهرست گلوله‌ای (Bullets) از کدام بخش استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(498, 15, 'mcq_single', 'برای تبدیل متن به جدول از چه مسیری استفاده می‌شود؟', '', 2, '2025-11-21 08:27:34'),
(499, 15, 'mcq_single', 'برای تغییر فاصله بین حروف از کدام مسیر استفاده می‌شود؟', '', 2, '2025-11-21 08:27:35'),
(500, 15, 'mcq_single', 'برای درج شماره خودکار فصل‌ها در فهرست از کدام ابزار استفاده می‌شود؟', '', 2, '2025-11-21 08:27:35'),
(501, 15, 'mcq_single', 'برای مشاهده پیش‌نمایش چاپ از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 08:27:35'),
(502, 15, 'mcq_single', 'برای تنظیم جهت نوشتن از راست به چپ از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 08:27:35'),
(503, 15, 'mcq_single', 'برای باز کردن فایل ذخیره‌شده از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(504, 15, 'mcq_single', 'برای چاپ سند از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(505, 15, 'mcq_single', 'برای ایجاد سند جدید از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(506, 15, 'mcq_single', 'برای بستن فایل جاری از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(507, 15, 'mcq_single', 'برای تغییر نوع قلم از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(508, 15, 'mcq_single', 'برای درج شکل‌های هندسی از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(509, 15, 'mcq_single', 'برای درج شماره صفحه در پایین هر صفحه از کدام مسیر استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(510, 15, 'mcq_single', 'برای تغییر رنگ پس‌زمینه صفحه از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(511, 15, 'mcq_single', 'برای دیدن خطوط راهنما (Ruler) چه باید کرد؟', '', 2, '2025-11-21 10:32:16'),
(512, 15, 'mcq_single', 'برای قرار دادن شماره سطرها در سند از کدام بخش استفاده می‌شود؟', '', 2, '2025-11-21 10:32:16'),
(513, 15, 'mcq_single', 'برای انتخاب بخشی از متن با ماوس چه باید کرد؟ الف) سه‌بار کلیک ب) یک‌بار کلیک ج) دوبار کلیک د) کشیدن ماوس روی متن پاسخ: د برای کپی کردن قالب نوشته از یک متن به متن دیگر از کدام ابزار استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(514, 15, 'mcq_single', 'برای درج پیوند (Hyperlink) از کدام مسیر استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(515, 15, 'mcq_single', 'برای تغییر فاصله از لبه صفحه از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(516, 15, 'mcq_single', 'برای تغییر جهت صفحه از عمودی به افقی چه باید کرد؟', '', 2, '2025-11-21 10:32:17'),
(517, 15, 'mcq_single', 'برای اضافه کردن سرصفحه و پاصفحه آماده از قالب‌های پیش‌فرض، از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(518, 15, 'mcq_single', 'برای افزودن فهرست تصاویر (Table of Figures) از کدام بخش استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(519, 15, 'mcq_single', 'برای تغییر واحد اندازه‌گیری (مثلاً از اینچ به سانتی‌متر) چه باید کرد؟', '', 2, '2025-11-21 10:32:17'),
(520, 15, 'mcq_single', 'برای افزودن توضیح در کنار متن از کدام ابزار استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(521, 15, 'mcq_single', 'برای جلوگیری از ویرایش سند توسط دیگران چه باید کرد؟', '', 2, '2025-11-21 10:32:17'),
(522, 15, 'mcq_single', 'برای پیدا کردن کلمه‌ای خاص در سند از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(523, 15, 'mcq_single', 'برای جایگزینی یک کلمه با کلمه دیگر از کدام ترکیب استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(524, 15, 'mcq_single', 'برای افزودن شماره به سرصفحه از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(525, 15, 'mcq_single', 'برای نمایش یا پنهان کردن علائم قالب‌بندی (¶) از چه گزینه‌ای استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(526, 15, 'mcq_single', 'برای ایجاد فهرست گلوله‌ای (Bullets) از کدام بخش استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(527, 15, 'mcq_single', 'برای تبدیل متن به جدول از چه مسیری استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(528, 15, 'mcq_single', 'برای تغییر فاصله بین حروف از کدام مسیر استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(529, 15, 'mcq_single', 'برای درج شماره خودکار فصل‌ها در فهرست از کدام ابزار استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(530, 15, 'mcq_single', 'برای مشاهده پیش‌نمایش چاپ از کدام گزینه استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(531, 15, 'mcq_single', 'برای تنظیم جهت نوشتن از راست به چپ از کدام قسمت استفاده می‌شود؟', '', 2, '2025-11-21 10:32:17'),
(551, 16, 'mcq_single', 'برای بهدست آوردن تعداد سلولهای خالی از چه تابعی استفاده میشود؟', '', 2, '2025-11-22 19:32:02'),
(552, 16, 'mcq_single', 'کدام گزینه باعث تغییر فونت سلول میشود؟', '', 2, '2025-11-22 19:32:32'),
(553, 16, 'mcq_single', 'برای مرتبسازی دادهها از کوچک به بزرگ از کدام گزینه استفاده میشود؟', '', 2, '2025-11-22 19:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `module` enum('ICDL_Concepts','Windows','Word','Excel','PowerPoint','Access','Internet') NOT NULL,
  `time_limit_seconds` int DEFAULT '0',
  `question_count` int NOT NULL DEFAULT '20',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `module`, `time_limit_seconds`, `question_count`, `is_published`, `created_by`, `created_at`) VALUES
(15, 'ورد', 'Word', 25000, 20, 1, 5, '2025-11-21 08:27:26'),
(16, 'اکسل', 'Excel', 900, 20, 1, 5, '2025-11-21 11:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','student') NOT NULL DEFAULT 'student',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password_hash`, `role`, `is_active`, `created_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$aNB59/9nkhsThJ4BZX/zNuzIBEOAyQdnQOVEkMylclYGA0exebmrm', 'admin', 1, '2025-11-06 14:08:49'),
(2, 'فرامرز افسری', 'afsari', '$2y$10$IyXiDqL1P52OB2cs497Q..XhZWSpkschFwF8dQVqbxciY9NuCB23K', 'student', 1, '2025-11-06 14:08:49'),
(4, 'محمود بجانی', 'bejani', '$2y$10$aNB59/9nkhsThJ4BZX/zNuzIBEOAyQdnQOVEkMylclYGA0exebmrm', 'student', 1, '2025-11-07 14:29:15'),
(5, 'فکور', '914', '$2y$10$PaxYwODI3qtKJM58QPnx/ucI7s4zvcitUqZq3jNiS19SDmIv.hSwu', 'student', 1, '2025-11-13 17:18:18'),
(6, 'افرا ملکی', '۹۱۴۵۰۳۸۲۴۳', '$2y$10$aYDTNCvddbf.ZZBhzZV9UOH4CS4sSmgY81gL2UsgwqrdBJ6NuH/oS', 'student', 1, '2025-11-17 06:17:49'),
(7, 'ثریا فکور', '9142224988', '$2y$10$nUUZsYcTwg0Ha4n5N53twetSs/eap8SCadSQaLEEg.WN0voLiGvLO', 'student', 1, '2025-11-17 06:20:22'),
(8, 'سمیه محمد حسینی', '9144070583', '$2y$10$NJTIBtUPyHbvp8IYF/NTaev0L9uO/xQ/5EH8DP15QmB/MuVwOrXGq', 'student', 1, '2025-11-17 06:20:47'),
(9, 'فاطمه انصاری', '992689744', '$2y$10$P2ziP1FtORhzJYwmp6s8GuvCeBvjC0esSgN5w8ar0OW8UNR1TfHrO', 'student', 1, '2025-11-17 06:21:10'),
(10, 'لیلا بابایی', '9146971735', '$2y$10$BA7xtRTHybQyEM8GbSUgU.Kw2QCZiKxdk2gsmfQSwV/1Y9RvtnXHa', 'student', 1, '2025-11-17 06:21:33'),
(11, 'مریم اکبرزاده', '9372423574', '$2y$10$Ve8cCuk/0U8f6kPNpBrpc.q2QOhSFKVdoAZTTTnalIBqdS5Od.86q', 'student', 1, '2025-11-17 06:21:55'),
(12, 'زهرا سعیدی', '9013832390', '$2y$10$ekBzxuxV0n.5tnnYamQ/J.c0A15rVaJ.wbxz0EczG/cUZnuMQH8/C', 'student', 1, '2025-11-17 06:22:18'),
(13, 'مریم حقی راد', '9148884604', '$2y$10$Ue9PRyIZB7sdqPMePx5Nk.7/Iaks3QytYieBD08CpRw.wSjOG4mtC', 'student', 1, '2025-11-17 06:22:38'),
(14, 'مهیا چرختاب', '9024935613', '$2y$10$PNTsIpe04vR/cJagsujXV.IRSlWkKD/QXAcdfVqb60XnACRcHy.i2', 'student', 1, '2025-11-17 06:23:03'),
(15, 'رویا حسینی', '9146670052', '$2y$10$IstECXUYqY065ozLMNCS4uvTidNXAiRhOatgr4cT3gKGfspbG4t3K', 'student', 1, '2025-11-17 06:23:21'),
(16, 'محدثه خدابخشی', '9144325623', '$2y$10$3Ih9/nfrW2HzMsF/gnBZuOjnvPcXe/UHgBk3fjhczrhqGCSUg32Rm', 'student', 1, '2025-11-17 06:23:45'),
(17, 'خدیجه کاک اله پور', '9337308647', '$2y$10$zbRkQ.UHi06Q0nOAxaPqYOIJVzLFvMyusE6z3QqOrfGA0WvPU0V8m', 'student', 1, '2025-11-17 06:24:13'),
(18, 'الینا چهراقی', '9919137648', '$2y$10$kEEqe4ODgA8c/.tILXhiJuu2pRLMETzh6k.NvBFR3RY/Mtk/jwFs2', 'student', 1, '2025-11-17 06:24:46'),
(19, 'منیژه پری', '9142497115', '$2y$10$D653dB1LrrGiMY/.TJ1tC.ehclpZmqTwOweDR.emTva37r22sv226', 'student', 1, '2025-11-17 06:25:06'),
(20, 'اسما بربط', '9304935516', '$2y$10$X9UVAfi0szZfW/2CoZblxuLwQlU8SRhPkQHT7AE2eJojI5jU7ZCly', 'student', 1, '2025-11-17 06:25:29'),
(21, 'سیده هاشمی پور', '9141018966', '$2y$10$haRW3zEIp67WLTIEc9vuCOfNXErAUNZx5QSPHuJXDSJUNOzcGqjYi', 'student', 1, '2025-11-17 06:25:51'),
(22, 'معصومه قائمی', '9380242014', '$2y$10$Z6jCXlISzJJmSHaBpGeGsu9uGWL9159.NwE3MkNKJzgWv9N/9Rnkq', 'student', 1, '2025-11-17 06:26:14'),
(23, 'سمیه حسینی', '9146938928', '$2y$10$wTJ6A/3aDrJ/CqfcD4ePL.sHfRSIeURk5MU6c98lmnnUDjpg.x8za', 'student', 1, '2025-11-17 06:26:33'),
(24, 'ائلناز لنبرانی', '9307706829', '$2y$10$mxjUaxRdecofjYbShKOnVef5wIX/0Wv./JJQqLfAJsyZeJvjgvz26', 'student', 1, '2025-11-17 06:26:54'),
(25, 'فریبا ایمنی', '9961056346', '$2y$10$RCJmbj/lWdXPr9xxok/s8uyUWCQYyanpn.oh26tZYh50A3j6YYlsm', 'student', 1, '2025-11-17 06:27:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attempt_quiz` (`quiz_id`),
  ADD KEY `user_id` (`user_id`,`quiz_id`);

--
-- Indexes for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aa_attempt` (`attempt_id`),
  ADD KEY `fk_aa_question` (`question_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contents_user` (`created_by`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_opt_q` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_q_quiz` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quiz_user` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1182;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2333;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `fk_attempt_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_attempt_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  ADD CONSTRAINT `fk_aa_attempt` FOREIGN KEY (`attempt_id`) REFERENCES `attempts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_aa_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `fk_contents_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `fk_opt_q` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_q_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `fk_quiz_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
