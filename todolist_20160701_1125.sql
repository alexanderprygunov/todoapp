--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.1.13.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 01.07.2016 11:25:56
-- Версия сервера: 5.6.28-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE todolist;

--
-- Описание для таблицы migrations
--
DROP TABLE IF EXISTS migrations;
CREATE TABLE migrations (
  migration VARCHAR(255) NOT NULL,
  batch INT(11) NOT NULL
)
ENGINE = INNODB
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы password_resets
--
DROP TABLE IF EXISTS password_resets;
CREATE TABLE password_resets (
  email VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX password_resets_email_index (email),
  INDEX password_resets_token_index (token)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы tasks
--
DROP TABLE IF EXISTS tasks;
CREATE TABLE tasks (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  name VARCHAR(255) NOT NULL,
  `desc` TEXT NOT NULL,
  duedate DATE NOT NULL,
  completed TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX tasks_user_id_index (user_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 19
AVG_ROW_LENGTH = 1820
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы users
--
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX users_email_unique (email)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Вывод данных для таблицы migrations
--
INSERT INTO migrations VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_16_183826_create_tasks_table', 1);

-- 
-- Вывод данных для таблицы password_resets
--

-- Таблица todolist.password_resets не содержит данных

-- 
-- Вывод данных для таблицы tasks
--
INSERT INTO tasks VALUES
(8, 1, 'Продумывание структуры приложения', 'Продумать структуру проекта, определиться с технологиями для реализации', '2016-06-03', 1, '2016-07-01 06:13:06', '2016-07-01 06:13:09'),
(9, 1, 'Знакомство с Laravel Framework и шаблонизатором Blade', 'Познакомиться сLaravel Framework и шаблонизатором Blade, узнать основные принципы работы', '2016-06-05', 1, '2016-07-01 06:13:59', '2016-07-01 06:14:03'),
(10, 1, 'Реализация тестового функционала взаимодействия с пользователем ', 'Реализация тестового функционала взаимодействия с пользователем (регистрация, авторизация). Использование стандартных наборов стилей Bootstrap.', '2016-06-10', 1, '2016-07-01 06:17:07', '2016-07-01 06:17:10'),
(11, 1, 'Реализация закрытого раздела менеджера задач', 'Раздел должен быть доступен только авторизованному пользователю', '2016-06-15', 1, '2016-07-01 06:18:07', '2016-07-01 06:18:10'),
(12, 1, 'Реализация функционала менеджера задач', 'Функционал добавления задачи, удаления задачи, просмотра задачи, редактирования задачи. Изменение статуса задачи.', '2016-06-23', 1, '2016-07-01 06:19:41', '2016-07-01 06:19:44'),
(13, 1, 'Стилизация шаблона', '"Натяжка" дизайна на текущий функионал', '2016-06-26', 1, '2016-07-01 06:20:26', '2016-07-01 06:20:30'),
(14, 1, 'Исправление багов', 'Исправление багов и недочетов, выявленных в процессе разработки проекта', '2016-06-28', 1, '2016-07-01 06:21:04', '2016-07-01 07:37:12'),
(15, 1, 'Подготовка к защите', 'Подготовка презентации, подготовка видео', '2016-07-01', 1, '2016-07-01 06:21:39', '2016-07-01 07:37:13'),
(17, 4, 'Новая задача', 'описание новой задачи', '2016-08-04', 0, '2016-07-01 07:36:04', '2016-07-01 07:36:04');

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'test', 'test@test.ru', '$2y$10$fzehwbUmWQbFuOJzmrVMj.FyTWC6Maq5JpY45E6sd0Atg5HX35zUK', 'y26gI8RzSsJQh92GdVq4CY0GWQJz2HaRf0LtI4vnq6ZJG7N4u8r8GgXEacro', '2016-06-16 21:31:39', '2016-07-01 07:37:18'),
(4, 'Новый пользователь', 'new@new.ru', '$2y$10$M1vvl9kPxHYXZDBKxJcD5eJAiA8K.G/SPjZOsQUTaQPDq0UvVygjq', 'zo4xlaFiPV0ZDxNlpAinCpV10ImSNsNyrWtg7GFinpHFKU42iS3wfE1HKxlZ', '2016-07-01 07:35:35', '2016-07-01 07:36:51');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;