-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 24 Haz 2018, 07:03:37
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `locustcsv`
--
CREATE DATABASE IF NOT EXISTS `locustcsv` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `locustcsv`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `locustrapor`
--

DROP TABLE IF EXISTS `locustrapor`;
CREATE TABLE IF NOT EXISTS `locustrapor` (
  `ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dosyaAd` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `Tarih` date NOT NULL,
  `Saat` varchar(9) COLLATE utf8_turkish_ci NOT NULL,
  `Setup` varchar(9) COLLATE utf8_turkish_ci NOT NULL,
  `Test` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `ToplamRequest` int(11) NOT NULL,
  `Hata` int(11) NOT NULL,
  `OrtalamaRequests` int(11) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
