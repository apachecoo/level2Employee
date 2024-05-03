CREATE DATABASE IF NOT EXISTS `level2_employees`;

USE `level2_employees`;

CREATE TABLE IF NOT EXISTS `employees`
(
    `id`    int(11)      NOT NULL AUTO_INCREMENT,
    `dni`   bigint      NOT NULL,
    `name`  varchar(255) NOT NULL,
    `lastName`  varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,

    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- insert into employees(dni, name, lastName, email) values (11102053366,'Leonor','Cardona Hernandez','leonor39393@gmail.com');


GRANT ALL PRIVILEGES ON level2_employees.* TO 'user'@'%';

FLUSH PRIVILEGES;