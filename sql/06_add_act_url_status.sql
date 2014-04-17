USE gmr;
ALTER TABLE `applicants` ADD `status_type` VARCHAR(32) NOT NULL AFTER `ip_address`, ADD `activation_key` VARCHAR(512) NOT NULL AFTER `status_type`;