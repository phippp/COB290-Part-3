-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2021 at 08:16 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makeitall`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `branches`
--

TRUNCATE TABLE `branches`;
--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `address_line_1`, `address_line_2`, `city`, `country`, `postcode`, `phone_number_base`) VALUES
(1, 'Apt. 485', 'Ransom Burgs', 'Port Javierside', 'Comoros', '18928-3790', '496608734'),
(2, 'Suite 808', 'Tina Field', 'North Keeleychester', 'Macao', '85032-5791', '356218910'),
(3, 'Apt. 516', 'Wilkinson Estate', 'Runolfsdottirmouth', 'Benin', '10934', '865738560'),
(4, 'Suite 288', 'Senger Extension', 'Jacobsonmouth', 'Philippines', '71683', '864713749'),
(5, 'Apt. 877', 'Ocie Trace', 'Evangelinehaven', 'Philippines', '21606-7545', '848780592'),
(6, 'Suite 885', 'Osinski Shores', 'Fritschmouth', 'Turks and Caicos Islands', '84156', '971682824'),
(7, 'Suite 850', 'Myah Streets', 'Wilfredside', 'Montserrat', '03355-4419', '150804028'),
(8, 'Apt. 993', 'Rohan Manor', 'Denesikton', 'Egypt', '40842-5008', '052723030'),
(9, 'Suite 010', 'Rebeka Mission', 'Doyleview', 'Somalia', '53850-7497', '773311017'),
(10, 'Apt. 341', 'Greenholt Land', 'Wittinghaven', 'Rwanda', '31793-3505', '535839633');

-- --------------------------------------------------------

--
-- Table structure for table `call_logs`
--

DROP TABLE IF EXISTS `call_logs`;
CREATE TABLE `call_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_at` timestamp NOT NULL,
  `problem_log_id` bigint UNSIGNED NOT NULL,
  `specialist_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `call_logs`
--

TRUNCATE TABLE `call_logs`;
--
-- Dumping data for table `call_logs`
--

