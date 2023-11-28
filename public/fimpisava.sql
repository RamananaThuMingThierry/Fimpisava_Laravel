-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 nov. 2023 à 13:49
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fimpisava`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

DROP TABLE IF EXISTS `filieres`;
CREATE TABLE IF NOT EXISTS `filieres` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_filieres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id`, `nom_filieres`) VALUES
(1, 'Droit'),
(2, 'Informatique'),
(3, 'Sécurité Nucléaire'),
(4, 'Gestion'),
(5, 'Sociologie'),
(6, 'Anglais'),
(7, 'Histoire'),
(8, 'Géographie'),
(9, 'Mécanique'),
(10, 'Commerce et Marketing'),
(11, 'Mathématique Informatique'),
(12, 'Communication'),
(13, 'Médicine Humaine'),
(14, 'BTP'),
(15, 'Génie Civile'),
(16, 'Mathématique'),
(17, 'Physique'),
(18, 'SVT'),
(19, 'Tourisme et Hôtellerie'),
(20, 'Paramèdes'),
(21, 'Agronomie'),
(22, 'Comptabilité et Finance'),
(23, 'Economie'),
(24, 'Environnement'),
(25, 'Mandarin'),
(26, 'Géoscience'),
(27, 'Allemand'),
(28, 'Pharmacie'),
(29, 'Sciences'),
(30, 'Electrique'),
(31, 'Français'),
(32, 'Nouveau Bachelier'),
(33, 'PSEG'),
(34, 'PSI'),
(35, 'Format FPTSD'),
(36, 'Sage Femme'),
(37, 'Anésthesiste'),
(38, 'Malagasy');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_07_133730_create_filieres_table', 1),
(7, '2023_11_07_133737_create_personnes_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(5, 'App\\Models\\User', 1, 'ramananathumingthierry@gmail.com_Token', 'f80d4c48e358266e3d59688a494397fb690f7d79de04d70e124b92d4bfa911ca', '[\"*\"]', '2023-11-28 01:08:13', NULL, '2023-11-28 01:08:09', '2023-11-28 01:08:13'),
(6, 'App\\Models\\User', 1, 'ramananathumingthierry@gmail.com_Token', '387a87370675e1a8e4f65c50a0218349bc2d44764869b4fc19473c20210f8184', '[\"*\"]', '2023-11-28 02:31:29', NULL, '2023-11-28 01:08:14', '2023-11-28 02:31:29');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_carte` int DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `lieu_de_naissance` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Fonction dans la FI.MPI.S.A.V.A',
  `contact` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Numéro de téléphone parent ou tuteur',
  `date_inscription` date DEFAULT NULL COMMENT 'Date d''inscription',
  `filieres_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personnes_filieres_id_foreign` (`filieres_id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `photo`, `numero_carte`, `nom`, `prenom`, `date_de_naissance`, `lieu_de_naissance`, `niveau`, `district`, `adresse`, `profession`, `fonction`, `contact`, `facebook`, `telephone`, `date_inscription`, `filieres_id`) VALUES
(1, 'uploads/fimpisava/1700996087.jpg', 1, 'TSARATOMBO', 'Véronel Jacques', '1991-12-20', 'Vohémar', 'Master 2', 'Vohemar', 'Bloc 41 porte C1', 'Etudiant', '2', '0328203287', 'Véronel', '0320465088', '2021-01-26', 3),
(2, 'uploads/fimpisava/1700995959.jpg', 2, 'RAZAKA Henri', 'Bien-Aimé', '1989-12-11', 'Vohémar', 'Doctorat', 'Vohemar', 'CU Ambohipo Bloc 17 B2', 'Etudiant', 'Etudiant', '0325017048', 'Razaka Henri Bien-Aimé', '0329608896', '2021-01-26', 23),
(3, 'uploads/fimpisava/1700995809.jpg', 3, 'TALATA', 'Arson', '1994-12-27', 'SAMBAVA', 'Master 1', 'Antalaha', 'Logement 424 Cité Civile Ambohipo', 'Opérateur économique', 'Opérateur économique', '0327029979', 'TalataArson@yahoo.fr', '0325074000', '2021-02-27', 4),
(4, 'uploads/fimpisava/1700995831.jpg', 4, 'BODONAMBININTSOA', 'Velontsana Angelaise', '1996-03-10', 'Ampahateza TANA II', 'Licence 3', 'Sambava', 'CU Ankatso II Bloc 34 Porte 06', 'Etudiant', 'Etudiant', '0322737686', 'Angelaise Trevis', '0322737686', '2021-01-26', 4),
(5, 'uploads/fimpisava/1700996233.jpg', 5, 'JAO', 'Flerio', '1992-08-23', 'Antalaha', 'Master 2', 'Antalaha', 'Cité Universitaire Ankatso I Porte 102', 'Etudiant Chercheur', '9', '0325119117', 'JAO Flerio', '0320473150', '2021-01-26', 5),
(6, 'uploads/fimpisava/1700996425.jpg', 6, 'TSARAZARA', 'Emile', '1995-01-25', 'Ampialivana', 'Licence 2', 'Vohemar', 'CU Ambohipo Bloc 108 Porte B2', 'Etudiant', '9', '0329868564', 'Emile Jobilahely', '0344460316', '2021-01-26', 4),
(7, 'uploads/fimpisava/1701000518.jpg', 7, 'ZAFY', 'Thely Marka', '1998-05-13', 'Andapa', 'Master 1', 'Andapa', 'Ambatoroka VB 30 LF', 'Etudiant', '9', '0326316692', 'Marka', '0324242194', '2021-01-26', 28),
(8, 'uploads/fimpisava/1701000677.jpg', 8, 'FAINA', 'Manix', '1991-06-06', 'Sambava', 'Licence 3', 'Sambava', 'Cité Universitaire R+3 Vert Ankatso II', 'Etudiant', '9', '0327368344', 'Hosny Faina', '0324499837', '2021-01-26', 16),
(9, NULL, 9, 'RAKOTOZAFY', 'Thaliano Georges', '1999-09-10', 'Port Bergé', 'Licence 1', 'Andapa', 'Cité Universitaire Ankatso I Bloc Hangar Porte 38', 'Etudiant', '8', '0322140639', 'Thaliano Be Georges', '0340142438', '2021-01-26', 4),
(10, 'uploads/fimpisava/1701000994.jpg', 10, 'TSIAVALA', 'Thierry', '1992-03-31', 'Sambava', 'Master 1', 'Sambava', 'Bloc 50 Ambohipo', 'Etudiant', '0', '0327368004', 'Thierry Van\'t off', '0324051856', '2021-01-26', 14),
(11, 'uploads/fimpisava/1701057861.jpg', 11, 'MARIO', '', '1997-06-10', 'Amboriala(Vohemar)', 'Master 1', 'Vohemar', 'Ankatso II, Bloc 34 Porte D1', 'Etudiant', '5', '0327224913', 'Mario rj', '0341233312', '2021-01-26', 10),
(12, 'uploads/fimpisava/1701058093.jpg', 12, 'RASOARIMANANA', 'Farda Edmond', '1994-06-07', 'Antalaha', 'Licence 3', 'Antalaha', 'Cité Universitaire Ankatso II Bloc 34 Porte 7', 'Etudiante', '3', '0326193015', 'Rfe Farda', '0320499946', '2021-01-26', 5),
(13, 'uploads/fimpisava/1701058305.jpg', 13, 'MAVITRIKY', 'Orel', '1993-02-24', 'Farahalana', 'Master 1', 'Sambava', 'Ampahateza LOT VT 9', 'Etudiant', '0', '0326799811', 'MAVITRIKY Orel', '0326726301', '2021-02-06', 4),
(14, 'uploads/fimpisava/1701058443.jpg', 14, 'JAOMORA', 'Ornello Yandriel', '1997-06-20', 'Vohémar', 'Master 1', 'Vohemar', 'Ankatso II Bloc 38 Porte 3', 'Etudiant', '0', '0327706067', 'Nello O\' Malley', '0325470202', '2021-01-26', 5),
(15, 'uploads/fimpisava/1701058613.jpg', 15, 'MAHAZOMILA', 'Raparitoavina Noeline Manitra', '1996-12-24', 'Antalaha', 'Master 1', 'Antalaha', 'CU Ankatso II Bloc 67 Porte 8', 'Etudiante', '0', '0326688151', 'Manitra Noeline', '0325150251', '2021-01-26', 4),
(16, 'uploads/fimpisava/1701058794.jpg', 16, 'ANDRIAMAROSATA', 'Jean Metoula', '1993-08-23', 'Sambava', 'Master 1', 'Sambava', 'CU Ambohipo Bloc 26 Porte C2', 'Etudiant', '0', '0329780271', 'Conio Thomas', '0325179236', '2021-01-26', 5),
(17, 'uploads/fimpisava/1701059374.jpg', 18, 'ZAVALAHY', 'Johnny Keita', '1994-02-22', 'Vohémar', 'Master 1', 'Antalaha', 'CU Ambohipo Bloc 80 Porte C2', 'Etudiant', '0', '0327240254', 'Keita Johnny', '0324005166', '2021-01-26', 5),
(18, NULL, 17, 'RAZAFIMBAHINY', 'Josilin', '1994-10-19', 'Morafeno SAMBAVA', 'Master 2', 'Sambava', 'CU Ankatso I Bloc Rsto Porte 42 bis/2', 'Etudiant', '0', '0326191134', 'Protocol Mageso', '0326191134', '2021-01-26', 1),
(19, 'uploads/fimpisava/1701059766.jpg', 19, 'DAHIMENA', 'Richelin', '1994-08-19', 'Antalaha', '6ème Année', 'Antalaha', 'Ankatso I Porte 339 Bloc Gotham', 'Etudiant', '0', '0329602599', 'Richelin Neymar', '0329602599', '2021-01-26', 13),
(20, 'uploads/fimpisava/1701059910.jpg', 20, 'VOAVY', 'Scoria', '1998-10-01', 'Antanambazaha', 'Licence 2', 'Sambava', 'CU Ankatso II Bloc 32 Porte 5', 'Etudiante', '6', '0326135069', 'Scoria Kaïra', '0321187640', '2021-01-26', 12),
(21, 'uploads/fimpisava/1701060047.jpg', 21, 'SADARY', 'Buck Perrier', '1996-02-20', 'Andapa', 'Licence 3', 'Andapa', 'CU Ankatso II Bloc 46 Porte 8c', 'Etudiant', '9', '0326200712', 'Buck Perrier', '0327893150', '2021-02-06', 4),
(22, 'uploads/fimpisava/1701060426.jpg', 22, 'RASOANIRINA', 'Francisca', '1995-08-19', 'Vohémar', 'Licence 3', 'Vohemar', 'CU Ankatso II Bloc 62 Porte 4', 'Etudiante', '0', '0328422506', 'Isca Orlane', '0324128858', '2021-02-27', 20),
(23, 'uploads/fimpisava/1701060415.jpg', 23, 'HELIVINE', 'Natacha Noro', '1995-11-30', 'Vohémar', 'Master 2', 'Vohemar', 'CU Ankatso II R+3 Rose Porte 310', 'Etudiante', '0', '0322638789', 'HELIVINE Natacha', '0320493863', '2021-02-26', 5),
(24, 'uploads/fimpisava/1701060554.jpg', 24, 'KOMODY', 'Romain', '1990-01-16', 'Antalaha', 'Master 1', 'Antalaha', 'CU Ankatso I bLOC Baobab Porte MP 74/01', 'Etudiant', '5', '0322123083', 'Romain Komody', '0347360898', '2021-03-21', 7),
(25, 'uploads/fimpisava/1701060683.jpg', 25, 'NIRINA', 'Jennifer Elissa', '1999-07-11', 'Sambava', 'Licence 1', 'Andapa', 'CU Ankatso I Bloc le nouvel Porte 44', 'Etudiante', '0', '0322127604', 'Elissa Jennifer', '0320463384', '2021-03-29', 24),
(26, 'uploads/fimpisava/1701060861.jpg', 26, 'JAONARY', 'NEVITIEN NEDIMANCHE', '1994-09-29', 'Antalaha', 'Master 1', 'Antalaha', 'CU Ankatso I Porte 96B', 'Etudiant', '0', '0322965071', 'JYW Wesh', '0326299098', '2021-09-05', 5),
(27, NULL, 27, 'SIAKA', 'Doness', '1990-07-30', 'Antalaa', 'Master 2', 'Antalaha', 'Ambolikandrina', 'Etudiant', '0', '0324492020', 'Doness Masiaka', '0326660334', '2021-09-05', 30),
(28, 'uploads/fimpisava/1701067184.jpg', 39, 'RAJAOZAFY', 'Ismael Brice', '1995-11-28', 'Sirama Ambilobe', 'Licence 2', 'Vohemar', 'CU Ankatso II Porte 7', 'Etudiant', '3', '0348254174', 'Ismael Domboldore', '0328174909', '2021-02-05', 6),
(29, 'uploads/fimpisava/1701067501.jpg', 40, 'RAZAKANIANA RANJANIRINA', 'Marie Antoinnette', '1997-07-11', 'Ambatosoratra Amparafaravola', 'Licence 3', 'Sympathisant(e)', 'CU Ankatso I Bloc Texas Porte 320', 'Etudiante', '3', '0325218085', NULL, '0346154771', '2021-02-05', 29),
(30, NULL, 41, 'RAKOTONDRAVITA', 'Mariana', '2001-05-23', 'Antsirabe-Nord', 'Licence 1', 'Vohemar', 'Ambohipo', 'Etudiante', '3', '0327885864', 'Mariana RAKOTONDRAVITA', '0324840729', '2021-02-05', 31),
(31, 'uploads/fimpisava/1701068666.jpg', 42, 'JAOMANJARY', 'Brendel', '2002-04-06', 'Antsiranana', 'Licence 1', 'Sympathisant(e)', 'Bloc CA Porte 129 GB', 'Etudiant', '3', '0328437584', 'Brendel Firstman', '0325295940', '2021-01-26', 13),
(32, 'uploads/fimpisava/1701069368.jpg', 43, 'RAHERINANDRASANA', 'Ladie Carina', '2002-06-29', 'Ambodivoanio', 'Licence 1', 'Sympathisant(e)', 'CU Ankatso II Bloc 50 porte 1 A', 'Etudiante', '3', '0322680705', 'Ladie Carina RAHERINANDRASANA', '0345511652', '2021-01-26', 13),
(33, 'uploads/fimpisava/1701073382.jpg', 44, 'RAVELONTAHINA', 'Gergio', '1995-11-27', 'Antalaha', 'Master 1', 'Antalaha', 'CU Ankatso II, Bloc 44 Porte 4A', 'Etudiant', '3', '0324420744', 'Georgio Ravelontahina', '0320205276', '2021-01-26', 10),
(34, 'uploads/fimpisava/1701073507.jpg', 45, 'RAZAFINDRAHIRA', 'Armando Vincent', '2001-05-31', 'Antalaha', 'Licence 1', 'Antalaha', 'CU Ankatso II Bloc 1 Porte 7C', 'Etudiant', '3', '0322795218', 'Armando El-gardenzio', '0343795152', '2021-01-26', 11),
(35, 'uploads/fimpisava/1701073779.jpg', 46, 'RASOANIRINA Marie', 'Edmine Siva Généviève', '1999-09-24', 'Narovato', 'Licence 1', 'Sympathisant(e)', 'CU Ankatso II Bloc 33 Porte 8', 'Etudiant', '3', '0348830072', 'Généviève Sin\'artine', '0340388544', '2021-01-26', 5),
(36, 'uploads/fimpisava/1701075479.jpg', 47, 'MARY', 'Phagiola Lydonie', '2003-11-27', 'Daraina', NULL, 'Sympathisant(e)', 'CU Ankatso II Bloc 33 Porte 8', 'Etudiante', '3', '0324666572', 'Phagiola Lydonie', '0328138490', '2021-01-26', 32),
(37, 'uploads/fimpisava/1701075811.jpg', 48, 'PERY', 'TOMMY', '1996-11-02', 'Ambilobe', 'Licence 3', 'Sympathisant(e)', 'CU Ambohipo Bloc CAP 192 GB', 'Etudiant', '3', '0327118748', 'Armmar Tommy', '0328886116', '2021-01-26', 12),
(38, 'uploads/fimpisava/1701077760.jpg', 49, 'BEMIASA', 'Franckline Elisabeth', '1999-09-01', 'Antalaha', 'Licence 1', 'Antalaha', 'CU Ankatso II Bloc 28 Porte 2', 'Etudiante', '3', '0325041468', 'BEMIASA Franckline Elisabeth', '0325098638', '2021-01-26', 5),
(39, 'uploads/fimpisava/1701077933.jpg', 50, 'MEDONE Mahidah', 'Kelly Nancia', '1998-07-20', 'Antalaha', 'Licence 1', 'Antalaha', 'CU Ambohipo Bloc 126 F', 'Etudiante', '3', '0327366347', 'Naïdah Kelly', '0327151328', '2021-01-26', 4),
(40, 'uploads/fimpisava/1701078086.jpg', 51, 'RIVOLAZA', 'Sergio', '1999-09-16', 'Befandriana Nord', 'Licence 1', 'Sympathisant(e)', 'CU Ambohipo Bloc 126 F', 'Etudiant', '3', '0327151328', 'Sergio Hasley', '0337816669', '2021-01-26', 5),
(41, 'uploads/fimpisava/1701078369.jpg', 52, 'RAMISINIRINA', 'Stephania', '2000-12-12', 'Amboangibe', 'Licence 1', 'Sambava', 'Bloc CA Porte 126 C', 'Etudiante', '3', '0327316714', 'RAMISINIRINA Stephania', '0324184199', '2021-01-26', 4),
(42, 'uploads/fimpisava/1701078525.jpg', 53, 'RANDRIAMIFIDY', 'Rojo', '1996-05-12', 'Vohémar', 'Master 1', 'Vohemar', 'CU Ambohipo Bloc 95 Porte D2', 'Etudiante', '3', '0326303420', NULL, '0324166533', '2021-01-26', 5),
(43, 'uploads/fimpisava/1701078764.jpg', 54, 'LALATIANA', 'Marie Esther', '2003-06-03', 'Antalaha', 'Licence 2', 'Antalaha', 'CU Ambohiopo Bloc 95 D2', 'Etudiante', '3', '0329663844', 'Marie Esther', '0324166533', '2021-01-26', 20),
(44, 'uploads/fimpisava/1701078996.jpg', 55, 'NANELE', '', '1993-09-10', 'Maromokotra', 'Master 2', 'Vohemar', 'CU Ambohipo Bloc 17 Porte D2', 'Etudiant', '3', '0324411579', 'Nanele Stalvitch', '0325045409', '2021-01-26', 16),
(45, 'uploads/fimpisava/1701082924.jpg', 56, 'SIDA Tsikitokiana', 'Sylvete', '2002-05-13', 'Ambondiangezoko', NULL, 'Vohemar', 'CU Ambohipo Bloc 17 Porte D2', 'Etudiante', '3', '0328168180', 'Sylvette Sida', '0324290755', '2021-01-26', 32),
(46, 'uploads/fimpisava/1701089876.jpg', 57, 'RABENDRINA', 'Romialpha', '2000-12-22', 'Anjahana Maroantsetra', 'Licence 1', 'Sympathisant(e)', 'CU Ankatso I Bloc SEXY Porte 96', 'Etudiant', '3', '0325968122', 'Romi-Alpha Anti-Zaka', '0341368329', '2021-01-27', 33),
(47, 'uploads/fimpisava/1701090068.jpg', 5, 'RAZAFINIRINA', 'Labera Lartino', '2001-10-03', 'Antalaha', 'Licence 1', 'Antalaha', 'CU Ambohipo Bloc 82 Porte B2', 'Etudiant', '3', '0324789738', NULL, '0322768635', '2021-01-27', 31),
(48, 'uploads/fimpisava/1701090237.jpg', 59, 'MAHATOKY', 'Jean Laures', '2000-03-12', 'Sambava', 'Licence 2', 'Antalaha', 'CU Ankatso I Porte 575', 'Etudiant', '3', '0325235382', 'MAHATOKY Jean Laures', '0326688683', '2021-01-28', 21),
(49, 'uploads/fimpisava/1701090377.jpg', 60, 'NAMBININA', 'Jean Judiano', '1999-07-20', 'Antalaha', 'Licence 3', 'Antalaha', 'LOT VT 85 RCK Andohanimandroseza', 'Etudiant', '3', '0326688683', 'Jood Iano', '0325192418', '2021-01-27', 1),
(50, 'uploads/fimpisava/1701090510.jpg', 61, 'TIANJARA', 'Jacquinot', '1996-02-20', 'Sambava', 'Licence 1', 'Sambava', 'Antsirabe', 'Etudiant', '3', '0342034624', 'TIANJARA Jacquinot', '0324861891', '2021-02-03', 34),
(51, 'uploads/fimpisava/1701090647.jpg', 62, 'RASOARIMALALA', 'Myriella', '1999-01-05', 'Andapa', 'Licence 2', 'Andapa', 'Ambohipo', 'Etudiante', '3', '0327122549', 'Asheley Catharyana', '0328316718', '2021-02-04', 24),
(52, 'uploads/fimpisava/1701090827.jpg', 63, 'MAZOTO', 'Luciano', '2001-05-17', 'Antalaha', 'Licence 1', 'Antalaha', 'Ambohipo', 'Etudiant', '3', '0329103634', 'Luciano L5', '0329103634', '2021-02-04', 4),
(53, 'uploads/fimpisava/1701090952.jpg', 64, 'LEZOMA', 'Anaïce', '2000-04-12', 'Antalaha', 'Licence 2', 'Antalaha', 'CU Ankatso II Bloc 5', 'Etudiante', '3', '0326661711', 'Anaïce Nazianzy', '0320468544', '2021-02-04', 22),
(54, 'uploads/fimpisava/1701091111.jpg', 65, 'RANDRIANANDRASANA', 'Sylvain', '1997-08-01', 'Ambatovaveteny Ouest Antanifotsy', 'Licence 2', 'Sympathisant(e)', 'CUA Bloc 21 Porte B1', 'Etudiant', '3', '0322526289', NULL, '0322526289', '2021-02-04', 5),
(55, 'uploads/fimpisava/1701091264.jpg', 66, 'RABEMIANDRY', 'Jean Anislin', '1998-02-27', 'Andapa', 'Licence 1', 'Andapa', 'CU Ankatso II Bloc 61', 'Etudiante', '3', '0327063891', 'Nitchiller Onisclin', '0327215968', '2021-02-04', 14),
(56, 'uploads/fimpisava/1701091458.jpg', 67, 'RAMAHAVANONA', 'Exaviot', '1996-04-23', 'Andrakata Andapa', 'Licence 1', 'Andapa', 'CU Ambohipo Bloc 10 Porte C2', 'Etudiant', '3', '0329917013', 'Foung Hermav Flourith', '0328275415', '2021-02-05', 24),
(57, 'uploads/fimpisava/1701091662.jpg', 68, 'RAZAFINDRARORA', 'Catricia', '1994-11-18', 'Anjialavabe', 'Licence 3', 'Andapa', 'CU Ambohipo Bloc 10 Porte C2', 'Etudiant', '3', '0345167308', 'Hajany Catricia', '0344820323', '2021-02-05', 36),
(58, 'uploads/fimpisava/1701091834.jpg', 69, 'RAJAONESY', 'Arson Eloi', '1998-07-11', 'Ambodisatrana', 'Licence 3', 'Andapa', 'CU Ankatso II Bloc 62 Porte 7A', 'Etudiant', '3', '0326517968', 'Eloi Rajaonesy', '0329218993', '2021-02-05', 5),
(59, 'uploads/fimpisava/1701092006.jpg', 70, 'BAVY', 'Francine Brundà', '2001-06-07', 'Maroambihy', 'Licence 1', 'Sambava', 'CU Ankatso I Bloc Hangar Port 29', 'Etudiante', '3', '0327017454', 'Brunda BAVY', '0326622704', '2021-02-05', 1),
(60, 'uploads/fimpisava/1701092249.jpg', 71, 'BELALAHY', 'Canuse Stéphanie', '1996-07-17', '67Ha Tana I', 'Master 2', 'Antalaha', 'CU Ankatso I Bloc Texas Porte 315', 'Etudiante', '3', '0326069600', 'Ya elle', '0342073132', '2021-02-05', 5),
(61, 'uploads/fimpisava/1701092377.jpg', 72, 'BELALAHY', 'Camille Miquel', '1999-04-16', 'Antananarivo', 'Licence 1', 'Antalaha', 'CU Ankatso I Bloc Texas Porte 315', 'Etudiant', '3', '0322567922', 'Valdese', '0326069660', '2021-02-05', 1),
(62, 'uploads/fimpisava/1701092553.jpg', 73, 'AMAVATRA', 'Jaysonn Chrystopher', '2001-04-11', 'Vohémar', 'Licence 2', 'Vohemar', 'CU Ankatso II Bloc 29 Porte 7', 'Etudiant', '3', '0346242867', 'Jays Carson', '0328174909', '2021-02-05', 25),
(63, 'uploads/fimpisava/1701092704.jpg', 74, 'TARIMISOA', 'Jemilla Lo-mine', '2002-08-15', 'Antalaha', 'Licence 2', 'Antalaha', 'CU Ankatso I', 'Etudiante', '3', '0326341175', 'Jemilla Lo-mine', '0341662285', '2021-02-06', 4),
(64, 'uploads/fimpisava/1701093452.jpg', 75, 'HAJANIRINA Haingo', 'Malala Jonathan', '2001-03-13', 'Amparafaravola', NULL, 'Antalaha', 'CU Ambohipo Bloc 2 C1', 'Etudiante', '3', '0346419182', 'Joh Nathan', '0342136399', '2021-02-06', 32),
(65, 'uploads/fimpisava/1701093574.jpg', 76, 'HIANASY', 'Sandra Mégane', '2002-03-10', 'Vohémar', 'Licence 2', 'Vohemar', 'Ambohipo', 'Etudiante', '3', '0324121199', 'Sandra Mégane', '0324806903', '2021-02-06', 4),
(66, 'uploads/fimpisava/1701093714.jpg', 77, 'RAFINOSY', 'Nirina Edia', '2000-02-29', 'Vohémar', 'Licence 2', 'Vohemar', 'Ambohipo', 'Etudiante', '3', '0324700519', 'Eh diah', '0324858406', '2021-02-06', 4),
(67, 'uploads/fimpisava/1701093896.jpg', 78, 'RAKOTONDRAVAO', 'Givanot Frantonel', '1998-05-23', 'Fenerivo-Est', 'Licence 1', 'Sympathisant(e)', 'CU Ankatso II Bloc 18', 'Etudiant', '3', '0343860422', 'Zoe JKing', '0344658546', '2021-02-06', 26),
(68, 'uploads/fimpisava/1701094043.jpg', 79, 'RAMAROSON', 'Marie Andie', '2001-08-08', 'Vohémar', 'Licence 2', 'Vohemar', 'CU Ankatso II Bloc 32 Porte 5B', 'Etudiante', '3', '0326962271', 'Andie Sharnilla', '0320247939', '2021-02-06', 4),
(69, 'uploads/fimpisava/1701094185.jpg', 80, 'RALAIARISON', 'Ziggy Johann', '1997-01-15', 'Vohémar', NULL, 'Vohemar', '-', 'Etudiant', '3', '0325802577', 'Tayler Scott', '0325802577', '2021-02-07', 32),
(70, 'uploads/fimpisava/1701094363.jpg', 81, 'NANTNAINASOA', 'Marie Clerina', '2003-02-14', 'Antalaha', NULL, 'Antalaha', 'CU Ankatso II Bloc 45 Porte 2A', 'Etudiante', '3', '0327676801', 'Cle rinae', '0324548621', '2021-02-07', 32),
(71, 'uploads/fimpisava/1701094552.jpg', 82, 'VELOTOMBO', 'Francela', '2002-04-01', 'Ambohitralanana', NULL, 'Antalaha', 'CU Ambohipo Bloc A1', 'Etudiante', '3', '0327808243', 'Francela Whitney', '0328624522', '2021-02-07', 32),
(72, 'uploads/fimpisava/1701094643.jpg', 83, 'RAVELONDRINA', 'Jean Claude', '1997-02-17', 'Andapa', NULL, 'Andapa', 'Hangar Porte 38', 'Etudiant', '3', '0322745957', 'Ndrina Jean Claude', '0341286505', '2021-02-07', 32),
(73, 'uploads/fimpisava/1701094788.jpg', 84, 'RANDRIMANANTENA', 'Jese', '2002-09-15', 'Sambava', NULL, 'Sambava', 'Ambohipo', 'Etudiant', '3', '0326713443', 'Walker Boy', '0324019858', '2021-02-07', 32),
(74, NULL, 85, 'RABENARISON', 'Jean Elin', '1997-09-01', 'Andapa', NULL, 'Andapa', 'CU Ambohipo Bloc 76', 'Etudiant', '3', '0325182962', 'Jean Elin', '0329710146', '2021-02-07', 32),
(75, NULL, 86, 'SOA', 'Véronique', '2001-02-15', 'Antsahambova Vohémar', 'Licence 1', 'Andapa', 'CU Ankatso II Bloc 46 Porte 3C', 'Etudiante', '3', '0325947811', 'SOA Veronicà', '0344754001', '2021-02-07', 18),
(76, NULL, 87, 'FRANCINETTE', 'Junah Ursula', '1998-08-29', 'Sambava', 'Master 1', 'Sambava', 'CU Ankatso II Bloc 46 Porte 3C', 'Etudiante', '3', '0324754001', 'Hantatina Junah Junah', '0327347217', '2021-02-07', 37),
(77, NULL, 88, 'RANDRIANJARA', 'Luciano', '1999-01-01', 'Belambo-lokoho', 'Licence 1', 'Andapa', 'CU Ankatso II Bloc 23 Porte 7', 'Etudiant', '3', '0325073736', 'RANDRIANJARA Luciano', '0329324987', '2021-02-07', 23),
(78, NULL, 89, 'RAMANANJARA', 'Zidiolin', '1997-05-08', 'Belambo-lokoho', 'Licence 1', 'Andapa', 'CU Ankatso II Bloc 23 Porte 7B', 'Etudiant', '3', '0329324987', 'Jundy Olin', '0325073736', '2021-02-07', 38),
(79, NULL, 90, 'RASOAVIVIANA', 'Synthia', '1997-12-30', 'Andapa', 'Licence 1', 'Andapa', 'CU Bloc SAPIN porte 1', 'Etudiante', '3', '0324026913', 'Rebecca Cloïe', '0323418260', '2021-02-08', 8),
(80, NULL, 81, 'RAHARINORO', 'Florencia', '1995-10-04', 'Nosiarina', 'Licence 1', 'Sambava', 'Ambohipo', 'Etudiante', '3', '0327195427', NULL, '0324962881', '2021-02-08', 31),
(81, NULL, 91, 'ANONA RAVAONIRINA Marie', 'Angelina Cunthia', '1995-01-22', 'Antalaha', 'Licence 3', 'Sambava', 'CU Ankatso II Bloc 17 Porte 2A', 'Etudiante', '3', '0324926881', 'Anona Angelina', '0324886507', '2021-02-08', 5),
(82, NULL, 93, 'RAZANAJATOVO', 'Eryslin', '1998-01-28', 'Amboangibe', 'Licence 1', 'Sambava', 'CU Ankatso I Bloc Amitie Porte 184A', 'Etudiant', '3', '0324305608', 'Ei - RAZANAJATOVO', '0328374367', '2021-02-08', 5),
(83, NULL, 94, 'RANDRIANTSOA', 'David', '2000-03-15', 'Antsirabe-Nord', 'Licence 1', 'Vohemar', 'CU Ankatso I Bloc Racrementeaux', 'Etudiant', '3', '0324413774', NULL, '0345250116', '2021-02-08', 5),
(84, NULL, 95, 'MANDIMBISON  LOLA', 'Jean Eric', '1996-10-13', 'MANBENA', 'Licence 1', 'Sambava', 'CU Ankatso II Bloc Amical II Porte 11', 'Etudiant', '3', '0325139235', NULL, '0328855262', '2021-02-08', 7),
(85, NULL, 96, 'MILASOA', 'Jededia Sylvie', '2000-12-06', 'Sambava', 'Licence 2', 'Sambava', 'CU Ambohipo Bloc 31', 'Eudiante', '3', '0322455538', 'Cecilia', '0324071381', '2021-02-08', 12),
(86, NULL, 97, 'LAIVAO FERNANDO', 'Charnos', '2001-12-21', 'Antalaha', 'Licence 1', 'Antalaha', 'CU Ambohipo Bloc 31', 'Etudiant', '3', '0326004974', 'N03 Johnson', '0324071381', '2021-02-08', 13),
(87, NULL, 98, 'ANDRIAMAHEFA Ainafifaliana', 'Nadia', '1999-12-06', 'Antsirabe', 'Licence 2', 'Sympathisant(e)', 'CU Ambohipo Bloc 77', 'Etudiante', '3', '0342659357', 'Lyana Andriamahefa', '0344518152', '2021-02-08', 13),
(88, NULL, 99, 'MAMY', 'Céhetha', '1993-06-12', 'Sambava', 'Master 2', 'Andapa', 'CU Ambohipo Bloc 119 Porte A1', 'Etudiant', '3', '0324179477', NULL, '0325946948', '2021-02-08', 11),
(89, NULL, 100, 'ADOLE', 'ZAMANY', '1992-10-05', 'Maroambihy', 'Licence 2', 'Sambava', 'CU Ambohipo Bloc 22 Porte B2', 'Etudiant', '3', '0322526289', NULL, '0325638014', '2021-02-09', 4),
(90, NULL, 101, 'RABEARIVELO', 'Stephano', '1995-03-12', 'Andapa', 'Master 2', 'Andapa', 'CU Ankatso II Bloc 62 Porte 07C', 'Etudiant', '3', '0326775617', NULL, '0327029810', '2021-02-09', 8),
(91, NULL, 102, 'JEAN', 'Flovio', '1998-03-14', 'Andapa', 'Licence 1', 'Andapa', 'CU Ambohipo Bloc 170 Porte C2', 'Etudiant', '3', '0327222951', 'Elian Maruo', '0349375151', '2021-02-09', 29);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '0: utilisateurs et 1 : administrateurs',
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `image`, `pseudo`, `email`, `email_verified_at`, `password`, `roles`, `remember_token`) VALUES
(1, NULL, 'RAMANANA Thu Ming Thierry', 'ramananathumingthierry@gmail.com', NULL, '$2y$12$mjkAMsHJksgB2RQZFhzpjezVUFc9E/u0SV3bFXMo2cz1ZIDIgS0cW', '1', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `personnes_filieres_id_foreign` FOREIGN KEY (`filieres_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
