-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema uusi_veispuuk_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema uusi_veispuuk_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `uusi_veispuuk_db` DEFAULT CHARACTER SET utf8 ;
USE `uusi_veispuuk_db` ;

-- -----------------------------------------------------
-- Table `uusi_veispuuk_db`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uusi_veispuuk_db`.`user` ;

CREATE TABLE IF NOT EXISTS `uusi_veispuuk_db`.`user` (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `userRole` INT NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `pictureURL` VARCHAR(300) NOT NULL,
  `firstName` VARCHAR(50) NOT NULL,
  `lastName` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `field` VARCHAR(45) NOT NULL,
  `campus` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uusi_veispuuk_db`.`posts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uusi_veispuuk_db`.`posts` ;

CREATE TABLE IF NOT EXISTS `uusi_veispuuk_db`.`posts` (
  `postID` INT NOT NULL AUTO_INCREMENT,
  `userID` INT NOT NULL,
  `postType` INT NOT NULL,
  `pictureURL` VARCHAR(60) NULL,
  `tag` VARCHAR(45) NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `title` VARCHAR(800) NOT NULL,
  `content` VARCHAR(3000) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  INDEX `fk_userID_idx` (`userID` ASC),
  CONSTRAINT `fk_post_userID`
    FOREIGN KEY (`userID`)
    REFERENCES `uusi_veispuuk_db`.`user` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uusi_veispuuk_db`.`comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uusi_veispuuk_db`.`comments` ;

CREATE TABLE IF NOT EXISTS `uusi_veispuuk_db`.`comments` (
  `commentID` INT NOT NULL AUTO_INCREMENT,
  `postID` INT NOT NULL,
  `userID` INT NOT NULL,
  `content` VARCHAR(800) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentID`),
  INDEX `fk_postID_idx` (`postID` ASC),
  INDEX `fk_userID_idx` (`userID` ASC),
  CONSTRAINT `fk_comments_postID`
    FOREIGN KEY (`postID`)
    REFERENCES `uusi_veispuuk_db`.`posts` (`postID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comments_userID`
    FOREIGN KEY (`userID`)
    REFERENCES `uusi_veispuuk_db`.`user` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