INSERT INTO `call_logs` (`id`, `description`, `edited_at`, `problem_log_id`, `specialist_id`, `client_id`) VALUES
(1, 'Autem illo accusamus nemo a sed quia accusamus sit molestiae.', '2021-03-28 18:10:12', 1, 14, 13),
(2, 'Nemo ipsum ipsum mollitia magnam aliquid dolor et autem veniam.', '2021-03-28 18:10:12', 2, 14, 17),
(3, 'Molestiae voluptas illum rem odit sit ut quos est velit.', '2021-03-28 18:10:12', 2, 14, 17),
(4, 'Incidunt odio laudantium aut ut molestias nostrum accusamus dolorem deserunt.', '2021-03-28 18:10:12', 2, 14, 17),
(5, 'Nostrum nihil corporis accusantium et id molestiae qui eum modi.', '2021-03-28 18:10:12', 3, 16, 19),
(6, 'In velit velit quod enim aut porro quas debitis repudiandae.', '2021-03-28 18:10:12', 3, 16, 19),
(7, 'Tempore magnam repellat ipsum sapiente occaecati molestiae qui impedit alias.', '2021-03-28 18:10:12', 3, 16, 19),
(8, 'Aliquid inventore natus ad et molestiae qui dolores rerum aut.', '2021-03-28 18:10:12', 4, 14, 8),
(9, 'Et at qui sint perspiciatis sed corrupti saepe molestiae ex.', '2021-03-28 18:10:12', 4, 14, 8),
(10, 'Aut nemo saepe nesciunt ipsa tempore nulla soluta repellendus qui.', '2021-03-28 18:10:12', 4, 14, 8),
(11, 'Consequuntur nulla ut dolores deserunt reprehenderit cum distinctio magni ipsa.', '2021-03-28 18:10:12', 5, 16, 1),
(12, 'Natus et culpa soluta occaecati repellendus ratione nesciunt iusto voluptatem.', '2021-03-28 18:10:12', 5, 16, 1),
(13, 'Et sed voluptas praesentium modi vel voluptatem rem sapiente laboriosam.', '2021-03-28 18:10:12', 6, 14, 3),
(14, 'Ut aspernatur dolor reiciendis nihil natus qui voluptatem atque quam.', '2021-03-28 18:10:12', 6, 14, 3),
(15, 'Aut quidem asperiores vero repellat vel accusantium et deleniti ab.', '2021-03-28 18:10:12', 7, 16, 3),
(16, 'Minima exercitationem aspernatur numquam autem animi aut eum ut rerum.', '2021-03-28 18:10:12', 7, 16, 3),
(17, 'Fugiat laboriosam ut consequatur maxime temporibus omnis nobis perspiciatis molestias.', '2021-03-28 18:10:12', 8, 16, 2),
(18, 'Optio et incidunt tempora corrupti labore incidunt velit non dolor.', '2021-03-28 18:10:12', 9, 14, 7),
(19, 'Quos ad nisi minus eum aspernatur laborum pariatur et atque.', '2021-03-28 18:10:12', 9, 14, 7),
(20, 'Magnam molestias voluptatem reprehenderit nisi qui vel et quis quia.', '2021-03-28 18:10:12', 9, 14, 7),
(21, 'Dolorem inventore vero similique quo sapiente perspiciatis nemo veritatis necessitatibus.', '2021-03-28 18:10:12', 11, 16, 2),
(22, 'Delectus optio sequi et consequatur consectetur velit nam aut ut.', '2021-03-28 18:10:12', 11, 16, 2),
(23, 'Debitis rerum odio ullam mollitia voluptas explicabo inventore qui consequatur.', '2021-03-28 18:10:12', 11, 16, 2),
(24, 'Doloribus ratione sunt quia assumenda qui maiores quos qui iste.', '2021-03-28 18:10:12', 12, 14, 18),
(25, 'Ut in et hic impedit sed quis expedita ut maxime.', '2021-03-28 18:10:12', 12, 14, 18),
(26, 'Illum sint nesciunt cupiditate non odio deserunt aspernatur sit error.', '2021-03-28 18:10:12', 12, 14, 18),
(27, 'Ut minima id veritatis maiores eius qui voluptatum officia facere.', '2021-03-28 18:10:12', 13, 16, 18),
(28, 'Et provident perferendis voluptatibus nobis voluptatum rerum corporis esse blanditiis.', '2021-03-28 18:10:12', 13, 16, 18),
(29, 'Illo quia corrupti voluptatem laboriosam omnis blanditiis fugiat et voluptas.', '2021-03-28 18:10:12', 14, 14, 20),
(30, 'Sed a voluptates deleniti ratione id labore officia aut cupiditate.', '2021-03-28 18:10:12', 14, 14, 20),
(31, 'Deserunt autem fugiat delectus vitae modi eveniet est sed et.', '2021-03-28 18:10:12', 14, 14, 20),
(32, 'Nulla voluptas vel ut corporis molestias et qui perferendis tempore.', '2021-03-28 18:10:12', 17, 14, 8),
(33, 'Nostrum possimus illo facere sunt voluptates aut ut harum ex.', '2021-03-28 18:10:12', 18, 16, 3),
(34, 'Tempora est rerum consequuntur ratione nostrum sed nesciunt itaque eum.', '2021-03-28 18:10:12', 18, 16, 3),
(35, 'Saepe et est earum repellat optio facere sit quisquam est.', '2021-03-28 18:10:12', 19, 14, 2),
(36, 'Aut dicta tenetur mollitia est dolor qui pariatur dignissimos similique.', '2021-03-28 18:10:12', 20, 16, 17),
(37, 'Quia doloremque quibusdam dolores odio et voluptatem ut cum accusantium.', '2021-03-28 18:10:12', 20, 16, 17),
(38, 'Magnam nisi doloremque in accusamus veritatis exercitationem eum vitae illum.', '2021-03-28 18:10:12', 20, 16, 17),
(39, 'Vitae sed ullam neque aperiam qui dolor aut dolorum qui.', '2021-03-28 18:10:12', 22, 16, 15),
(40, 'Enim itaque quo qui beatae perferendis quidem est vel delectus.', '2021-03-28 18:10:12', 22, 16, 15),
(41, 'Inventore dolorem eos doloribus veniam mollitia et labore sit consequatur.', '2021-03-28 18:10:12', 25, 14, 17),
(42, 'Qui non blanditiis exercitationem ut consequuntur ut distinctio eveniet nemo.', '2021-03-28 18:10:12', 26, 16, 12),
(43, 'Occaecati ut ea rem labore similique atque perspiciatis minus dolorem.', '2021-03-28 18:10:12', 26, 16, 12),
(44, 'Similique ut eum possimus odio dicta et aut porro voluptatem.', '2021-03-28 18:10:12', 26, 16, 12),
(45, 'Aliquam non dolor quia reprehenderit enim modi odio repudiandae libero.', '2021-03-28 18:10:12', 27, 14, 4),
(46, 'Harum nostrum natus consequuntur animi pariatur doloremque provident quia quos.', '2021-03-28 18:10:12', 27, 14, 4),
(47, 'Velit quis consequatur eos voluptas natus qui cum voluptates quidem.', '2021-03-28 18:10:12', 27, 14, 4),
(48, 'Rerum et nam voluptas qui iure laudantium beatae ullam nihil.', '2021-03-28 18:10:12', 28, 14, 8),
(49, 'Excepturi consectetur sed tempora aut officiis in dolorem est ut.', '2021-03-28 18:10:12', 28, 14, 8),
(50, 'Aliquam tempore dolor eligendi modi explicabo expedita similique aut consectetur.', '2021-03-28 18:10:12', 28, 14, 8),
(51, 'Doloremque consequuntur assumenda ut tempore libero cumque voluptas adipisci sit.', '2021-03-28 18:10:12', 29, 16, 18),
(52, 'Et est iste delectus dolorem fugiat veritatis id quasi dolorem.', '2021-03-28 18:10:12', 29, 16, 18),
(53, 'Voluptas qui iusto consequatur incidunt explicabo sit et fugit est.', '2021-03-28 18:10:12', 30, 14, 17),
(54, 'Delectus voluptas sed est qui in sunt ut eum deserunt.', '2021-03-28 18:10:12', 35, 14, 19),
(55, 'Eum eos rerum earum necessitatibus rem quae qui veniam nobis.', '2021-03-28 18:10:12', 35, 14, 19),
(56, 'In sint ab architecto placeat quia iste repellendus eos rem.', '2021-03-28 18:10:12', 35, 14, 19),
(57, 'Tenetur aliquam et quae quidem quos vel distinctio debitis aut.', '2021-03-28 18:10:12', 36, 16, 13),
(58, 'Officiis vel facilis dolor velit iure suscipit aperiam et nisi.', '2021-03-28 18:10:12', 36, 16, 13),
(59, 'Reprehenderit eligendi in sit aut perferendis animi tenetur cum voluptas.', '2021-03-28 18:10:12', 37, 16, 15),
(60, 'Non sequi expedita molestiae possimus voluptas minima nobis temporibus voluptatem.', '2021-03-28 18:10:12', 37, 16, 15),
(61, 'Eos pariatur natus ex est sequi illum id soluta ex.', '2021-03-28 18:10:12', 39, 14, 3),
(62, 'Nulla consequatur labore aut et similique id rerum suscipit in.', '2021-03-28 18:10:12', 39, 14, 3),
(63, 'Ut quae provident ipsam odit enim consequatur sit a sunt.', '2021-03-28 18:10:12', 39, 14, 3),
(64, 'Id voluptate eum rem labore ipsa quidem aut nostrum omnis.', '2021-03-28 18:10:12', 40, 14, 7),
(65, 'Accusamus consequatur ut corrupti totam iste natus ducimus labore soluta.', '2021-03-28 18:10:13', 41, 16, 9),
(66, 'Natus sunt non eum laboriosam iusto dolorum debitis dolorem asperiores.', '2021-03-28 18:10:13', 41, 16, 9),
(67, 'Culpa sapiente et maxime enim ut aut nihil voluptatem rem.', '2021-03-28 18:10:13', 41, 16, 9),
(68, 'Natus voluptas cumque dolores est ea a tenetur ad omnis.', '2021-03-28 18:10:13', 42, 16, 9),
(69, 'Optio eum dolores et sequi voluptatum ex nulla ex quaerat.', '2021-03-28 18:10:13', 42, 16, 9),
(70, 'Provident similique quo sit ullam quo reiciendis odit cumque explicabo.', '2021-03-28 18:10:13', 43, 16, 13),
(71, 'Est aut voluptas error et et et quibusdam et eos.', '2021-03-28 18:10:13', 43, 16, 13),
(72, 'Beatae rem quos quidem ullam voluptatem qui dolor in ipsum.', '2021-03-28 18:10:13', 46, 16, 10),
(73, 'Culpa possimus odio architecto eum enim et ut labore eveniet.', '2021-03-28 18:10:13', 47, 14, 13),
(74, 'Fuga ipsum recusandae facere quidem reprehenderit aliquid tempore illum quos.', '2021-03-28 18:10:13', 47, 14, 13),
(75, 'Dolorum animi aut a tenetur exercitationem laborum eum incidunt placeat.', '2021-03-28 18:10:13', 47, 14, 13),
(76, 'Eveniet aut quia labore quisquam animi iure delectus et dolorem.', '2021-03-28 18:10:13', 48, 16, 3),
(77, 'Quas ut illum quia veniam nihil non et odio aut.', '2021-03-28 18:10:13', 48, 16, 3),
(78, 'Veritatis qui qui ipsa est in magnam qui repudiandae quod.', '2021-03-28 18:10:13', 48, 16, 3),
(79, 'Et eligendi non veritatis at quidem quis optio nesciunt aut.', '2021-03-28 18:10:13', 49, 16, 4),
(80, 'Laborum illo ut sint atque suscipit iste possimus omnis et.', '2021-03-28 18:10:13', 49, 16, 4),
(81, 'Corrupti aliquid omnis occaecati minima ut ut aliquam a delectus.', '2021-03-28 18:10:13', 51, 14, 3),
(82, 'Labore praesentium doloribus distinctio soluta at quia omnis placeat facere.', '2021-03-28 18:10:13', 51, 14, 3),
(83, 'Omnis quis veniam quidem labore voluptate nam ut ex exercitationem.', '2021-03-28 18:10:13', 51, 14, 3),
(84, 'Placeat similique quae dignissimos sed qui ullam aperiam totam eaque.', '2021-03-28 18:10:13', 54, 14, 12),
(85, 'Corrupti eius atque molestias ea aut veniam corrupti est porro.', '2021-03-28 18:10:13', 54, 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `phone_number_extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `employees`
--

TRUNCATE TABLE `employees`;
--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `forename`, `surname`, `email_address`, `job_id`, `branch_id`, `phone_number_extension`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Catherine', 'Welch', 'gage79@example.net', 5, 5, '5183', 'ht', '2021-03-28 13:58:01', '2021-03-28 13:58:01'),
(2, 'Samanta', 'Pfeffer', 'chelsie99@example.net', 1, 10, '9340', 'hu', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(3, 'Mohammad', 'Labadie', 'xquigley@example.com', 6, 3, '8296', 'ik', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(4, 'Maribel', 'Beier', 'celestino27@example.net', 4, 1, '8833', 'aa', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(5, 'Cristina', 'Leffler', 'chesley72@example.net', 5, 6, '2270', 'be', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(6, 'Makenzie', 'Lubowitz', 'anissa88@example.com', 1, 6, '9790', 'ro', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(7, 'Tanner', 'O\'Hara', 'ryleigh.heathcote@example.com', 4, 6, '1714', 'et', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(8, 'Leanna', 'McKenzie', 'tina38@example.org', 2, 10, '9897', 'ak', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(9, 'Hiram', 'Fadel', 'miracle.hackett@example.com', 5, 2, '2004', 'ms', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(10, 'Marcelina', 'Crist', 'tyrel.cummings@example.org', 3, 2, '2090', 'hr', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(11, 'Elroy', 'Kirlin', 'gbayer@example.com', 6, 10, '5884', 'lo', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(12, 'Kobe', 'Oberbrunner', 'jaeden.kohler@example.org', 4, 4, '6508', 'ii', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(13, 'Conrad', 'Koepp', 'srobel@example.com', 2, 9, '2959', 'tk', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(14, 'Mitchell', 'Reinger', 'glesch@example.com', 8, 5, '4376', 'zu', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(15, 'Weldon', 'Jakubowski', 'mariah.jaskolski@example.net', 1, 2, '8143', 'ar', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(16, 'Myrtle', 'Boyer', 'litzy73@example.net', 7, 2, '4813', 've', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(17, 'Zelma', 'Labadie', 'hstroman@example.com', 6, 3, '5917', 'sm', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(18, 'Alvena', 'Pacocha', 'ijakubowski@example.com', 1, 3, '1850', 'mn', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(19, 'Wilfred', 'Batz', 'berge.freeman@example.com', 6, 6, '1858', 'hz', '2021-03-28 13:58:02', '2021-03-28 13:58:02'),
(20, 'Brady', 'Wintheiser', 'gorczany.jedidiah@example.net', 2, 5, '1844', 'nd', '2021-03-28 13:58:02', '2021-03-28 13:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
CREATE TABLE `hardware` (
  `id` bigint UNSIGNED NOT NULL,
  `serial_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `hardware`
--

TRUNCATE TABLE `hardware`;
--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`id`, `serial_num`, `name`, `type`, `make`) VALUES
(1, '0190677c-8a45-36b8-85b9-9ef643b046a2', 'Ad voluptatem necessitatibus.', 'eaque', 'Botsford and Sons'),
(2, 'e98e2695-a54a-355b-8c11-b5ee2e4ffef5', 'Sequi sapiente dolore.', 'quaerat', 'Corwin Ltd'),
(3, '99b45863-ee67-3288-b945-f0387c6906eb', 'Placeat ut est.', 'facere', 'Trantow, Wehner and Leffler'),
(4, '27c2496f-7ecd-346a-9fd7-95a6a6d0f51e', 'Voluptas qui debitis non.', 'sint', 'Conroy, Thiel and Keeling'),
(5, '4bcc57e5-b43a-38fd-a980-d80ddf46e0b7', 'Autem molestias perspiciatis et.', 'labore', 'Heathcote-Quitzon'),
(6, '05fff2ed-ef24-30a2-8db5-e64c7e85fadd', 'Saepe nulla commodi.', 'aliquid', 'Krajcik-O\'Hara'),
(7, '7df52c35-fe2e-3f81-975a-9cddca5309b7', 'Excepturi asperiores eum.', 'consequatur', 'Schiller LLC'),
(8, 'b313974f-a229-3fb0-9223-971c88d8d7f2', 'Accusamus laborum.', 'sit', 'Stark, Romaguera and Reilly'),
(9, 'e2602e57-f00b-3ea1-a24c-ac0735b79b12', 'Modi dolor possimus.', 'est', 'Erdman-Deckow'),
(10, 'e8e07007-f21d-399b-b97e-8db0a134f6a6', 'Voluptate quidem animi vero.', 'eum', 'Kozey and Sons'),
(11, '635460bc-9ec7-31ca-874a-360c64289fa2', 'Id sequi quod illo.', 'eos', 'Konopelski, Rolfson and Dibbert'),
(12, 'cee35843-bf02-318b-bf14-f832894fcca2', 'Sit rem dolorem quasi fugiat.', 'fugit', 'Yost-Thompson'),
(13, '7bec1afd-e956-3056-b787-4701fd62c9c7', 'Laboriosam maxime quaerat molestias.', 'voluptatem', 'Breitenberg, Gibson and Swift'),
(14, '7c1f15e1-1425-30ad-b6d1-33de3ec7d8b2', 'Odit est doloremque exercitationem.', 'quis', 'Wiza, Kshlerin and Fay'),
(15, '2af55d0c-b8da-3403-b62e-3f7660dd42e6', 'Ipsam alias.', 'sint', 'Buckridge-Gleason'),
(16, 'bb9fd2aa-d239-3e10-a954-08d54ea10ec7', 'Voluptatem sit.', 'ut', 'Kerluke-Casper'),
(17, 'e6365f8f-f95e-3b26-b446-5efd6319ea10', 'Eos incidunt eum.', 'qui', 'Rodriguez-Keeling'),
(18, 'cfc629b9-999e-358e-b358-1c6775de684a', 'Laudantium architecto sit.', 'odit', 'White-Waelchi'),
(19, '673b7c00-4e82-3c92-8031-7cceb4f02e73', 'Voluptas id harum.', 'reprehenderit', 'Jakubowski-Ferry'),
(20, 'a5548619-499b-32aa-a1b3-72a3329f698e', 'Temporibus soluta perferendis perferendis.', 'error', 'Hirthe-White'),
(21, 'fbf887f8-230e-37ad-a296-1d92399947b1', 'Culpa qui impedit nisi.', 'qui', 'Effertz-Stanton'),
(22, '21c80e90-cb2f-32e6-afb2-7facbc228dbb', 'Est recusandae vel.', 'autem', 'Zieme Group'),
(23, '28b30a6d-d9ca-392c-b309-1d13a9d4dfad', 'Expedita possimus atque.', 'sed', 'Kihn-Conn'),
(24, '27068056-15b8-39a9-9f98-6a7d62b9bac0', 'Nihil ea labore.', 'itaque', 'Walker-Anderson'),
(25, 'ff4555b9-70b7-3fae-9702-d64a345a0b02', 'Et ut quo.', 'ducimus', 'Carroll, Kshlerin and Klocko');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE `holidays` (
  `id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `holidays`
--

TRUNCATE TABLE `holidays`;
-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `jobs`
--

TRUNCATE TABLE `jobs`;
--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `type`) VALUES
(1, 'job title 1', 'User'),
(2, 'job title 1', 'User'),
(3, 'job title 2', 'User'),
(4, 'job title 3', 'User'),
(5, 'Sr. job title ', 'User'),
(6, 'Jr. job title ', 'User'),
(7, 'Sr. Specialist', 'Specialist'),
(8, 'Jr. Specialist', 'Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_03_200158_create_job_table', 1),
(2, '2021_03_03_200405_create_branch_table', 2),
(3, '2021_03_03_194258_create_employee_table', 3),
(4, '2021_03_03_200904_create_holiday_table', 3),
(5, '2021_03_03_202021_create_login_table', 3),
(6, '2021_03_03_203234_create_problem_table', 3),
(7, '2021_03_03_203540_create_specialist_skills_table', 3),
(10, '2021_03_03_204212_create_operating_system_table', 3),
(11, '2021_03_03_203813_create_hardware_table', 4),
(12, '2021_03_03_203955_create_software_table', 5),
(13, '2021_03_03_204415_create_problem_log_table', 6),
(17, '2021_03_03_211431_create_specialist_table', 6),
(18, '2021_03_03_210224_create_log_history_table', 7),
(20, '2021_03_03_211114_create_specialist_tracker_table', 7),
(21, '2021_03_21_190358_add_user_column_to_problem_logs', 8),
(22, '2021_03_21_191728_remove_employee_id_from_log_histories_table', 9),
(23, '2021_03_27_180437_rename_log_histories', 10),
(25, '2021_03_03_210702_create_call_history_table', 11),
(26, '2021_03_27_181225_update_problem_notes', 11);

-- --------------------------------------------------------

--
-- Table structure for table `operating_systems`
--

DROP TABLE IF EXISTS `operating_systems`;
CREATE TABLE `operating_systems` (
  `id` bigint UNSIGNED NOT NULL,
  `operating_system_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `operating_systems`
--

TRUNCATE TABLE `operating_systems`;
--
-- Dumping data for table `operating_systems`
--

INSERT INTO `operating_systems` (`id`, `operating_system_name`) VALUES
(1, 'Windows 10'),
(2, 'Windows 8'),
(3, 'Windows 7'),
(4, 'Windows XP'),
(5, 'Ubuntu'),
(6, 'Fedora'),
(7, 'Kali Mint'),
(8, 'macOS High Sierra');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
CREATE TABLE `problems` (
  `id` bigint UNSIGNED NOT NULL,
  `problem_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_id` bigint UNSIGNED DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `problems`
--

TRUNCATE TABLE `problems`;
--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `problem_type`, `problem_id`, `enabled`) VALUES
(1, 'Modi aut.', NULL, 1),
(2, 'Est sunt.', 1, 1),
(3, 'Voluptatibus dolores.', 1, 1),
(4, 'Est sunt.', NULL, 1),
(5, 'Libero cupiditate.', NULL, 1),
(6, 'Quasi non.', 4, 1),
(7, 'Asperiores quis.', NULL, 1),
(8, 'Aut eius.', NULL, 1),
(9, 'Et qui.', 8, 1),
(10, 'Est non.', NULL, 1),
(11, 'Culpa dolorum.', NULL, 1),
(12, 'Excepturi dolores.', 11, 1),
(13, 'Sunt fugit.', 11, 1),
(14, 'Iste facilis.', NULL, 1),
(15, 'Quasi impedit.', NULL, 1),
(16, 'Et ipsa.', 15, 1),
(17, 'Natus commodi.', NULL, 1),
(18, 'Qui placeat.', NULL, 1),
(19, 'Earum eveniet.', NULL, 1),
(20, 'Culpa autem.', NULL, 1),
(21, 'Illum deleniti.', 20, 1),
(22, 'Voluptatem architecto.', 20, 1),
(23, 'Sequi non.', 20, 1),
(24, 'Illo maiores.', 20, 1),
(25, 'Velit praesentium.', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `problem_logs`
--

DROP TABLE IF EXISTS `problem_logs`;
CREATE TABLE `problem_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `hardware_id` bigint UNSIGNED DEFAULT NULL,
  `software_id` bigint UNSIGNED DEFAULT NULL,
  `specialist_assigned` tinyint(1) NOT NULL,
  `operating_system_id` bigint UNSIGNED DEFAULT NULL,
  `problem_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `solved_at` datetime DEFAULT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `problem_logs`
--

TRUNCATE TABLE `problem_logs`;
--
-- Dumping data for table `problem_logs`
--

INSERT INTO `problem_logs` (`id`, `hardware_id`, `software_id`, `specialist_assigned`, `operating_system_id`, `problem_id`, `title`, `description`, `status`, `importance`, `created_at`, `updated_at`, `solved_at`, `employee_id`, `client_id`) VALUES
(1, 21, 3, 1, 6, 18, 'Omnis molestiae rem.', 'Exercitationem iure veniam error ducimus ut quia architecto rem neque atque voluptatem consequatur est voluptatem ab et.', 'In queue', 'High', '2021-03-28 18:10:11', '2021-03-28 18:10:11', NULL, NULL, 13),
(2, 24, 25, 1, NULL, 14, 'Distinctio unde sunt.', 'Iure ratione blanditiis est libero deleniti alias quia aut eligendi sapiente repellendus doloremque vel.', 'In queue', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 17),
(3, 25, NULL, 1, 2, 18, 'Cumque harum perspiciatis dolores.', 'Omnis quas enim ut recusandae quia minus excepturi tempore corrupti laudantium temporibus aut dolorum accusamus dicta sed voluptates at est.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 19),
(4, 5, 24, 1, 5, 11, 'Quis aut aut magnam nam.', 'Rerum molestiae voluptatem eveniet eos iste optio eum laboriosam mollitia earum natus nobis natus.', 'Verified', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 8),
(5, 24, 24, 1, 1, 18, 'Minima ut sed voluptatem.', 'Enim amet et aspernatur vel quam at corporis reiciendis rerum aut ducimus provident magni.', 'Solved', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-28 19:10:12', 16, 1),
(6, 17, NULL, 1, 6, 6, 'Ipsam dolorem architecto.', 'Qui rerum temporibus consequatur laudantium ratione ut non error harum saepe accusamus corrupti aut.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 3),
(7, 10, 3, 1, NULL, 3, 'Error fugiat aut.', 'Explicabo ipsam sed mollitia est omnis rerum blanditiis doloribus quisquam doloribus eveniet doloribus quia omnis quis quasi ut.', 'Solved', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-30 20:10:12', 16, 3),
(8, 1, 11, 1, NULL, 13, 'Doloribus beatae facilis.', 'Consequatur dolorum nostrum modi aspernatur ipsam accusantium hic minima sed distinctio natus voluptatibus aut quis sit quae.', 'In queue', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 2),
(9, NULL, 6, 1, 2, 6, 'Velit et qui repudiandae.', 'Sequi blanditiis pariatur quasi eum placeat odit delectus tempore est.', 'Verified', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 7),
(10, 1, 11, 1, 6, 22, 'Explicabo dicta voluptas non.', 'Ratione explicabo recusandae sint nulla unde enim omnis impedit dolorem aliquam sint praesentium ut qui.', 'Solved', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-31 00:10:12', 16, 8),
(11, NULL, 2, 1, NULL, 18, 'Totam modi consequatur.', 'Et voluptatem eligendi quaerat quibusdam delectus voluptatum animi eum explicabo maiores impedit et incidunt ut voluptatem dolores minima.', 'Verified', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 2),
(12, 5, NULL, 1, 3, 5, 'Quos vel enim perferendis.', 'Optio dolores vel impedit voluptate optio nemo et enim aut iure quo totam quae ipsum aut velit officiis aperiam officia in.', 'In queue', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 18),
(13, 6, 18, 1, NULL, 16, 'Qui quia quia.', 'Incidunt mollitia praesentium enim quo omnis harum laboriosam enim et nihil fugit fugit sint sint tempora sunt.', 'Verified', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 18),
(14, 20, 10, 1, 2, 3, 'Sunt eos.', 'Quis quis veniam nihil porro sint nam quis distinctio quas suscipit eius earum fuga rerum.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 20),
(15, 1, 2, 1, 5, 11, 'Repellat alias porro.', 'Sed officiis autem ipsam sit a et saepe fugiat magnam.', 'Solved', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-29 20:10:12', 14, 1),
(16, NULL, 7, 1, 2, 15, 'In eos quisquam.', 'Et vel dolore magni qui facere voluptates et qui saepe natus dolorum qui id vel eos non nemo ipsa inventore placeat.', 'In queue', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 17),
(17, 10, 23, 1, NULL, 23, 'Reprehenderit pariatur voluptatum quia.', 'Consequatur voluptatem est nisi quia suscipit placeat vel quia eos reiciendis.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 8),
(18, 10, NULL, 1, NULL, 23, 'Amet recusandae debitis assumenda.', 'Commodi ipsum consequatur molestiae nobis vero tempora dignissimos dignissimos eius nihil eius quae officiis sunt.', 'In queue', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 3),
(19, 7, 16, 1, 5, 12, 'Molestias odit molestiae rerum.', 'Impedit vero optio sapiente illum eveniet voluptates praesentium consequatur quasi ex exercitationem quisquam non veniam vitae voluptatibus.', 'Solved', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-31 22:10:12', 14, 2),
(20, 15, 16, 1, NULL, 4, 'Ab sapiente et totam voluptate.', 'Dolorem perferendis inventore consequatur magnam voluptatibus qui eum voluptatum sunt sit rerum quae ab nesciunt.', 'In queue', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 17),
(21, 18, 1, 1, NULL, 7, 'A voluptas sequi molestiae.', 'Officiis veritatis ut qui modi error nisi sint laboriosam quo sapiente atque minima sapiente ipsam.', 'In queue', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 2),
(22, 20, 10, 1, 2, 23, 'Incidunt numquam natus minus.', 'Excepturi laudantium voluptate atque magni quas aliquid repellendus consequatur ut et rem eius eveniet aut.', 'Verified', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 15),
(23, NULL, 14, 0, NULL, 24, 'Voluptatum distinctio sed molestias.', 'Occaecati quas sunt quo dolorum consequatur et ratione qui et harum modi exercitationem in dolores quo dolorem illo pariatur.', 'Solved', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-28 19:10:12', NULL, 1),
(24, 7, NULL, 1, 4, 24, 'Quibusdam quaerat eligendi aut.', 'Nam iusto nihil deleniti voluptatem doloribus occaecati dolor et quos sed harum et non quia consectetur laudantium dolorem aut.', 'In queue', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 7),
(25, 18, 5, 1, NULL, 1, 'Fugiat in vel quaerat.', 'Molestiae cum officiis corrupti dolorem dignissimos doloribus accusantium suscipit saepe nihil consequatur sit.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 17),
(26, 21, 12, 1, 4, 21, 'Aut omnis accusantium ut et.', 'Provident inventore non voluptates vitae autem dolorem voluptatum vitae eius aliquid id a officiis quidem itaque qui.', 'In queue', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 12),
(27, NULL, 10, 1, 2, 19, 'Voluptatem voluptatem eveniet voluptates.', 'Nisi accusamus temporibus voluptatum corrupti aliquam ipsa quibusdam eum rem animi aut provident quisquam excepturi ullam in.', 'Solved', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-29 22:10:12', 14, 4),
(28, 6, 20, 1, 2, 1, 'Et accusamus et.', 'Sit dolorem ut dolores aliquam consequatur velit sed quisquam vitae saepe.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 8),
(29, 13, 4, 1, NULL, 19, 'Temporibus optio debitis.', 'Consequatur cum at quo ea error et quisquam architecto sequi libero repellat id.', 'Verified', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 18),
(30, 8, NULL, 1, NULL, 16, 'Vel at enim.', 'Doloribus nobis rerum est et tempora in expedita consequatur nihil enim ut unde beatae et provident sunt corporis rerum ut.', 'Verified', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 17),
(31, 17, 12, 0, 2, 20, 'Rerum quia vel alias.', 'Ut vel fugiat tenetur maiores numquam veritatis magnam ad distinctio nemo voluptatem quibusdam delectus possimus.', 'Solved', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-28 19:10:12', NULL, 13),
(32, 19, 23, 0, 3, 16, 'Molestiae sit culpa.', 'Doloremque ut doloribus consequuntur quaerat nam quis nesciunt numquam ratione aut autem sequi ea repellendus tempora ut.', 'Solved', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-28 19:10:12', NULL, 10),
(33, 7, 2, 1, 7, 1, 'Rem dolore ut.', 'Nam et placeat nulla dolores ea ea quia facilis tenetur earum.', 'Verified', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 4),
(34, 16, NULL, 0, 5, 8, 'Illo qui dolore voluptatem.', 'Maxime ea temporibus officia eum earum et itaque non sapiente unde est laborum nesciunt voluptatem.', 'Solved', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-28 19:10:12', NULL, 10),
(35, 7, 15, 1, 8, 10, 'Et pariatur ab dolor.', 'Magni qui in asperiores et quos ad vel dolorem error neque ex repudiandae.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 19),
(36, 7, 21, 1, 4, 8, 'Praesentium vel et illo.', 'Repellendus voluptas suscipit voluptatem dolore dolorem temporibus officiis veniam ducimus possimus sapiente libero perspiciatis architecto debitis sunt.', 'Solved', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-29 03:10:12', 16, 13),
(37, NULL, 2, 1, 6, 12, 'Aut quo quasi quia.', 'Autem tempora est architecto est quia vel aliquid et ratione tempora cumque reprehenderit delectus similique.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 15),
(38, 8, 14, 0, 7, 10, 'Eos fugiat accusantium.', 'Assumenda numquam est dignissimos ex ratione voluptates corporis aut aut adipisci quos id sint nobis fuga repellat consequatur dolorem.', 'Solved', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', '2021-03-28 19:10:12', NULL, 12),
(39, 5, NULL, 1, 4, 5, 'Molestiae qui repellendus ut.', 'Iure vel velit recusandae amet est facilis iure est enim aliquid assumenda et amet assumenda facere veritatis voluptas ut.', 'In queue', 'High', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 3),
(40, NULL, 2, 1, 7, 8, 'Nostrum porro vel non.', 'Et velit minus recusandae sequi dolor reprehenderit qui consequatur quasi odio voluptatem reiciendis optio nulla amet quidem.', 'In queue', 'Low', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 7),
(41, NULL, 25, 1, 7, 19, 'Qui ducimus natus.', 'Consequuntur culpa exercitationem eius aut suscipit placeat et dolores saepe ipsum voluptas sapiente similique dolorem error.', 'In queue', 'Medium', '2021-03-28 18:10:12', '2021-03-28 18:10:12', NULL, NULL, 9),
(42, NULL, 22, 1, 6, 4, 'Laboriosam voluptatem officiis.', 'Illum amet dolorum rerum sed minima quibusdam aut explicabo vel voluptatem laudantium tempore id iste.', 'Verified', 'High', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 9),
(43, 11, 9, 1, NULL, 7, 'Quos reprehenderit et.', 'Quam sunt fugiat minima eos est reiciendis ipsum quisquam et itaque exercitationem et sapiente consequatur esse voluptatem.', 'Solved', 'High', '2021-03-28 18:10:13', '2021-03-28 18:10:13', '2021-03-31 22:10:13', 16, 13),
(44, 6, 2, 0, 6, 14, 'Soluta incidunt corrupti rem.', 'Dicta nesciunt rerum reiciendis cupiditate ex sunt asperiores autem facilis ipsam mollitia dolore et culpa.', 'Solved', 'Low', '2021-03-28 18:10:13', '2021-03-28 18:10:13', '2021-03-28 19:10:13', NULL, 20),
(45, 3, 6, 1, 8, 20, 'Itaque eos dicta reprehenderit.', 'Quos et consequatur non nostrum qui minima ut aperiam libero magnam qui harum consequuntur in eos voluptatem deserunt sunt iure quis veritatis.', 'In queue', 'Low', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 11),
(46, NULL, 19, 1, 3, 7, 'Est voluptatem rerum.', 'Qui praesentium accusamus voluptas eveniet molestiae in non qui est aut dolorem odio blanditiis quia.', 'In queue', 'High', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 10),
(47, 8, 8, 1, 6, 15, 'Et explicabo.', 'Distinctio voluptatem aut ut facilis totam nisi eum corporis nesciunt harum.', 'In queue', 'Medium', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 13),
(48, 6, 16, 1, 7, 3, 'Nulla voluptas ut dicta occaecati.', 'Maxime iure ut quibusdam asperiores sed voluptatibus dicta repellendus aut ut sint amet officiis odit unde dignissimos.', 'In queue', 'High', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 3),
(49, 18, 10, 1, NULL, 20, 'Nemo illo eius voluptas.', 'A eum ratione numquam corrupti eum inventore quibusdam odit aliquam quaerat et.', 'In queue', 'Medium', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 4),
(50, 2, NULL, 1, 1, 17, 'Ratione ratione doloribus ipsa.', 'Tempore a ut accusantium assumenda assumenda molestiae odio velit aut vitae suscipit sunt accusantium aperiam aliquam recusandae.', 'Solved', 'Low', '2021-03-28 18:10:13', '2021-03-28 18:10:13', '2021-03-31 02:10:13', 14, 19),
(51, NULL, 1, 1, NULL, 17, 'Sit et sed minima.', 'Velit nemo dolor necessitatibus sunt esse consectetur veniam qui placeat commodi corrupti quisquam quasi vitae nisi atque molestias qui libero veritatis.', 'In queue', 'Medium', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 3),
(52, 11, 15, 0, 1, 25, 'Eum quam nesciunt.', 'Necessitatibus qui odio nisi sed maxime fugiat minima sit quia natus excepturi qui.', 'Solved', 'Medium', '2021-03-28 18:10:13', '2021-03-28 18:10:13', '2021-03-28 19:10:13', NULL, 10),
(53, 19, NULL, 0, 7, 11, 'Esse fuga.', 'Non mollitia omnis quia cupiditate qui cupiditate cumque et error.', 'Solved', 'Medium', '2021-03-28 18:10:13', '2021-03-28 18:10:13', '2021-03-28 19:10:13', NULL, 1),
(54, 14, NULL, 1, 6, 14, 'Rerum rem.', 'Et commodi et sunt corporis fugit reiciendis veniam officiis dolor facere nemo ipsum ipsam molestias doloremque dolorem impedit laboriosam.', 'Verified', 'Medium', '2021-03-28 18:10:13', '2021-03-28 18:10:13', NULL, NULL, 12),
(55, 15, 18, 0, NULL, 22, 'Porro voluptatibus voluptas.', 'Est facere qui quia aut esse dicta et quas cumque maiores dolores.', 'Solved', 'High', '2021-03-28 18:10:13', '2021-03-28 18:10:13', '2021-03-28 19:10:13', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `problem_notes`
--

DROP TABLE IF EXISTS `problem_notes`;
CREATE TABLE `problem_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_log_id` bigint UNSIGNED NOT NULL,
  `solution` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `problem_notes`
--

TRUNCATE TABLE `problem_notes`;
--
-- Dumping data for table `problem_notes`
--

INSERT INTO `problem_notes` (`id`, `created_at`, `updated_at`, `description`, `problem_log_id`, `solution`) VALUES
(1, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Non quia deserunt dicta tempore et tenetur asperiores et optio.', 1, NULL),
(2, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Labore qui consequatur dolores voluptatum non laborum vitae deserunt voluptas.', 1, NULL),
(3, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Impedit praesentium dolorem et tempore autem modi omnis explicabo doloribus.', 1, NULL),
(4, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Excepturi omnis accusantium explicabo odio eaque dolor dolorem vero asperiores.', 1, NULL),
(5, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Tenetur reprehenderit id est recusandae alias praesentium aspernatur vero saepe.', 2, NULL),
(6, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Quia quo illo quo nostrum odio sed esse pariatur deserunt.', 3, NULL),
(7, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Facilis inventore vel ab beatae et dolore quibusdam sit nobis.', 3, NULL),
(8, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Cum quia quo nostrum aut dolor dolor voluptatibus id et.', 3, NULL),
(9, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Voluptatem quia ut magni amet qui dolore saepe aliquid qui.', 4, NULL),
(10, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Dolor ut aut tempora eius error dolorum distinctio officiis harum.', 4, NULL),
(11, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Non autem officiis ab rerum doloremque asperiores officia accusantium veritatis.', 4, NULL),
(12, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Aut voluptas praesentium aliquam qui optio autem est molestiae reiciendis.', 4, NULL),
(13, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Asperiores numquam architecto eos quas iure rerum voluptates excepturi ut.', 5, NULL),
(14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Rem voluptates et labore vitae eum corporis sapiente sunt doloremque.', 5, NULL),
(15, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Ratione eveniet qui aut illum sed veniam incidunt natus sed.', 5, 'This is a hardcoded solution'),
(16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Harum aut et animi dolorum nihil vitae hic possimus minus.', 6, NULL),
(17, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Ratione eaque sed vel ea molestias voluptatum illo et sint.', 7, NULL),
(18, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Blanditiis exercitationem ullam ipsam repellat commodi iusto et perferendis est.', 7, 'This is a hardcoded solution'),
(19, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Est vitae nesciunt quia autem inventore atque est vero omnis.', 8, NULL),
(20, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Minus perspiciatis reprehenderit quam voluptates fuga et voluptatum sed qui.', 8, NULL),
(21, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Rerum beatae aut deleniti sunt at quia officiis natus explicabo.', 8, NULL),
(22, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Deserunt in id ut quod eaque iusto nulla eius ea.', 9, NULL),
(23, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Reiciendis quisquam voluptatibus amet pariatur modi ab blanditiis atque reprehenderit.', 9, NULL),
(24, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Voluptatem laudantium mollitia commodi blanditiis quasi voluptatibus culpa similique dolor.', 10, NULL),
(25, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Omnis eum quo tempore odit asperiores incidunt quasi ea eum.', 10, NULL),
(26, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Eius quod beatae et minima suscipit vero sed voluptatum cupiditate.', 10, NULL),
(27, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Incidunt accusantium voluptas aut quos non commodi iusto vel quo.', 10, 'This is a hardcoded solution'),
(28, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Consectetur est impedit et tempora odio consequatur quaerat aut et.', 11, NULL),
(29, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Suscipit maiores sunt qui accusantium recusandae accusamus commodi non fugit.', 11, NULL),
(30, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Nisi modi architecto esse est sequi voluptatem voluptates ipsam aspernatur.', 11, NULL),
(31, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Quos omnis est magnam fugit ut qui ut maxime eos.', 12, NULL),
(32, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Alias nihil exercitationem quam et sunt architecto autem voluptatibus mollitia.', 12, NULL),
(33, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Impedit et ut aut aut consequatur eveniet nobis expedita facere.', 13, NULL),
(34, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Sequi est molestiae ipsam ratione quibusdam nam nihil fugiat ut.', 13, NULL),
(35, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Dolores beatae id quibusdam perferendis minus quia et minima quo.', 14, NULL),
(36, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Voluptas qui dicta distinctio nesciunt itaque ratione tempore quis minima.', 15, NULL),
(37, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Qui officiis nihil et voluptatem aperiam quia in temporibus id.', 15, NULL),
(38, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Voluptatem quos illo saepe officiis animi totam ipsum aliquid et.', 15, NULL),
(39, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Eum perferendis qui tenetur in neque illum qui quis distinctio.', 15, NULL),
(40, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Odio itaque cumque consequuntur ipsam aut sint neque eos dolores.', 15, 'This is a hardcoded solution'),
(41, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Ducimus quibusdam natus exercitationem dolorem non nostrum corrupti dolor repellendus.', 16, NULL),
(42, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Voluptatem aliquid nobis eaque atque commodi numquam a ullam eum.', 17, NULL),
(43, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Quis iure qui distinctio expedita minus aut fuga sed in.', 17, NULL),
(44, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Dolore repellendus voluptatem iste sit sed iste officia ut reprehenderit.', 17, NULL),
(45, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Tempore reprehenderit corporis aut neque eos ut consequuntur nihil molestias.', 17, NULL),
(46, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Eum vitae ut minima enim harum architecto dolores quasi pariatur.', 18, NULL),
(47, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Nihil architecto placeat sequi sit est doloribus consequatur libero dolore.', 18, NULL),
(48, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Ex dolor sunt sit ullam voluptatum cum hic cupiditate et.', 18, NULL),
(49, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Aperiam est consequatur nesciunt reprehenderit aut debitis eos ducimus sint.', 19, 'This is a hardcoded solution'),
(50, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Deserunt illum omnis beatae molestiae impedit natus optio et mollitia.', 20, NULL),
(51, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Harum voluptate est et facilis nihil repudiandae voluptatum magni magnam.', 21, NULL),
(52, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Unde nihil maiores beatae explicabo officia sit omnis ut cum.', 21, NULL),
(53, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Architecto ratione quaerat aut earum asperiores est voluptas accusantium omnis.', 21, NULL),
(54, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Voluptas maxime aut facilis sequi sed beatae sint facere porro.', 22, NULL),
(55, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Omnis dolores non itaque dolorem unde aut dicta laboriosam maxime.', 22, NULL),
(56, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Consequatur ut porro facilis minima modi consectetur asperiores et ut.', 22, NULL),
(57, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Unde molestiae ut dolores blanditiis quas veritatis et mollitia voluptatem.', 24, NULL),
(58, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Eaque incidunt sit ullam perspiciatis tempore quas iure laborum eos.', 25, NULL),
(59, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Et et impedit officia adipisci earum architecto quia et libero.', 25, NULL),
(60, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Adipisci a voluptas architecto minima aut error suscipit id ut.', 25, NULL),
(61, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Ut unde aspernatur architecto recusandae et minima vero nam ut.', 25, NULL),
(62, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Accusantium adipisci vel atque minima sequi voluptatem eius ut in.', 26, NULL),
(63, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Consequatur id sed nihil quasi incidunt quisquam excepturi harum natus.', 26, NULL),
(64, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Corporis accusantium sit odio eum quo voluptas aut veniam velit.', 26, NULL),
(65, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Sed autem quo nobis dolore sint quo in vitae est.', 27, 'This is a hardcoded solution'),
(66, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Incidunt harum porro facere aut est nemo laboriosam optio nobis.', 28, NULL),
(67, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Autem eveniet distinctio voluptas recusandae voluptatem sunt id similique rerum.', 28, NULL),
(68, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Quo et dolorum dolore minus aut ut velit ea natus.', 28, NULL),
(69, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Libero sit sequi veritatis ab placeat quis reiciendis dolore blanditiis.', 28, NULL),
(70, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Quisquam facere ipsa sequi sint vel autem et veniam sapiente.', 29, NULL),
(71, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Blanditiis voluptas voluptatum quaerat quia assumenda ut minima quis quis.', 29, NULL),
(72, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Sed debitis rerum nisi autem ipsum placeat error non iste.', 33, NULL),
(73, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Voluptatem nisi eos inventore velit accusamus temporibus tenetur placeat repellat.', 33, NULL),
(74, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Impedit et ut quia fugit placeat dolorem qui ut odio.', 33, NULL),
(75, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Facilis aliquam veniam culpa nobis facilis libero aut nihil placeat.', 33, NULL),
(76, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Quasi dolorem saepe sed et vel ipsum porro facilis error.', 35, NULL),
(77, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Fuga velit ut id recusandae sed voluptatem molestiae qui eius.', 36, NULL),
(78, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Similique et repellat qui sed occaecati officia accusantium corrupti et.', 36, 'This is a hardcoded solution'),
(79, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Suscipit perspiciatis fugiat ut voluptas a ducimus ducimus delectus nihil.', 37, NULL),
(80, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Ratione vel modi incidunt fugit officia quis quisquam deserunt sit.', 37, NULL),
(81, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Nobis consequatur laborum ut et aut error sint a blanditiis.', 37, NULL),
(82, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Sit a voluptas asperiores quo cumque voluptatibus repellendus possimus autem.', 39, NULL),
(83, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Qui sit et laboriosam vitae optio ipsum accusantium aspernatur est.', 39, NULL),
(84, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Est praesentium culpa explicabo non ut quo ipsa perspiciatis unde.', 39, NULL),
(85, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Cupiditate vero voluptatem perferendis rerum omnis quae nulla porro debitis.', 39, NULL),
(86, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Modi pariatur quia officia aut nihil sunt expedita accusamus architecto.', 40, NULL),
(87, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Eum mollitia repellendus facilis at alias consequuntur quia repudiandae ea.', 41, NULL),
(88, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Odio velit beatae sit optio magnam odit vel culpa adipisci.', 41, NULL),
(89, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Iure nesciunt qui distinctio repellendus nobis et sunt qui nihil.', 41, NULL),
(90, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Pariatur reprehenderit enim officiis consectetur molestiae quasi vitae hic magni.', 43, NULL),
(91, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Est voluptatibus laborum impedit sit doloremque voluptatem et iure tenetur.', 43, NULL),
(92, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Exercitationem ratione et vel nihil eum beatae dolor culpa rerum.', 43, 'This is a hardcoded solution'),
(93, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Vitae illum necessitatibus ipsa ex sed dolor sint animi omnis.', 45, NULL),
(94, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Ducimus quae eligendi rem vitae est cupiditate qui accusantium dolor.', 46, NULL),
(95, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Aperiam sunt hic doloremque ut accusamus laboriosam aut et quaerat.', 47, NULL),
(96, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Eaque dolores sit est quos vel nulla odio temporibus eum.', 47, NULL),
(97, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Rerum nam qui nemo non quisquam et tempore fugit consequuntur.', 47, NULL),
(98, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Earum velit facere quo occaecati corrupti quasi qui consectetur dolorem.', 47, NULL),
(99, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Placeat pariatur omnis rem porro asperiores qui possimus eveniet fugit.', 48, NULL),
(100, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Ea quas assumenda voluptatem non autem accusantium non consequatur iste.', 48, NULL),
(101, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Temporibus numquam consequatur nisi impedit doloribus cumque tempore vero doloremque.', 48, NULL),
(102, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Nam natus quibusdam nostrum et beatae incidunt qui enim in.', 49, NULL),
(103, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Optio quis labore ad accusamus aperiam delectus cum et aliquam.', 49, NULL),
(104, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Distinctio labore modi iste ut quia alias natus ea quia.', 50, NULL),
(105, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Accusamus et quae provident quidem similique aliquam error beatae ut.', 50, NULL),
(106, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Quia aperiam quod delectus nulla fugiat placeat magni delectus ipsa.', 50, NULL),
(107, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Veniam atque vel commodi est et vitae sit iure rerum.', 50, 'This is a hardcoded solution'),
(108, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Et possimus eveniet necessitatibus architecto quae itaque et tenetur odit.', 53, 'This is a hardcoded solution'),
(109, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'A vero debitis voluptatem nemo omnis voluptatibus dolorem veniam architecto.', 54, NULL),
(110, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Asperiores esse est iusto hic qui occaecati quo facere sit.', 54, NULL),
(111, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Quasi odit reprehenderit autem dolorum doloremque voluptatum corporis qui numquam.', 55, 'This is a hardcoded solution');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
CREATE TABLE `software` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `software`
--

TRUNCATE TABLE `software`;
--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id`, `name`, `version`, `license_key`) VALUES
(1, 'Iure ipsum ut dolorem.', 'v6.42.0', '9231211b-e4f0-3275-a8df-69e6f9f2d1d3'),
(2, 'Sunt ut aut amet.', 'v7.95.0', '38dfac23-cd2d-38e4-82da-3f6f7f2c9bbf'),
(3, 'Minima vel quibusdam.', 'v5.33.8', 'c7ae120e-6a5b-3103-aa69-975d76ec385e'),
(4, 'Iure odit dolorem architecto.', 'v2.71.9', '0e8b3de1-294c-3507-9ac9-ee1aeb51c6ad'),
(5, 'Eos quos minus.', 'v0.84.9', '3eacc7c7-34f8-385e-9ec3-cd7c1656301a'),
(6, 'Neque modi sit ut.', 'v7.56.6', 'bdab353b-e61c-3226-ba4f-9b0545fe8f5e'),
(7, 'Id rerum quae ullam.', 'v3.65.1', '67aa6cc1-8282-31e3-9aac-ea792553566d'),
(8, 'Vitae nihil doloremque.', 'v3.68.4', '059681d8-8fb2-35cb-83e5-4ac43f88564a'),
(9, 'Nam aliquam cum occaecati.', 'v2.58.6', '5534eed4-c2a2-3e4a-9a2d-4fb716f43a1f'),
(10, 'Cumque non provident nobis consequatur.', 'v7.07.7', 'f2527bff-e75d-32b7-95fe-89f88010b772'),
(11, 'Eum reprehenderit dolores deserunt.', 'v2.82.7', '0e348ddc-c48e-3315-a8f4-eeb46321e7a8'),
(12, 'Id eos dolorum nihil non.', 'v1.10.1', 'a591e1b0-905f-3ee9-9e71-73c15158f90c'),
(13, 'Dolor temporibus quo aut.', 'v6.67.6', 'fd4ae6b7-7d1a-3454-8b9e-c6053ac9c86a'),
(14, 'Qui sequi ducimus ipsum.', 'v7.36.9', 'c6a8d92c-65db-392f-995c-43f045e08606'),
(15, 'Molestias sequi non.', 'v2.12.2', '9c008562-cebf-3bf7-bb74-34885532e185'),
(16, 'Accusamus quas cum.', 'v6.70.9', 'ccfbd528-16f4-34ba-8bdd-f527465d6191'),
(17, 'Ad dicta optio hic.', 'v1.93.5', '768fcb8a-7382-31e0-b2af-b568c3d8f674'),
(18, 'A aut autem sint.', 'v2.81.7', '73f00c80-6cc1-3c89-ad74-129d0ce2a6e6'),
(19, 'Ut eum.', 'v4.18.5', '686dce79-9c78-39de-90c3-9dc6e39dc6ac'),
(20, 'Odio molestiae ratione a beatae.', 'v9.66.0', '3b3b008e-717b-3e15-a023-c6f1a7a3ded9'),
(21, 'Quae neque iste.', 'v4.65.9', 'fb2815d0-b831-3420-beed-8e91eb1e93bc'),
(22, 'Itaque illum eaque.', 'v4.78.7', '805e4fb1-158f-307d-8757-12d0d12e690d'),
(23, 'In iste.', 'v5.84.9', '81fbd76a-9284-3ea2-b839-05107a6da8db'),
(24, 'Occaecati est porro.', 'v0.10.2', '9fe02493-adc8-3639-bacf-7c884ac3bca7'),
(25, 'Quae provident ut voluptatem.', 'v0.28.6', '0b194eeb-f096-39d1-be9a-b93a20d00d5b');

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

DROP TABLE IF EXISTS `specialists`;
CREATE TABLE `specialists` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `working_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `specialists`
--

TRUNCATE TABLE `specialists`;
--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `employee_id`, `is_available`, `working_days`) VALUES
(1, 14, 1, 'mo,we,fr,sa'),
(2, 16, 1, 'mo,tu,we,th,fr');

-- --------------------------------------------------------

--
-- Table structure for table `specialist_skills`
--

DROP TABLE IF EXISTS `specialist_skills`;
CREATE TABLE `specialist_skills` (
  `problem_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `specialist_skills`
--

TRUNCATE TABLE `specialist_skills`;
--
-- Dumping data for table `specialist_skills`
--

INSERT INTO `specialist_skills` (`problem_id`, `employee_id`) VALUES
(23, 14),
(6, 14),
(17, 14),
(9, 14),
(23, 14),
(16, 16),
(14, 16),
(16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `specialist_trackers`
--

DROP TABLE IF EXISTS `specialist_trackers`;
CREATE TABLE `specialist_trackers` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_log_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `specialist_trackers`
--

TRUNCATE TABLE `specialist_trackers`;
--
-- Dumping data for table `specialist_trackers`
--

INSERT INTO `specialist_trackers` (`id`, `employee_id`, `created_at`, `updated_at`, `reason`, `problem_log_id`) VALUES
(1, 14, '2021-03-28 18:10:11', '2021-03-28 18:10:11', 'Automatically assigned', 1),
(2, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 2),
(3, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 3),
(4, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 4),
(5, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 5),
(6, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 6),
(7, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 7),
(8, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 8),
(9, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 9),
(10, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 10),
(11, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 11),
(12, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 12),
(13, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 13),
(14, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 14),
(15, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 15),
(16, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 16),
(17, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 17),
(18, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 18),
(19, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 19),
(20, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 20),
(21, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 21),
(22, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 22),
(23, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 24),
(24, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 25),
(25, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 26),
(26, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 27),
(27, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 28),
(28, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 29),
(29, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 30),
(30, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 33),
(31, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 35),
(32, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 36),
(33, 16, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 37),
(34, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 39),
(35, 14, '2021-03-28 18:10:12', '2021-03-28 18:10:12', 'Automatically assigned', 40),
(36, 16, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 41),
(37, 16, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 42),
(38, 16, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 43),
(39, 14, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 45),
(40, 16, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 46),
(41, 14, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 47),
(42, 16, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 48),
(43, 16, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 49),
(44, 14, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 50),
(45, 14, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 51),
(46, 14, '2021-03-28 18:10:13', '2021-03-28 18:10:13', 'Automatically assigned', 54);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `employee_id`) VALUES
(1, 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1),
(2, 'user2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2),
(3, 'fay44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3),
(4, 'jamar61', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4),
(5, 'collins.juliana', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5),
(6, 'owillms', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6),
(7, 'windler.art', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 7),
(8, 'jay.klocko', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 8),
(9, 'turcotte.isadore', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9),
(10, 'iweissnat', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 10),
(11, 'haag.axel', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 11),
(12, 'justen11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 12),
(13, 'jbode', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 13),
(14, 'specialist', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 14),
(15, 'solon.zboncak', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 15),
(16, 'brant.doyle', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 16),
(17, 'greenfelder.imogene', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 17),
(18, 'considine.adolfo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 18),
(19, 'hkoepp', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 19),
(20, 'kacey.mcclure', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_logs`
--
ALTER TABLE `call_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_histories_problem_log_id_foreign` (`problem_log_id`),
  ADD KEY `call_log_specialist_id_foreign` (`specialist_id`),
  ADD KEY `call_log_client_id_foreign` (`client_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_address_unique` (`email_address`),
  ADD KEY `employees_job_id_foreign` (`job_id`),
  ADD KEY `employees_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hardware_serial_num_unique` (`serial_num`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holidays_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operating_systems`
--
ALTER TABLE `operating_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `problems_problem_id_foreign` (`problem_id`);

--
-- Indexes for table `problem_logs`
--
ALTER TABLE `problem_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `problem_logs_hardware_id_foreign` (`hardware_id`),
  ADD KEY `problem_logs_software_id_foreign` (`software_id`),
  ADD KEY `problem_logs_operating_system_id_foreign` (`operating_system_id`),
  ADD KEY `problem_logs_problem_id_foreign` (`problem_id`),
  ADD KEY `problem_logs_employee_id_foreign` (`employee_id`),
  ADD KEY `problem_logs_client_id_foreign` (`client_id`);

--
-- Indexes for table `problem_notes`
--
ALTER TABLE `problem_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `problem_notes_problem_log_id_foreign` (`problem_log_id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialists_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `specialist_skills`
--
ALTER TABLE `specialist_skills`
  ADD KEY `specialist_skills_problem_id_foreign` (`problem_id`),
  ADD KEY `specialist_skills_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `specialist_trackers`
--
ALTER TABLE `specialist_trackers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_trackers_employee_id_foreign` (`employee_id`),
  ADD KEY `specialist_trackers_problem_log_id_foreign` (`problem_log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `call_logs`
--
ALTER TABLE `call_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `operating_systems`
--
ALTER TABLE `operating_systems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `problem_logs`
--
ALTER TABLE `problem_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `problem_notes`
--
ALTER TABLE `problem_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialist_trackers`
--
ALTER TABLE `specialist_trackers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `call_logs`
--
ALTER TABLE `call_logs`
  ADD CONSTRAINT `call_log_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `call_log_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_histories_problem_log_id_foreign` FOREIGN KEY (`problem_log_id`) REFERENCES `problem_logs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `holidays`
--
ALTER TABLE `holidays`
  ADD CONSTRAINT `holidays_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `problems`
--
ALTER TABLE `problems`
  ADD CONSTRAINT `problems_problem_id_foreign` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `problem_logs`
--
ALTER TABLE `problem_logs`
  ADD CONSTRAINT `problem_logs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `problem_logs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `problem_logs_hardware_id_foreign` FOREIGN KEY (`hardware_id`) REFERENCES `hardware` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `problem_logs_operating_system_id_foreign` FOREIGN KEY (`operating_system_id`) REFERENCES `operating_systems` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `problem_logs_problem_id_foreign` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `problem_logs_software_id_foreign` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `problem_notes`
--
ALTER TABLE `problem_notes`
  ADD CONSTRAINT `problem_notes_problem_log_id_foreign` FOREIGN KEY (`problem_log_id`) REFERENCES `problem_logs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialists`
--
ALTER TABLE `specialists`
  ADD CONSTRAINT `specialists_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialist_skills`
--
ALTER TABLE `specialist_skills`
  ADD CONSTRAINT `specialist_skills_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specialist_skills_problem_id_foreign` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialist_trackers`
--
ALTER TABLE `specialist_trackers`
  ADD CONSTRAINT `specialist_trackers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specialist_trackers_problem_log_id_foreign` FOREIGN KEY (`problem_log_id`) REFERENCES `problem_logs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
