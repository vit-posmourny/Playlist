-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 13. úno 2024, 02:54
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

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
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`) VALUES
(2, 'bubak@gmail.com', '$2y$10$iIGlR.XK.0qX7cbN8ysIsuaOa5muwBsPcOIqLtz.LrHQqgRAhuG3.', 'daa601373ef97a4631d3cd21fb33ca776634da14430e4dc0c06efbb0d37d688d'),
(4, '@.', '$2y$10$WOcpPJRXjgk9k/PIoLxqH./iEDY.zZN4KT4KqhQC6HW2A9uPXwCqu', NULL),
(5, '@..', '$2y$10$pSh0hSIJ3Mlw84gyqZs5ZOE337v5s1U5qGtQh.QycrRUbLlfLO/D.', '424517513b2a4deafed8c2cae7cd8c73a838b4122e0dd109ddb3548c6a9d723d'),
(6, '@...', '$2y$10$FxrHlm0Mh8OBnzKG/bcapOmfjHOT7.NGMRw17sUdAvvHviDdZZxea', 'ac4bfc0f60419341358c480e0bf912c92edc6e86e454f64f22055807322c37b9'),
(7, 'vit.posmourny@gmail.com', '$2y$10$pm/QbO7oB.xjoCRW8gKTsuyk/HWWOjM6Vq7vVF/M61S4RBTJtobv2', '978da23b07f3e2f77e56011d0d2e82cfdbef0416f302457050d6d9e86ab9bbe9'),
(8, 'tomas@gmail.com', '$2y$10$tqfwbwGfowwBf.Nh3DVJ6uyItFe726sOakPqn38kqjO6Zg7S8evR2', '7511af8e29f04945dceb019a684ef2b96db6ccb8790bf7cf152ac122e72f930b');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
