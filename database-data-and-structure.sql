-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2021 at 09:05 PM
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
(1, 'Est porro iusto aut voluptate quia quas omnis similique sint.', '2021-03-28 18:59:36', 1, 14, 11),
(2, 'Nemo voluptas iusto voluptatem magni qui est mollitia quis inventore.', '2021-03-28 18:59:36', 1, 14, 11),
(3, 'Est voluptas consequatur facere iusto ducimus sint enim iure autem.', '2021-03-28 18:59:36', 2, 16, 12),
(4, 'Quis sunt itaque sit dolores enim hic eum sed est.', '2021-03-28 18:59:36', 3, 16, 19),
(5, 'Voluptatem ipsum et sequi consequatur tempora iusto ex quasi laudantium.', '2021-03-28 18:59:36', 3, 16, 19),
(6, 'Rerum repudiandae explicabo non ullam dolorum est sed deserunt aliquam.', '2021-03-28 18:59:36', 3, 16, 19),
(7, 'Perferendis autem est corporis ut est cupiditate ad at officiis.', '2021-03-28 18:59:36', 4, 16, 12),
(8, 'Perspiciatis vero cum dolor aut neque ullam optio vel voluptatem.', '2021-03-28 18:59:36', 5, 14, 11),
(9, 'Sit similique provident consequatur et est qui eveniet voluptas eos.', '2021-03-28 18:59:36', 6, 14, 3),
(10, 'Voluptatem itaque consequatur tenetur sit esse accusantium dolor illum officia.', '2021-03-28 18:59:36', 7, 16, 6),
(11, 'Fugit ex ratione alias inventore ex et laborum voluptatibus cumque.', '2021-03-28 18:59:36', 7, 16, 6),
(12, 'Corrupti quas ratione quidem expedita nam sed consequuntur quis quia.', '2021-03-28 18:59:36', 8, 14, 6),
(13, 'Omnis molestiae debitis dolorem nobis id magnam iste blanditiis optio.', '2021-03-28 18:59:36', 8, 14, 6),
(14, 'Cum aut quod architecto velit nisi est libero vel beatae.', '2021-03-28 18:59:36', 9, 14, 20),
(15, 'Fuga praesentium enim eius facilis amet tempore iure cumque autem.', '2021-03-28 18:59:36', 9, 14, 20),
(16, 'Maxime est molestias tempore et aspernatur rerum veniam quam tempore.', '2021-03-28 18:59:36', 12, 14, 7),
(17, 'Enim non harum neque et deleniti odit labore sit expedita.', '2021-03-28 18:59:36', 13, 14, 13),
(18, 'Placeat impedit quia maiores cum necessitatibus magni et culpa aspernatur.', '2021-03-28 18:59:36', 13, 14, 13),
(19, 'Cum culpa est nihil debitis ullam nemo possimus rerum cupiditate.', '2021-03-28 18:59:36', 14, 14, 11),
(20, 'Autem numquam veritatis temporibus illum porro ut ea id omnis.', '2021-03-28 18:59:36', 14, 14, 11),
(21, 'Qui voluptatum tempore ab eius eum ipsa maiores expedita numquam.', '2021-03-28 18:59:36', 14, 14, 11),
(22, 'Enim aut necessitatibus eaque officiis rerum qui omnis nesciunt omnis.', '2021-03-28 18:59:36', 15, 14, 7),
(23, 'Repellat quidem consequatur dolores consequatur accusamus sit quas velit quisquam.', '2021-03-28 18:59:36', 15, 14, 7),
(24, 'Quo id officia et molestiae temporibus voluptatum perspiciatis alias eos.', '2021-03-28 18:59:36', 16, 14, 5),
(25, 'Velit praesentium mollitia officia enim officiis excepturi molestiae voluptatem laborum.', '2021-03-28 18:59:36', 16, 14, 5),
(26, 'Suscipit quasi quidem ad non velit aut vitae nemo ratione.', '2021-03-28 18:59:36', 17, 14, 17),
(27, 'Ipsum nisi quia esse quia tenetur vero qui voluptas aperiam.', '2021-03-28 18:59:36', 17, 14, 17),
(28, 'Esse id dolores ex excepturi tempore iure aperiam doloremque autem.', '2021-03-28 18:59:36', 17, 14, 17),
(29, 'Nulla ut quasi aut soluta sit voluptatem placeat tempore exercitationem.', '2021-03-28 18:59:36', 18, 14, 18),
(30, 'Et qui omnis voluptas eveniet consequuntur alias eaque esse explicabo.', '2021-03-28 18:59:36', 18, 14, 18),
(31, 'Cupiditate et repellat modi labore excepturi similique debitis eum sunt.', '2021-03-28 18:59:36', 20, 14, 4),
(32, 'Suscipit in voluptatem odit eaque quaerat hic libero ut consequatur.', '2021-03-28 18:59:36', 20, 14, 4),
(33, 'Ut ducimus provident voluptatem ipsam fugiat corporis architecto vel quia.', '2021-03-28 18:59:36', 21, 14, 20),
(34, 'Sint deleniti rem adipisci ipsam quo molestiae eum voluptas consequatur.', '2021-03-28 18:59:36', 21, 14, 20),
(35, 'Quae suscipit esse et occaecati laborum sint eum ad cumque.', '2021-03-28 18:59:36', 21, 14, 20),
(36, 'Eum autem tempore molestiae neque nihil cumque ullam cum aut.', '2021-03-28 18:59:36', 24, 14, 17),
(37, 'Laudantium nihil sapiente sit distinctio cum voluptas et officia officiis.', '2021-03-28 18:59:36', 24, 14, 17),
(38, 'Velit nam ducimus nisi animi suscipit et non quae voluptatem.', '2021-03-28 18:59:36', 25, 14, 5),
(39, 'Commodi harum et aspernatur qui possimus molestiae aut debitis quia.', '2021-03-28 18:59:36', 25, 14, 5),
(40, 'Esse et ipsum placeat optio sed ab sequi facilis omnis.', '2021-03-28 18:59:36', 25, 14, 5),
(41, 'Minus nesciunt est molestiae dicta omnis quisquam soluta a quidem.', '2021-03-28 18:59:36', 26, 14, 19),
(42, 'Quod quam unde ea ut ab dolores beatae sunt soluta.', '2021-03-28 18:59:36', 26, 14, 19),
(43, 'Assumenda nisi esse vero explicabo non error omnis rem sunt.', '2021-03-28 18:59:36', 26, 14, 19),
(44, 'Molestiae nesciunt omnis in asperiores earum consequuntur vitae doloribus perspiciatis.', '2021-03-28 18:59:36', 27, 14, 17),
(45, 'Ipsa vitae placeat necessitatibus tenetur veritatis itaque earum labore et.', '2021-03-28 18:59:36', 27, 14, 17),
(46, 'Voluptatem neque minima ducimus modi nam commodi ut dolor et.', '2021-03-28 18:59:36', 27, 14, 17),
(47, 'Voluptas non est repellendus optio explicabo consequatur nesciunt reiciendis omnis.', '2021-03-28 18:59:36', 29, 14, 15),
(48, 'Accusamus assumenda minima et nihil quibusdam debitis qui voluptas sit.', '2021-03-28 18:59:36', 29, 14, 15),
(49, 'Et voluptatibus sunt veritatis qui quia quo sit illo quo.', '2021-03-28 18:59:36', 29, 14, 15),
(50, 'At eos at ea quia quod quia nemo placeat reiciendis.', '2021-03-28 18:59:36', 30, 14, 20),
(51, 'Temporibus dolores aperiam explicabo est a quasi iste et aliquid.', '2021-03-28 18:59:36', 30, 14, 20),
(52, 'Cumque consequuntur culpa modi nostrum nemo aut consequatur eaque beatae.', '2021-03-28 18:59:36', 30, 14, 20),
(53, 'Recusandae mollitia accusantium harum voluptate inventore quibusdam saepe dolorum et.', '2021-03-28 18:59:36', 31, 16, 6),
(54, 'Dicta est ut architecto magni eaque voluptatem qui ratione necessitatibus.', '2021-03-28 18:59:36', 32, 14, 6),
(55, 'Corrupti adipisci et itaque autem fugiat voluptatem fugit iste aliquid.', '2021-03-28 18:59:36', 32, 14, 6),
(56, 'Sint nostrum voluptatum sint corporis officia rerum voluptates eos sit.', '2021-03-28 18:59:36', 32, 14, 6),
(57, 'Ratione corporis quia et doloremque dolorem iste consequatur earum quam.', '2021-03-28 18:59:37', 34, 16, 15),
(58, 'Possimus minus sapiente aut adipisci ut et aliquam ea saepe.', '2021-03-28 18:59:37', 35, 14, 13),
(59, 'Dolorem quia repellat voluptatem voluptas officia est dolores et ipsa.', '2021-03-28 18:59:37', 36, 14, 15),
(60, 'Voluptas mollitia porro ipsam dolores et deserunt quia at provident.', '2021-03-28 18:59:37', 37, 14, 1),
(61, 'Eveniet quo corporis ducimus facere minus aperiam pariatur totam consequatur.', '2021-03-28 18:59:37', 37, 14, 1),
(62, 'Quia quod velit ut hic eveniet est non facilis eos.', '2021-03-28 18:59:37', 38, 14, 6),
(63, 'Laborum hic accusamus est odio dolor id libero sed aut.', '2021-03-28 18:59:37', 38, 14, 6),
(64, 'Rerum blanditiis modi sequi tenetur possimus sed quae ex ut.', '2021-03-28 18:59:37', 40, 14, 19),
(65, 'Et optio ut doloribus aliquam fugiat facilis impedit voluptate blanditiis.', '2021-03-28 18:59:37', 41, 16, 11),
(66, 'Quia dolore ullam ut laboriosam officiis debitis illum iure adipisci.', '2021-03-28 18:59:37', 41, 16, 11),
(67, 'Eligendi corrupti quam velit animi omnis eveniet excepturi reprehenderit magni.', '2021-03-28 18:59:37', 44, 16, 8),
(68, 'Porro enim nisi laborum omnis enim molestias sed saepe et.', '2021-03-28 18:59:37', 44, 16, 8),
(69, 'Alias sunt debitis reiciendis similique sed non et dolores qui.', '2021-03-28 18:59:37', 46, 14, 4),
(70, 'Omnis quis autem excepturi soluta aut saepe a architecto dolorem.', '2021-03-28 18:59:37', 48, 14, 7),
(71, 'Ipsa sunt earum nihil est sint iusto qui qui nulla.', '2021-03-28 18:59:37', 48, 14, 7),
(72, 'Veritatis provident earum et ut ea ab voluptatem minima dolorem.', '2021-03-28 18:59:37', 48, 14, 7),
(73, 'Provident dignissimos quo facere et animi incidunt vel sint reiciendis.', '2021-03-28 18:59:37', 49, 16, 4),
(74, 'Repellat quia alias rem odit maxime velit ex veniam asperiores.', '2021-03-28 18:59:37', 50, 16, 10),
(75, 'Minus sequi et repellat quas dolore commodi in eos fuga.', '2021-03-28 18:59:37', 50, 16, 10),
(76, 'Aut consequuntur magnam quae est eos et et laborum ipsa.', '2021-03-28 18:59:37', 51, 14, 10),
(77, 'A voluptas magnam rerum numquam sint odit voluptatem maiores aliquam.', '2021-03-28 18:59:37', 51, 14, 10),
(78, 'Delectus facilis sunt reiciendis officia voluptas consequuntur culpa neque accusantium.', '2021-03-28 18:59:37', 51, 14, 10),
(79, 'Quibusdam sit doloribus voluptas debitis et nemo error unde laborum.', '2021-03-28 18:59:37', 52, 14, 19),
(80, 'Doloremque eum animi quibusdam fuga accusamus magni nulla rem omnis.', '2021-03-28 18:59:37', 52, 14, 19),
(81, 'Nihil incidunt culpa quibusdam quia odit esse maiores corrupti quo.', '2021-03-28 18:59:37', 52, 14, 19),
(82, 'Totam est ipsum accusantium fuga quas est ea corrupti fuga.', '2021-03-28 18:59:37', 53, 14, 5),
(83, 'Dolorum provident ullam magni sed quis minima soluta non laborum.', '2021-03-28 18:59:37', 53, 14, 5),
(84, 'Veritatis repudiandae quidem molestias doloribus iste non doloremque perferendis ipsam.', '2021-03-28 18:59:37', 53, 14, 5),
(85, 'Distinctio dolores incidunt dolor ut consequatur consequatur aut consequuntur et.', '2021-03-28 18:59:37', 54, 16, 9),
(86, 'Natus qui pariatur pariatur libero ab adipisci qui iusto atque.', '2021-03-28 18:59:37', 55, 16, 17),
(87, 'Inventore et in totam molestiae consequatur expedita labore aut ratione.', '2021-03-28 18:59:37', 55, 16, 17);

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
(1, 6, 17, 1, 6, 4, 'Vel qui expedita illum.', 'Eos dolores reprehenderit a et odio fugiat et dolor aut debitis et ut tempora.', 'Solved', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-29 21:59:36', 14, 11),
(2, 9, 5, 1, NULL, 6, 'Minima recusandae fugiat.', 'Sed qui reiciendis vel hic aut cumque voluptas et aspernatur voluptate quam ipsum asperiores.', 'Verified', 'Medium', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 12),
(3, NULL, 14, 1, 3, 12, 'Omnis eius.', 'Eaque molestiae voluptate impedit voluptatum incidunt repellendus distinctio consectetur consequatur hic.', 'In queue', 'Medium', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 19),
(4, 21, 25, 1, 2, 10, 'Ut dolore.', 'Quam magni ipsum assumenda nobis ut vitae voluptate ut eos id recusandae voluptatibus quidem sed deserunt.', 'Verified', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 12),
(5, NULL, 3, 1, 1, 21, 'Nemo reprehenderit praesentium.', 'Et autem sit maxime tempore eum et est non consectetur et delectus ipsa amet ipsum et vero totam eos voluptatem explicabo.', 'Solved', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-28 21:59:36', 14, 11),
(6, 14, NULL, 1, NULL, 16, 'Doloribus provident enim consequatur.', 'Esse similique laboriosam nihil aut suscipit consequuntur dolores aut qui est eius fuga quisquam quia neque sint.', 'In queue', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 3),
(7, NULL, 17, 1, 7, 14, 'Eveniet maxime et amet.', 'Sint nostrum iste qui qui dolorem quas et iusto quo quis dolorem dolorem architecto numquam.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 6),
(8, 12, 13, 1, 5, 9, 'Quo et tempora ipsa.', 'Vel omnis eos dolore provident temporibus et temporibus voluptatem voluptatem rerum.', 'Solved', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-04-01 02:59:36', 14, 6),
(9, NULL, 11, 1, NULL, 2, 'Sunt odio consequatur ipsam libero.', 'Sit quia dolorum inventore amet eos consectetur earum quae ut id sunt repudiandae ipsam culpa nisi cumque animi non.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 20),
(10, 22, 22, 1, 8, 16, 'Veritatis consequatur non.', 'Facere eos reprehenderit distinctio minima ipsa temporibus in tempore odit consequatur fugit.', 'Solved', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-31 05:59:36', 14, 18),
(11, 2, 13, 1, 8, 24, 'Incidunt nostrum voluptas.', 'Quod impedit distinctio deleniti iste non optio consequatur non reprehenderit nostrum doloribus sed omnis occaecati ad blanditiis et ipsum.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 4),
(12, NULL, 9, 1, 6, 14, 'Ut iste eius et.', 'Quod reprehenderit voluptate sed reprehenderit blanditiis nesciunt repellendus inventore facilis repudiandae debitis quo qui.', 'Verified', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 7),
(13, 18, 7, 1, 8, 13, 'Corporis possimus sed officia.', 'Sed eaque qui quia tempore et nostrum qui beatae sit quia.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 13),
(14, NULL, 11, 1, 3, 13, 'Sint nihil occaecati.', 'Optio at quam quis ut illum tempora perferendis eveniet optio hic.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 11),
(15, NULL, 19, 1, NULL, 6, 'Rerum quam accusantium qui.', 'Quod modi pariatur suscipit et perferendis ea quas ab nostrum ut voluptatibus fuga.', 'Solved', 'Medium', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-30 01:59:36', 14, 7),
(16, 12, 1, 1, NULL, 22, 'Voluptas et atque.', 'Aut doloremque et nesciunt doloribus veritatis quia eveniet non magnam dolore.', 'Solved', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-04-01 00:59:36', 14, 5),
(17, 25, 9, 1, 4, 14, 'Itaque neque ut.', 'Sequi sit doloremque quaerat dolor doloribus qui vel aut inventore ut minus occaecati maxime qui aut aut neque quam inventore occaecati.', 'Solved', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-29 04:59:36', 14, 17),
(18, 3, NULL, 1, 1, 16, 'Totam asperiores nam dolore.', 'Inventore praesentium tenetur sint architecto minima veniam vel ut aut.', 'In queue', 'Medium', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 18),
(19, 21, 13, 1, 8, 7, 'Optio sit neque.', 'Debitis et ut quis possimus eius aut non est officiis.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 4),
(20, 20, 1, 1, NULL, 25, 'Autem qui fuga ratione.', 'Est omnis vel impedit a culpa impedit doloribus perspiciatis explicabo mollitia quae placeat.', 'In queue', 'Medium', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 4),
(21, NULL, 13, 1, 5, 3, 'Officiis tempore dicta.', 'Voluptatem eum magnam eius debitis odio modi impedit fuga sequi et beatae rem inventore cum voluptatem ut veniam.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 20),
(22, 7, 16, 0, NULL, 4, 'Enim architecto non adipisci.', 'Aliquam accusantium reiciendis laboriosam aliquid aut ab et ipsa quidem iste commodi et natus.', 'Solved', 'Medium', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-28 19:59:36', NULL, 15),
(23, NULL, 8, 0, NULL, 11, 'Quaerat deleniti id.', 'Voluptatibus quia aut consequatur omnis aut voluptatem amet vel doloremque consectetur et non distinctio voluptate pariatur.', 'Solved', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-28 19:59:36', NULL, 20),
(24, 2, 24, 1, 5, 1, 'Repellat dignissimos velit.', 'Nostrum perferendis nemo sunt aut mollitia natus qui quaerat sed similique.', 'Verified', 'Medium', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 17),
(25, NULL, 11, 1, 3, 7, 'Repellendus consequuntur.', 'Labore doloremque eaque ratione a debitis autem aut aut eius tenetur minus sit illo optio nihil.', 'Verified', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 5),
(26, NULL, 12, 1, 3, 16, 'Magnam illum voluptatem culpa.', 'Beatae repellendus quo accusantium quo nam eos perferendis repellat ducimus nemo rerum.', 'Solved', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-28 22:59:36', 14, 19),
(27, 25, NULL, 1, 6, 6, 'Mollitia eaque distinctio cum.', 'Consequatur sit nemo et magni accusantium perferendis delectus explicabo ut sit nulla et quia quia sequi.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 17),
(28, 10, NULL, 1, NULL, 14, 'Nobis dolorum quia aperiam.', 'Ex autem sapiente vel facere sapiente sed omnis tenetur nisi sit voluptatem.', 'Verified', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 7),
(29, 22, 7, 1, NULL, 3, 'Illum delectus consequatur.', 'Et impedit iure nam ut harum quod aperiam sequi eligendi autem deserunt asperiores repellat at impedit.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 15),
(30, 9, 16, 1, 8, 3, 'Voluptatibus illum minima error numquam.', 'Non eligendi rerum deserunt dolor omnis voluptatem eaque nihil quam est aut est in et doloribus vel.', 'In queue', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 20),
(31, 9, NULL, 1, NULL, 8, 'Eius est aspernatur.', 'Quo velit delectus voluptate minus consectetur error qui cumque odio sunt culpa qui veniam sint distinctio in.', 'In queue', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 6),
(32, 25, NULL, 1, 7, 10, 'Sed illo error enim.', 'Cupiditate in quia ut voluptas nihil dolorem qui architecto aut quam in sit id alias sint.', 'In queue', 'Low', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 6),
(33, 12, 4, 0, 3, 5, 'Numquam optio hic quas.', 'Commodi quia doloribus et et incidunt exercitationem praesentium voluptatem et vero ipsum dolores molestiae.', 'Solved', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', '2021-03-28 19:59:36', NULL, 15),
(34, 7, 2, 1, 4, 22, 'Pariatur vitae nam.', 'Omnis officia sit qui omnis laudantium sit molestias officia veniam sed accusamus quo cum quo.', 'Verified', 'High', '2021-03-28 18:59:36', '2021-03-28 18:59:36', NULL, NULL, 15),
(35, 23, 10, 1, 7, 4, 'Assumenda aspernatur laboriosam dolor.', 'Aut aspernatur sit veniam sint ut assumenda aperiam rem animi.', 'In queue', 'High', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 13),
(36, 20, 10, 1, 7, 7, 'Aut impedit ea qui.', 'Sed ut libero doloremque occaecati adipisci sint ea delectus enim eveniet saepe corporis vitae nemo sit animi quibusdam dolorem hic voluptatem.', 'In queue', 'High', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 15),
(37, 4, 17, 1, NULL, 9, 'Quaerat sed dolorum.', 'Autem assumenda voluptatem repellat necessitatibus amet expedita aliquid a dolor quam esse deserunt.', 'In queue', 'High', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 1),
(38, 9, NULL, 1, 3, 23, 'Praesentium id provident impedit.', 'Quis asperiores sint omnis voluptate eos laboriosam nemo omnis voluptatem minus est placeat eos.', 'Verified', 'Low', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 6),
(39, 12, 11, 1, 2, 8, 'Qui consequatur accusantium.', 'Explicabo quia sequi commodi maiores qui et excepturi sit nam sed sed ut nam.', 'Solved', 'Low', '2021-03-28 18:59:37', '2021-03-28 18:59:37', '2021-03-29 03:59:37', 16, 10),
(40, 6, 21, 1, 1, 12, 'Laboriosam nulla corporis pariatur.', 'Et autem aliquam repudiandae quaerat optio deserunt inventore minus quos ratione eveniet.', 'Verified', 'High', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 19),
(41, 1, NULL, 1, NULL, 25, 'Pariatur natus necessitatibus.', 'Quod possimus quia delectus est sequi odit consequatur amet dicta quaerat non omnis voluptate iusto aut.', 'In queue', 'Medium', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 11),
(42, 7, 10, 0, NULL, 7, 'Explicabo deleniti libero quibusdam placeat.', 'Eum id quia sit odio id provident iste aut commodi voluptas assumenda qui dignissimos omnis omnis dicta consequatur.', 'Solved', 'High', '2021-03-28 18:59:37', '2021-03-28 18:59:37', '2021-03-28 19:59:37', NULL, 6),
(43, 2, NULL, 0, NULL, 22, 'Dolore esse esse natus.', 'Et maxime ducimus alias distinctio ut ut autem qui excepturi labore dolores qui perferendis labore sit enim et sunt voluptas atque.', 'Solved', 'Medium', '2021-03-28 18:59:37', '2021-03-28 18:59:37', '2021-03-28 19:59:37', NULL, 1),
(44, NULL, 15, 1, NULL, 20, 'Veniam non itaque autem.', 'Dolorum cum ut aut debitis nobis suscipit soluta eum neque commodi qui et illo asperiores aliquid in quod aut vitae.', 'In queue', 'Low', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 8),
(45, 25, 2, 0, 3, 6, 'Sequi dignissimos corporis.', 'Saepe est qui dolor consequatur velit aspernatur rem eveniet cum quod nihil maiores.', 'Solved', 'Medium', '2021-03-28 18:59:37', '2021-03-28 18:59:37', '2021-03-28 19:59:37', NULL, 13),
(46, 7, 16, 1, 7, 22, 'Autem minima voluptas.', 'Atque praesentium quidem non eveniet est omnis voluptatem atque quo illo est dolores distinctio sit molestiae quia.', 'Verified', 'High', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 4),
(47, NULL, 19, 0, 3, 18, 'Omnis ut qui.', 'Fugit molestiae et quia ea nostrum porro nostrum est laboriosam et vero ut ipsa cum iste.', 'Solved', 'Low', '2021-03-28 18:59:37', '2021-03-28 18:59:37', '2021-03-28 19:59:37', NULL, 10),
(48, 25, NULL, 1, 4, 9, 'Mollitia velit rerum.', 'Laudantium et accusamus nemo quos ad beatae voluptas illum cum.', 'Verified', 'Low', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 7),
(49, 17, NULL, 1, 3, 12, 'Voluptatem ea.', 'At molestiae voluptates ipsum corporis unde sed non iste at doloribus et quis nesciunt nobis nam aut veritatis.', 'Verified', 'Low', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 4),
(50, 2, NULL, 1, NULL, 18, 'Dolor vero autem.', 'Aspernatur suscipit labore voluptas id consectetur molestias iste quo ut quas molestiae.', 'Verified', 'Medium', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 10),
(51, 2, NULL, 1, 5, 17, 'Iusto vel.', 'Dignissimos voluptates qui illo voluptatibus vel ad et eius officia magnam omnis eos doloremque sit quas voluptatum autem totam.', 'Verified', 'Medium', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 10),
(52, NULL, 12, 1, 6, 16, 'Cum qui facere.', 'Quisquam quia molestiae at voluptatem consequatur maxime natus tenetur ut assumenda voluptas iusto incidunt sed neque vel aut corporis rerum.', 'In queue', 'High', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 19),
(53, 24, 2, 1, NULL, 21, 'Laboriosam sed ut.', 'Fuga facere dolorem adipisci qui dignissimos quod quos earum aliquid impedit doloribus pariatur corrupti.', 'In queue', 'Low', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 5),
(54, 3, 9, 1, NULL, 13, 'Aspernatur provident recusandae.', 'Nulla quo magnam debitis ex culpa delectus deserunt quae facilis inventore quos culpa doloribus aut alias qui perspiciatis.', 'Verified', 'Medium', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 9),
(55, 13, NULL, 1, NULL, 4, 'Ullam quasi ipsum aut.', 'Quos aut recusandae est explicabo alias est assumenda qui unde ex sit cumque maxime est est nobis iusto ex.', 'In queue', 'Medium', '2021-03-28 18:59:37', '2021-03-28 18:59:37', NULL, NULL, 17);

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
(1, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Delectus nostrum sequi quia assumenda quasi temporibus consequuntur ratione aperiam.', 1, 'This is a hardcoded solution'),
(2, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Ullam impedit reprehenderit sapiente saepe voluptatibus corrupti autem iure a.', 2, NULL),
(3, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Dolore labore quod dolores expedita consequatur aut sunt iusto excepturi.', 2, NULL),
(4, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Eos iure soluta dicta tempora sequi accusamus alias corporis facilis.', 2, NULL),
(5, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Aut enim harum ipsam laudantium quia ipsa molestias voluptatem beatae.', 2, NULL),
(6, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Asperiores animi rerum quia repellendus ab maxime dolorum dicta optio.', 3, NULL),
(7, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Explicabo minus aut modi aspernatur iusto repellendus adipisci est unde.', 3, NULL),
(8, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Rerum est quae accusantium aut iusto quibusdam facilis eos qui.', 3, NULL),
(9, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Odit et iusto quis ullam sit sunt blanditiis sit omnis.', 3, NULL),
(10, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Itaque totam voluptas non repellendus ut consequatur pariatur sit minus.', 4, NULL),
(11, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Quod dicta sed tempora illum dolore ullam qui quod reprehenderit.', 4, NULL),
(12, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Omnis in necessitatibus debitis similique vel ut omnis dolores iste.', 4, NULL),
(13, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Aspernatur maxime facere ratione aut recusandae provident aut quod consequatur.', 5, NULL),
(14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Est autem et voluptate quo exercitationem sint aspernatur enim saepe.', 5, NULL),
(15, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Quos occaecati libero non ut sed beatae assumenda et quidem.', 5, NULL),
(16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Et natus et nostrum omnis est non quia reprehenderit harum.', 5, NULL),
(17, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Voluptatem voluptatem sed et soluta occaecati ea ut facere esse.', 5, 'This is a hardcoded solution'),
(18, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Dolorem at fuga quos dolor aliquam maiores architecto voluptas atque.', 6, NULL),
(19, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Quia voluptatem excepturi qui reiciendis eligendi optio deleniti delectus qui.', 7, NULL),
(20, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Quod quo blanditiis et veniam dolores blanditiis cum ducimus doloribus.', 7, NULL),
(21, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Qui quaerat voluptatem nisi nihil delectus est minus vel consequatur.', 7, NULL),
(22, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Accusantium et et et expedita similique quia itaque enim molestias.', 7, NULL),
(23, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Explicabo recusandae neque quod maxime voluptatem molestiae quidem expedita vero.', 8, 'This is a hardcoded solution'),
(24, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Id nam ratione at suscipit et qui facilis distinctio id.', 9, NULL),
(25, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Eum quo vel voluptas eum repudiandae autem nobis ex iure.', 10, NULL),
(26, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Atque minus illo numquam ipsam quo maxime omnis assumenda aut.', 10, 'This is a hardcoded solution'),
(27, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Commodi molestiae sit enim dolor occaecati ut ullam odit atque.', 11, NULL),
(28, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Excepturi sit labore sit dolores repudiandae maiores eligendi necessitatibus exercitationem.', 11, NULL),
(29, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Nihil nisi fugit nam debitis voluptatum accusantium excepturi et et.', 11, NULL),
(30, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'In ullam cum veritatis impedit ab veniam tempore occaecati nulla.', 11, NULL),
(31, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Qui et quia nesciunt ea ipsum quis est omnis consequatur.', 12, NULL),
(32, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Maxime in assumenda ratione eos dolore ut laborum sit dolorem.', 13, NULL),
(33, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Maiores et ipsam error error hic dolor aliquid provident molestias.', 13, NULL),
(34, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Nisi impedit dolorum sint maiores eum atque quia quis asperiores.', 14, NULL),
(35, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Odit consequatur voluptatem animi suscipit animi quas enim aliquam eius.', 14, NULL),
(36, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Sit iure molestiae fugiat explicabo beatae ipsa rerum et est.', 14, NULL),
(37, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Non sed culpa cupiditate omnis aperiam laboriosam magni at adipisci.', 14, NULL),
(38, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Alias dolorum dolorem fuga nostrum eius iusto quasi voluptatem beatae.', 15, 'This is a hardcoded solution'),
(39, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Qui dolorum exercitationem excepturi qui quisquam harum maxime esse consequatur.', 16, NULL),
(40, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Quisquam sequi vero ut ea dignissimos autem veniam dignissimos blanditiis.', 16, NULL),
(41, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Harum quae consequatur assumenda fugiat doloremque quis provident eaque consequatur.', 16, 'This is a hardcoded solution'),
(42, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Dolore deserunt repellat error sequi voluptas eius corporis est sunt.', 17, NULL),
(43, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Et error ut iste et voluptatem suscipit aliquam qui odio.', 17, 'This is a hardcoded solution'),
(44, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Ex occaecati voluptate rerum vero adipisci ipsum repellendus quae iusto.', 20, NULL),
(45, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Nobis ut unde minima amet voluptatibus excepturi labore voluptas recusandae.', 20, NULL),
(46, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Doloribus totam delectus incidunt perferendis ut nam sit ipsam suscipit.', 21, NULL),
(47, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Tempore labore ut ab nihil temporibus saepe amet cupiditate illum.', 21, NULL),
(48, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Iure sed sequi dignissimos in perferendis possimus aut ratione aut.', 21, NULL),
(49, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Repellat facilis et velit perferendis fugit est quam recusandae ipsum.', 21, NULL),
(50, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Illum quibusdam impedit velit quo consequatur est ratione necessitatibus quasi.', 22, 'This is a hardcoded solution'),
(51, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Molestias autem ut eum ipsa quam sit nemo sunt fugiat.', 23, 'This is a hardcoded solution'),
(52, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Commodi et enim suscipit voluptatem illum praesentium inventore velit voluptatem.', 25, NULL),
(53, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Amet ducimus veritatis qui aut in magnam eius inventore ut.', 25, NULL),
(54, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Repudiandae autem expedita tenetur et dolorem qui a unde voluptate.', 25, NULL),
(55, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Tenetur omnis dolorem sequi cum unde voluptatem ut numquam sint.', 26, NULL),
(56, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Error nulla voluptas quis et et omnis ut officiis non.', 26, NULL),
(57, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Sit voluptas enim quod nihil quaerat quisquam sed voluptas est.', 26, NULL),
(58, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Itaque amet at voluptatem quia nam molestias sit earum voluptas.', 26, NULL),
(59, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Voluptas adipisci sit dolor et laboriosam omnis eius quis ut.', 26, 'This is a hardcoded solution'),
(60, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Assumenda a nobis voluptatem dolor animi beatae eum illum doloremque.', 27, NULL),
(61, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Molestiae rerum quisquam officia enim labore maiores accusamus nihil tempora.', 27, NULL),
(62, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Ut accusantium et earum tenetur ducimus odio nulla incidunt et.', 27, NULL),
(63, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Sequi error harum quo aut non omnis est voluptate asperiores.', 27, NULL),
(64, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Sit atque voluptate esse sed modi eligendi illum iusto quos.', 28, NULL),
(65, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Asperiores ut commodi vitae vero suscipit nulla et doloribus et.', 28, NULL),
(66, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Quas exercitationem veniam facere maiores ipsa voluptatum reprehenderit voluptate et.', 28, NULL),
(67, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Reprehenderit non et quia ipsum iure repudiandae in ea quo.', 29, NULL),
(68, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Maxime neque eligendi ea animi dolorem sunt ut suscipit voluptate.', 29, NULL),
(69, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Accusantium officia rerum debitis voluptatem mollitia deleniti quam dolores at.', 29, NULL),
(70, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Est aperiam doloremque illum quisquam est rerum dolorum ut animi.', 29, NULL),
(71, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Et excepturi laboriosam eum voluptas beatae ducimus aut eius molestias.', 30, NULL),
(72, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Voluptas reiciendis qui dolores ullam autem a ab doloremque culpa.', 30, NULL),
(73, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Debitis possimus quia numquam ipsum exercitationem voluptatum consequatur consectetur aut.', 31, NULL),
(74, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Velit fugit et beatae et deleniti nulla in mollitia beatae.', 31, NULL),
(75, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Autem sit qui eum culpa quia temporibus doloribus non accusamus.', 31, NULL),
(76, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Quo exercitationem architecto incidunt magnam labore vitae ea velit sequi.', 32, NULL),
(77, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Adipisci est ipsum dolorem dolor a nemo facilis repellat velit.', 33, 'This is a hardcoded solution'),
(78, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Repellat commodi qui et ut et aut praesentium nam itaque.', 34, NULL),
(79, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Nemo voluptatem repudiandae commodi doloremque eos porro ducimus quo similique.', 34, NULL),
(80, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Quis placeat pariatur rerum aut sed ut aut qui et.', 34, NULL),
(81, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Aut sunt velit incidunt quo sint non aut voluptatem sint.', 34, NULL),
(82, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Dolorem et ut ex ut qui beatae voluptas dolores sed.', 37, NULL),
(83, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Quis corrupti non est dignissimos recusandae quos velit eligendi vel.', 37, NULL),
(84, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Sit et dolor fugiat voluptatibus consequatur aut voluptatem sed minima.', 37, NULL),
(85, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Repellat explicabo quo enim repellat aut eaque qui molestiae at.', 37, NULL),
(86, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Voluptas dolor eos natus architecto laborum veritatis a nemo officiis.', 38, NULL),
(87, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Expedita id dolores magnam soluta quae dolorem culpa rerum quos.', 39, 'This is a hardcoded solution'),
(88, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Repellat quod eius labore aspernatur ipsam molestiae deleniti est nostrum.', 40, NULL),
(89, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Est libero consequatur magni adipisci ut amet id et est.', 40, NULL),
(90, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Voluptatem voluptas vitae dolores rem ab illo laborum sed modi.', 40, NULL),
(91, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Rerum et dolores voluptate voluptas consequuntur est facere pariatur et.', 40, NULL),
(92, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Adipisci repudiandae consequatur et id quasi aut cum nam illo.', 41, NULL),
(93, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Maxime temporibus nihil neque voluptas et odio nam voluptatibus exercitationem.', 41, NULL),
(94, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Et voluptatum dolorum fuga animi dolor consequatur mollitia maiores ducimus.', 42, 'This is a hardcoded solution'),
(95, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Et ut perferendis sunt praesentium dolores ea neque tenetur sit.', 43, 'This is a hardcoded solution'),
(96, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Molestiae id ea vel rerum tenetur vitae vitae velit repudiandae.', 45, 'This is a hardcoded solution'),
(97, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Illo consequuntur natus voluptatibus ullam enim et voluptatem voluptatum ut.', 46, NULL),
(98, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Modi saepe rerum laudantium molestiae rem repudiandae mollitia sed distinctio.', 47, 'This is a hardcoded solution'),
(99, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Sint aliquid mollitia rerum iste laudantium nisi ex illum id.', 50, NULL),
(100, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Ipsum quae est quia aliquid quo quia deserunt cupiditate voluptatem.', 51, NULL),
(101, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Est sunt commodi enim ratione sit aut provident reprehenderit incidunt.', 51, NULL),
(102, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'In velit perspiciatis dolor aut iusto aliquid quaerat excepturi culpa.', 52, NULL),
(103, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Ut nemo quia unde delectus consequuntur aut ipsum alias quia.', 53, NULL),
(104, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Dolores cum tempora dolores quos non non voluptatibus porro repellat.', 53, NULL),
(105, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Magni quam similique et dolorem natus inventore nobis labore dolor.', 53, NULL),
(106, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Enim quae incidunt incidunt modi voluptatem fuga atque consequuntur ex.', 54, NULL);

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
(1, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 1),
(2, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 2),
(3, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 3),
(4, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 4),
(5, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 5),
(6, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 6),
(7, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 7),
(8, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 8),
(9, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 9),
(10, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 10),
(11, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 11),
(12, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 12),
(13, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 13),
(14, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 14),
(15, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 15),
(16, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 16),
(17, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 17),
(18, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 18),
(19, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 19),
(20, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 20),
(21, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 21),
(22, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 24),
(23, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 25),
(24, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 26),
(25, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 27),
(26, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 28),
(27, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 29),
(28, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 30),
(29, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 31),
(30, 14, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 32),
(31, 16, '2021-03-28 18:59:36', '2021-03-28 18:59:36', 'Automatically assigned', 34),
(32, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 35),
(33, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 36),
(34, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 37),
(35, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 38),
(36, 16, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 39),
(37, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 40),
(38, 16, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 41),
(39, 16, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 44),
(40, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 46),
(41, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 48),
(42, 16, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 49),
(43, 16, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 50),
(44, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 51),
(45, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 52),
(46, 14, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 53),
(47, 16, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 54),
(48, 16, '2021-03-28 18:59:37', '2021-03-28 18:59:37', 'Automatically assigned', 55);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
