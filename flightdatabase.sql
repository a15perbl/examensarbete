DROP DATABASE testDB;
CREATE DATABASE testDB;
USE testDB;


CREATE TABLE destinations (
	ID char (3),
	LOCATION varchar (200),
    PRIMARY KEY (ID)
) ENGINE=INNODB;

CREATE TABLE flights (
	FLIGHTNO varchar(4),
    TOWN_FROM varchar(30),
    TOWN_TO varchar(30),
    DATEFLIGHT varchar(20),
    DEPARTURE varchar(50),
    ARRIVAL varchar(50),
    PRICE integer,
    PRIMARY KEY (FLIGHTNO)
) ENGINE=INNODB;



INSERT INTO flights 
VALUES
	('85A6', 'Stockholm', 'Landvetter','2018-02-21', '04:12', '06:00', '2149'),
	('FE46', 'Stockholm', 'Landvetter','2018-02-21', '06:15', '08:00', '1190'),
	('H8A6', 'Stockholm', 'Landvetter','2018-02-21', '07:08', '09:10', '3599'),
	('W856', 'Stockholm', 'Landvetter','2018-02-21', '08:39', '10:09', '4299'),
	('I5K9', 'Stockholm', 'Landvetter','2018-02-21', '09:45', '12:50', '899'),
    ('F48A', 'Stockholm', 'Landvetter','2018-02-21', '13:20', '15:50', '1199'),
	('J45L', 'Stockholm', 'Landvetter','2018-02-21', '10:59', '14:20', '1699'),
	('G583', 'Stockholm', 'Landvetter','2018-02-21', '16:18', '19:20', '1959');

INSERT INTO destinations 
VALUES 
	( 'ARN', 'Stockholm-Arlanda' ),
    ( 'BMA', 'Stockholm-Bromma' ),
    ( 'GOT', 'Göteborg-Landvetter' ),
    ( 'LPI', 'Linköping-City Airport' ),
    ( 'NYO', 'Stockholm-Skavsta' );