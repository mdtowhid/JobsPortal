-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 12:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict_job_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Gender` varchar(16) NOT NULL,
  `ImageUrl` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminId`, `FirstName`, `LastName`, `Email`, `Password`, `PhoneNo`, `Gender`, `ImageUrl`, `Date`) VALUES
(1, 'Md', 'Towhid', 'pencilic123@gmail.com', '123456', '0097472232', 'Male', '../images/avatar2.png', '2019-08-22'),
(2, 'java', 'ldfkdlfk', 'jq@gmail.com', '1234567890', '1234567', 'Male', '../images/1402926_10150004552801901_469209496895221757_o.jpg', '2019-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `CompanyId` int(11) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `PhoneNumber` varchar(120) DEFAULT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`CompanyId`, `CompanyName`, `Email`, `Address`, `IsActive`, `PhoneNumber`, `Password`) VALUES
(1, 'Fiverr Software Limited.', 'a@gmail.com', 'Some address....', 1, '123456789', '123456789'),
(3, 'ABCD Company', 'e@gmail.com', 'South badda, Dhaka', 0, '+01777252', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `company_job_seekers`
--

CREATE TABLE `company_job_seekers` (
  `Id` int(100) NOT NULL,
  `JobId` int(100) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `SeekerId` int(100) NOT NULL,
  `AppliedDate` date NOT NULL,
  `AppliedStatus` varchar(59) NOT NULL,
  `IsEligible` tinyint(1) DEFAULT NULL,
  `ActiveStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_job_seekers`
--

INSERT INTO `company_job_seekers` (`Id`, `JobId`, `CompanyId`, `SeekerId`, `AppliedDate`, `AppliedStatus`, `IsEligible`, `ActiveStatus`) VALUES
(52, 2, 3, 2, '2019-08-15', 'Applied', 0, 0),
(53, 3, 3, 2, '2019-08-15', 'Applied', 0, 0),
(56, 2, 3, 1, '2019-08-15', 'Applied', 0, 0),
(57, 3, 3, 1, '2019-08-15', 'Applied', 0, 0),
(58, 4, 1, 1, '2019-08-15', 'Applied', 1, 1),
(59, 5, 1, 1, '2019-08-16', 'Applied', 1, 1),
(60, 6, 3, 1, '2019-08-16', 'Applied', 0, 0),
(61, 7, 3, 1, '2019-08-16', 'Applied', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `CategoryId` int(11) NOT NULL,
  `CatgoryName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`CategoryId`, `CatgoryName`) VALUES
(1, 'Accounting/Finance'),
(2, 'Education'),
(3, 'Production'),
(4, 'NGO'),
(5, 'Data Entry'),
(6, 'Research'),
(7, 'Drivings'),
(8, 'Programming'),
(9, 'Law'),
(10, 'Web Design'),
(11, 'Web Developing'),
(12, 'Graphics Design'),
(13, 'Media'),
(14, 'Media 1'),
(15, 'It & Telecommunications'),
(16, 'New Category'),
(17, 'New Category 1');

-- --------------------------------------------------------

--
-- Table structure for table `job_posted_by_companies`
--

CREATE TABLE `job_posted_by_companies` (
  `JobId` int(11) NOT NULL,
  `JobTitle` varchar(190) NOT NULL,
  `Vacancy` int(20) NOT NULL,
  `JobContext` varchar(700) NOT NULL,
  `JobResponsibility` varchar(700) NOT NULL,
  `EmploymentStatus` varchar(200) NOT NULL,
  `EducationalReq` varchar(400) NOT NULL,
  `ExperienceReq` varchar(700) NOT NULL,
  `AdditionalReq` varchar(700) NOT NULL,
  `JobLocation` varchar(600) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `OtherBenefit` varchar(600) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `PostedDate` date NOT NULL,
  `DeadLineDate` date NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_posted_by_companies`
--

INSERT INTO `job_posted_by_companies` (`JobId`, `JobTitle`, `Vacancy`, `JobContext`, `JobResponsibility`, `EmploymentStatus`, `EducationalReq`, `ExperienceReq`, `AdditionalReq`, `JobLocation`, `Salary`, `OtherBenefit`, `CompanyId`, `CategoryId`, `PostedDate`, `DeadLineDate`, `ActiveStatus`) VALUES
(2, 'Web Design', 3, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repell', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaqu', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 3, 1, '2019-08-09', '2019-08-31', 1),
(3, 'trtr', 4, 'rerer fe', 'erre erew', 'eer', 'wrerwe ', 'wrerew', 'rwerwerwe', 'rere', 'Negotiable', 'ewrwer wer werwds', 3, 1, '2019-08-09', '2019-09-06', 1),
(4, 'Web Development', 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'fddfd', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 'fdfdf', 'Negotiable', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', 1, 5, '2019-08-09', '2019-08-31', 0),
(5, 'Graphics Designer', 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.', '                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.                                                ', 'Full', '                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.                                                ', '                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.                                                ', '                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.                                                ', 'Dhaka', 'Negotiable', '                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad nesciunt mollitia eveniet? Quidem itaque distinctio beatae, architecto cum, voluptates voluptate vitae placeat corrupti perferendis, repellat dolorum nostrum iure molestias id.                                                ', 1, 1, '2019-08-10', '2019-09-07', 0),
(6, 'Web Development', 5, 'Some job context...\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Job Responsibilitis Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Full', '\r\nEducational Requirments Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Dhaka', 'Negotiable', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 3, 2, '2019-08-15', '2019-08-19', 0),
(7, 'Web Development 2', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Ful', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 'Dhaka', 'Negotiable', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quasi labore numquam dignissimos ullam repellendus quidem provident in officia dolore laudantium eveniet accusamus, quas nesciunt aliquam non unde. Aliquam, odio.', 3, 2, '2019-08-15', '2019-08-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `JobSeekerId` int(11) NOT NULL,
  `FirstName` varchar(300) NOT NULL,
  `LastName` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `PhoneNo` varchar(300) NOT NULL,
  `ImageUrl` varchar(300) NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL,
  `CreationDate` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `CVPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`JobSeekerId`, `FirstName`, `LastName`, `Email`, `Address`, `Password`, `PhoneNo`, `ImageUrl`, `ActiveStatus`, `CreationDate`, `Gender`, `CVPath`) VALUES
(1, 'Jahanara', 'Imam', 'jahanara12@gmail.com', 'Some Address...', '1234567890', '123456789', '../UserImg/bk.jpg', 1, '2019-08-18', 'Female', '../CVs/lex_V7.pdf'),
(2, 'Xioami', 'MI', 'xioami@gmail.com', 'Some Address', '1234567890-', '123456789', '../UserImg/t.jpg', 1, '2019-08-13', 'Male', '../CVs/1 - Copy (5).pdf'),
(3, 'Mrs.', 'Alfred', 'pencilic123@gmail.com', 'kdsksdj jwjwj wejwhehj', '12345678', '123456789', '../UserImg/6-128.png', 1, '2019-08-15', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `posted_jobs`
--

CREATE TABLE `posted_jobs` (
  `JobId` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Experience` varchar(200) NOT NULL,
  `Deadline` date NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL,
  `CompanyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posted_jobs`
--

INSERT INTO `posted_jobs` (`JobId`, `Title`, `Address`, `Experience`, `Deadline`, `ActiveStatus`, `CompanyId`) VALUES
(22, 'abcd', 'asaewe', '4-5 years', '2019-08-06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posted_job_details`
--

CREATE TABLE `posted_job_details` (
  `JobDetailsId` int(11) NOT NULL,
  `Vacancy` int(10) NOT NULL,
  `JobRespons` varchar(499) NOT NULL,
  `EmpStatus` varchar(499) NOT NULL,
  `EdRequirements` varchar(499) NOT NULL,
  `ExRequirements` varchar(499) NOT NULL,
  `AdRequirements` varchar(499) NOT NULL,
  `JobLocation` varchar(499) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `PostedJobId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_companytblwithcompaniesposttbl`
-- (See below for the actual view)
--
CREATE TABLE `view_companytblwithcompaniesposttbl` (
`CompanyName` varchar(100)
,`Email` varchar(50)
,`Address` varchar(500)
,`PhoneNumber` varchar(120)
);

-- --------------------------------------------------------

--
-- Structure for view `view_companytblwithcompaniesposttbl`
--
DROP TABLE IF EXISTS `view_companytblwithcompaniesposttbl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_companytblwithcompaniesposttbl`  AS  select `companies`.`CompanyName` AS `CompanyName`,`companies`.`Email` AS `Email`,`companies`.`Address` AS `Address`,`companies`.`PhoneNumber` AS `PhoneNumber` from (`companies` join `job_posted_by_companies` on((`companies`.`CompanyId` = `job_posted_by_companies`.`CompanyId`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`CompanyId`);

--
-- Indexes for table `company_job_seekers`
--
ALTER TABLE `company_job_seekers`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `JobId` (`JobId`),
  ADD KEY `SeekerId` (`SeekerId`),
  ADD KEY `CompanyId` (`CompanyId`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `job_posted_by_companies`
--
ALTER TABLE `job_posted_by_companies`
  ADD PRIMARY KEY (`JobId`),
  ADD KEY `CompanyId` (`CompanyId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`JobSeekerId`);

--
-- Indexes for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `posted_job_details`
--
ALTER TABLE `posted_job_details`
  ADD PRIMARY KEY (`JobDetailsId`),
  ADD KEY `PostedJobId` (`PostedJobId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `CompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_job_seekers`
--
ALTER TABLE `company_job_seekers`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job_posted_by_companies`
--
ALTER TABLE `job_posted_by_companies`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `JobSeekerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posted_job_details`
--
ALTER TABLE `posted_job_details`
  MODIFY `JobDetailsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_job_seekers`
--
ALTER TABLE `company_job_seekers`
  ADD CONSTRAINT `company_job_seekers_ibfk_1` FOREIGN KEY (`JobId`) REFERENCES `job_posted_by_companies` (`JobId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `company_job_seekers_ibfk_2` FOREIGN KEY (`SeekerId`) REFERENCES `job_seekers` (`JobSeekerId`);

--
-- Constraints for table `job_posted_by_companies`
--
ALTER TABLE `job_posted_by_companies`
  ADD CONSTRAINT `job_posted_by_companies_ibfk_1` FOREIGN KEY (`CompanyId`) REFERENCES `companies` (`CompanyId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `job_posted_by_companies_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `job_categories` (`CategoryId`) ON UPDATE CASCADE;

--
-- Constraints for table `posted_job_details`
--
ALTER TABLE `posted_job_details`
  ADD CONSTRAINT `posted_job_details_ibfk_1` FOREIGN KEY (`PostedJobId`) REFERENCES `posted_jobs` (`JobId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
