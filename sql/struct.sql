CREATE DATABASE IF NOT EXISTS aprotect;

-- -----------------------------------------------------
-- Table CLIENT
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS CLIENT (
  `idCLIENT` INT NOT NULL,
  `Nom` VARCHAR(45) NULL,
  `Prenom` VARCHAR(45) NULL,
  `Mail` VARCHAR(45) NULL,
  `Mot_de_passe` VARCHAR(45) NULL,
  `Date_inscription` DATE NULL,
  PRIMARY KEY (`idCLIENT`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table LICENCE
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS LICENCE (
  `codeLICENCE` INT NOT NULL,
  `Date_achat` DATE NULL,
  `Date_expiration` DATE NULL,
  PRIMARY KEY (`codeLICENCE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ACHAT
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ACHAT (
  `idACHAT` INT NOT NULL,
  `Date_achat` DATE NULL,
  PRIMARY KEY (`idACHAT`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ACTIVATION
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ACTIVATION (
  `idACTIVATION` INT NOT NULL,
  `Statut` TINYINT NULL,
  `Bios_number` VARCHAR(45) NULL,
  PRIMARY KEY (`idACTIVATION`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table PAYPAL
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS PAYPAL (
  `idPAYPAL` INT NOT NULL,
  PRIMARY KEY (`idPAYPAL`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ALLOPASS
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ALLOPASS (
  `idALLOPASS` INT NOT NULL,
  PRIMARY KEY (`idALLOPASS`))
ENGINE = InnoDB;