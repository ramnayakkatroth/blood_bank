-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 11:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_request_tracker`
--

CREATE TABLE `blood_request_tracker` (
  `receiver_id` int(11) NOT NULL,
  `sample_id` bigint(20) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `b1_status` int(3) NOT NULL DEFAULT 0,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_request_tracker`
--

INSERT INTO `blood_request_tracker` (`receiver_id`, `sample_id`, `hospital_id`, `b1_status`, `date_requested`) VALUES
(1, 7, 18, 1, '2021-07-14 04:38:07'),
(1, 9, 18, 0, '2021-07-14 06:23:14'),
(1, 11, 18, 0, '2021-07-14 06:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `blood_sample`
--

CREATE TABLE `blood_sample` (
  `sample_id` bigint(20) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `sample_name` varchar(255) NOT NULL,
  `sample_type` varchar(5) NOT NULL,
  `b_status` int(3) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_sample`
--

INSERT INTO `blood_sample` (`sample_id`, `hospital_id`, `sample_name`, `sample_type`, `b_status`, `date_added`) VALUES
(7, 18, 'diabetic', 'A-', 1, '2021-07-12 12:16:47'),
(9, 18, 'diabetic', 'B+', 1, '2021-07-12 12:17:02'),
(11, 18, 'pregnant', 'B-', 1, '2021-07-12 12:20:32'),
(12, 18, 'diabetic', 'A+', 1, '2021-07-12 12:27:46'),
(14, 18, 'something', 'A-', 2, '2021-07-13 15:30:19'),
(15, 18, 'pregnant', 'AB+', 0, '2021-07-14 05:49:23'),
(22, 18, 'diabetic', 'AB-', 0, '2021-07-14 06:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `h_address` text NOT NULL,
  `h_image` varchar(255) DEFAULT NULL,
  `h_contact` varchar(20) NOT NULL,
  `h_email` varchar(255) NOT NULL,
  `h_password` char(60) NOT NULL,
  `h_date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `h_name`, `h_address`, `h_image`, `h_contact`, `h_email`, `h_password`, `h_date_added`) VALUES
(18, 'neeraj123', 'sadssdsaa', 'signature.jpg', '2552252', 'katrothramnayakww@gmail.com', 'rgukt123', '2021-07-12 03:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `receiver_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_address` text NOT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_mobile` varchar(255) NOT NULL,
  `r_blood_type` varchar(5) NOT NULL,
  `r_photo` varchar(255) NOT NULL,
  `r_password` char(60) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`receiver_id`, `r_name`, `r_address`, `r_email`, `r_mobile`, `r_blood_type`, `r_photo`, `r_password`, `date_added`) VALUES
(1, 'neeraj', 'sadssdsaa', 'katrothramnayak@gmail.com', '2552252', 'a+', 'writing.jpg', 'rgukt', '2021-07-12 04:23:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_request_tracker`
--
ALTER TABLE `blood_request_tracker`
  ADD UNIQUE KEY `receiver_id_sample_id` (`receiver_id`,`sample_id`),
  ADD KEY `sample_id` (`sample_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `blood_sample`
--
ALTER TABLE `blood_sample`
  ADD PRIMARY KEY (`sample_id`),
  ADD UNIQUE KEY `sample_name` (`sample_name`,`sample_type`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`),
  ADD UNIQUE KEY `hospital_contact_email` (`h_email`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`receiver_id`),
  ADD UNIQUE KEY `receiver_contact_email` (`r_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_sample`
--
ALTER TABLE `blood_sample`
  MODIFY `sample_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_request_tracker`
--
ALTER TABLE `blood_request_tracker`
  ADD CONSTRAINT `blood_request_tracker_ibfk_3` FOREIGN KEY (`receiver_id`) REFERENCES `receiver` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `blood_request_tracker_ibfk_4` FOREIGN KEY (`sample_id`) REFERENCES `blood_sample` (`sample_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `blood_request_tracker_ibfk_6` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `blood_sample`
--
ALTER TABLE `blood_sample`
  ADD CONSTRAINT `blood_sample_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
