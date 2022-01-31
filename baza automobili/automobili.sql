-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 06:18 PM
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
-- Database: `automobili`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id_kon` int(11) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `poruka` text NOT NULL,
  `datum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id_kon`, `ime`, `prezime`, `email`, `poruka`, `datum`) VALUES
(6, 'Lazar', 'Slavkovic', 'lazar.jordanovic@hotmail.rs', 'Vaša poruka', '21/01/2022 13:40:33 '),
(7, 'Marko', 'Miljkovic', 'marko@gmail.com', 'Nesto nesto nesto nesto', '28/01/2022 07:34:32 '),
(8, 'Marko', 'Stojkovic', 'stojkovic@gmail.com', 'Neka poruka', '28/01/2022 18:55:18 ');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnika` int(11) NOT NULL,
  `ime_korisnika` varchar(30) NOT NULL,
  `prezime_korisnika` varchar(30) NOT NULL,
  `email_korisnika` varchar(30) NOT NULL,
  `lozinka_korisnika` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `ime_korisnika`, `prezime_korisnika`, `email_korisnika`, `lozinka_korisnika`) VALUES
(1, 'Lazar', 'Jordanovic', 'lazar.jordanovic@gmail.com', 'Lj.2208991'),
(2, 'Marko', 'Cvetanovic', 'marko.cv@gmail.com', 'mare1234'),
(3, 'Milan', 'Cvetanovic', 'milan.cv@gmail.com', 'miki123');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_auto`
--

CREATE TABLE `korisnik_auto` (
  `id_kor_auto` int(11) NOT NULL,
  `ime_vozila` varchar(30) NOT NULL,
  `model_vozila` varchar(30) NOT NULL,
  `kubikaza` varchar(20) NOT NULL,
  `godisete` varchar(10) NOT NULL,
  `br_vrata` tinyint(4) NOT NULL,
  `boja_vozila` varchar(20) NOT NULL,
  `kilometraza` varchar(15) NOT NULL,
  `carinjen` varchar(5) NOT NULL,
  `cena` varchar(20) NOT NULL,
  `dod_info` text NOT NULL,
  `kor_admin` varchar(15) NOT NULL,
  `slika` varchar(100) NOT NULL,
  `slika1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik_auto`
--

INSERT INTO `korisnik_auto` (`id_kor_auto`, `ime_vozila`, `model_vozila`, `kubikaza`, `godisete`, `br_vrata`, `boja_vozila`, `kilometraza`, `carinjen`, `cena`, `dod_info`, `kor_admin`, `slika`, `slika1`) VALUES
(37, 'Audi', 'A6', '2000', '2013', 5, 'Crna metalik', '174.520', 'Da', '12.400', 'Auto je uvezen iz inostranstva, ima svu dodatnu opremu, carinjen je, na ime kupca', 'admin', 'audi1.jpg', 'audi3.jpg'),
(38, 'Renault', 'Clio', '1100', '2011', 3, 'Bela', '150.200', 'Da', '5.600', 'Auto je u savrseno stanju, registrovan jos 5 meseca, uradjeni svi servisi, bez dodatnih ulaganja.', 'admin', 'clio1.jpg', 'clio3.jpg'),
(39, 'Volkswagen', 'Golf 7', '1900', '2013', 5, 'Bela', '158.588', 'Da', '5690', 'Auto je u odlicnom stanju, izvrseni svi servisi,na ime kupca, bez ikakvih dodatnih ulaganja', 'korisnik', 'golf72.jpg', 'golf73.jpg'),
(40, 'Range', 'Rover', '2500', '2014', 5, 'Crna', '150.522', 'Da', '15.500', 'Auto je u savrsenom stanju, ima svu dodatnu opremu, bez dodatnih ulaganja', 'admin', 'range1.jpg', 'range4.jpg'),
(41, 'Volkswagen', 'Tiaguan', '2500', '2010', 5, 'Siva ', '250.200', 'Da', '7.850', 'Auto je u savrsenom stanju, ima svu dodatnu opremu, bez dodatnih ulaganja', 'admin', 'tiguan2.jpg', 'tiguan4.jpg'),
(42, 'Volkswagen', 'Golf 6', '1600', '2009', 3, 'Siva ', '215.555', 'Da', '5.620', 'Auto je u savrsenom stanju, ima svu dodatnu opremu, bez dodatnih ulaganja', 'admin', 'golf62.jpg', 'golf63.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rent_auto`
--

