-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 10:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `niwy_zando_sogema`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categorie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `details`, `user_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'Grande boutique en attente attribution', NULL, NULL, NULL, NULL, NULL),
(2, 'Quincailleries', NULL, NULL, NULL, NULL, NULL),
(3, 'Boutiques pour Appareil Electronique', NULL, NULL, NULL, NULL, NULL),
(4, 'Boutiques pour Appareil Electroménager', NULL, NULL, NULL, NULL, NULL),
(5, 'Boutiques pour Fourniture de bureau , librairie, imprimerie et bureautique', NULL, NULL, NULL, NULL, NULL),
(6, 'Boutiques pour Agence de voyage et de fret', NULL, NULL, NULL, NULL, NULL),
(7, 'Boutiques pour Caviste', NULL, NULL, NULL, NULL, NULL),
(8, 'Boutiques pour Charcuterie, sandwicherie, patisserie et cremerie', NULL, NULL, NULL, NULL, NULL),
(9, 'Boutiques pour Vivre et divers (pattes, boite de conserve, épicerie et autes produits sec en gros)', NULL, NULL, NULL, NULL, NULL),
(10, 'Boutiques pour Chambre froide Négatives', NULL, NULL, NULL, NULL, NULL),
(11, 'Boutiques pour Chambre froide Positives', NULL, NULL, NULL, NULL, NULL),
(12, 'Location dépôt', NULL, NULL, NULL, NULL, NULL),
(13, 'Locaux sous escalier', NULL, NULL, NULL, NULL, NULL),
(14, 'Boutiques pour Décoration et Ornement interieur maison', NULL, NULL, NULL, NULL, NULL),
(15, 'Boutiques pour Casserollerie et ornement', NULL, NULL, NULL, NULL, NULL),
(16, 'Boutiques pour Objet plastique', NULL, NULL, NULL, NULL, NULL),
(17, 'Boutiques pour Vivre sec en gros (Riz, poissons salé, poisson fumé, sac de fufu, sac de mais, etc…)', NULL, NULL, NULL, NULL, NULL),
(18, 'Boutique Hors Formats (ex banques)', NULL, NULL, NULL, NULL, NULL),
(19, 'Boutiques pour CAMBISTE, Bureau de Change et Mobile Money', NULL, NULL, NULL, NULL, NULL),
(20, 'Boutiques pour Parfumerie Homme et femme', NULL, NULL, NULL, NULL, NULL),
(21, 'Boutiques pour Produits cosmétiques Homme Femme', NULL, NULL, NULL, NULL, NULL),
(22, 'Boutiques pour Mercerie', NULL, NULL, NULL, NULL, NULL),
(23, 'Boutiques pour Atelier de coutures', NULL, NULL, NULL, NULL, NULL),
(24, 'Boutiques pour Produits capilaires et et saon de coiffures', NULL, NULL, NULL, NULL, NULL),
(25, 'Boutiques pour Magasin de chaussure Femme / Homme', NULL, NULL, NULL, NULL, NULL),
(26, 'Boutiques pour Mode (Habillement & Maroquinnerie)', NULL, NULL, NULL, NULL, NULL),
(27, 'Boutiques pour Banques', NULL, NULL, NULL, NULL, NULL),
(28, 'Zone TOMBOLA / Fripperie', NULL, NULL, NULL, NULL, NULL),
(29, 'Zone kiosque', NULL, NULL, NULL, NULL, NULL),
(30, 'Zone œuvre d\'art', NULL, NULL, NULL, NULL, NULL),
(31, 'Restaurant unique', NULL, NULL, NULL, NULL, NULL),
(32, 'Stand  pour plusieurs restaurants MALEWA', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `save_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avoirs`
--

CREATE TABLE `avoirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_pavilon_id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `pavillon_id` bigint(20) UNSIGNED NOT NULL,
  `userValidateur` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concerners`
--

CREATE TABLE `concerners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `userValidateur` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emplacements`
--

CREATE TABLE `emplacements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(30) DEFAULT NULL,
  `pavillon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `place_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT 0,
  `save_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emplacements`
--

