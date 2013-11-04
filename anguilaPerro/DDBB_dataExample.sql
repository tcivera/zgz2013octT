-- USERS

INSERT INTO `mydb`.`users` (`idusers`, `name`, `email`, `confirmed`, `password`, `user_type`) VALUES ('1', 'Antonio', 'antonio@gmail.com', '1', '12jdf23234jklf8ydnsk3bnsjkd', '1');
INSERT INTO `mydb`.`users` (`idusers`, `name`, `email`, `confirmed`, `password`, `user_type`) VALUES ('2', 'Teacher', 'teacher@yahoo.es', '1', 'dsdsadas3dsadasdsadasdasd', '2');


-- GROUPS

INSERT INTO `mydb`.`groups` (`idgroups`, `name`, `active`) VALUES ('1', 'PHP afternoon', '1');


-- EXAMS

INSERT INTO `mydb`.`exams` (`idexams`, `topic`, `difficulty`) VALUES ('1', 'Arrays in PHP', '5');

-- QUESTIONS

-- Multiple question
INSERT INTO `mydb`.`questions` (`idquestions`, `description`, `question_difficulty`, `question_type`, `exam`) VALUES ('1', 'Is you want to order an array in reverse order which functions would you use?', '2', '1', '1');
-- Single question
INSERT INTO `mydb`.`questions` (`idquestions`, `description`, `question_difficulty`, `question_type`, `exam`) VALUES ('2', 'Assume you would like to sort an array in ascending order by value while preserving key associations. Which of the following PHP sorting functions would you use?', '2', '2', '1');
-- Text question
INSERT INTO `mydb`.`questions` (`idquestions`, `description`, `question_difficulty`, `question_type`, `exam`) VALUES ('3', 'What is the name of a function ised to convert an array into a string?', '1', '3', '1');

-- ANSWERS
-- Multiple/SIngle answer (Not correct)
INSERT INTO `mydb`.`answers` (`idanswers`, `text`, `is_correct`, `question`) VALUES ('1', 'asort()', '0', '2');
-- Text answer (correct)
INSERT INTO `mydb`.`answers` (`idanswers`, `text`, `is_correct`, `question`) VALUES ('2', 'implode', '1', '3');

-- ESTABLISHED EXAM

INSERT INTO `mydb`.`established_exams` (`idestablished_exams`, `ini_date`, `end_date`, `group`, `exam`, `exam_state`) VALUES ('1', '2013-10-10', '2013-11-10', '1', '1', '1');

-- EXAM MARK

INSERT INTO `mydb`.`exam_marks` (`established_exam`, `user`, `success`, `fail`) VALUES ('1', '1', '2', '1');

