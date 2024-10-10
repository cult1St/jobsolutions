-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 05:15 PM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(150) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  `dateLastLoggedIn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `dateLastLoggedIn`) VALUES
(1, 'momoduwealth2@gmail.com', '$2y$10$kNO6YtqrX8Ugez4lENBDCOzKnQ4qXPk53Rp9gIaqvginoOp3jg.nu', '2024-06-13 17:07:26'),
(2, 'momoduwealth@gmail.com', '$2y$10$ZArRFBNaTX/o//QetJuoKuh3YYllwMpUQLS5HCEj08My7mrL87hzW', '2024-05-22 11:32:39'),
(3, 'wealth@gmail.com', '$2y$10$vAh3nrpGkgnPWeATRGvxauvR7ttf6nnJ0E7YKvG7r8vHJiwAuOPlq', '2024-05-22 11:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `employer_id` int(11) NOT NULL,
  `employer_fullName` varchar(100) NOT NULL,
  `employer_email` varchar(100) NOT NULL,
  `employer_password` varchar(300) NOT NULL,
  `employer_companyName` varchar(100) NOT NULL,
  `employer_stateId` int(11) NOT NULL,
  `employer_companyLogo` varchar(200) DEFAULT NULL,
  `dateRegistered` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`employer_id`, `employer_fullName`, `employer_email`, `employer_password`, `employer_companyName`, `employer_stateId`, `employer_companyLogo`, `dateRegistered`, `status`) VALUES
(3, 'Momodu ', 'momoduwealth@gmail.com', '$2y$10$KIleo5pgBmymeklfCljF3ebmqpyl6Wa.akaqW6xuppwFndfeVQCxq', 'Wealth Partners', 12, '1714985384783634158.png', '2024-04-27 20:55:00', '1'),
(9, 'Chimdi ', 'chimdi@gmail.com', '$2y$10$r9fPsQJ6gKuqgwQXqgW8OOJFnt86zBDDEbnloeo0GgLdAV.3hihyq', 'Crypto Investors', 24, '1715459452303369036.jpeg', '2024-05-11 20:07:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employerspecialization`
--

CREATE TABLE `employerspecialization` (
  `empSpecialization_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `employers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_application`
--

CREATE TABLE `jobseeker_application` (
  `application_id` int(11) NOT NULL,
  `application_jobVacancy_id` int(11) NOT NULL,
  `application_jobSeeker_id` int(11) NOT NULL,
  `date_applied` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_CV` varchar(300) NOT NULL,
  `application_status` enum('2','1','0') NOT NULL DEFAULT '0',
  `application_rating` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jobseeker_application`
--

INSERT INTO `jobseeker_application` (`application_id`, `application_jobVacancy_id`, `application_jobSeeker_id`, `date_applied`, `application_CV`, `application_status`, `application_rating`) VALUES
(2, 5, 21, '2024-05-06 14:03:02', '17150041822141100893.pdf', '1', 0),
(3, 4, 21, '2024-05-07 19:56:36', '17151117961728617446.pdf', '1', 1),
(4, 8, 21, '2024-05-12 00:17:43', '17154730631069509558.pdf', '1', 0),
(5, 8, 19, '2024-05-12 00:21:55', '17154733151656612839.docx', '2', 0),
(6, 5, 22, '2024-05-12 00:41:55', '1715474515325226744.pdf', '0', 0),
(7, 9, 28, '2024-05-17 21:09:10', '1715980150238824630.pdf', '2', 0),
(8, 7, 21, '2024-05-21 14:55:15', '17163033151990062670.pdf', '1', 0),
(9, 7, 19, '2024-05-22 09:09:03', '17163689431541960136.pdf', '2', 0),
(12, 10, 28, '2024-06-16 12:19:47', '1718540387758648851.pdf', '2', 0),
(13, 11, 28, '2024-06-16 12:25:37', '17185407371932309662.pdf', '2', 1),
(14, 11, 19, '2024-06-16 12:41:42', '17185417021522940845.pdf', '2', 2),
(15, 12, 28, '2024-07-17 09:18:29', '1721207909426031024.pdf', '2', 0),
(16, 12, 19, '2024-07-19 21:14:45', '17214236851938800112.pdf', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `jobCat_id` int(11) NOT NULL,
  `jobCat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`jobCat_id`, `jobCat_name`) VALUES
(1, 'Accounting, Auditing & Finance'),
(2, 'Admin & Office'),
(3, 'Creative & Design'),
(4, 'Building & Architecture'),
(5, 'Consulting & Strategy'),
(6, 'Customer Service & Support'),
(7, 'Engineering & Technology'),
(8, 'Farming & Agriculture'),
(9, 'Food Services & Catering'),
(10, 'Hospitality & Leisure'),
(11, 'Software & Data'),
(12, 'Legal Services'),
(13, 'Marketing & Communications'),
(14, 'Medical & Pharmaceutical'),
(15, 'Product & Project Management'),
(16, 'Estate Agents & Property Management'),
(17, 'Quality Control & Assurance'),
(18, 'Human Resources'),
(19, 'Management & Business Development'),
(20, 'Community & Social Services'),
(21, 'Sales'),
(22, 'Supply Chain & Procurement'),
(23, 'Research, Teaching & Training'),
(24, 'Trades & Services'),
(25, 'Driver & Transport Services'),
(26, 'Health & Safety');

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `jobSeeker_id` int(11) NOT NULL,
  `jobSeeker_firstName` varchar(100) NOT NULL,
  `jobSeeker_lastName` varchar(100) NOT NULL,
  `jobSeeker_email` varchar(100) NOT NULL,
  `jobSeeker_password` varchar(300) NOT NULL,
  `jobSeeker_CV` varchar(150) NOT NULL,
  `jobseeker_DOB` date NOT NULL,
  `jobSeeker_phone` varchar(11) NOT NULL,
  `jobSeeker_gender` enum('male','female') NOT NULL,
  `jobSeeker_Address` varchar(100) NOT NULL,
  `jobSeeker_State_id` int(11) DEFAULT NULL,
  `jobSeeker_qualification` varchar(50) NOT NULL,
  `jobSeeker_experience` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`jobSeeker_id`, `jobSeeker_firstName`, `jobSeeker_lastName`, `jobSeeker_email`, `jobSeeker_password`, `jobSeeker_CV`, `jobseeker_DOB`, `jobSeeker_phone`, `jobSeeker_gender`, `jobSeeker_Address`, `jobSeeker_State_id`, `jobSeeker_qualification`, `jobSeeker_experience`) VALUES
