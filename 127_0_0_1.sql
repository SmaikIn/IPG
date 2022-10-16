-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2022 г., 12:06
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ipg`
--
CREATE DATABASE IF NOT EXISTS `ipg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `ipg`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL COMMENT 'id',
  `cat_name` varchar(255) NOT NULL COMMENT 'специализация'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Терапевт'),
(2, 'Уролог'),
(3, 'Окулист'),
(4, 'Лор'),
(5, 'Гинеколог'),
(6, 'Кардиолог'),
(7, 'Хирург'),
(8, 'Стоматолог');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'имя',
  `cat_id` int DEFAULT NULL COMMENT 'специализация'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `cat_id`) VALUES
(1, 'Игнатов Даниил Макарович', 1),
(2, 'Воронин Борис Иванович', 2),
(3, 'Малинин Фёдор Тимофеевич', 3),
(4, 'Сизова Милана Глебовна', 3),
(5, 'Артемова Мелания Фёдоровна', 5),
(6, 'Николаева Алиса Борисовна', 4),
(7, 'Черепанова Вероника Александровна', 1),
(8, 'Егорова Виктория Артёмовна', 7),
(9, 'Дмитриева Арина Леонидовна', 8),
(10, 'Козлова Виктория Дмитриевна', 2),
(11, 'Исаева Елизавета Александровна', 6),
(12, 'Кузнецова Арина Максимовна', 3),
(13, 'Токарева Арина Тимуровна', 7),
(14, 'Жуков Фёдор Павлович', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'Имя Пациента',
  `doc_id` int NOT NULL COMMENT 'id врача',
  `date` date NOT NULL COMMENT 'дата записи',
  `time_id` int NOT NULL COMMENT 'id промежутка времени'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `doc_id`, `date`, `time_id`) VALUES
(1, 'Example', 2, '2022-10-20', 4),
(2, 'Сергеев Николай Алексеевич', 7, '2022-10-20', 5),
(3, 'Гребенчук Алина Владимировна', 5, '2022-10-21', 8),
(4, 'Сергеев Николай Алексеевич', 6, '2022-10-18', 6),
(5, 'Сергеев Николай Алексеевич', 7, '2022-10-20', 6),
(6, 'Николай', 4, '2022-10-22', 5),
(7, 'Сергеев Николай Алексеевич', 2, '2022-10-20', 7),
(8, 'Сергеев Николай Алексеевич', 12, '2022-10-20', 6),
(9, 'Сергеев Николай Алексеевич', 7, '2022-10-28', 9),
(10, 'Сергеев Николай Алексеевич', 7, '2022-10-29', 6),
(11, 'Сергеев Николай Алексеевич', 14, '2022-10-21', 11),
(12, 'Сергеев Николай Алексеевич', 6, '2022-10-20', 5),
(13, 'Сергеев Николай Алексеевич', 5, '2022-10-21', 13),
(14, 'Сергеев Николай Алексеевич', 11, '2022-10-20', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `time`
--

CREATE TABLE `time` (
  `id` int NOT NULL COMMENT 'id',
  `time_range` varchar(255) NOT NULL COMMENT 'диапазон'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `time`
--

INSERT INTO `time` (`id`, `time_range`) VALUES
(1, '09:00 - 09:30'),
(2, '09:30 - 10:00'),
(3, '10:00 - 10:30'),
(4, '10:30 - 11:00'),
(5, '11:00 - 11:30'),
(6, '11:30 - 12:00'),
(7, '12:00 - 12:30'),
(8, '12:30 - 13:00'),
(9, '13:00 - 13:30'),
(10, '13:30 - 14:00'),
(11, '15:00 - 15:30'),
(12, '15:30 - 16:00'),
(13, '16:00 - 16:30'),
(14, '16:30 - 17:00'),
(15, '17:00 - 17:30'),
(16, '17:30 - 18:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_ibfk_1` (`time_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Индексы таблицы `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `time`
--
ALTER TABLE `time`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`time_id`) REFERENCES `time` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
