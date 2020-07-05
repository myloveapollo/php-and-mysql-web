CREATE DATABASE bookmarks;
USE bookmarks;

CREATE TABLE USER
(
	username VARCHAR(16) NOT NULL PRIMARY key,
	passwd CHAR(40) NOT null,
	email VARCHAR(100) NOT null
);

CREATE TABLE bookmark
(
	username VARCHAR(16) NOT null,
	bm_URL VARCHAR(255) NOT null,
	INDEX (username),
	INDEX (bm_URL),
	PRIMARY KEY (username, bm_URL)
);

GRANT SELECT, insert, update, DELETE
ON bookmarks.*
TO bm_user@localhost identified BY 'password';