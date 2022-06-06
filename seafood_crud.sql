-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 02:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seafood_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(6, 'admin', '$2y$10$aHh3TvzLBFhQQssO8Hfv8Os9T8cA.QxIcTfo0daWICkkjXjO3u3Ye'),
(7, 'user', '$2y$10$WkOkgtGVXOuSkufP1yNB4O6f0SaZGte2e73/syRv5YEqsVXtxACMu');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Birthdate` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact Number` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `Username`, `Name`, `Age`, `Birthdate`, `Email`, `Contact Number`, `Gender`, `Password`) VALUES
(18, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '$2y$10$o5PF9QHyM5dpIdTX5oDmYO2P5q9GiUiffM74TiNiPsTp4eKBMggzu'),
(19, '2', 'asdasd', 'dasd', 'dasd', 'asdas', 'asdasd', 'asdas', '$2y$10$8Fsepv1vTSr2q1EE1GGSqedITLHfSVCmQvvkHvCIDIYnVHXXxsOqC'),
(20, 'a', 'asd', 'asdasd', 'dasd', 'asdasd', 'asdas', 'dasd', '$2y$10$NDKPQPx5S96rKn.V0Ys77uR5ZQh.hb9C2kiNLdeqnfbEIg3v7nvqK'),
(21, 'dasd', 'asd', 'dasd', 'asdasd', 'asd', 'asd', 'asd', '$2y$10$oTAS5hTAO2FV.6zEcUyUOevr4FK/qsYulyuD8maGVwpvpBGT0uy/K'),
(22, '123', '123', '123', '123', '123', '123', '123', '$2y$10$uqyaBKS363iUebGbXDRoGOQjXdyv8TVfqXJO2KO.3lxjzOiv2CLnu'),
(26, '456', '123', '123', '123', '123', '123', '123', '$2y$10$LW8regmVTijgdfTl87jqlu/ovipO1uMNnGpPEX5ub1It9ADxUS7HS'),
(27, '345', '123', '123', '123', '123', '123', '123', '$2y$10$/W/senstCp8oO.hlxP0ZMuMKQsBmZYVSM8bSAtcIZmVgjkYm2yEum');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email_Address` varchar(100) NOT NULL,
  `Phone_Number` varchar(100) NOT NULL,
  `Orders` varchar(100) NOT NULL,
  `Quantity` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Total` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `First_Name`, `Last_Name`, `Address`, `Email_Address`, `Phone_Number`, `Orders`, `Quantity`, `Price`, `Total`, `Status`) VALUES
(49, 'gjhg', 'jghj', 'g', 'hjg', 'hjg', 'Bisugo', '1', '450', '0', 'Done'),
(50, 'gjhg', 'jghj', 'g', 'hjg', 'hjg', 'Bisugo', '1', '450', '2950', 'Done'),
(51, 'hj', 'ghj', 'g', 'hjghj', 'ghj', 'Bisugo', '1', '450', '2950', 'Done'),
(52, 'rhr', 'ty', 'tr', 'tyr', 'ty', 'Alumahan', '1', '400', '1950', 'Done'),
(53, 'rhr', 'ty', 'tr', 'tyr', 'ty', 'Alumahan', '1', '400', '1950', 'Pending'),
(54, 'rhr', 'ty', 'tr', 'tyr', 'ty', 'Alumahan', '1', '400', '1950', 'Pending'),
(55, 'fgh', 'fghfg', 'hfhg', 'fgh', 'fh', 'Bangus', '1', '200', '600', 'Pending'),
(56, 'Sample name', 'last name', 'ghj', 'ghjghj', 'gh', 'Crab', '2', '1100', '2200', 'Done'),
(57, '567', '567', '567', '567', '567', 'Asuhos', '1', '450', '850', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(10) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Price` varchar(500) NOT NULL,
  `Stocks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `Image`, `Name`, `Price`, `Stocks`) VALUES
