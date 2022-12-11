-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 05:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laboratory_database_management_system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `B_details` ()  BEGIN
SELECT * FROM broken_details;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editinstruments` (IN `id` VARCHAR(15), IN `q` INT(11))  BEGIN
UPDATE instruments as i
SET 
i.Quantity=q WHERE i.Instrument_No_=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_br` (IN `id` VARCHAR(15), IN `s` VARCHAR(15))  BEGIN
UPDATE broken_details as b
SET 
b.Status=s WHERE b.Broken_No_=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_ur` (IN `sid` VARCHAR(15), IN `iid` VARCHAR(15), IN `s` VARCHAR(255), IN `dt` DATETIME)  BEGIN
UPDATE users_records as ur
SET 
ur.Status=s
WHERE ur.Student_ID=sid AND ur.Instrument_No_=iid AND ur.Date_Time=dt ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertBR` (IN `bid` VARCHAR(15), IN `iid` VARCHAR(15), IN `sid` VARCHAR(15), IN `f` FLOAT, IN `s` VARCHAR(15))  BEGIN
insert into broken_details (Broken_No_, Instrument_No_, Student_ID, Fine_Amount, Status) values (bid,iid,sid,f,s) ;
CALL `updateIns`(iid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUR` (IN `sid` VARCHAR(15), IN `dt` DATETIME, IN `iid` VARCHAR(15), IN `rdt` DATETIME)  BEGIN
insert into users_record (Student_ID, Date_Time, Instrument_No_, Returned_Date_and_Time) values (sid, dt, iid, rdt) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUsers` (IN `id` VARCHAR(15), IN `na` VARCHAR(255), IN `d` VARCHAR(15))  BEGIN
insert into users (Student_ID, Student_Name, Department) values (id, na, d) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_instruments` (IN `no` VARCHAR(15), IN `na` VARCHAR(255), IN `q` INT(11) ZEROFILL, IN `d` DATE, IN `p` FLOAT ZEROFILL, IN `m` VARCHAR(255), IN `ln` VARCHAR(15))  BEGIN
insert into instruments (Instrument_No_, Instrument_Name, Quantity, Purchased_Date, Price, Description_Make, Lab_No_) values (no, na, q, d, p, m, ln) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_lab` (IN `no` VARCHAR(15), IN `na` VARCHAR(255), IN `d` VARCHAR(15))  BEGIN
insert into laboratory (Lab_No_, Lab_Name, Department) values (no, na, d) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_staffs` (IN `id` VARCHAR(15), IN `na` VARCHAR(255), IN `l` VARCHAR(15), IN `no` VARCHAR(15))  BEGIN
insert into staffs (Staff_ID, Staff_Name, Staff_LogInID, Lab_No_) values (id, na, l, no) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Instruments` ()  BEGIN
SELECT * FROM instruments;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `labDetails` ()  BEGIN
SELECT * FROM laboratory;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Login` (IN `slid` VARCHAR(15), IN `p` VARCHAR(15))  BEGIN
SELECT * FROM authentication_system
WHERE slid = Staff_LogInID AND p = Password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Row_br` (IN `id` VARCHAR(15))  BEGIN
SELECT * FROM broken_details
WHERE Broken_No_=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Row_ins` (IN `iid` VARCHAR(15))  BEGIN
SELECT * FROM instruments
WHERE Instrument_No_ =iid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Row_ur` (IN `riid` VARCHAR(15), IN `rsid` VARCHAR(15), IN `rdt` DATETIME)  BEGIN
SELECT * FROM users_record as ur
WHERE ur.Student_ID=rsid AND ur.Instrument_No_=riid AND ur.Date_Time=rdt ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `staffsDetails` ()  BEGIN
SELECT * FROM staffs;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateIns` (IN `id` VARCHAR(15))  BEGIN
UPDATE instruments as i
SET i.Quantity=  i.Quantity - 1
WHERE i.Instrument_No_=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userDetails` ()  BEGIN
SELECT * FROM users;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Users_recordDetails` ()  BEGIN
SELECT * FROM users_record;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_records` ()  BEGIN
SELECT * FROM users_record;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `veiwLabIns` (IN `l` VARCHAR(15))  BEGIN
SELECT * FROM instruments WHERE instruments.Lab_No_=l;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `authentication_system`
--

CREATE TABLE `authentication_system` (
  `Staff_LogInID` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication_system`
--

INSERT INTO `authentication_system` (`Staff_LogInID`, `Password`) VALUES
('s01001', 's01abc111'),
('s02002', 's02abc222');

-- --------------------------------------------------------

--
-- Table structure for table `broken_details`
--

CREATE TABLE `broken_details` (
  `Broken_No_` varchar(15) NOT NULL,
  `Instrument_No_` varchar(15) NOT NULL,
  `Student_ID` varchar(15) DEFAULT NULL,
  `Fine_Amount` float DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broken_details`
--

INSERT INTO `broken_details` (`Broken_No_`, `Instrument_No_`, `Student_ID`, `Fine_Amount`, `Status`) VALUES
('b01', 'i03', 'SID03', 7000, 'Paid'),
('b02', 'i01', 'SID02', 3000, 'Not Paid'),
('b03', 'i05', 'SID02', 2000, 'Not Paid'),
('b04', 'i05', 'SID04', 1000, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `Instrument_No_` varchar(15) NOT NULL,
  `Instrument_Name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Purchased_Date` date NOT NULL,
  `Price` float NOT NULL,
  `Description_Make` varchar(255) NOT NULL,
  `Lab_No_` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`Instrument_No_`, `Instrument_Name`, `Quantity`, `Purchased_Date`, `Price`, `Description_Make`, `Lab_No_`) VALUES
('i01', 'k', 3, '2019-03-20', 2500, 'India', 'l01'),
('i02', 'm', 1, '2019-05-20', 15000, 'India', 'l01'),
('i03', 'n', 5, '2019-07-20', 12000, 'China', 'l02'),
('i04', 'j', 2, '2019-09-20', 10000, 'India', 'l02'),
('i05', 'v', 2, '2019-07-30', 30000, 'India', 'l01'),
('i06', 'i', 5, '2020-04-12', 6000, 'China', 'l02');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `Lab_No_` varchar(15) NOT NULL,
  `Lab_Name` varchar(255) NOT NULL,
  `Department` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`Lab_No_`, `Lab_Name`, `Department`) VALUES
('l01', 'l_a', 'EEE'),
('l02', 'l_b', 'EEE'),
('l03', 'l_c', 'EEE'),
('l04', 'l_d', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `Staff_ID` varchar(15) NOT NULL,
  `Staff_Name` varchar(255) NOT NULL,
  `Staff_LogInID` varchar(15) NOT NULL,
  `Lab_No_` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`Staff_ID`, `Staff_Name`, `Staff_LogInID`, `Lab_No_`) VALUES
('s01', 'a', 's01001', 'l01'),
('s02', 'b', 's02002', 'l02'),
('s03', 'c', 's01001', 'l03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Student_ID` varchar(15) NOT NULL,
  `Student_Name` varchar(255) NOT NULL,
  `Department` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Student_ID`, `Student_Name`, `Department`) VALUES
('SID01', 'x', 'CE'),
('SID02', 'y', 'CE'),
('SID03', 'z', 'EEE'),
('SID04', 'w', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `users_record`
--

CREATE TABLE `users_record` (
  `Student_ID` varchar(15) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Instrument_No_` varchar(15) NOT NULL,
  `Returned_Date_and_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_record`
--

INSERT INTO `users_record` (`Student_ID`, `Date_Time`, `Instrument_No_`, `Returned_Date_and_Time`) VALUES
('SID01', '2022-01-03 15:17:58', 'i01', '2022-01-03 15:50:58'),
('SID02', '2022-01-04 14:17:58', 'i02', '2022-01-04 14:55:58'),
('SID03', '2022-01-05 14:17:58', 'i05', '2022-01-05 15:17:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication_system`
--
ALTER TABLE `authentication_system`
  ADD PRIMARY KEY (`Staff_LogInID`);

--
-- Indexes for table `broken_details`
--
ALTER TABLE `broken_details`
  ADD PRIMARY KEY (`Broken_No_`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `Instrument_No_` (`Instrument_No_`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`Instrument_No_`),
  ADD KEY `Lab_No_` (`Lab_No_`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`Lab_No_`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `Lab_No_` (`Lab_No_`),
  ADD KEY `Staff_LogInID` (`Staff_LogInID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `users_record`
--
ALTER TABLE `users_record`
  ADD PRIMARY KEY (`Student_ID`,`Date_Time`,`Instrument_No_`),
  ADD KEY `Instrument_No_` (`Instrument_No_`,`Student_ID`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `broken_details`
--
ALTER TABLE `broken_details`
  ADD CONSTRAINT `broken_details_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `users` (`Student_ID`),
  ADD CONSTRAINT `broken_details_ibfk_2` FOREIGN KEY (`Instrument_No_`) REFERENCES `instruments` (`Instrument_No_`);

--
-- Constraints for table `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_ibfk_1` FOREIGN KEY (`Lab_No_`) REFERENCES `laboratory` (`Lab_No_`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`Lab_No_`) REFERENCES `laboratory` (`Lab_No_`),
  ADD CONSTRAINT `staffs_ibfk_2` FOREIGN KEY (`Staff_LogInID`) REFERENCES `authentication_system` (`Staff_LogInID`);

--
-- Constraints for table `users_record`
--
ALTER TABLE `users_record`
  ADD CONSTRAINT `users_record_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `users` (`Student_ID`),
  ADD CONSTRAINT `users_record_ibfk_2` FOREIGN KEY (`Instrument_No_`) REFERENCES `instruments` (`Instrument_No_`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
