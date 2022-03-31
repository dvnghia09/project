CREATE DATABASE `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `shop`;

CREATE TABLE IF NOT EXISTS `category` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `status` BIT DEFAULT 1,
  PRIMARY KEY `pk_id`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `price` float NOT NULL,
  `sale_price` float DEFAULT 0,
  `image` VARCHAR(255),
  `category_id` INT(11) UNSIGNED NOT NULL,
  `status` BIT DEFAULT 1,
  PRIMARY KEY `pk_id`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `img_product` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(255),
  `product_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY `pk_id`(`id`)
) ENGINE = InnoDB;

ALTER TABLE `product` ADD CONSTRAINT `fk_the_table_categ_pro` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
ALTER TABLE `img_product` ADD CONSTRAINT `fk_the_pro_categ_img` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)