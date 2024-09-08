-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Sep 08, 2024 at 09:10 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h2o-core-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `question1` varchar(255) DEFAULT NULL,
  `question2` varchar(255) DEFAULT NULL,
  `question3` varchar(255) DEFAULT NULL,
  `question4` varchar(255) DEFAULT NULL,
  `question5` varchar(255) DEFAULT NULL,
  `question6` varchar(255) DEFAULT NULL,
  `question7` varchar(255) DEFAULT NULL,
  `question8` varchar(255) DEFAULT NULL,
  `question9` varchar(255) DEFAULT NULL,
  `question10` varchar(255) DEFAULT NULL,
  `question11` varchar(255) DEFAULT NULL,
  `question12` varchar(255) DEFAULT NULL,
  `question13` varchar(255) DEFAULT NULL,
  `question14` varchar(255) DEFAULT NULL,
  `question15` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `question11`, `question12`, `question13`, `question14`, `question15`) VALUES
(1, 'Very important', 'Turning off the tap while brushing teeth', 'Every day', 'Financial savings', 'Yes', 'Yes', 'Yes', 'Regularly', 'Using a dishwasher only when fully loaded', 'Yes', 'Offering rebates for water-saving appliances', 'Yes', 'Using a water meter', 'Yes', 'Financial incentives'),
(2, 'Somewhat important', 'Fixing leaks promptly', 'Several times a week', 'Environmental reasons', 'No', 'No', 'No', 'Occasionally', 'Washing clothes with full loads only', 'No', 'Mandating water-efficient landscaping in new developments', 'No', 'Keeping water bills for reference', 'No', 'Learning about the environmental impact of water waste'),
(3, 'Not important', 'Using a water-efficient showerhead', 'Rarely', 'Community responsibility', 'Yes', 'Yes', 'Not sure', 'Rarely', 'Taking shorter showers', 'Yes', 'Implementing strict water use restrictions', 'Yes', 'Not actively tracking', 'I want to', 'Access to resources for water-efficient changes'),
(4, 'Very important', 'All of the above', 'Never', 'Regulations', 'No', 'No', 'Not sure', 'Never', 'All of the above', 'No', 'All of the above', 'Not sure', 'All of the above', 'I want to', 'All of the above'),
(5, 'Somewhat important', 'Using a water-efficient showerhead', 'Several times a week', 'Community responsibility', 'Yes', 'No', 'Not sure', 'Regularly', 'Using a broom instead of a hose to clean driveways/paths', 'No', 'Mandating water-efficient landscaping in new developments', 'Yes', 'Using a water meter', 'I want to', 'Learning about the environmental impact of water waste'),
(6, 'Somewhat important', 'Using a water-efficient showerhead', 'Rarely', 'Regulations', 'No', 'No', 'Not sure', 'Occasionally', 'Taking shorter showers', 'No', 'Implementing strict water use restrictions', 'Not sure', 'Monitoring usage through a smart device/app', 'I want to', 'Access to resources for water-efficient changes'),
(7, 'Not important', 'Collecting rainwater for plants', 'Several times a week', 'Regulations', 'No', 'Yes', 'Not sure', 'Occasionally', 'Washing clothes with full loads only', 'Yes', 'Educating the public about water conservation', 'No', 'Monitoring usage through a smart device/app', 'No', 'Seeing others in the community conserve water');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
