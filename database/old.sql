



-- -----------------------------------------------------
-- Table `beer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tasting` ;

DROP TABLE IF EXISTS `beer_style` ;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

CREATE TABLE IF NOT EXISTS `user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` CHAR(32) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_login_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login_ip` INT(11) UNSIGNED NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) );

CREATE TABLE IF NOT EXISTS `beer_style` (
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

-- -----------------------------------------------------
-- Table `tasting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tasting` ;

CREATE TABLE IF NOT EXISTS `tasting` (
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
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_beer_beer1`
    FOREIGN KEY (`beer_id`)
    REFERENCES `beer_style` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



ALTER TABLE tasting ADD `title` VARCHAR(250) NOT NULL AFTER `id`;

ALTER TABLE user ADD `remember_me` TINYINT NULL DEFAULT 0;

ALTER TABLE tasting CHANGE `is_light-struck` is_light_struck TINYINT NULL DEFAULT 0;

ALTER TABLE tasting CHANGE `total_score` total DECIMAL(3,1);

ALTER TABLE user MODIFY user.password CHAR(60);

ALTER table tasting Add column beer_name varchar(250) NULL AFTER beer_id;

ALTER TABLE tasting CHANGE beer_id bs_id int(11);

ALTER table user add column is_verified tinyint(1) DEFAULT 0 NOT NULL after created_at;

ALTER TABLE user MODIFY user.password CHAR(60) NOT NULL;

ALTER TABLE tasting MODIFY tasting.flavor_score DECIMAL(3,1) NOT NULL;
ALTER TABLE tasting MODIFY tasting.aroma_score DECIMAL(3,1) NOT NULL;
ALTER TABLE tasting MODIFY tasting.overall_score  DECIMAL(3,1) NOT NULL;
ALTER table tasting add column bottle_inspection_comment VARCHAR(2000) NULL after overall_comment;

ALTER TABLE beer_style CHANGE `style` title VARCHAR(255) NOT NULL;
ALTER TABLE user CHANGE `id` user_id INT NOT NULL AUTO_INCREMENT;
ALTER TABLE beer_style CHANGE `id` beer_style_id INT NOT NULL AUTO_INCREMENT;
ALTER TABLE tasting CHANGE `id` tasting_id INT NOT NULL AUTO_INCREMENT;

ALTER TABLE tasting CHANGE `user_id` u_id INT NOT NULL ;
ALTER TABLE beer_style CHANGE `title` style VARCHAR(255) NOT NULL;
ALTER TABLE tasting CHANGE `created_at` t_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

INSERT INTO `beer_style` (`beer_style_id`, `style`, `aroma`, `appearance`, `flavor`, `body`, `comments`, `story`, `ingredients`, `styles_comparison`, `commercial_examples`, `created_at`, `updated_at`) VALUES (NULL, 'Lager Américaine Légère', 'Peu ou pas d\'arômes maltés. S\'ils existent, ils peuvent être perçus comme des arômes de céréales, doux ou similaires à ceux du maïs. L\'arôme des houblons peut être absent ou léger, épicé ou floral s\'il est décelable. Si l\'absence d\'arôme lié aux levures est souhaitable, un faible taux (en particulier un léger arôme fruité de pomme verte) n\'est pas un défaut. Un faible taux de DMS (diméthylsulfure) est également acceptable.', 'Couleur blond paille très claire à jaune pâle. Col de mousse blanche, rarement persistante. Limpide.', 'Palais relativement neutre avec une saveur en fin de bouche fraîche et sèche, de faibles saveurs de malts ou de maïs qui peuvent être perçues comme un goût sucré du fait de la faible amertume. Les saveurs de houblons sont soit absentes, soit de faible intensité et peuvent être florales, épicées ou présenter des notes végétales (bien que rarement assez fortes pour être détectées). L\'amertume est faible à très faible. L\'équilibre peut varier de légèrement malté à légèrement amer, mais doit être relativement proche de l\'équilibre. De hauts niveaux de carbonatation peuvent accentuer la sensation de fraîcheur et de sécheresse en fin de bouche.', 'Corps très léger lié à l\'utilisation d\'un pourcentage important de céréales additionnelles comme le riz ou le maïs. Forte carbonatation avec une légère sensation de piquant sur la langue. Le corps peut sembler aqueux.', 'Une bière dont la densité initiale et la teneur en calories sont inférieures à celles des bières lager \"internationales\". Des saveurs fortes sont un défaut pour ce type de bières. Elles sont conçues pour plaire au plus grand nombre.', 'La Brasserie Coors a brièvement brassé une lager légère au début des années 1940. Les versions modernes ont été en premier lieu produites par la brasserie Rheingold en 1967 pour satisfaire les consommateurs soucieux de leur régime alimentaire. Elles ne sont devenues populaires qu\'à partir de 1973, après que la compagnie Miller Brewing ait acquis la recette et ait fortement promu la bière aux fans de sport via une campagne publicitaire dont le slogan était \"tastes great, less filling\" soit \"pleine de goût, plus légère\". Les bières de ce genre sont devenues les plus vendues aux États-Unis dans les années 1990.', '\r\nMalt d\'orge 2 rangs ou 6 rangs avec un important pourcentage de riz ou de maïs comme compléments (jusqu\'à 40%).', 'Une version plus fine en bouche, légère en alcool et en calories que la Lager Américaine, avec moins d\'arôme et d\'amertume des houblons qu\'une Leichtbier.\r\n\r\n', 'Bud Light, Coors Light, Keystone Light, Michelob Light, Miller Lite, Old Milwaukee Light\r\n\r\n', CURRENT_TIMESTAMP, NULL);

ALTER TABLE user CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE tasting CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE beer_style CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
