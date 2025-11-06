-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projetophp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetophp` DEFAULT CHARACTER SET utf8 ;
USE `projetophp` ;

-- -----------------------------------------------------
-- Table `projetophp`.`usuario` (LOGIN DO SISTEMA)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projetophp`.`tipo_veiculo` (Adaptado de 'categoria')
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`tipo_veiculo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projetophp`.`veiculo` (RF1 - Adaptado de 'produto')
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`veiculo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(10) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  `ano` INT NOT NULL,
  `tipo_veiculo_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_veiculo_tipo_veiculo_idx` (`tipo_veiculo_id` ASC),
  CONSTRAINT `fk_veiculo_tipo_veiculo`
    FOREIGN KEY (`tipo_veiculo_id`)
    REFERENCES `projetophp`.`tipo_veiculo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projetophp`.`motorista` (RF2 - Novo)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`motorista` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `cnh` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projetophp`.`rota` (RF3 - Novo)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`rota` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cidade_inicio` VARCHAR(100) NOT NULL,
  `estado_inicio` CHAR(2) NOT NULL,
  `cidade_fim` VARCHAR(100) NOT NULL,
  `estado_fim` CHAR(2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projetophp`.`viagem` (RF4 - Novo)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`viagem` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_viagem` DATETIME NOT NULL,
  `veiculo_id` INT NOT NULL,
  `motorista_id` INT NOT NULL,
  `rota_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_viagem_veiculo_idx` (`veiculo_id` ASC),
  INDEX `fk_viagem_motorista_idx` (`motorista_id` ASC),
  INDEX `fk_viagem_rota_idx` (`rota_id` ASC),
  CONSTRAINT `fk_viagem_veiculo`
    FOREIGN KEY (`veiculo_id`)
    REFERENCES `projetophp`.`veiculo` (`id`),
  CONSTRAINT `fk_viagem_motorista`
    FOREIGN KEY (`motorista_id`)
    REFERENCES `projetophp`.`motorista` (`id`),
  CONSTRAINT `fk_viagem_rota`
    FOREIGN KEY (`rota_id`)
    REFERENCES `projetophp`.`rota` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

