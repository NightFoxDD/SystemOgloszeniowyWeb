-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 04, 2024 at 11:48 AM
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
  `descriptions` text NOT NULL,
  `category_id` text NOT NULL,
  `subcategory_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `company_id`, `localization`, `Map`, `position_name`, `position_level`, `contract_type`, `working_time`, `work_type`, `expire_date`, `typeOfEmployment`, `duties`, `requirements`, `benefits`, `descriptions`, `category_id`, `subcategory_id`) VALUES
(19, 1, 'Default title;Default description', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d41307.89305404976!2d20.3778259!3d49.6779736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471604ac3d8d1f55%3A0xd36b3f6f6c764ae0!2zS2_Fm2Npw7PFgiDFm3cuIEFuZHJ6ZWphIEFwb3N0b8WCYSB3IFPFgm9wbmljYWNoIERvbG55Y2g!5e0!3m2!1spl!2spl!4v1715593993405!5m2!1spl!2spl}', 'Name', 'Default title;Default description', 'Default title;Default title', 'Default title;Default description', 'Default title;Default description', 'Default title;Default description', 'Default title;Default description', 'asf;Twój zakres obowiązków;', 'Twój zakres obowiązków;Twój zakres obowiązkówTwój zakres obowiązków;_', 'Twój zakres obowiązków;Twój zakres obowiązkówTwój zakres obowiązków;', 'Twój zakres obowiązków;', '', ''),
(20, 1, 'Default title_#0099e6;Default description', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d41307.89305404976!2d20.3778259!3d49.6779736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471604ac3d8d1f55%3A0xd36b3f6f6c764ae0!2zS2_Fm2Npw7PFgiDFm3cuIEFuZHJ6ZWphIEFwb3N0b8WCYSB3IFPFgm9wbmljYWNoIERvbG55Y2g!5e0!3m2!1spl!2spl!4v1715594367043!5m2!1spl!2spl}', 'Name', 'Default title_#3da986;Default description', 'Default title_#3da986;Default title_#3da986', 'Default title_#3da986;Default description', 'Default title_#4fa73f;Default description', 'Default title_#3da986;Default description', 'Default title_#4fa73f;Default description', 'Twój zakres obowiązków;Twój zakres obowiązkówTwój zakres obowiązków;', 'Twój zakres obowiązków;_', 'Twój zakres obowiązków;', 'Twój zakres obowiązkówTwój zakres obowiązków;', '', ''),
(21, 1, 'Default title_#0099e6;Default description', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41307.893011576605!2d20.377825899999998!3d49.67797365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471603a1039ab82b%3A0xc5a222b74977509e!2sDomki%20Zagroda!5e0!3m2!1spl!2spl!4v1715615510550!5m2!1spl!2spl}', 'Name', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default title_#0099e6', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default description', 'Default title_#0099e6;Default description', 'Twój zakres obowiązków;', 'Twój zakres obowiązków;_', 'Twój zakres obowiązków;', 'Twój zakres obowiązków;', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement_category`
--

CREATE TABLE `announcement_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `announcement_category`
--

INSERT INTO `announcement_category` (`category_id`, `name`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement_subcategory`
--

