-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 15, 2023 at 12:55 PM
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
(20, 'Mariusz', 'Tynkiewicz', '2023-06-25', 11, '09:00:00.0000'),
(21, 'Konrad', 'Nowacki', '2023-06-13', 27, '09:00:00.0000');

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
(11, 'Daniel', 'Generalow', '2023-06-17', 69, '12:00:00.0000'),
(12, 'Jakub', 'Szostak', '2023-06-28', 12, '09:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarze`
--

CREATE TABLE `lekarze` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `specjalizacja` varchar(30) NOT NULL,
  `telefon` int(6) NOT NULL,
  `e-mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `lekarze`
--

INSERT INTO `lekarze` (`id`, `imie`, `nazwisko`, `specjalizacja`, `telefon`, `e-mail`) VALUES
(1, 'Michał', 'Kamiński', 'alergologia', 666666666, 'mkamin@poczta.pl'),
(2, 'Jakub ', 'Szostak', 'ginekolog', 999999999, 'jakubo@pp.pl'),
(3, 'Jan', 'Kowal', 'pediatria', 123456789, 'kowal@kowal.pl'),
(5, 'Grzegorz', 'Szuper', 'pediatria', 506222111, 'szuper@gmail.com'),
(6, 'Irena', 'Chodnicka', 'okulistyka', 111333222, 'Chodnicka@gmail.com'),
(7, 'Wiesław', 'Paleta', 'neurologia', 111444222, 'Paleta@gmail.com'),
(8, 'Daniel', 'Generalow', 'kardiologia', 696911539, 'Generalow@gmail.com'),
(9, 'Jakub', 'Szostak', 'kardiologia', 224444444, 'Szostak@gmail.com'),
(10, 'Paweł', 'Kostek', 'alergologia', 666333111, 'Kostek@gmail.com'),
(11, 'Mariusz ', 'Tynkiewicz', 'alergologia', 892012567, 'Tynkiewicz@gmail.com'),
(12, 'Konrad', 'Nowacki', 'alergologia', 555635233, 'Nowacki@gmail.com');

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
(9, 'Irena', 'Chodnicka', '2023-06-30', 12, '17:30:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `id` int(11) NOT NULL,
  `id_lekarza` int(20) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `opinia` text NOT NULL,
  `ocena` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `opinie`
--

INSERT INTO `opinie` (`id`, `id_lekarza`, `imie`, `nazwisko`, `data`, `opinia`, `ocena`) VALUES
(1, 1, 'Michał', 'Kamiński', '2023-05-02', 'Świetny lekarz, super wszystko i tak dalej', 5),
(5, 2, 'Jakub', 'Szostak', '2023-05-17', 'Zaspał na wizyte nie polecam', 1),
(123, 3, 'Jan', 'Kowal', '2023-06-15', 'Wszystko super, świetnie leczy', 5),
(124, 1, 'Michał', 'Kamiński', '2023-06-15', 'Nie polecam', 1),
(125, 5, 'Grzegorz', 'Szuper', '2023-06-15', 'Świetny lekarz', 4),
(126, 2, 'Jakub ', 'Szostak', '2023-06-15', 'Bardzo dobry lekarz', 5);

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
(9, 'Grzegorz', 'Szuper', '2023-07-18', 15, '10:30:00.0000');

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
(2, 'grzesiek', 'grzesiek', '2023-05-15', '13:30:00.000000', 2, 'grzesiek'),
(4, 'Janusz', 'Polak', '2023-06-09', '18:00:00.000000', 303, 'grzesiek'),
(5, 'Katarzyna ', 'Jankowska', '2023-06-13', '16:00:00.000000', 3, 'grzesiek'),
(6, 'Anna ', 'Nowak', '2023-05-22', '12:00:00.000000', 12, 'grzesiek'),
(7, 'Piotr', 'Kowalski', '0000-00-00', '13:30:00.000000', 21, 'grzesiek'),
(8, 'Daniel', 'Heneralov', '2023-12-30', '20:00:00.000000', 100, 'grzesiek'),
(9, 'Marta ', 'Wiśniewska', '2023-05-01', '10:00:00.550000', 12, 'grzesiek'),
(10, 'Michał ', 'Kamiński', '2023-06-21', '17:00:47.294000', 21, 'grzesiek'),
(11, 'Kacper', 'Polakowski', '2023-05-01', '06:00:00.000000', 303, 'grzesiek'),
(12, 'Jordi ', 'El Niño Polla', '2023-05-27', '12:30:48.625000', 27, 'grzesiek'),
(13, 'Karolina ', 'Król', '2023-06-24', '14:00:00.000000', 23, 'grzesiek'),
(14, 'Krzysztof ', 'Woźniak', '2023-06-29', '10:45:00.550000', 51, 'grzesiek'),
(15, 'Wojciech', 'Polak', '2023-06-20', '20:00:00.000000', 303, 'grzesiek'),
(16, 'Małgorzata ', 'Kubiak', '2023-05-22', '18:45:26.664000', 60, 'daniel'),
(17, 'Agnieszka ', 'Kowalczyk', '2023-06-02', '09:00:00.000000', 25, 'daniel'),
(18, 'Paweł ', 'Mazur', '2023-06-17', '15:00:00.000000', 102, 'daniel'),
(19, 'Ada', 'Kowalska', '2023-06-13', '10:00:00.550000', 12, 'Paweł'),
(20, 'Paweł', 'Kostek', '2023-06-08', '10:00:00.550000', 256, 'marek1'),
(21, 'Wiesław', 'Paleta', '2023-05-01', '17:00:00.000000', 204, 'marek1');

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
(9, 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'daniel@daniel.com', 0),
(12, 'Paweł', '02544f57b3b7e45869fcbe66e68bedf9', 'MasnyPawel@gmail.com', 0),
(13, 'marek1', '338afd164250c532b78be98591185c2d', 'marek@gmail.com', 0);

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
-- Indeksy dla tabeli `lekarze`
--
ALTER TABLE `lekarze`
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
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kardiologia`
--
ALTER TABLE `kardiologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lekarze`
--
ALTER TABLE `lekarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `neurologia`
--
ALTER TABLE `neurologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `okulistyka`
--
ALTER TABLE `okulistyka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `pediatria`
--
ALTER TABLE `pediatria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
