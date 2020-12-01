-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema webflix
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema webflix
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webflix` DEFAULT CHARACTER SET utf8 ;
USE `webflix` ;

-- -----------------------------------------------------
-- Table `webflix`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webflix`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webflix`.`movie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webflix`.`movie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `released_at` DATE NOT NULL,
  `description` TEXT NOT NULL,
  `duration` INT NOT NULL,
  `cover` VARCHAR(255) NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_movie_category_idx` (`category_id` ASC),
  CONSTRAINT `fk_movie_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `webflix`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webflix`.`actor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webflix`.`actor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `birthday` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webflix`.`movie_has_actor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webflix`.`movie_has_actor` (
  `movie_id` INT NOT NULL,
  `actor_id` INT NOT NULL,
  INDEX `fk_movie_has_actor_actor1_idx` (`actor_id` ASC),
  INDEX `fk_movie_has_actor_movie1_idx` (`movie_id` ASC),
  CONSTRAINT `fk_movie_has_actor_movie1`
    FOREIGN KEY (`movie_id`)
    REFERENCES `webflix`.`movie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movie_has_actor_actor1`
    FOREIGN KEY (`actor_id`)
    REFERENCES `webflix`.`actor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
