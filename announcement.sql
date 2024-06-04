-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 04, 2024 at 10:45 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advertisements_system`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` text NOT NULL,
  `subcategory_id` text NOT NULL,
  `localization` text NOT NULL,
  `Map` text NOT NULL,
  `position_name` text NOT NULL,
  `position_level` text NOT NULL,
  `contract_type` text NOT NULL,
  `working_time` text NOT NULL,
  `work_type` text NOT NULL,
  `expire_date` text NOT NULL,
  `typeOfEmployment` text NOT NULL,
  `duties` text NOT NULL,
  `requirements` text NOT NULL,
  `benefits` text NOT NULL,
  `descriptions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `company_id`, `category_id`, `subcategory_id`, `localization`, `Map`, `position_name`, `position_level`, `contract_type`, `working_time`, `work_type`, `expire_date`, `typeOfEmployment`, `duties`, `requirements`, `benefits`, `descriptions`) VALUES
(19, 1, '1;', '1_1;1_2;1_3;', 'Default title_#000000; Default description', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d41307.89305404976!2d20.3778259!3d49.6779736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471604ac3d8d1f55%3A0xd36b3f6f6c764ae0!2zS2_Fm2Npw7PFgiDFm3cuIEFuZHJ6ZWphIEFwb3N0b8WCYSB3IFPFgm9wbmljYWNoIERvbG55Y2g!5e0!3m2!1spl!2spl!4v1715593993405!5m2!1spl!2spl}', 'Name', 'Default title_#000000; Default description', 'Default title_#000000; Default title', 'Default title_#000000; Default description', 'Default title_#000000; Default description', 'Default title_#000000; Default description', 'Default title_#000000; Default description', 'asf;Twój zakres obowiązków;', 'Twój zakres obowiązków;Twój zakres obowiązkówTwój zakres obowiązków;_', 'Twój zakres obowiązków;Twój zakres obowiązkówTwój zakres obowiązków;', 'Twój zakres obowiązków;'),
(20, 1, '2;', '2_4;2_5;2_6;', 'Default title_#0099e6; Default description', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d41307.89305404976!2d20.3778259!3d49.6779736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471604ac3d8d1f55%3A0xd36b3f6f6c764ae0!2zS2_Fm2Npw7PFgiDFm3cuIEFuZHJ6ZWphIEFwb3N0b8WCYSB3IFPFgm9wbmljYWNoIERvbG55Y2g!5e0!3m2!1spl!2spl!4v1715594367043!5m2!1spl!2spl}', 'Name', 'Default title_#3da986; Default description', 'Default title_#3da986; Default title_#3da986', 'Default title_#3da986; Default description', 'Default title_#4fa73f; Default description', 'Default title_#3da986; Default description', 'Default title_#4fa73f; Default description', 'Twój zakres obowiązków;Twój zakres obowiązkówTwój zakres obowiązków;', 'Twój zakres obowiązków;_', 'Twój zakres obowiązków;', 'Twój zakres obowiązkówTwój zakres obowiązków;'),
(21, 1, '', '', 'Default title_#0099e6;Default description', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41307.893011576605!2d20.377825899999998!3d49.67797365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471603a1039ab82b%3A0xc5a222b74977509e!2sDomki%20Zagroda!5e0!3m2!1spl!2spl!4v1715615510550!5m2!1spl!2spl}', 'Name', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default title_#0099e6', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default description', 'Twój zakres obowiązków;', 'Twój zakres obowiązków;_', 'Twój zakres obowiązków;', 'Twój zakres obowiązków;');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
