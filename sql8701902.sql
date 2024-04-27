-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql8.freesqldatabase.com
-- Generation Time: Apr 26, 2024 at 10:18 PM
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
(1, 1, 1, 1, 0, 1);

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
  `access` enum('landlord','public','tenants','admin') NOT NULL DEFAULT 'public' COMMENT 'type of access for user (admin, landlord, Tenants)',
  `password` varchar(80) NOT NULL COMMENT 'user password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appuser`
--

INSERT INTO `appuser` (`user_id`, `firstName`, `lastName`, `email`, `mobile`, `access`, `password`) VALUES
(1, 'Joshan John', '', 'joshanjohn2003@gmail.com', '+7 899837325', 'admin', '$2y$10$W44fpfTDHQpCoWrAmcdlfuCz9aPv4W0MTZCNJr9rHcPhuIjMRVf3G'),
(2, 'Anna Gromyko', '', 'anna.gromyko@student.griffith.ie', '+7 899837325', 'admin', ''),
(3, 'Getrude', '', 'getty@gmail.com', '+353 80993423', 'admin', ''),
(4, 'John Doe', '', 'john.doe@example.com', '+1 1234567890', 'admin', ''),
(5, 'Jane Smith', '', 'jane.smith@example.com', '+1 0987654321', 'landlord', ''),
(6, 'Michael Johnson', '', 'michael.johnson@example.com', '+1 9876543210', 'public', ''),
(7, 'Emily Brown', '', 'emily.brown@example.com', '+1 5678901234', 'admin', ''),
(8, 'David Lee', '', 'david.lee@example.com', '+1 4321098765', 'landlord', ''),
(9, 'Sarah Wang', '', 'sarah.wang@example.com', '+1 3210987654', 'public', ''),
(10, 'Alexandra Garcia', '', 'alexandra.garcia@example.com', '+1 2109876543', 'admin', ''),
(11, 'Matthew Taylor', '', 'matthew.taylor@example.com', '+1 7890123456', 'landlord', ''),
(12, 'Olivia Martinez', '', 'olivia.martinez@example.com', '+1 9012345678', 'public', ''),
(13, 'Daniel Rodriguez', '', 'daniel.rodriguez@example.com', '+1 3456789012', 'admin', ''),
(14, 'getrude', 'cherono', 'gcherono15@gmail.com', '+353899797711', '', '$2y$10$VLhnFsG64RaTgrc0AuFdven8o214WMpoKA1j0dS2z/E'),
(15, 'gemie', 'cherono', 'gcherono156@gmail.com', '+353899797711', '', '$2y$10$lK4AHoDxn4W81E9jtRPFVOc3VcDKF4TCAy0c7goH9bS'),
(16, 'getrude', 'cherono', 'gcherono@gmail.com', '+353899797711', '', '$2y$10$Wm7/i418AuH8uCT7s5VWYu7nBjetPpMi0P9/MWjlJU4');

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
(2, 'Anastasiia Gromyko ', 'anastasiia.gromyko@gmail.com', '+12345677', 'Apartment ', 'Nullam lacinia erat id est iaculis, vitae aliquet ligula sollicitudin. Nulla tortor dolor, accumsan non blandit non, ultricies fringilla quam. Phasellus et sem et magna ullamcorper congue. Proin in ligula tempor, condimentum libero non, tempus lectus. Mauris ut metus et arcu porta vulputate eu eget lorem. In hac habitasse platea dictumst. Quisque laoreet lorem rutrum quam vestibulum, ac pellentesque urna suscipit. Mauris sed massa in lorem efficitur gravida sit amet in risus. Nunc lacinia tortor non nunc accumsan, eu aliquam magna malesuada. Suspendisse sed dictum sapien. Mauris ultrices congue nisl, vel sagittis urna pretium eu. Nam sagittis, lacus id imperdiet luctus, mauris odio commodo orci, ut ornare lacus purus vel elit.\r\n\r\n');

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
  `agreement` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `user_id`, `Name`, `address`, `eircode`, `category`, `price`, `start_date`, `end_date`, `description`, `num_beds`, `size`, `agreement`) VALUES
