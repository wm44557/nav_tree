-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Czas generowania: 25 Cze 2021, 17:38
-- Wersja serwera: 5.7.32
-- Wersja PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `iai`
--
CREATE DATABASE IF NOT EXISTS `iai` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `iai`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `iai_tree`
--

CREATE TABLE `iai_tree` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `text` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `iai_tree`
--

INSERT INTO `iai_tree` (`id`, `parent_id`, `text`) VALUES
(780, NULL, 'root'),
(901, 780, 'dokumenty'),
(905, 901, 'cv'),
(906, 905, 'cv mechanika'),
(907, 906, 'adam'),
(923, 901, 'obrazki'),
(924, 901, 'muzyka'),
(925, 901, 'filmy'),
(926, 925, 'dokumentalne'),
(927, 925, 'akcji'),
(928, 927, 'moje ulubione'),
(929, 928, 'czarno białe'),
(930, 928, 'kolorowe'),
(931, 924, 'moja ulubiona'),
(932, 924, 'mamy'),
(933, 924, 'taty'),
(934, 931, 'jazz'),
(935, 931, 'pop'),
(936, 934, 'ale jazz'),
(937, 923, 'screeny'),
(938, 923, 'zdjecia'),
(939, 938, 'komunia'),
(940, 939, 'pamiątkowe zdjęcie kasy'),
(941, 937, 'tajne'),
(942, 941, 'zut'),
(943, 942, 'uczelnia tajne'),
(944, 943, 'bardzo tajne');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `iai_tree`
--
ALTER TABLE `iai_tree`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `text` (`text`),
  ADD KEY `FK_Parent` (`parent_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `iai_tree`
--
ALTER TABLE `iai_tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=945;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `iai_tree`
--
ALTER TABLE `iai_tree`
  ADD CONSTRAINT `FK_Parent` FOREIGN KEY (`parent_id`) REFERENCES `iai_tree` (`id`) ON DELETE CASCADE;
