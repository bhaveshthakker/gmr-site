use gmr;

CREATE TABLE `user_opening_mappings` (
 `id` int(6) NOT NULL AUTO_INCREMENT,
 `opening_id` int(10) NOT NULL,
 `applicant_id` varchar(200) NOT NULL,
 `status` varchar(100) DEFAULT NULL,
 `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `last_updated_by` varchar(50) NOT NULL,
 `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 PRIMARY KEY (`id`),
 UNIQUE KEY `mapping_key` (`opening_id`, `applicant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

delimiter //

CREATE TRIGGER `user_opening_mappings_create_trigger` BEFORE INSERT ON `user_opening_mappings`
 FOR EACH ROW BEGIN
    SET NEW.creation_date=NOW();
    SET NEW.last_updated_by=USER();
    SET NEW.last_update=NOW();
END;//
CREATE TRIGGER `user_opening_mappings_update_trigger` BEFORE UPDATE ON `user_opening_mappings`
 FOR EACH ROW BEGIN
    SET NEW.last_updated_by=USER();
    SET NEW.last_update = NOW();
END;//

delimiter ;