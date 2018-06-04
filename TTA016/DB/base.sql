-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tt-robo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tt-robo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tt-robo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tt-robo` ;

-- -----------------------------------------------------
-- Table `tt-robo`.`tipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`tipoUsuario` (
  `idtipoUsuario` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idtipoUsuario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`usuario` (
  `idusuario` VARCHAR(15) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `genero` TINYINT(1) NOT NULL COMMENT '',
  `nacimiento` DATE NULL COMMENT '',
  `clave` VARCHAR(16) NOT NULL COMMENT '',
  `idtipoUsuario` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idusuario`)  COMMENT '',
  INDEX `fk_usuario_tipoUsuario_idx` (`idtipoUsuario` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_tipoUsuario`
    FOREIGN KEY (`idtipoUsuario`)
    REFERENCES `tt-robo`.`tipoUsuario` (`idtipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`statusRobo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`statusRobo` (
  `idstatusRobo` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idstatusRobo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`marcaAutomovil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`marcaAutomovil` (
  `idmarcaAutomovil` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idmarcaAutomovil`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`submarcaAutomovil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`submarcaAutomovil` (
  `idsubmarcaAutomovil` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `idmarcaAutomovil` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idsubmarcaAutomovil`)  COMMENT '',
  INDEX `fk_submarcaAutomovil_marcaAutomovil1_idx` (`idmarcaAutomovil` ASC)  COMMENT '',
  CONSTRAINT `fk_submarcaAutomovil_marcaAutomovil1`
    FOREIGN KEY (`idmarcaAutomovil`)
    REFERENCES `tt-robo`.`marcaAutomovil` (`idmarcaAutomovil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`automovil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`automovil` (
  `idautomovil` VARCHAR(15) NOT NULL COMMENT '',
  `placa` VARCHAR(8) NULL COMMENT '',
  `modelo` VARCHAR(4) NULL COMMENT '',
  `color` VARCHAR(20) NULL COMMENT '',
  `idsubmarcaAutomovil` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idautomovil`)  COMMENT '',
  INDEX `fk_automovil_submarcaAutomovil1_idx` (`idsubmarcaAutomovil` ASC)  COMMENT '',
  CONSTRAINT `fk_automovil_submarcaAutomovil1`
    FOREIGN KEY (`idsubmarcaAutomovil`)
    REFERENCES `tt-robo`.`submarcaAutomovil` (`idsubmarcaAutomovil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`fuenteInformacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`fuenteInformacion` (
  `idfuenteInformacion` VARCHAR(15) NOT NULL COMMENT '',
  `facebookId` VARCHAR(60) NOT NULL COMMENT '',
  `nombre` TEXT NOT NULL COMMENT '',
  `hashtag` VARCHAR(60) NOT NULL COMMENT '',
  PRIMARY KEY (`idfuenteInformacion`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`publicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`publicacion` (
  `idpublicacion` VARCHAR(80) NOT NULL COMMENT '',
  `publicacion` TEXT NOT NULL COMMENT '',
  `fecha` DATE NOT NULL COMMENT '',
  `hora` TIME NOT NULL COMMENT '',
  `procesado` TINYINT(1) NOT NULL COMMENT '',
  `idfuenteInformacion` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idpublicacion`)  COMMENT '',
  INDEX `fk_publicacion_fuenteInformacion1_idx` (`idfuenteInformacion` ASC)  COMMENT '',
  CONSTRAINT `fk_publicacion_fuenteInformacion1`
    FOREIGN KEY (`idfuenteInformacion`)
    REFERENCES `tt-robo`.`fuenteInformacion` (`idfuenteInformacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`estado` (
  `idestado` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idestado`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`municipio` (
  `idmunicipio` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `idestado` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idmunicipio`)  COMMENT '',
  INDEX `fk_municipio_estado1_idx` (`idestado` ASC)  COMMENT '',
  CONSTRAINT `fk_municipio_estado1`
    FOREIGN KEY (`idestado`)
    REFERENCES `tt-robo`.`estado` (`idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`ubicacion` (
  `idubicacion` VARCHAR(15) NOT NULL COMMENT '',
  `direccion` TEXT NULL COMMENT '',
  `latitud` DOUBLE NULL COMMENT '',
  `longitud` DOUBLE NULL COMMENT '',
  `idmunicipio` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idubicacion`)  COMMENT '',
  INDEX `fk_ubicacion_municipio1_idx` (`idmunicipio` ASC)  COMMENT '',
  CONSTRAINT `fk_ubicacion_municipio1`
    FOREIGN KEY (`idmunicipio`)
    REFERENCES `tt-robo`.`municipio` (`idmunicipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`reporteRobo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`reporteRobo` (
  `idreporteRobo` VARCHAR(15) NOT NULL COMMENT '',
  `fechaRobo` DATE NULL COMMENT '',
  `fechaCreacion` DATE NOT NULL COMMENT '',
  `detalle` TEXT NULL COMMENT '',
  `hora` TIME NULL COMMENT '',
  `idstatusRobo` VARCHAR(15) NOT NULL COMMENT '',
  `idubicacion` VARCHAR(15) NOT NULL COMMENT '',
  `idpublicacion` VARCHAR(80) NOT NULL COMMENT '',
  `idautomovil` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idreporteRobo`)  COMMENT '',
  INDEX `fk_reporteRobo_statusRobo1_idx` (`idstatusRobo` ASC)  COMMENT '',
  INDEX `fk_reporteRobo_automovil1_idx` (`idautomovil` ASC)  COMMENT '',
  INDEX `fk_reporteRobo_publicacion1_idx` (`idpublicacion` ASC)  COMMENT '',
  INDEX `fk_reporteRobo_ubicacion1_idx` (`idubicacion` ASC)  COMMENT '',
  CONSTRAINT `fk_reporteRobo_statusRobo1`
    FOREIGN KEY (`idstatusRobo`)
    REFERENCES `tt-robo`.`statusRobo` (`idstatusRobo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporteRobo_automovil1`
    FOREIGN KEY (`idautomovil`)
    REFERENCES `tt-robo`.`automovil` (`idautomovil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporteRobo_publicacion1`
    FOREIGN KEY (`idpublicacion`)
    REFERENCES `tt-robo`.`publicacion` (`idpublicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporteRobo_ubicacion1`
    FOREIGN KEY (`idubicacion`)
    REFERENCES `tt-robo`.`ubicacion` (`idubicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`tiempo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`tiempo` (
  `idtiempo` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `dias` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idtiempo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`extraccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`extraccion` (
  `idextraccion` VARCHAR(15) NOT NULL COMMENT '',
  `hora` TIME NOT NULL COMMENT '',
  `diasRestantes` INT NOT NULL COMMENT '',
  `idfuenteInformacion` VARCHAR(15) NOT NULL COMMENT '',
  `idtiempo` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idextraccion`)  COMMENT '',
  INDEX `fk_extraccion_fuenteInformacion1_idx` (`idfuenteInformacion` ASC)  COMMENT '',
  INDEX `fk_extraccion_tiempo1_idx` (`idtiempo` ASC)  COMMENT '',
  CONSTRAINT `fk_extraccion_fuenteInformacion1`
    FOREIGN KEY (`idfuenteInformacion`)
    REFERENCES `tt-robo`.`fuenteInformacion` (`idfuenteInformacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_extraccion_tiempo1`
    FOREIGN KEY (`idtiempo`)
    REFERENCES `tt-robo`.`tiempo` (`idtiempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`clase` (
  `idclase` VARCHAR(15) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idclase`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`caracterisrisca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`caracterisrisca` (
  `idcaracteristicas` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `idclase` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idcaracteristicas`)  COMMENT '',
  INDEX `fk_caracterisrisca_clase1_idx` (`idclase` ASC)  COMMENT '',
  CONSTRAINT `fk_caracterisrisca_clase1`
    FOREIGN KEY (`idclase`)
    REFERENCES `tt-robo`.`clase` (`idclase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tt-robo`.`reporteRobo_clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tt-robo`.`reporteRobo_clase` (
  `idreporteRobo` VARCHAR(15) NOT NULL COMMENT '',
  `idclase` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idreporteRobo`, `idclase`)  COMMENT '',
  INDEX `fk_reporteRobo_has_clase_clase1_idx` (`idclase` ASC)  COMMENT '',
  INDEX `fk_reporteRobo_has_clase_reporteRobo1_idx` (`idreporteRobo` ASC)  COMMENT '',
  CONSTRAINT `fk_reporteRobo_has_clase_reporteRobo1`
    FOREIGN KEY (`idreporteRobo`)
    REFERENCES `tt-robo`.`reporteRobo` (`idreporteRobo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporteRobo_has_clase_clase1`
    FOREIGN KEY (`idclase`)
    REFERENCES `tt-robo`.`clase` (`idclase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
