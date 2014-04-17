USE gmr;
ALTER TABLE `applicants` ADD `resume_path` VARCHAR(512) NOT NULL AFTER `password`;