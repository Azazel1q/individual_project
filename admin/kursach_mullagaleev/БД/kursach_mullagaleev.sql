-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2023 г., 20:56
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursach_mullagaleev`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_prod` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_manuf` date NOT NULL,
  `feat_save` varchar(150) NOT NULL,
  `kol` varchar(150) NOT NULL,
  `id_sect` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_prod`, `name`, `date_manuf`, `feat_save`, `kol`, `id_sect`) VALUES
(1, 'Куриное филе', '2023-06-15', 'Хранить в холодильном помещении', '16', 1),
(2, 'Лосось', '2023-06-15', 'Хранить в холодильном помещении', '14', 2),
(3, 'Молоко \"Белебеевское\"', '2023-06-14', 'Хранить в холодильном помещение', '16', 3),
(13, 'Торт \"Шоколадная гора\"', '2023-06-25', 'Хранить в холодильном помещении', '14', 12),
(18, 'Бройлер \"Российский\"', '2023-06-27', 'Хранить в холодильном помещении', '12', 1),
(19, 'Куриная грудка', '2023-06-23', 'Хранить в холодильном помещении', '11', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `title`) VALUES
(1, 'Сортировщик'),
(2, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id_sect` int NOT NULL,
  `title_sect` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id_sect`, `title_sect`, `photo`) VALUES
(1, 'Мясо и мясопродукты', 'meat.png'),
(2, 'Рыба и морепродукты', 'fish.png'),
(3, 'Молоко и молочные продукты', 'milk.png'),
(6, 'Фрукты и овощи', 'fruit.png'),
(12, 'Кондитерские изделия', 'confect.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `patronymic` varchar(150) NOT NULL,
  `date_begin` date NOT NULL,
  `id_role` int NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `surname`, `patronymic`, `date_begin`, `id_role`, `login`, `password`) VALUES
(3, 'Василий', 'Петров', 'Анатольевич', '2023-06-08', 1, 'vasya', '123'),
(4, '', '', '', '2023-06-08', 2, 'admin', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_warehouse` (`id_sect`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id_sect`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_prod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id_sect` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_sect`) REFERENCES `sections` (`id_sect`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
