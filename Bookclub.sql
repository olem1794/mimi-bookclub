-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 09:36 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bookclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `AuthorID` int(11) NOT NULL,
  `FirstName` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `LastName` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `SSN` varchar(100) DEFAULT NULL,
  `BirthYear` int(11) DEFAULT NULL,
  `Website` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`AuthorID`, `FirstName`, `LastName`, `SSN`, `BirthYear`, `Website`) VALUES
(1, 'JK', 'Rowling', '650731-3681', 1965, 'https://www.jkrowling.com/'),
(2, 'Catherine', 'Steadman', '870208-1298', 1987, 'https://www.goodreads.com/author/show/16847770.Catherine_Steadman'),
(3, 'Radim', 'Malinic', '850832-1568', 1985, 'https://www.brandnu.co.uk/'),
(4, 'Paul', 'Pen', '782938-7809', 1978, 'https://www.goodreads.com/author/show/5028226.Paul_Pen'),
(5, 'Mindy', 'Mejia', '8309063892', 1983, 'https://mindymejia.com/'),
(6, 'Kirk', 'W.Johnson', '5604279087', 1956, 'http://kirkwjohnson.com/');

-- --------------------------------------------------------

--
-- Table structure for table `AuthorBook`
--

CREATE TABLE `AuthorBook` (
  `BookAuthorID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthorBook`
--

INSERT INTO `AuthorBook` (`BookAuthorID`, `BookID`, `AuthorID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(7, 5, 5),
(8, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Edition` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Year` int(11) NOT NULL,
  `Reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`BookID`, `Title`, `ISBN`, `Pages`, `Edition`, `Year`, `Reserved`) VALUES
(1, 'Harry Potter And The Goblet Of Fire', 'H57CML1989', 345, '2nd', 2005, 1),
(2, 'Something in the Water', 'B074DGMF34', 325, '1st', 2017, 1),
(3, 'The Book Of Ideas', 'B093DGMF88', 240, '1st', 2016, 0),
(4, 'The Light Of The Fireflies ', 'B074DGMF51', 298, '3rd', 2018, 0),
(5, 'Leave No Trace', 'B07CML1949', 336, '1st', 2018, 0),
(6, 'The Feather Thief', 'B074DGMF88', 320, '3rd', 2018, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Gallery`
--

CREATE TABLE `Gallery` (
  `GalleryID` int(11) NOT NULL,
  `ImgName` longtext NOT NULL,
  `imgLocation` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Gallery`
--

INSERT INTO `Gallery` (`GalleryID`, `ImgName`, `imgLocation`) VALUES
(1, '5bc088192ece00.54343449.jpg', 'uploads/5bc088192ece00.54343449.jpg'),
(2, '5bc08d333f7cb1.13305108.jpg', 'uploads/5bc08d333f7cb1.13305108.jpg'),
(3, '5bc08d4d5c2ce9.28251423.jpeg', 'uploads/5bc08d4d5c2ce9.28251423.jpeg'),
(4, '5bc08d53accc83.32770605.jpeg', 'uploads/5bc08d53accc83.32770605.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Library`
--

CREATE TABLE `Library` (
  `LibraryID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Publisher`
--

CREATE TABLE `Publisher` (
  `PubID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `WebBio` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `Username`, `Password`, `Date`) VALUES
(2, 'Admin', 'f3f1c26545d2424e5bbc7bf12a8f2dc6', '2018-10-11 07:18:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `AuthorBook`
--
ALTER TABLE `AuthorBook`
  ADD PRIMARY KEY (`BookAuthorID`),
  ADD KEY `BookID` (`BookID`),
  ADD KEY `AuthorID` (`AuthorID`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `Gallery`
--
ALTER TABLE `Gallery`
  ADD PRIMARY KEY (`GalleryID`);

--
-- Indexes for table `Library`
--
ALTER TABLE `Library`
  ADD PRIMARY KEY (`LibraryID`);

--
-- Indexes for table `Publisher`
--
ALTER TABLE `Publisher`
  ADD PRIMARY KEY (`PubID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `AuthorBook`
--
ALTER TABLE `AuthorBook`
  MODIFY `BookAuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Gallery`
--
ALTER TABLE `Gallery`
  MODIFY `GalleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Library`
--
ALTER TABLE `Library`
  MODIFY `LibraryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Publisher`
--
ALTER TABLE `Publisher`
  MODIFY `PubID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
