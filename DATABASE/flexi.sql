-- phpMyAdmin SQL Dump
-- version 4.4.6
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Ned 04. říj 2015, 01:36
-- Verze serveru: 5.6.24
-- Verze PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `flexi`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `adminID` int(11) NOT NULL,
  `admin_username` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `admin_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `admins`
--

INSERT INTO `admins` (`adminID`, `admin_username`, `admin_password`, `admin_email`, `admin_created`) VALUES
(1, 'wUFr', 'bbc0d6b31985dd8531e4ebb83b3204f9a066b1a5', 'admin@localhost', '2015-10-03 22:28:30');

-- --------------------------------------------------------

--
-- Struktura tabulky `admins_logged`
--

CREATE TABLE IF NOT EXISTS `admins_logged` (
  `loggedID` int(11) NOT NULL,
  `logged_sessionid` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `logged_ip` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `logged_adminID` int(11) NOT NULL,
  `logged_info` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `logged_browser` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `logged_location` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `logged_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `admins_logged`
--

INSERT INTO `admins_logged` (`loggedID`, `logged_sessionid`, `logged_ip`, `logged_adminID`, `logged_info`, `logged_browser`, `logged_location`, `logged_since`) VALUES
(22, 'pht7p2n56e9n4ja9ofg12evdt0', '10.10.10.10', 1, 'ololololo!!', 'Chrome 45.0', 'TODO', '2015-10-03 23:33:02');

-- --------------------------------------------------------

--
-- Struktura tabulky `boxes`
--

CREATE TABLE IF NOT EXISTS `boxes` (
  `boxID` int(11) NOT NULL,
  `box_name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `box_type` int(11) NOT NULL,
  `box_position` int(11) DEFAULT NULL,
  `box_public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `boxes_groups`
--

CREATE TABLE IF NOT EXISTS `boxes_groups` (
  `groupID` int(11) NOT NULL,
  `group_name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `group_public` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `boxes_params`
--

CREATE TABLE IF NOT EXISTS `boxes_params` (
  `paramID` int(11) NOT NULL,
  `param_for` int(11) NOT NULL,
  `param_name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `param_value` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `param_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `boxes_types`
--

CREATE TABLE IF NOT EXISTS `boxes_types` (
  `typeID` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `type_module` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `type_min_rights` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_email`),
  ADD UNIQUE KEY `adminID` (`adminID`);

--
-- Klíče pro tabulku `admins_logged`
--
ALTER TABLE `admins_logged`
  ADD PRIMARY KEY (`loggedID`);

--
-- Klíče pro tabulku `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`boxID`);

--
-- Klíče pro tabulku `boxes_groups`
--
ALTER TABLE `boxes_groups`
  ADD PRIMARY KEY (`groupID`,`group_name`);

--
-- Klíče pro tabulku `boxes_params`
--
ALTER TABLE `boxes_params`
  ADD PRIMARY KEY (`paramID`,`param_for`);

--
-- Klíče pro tabulku `boxes_types`
--
ALTER TABLE `boxes_types`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `admins_logged`
--
ALTER TABLE `admins_logged`
  MODIFY `loggedID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pro tabulku `boxes`
--
ALTER TABLE `boxes`
  MODIFY `boxID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `boxes_groups`
--
ALTER TABLE `boxes_groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `boxes_params`
--
ALTER TABLE `boxes_params`
  MODIFY `paramID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `boxes_types`
--
ALTER TABLE `boxes_types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
