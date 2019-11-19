-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2019. Nov 11. 21:08
-- Kiszolgáló verziója: 5.6.45-log
-- PHP verzió: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `penzkorh_projekter`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `developers`
--

CREATE TABLE `developers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `ZAROLT` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `developers`
--

INSERT INTO `developers` (`id`, `username`, `password`, `email`, `name`, `price`) VALUES
(1, 'gebirkas', 'uk1JQx3ryB9pAgJvlAwyzhRMZv46WjTeB/QeEeHZx3q8CxVHvIHtAJtMctBfEPKncoY0WYkOhQbGTMfpuOMZvK9/JXXXpuKjkUfr3RW7t6/EJIzRJVTiduy8Q9SB3vZzakKAWcDxYsYTdNDxaEdIJuHeu7KsXyMRVos6u7jl/tw=', 'birksgerg@yahoo.com', 'Birkas Gergo', 999999);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `projektek`
--

CREATE TABLE `projektek` (
  `id` int(3) NOT NULL,
  `p_nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `p_leiras` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `p_megrendelo` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `p_hatarido` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `projektek`
--

INSERT INTO `projektek` (`id`, `p_nev`, `p_leiras`, `p_megrendelo`, `p_hatarido`) VALUES
(1, 'Elsõ projekt', 'Nincs', 'Valami cég', '2019-11-22'),
(6, 'Újabb projekt', 'Inkább nem', 'Nem ismert', '2020-01-11'),
(7, 'Harmadik projekt', 'Újabb ismeretlen projekt', 'Nem tudjuk', '2019-11-26');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `task`
--

CREATE TABLE `task` (
  `id` int(10) UNSIGNED NOT NULL,
  `proj_id` int(10) UNSIGNED NOT NULL,
  `dev_id` int(10) UNSIGNED NOT NULL,
  `leiras` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `allapot` int(3) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='feladatok';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `time`
--

CREATE TABLE `time` (
  `id` int(10) UNSIGNED NOT NULL,
  `dev_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='idők';

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A tábla indexei `projektek`
--
ALTER TABLE `projektek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `projektek`
--
ALTER TABLE `projektek`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `time`
--
ALTER TABLE `time`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
