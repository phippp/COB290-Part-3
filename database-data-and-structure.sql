-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2021 at 09:05 PM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `branches`:
--

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
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number_extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `employees`:
--   `branch_id`
--       `branches` -> `id`
--   `job_id`
--       `jobs` -> `id`
--

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `forename`, `surname`, `email_address`, `job_id`, `branch_id`, `phone_number_extension`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Katelin', 'Gleason', 'isai.deckow@example.net', 6, 1, '2814', 'no', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(2, 'Daisha', 'Gislason', 'reed68@example.net', 7, 1, '8650', 'sg', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(3, 'Mateo', 'Stamm', 'myrtle.frami@example.org', 5, 6, '6485', 'gl', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(4, 'Nakia', 'Abshire', 'dedrick37@example.org', 4, 3, '8801', 'gu', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(5, 'Marty', 'Schumm', 'vwalter@example.net', 2, 5, '4223', 'ky', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(6, 'Gail', 'Lebsack', 'nsmitham@example.com', 6, 9, '5886', 'ig', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(7, 'Kade', 'Block', 'zsteuber@example.org', 2, 10, '4253', 'av', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(8, 'Neha', 'Hessel', 'agreenfelder@example.com', 6, 10, '3260', 'mg', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(9, 'Lavern', 'Terry', 'ulises23@example.com', 6, 5, '4528', 'as', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(10, 'Grant', 'Rath', 'gustave.durgan@example.net', 4, 10, '9020', 'ho', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(11, 'Alvina', 'Nitzsche', 'dorian79@example.net', 5, 7, '4585', 'hr', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(12, 'Yasmeen', 'Moen', 'veum.augustus@example.net', 5, 3, '1088', 'mt', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(13, 'Nasir', 'Runolfsson', 'jedediah.dicki@example.net', 1, 8, '1625', 'is', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(14, 'Elsa', 'Mayert', 'feest.kitty@example.org', 4, 6, '4159', 'bn', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(15, 'Anya', 'Block', 'zspencer@example.com', 3, 1, '3712', 'ig', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(16, 'Elenora', 'Wyman', 'glenda.pacocha@example.org', 4, 5, '7117', 'ff', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(17, 'Jefferey', 'Baumbach', 'mledner@example.net', 4, 2, '9966', 'es', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(18, 'Arne', 'Heidenreich', 'moen.mikayla@example.org', 3, 6, '7334', 'yo', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(19, 'Jeanne', 'Halvorson', 'stiedemann.hailey@example.com', 2, 4, '3595', 'nn', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(20, 'Angelina', 'Pfeffer', 'jhilpert@example.com', 3, 3, '8232', 'ae', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(21, 'Candida', 'Pacocha', 'hirthe.van@example.org', 5, 10, '2244', 'et', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(22, 'Celestine', 'Schaden', 'pkris@example.com', 2, 2, '8572', 'lu', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(23, 'Lindsey', 'Padberg', 'everardo.hansen@example.net', 1, 6, '9624', 'aa', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(24, 'Torrey', 'Pagac', 'parker.daphne@example.net', 4, 2, '6449', 'qu', '2021-03-11 18:27:29', '2021-03-11 18:27:29'),
(25, 'Quinton', 'Torphy', 'vwest@example.com', 6, 5, '9406', 'xh', '2021-03-11 18:27:29', '2021-03-11 18:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
CREATE TABLE `hardware` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `hardware`:
--

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `holidays`:
--   `employee_id`
--       `employees` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `jobs`:
--

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
-- Table structure for table `log_histories`
--

DROP TABLE IF EXISTS `log_histories`;
CREATE TABLE `log_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `problem_log_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `log_histories`:
--   `problem_log_id`
--       `problem_logs` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `migrations`:
--

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
(19, '2021_03_03_210702_create_call_history_table', 7),
(20, '2021_03_03_211114_create_specialist_tracker_table', 7),
(21, '2021_03_21_190358_add_user_column_to_problem_logs', 8),
(22, '2021_03_21_191728_remove_employee_id_from_log_histories_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `operating_systems`
--

DROP TABLE IF EXISTS `operating_systems`;
CREATE TABLE `operating_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operating_system_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `operating_systems`:
--

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `problem_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_id` bigint(20) UNSIGNED DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `problems`:
--   `problem_id`
--       `problems` -> `id`
--

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `hardware_id` bigint(20) UNSIGNED DEFAULT NULL,
  `software_id` bigint(20) UNSIGNED DEFAULT NULL,
  `specialist_assigned` tinyint(1) NOT NULL,
  `operating_system_id` bigint(20) UNSIGNED DEFAULT NULL,
  `problem_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `solved_at` datetime DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `problem_logs`:
--   `client_id`
--       `employees` -> `id`
--   `employee_id`
--       `employees` -> `id`
--   `hardware_id`
--       `hardware` -> `id`
--   `operating_system_id`
--       `operating_systems` -> `id`
--   `problem_id`
--       `problems` -> `id`
--   `software_id`
--       `software` -> `id`
--

--
-- Dumping data for table `problem_logs`
--

INSERT INTO `problem_logs` (`id`, `hardware_id`, `software_id`, `specialist_assigned`, `operating_system_id`, `problem_id`, `title`, `description`, `status`, `importance`, `created_at`, `updated_at`, `solved_at`, `employee_id`, `client_id`) VALUES
(2, 9, 21, 0, 6, 21, 'Ducimus animi.', 'Placeat mollitia et ea voluptas aut ex corrupti unde sit accusamus et aut omnis.', 'In queue', '5', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(3, 12, 3, 0, 4, 19, 'Illo veritatis earum voluptatem.', 'Enim rerum doloremque alias quis dicta eius vitae error dolorem.', 'In queue', '10', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(4, 7, 3, 0, 6, 22, 'Est repellat quisquam.', 'A voluptatibus porro expedita nam optio autem non temporibus architecto.', 'In queue', '15', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(5, 21, 14, 0, 1, 21, 'Dolore ducimus nesciunt.', 'Iusto veniam suscipit ex consequatur quisquam ratione ut eius dolorem voluptatem voluptatem odio rerum.', 'Solved', '2', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(6, 9, 12, 0, 1, 14, 'Veniam in quod.', 'Perferendis odio non cum ipsum unde officiis adipisci aspernatur corporis earum ex ipsam vel ipsa accusantium velit qui quia.', 'Verified', '2', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(7, 13, 7, 0, 4, 10, 'Consequatur aut molestiae placeat.', 'Odit reiciendis qui voluptatem tenetur eum nesciunt ut voluptatem molestias et ducimus amet tenetur quia qui quia non.', 'Verified', '11', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 6),
(8, 18, 3, 0, 7, 19, 'At eos soluta est.', 'Culpa odio culpa molestias et laborum adipisci et libero quam culpa iure mollitia temporibus accusamus inventore earum architecto ut doloremque.', 'Solved', '1', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 6),
(9, 1, 11, 0, 5, 13, 'Voluptatem nobis nam.', 'Laudantium aut molestiae officiis quo officiis dolore voluptate non necessitatibus recusandae assumenda voluptas praesentium aliquam aspernatur atque quos unde corrupti.', 'In queue', '8', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(10, 16, 7, 0, 6, 8, 'Ut sint voluptatem est.', 'Quia sit aliquam occaecati magni est esse hic explicabo in ducimus.', 'Verified', '12', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(11, 23, 9, 0, 2, 7, 'Eos aut omnis commodi.', 'Accusantium sint voluptas neque corporis est officiis praesentium quidem sed.', 'Verified', '10', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(12, 1, 8, 0, 4, 15, 'Recusandae dolores impedit.', 'Fugit molestiae ipsa amet rerum et autem et corrupti est eum fugiat.', 'Solved', '8', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(13, 22, 22, 0, 1, 10, 'Dignissimos enim et esse.', 'Dolorum blanditiis sed reprehenderit iste rem eos qui a nobis excepturi cumque quo suscipit et optio eaque excepturi.', 'In queue', '10', '2021-03-25 20:00:50', '2021-03-25 20:00:50', NULL, NULL, 1),
(14, 21, 25, 0, 6, 20, 'Qui non ducimus tempora.', 'Necessitatibus inventore dolorum dolores quia asperiores inventore sed harum id occaecati non reprehenderit a natus fuga voluptatem.', 'In queue', '9', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 1),
(15, 9, 7, 0, 2, 4, 'Fugiat odio sed.', 'Et similique iste sequi velit aut labore magnam tempora consequatur sed nesciunt a vel illo eveniet voluptatum accusantium fugit earum.', 'In queue', '16', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 6),
(16, 19, 23, 0, 1, 17, 'Eos ipsam beatae sint provident.', 'Aut sit et nihil repellendus unde labore voluptas beatae nesciunt error fugiat et omnis dolorem aut voluptas.', 'Solved', '8', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 1),
(17, 16, 7, 0, 3, 9, 'Natus est et.', 'Et voluptas vitae ut nihil tempore nihil odio optio quam ipsum est minus qui amet amet nulla ea.', 'Solved', '11', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 1),
(18, 5, 12, 0, 3, 11, 'Nulla quo hic enim.', 'Libero porro sit architecto quidem temporibus sunt quia libero consequuntur non.', 'Verified', '16', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 6),
(19, 24, 24, 0, 6, 12, 'Quia facilis voluptates reprehenderit.', 'Sit alias rerum veniam sit id qui enim repellat fuga nostrum aut eos voluptatem architecto velit quis sed repellat soluta aspernatur.', 'In queue', '11', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 6),
(20, 2, 5, 0, 4, 9, 'Et consequuntur.', 'Soluta laboriosam voluptas est tempora harum quia natus repudiandae amet est ut neque quasi sunt quam sit.', 'Verified', '17', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 6),
(21, 16, 15, 0, 4, 20, 'Nulla quia et sit.', 'Alias est temporibus ea aut est quos error et laborum voluptates dolor sed doloremque consequatur voluptatem totam consequatur ex.', 'Verified', '1', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 6),
(22, 5, 13, 0, 3, 19, 'Aut assumenda cumque ab.', 'Voluptas quae minus consequuntur sapiente autem voluptates nisi expedita magni error qui itaque.', 'Verified', '5', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 1),
(23, 17, 11, 0, 5, 18, 'Dolores rerum ratione.', 'Sapiente sed est nulla cum explicabo libero et minima corrupti nesciunt voluptatum nisi sint.', 'In queue', '8', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 6),
(24, 23, 16, 0, 8, 22, 'Maiores autem unde aut repellat.', 'Quae qui accusantium aliquam et nostrum dolorum rem ullam quidem et.', 'Solved', '18', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 1),
(25, 8, 11, 0, 5, 10, 'Doloribus sunt possimus.', 'Assumenda est est sint excepturi et quaerat dolores maxime optio est et sunt exercitationem alias non.', 'Verified', '13', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 6),
(26, 2, 23, 0, 7, 7, 'Nostrum rem velit aut.', 'Voluptas itaque eaque ut adipisci minima vel perspiciatis veritatis unde placeat nobis non aut iste facilis eum saepe.', 'Verified', '8', '2021-03-25 20:00:51', '2021-03-25 20:00:51', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `problem_notes`
--

DROP TABLE IF EXISTS `problem_notes`;
CREATE TABLE `problem_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_received_by` bigint(20) UNSIGNED NOT NULL,
  `caller_id` bigint(20) UNSIGNED NOT NULL,
  `problem_log_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `problem_notes`:
--   `call_received_by`
--       `employees` -> `id`
--   `caller_id`
--       `employees` -> `id`
--   `problem_log_id`
--       `problem_logs` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
CREATE TABLE `software` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `software`:
--

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `working_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `specialists`:
--   `employee_id`
--       `employees` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `specialist_skills`
--

DROP TABLE IF EXISTS `specialist_skills`;
CREATE TABLE `specialist_skills` (
  `problem_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `specialist_skills`:
--   `employee_id`
--       `employees` -> `id`
--   `problem_id`
--       `problems` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `specialist_trackers`
--

DROP TABLE IF EXISTS `specialist_trackers`;
CREATE TABLE `specialist_trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_log_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `specialist_trackers`:
--   `employee_id`
--       `employees` -> `id`
--   `problem_log_id`
--       `problem_logs` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--   `employee_id`
--       `employees` -> `id`
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `employee_id`) VALUES
(1, 'user', '$2y$10$2ng4hJk//nZcsvqnI15bXu59QrPDXWfhsKF7q3.pbYhHCCV0.nMAK', 1),
(2, 'specialist', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2),
(3, 'ferry.oswald', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3),
(4, 'toni94', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4),
(5, 'champlin.kyla', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5),
(6, 'alexa22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6),
(7, 'ymoore', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 7),
(8, 'obalistreri', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 8),
(9, 'hershel40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9),
(10, 'bstoltenberg', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 10),
(11, 'gus87', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 11),
(12, 'robin.jacobi', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 12),
(13, 'omiller', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 13),
(14, 'modesto.murphy', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 14),
(15, 'abel69', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 15),
(16, 'okeeling', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 16),
(17, 'derek.ward', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 17),
(18, 'gbechtelar', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 18),
(19, 'bailee28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 19),
(20, 'qpurdy', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 20),
(21, 'alva.koepp', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 21),
(22, 'monserrat60', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 22),
(23, 'renner.neil', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 23),
(24, 'gonzalo.kerluke', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 24),
(25, 'heaven85', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `log_histories`
--
ALTER TABLE `log_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_histories_problem_log_id_foreign` (`problem_log_id`);

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
  ADD KEY `problem_notes_call_received_by_foreign` (`call_received_by`),
  ADD KEY `problem_notes_caller_id_foreign` (`caller_id`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_histories`
--
ALTER TABLE `log_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `operating_systems`
--
ALTER TABLE `operating_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `problem_logs`
--
ALTER TABLE `problem_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `problem_notes`
--
ALTER TABLE `problem_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialist_trackers`
--
ALTER TABLE `specialist_trackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `log_histories`
--
ALTER TABLE `log_histories`
  ADD CONSTRAINT `log_histories_problem_log_id_foreign` FOREIGN KEY (`problem_log_id`) REFERENCES `problem_logs` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `problem_notes_call_received_by_foreign` FOREIGN KEY (`call_received_by`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `problem_notes_caller_id_foreign` FOREIGN KEY (`caller_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
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
