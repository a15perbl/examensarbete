DROP DATABASE testDB;
CREATE DATABASE testDB;
USE testDB;


CREATE TABLE destinations (
	ID char (3),
	LOCATION varchar (200),
    PRIMARY KEY (ID)
) ENGINE=INNODB;

CREATE TABLE flights (
	FLIGHTNO varchar(20),
    DATEFLIGHT varchar(20),
    DEPARTURE varchar(50),
    ARRIVAL varchar(50),
    PRICE integer,
    PRIMARY KEY (FLIGHTNO)
) ENGINE=INNODB;



INSERT INTO flights 
VALUES 
	('B739', '2018-02-21', '13:20', '15:50', '500');

INSERT INTO destinations 
VALUES 
	( 'ARN', 'Stockholm-Arlanda' ),
    ( 'BMA', 'Stockholm-Bromma' ),
    ( 'GOT', 'Göteborg-Landvetter' ),
    ( 'LPI', 'Linköping City Airport' ),
    ( 'NYO', 'Stockholm-Skavsta' );