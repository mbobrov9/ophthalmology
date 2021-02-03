-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 28 2020 г., 01:01
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `dp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `ID_doctor` int(10) NOT NULL AUTO_INCREMENT,
  `FIO` varchar(20) NOT NULL,
  `ID_Spec` int(10) NOT NULL,
  `Qval` varchar(20) NOT NULL,
  `Work_experience` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_doctor`),
  KEY `ID_Spec` (`ID_Spec`),
  KEY `ID_Spec_2` (`ID_Spec`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`ID_doctor`, `FIO`, `ID_Spec`, `Qval`, `Work_experience`, `password`, `mail`) VALUES
(1, 'Шторов Г.Л.', 1, 'Старший врач', '>3 лет', '1234', 'doc@mail.ru'),
(2, 'Явлова П. В.', 2, 'Интерн', '>5 лет', '1234', 'doc1@mail.ru'),
(3, 'Говорунов Д.П.', 1, 'Интерн', '>3 лет', '1234', 'doc4@mail.ru'),
(4, 'Кадуweов Р.П.', 1, 'Врач', '>3 лет', '1234', 'doc5@mail.ru'),
(6, 'Кадуров Р.П.', 1, 'Врач', '>3 лет', '1234', 'doc6@mail.ru'),
(8, 'Казов Р.П.', 1, 'Врач', '>3 лет', '1234', 'doc7@mail.ru'),
(9, 'Гаврова К.Г.', 2, 'Интерн', '>1 года', '1234', 'doc8@mail.ru'),
(12, 'Акакий', 1, 'Интерн', '>3 лет', '1234', 'doc9@mail.ru'),
(13, 'Акакий', 1, 'Интерн', '>3 лет', '1234', 'doc10@mail.ru'),
(22, 'Шафров', 2, 'Врач высшей категори', '>3 лет', '1234', 'doc2@mail.ru'),
(23, 'Шафaров', 1, 'Врач', '>5 лет', '1234', 'doc3@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `komm`
--

CREATE TABLE IF NOT EXISTS `komm` (
  `id_kom` int(10) NOT NULL AUTO_INCREMENT,
  `id_doc` int(10) NOT NULL,
  `id_pat` int(10) NOT NULL,
  `komm` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kom`),
  KEY `id_doc` (`id_doc`,`id_pat`,`komm`),
  KEY `id_pat` (`id_pat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Дамп данных таблицы `komm`
--

INSERT INTO `komm` (`id_kom`, `id_doc`, `id_pat`, `komm`) VALUES
(47, 9, 15, 'Так себе'),
(46, 9, 15, 'Хороший врач'),
(45, 12, 15, 'Так себе'),
(41, 12, 15, 'Хороший врач'),
(42, 12, 15, 'Хороший врач'),
(43, 12, 15, 'Хороший врач'),
(44, 12, 15, 'Хороший врач'),
(48, 13, 22, 'Зашибись'),
(49, 13, 28, 'Хороший врач'),
(50, 13, 29, 'Очень помог'),
(51, 13, 30, 'Самый лучший');

-- --------------------------------------------------------

--
-- Структура таблицы `med_card`
--

CREATE TABLE IF NOT EXISTS `med_card` (
  `kod_med` int(10) NOT NULL AUTO_INCREMENT,
  `kod_doc` int(10) NOT NULL,
  `kod_pat` int(10) NOT NULL,
  `OMS` int(10) NOT NULL,
  `SNILS` int(10) NOT NULL,
  `Date_create` date NOT NULL,
  PRIMARY KEY (`kod_med`),
  KEY `kod_doc` (`kod_doc`,`kod_pat`,`OMS`,`SNILS`,`Date_create`),
  KEY `kod_pat` (`kod_pat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `kod_oper` int(10) NOT NULL AUTO_INCREMENT,
  `price` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ID_spec` int(10) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`kod_oper`),
  KEY `ID_spec` (`ID_spec`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `operation`
--

INSERT INTO `operation` (`kod_oper`, `price`, `name`, `ID_spec`, `Description`) VALUES
(1, '20к', 'Лазерная коррекция', 2, 'хирургическая коррекция с применением лазерных технологий следующих аномалий рефракции');

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `kod_pat` int(10) NOT NULL AUTO_INCREMENT,
  `fio` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`kod_pat`),
  KEY `fio` (`fio`,`phone`,`mail`,`adress`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`kod_pat`, `fio`, `phone`, `mail`, `adress`, `password`) VALUES
(1, 'Виктор', '22435', 'dop@mail.ru', 'Московская 9', 'ABC'),
(14, 'Лёха', '3563', 'lepoha@mail.ru', 'Москва', 'lecha'),
(15, 'Боб Н. Е.', '123425', 'bob@mail.ru', 'СПБ', '1234'),
(17, 'Боб Н. Е.', '123425', 'bobb@mail.ru', 'СПБ', '1234'),
(18, 'кавв', '123425', 'dobb@mail.ru', 'СПБt', '1234'),
(19, 'Днила', '123425', 'dobbr23t@mail.ru', 'СПБ', '1234'),
(21, 'Дима', '123425', 'dob1234@mail.ru', 'Стачек 20', '1234'),
(22, 'Бобров', '123425', 'dob123b@mail.ru', 'Бенидорм', '1234'),
(23, 'Боб Н. Е.', '123425', 'bob232@mail.ru', 'СПБ', '1234'),
(24, 'Борвы', '123415', 'nboc@mail.ru', 'Tumen', '1234'),
(25, 'Фарчик', '123415', 'dobbqwer23t@mail.ru', 'Tumenn', '54321'),
(26, 'egf', '123425', 'qwer@mail.ru', 'СПБt', '123456'),
(27, 'Арворов Г. А.', '89216515645', 'Arv@mail.ru', 'СПБ', '12345'),
(28, 'Поровенков Д. Г.', '89214205654', 'Porr@mail.ru', 'СПБ', '12345'),
(29, 'Евгенов Г. А.', '89214205445', 'vbnz4321@mail.ru', 'СПБ', '123445'),
(30, 'Евгенов Г. А.', '89214209876', 'vbnz@mail.ru', 'СПБ', '1234');

-- --------------------------------------------------------

--
-- Структура таблицы `spec`
--

CREATE TABLE IF NOT EXISTS `spec` (
  `ID_Spec` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Spec`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `spec`
--

INSERT INTO `spec` (`ID_Spec`, `Name`) VALUES
(1, 'Микрохирургия глаза'),
(2, 'Офтальмология');

-- --------------------------------------------------------

--
-- Структура таблицы `talon`
--

CREATE TABLE IF NOT EXISTS `talon` (
  `kod_tal` int(10) NOT NULL AUTO_INCREMENT,
  `kod_doc` int(10) NOT NULL,
  `kod_pat` int(10) DEFAULT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`kod_tal`),
  KEY `kod_doc` (`kod_doc`,`kod_pat`,`time`),
  KEY `kod_pat` (`kod_pat`),
  KEY `kod_ras` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `talon`
--

INSERT INTO `talon` (`kod_tal`, `kod_doc`, `kod_pat`, `time`, `date`) VALUES
(1, 1, NULL, '13:20:00', '2020-04-01'),
(2, 1, NULL, '13:20:00', '2020-04-01'),
(3, 2, NULL, '13:40:00', '2020-04-09'),
(5, 2, NULL, '13:40:00', '2020-04-09'),
(6, 3, NULL, '13:20:00', '2020-04-01'),
(7, 4, NULL, '13:40:00', '2020-04-09'),
(8, 6, 15, '13:20:00', '2020-04-01'),
(9, 8, 15, '13:40:00', '2020-04-09'),
(10, 9, 15, '13:20:00', '2020-04-01'),
(11, 12, NULL, '13:40:00', '2020-04-09'),
(12, 13, 15, '13:20:00', '2020-04-01'),
(13, 22, NULL, '13:40:00', '2020-04-09'),
(14, 23, 15, '13:20:00', '2020-04-01'),
(15, 23, NULL, '13:40:00', '2020-04-09'),
(16, 1, 30, '13:20:00', '2020-04-01'),
(17, 3, NULL, '13:20:00', '2020-04-02'),
(18, 3, NULL, '13:40:00', '2020-04-01'),
(19, 6, NULL, '13:40:00', '2020-04-01'),
(20, 6, 29, '13:40:00', '2020-04-02'),
(21, 4, 27, '12:00:00', '2020-04-09'),
(22, 4, NULL, '13:20:00', '2020-04-09'),
(23, 8, NULL, '13:00:00', '2020-04-09'),
(24, 8, NULL, '13:00:00', '2020-04-08'),
(25, 9, NULL, '13:30:00', '2020-04-01'),
(26, 9, NULL, '13:30:00', '2020-04-11');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`ID_Spec`) REFERENCES `spec` (`ID_Spec`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `komm`
--
ALTER TABLE `komm`
  ADD CONSTRAINT `komm_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `doctor` (`ID_doctor`),
  ADD CONSTRAINT `komm_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `patient` (`kod_pat`);

--
-- Ограничения внешнего ключа таблицы `med_card`
--
ALTER TABLE `med_card`
  ADD CONSTRAINT `med_card_ibfk_1` FOREIGN KEY (`kod_doc`) REFERENCES `doctor` (`ID_doctor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_card_ibfk_2` FOREIGN KEY (`kod_pat`) REFERENCES `patient` (`kod_pat`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`ID_spec`) REFERENCES `spec` (`ID_Spec`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `talon`
--
ALTER TABLE `talon`
  ADD CONSTRAINT `talon_ibfk_1` FOREIGN KEY (`kod_doc`) REFERENCES `doctor` (`ID_doctor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `talon_ibfk_2` FOREIGN KEY (`kod_pat`) REFERENCES `patient` (`kod_pat`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
