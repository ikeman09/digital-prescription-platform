CREATE DATABASE `prescription_platform`;

CREATE TABLE `doctor_login`(
    `prcRegNumber` INT NOT NULL, 
    `id` INT NOT NULL UNIQUE,
    `email` VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL,
    `password` VARCHAR(30),
    PRIMARY KEY (`prcRegNumber`)
);

CREATE TABLE `doctor_info` (
    `prcRegNumber` INT REFERENCES doctor_login(prcRegNumber), 
    `uniqueID` INT REFERENCES doctor_login(`id`),
    `doctorFirstName` VARCHAR(30) NOT NULL,
    `doctorMiddleName` VARCHAR(30),
    `doctorLastName` VARCHAR(30) NOT NULL
);

CREATE TABLE `doctor_specialization` (
    `prcRegNumber` INT REFERENCES doctor_login(`prcRegNumber`), 
    `specialization` VARCHAR(30)
);

CREATE TABLE `doctor_unique_ID` (
    `uniqueID` INT REFERENCES doctor_login(`id`), 
    `secondaryIDType` INT NOT NULL
);

CREATE TABLE `patient_login` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `email`  VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL,
    `password` VARCHAR(30),
    PRIMARY KEY (`id`)
);

CREATE TABLE `patient_info` (
    `patientID` INT REFERENCES patient_login(`id`),
    `patientFirstName` VARCHAR(30) NOT NULL,
    `patientMiddleName` VARCHAR(30),
    `patientLastName` VARCHAR(30) NOT NULL,
    `patientAddress` VARCHAR(30) NOT NULL,
    `birthMonth` INT NOT NULL,
    `birthDay` INT NOT NULL,
    `birthYear` INT NOT NULL,
    `sex` CHAR(1) NOT NULL
);

CREATE TABLE `prescription_medicine` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `genericName_dosage` VARCHAR(30),
    `brandName_dosage` VARCHAR(30),
    PRIMARY KEY (`id`)
);

CREATE TABLE `prescription` (
    `prescriptionID` INT AUTO_INCREMENT NOT NULL,
    `medicineID` INT REFERENCES prescription_medicine(`id`),
    `diagnosis` VARCHAR(30) NOT NULL,
    `datePrescribed` DATETIME NOT NULL,
    `doctorNotes` VARCHAR(30) NOT NULL,
    PRIMARY KEY (`prescriptionID`)
);

CREATE TABLE `prescription_status` (
    `prescriptionID` INT REFERENCES prescription(`prescriptionID`),
    `claimedStatus` BOOLEAN DEFAULT 0 NOT NULL
);

CREATE TABLE `pharmacy_login` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `email` VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL,
    `password` VARCHAR(30),
    PRIMARY KEY (`id`)
);

CREATE TABLE `pharmacy_info` (
    `pharmacyID` INT REFERENCES pharmacy_login(`id`),
    `pharmacyName` VARCHAR(30) NOT NULL,
    `location` VARCHAR(30) NOT NULL
);

CREATE TABLE `inventory` (
    `pharmacyID` INT REFERENCES pharmacy_login(`id`),
    `medicineID` INT REFERENCES prescription_medicine(`id`),
    `quantityLeft` INT NOT NULL
);

























