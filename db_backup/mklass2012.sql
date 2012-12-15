-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 15 2012 г., 15:26
-- Версия сервера: 5.5.24-log
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mklass2012`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`) VALUES
(1, 'Главное меню', NULL),
(2, 'Меню подвала', NULL),
(3, 'Цены', 6),
(4, 'Контакты', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`id`, `name`, `page_id`, `menu_id`) VALUES
(1, 'Главная', 1, 1),
(2, 'Контакты', 2, 1),
(3, 'Примеры', 5, 1),
(4, 'Карта сайта', 6, 1),
(6, 'Цены', 7, 1),
(7, 'Оптовые', 1, 3),
(8, 'Розничные', 2, 3),
(9, 'Офис 1', 8, 4),
(10, 'Офис 2', 5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `href` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `href` (`href`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `description`, `content`, `href`) VALUES
(1, 'Главная страница нашего демонстрационного сайта по курсу веб-программирования', 'Главная страница нашего демонстрационного сайта по курсу веб-программирования', 'Содержимое этой самой главной страницы. <strong> Как хорошо быть</strong> специалистом в IT.', 'index'),
(2, 'Страница контактов', 'Описание этой страницы контактов', 'г.Харьков, ул.Ленина, д.3, кв.4', 'contacts'),
(5, 'Примеры работ', NULL, 'Содержимое примеров работ', 'examples'),
(6, 'Карта сайта', 'Здесь Вы можете увидеть всю структуру сайта', 'Содержимое "Карта сайта"', 'sitemap'),
(7, 'Наш прайс', 'Наш прайс', 'Каталог цен (проверяйте каждый день, может повезет:)', 'price'),
(8, 'Офис 1', 'керкерке', 'Контакты в офисе №1', 'office1');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `model`, `create_at`, `quantity`) VALUES
(2, 'Телевизор LG', 'SmartTV', '2012-12-01 14:26:29', 2),
(4, 'Фен Panasonic', '13', '2012-12-01 14:27:36', 1000),
(5, 'LED ТЕЛЕВИЗОР SONY', 'KDL-22EX553', '2012-12-01 16:23:58', 12),
(6, 'LED телевизор Philips', '22PDL4906H', '2012-12-01 16:23:58', 8),
(7, 'Холодильник Zanussi', 'ZRT 724 W', '2012-12-01 16:25:14', 7),
(8, 'Магнитола Supra', 'BB-CD201RD', '2012-12-01 16:25:14', 23),
(9, 'MP3 плеер iRiver', 'E40 8Gb Black', '2012-12-01 16:27:04', 35),
(10, 'MP3 плеер Canyon', 'CNR-MPV4CI 8Gb', '2012-12-01 16:27:04', 21);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(3) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `role`) VALUES
(1, 'admin', 'adm', 0),
(2, 'publisher', 'pub', 10),
(3, 'guest', NULL, 100);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu_item` (`id`);

--
-- Ограничения внешнего ключа таблицы `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_item_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
