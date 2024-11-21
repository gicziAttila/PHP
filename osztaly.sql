-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Nov 21. 09:39
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php_teszt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osztaly`
--

CREATE TABLE `osztaly` (
  `id` int(10) UNSIGNED NOT NULL,
  `nev` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sor` tinyint(3) UNSIGNED NOT NULL,
  `oszlop` tinyint(3) UNSIGNED NOT NULL,
  `felhasznalonev` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jelszo` varchar(256) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `osztaly`
--

INSERT INTO `osztaly` (`id`, `nev`, `sor`, `oszlop`, `felhasznalonev`, `jelszo`, `isAdmin`) VALUES
(1, ' - ', 0, 0, NULL, NULL, NULL),
(2, 'Tanár úr', 0, 1, NULL, NULL, NULL),
(3, 'Gulyás Zsolt Máté', 0, 2, NULL, NULL, NULL),
(4, 'Lénárt Áron', 0, 3, NULL, NULL, NULL),
(5, ' - ', 0, 4, NULL, NULL, NULL),
(6, 'Mészáros Marcell', 1, 0, NULL, NULL, NULL),
(7, 'Básti Domonkos', 1, 1, NULL, NULL, NULL),
(8, 'Keindl Bercel', 1, 2, NULL, NULL, NULL),
(9, 'Kiss Balázs', 1, 3, NULL, NULL, NULL),
(10, ' - ', 1, 4, NULL, NULL, NULL),
(11, 'Melinda', 2, 0, NULL, NULL, NULL),
(12, 'Karakas Olivér Roland', 2, 1, NULL, NULL, NULL),
(13, 'Ábrahám Dávid', 2, 2, 'test', 'a9b216545542ab66005a9e5b12fdb490adeff0b74cd2f938b246e739b51c7079', NULL),
(14, 'Leon', 2, 3, NULL, NULL, NULL),
(15, 'Togyeriska Viktor', 2, 4, NULL, NULL, NULL),
(16, ' - ', 3, 0, NULL, NULL, NULL),
(17, ' - ', 3, 1, NULL, NULL, NULL),
(18, 'Giczi Attila', 3, 2, 'gicziati', 'a9b216545542ab66005a9e5b12fdb490adeff0b74cd2f938b246e739b51c7079', 1),
(19, 'Preil Ákos', 3, 3, NULL, NULL, NULL),
(20, 'Sivinger Miklós', 3, 4, NULL, NULL, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `osztaly`
--
ALTER TABLE `osztaly`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `osztaly`
--
ALTER TABLE `osztaly`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
