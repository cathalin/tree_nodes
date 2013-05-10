SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `tree_nodes` ;
USE `tree_nodes` ;

-- -----------------------------------------------------
-- Table `tree_nodes`.`categories_has_listings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tree_nodes`.`categories_has_listings` (
  `category_id` INT(11) NOT NULL ,
  `listing_id` INT(11) NOT NULL ,
  PRIMARY KEY (`category_id`, `listing_id`) ,
  INDEX `fk_categories_has_listings_listings1` (`listing_id` ASC) ,
  INDEX `fk_categories_has_listings_categories` (`category_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tree_nodes`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tree_nodes`.`category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_type` INT(11) NOT NULL DEFAULT '0' ,
  `id_parent` INT(11) NOT NULL DEFAULT '0' ,
  `order_num` INT(11) NOT NULL ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `seo_name` VARCHAR(255) NOT NULL DEFAULT '' ,
  `selected_icons_serialized` INT(15) NOT NULL ,
  `meta_title` VARCHAR(255) NOT NULL ,
  `meta_description` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `parent_category_id` (`id_parent` ASC) ,
  FULLTEXT INDEX `name` (`name` ASC, `meta_title` ASC, `meta_description` ASC) ,
  FULLTEXT INDEX `meta_title` (`meta_title` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 468
DEFAULT CHARACTER SET = utf8
PACK_KEYS = 0;


-- -----------------------------------------------------
-- Table `tree_nodes`.`listings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tree_nodes`.`listings` (
  `id` INT(11) NOT NULL ,
  `level_id` INT(11) NOT NULL ,
  `owner_id` INT(11) NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `seo_title` VARCHAR(255) NOT NULL ,
  `listing_description` TEXT NOT NULL ,
  `listing_meta_description` TEXT NOT NULL ,
  `listing_keywords` TEXT NOT NULL ,
  `url` VARCHAR(55) NOT NULL ,
  `email1` VARCHAR(55) NOT NULL ,
  `email2` VARCHAR(55) NULL DEFAULT NULL ,
  `social1` VARCHAR(55) NULL DEFAULT NULL ,
  `social2` VARCHAR(55) NULL DEFAULT NULL ,
  `address` VARCHAR(155) NOT NULL ,
  `zip` VARCHAR(11) NOT NULL ,
  `city` VARCHAR(55) NOT NULL ,
  `phone` VARCHAR(55) NOT NULL ,
  `mobil` TEXT NOT NULL ,
  `fax` VARCHAR(55) NOT NULL ,
  `opening_days` VARCHAR(55) NOT NULL ,
  `opening_times` VARCHAR(55) NOT NULL ,
  `heading` VARCHAR(55) NOT NULL ,
  `description` VARCHAR(400) NOT NULL ,
  `targetgroups` VARCHAR(55) NOT NULL ,
  `age` VARCHAR(55) NOT NULL ,
  `spez` VARCHAR(55) NOT NULL ,
  `location` VARCHAR(55) NOT NULL ,
  `languages` VARCHAR(55) NOT NULL ,
  `payment` VARCHAR(25) NOT NULL ,
  `country` VARCHAR(55) NOT NULL ,
  `paid` INT(11) NOT NULL ,
  `web_visit_count` INT(11) NOT NULL ,
  `is_featured` INT(11) NOT NULL ,
  `logo_file` VARCHAR(255) NOT NULL ,
  `status` VARCHAR(255) NOT NULL ,
  `creation_date` VARCHAR(55) NOT NULL ,
  `expiration_date` DATETIME NOT NULL ,
  `last_modified_date` DATETIME NOT NULL ,
  `was_prolonged_times` INT(11) NOT NULL ,
  `levels_id` INT(11) NOT NULL ,
  `category_id` INT(15) NOT NULL ,
  PRIMARY KEY (`id`, `levels_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
