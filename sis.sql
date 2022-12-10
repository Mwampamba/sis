-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2022 at 09:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020/ 2021', '2020/ 2021', 0, '2022-12-04 05:45:15', '2022-12-04 03:33:46'),
(2, '2021/ 2022', '2021/ 2022', 0, '2022-12-04 05:45:15', '2022-12-04 03:33:36'),
(3, '2022/ 2023', '2022/ 2023', 1, '2022-12-04 03:18:20', '2022-12-04 04:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `collage_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `programme_id`, `collage_id`, `description`, `academic_year_id`, `created_at`, `updated_at`) VALUES
(1, 'First year', 1, 1, NULL, 3, '2022-12-05 15:52:42', '2022-12-05 17:24:23'),
(2, 'First year', 2, 2, NULL, 3, '2022-12-05 15:54:52', '2022-12-05 15:54:52'),
(3, 'Second year', 1, 1, NULL, 3, '2022-12-05 15:55:28', '2022-12-05 15:55:28'),
(4, 'Second year', 2, 2, NULL, 3, '2022-12-05 15:55:48', '2022-12-05 15:55:48'),
(5, 'Third year', 1, 1, NULL, 3, '2022-12-05 15:56:13', '2022-12-05 15:56:13'),
(6, 'Third year', 2, 2, NULL, 3, '2022-12-05 15:56:46', '2022-12-05 15:56:46'),
(7, 'Fourth year', 1, 1, NULL, 3, '2022-12-05 15:57:19', '2022-12-05 15:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `class_course`
--

CREATE TABLE `class_course` (
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_course`
--

INSERT INTO `class_course` (`class_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-06 20:17:47', '2022-12-06 20:17:47'),
(1, 2, '2022-12-06 20:18:43', '2022-12-05 21:00:00'),
(1, 3, '2022-12-06 20:19:18', '2022-12-06 20:19:18'),
(1, 4, '2022-12-06 20:19:18', '2022-12-06 20:19:18'),
(1, 5, '2022-12-06 20:20:20', '2022-12-06 20:20:20'),
(1, 6, '2022-12-06 20:20:20', '2022-12-06 20:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `class_examination`
--

CREATE TABLE `class_examination` (
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `examination_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_examination`
--

INSERT INTO `class_examination` (`class_id`, `examination_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-07 23:32:24', '2022-12-07 23:32:24'),
(1, 2, '2022-12-08 12:17:41', '2022-12-08 12:17:41'),
(1, 6, '2022-12-08 10:10:49', '2022-12-08 10:10:49'),
(2, 1, '2022-12-07 23:32:24', '2022-12-07 23:32:24'),
(2, 2, '2022-12-08 12:18:18', '2022-12-08 12:18:18'),
(2, 6, '2022-12-08 10:10:49', '2022-12-08 10:10:49'),
(3, 1, '2022-12-07 23:32:24', '2022-12-07 23:32:24'),
(3, 2, '2022-12-08 12:18:18', '2022-12-08 12:18:18'),
(3, 6, '2022-12-08 10:10:49', '2022-12-08 10:10:49'),
(4, 1, '2022-12-07 23:32:24', '2022-12-07 23:32:24'),
(4, 2, '2022-12-08 12:19:42', '2022-12-08 12:19:42'),
(5, 1, '2022-12-07 23:32:24', '2022-12-07 23:32:24'),
(5, 2, '2022-12-08 12:20:06', '2022-12-08 12:20:06'),
(6, 1, '2022-12-07 23:32:24', '2022-12-07 23:32:24'),
(6, 2, '2022-12-08 12:20:31', '2022-12-08 12:20:31'),
(7, 1, '2022-12-07 23:32:24', '2022-12-07 23:32:24'),
(7, 2, '2022-12-08 12:20:31', '2022-12-08 12:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `collages`
--

CREATE TABLE `collages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collages`
--

INSERT INTO `collages` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Collage of Engineering and Technology (CoET)', 'Collage of Engineering  and Technology (CoET)', 1, '2022-12-04 11:13:42', '2022-12-04 12:33:55'),
(2, 'Collage of Business Administration (CoBA)', 'Collage of Business Administration (CoBA)', 1, '2022-12-04 11:13:42', '2022-12-04 11:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0==optional, 1==core',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `code`, `credit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Electrical Circuits', 'EE111', 12, 1, '2022-12-04 21:53:36', '2022-12-04 21:53:36'),
(2, 'Engineering Mathematics I', 'MT111', 12, 1, '2022-12-04 21:53:36', '2022-12-04 21:53:36'),
(3, 'Introduction to Linux for Engineers', 'IT111', 8, 1, '2022-12-05 03:14:50', '2022-12-05 03:14:50'),
(4, 'Procedural Programming in C', 'CS111', 12, 1, '2022-12-05 03:15:39', '2022-12-05 03:15:39'),
(5, 'Communication Skills for Engineers', 'CL111', 8, 1, '2022-12-05 03:16:28', '2022-12-05 03:16:28'),
(6, 'Development Perspectives I', 'DS111', 8, 1, '2022-12-05 03:17:09', '2022-12-05 03:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-12-06 20:14:11', '2022-12-06 20:14:11'),
(2, 2, '2022-12-06 20:14:11', '2022-12-06 20:14:11'),
(3, 4, '2022-12-06 20:15:26', '2022-12-06 20:15:26'),
(4, 4, '2022-12-06 20:15:42', '2022-12-05 21:00:00'),
(5, 5, '2022-12-06 20:16:23', '2022-12-06 20:16:23'),
(6, 6, '2022-12-06 20:16:23', '2022-12-06 20:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Computer Engineering and IT', 'Computer Engineering and IT', 1, '2022-12-04 07:15:36', '2022-12-04 07:15:36'),
(2, 'Accounting', 'Accounting is a department under Business Administration umbrella.', 1, '2022-12-04 07:15:36', '2022-12-04 04:55:22'),
(3, 'Human Resources', 'Human Resources', 1, '2022-12-04 04:47:18', '2022-12-04 04:47:18'),
(5, 'Mechatronics', 'Mechatronics', 0, '2022-12-04 08:27:04', '2022-12-04 08:27:04'),
(6, 'Business Information', 'Business Information', 0, '2022-12-04 08:28:46', '2022-12-04 08:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_type_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1==active 0==not active',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `exam_name`, `exam_type_id`, `semester_id`, `academic_year_id`, `starting_date`, `ending_date`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'February, Final Examination, 2022', 1, 3, 3, '2022-12-20', '2022-12-30', 0, 'February, Final Examination, 2022', '2022-12-07 23:05:58', '2022-12-07 23:05:58'),
(2, 'August, Final Examination, 2022', 1, 3, 3, '2022-12-25', '2022-12-30', 0, 'February, Final Examination, 2022', '2022-12-08 06:14:40', '2022-12-08 06:14:40'),
(3, 'Sample exam', 3, 6, 3, '2022-12-30', '2022-12-31', 1, 'This is just a sample', '2022-12-08 09:55:34', '2022-12-08 09:55:34'),
(5, 'Sample exam updated', 3, 6, 3, '2022-12-30', '2022-12-31', 1, 'This is just a sample', '2022-12-08 09:59:34', '2022-12-08 09:59:34'),
(6, 'Sample exam updated again', 3, 6, 3, '2022-12-30', '2022-12-31', 0, 'This is just a sample', '2022-12-08 10:10:49', '2022-12-08 10:10:49'),
(7, 'Sample exam updated again again', 3, 6, 3, '2022-12-30', '2022-12-31', 0, 'This is just a sample', '2022-12-08 10:14:27', '2022-12-08 10:14:27'),
(9, 'Sample exam updated again updated', 1, 5, 3, '2022-12-30', '2022-12-31', 0, 'This is just a sample', '2022-12-08 10:17:16', '2022-12-08 10:17:16'),
(11, 'Sample exam updated again updated again', 1, 5, 3, '2022-12-30', '2022-12-31', 0, 'This is just a sample', '2022-12-08 10:18:52', '2022-12-08 10:18:52'),
(12, 'Sample exam updated again updated again last', 1, 5, 3, '2022-12-30', '2022-12-31', 0, 'This is just a sample', '2022-12-08 10:19:33', '2022-12-08 10:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `examination_marks`
--

CREATE TABLE `examination_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `score` double(8,2) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `examination_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examination_marks`
--

INSERT INTO `examination_marks` (`id`, `score`, `grade`, `student_id`, `course_id`, `class_id`, `examination_id`, `academic_year_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 78.00, 'A', 3, 1, 1, 1, 3, 1, '2022-12-08 00:37:57', '2022-12-08 00:37:57'),
(2, 67.00, 'B+', 3, 2, 1, 1, 3, 1, '2022-12-08 00:37:57', '2022-12-08 00:37:57'),
(3, 89.00, 'A', 3, 3, 1, 1, 3, 1, '2022-12-08 00:40:58', '2022-12-08 00:40:58'),
(4, 55.00, 'B', 3, 4, 1, 1, 3, 1, '2022-12-08 00:40:58', '2022-12-08 00:40:58'),
(5, 100.00, 'A', 3, 5, 1, 1, 3, 1, '2022-12-08 00:40:58', '2022-12-08 00:40:58'),
(6, 65.00, 'B+', 3, 6, 1, 1, 3, 1, '2022-12-08 00:40:58', '2022-12-08 00:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `exam_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Regular', 'Regular examination', 1, '2022-12-07 13:48:12', '2022-12-07 13:48:12'),
(2, 'Special', 'Special examination', 1, '2022-12-07 13:48:12', '2022-12-07 13:48:12'),
(3, 'Supplementary', 'Supplementary exam', 1, '2022-12-07 11:05:55', '2022-12-07 23:41:08');

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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_from` tinyint(4) NOT NULL,
  `mark_up_to` tinyint(4) NOT NULL,
  `point` tinyint(4) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `mark_from`, `mark_up_to`, `point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A', 70, 100, 5, 'Excellent', '2022-12-04 16:45:10', '2022-12-04 16:45:10'),
(2, 'B+', 60, 69, 4, 'Very good', '2022-12-04 16:45:10', '2022-12-04 16:45:10'),
(3, 'B', 50, 59, 3, 'Good', '2022-12-04 16:45:10', '2022-12-04 14:16:22'),
(4, 'C', 40, 49, 2, 'Satisfactory', '2022-12-04 16:45:10', '2022-12-04 14:16:40'),
(5, 'D', 35, 39, 1, 'Poor', '2022-12-04 14:01:44', '2022-12-04 14:01:44'),
(6, 'E', 0, 34, 0, 'Failure', '2022-12-04 14:03:35', '2022-12-04 14:03:35');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_04_053306_create_academic_years_table', 2),
(6, '2022_12_04_065610_create_departments_table', 3),
(7, '2022_12_04_071102_create_users_table', 3),
(8, '2022_12_04_111051_create_collages_table', 4),
(9, '2022_12_04_115928_create_semesters_table', 5),
(10, '2022_12_04_135811_create_semesters_table', 6),
(11, '2022_12_04_142524_create_programmes_table', 7),
(12, '2022_12_04_160433_create_grades_table', 8),
(13, '2022_12_04_200139_create_classes_table', 9),
(14, '2022_12_04_214542_create_courses_table', 10),
(15, '2022_12_05_114739_create_class_courses_table', 11),
(16, '2022_12_05_123351_create_class_courses_table', 12),
(17, '2022_12_05_183803_create_classses_table', 13),
(18, '2022_12_06_035155_create_students_table', 14),
(19, '2022_12_06_143038_create_classes_courses', 15),
(20, '2022_12_06_143630_create_courses_lecturer', 15),
(21, '2022_12_06_165522_create_courses_lecturer', 16),
(22, '2022_12_06_165809_create_courses_lecturer', 17),
(23, '2022_12_07_130614_create_exam_types_table', 18),
(24, '2022_12_07_142707_create_examinations_table', 19),
(25, '2022_12_07_225924_create_class_examinations_table', 20),
(26, '2022_12_07_234021_create_examination_marks_table', 21);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collage_id` bigint(20) UNSIGNED NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `name`, `collage_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Science in Computer Engineering and IT', 1, 'Bachelor of Science in Computer Engineering and IT', 1, '2022-12-04 14:34:13', '2022-12-04 11:56:32'),
(2, 'Bachelor in Business and Administration', 2, 'Bachelor in Business and Administration', 1, '2022-12-04 11:41:05', '2022-12-04 11:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==not active, 1==active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `academic_year_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Second semester', 1, NULL, 0, '2022-12-04 11:02:27', '2022-12-04 11:02:27'),
(3, 'First semester', 2, NULL, 0, '2022-12-04 11:02:41', '2022-12-04 11:02:41'),
(4, 'Second semester', 2, NULL, 0, '2022-12-04 11:03:33', '2022-12-04 11:03:33'),
(5, 'First semester', 3, NULL, 1, '2022-12-04 11:03:49', '2022-12-04 11:04:16'),
(6, 'Second semester', 3, NULL, 0, '2022-12-04 11:04:02', '2022-12-04 11:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `collage_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `reg_number`, `class_id`, `programme_id`, `collage_id`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nehemiah Balozi', 'nehemiahbalozi@uaut.ac.tz', '0789142365', 'UAUT-19011010', 1, 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-06 04:10:02', '2022-12-08 06:17:20'),
(2, 'Jenifer Siriwa', 'jenifersiriwa@uaut.ac.tz', '0765437890', 'UAUT-19010120', 7, 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-06 04:11:57', '2022-12-08 08:02:58'),
(3, 'Paul Ernest', 'paulernest@uaut.ac.tz', '0756153419', 'UAUT-45123490', 1, 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-06 04:23:43', '2022-12-07 21:39:02'),
(4, 'Brian Mtei', 'brianmtei@uaut.ac.tz', '0785077828', 'UAUT-14523490', 1, 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-06 03:27:35', '2022-12-08 06:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0==lecturer, 1==admin',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department_id`, `email`, `phone`, `staff_id`, `role`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 1, 'admin@admin.com', '0756100200', 'UAUT-ADMIN-001-2022', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-04 07:17:56', '2022-12-04 08:02:21'),
(2, 'Nyamajeje Buchanagandi', 1, 'drnyamajeje@uaut.ac.tz', '0785077828', 'UAUT-CoICT-2022', 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-04 05:36:52', '2022-12-05 18:17:40'),
(4, 'Ireneus Kagashe', 1, 'kagashe@uaut.ac.tz', '0745181910', 'UAUT-CoICT-01-2022', 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-04 05:38:27', '2022-12-04 05:38:27'),
(5, 'Nelson Rahul', 2, 'drnelson@uaut.ac.tz', '0786554433', 'UAUT-CoBA-01-2022', 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-04 05:39:40', '2022-12-04 05:39:40'),
(6, 'David Kiwia', 3, 'davidkiwia@uaut.ac.tz', '0765452343', 'UAUT-CoBA-02-2022', 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-04 05:40:16', '2022-12-04 05:40:16'),
(9, 'Beno Mwampamba', 2, 'bennomwampamba@gmail.com', '0686887828', 'UAUT-ADMIN-1004-2022', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2022-12-05 18:09:07', '2022-12-05 18:15:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_years_name_unique` (`name`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_programme_id_foreign` (`programme_id`),
  ADD KEY `classes_academic_year_id_foreign` (`academic_year_id`),
  ADD KEY `classes_collage_id_foreign` (`collage_id`);

--
-- Indexes for table `class_course`
--
ALTER TABLE `class_course`
  ADD PRIMARY KEY (`class_id`,`course_id`),
  ADD KEY `class_course_course_id_foreign` (`course_id`);

--
-- Indexes for table `class_examination`
--
ALTER TABLE `class_examination`
  ADD PRIMARY KEY (`class_id`,`examination_id`),
  ADD KEY `class_examination_examination_id_foreign` (`examination_id`);

--
-- Indexes for table `collages`
--
ALTER TABLE `collages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `collages_name_unique` (`name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_name_unique` (`title`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examinations_exam_name_unique` (`exam_name`),
  ADD KEY `examinations_exam_type_id_foreign` (`exam_type_id`),
  ADD KEY `examinations_semester_id_foreign` (`semester_id`),
  ADD KEY `examinations_academic_year_id_foreign` (`academic_year_id`);

--
-- Indexes for table `examination_marks`
--
ALTER TABLE `examination_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examination_marks_student_id_foreign` (`student_id`),
  ADD KEY `examination_marks_course_id_foreign` (`course_id`),
  ADD KEY `examination_marks_class_id_foreign` (`class_id`),
  ADD KEY `examination_marks_examination_id_foreign` (`examination_id`),
  ADD KEY `examination_marks_academic_year_id_foreign` (`academic_year_id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_exam_name_unique` (`exam_type`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programmes_name_unique` (`name`),
  ADD KEY `programmes_collage_id_foreign` (`collage_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesters_academic_year_id_foreign` (`academic_year_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`),
  ADD UNIQUE KEY `students_reg_number_unique` (`reg_number`),
  ADD KEY `students_class_id_foreign` (`class_id`),
  ADD KEY `students_programme_id_foreign` (`programme_id`),
  ADD KEY `students_collage_id_foreign` (`collage_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_staff_id_unique` (`staff_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `collages`
--
ALTER TABLE `collages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `examination_marks`
--
ALTER TABLE `examination_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_collage_id_foreign` FOREIGN KEY (`collage_id`) REFERENCES `collages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_course`
--
ALTER TABLE `class_course`
  ADD CONSTRAINT `class_course_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_course_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_examination`
--
ALTER TABLE `class_examination`
  ADD CONSTRAINT `class_examination_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_examination_examination_id_foreign` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examinations`
--
ALTER TABLE `examinations`
  ADD CONSTRAINT `examinations_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examinations_exam_type_id_foreign` FOREIGN KEY (`exam_type_id`) REFERENCES `exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examinations_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examination_marks`
--
ALTER TABLE `examination_marks`
  ADD CONSTRAINT `examination_marks_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examination_marks_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examination_marks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examination_marks_examination_id_foreign` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examination_marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programmes_collage_id_foreign` FOREIGN KEY (`collage_id`) REFERENCES `collages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_collage_id_foreign` FOREIGN KEY (`collage_id`) REFERENCES `collages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
