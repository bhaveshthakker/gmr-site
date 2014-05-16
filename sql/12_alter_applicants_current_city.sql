use gmr;

ALTER TABLE `applicants` CHANGE `current_city` `current_city` VARCHAR(100) NULL DEFAULT NULL;

ALTER TABLE `applicants` CHANGE `current_ctc` `current_ctc` VARCHAR(50) NULL DEFAULT NULL;

ALTER TABLE `applicants` CHANGE `secondary_skills` `secondary_skills` MEDIUMTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;