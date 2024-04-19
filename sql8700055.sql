-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql8.freesqldatabase.com
-- Generation Time: Apr 19, 2024 at 12:39 PM
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
-- Database: `sql8700055`
--

-- --------------------------------------------------------

--
-- Table structure for table `appuser`
--

CREATE TABLE `appuser` (
  `user_id` int(11) NOT NULL COMMENT 'unique user ID',
  `name` varchar(50) NOT NULL COMMENT 'name of user',
  `mail` varchar(50) NOT NULL COMMENT 'mail ID of user',
  `address` varchar(250) NOT NULL COMMENT 'address of user',
  `pincode` varchar(10) NOT NULL COMMENT 'pincode of address',
  `city` varchar(50) NOT NULL COMMENT 'name of city',
  `mobile` varchar(20) NOT NULL COMMENT 'mobile number of user',
  `access` varchar(10) NOT NULL COMMENT 'type of access for user (admin, landlord, Tenants)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appuser`
--

INSERT INTO `appuser` (`user_id`, `name`, `mail`, `address`, `pincode`, `city`, `mobile`, `access`) VALUES
(1, 'Joshan John', 'joshanjohn2003@gmail.com', '49, Cassian cout', 'D15AY09', 'Dublin', '+7 899837325', 'admin'),
(2, 'Anna Gromyko', 'anna.gromyko@student.griffith.ie', 'GHR Dublin ', 'D08 DF87', 'Dublin', '+7 899837325', 'admin'),
(3, 'Getrude', 'getty@gmail.com', 'London ', 'D08 DF87', 'London ', '+353 80993423', 'admin'),
(4, 'John Doe', 'john.doe@example.com', '123 Main St', '12345', 'Anytown', '+1 1234567890', 'admin'),
(5, 'Jane Smith', 'jane.smith@example.com', '456 Elm St', '54321', 'Othertown', '+1 0987654321', 'landlord'),
(6, 'Michael Johnson', 'michael.johnson@example.com', '789 Oak St', '67890', 'Anycity', '+1 9876543210', 'tenant'),
(7, 'Emily Brown', 'emily.brown@example.com', '101 Pine St', '45678', 'Sometown', '+1 5678901234', 'admin'),
(8, 'David Lee', 'david.lee@example.com', '202 Cedar St', '98765', 'Yourtown', '+1 4321098765', 'landlord'),
(9, 'Sarah Wang', 'sarah.wang@example.com', '303 Maple St', '23456', 'Newtown', '+1 3210987654', 'tenant'),
(10, 'Alexandra Garcia', 'alexandra.garcia@example.com', '404 Birch St', '87654', 'Heretown', '+1 2109876543', 'admin'),
(11, 'Matthew Taylor', 'matthew.taylor@example.com', '505 Walnut St', '34567', 'Thistown', '+1 7890123456', 'landlord'),
(12, 'Olivia Martinez', 'olivia.martinez@example.com', '606 Pineapple St', '65432', 'Everytown', '+1 9012345678', 'tenant'),
(13, 'Daniel Rodriguez', 'daniel.rodriguez@example.com', '707 Banana St', '54321', 'Wheretown', '+1 3456789012', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL COMMENT 'unique feedback ID',
  `name` varchar(50) NOT NULL COMMENT 'name of person',
  `mail` varchar(50) NOT NULL COMMENT 'mail ID of person',
  `mobile` varchar(20) NOT NULL COMMENT 'mobile number of person',
  `message` text NOT NULL COMMENT 'feedback message '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL COMMENT 'unique property ID',
  `user_id` int(11) NOT NULL COMMENT 'unique user ID',
  `address` varchar(250) NOT NULL COMMENT 'property address',
  `city` varchar(50) NOT NULL COMMENT 'name of city',
  `postcode` varchar(10) NOT NULL COMMENT 'postcode of property',
  `category` enum('buy','share','rent') NOT NULL COMMENT 'category of property (Rent, Shared, Buy)',
  `price` decimal(10,0) NOT NULL COMMENT 'price of property',
  `availability` date NOT NULL COMMENT 'date of availability of property',
  `description` text NOT NULL COMMENT 'description for property'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL COMMENT 'unique review ID',
  `user_id` int(11) NOT NULL COMMENT 'user_id of reviewer',
  `message` varchar(150) NOT NULL COMMENT 'review message',
  `visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'visiblity of review'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `message`, `visible`) VALUES
(7, 4, 'Lorem Ipsum website offers a sleek design and user-friendly interface. However, the content seems lacking in depth, and navigation could be smoother.', 0),
(8, 5, 'I appreciate the user-friendly interface, but there are some broken links that need fixing.', 1),
(9, 6, 'The website provides valuable information, but the lack of mobile responsiveness is disappointing.', 0),
(10, 7, 'I love the interactive features on the website, but the font choice could be improved for better readability.', 1),
(11, 8, 'The website navigation is intuitive, but I encountered some bugs while using the search function.', 1),
(12, 9, 'Overall, the website offers a great user experience, but I wish there were more frequent updates on the content.', 0),
(13, 10, 'The website layout is clean and organized, but I struggled to find the contact information for customer support.', 0),
(14, 11, 'I found the website content to be comprehensive and well-researched, but the lack of multimedia elements makes it less engaging.', 0),
(15, 12, 'The website offers valuable resources for users, but I encountered difficulties while trying to submit feedback through the online form.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appuser`
--
ALTER TABLE `appuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `properties_ibfk_1` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appuser`
--
ALTER TABLE `appuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique user ID', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique feedback ID';
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique property ID';
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique review ID', AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
