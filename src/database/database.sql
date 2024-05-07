CREATE DATABASE IF NOT EXISTS level2_employees;

USE level2_employees;

CREATE TABLE IF NOT EXISTS `employees`
(
    id int(11) NOT NULL AUTO_INCREMENT,
    dni bigint NOT NULL,
    name varchar(255) NOT NULL,
    lastName varchar(255) NOT NULL,
    gender ENUM('M','F') NOT NULL,
    birthdate date NOT NULL,
    joindate date NOT NULL,
    salary integer NOT NULL,
    PRIMARY KEY (id,dni)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

 insert into employees(dni, name, lastName,gender, birthdate,joindate,salary) values (11102053366,'Leonor','Cardona Hernandez','F','1992-06-01','2022-01-16',4000000);


GRANT ALL PRIVILEGES ON level2_employees.* TO 'user'@'%';

FLUSH PRIVILEGES;