CREATE TABLE `announcement_subcategory` (
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `announcement_subcategory`
--

INSERT INTO `announcement_subcategory` (`subcategory_id`, `category_id`, `name`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3'),
(4, 2, 'a1'),
(5, 2, 'b2'),
(6, 3, 'c'),
(7, 3, 'cd'),
(8, 3, 'sa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement_working_days`
--

CREATE TABLE `announcement_working_days` (
  `working_days_id` int(10) UNSIGNED NOT NULL,
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `sunday` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `company`
--

CREATE TABLE `company` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `adress` varchar(75) NOT NULL,
  `localization_link` text NOT NULL,
  `imageLink` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `user_id`, `name`, `adress`, `localization_link`, `imageLink`, `description`) VALUES
(1, 15, 'PracujPL', 'asdf', '', 'imagecompany.png', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `login`, `password`, `role_id`) VALUES
(12, '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(14, 'aaa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(15, 'company', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

--
-- Wyzwalacze `user`
--
DELIMITER $$
CREATE TRIGGER `adding user_data` AFTER INSERT ON `user` FOR EACH ROW BEGIN
INSERT INTO `user_data` (`user_id`) VALUES (NEW.user_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_application`
--

CREATE TABLE `user_application` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_course`
--

CREATE TABLE `user_course` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `organizer` varchar(40) NOT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_data`
--

CREATE TABLE `user_data` (
  `user_data_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone_number` decimal(9,0) NOT NULL,
  `pfp` blob NOT NULL,
  `city` varchar(35) NOT NULL,
  `currnent_occupation` varchar(75) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_data_id`, `user_id`, `name`, `surname`, `birth_date`, `email`, `telephone_number`, `pfp`, `city`, `currnent_occupation`, `nationality`) VALUES
(1, 12, 'as', 'dfasdf', '0000-00-00', '', 0, '', 'asdf', 'asdf', '...'),
(2, 14, '', '', '0000-00-00', '', 0, '', '', '', ''),
(3, 15, '', '', '0000-00-00', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_education`
--

CREATE TABLE `user_education` (
  `education_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(75) NOT NULL,
  `city` varchar(35) NOT NULL,
  `level` enum('podstawowe','zawodowe','Äąâ€şrednie','licencjat','inÄąÄ˝ynier','magister','doktor','doktor habilitowany','profesor') NOT NULL,
  `specialization` varchar(75) NOT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`education_id`, `user_id`, `school_name`, `city`, `level`, `specialization`, `period_start`, `period_end`) VALUES
(4, 12, 'jmk,', 'k,', 'podstawowe', 'mk,', '2024-03-13', '2024-03-30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_experience`
--

CREATE TABLE `user_experience` (
  `experience_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `position` varchar(75) NOT NULL,
  `company` varchar(50) NOT NULL,
  `localization` varchar(35) NOT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL,
  `duties` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user_experience`
--

INSERT INTO `user_experience` (`experience_id`, `user_id`, `position`, `company`, `localization`, `period_start`, `period_end`, `duties`) VALUES
(22, 12, 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', '2024-02-26', '2024-03-30', 'aaaaaaaaaaaaaaaaaaaaaaaa'),
(23, 12, 'k', 'k', 'k', '2024-03-26', '2024-04-13', 'jh');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_language`
--

CREATE TABLE `user_language` (
  `language_id` int(11) NOT NULL,
  `language` varchar(35) NOT NULL,
  `level` enum('podstawowy',' Äąâ€şrednio-zaawansowany','zaawansowany','') NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user_language`
--

INSERT INTO `user_language` (`language_id`, `language`, `level`, `user_id`) VALUES
(2, 'polski', 'podstawowy', 12),
(3, 'angielski', 'podstawowy', 12),
(4, 'polski', 'podstawowy', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_link`
--

CREATE TABLE `user_link` (
  `link_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` enum('Linked','GitHub','Facebook','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `name`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'company');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_saved`
--

CREATE TABLE `user_saved` (
  `saved_id` int(10) UNSIGNED NOT NULL,
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_skill`
--

CREATE TABLE `user_skill` (
  `skill_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` enum(' obsÄąâ€šuga pakietu xxx','prawo jazdy kategorii xxx','operator maszyn CNC','licencja na helikopter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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
-- Indeksy dla tabeli `announcement_category`
--
ALTER TABLE `announcement_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `announcement_subcategory`
--
ALTER TABLE `announcement_subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `announcement_working_days`
--
ALTER TABLE `announcement_working_days`
  ADD PRIMARY KEY (`working_days_id`),
  ADD KEY `announcement_id` (`announcement_id`);

--
-- Indeksy dla tabeli `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeksy dla tabeli `user_application`
--
ALTER TABLE `user_application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `announcement_id` (`announcement_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_data_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_experience`
--
ALTER TABLE `user_experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_language`
--
ALTER TABLE `user_language`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_link`
--
ALTER TABLE `user_link`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeksy dla tabeli `user_saved`
--
ALTER TABLE `user_saved`
  ADD PRIMARY KEY (`saved_id`),
  ADD KEY `announcement_id` (`announcement_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_skill`
--
ALTER TABLE `user_skill`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `announcement_category`
--
ALTER TABLE `announcement_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcement_subcategory`
--
ALTER TABLE `announcement_subcategory`
  MODIFY `subcategory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `announcement_working_days`
--
ALTER TABLE `announcement_working_days`
  MODIFY `working_days_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_application`
--
ALTER TABLE `user_application`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_data_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `education_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `experience_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_language`
--
ALTER TABLE `user_language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_link`
--
ALTER TABLE `user_link`
  MODIFY `link_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_saved`
--
ALTER TABLE `user_saved`
  MODIFY `saved_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_skill`
--
ALTER TABLE `user_skill`
  MODIFY `skill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_subcategory`
--
ALTER TABLE `announcement_subcategory`
  ADD CONSTRAINT `announcement_subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `announcement_category` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_application`
--
ALTER TABLE `user_application`
  ADD CONSTRAINT `user_application_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `user_education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_experience`
--
ALTER TABLE `user_experience`
  ADD CONSTRAINT `user_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_language`
--
ALTER TABLE `user_language`
  ADD CONSTRAINT `user_language_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_link`
--
ALTER TABLE `user_link`
  ADD CONSTRAINT `user_link_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_saved`
--
ALTER TABLE `user_saved`
  ADD CONSTRAINT `user_saved_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_saved_ibfk_4` FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`announcement_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `user_skill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