(1, 2, 'Ann\'s Home', 'Griffith Hall Of Residence South Circular road ', 'D08 H14U9', 'apartment', '1400', '2024-04-10', '2024-04-30', 'Griffith Halls of Residence (GHR) is purpose-built student accommodation located in Dublin 8, a desirable neighbourhood just a few minutes’ walk south of the city centre. GHR is pleased to open its doors to tourists from all over the world exclusively during our summer months.', 2, 2000, 'This agreement serves as a contract  for the tenancy of the property\r\n\r\nRent: The monthly rent for the property should be paid on time\r\nMaintenance: The tenant agrees to maintain the property in good condition and promptly report any damages or maintenance issues to the landlord.\r\nUse of Property: The property is to be used solely for residential purposes and not for any illegal activities.\r\nPets: No pets allowed\r\nSubletting: Subletting of the property is strictly prohibited without prior written consent from the landlord.\r\nTermination: Either party may terminate this agreement with [Notice Period] written notice.\r\nBy signing this agreement, you agree to abide by the terms and conditions outlined herein.'),
(2, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(3, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(4, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(5, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(6, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(7, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(8, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(9, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(10, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(11, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(12, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(13, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(14, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(15, 2, 'greenspan', 'st mary', 'DFV102', 'apartment', '2100', '2024-12-02', '2024-12-23', 'good', 4, 200, NULL),
(16, 1, 'Tyrell', '12 st', 'D15N6X2', 'house', '230', '2024-04-04', '2024-04-30', 'gggh', 2, 300, NULL),
(17, 1, 'Tyrell', '12 st', 'D15N6X2', 'house', '230', '2024-04-04', '2024-04-30', 'gggh', 2, 300, NULL),
(18, 1, 'Gracefield view', '12 mary', 'A344555', 'apartment', '2300', '2024-04-05', '2024-04-30', 'Loft apartment', 2, 3000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `property_id` int(11) NOT NULL COMMENT 'unique property ID',
  `image_path` varchar(50) NOT NULL COMMENT 'image path'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL COMMENT 'unique review ID',
  `user_id` int(11) NOT NULL COMMENT 'user_id of reviewer',
  `title` varchar(150) NOT NULL COMMENT 'title of review',
  `message` varchar(150) NOT NULL COMMENT 'review message',
  `visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'visiblity of review'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `title`, `message`, `visible`) VALUES
(7, 4, 'Awsome Website', 'Lorem Ipsum website offers a sleek design and user-friendly interface. However, the content seems lacking in depth, and navigation could be smoother.', 1),
(8, 5, '', 'I appreciate the user-friendly interface, but there are some broken links that need fixing.', 0),
(9, 6, '', 'The website provides valuable information, but the lack of mobile responsiveness is disappointing.', 1),
(10, 7, '', 'I love the interactive features on the website, but the font choice could be improved for better readability.', 0),
(11, 8, '', 'The website navigation is intuitive, but I encountered some bugs while using the search function.', 0),
(12, 9, '', 'Overall, the website offers a great user experience, but I wish there were more frequent updates on the content.', 0),
(13, 10, '', 'The website layout is clean and organized, but I struggled to find the contact information for customer support.', 0),
(14, 11, '', 'I found the website content to be comprehensive and well-researched, but the lack of multimedia elements makes it less engaging.', 1),
(15, 12, '', 'The website offers valuable resources for users, but I encountered difficulties while trying to submit feedback through the online form.', 0);

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
(16, NULL, NULL, NULL, NULL, 650, 0);

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
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `properties_ibfk_1` (`user_id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD KEY `property_id` (`property_id`);

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
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appuser`
--
ALTER TABLE `appuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique user ID', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique feedback ID', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique property ID', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique review ID', AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appliances`
--
ALTER TABLE `appliances`
  ADD CONSTRAINT `appliances_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
