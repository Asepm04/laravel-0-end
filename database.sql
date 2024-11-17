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
show tables;
select * from user;
desc categoris;
select  * from categoris;
alter table  categoris change column update_at updated_at timestamp default CURRENT_TIMESTAMP;

desc vouchers;
select * from voucher;
desc voucher;

alter table vouchers change column voucher_id id varchar default = 0; 