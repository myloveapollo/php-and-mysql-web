create database bookmarks;
use bookmarks;

create table user(
username varchar(16) primary key;
passwd varchar(40) not null,
email varchar(100) not null
);

create table bookmarks(
username varchar(16) not null,
bm_URL varchar(255) not null,
index(username),
index(bm_URL)
);

grant select, insert, delete, update
on bookmarks .*
to user_bm@localhost identified by 'password';