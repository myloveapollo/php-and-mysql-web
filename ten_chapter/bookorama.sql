CREATE TABLE customers
(customerid INT unsigned NOT NULL auto_increment PRIMARY key,
 name CHAR(50) NOT null,
 address CHAR(100) NOT null,
 city CHAR(30) NOT null
);

CREATE TABLE orders
( orderid INT unsigned NOT NULL auto_increment PRIMARY key,
  customerid INT unsigned NOT null,
  amount FLOAT(6,2),
  DATE DATE NOT null
);

CREATE TABLE books
(
	isbn CHAR(13) NOT NULL PRIMARY key,
	author CHAR(50),
	title CHAR(100),
	price FLOAT(4,2)

);

CREATE TABLE order_items
( orderid INT unsigned NOT null,
  isbn CHAR(13) NOT null,
  quantity TINYINT unsigned,

  PRIMARY KEY (orderid, isbn)
);

CREATE TABLE book_reviews
(
	isbn CHAR(13) NOT NULL PRIMARY key,
	review text
);
