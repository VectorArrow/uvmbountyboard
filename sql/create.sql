DROP TABLE IF EXISTS Admins;
DROP TABLE IF EXISTS Alerts;
DROP TABLE IF EXISTS Comments;
DROP TABLE IF EXISTS Items;
DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
	username varchar(255) NOT NULL,
	nickname varchar(255),
	email varchar(255),
	dateCreated date,
	PRIMARY KEY (username));
CREATE TABLE Admins(
	username varchar(255),
	accessLevel int,
	FOREIGN KEY (username) REFERENCES Users (username),
	PRIMARY KEY (username));
CREATE TABLE Alerts(
	id int NOT NULL AUTO_INCREMENT,
	username varchar(255) NOT NULL,
	keywords varchar(255),
	location varchar(255),
	FOREIGN KEY (username) REFERENCES Users (username),
	PRIMARY KEY  (id));
CREATE TABLE Items(
	id int NOT NULL AUTO_INCREMENT,
	username varchar(255),
	name varchar(255),
	dateCreated date,
	dateLost date,
	category varchar(255),
	description varchar(255),
	location varchar(255),
	status varchar(7),
	image varchar(255),
	PRIMARY KEY (id),
	FOREIGN KEY (username) REFERENCES Users (username));
CREATE TABLE Comments(
	id int NOT NULL AUTO_INCREMENT,
	itemsId int,
	username varchar(255),
	commentOrder int,
	commentParent int,
	PRIMARY KEY (id),
	FOREIGN KEY (itemsId) REFERENCES Items (id),
	FOREIGN KEY (username) REFERENCES Users (username));
