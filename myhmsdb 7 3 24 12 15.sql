-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `user_date` varchar(50) NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  `appdate` varchar(50) NOT NULL,
  `apptime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `user_date`, `userStatus`, `doctorStatus`, `status`, `appdate`, `apptime`) VALUES
(10, 34, 'Raman', 'Kumar  ', 'Male', 'ram@gmail.com    ', '987650000 ', 'aparna', 400, 'Mon Mar 25 2024', 1, 1, '', 'Monday', '2024-03-06'),
(10, 35, 'Raman', 'Kumar  ', 'Male', 'ram@gmail.com    ', '987650000 ', 'aparna', 400, 'Fri Mar 22 2024', 1, 1, '', 'Friday', '2024-03-06'),
(10, 36, 'Raman', 'Kumar  ', 'Male', 'ram@gmail.com    ', '987650000 ', 'viswas', 800, 'Mon Mar 25 2024', 1, 1, '', 'Monday', '2024-03-06'),
(10, 37, 'Raman', 'Kumar  ', 'Male', 'ram@gmail.com    ', '987650000 ', 'banu', 210, 'Tue Mar 26 2024', 1, 1, '', 'Tuesday', '2024-03-06'),
(10, 38, 'Raman', 'Kumar  ', 'Male', 'ram@gmail.com    ', '987650000 ', 'venu', 210, 'Mon Mar 11 2024', 1, 1, '', 'Monday', '2024-03-06'),
(10, 39, 'Raman', 'Kumar   ', 'Male', 'ram@gmail.com     ', '9876500001', 'anoop', 700, 'Thu Mar 21 2024', 1, 1, '', 'Thursday', '2024-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `contact`, `message`) VALUES
('Anu', 'anu@gmail.com', '7896677554', 'Hey Admin'),
(' Viki', 'viki@gmail.com', '9899778865', 'Good Job, Pal'),
('Ananya', 'ananya@gmail.com', '9997888879', 'How can I reach you?'),
('Aakash', 'aakash@gmail.com', '8788979967', 'Love your site'),
('Mani', 'mani@gmail.com', '8977768978', 'Want some coffee?'),
('Karthick', 'karthi@gmail.com', '9898989898', 'Good service'),
('Abbis', 'abbis@gmail.com', '8979776868', 'Love your service'),
('Asiq', 'asiq@gmail.com', '9087897564', 'Love your service. Thank you!'),
('Jane', 'jane@gmail.com', '7869869757', 'I love your service!');

-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE `doctb` (
  `did` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` date DEFAULT NULL,
  `qualification` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `avialabletime` varchar(100) NOT NULL,
  `experience` text NOT NULL,
  `place` text NOT NULL,
  `district` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `joiningDate` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `resignDate` text DEFAULT NULL,
  `inactiveReason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`did`, `username`, `password`, `email`, `spec`, `docFees`, `name`, `age`, `qualification`, `gender`, `avialabletime`, `experience`, `place`, `district`, `image`, `contact`, `location`, `joiningDate`, `status`, `resignDate`, `inactiveReason`) VALUES
(1, 'akshay', 'akshay', 'akshay@gmail.com         ', 'Neurology         ', 1000, 'akshay', '1999-04-20', 'MBBS,MD     ', 'Male', 'Monday,Friday,Saturday', '3 Year in AIAS     ', 'Kerala     ', 'Alappuzha         ', '306473.png', '8745639234         ', 'sabarimala    ', '2024-02-17 22:54:28', 'inactive', ' 2024-02-19', 'Not Available'),
(2, 'aparna', 'aparna123', 'aparna@gmail.com', 'Geriatric Medicine', 400, 'aparna', '2005-02-05', 'mbbs', 'Female', 'Monday,Wednesday,Friday,Saturday,Sunday', '3', 'Kerala', 'Alappuzha', '306473.png', '1234567890', 'ashokvrenda', '2024-02-17 22:54:28', 'active', '', ''),
(3, 'News', 'new123', 'news@gmail.com           ', 'Geriatric Medicine           ', 500, 'new', '1999-06-09', 'MBBS           ', 'Female', 'Sunday ', '3           ', 'Kerala           ', 'Alappuzha           ', '306473.png', '6035498003         ', 'susvindhi           ', '2024-02-17 22:54:28', 'inactive', '2024-02-21', 'Not Available'),
(5, 'anoop', 'anoop123', 'anoop@gmail.com', 'Geriatric Medicine', 700, 'anoop', '2004-02-02', 'MBBS', 'Male', 'Thursday,Saturday,Sunday', '6', 'alappuzha', 'Alappuzha', '306473.png', '2233445567', 'makkada', '2024-02-17 22:54:28', 'active', '', ''),
(10, 'venu', 'venu123', 'venu@gmail.com', 'Family Medicine', 210, 'venu', '2024-02-08', 'qhriqiyie', 'Male', 'Monday,Sunday', 'egoiwuigw', 'Kerala', 'Alappuzha', '306473.png', '2147483647', 'Govindapuram', '2024-02-17 22:54:28', 'active', '', ''),
(11, 'viswas', 'viswas123', 'viswas@gmail.com ', 'General Surgery ', 800, 'viswas', '2024-01-04', 'Degree ', 'Male', 'Monday,Tuesday,Wednesday ', '1 year MIMS ', 'Manipur ', 'Pherzawl ', '306473.png', '9876543210', 'balaramapuram', '2024-02-17 22:54:28', 'active', '', ''),
(12, 'sree', 'sree123', 'sree@gmail.com', 'Gastroenterology', 800, 'sree', '2023-12-07', 'ewqeeeee', 'Male', 'Wednesday', 'eeeee', 'Kerala', 'Alappuzha', '306473.png', '2147483647', 'sivagi city', '2024-02-17 22:54:28', 'active', '', ''),
(13, 'banu', 'banu123', 'banu@gmail.com', 'Family Medicine', 210, 'banu', '2023-12-06', 'ssssss', 'Other', 'Tuesday,Thursday', 'sssss', 'Karnataka', 'Bagalkot', '306473.png', '9072402692', 'OMR city', '2024-02-17 22:54:28', 'active', '', ''),
(14, 'aswathi', 'aswathi123', 'aswathi@gmail.com', 'Emergency Medicine', 1000, 'aswathi', '2024-01-15', '12,,..sllsls', 'Female', 'Saturday,Sunday', '12,,..sllsls', 'Karnataka', 'Bagalkot', '306473.png', '9999999999', 'manimala', '2024-02-17 22:54:28', 'active', '', ''),
(17, 'Maanas', 'maanas123', 'maanas@gmail.com', 'Critical Care Medicine', 1000, 'Maanas', '2006-02-09', '10th ', 'Male', 'Wednesday', '1 year MIMs', 'Manipur', 'Bishnupur', '306473.png', '9895215593', 'Mangalapuram', '2024-02-17 22:54:28', 'active', '', ''),
(21, 'Vimal', 'vimal123', 'vimal@gmail.com                    ', 'Anesthesiology                    ', 550, 'Vimal', '2005-11-23', 'MBBS,MD,PHD                    ', 'Male', 'Monday    ', '1 year in MD college                    ', 'Meghalaya                    ', 'East Garo Hills                    ', '306473.png', '9072402788                    ', 'Manjeri               ', '2024-02-19 13:47:41', 'inactive', '2024-02-22', 'Not Available ');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(10) NOT NULL,
  `batchno` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `sPrice` varchar(20) NOT NULL,
  `tax` float DEFAULT NULL,
  `bPrice` varchar(20) NOT NULL,
  `profit` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `expiryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `batchno`, `name`, `type`, `supplier`, `sPrice`, `tax`, `bPrice`, `profit`, `stock`, `expiryDate`) VALUES
