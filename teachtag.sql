-- MySQL Script generated by MySQL Workbench
-- Mon Apr  1 23:28:19 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema teachtag
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema teachtag
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `teachtag` DEFAULT CHARACTER SET latin1 ;
USE `teachtag` ;

-- -----------------------------------------------------
-- Table `teachtag`.`center`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teachtag`.`center` ;

CREATE TABLE IF NOT EXISTS `teachtag`.`center` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `poblacion` VARCHAR(50) NOT NULL,
  `provincia` VARCHAR(50) NOT NULL,
  `centerCode` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `teachtag`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teachtag`.`tag` ;

CREATE TABLE IF NOT EXISTS `teachtag`.`tag` (
  `id` INT(11) NOT NULL,
  `text_cont` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `teachtag`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teachtag`.`user` ;

CREATE TABLE IF NOT EXISTS `teachtag`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(25) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  `rol` INT(11) NOT NULL,
  `name` VARCHAR(75) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `birthday` DATE NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `authKey` VARCHAR(250) NULL DEFAULT NULL,
  `accessToken` VARCHAR(250) NULL DEFAULT NULL,
  `activate` TINYINT(1) NULL DEFAULT NULL,
  `centerCode` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_user_center_idx` (`centerCode` ASC) VISIBLE,
  CONSTRAINT `fk_user_center`
    FOREIGN KEY (`centerCode`)
    REFERENCES `teachtag`.`center` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 129
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `teachtag`.`tag_has_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teachtag`.`tag_has_user` ;

CREATE TABLE IF NOT EXISTS `teachtag`.`tag_has_user` (
  `tag_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`tag_id`, `user_id`),
  INDEX `fk_tag_has_user_user1_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_tag_has_user_tag1_idx` (`tag_id` ASC) VISIBLE,
  CONSTRAINT `fk_tag_has_user_tag1`
    FOREIGN KEY (`tag_id`)
    REFERENCES `teachtag`.`tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tag_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `teachtag`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
