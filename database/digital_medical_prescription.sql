-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2022 at 11:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_med_prescription_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `prcRegNumber` int(11) DEFAULT NULL,
  `uniqueID` int(11) DEFAULT NULL,
  `doctorFirstName` varchar(30) NOT NULL,
  `doctorMiddleName` varchar(30) DEFAULT NULL,
  `doctorLastName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_login`
--

CREATE TABLE `doctor_login` (
  `prcRegNumber` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialization`
--

CREATE TABLE `doctor_specialization` (
  `prcRegNumber` int(11) DEFAULT NULL,
  `specialization` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_unique_id`
--

CREATE TABLE `doctor_unique_id` (
  `uniqueID` int(11) DEFAULT NULL,
  `secondaryIDType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `pharmacyID` int(11) DEFAULT NULL,
  `prescriptionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `pharmacyID` int(11) DEFAULT NULL,
  `medicineID` int(11) DEFAULT NULL,
  `quantityLeft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patientID` int(11) DEFAULT NULL,
  `patientFirstName` varchar(30) NOT NULL,
  `patientMiddleName` varchar(30) DEFAULT NULL,
  `patientLastName` varchar(30) NOT NULL,
  `patientAddress` varchar(30) NOT NULL,
  `birthMonth` int(11) NOT NULL,
  `birthDay` int(11) NOT NULL,
  `birthYear` int(11) NOT NULL,
  `sex` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`patientID`, `patientFirstName`, `patientMiddleName`, `patientLastName`, `patientAddress`, `birthMonth`, `birthDay`, `birthYear`, `sex`) VALUES
(1234, 'John', 'Ray', 'Servo', 'Bolong subd.', 2, 17, 2002, 'M'),
(2345, 'John', 'Clementz', 'Servo', 'Bolong subd.', 3, 18, 2003, 'M'),
(3456, 'Ray', 'Servo', 'John', 'Davao City', 4, 13, 1997, 'F'),
(4567, 'Ron', 'Jay', 'Cervo', 'Kidapawan City', 12, 18, 2005, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `patient_login`
--

CREATE TABLE `patient_login` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_login`
--

INSERT INTO `patient_login` (`id`, `email`, `password`) VALUES
(1234, 'johnservo@gmail.com', '1111'),
(2345, 'johnray@yahoo.com', '1111'),
(3456, 'johnclementz@gmail.com', '1111'),
(4567, 'johnc@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_info`
--

CREATE TABLE `pharmacy_info` (
  `pharmacyID` int(11) DEFAULT NULL,
  `pharmacyName` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_login`
--

CREATE TABLE `pharmacy_login` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescriptionID` int(11) NOT NULL,
  `medicineID` int(11) DEFAULT NULL,
  `diagnosis` varchar(30) NOT NULL,
  `datePrescribed` datetime NOT NULL,
  `doctorNotes` varchar(30) NOT NULL,
  `pieces` int(11) NOT NULL,
  `patientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescriptionID`, `medicineID`, `diagnosis`, `datePrescribed`, `doctorNotes`, `pieces`, `patientID`) VALUES
(2222, 1111, 'gunshot', '2021-08-15 00:00:00', 'yes', 21, 4567),
(2223, 1112, 'testicular cancer', '2019-12-21 00:00:00', 'testes', 69, 4567),
(2224, 1113, 'fracture', '2021-08-15 00:00:00', 'yes', 21, 4567),
(2225, 1111, 'yes', '2021-08-15 00:00:00', 'yes', 21, 4567),
(4321, 1113, 'fracture', '2021-08-15 00:00:00', 'yes', 21, 3456),
(5432, 1112, 'testicular cancer', '2019-12-21 00:00:00', 'testes', 69, 3456),
(6543, 1111, 'gunshot', '2021-08-15 00:00:00', 'yes', 21, 3456),
(7654, 4567, 'testicular cancer', '2019-12-21 00:00:00', 'testes', 69, 2345),
(8765, 5678, 'gunshot', '2021-08-15 00:00:00', 'yes', 21, 2345),
(9876, 6789, 'cancer', '2022-02-18 00:00:00', 'ye', 20, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicine`
--

CREATE TABLE `prescription_medicine` (
  `id` int(11) NOT NULL,
  `genericName_dosage` varchar(30) DEFAULT NULL,
  `brandName_dosage` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription_medicine`
--

INSERT INTO `prescription_medicine` (`id`, `genericName_dosage`, `brandName_dosage`) VALUES
(1111, 'paracetamol', 'paracetamol'),
(1112, 'cocaine', 'cocaine'),
(1113, 'marijuana', 'marijuana'),
(4567, 'ecstasy', 'ecstasy'),
(5678, 'heroin', 'heroin'),
(6789, 'dmt', 'dmt');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_status`
--

CREATE TABLE `prescription_status` (
  `prescriptionID` int(11) DEFAULT NULL,
  `claimedStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription_status`
--

INSERT INTO `prescription_status` (`prescriptionID`, `claimedStatus`) VALUES
(9876, 0),
(8765, 1),
(7654, 0),
(6543, 1),
(5432, 0),
(4321, 1),
(2225, 0),
(2224, 0),
(2223, 1),
(2222, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_login`
--
ALTER TABLE `doctor_login`
  ADD PRIMARY KEY (`prcRegNumber`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `patient_login`
--
ALTER TABLE `patient_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_login`
--
ALTER TABLE `pharmacy_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescriptionID`);

--
-- Indexes for table `prescription_medicine`
--
ALTER TABLE `prescription_medicine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_login`
--
ALTER TABLE `patient_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4568;

--
-- AUTO_INCREMENT for table `pharmacy_login`
--
ALTER TABLE `pharmacy_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112234;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6541231;

--
-- AUTO_INCREMENT for table `prescription_medicine`
--
ALTER TABLE `prescription_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6790;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
