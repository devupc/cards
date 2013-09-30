SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `eCards` ;
CREATE SCHEMA IF NOT EXISTS `eCards` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci ;
USE `eCards` ;

-- -----------------------------------------------------
-- Table `eCards`.`crd_ubigeo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_ubigeo` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_ubigeo` (
  `id` VARCHAR(6) NOT NULL ,
  `parend_id` VARCHAR(6) NULL ,
  `name` VARCHAR(255) NULL ,
  `visible` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_permission` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_permission` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(45) NULL ,
  `created_at` DATETIME NOT NULL DEFAULT current_timestamp ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_user` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ubigeo_id` VARCHAR(6) NOT NULL ,
  `permission_id` INT NOT NULL ,
  `first_name` VARCHAR(90) NOT NULL ,
  `last_name` VARCHAR(90) NOT NULL ,
  `email` VARCHAR(180) NOT NULL ,
  `correoAlternativo` VARCHAR(180) NULL ,
  `oauth_uid` VARCHAR(200) NULL ,
  `oauth_provider` VARCHAR(200) NULL ,
  `algorithm` VARCHAR(128) NOT NULL ,
  `salt` VARCHAR(128) NOT NULL ,
  `password` VARCHAR(128) NOT NULL ,
  `gender` CHAR(3) NULL ,
  `birthday` DATETIME NULL ,
  `status` VARCHAR(3) NULL DEFAULT 'pen' ,
  `blocked_at` DATETIME NULL ,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `correo_UNIQUE` (`email` ASC) ,
  INDEX `fk_card_user_card_ubigeo1` (`ubigeo_id` ASC) ,
  INDEX `fk_card_user_card_permission1` (`permission_id` ASC) ,
  CONSTRAINT `fk_card_user_card_ubigeo1`
    FOREIGN KEY (`ubigeo_id` )
    REFERENCES `eCards`.`crd_ubigeo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_card_user_card_permission1`
    FOREIGN KEY (`permission_id` )
    REFERENCES `eCards`.`crd_permission` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_card`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_card` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_card` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(90) NOT NULL ,
  `description` VARCHAR(254) NOT NULL ,
  `postal_type` INT NULL ,
  `keywords` VARCHAR(150) NULL ,
  `name_file` VARCHAR(30) NULL ,
  `card path` VARCHAR(255) NULL ,
  `miniature_card_path` VARCHAR(255) NULL ,
  `gender` TINYINT(1) NULL ,
  `status` CHAR(3) NULL DEFAULT 'act' ,
  `available_guest` TINYINT(1) NULL DEFAULT 0 ,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` DATETIME NULL ,
  `crd_user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_crd_card_crd_user1` (`crd_user_id` ASC) ,
  CONSTRAINT `fk_crd_card_crd_user1`
    FOREIGN KEY (`crd_user_id` )
    REFERENCES `eCards`.`crd_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_card_shipping`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_card_shipping` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_card_shipping` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `card_id` INT NOT NULL ,
  `idUsuario` INT NOT NULL ,
  `ip_address` VARCHAR(20) NULL ,
  `destinatarioTrato` VARCHAR(30) NULL ,
  `recipient_name` VARCHAR(90) NOT NULL ,
  `recipient_email` VARCHAR(90) NOT NULL ,
  `remitter_name` VARCHAR(90) NOT NULL ,
  `remitter_email` VARCHAR(90) NOT NULL ,
  `message` TEXT NULL ,
  `status` CHAR(3) NULL DEFAULT 0 ,
  `shipping_at` DATETIME NULL ,
  `received_at` DATETIME NULL ,
  `expired_at` DATETIME NULL ,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_crd_card_shipping_crd_card1` (`card_id` ASC) ,
  CONSTRAINT `fk_crd_card_shipping_crd_card1`
    FOREIGN KEY (`card_id` )
    REFERENCES `eCards`.`crd_card` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_rate`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_rate` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_rate` (
  `idCalificacion` INT NOT NULL AUTO_INCREMENT ,
  `card_id` INT NOT NULL ,
  `cuentaEnvio` INT NULL DEFAULT 0 ,
  `cuentaMeGusta` INT NULL DEFAULT 0 ,
  `cuentaRecomendado` INT NULL DEFAULT 0 ,
  `hombre1` INT NULL DEFAULT 0 ,
  `hombre2` INT NULL DEFAULT 0 ,
  `hombre3` INT NULL DEFAULT 0 ,
  `hombre4` INT NULL DEFAULT 0 ,
  `hombre5` INT NULL DEFAULT 0 ,
  `mujer1` INT NULL DEFAULT 0 ,
  `mujer2` INT NULL DEFAULT 0 ,
  `mujer3` INT NULL DEFAULT 0 ,
  `mujer4` INT NULL DEFAULT 0 ,
  `mujer5` INT NULL DEFAULT 0 ,
  `fechaUltimaCalificacion` DATETIME NULL ,
  `estado` TINYINT(1) NULL ,
  PRIMARY KEY (`idCalificacion`) ,
  INDEX `fk_crd_rate_crd_card1` (`card_id` ASC) ,
  CONSTRAINT `fk_crd_rate_crd_card1`
    FOREIGN KEY (`card_id` )
    REFERENCES `eCards`.`crd_card` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_contacto` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_contacto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `first_name` VARCHAR(60) NOT NULL ,
  `last_name` VARCHAR(60) NULL ,
  `email` VARCHAR(90) NOT NULL ,
  `gender` CHAR(3) NULL ,
  `birthday` DATETIME NULL ,
  `source_type` INT NULL ,
  `relation_type` INT NULL ,
  `date_anniversary` DATETIME NULL ,
  `cellphone` VARCHAR(15) NULL ,
  `phone` VARCHAR(15) NULL ,
  `status` CHAR(3) NULL DEFAULT 'act' ,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_card_contacto_card_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_card_contacto_card_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `eCards`.`crd_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_group_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_group_category` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_group_category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(150) NOT NULL ,
  `slug` VARCHAR(150) NULL ,
  `description` VARCHAR(255) NULL ,
  `status` CHAR(3) NULL DEFAULT 'act' ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_category` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `group_category_id` INT NOT NULL ,
  `name` VARCHAR(150) NOT NULL ,
  `slug` VARCHAR(150) NULL ,
  `description` VARCHAR(255) NULL ,
  `order_group` TINYINT NULL DEFAULT 0 ,
  `status` CHAR(3) NULL DEFAULT 'act' ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_categoria_categoriaGrupo1_idx` (`group_category_id` ASC) ,
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) ,
  CONSTRAINT `fk_categoria_categoriaGrupo1`
    FOREIGN KEY (`group_category_id` )
    REFERENCES `eCards`.`crd_group_category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_card_category_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_card_category_user` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_card_category_user` (
  `idTarjetaCategoria` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `card_id` INT NOT NULL ,
  `category_id` INT NOT NULL ,
  `status` CHAR(3) NULL DEFAULT 'act' ,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`idTarjetaCategoria`) ,
  INDEX `fk_crd_card_category_user_crd_user1` (`user_id` ASC) ,
  INDEX `fk_crd_card_category_user_crd_card1` (`card_id` ASC) ,
  INDEX `fk_crd_card_category_user_crd_category1` (`category_id` ASC) ,
  CONSTRAINT `fk_crd_card_category_user_crd_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `eCards`.`crd_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_crd_card_category_user_crd_card1`
    FOREIGN KEY (`card_id` )
    REFERENCES `eCards`.`crd_card` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_crd_card_category_user_crd_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `eCards`.`crd_category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCards`.`crd_param_system`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCards`.`crd_param_system` ;

CREATE  TABLE IF NOT EXISTS `eCards`.`crd_param_system` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(60) NOT NULL ,
  `description` VARCHAR(150) NULL ,
  `value_num1` INT NULL ,
  `value_num2` INT NULL ,
  `value_num3` INT NULL ,
  `value_alfa1` VARCHAR(60) NULL ,
  `value_alfa2` VARCHAR(60) NULL ,
  `value_alfa3` VARCHAR(60) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `eCards`;

DELIMITER $$

USE `eCards`$$
DROP TRIGGER IF EXISTS `eCards`.`tarjeta_AINS` $$
USE `eCards`$$




CREATE TRIGGER `tarjeta_AINS` AFTER INSERT ON tarjeta FOR EACH ROW BEGIN
	-- SET @idTarjeta = LAST_INSERT_ID(); 
    SET @idTarjeta = (SELECT MAX(idTarjeta) FROM tarjeta); 
    INSERT INTO calificacion (idTarjeta) VALUES (@idTarjeta);
  END
$$


DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_ubigeo`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('1', 'Afganistán', 'Afghanistan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('2', 'Akrotiri', 'Akrotiri', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('3', 'Albania', 'Albania', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('4', 'Alemania', 'Germany', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('5', 'Andorra', 'Andorra', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('6', 'Angola', 'Angola', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('7', 'Anguila', 'eel', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('8', 'Antártida', 'Antarctica', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('9', 'Antigua y Barbuda', 'Antigua and Barbuda', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('10', 'Antillas Neerlandesas', 'Netherlands Antilles', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('11', 'Arabia Saudí', 'Saudi Arabia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('12', 'Arctic Ocean', 'Arctic Ocean', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('13', 'Argelia', 'Algeria', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('14', 'Argentina', 'Argentina', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('15', 'Armenia', 'Armenia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('16', 'Aruba', 'Aruba', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('17', 'Ashmore and Cartier Islands', 'Ashmore and Cartier Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('18', 'Atlantic Ocean', 'Atlantic Ocean', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('19', 'Australia', 'Australia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('20', 'Austria', 'Austria', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('21', 'Azerbaiyán', 'Azerbaijan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('22', 'Bahamas', 'Bahamas', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('23', 'Bahráin', 'Bahrain', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('24', 'Bangladesh', 'Bangladesh', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('25', 'Barbados', 'Barbados', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('26', 'Bélgica', 'Belgium', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('27', 'Belice', 'Belize', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('28', 'Benín', 'Benin', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('29', 'Bermudas', 'Bermuda', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('30', 'Bielorrusia', 'Belarus', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('31', 'Birmania; Myanmar', 'Burma , Myanmar', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('32', 'Bolivia', 'Bolivia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('33', 'Bosnia y Hercegovina', 'Bosnia and Herzegovina', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('34', 'Botsuana', 'Botswana', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('35', 'Brasil', 'Brazil', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('36', 'Brunéi', 'Brunei', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('37', 'Bulgaria', 'Bulgaria', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('38', 'Burkina Faso', 'Burkina Faso', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('39', 'Burundi', 'Burundi', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('40', 'Bután', 'Bhutan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('41', 'Cabo Verde', 'Cape Verde', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('42', 'Camboya', 'Cambodia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('43', 'Camerún', 'Cameroon', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('44', 'Canadá', 'Canada', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('45', 'Chad', 'Chad', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('46', 'Chile', 'Chile', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('47', 'China', 'China', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('48', 'Chipre', 'Cyprus', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('49', 'Clipperton Island', 'Clipperton Island', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('50', 'Colombia', 'Colombia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('51', 'Comoras', 'Comoros', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('52', 'Congo', 'Congo', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('53', 'Coral Sea Islands', 'Coral Sea Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('54', 'Corea del Norte', 'North Korea', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('55', 'Corea del Sur', 'South Korea', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('56', 'Costa de Marfil', 'Ivory Coast', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('57', 'Costa Rica', 'Costa Rica', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('58', 'Croacia', 'Croatia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('59', 'Cuba', 'Cuba', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('60', 'Dhekelia', 'Dhekelia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('61', 'Dinamarca', 'Denmark', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('62', 'Dominica', 'Dominica', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('63', 'Ecuador', 'Ecuador', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('64', 'Egipto', 'Egypt', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('65', 'El Salvador', 'El Salvador', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('66', 'El Vaticano', 'The Vatican', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('67', 'Emiratos Árabes Unidos', 'United Arab Emirates', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('68', 'Eritrea', 'Eritrea', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('69', 'Eslovaquia', 'Slovakia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('70', 'Eslovenia', 'Slovenia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('71', 'España', 'Spain', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('72', 'Estados Unidos', 'U.S.', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('73', 'Estonia', 'Estonia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('74', 'Etiopía', 'Ethiopia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('75', 'Filipinas', 'Philippines', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('76', 'Finlandia', 'Finland', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('77', 'Fiyi', 'Fiji', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('78', 'Francia', 'France', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('79', 'Gabón', 'Gabon', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('80', 'Gambia', 'Gambia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('81', 'Gaza Strip', 'Gaza Strip', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('82', 'Georgia', 'Georgia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('83', 'Ghana', 'Ghana', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('84', 'Gibraltar', 'Gibraltar', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('85', 'Granada', 'Granada', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('86', 'Grecia', 'Greece', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('87', 'Groenlandia', 'Greenland', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('88', 'Guam', 'Guam', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('89', 'Guatemala', 'Guatemala', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('90', 'Guernsey', 'Guernsey', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('91', 'Guinea', 'Guinea', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('92', 'Guinea Ecuatorial', 'Equatorial Guinea', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('93', 'Guinea-Bissau', 'Guinea-Bissau', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('94', 'Guyana', 'Guyana', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('95', 'Haití', 'Haiti', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('96', 'Honduras', 'Honduras', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('97', 'Hong Kong', 'Hong Kong', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('98', 'Hungría', 'Hungary', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('99', 'India', 'India', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('100', 'Indian Ocean', 'Indian Ocean', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('101', 'Indonesia', 'Indonesia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('102', 'Irán', 'Iran', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('103', 'Iraq', 'Iraq', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('104', 'Irlanda', 'Ireland', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('105', 'Isla Bouvet', 'Bouvet Island', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('106', 'Isla Christmas', 'Christmas Island', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('107', 'Isla Norfolk', 'Norfolk Island', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('108', 'Islandia', 'Iceland', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('109', 'Islas Caimán', 'Cayman Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('110', 'Islas Cocos', 'Cocos Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('111', 'Islas Cook', 'Cook Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('112', 'Islas Feroe', 'Faroe Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('113', 'Islas Georgia del Sur y Sandwich del Sur', 'South Georgia and South Sandwich', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('114', 'Islas Heard y McDonald', 'Heard and McDonald Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('115', 'Islas Malvinas', 'Falkland Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('116', 'Islas Marianas del Norte', 'Northern Mariana Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('117', 'Islas Marshall', 'Marshall Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('118', 'Islas Pitcairn', 'Pitcairn Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('119', 'Islas Salomón', 'Solomon Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('120', 'Islas Turcas y Caicos', 'Turks and Caicos', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('121', 'Islas Vírgenes Americanas', 'U.S. Virgin Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('122', 'Islas Vírgenes Británicas', 'BVI', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('123', 'Israel', 'Israel', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('124', 'Italia', 'Italy', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('125', 'Jamaica', 'Jamaica', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('126', 'Jan Mayen', 'Jan Mayen', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('127', 'Japón', 'Japan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('128', 'Jersey', 'jersey', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('129', 'Jordania', 'Jordan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('130', 'Kazajistán', 'Kazakhstan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('131', 'Kenia', 'Kenya', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('132', 'Kirguizistán', 'Kyrgyzstan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('133', 'Kiribati', 'Kiribati', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('134', 'Kuwait', 'Kuwait', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('135', 'Laos', 'Laos', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('136', 'Lesoto', 'Lesotho', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('137', 'Letonia', 'Latvia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('138', 'Lébano', 'Lebanon', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('139', 'Liberia', 'Liberia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('140', 'Libia', 'Libya', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('141', 'Liechtenstein', 'Liechtenstein', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('142', 'Lituania', 'Lithuania', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('143', 'Luxemburgo', 'Luxembourg', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('144', 'Macao', 'Macao', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('145', 'Macedonia', 'macedonia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('146', 'Madagascar', 'Madagascar', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('147', 'Malasia', 'Malaysia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('148', 'Malaui', 'Malawi', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('149', 'Maldivas', 'Maldives', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('150', 'Malí', 'Mali', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('151', 'Malta', 'Malta', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('152', 'Man, Isle of', 'Man , Isle of', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('153', 'Marruecos', 'Morocco', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('154', 'Mauricio', 'Mauricio', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('155', 'Mauritania', 'Mauritania', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('156', 'Mayotte', 'Mayotte', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('157', 'México', 'Mexico', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('158', 'Micronesia', 'Micronesia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('159', 'Moldavia', 'Moldova', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('160', 'Mónaco', 'Monaco', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('161', 'Mongolia', 'Mongolia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('162', 'Montenegro', 'Montenegro', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('163', 'Montserrat', 'Montserrat', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('164', 'Mozambique', 'Mozambique', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('165', 'Mundo', 'world', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('166', 'Namibia', 'Namibia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('167', 'Nauru', 'Nauru', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('168', 'Navassa Island', 'Navassa Island', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('169', 'Nepal', 'Nepal', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('170', 'Nicaragua', 'Nicaragua', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('171', 'Níger', 'Niger', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('172', 'Nigeria', 'Nigeria', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('173', 'Niue', 'Niue', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('174', 'Noruega', 'Norway', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('175', 'Nueva Caledonia', 'new Caledonia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('176', 'Nueva Zelanda', 'NZ', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('177', 'Omán', 'Oman', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('178', 'Pacific Ocean', 'Pacific Ocean', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('179', 'Países Bajos', 'Netherlands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('180', 'Pakistán', 'Pakistan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('181', 'Palaos', 'Palau', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('182', 'Panamá', 'Panama', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('183', 'Papúa-Nueva Guinea', 'Papua New Guinea', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('184', 'Paracel Islands', 'Paracel Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('185', 'Paraguay', 'Paraguay', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('186', 'Perú', 'Peru', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('187', 'Polinesia Francesa', 'French Polynesia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('188', 'Polonia', 'Poland', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('189', 'Portugal', 'Portugal', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('190', 'Puerto Rico', 'Puerto Rico', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('191', 'Qatar', 'Qatar', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('192', 'Reino Unido', 'UK', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('193', 'República Centroafricana', 'Central African Republic', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('194', 'República Checa', 'Czech Republic', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('195', 'República Democrática del Congo', 'DRC', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('196', 'República Dominicana', 'Dominican Republic', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('197', 'Ruanda', 'Rwanda', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('198', 'Rumania', 'Romania', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('199', 'Rusia', 'Russia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('200', 'Sáhara Occidental', 'Western Sahara', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('201', 'Samoa', 'Samoa', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('202', 'Samoa Americana', 'American Samoa', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('203', 'San Cristóbal y Nieves', 'Saint Kitts and Nevis', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('204', 'San Marino', 'San Marino', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('205', 'San Pedro y Miquelón', 'Saint Pierre and Miquelon', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('206', 'San Vicente y las Granadinas', 'Saint Vincent and the Grenadines', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('207', 'Santa Helena', 'Helena', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('208', 'Santa Lucía', 'St. Lucia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('209', 'Santo Tomé y Príncipe', 'Sao Tome and Principe', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('210', 'Senegal', 'Senegal', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('211', 'Serbia', 'Serbia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('212', 'Seychelles', 'Seychelles', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('213', 'Sierra Leona', 'Sierra Leone', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('214', 'Singapur', 'Singapore', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('215', 'Siria', 'Syria', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('216', 'Somalia', 'Somalia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('217', 'Southern Ocean', 'Southern Ocean', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('218', 'Spratly Islands', 'Spratly Islands', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('219', 'Sri Lanka', 'Sri Lanka', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('220', 'Suazilandia', 'Swaziland', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('221', 'Sudáfrica', 'South Africa', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('222', 'Sudán', 'Sudan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('223', 'Suecia', 'Sweden', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('224', 'Suiza', 'Switzerland', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('225', 'Surinam', 'Surinam', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('226', 'Svalbard y Jan Mayen', 'Svalbard and Jan Mayen', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('227', 'Tailandia', 'Thailand', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('228', 'Taiwán', 'Taiwan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('229', 'Tanzania', 'Tanzania', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('230', 'Tayikistán', 'Tajikistan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('231', 'Territorio Británico del Océano Indico', 'British Indian Ocean Territory', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('232', 'Territorios Australes Franceses', 'French Southern Territories', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('233', 'Timor Oriental', 'East Timor', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('234', 'Togo', 'Togo', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('235', 'Tokelau', 'Tokelau', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('236', 'Tonga', 'Tonga', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('237', 'Trinidad y Tobago', 'Trinidad and Tobago', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('238', 'Túnez', 'Tunisia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('239', 'Turkmenistán', 'Turkmenistan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('240', 'Turquía', 'Turkey', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('241', 'Tuvalu', 'Tuvalu', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('242', 'Ucrania', 'Ukraine', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('243', 'Uganda', 'Uganda', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('244', 'Unión Europea', 'EU', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('245', 'Uruguay', 'Uruguay', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('246', 'Uzbekistán', 'Uzbekistan', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('247', 'Vanuatu', 'Vanuatu', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('248', 'Venezuela', 'Venezuela', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('249', 'Vietnam', 'Vietnam', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('250', 'Wake Island', 'Wake Island', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('251', 'Wallis y Futuna', 'Wallis and Futuna', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('252', 'West Bank', 'West Bank', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('253', 'Yemen', 'Yemen', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('254', 'Yibuti', 'Djibouti', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('255', 'Zambia', 'Zambia', '1');
INSERT INTO `eCards`.`crd_ubigeo` (`id`, `parend_id`, `name`, `visible`) VALUES ('256', 'Zimbabue', 'Zimbabwe', '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_permission`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES ('1', 'Administrador', 'Adminsitrador del Sistema', NULL, NULL);
INSERT INTO `eCards`.`crd_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES ('2', 'Usuario', 'Usuario Registrado', NULL, NULL);
INSERT INTO `eCards`.`crd_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES ('3', 'Invitado', 'Visitante No registrado', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_user`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_user` (`id`, `ubigeo_id`, `permission_id`, `first_name`, `last_name`, `email`, `correoAlternativo`, `oauth_uid`, `oauth_provider`, `algorithm`, `salt`, `password`, `gender`, `birthday`, `status`, `blocked_at`, `created_at`, `updated_at`) VALUES ('1', NULL, NULL, 'Administrador', 'Sistema', 'sysadmin@ecards.pe', NULL, NULL, NULL, NULL, NULL, 'abc123', '1', NULL, '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_user` (`id`, `ubigeo_id`, `permission_id`, `first_name`, `last_name`, `email`, `correoAlternativo`, `oauth_uid`, `oauth_provider`, `algorithm`, `salt`, `password`, `gender`, `birthday`, `status`, `blocked_at`, `created_at`, `updated_at`) VALUES ('2', NULL, NULL, 'Web', 'Master', 'webmaster@ecards.pe', NULL, NULL, NULL, NULL, NULL, '123456', '1', NULL, '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_user` (`id`, `ubigeo_id`, `permission_id`, `first_name`, `last_name`, `email`, `correoAlternativo`, `oauth_uid`, `oauth_provider`, `algorithm`, `salt`, `password`, `gender`, `birthday`, `status`, `blocked_at`, `created_at`, `updated_at`) VALUES ('3', NULL, NULL, 'Usuario', 'Invitado', 'guest@ecards.pe', NULL, NULL, NULL, NULL, NULL, '000000', '1', NULL, '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_user` (`id`, `ubigeo_id`, `permission_id`, `first_name`, `last_name`, `email`, `correoAlternativo`, `oauth_uid`, `oauth_provider`, `algorithm`, `salt`, `password`, `gender`, `birthday`, `status`, `blocked_at`, `created_at`, `updated_at`) VALUES ('4', NULL, NULL, 'Armando', 'Bronca Segura', 'abronca@hotmail.com', NULL, NULL, NULL, NULL, NULL, '123456', '1', NULL, '1', NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_card`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_card` (`id`, `title`, `description`, `postal_type`, `keywords`, `name_file`, `card path`, `miniature_card_path`, `gender`, `status`, `available_guest`, `created_at`, `updated_at`, `crd_user_id`) VALUES ('1', 'Feliz dia del Padre', 'Para alguien que merece lo mejor.', NULL, 'papa,padre,feliz dia', 'papa0025.jpg', '/media/tarjeta/imagen/papa0025.jpg', '/media/miniatura/imagen/papa0025.jpg', '1', '1', NULL, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_contacto`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_contacto` (`id`, `user_id`, `first_name`, `last_name`, `email`, `gender`, `birthday`, `source_type`, `relation_type`, `date_anniversary`, `cellphone`, `phone`, `status`, `created_at`, `updated_at`) VALUES ('1', NULL, 'Rosa Margarita', 'Flores Del Campo', 'rflores@hotmail.com', '0', '1994-05-08', '1', '1', NULL, NULL, NULL, '1', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_group_category`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_group_category` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES ('1', 'Días Festivos', NULL, 'Fechas Importantes', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_group_category` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES ('2', 'Felicitaciones', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_group_category` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES ('3', 'Trabajo', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_group_category` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES ('4', 'Saludos', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_group_category` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES ('5', 'Diversion', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_group_category` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES ('6', 'Sentimientos', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_group_category` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES ('7', 'Enamorados', NULL, NULL, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_category`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('1', '1', 'San Valentin', NULL, 'Para el dia de la amistad y de los enamorados', '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('2', '1', 'Dia de la primavera', NULL, '', '2', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('3', '1', 'Dia int. de la Mujer', NULL, '', '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('4', '1', 'Dia de la enfermera', NULL, '', '4', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('5', '1', 'Dia de la madre', NULL, '', '5', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('6', '1', 'Dia del padre', NULL, '', '6', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('7', '1', 'Hallowen', NULL, '', '7', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('8', '1', 'Navidad', NULL, '', '8', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('9', '1', 'Año nuevo', NULL, '', '9', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('10', '2', 'Cumpleaños', NULL, '', '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('11', '2', 'Bodas', NULL, '', '2', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('12', '2', 'Nacimientos', NULL, '', '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('13', '2', 'Festejos', NULL, '', '4', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('14', '2', 'Regalos', NULL, '', '5', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('15', '2', 'Felices Fiestas', NULL, '', '6', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('16', '2', 'Graduacion', NULL, '', '7', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('17', '2', 'Aniversario', NULL, '', '8', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('18', '3', 'Humor en la oficina', NULL, '', '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('19', '3', 'Despedidas', NULL, '', '2', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('20', '3', 'Reuniones Sociales', NULL, '', '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('21', '3', 'Trabajo y estudios', NULL, '', '4', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('22', '3', 'Logros y asesos', NULL, '', '5', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('23', '4', 'Hola', NULL, '', '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('24', '4', 'Besos Virtuales', NULL, '', '2', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('25', '4', 'Abrazos', NULL, '', '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('26', '4', 'Buenos días', NULL, '', '4', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('27', '4', 'Ánimo', NULL, '', '5', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('28', '4', 'Mejorate Pronto', NULL, '', '6', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('29', '5', 'Fiesta', NULL, '', '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('30', '5', 'Gastronomía', NULL, '', '2', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('31', '5', 'Vacaciones', NULL, '', '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('32', '5', 'Deporte', NULL, '', '4', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('33', '5', 'Fin de Semana', NULL, '', '5', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('34', '5', 'Humor', NULL, '', '6', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('35', '6', 'Familia fraternales', NULL, '', '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('36', '6', 'Invitacion', NULL, '', '2', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('37', '6', 'Perdon', NULL, '', '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('38', '6', 'Te extraño', NULL, '', '4', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('39', '6', 'Te Quiero', NULL, '', '5', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('40', '6', 'Te Odio', NULL, '', '6', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('41', '6', 'No quiero verte', NULL, '', '7', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('42', '7', 'Besos', NULL, '', '1', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('43', '7', 'Coqueteo', NULL, '', '2', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('44', '7', 'Para Ella', NULL, '', '3', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('45', '7', 'Para El', NULL, '', '4', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('46', '7', 'Cariños', NULL, '', '5', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('47', '7', 'Flores', NULL, '', '6', NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_category` (`id`, `group_category_id`, `name`, `slug`, `description`, `order_group`, `status`, `created_at`, `updated_at`) VALUES ('48', '7', 'Romanticas', NULL, '', '7', NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `eCards`.`crd_card_category_user`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `eCards`;
INSERT INTO `eCards`.`crd_card_category_user` (`idTarjetaCategoria`, `user_id`, `card_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eCards`.`crd_card_category_user` (`idTarjetaCategoria`, `user_id`, `card_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES ('2', NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;
