-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: אוגוסט 16, 2022 בזמן 04:46 PM
-- גרסת שרת: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_pro`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `file` varchar(300) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `num_days` int(11) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `pdf`
--

INSERT INTO `pdf` (`id`, `file`, `user_id`, `num_days`, `start_date`, `end_date`) VALUES
(1, 'YedionPdfFile_01325_05436.pdf', '', 0, '2022-08-13', '2022-08-13'),
(2, 'גמר תשלום.pdf', '', 0, '2022-08-13', '2022-08-13'),
(3, 'גמר תשלום.pdf', '', 0, '2022-08-13', '2022-08-13'),
(4, 'גמר תשלום.pdf', '', 0, '2022-08-13', '2022-08-13'),
(5, 'document.pdf', '', 0, '2022-08-13', '2022-08-13'),
(6, 'עבודה ביזמות וחדשנות.docx', '', 0, '2022-08-13', '2022-08-13'),
(7, 'תכנות מתקדם - regular expressions -    665002 (1).docx', '', 0, '2022-08-13', '2022-08-13'),
(8, 'יזמות וחדשנות טכנולוגית - מצגת בנושא מודלים עסקיים -    692169.pdf', '', 0, '2022-08-13', '2022-08-13'),
(9, 'מערכות מבוזרות - פתרון תרגיל בית 2 -    636428 (1).pdf', 'adir', 0, '2022-08-13', '2022-08-13'),
(10, 'נושא 62166 חקר ביצועים מועד 1.pdf', 'adir', 3, '2022-08-13', '2022-08-13'),
(11, '3 חודשים.pdf', 'adir', 22, '2022-08-13', '2022-08-13'),
(12, 'CV Adir Harari.pdf', 'adir', 3, '2022-08-13', '2022-08-13'),
(13, 'readme.txt', '8', 3, '2022-08-14', '2022-08-17');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` varchar(500) NOT NULL,
  `worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `request`
--

INSERT INTO `request` (`id`, `date`, `text`, `worker_id`) VALUES
(1, '2022-08-07', 'bvbvbvbvb', 1),
(2, '2022-08-16', 'בוקר-חתונה', 0),
(3, '2022-08-16', 'בוקר-חתונה', 1);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `worker_id` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `start_datetime` date NOT NULL,
  `end_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `worker_id`, `description`, `start_datetime`, `end_datetime`) VALUES
(3, 'שג', '0', 'גגגג', '2022-06-13', '2022-06-13'),
(4, 'אביב', '0', 'בוקר', '2022-06-15', '2022-06-14'),
(5, 'דני', '0', 'ערב', '2022-06-15', '2022-06-15'),
(6, 'דניס', '0', 'ערב', '2022-06-16', '2022-06-16'),
(7, 'אביב', '0', 'בוקר', '2022-06-17', '2022-06-17'),
(8, 'אביב', '0', 'ערב', '2022-06-18', '2022-06-18'),
(9, 'אביב', '0', 'ערב', '2022-07-20', '2022-07-20'),
(10, 'נוני', '0', 'בוקר', '2022-08-05', '2022-08-05'),
(11, 'דגכ', '0', 'ג', '2022-08-03', '2022-08-02'),
(12, 'שמעון', '1234', 'ערב', '2022-08-14', '2022-08-14'),
(13, 'שמעון', '1234', 'ss', '2022-08-14', '2022-08-14'),
(14, 'שמעון', '1234', 'בוקר', '2022-08-15', '2022-08-15'),
(15, 'שמעון', '1234', 'ערב', '2022-08-17', '2022-08-17'),
(16, 'שמעון', '1234', 'בוקר', '2022-08-03', '2022-08-03');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

CREATE TABLE `users` (
  `worker_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`worker_id`, `id`, `password`, `f_name`, `l_name`, `admin`) VALUES
(1, 'aviv', '1111', 'aviv shmuel', '0', 0),
(2, '1234', 'adir1234', 'adir', '0', 1),
(8, 'adir', '12345678', 'אדיר', 'הררי', 0),
(9, '123454321', '1122', 'יוסי', 'גלמן', 0),
(12, '332211', '332211', 'שמעון', 'אפרגן', 0),
(13, '333666999', '1234', 'שימרי', 'אדור', 0);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `vaction`
--

CREATE TABLE `vaction` (
  `vac_num` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `worker_id` varchar(10) NOT NULL,
  `text` varchar(300) NOT NULL,
  `statuss` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `vaction`
--

INSERT INTO `vaction` (`vac_num`, `start_date`, `end_date`, `worker_id`, `text`, `statuss`) VALUES
(1, '0000-00-00', '0000-00-00', '1234', 'dasdasdasda', 'מאושר'),
(2, '2022-06-22', '2022-06-29', 'adir', 'asdasd', 'מאושר'),
(3, '2022-07-06', '2022-07-10', 'adir', 'יאמניאק', 'מאושר'),
(4, '2022-07-06', '2022-07-10', 'adir', 'יאמניאק', 'מאושר'),
(5, '2022-07-06', '2022-07-10', 'adir', 'יאמניאק', 'נדחה'),
(6, '2022-08-21', '2022-08-25', '', 'טיסה לארהב', ''),
(7, '2022-08-21', '2022-08-25', '305318875', 'טיסה לארהב', ''),
(8, '2022-08-29', '2022-08-30', '305318875', 'יום הולדת', '');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `start_Date` date DEFAULT current_timestamp(),
  `end_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `workers`
--

INSERT INTO `workers` (`worker_id`, `id`, `password`, `f_name`, `l_name`, `admin`, `start_Date`, `end_Date`) VALUES
(11, '111222333', '111222333', 'חי', 'פחימה', 0, '2022-08-15', NULL),
(12, '332211', '332211', 'שמעון', 'אפרגן', 0, '2022-08-15', '2022-08-15'),
(13, '333666999', '1234', 'שימרי', 'אדור', 0, '2022-08-15', '2022-08-15');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`worker_id`);

--
-- אינדקסים לטבלה `vaction`
--
ALTER TABLE `vaction`
  ADD PRIMARY KEY (`vac_num`);

--
-- אינדקסים לטבלה `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vaction`
--
ALTER TABLE `vaction`
  MODIFY `vac_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
