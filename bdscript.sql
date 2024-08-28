SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema yourself
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `yourself` DEFAULT CHARACTER SET utf8 ;
USE `yourself` ;

-- -----------------------------------------------------
-- Table `yourself`.`plans`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`plans` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `yourself`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `img_useres` VARCHAR(255) NULL,
  `plans_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_plans_idx` (`plans_id` ASC),
  CONSTRAINT `fk_users_plans`
    FOREIGN KEY (`plans_id`)
    REFERENCES `yourself`.`plans` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `yourself`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `yourself`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `price` DECIMAL(10,2) NULL,
  `amount` INT NULL,
  `url_products` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `categories_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`categories_id` ASC),
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `yourself`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `yourself`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `yourself`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` DECIMAL(10,2) NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`, `users_id`),
  INDEX `fk_order_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_order_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `yourself`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `yourself`.`coments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`coments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `review` TEXT NULL,
  `users_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_coments_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_coments_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `yourself`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `yourself`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yourself`.`payment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_id` INT NULL,
  `products_id` INT NULL,
  PRIMARY KEY (`id`, `order_id`, `products_id`),
  INDEX `fk_order_has_products_products1_idx` (`products_id` ASC),
  INDEX `fk_order_has_products_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_order_has_products_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `yourself`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_has_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `yourself`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