(1, 'https://lh3.googleusercontent.com/pw/AM-JKLX_MWxQx-ELoiiUC_Nc_pmjPq9H85WQQjhxbyohp-DB36wz7DtDViFMhBw3JbV6_AsK9J94VFRLnmx6cUGWZ_6NMDk28Yvd8Og_KGNnDMJZY2JGdAaJbntFv4wCwwzscvvk0n0pSoOGa6_DOOdK01ei=w726-h968-no?authuser=0', 'Alumahan', '400', '10'),
(2, 'https://lh3.googleusercontent.com/pw/AM-JKLU51Gh5zjhHFU1wGbymNPSkZL675Q6sH4cDfeRnC0GYzaf8mGjms3xWusNqbvAYOcGWUaTpNkwexymmRvU08U6SB3VnyRUDhbpVclVTLQ1HG2u3mDzxQLAN-Z54b-oZ6afeqC9zICh6BAjahQ8n8dca=w958-h720-no?authuser=0', 'Asuhos', '450', '10'),
(3, 'https://lh3.googleusercontent.com/pw/AM-JKLUNsmnKMTEvTZWjpCwKwDOhWo8545iLItKQDDs7Ljlui7OMVI4ItSsFhbM1RFXicTL3CGu2CZUBQryauZIIKW_FjvoKgxnCAGmgtenduZyPcrVjV_YuwzhSspM-UxVipi-z8iGMtaB5mbvzUZxSTf6z=w720-h959-no?authuser=0', 'Bangus', '200', '10'),
(4, 'https://lh3.googleusercontent.com/pw/AM-JKLULudCdd3QpJZyKUzkDoAdKa3kAvu6QkUasUXT2twPthmDQNdIjrjN3j99kiUjPOrF8E38DixKPzim89FkT5yFHKTrAXA6xENYeLDntapf7Rfj7A0kG2Pzi9dPe6ABOpKbbHa4niqoZcPy-6L4Zdcjj=w958-h720-no?authuser=0', 'Bisugo', '450', '10'),
(5, 'https://lh3.googleusercontent.com/pw/AM-JKLVYZRbNLsog2gmEc-MWZyuXleNLhYoT5tf_owFPxk09namW5SWC1hqUNuQpvJzbgu07Mo70yqb73CCboHE6l3lFqlmCTnmbW6ES0_XJ9gHxTIZ7mR3i3fFnedQ7s6lHH6lqRszkulTdjtwwlK5CD4FJ=w720-h959-no?authuser=0', 'Black Pompano', '550', '10'),
(6, 'https://lh3.googleusercontent.com/pw/AM-JKLUN93_ncUJ3UScHUw-LyG7gxsJd-0faALYg5FwerbM1TuhOjl4eIMNw9WFE0YdWh5SNZawagpeYvCvqkCZwSAa-33EhTb3bHDBnbbr3JCHBVOaYZOCJ-tbXAznB7jIXrSZYKx9UJsw5FpKw7VZZ8fYl=w720-h959-no?authuser=0', 'Crab', '1100', '10'),
(7, 'https://lh3.googleusercontent.com/pw/AM-JKLWna-3WIQuADukforUoft0MhOsbW5XilzVUp5-0aay-UbCI8tX2FOybLG0T_41JK0NQA8OfQ7HP4tdN7toVWEYPccv5_95BV_2y-7Mo57uPpwN0qG7eEA3cBfSMIhaLuY6yZCH5ktECOSAGsb4Ag_iA=w720-h959-no?authuser=0', 'Dalagang Bukid', '400', '10'),
(8, 'https://lh3.googleusercontent.com/pw/AM-JKLUzpDblwYsX0aHaxjRzOTZtkUGqLxSgbKhvU72U5UbxwwqaQ9UkRZ42LzoBh12ksI38sxh5Gd3-JZ40yZpRq1IVBRbrYRMIF2_g5GbwomRTthL3DnK1AZSj32D092ee3Ld-8lPqyLuAkAXMO2I9KmZV=w720-h959-no?authuser=0', 'Espada', '450', '10');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Birthdate` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact Number` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `Username`, `Name`, `Age`, `Birthdate`, `Email`, `Contact Number`, `Gender`, `Password`) VALUES
(1, 'staff', 'staff', '1', '12', 'dasdas', '123', 'm', 'staff'),
(2, '1', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '$2y$10$2q5INvugz6YBbny65B7d1.mHdHmG8zxnCPdenUXOAPEPmLbLmr.pe'),
(3, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '$2y$10$KK8oFfnNcbkNo9Xg2yFbbOWJLesKq/gIUc6WKjvzHG8fZwLFeVSuy'),
(4, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '$2y$10$LfkQs1uIw9JAuKZiP5881ebroLhjMPlB.oNN9Ht1j4ixLZZ6cPpsG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
