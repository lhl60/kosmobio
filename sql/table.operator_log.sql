-- 
-- Editor SQL for DB table operator_log
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE `operator_log` (
	`idx` int(10) NOT NULL auto_increment,
	`dato` varchar(255),
	`subject` varchar(255),
	`text` varchar(255),
	PRIMARY KEY( `idx` )
);