(19, 'Malik', 'lolade', 'malik@gmail.com', '$2y$10$wr.fuiBTwPdB.4XiU8Pt7u4wcI93ogcEwCSez35Q4AxhME9L1Ug36', '', '1965-04-06', '08098765443', 'male', '', 5, '', ''),
(21, 'Momodu', 'Wealth', 'momoduwealth@gmail.com', '$2y$10$SweKjIv2YLCGROqAV.bFrO.RhZUAaztAx4aMt.g/D9jyef.uazhaC', '1716495567643316217.pdf', '2007-09-02', '09053334084', 'male', 'Km 10 Ikotun Idimu Road', 12, 'bsc', '2'),
(22, 'Momodu', 'Wealth', 'momoduwealth5@gmail.com', '$2y$10$OQ12IPLh7abXAx46NJCY6.rwJGKJy21to6PC5Akscgzp4FNcP7OBu', '', '1971-08-15', '09053334080', 'male', '', 13, '', ''),
(23, 'Amos', 'Roland', 'amos@gmail.com', '$2y$10$mRYzBVnPdX3ZEG9eKjrtLuQDTbsrg05pX/e3Sata8h4nyEDF58qPa', '', '1976-12-18', '09123456799', 'male', '', 19, '', ''),
(24, 'Bart', 'Simpson', 'bart@gmail.com', '$2y$10$t/VLOkTdkG0m2YyBtWQpv.oPA6sGKmmEctuwVBrdnsYlyzHafFxDC', '', '2007-08-20', '09049962037', 'male', '', 13, '', ''),
(27, 'Michael', 'Martins', 'martins@gmail.com', '$2y$10$7akXZtbCftJd7Va0i9Gi7OIfuFUHUXIuQqtOK5pWQbARJZLthQpSK', '', '1973-05-18', '07064513212', 'female', '', 13, '', ''),
(28, 'Momodu', 'Wealth', 'momoduwealth2@gmail.com', '$2y$10$GLTIB9wbndMDQ63aAfhuDu8ZYgV7EswMa2VpYqsaircVNtG6MVpXu', '', '2006-05-13', '09098789876', 'male', '', 24, '', ''),
(30, 'Momodu', 'Wealth', 'momoduwealth7@gmail.com', '$2y$10$6ZeoTw.Thu900xdKreQXK.Aesfzc0lXDixfQT/IfTMiAHjCeorsx6', '', '2004-03-02', '09078177519', 'male', '', 24, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `jobVacancy_id` int(11) NOT NULL,
  `jobVacancy_title` varchar(200) NOT NULL,
  `qualification` varchar(300) NOT NULL,
  `jobVacancy_employerId` int(11) NOT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateClosed` date NOT NULL,
  `vacancy_description` longtext NOT NULL,
  `vacancy_salaryRange` varchar(100) NOT NULL,
  `jobCat_id` int(11) NOT NULL,
  `work_type` varchar(300) NOT NULL,
  `states_id` int(100) DEFAULT NULL,
  `lga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`jobVacancy_id`, `jobVacancy_title`, `qualification`, `jobVacancy_employerId`, `datePosted`, `dateClosed`, `vacancy_description`, `vacancy_salaryRange`, `jobCat_id`, `work_type`, `states_id`, `lga`) VALUES
(8, 'python developer', 'Bsc Computer Science', 9, '2024-05-11 20:29:56', '2024-05-14', 'should have a good knowledge of software development. python and flask framework good usage', '1000000-200000', 11, 'Part Time', 23, 491),
(9, 'php developer', 'Bsc Computer Science', 3, '2024-05-17 21:00:04', '2024-05-21', 'developing web applications php developers use php, html, css, and other programming languages and frameworks to develop web-based applications according to client specifications.\r\ntesting and debugging\r\nmaintaining applications\r\ncollaborating with team members\r\ncode optimization', '150000-250000', 11, 'Full Time', 24, 516),
(10, 'lawyer and attorney', 'Bsc Law', 3, '2024-06-15 14:47:38', '2024-06-30', 'a good attorney with good experience is needed at this prestigious company', '100000-200000', 12, 'Full Time', 24, 513),
(11, 'php developer', 'Bsc Computer Science', 3, '2024-06-16 12:23:55', '2024-06-23', 'a good software developer with good debugging skills', '1000000-250000', 11, 'Full Time', 37, 779),
(12, 'sales manager', 'Bsc Accounting', 3, '2024-07-17 09:10:15', '2024-07-21', 'a good sales person with good skills', '100000-150000', 21, 'Full Time', 12, 239);

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `lga_id` int(11) NOT NULL,
  `lga_name` varchar(60) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`lga_id`, `lga_name`, `state_id`) VALUES
