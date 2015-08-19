-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 19 Ağu 2015, 18:38:58
-- Sunucu sürümü: 5.6.25
-- PHP Sürümü: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Veritabanı: `restaurant`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL,
  `table_id` int(11) unsigned NOT NULL,
  `total_amount` float(6,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(11) unsigned NOT NULL,
  `order_id` int(11) unsigned NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` float(4,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(4,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`) VALUES
(1, 1, 'Kuru', 5.50),
(2, 1, 'Pilav', 3.00),
(3, 2, 'Su', 0.75),
(4, 2, 'Kola', 2.50),
(5, 3, 'Künefe', 12.50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'Yiyecekler'),
(2, 'İçecekler'),
(3, 'Tatlılar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `tables`
--

INSERT INTO `tables` (`id`, `name`, `status`) VALUES
(1, '1', 0),
(2, '2', 0),
(3, '3', 0),
(4, '4', 0),
(5, '5', 0),
(6, '6', 0),
(7, '7', 0),
(8, '8', 0),
(9, '9', 0),
(10, '10', 0),
(11, '11', 0),
(12, '12', 0),
(13, '13', 0),
(14, '14', 0),
(15, '15', 0),
(16, '16', 0),
(17, '17', 0),
(18, '18', 0),
(19, '19', 0),
(20, '20', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;