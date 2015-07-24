CREATE TABLE `vagtplan` (
	`idx` INT(10) NOT NULL AUTO_INCREMENT,
	`movieNo` INT(11) NULL DEFAULT '0',
	`poster` VARCHAR(60) NULL DEFAULT '0',
	`Dato` DATE NULL DEFAULT NULL,
	`Tid` TIME NULL DEFAULT NULL,
	`Titel` VARCHAR(100) NULL DEFAULT NULL,
	`Cafe1` VARCHAR(50) NULL DEFAULT NULL,
	`Cafe2` VARCHAR(50) NULL DEFAULT NULL,
	`Operator1` VARCHAR(50) NULL DEFAULT NULL,
	`Operator2` VARCHAR(50) NULL DEFAULT NULL,
	`Ledige` TINYINT(4) NULL DEFAULT NULL,
	`AA` TINYINT(4) NULL DEFAULT NULL,
	`Note` VARCHAR(255) NULL DEFAULT NULL,
	`event_id` INT(11) NULL DEFAULT NULL,
	`ugedag` VARCHAR(10) NULL DEFAULT NULL,
	`Date` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`idx`),
	UNIQUE INDEX `Index 2` (`Dato`, `Tid`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2902
;
CREATE TABLE `login` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

DELIMITER $$
CREATE PROCEDURE `create_foo`(IN ms INT)
BEGIN
declare d datetime;
declare future datetime;

Set d = NOW();
set future =DATE_ADD(d,interval ms month );

DROP TABLE IF EXISTS foo;
 create temporary table foo (d date not null);

  set d = NOW();
  set future=DATE_ADD(d,INTERVAL ms MONTH);
  while d <= future  do
    insert into foo (d) values (d);
    set d = date_add(d, interval 1 day);
  end while;
END$$
DELIMITER ;
