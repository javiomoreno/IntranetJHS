-- MySQL Script generated by MySQL Workbench
-- 07/13/16 22:53:03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Rol` (
  `RolID` INT NOT NULL,
  `RolNombre` VARCHAR(40) NOT NULL,
  `RolDescripcion` VARCHAR(100) NULL,
  `RolFechaReg` DATE NOT NULL,
  PRIMARY KEY (`RolID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empresa` (
  `EmpresaID` INT NOT NULL,
  `EmpresaNombre` VARCHAR(50) NOT NULL,
  `EmpresaDescripcion` VARCHAR(100) NULL,
  `EmpresaFechaReg` DATE NOT NULL,
  `EmpresaRIF` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`EmpresaID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Cargo` (
  `CargoID` INT NOT NULL,
  `CargoNombre` VARCHAR(45) NOT NULL,
  `CargoDescripcion` VARCHAR(45) NULL,
  `CargoFechaReg` DATE NOT NULL,
  PRIMARY KEY (`CargoID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `UsuarioID` INT NOT NULL,
  `UsuarioNombre` VARCHAR(100) NOT NULL,
  `UsuarioApellido` VARCHAR(100) NOT NULL,
  `UsuarrioCedula` VARCHAR(20) NOT NULL,
  `UsuarioCorreo` VARCHAR(100) NOT NULL,
  `UsuarioClave` VARCHAR(100) NOT NULL,
  `UsuarioFechaNac` DATE NULL,
  `UsuarioFechaIng` DATE NOT NULL,
  `UsuarioBanco` VARCHAR(50) NOT NULL,
  `UsuarioCuentaBanco` VARCHAR(100) NULL,
  `UsuarioFechaReg` DATE NOT NULL,
  `RolID` INT NOT NULL,
  `EmpresaID` INT NOT NULL,
  `CargoID` INT NOT NULL,
  PRIMARY KEY (`UsuarioID`),
  UNIQUE INDEX `UsuarrioCedula_UNIQUE` (`UsuarrioCedula` ASC),
  UNIQUE INDEX `UsuarioCorreo_UNIQUE` (`UsuarioCorreo` ASC),
  INDEX `fk_Usuario_Rol_idx` (`RolID` ASC),
  INDEX `fk_Usuario_Empresa1_idx` (`EmpresaID` ASC),
  INDEX `fk_Usuario_Cargo1_idx` (`CargoID` ASC),
  CONSTRAINT `fk_Usuario_Rol`
    FOREIGN KEY (`RolID`)
    REFERENCES `mydb`.`Rol` (`RolID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Empresa1`
    FOREIGN KEY (`EmpresaID`)
    REFERENCES `mydb`.`Empresa` (`EmpresaID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Cargo1`
    FOREIGN KEY (`CargoID`)
    REFERENCES `mydb`.`Cargo` (`CargoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Recibo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Recibo` (
  `ReciboID` INT NOT NULL,
  `ReciboFechaInicio` DATE NULL,
  `ReciboFechaFin` DATE NULL,
  `ReciboNumero` INT NULL,
  `Recibocol` VARCHAR(45) NULL,
  `UsuarioID` INT NOT NULL,
  PRIMARY KEY (`ReciboID`),
  INDEX `fk_Recibo_Usuario1_idx` (`UsuarioID` ASC),
  CONSTRAINT `fk_Recibo_Usuario1`
    FOREIGN KEY (`UsuarioID`)
    REFERENCES `mydb`.`Usuario` (`UsuarioID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Parametro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Parametro` (
  `ParametroID` INT NOT NULL,
  `ParametroNombre` VARCHAR(50) NULL,
  `ParametroDocumento` VARCHAR(100) NULL,
  `ParametroDescripcion` VARCHAR(200) NULL,
  `ParametroFechaReg` DATE NULL,
  `DepartamentoID` INT NOT NULL,
  PRIMARY KEY (`ParametroID`),
  INDEX `fk_Parametro_Departamento1_idx` (`DepartamentoID` ASC),
  CONSTRAINT `fk_Parametro_Departamento1`
    FOREIGN KEY (`DepartamentoID`)
    REFERENCES `mydb`.`Departamento` (`DepartamentoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Parametro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Parametro` (
  `ParametroID` INT NOT NULL,
  `ParametroNombre` VARCHAR(50) NULL,
  `ParametroDocumento` VARCHAR(100) NULL,
  `ParametroDescripcion` VARCHAR(200) NULL,
  `ParametroFechaReg` DATE NULL,
  `DepartamentoID` INT NOT NULL,
  PRIMARY KEY (`ParametroID`),
  INDEX `fk_Parametro_Departamento1_idx` (`DepartamentoID` ASC),
  CONSTRAINT `fk_Parametro_Departamento1`
    FOREIGN KEY (`DepartamentoID`)
    REFERENCES `mydb`.`Departamento` (`DepartamentoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Archivo` (
  `ArchivoID` INT NOT NULL,
  `ArchivoNombre` VARCHAR(50) NULL,
  `ArchivoDescripcion` VARCHAR(200) NULL,
  `ArchivoRuta` VARCHAR(100) NULL,
  `ArchivoFechaReg` DATE NULL,
  `EmpresaID` INT NOT NULL,
  PRIMARY KEY (`ArchivoID`),
  INDEX `fk_Archivo_Empresa1_idx` (`EmpresaID` ASC),
  CONSTRAINT `fk_Archivo_Empresa1`
    FOREIGN KEY (`EmpresaID`)
    REFERENCES `mydb`.`Empresa` (`EmpresaID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Departamento` (
  `DepartamentoID` INT NOT NULL,
  `DepartamentoNombre` VARCHAR(50) NULL,
  `DepartamentoDescripcion` VARCHAR(200) NULL,
  `DepartamentoFechaReg` DATE NULL,
  `EmpresaID` INT NOT NULL,
  PRIMARY KEY (`DepartamentoID`),
  INDEX `fk_Departamento_Empresa1_idx` (`EmpresaID` ASC),
  CONSTRAINT `fk_Departamento_Empresa1`
    FOREIGN KEY (`EmpresaID`)
    REFERENCES `mydb`.`Empresa` (`EmpresaID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Parametro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Parametro` (
  `ParametroID` INT NOT NULL,
  `ParametroNombre` VARCHAR(50) NULL,
  `ParametroDocumento` VARCHAR(100) NULL,
  `ParametroDescripcion` VARCHAR(200) NULL,
  `ParametroFechaReg` DATE NULL,
  `DepartamentoID` INT NOT NULL,
  PRIMARY KEY (`ParametroID`),
  INDEX `fk_Parametro_Departamento1_idx` (`DepartamentoID` ASC),
  CONSTRAINT `fk_Parametro_Departamento1`
    FOREIGN KEY (`DepartamentoID`)
    REFERENCES `mydb`.`Departamento` (`DepartamentoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
