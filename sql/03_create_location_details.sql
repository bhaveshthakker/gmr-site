CREATE TABLE `location_details` (
 `id` int(6) NOT NULL,
 `name` varchar(50) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;