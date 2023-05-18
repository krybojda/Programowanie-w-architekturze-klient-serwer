-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 18, 2023 at 06:21 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naszlekarz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `alergologia`
--

CREATE TABLE `alergologia` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `alergologia`
--

INSERT INTO `alergologia` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(14, 'Anna ', 'Nowak', '2023-05-22', 12, '12:00:00.0000'),
(15, 'Piotr', 'Kowalski', '0000-00-00', 21, '13:30:00.0000'),
(16, 'Marta ', 'Wiśniewska', '2023-05-01', 12, '10:00:00.5500');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kardiologia`
--

CREATE TABLE `kardiologia` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kardiologia`
--

INSERT INTO `kardiologia` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(8, 'Janusz', 'Polak', '2023-06-09', 303, '18:00:00.0000'),
(9, 'Katarzyna ', 'Jankowska', '2023-06-13', 3, '16:00:00.0000'),
(10, 'Michał ', 'Kamiński', '2023-06-21', 21, '17:00:47.2940');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `neurologia`
--

CREATE TABLE `neurologia` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `neurologia`
--

INSERT INTO `neurologia` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(7, 'Wojciech', 'Polak', '2023-06-20', 303, '20:00:00.0000'),
(8, 'Agnieszka ', 'Kowalczyk', '2023-06-02', 25, '09:00:00.0000'),
(9, 'Paweł ', 'Mazur', '2023-06-17', 102, '15:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `okulistyka`
--

CREATE TABLE `okulistyka` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `okulistyka`
--

INSERT INTO `okulistyka` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(6, 'Daniel', 'Heneralov', '2023-12-30', 100, '20:00:00.0000'),
(7, 'Jordi ', 'El Niño Polla', '2023-05-27', 27, '12:30:48.6250'),
(8, 'Karolina ', 'Król', '2023-06-24', 23, '14:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pediatria`
--

CREATE TABLE `pediatria` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `pediatria`
--

INSERT INTO `pediatria` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(6, 'Kacper', 'Polakowski', '2023-05-01', 303, '06:00:00.0000'),
(7, 'Krzysztof ', 'Woźniak', '2023-06-29', 51, '10:45:00.5500'),
(8, 'Małgorzata ', 'Kubiak', '2023-05-22', 60, '18:45:26.6640');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id` int(20) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `godzina` time(6) NOT NULL,
  `nr_gabinetu` int(20) NOT NULL,
  `login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `imie`, `nazwisko`, `data`, `godzina`, `nr_gabinetu`, `login`) VALUES
(1, 'daniel', 'daniel', '2023-05-02', '13:30:00.000000', 12, 'daniel'),
(2, 'grzesiek', 'grzesiek', '2023-05-15', '13:30:00.000000', 2, 'grzesiek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `typ` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `email`, `typ`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1),
(3, 'nowy', 'e00cf25ad42683b3df678c61f42c6bda', 'nowy@onet.pl', 0),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.cm', 0),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com', 0),
(6, 'jankowalski', 'ffac53b880657b1df520c6478ffeb1d2', 'jk@jk.jk', 0),
(7, 'marek', '2bc91dfd24099189d0f41d557ed0c3c3', 'marek@gmail.com', 0),
(8, 'grzesiek', '4ed57f498f2c633bc8096984c70ffd8d', 'grzesiek@gmail.com', 0),
(9, 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'daniel@daniel.com', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `alergologia`
--
ALTER TABLE `alergologia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kardiologia`
--
ALTER TABLE `kardiologia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `neurologia`
--
ALTER TABLE `neurologia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `okulistyka`
--
ALTER TABLE `okulistyka`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pediatria`
--
ALTER TABLE `pediatria`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alergologia`
--
ALTER TABLE `alergologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kardiologia`
--
ALTER TABLE `kardiologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `neurologia`
--
ALTER TABLE `neurologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `okulistyka`
--
ALTER TABLE `okulistyka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pediatria`
--
ALTER TABLE `pediatria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
