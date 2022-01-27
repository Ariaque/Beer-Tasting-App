-- -----------------------------------------------------
-- Table `beer_tasting_app`.`tasting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `beer_tasting_app`.`tasting` ;

CREATE TABLE IF NOT EXISTS `beer_tasting_app`.`tasting` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `beer_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `aroma_comment` VARCHAR(2000) NULL,
  `aroma_score` DECIMAL(2,1) NOT NULL,
  `appearance_comment` VARCHAR(2000) NULL,
  `appearance_score` DECIMAL(2,1) NOT NULL,
  `flavor_comment` VARCHAR(2000) NULL,
  `flavor_score` DECIMAL(2,1) NOT NULL,
  `mouthfeel_comment` VARCHAR(2000) NULL,
  `mouthfeel_score` DECIMAL(2,1) NOT NULL,
  `overall_comment` VARCHAR(2000) NULL,
  `overall_score` DECIMAL(2,1) NOT NULL,
  `total_score` DECIMAL(2,1) NOT NULL,
  `is_acetaldehyde` TINYINT NULL DEFAULT 0,
  `is_alcoholic` TINYINT NULL DEFAULT 0,
  `is_astringent` TINYINT NULL DEFAULT 0,
  `is_diacetyl` TINYINT NULL DEFAULT 0,
  `is_dms` TINYINT NULL DEFAULT 0,
  `is_estery` TINYINT NULL DEFAULT 0,
  `is_grassy` TINYINT NULL DEFAULT 0,
  `is_light-struck` TINYINT NULL DEFAULT 0,
  `is_metallic` TINYINT NULL DEFAULT 0,
  `is_musty` TINYINT NULL DEFAULT 0,
  `is_oxidized` TINYINT NULL DEFAULT 0,
  `is_phenolic` TINYINT NULL DEFAULT 0,
  `is_solvent` TINYINT NULL DEFAULT 0,
  `is_acidic` TINYINT NULL DEFAULT 0,
  `is_sulfur` TINYINT NULL DEFAULT 0,
  `is_vegetal` TINYINT NULL DEFAULT 0,
  `is_bottle_ok` TINYINT NULL DEFAULT 0,
  `is_yeasty` TINYINT NULL DEFAULT 0,
  `stylistic_accuracy` ENUM('0', '1', '2', '3', '4', '5') NULL DEFAULT '0',
  `intangibles` ENUM('0', '1', '2', '3', '4', '5') NULL DEFAULT '0',
  `technical_merit` ENUM('0', '1', '2', '3', '4', '5') NULL DEFAULT '0',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_user_has_beer_beer1_idx` (`beer_id` ASC)  ,
  INDEX `fk_user_has_beer_user_idx` (`user_id` ASC)  ,
  UNIQUE INDEX `idtasting_UNIQUE` (`id` ASC)  ,
  CONSTRAINT `fk_user_has_beer_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `beer_tasting_app`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_beer_beer1`
    FOREIGN KEY (`beer_id`)
    REFERENCES `beer_tasting_app`.`beer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);