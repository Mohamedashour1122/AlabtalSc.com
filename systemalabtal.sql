-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 03 مايو 2024 الساعة 16:40
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systemalabtal`
--

-- --------------------------------------------------------

--
-- بنية الجدول `academies`
--

CREATE TABLE `academies` (
  `AcademyID` int(11) NOT NULL,
  `AcademyName` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Director` varchar(255) DEFAULT NULL,
  `SportsActivities` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `academies`
--

INSERT INTO `academies` (`AcademyID`, `AcademyName`, `Address`, `Director`, `SportsActivities`) VALUES
(1, 'الفرنسيسكان ', 'المنيا - مغاغة - شارع السلام الرئيسي - داخلب مدرسة الفرنسيسكان ', 'كابتن رحاب عادل ', 'كاراتيه \r\nجمباز \r\nكرة القدم \r\nكرة السلة \r\nلياقة بدنية \r\nرياضة بدنية '),
(2, 'الراهبات ', 'مغاغة شارع السلام الرئيسي - داخل مدرسة الراهبات ', 'السير آنا  روز ', 'كاراتيه \r\nجمباز \r\nكرة قدم \r\nكرة سلة \r\nباليه '),
(3, 'أكاديمية الأبطال بدهمرو ', 'مركز شباب دهمرو ', 'محمد حسين ', 'كاراتيه '),
(5, 'أكاديمية ستارت ', 'شارع الشبان المسلمين -أكاديمية ستارت ', 'شيماء عبدالرازق', 'كاراتيه ');

-- --------------------------------------------------------

--
-- بنية الجدول `activities`
--

