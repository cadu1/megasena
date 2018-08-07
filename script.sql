-- MySQL Workbench Synchronization
-- Generated: 2018-08-06 23:53
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Oliveira

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `megasena` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `megasena`.`jogo` (
  `id_jogo` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` FLOAT(19,2) NOT NULL,
  PRIMARY KEY (`id_jogo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Jogos realizados';

CREATE TABLE IF NOT EXISTS `megasena`.`numero` (
  `id_numero` INT(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` INT(11) NOT NULL,
  `numero` INT(11) NOT NULL,
  PRIMARY KEY (`id_numero`),
  INDEX `fk_numero_jogo_idx` (`id_jogo` ASC),
  CONSTRAINT `fk_numero_jogo`
    FOREIGN KEY (`id_jogo`)
    REFERENCES `megasena`.`jogo` (`id_jogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Os número selecionados em cada jogo';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
