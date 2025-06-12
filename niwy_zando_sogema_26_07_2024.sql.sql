-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2024 at 04:28 PM
-- Server version: 8.0.37-0ubuntu0.23.10.2
-- PHP Version: 8.2.10-2ubuntu2.2

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
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `categorie_id` bigint UNSIGNED DEFAULT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `save_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avoirs`
--

CREATE TABLE `avoirs` (
  `id` bigint UNSIGNED NOT NULL,
  `type_pavilon_id` bigint UNSIGNED NOT NULL,
  `vendeur_id` bigint UNSIGNED NOT NULL,
  `pavillon_id` bigint UNSIGNED NOT NULL,
  `userValidateur` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concerners`
--

CREATE TABLE `concerners` (
  `id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `vendeur_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  `userValidateur` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emplacements`
--

CREATE TABLE `emplacements` (
  `id` bigint UNSIGNED NOT NULL,
  `numero` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pavillon_id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `save_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emplacements`
--

INSERT INTO `emplacements` (`id`, `numero`, `pavillon_id`, `place_id`, `article_id`, `etat`, `save_by`, `created_at`, `updated_at`) VALUES
(1, '3', 1, 6, 2, 0, NULL, NULL, NULL),
(2, '5', 1, 6, 2, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint UNSIGNED NOT NULL,
  `montant_cdf` double DEFAULT NULL,
  `montant_usd` double DEFAULT NULL,
  `datepaiment` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_nationalite` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_maison` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_kiosque` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_autre` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendeur_id` bigint UNSIGNED NOT NULL,
  `agent_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paimentts`
--

CREATE TABLE `paimentts` (
  `id` bigint UNSIGNED NOT NULL,
  `montant_cdf` double DEFAULT NULL,
  `montant_usd` double DEFAULT NULL,
  `datepaiment` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_nationalite` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_maison` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_kiosque` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_autre` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendeur_id` bigint UNSIGNED NOT NULL,
  `agent_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pavillons`
--

CREATE TABLE `pavillons` (
  `id` bigint UNSIGNED NOT NULL,
  `numero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` int DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
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
(25, 'BOLINGO / ECOLE', 0, NULL, NULL, NULL),
(26, 'BOLINGO / ECOLE', 1, NULL, NULL, NULL),
(27, 'BOLINGO / ECOLE', 2, NULL, NULL, NULL),
(28, 'BOLINGO / ECOLE', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `type_place_id` bigint UNSIGNED DEFAULT NULL,
  `orientation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `save_by` int DEFAULT NULL,
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
(7, 'Magasin', 2000, 2, 'EX', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posseders`
--

CREATE TABLE `posseders` (
  `id` bigint UNSIGNED NOT NULL,
  `vendeur_id` bigint UNSIGNED NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `nbr` double NOT NULL DEFAULT '0',
  `prix` double NOT NULL DEFAULT '0',
  `total` double DEFAULT NULL,
  `nbr_retenu` double NOT NULL DEFAULT '0',
  `maitre_cube` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `maitre_cube_retenu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `decision` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userValidateur` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimension` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `save_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_places`
--

INSERT INTO `type_places` (`id`, `nom`, `dimension`, `save_by`, `created_at`, `updated_at`) VALUES
(1, 'T1', '12m²', 0, NULL, NULL),
(2, 'T1', '24m²', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postnom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `nom`, `postnom`, `prenom`, `sexe`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'super@gmail.com', 'super@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$Vw1.jQAZYLaWFteZRGxqI.zJ54ZYu969p3C76omKZS17/uIpS.P16', NULL, NULL, NULL),
(2, 1, 'Admin', 'admin@gmail.com', 'admin@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$kW0dh8crNtZEqRb1kH2nzuK.7w6bZgK.amx9nIPEgS4Lf.UL5q/Xq', NULL, NULL, NULL),
(3, 4, 'AgentTerrain', 'agent@gmail.com', 'agent@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$vcN6dJnkcHSj1HBniRjl9ON8UKq04UyA0yUthCPi1ghqv8kM2Y4Je', NULL, NULL, NULL),
(4, 5, 'AgentTerrain', 'caissier@gmail.com', 'caissier@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$bCOHUU4tgkdTQNMevRR9V.uN10fvhDZtuZLxvIdF3PB2/addW3T6q', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendeurs`
--

CREATE TABLE `vendeurs` (
  `id` bigint UNSIGNED NOT NULL,
  `code_unique` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postnom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_naissance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalite` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat_civil` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci,
  `etat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'attente',
  `userValidateur_id` bigint UNSIGNED DEFAULT NULL,
  `agent_id` bigint UNSIGNED DEFAULT NULL,
  `type_pavilon_id` bigint UNSIGNED DEFAULT NULL,
  `datecreation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_chef_pavillon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_table` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_patente` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numCompteBancaire` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rccm` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piece_identite` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piece_identite_date_expiration` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_national` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personne_de_reference` text COLLATE utf8mb4_unicode_ci,
  `ancien_nouveau` tinyint(1) NOT NULL DEFAULT '1',
  `agentBanque` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendeur_demandes`
--

CREATE TABLE `vendeur_demandes` (
  `id` bigint UNSIGNED NOT NULL,
  `vendeur_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED DEFAULT NULL,
  `pavillon_id` bigint UNSIGNED DEFAULT NULL,
  `place_id` bigint UNSIGNED DEFAULT NULL,
  `emplacement_id` bigint UNSIGNED DEFAULT NULL,
  `quatite` double NOT NULL DEFAULT '0',
  `prix` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `decision` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userValidateur` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avoirs`
--
ALTER TABLE `avoirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concerners`
--
ALTER TABLE `concerners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emplacements`
--
ALTER TABLE `emplacements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nouveau_pavillions`
--
ALTER TABLE `nouveau_pavillions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paimentts`
--
ALTER TABLE `paimentts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pavillons`
--
ALTER TABLE `pavillons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posseders`
--
ALTER TABLE `posseders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_pavilons`
--
ALTER TABLE `type_pavilons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_places`
--
ALTER TABLE `type_places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendeurs`
--
ALTER TABLE `vendeurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendeur_demandes`
--
ALTER TABLE `vendeur_demandes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `article_categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

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
  ADD CONSTRAINT `concerners_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `concerners_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emplacements`
--
ALTER TABLE `emplacements`
  ADD CONSTRAINT `emplacements_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `emplacements_pavillon_id_foreign` FOREIGN KEY (`pavillon_id`) REFERENCES `pavillons` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `emplacements_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `paiements_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `paimentts`
--
ALTER TABLE `paimentts`
  ADD CONSTRAINT `paimentts_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `paimentts_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `pavillons`
--
ALTER TABLE `pavillons`
  ADD CONSTRAINT `pavillons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_type_place_id_foreign` FOREIGN KEY (`type_place_id`) REFERENCES `type_places` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

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
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `vendeurs`
--
ALTER TABLE `vendeurs`
  ADD CONSTRAINT `vendeurs_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeurs_type_pavilon_id_foreign` FOREIGN KEY (`type_pavilon_id`) REFERENCES `type_pavilons` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeurs_uservalidateur_id_foreign` FOREIGN KEY (`userValidateur_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `vendeur_demandes`
--
ALTER TABLE `vendeur_demandes`
  ADD CONSTRAINT `vendeur_demandes_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_emplacement_id_foreign` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacements` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_pavillon_id_foreign` FOREIGN KEY (`pavillon_id`) REFERENCES `pavillons` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `vendeur_demandes_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
