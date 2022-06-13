-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 04:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_med_prescription`
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

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`prcRegNumber`, `uniqueID`, `doctorFirstName`, `doctorMiddleName`, `doctorLastName`) VALUES
(1234567, 7654321, 'John', 'Alvarez', 'Servo'),
(2345678, 8765432, 'Ray', 'Clementz', 'Alvarez'),
(3456789, 9876543, 'Clementz', 'Ray', 'John');

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

--
-- Dumping data for table `doctor_login`
--

INSERT INTO `doctor_login` (`prcRegNumber`, `id`, `email`, `password`) VALUES
(1234567, 7654321, 'johnservo@gmail.com', '1111'),
(2345678, 8765432, 'rayalvarez@gmail.com', '1111'),
(3456789, 9876543, 'clementzjohn@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialization`
--

CREATE TABLE `doctor_specialization` (
  `prcRegNumber` int(11) DEFAULT NULL,
  `specialization` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_specialization`
--

INSERT INTO `doctor_specialization` (`prcRegNumber`, `specialization`) VALUES
(1234567, 'Pediatrics'),
(2345678, 'Psychiatry'),
(3456789, 'Nephrology');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_unique_id`
--

CREATE TABLE `doctor_unique_id` (
  `uniqueID` int(11) DEFAULT NULL,
  `secondaryIDType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_unique_id`
--

INSERT INTO `doctor_unique_id` (`uniqueID`, `secondaryIDType`) VALUES
(7654321, 0),
(8765432, 0),
(9876543, 0);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `pharmacyID` int(11) DEFAULT NULL,
  `prescriptionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`pharmacyID`, `prescriptionID`) VALUES
(1234, 1234),
(2345, 2345),
(3456, 3456);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `pharmacyID` int(11) DEFAULT NULL,
  `medicineID` int(11) DEFAULT NULL,
  `quantityLeft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`pharmacyID`, `medicineID`, `quantityLeft`) VALUES
(1234, 4321, 100),
(2345, 5432, 200),
(3456, 6543, 300);

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
(1234, 'John', 'Alvarez', 'Servo', 'Kidapawan City', 2, 17, 2002, 'M'),
(2345, 'Ray', 'John', 'Alvarez', 'Davao City', 3, 18, 2003, 'M'),
(3456, 'Clementz', 'Ray', 'Alvarez', 'Quezon City', 4, 18, 2004, 'F');

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
(2345, 'johnservo@gmail.com', '1111'),
(3456, 'johnservo@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_info`
--

CREATE TABLE `pharmacy_info` (
  `pharmacyID` int(11) DEFAULT NULL,
  `pharmacyName` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_info`
--

INSERT INTO `pharmacy_info` (`pharmacyID`, `pharmacyName`, `location`) VALUES
(1234, 'Pharmacy 1', 'Kidapawan City'),
(2345, 'Pharmacy 2', 'Davao City'),
(3456, 'Pharmacy 3', 'Quezon City');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_login`
--

CREATE TABLE `pharmacy_login` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_login`
--

INSERT INTO `pharmacy_login` (`id`, `email`, `password`) VALUES
(1234, 'pharmacy1@gmail.com', '1111'),
(2345, 'pharmacy2@gmail.com', '1111'),
(3456, 'pharmacy3@gmail.com', '1111');

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
(1234, 4321, 'diagnosis 1', '2022-06-05 00:00:00', 'Note 1', 20, 1234),
(2345, 5432, 'diagnosis 2', '2022-06-06 00:00:00', 'Note 2', 30, 2345),
(3456, 6543, 'diagnosis 3', '2022-06-07 00:00:00', 'Note 3', 40, 3456);

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
(4321, 'Generic Name 1', 'Dosage Name 1'),
(5432, 'Generic Name 2', 'Dosage Name 2'),
(6543, 'Generic Name 3', 'Dosage Name 3');

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
(1234, 1),
(2345, 0),
(3456, 1);

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
