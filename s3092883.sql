-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql8.freesqldatabase.com
-- Generation Time: Apr 28, 2024 at 09:30 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql8701902`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL COMMENT 'unique ad ID',
  `image` varchar(50) NOT NULL COMMENT 'path of image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `image`) VALUES
(12, '/Assets/images/ads/6629614c5cabb.png'),
(13, '/Assets/images/ads/662962780987d.png');

-- --------------------------------------------------------

--
-- Table structure for table `appliances`
--

CREATE TABLE `appliances` (
  `washing_machine` tinyint(1) NOT NULL,
  `microwave` tinyint(1) NOT NULL,
  `dryer` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appliances`
--

INSERT INTO `appliances` (`washing_machine`, `microwave`, `dryer`, `wifi`, `tv`, `property_id`) VALUES
(0, 1, 1, 1, 1, 1),
(1, 1, 1, 1, 1, 2),
(1, 1, 1, 1, 1, 3),
(1, 0, 0, 1, 1, 4),
(0, 0, 0, 0, 0, 5),
(1, 1, 1, 1, 1, 6),
(1, 1, 1, 1, 1, 7),
(1, 1, 1, 1, 1, 8),
(1, 1, 1, 1, 1, 9),
(1, 1, 1, 1, 1, 10),
(1, 1, 1, 1, 1, 11),
(1, 0, 0, 0, 0, 12),
(1, 1, 1, 1, 1, 13),
(1, 1, 0, 1, 1, 14),
(1, 1, 1, 1, 1, 15),
(1, 1, 1, 1, 1, 16),
(1, 1, 1, 1, 1, 17),
(1, 1, 1, 1, 1, 18),
(1, 1, 0, 1, 0, 19),
(1, 1, 1, 1, 1, 20),
(1, 1, 1, 1, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `appuser`
--

CREATE TABLE `appuser` (
  `user_id` int(11) NOT NULL COMMENT 'unique user ID',
  `firstName` varchar(50) NOT NULL COMMENT 'name of user',
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'email ID of user',
  `mobile` varchar(20) NOT NULL COMMENT 'mobile number of user',
  `access` enum('landlord','tenants','admin') NOT NULL DEFAULT 'tenants' COMMENT 'type of access for user (admin, landlord, Tenants)',
  `password` varchar(80) NOT NULL COMMENT 'user password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appuser`
--

INSERT INTO `appuser` (`user_id`, `firstName`, `lastName`, `email`, `mobile`, `access`, `password`) VALUES
(1, 'Joshan John', '', 'joshanjohn2003@gmail.com', '+7 899837325', 'admin', '$2y$10$3ZVDMQ06L4zfwHaBQg2uUeiUnrbIKqQjwvvvQHabOaGdu/hEXIztO'),
(2, 'Anna Gromyko', '', 'anna.gromyko@student.griffith.ie', '+7 899837325', 'admin', ''),
(3, 'Getrude', '', 'getty@gmail.com', '+353 80993423', 'admin', ''),
(4, 'John Doe', '', 'john.doe@example.com', '+1 1234567890', 'admin', '$2y$10$8RQvmlNMINTuVqbWl5N7AegJP1aRTD8KqszBQ4CQTuxAlQnbu1Usa'),
(5, 'Jane Smith', '', 'jane.smith@example.com', '+1 0987654321', 'landlord', '$2y$10$JQoMEsQoEVJs4hKO/g18OO/jrSOeoO.Kjv877L1MXsRvcDjCzAYme'),
(6, 'Michael Johnson', '', 'michael.johnson@example.com', '+1 9876543210', 'tenants', ''),
(7, 'Emily Brown', '', 'emily.brown@example.com', '+1 5678901234', 'admin', ''),
(8, 'David Lee', '', 'david.lee@example.com', '+1 4321098765', 'landlord', '$2y$10$HwrCESiwAXgWnEverDacBe9uXJpJFz0mZxrphk2lxpOT104QpCp0O'),
(9, 'Sarah Wang', '', 'sarah.wang@example.com', '+1 3210987654', 'tenants', ''),
(10, 'Alexandra Garcia', '', 'alexandra.garcia@example.com', '+1 2109876543', 'admin', ''),
(11, 'Matthew Taylor', '', 'matthew.taylor@example.com', '+1 7890123456', 'landlord', ''),
(12, 'Olivia Martinez', '', 'olivia.martinez@example.com', '+1 9012345678', 'tenants', ''),
(13, 'Daniel Rodriguez', '', 'daniel.rodriguez@example.com', '+1 3456789012', 'admin', ''),
(14, 'getrude', 'cherono', 'gcherono15@gmail.com', '+353899797711', 'tenants', '$2y$10$VLhnFsG64RaTgrc0AuFdven8o214WMpoKA1j0dS2z/E'),
(15, 'gemie', 'cherono', 'gcherono156@gmail.com', '+353899797711', 'tenants', '$2y$10$lK4AHoDxn4W81E9jtRPFVOc3VcDKF4TCAy0c7goH9bS'),
(16, 'getrude', 'cherono', 'gcherono@gmail.com', '+353899797711', 'tenants', '$2y$10$Wm7/i418AuH8uCT7s5VWYu7nBjetPpMi0P9/MWjlJU4'),
(17, 'Anna', 'Gromyko', '2004gromyko@gmail.com', '+353874118317', 'tenants', '$2y$10$G025o5QbRVlPIlKNI/EA9.zB.8hfm8MMCWRJRaXBnj8QJYQjBZPdq'),
(19, 'getrude', 'cherono', '12@gmail.com', '+353899797711', 'tenants', '$2y$10$3eK7sgmWtfLcH.NtdckK9.OBJB6f2gXdURBHtJkoQPuZo7033oCM.'),
(20, 'george', 'Mobisa', 'gm@gmail.com', '+353899797711', 'tenants', '$2y$10$erwwaSxCGIl3EseB2xfpNedJdVsUQB4Kn/pxvG/IsrZXETqHqIG9.'),
(21, 'ggetty', 'jjuu', 'gn@gmail.com', '+353899797711', 'tenants', '$2y$10$5dvZpNAmm8xmTzqziRE8geljbdi74dhmWyLGEYdru3ITI1IicG5Ha'),
(22, 'admin', 'Getrude', 'admin@gmail.com', '+353899797711', 'admin', '$2y$10$wT.5cVBTPWR/jG9tY9FDHex4fSvlRE77kkJW0c7KQcQmLSSRzTexO'),
(23, 'bernie', 'daluz', 'hello@gmail.com', '+353899856434', 'tenants', '$2y$10$fBMomYwuqBdW5laaTMMibu9l8KhQzfQwnx.fuUvOmNBYRLUfbl6ja'),
(24, 'Kimmy', 'Sharry', 'km@gmail.com', '+353899797711', 'tenants', '$2y$10$Qqel01ECTbFXT1qrZplG6ObtxNiJWv6ziqK0ff2EC4sa8xYBEgJGe'),
(25, 'getrude', 'cherono', '15@gmail.com', '+353899797711', 'tenants', '$2y$10$j1JFFkXSIeVKUWSyoGYkPe1AY8/ePEZsXPBmbluEdfL7/N6piDjF2'),
(28, 'mert', 'hello', 'marksiri003@gmail.com', '+353899856434', 'landlord', '$2y$10$J5fwPCPhGjE.UTHK7oiYv.f.tm2w9IYt3ivFULkJVyL4D5HoF.bUa'),
(29, 'mert', 'faruk', 'mertfarukg@gmail.com', '+353899856434', 'landlord', '$2y$10$hmzsfEwa8TD3Ng2c1mre7OZ2SJ8cyu1efsKkYyMih0S9va7pyv20i');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL COMMENT 'unique feedback ID',
  `name` varchar(50) NOT NULL COMMENT 'name of person',
  `mail` varchar(50) NOT NULL COMMENT 'mail ID of person',
  `mobile` varchar(20) NOT NULL COMMENT 'mobile number of person',
  `subject` varchar(200) NOT NULL COMMENT 'subject of feedback',
  `message` text NOT NULL COMMENT 'feedback message '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `name`, `mail`, `mobile`, `subject`, `message`) VALUES
(1, 'ANNA GROMYKO', '2004gromyko@gmail.com', '+1234566', 'blabla', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec ipsum vel mi viverra efficitur. In felis enim, finibus et fringilla eu, pellentesque dictum dolor. Proin aliquam facilisis justo, ac condimentum mi. Suspendisse vel ipsum pharetra, consectetur neque lacinia, malesuada metus. Ut quis augue neque. Quisque semper vehicula nunc, sit amet facilisis lacus luctus vel. Quisque tincidunt fringilla eros, sed euismod mauris rutrum vitae. Nulla quis odio eleifend, accumsan est ut, maximus turpis. Nam convallis dolor ac urna dictum facilisis. Nunc eu porta orci, in iaculis odio. Pellentesque commodo metus nisl, sed posuere augue bibendum vitae. Quisque quis lacus efficitur, luctus arcu nec, tincidunt leo. Vivamus ac pharetra risus. Proin dapibus malesuada urna ut pretium.'),
(2, 'Anastasiia Gromyko ', 'anastasiia.gromyko@gmail.com', '+12345677', 'Apartment ', 'Nullam lacinia erat id est iaculis, vitae aliquet ligula sollicitudin. Nulla tortor dolor, accumsan non blandit non, ultricies fringilla quam. Phasellus et sem et magna ullamcorper congue. Proin in ligula tempor, condimentum libero non, tempus lectus. Mauris ut metus et arcu porta vulputate eu eget lorem. In hac habitasse platea dictumst. Quisque laoreet lorem rutrum quam vestibulum, ac pellentesque urna suscipit. Mauris sed massa in lorem efficitur gravida sit amet in risus. Nunc lacinia tortor non nunc accumsan, eu aliquam magna malesuada. Suspendisse sed dictum sapien. Mauris ultrices congue nisl, vel sagittis urna pretium eu. Nam sagittis, lacus id imperdiet luctus, mauris odio commodo orci, ut ornare lacus purus vel elit.\r\n\r\n'),
(4, 'joshan', 'edwin.wilson@student.griffith.ie', '+353899856434', 'Bug 2.0', 'I can\'t view Contact Us form as a landlord'),
(5, 'joshan', 'edwin.wilson@student.griffith.ie', '+353899856434', 'Bug 2.0', 'I can\'t view Contact Us form as a landlord'),
(6, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'gghh', 'gggg'),
(7, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'gghh', 'gggg'),
(8, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'gghh', 'gggg'),
(9, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'gghh', 'ggg'),
(10, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'gghh', 'ggg'),
(11, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'hh', 'mm'),
(12, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'hh', 'mm'),
(13, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'hh', 'mm'),
(14, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'hh', 'mm'),
(15, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'hh', 'mm'),
(16, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'hh', 'mm'),
(17, 'Getrude Cherono', 'gcherono15@gmail.com', '0899797711', 'hh', 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE `landlord` (
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `management_fees` int(11) NOT NULL,
  `net_income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landlord`
--

INSERT INTO `landlord` (`user_id`, `property_id`, `tenant_id`, `income`, `commission`, `management_fees`, `net_income`) VALUES
(5, 1, 16, 13, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL COMMENT 'unique property ID',
  `user_id` int(11) NOT NULL COMMENT 'unique user ID',
  `Name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL COMMENT 'property address',
  `eircode` varchar(10) NOT NULL COMMENT 'eircode of property',
  `category` enum('house','apartment') NOT NULL COMMENT 'category of property ',
  `price` decimal(10,0) NOT NULL COMMENT 'price of property',
  `start_date` date NOT NULL COMMENT 'start date of availability',
  `end_date` date NOT NULL COMMENT 'end date of availability',
  `description` text NOT NULL COMMENT 'description for property',
  `num_beds` int(50) NOT NULL,
  `size` int(50) NOT NULL,
  `agreement` text,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `user_id`, `Name`, `address`, `eircode`, `category`, `price`, `start_date`, `end_date`, `description`, `num_beds`, `size`, `agreement`, `image`) VALUES
(1, 2, 'Ann\'s Home', 'Griffith Hall Of Residence South Circular road ', 'D08 H4U9', 'apartment', '1400', '2024-04-10', '2024-04-30', 'Griffith Halls of Residence (GHR) is purpose-built student accommodation located in Dublin 8, a desirable neighbourhood just a few minutes’ walk south of the city centre. GHR is pleased to open its doors to tourists from all over the world exclusively during our summer months.', 2, 2000, 'This agreement serves as a contract  for the tenancy of the property\r\nRent: The monthly rent for the property should be paid on time\r\nMaintenance: The tenant agrees to maintain the property in good condition and promptly report any damages or maintenance issues to the landlord.\r\nUse of Property: The property is to be used solely for residential purposes and not for any illegal activities.\r\nPets: No pets allowed\r\nSubletting: Subletting of the property is strictly prohibited without prior written consent from the landlord.\r\nTermination: Either party may terminate this agreement with written notice.\r\nBy signing this agreement, you agree to abide by the terms and conditions outlined herein.', '/Assets/images/property/1.jpg'),
(2, 2, 'greenspan', 'st mary', 'D09T1UT', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/2.jpg'),
(3, 2, 'greenspan', 'st mary', 'D01GH7T', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/3.jpg'),
(4, 2, 'greenspan', 'st mary', 'D02R4EF', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(5, 2, 'greenspan', 'st mary', 'D03T6B4', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(6, 2, 'greenspan', 'st mary', 'D05W8QS', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(7, 2, 'greenspan', 'st mary', 'D07HJ8I', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(8, 2, 'greenspan', 'st mary', 'D10PI7Y', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(9, 2, 'greenspan', 'st mary', 'D11X3ER', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(10, 2, 'greenspan', 'st mary', 'D12K9IK', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(11, 2, 'greenspan', 'st mary', 'D13O9PC', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(12, 2, 'greenspan', 'st mary', 'D16SE7Y', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(13, 2, 'greenspan', 'st mary', 'D24P0IK', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(14, 2, 'greenspan', 'st mary', 'D22KM9I', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(15, 2, 'greenspan', 'st mary', 'D01IOP2', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL, '/Assets/images/property/1.jpg'),
(16, 1, 'Tyrell', '12 st', 'D15N6X2', 'house', '230', '2024-04-04', '2024-04-30', 'gggh', 2, 300, NULL, '/Assets/images/property/1.jpg'),
(17, 1, '', '12 st', 'D15N6X2', 'house', '230', '2024-04-04', '2024-04-30', 'gggh', 2, 300, NULL, '/Assets/images/property/1.jpg'),
(18, 1, 'Gracefield view', '12 mary', 'D16LI9O', 'apartment', '2300', '2024-04-05', '2024-04-30', 'Loft apartment', 2, 3000, NULL, '/Assets/images/property/1.jpg'),
(19, 1, 'Hotel', '15 The Boulevard, Mount Eustace', 'D05FV12', 'house', '6000', '2024-05-03', '2024-05-07', 'very good', 5, 300, 'do not shout', '/Assets/images/property/1.jpg'),
(20, 1, 'joshan', 'SHHDNSJodn sdohsld vs', 'D01AY09', 'apartment', '19099299', '2024-05-03', '2024-05-23', 'hello getty it&amp;#039;s me joshan. I&amp;#039;m so bad', 4, 22000, 'I have no rules', '/Assets/images/property/1.jpg'),
(21, 1, 'Hotel', 'hj', 'D05FV12', 'house', '78', '2024-04-25', '2024-05-09', 'jhjj', 7, 3000, 'nnnnn', '/Assets/images/property/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL COMMENT 'unique review ID',
  `user_id` int(11) NOT NULL COMMENT 'user_id of reviewer',
  `title` varchar(150) NOT NULL COMMENT 'title of review',
  `message` varchar(200) NOT NULL COMMENT 'review message',
  `visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'visiblity of review'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `title`, `message`, `visible`) VALUES
(7, 4, 'Effortless experience', '\"Wander Wave made my house hunting experience effortless! Their extensive listings and user-friendly interface helped me find my dream home in no time.\"', 1),
(8, 5, 'Smooth sailing!', '\"I couldn\'t be happier with the service provided by Wander Wave. From browsing listings to signing my lease, everything was smooth sailing!\"', 0),
(9, 6, 'A breeze!', '\"As a landlord, listing my property on Wander Wave was a breeze. Within days, I had interested tenants lining up. Highly recommend!\"', 1),
(10, 7, 'Amazing service', '\"Wander Wave\'s attention to detail and personalized approach truly set them apart. They listened to my needs and found me the perfect apartment.\"', 0),
(11, 8, 'Helpful team', '\"I stumbled upon Wander Wave while searching for a new rental, and I\'m so glad I did! Their website is intuitive, and their team is incredibly helpful.\"', 0),
(12, 9, 'Professional service', '\"Wander Wave exceeded my expectations in every way possible. Professional, efficient, and trustworthy. I wouldn\'t hesitate to recommend them to anyone in search of a new home.\"', 0),
(13, 10, 'Professional service', '\"Wander Wave exceeded my expectations in every way possible. Professional, efficient, and trustworthy. I wouldn\'t hesitate to recommend them to anyone in search of a new home.\"', 0),
(14, 11, 'Fast response', '\"Wander Wave exceeded my expectations in every way possible. Professional, efficient, and trustworthy. I wouldn\'t hesitate to recommend them to anyone in search of a new home.\"', 1),
(15, 12, 'Awesome   houses', '\"Thank you, Wander Wave, for helping me find the perfect apartment. Your website made it easy to narrow down my options and connect with landlords. I\'m thrilled with my new place!\"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `user_ID` int(11) NOT NULL,
  `property_ID` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `agreement` tinyint(1) DEFAULT NULL,
  `amountPaid` double NOT NULL DEFAULT '650',
  `amountOwed` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`user_ID`, `property_ID`, `start_date`, `end_date`, `agreement`, `amountPaid`, `amountOwed`) VALUES
(16, 1, '2024-04-30', '2024-05-11', 1, 650, 0),
(19, NULL, NULL, NULL, NULL, 650, 0),
(21, NULL, '2024-04-24', '2024-05-07', NULL, 800, 0),
(23, NULL, NULL, NULL, NULL, 650, 0),
(24, 1, '2024-04-30', '2024-05-03', 1, 900, 0),
(25, 1, '2024-04-30', '2024-08-10', 1, 650, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `appliances`
--
ALTER TABLE `appliances`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `appuser`
--
ALTER TABLE `appuser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `properties_ibfk_1` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD KEY `user` (`user_ID`),
  ADD KEY `property` (`property_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique ad ID', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `appliances`
--
ALTER TABLE `appliances`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `appuser`
--
ALTER TABLE `appuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique user ID', AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique feedback ID', AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique property ID', AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique review ID', AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appliances`
--
ALTER TABLE `appliances`
  ADD CONSTRAINT `appliances_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `landlord`
--
ALTER TABLE `landlord`
  ADD CONSTRAINT `landlord_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `property` FOREIGN KEY (`property_ID`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_ID`) REFERENCES `appuser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
