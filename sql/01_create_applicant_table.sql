USE gmr;

CREATE TABLE `applicant` (
 `firstname` varchar(30) NOT NULL,
 `lastname` varchar(30) NOT NULL,
 `username` varchar(50) NOT NULL,
 `password` varchar(64) NOT NULL,
 `company` mediumtext,
 `location` mediumtext,
 PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1