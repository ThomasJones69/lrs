-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jan 2018 om 14:53
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrs`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanwezigheid`
--

CREATE TABLE `aanwezigheid` (
  `leerling_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` int(5) NOT NULL,
  `absentiecode` int(11) DEFAULT NULL,
  `klas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `aanwezigheid`
--

INSERT INTO `aanwezigheid` (`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`) VALUES
(1, '2018-01-10', 1447, 0, 1),
(1, '2018-01-10', 1448, 0, 1),
(1, '2018-01-10', 1450, 0, 1),
(1, '2018-01-10', 1451, 0, 1),
(2, '2018-01-10', 1450, 0, 1),
(2, '2018-01-10', 1451, 0, 1),
(3, '2018-01-10', 1450, 0, 1),
(3, '2018-01-10', 1451, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `absentie`
--

CREATE TABLE `absentie` (
  `id` int(11) NOT NULL,
  `signalering` varchar(20) NOT NULL,
  `aantal` int(11) NOT NULL,
  `urgentie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `absentie`
--

INSERT INTO `absentie` (`id`, `signalering`, `aantal`, `urgentie`) VALUES
(1, 'Ziek', 3, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `omschrijving` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`id`, `naam`, `omschrijving`) VALUES
(1, 'Klas 1a', 'Eerste klas van onderwijzer Van de Valk ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerling`
--

CREATE TABLE `leerling` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `telnood` varchar(20) NOT NULL,
  `telouders` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `schermvolgnr` int(11) NOT NULL,
  `klas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `leerling`
--

INSERT INTO `leerling` (`id`, `naam`, `adres`, `woonplaats`, `tel`, `telnood`, `telouders`, `foto`, `schermvolgnr`, `klas`) VALUES
(1, 'Piet Jansen', 'Kerkstraat 26', 'Zwolle', '06123456789', '06123456789', '06123456789', './fotoos/eend1.jpg', 1, 1),
(2, 'Klaas Klaasen', 'Dorpstraat 12', 'Hardenberg', '06123456789', '06123456789', '06123456789', './fotoos/eend2.jpg', 2, 1),
(3, 'school boy', 'kerlaan 22', 'amsterdam', '06123456789', '06123456789', '06123456789', 'fotoos/schoolboy.png', 3, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  ADD PRIMARY KEY (`leerling_id`,`datum`,`tijd`);

--
-- Indexen voor tabel `absentie`
--
ALTER TABLE `absentie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `leerling`
--
ALTER TABLE `leerling`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  MODIFY `leerling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `absentie`
--
ALTER TABLE `absentie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `leerling`
--
ALTER TABLE `leerling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
