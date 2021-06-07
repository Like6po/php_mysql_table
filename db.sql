-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.23 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных some_test_db
CREATE DATABASE IF NOT EXISTS `some_test_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `some_test_db`;

-- Дамп структуры для таблица some_test_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PRODUCT_ID` int DEFAULT NULL,
  `PRODUCT_NAME` varchar(128) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `PRODUCT_PRICE` int DEFAULT NULL,
  `PRODUCT_ARTICLE` varchar(128) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `PRODUCT_QUANTITY` int DEFAULT NULL,
  `DATE_CREATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `IS_HIDDEN` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Дамп данных таблицы some_test_db.products: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_ARTICLE`, `PRODUCT_QUANTITY`, `DATE_CREATE`, `IS_HIDDEN`) VALUES
	(1, 1, 'Сок "Добрый"', 120, 'DOBRY', 121, '2021-06-07 12:00:00', 0),
	(2, 2, 'Сок "Фруктовый сад"', 140, 'FRUKT_SAD', 321, '2021-06-07 12:12:39', 0),
	(3, 3, 'Сникерс', 50, 'SNIKERS', 3232, '2021-06-07 12:13:16', 0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица some_test_db.table_info
CREATE TABLE IF NOT EXISTS `table_info` (
  `len` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы some_test_db.table_info: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `table_info` DISABLE KEYS */;
INSERT INTO `table_info` (`len`) VALUES
	(3);
/*!40000 ALTER TABLE `table_info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
