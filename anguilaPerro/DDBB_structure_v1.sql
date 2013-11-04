SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `mydb`.`groups` 
CHANGE COLUMN `idgroups` `idgroups` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `name` `name` VARCHAR(255) NOT NULL ;

ALTER TABLE `mydb`.`users` 
CHANGE COLUMN `idusers` `idusers` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `email` `email` VARCHAR(255) NOT NULL ,
CHANGE COLUMN `password` `password` VARCHAR(255) NOT NULL ;

ALTER TABLE `mydb`.`user_types` 
CHANGE COLUMN `iduser_types` `iduser_types` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `mydb`.`exams` 
CHANGE COLUMN `idexams` `idexams` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `topic` `topic` VARCHAR(255) NOT NULL ,
CHANGE COLUMN `difficulty` `difficulty` INT(11) NOT NULL ;

ALTER TABLE `mydb`.`questions` 
CHANGE COLUMN `idquestions` `idquestions` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `description` `description` TEXT NOT NULL ;

ALTER TABLE `mydb`.`question_difficulties` 
CHANGE COLUMN `idquestion_difficulties` `idquestion_difficulties` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `mydb`.`question_types` 
CHANGE COLUMN `idquestion_types` `idquestion_types` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `mydb`.`answers` 
CHANGE COLUMN `idanswers` `idanswers` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `text` `text` VARCHAR(255) NOT NULL ;

ALTER TABLE `mydb`.`exam_state` 
CHANGE COLUMN `description` `description` VARCHAR(255) NOT NULL ;

ALTER TABLE `mydb`.`established_exams` 
CHANGE COLUMN `idestablished_exams` `idestablished_exams` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `ini_date` `ini_date` DATE NOT NULL ,
CHANGE COLUMN `end_date` `end_date` DATE NOT NULL ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