CREATE TABLE `activities` (
  `ActivityID` int(11) NOT NULL,
  `ActivityName` varchar(255) NOT NULL,
  `TrainerName` varchar(255) DEFAULT NULL,
  `StartDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `activities`
--

INSERT INTO `activities` (`ActivityID`, `ActivityName`, `TrainerName`, `StartDate`) VALUES
(1, 'كاراتيه ', 'محمد عاشور', '2024-05-01'),
(2, 'كاراتيه', 'رحاب عادل', '2024-05-01'),
(3, 'جمباز ', 'رحاب عادل ', '2024-05-01'),
(4, 'كرة القدم ', 'كابتن أحمد جمال ', '2024-05-01'),
(5, 'كرة القدم ', 'كابتن حسام عادل ', '2024-05-01');

-- --------------------------------------------------------

--
-- بنية الجدول `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventName` varchar(255) NOT NULL,
  `EventType` enum('Concert','Exhibition','Conference','Workshop') NOT NULL,
  `EventDate` date DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Organizer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `external_academies`
--

CREATE TABLE `external_academies` (
  `AcademyID` int(11) NOT NULL,
  `PlayerName` varchar(255) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `NationalID` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Activity` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber1` varchar(20) DEFAULT NULL,
  `PhoneNumber2` varchar(20) DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL,
  `AcademyName` varchar(255) DEFAULT NULL,
  `RegistrationStartDate` date DEFAULT NULL,
  `Notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `external_academies`
--

INSERT INTO `external_academies` (`AcademyID`, `PlayerName`, `DateOfBirth`, `NationalID`, `Age`, `Activity`, `Address`, `PhoneNumber1`, `PhoneNumber2`, `ProfilePicture`, `AcademyName`, `RegistrationStartDate`, `Notes`) VALUES
(1, 'ريتاج طه توفيق محمود ', '2014-02-07', '31402072402889', 9, 'كاراتيه ', 'المنيا - مركز مغاغة ', '13213123', '5435431', 'uploads/IMG_20230818_0001.png', 'دهمرو', '2024-05-01', '');

-- --------------------------------------------------------

--
-- بنية الجدول `members`
--

CREATE TABLE `members` (
  `MemberID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `NationalID` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Activity` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL,
  `MembershipStartDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `TournamentID` int(11) DEFAULT NULL,
  `EventID` int(11) DEFAULT NULL,
  `SubscriptionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `members`
--

INSERT INTO `members` (`MemberID`, `Name`, `DateOfBirth`, `NationalID`, `Age`, `Gender`, `Activity`, `Address`, `PhoneNumber`, `ProfilePicture`, `MembershipStartDate`, `TournamentID`, `EventID`, `SubscriptionID`) VALUES
(1, 'انجي هلال رمضان حمدي ', '2009-11-24', '30911242400728', 15, 'أنثى', 'كاراتيه ', 'المنيا - مركز مغاغة - العبور - شارع المستشارين ', '01120213112', 'uploads/img-1-3.jpg', '0000-00-00 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `membersevents`
--

CREATE TABLE `membersevents` (
  `MemberID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `Attendance` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `memberssubscriptions`
--

CREATE TABLE `memberssubscriptions` (
  `MemberID` int(11) NOT NULL,
  `SubscriptionID` int(11) NOT NULL,
  `PaymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `memberssubscriptions`
--

INSERT INTO `memberssubscriptions` (`MemberID`, `SubscriptionID`, `PaymentDate`) VALUES
(1, 6, '2024-05-03');

-- --------------------------------------------------------

--
-- بنية الجدول `memberstournaments`
--

CREATE TABLE `memberstournaments` (
  `MemberID` int(11) NOT NULL,
  `TournamentID` int(11) NOT NULL,
  `Position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `pages`
--

CREATE TABLE `pages` (
  `PageID` int(11) NOT NULL,
  `PageName` varchar(255) NOT NULL,
  `PageURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `subscriptions`
--

CREATE TABLE `subscriptions` (
  `SubscriptionID` int(11) NOT NULL,
  `ActivityName` varchar(255) NOT NULL,
  `SubscriptionPrice` decimal(10,2) DEFAULT NULL,
  `SubscriptionDuration` int(11) DEFAULT NULL,
  `RenewalStatus` enum('Yes','No') DEFAULT NULL,
  `SubscriptionEndDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `subscriptions`
--

INSERT INTO `subscriptions` (`SubscriptionID`, `ActivityName`, `SubscriptionPrice`, `SubscriptionDuration`, `RenewalStatus`, `SubscriptionEndDate`) VALUES
(6, 'كاراتيه ', 150.00, 30, 'Yes', '2024-06-03');

-- --------------------------------------------------------

--
-- بنية الجدول `tournaments`
--

CREATE TABLE `tournaments` (
  `TournamentID` int(11) NOT NULL,
  `TournamentName` varchar(255) NOT NULL,
  `TournamentType` enum('Competition','Championship') NOT NULL,
  `TournamentDate` date DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Organizer` varchar(255) DEFAULT NULL,
  `Position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `tournaments`
--

INSERT INTO `tournaments` (`TournamentID`, `TournamentName`, `TournamentType`, `TournamentDate`, `Location`, `Organizer`, `Position`) VALUES
(3, 'اختبارات ترقي الاحزمة الرسمية للكاراتيه ', '', '2024-03-05', 'مدرسة الفرنسيسكان ', 'الاتتحاد المصري للكاراتيه فرع المنيا ', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `page_destination` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `page_destination`) VALUES
(1, 'admin', 'admin1', 'indexe.html'),
(3, 'Rehab', 'R123', 'Fransiscan.php'),
(4, 'Maneg', 'M123', 'ACADEMY.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academies`
--
ALTER TABLE `academies`
  ADD PRIMARY KEY (`AcademyID`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ActivityID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `external_academies`
--
ALTER TABLE `external_academies`
  ADD PRIMARY KEY (`AcademyID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `fk_members_tournaments` (`TournamentID`),
  ADD KEY `fk_members_events` (`EventID`),
  ADD KEY `fk_members_subscriptions` (`SubscriptionID`);

--
-- Indexes for table `membersevents`
--
ALTER TABLE `membersevents`
  ADD PRIMARY KEY (`MemberID`,`EventID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `memberssubscriptions`
--
ALTER TABLE `memberssubscriptions`
  ADD PRIMARY KEY (`MemberID`,`SubscriptionID`),
  ADD KEY `SubscriptionID` (`SubscriptionID`);

--
-- Indexes for table `memberstournaments`
--
ALTER TABLE `memberstournaments`
  ADD PRIMARY KEY (`MemberID`,`TournamentID`),
  ADD KEY `TournamentID` (`TournamentID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`PageID`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`SubscriptionID`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`TournamentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academies`
--
ALTER TABLE `academies`
  MODIFY `AcademyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `external_academies`
--
ALTER TABLE `external_academies`
  MODIFY `AcademyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `PageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `SubscriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `TournamentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_members_events` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`),
  ADD CONSTRAINT `fk_members_subscriptions` FOREIGN KEY (`SubscriptionID`) REFERENCES `subscriptions` (`SubscriptionID`),
  ADD CONSTRAINT `fk_members_tournaments` FOREIGN KEY (`TournamentID`) REFERENCES `tournaments` (`TournamentID`),
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`TournamentID`) REFERENCES `tournaments` (`TournamentID`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`),
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`SubscriptionID`) REFERENCES `subscriptions` (`SubscriptionID`);

--
-- قيود الجداول `membersevents`
--
ALTER TABLE `membersevents`
  ADD CONSTRAINT `membersevents_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`);

--
-- قيود الجداول `memberssubscriptions`
--
ALTER TABLE `memberssubscriptions`
  ADD CONSTRAINT `memberssubscriptions_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`),
  ADD CONSTRAINT `memberssubscriptions_ibfk_2` FOREIGN KEY (`SubscriptionID`) REFERENCES `subscriptions` (`SubscriptionID`);

--
-- قيود الجداول `memberstournaments`
--
ALTER TABLE `memberstournaments`
  ADD CONSTRAINT `memberstournaments_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`),
  ADD CONSTRAINT `memberstournaments_ibfk_2` FOREIGN KEY (`TournamentID`) REFERENCES `tournaments` (`TournamentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
