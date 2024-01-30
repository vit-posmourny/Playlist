/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `music` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `track_name` varchar(255) DEFAULT NULL,
  `interpret` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `track_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `music` (`id`, `track_name`, `interpret`, `album`, `genre`, `img_path`, `track_path`) VALUES
(1, 'Forget You', 'CeeLo Green', 'single', 'Soul, R&B, Hip hop', '\\Playlist\\files\\ceelo green.jpeg', '\\Playlist\\files\\Ceelo Green Forget You.mp3');
INSERT INTO `music` (`id`, `track_name`, `interpret`, `album`, `genre`, `img_path`, `track_path`) VALUES
(2, 'Weed of Wisdom', 'Dystopia', 'Human = Garbage', 'Crust', '\\Playlist\\files\\dystopia.jpg', '\\Playlist\\files\\11. Weed Of Wisdom.mp3');
INSERT INTO `music` (`id`, `track_name`, `interpret`, `album`, `genre`, `img_path`, `track_path`) VALUES
(3, '03 Bonnie & Clyde', 'Jay‐Z feat. Beyoncé Knowles', 'Vinyl, CD', 'R&B', '\\Playlist\\files\\JAY-Z - 03\' Bonnie & Clyde.jpg', '\\Playlist\\files\\JAY-Z - 03\' Bonnie & Clyde.mp3');
INSERT INTO `music` (`id`, `track_name`, `interpret`, `album`, `genre`, `img_path`, `track_path`) VALUES
(4, 'Black Metal', 'VENOM', 'Black Metal', 'Speed Metal', '\\Playlist\\files\\venom.jpeg', '\\Playlist\\files\\Venom-Black_Metal.mp3'),
(5, 'Inner self', 'Sepultura', 'Beneath the Remains', 'Death Metal', '\\Playlist\\files\\sepultura.jpg', '\\Playlist\\files\\03-sepultura-inner_self-qtxmp3.mp3'),
(6, 'Virtual Insanity', 'Jamiroquai', 'Travelling Without Moving', 'Acid jazz, jazz-funk', '\\Playlist\\files\\Virtualinsanity.jpg', '\\Playlist\\files\\094. Jamiroquai - Virtual Insanity (Remastered).mp3'),
(7, 'Cosmic girl', 'Jamiroquai', 'Synkronized', 'Acid jazz, jazz-funk', '\\Playlist\\files\\Jamiroquai - Cosmic girl.jpg', '\\Playlist\\filesJAMIROQUAI - COSMIC GIRL (RADIO EDIT) (1996).mp3'),
(8, 'Candy', 'Robbie Williams', 'single', 'Pop', '\\Playlist\\files\\robbie williams - candy.jpg', '\\Playlist\\files\\RobbiecWilliams - Candy.mp3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;