INSERT INTO `emplacements` (`id`, `numero`, `pavillon_id`, `place_id`, `article_id`, `etat`, `save_by`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 5, 1, 0, NULL, NULL, '2024-08-01 12:45:14'),
(2, '3', 1, 6, 2, 1, NULL, NULL, '2024-08-01 12:44:42'),
(3, '5', 1, 6, 2, 1, NULL, NULL, '2024-08-01 12:32:58'),
(4, '7', 1, 6, 2, 1, NULL, NULL, '2024-08-01 15:40:14'),
(5, '9', 1, 6, 2, 0, NULL, NULL, NULL),
(6, '11', 1, 6, 2, 0, NULL, NULL, NULL),
(7, '13', 1, 6, 2, 0, NULL, NULL, NULL),
(8, '15', 1, 6, 2, 0, NULL, NULL, NULL),
(9, '17', 1, 6, 2, 0, NULL, NULL, NULL),
(10, '19', 1, 6, 2, 0, NULL, NULL, NULL),
(11, '21', 1, 6, 2, 0, NULL, NULL, NULL),
(12, '23', 1, 6, 2, 0, NULL, NULL, NULL),
(13, '25', 1, 6, 2, 0, NULL, NULL, NULL),
(14, '27', 1, 6, 2, 0, NULL, NULL, NULL),
(15, '29', 1, 6, 2, 0, NULL, NULL, NULL),
(16, '31', 1, 6, 2, 0, NULL, NULL, NULL),
(17, '33', 1, 6, 2, 0, NULL, NULL, NULL),
(18, '35', 1, 6, 2, 0, NULL, NULL, NULL),
(19, '37', 1, 6, 2, 0, NULL, NULL, NULL),
(20, '39', 1, 6, 2, 0, NULL, NULL, NULL),
(21, '41', 1, 6, 2, 0, NULL, NULL, NULL),
(22, '43', 1, 6, 2, 0, NULL, NULL, NULL),
(23, '45', 1, 6, 2, 0, NULL, NULL, NULL),
(24, '47', 1, 6, 2, 0, NULL, NULL, NULL),
(25, '49', 1, 6, 2, 0, NULL, NULL, NULL),
(26, '51', 1, 6, 2, 0, NULL, NULL, NULL),
(27, '53', 1, 6, 2, 0, NULL, NULL, NULL),
(28, '55', 1, 6, 2, 0, NULL, NULL, NULL),
(29, '57', 1, 6, 2, 0, NULL, NULL, NULL),
(30, '59', 1, 6, 2, 0, NULL, NULL, NULL),
(31, '61', 1, 6, 2, 0, NULL, NULL, NULL),
(32, '63', 1, 6, 2, 0, NULL, NULL, NULL),
(33, '65', 1, 6, 2, 0, NULL, NULL, NULL),
(34, '67', 1, 6, 2, 0, NULL, NULL, NULL),
(35, '69', 1, 6, 2, 0, NULL, NULL, NULL),
(36, '71', 1, 6, 2, 0, NULL, NULL, NULL),
(37, '73', 1, 6, 2, 0, NULL, NULL, NULL),
(38, '75', 1, 6, 2, 0, NULL, NULL, NULL),
(39, '77', 1, 6, 2, 0, NULL, NULL, NULL),
(40, '79', 1, 6, 2, 0, NULL, NULL, NULL),
(41, '2', 1, 8, 3, 0, NULL, NULL, NULL),
(42, '4', 1, 8, 3, 0, NULL, NULL, NULL),
(43, '6', 1, 8, 3, 0, NULL, NULL, NULL),
(44, '8', 1, 8, 3, 0, NULL, NULL, NULL),
(45, '10', 1, 8, 3, 0, NULL, NULL, NULL),
(46, '12', 1, 8, 3, 0, NULL, NULL, NULL),
(47, '14', 1, 8, 3, 0, NULL, NULL, NULL),
(48, '16', 1, 8, 3, 0, NULL, NULL, NULL),
(49, '20', 1, 8, 3, 0, NULL, NULL, NULL),
(50, '22', 1, 8, 3, 0, NULL, NULL, NULL),
(51, '24', 1, 8, 3, 0, NULL, NULL, NULL),
(52, '26', 1, 8, 3, 0, NULL, NULL, NULL),
(53, '28', 1, 8, 3, 0, NULL, NULL, NULL),
(54, '30', 1, 8, 3, 0, NULL, NULL, NULL),
(55, '32', 1, 8, 3, 0, NULL, NULL, NULL),
(56, '34', 1, 8, 3, 0, NULL, NULL, NULL),
(57, '36', 1, 8, 3, 0, NULL, NULL, NULL),
(58, '38', 1, 8, 3, 0, NULL, NULL, NULL),
(59, '40', 1, 8, 3, 0, NULL, NULL, NULL),
(60, '46', 1, 8, 4, 0, NULL, NULL, NULL),
(61, '48', 1, 8, 4, 0, NULL, NULL, NULL),
(62, '50', 1, 8, 4, 0, NULL, NULL, NULL),
(63, '52', 1, 8, 4, 0, NULL, NULL, NULL),
(64, '54', 1, 8, 4, 0, NULL, NULL, NULL),
(65, '56', 1, 8, 4, 0, NULL, NULL, NULL),
(66, '58', 1, 8, 4, 0, NULL, NULL, NULL),
(67, '60', 1, 8, 4, 0, NULL, NULL, NULL),
(68, '62', 1, 8, 4, 0, NULL, NULL, NULL),
(69, '64', 1, 8, 4, 0, NULL, NULL, NULL),
(70, '68', 1, 8, 4, 0, NULL, NULL, NULL),
(71, '70', 1, 8, 4, 0, NULL, NULL, NULL),
(72, '72', 1, 8, 4, 0, NULL, NULL, NULL),
(73, '74', 1, 8, 4, 0, NULL, NULL, NULL),
(74, '76', 1, 8, 4, 0, NULL, NULL, NULL),
(75, '78', 1, 8, 4, 0, NULL, NULL, NULL),
(76, '80', 1, 8, 4, 0, NULL, NULL, NULL),
(77, '84', 5, 8, 5, 0, NULL, NULL, NULL),
(78, '86', 5, 8, 5, 0, NULL, NULL, NULL),
(79, '88', 5, 8, 5, 0, NULL, NULL, NULL),
(80, '90', 5, 8, 5, 0, NULL, NULL, NULL),
(81, '92', 5, 8, 5, 0, NULL, NULL, NULL),
(82, '98', 5, 8, 5, 0, NULL, NULL, NULL),
(83, '100', 5, 8, 5, 0, NULL, NULL, NULL),
(84, '102', 5, 8, 5, 0, NULL, NULL, NULL),
(85, '104', 5, 8, 5, 0, NULL, NULL, NULL),
(86, '108', 5, 8, 5, 0, NULL, NULL, NULL),
(87, '110', 5, 8, 5, 0, NULL, NULL, NULL),
(88, '112', 5, 8, 5, 0, NULL, NULL, NULL),
(89, '114', 5, 8, 5, 0, NULL, NULL, NULL),
(90, '116', 5, 8, 5, 0, NULL, NULL, NULL),
(91, '118', 5, 8, 5, 0, NULL, NULL, NULL),
(92, '113', 5, 6, 6, 0, NULL, NULL, NULL),
(93, '115', 5, 6, 6, 0, NULL, NULL, NULL),
(94, '117', 5, 6, 6, 0, NULL, NULL, NULL),
(95, '119', 5, 6, 6, 0, NULL, NULL, NULL),
(96, '121', 5, 6, 6, 0, NULL, NULL, NULL),
(97, '123', 5, 6, 6, 0, NULL, NULL, NULL),
(98, '125', 5, 6, 6, 0, NULL, NULL, NULL),
(99, '122', 9, 6, 7, 0, NULL, NULL, NULL),
(100, '124', 9, 6, 7, 0, NULL, NULL, NULL),
(101, '126', 9, 6, 7, 0, NULL, NULL, NULL),
(102, '128', 9, 6, 7, 0, NULL, NULL, NULL),
(103, '130', 9, 6, 7, 0, NULL, NULL, NULL),
(104, '132', 9, 6, 7, 0, NULL, NULL, NULL),
(105, '134', 9, 6, 7, 0, NULL, NULL, NULL),
(106, '136', 9, 6, 7, 0, NULL, NULL, NULL),
(107, '138', 9, 6, 7, 0, NULL, NULL, NULL),
(108, '140', 9, 6, 7, 0, NULL, NULL, NULL),
(109, '142', 9, 6, 7, 0, NULL, NULL, NULL),
(110, '144', 9, 6, 7, 0, NULL, NULL, NULL),
(111, '146', 9, 6, 7, 0, NULL, NULL, NULL),
(112, '148', 9, 6, 7, 0, NULL, NULL, NULL),
(113, '152', 13, 6, 8, 0, NULL, NULL, NULL),
(114, '154', 13, 6, 8, 0, NULL, NULL, NULL),
(115, '156', 13, 6, 8, 0, NULL, NULL, NULL),
(116, '158', 13, 6, 8, 0, NULL, NULL, NULL),
(117, '160', 13, 6, 8, 0, NULL, NULL, NULL),
(118, '162', 13, 6, 8, 0, NULL, NULL, NULL),
(119, '164', 13, 6, 8, 0, NULL, NULL, NULL),
(120, '170', 13, 8, 9, 0, NULL, NULL, NULL),
(121, '172', 13, 8, 9, 0, NULL, NULL, NULL),
(122, '174', 13, 8, 9, 0, NULL, NULL, NULL),
(123, '176', 13, 8, 9, 0, NULL, NULL, NULL),
(124, '178', 13, 8, 9, 0, NULL, NULL, NULL),
(125, '180', 13, 8, 9, 0, NULL, NULL, NULL),
(126, '182', 13, 8, 9, 0, NULL, NULL, NULL),
(127, '184', 13, 8, 9, 0, NULL, NULL, NULL),
(128, '186', 13, 8, 9, 0, NULL, NULL, NULL),
(129, '188', 13, 8, 9, 0, NULL, NULL, NULL),
(130, '192', 13, 8, 9, 0, NULL, NULL, NULL),
(131, '194', 13, 8, 9, 0, NULL, NULL, NULL),
(132, '196', 13, 8, 9, 0, NULL, NULL, NULL),
(133, '198', 13, 8, 9, 0, NULL, NULL, NULL),
(134, '200', 13, 8, 9, 0, NULL, NULL, NULL),
(135, '202', 13, 8, 9, 0, NULL, NULL, NULL),
(136, '204', 13, 8, 9, 0, NULL, NULL, NULL),
(137, '206', 13, 8, 9, 0, NULL, NULL, NULL),
(138, '208', 13, 8, 9, 0, NULL, NULL, NULL),
(139, '210', 13, 8, 9, 0, NULL, NULL, NULL),
(140, '1', 17, NULL, 10, 0, NULL, NULL, NULL),
(141, '2', 17, NULL, 10, 0, NULL, NULL, NULL),
(142, '3', 17, NULL, 10, 0, NULL, NULL, NULL),
(143, '4', 17, NULL, 10, 0, NULL, NULL, NULL),
(144, '5', 17, NULL, 10, 0, NULL, NULL, NULL),
(145, '6', 17, NULL, 10, 0, NULL, NULL, NULL),
(146, '7', 17, NULL, 10, 0, NULL, NULL, NULL),
(147, '8', 17, NULL, 11, 0, NULL, NULL, NULL),
(148, '9', 17, NULL, 11, 0, NULL, NULL, NULL),
(149, '10', 17, NULL, 11, 0, NULL, NULL, NULL),
(150, '2', 21, 12, 13, 0, NULL, NULL, NULL),
(151, '18', 21, 12, 13, 0, NULL, NULL, NULL),
(152, '42', 21, 12, 13, 0, NULL, NULL, NULL),
(153, '44', 21, 12, 13, 0, NULL, NULL, NULL),
(154, '66', 21, 12, 13, 0, NULL, NULL, NULL),
(155, '82', 21, 12, 13, 0, NULL, NULL, NULL),
(156, '94', 21, 12, 13, 0, NULL, NULL, NULL),
(157, '96', 21, 12, 13, 0, NULL, NULL, NULL),
(158, '106', 21, 12, 13, 0, NULL, NULL, NULL),
(159, '120', 21, 12, 13, 0, NULL, NULL, NULL),
(160, '150', 21, 12, 13, 0, NULL, NULL, NULL),
(161, '166', 21, 12, 13, 0, NULL, NULL, NULL),
(162, '168', 21, 12, 13, 0, NULL, NULL, NULL),
(163, '190', 21, 12, 13, 0, NULL, NULL, NULL),
(164, '201', 21, 12, 13, 0, NULL, NULL, NULL),
(165, '212', 21, 12, 13, 0, NULL, NULL, NULL),
(166, '213', 2, 9, 14, 1, NULL, NULL, '2024-08-01 16:56:37'),
(167, '214', 2, 9, 14, 0, NULL, NULL, NULL),
(168, '215', 2, 9, 14, 0, NULL, NULL, NULL),
(169, '216', 2, 9, 14, 0, NULL, NULL, NULL),
(170, '217', 2, 9, 14, 0, NULL, NULL, NULL),
(171, '218', 2, 9, 14, 0, NULL, NULL, NULL),
(172, '219', 2, 9, 14, 0, NULL, NULL, NULL),
(173, '220', 2, 9, 14, 0, NULL, NULL, NULL),
(174, '221', 2, 9, 15, 0, NULL, NULL, NULL),
(175, '222', 2, 9, 15, 0, NULL, NULL, NULL),
(176, '223', 2, 9, 15, 0, NULL, NULL, NULL),
(177, '224', 2, 9, 15, 0, NULL, NULL, NULL),
(178, '225', 2, 9, 15, 0, NULL, NULL, NULL),
(179, '226', 2, 9, 15, 0, NULL, NULL, NULL),
(180, '227', 2, 9, 15, 0, NULL, NULL, NULL),
(181, '228', 2, 9, 15, 0, NULL, NULL, NULL),
(182, '229', 2, 9, 15, 0, NULL, NULL, NULL),
(183, '230', 2, 9, 15, 0, NULL, NULL, NULL),
(184, '231', 2, 9, 15, 0, NULL, NULL, NULL),
(185, '232', 2, 9, 15, 0, NULL, NULL, NULL),
(186, '233', 2, 9, 15, 0, NULL, NULL, NULL),
(187, '234', 2, 9, 15, 0, NULL, NULL, NULL),
(188, '235', 2, 9, 15, 0, NULL, NULL, NULL),
(189, '236', 2, 9, 15, 0, NULL, NULL, NULL),
(190, '237', 2, 9, 15, 0, NULL, NULL, NULL),
(191, '238', 2, 9, 15, 0, NULL, NULL, NULL),
(192, '239', 2, 9, 15, 0, NULL, NULL, NULL),
(193, '240', 2, 9, 15, 0, NULL, NULL, NULL),
(194, '241', 25, 9, 16, 0, NULL, NULL, NULL),
(195, '242', 25, 9, 16, 0, NULL, NULL, NULL),
(196, '243', 25, 9, 16, 0, NULL, NULL, NULL),
(197, '244', 25, 9, 16, 0, NULL, NULL, NULL),
(198, '245', 25, 9, 16, 0, NULL, NULL, NULL),
(199, '246', 25, 9, 16, 0, NULL, NULL, NULL),
(200, '247', 25, 9, 16, 0, NULL, NULL, NULL),
(201, '248', 25, 9, 16, 0, NULL, NULL, NULL),
(202, '249', 25, 9, 16, 0, NULL, NULL, NULL),
(203, '250', 25, 9, 16, 0, NULL, NULL, NULL),
(204, '251', 25, 9, 16, 0, NULL, NULL, NULL),
(205, '253', 10, 9, 17, 0, NULL, NULL, NULL),
(206, '262', 10, 9, 17, 0, NULL, NULL, NULL),
(207, '271', 3, 9, 19, 0, NULL, NULL, NULL),
(208, '273', 3, 9, 19, 0, NULL, NULL, NULL),
(209, '275', 3, 9, 19, 0, NULL, NULL, NULL),
(210, '276', 3, 9, 20, 0, NULL, NULL, NULL),
(211, '278', 3, 9, 20, 0, NULL, NULL, NULL),
(212, '280', 3, 9, 20, 0, NULL, NULL, NULL),
(213, '282', 3, 9, 20, 0, NULL, NULL, NULL),
(214, '284', 3, 9, 20, 0, NULL, NULL, NULL),
(215, '286', 3, 9, 20, 0, NULL, NULL, NULL),
(216, '288', 3, 9, 20, 0, NULL, NULL, NULL),
(217, '290', 3, 9, 20, 0, NULL, NULL, NULL),
(218, '292', 3, 9, 20, 0, NULL, NULL, NULL),
(219, '294', 3, 9, 20, 0, NULL, NULL, NULL),
(220, '296', 3, 9, 20, 0, NULL, NULL, NULL),
(221, '298', 3, 9, 20, 0, NULL, NULL, NULL),
(222, '300', 3, 9, 20, 0, NULL, NULL, NULL),
(223, '302', 3, 9, 20, 0, NULL, NULL, NULL),
(224, '304', 3, 9, 20, 0, NULL, NULL, NULL),
(225, '306', 3, 9, 20, 0, NULL, NULL, NULL),
(226, '308', 3, 9, 20, 0, NULL, NULL, NULL),
(227, '310', 3, 9, 20, 0, NULL, NULL, NULL),
(228, '312', 3, 9, 20, 0, NULL, NULL, NULL),
(229, '314', 3, 9, 20, 0, NULL, NULL, NULL),
(230, '316', 3, 9, 20, 0, NULL, NULL, NULL),
(231, '318', 3, 9, 20, 0, NULL, NULL, NULL),
(232, '320', 3, 9, 20, 0, NULL, NULL, NULL),
(233, '322', 3, 9, 20, 0, NULL, NULL, NULL),
(234, '324', 3, 9, 20, 0, NULL, NULL, NULL),
(235, '326', 3, 9, 20, 0, NULL, NULL, NULL),
(236, '328', 3, 9, 20, 0, NULL, NULL, NULL),
(237, '330', 3, 9, 20, 0, NULL, NULL, NULL),
(238, '277', 3, 13, 21, 0, NULL, NULL, NULL),
(239, '279', 3, 13, 21, 0, NULL, NULL, NULL),
(240, '281', 3, 13, 21, 0, NULL, NULL, NULL),
(241, '283', 3, 13, 21, 0, NULL, NULL, NULL),
(242, '285', 3, 13, 21, 0, NULL, NULL, NULL),
(243, '287', 3, 13, 21, 0, NULL, NULL, NULL),
(244, '289', 3, 13, 21, 0, NULL, NULL, NULL),
(245, '291', 3, 13, 21, 0, NULL, NULL, NULL),
(246, '293', 3, 13, 21, 0, NULL, NULL, NULL),
(247, '295', 3, 13, 21, 0, NULL, NULL, NULL),
(248, '297', 3, 13, 21, 0, NULL, NULL, NULL),
(249, '299', 3, 13, 21, 0, NULL, NULL, NULL),
(250, '301', 3, 13, 21, 0, NULL, NULL, NULL),
(251, '303', 3, 13, 21, 0, NULL, NULL, NULL),
(252, '305', 3, 13, 21, 0, NULL, NULL, NULL),
(253, '307', 3, 13, 21, 0, NULL, NULL, NULL),
(254, '309', 3, 13, 21, 0, NULL, NULL, NULL),
(255, '311', 3, 13, 21, 0, NULL, NULL, NULL),
(256, '313', 3, 13, 21, 0, NULL, NULL, NULL),
(257, '315', 3, 13, 21, 0, NULL, NULL, NULL),
(258, '317', 3, 13, 21, 0, NULL, NULL, NULL),
(259, '319', 3, 13, 21, 0, NULL, NULL, NULL),
(260, '321', 3, 13, 21, 0, NULL, NULL, NULL),
(261, '323', 3, 13, 21, 0, NULL, NULL, NULL),
(262, '325', 3, 13, 21, 0, NULL, NULL, NULL),
(263, '327', 3, 13, 21, 0, NULL, NULL, NULL),
(264, '329', 3, 13, 21, 0, NULL, NULL, NULL),
(265, '331', 3, 13, 21, 0, NULL, NULL, NULL),
(266, '332', 3, 14, 22, 0, NULL, NULL, NULL),
(267, '334', 3, 14, 22, 0, NULL, NULL, NULL),
(268, '336', 3, 14, 22, 0, NULL, NULL, NULL),
(269, '338', 3, 14, 22, 0, NULL, NULL, NULL),
(270, '340', 3, 14, 22, 0, NULL, NULL, NULL),
(271, '342', 3, 14, 22, 0, NULL, NULL, NULL),
(272, '344', 3, 14, 22, 0, NULL, NULL, NULL),
(273, '346', 3, 14, 22, 0, NULL, NULL, NULL),
(274, '348', 3, 14, 22, 0, NULL, NULL, NULL),
(275, '350', 3, 14, 22, 0, NULL, NULL, NULL),
(276, '352', 3, 14, 22, 0, NULL, NULL, NULL),
(277, '354', 3, 14, 22, 0, NULL, NULL, NULL),
(278, '356', 3, 14, 22, 0, NULL, NULL, NULL),
(279, '358', 3, 14, 22, 0, NULL, NULL, NULL),
(280, '360', 3, 14, 22, 0, NULL, NULL, NULL),
(281, '362', 3, 14, 22, 0, NULL, NULL, NULL),
(282, '364', 3, 14, 22, 0, NULL, NULL, NULL),
(283, '346', 3, 15, 23, 0, NULL, NULL, NULL),
(284, '348', 3, 15, 23, 0, NULL, NULL, NULL),
(285, '350', 3, 15, 23, 0, NULL, NULL, NULL),
(286, '352', 3, 15, 23, 0, NULL, NULL, NULL),
(287, '354', 3, 15, 23, 0, NULL, NULL, NULL),
(288, '356', 3, 15, 23, 0, NULL, NULL, NULL),
(289, '358', 3, 15, 23, 0, NULL, NULL, NULL),
(290, '360', 3, 15, 23, 0, NULL, NULL, NULL),
(291, '362', 3, 15, 23, 0, NULL, NULL, NULL),
(292, '364', 3, 15, 23, 0, NULL, NULL, NULL),
(293, '378', 11, 16, 24, 0, NULL, NULL, NULL),
(294, '380', 11, 16, 24, 0, NULL, NULL, NULL),
(295, '382', 11, 16, 24, 0, NULL, NULL, NULL),
(296, '384', 11, 16, 24, 0, NULL, NULL, NULL),
(297, '386', 11, 16, 24, 0, NULL, NULL, NULL),
(298, '388', 11, 16, 24, 0, NULL, NULL, NULL),
(299, '390', 11, 16, 24, 0, NULL, NULL, NULL),
(300, '392', 11, 16, 24, 0, NULL, NULL, NULL),
(301, '394', 11, 16, 24, 0, NULL, NULL, NULL),
(302, '396', 11, 16, 24, 0, NULL, NULL, NULL),
(303, '398', 11, 16, 24, 0, NULL, NULL, NULL),
(304, '400', 11, 16, 24, 0, NULL, NULL, NULL),
(305, '402', 11, 16, 24, 0, NULL, NULL, NULL),
(306, '404', 11, 16, 24, 0, NULL, NULL, NULL),
(307, '406', 11, 16, 24, 0, NULL, NULL, NULL),
(308, '408', 11, 16, 24, 0, NULL, NULL, NULL),
(309, '410', 11, 16, 24, 0, NULL, NULL, NULL),
(310, '412', 11, 16, 24, 0, NULL, NULL, NULL),
(311, '414', 11, 16, 24, 0, NULL, NULL, NULL),
(312, '416', 11, 16, 24, 0, NULL, NULL, NULL),
(313, '418', 11, 16, 24, 0, NULL, NULL, NULL),
(314, '381', 11, 17, 25, 0, NULL, NULL, NULL),
(315, '383', 11, 17, 25, 0, NULL, NULL, NULL),
(316, '385', 11, 17, 25, 0, NULL, NULL, NULL),
(317, '387', 11, 17, 25, 0, NULL, NULL, NULL),
(318, '389', 11, 17, 25, 0, NULL, NULL, NULL),
(319, '391', 11, 17, 25, 0, NULL, NULL, NULL),
(320, '393', 11, 17, 25, 0, NULL, NULL, NULL),
(321, '395', 11, 17, 25, 0, NULL, NULL, NULL),
(322, '397', 11, 17, 25, 0, NULL, NULL, NULL),
(323, '399', 11, 17, 25, 0, NULL, NULL, NULL),
(324, '401', 11, 17, 25, 0, NULL, NULL, NULL),
(325, '403', 11, 17, 25, 0, NULL, NULL, NULL),
(326, '405', 11, 17, 25, 0, NULL, NULL, NULL),
(327, '407', 11, 17, 25, 0, NULL, NULL, NULL),
(328, '409', 11, 17, 25, 0, NULL, NULL, NULL),
(329, '411', 11, 17, 25, 0, NULL, NULL, NULL),
(330, '413', 11, 17, 25, 0, NULL, NULL, NULL),
(331, '415', 11, 17, 25, 0, NULL, NULL, NULL),
(332, '417', 11, 17, 25, 0, NULL, NULL, NULL),
(333, '419', 11, 17, 25, 0, NULL, NULL, NULL),
(334, '421', 11, 17, 25, 0, NULL, NULL, NULL),
(335, '420', 15, 18, 26, 0, NULL, NULL, NULL),
(336, '422', 15, 18, 26, 0, NULL, NULL, NULL),
(337, '424', 15, 18, 26, 0, NULL, NULL, NULL),
(338, '426', 15, 18, 26, 0, NULL, NULL, NULL),
(339, '428', 15, 18, 26, 0, NULL, NULL, NULL),
(340, '430', 15, 18, 26, 0, NULL, NULL, NULL),
(341, '432', 15, 18, 26, 0, NULL, NULL, NULL),
(342, '434', 15, 18, 26, 0, NULL, NULL, NULL),
(343, '436', 15, 18, 26, 0, NULL, NULL, NULL),
(344, '438', 15, 18, 26, 0, NULL, NULL, NULL),
(345, '440', 15, 18, 26, 0, NULL, NULL, NULL),
(346, '442', 15, 18, 26, 0, NULL, NULL, NULL),
(347, '444', 15, 18, 26, 0, NULL, NULL, NULL),
(348, '446', 15, 18, 26, 0, NULL, NULL, NULL),
(349, '448', 15, 18, 26, 0, NULL, NULL, NULL),
(350, '450', 15, 18, 26, 0, NULL, NULL, NULL),
(351, '452', 15, 18, 26, 0, NULL, NULL, NULL),
(352, '454', 15, 18, 26, 0, NULL, NULL, NULL),
(353, '456', 15, 18, 26, 0, NULL, NULL, NULL),
(354, '458', 15, 18, 26, 0, NULL, NULL, NULL),
(355, '460', 15, 18, 26, 0, NULL, NULL, NULL),
(356, '462', 15, 18, 26, 0, NULL, NULL, NULL),
(357, '464', 15, 18, 26, 0, NULL, NULL, NULL),
(358, '466', 15, 18, 26, 0, NULL, NULL, NULL),
(359, '468', 15, 18, 26, 0, NULL, NULL, NULL),
(360, '470', 15, 18, 26, 0, NULL, NULL, NULL),
(361, '472', 15, 18, 26, 0, NULL, NULL, NULL),
(362, '474', 15, 18, 26, 0, NULL, NULL, NULL),
(363, '476', 15, 18, 26, 0, NULL, NULL, NULL),
(364, '478', 15, 18, 26, 0, NULL, NULL, NULL),
(365, '480', 15, 18, 26, 0, NULL, NULL, NULL),
(366, '482', 15, 18, 26, 0, NULL, NULL, NULL),
(367, '484', 15, 18, 26, 0, NULL, NULL, NULL),
(368, '486', 15, 18, 26, 0, NULL, NULL, NULL),
(369, '488', 15, 18, 26, 0, NULL, NULL, NULL),
(370, '490', 15, 18, 26, 0, NULL, NULL, NULL),
(371, '492', 15, 18, 26, 0, NULL, NULL, NULL),
(372, '494', 15, 18, 26, 0, NULL, NULL, NULL),
(373, '496', 15, 18, 26, 0, NULL, NULL, NULL),
(374, '498', 15, 18, 26, 0, NULL, NULL, NULL),
(375, '500', 15, 18, 26, 0, NULL, NULL, NULL),
(376, '502', 15, 18, 26, 0, NULL, NULL, NULL),
(377, '504', 15, 18, 26, 0, NULL, NULL, NULL),
(378, '506', 15, 18, 26, 0, NULL, NULL, NULL),
(379, '508', 15, 18, 26, 0, NULL, NULL, NULL),
(380, '510', 15, 18, 26, 0, NULL, NULL, NULL),
(381, '512', 15, 18, 26, 0, NULL, NULL, NULL),
(382, '516', 19, 19, 27, 0, NULL, NULL, NULL),
(383, '517', 19, 19, 27, 0, NULL, NULL, NULL),
(384, '520', 19, 19, 27, 0, NULL, NULL, NULL),
(385, '521', 19, 19, 27, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_10_100000_create_roles_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_20000_create_users_table', 1),
(4, '2014_10_12_30000_create_type_pavilons_table', 1),
(5, '2014_10_12_30000_create_vendeurs_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_09_10_140822_create_paiements_table', 1),
(9, '2023_09_10_141032_create_pavillons_table', 1),
(10, '2023_09_10_141036_create_avoirs_table', 1),
(11, '2023_09_10_141036_create_type_places_table', 1),
(12, '2023_09_10_141110_create_places_table', 1),
(13, '2023_09_10_141153_create_posseders_table', 1),
(14, '2023_09_10_141210_create_article_categories_table', 1),
(15, '2023_09_10_141211_create_articles_table', 1),
(16, '2023_09_10_141228_create_concerners_table', 1),
(17, '2023_09_10_190027_create_paimentts_table', 1),
(18, '2024_06_06_190123_create_nouveau_pavillions_table', 1),
(19, '2024_07_13_153219_create_emplacements_table', 1),
(20, '2024_07_23_135735_create_vendeur_demandes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nouveau_pavillions`
--

CREATE TABLE `nouveau_pavillions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `place_id` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `montant_cdf` double DEFAULT NULL,
  `montant_usd` double DEFAULT NULL,
  `datepaiment` varchar(15) DEFAULT NULL,
  `type_nationalite` varchar(100) DEFAULT NULL,
  `nbr_table` varchar(255) DEFAULT NULL,
  `nbr_maison` varchar(10) DEFAULT NULL,
  `nbr_kiosque` varchar(10) DEFAULT NULL,
  `nbr_autre` varchar(10) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paimentts`
--

CREATE TABLE `paimentts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `montant_cdf` double DEFAULT NULL,
  `montant_usd` double DEFAULT NULL,
  `datepaiment` varchar(15) DEFAULT NULL,
  `type_nationalite` varchar(100) DEFAULT NULL,
  `nbr_table` varchar(255) DEFAULT NULL,
  `nbr_maison` varchar(10) DEFAULT NULL,
  `nbr_kiosque` varchar(10) DEFAULT NULL,
  `nbr_autre` varchar(10) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pavillons`
--

CREATE TABLE `pavillons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(50) NOT NULL,
  `niveau` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pavillons`
--

INSERT INTO `pavillons` (`id`, `numero`, `niveau`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'BOLINGO', 0, NULL, NULL, NULL),
(2, 'BOLINGO', 1, NULL, NULL, NULL),
(3, 'BOLINGO', 2, NULL, NULL, NULL),
(4, 'BOLINGO', 3, NULL, NULL, NULL),
(5, 'ECOLE', 0, NULL, NULL, NULL),
(6, 'ECOLE', 1, NULL, NULL, NULL),
(7, 'ECOLE', 2, NULL, NULL, NULL),
(8, 'ECOLE', 3, NULL, NULL, NULL),
(9, 'ECOLE / RUAKANDINGI', 0, NULL, NULL, NULL),
(10, 'ECOLE / RUAKANDINGI', 1, NULL, NULL, NULL),
(11, 'ECOLE / RUAKANDINGI', 2, NULL, NULL, NULL),
(12, 'ECOLE / RUAKANDINGI', 3, NULL, NULL, NULL),
(13, 'RUAKANDINGI', 0, NULL, NULL, NULL),
(14, 'RUAKANDINGI', 1, NULL, NULL, NULL),
(15, 'RUAKANDINGI', 2, NULL, NULL, NULL),
(16, 'RUAKANDINGI', 3, NULL, NULL, NULL),
(17, 'MARRAIS', 0, NULL, NULL, NULL),
(18, 'MARRAIS', 1, NULL, NULL, NULL),
(19, 'MARRAIS', 2, NULL, NULL, NULL),
(20, 'MARRAIS', 3, NULL, NULL, NULL),
(21, 'BOLINGO / ECOLE / RUAKANDINGI', 0, NULL, NULL, NULL),
(22, 'BOLINGO / ECOLE / RUAKANDINGI', 1, NULL, NULL, NULL),
(23, 'BOLINGO / ECOLE / RUAKANDINGI', 2, NULL, NULL, NULL),
(24, 'BOLINGO / ECOLE / RUAKANDINGI', 3, NULL, NULL, NULL),
(25, 'BOLINGO / ECOLE', 1, NULL, NULL, NULL),
(26, 'BOLINGO / ECOLE', 1, NULL, NULL, NULL),
(27, 'BOLINGO / ECOLE', 2, NULL, NULL, NULL),
(28, 'BOLINGO / ECOLE', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` double NOT NULL DEFAULT 0,
  `type_place_id` bigint(20) UNSIGNED DEFAULT NULL,
  `orientation` varchar(255) DEFAULT NULL,
  `save_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `nom`, `prix`, `type_place_id`, `orientation`, `save_by`, `created_at`, `updated_at`) VALUES
(1, 'Magasin', 0, NULL, '', NULL, NULL, NULL),
(2, 'Etalage', 0, NULL, '', NULL, NULL, NULL),
(3, 'Kiosque', 0, NULL, '', NULL, NULL, NULL),
(4, 'Entrepôt', 0, NULL, '', NULL, NULL, NULL),
(5, 'Chambre froide', 0, NULL, '', NULL, NULL, NULL),
(6, 'Magasin', 1000, 1, 'EX', NULL, NULL, NULL),
(7, 'Magasin', 2000, 2, 'EX', NULL, NULL, NULL),
(8, 'Magasin', 1000, 1, 'IN', NULL, NULL, NULL),
(9, 'Magasin', 2000, 2, 'IN', NULL, NULL, NULL),
(12, 'Magasin sous escalier', 2000, 2, 'IN', NULL, NULL, NULL),
(13, 'Magasin', 1000, 3, 'EX', NULL, NULL, NULL),
(14, 'Magasin', 1000, 4, 'IN', NULL, NULL, NULL),
(15, 'Magasin', 1000, 5, 'IN', NULL, NULL, NULL),
(16, 'Magasin', 1000, 6, 'IN', NULL, NULL, NULL),
(17, 'Magasin', 1000, 7, 'EX', NULL, NULL, NULL),
(18, 'Magasin', 1000, 8, 'IN', NULL, NULL, NULL),
(19, 'Magasin', 0, 9, 'IN', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posseders`
--

CREATE TABLE `posseders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `nbr` double NOT NULL DEFAULT 0,
  `prix` double NOT NULL DEFAULT 0,
  `total` double DEFAULT NULL,
  `nbr_retenu` double NOT NULL DEFAULT 0,
  `maitre_cube` varchar(10) NOT NULL DEFAULT '0',
  `maitre_cube_retenu` varchar(10) NOT NULL DEFAULT '0',
  `decision` varchar(10) DEFAULT NULL,
  `userValidateur` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Finance', NULL, NULL),
(4, 'AgentTerrain', NULL, NULL),
(5, 'Caissier', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_pavilons`
--

CREATE TABLE `type_pavilons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_pavilons`
--

INSERT INTO `type_pavilons` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Simple', NULL, NULL),
(2, 'Multiple', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_places`
--

CREATE TABLE `type_places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(10) DEFAULT NULL,
  `dimension` varchar(10) DEFAULT NULL,
  `save_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_places`
--

INSERT INTO `type_places` (`id`, `nom`, `dimension`, `save_by`, `created_at`, `updated_at`) VALUES
(1, 'T1', '12m²', 0, NULL, NULL),
(2, 'T2', '24m²', 0, NULL, NULL),
(3, 'T3', '12m²', 0, NULL, NULL),
(4, 'T4', '12m²', 0, NULL, NULL),
(5, 'T6', '12m²', 0, NULL, NULL),
(6, 'T8', '12m²', 0, NULL, NULL),
(7, 'T9', '12m²', 0, NULL, NULL),
(8, 'T10', '12m²', 0, NULL, NULL),
(9, 'T6', '125m²', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `postnom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `nom`, `postnom`, `prenom`, `sexe`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'super@gmail.com', 'super@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$wmrD/TFrbUh1lYCT/JCveu3DkRGI4PNfpI8VUP1J4lx1fSc7Y3/.e', NULL, NULL, NULL),
(2, 1, 'Admin', 'admin@gmail.com', 'admin@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$te2y4cRHrjQ4M5uBbJTZtuX/gIK4Wz07RCCYwWDZbfhlsqs37sr4q', NULL, NULL, NULL),
(3, 4, 'AgentTerrain', 'agent@gmail.com', 'agent@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$PnBFCvtRIAOOFagL5p6B6uu2s0zlXH1rbUV8Y9rYu8jpypuVU6/qy', NULL, NULL, NULL),
(4, 5, 'AgentTerrain', 'caissier@gmail.com', 'caissier@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$eVEdvN1WfsMsjSMWtM1FnenvU.wt.7OwS62CFXjukWIM1.lOrHb2e', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendeurs`
--

CREATE TABLE `vendeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_unique` varchar(250) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `postnom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` varchar(4) DEFAULT NULL,
  `lieu_naissance` varchar(100) DEFAULT NULL,
  `date_naissance` varchar(100) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `etat_civil` varchar(50) DEFAULT NULL,
  `commune` varchar(100) DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'attente',
  `userValidateur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_pavilon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `datecreation` varchar(255) DEFAULT NULL,
  `nom_chef_pavillon` varchar(255) DEFAULT NULL,
  `nbr_table` varchar(20) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `numero_patente` varchar(150) DEFAULT NULL,
  `numCompteBancaire` varchar(150) DEFAULT NULL,
  `rccm` varchar(150) DEFAULT NULL,
  `piece_identite` varchar(60) DEFAULT NULL,
  `piece_identite_date_expiration` varchar(20) DEFAULT NULL,
  `numero_national` varchar(18) DEFAULT NULL,
  `personne_de_reference` text DEFAULT NULL,
  `ancien_nouveau` tinyint(1) NOT NULL DEFAULT 1,
  `agentBanque` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendeurs`
--

INSERT INTO `vendeurs` (`id`, `code_unique`, `nom`, `postnom`, `prenom`, `sexe`, `lieu_naissance`, `date_naissance`, `residence`, `telephone`, `nationalite`, `etat_civil`, `commune`, `photo`, `etat`, `userValidateur_id`, `agent_id`, `type_pavilon_id`, `datecreation`, `nom_chef_pavillon`, `nbr_table`, `statut`, `numero_patente`, `numCompteBancaire`, `rccm`, `piece_identite`, `piece_identite_date_expiration`, `numero_national`, `personne_de_reference`, `ancien_nouveau`, `agentBanque`, `created_at`, `updated_at`) VALUES
(1, 'KN/ZD/2024/000001', 'ilunga', 'ilunga', 'jonathan', 'M', 'Kinshasa', '2000-08-01', '73, Songololo', '0811748411', 'congolais', 'Célibataire', 'KINSHASA', '', 'traiter', NULL, 2, NULL, '2024-08-01 13:29:02', NULL, NULL, NULL, 'Num pat', NULL, '122ds', 'Carte d\'électeur', NULL, '00001234', NULL, 1, 0, '2024-08-01 12:29:02', '2024-08-01 12:47:29'),
(2, 'KN/ZD/2024/000002', 'Jon', 'kenge', 'jonathan', 'M', 'Kinshasa', '2024-08-01', '73, Songololo', '6019521325', 'congolais', 'Célibataire', 'Mountain View', 'avatars/Jon_1722526777.jpg', 'traiter', NULL, 2, NULL, '2024-08-01 15:39:37', NULL, NULL, NULL, 'skql', NULL, '122ds', 'Carte d\'électeur', NULL, '1188755', NULL, 1, 0, '2024-08-01 14:39:38', '2024-08-01 15:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `vendeur_demandes`
--

CREATE TABLE `vendeur_demandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pavillon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `place_id` bigint(20) UNSIGNED DEFAULT NULL,
  `emplacement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quatite` double NOT NULL DEFAULT 0,
  `prix` double NOT NULL DEFAULT 0,
  `mois` double DEFAULT 7,
  `total` double NOT NULL DEFAULT 0,
  `remise` double NOT NULL DEFAULT 0,
  `decision` varchar(2) DEFAULT NULL,
  `userValidateur` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendeur_demandes`
--

INSERT INTO `vendeur_demandes` (`id`, `vendeur_id`, `article_id`, `pavillon_id`, `place_id`, `emplacement_id`, `quatite`, `prix`, `mois`, `total`, `remise`, `decision`, `userValidateur`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 6, 3, 1, 1000, 0, 1000, 0, '1', 2, '2024-08-01 12:29:02', '2024-08-01 12:32:58'),
(2, 1, 2, 1, 6, 2, 1, 1000, 0, 1000, 0, '1', 2, '2024-08-01 12:29:02', '2024-08-01 12:44:42'),
(3, 1, 2, 1, 6, NULL, 1, 1000, 0, 1000, 0, '0', 2, '2024-08-01 12:29:02', '2024-08-01 12:45:14'),
(4, 1, 2, NULL, 6, NULL, 1, 1000, 0, 1000, 0, NULL, 0, '2024-08-01 12:29:02', '2024-08-01 12:29:02'),
(5, 1, 2, NULL, 6, NULL, 1, 1000, 0, 1000, 0, NULL, 0, '2024-08-01 12:29:02', '2024-08-01 12:29:02'),
(6, 2, 4, 1, 8, 4, 1, 1000, 8, 8000, 0, '1', 2, '2024-08-01 14:39:38', '2024-08-01 15:40:14'),
(7, 2, 4, 2, 8, 166, 1, 1000, 8, 8000, 0, '1', 2, '2024-08-01 14:39:38', '2024-08-01 16:56:37'),
(8, 2, 2, NULL, 6, NULL, 1, 1000, 9, 9000, 0, NULL, 0, '2024-08-01 14:39:38', '2024-08-01 14:39:38'),
(9, 2, 2, NULL, 6, NULL, 1, 1000, 9, 9000, 0, NULL, 0, '2024-08-01 14:39:38', '2024-08-01 14:39:38'),
(10, 2, 2, NULL, 6, NULL, 1, 1000, 7, 7000, 0, NULL, 0, '2024-08-01 14:39:38', '2024-08-01 14:39:38'),
(11, 2, 2, NULL, 6, NULL, 1, 1000, 7, 7000, 0, NULL, 0, '2024-08-01 14:39:38', '2024-08-01 14:39:38'),
(12, 2, 2, NULL, 6, NULL, 1, 1000, 7, 7000, 0, NULL, 0, '2024-08-01 14:39:38', '2024-08-01 14:39:38'),
(13, 2, 2, NULL, 6, NULL, 1, 1000, 7, 7000, 0, NULL, 0, '2024-08-01 14:39:38', '2024-08-01 14:39:38'),
(14, 2, 2, NULL, 6, NULL, 1, 1000, 7, 7000, 0, NULL, 0, '2024-08-01 14:39:38', '2024-08-01 14:39:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_nom_unique` (`nom`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_categorie_id_foreign` (`categorie_id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avoirs`
--
ALTER TABLE `avoirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avoirs_type_pavilon_id_foreign` (`type_pavilon_id`),
  ADD KEY `avoirs_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `avoirs_pavillon_id_foreign` (`pavillon_id`);

--
-- Indexes for table `concerners`
--
ALTER TABLE `concerners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concerners_place_id_foreign` (`place_id`),
  ADD KEY `concerners_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `concerners_article_id_foreign` (`article_id`);

--
-- Indexes for table `emplacements`
--
ALTER TABLE `emplacements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emplacements_pavillon_id_foreign` (`pavillon_id`),
  ADD KEY `emplacements_place_id_foreign` (`place_id`),
  ADD KEY `emplacements_article_id_foreign` (`article_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nouveau_pavillions`
--
ALTER TABLE `nouveau_pavillions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nouveau_pavillions_nom_unique` (`nom`),
  ADD UNIQUE KEY `nouveau_pavillions_code_unique` (`code`),
  ADD UNIQUE KEY `nouveau_pavillions_place_id_unique` (`place_id`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiements_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `paiements_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `paimentts`
--
ALTER TABLE `paimentts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paimentts_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `paimentts_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pavillons`
--
ALTER TABLE `pavillons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pavillons_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_type_place_id_foreign` (`type_place_id`);

--
-- Indexes for table `posseders`
--
ALTER TABLE `posseders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posseders_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `posseders_place_id_foreign` (`place_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `type_pavilons`
--
ALTER TABLE `type_pavilons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_pavilons_nom_unique` (`nom`);

--
-- Indexes for table `type_places`
--
ALTER TABLE `type_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `vendeurs`
--
ALTER TABLE `vendeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendeurs_code_unique_unique` (`code_unique`),
  ADD KEY `vendeurs_uservalidateur_id_foreign` (`userValidateur_id`),
  ADD KEY `vendeurs_agent_id_foreign` (`agent_id`),
  ADD KEY `vendeurs_type_pavilon_id_foreign` (`type_pavilon_id`);

--
-- Indexes for table `vendeur_demandes`
--
ALTER TABLE `vendeur_demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendeur_demandes_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `vendeur_demandes_article_id_foreign` (`article_id`),
  ADD KEY `vendeur_demandes_pavillon_id_foreign` (`pavillon_id`),
  ADD KEY `vendeur_demandes_place_id_foreign` (`place_id`),
  ADD KEY `vendeur_demandes_emplacement_id_foreign` (`emplacement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avoirs`
--
ALTER TABLE `avoirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concerners`
--
ALTER TABLE `concerners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nouveau_pavillions`
--
ALTER TABLE `nouveau_pavillions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paimentts`
--
ALTER TABLE `paimentts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pavillons`
--
ALTER TABLE `pavillons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posseders`
--
ALTER TABLE `posseders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_pavilons`
--
ALTER TABLE `type_pavilons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_places`
--
ALTER TABLE `type_places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendeurs`
--
ALTER TABLE `vendeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendeur_demandes`
--
ALTER TABLE `vendeur_demandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `article_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `avoirs`
--
ALTER TABLE `avoirs`
  ADD CONSTRAINT `avoirs_pavillon_id_foreign` FOREIGN KEY (`pavillon_id`) REFERENCES `pavillons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avoirs_type_pavilon_id_foreign` FOREIGN KEY (`type_pavilon_id`) REFERENCES `type_pavilons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avoirs_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `concerners`
--
ALTER TABLE `concerners`
  ADD CONSTRAINT `concerners_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `concerners_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `concerners_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emplacements`
--
ALTER TABLE `emplacements`
  ADD CONSTRAINT `emplacements_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emplacements_pavillon_id_foreign` FOREIGN KEY (`pavillon_id`) REFERENCES `pavillons` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emplacements_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paiements_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `paimentts`
--
ALTER TABLE `paimentts`
  ADD CONSTRAINT `paimentts_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paimentts_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pavillons`
--
ALTER TABLE `pavillons`
  ADD CONSTRAINT `pavillons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_type_place_id_foreign` FOREIGN KEY (`type_place_id`) REFERENCES `type_places` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `posseders`
--
ALTER TABLE `posseders`
  ADD CONSTRAINT `posseders_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posseders_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `vendeurs`
--
ALTER TABLE `vendeurs`
  ADD CONSTRAINT `vendeurs_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeurs_type_pavilon_id_foreign` FOREIGN KEY (`type_pavilon_id`) REFERENCES `type_pavilons` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeurs_uservalidateur_id_foreign` FOREIGN KEY (`userValidateur_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `vendeur_demandes`
--
ALTER TABLE `vendeur_demandes`
  ADD CONSTRAINT `vendeur_demandes_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_emplacement_id_foreign` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacements` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_pavillon_id_foreign` FOREIGN KEY (`pavillon_id`) REFERENCES `pavillons` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
