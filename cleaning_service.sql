-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MariaDB-11.2
-- Время создания: Сен 20 2025 г., 15:35
-- Версия сервера: 11.2.2-MariaDB
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cleaning_service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date_time_service` datetime NOT NULL,
  `type_service_id` int(11) NOT NULL,
  `type_pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `craeted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `type_pay`
--

CREATE TABLE `type_pay` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `type_service`
--

CREATE TABLE `type_service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `auth_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `full_name`, `phone`, `email`, `role`, `auth_key`) VALUES
(5, 'user', '$2y$13$ASlGBJEiL/4s9s0YqCbphOGX.bEou.rRqCrhPwXDwUOSQgQMP0sma', 'user', '123', 'user@user.ru', 0, 'R1mCoszrfdyQWfEgCLC4gxTvPbqkCF1E'),
(6, 'adminka', '$2y$13$9ubuCAlVWc.8gRfZ9ZMjBOTNSk5YqHW3fk.GR89PxHG1qOVjFSoT6', 'admin', '123', 'admin@admin.ru', 1, 'EFStSFpcKuP9o0LhEbA5kygupptRYE07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `type_pay_id` (`type_pay_id`),
  ADD KEY `type_service_id` (`type_service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_pay`
--
ALTER TABLE `type_pay`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_service`
--
ALTER TABLE `type_service`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_pay`
--
ALTER TABLE `type_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_service`
--
ALTER TABLE `type_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`type_pay_id`) REFERENCES `type_pay` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`type_service_id`) REFERENCES `type_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
