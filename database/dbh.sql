-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 10:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
(123456, 789123, 'Juan', 'Felix', 'Cena');

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

--
-- Dumping data for table `doctor_specialization`
--

INSERT INTO `doctor_specialization` (`prcRegNumber`, `specialization`) VALUES
(123456, 'Thuganomics');

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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`pharmacyID`, `medicineID`, `quantityLeft`) VALUES
(1, 1, 768),
(1, 2, 768),
(1, 3, 768),
(1, 4, 768),
(1, 5, 768),
(1, 6, 768),
(2, 1, 768),
(2, 2, 747);

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
(321654, 'Jose', 'Marie', 'Viceral', 'Luzon, Philippines', 6, 23, 1974, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `patient_login`
--

CREATE TABLE `patient_login` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'RJC Pharmacy', 'Tagum City'),
(2, 'Perpetual Pharmacy', 'Tagum City');

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
(1, 'rjcpharm@gmail.com', 'asdfghjkl987'),
(2, 'perpetual@gmail.com', 'perpetual45');

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
  `pieces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescriptionID`, `medicineID`, `diagnosis`, `datePrescribed`, `doctorNotes`, `pieces`) VALUES
(456789, 2, 'Take 3 times a day for', '2022-06-05 10:58:49', 'Lorem ipsum', 21),
(6541230, 1, 'Take 3 times a day for', '2022-06-05 11:14:04', 'Ipsum Lorem', 10);

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
(1, 'Paracetamol 500mg', 'Biogesic'),
(2, 'Paracetamol 500mg', 'Neozep'),
(3, 'Amlodipine 10mg', 'Amlorex'),
(4, 'Celecoxib 200mg Capsule', 'Recosan 200'),
(5, 'Loperamide', 'Diatabs'),
(6, 'Naproxen Sodium 550mg', 'Flanax Forte');

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
(456789, 0),
(6541230, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
