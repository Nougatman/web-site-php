-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 26 2018 г., 11:20
-- Версия сервера: 8.0.13
-- Версия PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id_cities` int(11) NOT NULL,
  `name_city` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id_cities`, `name_city`) VALUES
(1, 'Псков'),
(2, 'Киров'),
(3, 'Нефтекамск'),
(4, 'Санкт-Петербург'),
(5, 'Самара'),
(6, 'Уфа'),
(7, 'Ижевск'),
(8, 'Казань'),
(9, 'Ишимбай'),
(10, 'Стерлитамак'),
(11, 'Нижнекамск'),
(12, 'Москва'),
(13, 'Ульяновск'),
(14, 'Альметьевск'),
(15, 'Тольятти'),
(16, 'Нижний Новгород'),
(17, 'Оренбург'),
(18, 'Екатеринбург'),
(19, 'Ростов'),
(20, 'Сызрань'),
(21, 'Саратов'),
(22, 'Ростов-на-Дону'),
(23, 'Мурманск'),
(24, 'Братск'),
(25, 'Тверь'),
(26, 'Тамбов'),
(27, 'Барнаул'),
(28, 'Владивосток'),
(29, 'Красноярск');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id_customers` int(11) NOT NULL,
  `FIO_customer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id_customers`, `FIO_customer`, `phone`) VALUES
(1, 'Петров Аркадий Николаевич', 89177800000),
(2, 'Арсланов Вахтанг Нурмугамедович', 83655900000);

-- --------------------------------------------------------

--
-- Структура таблицы `shipments`
--

CREATE TABLE `shipments` (
  `id_shipments` int(11) NOT NULL,
  `shipment_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `weight` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `shipments`
--

INSERT INTO `shipments` (`id_shipments`, `shipment_info`, `weight`) VALUES
(1, 'Рояль', 0.65),
(2, 'Медикаменты', 0.23);

-- --------------------------------------------------------

--
-- Структура таблицы `traffics`
--

CREATE TABLE `traffics` (
  `id_traffics` int(11) NOT NULL,
  `customers` int(11) NOT NULL,
  `shipment` int(11) NOT NULL,
  `truck` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `traffics`
--

INSERT INTO `traffics` (`id_traffics`, `customers`, `shipment`, `truck`, `city`, `delivery_date`) VALUES
(2, 1, 2, 1, 3, '2028-12-20'),
(3, 2, 1, 1, 4, '2021-01-20'),
(4, 1, 2, 1, 5, '2028-02-20');

-- --------------------------------------------------------

--
-- Структура таблицы `trucks`
--

CREATE TABLE `trucks` (
  `id_trucks` int(11) NOT NULL,
  `truck_model` text COLLATE utf8_unicode_ci NOT NULL,
  `statenumber` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `carrying` float UNSIGNED NOT NULL,
  `FIO_driver` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` float UNSIGNED NOT NULL,
  `lenght` float UNSIGNED NOT NULL,
  `height` float UNSIGNED NOT NULL,
  `width` float UNSIGNED NOT NULL,
  `loader` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `trucks`
--

INSERT INTO `trucks` (`id_trucks`, `truck_model`, `statenumber`, `carrying`, `FIO_driver`, `phone`, `lenght`, `height`, `width`, `loader`, `price`) VALUES
(1, 'Volwsvagen Caddy', '712ЕКР102', 0.55, 'Петров Николай Андреевич', 89632500000, 2.5, 2, 2, 'есть', 550),
(3, 'Газель Бизнес Цельнометаллический', '891РРР78', 2.5, 'Николаев Антон Салаватович', 89647900000, 3.5, 1.8, 2.05, 'есть', 600),
(4, 'Ford Transit', '893РКО98', 2.5, 'Лагутенко Дмитрий Тагирович', 89632900000, 2.9, 2.05, 2, 'нет', 600);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_cities`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`);

--
-- Индексы таблицы `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id_shipments`);

--
-- Индексы таблицы `traffics`
--
ALTER TABLE `traffics`
  ADD PRIMARY KEY (`id_traffics`),
  ADD UNIQUE KEY `customers_2` (`customers`,`shipment`,`truck`,`city`),
  ADD KEY `truck` (`truck`),
  ADD KEY `traffics_ibfk_1` (`city`),
  ADD KEY `traffics_ibfk_3` (`shipment`);

--
-- Индексы таблицы `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id_trucks`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id_cities` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id_shipments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `traffics`
--
ALTER TABLE `traffics`
  MODIFY `id_traffics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id_trucks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `traffics`
--
ALTER TABLE `traffics`
  ADD CONSTRAINT `traffics_ibfk_1` FOREIGN KEY (`city`) REFERENCES `cities` (`id_cities`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traffics_ibfk_2` FOREIGN KEY (`truck`) REFERENCES `trucks` (`id_trucks`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traffics_ibfk_3` FOREIGN KEY (`shipment`) REFERENCES `shipments` (`id_shipments`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traffics_ibfk_4` FOREIGN KEY (`customers`) REFERENCES `customers` (`id_customers`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