(1, 'Aba North', 1),
(2, 'Aba South', 1),
(3, 'Arochukwu', 1),
(4, 'Bende', 1),
(5, 'Ikwuano', 1),
(6, 'Isiala-Ngwa North', 1),
(7, 'Isiala-Ngwa South', 1),
(8, 'Isikwuato', 1),
(9, 'Nneochi', 1),
(10, 'Obi-Ngwa', 1),
(11, 'Ohafia', 1),
(12, 'Osisioma', 1),
(13, 'Ugwunagbo', 1),
(14, 'Ukwa East', 1),
(15, 'Ukwa West', 1),
(16, 'Umuahia North', 1),
(17, 'Umuahia South', 1),
(18, 'Demsa', 2),
(19, 'Fufore', 2),
(20, 'Genye', 2),
(21, 'Girei', 2),
(22, 'Gombi', 2),
(23, 'guyuk', 2),
(24, 'Hong', 2),
(25, 'Jada', 2),
(26, 'Jimeta', 2),
(27, 'Lamurde', 2),
(28, 'Madagali', 2),
(29, 'Maiha', 2),
(30, 'Mayo Belwa', 2),
(31, 'Michika', 2),
(32, 'Mubi North', 2),
(33, 'Mubi South', 2),
(34, 'Numan', 2),
(35, 'Shelleng', 2),
(36, 'Song', 2),
(37, 'Toungo', 2),
(38, 'Yola', 2),
(39, 'Abak', 3),
(40, 'Eastern-Obolo', 3),
(41, 'Eket', 3),
(42, 'Ekpe-Atani', 3),
(43, 'Essien-Udim', 3),
(44, 'Esit Ekit', 3),
(45, 'Etim-Ekpo', 3),
(46, 'Etinam', 3),
(47, 'Ibeno', 3),
(48, 'Ibesikp-Asitan', 3),
(49, 'Ibiono-Ibom', 3),
(50, 'Ika', 3),
(51, 'Ikono', 3),
(52, 'Ikot-Abasi', 3),
(53, 'Ikot-Ekpene', 3),
(54, 'Ini', 3),
(55, 'Itu', 3),
(56, 'Mbo', 3),
(57, 'Mkpae-Enin', 3),
(58, 'Nsit-Ibom', 3),
(59, 'Nsit-Ubium', 3),
(60, 'Obot-Akara', 3),
(61, 'Okobo', 3),
(62, 'Onna', 3),
(63, 'Oron', 3),
(64, 'Oro-Anam', 3),
(65, 'Udung-Uko', 3),
(66, 'Ukanefun', 3),
(67, 'Uru Offong Oruko', 3),
(68, 'Uruan', 3),
(69, 'Uquo Ibene', 3),
(70, 'Uyo', 3),
(71, 'Aguata', 4),
(72, 'Anambra', 4),
(73, 'Anambra West', 4),
(74, 'Anocha', 4),
(75, 'Awka- North', 4),
(76, 'Awka-South', 4),
(77, 'Ayamelum', 4),
(78, 'Dunukofia', 4),
(79, 'Ekwusigo', 4),
(80, 'Idemili-North', 4),
(81, 'Idemili-South', 4),
(82, 'Ihiala', 4),
(83, 'Njikoka', 4),
(84, 'Nnewi-North', 4),
(85, 'Nnewi-South', 4),
(86, 'Ogbaru', 4),
(87, 'Onisha North', 4),
(88, 'Onitsha South', 4),
(89, 'Orumba North', 4),
(90, 'Orumba South', 4),
(91, 'Oyi', 4),
(92, 'Alkaleri', 5),
(93, 'Bauchi', 5),
(94, 'Bogoro', 5),
(95, 'Damban', 5),
(96, 'Darazo', 5),
(97, 'Dass', 5),
(98, 'Gamawa', 5),
(99, 'Ganjuwa', 5),
(100, 'Giade', 5),
(101, 'Itas/Gadau', 5),
(102, 'Jama\'are', 5),
(103, 'Katagum', 5),
(104, 'Kirfi', 5),
(105, 'Misau', 5),
(106, 'Ningi', 5),
(107, 'Shira', 5),
(108, 'Tafawa-Balewa', 5),
(109, 'Toro', 5),
(110, 'Warji', 5),
(111, 'Zaki', 5),
(112, 'Brass', 6),
(113, 'Ekerernor', 6),
(114, 'Kolokuma/Opokuma', 6),
(115, 'Nembe', 6),
(116, 'Ogbia', 6),
(117, 'Sagbama', 6),
(118, 'Southern-Ijaw', 6),
(119, 'Yenegoa', 6),
(120, 'Kembe', 6),
(121, 'Ado', 7),
(122, 'Agatu', 7),
(123, 'Apa', 7),
(124, 'Buruku', 7),
(125, 'Gboko', 7),
(126, 'Guma', 7),
(127, 'Gwer-East', 7),
(128, 'Gwer-West', 7),
(129, 'Katsina-Ala', 7),
(130, 'Konshisha', 7),
(131, 'Kwande', 7),
(132, 'Logo', 7),
(133, 'Makurdi', 7),
(134, 'Obi', 7),
(135, 'Ogbadibo', 7),
(136, 'Ohimini', 7),
(137, 'Oju', 7),
(138, 'Okpokwu', 7),
(139, 'Otukpo', 7),
(140, 'Tarkar', 7),
(141, 'Vandeikya', 7),
(142, 'Ukum', 7),
(143, 'Ushongo', 7),
(144, 'Abadan', 8),
(145, 'Askira-Uba', 8),
(146, 'Bama', 8),
(147, 'Bayo', 8),
(148, 'Biu', 8),
(149, 'Chibok', 8),
(150, 'Damboa', 8),
(151, 'Dikwa', 8),
(152, 'Gubio', 8),
(153, 'Guzamala', 8),
(154, 'Gwoza', 8),
(155, 'Hawul', 8),
(156, 'Jere', 8),
(157, 'Kaga', 8),
(158, 'Kala/Balge', 8),
(159, 'Kukawa', 8),
(160, 'Konduga', 8),
(161, 'Kwaya-Kusar', 8),
(162, 'Mafa', 8),
(163, 'Magumeri', 8),
(164, 'Maiduguri', 8),
(165, 'Marte', 8),
(166, 'Mobbar', 8),
(167, 'Monguno', 8),
(168, 'Ngala', 8),
(169, 'Nganzai', 8),
(170, 'Shani', 8),
(171, 'Abi', 9),
(172, 'Akamkpa', 9),
(173, 'Akpabuyo', 9),
(174, 'Bakassi', 9),
(175, 'Bekwara', 9),
(176, 'Biasi', 9),
(177, 'Boki', 9),
(178, 'Calabar-Municipal', 9),
(179, 'Calabar-South', 9),
(180, 'Etunk', 9),
(181, 'Ikom', 9),
(182, 'Obantiku', 9),
(183, 'Ogoja', 9),
(184, 'Ugep North', 9),
(185, 'Yakurr', 9),
(186, 'Yala', 9),
(187, 'Aniocha North', 10),
(188, 'Aniocha South', 10),
(189, 'Bomadi', 10),
(190, 'Burutu', 10),
(191, 'Ethiope East', 10),
(192, 'Ethiope West', 10),
(193, 'Ika North East', 10),
(194, 'Ika South', 10),
(195, 'Isoko North', 10),
(196, 'Isoko South', 10),
(197, 'Ndokwa East', 10),
(198, 'Ndokwa West', 10),
(199, 'Okpe', 10),
(200, 'Oshimili North', 10),
(201, 'Oshimili South', 10),
(202, 'Patani', 10),
(203, 'Sapele', 10),
(204, 'Udu', 10),
(205, 'Ughilli North', 10),
(206, 'Ughilli South', 10),
(207, 'Ukwuani', 10),
(208, 'Uvwie', 10),
(209, 'Warri Central', 10),
(210, 'Warri North', 10),
(211, 'Warri South', 10),
(212, 'Abakaliki', 11),
(213, 'Ofikpo North', 11),
(214, 'Ofikpo South', 11),
(215, 'Ebonyi', 11),
(216, 'Ezza North', 11),
(217, 'Ezza South', 11),
(218, 'ikwo', 11),
(219, 'Ishielu', 11),
(220, 'Ivo', 11),
(221, 'Izzi', 11),
(222, 'Ohaukwu', 11),
(223, 'Ohaozara', 11),
(224, 'Onicha', 11),
(225, 'Akoko Edo', 12),
(226, 'Egor', 12),
(227, 'Esan Central', 12),
(228, 'Esan North East', 12),
(229, 'Esan South East', 12),
(230, 'Esan West', 12),
(231, 'Etsako-Central', 12),
(232, 'Etsako-West', 12),
(233, 'Igueben', 12),
(234, 'Ikpoba-Okha', 12),
(235, 'Oredo', 12),
(236, 'Orhionmwon', 12),
(237, 'Ovia North East', 12),
(238, 'Ovia South West', 12),
(239, 'owan east', 12),
(240, 'Owan West', 12),
(241, 'Umunniwonde', 12),
(242, 'Ado Ekiti', 13),
(243, 'Aiyedire', 13),
(244, 'Efon', 13),
(245, 'Ekiti-East', 13),
(246, 'Ekiti-South West', 13),
(247, 'Ekiti West', 13),
(248, 'Emure', 13),
(249, 'Ido Osi', 13),
(250, 'Ijero', 13),
(251, 'Ikere', 13),
(252, 'Ikole', 13),
(253, 'Ilejemeta', 13),
(254, 'Irepodun/Ifelodun', 13),
(255, 'Ise Orun', 13),
(256, 'Moba', 13),
(257, 'Oye', 13),
(258, 'Aninri', 14),
(259, 'Awgu', 14),
(260, 'Enugu East', 14),
(261, 'Enugu North', 14),
(262, 'Enugu South', 14),
(263, 'Ezeagu', 14),
(264, 'Igbo Etiti', 14),
(265, 'Igbo Eze North', 14),
(266, 'Igbo Eze South', 14),
(267, 'Isi Uzo', 14),
(268, 'Nkanu East', 14),
(269, 'Nkanu West', 14),
(270, 'Nsukka', 14),
(271, 'Oji-River', 14),
(272, 'Udenu', 14),
(273, 'Udi', 14),
(274, 'Uzo Uwani', 14),
(275, 'Akko', 15),
(276, 'Balanga', 15),
(277, 'Billiri', 15),
(278, 'Dukku', 15),
(279, 'Funakaye', 15),
(280, 'Gombe', 15),
(281, 'Kaltungo', 15),
(282, 'Kwami', 15),
(283, 'Nafada/Bajoga', 15),
(284, 'Shomgom', 15),
(285, 'Yamltu/Deba', 15),
(286, 'Ahiazu-Mbaise', 16),
(287, 'Ehime-Mbano', 16),
(288, 'Ezinihtte', 16),
(289, 'Ideato North', 16),
(290, 'Ideato South', 16),
(291, 'Ihitte/Uboma', 16),
(292, 'Ikeduru', 16),
(293, 'Isiala-Mbano', 16),
(294, 'Isu', 16),
(295, 'Mbaitoli', 16),
(296, 'Ngor-Okpala', 16),
(297, 'Njaba', 16),
(298, 'Nkwerre', 16),
(299, 'Nwangele', 16),
(300, 'obowo', 16),
(301, 'Oguta', 16),
(302, 'Ohaji-Eggema', 16),
(303, 'Okigwe', 16),
(304, 'Onuimo', 16),
(305, 'Orlu', 16),
(306, 'Orsu', 16),
(307, 'Oru East', 16),
(308, 'Oru West', 16),
(309, 'Owerri Municipal', 16),
(310, 'Owerri North', 16),
(311, 'Owerri West', 16),
(312, 'Auyu', 17),
(313, 'Babura', 17),
(314, 'Birnin Kudu', 17),
(315, 'Birniwa', 17),
(316, 'Bosuwa', 17),
(317, 'Buji', 17),
(318, 'Dutse', 17),
(319, 'Gagarawa', 17),
(320, 'Garki', 17),
(321, 'Gumel', 17),
(322, 'Guri', 17),
(323, 'Gwaram', 17),
(324, 'Gwiwa', 17),
(325, 'Hadejia', 17),
(326, 'Jahun', 17),
(327, 'Kafin Hausa', 17),
(328, 'Kaugama', 17),
(329, 'Kazaure', 17),
(330, 'Kirikasanuma', 17),
(331, 'Kiyawa', 17),
(332, 'Maigatari', 17),
(333, 'Malam Maduri', 17),
(334, 'Miga', 17),
(335, 'Ringim', 17),
(336, 'Roni', 17),
(337, 'Sule Tankarkar', 17),
(338, 'Taura', 17),
(339, 'Yankwashi', 17),
(340, 'Birnin-Gwari', 18),
(341, 'Chikun', 18),
(342, 'Giwa', 18),
(343, 'Gwagwada', 18),
(344, 'Igabi', 18),
(345, 'Ikara', 18),
(346, 'Jaba', 18),
(347, 'Jema\'a', 18),
(348, 'Kachia', 18),
(349, 'Kaduna North', 18),
(350, 'Kagarko', 18),
(351, 'Kajuru', 18),
(352, 'Kaura', 18),
(353, 'Kauru', 18),
(354, 'Koka/Kawo', 18),
(355, 'Kubah', 18),
(356, 'Kudan', 18),
(357, 'Lere', 18),
(358, 'Makarfi', 18),
(359, 'Sabon Gari', 18),
(360, 'Sanga', 18),
(361, 'Sabo', 18),
(362, 'Tudun-Wada/Makera', 18),
(363, 'Zango-Kataf', 18),
(364, 'Zaria', 18),
(365, 'Ajingi', 19),
(366, ' Albasu', 19),
(367, 'Bagwai', 19),
(368, 'Bebeji', 19),
(369, 'Bichi', 19),
(370, 'Bunkure', 19),
(371, 'Dala', 19),
(372, 'Dambatta', 19),
(373, 'Dawakin Kudu', 19),
(374, 'Dawakin Tofa', 19),
(375, 'Doguwa', 19),
(376, 'Fagge', 19),
(377, 'Gabasawa', 19),
(378, 'Garko', 19),
(379, 'Garun-Mallam', 19),
(380, 'Gaya', 19),
(381, 'Gezawa', 19),
(382, 'Gwale', 19),
(383, 'Gwarzo', 19),
(384, 'Kabo', 19),
(385, 'Kano Municipal', 19),
(386, 'Karaye', 19),
(387, 'Kibiya', 19),
(388, 'Kiru', 19),
(389, 'Kumbotso', 19),
(390, 'Kunchi', 19),
(391, 'Kura', 19),
(392, 'Madobi', 19),
(393, 'Makoda', 19),
(394, 'Minjibir', 19),
(395, 'Nasarawa', 19),
(396, 'Rano', 19),
(397, 'Rimin Gado', 19),
(398, 'Rogo', 19),
(399, 'Shanono', 19),
(400, 'Sumaila', 19),
(401, 'Takai', 19),
(402, 'Tarauni', 19),
(403, 'Tofa', 19),
(404, 'Tsanyawa', 19),
(405, 'Tudun Wada', 19),
(406, 'Ngogo', 19),
(407, 'Warawa', 19),
(408, 'Wudil', 19),
(409, 'Bakori', 20),
(410, 'Batagarawa', 20),
(411, 'Batsari', 20),
(412, 'Baure', 20),
(413, 'Bindawa', 20),
(414, 'Charanchi', 20),
(415, 'Danja', 20),
(416, 'Danjume', 20),
(417, 'Dan-Musa', 20),
(418, 'Daura', 20),
(419, 'Dutsi', 20),
(420, 'Dutsinma', 20),
(421, 'Faskari', 20),
(422, 'Funtua', 20),
(423, 'Ingara', 20),
(424, 'Jibia', 20),
(425, 'Kafur', 20),
(426, 'Kaita', 20),
(427, 'Kankara', 20),
(428, 'Kankia', 20),
(429, 'Katsina', 20),
(430, 'Kurfi', 20),
(431, 'Kusada', 20),
(432, 'Mai Adua', 20),
(433, 'Malumfashi', 20),
(434, 'Mani', 20),
(435, 'Mashi', 20),
(436, 'Matazu', 20),
(437, 'Musawa', 20),
(438, 'Rimi', 20),
(439, 'Sabuwa', 20),
(440, 'Safana', 20),
(441, 'Sandamu', 20),
(442, 'Zango', 20),
(443, 'Aleira', 21),
(444, 'Arewa', 21),
(445, 'Argungu', 21),
(446, 'Augie', 21),
(447, 'Bagudo', 21),
(448, 'Birnin-Kebbi', 21),
(449, 'Bumza', 21),
(450, 'Dandi', 21),
(451, 'Danko', 21),
(452, 'Fakai', 21),
(453, 'Gwandu', 21),
(454, 'Jega', 21),
(455, 'Kalgo', 21),
(456, 'Koko-Besse', 21),
(457, 'Maiyama', 21),
(458, 'Ngaski', 21),
(459, 'Sakaba', 21),
(460, 'Shanga', 21),
(461, 'Suru', 21),
(462, 'Wasagu', 21),
(463, 'Yauri', 21),
(464, 'Zuru', 21),
(465, 'Adavi', 22),
(466, 'Ajaokuta', 22),
(467, 'Ankpa', 22),
(468, 'Bassa', 22),
(469, 'Dekina', 22),
(470, 'Ibaji', 22),
(471, 'Idah', 22),
(472, 'Igalamela', 22),
(473, 'Ijumu', 22),
(474, 'Kabba/Bunu', 22),
(475, 'Kogi', 22),
(476, 'Lokoja', 22),
(477, 'Mopa-Muro-Mopi', 22),
(478, 'Ofu', 22),
(479, 'Ogori/Magongo', 22),
(480, 'Okehi', 22),
(481, 'Okene', 22),
(482, 'Olamaboro', 22),
(483, 'Omala', 22),
(484, 'Oyi', 22),
(485, 'Yagba-East', 22),
(486, 'Yagba-West', 22),
(487, 'Asa', 23),
(488, 'Baruten', 23),
(489, 'Edu', 23),
(490, 'Ekiti', 23),
(491, 'Ifelodun', 23),
(492, 'Ilorin East', 23),
(493, 'Ilorin South', 23),
(494, 'Ilorin West', 23),
(495, 'Irepodun', 23),
(496, 'Isin', 23),
(497, 'Kaiama', 23),
(498, 'Moro', 23),
(499, 'Offa', 23),
(500, 'Oke-Ero', 23),
(501, 'Oyun', 23),
(502, 'Pategi', 23),
(503, 'Agege', 24),
(504, 'Ajeromi-Ifelodun', 24),
(505, 'Alimosho', 24),
(506, 'Amuwo-Odofin', 24),
(507, 'Apapa', 24),
(508, 'Bagagry', 24),
(509, 'Epe', 24),
(510, 'Eti-Osa', 24),
(511, 'Ibeju-Lekki', 24),
(512, 'Ifako-Ijaiye', 24),
(513, 'Ikeja', 24),
(514, 'Ikorodu', 24),
(515, 'Kosofe', 24),
(516, 'Lagos-Island', 24),
(517, 'Lagos-Mainland', 24),
(518, 'Mushin', 24),
(519, 'Ojo', 24),
(520, 'Oshodi-Isolo', 24),
(521, 'Shomolu', 24),
(522, 'Suru-Lere', 24),
(523, 'Akwanga', 25),
(524, 'Awe', 25),
(525, 'Doma', 25),
(526, 'Karu', 25),
(527, 'Keana', 25),
(528, 'Keffi', 25),
(529, 'Kokona', 25),
(530, 'Lafia', 25),
(531, 'Nassarawa', 25),
(532, 'Nassarawa Eggor', 25),
(533, 'Obi', 25),
(534, 'Toto', 25),
(535, 'Wamba', 25),
(536, 'Agaie', 26),
(537, 'Agwara', 26),
(538, 'Bida', 26),
(539, 'Borgu', 26),
(540, 'Bosso', 26),
(541, 'Chanchaga', 26),
(542, 'Edati', 26),
(543, 'Gbako', 26),
(544, 'Gurara', 26),
(545, 'Katcha', 26),
(546, 'Kontagora', 26),
(547, 'Lapai', 26),
(548, 'Lavum', 26),
(549, 'Magama', 26),
(550, 'Mariga', 26),
(551, 'Mashegu', 26),
(552, 'Mokwa', 26),
(553, 'Muya', 26),
(554, 'Paikoro', 26),
(555, 'Rafi', 26),
(556, 'Rajau', 26),
(557, 'Shiroro', 26),
(558, 'Suleja', 26),
(559, 'Tafa', 26),
(560, 'Wushishi', 26),
(561, 'Abeokuta -North', 27),
(562, 'Abeokuta -South', 27),
(563, 'Ado-Odu/Ota', 27),
(564, 'Yewa-North', 27),
(565, 'Yewa-South', 27),
(566, 'Ewekoro', 27),
(567, 'Ifo', 27),
(568, 'Ijebu East', 27),
(569, 'Ijebu North', 27),
(570, 'Ijebu North-East', 27),
(571, 'Ijebu-Ode', 27),
(572, 'Ikenne', 27),
(573, 'Imeko-Afon', 27),
(574, 'Ipokia', 27),
(575, 'Obafemi -Owode', 27),
(576, 'Odeda', 27),
(577, 'Odogbolu', 27),
(578, 'Ogun-Water Side', 27),
(579, 'Remo-North', 27),
(580, 'Shagamu', 27),
(581, 'Akoko-North-East', 28),
(582, 'Akoko-North-West', 28),
(583, 'Akoko-South-West', 28),
(584, 'Akoko-South-East', 28),
(585, 'Akure- South', 28),
(586, 'Akure-North', 28),
(587, 'Ese-Odo', 28),
(588, 'Idanre', 28),
(589, 'Ifedore', 28),
(590, 'Ilaje', 28),
(591, 'Ile-Oluji-Okeigbo', 28),
(592, 'Irele', 28),
(593, 'Odigbo', 28),
(594, 'Okitipupa', 28),
(595, 'Ondo-West', 28),
(596, 'Ondo East', 28),
(597, 'Ose', 28),
(598, 'Owo', 28),
(599, 'Atakumosa', 29),
(600, 'Atakumosa East', 29),
(601, 'Ayeda-Ade', 29),
(602, 'Ayedire', 29),
(603, 'Boluwaduro', 29),
(604, 'Boripe', 29),
(605, 'Ede', 29),
(606, 'Ede North', 29),
(607, 'Egbedore', 29),
(608, 'Ejigbo', 29),
(609, 'Ife', 29),
(610, 'Ife East', 29),
(611, 'Ife North', 29),
(612, 'Ife South', 29),
(613, 'Ifedayo', 29),
(614, 'Ifelodun', 29),
(615, 'Ila', 29),
(616, 'Ilesha', 29),
(617, 'Ilesha-West', 29),
(618, 'Irepodun', 29),
(619, 'Irewole', 29),
(620, 'Isokun', 29),
(621, 'Iwo', 29),
(622, 'Obokun', 29),
(623, 'Odo-Otin', 29),
(624, 'Ola Oluwa', 29),
(625, 'Olorunda', 29),
(626, 'Ori-Ade', 29),
(627, 'Orolu', 29),
(628, 'Osogbo', 29),
(629, 'Afijio', 30),
(630, 'Akinyele', 30),
(631, 'Atiba', 30),
(632, 'Atisbo', 30),
(633, 'Egbeda', 30),
(634, 'Ibadan-Central', 30),
(635, 'Ibadan-North-East', 30),
(636, 'Ibadan-North-West', 30),
(637, 'Ibadan-South-East', 30),
(638, 'Ibadan-South West', 30),
(639, 'Ibarapa-Central', 30),
(640, 'Ibarapa-East', 30),
(641, 'Ibarapa-North', 30),
(642, 'Ido', 30),
(643, 'Ifedayo', 30),
(644, 'Ifeloju', 30),
(645, 'Irepo', 30),
(646, 'Iseyin', 30),
(647, 'Itesiwaju', 30),
(648, 'Iwajowa', 30),
(649, 'Kajola', 30),
(650, 'Lagelu', 30),
(651, 'Odo-Oluwa', 30),
(652, 'Ogbomoso-North', 30),
(653, 'Ogbomosho-South', 30),
(654, 'Olorunsogo', 30),
(655, 'Oluyole', 30),
(656, 'Ona-Ara', 30),
(657, 'Orelope', 30),
(658, 'Ori-Ire', 30),
(659, 'Oyo East', 30),
(660, 'Oyo West', 30),
(661, 'saki east', 30),
(662, 'Saki West', 30),
(663, 'Surulere', 30),
(664, 'Barkin Ladi', 31),
(665, 'Bassa', 31),
(666, 'Bokkos', 31),
(667, 'Jos-East', 31),
(668, 'Jos-South', 31),
(669, 'Jos-North', 31),
(670, 'Kanam', 31),
(671, 'Kanke', 31),
(672, 'Langtang North', 31),
(673, 'Langtang South', 31),
(674, 'Mangu', 31),
(675, 'Mikang', 31),
(676, 'Pankshin', 31),
(677, 'Quan\'pan', 31),
(678, 'Riyom', 31),
(679, 'Shendam', 31),
(680, 'Wase', 31),
(681, 'Abua/Odual', 32),
(682, 'Ahoada East', 32),
(683, 'Ahoada West', 32),
(684, 'Akukutoru', 32),
(685, 'Andoni', 32),
(686, 'Asari-Toro', 32),
(687, 'Bonny', 32),
(688, 'Degema', 32),
(689, 'Eleme', 32),
(690, 'Emuoha', 32),
(691, 'Etche', 32),
(692, 'Gokana', 32),
(693, 'Ikwerre', 32),
(694, 'Khana', 32),
(695, 'Obio/Akpor', 32),
(696, 'Ogba/Egbama/Ndoni', 32),
(697, 'Ogu/Bolo', 32),
(698, 'Okrika', 32),
(699, 'Omuma', 32),
(700, 'Opobo/Nkoro', 32),
(701, 'Oyigbo', 32),
(702, 'Port-Harcourt', 32),
(703, 'Tai', 32),
(704, 'Binji', 33),
(705, 'Bodinga', 33),
(706, 'Dange-Shuni', 33),
(707, 'Gada', 33),
(708, 'Goronyo', 33),
(709, 'Gudu', 33),
(710, 'Gwadabawa', 33),
(711, 'Illela', 33),
(712, 'Isa', 33),
(713, 'Kebbe', 33),
(714, 'Kware', 33),
(715, 'Raba', 33),
(716, 'Sabon-Birni', 33),
(717, 'Shagari', 33),
(718, 'Silame', 33),
(719, 'Sokoto North', 33),
(720, 'Sokoto South', 33),
(721, 'Tambuwal', 33),
(722, 'Tanzaga', 33),
(723, 'Tureta', 33),
(724, 'Wamakko', 33),
(725, 'Wurno', 33),
(726, 'Yabo', 33),
(727, 'Ardo Kola', 34),
(728, 'Bali', 34),
(729, 'Donga', 34),
(730, 'Gashaka', 34),
(731, 'Gassol', 34),
(732, 'Ibi', 34),
(733, 'Jalingo', 34),
(734, 'Karim-Lamido', 34),
(735, 'Kurmi', 34),
(736, 'Lau', 34),
(737, 'Sardauna', 34),
(738, 'Takuni', 34),
(739, 'Ussa', 34),
(740, 'Wukari', 34),
(741, 'Yarro', 34),
(742, 'Zing', 34),
(743, 'Bade', 35),
(744, 'Bursali', 35),
(745, 'Damaturu', 35),
(746, 'Fuka', 35),
(747, 'Fune', 35),
(748, 'Geidam', 35),
(749, 'Gogaram', 35),
(750, 'Gujba', 35),
(751, 'Gulani', 35),
(752, 'Jakusko', 35),
(753, 'Karasuwa', 35),
(754, 'Machina', 35),
(755, 'Nangere', 35),
(756, 'Nguru', 35),
(757, 'Potiskum', 35),
(758, 'Tarmua', 35),
(759, 'Yunisari', 35),
(760, 'Yusufari', 35),
(761, 'Anka', 36),
(762, 'Bakure', 36),
(763, 'Bukkuyum', 36),
(764, 'Bungudo', 36),
(765, 'Gumi', 36),
(766, 'Gusau', 36),
(767, 'Isa', 36),
(768, 'Kaura-Namoda', 36),
(769, 'Kiyawa', 36),
(770, 'Maradun', 36),
(771, 'Marau', 36),
(772, 'Shinkafa', 36),
(773, 'Talata-Mafara', 36),
(774, 'Tsafe', 36),
(775, 'Zurmi', 36),
(776, 'Obudu', 9),
(777, 'Abaji', 37),
(778, 'Bwari', 37),
(779, 'Gwagwalada', 37),
(780, 'Kuje', 37),
(781, 'Kwali', 37),
(782, 'Municipal', 37),
(783, 'Etsako-East', 12),
(784, 'Ahiazu-Mbaise', 16),
(785, 'Foreign', 38),
(786, 'Kaduna South', 18),
(787, 'Aboh-Mbaise', 16),
(788, 'Odukpani', 9);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `req_id` int(11) NOT NULL,
  `reg_jobId` int(111) NOT NULL,
  `req_text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`req_id`, `reg_jobId`, `req_text`) VALUES
(1, 10, '3 years experience'),
(2, 10, 'ability to defend client well in court'),
(3, 11, 'html'),
(4, 11, 'css'),
(5, 12, '3 years experience');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`sp_id`, `sp_name`) VALUES
(1, 'Accounting, Auditing & Finance'),
(2, 'Admin & Office'),
(3, 'Creative & Design'),
(4, 'Building & Architecture'),
(5, 'Consulting & Strategy'),
(6, 'Customer Service & Support'),
(7, 'Engineering & Technology'),
(8, 'Farming & Agriculture'),
(9, 'Food Services & Catering'),
(10, 'Hospitality & Leisure'),
(11, 'Software & Data'),
(12, 'Legal Services'),
(13, 'Marketing & Communications'),
(14, 'Medical & Pharmaceutical'),
(15, 'Product & Project Management'),
(16, 'Estate Agents & Property Management'),
(17, 'Quality Control & Assurance'),
(18, 'Human Resources'),
(19, 'Management & Business Development'),
(20, 'Community & Social Services'),
(21, 'Sales'),
(22, 'Supply Chain & Procurement'),
(23, 'Research, Teaching & Training'),
(24, 'Trades & Services'),
(25, 'Driver & Transport Services'),
(26, 'Health & Safety');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nassarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'Abuja (FCT)'),
(38, 'Foreign');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id_UNIQUE` (`admin_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`),
  ADD UNIQUE KEY `employer_id_UNIQUE` (`employer_id`),
  ADD UNIQUE KEY `email` (`employer_email`),
  ADD KEY `employer_state_index_idx` (`employer_stateId`);

