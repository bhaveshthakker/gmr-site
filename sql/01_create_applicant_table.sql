USE gmr;

CREATE TABLE `applicants` (
 `id` int(6) NOT NULL AUTO_INCREMENT,
 `firstname` varchar(30) NOT NULL,
 `lastname` varchar(30) NOT NULL,
 `username` varchar(50) NOT NULL,
 `password` varchar(256) NOT NULL,
 `company` mediumtext,
 `location` mediumtext,
 `ip_address` varchar(20) DEFAULT NULL,
 `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `last_updated_by` varchar(50) NOT NULL,
 `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 PRIMARY KEY (`id`),
 UNIQUE KEY `username` (`username`),
 KEY `username_2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

delimiter //

CREATE TRIGGER `applicants_insert_trigger` BEFORE INSERT ON `applicants`
 FOR EACH ROW BEGIN
    SET NEW.creation_date=NOW();
    SET NEW.last_updated_by=USER();
    SET NEW.last_update=NOW();
END;//
CREATE TRIGGER `applicants_update_trigger` BEFORE UPDATE ON `applicants`
 FOR EACH ROW BEGIN
    SET NEW.last_updated_by=USER();
    SET NEW.last_update = NOW();
END;//

delimiter ;