(1, 30702, 'ABZ', 'Syrup', 'Kemsa', '10', 6, '5', '5', '51', '2021-01-02'),
(2, 30702, 'Panadol', 'Syrup', '', '7', 6, '5', '2', '20', '2023-05-31'),
(3, 40503, 'Sample drug', 'Syrup', 'Kemsa', '15', 6, '10', '5', '515', '2024-01-01'),
(4, 30702, 'Brufen', 'Tablet', '', '7', 4, '5', '2', '17', '2023-05-30'),
(6, 30702, 'Piliton', 'tablet', 'Kemsa', '7', 4, '5', '2', '505', '2024-01-09'),
(12, 30713, 'Benadryl Cough Syrup', 'Syrup', 'Varun', '10', 5, '7', '3', '40', '2024-09-30'),
(13, 30714, 'Corex Cough Syrup', 'Syrup', 'Akshay', '12', 6, '8', '4', '50', '2023-12-20'),
(14, 30715, 'Ascoril Cough Syrup', 'Syrup', 'Krish', '15', 7, '10', '5', '60', '2023-12-15'),
(15, 30716, 'Honitus Cough Syrup', 'Syrup', 'Sreekumar', '8', 4, '5', '3', '19', '2023-10-10'),
(16, 30717, 'Torex Cough Syrup', 'Syrup', 'Varun', '14', 7, '9', '5', '45', '2023-12-28'),
(17, 30718, 'Acetaminophen', 'Tablet', 'Varun', '5', 2, '3', '2', '90', '2024-04-30'),
(25, 30726, 'ACETAMINOPHEN Injectable', 'Injection', 'Varun', '8', 4, '5', '3', '50', '2024-05-30'),
(26, 30727, 'ADRENALINE Injectable', 'Injection', 'Akshay', '15', 7, '10', '5', '19', '2024-06-15'),
(27, 30728, 'CO-AMOXICLAV Injectable', 'Injection', 'Krish', '25', 12, '18', '7', '40', '2024-07-22'),
(28, 30729, 'AMPHOTERICIN B conventional Injectable', 'Injection', 'Sreekumar', '30', 15, '20', '10', '15', '2024-08-10'),
(29, 30730, 'AMPHOTERICIN B liposomal Injectable', 'Injection', 'Varun', '35', 18, '25', '10', '10', '2024-09-05'),
(30, 30731, 'AMPICILLIN Injectable', 'Injection', 'Akshay', '12', 6, '8', '4', '60', '2024-10-20'),
(31, 30732, 'ARTESUNATE Injectable', 'Injection', 'Krish', '18', 9, '12', '6', '35', '2024-11-15'),
(32, 30733, 'ATROPINE Injectable', 'Injection', 'Sreekumar', '10', 5, '7', '3', '9', '2024-12-30'),
(39, 30727, 'Acetaminophen-500mg', 'Tablet', 'Varun', '5', 2, '3', '2', '60', '2024-04-30'),
(40, 30727, 'Adderall-10mg', 'Tablet', 'Akshay', '20', 10, '15', '5', '40', '2024-06-15'),
(41, 30727, 'Amitriptyline-25mg', 'Tablet', 'Krish', '8', 4, '5', '3', '40', '2024-03-22'),
(42, 30727, 'Amlodipine-5mg', 'Tablet', 'Sreekumar', '10', 5, '7', '3', '70', '2024-08-10'),
(43, 30730, 'Amoxicillin-250mg', 'Tablet', 'Varun', '15', 8, '10', '5', '-20', '2024-09-05'),
(44, 30730, 'Ativan-1mg', 'Tablet', 'Krish', '18', 9, '12', '6', '20', '2024-05-20'),
(45, 30730, 'Atorvastatin-20mg', 'Tablet', 'Akshay', '12', 6, '8', '4', '50', '2024-07-10'),
(46, 30730, 'Azithromycin-250mg', 'Tablet', 'Sreekumar', '10', 12, '18', '', '0', '2024-10-15'),
(59, 12345, 'Amoxille', 'Syrup', '', '120', 6, '80', '', '160', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `prestb_id` int(11) DEFAULT NULL,
  `M_qty` int(11) DEFAULT NULL,
  `M_type` varchar(255) DEFAULT NULL,
  `med_name` varchar(255) DEFAULT NULL,
  `med_type` varchar(255) DEFAULT NULL,
  `time_intake` varchar(255) DEFAULT NULL,
  `suggestion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `prestb_id`, `M_qty`, `M_type`, `med_name`, `med_type`, `time_intake`, `suggestion`) VALUES
(3, 2, 20, 'ml', 'ABZ', 'Syrup', 'Morning, E', 'if change occures, chnage intake afternoon'),
(4, 2, 10, 'tablets', 'Brufen', 'Tablet', 'Afternoon', 'take before food'),
(5, 8, 5, 'ml', 'Panadol', 'Syrup', 'Morning', 'before food '),
(6, 8, 5, 'ml', 'Sample drug', 'Syrup', 'Evening', 'after food');

-- --------------------------------------------------------

--
-- Table structure for table `offline_appointments`
--

CREATE TABLE `offline_appointments` (
  `offid` int(11) NOT NULL,
  `Specialization` varchar(255) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `AppoID` varchar(10) DEFAULT NULL,
  `patname` varchar(255) DEFAULT NULL,
  `patage` int(11) DEFAULT NULL,
  `patwork` varchar(255) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offline_appointments`
--

INSERT INTO `offline_appointments` (`offid`, `Specialization`, `doctor_name`, `AppoID`, `patname`, `patage`, `patwork`, `contact`, `date`, `time`, `created_at`, `added_by`) VALUES
(6, 'Geriatric Medicine', 'aparna', '6431', 'mayaamma', 70, 'thottaseyii', '9072402693', '2024-03-07', NULL, '2024-03-06 06:16:14', 'aa@gmail.com'),
(7, 'Geriatric Medicine', 'aparna', '4765', 'radha', 70, 'makkada', '8765432109', '2024-03-07', NULL, '2024-03-07 04:14:16', 'aa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patreg`
--

CREATE TABLE `patreg` (
  `pid` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `place` varchar(30) NOT NULL,
  `regdate` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patreg`
--

INSERT INTO `patreg` (`pid`, `email`, `fname`, `lname`, `gender`, `contact`, `password`, `cpassword`, `state`, `district`, `age`, `place`, `regdate`) VALUES
(10, 'ram@gmail.com     ', 'Raman', 'Kumar   ', 'Male', '9876500001', 'ram1234', 'ram123', 'Up   ', 'Gorakhpr     ', 23, 'Makkadaa ', '2024-02-20 02:16:53'),
(17, 'pranav@gmail.com', 'Pranav', 'm', 'Female', '9072402692', 'pranav123', 'pranav123', 'kerala', 'kozhikode', 24, 'kollam', '2024-02-20 02:16:53'),
(18, 'amarnath@gmail.com', 'Amarnath', 'S', 'Male', '9072402693', 'amarnath123', 'amarnath123', 'Kerala', 'Kozhikode', 24, 'Cherukulam', '2024-02-20 02:16:53'),
(24, 'rameshkumar@gmail.com', 'Ramesh', 'Kumar', 'Male', '9876512345', 'ramesh123', 'ramesh123', 'Kerala', 'Thiruvananthapuram', 30, 'Koduvally', '2024-02-20 21:24:18'),
(25, 'priyapatel@gmail.com', 'Priya', 'Patel', 'Female', '9876523456', 'priya123', 'priya123', 'Kerala', 'Ernakulam', 25, 'Kakkanad', '2024-02-20 21:24:18'),
(26, 'amitsingh@gmail.com', 'Amit', 'Singh', 'Male', '9876534567', 'amit123', 'amit123', 'Kerala', 'Kozhikode', 35, 'Calicut', '2024-02-20 21:24:18'),
(27, 'nehaverma@gmail.com', 'Neha', 'Verma', 'Female', '9876545678', 'neha123', 'neha123', 'Kerala', 'Kozhikode', 28, 'Koduvally', '2024-02-20 21:24:18'),
(28, 'rahulgupta@gmail.com', 'Rahul', 'Gupta', 'Male', '9876556789', 'rahul123', 'rahul123', 'Kerala', 'Kozhikode', 32, 'Calicut', '2024-02-20 21:24:18'),
(29, 'gopalangopalan@gmail.com', 'Gopalan', 'Gopalan', 'Male', '9876512345', 'gopalan123', 'gopalan123', 'Kerala', 'Thiruvananthapuram', 30, 'Koduvally', '2024-02-20 21:38:10'),
(30, 'appugopalan@gmail.com', 'Appu', 'Gopalan', 'Female', '9876523456', 'appu123', 'appu123', 'Kerala', 'Ernakulam', 25, 'Kakkanad', '2024-02-20 21:38:10'),
(31, 'kannangopalan@gmail.com', 'Kannan', 'Gopalan', 'Male', '9876534567', 'kannan123', 'kannan123', 'Kerala', 'Kozhikode', 35, 'Calicut', '2024-02-20 21:38:10'),
(32, 'aswingopalan@gmail.com', 'Aswin', 'Gopalan', 'Male', '9876545678', 'aswin123', 'aswin123', 'Kerala', 'Kozhikode', 28, 'Koduvally', '2024-02-20 21:38:10'),
(33, 'vishnugopalan@gmail.com', 'Vishnu', 'Gopalan', 'Male', '9876556789', 'vishnu123', 'vishnu123', 'Kerala', 'Kozhikode', 32, 'Calicut', '2024-02-20 21:38:10'),
(34, 'hiba@gmail.com', 'Hiba', 'h', 'Female', '9876512345', 'hiba123', 'hiba123', 'Kerala', 'Thiruvananthapuram', 30, 'Koduvally', '2024-02-20 21:40:18'),
(35, 'fidha@gmail.com', 'Fidha', 'f', 'Female', '9876523456', 'fidha123', 'fidha123', 'Kerala', 'Ernakulam', 25, 'Kakkanad', '2024-02-20 21:40:18'),
(36, 'anjana@gmail.com', 'Anjana', 'a', 'Female', '9876534567', 'anjana123', 'anjana123', 'Kerala', 'Kozhikode', 35, 'Calicut', '2024-02-20 21:40:18'),
(37, 'neenu@gmail.com', 'Neenu', 'n', 'Female', '9876545678', 'neenu123', 'neenu123', 'Kerala', 'Kozhikode', 28, 'Koduvally', '2024-02-20 21:40:18'),
(38, 'divya@gmail.com', 'Divya', 'd', 'Female', '9876556789', 'divya123', 'divya123', 'Kerala', 'Kozhikode', 32, 'Calicut', '2024-02-20 21:40:18'),
(39, 'niya@gmail.com', 'Niya', 'n', 'Female', '9876556789', 'niya123', 'niya123', 'Kerala', 'Kozhikode', 32, 'Calicut', '2024-02-20 21:40:18'),
(40, 'nihal@gmail.com', 'Nihal', 'M', 'Male', '9876512345', 'nihal123', 'nihal123', 'Kerala', 'Thiruvananthapuram', 30, 'Koduvally', '2024-02-20 21:42:26'),
(41, 'mishab@gmail.com', 'Mishab', 'A', 'Male', '9876523456', 'mishab123', 'mishab123', 'Kerala', 'Ernakulam', 25, 'Kakkanad', '2024-02-20 21:42:26'),
(42, 'anwar@gmail.com', 'Anwar', 'V', 'Male', '9876534567', 'anwar123', 'anwar123', 'Kerala', 'Kozhikode', 35, 'Calicut', '2024-02-20 21:42:26'),
(43, 'vyshnav@gmail.com', 'Vyshnav', 'K', 'Male', '9876545678', 'vyshnav123', 'vyshnav123', 'Kerala', 'Kozhikode', 28, 'Koduvally', '2024-02-20 21:42:26'),
(44, 'karthik@gmail.com', 'Karthik', 'K', 'Male', '9876556789', 'karthik123', 'karthik123', 'Kerala', 'Kozhikode', 32, 'Calicut', '2024-02-20 21:42:26'),
(45, 'hari@gmail.com', 'Hari', 'H', 'Male', '9876512345', 'hari123', 'hari123', 'Kerala', 'Thiruvananthapuram', 30, 'Koduvally', '2024-02-20 21:44:29'),
(46, 'minhaj@gmail.com', 'Minhaj', 'M', 'Male', '9876523456', 'minhaj123', 'minhaj123', 'Kerala', 'Ernakulam', 25, 'Kakkanad', '2024-02-20 21:44:29'),
(47, 'maanas@gmail.com', 'Maanas', 'M', 'Male', '9876512345', 'maanas123', 'maanas123', 'Kerala', 'Thiruvananthapuram', 30, 'Koduvally', '2024-02-20 21:44:29'),
(48, 'anandhu@gmail.com', 'Anandhu', 'A', 'Male', '9876523456', 'anandhu123', 'anandhu123', 'Kerala', 'Ernakulam', 25, 'Kakkanad', '2024-02-20 21:44:29'),
(49, 'midhun@gmail.com', 'Midhun', 'M', 'Male', '9876534567', 'midhun123', 'midhun123', 'Kerala', 'Kozhikode', 35, 'Calicut', '2024-02-20 21:44:29'),
(50, 'aleefa@gmail.com', 'Aleefa', 'A', 'Female', '9876545678', 'aleefa123', 'aleefa123', 'Kerala', 'Kozhikode', 28, 'Koduvally', '2024-02-20 21:44:29'),
(51, 'akshaytvijayanakshay@gmail.com', 'Maanu', 'K', 'Male', '9072402693', '123456', '123456', 'Kerala', 'Kozhikode', 23, 'Makkada', '2024-02-22 10:48:55'),
(60, 'danie@gmail.com', 'Danie', 'D', 'Male', '8748594037', 'danie123', 'danie123', 'Kerala', 'Kozhikode', 22, 'Nekjdh    ', '2024-03-06 10:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `prestb`
--

CREATE TABLE `prestb` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `appdate` varchar(100) NOT NULL,
  `userdate` varchar(100) NOT NULL,
  `apptime` varchar(50) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prestb`
--

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `disease`, `allergy`, `prescription`, `appdate`, `userdate`, `apptime`, `t_id`) VALUES
('aparna@gmail.com', 10, 34, 'Raman', 'Kumar  ', 'Fever', 'none', '', 'Monday', 'Mon Mar 25 2024', 'Mon Mar 25 2024', 3),
('anoop@gmail.com', 10, 39, 'Raman', 'Kumar   ', 'hqkdyiawyei', 'ahkdhiaseis', '', 'Thursday', 'Thu Mar 21 2024', 'Thu Mar 21 2024', 4),
('aparna@gmail.com', 10, 34, 'Raman', 'Kumar  ', 'ffff', 'aaaaaa', '', 'Monday', 'Mon Mar 25 2024', 'Mon Mar 25 2024', 7),
('aparna@gmail.com', 10, 34, 'Raman', 'Kumar  ', 'Fever', 'dust', '', 'Monday', 'Mon Mar 25 2024', 'Mon Mar 25 2024', 8);

-- --------------------------------------------------------

--
-- Table structure for table `registration_table`
--

CREATE TABLE `registration_table` (
  `registration_id` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_table`
--

INSERT INTO `registration_table` (`registration_id`, `did`, `registration_date`) VALUES
(1, 1, '2024-02-19 15:07:08'),
(2, 1, '2024-02-19 15:35:16'),
(3, 1, '2024-02-19 15:36:35'),
(4, 1, '2024-02-19 15:36:57'),
(5, 1, '2024-02-19 15:39:19'),
(6, 1, '2024-02-19 15:40:41'),
(7, 3, '2024-02-19 15:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `rid` int(10) NOT NULL,
  `pid` int(50) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `req_status` varchar(50) NOT NULL,
  `time` time(6) NOT NULL,
  `currenttime` datetime NOT NULL DEFAULT current_timestamp(),
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rid`, `pid`, `dname`, `req_status`, `time`, `currenttime`, `date`) VALUES
(13, 1, 'Abbis', 'request', '00:00:00.000000', '2024-02-12 19:53:57', NULL),
(14, 10, 'Abbis', 'request', '00:00:00.000000', '2024-02-12 22:12:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `time`) VALUES
(2, '09:00'),
(3, '09:15'),
(4, '09:30'),
(5, '09:45'),
(7, '15:19'),
(8, '10:45'),
(9, '22:44'),
(10, '22:44'),
(12, '14:47');

-- --------------------------------------------------------

--
-- Table structure for table `staffdb`
--

CREATE TABLE `staffdb` (
  `staff_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` text DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `proof` varchar(100) DEFAULT NULL,
  `qualification` text NOT NULL,
  `experience` text NOT NULL,
  `sregdate` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL,
  `inactiveReasonS` text NOT NULL,
  `SresignDate` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffdb`
--

INSERT INTO `staffdb` (`staff_id`, `fname`, `lname`, `age`, `email`, `phone`, `location`, `state`, `district`, `password`, `gender`, `proof`, `qualification`, `experience`, `sregdate`, `status`, `inactiveReasonS`, `SresignDate`) VALUES
(3, 'Anakha', 'anna', '1995-04-11', 'anakha@gmail.com', '9776565555', 'Paalayam', 'Kerala', 'Kannur', 'anakha123', 'Female', 'user.png', 'Msc.Maths', 'none', '2024-02-20 02:23:24', 'inactive', 'Not Available', '2024-02-24'),
(4, 'Anugraha', 'anu  ', '1999-04-11', 'aa@gmail.com ', '76699945    ', 'Paalayam ', 'Kerala    ', 'Kottayam    ', 'aa123', 'Male', 'user.png', '10th', 'none', '2024-02-20 02:23:24', 'active', '', '2024-02-22'),
(7, 'Akshayt', '', '1999-04-11', 'akshayt@gmail.com', '7686529027', 'Nanmanda', 'Manipur', 'Pherzawl', 'akshayt123', 'Male', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 02:23:24', 'inactive', 'leave', ''),
(8, 'Haripriya', '', '1994-04-11', 'haripriya@gmail.com', '9072402692', 'thadambattuthazham post: makkada', 'Kerala', 'Kozhikode', 'haripriya123', 'Female', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 02:23:24', 'active', '', ''),
(13, 'Pranavi ', 'lalkumar', '1999-04-11', 'pranav@gmail.com ', '8080808080', 'paalarivattam ', 'Kerala ', 'Thiruvananthapuram ', 'pranav123', 'Male', 'user.png', 'Degree', 'none', '2024-02-20 02:23:24', 'active', '', ''),
(15, 'Vivek', 'SP', '2006-02-01', 'vivek@gmail.com', '9087654321', 'Thazham', 'Meghalaya', 'Ri Bhoi', 'vivek123', 'Male', 'user.png', '10th', 'None', '2024-02-20 02:23:24', 'active', '', ''),
(18, 'Mishab', 'M', '1999-04-11', 'mishab@gmail.com', '7686526027', 'Nanmanda', 'Kerala', 'Kozhikode', 'mishab123', 'Male', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 22:02:37', 'active', '', NULL),
(22, 'Mishab', 'M', '1999-04-11', 'mishaab@gmail.com', '7586526027', 'Nanmanda', 'Kerala', 'Kozhikode', 'mishab123', 'Male', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 22:04:28', 'active', '', NULL),
(23, 'Aswin', 'A', '1999-04-11', 'aswin@gmail.com', '9686529027', 'Nanmanda', 'Kerala', 'Kozhikode', 'aswin123', 'Male', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 22:04:28', 'active', '', NULL),
(24, 'Vishnu', 'V', '1999-04-11', 'vishnu@gmail.com', '8686529027', 'Nanmanda', 'Kerala', 'Kozhikode', 'vishnu123', 'Male', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 22:04:28', 'active', '', NULL),
(25, 'Maanas', 'M', '1999-04-11', 'maanas@gmail.com', '7086529027', 'Nanmanda', 'Kerala', 'Kozhikode', 'maanas123', 'Male', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 22:04:28', 'active', '', NULL),
(26, 'Hari', 'H', '1999-04-11', 'hari@gmail.com', '8768652927', 'Nanmanda', 'Kerala', 'Kozhikode', 'hari123', 'Male', 'user.png', 'Degree', '2 Year in MIMS', '2024-02-20 22:04:28', 'active', '', NULL),
(27, 'Neenu', 'N', '1999-04-11', 'neenu@gmail.com', '9876543210', 'Paalarivattam', 'Kerala', 'Thiruvananthapuram', 'neenu123', 'Female', 'user.png', 'Degree', 'None', '2024-02-20 22:11:39', 'active', '', NULL),
(28, 'Niya', 'N', '2000-07-25', 'niya@gmail.com', '9876543211', 'Paalarivattam', 'Kerala', 'Thiruvananthapuram', 'niya123', 'Female', 'user.png', 'Degree', 'None', '2024-02-20 22:11:39', 'active', '', NULL),
(29, 'Amirtha', 'A', '1998-10-15', 'amirtha@gmail.com', '9876543212', 'Paalarivattam', 'Kerala', 'Thiruvananthapuram', 'amirtha123', 'Female', 'user.png', 'Degree', 'None', '2024-02-20 22:11:39', 'active', '', NULL),
(30, 'Salha', 'S', '1997-12-08', 'salha@gmail.com', '9876543213', 'Paalarivattam', 'Kerala', 'Thiruvananthapuram', 'salha123', 'Female', 'user.png', 'Degree', 'None', '2024-02-20 22:11:39', 'active', '', NULL),
(31, 'Divya', 'D', '1996-05-03', 'divya@gmail.com', '9876543214', 'Paalarivattam', 'Kerala', 'Thiruvananthapuram', 'divya123', 'Female', 'user.png', 'Degree', 'None', '2024-02-20 22:11:39', 'active', '', NULL),
(32, 'Akshay T', 'vijayan', '1999-03-08', 'akshay@gmail.com', '7306257817', 'Thottaseri thazhath ', 'Kerala', 'Kozhikode', 'akshay123', 'Male', 'user.png', 'MCA', 'None', '2024-02-24 21:24:32', 'active', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_appointment`
--

CREATE TABLE `tbl_doctor_appointment` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `spec` varchar(255) NOT NULL,
  `day_of_appointment` varchar(50) NOT NULL,
  `date_of_appointment` varchar(50) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_doctor_appointment`
--

INSERT INTO `tbl_doctor_appointment` (`id`, `username`, `email`, `spec`, `day_of_appointment`, `date_of_appointment`, `count`) VALUES
(6, 'aparna', 'aparna@gmail.com', 'Geriatric Medicine', 'Monday', 'Mon Mar 11 2024', 10),
(7, 'banu', 'banu@gmail.com', 'Family Medicine', 'Tuesday', 'Tue Mar 26 2024', 10),
(8, 'venu', 'venu@gmail.com', 'Family Medicine', 'Monday', 'Mon Mar 11 2024', 1),
(9, 'anoop', 'anoop@gmail.com', 'Geriatric Medicine', 'Thursday', 'Thu Mar 21 2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `lid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `todate` date NOT NULL,
  `fromdate` date NOT NULL,
  `reason` varchar(50) NOT NULL,
  `lstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`lid`, `username`, `todate`, `fromdate`, `reason`, `lstatus`) VALUES
(1, 'aa@gmail.com', '2024-02-16', '2024-02-22', 'fever', 'Approve'),
(2, 'aa@gmail.com', '2024-02-21', '2024-02-23', 'Family Function', 'Rejected'),
(3, 'aa@gmail.com', '2024-02-21', '2024-02-22', 'Family Function', 'Approve'),
(4, 'admin', '2024-02-21', '2024-02-22', 'Family Function', 'Rejected'),
(5, 'aa@gmail.com', '2024-02-22', '2024-02-22', 'Fever', 'Pending'),
(6, 'aa@gmail.com', '2024-02-22', '2024-02-23', 'Fever', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctb`
--
ALTER TABLE `doctb`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_appointments`
--
ALTER TABLE `offline_appointments`
  ADD PRIMARY KEY (`offid`);

--
-- Indexes for table `patreg`
--
ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `prestb`
--
ALTER TABLE `prestb`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `registration_table`
--
ALTER TABLE `registration_table`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffdb`
--
ALTER TABLE `staffdb`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `tbl_doctor_appointment`
--
ALTER TABLE `tbl_doctor_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`lid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `doctb`
--
ALTER TABLE `doctb`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offline_appointments`
--
ALTER TABLE `offline_appointments`
  MODIFY `offid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patreg`
--
ALTER TABLE `patreg`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `prestb`
--
ALTER TABLE `prestb`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration_table`
--
ALTER TABLE `registration_table`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staffdb`
--
ALTER TABLE `staffdb`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_doctor_appointment`
--
ALTER TABLE `tbl_doctor_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration_table`
--
ALTER TABLE `registration_table`
  ADD CONSTRAINT `registration_table_ibfk_1` FOREIGN KEY (`did`) REFERENCES `doctb` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
