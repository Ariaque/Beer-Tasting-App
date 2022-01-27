-- -----------------------------------------------------
-- Table `beer_tasting_app`.`beer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `beer_tasting_app`.`beer` ;

CREATE TABLE IF NOT EXISTS `beer_tasting_app`.`beer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `style` VARCHAR(255) NOT NULL,
  `aroma` TEXT NULL,
  `appearance` TEXT NULL,
  `flavor` TEXT NULL,
  `body` TEXT NULL,
  `comments` TEXT NULL,
  `story` TEXT NULL,
  `ingredients` TEXT NULL,
  `styles_comparison` TEXT NULL,
  `commercial_examples` TEXT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idbiere_UNIQUE` (`id` ASC)  )
ENGINE = InnoDB;
