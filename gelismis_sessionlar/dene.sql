-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Kas 2024, 15:57:10
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deneme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dene`
--

CREATE TABLE `dene` (
  `id` int(6) NOT NULL,
  `ad` varchar(150) NOT NULL,
  `soyad` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dene`
--

INSERT INTO `dene` (`id`, `ad`, `soyad`) VALUES
(161, 'a', '$2y$10$e8qiUy5HJ6Mfern.NDHQeuL4jv5qcXavnvTrNYHdwP3tprbUKS.b.'),
(162, 'a', 'a'),
(165, 'a', '$2y$10$2xpPKXICNAusHFHjSbr6HeP.4nOcnIp1ak7mnku1w9Xc5Xe5A/aa2'),
(166, 'b', '$2y$10$0WM843w1tptOth0YJF1nXOEWM4g.EyhFXDfNUq4SdYtmFrDFWdGCO');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `dene`
--
ALTER TABLE `dene`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `dene`
--
ALTER TABLE `dene`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
