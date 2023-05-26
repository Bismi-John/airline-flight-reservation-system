-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 11:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`id`, `name`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'Miraya', 0, '2023-03-16 10:44:24', 0, '2023-03-16 10:44:24'),
(4, 'Migg', 0, '2023-03-16 10:45:53', 0, '2023-03-16 10:45:53'),
(5, 'Jet airways', 0, '2023-03-16 10:46:20', 0, '2023-03-16 10:46:20'),
(6, 'Bazigar', 0, '2023-03-16 10:48:08', 0, '2023-03-16 10:48:08'),
(7, 'amal airways', 0, '2023-03-16 10:59:41', 0, '2023-03-16 10:59:41'),
(8, 'qatar airways', 0, '2023-03-20 02:49:58', 0, '2023-03-20 02:49:58'),
(9, '   Indgo', 0, '2023-03-21 04:21:58', 0, '2023-03-21 04:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbr` varchar(255) NOT NULL,
  `state_id` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `name`, `abbr`, `state_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'Allahabad Airport', 'IXD', 23, 0, '2023-03-15 10:14:43', 0, '2023-03-15 10:14:43'),
(4, 'Along Airport / Aalo Airport', 'IXV', 3, 0, '2023-03-15 10:34:45', 0, '2023-03-15 10:34:45'),
(5, 'Bagdogra Airport', 'IXB', 24, 0, '2023-03-15 10:35:25', 0, '2023-03-15 10:35:25'),
(6, 'Balurghat Airport', 'RGH', 24, 0, '2023-03-15 10:35:25', 0, '2023-03-15 10:35:25'),
(7, 'Bareli Airport', 'BEK', 23, 0, '2023-03-15 10:35:25', 0, '2023-03-15 10:35:25'),
(8, 'Belgaum Airport', 'IXG', 9, 0, '2023-03-15 10:35:25', 0, '2023-03-15 10:35:25'),
(9, 'Bellary Airport', 'BEP', 9, 0, '2023-03-15 10:35:25', 0, '2023-03-15 10:35:25'),
(10, 'Bengaluru International Airport / Kempegowda International Airport', 'BLR', 9, 0, '2023-03-15 10:35:25', 0, '2023-03-15 10:35:25'),
(11, 'Bhatinda Airport', 'BUP', 18, 0, '2023-03-15 10:35:25', 0, '2023-03-15 10:35:25'),
(12, 'Bhavnagar Aerodome', 'BHU', 5, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(13, 'Raja Bhoj Airport', 'BHO', 11, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(14, 'Biju Patnaik Airport', 'BBI', 17, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(15, 'Bhuj Airport', 'BHJ', 5, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(16, 'Kullu Manali Airport', 'KUU', 7, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(17, 'Nal Airforce Station / Bianer Airforce Station', 'BKB', 19, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(18, 'Bilaspur Airport', 'PAB', 35, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(19, 'Car Nicobar Air Force Base', 'CBD', 32, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(20, 'Chandigarh International Airport', 'IXC', 31, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(21, 'Chennai International Airport / Madras Airport', 'MAA', 21, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(22, 'Cochin International Airport', 'COK', 10, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(23, 'Coimbatore International Airport', 'CJB', 21, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(24, 'Cooch Behar Airport', 'COH', 24, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(25, 'Kadapa Airport', 'CDP', 1, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(26, 'Daman Airport : Military Airbase', 'NMB', 29, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(27, 'Daporijo Airport', 'DAE', 3, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(28, 'Indira Gandhi International Airport', 'DEL', 25, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(29, 'Dhanbad Airport', 'DBD', 34, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(30, 'Kangra Airport', 'DHM', 7, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(31, 'Dibrugarh Airport', 'DIB', 2, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(32, 'Dimapur Airport', 'DMU', 16, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(33, 'Diu Airport', 'DIU', 29, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(34, 'Gaya Airport / Bodhgaya Airport', 'GAY', 4, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(35, 'Goa International Airport / Dabolim Airport', 'GOI', 26, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(36, 'Gorakhpur Airport', 'GOP', 23, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(37, 'Guna Airport', 'GUX', 11, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(38, 'Lokpriya Gopinath Bordoloi International Airport', 'GAU', 2, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(39, 'Gwalior Airport', 'GWL', 11, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(40, 'Hissar Airport', 'HSS', 6, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(41, 'Hubli Airport / Hubballi Airport', 'HBX', 9, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(42, 'Begumpet Airport', 'BPM', 1, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(43, 'Devi Ahilya Bai Holkar Airport', 'IDR', 11, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(44, 'Jabalpur Airport / Dumna Airport', 'JLR', 11, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(45, 'Jagdalpur Airport', 'JGB', 35, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(46, 'Jaipur International Airport', 'JAI', 19, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(47, 'Jaislamer Airport', 'JSA', 19, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(48, 'Jammu Airport', 'IXJ', 8, 0, '2023-03-15 10:35:26', 0, '2023-03-15 10:35:26'),
(49, 'Jamnagar Airport', 'JGA', 5, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(50, 'Sonari Airport', 'IXW', 34, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(51, 'Jeypore Airport', 'PYB', 17, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(52, 'Jodhpur Airport', 'JDH', 19, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(53, 'Rowriah Airport / Jorhat Airport', 'JRH', 2, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(54, 'Kailashahar Airport', 'IXH', 22, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(55, 'Shirdi International Airport', 'SAG', 12, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(56, 'Kamalpur Airport', 'IXQ', 22, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(57, 'Kandla Airport', 'IXY', 5, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(58, 'Kannur International Airport', 'CNN', 10, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(59, 'Kanpur Airport', 'KNU', 23, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(60, 'Keshod Airport', 'IXK', 5, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(61, 'Khajuraho Airport', 'HJR', 11, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(62, 'Khowai Airport', 'IXN', 22, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(63, 'Kolhapur Airport / Chhatrapati Rajaram Maharaj Airport', 'KLH', 12, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(64, 'Netaji Subhash Chandra Bose International Airport', 'CCU', 24, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(65, 'Kota Airport', 'KTU', 19, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(66, 'Kozhikode / Calicut International Airport', 'CCJ', 10, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(67, 'Leh Airport / Kushok Bakula Rimpochee Airport', 'IXL', 8, 0, '2023-03-15 10:35:27', 0, '2023-03-15 10:35:27'),
(76, 'aa', 'AAA', 1, 0, '2023-03-20 02:45:47', 0, '2023-03-20 02:45:47'),
(77, 'aaa', 'AAA', 1, 0, '2023-03-20 02:46:27', 0, '2023-03-20 02:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `pay_id` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(100) NOT NULL,
  `fly_id` int(100) NOT NULL,
  `u_id` int(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(100) NOT NULL,
  `class` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

CREATE TABLE `fare` (
  `id` int(100) NOT NULL,
  `fly_id` int(100) NOT NULL,
  `economy_rate` int(100) NOT NULL,
  `business_rate` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fare`
--

INSERT INTO `fare` (`id`, `fly_id`, `economy_rate`, `business_rate`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 2, 2000, 3000, 0, '2023-03-17 12:33:11', 0, '2023-03-17 12:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(100) NOT NULL,
  `airline_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_seat` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `airline_id`, `name`, `total_seat`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 7, 'amal', 25, 0, '2023-03-17 11:57:58', 0, '2023-03-17 11:57:58'),
(2, 7, 'amal airways', 30, 0, '2023-03-17 12:07:50', 0, '2023-03-17 12:07:50'),
(3, 3, 'boing', 200, 0, '2023-03-19 17:40:53', 0, '2023-03-19 17:40:53'),
(4, 4, 'rigar-8', 100, 0, '2023-03-19 17:41:13', 0, '2023-03-19 17:41:13'),
(5, 5, 'Jet-3', 30, 0, '2023-03-19 17:41:29', 0, '2023-03-19 17:41:29'),
(6, 3, 'dumbledore', 0, 0, '2023-03-20 02:54:49', 0, '2023-03-20 02:54:49'),
(7, 3, 'Severeus', 0, 0, '2023-03-20 02:58:00', 0, '2023-03-20 02:58:00'),
(8, 3, 'nissan', 100, 0, '2023-03-20 02:59:56', 0, '2023-03-20 02:59:56'),
(9, 9, 'bbflight', 200, 0, '2023-03-21 04:22:22', 0, '2023-03-21 04:22:22'),
(10, 3, 'fhnd', 23, 0, '2023-03-21 04:35:30', 0, '2023-03-21 04:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `fly`
--

CREATE TABLE `fly` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `d_airport_id` int(11) NOT NULL,
  `a_airport_id` int(11) NOT NULL,
  `d_date` date NOT NULL,
  `a_date` date NOT NULL,
  `d_time` time NOT NULL,
  `a_time` time NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `b_seat` int(11) NOT NULL,
  `b_fare` int(11) NOT NULL,
  `e_seat` int(11) NOT NULL,
  `e_fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fly`
--

INSERT INTO `fly` (`id`, `flight_id`, `d_airport_id`, `a_airport_id`, `d_date`, `a_date`, `d_time`, `a_time`, `created_by`, `created_at`, `updated_by`, `updated_at`, `b_seat`, `b_fare`, `e_seat`, `e_fare`) VALUES
(1, 1, 22, 22, '2023-03-01', '2023-03-01', '05:00:00', '10:00:00', 0, '2023-03-17 11:59:45', 0, '2023-03-17 11:59:45', 0, 0, 0, 0),
(2, 2, 22, 21, '2023-03-17', '2023-03-18', '27:32:28', '27:38:22', 0, '2023-03-17 12:10:42', 0, '2023-03-17 12:10:42', 9, 5000, 22, 1000),
(3, 2, 3, 4, '2023-03-19', '2023-03-19', '19:18:02', '26:18:02', 0, '2023-03-19 08:49:15', 0, '2023-03-19 08:49:15', 20, 5000, 30, 2000),
(4, 3, 13, 19, '2023-03-19', '2023-03-19', '00:12:00', '03:12:00', 0, '2023-03-19 17:42:08', 0, '2023-03-19 17:42:08', -24, 5000, -8, 6000),
(5, 4, 13, 19, '2023-03-19', '2023-03-19', '00:13:00', '02:13:00', 0, '2023-03-19 17:43:11', 0, '2023-03-19 17:43:11', 0, 2000, 0, 3000),
(6, 5, 13, 19, '2023-03-19', '2023-03-19', '01:13:00', '02:13:00', 0, '2023-03-19 17:43:39', 0, '2023-03-19 17:43:39', 0, 0, 0, 0),
(7, 9, 18, 20, '2023-03-23', '2023-03-24', '10:52:00', '11:52:00', 0, '2023-03-21 04:23:02', 0, '2023-03-21 04:23:02', 20, 5000, 50, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fly_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `book_id` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `fly_id`, `u_id`, `class`, `book_id`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'akshaya', 2, 3, 'business', 0, 1, 0, '2023-03-19 06:41:00', 0, '2023-03-19 06:41:00'),
(2, 'amal', 2, 3, 'economy', 0, 1, 0, '2023-03-19 06:41:00', 0, '2023-03-19 06:41:00'),
(3, '', 2, 3, 'business', 0, 1, 0, '2023-03-19 10:55:34', 0, '2023-03-19 10:55:34'),
(4, 'akshaya', 2, 3, 'business', 0, 1, 0, '2023-03-19 10:56:22', 0, '2023-03-19 10:56:22'),
(5, 'akshaya', 2, 3, 'business', 0, 1, 0, '2023-03-19 10:59:53', 0, '2023-03-19 10:59:53'),
(6, 'akshaya', 2, 3, 'business', 0, 1, 0, '2023-03-19 11:06:31', 0, '2023-03-19 11:06:31'),
(7, 'amal', 2, 3, 'economy', 0, 1, 0, '2023-03-19 11:06:32', 0, '2023-03-19 11:06:32'),
(8, 'akshaya', 2, 3, 'business', 0, 1, 0, '2023-03-19 11:49:05', 0, '2023-03-19 11:49:05'),
(9, 'amal', 2, 3, 'economy', 0, 1, 0, '2023-03-19 11:49:05', 0, '2023-03-19 11:49:05'),
(10, 'bismi', 2, 3, 'economy', 0, 1, 0, '2023-03-19 11:49:05', 0, '2023-03-19 11:49:05'),
(11, 'akshaya', 2, 6, 'economy', 0, 1, 0, '2023-03-19 12:15:46', 0, '2023-03-19 12:15:46'),
(12, 'amal', 2, 6, 'economy', 0, 1, 0, '2023-03-19 12:15:46', 0, '2023-03-19 12:15:46'),
(13, 'anjali', 2, 3, 'business', 0, 1, 0, '2023-03-19 15:10:19', 0, '2023-03-19 15:10:19'),
(14, 'silpa', 2, 3, 'business', 0, 1, 0, '2023-03-19 15:10:19', 0, '2023-03-19 15:10:19'),
(15, 'anseena', 2, 3, 'economy', 0, 1, 0, '2023-03-19 15:10:19', 0, '2023-03-19 15:10:19'),
(16, 'amrutha', 2, 3, 'business', 0, 1, 0, '2023-03-19 15:56:34', 0, '2023-03-19 15:56:34'),
(17, 'anjali', 2, 3, 'economy', 0, 1, 0, '2023-03-19 16:46:36', 0, '2023-03-19 16:46:36'),
(18, 'anjali', 2, 3, 'business', 0, 1, 0, '2023-03-19 16:55:41', 0, '2023-03-19 16:55:41'),
(19, 'amrutha', 2, 2, 'business', 0, 1, 0, '2023-03-19 17:31:08', 0, '2023-03-19 17:31:08'),
(20, 'amrutha', 4, 2, 'business', 0, 1, 0, '2023-03-19 17:53:20', 0, '2023-03-19 17:53:20'),
(21, 'amrutha', 4, 2, 'business', 0, 1, 0, '2023-03-19 17:55:02', 0, '2023-03-19 17:55:02'),
(22, 'amrutha', 4, 3, 'business', 0, 1, 0, '2023-03-20 04:02:29', 0, '2023-03-20 04:02:29'),
(23, 'anjali', 4, 3, 'business', 0, 1, 0, '2023-03-20 04:13:18', 0, '2023-03-20 04:13:18'),
(24, 'amrutha', 4, 7, 'business', 0, 1, 0, '2023-03-20 04:32:40', 0, '2023-03-20 04:32:40'),
(25, 'anu', 4, 8, 'economy', 0, 1, 0, '2023-03-20 04:39:21', 0, '2023-03-20 04:39:21'),
(26, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-20 06:27:13', 0, '2023-03-20 06:27:13'),
(27, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-20 08:25:20', 0, '2023-03-20 08:25:20'),
(28, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-20 15:22:38', 0, '2023-03-20 15:22:38'),
(29, 'silpa', 4, 3, 'economy', 0, 1, 0, '2023-03-20 15:22:38', 0, '2023-03-20 15:22:38'),
(30, 'jithin', 4, 2, 'business', 0, 1, 0, '2023-03-20 15:26:26', 0, '2023-03-20 15:26:26'),
(31, 'riya', 4, 2, 'business', 0, 1, 0, '2023-03-20 15:26:26', 0, '2023-03-20 15:26:26'),
(32, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-20 17:45:44', 0, '2023-03-20 17:45:44'),
(33, 'silpa', 4, 3, 'business', 0, 1, 0, '2023-03-20 17:45:45', 0, '2023-03-20 17:45:45'),
(34, 'anseena', 4, 3, 'business', 0, 1, 0, '2023-03-20 17:45:45', 0, '2023-03-20 17:45:45'),
(35, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-20 18:05:51', 0, '2023-03-20 18:05:51'),
(36, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-20 18:32:39', 0, '2023-03-20 18:32:39'),
(37, 'jithin', 4, 3, 'economy', 0, 1, 0, '2023-03-21 05:38:53', 0, '2023-03-21 05:38:53'),
(38, 'anjali', 4, 3, 'business', 0, 1, 0, '2023-03-21 05:43:04', 0, '2023-03-21 05:43:04'),
(39, 'amrutha', 4, 1, 'business', 0, 1, 0, '2023-03-21 06:16:46', 0, '2023-03-21 06:16:46'),
(40, 'amrutha', 4, 1, 'business', 0, 1, 0, '2023-03-21 06:23:22', 0, '2023-03-21 06:23:22'),
(41, 'silpa', 4, 1, 'economy', 0, 1, 0, '2023-03-21 06:23:22', 0, '2023-03-21 06:23:22'),
(42, '', 4, 3, 'business', 0, 1, 0, '2023-03-21 11:35:14', 0, '2023-03-21 11:35:14'),
(43, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-21 11:36:41', 0, '2023-03-21 11:36:41'),
(44, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-21 11:38:14', 0, '2023-03-21 11:38:14'),
(45, 'silpa', 4, 3, 'economy', 0, 1, 0, '2023-03-21 11:38:14', 0, '2023-03-21 11:38:14'),
(46, 'anu', 4, 3, 'business', 0, 1, 0, '2023-03-21 11:52:22', 0, '2023-03-21 11:52:22'),
(47, 'silpa', 4, 3, 'economy', 0, 1, 0, '2023-03-21 11:52:22', 0, '2023-03-21 11:52:22'),
(48, 'anu', 4, 1, 'economy', 0, 1, 0, '2023-03-22 18:08:48', 0, '2023-03-22 18:08:48'),
(49, 'silpa', 4, 1, 'business', 0, 1, 0, '2023-03-22 18:08:48', 0, '2023-03-22 18:08:48'),
(50, 'anu', 4, 1, 'economy', 0, 1, 0, '2023-03-22 18:10:12', 0, '2023-03-22 18:10:12'),
(51, 'silpa', 4, 1, 'business', 0, 1, 0, '2023-03-22 18:10:12', 0, '2023-03-22 18:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `price`, `status`) VALUES
(1, 3, 5000, 1),
(2, 3, 5000, 1),
(3, 8, 6000, 1),
(4, 3, 11000, 1),
(5, 2, 10000, 1),
(6, 3, 15000, 1),
(7, 3, 5000, 1),
(8, 3, 5000, 1),
(9, 3, 5000, 1),
(10, 3, 5000, 1),
(11, 3, 6000, 1),
(12, 3, 6000, 1),
(13, 3, 5000, 1),
(14, 3, 5000, 1),
(15, 1, 5000, 1),
(16, 1, 11000, 1),
(17, 1, 11000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status_id` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `phone`, `photo`, `status_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `token`) VALUES
(1, 'Bismi John', 'bismithampi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '7592992285', '', 2, 0, '2023-03-15 09:02:13', 0, '2023-03-15 09:02:13', '14754595bd08003c6a2331c303a5b1d8bfbea8080b7eeed559a9102995d8b612'),
(2, 'Athira.M', 'athira@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9954355256', '', 2, 0, '2023-03-15 09:02:13', 0, '2023-03-15 09:02:13', ''),
(3, 'revu', 'revu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '8075600470', '', 2, 0, '2023-03-18 09:40:45', 0, '2023-03-18 09:40:45', ''),
(4, 'amal', 'amal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '7510300939', '', 2, 0, '2023-03-18 11:14:10', 0, '2023-03-18 11:14:10', ''),
(5, 'akshaya', 'akshayagopal1@gmail.com', '202cb962ac59075b964b07152d234b70', '8075600470', '', 2, 0, '2023-03-18 12:19:44', 0, '2023-03-18 12:19:44', 'f9aebb458299ecfa667a983d9f47a2b2fe36cb6fba13e31eb3b6c541c31894bc'),
(6, 'amal', 'amalanilmkm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '7510300939', '', 2, 0, '2023-03-19 12:14:42', 0, '2023-03-19 12:14:42', ''),
(7, 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '', '', 1, 0, '2023-03-19 15:17:21', 0, '2023-03-19 15:17:21', ''),
(8, 'ANJALI KUMARI', 'anjalisoman97.as@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9892992285', '', 2, 0, '2023-03-20 04:28:55', 0, '2023-03-20 04:28:55', '292178cca748849444be0efe5aebcbfd7c73014c8fcaa369694c60edd89eda9c');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(100) NOT NULL,
  `seat_type_id` int(100) NOT NULL,
  `rate` int(100) NOT NULL,
  `seat_no` int(100) NOT NULL,
  `fly_id` int(100) NOT NULL,
  `class_id` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat_type`
--

CREATE TABLE `seat_type` (
  `id` int(100) NOT NULL,
  `seat_type` varchar(255) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(100) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'ANDHRA PRADESH', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(2, 'ASSAM', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(3, 'ARUNACHAL PRADESH', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(4, 'BIHAR', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(5, 'GUJRAT', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(6, 'HARYANA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(7, 'HIMACHAL PRADESH', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(8, 'JAMMU & KASHMIR', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(9, 'KARNATAKA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(10, 'KERALA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(11, 'MADHYA PRADESH', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(12, 'MAHARASHTRA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(13, 'MANIPUR', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(14, 'MEGHALAYA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(15, 'MIZORAM', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(16, 'NAGALAND', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(17, 'ORISSA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(18, 'PUNJAB', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(19, 'RAJASTHAN', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(20, 'SIKKIM', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(21, 'TAMIL NADU', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(22, 'TRIPURA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(23, 'UTTAR PRADESH', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(24, 'WEST BENGAL', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(25, 'DELHI', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(26, 'GOA', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(27, 'PONDICHERY', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(28, 'LAKSHDWEEP', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(29, 'DAMAN & DIU', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(30, 'DADRA & NAGAR', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(31, 'CHANDIGARH', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(32, 'ANDAMAN & NICOBAR', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(33, 'UTTARANCHAL', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(34, 'JHARKHAND', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07'),
(35, 'CHATTISGARH', 0, '2023-03-15 09:07:07', 0, '2023-03-15 09:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `fly_id` int(100) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'admin', 0, '2023-03-15 09:08:49', 0, '2023-03-15 09:08:49'),
(2, 'user', 0, '2023-03-15 09:08:49', 0, '2023-03-15 09:08:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `pay_id` (`pay_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fly_id` (`fly_id`),
  ADD KEY `r_id` (`u_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fare`
--
ALTER TABLE `fare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fly_id` (`fly_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airline_id` (`airline_id`);

--
-- Indexes for table `fly`
--
ALTER TABLE `fly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `d_airport_id` (`d_airport_id`),
  ADD KEY `a_airport_id` (`a_airport_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fly_id` (`fly_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seat_type_id` (`seat_type_id`),
  ADD KEY `fly_id` (`fly_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `seat_type`
--
ALTER TABLE `seat_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `fly_id` (`fly_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airline`
--
ALTER TABLE `airline`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fare`
--
ALTER TABLE `fare`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fly`
--
ALTER TABLE `fly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_type`
--
ALTER TABLE `seat_type`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airport`
--
ALTER TABLE `airport`
  ADD CONSTRAINT `airport_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`pay_id`) REFERENCES `payment` (`id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`fly_id`) REFERENCES `fly` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `registration` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `registration` (`id`);

--
-- Constraints for table `fare`
--
ALTER TABLE `fare`
  ADD CONSTRAINT `fare_ibfk_1` FOREIGN KEY (`fly_id`) REFERENCES `fly` (`id`);

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`airline_id`) REFERENCES `airline` (`id`);

--
-- Constraints for table `fly`
--
ALTER TABLE `fly`
  ADD CONSTRAINT `fly_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`),
  ADD CONSTRAINT `fly_ibfk_2` FOREIGN KEY (`d_airport_id`) REFERENCES `airport` (`id`),
  ADD CONSTRAINT `fly_ibfk_3` FOREIGN KEY (`a_airport_id`) REFERENCES `airport` (`id`);

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `passenger_ibfk_1` FOREIGN KEY (`fly_id`) REFERENCES `fly` (`id`),
  ADD CONSTRAINT `passenger_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `registration` (`id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`seat_type_id`) REFERENCES `seat_type` (`id`),
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`fly_id`) REFERENCES `fly` (`id`),
  ADD CONSTRAINT `seat_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `passenger` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`fly_id`) REFERENCES `fly` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
