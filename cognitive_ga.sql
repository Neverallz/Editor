-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 02-Mar-2018 às 16:18
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cognitive_ga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Counters`
--

CREATE TABLE `Counters` (
  `idCounters` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Dispensers`
--

CREATE TABLE `Dispensers` (
  `idDispensers` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'Online/OffLine',
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0 - Iddle/Printing/Opened/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Entity`
--

CREATE TABLE `Entity` (
  `idEntity` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Entity_Counters`
--

CREATE TABLE `Entity_Counters` (
  `idEntity_Counters` int(11) NOT NULL,
  `idEntity` int(11) NOT NULL,
  `idCounters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Entity_Dispensers`
--

CREATE TABLE `Entity_Dispensers` (
  `idEntity_Dispensers` int(11) NOT NULL,
  `idEntity` int(11) NOT NULL,
  `idDispensers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Entity_Services`
--

CREATE TABLE `Entity_Services` (
  `idEntity_Services` int(11) NOT NULL,
  `idEntity` int(11) NOT NULL,
  `idService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Queue`
--

CREATE TABLE `Queue` (
  `idQueue` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Services`
--

CREATE TABLE `Services` (
  `idServices` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `letter` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT '0',
  `isPriority` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Ticket`
--

CREATE TABLE `Ticket` (
  `idTicket` int(11) NOT NULL,
  `idEntity_Service` int(11) DEFAULT NULL,
  `number` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `printTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users`
--

CREATE TABLE `Users` (
  `idUsers` int(11) NOT NULL,
  `idUserType` int(11) NOT NULL,
  `userName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Users`
--

INSERT INTO `Users` (`idUsers`, `idUserType`, `userName`, `password`, `name`, `desc`) VALUES
(3, 1, 'top', 'top', 'top', 'top\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `UserType`
--

CREATE TABLE `UserType` (
  `idUserType` int(11) NOT NULL,
  `desc` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='	';

--
-- Extraindo dados da tabela `UserType`
--

INSERT INTO `UserType` (`idUserType`, `desc`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `User_Entity`
--

CREATE TABLE `User_Entity` (
  `idUser_Entity` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idEntity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Counters`
--
ALTER TABLE `Counters`
  ADD PRIMARY KEY (`idCounters`),
  ADD UNIQUE KEY `idCounters_UNIQUE` (`idCounters`);

--
-- Indexes for table `Dispensers`
--
ALTER TABLE `Dispensers`
  ADD PRIMARY KEY (`idDispensers`);

--
-- Indexes for table `Entity`
--
ALTER TABLE `Entity`
  ADD PRIMARY KEY (`idEntity`),
  ADD UNIQUE KEY `idEntity_UNIQUE` (`idEntity`);

--
-- Indexes for table `Entity_Counters`
--
ALTER TABLE `Entity_Counters`
  ADD PRIMARY KEY (`idEntity_Counters`),
  ADD UNIQUE KEY `idEntity_Counters_UNIQUE` (`idEntity_Counters`),
  ADD KEY `fk_Entity_Counters_Entity1` (`idEntity`),
  ADD KEY `fk_Entity_Counters_Counters1` (`idCounters`);

--
-- Indexes for table `Entity_Dispensers`
--
ALTER TABLE `Entity_Dispensers`
  ADD PRIMARY KEY (`idEntity_Dispensers`),
  ADD UNIQUE KEY `idEntity_Dispensers_UNIQUE` (`idEntity_Dispensers`),
  ADD KEY `fk_Entity_Dispensers_Entity` (`idEntity`),
  ADD KEY `fk_Entity_Dispensers_Dispensers1` (`idDispensers`);

--
-- Indexes for table `Entity_Services`
--
ALTER TABLE `Entity_Services`
  ADD PRIMARY KEY (`idEntity_Services`),
  ADD UNIQUE KEY `idEntity_Services_UNIQUE` (`idEntity_Services`),
  ADD KEY `fk_Entity_Services_Entity1` (`idEntity`),
  ADD KEY `fk_Entity_Services_Services1` (`idService`);

--
-- Indexes for table `Queue`
--
ALTER TABLE `Queue`
  ADD PRIMARY KEY (`idQueue`),
  ADD UNIQUE KEY `idQueue_UNIQUE` (`idQueue`),
  ADD KEY `fk_Queue_Ticket1` (`idTicket`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`idServices`),
  ADD UNIQUE KEY `idServices_UNIQUE` (`idServices`),
  ADD UNIQUE KEY `letter_UNIQUE` (`letter`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD UNIQUE KEY `idTicket_UNIQUE` (`idTicket`),
  ADD KEY `fk_Ticket_Entity_Services1` (`idEntity_Service`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `idUsers_UNIQUE` (`idUsers`),
  ADD UNIQUE KEY `userName_UNIQUE` (`userName`),
  ADD KEY `fk_Users_UserType1` (`idUserType`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`idUserType`),
  ADD UNIQUE KEY `idUserType_UNIQUE` (`idUserType`);

--
-- Indexes for table `User_Entity`
--
ALTER TABLE `User_Entity`
  ADD PRIMARY KEY (`idUser_Entity`),
  ADD UNIQUE KEY `idUser_Entity_UNIQUE` (`idUser_Entity`),
  ADD KEY `fk_User_Entity_Users1` (`idUser`),
  ADD KEY `fk_User_Entity_Entity1` (`idEntity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Counters`
--
ALTER TABLE `Counters`
  MODIFY `idCounters` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Dispensers`
--
ALTER TABLE `Dispensers`
  MODIFY `idDispensers` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Entity`
--
ALTER TABLE `Entity`
  MODIFY `idEntity` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Entity_Counters`
--
ALTER TABLE `Entity_Counters`
  MODIFY `idEntity_Counters` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Entity_Dispensers`
--
ALTER TABLE `Entity_Dispensers`
  MODIFY `idEntity_Dispensers` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Entity_Services`
--
ALTER TABLE `Entity_Services`
  MODIFY `idEntity_Services` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Queue`
--
ALTER TABLE `Queue`
  MODIFY `idQueue` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `idServices` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `UserType`
--
ALTER TABLE `UserType`
  MODIFY `idUserType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `User_Entity`
--
ALTER TABLE `User_Entity`
  MODIFY `idUser_Entity` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Entity_Counters`
--
ALTER TABLE `Entity_Counters`
  ADD CONSTRAINT `fk_Entity_Counters_Counters1` FOREIGN KEY (`idCounters`) REFERENCES `Counters` (`idCounters`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Entity_Counters_Entity1` FOREIGN KEY (`idEntity`) REFERENCES `Entity` (`idEntity`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Entity_Dispensers`
--
ALTER TABLE `Entity_Dispensers`
  ADD CONSTRAINT `fk_Entity_Dispensers_Dispensers1` FOREIGN KEY (`idDispensers`) REFERENCES `Dispensers` (`idDispensers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Entity_Dispensers_Entity` FOREIGN KEY (`idEntity`) REFERENCES `Entity` (`idEntity`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Entity_Services`
--
ALTER TABLE `Entity_Services`
  ADD CONSTRAINT `fk_Entity_Services_Entity1` FOREIGN KEY (`idEntity`) REFERENCES `Entity` (`idEntity`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Entity_Services_Services1` FOREIGN KEY (`idService`) REFERENCES `Services` (`idServices`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Queue`
--
ALTER TABLE `Queue`
  ADD CONSTRAINT `fk_Queue_Ticket1` FOREIGN KEY (`idTicket`) REFERENCES `Ticket` (`idTicket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `fk_Ticket_Entity_Services1` FOREIGN KEY (`idEntity_Service`) REFERENCES `Entity_Services` (`idEntity_Services`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `fk_Users_UserType1` FOREIGN KEY (`idUserType`) REFERENCES `UserType` (`idUserType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `User_Entity`
--
ALTER TABLE `User_Entity`
  ADD CONSTRAINT `fk_User_Entity_Entity1` FOREIGN KEY (`idEntity`) REFERENCES `Entity` (`idEntity`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_User_Entity_Users1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
