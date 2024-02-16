-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 08:07 AM
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
-- Database: `myhmsdb1`
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
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`) VALUES
(4, 1, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-14', '10:00:00', 1, 0),
(4, 2, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '10:00:00', 0, 1),
(4, 3, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Amit', 1000, '2020-02-19', '03:00:00', 0, 1),
(11, 4, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'ashok', 500, '2020-02-29', '20:00:00', 1, 1),
(4, 5, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '12:00:00', 1, 1),
(4, 6, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-26', '15:00:00', 0, 1),
(2, 8, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'Ganesh', 550, '2020-03-21', '10:00:00', 1, 1),
(5, 9, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'Ganesh', 550, '2020-03-19', '20:00:00', 1, 0),
(4, 10, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '0000-00-00', '14:00:00', 1, 0),
(4, 11, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-03-27', '15:00:00', 1, 1),
(9, 12, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Kumar', 800, '2020-03-26', '12:00:00', 1, 1),
(9, 13, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Tiwary', 450, '2020-03-26', '14:00:00', 1, 1),
(1, 14, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'Dinesh', 700, '2024-01-28', '10:00:00', 1, 1),
(13, 15, 'Akshay T', 'Vijayan', 'Male', 'akshaytvijayanakshay@gmail.com', '9072402692', 'ashok', 500, '2024-02-05', '10:00:00', 0, 1),
(13, 16, 'Akshay T', 'Vijayan', 'Male', 'akshaytvijayanakshay@gmail.com', '9072402692', 'ashok', 500, '2024-02-06', '10:00:00', 1, 1),
(1, 17, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'ashok', 500, '2024-02-14', '18:10:00', 1, 1),
(1, 18, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'Dinesh', 700, '2024-02-07', '14:00:00', 0, 1),
(1, 19, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'Kumar', 800, '2024-02-07', '09:00:00', 1, 1),
(1, 20, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'ashok', 500, '2024-03-01', '09:15:00', 1, 1),
(10, 21, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'new', 1000, '2024-02-15', '09:30:00', 1, 1),
(10, 22, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'new', 1000, '2024-02-15', '10:45:00', 1, 1);

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
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `avialabletime` varchar(100) NOT NULL,
  `experience` varchar(400) NOT NULL,
  `place` varchar(250) NOT NULL,
  `district` varchar(100) NOT NULL,
  `contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`username`, `password`, `email`, `spec`, `docFees`, `pid`, `name`, `qualification`, `gender`, `avialabletime`, `experience`, `place`, `district`, `contact`) VALUES
