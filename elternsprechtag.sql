-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Feb 2020 um 11:04
-- Server-Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `elternsprechtag`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bucherindex`
--

CREATE TABLE IF NOT EXISTS `bucherindex` (
  `UUID` int(50) NOT NULL,
  `Geschlecht` varchar(8) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Passwort` varchar(50) NOT NULL,
  `typ` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lehrer`
--

CREATE TABLE IF NOT EXISTS `lehrer` (
  `Kürzel` varchar(5) NOT NULL,
  `Geschlecht` varchar(8) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Raum` varchar(5) NOT NULL,
  `Passwort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `passwort`
--

CREATE TABLE IF NOT EXISTS `passwort` (
  `UUID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schüler`
--

CREATE TABLE IF NOT EXISTS `schüler` (
  `UUID` int(50) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Betriebsname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schülergruppe`
--

CREATE TABLE IF NOT EXISTS `schülergruppe` (
  `Gruppen_ID` int(50) NOT NULL,
  `Schüler` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `termine`
--

CREATE TABLE IF NOT EXISTS `termine` (
  `Kürzel` varchar(5) NOT NULL,
  `Uhrzeit` time(4) NOT NULL,
  `anmeldung` int(50) NOT NULL,
  `Schülergruppe` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bucherindex`
--
ALTER TABLE `bucherindex`
  ADD PRIMARY KEY (`UUID`);

--
-- Indizes für die Tabelle `lehrer`
--
ALTER TABLE `lehrer`
  ADD PRIMARY KEY (`Kürzel`);

--
-- Indizes für die Tabelle `passwort`
--
ALTER TABLE `passwort`
  ADD PRIMARY KEY (`UUID`);

--
-- Indizes für die Tabelle `schüler`
--
ALTER TABLE `schüler`
  ADD PRIMARY KEY (`UUID`);

--
-- Indizes für die Tabelle `schülergruppe`
--
ALTER TABLE `schülergruppe`
  ADD KEY `Gruppen_ID` (`Gruppen_ID`,`Schüler`), ADD KEY `Schüler` (`Schüler`);

--
-- Indizes für die Tabelle `termine`
--
ALTER TABLE `termine`
  ADD PRIMARY KEY (`Kürzel`,`Uhrzeit`), ADD KEY `anmeldung` (`anmeldung`,`Schülergruppe`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bucherindex`
--
ALTER TABLE `bucherindex`
  MODIFY `UUID` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `schüler`
--
ALTER TABLE `schüler`
  MODIFY `UUID` int(50) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `schülergruppe`
--
ALTER TABLE `schülergruppe`
ADD CONSTRAINT `schülergruppe_ibfk_1` FOREIGN KEY (`Schüler`) REFERENCES `schüler` (`UUID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
