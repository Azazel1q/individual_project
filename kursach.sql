-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 06 2023 г., 16:16
-- Версия сервера: 10.8.4-MariaDB-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursach`
--

-- --------------------------------------------------------

--
-- Структура таблицы `job_title_bd`
--

CREATE TABLE `job_title_bd` (
  `id_job` int(5) NOT NULL,
  `job_title` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `job_title_bd`
--

INSERT INTO `job_title_bd` (`id_job`, `job_title`) VALUES
(1, 'designer'),
(2, 'front_end'),
(3, 'back_end'),
(4, 'tester');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int(5) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `title`, `body`, `photo`) VALUES
(9, 'Перемены в выплате заработной платы', 'В связи с последними ситуациями в стране, руководством было решено, что заработная плата для некоторых сотрудников урезается, а для остальных повышается. Так же нарушение договора карается, немедленным увольнением!!! ', 'ZPnews.png');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(5) NOT NULL,
  `name_client` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_client` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `date_create` date NOT NULL,
  `id_status_order` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_orders`, `name_client`, `name_company`, `file_client`, `comment`, `date`, `date_create`, `id_status_order`) VALUES
(8, 'Олег Олегов Олегович', 'Олеги', 'загружено.htm', 'Сделать нужно все очень даже хорошо', '2023-06-14', '2023-06-30', 5),
(9, 'азазаза', 'аза', 'groupproject.pptx', 'ууаываывавыавыфыва фауф ф а фцуафцуаф ца ц афыафыуа фыа ыу', '2023-06-13', '2023-06-23', 5),
(11, 'aesfsfdarhserdb', 'sgsehdhrtjkdghkfgkfgh', '', '123123123123', '2004-03-21', '2004-04-20', 5),
(12, 'fdfe', 'sdfsef', '~$ллагалеев Булат 20ВЕБ-1 Курсовой проект (совсем немного осталось).docx', '132', '2023-06-06', '2023-06-24', 5),
(13, '', '', '', '', '0000-00-00', '0000-00-00', 2),
(14, 'фывфы', 'фывыф', 'загружено.htm', 'фывфыв', '2023-06-13', '2023-06-15', 2),
(15, 'DSF', 'SDFSDF', 'free-icon-thanks-4509815.png', 'SDF', '2023-06-17', '2023-06-23', 2),
(16, 'Олег Олегов Олегович', 'Олеги', 'Untitled.mdj', 'все что угодно', '2023-06-21', '2023-06-06', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order_user`
--

CREATE TABLE `order_user` (
  `id_or_use` int(5) NOT NULL,
  `id_order` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `status_order_empl` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_user`
--

INSERT INTO `order_user` (`id_or_use`, `id_order`, `id_user`, `status_order_empl`) VALUES
(41392, 15, 4, 3),
(41393, 15, 2, 3),
(41394, 15, 6, 3),
(41395, 15, 5, 3),
(41396, 16, 4, 3),
(41397, 16, 3, 3),
(41398, 16, 6, 3),
(41399, 16, 5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `role_title`) VALUES
(1, 'admin'),
(2, 'employer');

-- --------------------------------------------------------

--
-- Структура таблицы `status_empl`
--

CREATE TABLE `status_empl` (
  `id_status` int(5) NOT NULL,
  `name_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_empl`
--

INSERT INTO `status_empl` (`id_status`, `name_status`) VALUES
(1, 'Свободен'),
(2, 'Занят');

-- --------------------------------------------------------

--
-- Структура таблицы `status_order`
--

CREATE TABLE `status_order` (
  `id_status` int(5) NOT NULL,
  `name_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_order`
--

INSERT INTO `status_order` (`id_status`, `name_status`) VALUES
(1, 'В ожидании'),
(2, 'Принят'),
(3, 'Выполняется'),
(4, 'Выполнен'),
(5, 'Отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` date DEFAULT NULL,
  `jobe_title` int(5) NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status_empl` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `surname`, `name`, `patronymic`, `login`, `email`, `phone`, `age`, `jobe_title`, `password`, `role`, `status_empl`) VALUES
(2, 'Азамат', 'Сафиуллин', 'Румилевич', 'azaz', 'azam.safiullin20@gmai.com', '79377895247', '2004-06-21', 2, '123', 1, 2),
(3, 'Азамат', 'Сафиуллин', 'Румилевич', 'azaz', 'azam.safiullin20@gmai.com', '79377895247', '2004-06-21', 2, '123', 1, 2),
(4, 'Олег', 'Олегов', 'Олегович', 'oleg', 'oleg@oleg.oleg', '79777777777', '2003-06-29', 1, '123', 1, 2),
(5, 'Игорь', 'Игорев', 'Игоревич', 'igor', 'igor@igor.igor', '79666666666', '2004-03-21', 4, '123', 1, 1),
(6, 'тип', 'типок', 'типочек', 'tip', 'tip@tip.tip', '79488484848', '1999-06-14', 3, '', 1, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `job_title_bd`
--
ALTER TABLE `job_title_bd`
  ADD PRIMARY KEY (`id_job`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_status_order` (`id_status_order`);

--
-- Индексы таблицы `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`id_or_use`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `status_order` (`status_order_empl`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status_empl`
--
ALTER TABLE `status_empl`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `jobe_title` (`jobe_title`),
  ADD KEY `role` (`role`),
  ADD KEY `status_empl` (`status_empl`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `order_user`
--
ALTER TABLE `order_user`
  MODIFY `id_or_use` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41400;

--
-- AUTO_INCREMENT для таблицы `status_empl`
--
ALTER TABLE `status_empl`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_status_order`) REFERENCES `status_order` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `order_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_user_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_user_ibfk_3` FOREIGN KEY (`status_order_empl`) REFERENCES `status_order` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`jobe_title`) REFERENCES `job_title_bd` (`id_job`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`status_empl`) REFERENCES `status_empl` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
