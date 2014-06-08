use gmr;

CREATE TABLE `openings` (
 `opening_id` int(10) NOT NULL AUTO_INCREMENT,
 `primary_skill` varchar(200) DEFAULT NULL,
 `experience` varchar(100) DEFAULT NULL,
 `company` varchar(100) DEFAULT NULL,
 `location` varchar(100) DEFAULT NULL,
 PRIMARY KEY (`opening_id`),
 KEY `opening_id` (`opening_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1