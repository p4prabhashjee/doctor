-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 02:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` int(20) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Active, 2:Deactive, 3:Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `country_code`, `image`, `password`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234567890', 91, 'uploads/profile/63500.png', '$2y$10$3VqZNWUQOK1uM7IFbnbBYOixVk0OP9.ZU4HawXwb8mDlWFx4VgT0O', NULL, 1, NULL, '2023-09-22 06:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `apply_loans`
--

CREATE TABLE `apply_loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intrest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intrest_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `let_fine_intrest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recover_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_bonuse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending' COMMENT 'Pending, Active, Reject, Closed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apply_loan_installments`
--

CREATE TABLE `apply_loan_installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apply_loan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `let_fine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1:pending,2:Paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `doctor_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', 'dgdfg', '2023-11-27 12:11:31', '2023-11-27 12:11:31'),
(2, '1', 'dfg', '2023-11-27 12:11:31', '2023-11-27 12:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `image_tag`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NoorMediCare', NULL, 'noormedicare', 'In healthcare sector, service excellence is the facility of the hospital as healthcare service provider to consistently.', NULL, NULL, NULL, NULL, 'uploads/banner/87178.jpg', 1, '2023-11-14 16:26:38', '2023-11-14 16:26:38'),
(2, 'row align-items-center gx-5', NULL, 'row-align-items-center-gx-5', 'Join Us Forever To Get Help From Anywhere', NULL, NULL, NULL, NULL, 'uploads/banner/37443.jpg', 1, '2023-11-14 16:29:28', '2023-11-14 16:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active, 2:Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `short_description`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `image`, `image_tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cardiology', 'cardiology', NULL, '<p>At NoorMediCare, It is considered efficient onus to offer proficient care to patients suffering from one or more heart ailments. It has onboard leading expert, doctors, hospitals and medical centers. Its specialized team of cardiologists offers &acirc;&euro;&ldquo;preventive services, diagnostic facilities as well as treatment plans for patients with suspected or actual diseases. The wide of array of cardiac services include&acirc;&euro;&ldquo;</p>\r\n\r\n<ul>\r\n	<li>Non-Invasive Diagnostic Facilities, including but not limited to Color Doppler, Echo Machines, Treadmill as well as Holter Monitoring</li>\r\n	<li>Interventional Cardiac, Vascular and Electrophysiological Procedures</li>\r\n</ul>\r\n\r\n<p>Its facility that makes is truly commendable, and worth ones time is the fact that doctors comply with international protocols, while practicing evidence-based medicine. Moreover. It offers complete services with advanced infrastructure for the management of complicated heart conditions round the clock.</p>\r\n\r\n<h3>TREATMENTS AND PROCEDURES</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>At our state of the art facility, you can rest assured of availing the best possible courses of treatment, the most prominent of which is mentioned below-</p>\r\n\r\n<p><strong>Non Invasive procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Electrocardiography (ECG)</li>\r\n	<li>Treadmill Stress ECG (TMT)</li>\r\n	<li>Stress Echo and Dobutamine Stress Echo</li>\r\n	<li>Holter monitor and Tilt table study</li>\r\n</ul>\r\n\r\n<p><strong>Invasive Procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Coronary angiography</li>\r\n	<li>Coronary angioplasty</li>\r\n	<li>Balloon valvuloplasty</li>\r\n	<li>Right heart catheterisation</li>\r\n	<li>Biventricular pacemaker placement</li>\r\n	<li>Atrial Septal Defect / Patent Ductus Arteriosis device closure</li>\r\n	<li>Implantable Cardiac Defibrillator (ICD)</li>\r\n	<li>PTA (percutaneous transluminal angioplasty)</li>\r\n</ul>\r\n\r\n<p><strong>Peripheral Invasive Procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Renal Vascular Stenting</li>\r\n	<li>Lower Extremity Percutaneous Transluminal Angioplasty/Intra</li>\r\n	<li>Arterial Thrombolysis /Percutaneous Transluminal Balloon Angioplasty</li>\r\n	<li>Endovascular repair of aneurysms</li>\r\n</ul>\r\n\r\n<p>It offers a host of tertiary care services directed towards making the journey to a healthier life comfortable and satisfactory for you. This is your call to stop suffering, and get yourself or your loved one treated in one of the leading facilities in India!</p>', 'Cardiology', 'At NoorMediCare, It is considered efficient onus to offer proficient care to patients suffering from one or more heart ailments. It has onboard leading expert, doctors, hospitals and medical centers. Its specialized team of cardiologists offers â€“preventive services, diagnostic facilities as well as treatment plans for patients with suspected or actual diseases. The wide of array of cardiac services includeâ€“', NULL, 'uploads/category/26589.jpg', NULL, 1, '2023-11-14 17:56:26', '2023-11-14 17:56:26'),
(2, 'Orthopaedic', 'orthopaedic', 'At NoorMediCare, its team of orthopedic doctors have an in-depth under.', '<p>At NoorMediCare, It is considered efficient onus to offer proficient care to patients suffering from one or more heart ailments. It has onboard leading expert, doctors, hospitals and medical centers. Its specialized team of cardiologists offers &acirc;&euro;&ldquo;preventive services, diagnostic facilities as well as treatment plans for patients with suspected or actual diseases. The wide of array of cardiac services include&acirc;&euro;&ldquo;</p>\r\n\r\n<ul>\r\n	<li>Non-Invasive Diagnostic Facilities, including but not limited to Color Doppler, Echo Machines, Treadmill as well as Holter Monitoring</li>\r\n	<li>Interventional Cardiac, Vascular and Electrophysiological Procedures</li>\r\n</ul>\r\n\r\n<p>Its facility that makes is truly commendable, and worth ones time is the fact that doctors comply with international protocols, while practicing evidence-based medicine. Moreover. It offers complete services with advanced infrastructure for the management of complicated heart conditions round the clock.</p>\r\n\r\n<h3>TREATMENTS AND PROCEDURES</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>At our state of the art facility, you can rest assured of availing the best possible courses of treatment, the most prominent of which is mentioned below-</p>\r\n\r\n<p><strong>Non Invasive procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Electrocardiography (ECG)</li>\r\n	<li>Treadmill Stress ECG (TMT)</li>\r\n	<li>Stress Echo and Dobutamine Stress Echo</li>\r\n	<li>Holter monitor and Tilt table study</li>\r\n</ul>\r\n\r\n<p><strong>Invasive Procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Coronary angiography</li>\r\n	<li>Coronary angioplasty</li>\r\n	<li>Balloon valvuloplasty</li>\r\n	<li>Right heart catheterisation</li>\r\n	<li>Biventricular pacemaker placement</li>\r\n	<li>Atrial Septal Defect / Patent Ductus Arteriosis device closure</li>\r\n	<li>Implantable Cardiac Defibrillator (ICD)</li>\r\n	<li>PTA (percutaneous transluminal angioplasty)</li>\r\n</ul>\r\n\r\n<p><strong>Peripheral Invasive Procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Renal Vascular Stenting</li>\r\n	<li>Lower Extremity Percutaneous Transluminal Angioplasty/Intra</li>\r\n	<li>Arterial Thrombolysis /Percutaneous Transluminal Balloon Angioplasty</li>\r\n	<li>Endovascular repair of aneurysms</li>\r\n</ul>\r\n\r\n<p>It offers a host of tertiary care services directed towards making the journey to a healthier life comfortable and satisfactory for you. This is your call to stop suffering, and get yourself or your loved one treated in one of the leading facilities in India!</p>', NULL, NULL, NULL, 'uploads/category/46968.png', NULL, 1, '2023-11-14 20:39:12', '2023-11-14 20:39:12'),
(3, 'Neurology & brain surgery', 'neurology-b', 'Neurology and Brain Surgery have always been the more sophisticated sp', '<p>At NoorMediCare, It is considered efficient onus to offer proficient care to patients suffering from one or more heart ailments. It has onboard leading expert, doctors, hospitals and medical centers. Its specialized team of cardiologists offers &acirc;&euro;&ldquo;preventive services, diagnostic facilities as well as treatment plans for patients with suspected or actual diseases. The wide of array of cardiac services include&acirc;&euro;&ldquo;</p>\r\n\r\n<ul>\r\n	<li>Non-Invasive Diagnostic Facilities, including but not limited to Color Doppler, Echo Machines, Treadmill as well as Holter Monitoring</li>\r\n	<li>Interventional Cardiac, Vascular and Electrophysiological Procedures</li>\r\n</ul>\r\n\r\n<p>Its facility that makes is truly commendable, and worth ones time is the fact that doctors comply with international protocols, while practicing evidence-based medicine. Moreover. It offers complete services with advanced infrastructure for the management of complicated heart conditions round the clock.</p>\r\n\r\n<h3>TREATMENTS AND PROCEDURES</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>At our state of the art facility, you can rest assured of availing the best possible courses of treatment, the most prominent of which is mentioned below-</p>\r\n\r\n<p><strong>Non Invasive procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Electrocardiography (ECG)</li>\r\n	<li>Treadmill Stress ECG (TMT)</li>\r\n	<li>Stress Echo and Dobutamine Stress Echo</li>\r\n	<li>Holter monitor and Tilt table study</li>\r\n</ul>\r\n\r\n<p><strong>Invasive Procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Coronary angiography</li>\r\n	<li>Coronary angioplasty</li>\r\n	<li>Balloon valvuloplasty</li>\r\n	<li>Right heart catheterisation</li>\r\n	<li>Biventricular pacemaker placement</li>\r\n	<li>Atrial Septal Defect / Patent Ductus Arteriosis device closure</li>\r\n	<li>Implantable Cardiac Defibrillator (ICD)</li>\r\n	<li>PTA (percutaneous transluminal angioplasty)</li>\r\n</ul>\r\n\r\n<p><strong>Peripheral Invasive Procedures</strong></p>\r\n\r\n<ul>\r\n	<li>Renal Vascular Stenting</li>\r\n	<li>Lower Extremity Percutaneous Transluminal Angioplasty/Intra</li>\r\n	<li>Arterial Thrombolysis /Percutaneous Transluminal Balloon Angioplasty</li>\r\n	<li>Endovascular repair of aneurysms</li>\r\n</ul>\r\n\r\n<p>It offers a host of tertiary care services directed towards making the journey to a healthier life comfortable and satisfactory for you. This is your call to stop suffering, and get yourself or your loved one treated in one of the leading facilities in India!</p>', NULL, NULL, NULL, 'uploads/category/86201.jpg', NULL, 1, '2023-11-14 20:40:11', '2023-11-23 11:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active, 2:Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jaipur', 19, 1, '2023-03-09 06:53:28', '2023-04-14 11:50:48'),
(2, 'Delhi', 25, 1, '2023-03-09 06:55:23', '2023-04-14 12:37:13'),
(3, 'Mumbai', 12, 1, '2023-03-09 06:56:16', '2023-04-18 11:36:19'),
(4, 'Chennai', 21, 1, '2023-03-09 06:57:12', '2023-04-18 11:36:08'),
(5, 'Bangalore', 9, 1, '2023-03-09 06:57:58', '2023-04-18 11:35:56'),
(6, 'Pushkar', 19, 1, '2023-03-09 07:00:23', '2023-04-18 11:35:36'),
(7, 'Jodhpur', 19, 1, '2023-03-09 07:08:39', '2023-04-18 11:35:47'),
(8, 'Test', NULL, 3, '2023-03-09 07:20:30', '2023-03-09 07:21:19'),
(9, 'Udaipur', 19, 1, '2023-03-09 09:22:17', '2023-04-20 10:32:20'),
(10, 'Manali', 7, 1, '2023-03-09 09:57:53', '2023-04-18 11:35:25'),
(11, 'Nainital', 23, 1, '2023-03-09 09:58:12', '2023-04-20 10:32:46'),
(12, 'Agra', 23, 1, '2023-03-09 09:58:25', '2023-04-18 11:34:18'),
(13, 'Haridwar', 23, 1, '2023-03-09 09:58:51', '2023-04-20 10:32:34'),
(14, 'Gurgaon', 23, 1, '2023-03-09 09:59:09', '2023-04-20 10:32:28'),
(15, 'Jaipur (Rajasthan)', 2, 1, '2023-11-27 14:37:18', '2023-11-27 14:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enqueries`
--

CREATE TABLE `contact_enqueries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_enqueries`
--

INSERT INTO `contact_enqueries` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Sanjay', '08888888888', 'sanjay.kumar@jploft.in', 'Subject', 'Message', '2023-03-09 12:45:10', '2023-03-09 12:45:10'),
(2, 'Sanjay contact Us', '+91 07791919466', 'sanjay.kumar@jploft.in', 'Subject', 'Message', '2023-03-15 18:55:30', '2023-03-15 18:55:30'),
(3, 'Sanjay contact Us', '+91 07791919466', 'sanjay.kumar@jploft.in', 'Subject', 'Message', '2023-03-15 18:55:56', '2023-03-15 18:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
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
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
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
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:active,2:deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `title`, `slug`, `phone`, `email`, `designation`, `experience`, `hospital_id`, `specialist_id`, `short_description`, `description`, `image`, `image_tag`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Naresh Trehan', 'naresh-trehan', '9214711000', 'sunsoftwebsite@gmail.com', 'Director', '10 year', '2', '1', 'asdsfd', '<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'uploads/category/40941.png', NULL, 'Privacy Policy', 'asd', NULL, 1, '2023-11-15 12:53:21', '2023-11-27 18:05:53'),
(2, 'Dr. Arun Prasad', 'dr-arun-prasad', '9214711000', 'admin@gmail.com', '', '', '', '2', 'Fortis FMRI', '<p><strong>Fortis Memorial Research Institute (FMRI)</strong>&nbsp;is a multi-super-speciality, quaternary care hospital with an enviable international faculty, reputed clinicians, including super-sub-specialists and speciality nurses, supported by cutting edge technology. A premium referral hospital, it endeavours to be the Mecca of Healthcare&Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; for Asia Pacific and beyond. Set on a spacious 11-acre campus with 1000 beds, this Next Generation Hospital&Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; is built on the foundation of Trust &Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; and rests on four strong pillars: Talent, Technology, Service and Infrastructure.</p>\r\n\r\n<p>FMRI believes that the accreditation of hospital programs &amp; divisions is another big success that bolsters the institute position in the healthcare domain and will add to its eminent quality medical services.</p>\r\n\r\n<p>Fortis Memorial Research Institute is accredited by National Accreditation Board for Hospitals &amp; Healthcare Providers (NABH) and follow the policies of the board to cater to much desired needs of the patients and to set quality benchmarks in healthcare industry.</p>\r\n\r\n<p>On the other hand, the blood bank at FMRI is accredited by NABH by its extensive service delivery in the related domain. Our laboratory services are also accredited by National Accreditation Board for Testing and Calibration Laboratories (NABL), which works with the objective to provide Government, Regulators and Industry with a scheme of laboratory accreditation through third-party assessment for formally recognizing the technical competence of laboratories. The accreditation services are provided for testing, calibration and medical laboratories in accordance with International Organization for Standardization (ISO) Standards.</p>', 'uploads/category/27343.jpg', NULL, NULL, NULL, NULL, 1, '2023-11-14 21:21:23', '2023-11-14 21:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `duration_lists`
--

CREATE TABLE `duration_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enqueries`
--

CREATE TABLE `enqueries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1:hospital,2:doctor,3:specialities',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `page_id` varchar(255) DEFAULT NULL,
  `pade_detail_id` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `page_id`, `pade_detail_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', '1', NULL, 1, '2023-11-23 02:49:42', '2023-11-23 02:54:53'),
(2, 'asd', 'asdas', NULL, '3', 1, '2023-11-23 11:03:40', '2023-11-23 11:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `description`, `type`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asdfa', 'asdfa', 'asdfs', '1', 'uploads/category/18251.jpg', 1, '2023-11-23 12:32:40', '2023-11-23 12:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:active,2:deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `title`, `slug`, `short_description`, `description`, `city_id`, `image`, `image_tag`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Medanta', 'medanta', 'Medanta', '<p>Medanta (The Medicity) is a multi-specialty medical institute based in Gurgaon in the National Capital Region of India. It was started in 2009, with cardiac surgeon, Naresh Trehan. as its main director along with co founder Sunil Sachdeva and various others. The hospital has more than 1600 beds and has expanded its outreach to other cities including Lucknow, Indore and Ranchi. Lucknow is now getting its own 1000 bedded hospital</p>\r\n\r\n<p>Medantas massive 2.1 million sq. ft. campus provides 1,600+ beds and houses facilities for over 22+ super-specialties, all under one roof. Each floor is dedicated to a specialisation to ensure that they function as independent hospitals within a hospital and yet have the comfort of collaborating on complex cases. Patients are provided with multiple options for treatment, the most suitable of which are arrived at through a cross-function, cross-specialisation committee such as Tumor board that decides the best course of action</p>\r\n\r\n<p>Medanta is home to some of the most eminent doctors in the world, most of whom are not just highly decorated, but also pioneers in their respective arenas</p>\r\n\r\n<p>Medanta - The Medicity is one of India largest multi-super specialty institutes located in Gurgaon, a bustling town in the National Capital Region. Founded by eminent cardiac surgeon, Dr. Naresh Trehan, the institution has been envisioned with the aim of bringing to India the highest standards of medical care along with clinical research, education and training. Medanta is governed under the guiding principles of providing medical services to patients with care, compassion, commitment.</p>', '', 'uploads/hospitals/99802.png', NULL, 'Medanta', 'Medanta', NULL, 1, '2023-11-15 12:36:00', '2023-11-14 20:23:09'),
(2, 'Fortis FMRI', 'fortis-fmri', 'Fortis FMRI', '<p><strong>Fortis Memorial Research Institute (FMRI)</strong>&nbsp;is a multi-super-speciality, quaternary care hospital with an enviable international faculty, reputed clinicians, including super-sub-specialists and speciality nurses, supported by cutting edge technology. A premium referral hospital, it endeavours to be the Mecca of Healthcare&Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; for Asia Pacific and beyond. Set on a spacious 11-acre campus with 1000 beds, this Next Generation Hospital&Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; is built on the foundation of Trust &Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; and rests on four strong pillars: Talent, Technology, Service and Infrastructure.</p>\r\n\r\n<p>FMRI believes that the accreditation of hospital programs &amp; divisions is another big success that bolsters the institute position in the healthcare domain and will add to its eminent quality medical services.</p>\r\n\r\n<p>Fortis Memorial Research Institute is accredited by National Accreditation Board for Hospitals &amp; Healthcare Providers (NABH) and follow the policies of the board to cater to much desired needs of the patients and to set quality benchmarks in healthcare industry.</p>\r\n\r\n<p>On the other hand, the blood bank at FMRI is accredited by NABH by its extensive service delivery in the related domain. Our laboratory services are also accredited by National Accreditation Board for Testing and Calibration Laboratories (NABL), which works with the objective to provide Government, Regulators and Industry with a scheme of laboratory accreditation through third-party assessment for formally recognizing the technical competence of laboratories. The accreditation services are provided for testing, calibration and medical laboratories in accordance with International Organization for Standardization (ISO) Standards.</p>', '', 'uploads/hospitals/99136.png', NULL, NULL, NULL, NULL, 1, '2023-11-14 21:25:56', '2023-11-14 21:25:56'),
(3, 'Artemis Hospital', 'artemis-hospital', 'Artemis Hospital', '<p><strong>Fortis Memorial Research Institute (FMRI)</strong>&nbsp;is a multi-super-speciality, quaternary care hospital with an enviable international faculty, reputed clinicians, including super-sub-specialists and speciality nurses, supported by cutting edge technology. A premium referral hospital, it endeavours to be the Mecca of Healthcare&Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; for Asia Pacific and beyond. Set on a spacious 11-acre campus with 1000 beds, this Next Generation Hospital&Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; is built on the foundation of Trust &Atilde;&cent;&Acirc;&bdquo;&Acirc;&cent; and rests on four strong pillars: Talent, Technology, Service and Infrastructure.</p>\r\n\r\n<p>FMRI believes that the accreditation of hospital programs &amp; divisions is another big success that bolsters the institute position in the healthcare domain and will add to its eminent quality medical services.</p>\r\n\r\n<p>Fortis Memorial Research Institute is accredited by National Accreditation Board for Hospitals &amp; Healthcare Providers (NABH) and follow the policies of the board to cater to much desired needs of the patients and to set quality benchmarks in healthcare industry.</p>\r\n\r\n<p>On the other hand, the blood bank at FMRI is accredited by NABH by its extensive service delivery in the related domain. Our laboratory services are also accredited by National Accreditation Board for Testing and Calibration Laboratories (NABL), which works with the objective to provide Government, Regulators and Industry with a scheme of laboratory accreditation through third-party assessment for formally recognizing the technical competence of laboratories. The accreditation services are provided for testing, calibration and medical laboratories in accordance with International Organization for Standardization (ISO) Standards.</p>', '1', 'uploads/hospitals/38663.png', NULL, NULL, NULL, NULL, 1, '2023-11-14 21:27:07', '2023-11-27 14:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `installment_times`
--

CREATE TABLE `installment_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active,2:Inactive,3:delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `late_extension_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `late_terms_conditions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_bonus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_installment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active, 2:Deactive, 3:Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `doctor_id`, `name`, `created_at`, `updated_at`) VALUES
(3, '1', 'xvxgv', '2023-11-27 18:06:05', '2023-11-27 18:06:05');

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
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(29, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(30, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(31, '2016_06_01_000004_create_oauth_clients_table', 1),
(32, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2023_01_24_122618_create_admins_table', 1),
(36, '2023_01_27_064228_create_settings_table', 1),
(37, '2023_01_31_075500_create_users_table', 1),
(38, '2023_01_31_102446_create_user_otps_table', 2),
(39, '2023_02_01_061048_create_faq_categories_table', 3),
(40, '2023_02_01_085705_create_faqs_table', 4),
(41, '2023_02_01_093849_create_cities_table', 5),
(42, '2023_02_01_095629_create_states_table', 6),
(43, '2023_02_01_114502_create_venders_table', 7),
(44, '2023_02_02_070020_create_amities_table', 8),
(46, '2023_02_02_073959_create_hotel_rooms_table', 9),
(47, '2023_02_02_085757_create_room_images_table', 10),
(48, '2023_02_02_101522_create_food_table', 11),
(49, '2023_02_03_064757_create_favorites_table', 12),
(50, '2023_02_03_072336_create_collections_table', 13),
(52, '2023_02_03_090453_create_pages_table', 14),
(54, '2023_02_03_103206_create_associates_table', 15),
(57, '2023_02_03_110133_create_booking_rooms_table', 16),
(58, '2023_02_07_090144_create_booking_room_details_table', 17),
(59, '2023_02_07_090215_create_booking_food_details_table', 17),
(60, '2023_02_07_114431_create_user_reviews_table', 18),
(62, '2023_02_08_053036_create_notifications_table', 19),
(63, '2023_02_08_063942_create_transfer_histories_table', 20),
(64, '2023_02_08_072806_create_referrals_point_histories_table', 21),
(65, '2023_02_09_103644_create_bank_accounts_table', 22),
(66, '2023_02_13_075301_create_group_permissions_table', 23),
(68, '2023_02_13_121353_create_promo_codes_table', 24),
(71, '2023_02_15_043626_create_why_choose_us_table', 25),
(72, '2023_02_16_122441_create_contact_enqueries_table', 25),
(73, '2023_02_17_054309_create_careers_table', 26),
(75, '2023_02_17_104652_create_abouts_table', 27),
(76, '2023_02_17_114518_create_about_us_table', 27),
(77, '2023_02_17_124539_create_teams_table', 28),
(78, '2023_02_21_130038_create_news_letters_table', 29),
(80, '2023_02_23_052152_create_temp_users_table', 30),
(81, '2023_09_23_101944_create_loans_table', 31),
(82, '2023_09_23_104818_create_installment_times_table', 31),
(83, '2023_09_25_154444_create_duration_lists_table', 31),
(84, '2023_09_26_112117_create_apply_loans_table', 31),
(85, '2023_09_26_113555_create_apply_loan_installments_table', 31),
(86, '2023_09_29_094802_create_transaction_histories_table', 31),
(87, '2023_11_15_175357_create_hospitals_table', 32),
(88, '2023_11_15_180853_create_doctors_table', 33),
(89, '2023_11_23_164557_create_galleries_table', 34),
(90, '2023_11_23_180720_create_testimonials_table', 35),
(0, '2023_12_04_113603_create_sub_categories_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resiver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1:Not Seen, 2:Seen',
  `pay` int(1) NOT NULL DEFAULT 0,
  `installment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:active,2:deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `resiver_id`, `title`, `message`, `sender_type`, `seen`, `pay`, `installment_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:26:19', '2023-10-26 10:26:19'),
(2, '1', '36', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:27:15', '2023-10-26 10:27:15'),
(3, '1', '36', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:27:28', '2023-10-26 10:27:28'),
(4, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:37:38', '2023-10-26 10:37:38'),
(5, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:37:42', '2023-10-26 10:37:42'),
(6, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:37:44', '2023-10-26 10:37:44'),
(7, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:39:44', '2023-10-26 10:39:44'),
(8, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:40:40', '2023-10-26 10:40:40'),
(9, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:41:20', '2023-10-26 10:41:20'),
(10, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:41:34', '2023-10-26 10:41:34'),
(11, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:42:07', '2023-10-26 10:42:07'),
(12, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:42:07', '2023-10-26 10:42:07'),
(13, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:42:07', '2023-10-26 10:42:07'),
(14, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:42:07', '2023-10-26 10:42:07'),
(15, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 10:43:29', '2023-10-26 10:43:29'),
(16, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:23:08', '2023-10-26 11:23:08'),
(17, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:27:03', '2023-10-26 11:27:03'),
(18, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:27:05', '2023-10-26 11:27:05'),
(19, '1', '1', 'Loan Status', 'Your Loan Application Rejected.<br>Rreason =travel, marriage, home renovation or any emergency purposes. However, some people face rejection when it comes to their loan application process. To avoid such circumstances, you should refer to these common rea', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:27:39', '2023-10-26 11:27:39'),
(20, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:44:32', '2023-10-26 11:44:32'),
(21, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:46:58', '2023-10-26 11:46:58'),
(22, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:50:08', '2023-10-26 11:50:08'),
(23, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:51:11', '2023-10-26 11:51:11'),
(24, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 11:53:49', '2023-10-26 11:53:49'),
(25, '1', '36', 'Loan Status', 'Your Loan Application Rejected.<br>Rreason =Bla bla bla', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 12:18:28', '2023-10-26 12:18:28'),
(26, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:18:30', '2023-10-26 13:18:30'),
(27, '1', '36', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:19:07', '2023-10-26 13:19:07'),
(28, '1', '36', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:19:07', '2023-10-26 13:19:07'),
(29, '1', '36', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:19:07', '2023-10-26 13:19:07'),
(30, '1', '36', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:19:07', '2023-10-26 13:19:07'),
(31, '1', '36', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:28:47', '2023-10-26 13:28:47'),
(32, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:30:13', '2023-10-26 13:30:13'),
(33, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:31:18', '2023-10-26 13:31:18'),
(34, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:31:28', '2023-10-26 13:31:28'),
(35, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:31:45', '2023-10-26 13:31:45'),
(36, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:32:00', '2023-10-26 13:32:00'),
(37, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:32:00', '2023-10-26 13:32:00'),
(38, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:32:00', '2023-10-26 13:32:00'),
(39, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 13:32:00', '2023-10-26 13:32:00'),
(40, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-26 14:00:41', '2023-10-26 14:00:41'),
(41, '1', '36', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:23:23', '2023-10-27 10:23:23'),
(42, '1', '36', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:23:37', '2023-10-27 10:23:37'),
(43, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:26:09', '2023-10-27 10:26:09'),
(44, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:26:18', '2023-10-27 10:26:18'),
(45, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:28:51', '2023-10-27 10:28:51'),
(46, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:29:09', '2023-10-27 10:29:09'),
(47, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:29:18', '2023-10-27 10:29:18'),
(48, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:31:15', '2023-10-27 10:31:15'),
(49, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:33:18', '2023-10-27 10:33:18'),
(50, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:33:59', '2023-10-27 10:33:59'),
(51, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:36:42', '2023-10-27 10:36:42'),
(52, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 10:54:36', '2023-10-27 10:54:36'),
(53, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:03:25', '2023-10-27 11:03:25'),
(54, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:04:00', '2023-10-27 11:04:00'),
(55, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:04:10', '2023-10-27 11:04:10'),
(56, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:05:06', '2023-10-27 11:05:06'),
(57, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:05:31', '2023-10-27 11:05:31'),
(58, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:05:31', '2023-10-27 11:05:31'),
(59, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:05:32', '2023-10-27 11:05:32'),
(60, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:05:32', '2023-10-27 11:05:32'),
(61, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:10:11', '2023-10-27 11:10:11'),
(62, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:10:31', '2023-10-27 11:10:31'),
(63, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:10:40', '2023-10-27 11:10:40'),
(64, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:11:13', '2023-10-27 11:11:13'),
(65, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:11:13', '2023-10-27 11:11:13'),
(66, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:39:22', '2023-10-27 11:39:22'),
(67, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:39:46', '2023-10-27 11:39:46'),
(68, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:39:56', '2023-10-27 11:39:56'),
(69, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:45:33', '2023-10-27 11:45:33'),
(70, '1', '1', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:46:00', '2023-10-27 11:46:00'),
(71, '1', '1', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:46:09', '2023-10-27 11:46:09'),
(72, '1', '1', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:46:32', '2023-10-27 11:46:32'),
(73, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 11:48:00', '2023-10-27 11:48:00'),
(74, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 19:06:54', '2023-10-27 19:06:54'),
(75, '1', '36', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 19:17:03', '2023-10-27 19:17:03'),
(76, '1', '36', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-27 19:18:28', '2023-10-27 19:18:28'),
(77, '1', '1', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 10:00:27', '2023-10-28 10:00:27'),
(78, '1', '1', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 10:30:12', '2023-10-28 10:30:12'),
(79, '1', '36', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 10:33:09', '2023-10-28 10:33:09'),
(80, '1', '39', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 11:25:59', '2023-10-28 11:25:59'),
(81, '1', '39', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 11:51:44', '2023-10-28 11:51:44'),
(82, '1', '39', 'Loan Status', 'Your Loan Application Rejected.<br>Rreason =Your ciblil score negative', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 11:56:47', '2023-10-28 11:56:47'),
(83, '1', '39', 'Loan Status', 'Your Loan Application Rejected.<br>Rreason =Your ciblil score negative Your ciblil score negative Your ciblil score negative Your ciblil score negative Your ciblil score negative Your ciblil score negative', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 11:57:26', '2023-10-28 11:57:26'),
(84, '1', '39', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 11:57:58', '2023-10-28 11:57:58'),
(85, '1', '39', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:11:26', '2023-10-28 12:11:26'),
(86, '1', '39', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:13:23', '2023-10-28 12:13:23'),
(87, '1', '39', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:27:50', '2023-10-28 12:27:50'),
(88, '1', '39', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:28:43', '2023-10-28 12:28:43'),
(89, '1', '39', 'Payment', 'Payment successfull', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:28:53', '2023-10-28 12:28:53'),
(90, '1', '39', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:29:44', '2023-10-28 12:29:44'),
(91, '1', '39', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:29:45', '2023-10-28 12:29:45'),
(92, '1', '39', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:38:20', '2023-10-28 12:38:20'),
(93, '1', '39', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:38:42', '2023-10-28 12:38:42'),
(94, '1', '39', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:39:30', '2023-10-28 12:39:30'),
(95, '1', '39', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:39:55', '2023-10-28 12:39:55'),
(96, '1', '39', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:43:16', '2023-10-28 12:43:16'),
(97, '1', '39', 'Loan Status', 'Loan apply successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:59:22', '2023-10-28 12:59:22'),
(98, '1', '39', 'Loan Status', 'Your Loan Application Approved', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:59:42', '2023-10-28 12:59:42'),
(99, '1', '39', 'Loan Status', 'Loan Amount Received', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 12:59:48', '2023-10-28 12:59:48'),
(100, '1', '39', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 13:00:02', '2023-10-28 13:00:02'),
(101, '1', '39', 'Payment', 'Your remaining amount paid successfully', 'user', '1', 0, NULL, NULL, 1, '2023-10-28 13:00:04', '2023-10-28 13:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0050901ccf50d294175889d04c78b50c11ec0e4e2b512ee418e7f97bdf3f123929d306ba585b0ab9', 13, 1, 'MyApp', '[]', 0, '2023-04-18 11:06:47', '2023-04-18 11:06:47', '2024-04-18 11:06:47'),
('022ce1550f19f8350fa6592f242d9e444ffc27e13c15339f5ec3ff87a48bd22751c6b34b06298d1d', 3, 1, 'MyApp', '[]', 1, '2023-10-13 19:07:24', '2023-10-13 19:33:58', '2024-10-13 19:07:24'),
('03409d22ffd11eb614ac4e990e7f6a7703aa99929ea4db9d49d2cd1db80c4eff73f726dec9705245', 9, 1, 'MyApp', '[]', 0, '2023-03-24 12:24:04', '2023-03-24 12:24:04', '2024-03-24 12:24:04'),
('03a4c6075fa329d97ce813797103407ab33e99a7137a1ffd7382b91a5d85cd0e5d61023efd7e80ef', 20, 1, 'MyApp', '[]', 0, '2023-03-21 12:56:04', '2023-03-21 12:56:04', '2024-03-21 12:56:04'),
('04d620d4f594c417dfc22b749d2b42ab1c00a28deb2cd3a5019af98a98ab876665d745445a6a20c4', 16, 1, 'MyApp', '[]', 1, '2023-10-18 11:56:29', '2023-10-18 11:56:43', '2024-10-18 11:56:29'),
('04edc91009283a7eb95efba04113c4d8a61d26c31eccde82b359437059dfc254e45baebe5d7bcb6e', 39, 1, 'MyApp', '[]', 1, '2023-10-28 12:10:22', '2023-10-28 12:13:44', '2024-10-28 12:10:22'),
('04ee6380e50159dbd57d912f94c0a4684a60a7741ecb824571dba90847ac38ae38dbfaab1a928412', 13, 1, 'MyApp', '[]', 0, '2023-04-18 11:06:18', '2023-04-18 11:06:18', '2024-04-18 11:06:18'),
('050aa9151b86eac4e00cb43e4af99467a7ecbad2e57e93ad0b811100e69917b35bde6d093b839e7e', 12, 1, 'MyApp', '[]', 0, '2023-10-06 11:07:32', '2023-10-06 11:07:32', '2024-10-06 11:07:32'),
('053781bb8540f6724b87a2b6cc29a387e74b7fb8566e771f4a8b85829d795a950c7cdf246df30076', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:48:46', '2023-10-06 16:48:46', '2024-10-06 16:48:46'),
('054adad8e92aff64fb17c2005d1ceb7dbaf77d026c54ae3e7b1d538ba895948f060e15932f35f800', 33, 1, 'MyApp', '[]', 0, '2023-09-25 17:13:52', '2023-09-25 17:13:52', '2024-09-25 17:13:52'),
('0634de5f463836ce94f5f9daf9bc43c3b5c0705e23dbb8e0caac710514a411f0f678f0df0b809b9c', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:29:29', '2023-10-10 10:30:46', '2024-10-10 10:29:29'),
('06f49989fa1551c6d8e6596e43b433ac329af71ac1cebd75cb643ebdd136b007b1e980d1e63fd196', 1, 1, 'MyApp', '[]', 1, '2023-10-11 15:58:51', '2023-10-11 16:10:21', '2024-10-11 15:58:51'),
('0782aa01222d1a7035526519bea960508ae21a74ee2fa4055e8cc9d6dd509e2de6847012c26c7bef', 33, 1, 'MyApp', '[]', 1, '2023-09-26 17:09:45', '2023-09-26 17:11:15', '2024-09-26 17:09:45'),
('07c53a785a3b648416ed5643c0f20909f4bdbf1509dffb4880098ef0ddb0f517df32bfdd54aedbdd', 1, 1, 'MyApp', '[]', 0, '2023-10-11 16:14:14', '2023-10-11 16:14:14', '2024-10-11 16:14:14'),
('089a7e34f020159d561a92285d69121d17cf3e5cd5305c51669ac305050b866d6e727d641bd2ee1c', 61, 1, 'MyApp', '[]', 0, '2023-10-10 10:44:05', '2023-10-10 10:44:05', '2024-10-10 10:44:05'),
('0928237b6115a28dcd6c0f3241115ad6184020385d938eb0f6e6469d2bf949a2cb4c0391d6e37ffa', 34, 1, 'MyApp', '[]', 0, '2023-04-17 16:51:54', '2023-04-17 16:51:54', '2024-04-17 16:51:54'),
('093dd5835e57bf4a7b5a0c02e2b94a3a3ae0dcbc394f8a5549a306787f2f54cf49374c8849456bb0', 34, 1, 'MyApp', '[]', 0, '2023-04-18 09:38:27', '2023-04-18 09:38:27', '2024-04-18 09:38:27'),
('0add4a0c8c123915d993ae49cb87f39717390ca422b53cd84145012331869a5640e15cbf45e2bdf6', 66, 1, 'MyApp', '[]', 0, '2023-10-10 16:48:41', '2023-10-10 16:48:41', '2024-10-10 16:48:41'),
('0b326c6da33aa808cefbca4320039e0e5d23e1306ffa66b6fe1bfb33478ed464457ae0dc4b5c0247', 40, 1, 'MyApp', '[]', 1, '2023-10-06 15:51:45', '2023-10-06 15:55:58', '2024-10-06 15:51:45'),
('0cf47e3fa7a009fcdbecb4ade33c51776e5e45abf438c2207e3dca6398b3c996fa43db951af8205a', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:40:49', '2023-10-10 10:41:58', '2024-10-10 10:40:49'),
('0d204ad9e74e74794e1ae20774648f18e8a4d94bf9c6846becf6fcab3a8bc420ca783a2bf9b14a84', 24, 1, 'MyApp', '[]', 0, '2023-09-25 14:59:41', '2023-09-25 14:59:41', '2024-09-25 14:59:41'),
('0e773015a9819c26b6309e56e2e014db38fbd515da1dbabb6af8d91ec1fdc1b46ad5c3b0d87f53e4', 1, 1, 'MyApp', '[]', 1, '2023-09-22 07:42:21', '2023-09-22 07:43:57', '2024-09-22 13:12:21'),
('0f44f8efc422375f298c5d679cec0e8c6c6f03bc359bfee65115edadf6d32335722de0b8a12f85a4', 17, 1, 'MyApp', '[]', 0, '2023-10-23 12:58:46', '2023-10-23 12:58:46', '2024-10-23 12:58:46'),
('123a0ccbfc5dc39daf1736320cc8605ece65f675ac0fcdeccf917798ca033abd59f7c71322e219d2', 43, 1, 'MyApp', '[]', 0, '2023-05-01 17:33:58', '2023-05-01 17:33:58', '2024-05-01 17:33:58'),
('13922b8d14bc8712551c970d62e42b3cf4e343c45d2bff5fd6730b3cdd6d2c3024fa8e6c5c7f1f16', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:11:59', '2023-10-06 16:11:59', '2024-10-06 16:11:59'),
('13c49eb8dcfc5b620b8a91ae7036bed5525fa11f9b6f80ab290a0a515c8ebe996ad52b7f7e5f39b9', 17, 1, 'MyApp', '[]', 1, '2023-10-18 15:50:46', '2023-10-18 15:59:26', '2024-10-18 15:50:46'),
('140de3101fd859836ac9c2ea74bb823d6bc5d813bbd35e8a949293f7f17450beb63473719fee1368', 15, 1, 'MyApp', '[]', 1, '2023-10-18 12:45:01', '2023-10-18 15:49:48', '2024-10-18 12:45:01'),
('14b15ca6c40e4b7de68460efa663b0351efe8042264d7ed5b4434cb3755616d90121ca5caf3fa8ab', 37, 1, 'MyApp', '[]', 0, '2023-10-24 12:42:51', '2023-10-24 12:42:51', '2024-10-24 12:42:51'),
('14be6dda822c610909c182a24eaf3116c3d0a2226c333030e056fada9d03a851af2ecdbe06b20d2c', 33, 1, 'MyApp', '[]', 0, '2023-09-26 16:23:42', '2023-09-26 16:23:42', '2024-09-26 16:23:42'),
('14d79d98171df6af3951bfd68c760cff30935c6fa8877cf23e871017a62dce0aa80aeb4db4ef8f27', 2, 1, 'MyApp', '[]', 0, '2023-09-25 12:17:27', '2023-09-25 12:17:27', '2024-09-25 12:17:27'),
('152ea214ccf7b3b23caf5a3e5c59aacf9124d3db198907a17d49c9f05f1d445909e4ceb9092f0398', 36, 1, 'MyApp', '[]', 0, '2023-10-24 18:06:27', '2023-10-24 18:06:27', '2024-10-24 18:06:27'),
('165856ae7754f6351829b42b91b38b41e949bc7ffbec981af271e0306060b321a30fd44e3c3235fa', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:39:25', '2023-10-10 10:40:18', '2024-10-10 10:39:25'),
('16f643208020c2002a0695ab6687d21317b8c1a97f8df53c2e3799c76938ed4f0dccf56335bc1524', 66, 1, 'MyApp', '[]', 1, '2023-10-10 13:25:40', '2023-10-10 13:25:49', '2024-10-10 13:25:40'),
('18115fdad20a5cea89ccd6104206d4c7bfad9104c7770afd471a82fc4781270a1ca0ccc0b1bc306c', 16, 1, 'MyApp', '[]', 0, '2023-02-20 00:45:16', '2023-02-20 00:45:16', '2024-02-20 06:15:16'),
('1931aee435e501eb920c34ad8414ea904412d73978d7aea85c7e6513361ba7c1f1933d7cf588e0fb', 36, 1, 'MyApp', '[]', 1, '2023-10-24 10:47:56', '2023-10-24 13:24:43', '2024-10-24 10:47:56'),
('197a115a2e1900545f2e69ac45993de8b5dfca97788070e412ceda381f4db8377e07b1f0add02d62', 59, 1, 'MyApp', '[]', 1, '2023-10-06 18:51:22', '2023-10-09 11:19:31', '2024-10-06 18:51:22'),
('1a663734634f9ca6d8ec36275291482de6f94a387759c916a4def568687933b417b963c5cb9d9e8d', 40, 1, 'MyApp', '[]', 1, '2023-10-06 17:32:48', '2023-10-06 17:34:00', '2024-10-06 17:32:48'),
('1adc0e0a2c083afb5c377dd3819f9ee4fb1ba9a5922aa3ecc0398b1c25bf756a7014124e34e42fc9', 9, 1, 'MyApp', '[]', 0, '2023-04-20 12:49:40', '2023-04-20 12:49:40', '2024-04-20 12:49:40'),
('1b72366143d581d46f8057b5a2146815a718cde09afb07fa9bae0b72e9d13820475a647bfadabe97', 40, 1, 'MyApp', '[]', 0, '2023-10-24 18:05:44', '2023-10-24 18:05:44', '2024-10-24 18:05:44'),
('1f66598783d2e55071f095087f2613270ac0a7db877fb9af656896bb832dec6c54bf688ccfe66cb6', 9, 1, 'MyApp', '[]', 0, '2023-04-21 13:18:14', '2023-04-21 13:18:14', '2024-04-21 13:18:14'),
('1ff5272e29110abe9bcfb90f599f4b12a31b4e9ab1566933b48d3845058b9e947c3b12989053cd23', 3, 1, 'MyApp', '[]', 0, '2023-10-14 12:37:39', '2023-10-14 12:37:39', '2024-10-14 12:37:39'),
('2081f91cf08238e11f779505eaa3d78bd2813916c3a26399e176789643fdc41565b27af186d28df2', 2, 1, 'MyApp', '[]', 0, '2023-02-14 00:01:51', '2023-02-14 00:01:52', '2024-02-14 05:31:51'),
('2121597271ddb4ae19bcd7c9f4b973e2bb5bab086c74e1f563dc6dd5e5160ec443934416e18de943', 13, 1, 'MyApp', '[]', 0, '2023-03-24 15:59:53', '2023-03-24 15:59:53', '2024-03-24 15:59:53'),
('227af8084113253d7d0390c8ac6b0f63982227b162ea109d9b1b1402f93874d74484a01a2cf04671', 19, 1, 'MyApp', '[]', 0, '2023-03-21 14:47:58', '2023-03-21 14:47:58', '2024-03-21 14:47:58'),
('2523c24e61bd05357d08f0c3f6790ff49e0d47eeb15560dee2b0cb1c62613a4b138cf42bc86c88b1', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:34:08', '2023-10-06 15:34:08', '2024-10-06 15:34:08'),
('263f19c25bd86323569e8b1abdaf9a0d73d5503261f3342f2716236e1b8c045c5d4b7b3ed8bac53b', 2, 1, 'MyApp', '[]', 0, '2023-10-11 16:32:42', '2023-10-11 16:32:42', '2024-10-11 16:32:42'),
('26f1546e3718c1b87f50b6deffea48bceccc0c4f9bf951064203f131ca16c4947ba9da4f1ff39dab', 77, 1, 'MyApp', '[]', 0, '2023-10-11 13:37:18', '2023-10-11 13:37:18', '2024-10-11 13:37:18'),
('285657bd54a66557490c48ab118dd071eaacee3808def0382eae37f4fc732c95ba3bbab0b37297b7', 66, 1, 'MyApp', '[]', 0, '2023-10-10 18:26:33', '2023-10-10 18:26:33', '2024-10-10 18:26:33'),
('296a3a563e2e9ae7a7153eec814d0e8de83f46e0c388fea39bebea723741c576433474fbcb8dcf77', 36, 1, 'MyApp', '[]', 1, '2023-10-23 19:48:11', '2023-10-24 10:40:33', '2024-10-23 19:48:11'),
('29716f22e05b6290a64374f5b2ed98673059d08a4eadfb41ce7710c941969e9b354207136b515b21', 3, 1, 'MyApp', '[]', 0, '2023-10-13 18:39:57', '2023-10-13 18:39:57', '2024-10-13 18:39:57'),
('298b0c28b0065ee948e975f3b43e8dac23524dcf91fe8e5d2b1343b99065d139d73a11786dd3f869', 75, 1, 'MyApp', '[]', 0, '2023-10-11 13:28:40', '2023-10-11 13:28:40', '2024-10-11 13:28:40'),
('2990e11d668d2d256f65087b83d4ea482cc3cee0fc8a886a2a9e1453dff881754d1ddcff6674b239', 40, 1, 'MyApp', '[]', 0, '2023-10-06 18:00:48', '2023-10-06 18:00:48', '2024-10-06 18:00:48'),
('2996b7659752fe5c6308705895153e7c0b6e8802c6160da26e689d46507edafd129ec4afd28c9374', 13, 1, 'MyApp', '[]', 0, '2023-04-27 15:47:16', '2023-04-27 15:47:16', '2024-04-27 15:47:16'),
('29ae4ad1509551518e2b9551db5ea5a16f6f572e59cc7e71c0f2f20cc3539e12bf4c76c538eaa3c9', 3, 1, 'MyApp', '[]', 0, '2023-10-14 10:51:22', '2023-10-14 10:51:22', '2024-10-14 10:51:22'),
('2b8eae5d96ab640e30246107da88816a9ebc0c845d95d6efc9a71196218f8a3538dec6ecf59432c6', 36, 1, 'MyApp', '[]', 0, '2023-10-25 14:52:49', '2023-10-25 14:52:49', '2024-10-25 14:52:49'),
('2bbf53bb4812e119212ecb0cc9ea1991b75f389dfa3ca1c5272d6dd3d258884163ce5167b0636e1d', 13, 1, 'MyApp', '[]', 0, '2023-03-21 15:17:31', '2023-03-21 15:17:31', '2024-03-21 15:17:31'),
('2ca7eb1e4ed9e5cc19d65ad2cdeb1371c89d760e2f5bf529616e3ae6632b3cfe5d3089189e55f4ea', 15, 1, 'MyApp', '[]', 1, '2023-10-18 11:50:49', '2023-10-18 11:51:58', '2024-10-18 11:50:49'),
('2d885d88e9d513efb18859364e013a3f5ed78de58d7c43aa18d73882cfce9e97743902133561d8c7', 40, 1, 'MyApp', '[]', 1, '2023-10-06 16:11:59', '2023-10-06 16:17:18', '2024-10-06 16:11:59'),
('2f235020e938069ebacd93aee094a9f6cf01defe6af55c5d2d14b1f5cb35f2fe3ca3174dd40881e6', 15, 1, 'MyApp', '[]', 0, '2023-10-19 11:24:52', '2023-10-19 11:24:52', '2024-10-19 11:24:52'),
('2f4246eeafccce53876e29a73a9343aeaff8ccef84a9af1686f3862451d640ea13a661be2718041e', 62, 1, 'MyApp', '[]', 0, '2023-10-09 13:04:14', '2023-10-09 13:04:14', '2024-10-09 13:04:14'),
('2fecdcb855d8f83fb3228bb912d33aef804429a23d108017943a1f78efa7028d917603cd53575dc4', 39, 1, 'MyApp', '[]', 0, '2023-09-27 11:51:22', '2023-09-27 11:51:22', '2024-09-27 11:51:22'),
('31a92dfe85f27d90f34744c8623ff9f3b0ad634985c1eadb2913dee49e14f61b87d79f625183f046', 1, 1, 'MyApp', '[]', 1, '2023-10-26 10:25:30', '2023-10-26 11:26:30', '2024-10-26 10:25:30'),
('32ae0174de642bcdad1e471d7002d7bf386874db7891364e50ab6dd711c91aef36b364af322e3154', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:33:42', '2023-10-10 10:34:16', '2024-10-10 10:33:42'),
('32c8e4819175301e50e6097e6feca446b147178d713dc8c354f2cd958a66063924c0d0304bd9095a', 4, 1, 'MyApp', '[]', 1, '2023-10-13 18:58:04', '2023-10-14 10:51:10', '2024-10-13 18:58:04'),
('340b349bf2365cb724325f41ab4bc27054ccde107984893e3bd28d649016611a23d2b97bb481d54e', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:39:01', '2023-10-06 16:39:01', '2024-10-06 16:39:01'),
('3421b19bce757832340711deda0f36be92d94bd39b3007759bd014a348ad3b4fb26f604b613cb63b', 13, 1, 'MyApp', '[]', 0, '2023-04-18 11:02:31', '2023-04-18 11:02:31', '2024-04-18 11:02:31'),
('3432d4e6ebf8a2d316e23b3e83e014e3ddad9355ddb8090539619e5c33fee03112894c4f0159b60b', 3, 1, 'MyApp', '[]', 1, '2023-10-11 16:42:03', '2023-10-11 18:42:12', '2024-10-11 16:42:03'),
('35f37fb1ad18dcbdfb5d47e7842c7f928a04808b7b06cf16f6a3966c2f59ec76b4e33d2aa106c1ea', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:31:14', '2023-10-10 10:32:31', '2024-10-10 10:31:14'),
('35fa3e9e04105ee9d944f0f71299fa125bcbc74640088d5f800a160bb55e49955e6197b10b80f30a', 64, 1, 'MyApp', '[]', 0, '2023-10-09 19:01:07', '2023-10-09 19:01:07', '2024-10-09 19:01:07'),
('36694c61dac0d2da60821bb7561a11f18561d2af5f4ad5cf5e123178baf6f08917e2a47bca09a57b', 61, 1, 'MyApp', '[]', 1, '2023-10-10 13:12:49', '2023-10-11 10:04:28', '2024-10-10 13:12:49'),
('36b1895fd048b3a680dbc758884486b7c3ecdf04e8ed4a4ec5396eb0502b26131bbce612c764efde', 33, 1, 'MyApp', '[]', 0, '2023-09-25 16:52:22', '2023-09-25 16:52:22', '2024-09-25 16:52:22'),
('3717b41a6fb7e7af571763889e4c0b1bd6ca7ec64816ab36759268315aace0f905f125ec7642d25c', 12, 1, 'MyApp', '[]', 0, '2023-10-09 18:45:52', '2023-10-09 18:45:52', '2024-10-09 18:45:52'),
('375799fc3f653c44b997c5283aa4848e74889dd7c1b06533a4657535de182bf48e21c0d6a6e52106', 1, 1, 'MyApp', '[]', 0, '2023-03-08 12:37:21', '2023-03-08 12:37:21', '2024-03-08 12:37:21'),
('37e216a2eeba17ad941eaa48b6eccee414331e1c5271c533f4a87cee06f2a0d6fe9755256d487924', 2, 1, 'MyApp', '[]', 1, '2023-02-10 07:05:57', '2023-02-10 07:07:47', '2024-02-10 12:35:57'),
('38475dd5355f36028d16a4d1f977b7326c68816c13ae074126757f5b27902a83eb2459446990774e', 29, 1, 'MyApp', '[]', 1, '2023-10-23 12:31:08', '2023-10-24 12:50:04', '2024-10-23 12:31:08'),
('39357deea855540d9b4f902f1aae9651b8207d1369f99bdae422c7f651a3c8b8894c2547d1e85524', 1, 1, 'MyApp', '[]', 0, '2023-10-24 16:32:05', '2023-10-24 16:32:05', '2024-10-24 16:32:05'),
('3a14954956799989596ee0c328b28505098bfc709fdfb8554bc53f08901db724090ce1b50d33fd2c', 1, 1, 'MyApp', '[]', 0, '2023-10-26 10:28:04', '2023-10-26 10:28:04', '2024-10-26 10:28:04'),
('3a790fb7324bd50c908f78c22a37ca71464bab51f6962ad80d2218b5c0bffa99bfaaf88bbbcd154a', 33, 1, 'MyApp', '[]', 1, '2023-09-26 17:31:29', '2023-09-26 17:31:48', '2024-09-26 17:31:29'),
('3c0e9670e3a05d4fce64f020d837d59baae2d30218485d00277c3f0a3fecb7e9a1c90363d41f1cdd', 9, 1, 'MyApp', '[]', 0, '2023-10-13 21:24:51', '2023-10-13 21:24:51', '2024-10-13 21:24:51'),
('3c3eb1ab8b4c43af104eee489bf3f9b753b6261f9a8b81724201f5d799331c2906923c514fdca305', 40, 1, 'MyApp', '[]', 1, '2023-10-24 18:39:06', '2023-10-27 11:43:25', '2024-10-24 18:39:06'),
('3c5571179311a2b9162851536b20080d977a96658993ac100ba7500c3591715ca6ef23803c03000c', 40, 1, 'MyApp', '[]', 1, '2023-10-06 17:55:49', '2023-10-06 17:55:59', '2024-10-06 17:55:49'),
('3e3b87999572259a2e592d239e6ea12c30e546ddff40f67cb2a4a27875b6464e0b4092b2c01732c3', 33, 1, 'MyApp', '[]', 1, '2023-09-26 16:30:21', '2023-09-26 16:33:13', '2024-09-26 16:30:21'),
('3e6d175a3f27654240fcfdac5b41e199146d0fdb42b79f9e6fbe57db51cb6a7847eff7f3ae3942d1', 38, 1, 'MyApp', '[]', 1, '2023-10-24 15:35:53', '2023-10-24 17:07:26', '2024-10-24 15:35:53'),
('3e8431b0acac631796d0dd8b9076b7946460a2e2f40d1706c85b35b85d4f25558220403877e82222', 13, 1, 'MyApp', '[]', 0, '2023-03-21 14:58:58', '2023-03-21 14:58:58', '2024-03-21 14:58:58'),
('3edb44d0c51ad292dc904da550edb066e1132f9dd36dd500e8db2886021400a5506194e4e2f6f4ac', 13, 1, 'MyApp', '[]', 0, '2023-03-21 15:06:12', '2023-03-21 15:06:12', '2024-03-21 15:06:12'),
('3f0823d9d4564f21bf421d0dbd4392bf41bb50e06be9cad7f6dc71789b22d6db58cceee2ec763c37', 7, 1, 'MyApp', '[]', 0, '2023-09-25 11:48:08', '2023-09-25 11:48:08', '2024-09-25 11:48:08'),
('3faaff693d9661503b6b01990561075ca2f55c29f76fb6b3766e45b77c92ceebb90bbc3fdd755d1f', 4, 1, 'MyApp', '[]', 1, '2023-10-11 18:43:22', '2023-10-12 15:59:40', '2024-10-11 18:43:22'),
('3fc1ed983c3a1ef03e4d4bfbf3ace2f8230d872db1c5a90e849b00560f8efd96ec3f2b3129fbaa80', 13, 1, 'MyApp', '[]', 0, '2023-03-30 18:58:20', '2023-03-30 18:58:20', '2024-03-30 18:58:20'),
('401bd443f22e91c28c2b98e0e6d8db7fbe4039eb0d8e492f8ee221b63ed9e74b85814f9415cddf7d', 16, 1, 'MyApp', '[]', 0, '2023-02-16 01:43:13', '2023-02-16 01:43:13', '2024-02-16 07:13:13'),
('409431442b0e849c6402482144e80e8f61bbf941aa769f6f7c57dbf4c397bd8ea31eef211bcb58ea', 26, 1, 'MyApp', '[]', 0, '2023-10-20 11:28:16', '2023-10-20 11:28:16', '2024-10-20 11:28:16'),
('412a6d508299d5d64cf8ab1e4dcfe075a348ed7a87b7cb28fd1ff38a9870487a7204a59515068e3b', 27, 1, 'MyApp', '[]', 1, '2023-10-20 11:32:17', '2023-10-20 11:42:05', '2024-10-20 11:32:17'),
('42bee220b46d286f5240f3ad817f3620db27e2e1b1bf2639ea3d57ea0df40e6c6ef63cd25184c2c2', 81, 1, 'MyApp', '[]', 0, '2023-10-11 13:51:08', '2023-10-11 13:51:08', '2024-10-11 13:51:08'),
('431c013aacf0348607e44c88983f0d80223c0e25ed0ce2581503f78d888de4cf8bcc6f8e91917cf0', 36, 1, 'MyApp', '[]', 1, '2023-10-25 16:29:09', '2023-10-25 16:32:22', '2024-10-25 16:29:09'),
('434e5e0574d1d0ab245c36bbc94563bde2c95ab94206b3e0a0e908ddf75f2e7b3a8495d56f34e509', 33, 1, 'MyApp', '[]', 1, '2023-09-26 16:48:05', '2023-09-26 16:48:30', '2024-09-26 16:48:05'),
('436d891c8742da91146723ee19de861f79fef9ae7687566b341873ae21e488af39df1e6665f21ed4', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:32:42', '2023-10-06 15:32:42', '2024-10-06 15:32:42'),
('453fe006e1a7391c512e24ae123962c92044380edec705a6e8c8189a062467b3ed9a0bb53985716a', 66, 1, 'MyApp', '[]', 1, '2023-10-11 11:39:40', '2023-10-11 11:42:15', '2024-10-11 11:39:40'),
('45b596b1dd47ea345de51f2106a6e5f54a06395840a6bfe7561212c3788c6e3915319966e217cfd1', 8, 1, 'MyApp', '[]', 0, '2023-04-29 21:46:59', '2023-04-29 21:46:59', '2024-04-29 21:46:59'),
('46a575c9ffed0dd2c0a5d61c97a97b78fac6065dfb71f03533082bbd28212a40a878500ea648ee7c', 1, 1, 'MyApp', '[]', 0, '2023-10-24 17:13:35', '2023-10-24 17:13:35', '2024-10-24 17:13:35'),
('496b9a07b0a39a779bb937bc636f1e400580bff3a939523e81962d93b48201ebe77a3291547fc025', 76, 1, 'MyApp', '[]', 0, '2023-10-11 13:35:49', '2023-10-11 13:35:49', '2024-10-11 13:35:49'),
('4980d85406344afb7856736c6a3c45aa2ea49ee27bd3356c9a9d1ba8f8c423b1d80f0e8768a25b11', 32, 1, 'MyApp', '[]', 0, '2023-09-25 16:35:02', '2023-09-25 16:35:02', '2024-09-25 16:35:02'),
('4a08ab3a0b312afa199036a2fd5d1abb332d53601a300ed7e4a4477ec566c11ed0718f7f5c3eeb15', 2, 1, 'MyApp', '[]', 0, '2023-03-02 11:54:30', '2023-03-02 11:54:30', '2024-03-02 11:54:30'),
('4a64157aac4be87de3ba46fd71e1f181343c682534059168a0025c271e7de88b6f3661d619e1fb57', 33, 1, 'MyApp', '[]', 0, '2023-09-26 16:27:50', '2023-09-26 16:27:50', '2024-09-26 16:27:50'),
('4aa5f9c13641bdec659d96fcf8db3d9a8d1f4769f250611020005844d5ff734000ddd66fc6e4c7fa', 2, 1, 'MyApp', '[]', 0, '2023-09-25 12:16:00', '2023-09-25 12:16:00', '2024-09-25 12:16:00'),
('4bea9024eccb6a162fc5d3695d67f92370b0da8f79f21d2bee8af2cf4b7a08d635b1321460f7c687', 40, 1, 'MyApp', '[]', 0, '2023-10-24 18:05:25', '2023-10-24 18:05:25', '2024-10-24 18:05:25'),
('4c3396042a386edf99b87ab8074001b04618f57592c243d5f457252a76117f2b4c2d196dc3d381a3', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:41:14', '2023-10-06 15:41:14', '2024-10-06 15:41:14'),
('4d14d0bd33581aa8299949688ad37680cac5af6b57843cdc52105d2819ff86c7fc45c4b624a909b3', 8, 1, 'MyApp', '[]', 0, '2023-03-24 12:20:35', '2023-03-24 12:20:35', '2024-03-24 12:20:35'),
('4e4040cdadec58e687a937179991893f6d65bd3ba11a3056d702cc254b5c9c0a8280da4f5afefaac', 9, 1, 'MyApp', '[]', 0, '2023-04-20 12:48:45', '2023-04-20 12:48:45', '2024-04-20 12:48:45'),
('4e813e4d863836d6c0452341e15c81a20e1b4453e7098af3a02e4abafa7ff6bcd9f6c1241911cb61', 7, 1, 'MyApp', '[]', 0, '2023-03-09 10:10:49', '2023-03-09 10:10:49', '2024-03-09 10:10:49'),
('4ead2e083f7c3136c47c1344fd4476f9d37136d5793cdf00a44853fc505efdac3afbfb2e72be38c4', 39, 1, 'MyApp', '[]', 0, '2023-10-28 12:14:30', '2023-10-28 12:14:30', '2024-10-28 12:14:30'),
('4f356ca5a4d2a3c405beafe2f1e0b1848a9ef3eacb5d0698ba89ea5716c82725e40c8c80b2f5ac5e', 2, 1, 'MyApp', '[]', 0, '2023-03-02 11:56:52', '2023-03-02 11:56:52', '2024-03-02 11:56:52'),
('4f3c4b364a9c8b9791c6d79a0a66afaf5436a71e4cd064de95c700a64c1f624ca30fcc9392135912', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:42:36', '2023-10-06 16:42:36', '2024-10-06 16:42:36'),
('4f870dfe282d8040423e7c1c3a9e7c9eec3365d13e9490b7f4c9f2fbb170362ce9950bbff5de0bd1', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:53:03', '2023-10-06 16:53:03', '2024-10-06 16:53:03'),
('51f2405606a201e79b4e84ed5bb7b634efe7cca764d597dc79098ad2c325094ea243148e1366cc57', 1, 1, 'MyApp', '[]', 0, '2023-09-22 07:32:00', '2023-09-22 07:32:01', '2024-09-22 13:02:00'),
('526423ec020a1f66a5411765c9733735c20aa3448b0b86a3f733158442df561e5a6a9529935baa58', 5, 1, 'MyApp', '[]', 0, '2023-04-24 14:27:56', '2023-04-24 14:27:56', '2024-04-24 14:27:56'),
('53c122b6b639118d2e313a38e1f16a776c4358b1869ec57491f92946035c385f896d9133a1732d0c', 2, 1, 'MyApp', '[]', 0, '2023-09-25 11:38:32', '2023-09-25 11:38:32', '2024-09-25 11:38:32'),
('54e76aadaee7b8ec4844b1203d1bbfdf0b97b8a3ec23677ef465a44dbabafab4df157754db3192e4', 1, 1, 'MyApp', '[]', 1, '2023-10-12 10:12:31', '2023-10-12 17:26:10', '2024-10-12 10:12:31'),
('55930b4289d8832cfc2bb92eb3fe6ca360e5cf8655bff183060200d684f472fb192476348c9aef8b', 42, 1, 'MyApp', '[]', 1, '2023-10-24 18:00:40', '2023-10-24 18:04:26', '2024-10-24 18:00:40'),
('56ad0a1088e1bf1f143a77a23def7a03df66417f22d695157e28bf5f1c0e498ad195efa261fe7ebe', 2, 1, 'MyApp', '[]', 0, '2023-03-02 11:56:36', '2023-03-02 11:56:36', '2024-03-02 11:56:36'),
('570da96d3388313c36f3886e63ae03ca714c8e362a86676fd40c4b5ee3db994b1e7d6b448606b6b9', 33, 1, 'MyApp', '[]', 0, '2023-09-25 17:06:04', '2023-09-25 17:06:04', '2024-09-25 17:06:04'),
('5781ae03984798a559a636f6120a5ab77c6163c2fbc978f9b8ab0223ace2518154e2f04e7eaba131', 80, 1, 'MyApp', '[]', 0, '2023-10-11 13:50:07', '2023-10-11 13:50:07', '2024-10-11 13:50:07'),
('594cde21ff83b130b9ff17bc0c2d2ed26b0505f6c6d9a38aaafb928f0d3ea247b21c14cdcca2ef29', 61, 1, 'MyApp', '[]', 0, '2023-10-09 13:22:07', '2023-10-09 13:22:07', '2024-10-09 13:22:07'),
('5982e568fd25f572f2642a068290d8e34c01fbbf1c9d1cc50d9773def2eee00c9bbe1cb42128361e', 38, 1, 'MyApp', '[]', 0, '2023-09-26 19:38:44', '2023-09-26 19:38:44', '2024-09-26 19:38:44'),
('59d27bf5b58f60835880b4115c92aa4c7057174492e2f71d971204db579305fe7784c8c7c4bf3d2e', 33, 1, 'MyApp', '[]', 1, '2023-09-26 17:42:59', '2023-09-26 17:43:22', '2024-09-26 17:42:59'),
('5c325bbbe5db4805775b50c95289481a5cb33d8e352896c76e75fc051858be98ced53edb6b4b1d5a', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:32:42', '2023-10-06 15:32:42', '2024-10-06 15:32:42'),
('5c3e15508f84d78db62209d847c0eef096fb1930841ab3579da2385bb1e0322cb59fdf9ce16364b3', 9, 1, 'MyApp', '[]', 0, '2023-04-27 15:17:38', '2023-04-27 15:17:38', '2024-04-27 15:17:38'),
('5d59afa696ab03662150fc71577eb367472236732ef3c17a9b002548ca83729cde3cbaaf01a8a8da', 30, 1, 'MyApp', '[]', 0, '2023-09-25 16:14:47', '2023-09-25 16:14:47', '2024-09-25 16:14:47'),
('5db252879e0052b23353a887eea84cbe7cdc764f596b156baa87434e8656ba0de4bf31fb2ca23662', 4, 1, 'MyApp', '[]', 0, '2023-10-13 18:33:56', '2023-10-13 18:33:56', '2024-10-13 18:33:56'),
('5f6e39633d435c2bf745093b50bc4fe416fd02c0dcc57ae656c3dd69d2b2ef0ff68d3654905db6b9', 40, 1, 'MyApp', '[]', 0, '2023-09-28 11:48:50', '2023-09-28 11:48:50', '2024-09-28 11:48:50'),
('5f9796c21aab61442f93566c16eef0fd9a51e07bc8376e71a1c961fcf18d73713b1cddc18f2d8faa', 38, 1, 'MyApp', '[]', 0, '2023-09-26 18:42:47', '2023-09-26 18:42:47', '2024-09-26 18:42:47'),
('615298ec700aad80bdcc99b08cb3357bfc712ccd8f5b88ebcca35ec0681446055cbac0230eb10903', 61, 1, 'MyApp', '[]', 0, '2023-10-09 15:38:44', '2023-10-09 15:38:44', '2024-10-09 15:38:44'),
('61c3dd3780e5cb16b98552e649289bb47617cf5d1f87c041be89b58ba1c9bb0ed0c4011e54cec31d', 2, 1, 'MyApp', '[]', 0, '2023-09-25 12:07:53', '2023-09-25 12:07:53', '2024-09-25 12:07:53'),
('62f3488d7195e8b93bd99d8c64296638a24f904aa1fea27e45a92ddee8e2fb03072166b62a074e4c', 66, 1, 'MyApp', '[]', 0, '2023-10-11 12:23:58', '2023-10-11 12:23:58', '2024-10-11 12:23:58'),
('6447e71f9dfc014d31e12e31f23401eaaa9935206d3672d8b597f6bf95dd877c82e1f21c86c20475', 66, 1, 'MyApp', '[]', 0, '2023-10-11 11:42:35', '2023-10-11 11:42:35', '2024-10-11 11:42:35'),
('64e78e5045bc1c6363434686f5d148228150e409c055364aadef281e3f92c2fe297e3382a539f0da', 27, 1, 'MyApp', '[]', 0, '2023-03-04 07:58:47', '2023-03-04 07:58:47', '2024-03-04 07:58:47'),
('64fe88c408d781a28476ce751eb43b6ea890e44aacd4cd27cbcc02b2e59c7fb931281283c9acef5b', 27, 1, 'MyApp', '[]', 0, '2023-03-04 08:50:49', '2023-03-04 08:50:49', '2024-03-04 08:50:49'),
('65cfdffed3e94b40e9bfca3ab6ee9a09b53cdb9942f0187901818ef40512ca730c4016389c54e845', 13, 1, 'MyApp', '[]', 0, '2023-03-24 15:56:33', '2023-03-24 15:56:33', '2024-03-24 15:56:33'),
('67057d9345b4fc90d9523be2384f4ebceb53b86f66a25875a98eeb8d94cc18e4531f9ff1236187f2', 5, 1, 'MyApp', '[]', 0, '2023-10-12 11:28:07', '2023-10-12 11:28:07', '2024-10-12 11:28:07'),
('68aa3db1bc45451741c330a746e566ce4910924be1f7cb21de7d04c990b851ff713922cb8945f503', 66, 1, 'MyApp', '[]', 1, '2023-10-10 15:50:33', '2023-10-11 12:54:10', '2024-10-10 15:50:33'),
('6902ecf6b06080df4d43711718b1e6c7213e6630e5193c9b142d7763350040ef7771caf609423b12', 18, 1, 'MyApp', '[]', 0, '2023-10-19 12:05:31', '2023-10-19 12:05:31', '2024-10-19 12:05:31'),
('690ff932c5ade9eed1eba085a3351abd87bbb13117bdfd13c8c0218d13e59eb1bd5f777b8c9a23a2', 3, 1, 'MyApp', '[]', 0, '2023-03-08 12:58:30', '2023-03-08 12:58:30', '2024-03-08 12:58:30'),
('691d061ba7a6ce4ffff2904e80014b86b98752dc7d3f70898abe73c9aea8db6eddbe932ba31a7acc', 61, 1, 'MyApp', '[]', 0, '2023-10-10 10:52:33', '2023-10-10 10:52:33', '2024-10-10 10:52:33'),
('691f57ddc2f1e680c6d674e9ed634d6b5d05d8665a5d1b0b4efe0a3342b5d7eb3f0fbd8b879bc0e9', 3, 1, 'MyApp', '[]', 0, '2023-10-11 17:06:46', '2023-10-11 17:06:46', '2024-10-11 17:06:46'),
('6b03dd42305ad852e59678efa92299837ee28d4b2dbd59405783a878d4f2b8cc6437b214fcf20640', 10, 1, 'MyApp', '[]', 0, '2023-10-14 12:51:18', '2023-10-14 12:51:18', '2024-10-14 12:51:18'),
('6ba137a55067751ab56d2448b35632e67602d1c2ec519371a033156eb06f4e827b296ce2fcaec34f', 33, 1, 'MyApp', '[]', 1, '2023-09-26 16:55:28', '2023-09-26 16:55:49', '2024-09-26 16:55:28'),
('6d15398cf111ab00539697c9ad800e6b321de1782f899b56c910168ca4fb95ae544462321e353b09', 4, 1, 'MyApp', '[]', 0, '2023-10-14 11:34:20', '2023-10-14 11:34:20', '2024-10-14 11:34:20'),
('6f3f449a0b2e33384271c907d9d005bdbd3c607516971126c74e9d3b913a119d8fb6145565e2e7ab', 9, 1, 'MyApp', '[]', 0, '2023-03-04 08:37:54', '2023-03-04 08:37:54', '2024-03-04 08:37:54'),
('700a68d807e1711c16b80f331d07324346758e969447503020924c969eaa3c3ea8ffe43542dc0e64', 38, 1, 'MyApp', '[]', 1, '2023-04-27 18:34:20', '2023-04-27 19:50:41', '2024-04-27 18:34:20'),
('7085518dc661357687f347acf204cbdf8a3132295b2c14b348bdd2f838b686e7477a0ffb45cca01b', 9, 1, 'MyApp', '[]', 0, '2023-04-20 12:59:22', '2023-04-20 12:59:22', '2024-04-20 12:59:22'),
('70cd0871039974c008baa33aaad4d62387bb068c7d61482c6f37679e743f7b8f77018ab53c7818f3', 4, 1, 'MyApp', '[]', 0, '2023-10-12 16:24:26', '2023-10-12 16:24:26', '2024-10-12 16:24:26'),
('72843222da8dd084d95b692ff0d44e7230fadec3fe14fdd8ed8ca7247225be46557db4a1acb31d5e', 78, 1, 'MyApp', '[]', 0, '2023-10-11 13:45:19', '2023-10-11 13:45:19', '2024-10-11 13:45:19'),
('728f70217892eabeed7d61e66a64e5ef7aaf4e22ed2d12393ea00841c4608b0aa37d78f1a63d2a7d', 19, 1, 'MyApp', '[]', 0, '2023-03-21 12:49:16', '2023-03-21 12:49:16', '2024-03-21 12:49:16'),
('737613395b76516f5b9a7b8d1b9f201c2ec7a7a7132068508f6910b161014dd5bfc81e59067ef73f', 69, 1, 'MyApp', '[]', 1, '2023-10-11 12:06:39', '2023-10-11 12:06:50', '2024-10-11 12:06:39'),
('73bd75e9d8640861eaa69ebbe710951557218beeed61c8747f7636a696150337c79ed2176ef3df04', 40, 1, 'MyApp', '[]', 1, '2023-10-06 17:04:50', '2023-10-06 17:06:12', '2024-10-06 17:04:50'),
('73ca1a550cab4710c8e07d6ec260fcbb0655a1e4da8ac83acf2d70518e2222bda8f455d4b25269f4', 28, 1, 'MyApp', '[]', 1, '2023-10-20 12:24:24', '2023-10-20 12:26:21', '2024-10-20 12:24:24'),
('7592fac99b3a9b0464db034854a78b2648a9fbee62c247b1908d8a80e6879a59d2b37de3e4045f37', 8, 1, 'MyApp', '[]', 0, '2023-03-09 10:09:02', '2023-03-09 10:09:02', '2024-03-09 10:09:02'),
('77ac53dc8e6af896d401bf385eaecb9cfbf023929bbef257dfff4a8a4f958a02c6278cf3d11002a2', 5, 1, 'MyApp', '[]', 0, '2023-03-14 10:10:29', '2023-03-14 10:10:29', '2024-03-14 10:10:29'),
('77b0277deb6f79169cfa871a9cf6a23855272febe56b69339a15d827df598f9a2669dd084fcdf500', 13, 1, 'MyApp', '[]', 0, '2023-03-21 15:05:45', '2023-03-21 15:05:45', '2024-03-21 15:05:45'),
('7816a09016029e5bf04664699f48297f05e8b3eb0484f63371314bc187609a77faa31be37c2bb181', 2, 1, 'MyApp', '[]', 0, '2023-03-04 07:47:18', '2023-03-04 07:47:18', '2024-03-04 07:47:18'),
('785d80d7f49a4200708e5d2232e4c988554221587e73fb5a9e920f9992a0ea91168b73b975054b6a', 2, 1, 'MyApp', '[]', 0, '2023-09-25 12:18:12', '2023-09-25 12:18:12', '2024-09-25 12:18:12'),
('7915a236cb5eb1381b38744d9864a429cc02ba71e4cbde6a80fedda48d87f294c2bc2ec25396a850', 35, 1, 'MyApp', '[]', 0, '2023-09-25 19:11:14', '2023-09-25 19:11:14', '2024-09-25 19:11:14'),
('7a47ed4da96335630779f5996b26d9f0d052568020bf0c03b76564f6287db73afdc6e1eea735c770', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:37:47', '2023-10-06 15:37:47', '2024-10-06 15:37:47'),
('7b1320d48102fb5c3e6098d8b965f39124f6c1ab313c5993c4dd1bf507960f3583bc075e9b1333bc', 23, 1, 'MyApp', '[]', 0, '2023-03-21 13:33:51', '2023-03-21 13:33:51', '2024-03-21 13:33:51'),
('7b80af2e88cc018a8ff9f6d6bb6e93cc29f3b90aa9ca0257e5d6a3068682796f029a320954df5de3', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:49:08', '2023-10-06 15:49:08', '2024-10-06 15:49:08'),
('7d5b7144a9517b7ff4a9a629967679d847f02b7f835ac5b556cb21966c99d30a544af2b3dc994b9d', 13, 1, 'MyApp', '[]', 0, '2023-03-21 14:49:18', '2023-03-21 14:49:18', '2024-03-21 14:49:18'),
('7e147070afec3e856419885efd028242f9b0106fb4ab2071c0ed1729e181d79c67a94dc5831019d8', 4, 1, 'MyApp', '[]', 1, '2023-10-11 19:04:19', '2023-10-12 10:05:26', '2024-10-11 19:04:19'),
('7e88a35a0f9a7836ec005b331f3fc0ec473b5fef130998ea4f572932859cb9d6a93b59d660ba3bf7', 35, 1, 'MyApp', '[]', 0, '2023-10-23 13:04:01', '2023-10-23 13:04:01', '2024-10-23 13:04:01'),
('7e92336b467ed97bb923d933ba85e05aaf31094dc56a4c6f390d993a8b735add5b2406338a4ddac4', 19, 1, 'MyApp', '[]', 0, '2023-09-23 14:10:42', '2023-09-23 14:10:42', '2024-09-23 14:10:42'),
('7eb077ceb7f9a6af67f5360e2e2dce6f4fecb7bafea5860ad181a7a79638da296c73778e3a6d437b', 8, 1, 'MyApp', '[]', 0, '2023-10-12 17:26:22', '2023-10-12 17:26:22', '2024-10-12 17:26:22'),
('7ed874361b3c80154526e9d87f9ac31e5a83a3515d4afd5d8c7002443a11b6e1fb5ffaf6621b5fc1', 1, 1, 'MyApp', '[]', 0, '2023-10-11 16:22:19', '2023-10-11 16:22:19', '2024-10-11 16:22:19'),
('7edea7d50cf8db4d7206704154c5235c0ac061adc2064623176352e3db2ace55825f94838f7bc1cb', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:42:57', '2023-10-10 10:44:20', '2024-10-10 10:42:57'),
('7f0fb7bca185537c86b5fe3f87aad34dcff1bafd06c2e1112cc25c78f515ae320679b79048a46206', 1, 1, 'MyApp', '[]', 1, '2023-10-13 19:29:00', '2023-10-19 17:47:36', '2024-10-13 19:29:00'),
('803ae5f828940d2402237815e4322200b61ef658be9aabf0ea9566ec93b3ec336c63703e49f8025d', 79, 1, 'MyApp', '[]', 0, '2023-10-11 13:46:51', '2023-10-11 13:46:51', '2024-10-11 13:46:51'),
('8224b3c841431f2b92b59615e72ef96b13749d10188047d3530425164a13487af9e70c5cd9eeacea', 3, 1, 'MyApp', '[]', 0, '2023-10-13 18:17:11', '2023-10-13 18:17:11', '2024-10-13 18:17:11'),
('827fa79b0d15e6beff70404e017d914fa81612bb84b0b069641fd3c580bb166a3b257bd78ac578f8', 1, 1, 'MyApp', '[]', 0, '2023-10-27 10:25:29', '2023-10-27 10:25:29', '2024-10-27 10:25:29'),
('82a0101943d432dcc8ebd86ae682a81dc6b01ffecb7fbc4d64472ff6e3a51376735542e60aeb1f0c', 39, 1, 'MyApp', '[]', 1, '2023-10-28 10:33:44', '2023-10-28 12:09:17', '2024-10-28 10:33:44'),
('82dd6790f410167ba7fa131a6edb5c927ab1b69769d306daee23f891b8a3ae424e8cc9d8f15c08aa', 5, 1, 'MyApp', '[]', 0, '2023-05-01 10:37:45', '2023-05-01 10:37:45', '2024-05-01 10:37:45'),
('83b1aebbca65f7879e45baf2722ff3711b1c865e98105e7936525e13a4fea17f6545fefb3b922725', 3, 1, 'MyApp', '[]', 0, '2023-10-14 13:14:25', '2023-10-14 13:14:25', '2024-10-14 13:14:25'),
('83bc04f469eef985f2219d3070406aab44a60ae1f9bc8d39b9f45eafdb0d4360dcfe68be6d16e7dc', 36, 1, 'MyApp', '[]', 0, '2023-10-26 10:57:31', '2023-10-26 10:57:31', '2024-10-26 10:57:31'),
('8526262ad5622696a200926299a5c0a24aabb33f0f67de79d528d602396f06a304060ccd387a1758', 43, 1, 'MyApp', '[]', 0, '2023-06-15 09:10:18', '2023-06-15 09:10:18', '2024-06-15 14:40:18'),
('87816841f7f157bc68d0cc5ae16aa168398a4fd8f6582fa5d1b12e64cfddf5e736e10ec2fed02172', 36, 1, 'MyApp', '[]', 0, '2023-10-23 19:56:06', '2023-10-23 19:56:06', '2024-10-23 19:56:06'),
('87a891f1330bf4d3f24144c7cf01f37e250716ed6e8b938c9b1ac09c47e8cf20ea415381b47af43e', 5, 1, 'MyApp', '[]', 0, '2023-04-27 14:34:12', '2023-04-27 14:34:12', '2024-04-27 14:34:12'),
('882c723e1606fdb17070ebe8495209ff924888331897dd418c978d4fb6ee6860e4faf36629ee6ed4', 40, 1, 'MyApp', '[]', 1, '2023-10-06 17:00:23', '2023-10-06 17:01:39', '2024-10-06 17:00:23'),
('8903839c7157666a9391b503ac53e3eb363943adf2c17c7bceccf20b9ac24717fd9f4d97fb3b6e21', 40, 1, 'MyApp', '[]', 1, '2023-10-06 15:40:42', '2023-10-06 15:45:11', '2024-10-06 15:40:42'),
('892bb401bdc9f228735a7f12593ecf9215acafb1cb2df6c1529de8fc8ced528a518c1feb6ddc184b', 40, 1, 'MyApp', '[]', 1, '2023-10-06 16:56:52', '2023-10-06 16:58:51', '2024-10-06 16:56:52'),
('8983d8223632db29f96b42b74ebac117efe2eae3d9546b70ca19a527b39fd3718388f9930deb737c', 33, 1, 'MyApp', '[]', 1, '2023-09-26 15:19:39', '2023-09-26 15:20:43', '2024-09-26 15:19:39'),
('8af2969465c76bd1a0771100aa7e0626d7697b5d16eb2a2cc1cd1cbd0c89d0e4cc483228b1e45327', 12, 1, 'MyApp', '[]', 0, '2023-10-09 18:44:15', '2023-10-09 18:44:15', '2024-10-09 18:44:15'),
('8b85078c98c6d63b0496496a99e295ecf093b2118353e29cb60e358f3ef79e4435e599ed6a50975d', 2, 1, 'MyApp', '[]', 0, '2023-09-25 11:19:25', '2023-09-25 11:19:25', '2024-09-25 11:19:25'),
('8cf5cbfedb11f3798febd8a863622d067d3c2b094d8f9d6aa96a7051f1154cd266031053ec0b59bb', 36, 1, 'MyApp', '[]', 0, '2023-10-28 11:05:12', '2023-10-28 11:05:12', '2024-10-28 11:05:12'),
('8d3a469b4b3d8b610a1ad874a0386da2a633eeff171246600276e30981f7766adea08ac89aa02e1d', 39, 1, 'MyApp', '[]', 1, '2023-10-24 16:30:00', '2023-10-24 16:32:40', '2024-10-24 16:30:00'),
('8de7c9993b103d2c79913b8b43c79054312384fb5819bcbffa704282252562032798e2b4abf7ff25', 19, 1, 'MyApp', '[]', 0, '2023-03-21 12:58:02', '2023-03-21 12:58:02', '2024-03-21 12:58:02'),
('8ef91d6fc221a06bcff3033a9f4ee71d3dc620485426f391ecd317c6263321e11b4b50a93d918921', 1, 1, 'MyApp', '[]', 0, '2023-10-13 19:17:57', '2023-10-13 19:17:57', '2024-10-13 19:17:57'),
('8f84e177e05ce07c6810d4da70559d8f94eeadf98d3af9c053802188d938daa2f6c71c51d616f683', 3, 1, 'MyApp', '[]', 0, '2023-10-13 18:54:54', '2023-10-13 18:54:54', '2024-10-13 18:54:54'),
('913aa1933025f83aa076ce90fa8c95beabcdbcf269969b10f1ce89b6eb04a3ccd05a390ded9e1a98', 12, 1, 'MyApp', '[]', 0, '2023-09-28 10:50:13', '2023-09-28 10:50:13', '2024-09-28 10:50:13'),
('91ea2d13ef1fe1463507707feda948edf0ac013361c4847d7f54d7c5cfae260aaa15436f8bd766ce', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:48:54', '2023-10-10 10:51:37', '2024-10-10 10:48:54'),
('91ffe0d2661296f4aaabec0ac17d3985757a552ae9adb9a7c4bc69eb467cc37fdc92b5acda8d4b91', 21, 1, 'MyApp', '[]', 1, '2023-10-19 17:45:06', '2023-10-20 10:00:21', '2024-10-19 17:45:06'),
('92201cf291c9588290ebb2cb653c0a1ae62869c60c410dbd1885822e67aafe490a2576468090abd1', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:25:29', '2023-10-06 15:25:29', '2024-10-06 15:25:29'),
('925773b07ec140ed0a965e91e0fd086888082f9bda85f4e4e0591a7928cf6f56b0defa61222253b4', 42, 1, 'MyApp', '[]', 0, '2023-04-27 19:51:14', '2023-04-27 19:51:14', '2024-04-27 19:51:14'),
('926d9d55da9cea781df63778e8484868cacc4a0589c144ed94a943558ab36bf9351387fc89b79545', 15, 1, 'MyApp', '[]', 1, '2023-10-18 16:26:31', '2023-10-18 17:00:58', '2024-10-18 16:26:31'),
('927c9c1079c2c950b8160fd1e067907df09e04c46aa04eb82ae85fab641e9edf9d805f481755cb5b', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:27:03', '2023-10-06 15:27:03', '2024-10-06 15:27:03'),
('92c28b68c3584e2323284fd06e483bef6954ed130344233773127d32d53494903b5a47497b1b9642', 15, 1, 'MyApp', '[]', 1, '2023-10-18 11:59:55', '2023-10-18 12:00:02', '2024-10-18 11:59:55'),
('935b2bfc2e85d18a38cf3ebdd41f42d64020a11407859f6ce155a4435e33c98d5a9f33d6ff3fe672', 66, 1, 'MyApp', '[]', 0, '2023-10-11 09:47:56', '2023-10-11 09:47:56', '2024-10-11 09:47:56'),
('93692a47a1b0a97d3d16f0566148c6a22f84c1a53d62e40e037e478bcf3f1de9bd79c0b26ecd3417', 12, 1, 'MyApp', '[]', 0, '2023-10-09 18:48:13', '2023-10-09 18:48:13', '2024-10-09 18:48:13'),
('93823e969adf15e9aef00e8e2d66be72c996273dcc4c40fcc149f497c91a7f262b954f5e69053db6', 3, 1, 'MyApp', '[]', 1, '2023-10-12 18:28:06', '2023-10-13 18:39:40', '2024-10-12 18:28:06'),
('94056609d6475d17df05c5fae939363feba330772c77ff2bd0938cc00cde48de0dd4da37aa8e5ca5', 2, 1, 'MyApp', '[]', 0, '2023-09-25 12:05:37', '2023-09-25 12:05:37', '2024-09-25 12:05:37'),
('941ab3fd20c145aa96d25cd34e1d499306bef7f6eebcd79a751f4155e8c64c386f6f7f78c3b69188', 61, 1, 'MyApp', '[]', 1, '2023-10-09 13:33:55', '2023-10-09 15:41:23', '2024-10-09 13:33:55'),
('94364f10803f0a1924d0f534363a4273ad128d1d9103ef77feb3a535ab9289f863a0aa6da3719164', 40, 1, 'MyApp', '[]', 1, '2023-10-06 16:42:52', '2023-10-06 16:44:05', '2024-10-06 16:42:52'),
('943da4b645ed3a06f10c8950e1d232aa6711b925cf6feebcb3187d30ca1527f57d7d98d50adaaaae', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:05:26', '2023-10-06 16:05:26', '2024-10-06 16:05:26'),
('943ebf0c6419400321caa34d8d034af3537faf5b60f153f796602fdfd5e44f389faa216c44b1f139', 68, 1, 'MyApp', '[]', 0, '2023-10-11 09:59:27', '2023-10-11 09:59:27', '2024-10-11 09:59:27'),
('944e53fa7fc66476ba23db8d7b21eac713f87144772def30011cd18f23dbf27df9530c7cde8b945f', 66, 1, 'MyApp', '[]', 0, '2023-10-10 13:20:26', '2023-10-10 13:20:26', '2024-10-10 13:20:26'),
('9498745abbfb2966508ed517c3159dea014a4e8a37d0af86035c20b3fa91743ef0729703c66115e5', 1, 1, 'MyApp', '[]', 1, '2023-09-22 14:34:33', '2023-09-23 12:27:55', '2024-09-22 14:34:33'),
('95c03fbbb462a28e9c8a3aebecd916a1551d222d4cccc99b9c54c30942c0eec925d8b1765df8f3e3', 13, 1, 'MyApp', '[]', 0, '2023-03-21 14:54:31', '2023-03-21 14:54:31', '2024-03-21 14:54:31'),
('95c14b19b9eb51befbb3435227f1cff7a09d918cfa86ad7e3b45edfe2aa9978e5e7d34dd90c505f9', 17, 1, 'MyApp', '[]', 1, '2023-10-18 16:21:06', '2023-10-18 16:21:17', '2024-10-18 16:21:06'),
('96835d5cda4a3f98248d0b2b24874c5393dec9adb0f2110a33ab1176168da2b116b9b69ff9c1f5bf', 11, 1, 'MyApp', '[]', 1, '2023-10-14 13:09:57', '2023-10-14 13:13:17', '2024-10-14 13:09:57'),
('97aeddf5cefb143c332f72ccf6321702ad5cdd296720f2f483711efbd6300f0a1356b5bca8b68ab1', 1, 1, 'MyApp', '[]', 1, '2023-10-11 18:39:12', '2023-10-11 18:42:30', '2024-10-11 18:39:12'),
('97b9f588546b1c85bc72dc4883b08180a680298eaa3573c80f7b93c488f6bef2e908e84261449902', 12, 1, 'MyApp', '[]', 1, '2023-10-09 14:27:20', '2023-10-09 17:26:52', '2024-10-09 14:27:20'),
('98e810421d9ada363dcd46e94e769eefe42987d520059815fe880a3c5a2ecc4ebbc35c2738a5fae8', 39, 1, 'MyApp', '[]', 1, '2023-04-27 16:06:16', '2023-04-27 16:40:18', '2024-04-27 16:06:16'),
('995e4c08b7500ae7cbdeff97b704ddab28bf0e7f5f33a3932cc8f3a02b5cbd75af6902f4df6816b5', 6, 1, 'MyApp', '[]', 0, '2023-03-14 10:05:51', '2023-03-14 10:05:51', '2024-03-14 10:05:51'),
('997348ed7de5bed928bdeba4dd794aa538191f6ed83d37c0c0329a30f429b9d6075568e304a036e5', 11, 1, 'MyApp', '[]', 0, '2023-09-23 11:45:58', '2023-09-23 11:45:58', '2024-09-23 11:45:58'),
('9a56707e3bc8372c06d2ba1463475c5d9de14609bbd9ca1c58244e363b6d790abb00af797559fca2', 13, 1, 'MyApp', '[]', 0, '2023-06-13 11:59:49', '2023-06-13 11:59:49', '2024-06-13 17:29:49'),
('9acf216fd02bc03e952047008d94744fe2755b0652f903966df42bf7973ef99894f7c3114bf4832d', 15, 1, 'MyApp', '[]', 1, '2023-10-23 19:08:36', '2023-10-23 19:14:10', '2024-10-23 19:08:36'),
('9beab98b3e35b2ef5cc0a0b8eb7a7892776bba715d233197d0b6e8cb688618bfbb4f238bc17116ab', 40, 1, 'MyApp', '[]', 1, '2023-10-24 17:07:33', '2023-10-24 17:08:33', '2024-10-24 17:07:33'),
('9cf62fba04ff77c30ef5f14b7f4ed531528cf8b0e2648a8ffc3bb4bda9438f0eb043ea0ad0fcbba7', 30, 1, 'MyApp', '[]', 0, '2023-10-23 12:54:28', '2023-10-23 12:54:28', '2024-10-23 12:54:28'),
('9d0072fa29d47521a61bc1be26415b6c3976e368997a4cae2310c2fc717f7152a66770716d6c4536', 2, 1, 'MyApp', '[]', 0, '2023-09-25 12:28:13', '2023-09-25 12:28:13', '2024-09-25 12:28:13'),
('9d1412e19fbfd34d368a915550ea98ed183c56c5a4503a8b9b2e319ecef4ddf5f742838b42cc2bd5', 82, 1, 'MyApp', '[]', 1, '2023-10-11 14:46:17', '2023-10-11 15:30:28', '2024-10-11 14:46:17'),
('9e9e993c4a1154ea6b088b9ef7345ec56e6c063f79c0373b7d76c531b06136ff16fc778213bd4724', 69, 1, 'MyApp', '[]', 0, '2023-10-11 12:00:04', '2023-10-11 12:00:04', '2024-10-11 12:00:04'),
('9ea5f977812a0958d7507890e875b719af80bc3c1a63393f5178412b5f295839e97aa65bd8c81fe3', 15, 1, 'MyApp', '[]', 0, '2023-10-18 12:24:01', '2023-10-18 12:24:01', '2024-10-18 12:24:01'),
('a0fb32493cd2f7a1eadb219cd4990b6bf3b19bb68b3638063cc083b5a37343627b821d3a5eb702f5', 40, 1, 'MyApp', '[]', 1, '2023-10-06 16:39:26', '2023-10-06 16:41:33', '2024-10-06 16:39:26'),
('a1da0bdf41dd578c335dad7fa3c4b9737bd4f217915a8dd55462e011358238baecd76e21d0b4f9b0', 40, 1, 'MyApp', '[]', 1, '2023-10-06 17:09:10', '2023-10-06 18:08:56', '2024-10-06 17:09:10'),
('a317d1eac5f92a584fa3de2b6a7a774d7ccc5ec272724459cb53667961521263944ede03713beb36', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:52:09', '2023-10-06 16:52:09', '2024-10-06 16:52:09'),
('a44933a40feb1902b4788edfbc0a1fbd7b4457bec9a1015fe6278830c86a7b285126b9e309a01acb', 16, 1, 'MyApp', '[]', 0, '2023-03-21 18:47:05', '2023-03-21 18:47:05', '2024-03-21 18:47:05'),
('a46addf1b54170e071d9fed9075ffd539dcc6ad32b935a7fbc20f970f51c94e4d411aa192264a025', 2, 1, 'MyApp', '[]', 0, '2023-09-25 11:41:22', '2023-09-25 11:41:22', '2024-09-25 11:41:22'),
('a5131217491728a1ae7e40ebcf12df44c1f3194a0eca93adbe4e67afb49d86a5c64fd72b8ef59cd6', 13, 1, 'MyApp', '[]', 0, '2023-04-18 11:06:39', '2023-04-18 11:06:39', '2024-04-18 11:06:39'),
('a5b15ed9c116ffe357a7264d3e83f3788e6f0e610fbcd0d5797e412a4ac5fa36c687520d5066935f', 4, 1, 'MyApp', '[]', 0, '2023-10-11 18:43:01', '2023-10-11 18:43:01', '2024-10-11 18:43:01'),
('a94d0c609c6d5e3729f3b757afc28ec63f15205910567dd76f861dd28997b702bb454e3fbe82edee', 40, 1, 'MyApp', '[]', 1, '2023-10-24 17:08:51', '2023-10-24 18:05:30', '2024-10-24 17:08:51'),
('a97b6b0b988b6927bd3cbe9abe73d464335ebffeec945f6a2fb6aeb44df3de3b9ebb54adab6fffdd', 61, 1, 'MyApp', '[]', 0, '2023-10-09 14:39:04', '2023-10-09 14:39:04', '2024-10-09 14:39:04'),
('a9cdd489223694565660f427ac75f9c66fdd23b040a736900244c7d9d3fe5a5ce36aa4467d88e9d4', 8, 1, 'MyApp', '[]', 0, '2023-05-01 12:21:09', '2023-05-01 12:21:09', '2024-05-01 12:21:09'),
('aa049fd4de4d0c95e3241f3118a178e33fe32be7349fa99f02f864342a1b91e1547010b0bb80459b', 34, 1, 'MyApp', '[]', 0, '2023-10-23 13:03:09', '2023-10-23 13:03:09', '2024-10-23 13:03:09'),
('aa9ab3e74341008c98680ea20b1f76f86e9c7cb967a32f75f687f5bf6fcee28efe38a74e15eeb4a3', 13, 1, 'MyApp', '[]', 0, '2023-03-30 18:56:30', '2023-03-30 18:56:30', '2024-03-30 18:56:30'),
('aab3befafd24461d18696688d20bc9f86b590f4521efe674337babd4ed1a892417bc5e465a4fda5b', 12, 1, 'MyApp', '[]', 0, '2023-10-09 18:53:39', '2023-10-09 18:53:39', '2024-10-09 18:53:39'),
('ac4d98d5a043bf963d51ef2131b35b9b6953a5d2955e1bf05c4d2265662c75131d8f32fb7139df2d', 13, 1, 'MyApp', '[]', 0, '2023-04-26 10:31:55', '2023-04-26 10:31:55', '2024-04-26 10:31:55'),
('adae9ef3595f2078d50561cd743990e92f1a56827be97340d496870c551c11db64d31ae027d11723', 20, 1, 'MyApp', '[]', 0, '2023-09-23 14:26:58', '2023-09-23 14:26:58', '2024-09-23 14:26:58'),
('adc2240a962079e2e38d8e8ba07f6f1be35b5a4415261082ca843c55659e8498b45213e397996c82', 36, 1, 'MyApp', '[]', 0, '2023-10-27 18:25:49', '2023-10-27 18:25:49', '2024-10-27 18:25:49'),
('b0525313b5bf812e0c46e793a297bf067b4f4937f06d1d4b0f8041c15900ba808c1eaecb011adc7d', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:11:59', '2023-10-06 16:11:59', '2024-10-06 16:11:59'),
('b1ef60f62fd5b26bea4bd423e26d70d379f49ce2b8d2e4df30d0da56ecfcf6242f8cafe51c2b03ce', 3, 1, 'MyApp', '[]', 1, '2023-10-13 10:41:01', '2023-10-13 18:33:39', '2024-10-13 10:41:01'),
('b2f6c2fb78c497ec901405ae5e15860b3e87fa0391276ea4af85752f4776d2d4e39b7886c28a98d7', 33, 1, 'MyApp', '[]', 0, '2023-09-25 16:56:19', '2023-09-25 16:56:19', '2024-09-25 16:56:19'),
('b349818efdd1d45390797525493181d13f6ea7e6a65d758f1e75065a7a662b13e08b1d31f1eab64c', 32, 1, 'MyApp', '[]', 0, '2023-10-23 13:00:39', '2023-10-23 13:00:39', '2024-10-23 13:00:39'),
('b425b645274e27c5ed778e05f34e6cb48013cc587e619595db8cf6fd0c375bd4f17864f48b0b5e5a', 15, 1, 'MyApp', '[]', 1, '2023-10-23 16:50:17', '2023-10-23 19:02:11', '2024-10-23 16:50:17'),
('b561b4a26bb41c96381527ead830790733bfa4367255da611d1ed32aad38aa2e3e8dabf56402b79f', 28, 1, 'MyApp', '[]', 1, '2023-10-20 12:38:02', '2023-10-23 12:42:08', '2024-10-20 12:38:02'),
('b71d86d9d5b45c1ca40966359cff9dd34e441bb2da8ed65f81df233440e83065da7ad65973a0ed9d', 13, 1, 'MyApp', '[]', 0, '2023-04-24 16:53:13', '2023-04-24 16:53:13', '2024-04-24 16:53:13'),
('b7a32d2d3b1efc787c1c3427af835a06ab83296c091aa046a4f4a89833eb258c44225e155439826b', 2, 1, 'MyApp', '[]', 1, '2023-10-11 16:19:14', '2023-10-11 16:40:00', '2024-10-11 16:19:14'),
('b7cc3fe937db7f6d2a2fe40018a335724d05fb1f654ef1394efb88a6dbe4bc7d36842716496b7bcc', 27, 1, 'MyApp', '[]', 1, '2023-03-04 07:40:27', '2023-03-04 07:42:27', '2024-03-04 07:40:27'),
('b8ca70027f6170d6ae5e301fd098f9f5c60bedeba9b28a544c7f0638d37b22a96dc26efef7d720ec', 12, 1, 'MyApp', '[]', 0, '2023-10-09 18:49:46', '2023-10-09 18:49:46', '2024-10-09 18:49:46'),
('b9743033e7576226fe7f4f47aa84aa2f2c1518d415176496ae7f08bfc89c37c6bae12098ba61a198', 61, 1, 'MyApp', '[]', 0, '2023-10-06 19:18:55', '2023-10-06 19:18:55', '2024-10-06 19:18:55'),
('b9c5215a06eb09552a0e79f6142e30a29fadf6da6feb8602ac2874518b4afc2bf661f49e73fd6542', 13, 1, 'MyApp', '[]', 0, '2023-04-14 09:59:55', '2023-04-14 09:59:55', '2024-04-14 09:59:55'),
('ba32083c86814a564c229bb11229df697113f746b747e5c44ded750746e84561c5ea388e9aeb1c1f', 7, 1, 'MyApp', '[]', 0, '2023-10-12 15:40:09', '2023-10-12 15:40:09', '2024-10-12 15:40:09'),
('ba4611a61bc1e339c750f5cdb81ef2724c6f874ebfea1afe5de322eef52fe66ae7cdf2b94edef927', 61, 1, 'MyApp', '[]', 1, '2023-10-10 10:45:20', '2023-10-10 10:47:28', '2024-10-10 10:45:20'),
('bad1e011fd56122ed7c52645cf523ab1d79c900213ebe75ad667fabb30fdb7641adb5d432f90db76', 25, 1, 'MyApp', '[]', 0, '2023-10-19 18:12:52', '2023-10-19 18:12:52', '2024-10-19 18:12:52'),
('bb4606e6638eb0a15ddb9436af37deb89a289dc2cb836f3fda687cf1dd0931b74047b90c7a7a3e40', 1, 1, 'MyApp', '[]', 0, '2023-10-26 11:26:45', '2023-10-26 11:26:45', '2024-10-26 11:26:45'),
('bbeaa6bbd34d9c13801bac4eaced2d8625b6b572b648ca1603a01ba10f0fbc5519dfc48286969019', 7, 1, 'MyApp', '[]', 0, '2023-09-25 11:54:58', '2023-09-25 11:54:58', '2024-09-25 11:54:58'),
('bc1539682e37915f23557b3a07165a2d51f8bbc805b768e72349ce4d984784bf053b20c9b7835809', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:36:07', '2023-10-06 15:36:07', '2024-10-06 15:36:07'),
('bd5ad454932b58e61b4bc4503f33e803e0bd0cca72ab10bd8ddd37f18f884d674976d80f31631c99', 39, 1, 'MyApp', '[]', 0, '2023-04-27 16:02:33', '2023-04-27 16:02:33', '2024-04-27 16:02:33'),
('bd9ae20317bd27fa145e02cff085618f967421d9c61e9827b3505f479ca64ecba76fc86f34aab890', 1, 1, 'MyApp', '[]', 0, '2023-10-28 10:00:07', '2023-10-28 10:00:07', '2024-10-28 10:00:07'),
('bdb34fbabe5c7ca7f48c5b0cec8f2154097780fd50368dbe5884558da33f1c7c9193ca9f92a5bc81', 5, 1, 'MyApp', '[]', 0, '2023-04-24 14:27:21', '2023-04-24 14:27:21', '2024-04-24 14:27:21'),
('bff7abe309cc69a57fb936aaea6d93cec311137a67e4b77d597adec693b066b841b007c7ab6ce3c6', 33, 1, 'MyApp', '[]', 1, '2023-09-26 17:40:22', '2023-09-26 17:40:42', '2024-09-26 17:40:22'),
('c1f6bb9bb3a85e6870545e525d88e6745889f5b73f2c9d8d3c702591ad2c6b5a9a14c22c850cb1b6', 27, 1, 'MyApp', '[]', 0, '2023-03-04 08:35:10', '2023-03-04 08:35:10', '2024-03-04 08:35:10'),
('c2fb827891004c734248f6df3ea85b285f454c0f4549faa22b404a1644c2e0dada824b36452138c8', 21, 1, 'MyApp', '[]', 1, '2023-10-19 18:04:45', '2023-10-23 12:25:03', '2024-10-19 18:04:45'),
('c367f99ef759296bacfdc4d12bdc9a4fb7827d47eef66fbb030bd37504c79109d052c00dc36cd3c0', 1, 1, 'MyApp', '[]', 0, '2023-10-27 17:21:21', '2023-10-27 17:21:21', '2024-10-27 17:21:21'),
('c5430f5da68031e3ff4d43d2edcb7b63776769388a79076dc349c9d981cfe9c51bf51161cb7c1e08', 33, 1, 'MyApp', '[]', 0, '2023-09-26 16:25:15', '2023-09-26 16:25:15', '2024-09-26 16:25:15'),
('c651cd00ab5ca9b923baa3277ad6e58bd918a2b8dce3687e4e2023c4b5decd8d7c6924af776731ab', 66, 1, 'MyApp', '[]', 1, '2023-10-10 13:21:14', '2023-10-10 13:25:20', '2024-10-10 13:21:14'),
('c65b28b7af65e11f5956185a88a17f4a4c8fb910e4d91315251dbc14e96687f7ea52cf24be6acf5b', 9, 1, 'MyApp', '[]', 0, '2023-04-22 12:42:48', '2023-04-22 12:42:48', '2024-04-22 12:42:48'),
('c65c5278b766aa0989a3e743ae79be11e61ba4589bdeeccaf624acb77a1d33368740ce6a825cf550', 13, 1, 'MyApp', '[]', 0, '2023-03-21 15:04:28', '2023-03-21 15:04:28', '2024-03-21 15:04:28'),
('c67822465e74dbc4493fce834ed12024d28af600824f565638ca70854dc163fa9f34ea10733f5089', 33, 1, 'MyApp', '[]', 1, '2023-10-23 13:01:28', '2023-10-23 19:17:52', '2024-10-23 13:01:28'),
('c7ecdc16c71e0aa8164b29d6639f282e83c587f38975b9f3ca044e0577438464072db8bdf1853e59', 12, 1, 'MyApp', '[]', 1, '2023-09-23 12:29:04', '2023-09-26 14:59:13', '2024-09-23 12:29:04'),
('c8ded79898fd443d0505d8e2319fdea658ff9433637db1045abbb0839bebc97645c7a97386368b01', 12, 1, 'MyApp', '[]', 0, '2023-10-09 18:49:09', '2023-10-09 18:49:09', '2024-10-09 18:49:09'),
('c8e74b4451de1fb381db8c241542b8811b7f2d56d0a8867193d6809b96950d68b188d9900a4a3618', 2, 1, 'MyApp', '[]', 0, '2023-09-22 15:29:49', '2023-09-22 15:29:49', '2024-09-22 15:29:49'),
('c909c43316f48bf38acb23777db9a45898b13c850079c65133dd64f933d6144e68699b0070bbe37d', 61, 1, 'MyApp', '[]', 1, '2023-10-09 15:41:42', '2023-10-09 18:34:54', '2024-10-09 15:41:42'),
('c93fea25c0092c057402c3390c1f1e2c1effb3b537c25f0b8e6eaac7b5b901b50a77c9e5b62cf7a2', 69, 1, 'MyApp', '[]', 0, '2023-10-11 10:04:48', '2023-10-11 10:04:48', '2024-10-11 10:04:48'),
('cb0a8c5cb132a9d71258a377252a448ce832600de15584d00796926c9062faa7e49944351bb271b3', 15, 1, 'MyApp', '[]', 1, '2023-10-18 15:59:42', '2023-10-18 16:20:44', '2024-10-18 15:59:42'),
('cbc79c99f9bd571933924d6d25dac45d4be363b880448a12291079f9245818cd76b13f21751f97ca', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:26:19', '2023-10-06 15:26:19', '2024-10-06 15:26:19'),
('ccc70d60ebc5cd82980aa05caad54e73ee5915f6f4653c59e99828630405283051efc27a46af2094', 36, 1, 'MyApp', '[]', 0, '2023-10-26 14:28:09', '2023-10-26 14:28:09', '2024-10-26 14:28:09');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('ccc844272b118366474f0cf6c900da540814574548aefbdce5bfd4ac38e748e806849bc6e927bd9e', 69, 1, 'MyApp', '[]', 1, '2023-10-11 10:32:25', '2023-10-11 12:48:32', '2024-10-11 10:32:25'),
('cd2eb28232c779db4bf2444c6c8e370f9865283ddc11abae07801b9eeb08d33e554f1113d1d7a500', 28, 1, 'MyApp', '[]', 0, '2023-10-20 12:40:34', '2023-10-20 12:40:34', '2024-10-20 12:40:34'),
('cda7867220bb9df8e14099e50c85c477fec463aecaa919912418071c2814461f9b5fcc9f9b193cb9', 16, 1, 'MyApp', '[]', 1, '2023-10-18 11:54:11', '2023-10-18 11:54:20', '2024-10-18 11:54:11'),
('cf2335016aa299b76548da19432c7c36b067259b81081f476569498cae686cb68dfc92c438347e54', 40, 1, 'MyApp', '[]', 1, '2023-10-06 16:54:38', '2023-10-06 16:55:34', '2024-10-06 16:54:38'),
('cfa4a72c970a5e3b6420e3a3c0e4ce0d7c7bdae70cd0652bfe84fb991961eaf8703f064557c3ab51', 39, 1, 'MyApp', '[]', 1, '2023-10-28 10:30:57', '2023-10-28 10:33:23', '2024-10-28 10:30:57'),
('cfb9ee9fa6c0ffeb5ceaa3fbefb6c4c3db841ff12eaea41f2e030ac126724cd3d6ba5556ef667441', 35, 1, 'MyApp', '[]', 0, '2023-10-23 13:23:47', '2023-10-23 13:23:47', '2024-10-23 13:23:47'),
('d05b4fd2c518d7af17767faf7e3b77fe50b8b41956c7734c758ef71004e6049e304ae8045808f129', 61, 1, 'MyApp', '[]', 0, '2023-10-09 19:19:42', '2023-10-09 19:19:42', '2024-10-09 19:19:42'),
('d0cf0a1a41af1f19bde62fd350cea7776f2ee122a0c6a4b66ee1f46c32c0ad350f0417fd80114282', 3, 1, 'MyApp', '[]', 1, '2023-10-12 15:21:50', '2023-10-12 15:37:01', '2024-10-12 15:21:50'),
('d17f483731d9c56d1bfed2a0bf270e4397510ed15eb4e2a715f9b78a7ff82289124ae31d0f6bf2ac', 40, 1, 'MyApp', '[]', 1, '2023-10-06 16:18:18', '2023-10-06 16:37:20', '2024-10-06 16:18:18'),
('d18a4956d8d44df4387ebba186b65368dcc74b8cd144ebc7dd539d81e613ea22f245b8cb16043a6f', 4, 1, 'MyApp', '[]', 0, '2023-10-12 16:02:38', '2023-10-12 16:02:38', '2024-10-12 16:02:38'),
('d2d4a498c719092eb68f83c21361d93b5354979d9ea5c0823f37d5d882c9454b530eb14a6d64dfeb', 24, 1, 'MyApp', '[]', 0, '2023-09-25 13:44:37', '2023-09-25 13:44:37', '2024-09-25 13:44:37'),
('d588ac430aa666c1ae030095e1427ee0bed1a2d383d29fc230f11842f3b5943b73e279eaa3dff452', 27, 1, 'MyApp', '[]', 0, '2023-03-04 07:49:52', '2023-03-04 07:49:52', '2024-03-04 07:49:52'),
('d5d3769d6936bf2cfe6684b5e8cb678e2be72e168ebbad8ef81be145ce295e8972ef1de37abbc2ce', 15, 1, 'MyApp', '[]', 1, '2023-10-19 11:57:22', '2023-10-19 12:00:35', '2024-10-19 11:57:22'),
('d626b55a0f8067b904867989bc648bf20eb477664acf33cc70df11cee71e7ac3d7615090348f379a', 9, 1, 'MyApp', '[]', 0, '2023-03-04 08:46:06', '2023-03-04 08:46:06', '2024-03-04 08:46:06'),
('d66d7b5131f376b5a407d7315009771ac1986fdcebbd8c32f3ef090c4eb12c49a729061bbf42d7bb', 2, 1, 'MyApp', '[]', 0, '2023-09-25 12:09:51', '2023-09-25 12:09:51', '2024-09-25 12:09:51'),
('d6e6edbd55918aac64290ddeebba1bf1d58e560394ba4b2cd6d9b8832344115f00df959ab1f335f4', 38, 1, 'MyApp', '[]', 0, '2023-09-26 18:26:27', '2023-09-26 18:26:27', '2024-09-26 18:26:27'),
('d7675bc19c8e6383c25605d82824c378dca5ef5f79e4a01376cd4f02c53907acb919dc6d793785b9', 33, 1, 'MyApp', '[]', 1, '2023-09-26 17:15:00', '2023-09-26 17:15:28', '2024-09-26 17:15:00'),
('d99f4906df32db3595a72721cbd9dcebaebc878d47e52d6801cead2c50486b627e595b2af8d43be6', 27, 1, 'MyApp', '[]', 0, '2023-03-04 07:35:30', '2023-03-04 07:35:30', '2024-03-04 07:35:30'),
('da72d73c234604cb29124a6d49f2f196b60c247f81e7212595fb3d5e17f17c10e32e4ae7897c8bd0', 38, 1, 'MyApp', '[]', 1, '2023-09-26 19:40:21', '2023-09-28 11:45:08', '2024-09-26 19:40:21'),
('dae5f836fd111710141861abd52f9031b1c2fa53a72716c8143e51c36fd39f7c4a2e17f37239c37c', 41, 1, 'MyApp', '[]', 0, '2023-10-24 17:34:52', '2023-10-24 17:34:52', '2024-10-24 17:34:52'),
('db6f13265e0f214696252dacd062bfcafcb25d5b325e1580c719913dae4479dd4a54cac3dd3c6898', 9, 1, 'MyApp', '[]', 0, '2023-03-09 10:03:57', '2023-03-09 10:03:57', '2024-03-09 10:03:57'),
('db9a692faffa410329662c96d47c3cf426400ebbb1ba9e4677a392c0290db25f40de640e0a0d80bf', 3, 1, 'MyApp', '[]', 0, '2023-10-13 17:13:59', '2023-10-13 17:13:59', '2024-10-13 17:13:59'),
('dd704d8dfe53bed7650002203ef612d7c3781ee63fc34dec1cf3bbad1a318a0a7cb2429dccbb752c', 3, 1, 'MyApp', '[]', 1, '2023-10-14 09:50:04', '2023-10-14 12:37:23', '2024-10-14 09:50:04'),
('dd8a302391bc0db3a3ec76361fd49a3f1180a24fd8b28180b9fe4322a25ffc2bb3cc1b76143b13f5', 36, 1, 'MyApp', '[]', 1, '2023-10-24 14:59:19', '2023-10-24 17:00:08', '2024-10-24 14:59:19'),
('df00d2b3f0153baf7d4ef009e04183657424af02b52f378fd023dd3b374894aedccdea45edccc297', 13, 1, 'MyApp', '[]', 1, '2023-04-24 13:08:02', '2023-04-24 13:11:27', '2024-04-24 13:08:02'),
('df36d3de1d261b410315e2df2d1d1c9b35ce00bc18a727bc544b34350e6380c60ab29385ddc0a405', 69, 1, 'MyApp', '[]', 0, '2023-10-11 10:01:13', '2023-10-11 10:01:13', '2024-10-11 10:01:13'),
('df61515b38eeb9fe595593f311cb70252e87d57cc8bf777b4e57a1a07f5a1f0cab793e4c555d0405', 40, 1, 'MyApp', '[]', 1, '2023-09-28 11:47:55', '2023-09-28 11:48:22', '2024-09-28 11:47:55'),
('dfc29ec4c74b00367a8aa89f54da07ca9a7e602499c3c0c6f8d3a720bdd4848a7547afdc545f7d0e', 21, 1, 'MyApp', '[]', 0, '2023-10-19 18:06:08', '2023-10-19 18:06:08', '2024-10-19 18:06:08'),
('e0747c6997ab2fb466c1ffa35b8efbba0ae3ab1e23548d39cf19f5c9e8efbf777501d4fe1fe71541', 61, 1, 'MyApp', '[]', 1, '2023-10-09 19:04:38', '2023-10-10 10:29:12', '2024-10-09 19:04:38'),
('e0fd87a170d98b88343c67d9e57b1eae2ae3fd290041928c1aeed45b5d454225630501a866dd58fd', 38, 1, 'MyApp', '[]', 0, '2023-09-26 18:20:30', '2023-09-26 18:20:30', '2024-09-26 18:20:30'),
('e10e6490ea64bb857e4d860e77d06d045fb7dcb3b56a47d582dc3299545631c856d240b394fea36f', 15, 1, 'MyApp', '[]', 1, '2023-10-18 11:58:40', '2023-10-18 11:58:52', '2024-10-18 11:58:40'),
('e1401397395b115c403e54b7bb149efcdf1d41a3836e3404f29afeb9c422fc87cd692bbf214c3a32', 9, 1, 'MyApp', '[]', 0, '2023-05-01 10:38:37', '2023-05-01 10:38:37', '2024-05-01 10:38:37'),
('e1a3bf5da1866bb1d14262b7a7ce26d698b354ea6a166e459e942cbbf91cc51bce5981c7dd318242', 4, 1, 'MyApp', '[]', 0, '2023-10-13 12:26:17', '2023-10-13 12:26:17', '2024-10-13 12:26:17'),
('e2d6ea5cd8e85465c9ade8e377b51a8da52935a9280f29d778609903173e2202233eb4f2cd7c6c8c', 3, 1, 'MyApp', '[]', 1, '2023-10-11 18:34:59', '2023-10-11 19:01:40', '2024-10-11 18:34:59'),
('e2d9c6ba0785678e994aa6821e46edc8bdf775be32c320a386911677df0d050f8bb9df8aea858629', 60, 1, 'MyApp', '[]', 1, '2023-10-06 18:46:18', '2023-10-06 18:46:45', '2024-10-06 18:46:18'),
('e33efff55ca2e46487095754095961a3e845611c48f442f73a2d888dc5261c0eef27f093859c7148', 33, 1, 'MyApp', '[]', 0, '2023-09-25 16:47:43', '2023-09-25 16:47:43', '2024-09-25 16:47:43'),
('e35bdaf3c92ef5f5f79121c4ad83fc7138067b2130ee026865a2d99fe913dbe8bde4fc2291cd863e', 36, 1, 'MyApp', '[]', 0, '2023-10-26 10:25:14', '2023-10-26 10:25:14', '2024-10-26 10:25:14'),
('e6dbdd2747713169d4b3b47bc3967c20bb8c3022a5a87616c0d776aab96fda1104141c2348add3d4', 33, 1, 'MyApp', '[]', 1, '2023-09-26 16:58:53', '2023-09-26 16:59:13', '2024-09-26 16:58:53'),
('e6e95876a057220f13b6c1bf111770f4e8e83460b856324e34acb5f2e3b9814daf88d8d67c5ef10f', 61, 1, 'MyApp', '[]', 1, '2023-10-11 12:15:54', '2023-10-11 12:16:38', '2024-10-11 12:15:54'),
('e892684221a3d8cad05144341e0d4e590e3517c59a4e2246d798817a99077fbc7870b7a528deddd2', 66, 1, 'MyApp', '[]', 1, '2023-10-11 12:52:25', '2023-10-11 12:54:16', '2024-10-11 12:52:25'),
('e90737ef38ef8b7ad8c36cdaa08ca81fb5d89d23dbe6560e811075a47e1748aaa4587a09b9a5650f', 40, 1, 'MyApp', '[]', 1, '2023-10-06 17:06:33', '2023-10-06 17:08:03', '2024-10-06 17:06:33'),
('e9b4fb5dbf62a4cdfbc774c6ce682574583dc496b1f62b0eff8ef043a75441c412b62fd0d5ed8415', 40, 1, 'MyApp', '[]', 1, '2023-10-06 16:45:41', '2023-10-06 16:47:50', '2024-10-06 16:45:41'),
('eb3507f81506a305ee707a03cdb18c8358585d69b73080af4a638bbfeef4dab9f4a13110556e16ce', 66, 1, 'MyApp', '[]', 0, '2023-10-10 14:48:43', '2023-10-10 14:48:43', '2024-10-10 14:48:43'),
('ec91db512e9760388fb0e0a5197f561d3ed9cde958120e54836e807cb473134ab2f91aba87d38641', 40, 1, 'MyApp', '[]', 0, '2023-10-06 15:27:35', '2023-10-06 15:27:35', '2024-10-06 15:27:35'),
('ef158fe6c97ca8a368296ed3471b47cb9ade329700bd8278692735c6014647ce9c71ddfc406205a6', 38, 1, 'MyApp', '[]', 0, '2023-09-27 11:45:47', '2023-09-27 11:45:47', '2024-09-27 11:45:47'),
('ef9436e70178353d55c1a2c257682e3cc4de31d81246c684664378b7ccfc5f437b49b0e913b362dd', 24, 1, 'MyApp', '[]', 0, '2023-02-24 05:04:19', '2023-02-24 05:04:19', '2024-02-24 10:34:19'),
('f078d57af459515674251988ddf4e1b7408846ddaa8e97315f27f044ac8b808db21672e146e12825', 28, 1, 'MyApp', '[]', 0, '2023-10-20 18:01:37', '2023-10-20 18:01:37', '2024-10-20 18:01:37'),
('f12f0550e40982d3431c80387c5b8c97b06a7ee68dc40fcba31658d2edcbf1d83ba5c4aa93b7f62f', 13, 1, 'MyApp', '[]', 0, '2023-03-21 12:48:38', '2023-03-21 12:48:38', '2024-03-21 12:48:38'),
('f1fe6e2ef0f499fd90a93f74d8a524d593a1b15ffe3b33e73096d22bd75053b17eff4f1e7447b9f9', 82, 1, 'MyApp', '[]', 0, '2023-10-11 15:34:28', '2023-10-11 15:34:28', '2024-10-11 15:34:28'),
('f233aa9339772ac40f65b030a82153b108f6d04a4ff3e761a9bee4c64609d33eb8a593df9e69a3c8', 36, 1, 'MyApp', '[]', 0, '2023-10-25 16:32:35', '2023-10-25 16:32:35', '2024-10-25 16:32:35'),
('f2f29a6be40eb37c95347b6c64a271129307dcc04c54835db66dc78176c37c40cc2705d3f770acfb', 15, 1, 'MyApp', '[]', 0, '2023-10-24 16:45:24', '2023-10-24 16:45:24', '2024-10-24 16:45:24'),
('f409674c17800c4d5f27ddff795bf6f75108722acc9cca544efb1a0b483e4da89fb36ae9cb778b57', 39, 1, 'MyApp', '[]', 1, '2023-10-24 16:16:27', '2023-10-24 16:18:15', '2024-10-24 16:16:27'),
('f45961c762ced05cbb065b5c3ca8e8b1d261362c647266ea969faf82c959f2ba20a85473b334c9d0', 29, 1, 'MyApp', '[]', 0, '2023-10-23 12:38:27', '2023-10-23 12:38:27', '2024-10-23 12:38:27'),
('f4a754908200a5938766a702f5cd4dfc1ec933ec1654d08e30a13b02e23ac2b2e87348397d3a8c99', 38, 1, 'MyApp', '[]', 1, '2023-04-27 15:50:00', '2023-04-27 15:51:10', '2024-04-27 15:50:00'),
('f6545ea54c761700b8a44cb9d2a3e2f4b9df534e82063b17e05b74860faa98a7dbed6470de559190', 33, 1, 'MyApp', '[]', 1, '2023-09-26 17:48:14', '2023-09-26 17:48:29', '2024-09-26 17:48:14'),
('f96197a6ca4469da5548e4bc1c3821fa344c9a64e8fc8b96c9a5aa48ea8f6be17cf8f79989b9cb36', 40, 1, 'MyApp', '[]', 0, '2023-10-06 16:05:03', '2023-10-06 16:05:03', '2024-10-06 16:05:03'),
('fa44c344571f54e421953754ab4c60127924670c8aecbbffc8d17821b33992021d48ff2611907428', 36, 1, 'MyApp', '[]', 0, '2023-10-24 10:48:22', '2023-10-24 10:48:22', '2024-10-24 10:48:22'),
('facabd46cad098906ec5ef194ceecc763fba79e62bd94d6211d7c1bf53a02b26a1f232bcc1576e67', 39, 1, 'MyApp', '[]', 1, '2023-10-24 16:33:13', '2023-10-24 17:06:23', '2024-10-24 16:33:13'),
('fb826758669969dd67cdc937da52a7f5e9f09d085f8ec05c60500906c3401b7073c7a5592f82107f', 5, 1, 'MyApp', '[]', 0, '2023-04-24 14:26:50', '2023-04-24 14:26:50', '2024-04-24 14:26:50'),
('fd4a1233bc0fef3c7fca7e202d66543f593405b5c7e5fe805ed3b273697521a66aade71e9189e672', 1, 1, 'MyApp', '[]', 0, '2023-10-23 10:21:34', '2023-10-23 10:21:34', '2024-10-23 10:21:34'),
('fdfd27d56432eff88abca4ac6251a80c9f453e286f40804954e4a3658e96283bf82724a7750f83da', 27, 1, 'MyApp', '[]', 0, '2023-03-04 07:53:45', '2023-03-04 07:53:45', '2024-03-04 07:53:45'),
('fe0b8ed7e320559fb40745de99ddb4e378752c64a2dbe2e97978f8f90673eb97a1e85d43fb46f0a1', 65, 1, 'MyApp', '[]', 0, '2023-10-09 19:28:25', '2023-10-09 19:28:25', '2024-10-09 19:28:25'),
('fe4495d7afd972ce3192fa28ec89956475204d962629cf9adf8cc415abbe719e927a0986657f814e', 13, 1, 'MyApp', '[]', 0, '2023-04-20 11:18:36', '2023-04-20 11:18:36', '2024-04-20 11:18:36'),
('fe5a263feee334c8d73804ded9359234bb28d7ffb97971daa3db671875c5bf61393dd16427b965a5', 61, 1, 'MyApp', '[]', 1, '2023-10-09 19:03:45', '2023-10-10 13:12:33', '2024-10-09 19:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'SD7WsVDZ0ef53HK2P4Ecc2k3GQ8byjQV4ytIHsjt', NULL, 'http://localhost', 1, 0, 0, '2023-01-31 04:42:44', '2023-01-31 04:42:44'),
(2, NULL, 'Laravel Password Grant Client', 'DIKe059xyo2EsK0kkBejjAUmZmVysoFiEZnapTyE', 'users', 'http://localhost', 0, 1, 0, '2023-01-31 04:42:44', '2023-01-31 04:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-31 04:42:44', '2023-01-31 04:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active, 2:Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `image`, `image_tag`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Privacy & Policy', 'privacy-policy', '<h3>Protection of Personal Information</h3>\r\n\r\n<p>This Policy explains how &ldquo;Noor Medicare&rdquo;, as the data custodian, will handle any personal information you entrust to us when you visit our website or sign up to utilize the &ldquo;Noor Medicare&rdquo; platform.</p>\r\n\r\n<h3>What kind of private information do we gather?</h3>\r\n\r\n<p>Personal information and data relating to your use of this website &amp; our platform may be collected, stored, and used by us (&quot;Collected Information&quot;). Your IP address, geographic location, browser type, referral source, duration of visit, and number of page views are all personally identifiable information that we gather about your computer and your use of this platform.</p>\r\n\r\n<p>As part of our services, we will provide the hospital/doctor with relevant medical records to better understand your situation. No third parties unrelated to fulfilling your service requests or advertising platforms have access to your data.</p>\r\n\r\n<h3>Cookies and other technologies we use for tracking purposes</h3>\r\n\r\n<p>Cookies are used on this site. A cookie is a small text file a web server may send to a browser that the browser can then save for future reference. The text file is resent to the server whenever a page is requested from the server. So, the server can recognize the browser and keep tabs on its activity. Your web browser may save a &quot;cookie&quot; from our server on your hard drive. The collected information includes data gleaned through cookies. It&#39;s also possible that you&#39;ll get cookies from the sites we partner with for advertising and other services. If you want, you can disable the cookie acceptance in most browsers. However, disabling cookies will have a detrimental influence on the accessibility of many websites, including this one (with Internet Explorer, you may disable cookies by choosing &quot;Tools,&quot; &quot;Internet Options,&quot; &quot;Privacy,&quot; and selecting &quot;Block all cookies&quot; using the sliding selection). Third-party service providers may be used to run this site and assist us monitor, collecting, and analyzing information about your interactions with this website and the data you submit, including via the use of such providers&#39; cookies on your computer, to enhance our services and this site.</p>\r\n\r\n<h3>Justification for using gathered data</h3>\r\n\r\n<p>Personal information and other data collected will be used for the following purposes:</p>\r\n\r\n<p>communicate with you via channels open to the general public (such as email, phone, and messaging).</p>\r\n\r\n<p>control and enhance the functionality of this site and the platform;</p>\r\n\r\n<p>Modify and change content such as text, photos, videos, and links to make the surfing experience more relevant to the user;</p>\r\n\r\n<p>give you promotional materials and other information about our company and the companies of carefully chosen third parties that we believe may be of interest to you through regular mail, email, or other electronic means with your express permission.</p>\r\n\r\n<p>share aggregated user data with third-party businesses. We will never sell or share information that might be used to identify a specific user.</p>\r\n\r\n<p>enable us to monitor the success rate of inquiries sent via our system while limiting access to the actual answer content.</p>\r\n\r\n<p>Inform other users by sharing personal accounts in written text, media files, and visuals. Users may submit material for review and removal if they have concerns.</p>\r\n\r\n<h3>Legitimate justifications</h3>\r\n\r\n<p>Our legitimate interest in gaining insight into how users engage with this webpage or the platform, and in developing more effective methods of promoting our products and services, provides the legal basis for the processing of your Collected Information if you are a registered platform user or a user of the website.</p>\r\n\r\n<h3>Data privacy and protection</h3>\r\n\r\n<p>Your personal information is important to us, and we will protect it against unauthorized access, disclosure, copying, use, or disposal. We cannot ensure the security of any information sent through the Internet due to the insecure nature of this medium. All information you provide us or that we learn about you will be kept safe on our servers. Your obligation to maintain the secrecy of your passwords is absolute. Simply put, we will not be requesting any passwords from you.</p>\r\n\r\n<h3>Sharing Acquired Data</h3>\r\n\r\n<p>Our office is situated in the city of Gurgaon on the Indian subcontinent. We get such information when you provide information about yourself via our website or the platform. Personal information sent to us will be processed following both Indian law and EU-US privacy regulations. Following the forward transfer principles of the IT rules and laws for data protection, we may disclose your data to other parties, as mentioned in Sharing Collected Information. Data center hosting, customer relationship management, corporate email services, software as a service (SaaS) survey solutions, and software as a service (SaaS) IT service management are all examples of the kind of third-party services that we use to help us provide our goods and services to you. These service providers have all been vetted to ensure they are trustworthy. They will only be given access to your personal information if required to carry out the services they have been contracted to offer. They are required to keep the information private. They are prohibited from utilizing it for any reason other than what was intended.</p>\r\n\r\n<h3>Third-Party sources</h3>\r\n\r\n<p>There are external connections available on the site. We have no control over the privacy practices of other websites or the operators of those websites, including their collection or use of any personal information you provide when visiting such other sites.</p>\r\n\r\n<h3>Personal information disclosure</h3>\r\n\r\n<p>Users may request access to their personal information stored by &ldquo;Noor Medicare&rdquo; and have any erroneous or incomplete data rectified, updated, or removed. To get in touch with us, check out the information on our Contact Us page. As a user of our platform, we rely on you to keep your data accurate and up-to-date to the degree required to fulfill the purposes for which it was acquired, such as your contact information, so that we may send you billing details.</p>\r\n\r\n<h3>Your Rights</h3>\r\n\r\n<p>Suppose any personal information is erroneous, outdated, or otherwise wrong. In that case, you have the right to update it (that is, rectified). The right to access one&#39;s personal information is guaranteed (including receiving a copy thereof). You have the right to revoke permission at any time, which will not impact the legality of the processing based on consent before its withdrawal if we ever treat your data based on consent. Your right to have deleted information on you exists, too, and it applies under certain conditions.</p>\r\n\r\n<p>Suppose you believe that the processing of your personal information violates the law. In that case, you have the right to file a complaint with the supervisory authority of your usual residence, employment, or the location where the alleged violation occurred.</p>', NULL, NULL, NULL, NULL, NULL, 1, '2023-02-03 04:05:39', '2023-11-14 15:30:40'),
(2, 'Terms & Conditions', 'terms-conditions', '<h3>Legal Disclaimer:</h3>\r\n\r\n<p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, subscribe to the newsletter, fill out a form, and in connection with other&nbsp;<strong>activities</strong>, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number,&nbsp;<a href=\"http://localhost/dproject/index-2.html\">company name</a>. We will collect personal identification information from Users only if they voluntarily consent such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p>\r\n\r\n<h3>Credit Reporting Terms of Service</h3>\r\n\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, quod. Ratione ex delectus quis tenetur odio non alias numquam official ipsum dolor sit, amet consectetur adipisicing elit. Accusamus, laborum.</p>\r\n\r\n<ol>\r\n	<li>Mauris ut in vestibulum hasellus ultrices fusce nibh justo, venenatis, amet. Lectus quam in lobortis.</li>\r\n	<li>Consectetur phasellus&nbsp;<strong>ultrices</strong>&nbsp;fusce nibh justo, venenatis, amet. Lectus quam in lobortis justo venenatis amet.</li>\r\n	<li>Lectus quam there are two thing is very important in Consectetur phasellus ultrices fusce nibh justo, venenatis, amet in lobortis.</li>\r\n	<li>Web Development very creative to do something , mauris ut in vestibulum. Consectetur phasellus ultrices fusce nibh justo, venenatis, amet to all design.</li>\r\n</ol>\r\n\r\n<h3>Ownership of Site Agreement to Terms of Use</h3>\r\n\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime nulla minus quasi. Voluptatem, facilis saepe ullam autem magni quod sint tempore, eius molestias aliquam debitis. Neque saepe dignissimos repudiandae fuga.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil eveniet quas dignissimos doloribus ea pariatur corrupti rerum deserunt, ipsum, ipsa eos veniam aspernatur fuga, optio soluta? Libero neque reiciendis cupiditate dolores nam. Earum eius similique sapiente. Iure, sit non. At fuga ipsam veniam.</p>\r\n\r\n<h3>Provision of Services</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil eveniet quas dignissimos doloribus ea pariatur corrupti rerum deserunt, ipsum, ipsa eos veniam aspernatur fuga, optio soluta? Libero neque reiciendis cupiditate dolores nam. Earum eius similique sapiente. Iure, sit non. At fuga ipsam veniam.</p>\r\n\r\n<ul>\r\n	<li>Lorem ipsum dolor, sit amet.</li>\r\n	<li>Amet consectetur adipisicing elit. Officia, odit!</li>\r\n	<li>Aquaerat ipsa quis possimus.</li>\r\n	<li>Lorem, ipsum dolor sit amet consectetur adipi.</li>\r\n	<li>Consectetur adipisicing elit. Voluptatibus, dignissimos.</li>\r\n	<li>Highly professional administration.</li>\r\n</ul>\r\n\r\n<h3>Limitation of Liability</h3>\r\n\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime nulla minus quasi. Voluptatem, facilis saepe ullam autem magni quod sint tempore, eius molestias aliquam debitis. Neque saepe dignissimos repudiandae fuga.</p>\r\n\r\n<h3>Accounts, Passwords and Security</h3>\r\n\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime nulla minus quasi. Voluptatem, facilis saepe ullam autem magni quod sint tempore, eius molestias aliquam debitis. Neque saepe dignissimos repudiandae fuga.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil eveniet quas dignissimos doloribus ea pariatur corrupti ullam autem magni quod sint tempore saepe ullam autem magni.</p>', NULL, NULL, NULL, NULL, NULL, 1, '2023-02-10 02:08:47', '2023-11-14 15:31:41'),
(3, 'About Us', 'about-us', '<p>About Our Program</p>\r\n\r\n<h2>Take Care Of Your Health With Our Health Package</h2>\r\n\r\n<p>India has always been known for its sound medical discoveries. Over the decades there has been remarkable growth in providing quality medical services. Seeing this NoorMediCare is established under the vision of Mr. Jawed Akhtar, the founder of NoorMediCare and augmented a strong team of experts, well versed doctors, language translators, professionals from the medical tourism industry to render affordable and world-class services to overseas tourists.</p>\r\n\r\n<p>Collective experiences of over 12 years, and knowledge of professionals, NoorMediCare has today become a trusted name in the medical tourism industry. The head office is located in New Delhi offering services covering PAN India.</p>\r\n\r\n<p>NoorMediCare is tied up with renowned multi-specialty hospitals, Ayurveda centers, medical clinics, yoga centers, travel companies, and visa agencies that help us in making you comfortable journey in India. Its team comprises of professionals who will be appointed to you from the time you decide to visit India. This dedicated expert will walk with you throughout your journey to India. Right from assisting you with medical procedures, your accommodation, travel etc.</p>\r\n\r\n<p>NoorMediCare&rsquo;s motto has been strong with fair determination ever since we started. Its eager is to take care of and be with you like shadow while you go through your medical treatment from welcome (arrival) to see off (departure) in our country. Even after you staying at your home NoorMediCare will must keep in touch with you and you may freely contact with us round the clock.</p>\r\n\r\n<p>There is something different for everyone who decides to go with this. Keeping in mind the expenses you may have for your medical treatment is surprisingly comparable with others. NoorMediCare organization never wants to overload you with un-affordable packages. Since India is known for high-quality affordable medical services and will be maintained to keep it that way.</p>\r\n\r\n<p>The only thing one&rsquo;s need to do is just decide to come and will be taken care of the rest. NoorMediCare third-party travel vendors will make reservations stress free and our hospitality partners will take care of accommodation and meals.</p>\r\n\r\n<p>Visa procedures can be sometimes time taking. Most of the time you may have to constantly follow up with the vendors. No one needs to bother all the hard work that is needed NoorMediCare itself will manage. NoorMediCare is tied-up with multiple insurance companies. Its experts would guide and help you to buy the best policy as per suitability.</p>\r\n\r\n<ul>\r\n	<li>Affordable &amp; Transparent Medical Tourism Packages</li>\r\n	<li>Stress-Free Reservations</li>\r\n	<li>Easy Visa Process &amp; Insurance Service</li>\r\n</ul>', 'uploads/category/57415.jpg', 'asd', 'About Us', 'India has always been known for its sound medical discoveries. Over the decades there has been remarkable growth in providing quality medical services. Seeing this NoorMediCare is established under the vision of Mr. Jawed Akhtar, the founder of NoorMediCare and augmented a strong team of experts, well versed doctors, language translators, professionals from the medical tourism industry to render affordable and world-class services to overseas tourists.', 'asdasd', 2, '2023-11-14 15:15:05', '2023-11-28 21:53:14');

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkdin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script_markup` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_tag_manager` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `email`, `phone`, `short_description`, `address`, `map`, `header_logo`, `footer_logo`, `fav_icon`, `facebook`, `twitter`, `youtube`, `linkdin`, `instagram`, `Pinterest`, `meta_title`, `meta_description`, `meta_keyword`, `script_markup`, `google_tag_manager`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'NoorHealth Clinic', 'admin@gmail.com', '1234567890', 'Lango Cash', 'PO Box , India', 'dfvsdf', 'uploads/setting/96573.png', 'uploads/setting/63542.png', 'uploads/setting/63479.png', NULL, NULL, NULL, 'asd', NULL, 'asd', NULL, 'sdf', 'sdf', 'sdf', 'dsf', 'dsf', NULL, '2023-11-23 13:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active, 2:Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ANDHRA PRADESH', 105, NULL, NULL, 1, NULL, NULL),
(2, 'ASSAM', 105, NULL, NULL, 1, NULL, NULL),
(3, 'ARUNACHAL PRADESH', 105, NULL, NULL, 1, NULL, NULL),
(4, 'BIHAR', 105, NULL, NULL, 1, NULL, NULL),
(5, 'GUJRAT', 105, NULL, NULL, 1, NULL, NULL),
(6, 'HARYANA', 105, NULL, NULL, 1, NULL, NULL),
(7, 'HIMACHAL PRADESH', 105, NULL, NULL, 1, NULL, NULL),
(8, 'JAMMU & KASHMIR', 105, NULL, NULL, 1, NULL, NULL),
(9, 'KARNATAKA', 105, NULL, NULL, 1, NULL, NULL),
(10, 'KERALA', 105, NULL, NULL, 1, NULL, NULL),
(11, 'MADHYA PRADESH', 105, NULL, NULL, 1, NULL, NULL),
(12, 'MAHARASHTRA', 105, NULL, NULL, 1, NULL, NULL),
(13, 'MANIPUR', 105, NULL, NULL, 1, NULL, NULL),
(14, 'MEGHALAYA', 105, NULL, NULL, 1, NULL, NULL),
(15, 'MIZORAM', 105, NULL, NULL, 1, NULL, NULL),
(16, 'NAGALAND', 105, NULL, NULL, 1, NULL, NULL),
(17, 'ORISSA', 105, NULL, NULL, 1, NULL, NULL),
(18, 'PUNJAB', 105, NULL, NULL, 1, NULL, NULL),
(19, 'RAJASTHAN', 105, NULL, NULL, 1, NULL, NULL),
(20, 'SIKKIM', 105, NULL, NULL, 1, NULL, NULL),
(21, 'TAMIL NADU', 105, NULL, NULL, 1, NULL, NULL),
(22, 'TRIPURA', 105, NULL, NULL, 1, NULL, NULL),
(23, 'UTTAR PRADESH', 105, NULL, NULL, 1, NULL, NULL),
(24, 'WEST BENGAL', 105, NULL, NULL, 1, NULL, NULL),
(25, 'DELHI', 105, NULL, NULL, 1, NULL, NULL),
(26, 'GOA', 105, NULL, NULL, 1, NULL, NULL),
(27, 'PONDICHERY', 105, NULL, NULL, 1, NULL, NULL),
(28, 'LAKSHDWEEP', 105, NULL, NULL, 1, NULL, NULL),
(29, 'DAMAN & DIU', 105, NULL, NULL, 1, NULL, NULL),
(30, 'DADRA & NAGAR', 105, NULL, NULL, 1, NULL, NULL),
(31, 'CHANDIGARH', 105, NULL, NULL, 1, NULL, NULL),
(32, 'ANDAMAN & NICOBAR', 105, NULL, NULL, 1, NULL, NULL),
(33, 'UTTARANCHAL', 105, NULL, NULL, 1, NULL, NULL),
(34, 'JHARKHAND', 105, NULL, NULL, 1, NULL, NULL),
(35, 'CHATTISGARH', 105, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title`, `slug`, `description`, `image`, `category_id`, `image_tag`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'xv', 'xv', '<p>xcv</p>', 'uploads/category/66411.png', '2', 'xv', NULL, NULL, NULL, 3, '2023-12-04 11:55:00', '2023-12-04 11:58:11'),
(2, 'asd', 'asd', '<p>asd</p>', 'uploads/category/23185.png', '1', '12', 'sad', 'asd', 'asd', 1, '2023-12-07 05:03:33', '2023-12-07 05:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE `temp_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mpesa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_refral` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:active,2:deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `message`, `ratting`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asds', 'sadsad', '2', 'uploads/category/71934.jpg', 1, '2023-11-23 12:58:40', '2023-11-23 13:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mpesa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1:Active, 2:Deactive ,3:Delete',
  `email_verified_at` int(1) DEFAULT 0,
  `phone_verified_at` int(1) DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `mpesa`, `dob`, `lat`, `lang`, `id_card`, `country_code`, `profile`, `address`, `city`, `state`, `status`, `email_verified_at`, `phone_verified_at`, `password`, `password_show`, `device_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'rranjansingh25@gmail.com', '6370394945', '64978756484', NULL, NULL, NULL, '', '6', '', 'Malviya nagar', NULL, NULL, 1, 0, 0, '$2y$10$msySd8FPgP8Gft8nGELcIulL12bM35N1s.MsfeLnUIo5FSmW2C28O', NULL, 'e_qA3oHcTAOquxrwy7hlKH:APA91bFFyKPidPlJ-uZI6k7IPevg-evLBVSMAbaSq796ntDYPIbl1kQkSjZV_-t3_UHEsVv21v9nBx_2C3ZDlbOgUCD5Bx6zcOAd8_rdctv6Cc5MCieFAkzZpb9wCKVn8BI7sXrPvJlu', NULL, '2023-10-11 15:58:39', '2023-10-28 10:00:07'),
(2, 'BPS', 'bpsn11@gmail.com', '1111111111', '12345678', NULL, NULL, NULL, 'uploads/user/card/45019.jpeg', NULL, 'uploads/user/profile/70986.png', NULL, NULL, NULL, 2, 0, 0, '$2y$10$euNz3RnaQTy19qpCCA2EKuP5qLA44FRVG4ca2R7S/dI.g01SYRzPi', NULL, NULL, NULL, '2023-10-11 16:19:04', '2023-10-18 13:21:31'),
(3, 'BPSN', 'bpsn12@gmail.com', '1212121212', '1234567', NULL, NULL, NULL, 'uploads/user/card/32041.jpg', NULL, 'uploads/user/profile/23952.jpg', 'Street123, Rajasthan', NULL, NULL, 1, 0, 0, '$2y$10$FRVjS1ApYoefzF3fHxnod.f72mk/ptNdfO05WDJycySPJrmEo4.OG', NULL, 'ebRJqVLURpqEKl-aWaAPWp:APA91bHW_MRwWWucG8vNYP9DeZogMp-qFruWaH0r3sC23Xh3cs1nwxT6928FtiNjlm0z-pLTSpuKelR8SkTUQkQ1KVHm_cs1USCphYVrdl4F5eAPy6wKuhpRhyojhHbLNPHaCFCDVunl', NULL, '2023-10-11 16:41:54', '2023-10-14 13:14:25'),
(4, 'BPSN', 'bpsn13@gmail.com', '1313131313', '987654321', NULL, NULL, NULL, '', NULL, '', 'Xyz Street, Rajasthan', NULL, NULL, 1, 0, 0, '$2y$10$C2VVEyZkrNfGtqzQQVzxgu.7YXPWzJbijc.mDpbql3Z3ITMObCiF2', NULL, NULL, NULL, '2023-10-11 18:42:52', '2023-10-19 13:23:42'),
(5, 'test', 'test@gmail.com', '8789625478', '124569888077', NULL, NULL, NULL, 'uploads/user/card/28522.jpg', NULL, 'uploads/user/profile/96209.jpg', 'mansarovar', NULL, NULL, 1, 0, 0, '$2y$10$e9IPOoa0I1WDRnrjrK40Yugtc1GqULyCY5EZ9Rn.YIaa8mrs0m0am', NULL, 'cFGzSIPTTmaw6qtzZzDcaP:APA91bGwtP-A1hq1rXpepQBIVZf0tbfqrlUD3BC5zLLV61_Cs4SvDpchWZUfWZDqKBLIjT0Oo359HICdEoZoxbD5PaEgzezEDqSFGDvSHN7yuClvLpz8ekqBPvKLpxktI3nEVryH4ZdQ', NULL, '2023-10-12 11:27:56', '2023-10-12 11:28:50'),
(6, 'sumit garg', 'sumit@test.com', '8787878787', NULL, NULL, NULL, NULL, 'uploads/id_card/54485.png', '17', NULL, 'hkjklklkk;l', NULL, NULL, 1, 0, 0, '$2y$10$ej1M9lKKDH9WHpZ1YvihXuvfnx.K4L0QVBzhu4ZsVeQ9zUC/f./1K', NULL, NULL, NULL, '2023-10-12 15:25:22', '2023-10-12 15:25:39'),
(7, 'Test', 'test01@gmail.com', '7648464649', '51576494', NULL, NULL, NULL, 'uploads/user/card/79903.jpg', 'India', NULL, 'testdetail', NULL, NULL, 1, 0, 0, '$2y$10$mvB0P94g75PIODEbUNygVuNEkXLOP.Bff4AFN/6xhT8ZtkinBv4zy', NULL, 'f1xPTdWpTIaDAIfrU4dGE6:APA91bHmJFaPKAaVgk2aUv5PSliinAQX26BX3FDHYB95gPOmWLwtn8simV0AGlj72qkB-wV4LyywQ5Zn51sqXNgOysgo0aNpzEDlwyojItJGYcuVi2mgkSZUqV2Iaf8cYoTt0xd0B-OM', NULL, '2023-10-12 15:39:58', '2023-10-12 15:39:58'),
(8, 'test', 'admiasedfden@gmail.com', '1234567890', NULL, NULL, NULL, NULL, 'uploads/id_card/79097.jpg', '11', 'uploads/profile/47921.png', 'sdzfdsrgfvd', NULL, NULL, 1, 0, 0, '$2y$10$AMXgRAwV.YVMPZgIFnyYV.iJCSUW0aT4DIWgpwNDLaW2spNnMIbWu', NULL, 'eXVI_-u7Sjyb9NQGsPQPJ4:APA91bFEIbpLmQpt57nK24oYzGI1LBCxGcBhd27khTO2FOCy6XAscpT_HdNw77trmhy7_FunaN8WvU30pEDH7lm1qTuYfSGWNQT757beepNZ9EkgpPOoBe7IvHVoYY92qvR8OhU-uAK_', NULL, '2023-10-12 16:56:02', '2023-10-12 17:26:22'),
(9, 'jhon', 'jhon@gmail.com', '3232323232', '316494649449', NULL, NULL, NULL, 'uploads/user/card/1697212475.jpg', 'Afghanistan', NULL, 'jhejjd', NULL, NULL, 1, 0, 0, '$2y$10$OqVrQ1kAYWl7EW0bALSK.uAVG/LZ4KUeLAzdHLKtkZfE/XOozGMkm', NULL, 'eHH0opvOS-qRwTpTcw_JiX:APA91bGZnhWWK0UAc0wEUpID1UoElPZpIRtw1sM8lf8RxWmgv6Gwd_OZQpIgPf8zJkza8oROUohl_KqZq5Fpcu563fBgNLKYhY9_UlRXnTTZNgg_T-xIWPJlUw29soyh4sX3Rq2_CYoR', NULL, '2023-10-13 21:24:35', '2023-10-13 21:24:35'),
(10, 'shipra', 'shipra.saxena@jploft.com', '9085647250', '85628900', NULL, NULL, NULL, 'uploads/user/card/1697268069.jpg', 'India', NULL, 'mansarovar', NULL, NULL, 1, 0, 0, '$2y$10$yjxcCocfsNyTY0xiXsttKuReRB5KUBj6GN2pXE4Blya6NU4BuRRCS', NULL, 'c362wGF9QN2nxaEd3azXMk:APA91bFjscnE1cOVmbt5-cal0pAgderaQe4eF0Dia7QAEVs_-2QWHSl_0dV_cxeQeJe7qJHWwAnTobKyi3z7ruWqKbadSHKHQSYQbnNU0w-KMaIDEtTlTJ0RJq4RWBJuxxjr0PPwFkBX', NULL, '2023-10-14 12:51:10', '2023-10-14 12:51:10'),
(11, 'test', 'test001@gmail.com', '8590962258', '56898530', NULL, NULL, NULL, 'uploads/user/card/1697269188.jpg', '5', NULL, 'patel marg', NULL, NULL, 1, 0, 0, '$2y$10$OeZmo8QESeK9TKQVcGPgKO7AcZbfL1JQ7A9S/M.gXf48/iVaL5IK6', NULL, 'ebRJqVLURpqEKl-aWaAPWp:APA91bHW_MRwWWucG8vNYP9DeZogMp-qFruWaH0r3sC23Xh3cs1nwxT6928FtiNjlm0z-pLTSpuKelR8SkTUQkQ1KVHm_cs1USCphYVrdl4F5eAPy6wKuhpRhyojhHbLNPHaCFCDVunl', NULL, '2023-10-14 13:09:49', '2023-10-18 17:04:09'),
(12, 'Test Status', 'Email@yopmail.com', '644654654546456', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 3, 0, 0, '$2y$10$IY/XwUhy68MSB/KzqeOp/OUhYLtCFLxwZ0dg.VtmCUKI43.up0q/6', NULL, NULL, NULL, '2023-10-17 16:13:37', '2023-10-17 17:00:10'),
(13, 'Name data for input field', 'Email@yopmail.com', '123434434546567676767', NULL, NULL, NULL, NULL, 'uploads/user/card/1697539979.jpg', '0', NULL, 'A lump sum contract, sometimes called', NULL, NULL, 3, 0, 0, '$2y$10$Qv3xScoDOgilKza/uklfteJWB0KhJqlfaiX0MrQPBjP1ErHG4mRy.', NULL, NULL, NULL, '2023-10-17 16:22:17', '2023-10-17 16:55:22'),
(14, 'Sebastian Hewitt', 'fohate@mailinator.com', '4845454545566', NULL, NULL, NULL, NULL, 'uploads/user/card/1697540034.jpg', '0', 'uploads/user/profile/1697540068.jpg', 'Aperiam quaerat ut q', NULL, NULL, 3, 0, 0, '$2y$10$yhroijWyfRgv.yYVdnybSuV7W7Zj3RQp7b6LBP4bmW0TIYI2oUEFm', NULL, NULL, NULL, '2023-10-17 16:23:55', '2023-10-17 16:55:15'),
(15, 'william', 'william@yopmail.com', '1234567899', '1234', NULL, NULL, NULL, 'uploads/user/card/1697609993.jpg', '7', NULL, 'Tesing Addresss', NULL, NULL, 1, 0, 0, '$2y$10$w1l2DyVaStTwZFk7r7TJdunwDRy3axkf4abezAJurRRNzHNh9sXZa', 'System@123', 'c2Zen-vWS5KGwnMQpocTe8:APA91bE9R8t03pS36FfFHSGmpDcx8WsO08H4F8Z59UzUbHde5UOYAx4AwEPWrMN7uaZvSNzKhjEa4EnCZ3fX91WbR68FI1EdPnURTkz_87UnUgcN9pcXHqb3Med5HfZeI3jOCRgaXWeG', NULL, '2023-10-18 11:49:54', '2023-10-24 16:45:24'),
(16, 'vyfzuv', 'jvjavja@jbbka.com', '8286035306', '858685', NULL, NULL, NULL, NULL, '0', NULL, 'viUViv', NULL, NULL, 3, 0, 0, '$2y$10$s69kQSo1Dg4WAAloAkzdLesJjGIrSYxECDrHYkATF9.ddM8XcPHUK', NULL, 'dol_S7lQQcigBh4ineN3Gi:APA91bFKp-Myrew51fmcTXF4QqKJ1Nf6Cvd_ZpZ9DjwWimLS7So9pg31RXPwN16ZM8UZsxIDFXMPM2dPBx_BhYgfi-zeQXMT5mQYnbnFHLT2rhtOCO7M_QhlSWg8_8NoXGSoJIOyemOw', NULL, '2023-10-18 11:54:03', '2023-10-18 11:56:52'),
(17, 'test', 'test@msn.com', '5555555555', '56888', NULL, NULL, NULL, NULL, 'American Samoa', 'uploads/user/profile/1697624677.jpg', 'address', NULL, NULL, 3, 0, 0, '$2y$10$7GMMsjeb5D4LB8lGl5h9d.KUDV/maAUSh/SYPUrlnG1D0TZMtPkuW', NULL, 'dol_S7lQQcigBh4ineN3Gi:APA91bFKp-Myrew51fmcTXF4QqKJ1Nf6Cvd_ZpZ9DjwWimLS7So9pg31RXPwN16ZM8UZsxIDFXMPM2dPBx_BhYgfi-zeQXMT5mQYnbnFHLT2rhtOCO7M_QhlSWg8_8NoXGSoJIOyemOw', NULL, '2023-10-18 15:50:38', '2023-10-18 16:21:17'),
(18, 'jon', 'jon@yopmail.com', '0987654321', '1234', NULL, NULL, NULL, NULL, '4', 'uploads/user/profile/1697697414.jpg', 'Austria Address', NULL, NULL, 1, 0, 0, '$2y$10$hnC7LxxjAllKFPLv.WMdo.NAp9bCacZA91o2WtzUKQitPCPDidQ.S', NULL, 'dol_S7lQQcigBh4ineN3Gi:APA91bFKp-Myrew51fmcTXF4QqKJ1Nf6Cvd_ZpZ9DjwWimLS7So9pg31RXPwN16ZM8UZsxIDFXMPM2dPBx_BhYgfi-zeQXMT5mQYnbnFHLT2rhtOCO7M_QhlSWg8_8NoXGSoJIOyemOw', NULL, '2023-10-19 12:05:19', '2023-10-19 14:32:54'),
(19, 'BPS', 'bps1911@gmail.com', '1911111111', '12345678', NULL, NULL, NULL, NULL, '101', NULL, 'Street 123, Jaipur', NULL, NULL, 1, 0, 0, '$2y$10$djeqm3p8ABPPqFMb0YYLTOanUVd5M1n7A6ra9nh/VSEZIi2PiQ5KW', NULL, 'cVOf4Ya5SvuFX9e5gMKGE2:APA91bHR1H_tOZrvSBrUbAzpHYgPewp6xN3sQqIvGqEbVi4KN2NkHuWwcXJeCiVNJ30yUKjbwL_IN_f7OcWp5k0O4NyekzMwP1Ai21w3nX6uLgCx16vNVPv2YaOxPMdhtwbkp4rcB68u', NULL, '2023-10-19 16:59:40', '2023-10-19 16:59:40'),
(20, 'user', 'user463@gmail.com', '6370394949', 'asfsdgfdesrgfe', NULL, NULL, NULL, NULL, 'india', NULL, 'PO Box CT4664 Star Street South Victoria 655945, India', NULL, NULL, 1, 0, 0, '$2y$10$fuIKnrqQ1dDXaNgY1PU3gObH8YOag2LtsbJLuHvwaFYzakWCpF8Ye', NULL, NULL, NULL, '2023-10-19 17:31:16', '2023-10-19 17:31:16'),
(21, 'BPS', 'bps1912@gmail.com', '1912121212', '123456789', NULL, NULL, NULL, NULL, '4', NULL, 'Street 123, Jaipur', NULL, NULL, 1, 0, 0, '$2y$10$2gE/Yb.8QI00VBqkuPepLeJmFhJpfcoIhW/mY8DlQP2P8L7fvepkS', NULL, NULL, NULL, '2023-10-19 17:44:57', '2023-10-19 18:06:08'),
(22, 'ranjan', 'ravi@gmail.com', '7894479301', '65616598995', NULL, NULL, NULL, 'uploads/user/card/1697718541.jpg', 'American Samoa', NULL, 'hsjsj', NULL, NULL, 1, 0, 0, '$2y$10$kcLdWWvarLYvZNLD/M1INOPe1WMyqbpdVomQnP0W./WNp0kvo.mwW', NULL, 'eXVI_-u7Sjyb9NQGsPQPJ4:APA91bEZ47pmH6a9F42w6wLHBdvcMo-ehvu18NNvl0c7pKuusc6GO4lfpwj8C-ESXe5unxsw92zNfuU1HvgVHm9lvJUyED0LdjHF9uw0t9Uc0rAygQhDVFx0bo1NxB-RVRFcx4_oxzaQ', NULL, '2023-10-19 17:59:02', '2023-10-19 17:59:02'),
(23, 'user', 'ravias@gmail.com', '7894479302', 'asfsdgfdesrgfe', NULL, NULL, NULL, NULL, '6', NULL, 'PO Box CT4664 Star Street South Victoria 655945, India', NULL, NULL, 1, 0, 0, '$2y$10$dm0PI9ydym29wICvU4P1CO1bO.czkNY69SepozvDJqmuiNnw38Sxm', NULL, NULL, NULL, '2023-10-19 18:00:45', '2023-10-19 18:00:45'),
(24, 'user', 'ravia3s@gmail.com', '7894479303', 'asfsdgfdesrgfe', NULL, NULL, NULL, NULL, '6', NULL, 'PO Box CT4664 Star Street South Victoria 655945, India', NULL, NULL, 1, 0, 0, '$2y$10$Sjy.NzIMQeQHFUVYRx6K1eucyoS0dIuByopl19MOcTmsKt5yZWk76', NULL, NULL, NULL, '2023-10-19 18:02:27', '2023-10-19 18:02:27'),
(25, 'user', 'ravia34s@gmail.com', '7894479304', 'asfsdgfdesrgfe', NULL, NULL, NULL, 'uploads/user/card/1697719144.png', NULL, NULL, 'PO Box CT4664 Star Street South Victoria 655945, India', NULL, NULL, 1, 0, 0, '$2y$10$cCvA.fIBRS1dI9OMk6tKB.tfWGdxzfzMHEsQ5HxhY07Nl7tqhquZu', NULL, NULL, NULL, '2023-10-19 18:12:52', '2023-10-19 18:12:52'),
(26, 'Bhanu Pratap', 'bps976@gmail.com', '9761122062', '123456789', NULL, NULL, NULL, NULL, NULL, NULL, 'Street 123, Jaipur', NULL, NULL, 1, 0, 0, '$2y$10$vhli/82jkK29oIRoGjchOO4yXjOlJYaPyqQFlOWFrQmPoLDmlXs6q', NULL, NULL, NULL, '2023-10-20 11:28:16', '2023-10-20 11:28:16'),
(27, 'Bhanu Pratap', 'bhanu2828@gmail.com', '8708693049', '1234567', NULL, NULL, NULL, NULL, NULL, NULL, 'Street 1234', NULL, NULL, 1, 0, 0, '$2y$10$S4zm5qi9INvFIjw/d1up6Oz8F7t2PClXKECkcutQQI7kLLYGK5CAS', NULL, 'cVOf4Ya5SvuFX9e5gMKGE2:APA91bHR1H_tOZrvSBrUbAzpHYgPewp6xN3sQqIvGqEbVi4KN2NkHuWwcXJeCiVNJ30yUKjbwL_IN_f7OcWp5k0O4NyekzMwP1Ai21w3nX6uLgCx16vNVPv2YaOxPMdhtwbkp4rcB68u', NULL, '2023-10-20 11:32:17', '2023-10-20 11:32:17'),
(28, 'Bhanu PS', 'bhanu9876@gmail.com', '9876543210', '123456789', NULL, NULL, NULL, 'uploads/user/card/1697805824.jpg', '4', NULL, 'Street 1234,', NULL, NULL, 1, 0, 0, '$2y$10$5IGq9q7KKGQbibm9FzQGfu54X8FwxRRc3H3nIB.pco2Rf/7lyPwj6', NULL, NULL, NULL, '2023-10-20 12:24:24', '2023-10-20 18:13:44'),
(29, 'Bhanu Pratap', 'bhanu123@gmail.com', '9999999999', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, 'Street - 123', NULL, NULL, 1, 0, 0, '$2y$10$XsxXGxqNHQfRfqUAgJlAa.HFhusMGMCOCHJxH.8C66Cao.1eEF2Bq', NULL, NULL, NULL, '2023-10-23 12:31:08', '2023-10-23 12:38:27'),
(30, 'Bhanu pratap', 'bps44@gmail.com', '4444444444', '123456789', NULL, NULL, NULL, NULL, NULL, NULL, 'Street 123', NULL, NULL, 1, 0, 0, '$2y$10$cZEVyxou.bdXF8aTdrxLjeU.rc2l50BxkCZWKu8II3.TlGtoPiaqe', NULL, 'cVOf4Ya5SvuFX9e5gMKGE2:APA91bHR1H_tOZrvSBrUbAzpHYgPewp6xN3sQqIvGqEbVi4KN2NkHuWwcXJeCiVNJ30yUKjbwL_IN_f7OcWp5k0O4NyekzMwP1Ai21w3nX6uLgCx16vNVPv2YaOxPMdhtwbkp4rcB68u', NULL, '2023-10-23 12:54:28', '2023-10-23 12:54:28'),
(31, 'user', 'bps46@gmail.com', '5555555555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PO Box CT4664 Star Street South Victoria 655945, India', NULL, NULL, 1, 0, 0, '$2y$10$t7/tEZJk0PBHRmAcot4q9uTSa7U4gpoGtsAFMDeEamT5oS.EIrHzG', NULL, NULL, NULL, '2023-10-23 12:58:46', '2023-10-23 12:58:46'),
(33, 'BPSN', 'bps123@gmail.com', '3333333333', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, 'Street 123', NULL, NULL, 1, 0, 0, '$2y$10$K7cwTm.J9//v3OMDF8ovLOg03vxconM9ftUdkcATlqJEz.reETLyi', NULL, 'cVOf4Ya5SvuFX9e5gMKGE2:APA91bHR1H_tOZrvSBrUbAzpHYgPewp6xN3sQqIvGqEbVi4KN2NkHuWwcXJeCiVNJ30yUKjbwL_IN_f7OcWp5k0O4NyekzMwP1Ai21w3nX6uLgCx16vNVPv2YaOxPMdhtwbkp4rcB68u', NULL, '2023-10-23 13:01:28', '2023-10-23 13:01:28'),
(34, 'user', 'ravia344s@gmail.com', '7894479312', 'asfsdgfdesrgfe', NULL, NULL, NULL, 'uploads/user/card/1698046378.png', '6', NULL, 'PO Box CT4664 Star Street South Victoria 655945, India', NULL, NULL, 1, 0, 0, '$2y$10$5huCcuxc4335fmgDoL6C6uvJkWO89.OYcc.c.zYTdRidt9ScQmw3G', NULL, NULL, NULL, '2023-10-23 13:03:09', '2023-10-23 13:03:09'),
(35, 'user', 'bps66@gmail.com', '6666666666', NULL, NULL, NULL, NULL, '', '4', '', 'PO Box CT4664 Star Street South Victoria 655945, India', NULL, NULL, 1, 0, 0, '$2y$10$3PmtBd5JyFpExrkuKDXtS.NtBJrsx8QEte78/E9/PAAHFrtZEntS2', '12345678', NULL, NULL, '2023-10-23 13:04:01', '2023-10-23 17:56:00'),
(36, 'Bhanu Pratap', 'rranjansingh2512@gmail.com', '8888888888', '1234567890', NULL, NULL, NULL, '', '4', '', 'Streeet -1234', NULL, NULL, 1, 0, 0, '$2y$10$u8KgHPIAXqmrmx8uOOlcT.xbt.lYRhz7juXQ0a0CbMdQCVe0PjYN.', 'Pass@123', NULL, NULL, '2023-10-23 19:48:11', '2023-10-27 18:25:49'),
(37, 'First name', 'emailfir@yopmail.com', '8848496665', '123456', NULL, NULL, NULL, 'uploads/user/card/1698131363.jpg', '21', NULL, 'Address Belgium +32', NULL, NULL, 1, 0, 0, '$2y$10$tcslLfjZpjDgb0mxrrWti.IjfxaFo0iKqGRGDXCEYvXXEx.q7PMX2', 'System@123', 'dr1P1lLYTvisI-vH2pZCoz:APA91bEuSpx9PeWFCRmGfmIMfsWnuc9CBOqKocZUULvyO4LIEFgNjcbW0m1tGwphdO59RTWh7bP5SMqzQphDEGZYipAsLhKOQV4qG8oJGhP72rZrYD0C6AYdrN4xTR7Cynf_i5kYZCAJ', NULL, '2023-10-24 12:42:51', '2023-10-24 12:42:51'),
(38, 'Bhanu Pratap', 'bhanu95@gmail.com', '9595959595', '1234567890', NULL, NULL, NULL, '', '4', '', 'Street 1234', NULL, NULL, 1, 0, 0, '$2y$10$lijoXTwLn25nrx2Z0mkaeOkuzcgVhazvXd2g2nsF1UUcYXeLCpcUa', 'Pass@123', 'epct4grXQJ6eA9kaRwCLtg:APA91bEDoHfId_X049W8OJKLC9ff9V3b7xeGM6mPme08j2ZM7khhgzUkhdCNpH6MAY_nQyr102VmGTcDwuHrVvnAMHl5CT3dS_fK5rP5lxurEVEuRF1fWWRl5syzHE1lwdT1pAAkK8gg', NULL, '2023-10-24 15:35:53', '2023-10-24 15:37:21'),
(39, 'test', 'tesyop@yopmail.com', '8388885858', '83883', NULL, NULL, NULL, '', '21', '', 'address +32', NULL, NULL, 1, 0, 0, '$2y$10$pNTaZxUj6kndF5htORvuH.iGEAa38sA3A7JT7QfbeLS3miGB4ag3u', 'Pass@12', 'eonGdqL3QcWE9pvWEDe3WK:APA91bFhRb1HRmDnuEWCrLylphcWnAwMUlk_IZdYfP9-t5QuN5laMAiq8qzyvhvhPoQU2ZjiA5NKcq_f15dRIDGMpVFzSiuZWaBYu2XZ5jgQ11IXIrqhASnJv_GCopbfH8J2fwHqW6Ui', NULL, '2023-10-24 16:16:27', '2023-10-28 10:58:43'),
(40, 'test', 'test@yop.com', '7894561230', '584848', NULL, NULL, NULL, NULL, '21', NULL, 'address', NULL, NULL, 1, 0, 0, '$2y$10$rH9eXAXnlP38UVr1rge/U.bEQvdCAO/.nqrdQGCqS0uRoHiRtC0He', '123456', 'eqtT_0JLSpWIEu_Ne-oF0t:APA91bHh8nT257zvv6aoR5PyJTJj2tkVcKVrt2yvw77_y34veQmtnP7HRRhWDb3UltYYsNELTLPeQQvVNogIh960CedRca2_6_dqO4pwv8haDSSKPgvsgoPQlMPS5W5tCbIS8enOgVrA', NULL, '2023-10-24 17:07:33', '2023-10-24 18:39:06'),
(41, 'hrbbr', 'hrjjr@uhhjr.hhn', '58509261661', '58855', NULL, NULL, NULL, NULL, '3', NULL, 'address', NULL, NULL, 1, 0, 0, '$2y$10$SDoUdjOspdPzcgYZpk9zCeBqAlGRGHPM8871Qv2QxID5xk4FUI.cm', '12345678', 'fZANsqerTEuHLnL93lwY87:APA91bGPEaKCHhIQy1a9PKaf-W0lRZjAWp0R1reXLDwJimHO1TDmSVclWq0415FBYO3C-DVsYGuoMDw7nVdRYa09kfRBp0Kq3j0Yabm5fL0YxDdyB56LikVwdSzOHlccTqn41f68_MZs', NULL, '2023-10-24 17:34:52', '2023-10-24 17:34:52'),
(42, 'rahul', 'rahul@test.com', '9876543211', '2356895623', NULL, NULL, NULL, 'uploads/user/card/1698150620.jpg', '13', NULL, 'test', NULL, NULL, 1, 0, 0, '$2y$10$XmsToZji5lFbDVu93FuPcezct3wJ0trhdPutAPXAK6nhJRltIPvNS', '123456', 'eqtT_0JLSpWIEu_Ne-oF0t:APA91bHh8nT257zvv6aoR5PyJTJj2tkVcKVrt2yvw77_y34veQmtnP7HRRhWDb3UltYYsNELTLPeQQvVNogIh960CedRca2_6_dqO4pwv8haDSSKPgvsgoPQlMPS5W5tCbIS8enOgVrA', NULL, '2023-10-24 18:00:40', '2023-10-24 18:00:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enqueries`
--
ALTER TABLE `contact_enqueries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enqueries`
--
ALTER TABLE `enqueries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_enqueries`
--
ALTER TABLE `contact_enqueries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enqueries`
--
ALTER TABLE `enqueries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
