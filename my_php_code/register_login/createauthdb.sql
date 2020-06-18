CREATE DATABASE auth;
USE auth;
CREATE TABLE authorized_users(
	name VARCHAR(20),
	password VARCHAR(40),
	PRIMARY KEY (name)
);

INSERT INTO autho