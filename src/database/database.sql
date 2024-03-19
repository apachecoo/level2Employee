CREATE DATABASE IF NOT EXISTS `level2_employees`;

USE `level2_employees`;

CREATE TABLE IF NOT EXISTS `employees` (
                                       `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,

    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

