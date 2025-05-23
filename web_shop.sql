-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 24. Mai 2025 um 00:27
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `web_shop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `sifra` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `korisnici`
--

INSERT INTO `korisnici` (`id`, `email`, `sifra`) VALUES
(5, 'nekimejl@mejl.com', '$2y$10$Hf4uE.s/v2bpiFN2cxJ3AuHnFKNyV3jx5EKNnQ0VGa8nFGv8JbrFK'),
(6, 'testtesttest@mejl.com', '$2y$10$ZgUnh2G0xDkWMVmXrJoCneGIlU1hPFljdlfvB1at3MIu/kmPcX9rm'),
(17, 'darkosima1983@gmail.com', '$2y$10$jm5WkP/5jlO7HAM6yS3xZeTNNtUikHixSdrRHknekCfmGUYpLgnAK');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `narudzbine`
--

CREATE TABLE `narudzbine` (
  `id` int(11) NOT NULL,
  `id_proizvoda` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `cena` decimal(20,2) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `narudzbine`
--

INSERT INTO `narudzbine` (`id`, `id_proizvoda`, `id_korisnika`, `cena`, `kolicina`) VALUES
(2, 1, 7, '11999.90', 10),
(3, 7, 7, '2000.00', 5),
(4, 6, 7, '5000.00', 10),
(5, 8, 7, '1000.00', 10),
(6, 2, 6, '249995.00', 500),
(7, 2, 6, '4999.90', 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `ime` varchar(64) NOT NULL,
  `opis` text DEFAULT NULL,
  `cena` decimal(10,2) NOT NULL,
  `slika` varchar(128) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `ime`, `opis`, `cena`, `slika`, `kolicina`) VALUES
(1, 'iPhone 13', 'Dobar iPhone', '1199.99', 'iPhone13.jpg', 55),
(2, 'iPhone 11', 'iPhone kao nov', '499.99', 'iPhone11.jpg', 22),
(3, 'iPhone 15', '100% pravi iPhone', '2499.99', 'nepostojeci.jpg', 0),
(4, 'iPhone 14 ProMax', 'Ukraden nov iz Austrije (legalan)', '1999.99', 'iPhone14.jpg', 66),
(5, 'Samsung S24', 'Veoma dobar', '1900.00', 'Samsung S24.jpg', 10),
(6, 'Samsung S23', 'Dobar', '500.00', 'Samsung S23.jpg', 500),
(7, 'Motorola G23', 'Americka motorola', '400.00', 'Motorola G24.jpg', 50),
(8, 'Nokia 3110', 'oldtimer', '100.00', 'Nokia3310.jpg', 0),
(9, 'Samsung S21', 'Dobar', '1000.00', 'Samsung S21.jpg', 10),
(10, 'Samsung S22', 'Zamlja porekla Nemacka', '650.00', 'Samsung S22.jpg', 10),
(16, 'Nokia', 'Nokia iz Amerike', '45.00', 'Nokia.jpg', 30),
(19, 'Honor Magic', 'Veoma dobar', '600.00', '', 10),
(20, 'Samsung S24', 'Americka ponuda', '700.00', '', 10),
(21, 'Samsung S21', 'Americka ponuda', '100.00', '', 10);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT für Tabelle `narudzbine`
--
ALTER TABLE `narudzbine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
