-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema user_dashboard
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema user_dashboard
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `user_dashboard` DEFAULT CHARACTER SET utf8 ;
USE `user_dashboard` ;

-- -----------------------------------------------------
-- Table `user_dashboard`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_dashboard`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `user_level` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user_dashboard`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_dashboard`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` TEXT NULL,
  `user_id` INT NOT NULL,
  `message_user_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_messages_users_idx` (`user_id` ASC),
  INDEX `fk_messages_users1_idx` (`message_user_id` ASC),
  CONSTRAINT `fk_messages_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `user_dashboard`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users1`
    FOREIGN KEY (`message_user_id`)
    REFERENCES `user_dashboard`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user_dashboard`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_dashboard`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` TEXT NULL,
  `message_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_posts_messages1_idx` (`message_id` ASC),
  INDEX `fk_posts_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_posts_messages1`
    FOREIGN KEY (`message_id`)
    REFERENCES `user_dashboard`.`messages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `user_dashboard`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
