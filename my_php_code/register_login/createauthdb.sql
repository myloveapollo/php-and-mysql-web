CREATE DATABASE auth;
USE auth;
CREATE TABLE authorized_users(
	name VARCHAR(20),
	password VARCHAR(40),
	PRIMARY KEY (name)
);

INSERT INTO authorized_users values('username', 'password');

INSERT INTO authorized_users values('testuser', sha1('password'));

grant select on auth.* to 'webauth' identified by 'webauth';

flush privileges;
-- mysqladmin flush-privileges
--mysqladmin reload