('new', 'new123', 'new@gmail.com', 'Neurologist', 1000, 13, 'new', 'msw', 'Female', 'Monday,Tuesday,Wednesday,Friday,Saturday,Sunday', '3', 'alappuzha', 'Alappuzha', 0),
('Ashok Kumar', 'ashok123', 'ashok@gmail.com', 'General', 800, 14, 'Ashok Kumar', 'MBBS', 'Male', 'Monday,Tuesday,Wednesday', '14', 'Cherukulam', 'kozhikode', 0),
('Hari', 'hari123', 'hari@gmail.com', 'General', 1000, 18, 'Hari', 'MBBS', 'Male', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', '3', 'Kakkodi', 'kozhikode', 0),
('Dr Sheeba', '12345', 'sheeba@gmail.com', 'Cardiologist', 700, 20, 'Dr Sheeba', 'MBBS,Phd,MD', 'Male', 'Monday,Tuesday,Sunday', '7', 'Kakkodi', 'kozhikode', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patreg`
--

CREATE TABLE `patreg` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `place` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patreg`
--

INSERT INTO `patreg` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`, `state`, `district`, `age`, `place`) VALUES
(2, 'Akshay T', 'Vijayan', 'Male', 'akshaytvijayanakshay@gmail.com', '9072402692', '9072402692', '9072402692', 'kerala', 'kozhikode', 25, 'Kakkodi'),
(3, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'alia123', 'alia123', 'Maharashtra', 'Mumbai', 28, 'Mumbai'),
(5, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'gautam123', 'gautam123', 'Karnataka', 'Bangalore', 30, 'Bangalore'),
(6, 'Kenny', 'Sebastian', 'Male', 'kenny@gmail.com', '9809879868', 'kenny123', 'kenny123', 'Kerala', 'Thiruvananthapuram', 29, 'Thiruvananthapuram'),
(7, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'kishan123', 'kishan123', 'Bihar', 'Patna', 22, 'Patna'),
(8, 'Nancy', 'Deborah', 'Female', 'nancy@gmail.com', '9128972454', 'nancy123', 'nancy123', 'Tamil Nadu', 'Chennai', 32, 'Chennai'),
(9, 'Peter', 'Norvig', 'Male', 'peter@gmail.com', '9609362815', 'peter123', 'peter123', 'Delhi', 'New Delhi', 40, 'New Delhi'),
(10, 'Ram', 'Kumar    ', 'Male', 'ram@gmail.com    ', '9876543210', 'ram123', 'ram123', 'UP    ', 'Gorakhpur    ', 24, 'nekjdh    '),
(11, 'Shahrukh', 'khan', 'Male', 'shahrukh@gmail.com', '8976898463', 'shahrukh123', 'shahrukh123', 'Maharashtra', 'Mumbai', 55, 'Mumbai'),
(12, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'shraddha123', 'shraddha123', 'Maharashtra', 'Mumbai', 25, 'Mumbai'),
(13, 'Sushant', 'Singh', 'Male', 'sushant@gmail.com', '9059986865', 'sushant123', 'sushant123', 'Bihar', 'Patna', 27, 'Patna'),
(14, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'william123', 'william123', 'Tamil Nadu', 'Chennai', 35, 'Chennai'),
(16, 'Akshay T', 'a', 'Male', 'akshaytvijayan@gmail.com', '9072402692', '12341234', '12341234', 'kerala', 'kozhikode', 53, 'Kakkodi'),
(17, 'divya', 'asa', 'Male', 'aaa@gmail.com', '9999999999', 'aaaaaa', 'aaaaaa', 'kerala', 'kozhikode', 53, 'Kakkodi'),
(18, 'dec', 'emb', 'Male', 'dec@gmail.com', '8973472374', 'aqaqaq', 'aqaqaq', 'kerala', 'kozhikode', 53, 'Kakkodi'),
(19, 'asa', 'ha', 'Male', 'asaha@gmai.com', '9072402692', 'asaha@gmai.com', 'asaha@gmai.com', 'kerala', 'kozhikode', 53, 'Kakkodi'),
(20, 'may', 'may', 'Male', 'may@gmail.com', '9876543210', '1234321', '1234321', 'kerala', 'kozhikode', 53, 'Kakkodi'),
(21, 'a', 'a', 'Male', 'a1@gmail.com', '8973472374', 'a1@gmail.com', 'a1@gmail.com', 'kerala', 'kozhikode', 53, 'Kakkodi'),
(22, 'vinu', 'kumar', 'Male', 'vinu@gmail.com', '9995181213', 'vinukumar', 'vinukumar', 'Mirpur', 'kozhikode', 53, 'Kakkodi'),
(23, 'vinu', '   ', 'Male', 'vinu1@gmail.com', '9995181213', '111111', '111111', 'Mirpur', 'kozhikode', 53, 'Kakkodi'),
(24, 'vinu kp', '', 'Male', 'vinu2@gmail.com', '9995181213', 'qqqqqq', 'qqqqqq', 'Mirpur', 'kozhikode', 53, 'Kakkodi'),
(25, 'Anu', 'Sree', 'Male', 'anusree@gmail.com', '8743947202', '123456', '123456', 'kerala', 'kozhikode', 53, 'Kakkodi'),
(26, 'Vishnu', '     ', 'Other', 'vishnu@gmail.com     ', '7894562094', '1234567', '1234567', 'kerala     ', 'kozhikode     ', 25, 'Thoppil ho    ');

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
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prestb`
--

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Dinesh', 4, 11, 'Kishan', 'Lal', '2020-03-27', '15:00:00', 'Cough', 'Nothing', 'Just take a teaspoon of Benadryl every night'),
('Ganesh', 2, 8, 'Alia', 'Bhatt', '2020-03-21', '10:00:00', 'Severe Fever', 'Nothing', 'Take bed rest'),
('Kumar', 9, 12, 'William', 'Blake', '2020-03-26', '12:00:00', 'Sever fever', 'nothing', 'Paracetamol -> 1 every morning and night'),
('Tiwary', 9, 13, 'William', 'Blake', '2020-03-26', '14:00:00', 'Cough', 'Skin dryness', 'Intake fruits with more water content'),
('ashok', 13, 16, 'Akshay T', 'Vijayan', '2024-02-06', '10:00:00', 'fever', 'dust', 'lgfjlgljkdfjg alrrierpiper '),
('ashok', 11, 4, 'Shraddha', 'Kapoor', '2020-02-29', '20:00:00', 'asaswssaz', 'wssdd', 'aaaaaa'),
('ashok', 1, 20, 'Ram', 'Kumar', '2024-03-01', '09:15:00', 'riow', 'fff', 'ffff'),
('ashok', 1, 20, 'Ram', 'Kumar', '2024-03-01', '09:15:00', 'qwerrt', 'werrtt', 'aweertt');

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
  `age` int(11) DEFAULT NULL CHECK (`age` >= 18),
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(250) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `qualification` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffdb`
--

INSERT INTO `staffdb` (`staff_id`, `fname`, `lname`, `age`, `email`, `phone`, `location`, `state`, `district`, `password`, `gender`, `qualification`, `experience`) VALUES
(3, 'anakha', 'anna', 29, 'anakha@gmail.com', '9776565555', 'kannur', 'Kerala', 'Kannur', 'anakha123', 'Female', '', ''),
(4, 'anu', 'sree', 24, 'aa@gmail.com ', '7665432345 ', 'kottayam ', 'Kerala ', 'Kottayam ', 'aa123', 'Male', '', ''),
(5, 'bb', 'engineering', 35, 'bb@gmail.com', '8567447736', 'namakkal', 'Tamil Nadu', 'Namakkal', 'bb123', 'Female', '', ''),
(9, 'Akshay T', 'a', 53, 'akshayt@gmail.com', '9087654322', 'Calicut', 'Kerala', 'Wayanad', '123123', 'Male', '', ''),
(10, 'Akshay T', 'a', 53, 'ram@gmail.com', '9087654321', 'Madhura', 'Kerala', 'Palakkad', '111111', 'Male', '', ''),
(14, 'a', 'b', 53, 'a@gmail.com', '7686529027', 'Kakkod', 'Kerala', 'Kasaragod', '1234321', 'Male', '', '');

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
(1, 'aa@gmail.com', '2024-02-16', '2024-02-22', 'fever', 'Pending');

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
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `patreg`
--
ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doctb`
--
ALTER TABLE `doctb`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patreg`
--
ALTER TABLE `patreg`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staffdb`
--
ALTER TABLE `staffdb`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
