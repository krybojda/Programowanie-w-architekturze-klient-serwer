-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Maj 2023, 20:31
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `naszlekarz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `alergologia`
--

CREATE TABLE `alergologia` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `alergologia`
--

INSERT INTO `alergologia` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(8, 'JAn', 'KOwalski', '2023-05-24', 201, '10:00:00.0000'),
(9, 'Jan', 'Pałka', '2023-05-31', 103, '08:00:00.0000'),
(10, 'JAn', 'KOwalski', '2023-05-24', 201, '10:00:00.0000'),
(11, 'Jan', 'Pałka', '2023-05-31', 103, '08:00:00.0000'),
(12, '', '', '0000-00-00', 0, '08:00:00.0000'),
(13, '', '', '0000-00-00', 0, '08:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kardiologia`
--

CREATE TABLE `kardiologia` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kardiologia`
--

INSERT INTO `kardiologia` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(8, 'Janusz', 'Polak', '2023-06-09', 303, '23:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `neurologia`
--

CREATE TABLE `neurologia` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `neurologia`
--

INSERT INTO `neurologia` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(7, 'Wojciech', 'Polak', '2023-06-20', 303, '20:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `okulistyka`
--

CREATE TABLE `okulistyka` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `okulistyka`
--

INSERT INTO `okulistyka` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(6, 'Daniel', 'Heneralov', '2023-12-30', 100, '20:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pediatria`
--

CREATE TABLE `pediatria` (
  `id` int(11) NOT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `nr_gabinetu` int(4) NOT NULL,
  `godzina` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pediatria`
--

INSERT INTO `pediatria` (`id`, `Imie`, `Nazwisko`, `data`, `nr_gabinetu`, `godzina`) VALUES
(6, 'Kacper', 'Polakowski', '2023-05-01', 303, '06:00:00.0000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `typ` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `email`, `typ`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1),
(3, 'nowy', 'e00cf25ad42683b3df678c61f42c6bda', 'nowy@onet.pl', 0),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.cm', 0),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com', 0),
(6, 'jankowalski', 'ffac53b880657b1df520c6478ffeb1d2', 'jk@jk.jk', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(255) NOT NULL,
  `id_Rezerwacje` int(255) NOT NULL,
  `id_prod` int(255) NOT NULL,
  `tabela` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `suma` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_Rezerwacje`, `id_prod`, `tabela`, `nazwa`, `cena`, `suma`, `iduser`) VALUES
(2, 3783917, 2, 'strategia', 'Age of Empires IV', 30, 30, 6),
(3, 3783917, 4, 'fps', 'Counter strike Global Offensive', 20, 20, 6),
(4, 3783917, 3, 'strategia', 'Frostpunk', 60, 60, 6),
(5, 3783917, 3, 'visual_novel', 'Mirror 2: Project X', 200, 200, 6),
(6, 3783917, 4, 'wyscigi', 'F1 2022', 250, 250, 6);

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
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `alergologia`
--
ALTER TABLE `alergologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `kardiologia`
--
ALTER TABLE `kardiologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `neurologia`
--
ALTER TABLE `neurologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `okulistyka`
--
ALTER TABLE `okulistyka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `pediatria`
--
ALTER TABLE `pediatria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