--
-- Indexes for table `employerspecialization`
--
ALTER TABLE `employerspecialization`
  ADD PRIMARY KEY (`empSpecialization_id`),
  ADD KEY `specialization_id_index_idx` (`specialization_id`),
  ADD KEY `employers_specialization_index_idx` (`employers_id`);

--
-- Indexes for table `jobseeker_application`
--
ALTER TABLE `jobseeker_application`
  ADD PRIMARY KEY (`application_id`),
  ADD UNIQUE KEY `application_id_UNIQUE` (`application_id`),
  ADD KEY `jobVacancy_index_idx` (`application_jobVacancy_id`),
  ADD KEY `jobSeeker_index_idx` (`application_jobSeeker_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`jobCat_id`),
  ADD UNIQUE KEY `jobCat_id_UNIQUE` (`jobCat_id`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`jobSeeker_id`),
  ADD UNIQUE KEY `jobSeeker_id_UNIQUE` (`jobSeeker_id`),
  ADD UNIQUE KEY `jobSeeker_phone_UNIQUE` (`jobSeeker_phone`),
  ADD UNIQUE KEY `jobSeeker_email_UNIQUE` (`jobSeeker_email`),
  ADD KEY `state_id_index_idx` (`jobSeeker_State_id`),
  ADD KEY `jobSeeker_State_id` (`jobSeeker_State_id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`jobVacancy_id`),
  ADD UNIQUE KEY `jobVacancy_id_UNIQUE` (`jobVacancy_id`),
  ADD KEY `jobcat_index_idx` (`jobCat_id`),
  ADD KEY `employerVacancy_index_idx` (`jobVacancy_employerId`),
  ADD KEY `state_index` (`states_id`),
  ADD KEY `lga_index` (`lga`);

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`lga_id`),
  ADD KEY `state_id_index` (`state_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`sp_id`),
  ADD UNIQUE KEY `sp_id_UNIQUE` (`sp_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD UNIQUE KEY `state_id_UNIQUE` (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employerspecialization`
--
ALTER TABLE `employerspecialization`
  MODIFY `empSpecialization_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobseeker_application`
--
ALTER TABLE `jobseeker_application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `jobCat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `jobSeeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `jobVacancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employer_state_index` FOREIGN KEY (`employer_stateId`) REFERENCES `state` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employerspecialization`
--
ALTER TABLE `employerspecialization`
  ADD CONSTRAINT `employers_specialization_index` FOREIGN KEY (`employers_id`) REFERENCES `employers` (`employer_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `specialization_id_index` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`sp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD CONSTRAINT `state_id_indx` FOREIGN KEY (`jobSeeker_State_id`) REFERENCES `state` (`state_id`) ON UPDATE CASCADE;

--
-- Constraints for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD CONSTRAINT `employerVacancy_index` FOREIGN KEY (`jobVacancy_employerId`) REFERENCES `employers` (`employer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobcat_index` FOREIGN KEY (`jobCat_id`) REFERENCES `job_category` (`jobCat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lga_index` FOREIGN KEY (`lga`) REFERENCES `lga` (`lga_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `state_index` FOREIGN KEY (`states_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lga`
--
ALTER TABLE `lga`
  ADD CONSTRAINT `state_id_index` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
