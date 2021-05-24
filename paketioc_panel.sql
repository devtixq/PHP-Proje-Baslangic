-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 24 May 2021, 20:36:24
-- Sunucu sürümü: 10.2.37-MariaDB-cll-lve
-- PHP Sürümü: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `paketioc_panel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `admin_id` int(11) NOT NULL,
  `admin_adisoyadi` varchar(90) COLLATE utf8_turkish_ci NOT NULL,
  `admin_resim` varchar(90) COLLATE utf8_turkish_ci DEFAULT NULL,
  `admin_email` varchar(90) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(90) COLLATE utf8_turkish_ci NOT NULL,
  `admin_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`admin_id`, `admin_adisoyadi`, `admin_resim`, `admin_email`, `admin_sifre`, `admin_durum`) VALUES
(1, 'Dev Tixq', 'devtixq.jpg', 'admin@devtixq.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(3, 'Dev Tixq 2', 'devtixq.jpg', 'admin2@devtixq.com', 'e10adc3949ba59abbe56e057f20f883e', '0'),
(4, 'Muharrem Eray ARAL', NULL, 'designaral@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(5, 'Ali Ölmez', NULL, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(6, 'Deneme Admin', NULL, 'deneme@deneme.com', 'd41d8cd98f00b204e9800998ecf8427e', '1'),
(7, 'Deneme Admin', NULL, 'deneme@deneme.com', 'd41d8cd98f00b204e9800998ecf8427e', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`admin_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
