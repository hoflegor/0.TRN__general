-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               10.1.36-MariaDB - mariadb.org binary distribution
-- Serwer OS:                    Win32
-- HeidiSQL Wersja:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych xml_parser
CREATE DATABASE IF NOT EXISTS `xml_parser` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `xml_parser`;

-- Zrzut struktury tabela xml_parser.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `prod_price` int(11) DEFAULT NULL,
  `prod_tax_id` int(11) DEFAULT NULL,
  `taxpercent` int(11) DEFAULT NULL,
  `prod_oldprice` int(11) DEFAULT NULL,
  `prod_buy_price_net` int(11) DEFAULT NULL,
  `prod_amount` int(11) DEFAULT NULL,
  `prod_hidden` smallint(1) DEFAULT NULL,
  `prod_symbol` varchar(255) DEFAULT NULL,
  `prod_weight` int(11) DEFAULT NULL,
  `prd_name` varchar(255) DEFAULT NULL,
  `prod_pkwiu` varchar(255) DEFAULT NULL,
  `prod_ean` bigint(20) DEFAULT NULL,
  `prod_isbn` int(11) DEFAULT NULL,
  `prod_barcode` int(11) DEFAULT NULL,
  `prod_ship_days` varchar(255) DEFAULT NULL,
  `prod_desc` text,
  `prod_shortdesc` varchar(255) DEFAULT NULL,
  `prod_info1_pl` varchar(255) DEFAULT NULL,
  `prod_info2_pl` varchar(255) DEFAULT NULL,
  `prod_info3_pl` varchar(255) DEFAULT NULL,
  `prod_info4_pl` varchar(255) DEFAULT NULL,
  `prod_info5_pl` varchar(255) DEFAULT NULL,
  `prod_note` varchar(255) DEFAULT NULL,
  `prod_seotitle_pl` varchar(255) DEFAULT NULL,
  `prod_seodesc_pl` varchar(255) DEFAULT NULL,
  `prod_keywords_pl` varchar(255) DEFAULT NULL,
  `prod_sales_gain` varchar(255) DEFAULT NULL,
  `prod_link` varchar(255) DEFAULT NULL,
  `prod_price_base` varchar(255) DEFAULT NULL,
  `prod_price_net_base` varchar(255) DEFAULT NULL,
  `prod_price_net` varchar(255) DEFAULT NULL,
  `cat_path` varchar(255) DEFAULT NULL,
  `prod_img` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prod_symbol` (`prod_symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=1136 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
