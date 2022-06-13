/*創建DataBass*/
DROP DATABASE IF EXISTS `php_gem`;
CREATE DATABASE IF NOT EXISTS `php_gem` 
USE `php_gem`;

/*創建寶石table*/
DROP TABLE IF EXISTS `gem`;
CREATE TABLE IF NOT EXISTS `gem` (
  `gem_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remaining` int(11) DEFAULT NULL,
  KEY `Index 1` (`gem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='產品資料.....';

/*訂單table*/
DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL DEFAULT '0',
  `user_email` varchar(255) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `order_time` timestamp NOT NULL,
  `gem_id` int(11) DEFAULT NULL,
  KEY `Index 1` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*用戶table*/
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
