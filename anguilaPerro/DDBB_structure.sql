SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `mydb`.`groups` (
  `idgroups` INT(11) NOT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `active` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idgroups`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `idusers` INT(11) NOT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `confirmed` TINYINT(1) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `user_type` INT(11) NOT NULL,
  PRIMARY KEY (`idusers`),
  INDEX `fk_users_user_types1_idx` (`user_type` ASC),
  CONSTRAINT `fk_users_user_types1`
    FOREIGN KEY (`user_type`)
    REFERENCES `mydb`.`user_types` (`iduser_types`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`user_types` (
  `iduser_types` INT(11) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`iduser_types`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`exams` (
  `idexams` INT(11) NOT NULL,
  `topic` VARCHAR(255) NULL DEFAULT NULL,
  `difficulty` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idexams`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`questions` (
  `idquestions` INT(11) NOT NULL,
  `description` TEXT NOT NULL DEFAULT NULL,
  `question_difficulty` INT(11) NOT NULL,
  `question_type` INT(11) NOT NULL,
  `exam` INT(11) NOT NULL,
  PRIMARY KEY (`idquestions`),
  INDEX `fk_questions_question_difficulties_idx` (`question_difficulty` ASC),
  INDEX `fk_questions_question_types1_idx` (`question_type` ASC),
  INDEX `fk_questions_exams1_idx` (`exam` ASC),
  CONSTRAINT `fk_questions_question_difficulties`
    FOREIGN KEY (`question_difficulty`)
    REFERENCES `mydb`.`question_difficulties` (`idquestion_difficulties`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_question_types1`
    FOREIGN KEY (`question_type`)
    REFERENCES `mydb`.`question_types` (`idquestion_types`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_exams1`
    FOREIGN KEY (`exam`)
    REFERENCES `mydb`.`exams` (`idexams`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`question_difficulties` (
  `idquestion_difficulties` INT(11) NOT NULL,
  `description` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idquestion_difficulties`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`question_types` (
  `idquestion_types` INT(11) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idquestion_types`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`answers` (
  `idanswers` INT(11) NOT NULL,
  `text` VARCHAR(255) NULL DEFAULT NULL,
  `is_correct` TINYINT(1) NULL DEFAULT NULL,
  `question` INT(11) NOT NULL,
  PRIMARY KEY (`idanswers`),
  INDEX `fk_answers_questions1_idx` (`question` ASC),
  CONSTRAINT `fk_answers_questions1`
    FOREIGN KEY (`question`)
    REFERENCES `mydb`.`questions` (`idquestions`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`groups_has_users` (
  `groups_idgroups` INT(11) NOT NULL,
  `users_idusers` INT(11) NOT NULL,
  PRIMARY KEY (`groups_idgroups`, `users_idusers`),
  INDEX `fk_groups_has_users_users1_idx` (`users_idusers` ASC),
  INDEX `fk_groups_has_users_groups1_idx` (`groups_idgroups` ASC),
  CONSTRAINT `fk_groups_has_users_groups1`
    FOREIGN KEY (`groups_idgroups`)
    REFERENCES `mydb`.`groups` (`idgroups`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_groups_has_users_users1`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `mydb`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`exam_state` (
  `idexam_state` INT(11) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idexam_state`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`established_exams` (
  `idestablished_exams` INT(11) NOT NULL,
  `ini_date` DATE NULL DEFAULT NULL,
  `end_date` DATE NULL DEFAULT NULL,
  `group` INT(11) NOT NULL,
  `exam` INT(11) NOT NULL,
  `exam_state` INT(11) NOT NULL,
  PRIMARY KEY (`idestablished_exams`),
  INDEX `fk_established_exams_groups1_idx` (`group` ASC),
  INDEX `fk_established_exams_exams1_idx` (`exam` ASC),
  INDEX `fk_established_exams_exam_state1_idx` (`exam_state` ASC),
  CONSTRAINT `fk_established_exams_groups1`
    FOREIGN KEY (`group`)
    REFERENCES `mydb`.`groups` (`idgroups`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_established_exams_exams1`
    FOREIGN KEY (`exam`)
    REFERENCES `mydb`.`exams` (`idexams`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_established_exams_exam_state1`
    FOREIGN KEY (`exam_state`)
    REFERENCES `mydb`.`exam_state` (`idexam_state`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`exam_marks` (
  `established_exam` INT(11) NOT NULL,
  `user` INT(11) NOT NULL,
  `success` INT(11) NULL DEFAULT NULL,
  `fail` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`established_exam`, `user`),
  INDEX `fk_established_exams_has_users_users1_idx` (`user` ASC),
  INDEX `fk_established_exams_has_users_established_exams1_idx` (`established_exam` ASC),
  CONSTRAINT `fk_established_exams_has_users_established_exams1`
    FOREIGN KEY (`established_exam`)
    REFERENCES `mydb`.`established_exams` (`idestablished_exams`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_established_exams_has_users_users1`
    FOREIGN KEY (`user`)
    REFERENCES `mydb`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