CREATE TABLE `rent_auto` (
  `id_rent` int(11) NOT NULL,
  `ime_vozila` varchar(15) NOT NULL,
  `model_vozila` varchar(15) NOT NULL,
  `gorivo` varchar(20) NOT NULL,
  `vrsta_menjaca` varchar(15) NOT NULL,
  `klima` varchar(5) NOT NULL,
  `br_sedista` tinyint(4) NOT NULL,
  `br_vrata` tinyint(4) NOT NULL,
  `godiste` varchar(10) NOT NULL,
  `velicina_prtljaga` varchar(10) NOT NULL,
  `cena_u_sezoni` int(11) NOT NULL,
  `cena_van_sezone` int(11) NOT NULL,
  `slika` text NOT NULL,
  `slika1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_auto`
--

INSERT INTO `rent_auto` (`id_rent`, `ime_vozila`, `model_vozila`, `gorivo`, `vrsta_menjaca`, `klima`, `br_sedista`, `br_vrata`, `godiste`, `velicina_prtljaga`, `cena_u_sezoni`, `cena_van_sezone`, `slika`, `slika1`) VALUES
(9, 'Opel', 'Isignia', 'Benzin', 'Manuelni', 'Da', 5, 5, '2011', '320', 17, 14, 'isignia1.jpg', 'isignia4.jpg'),
(10, 'Mercedes', 'C300', 'Dizel', 'Automatik', 'Da', 5, 0, '2016', '420', 18, 15, 'mercedesC.jpg', 'mercedesc4.jpg'),
(11, 'Renault', 'Megan', 'Dizel', 'Manuelni', 'Da', 5, 5, '2012', '325', 13, 11, 'megan2.jpg', 'megan4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `zakazano`
--

CREATE TABLE `zakazano` (
  `id_zakazano` int(11) NOT NULL,
  `ime_prezime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `br_tel` varchar(30) NOT NULL,
  `datum_peuz` varchar(30) NOT NULL,
  `datum_vra` varchar(30) NOT NULL,
  `dani_ukupno` varchar(10) NOT NULL,
  `ukupna_cena` varchar(10) NOT NULL,
  `id_rent_vozila` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zakazano`
--

INSERT INTO `zakazano` (`id_zakazano`, `ime_prezime`, `email`, `br_tel`, `datum_peuz`, `datum_vra`, `dani_ukupno`, `ukupna_cena`, `id_rent_vozila`) VALUES
(7, 'Lazar Jordanovic', 'lazar.jordanovic@hotmail.rs', '0649661741', '2022-01-30', '2022-02-05', '6', '108', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `korisnik_auto`
--
ALTER TABLE `korisnik_auto`
  ADD PRIMARY KEY (`id_kor_auto`);

--
-- Indexes for table `rent_auto`
--
ALTER TABLE `rent_auto`
  ADD PRIMARY KEY (`id_rent`);

--
-- Indexes for table `zakazano`
--
ALTER TABLE `zakazano`
  ADD PRIMARY KEY (`id_zakazano`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id_kon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik_auto`
--
ALTER TABLE `korisnik_auto`
  MODIFY `id_kor_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `rent_auto`
--
ALTER TABLE `rent_auto`
  MODIFY `id_rent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `zakazano`
--
ALTER TABLE `zakazano`
  MODIFY `id_zakazano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
