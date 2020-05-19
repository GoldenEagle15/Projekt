-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 10:22 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hi-fi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hifi_zvocniki`
--

CREATE TABLE `hifi_zvocniki` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `opis` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `cene` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_slovenian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Dumping data for table `hifi_zvocniki`
--

INSERT INTO `hifi_zvocniki` (`id`, `ime`, `opis`, `cene`, `slika`) VALUES
(5, 'Titanic', 'Titanic is a 1997 American epic romance and disaster film directed, written, co-produced, and co-edited by James Cameron. Incorporating both historical and fictionalized aspects, the film is based on accounts of the sinking of the RMS Titanic, and stars Leonardo DiCaprio and Kate Winslet as members of different social classes who fall in love aboard the ship during its ill-fated maiden voyage. ', '195', 'uploads/titanic1.jpg'),
(6, 'Joker', 'Joker is a 2019 American psychological thriller film directed and produced by Todd Phillips, who co-wrote the screenplay with Scott Silver. The film, based on DC Comics characters, stars Joaquin Phoenix as the Joker and provides a possible origin story for the character. Set in 1981, it follows Arthur Fleck, a failed stand-up comedian whose descent into insanity and nihilism inspires a violent counter-cultural revolution against the wealthy in a decaying Gotham City. Robert De Niro, Zazie Beetz, Frances Conroy, Brett Cullen, Glenn Fleshler, Bill Camp, Shea Whigham, and Marc Maron appear in supporting roles. Joker was produced by Warner Bros. Pictures, DC Films, and Joint Effort, in association with Bron Creative and Village Roadshow Pictures, and distributed by Warner Bros. ', '122', 'uploads/joker.jpg'),
(7, 'Jigsaw ( 2017 )', 'Jigsaw is a 2017 American horror film directed by Michael and Peter Spierig and written by Josh Stolberg and Peter Goldfinger. It is the eighth installment in the Saw film series. The film stars Matt Passmore, Callum Keith Rennie, Clé Bennett, and Hannah Emily Anderson. The film picks up over a decade after the death of the eponymous Jigsaw killer, during the police investigation of a new succession of murders that fit his modus operandi.', '92', 'uploads/jigsaw.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

CREATE TABLE `ocene` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hifi_zvocniki_id` bigint(20) UNSIGNED NOT NULL,
  `uporabnik_id` bigint(20) UNSIGNED NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ocena` varchar(2) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `prednosti` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `slabosti` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`id`, `hifi_zvocniki_id`, `uporabnik_id`, `datum`, `ocena`, `prednosti`, `slabosti`) VALUES
(10, 5, 3, '2020-05-18 19:29:29', '3', 'meh', 'meh'),
(8, 6, 3, '2020-05-18 18:52:53', '5', 'OOF', 'OOF'),
(6, 5, 3, '2020-05-18 18:26:55', '4', 'GAy', 'GAy'),
(14, 5, 3, '2020-05-18 19:30:49', '3', 'mehh', 'mehh'),
(15, 7, 3, '2020-05-18 20:13:47', '5', 'Very nice', 'Very nice'),
(16, 5, 2, '2020-05-18 20:16:10', '2', 'Kinda gay not gonna lie', 'Kinda gay not gonna lie');

-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `priimek` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `tip` varchar(100) COLLATE utf8mb4_slovenian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Dumping data for table `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `ime`, `priimek`, `pass`, `email`, `tip`) VALUES
(3, 'Emanuel', 'Planko', '86246ae2ae1c98114121e46a7a3f522ad8370930', 'emanuel.planko@gmail.com', '1'),
(2, 'Tilen', 'Krivec', 'c484f3a8cf4627d8c3e816d72ac929614a94ff26', 'pegasus221krivec@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hifi_zvocniki`
--
ALTER TABLE `hifi_zvocniki`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ocene`
--
ALTER TABLE `ocene`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `hifi_zvocniki_id` (`hifi_zvocniki_id`),
  ADD KEY `uporabnik_id` (`uporabnik_id`);

--
-- Indexes for table `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hifi_zvocniki`
--
ALTER TABLE `hifi_zvocniki`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ocene`
--
ALTER TABLE `ocene`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
