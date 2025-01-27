-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 27 2025 г., 19:04
-- Версия сервера: 5.7.24
-- Версия PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gamedesk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `os` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `ram` int(11) NOT NULL,
  `graphics` varchar(255) NOT NULL,
  `disk_space` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `name`, `price`, `image_url`, `description`, `os`, `processor`, `ram`, `graphics`, `disk_space`) VALUES
(1, 'Dark Souls Remastered', '1075.00', '../../img/dark-souls-remastered (1).jpg', 'Шедевр, покоривший игровой мир несколько лет назад, реинкарнировался. Он вернулся на мониторы в новом качестве и в компании с дополнением Artorias of the Abyss. Избранный мертвец уже готов отправиться в легендарный Лордран, где его ждут великие дела.', 'Windows 7 SP1 64bit, Windows 8.1 64bit Windows 10 64bit', 'AMD FX-8150 / AMD Ryzen 3 1300X or Intel Core I5-2500K', 4, 'NVIDIA GTX 770 / AMD Radeon R9 280', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vid_card` varchar(50) NOT NULL,
  `number` varchar(16) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `id_user`, `email`, `vid_card`, `number`, `name`) VALUES
(1, 7, 'admin@gmail.com', 'visa', '99999999999', 'qq'),
(2, 7, 'sen99943@gmail.com', 'visa', '99999999999', 'ImCluzzy'),
(3, 7, 'admin@gmail.com', 'visa', '9999999999999999', 'qq'),
(4, 7, 'admin@gmail.com', 'visa', '91121212121212', 'qq'),
(5, 7, 'admin@gmail.com', 'visa', '99999999999', 'yukinrbtyw'),
(6, 7, 'admin@gmail.com', 'visa', '9999999999999999', 'dfdfg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'dfs', 'admin@gmail.com', '$2y$10$aMIlOuT6xJIlhck7ZwSdI.1ofpyLkRrfvmil7wzrTLqPYMMtnRWGq'),
(2, 'qq', 'admin123@gmail.com', '$2y$10$wYR9x5CWilSPO0BrLBCQ2u.G046Ch9ie.1QIGX5L9l7HX8e.fxxdC'),
(3, 'qq', 'admin1122@gmail.com', '$2y$10$s4EtldvDWg2mGS8MiW4sZOjr9Mcw7zFEOUr3yKdBlWe1M5GEkUoc.'),
(4, 'qq', 'admin1722@gmail.com', '$2y$10$I2zb2ymjkPMNq6UUbCKk9.cEYWGroW6SRSiIuEN75lriWS1vo/FMu'),
(5, 'qq12', 'sen99943@gmail.com', '$2y$10$JYC/dDVwGuBJ5a/h49lCYespK0MCkaVQ2.AfBLa4g1yQeZM1U8rQy'),
(6, 'qq', 'admin121212@gmail.com', '$2y$10$QbpxIfSvJXcyGRrubVSQCOHJ0QvGX8Bsp78q.YquvOam59vp6vihm'),
(8, 'ImCluzzy', 'test228336@gmail.com', '$2y$10$.0Wjr/QU3C/x/5fiI6QfJu4kqd12Qxujt/k.FnXyyyAcf88eCBZd2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
