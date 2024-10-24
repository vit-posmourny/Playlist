-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 20. říj 2024, 21:00
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `playlist`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `music`
--

CREATE TABLE `music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `track_name` varchar(255) DEFAULT NULL,
  `interpret` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `genres` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `track_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `music`
--

INSERT INTO `music` (`id`, `track_name`, `interpret`, `album`, `genres`, `img_path`, `track_path`) VALUES
(1, 'Forget You', 'CeeLo Green', 'single', ':1:2:3:', '\\Playlist\\files\\ceelo green.jpeg', '\\Playlist\\files\\Ceelo Green Forget You.mp3'),
(2, 'Weed of Wisdom', 'Dystopia', 'Human = Garbage', ':4:', '\\Playlist\\files\\dystopia.jpg', '\\Playlist\\files\\11. Weed Of Wisdom.mp3'),
(3, '03 Bonnie & Clyde', 'Jay‐Z feat. Beyoncé Knowles', 'Vinyl, CD', ':2:', '\\Playlist\\files\\JAY-Z - 03\' Bonnie & Clyde.jpg', '\\Playlist\\files\\JAY-Z - 03\' Bonnie & Clyde.mp3'),
(4, 'Black Metal', 'VENOM', 'Black Metal', ':5:', '\\Playlist\\files\\venom.jpeg', '\\Playlist\\files\\Venom-Black_Metal.mp3'),
(5, 'Inner self', 'Sepultura', 'Beneath the Remains', ':6:', '\\Playlist\\files\\sepultura.jpg', '\\Playlist\\files\\03-sepultura-inner_self-qtxmp3.mp3'),
(6, 'Virtual Insanity', 'Jamiroquai', 'Travelling Without Moving', ':7:8:', '\\Playlist\\files\\Virtualinsanity.jpg', '\\Playlist\\files\\094. Jamiroquai - Virtual Insanity (Remastered).mp3'),
(7, 'Cosmic girl', 'Jamiroquai', 'Synkronized', ':7:8:', '\\Playlist\\files\\Jamiroquai - Cosmic girl.jpg', '\\Playlist\\files\\JAMIROQUAI - COSMIC GIRL (RADIO EDIT) (1996).mp3'),
(8, 'Candy', 'Robbie Williams', 'single', ':9:', '\\Playlist\\files\\robbie williams - candy.jpg', '\\Playlist\\files\\RobbiecWilliams - Candy.mp3');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `music`
--
ALTER TABLE `music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
