-- Active: 1730125132301@@127.0.0.1@3306@laravel_db
use laravel_db;
create table user_ (
    id VARCHAR(100) not null PRIMARY KEY,
    nama VARCHAR(100) not null,
    deskripsi text,
    create_at TIMESTAMP
)engine innodb;



desc user_;
select * from user_;