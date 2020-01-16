create database carrental;

use carrental;

create table customers (
    person_number int(13) not null primary key,
    name varchar(256) not null,
    adress varchar(256) not null,
    postal_code int(5) not null,
    phone int(20) not null
);

create table cars (
    register_number int(10) not null primary key,
    make varchar(256) not null,
    color varchar(256) not null,
    year int(4) not null,
    price int(10) not null,
    checked_in datetime,
    checked_out datetime
);

create table car_makes (
    make varchar(256) not null
);

create table car_colors (
    color varchar(256) not null
);

create table history (
    id int(20) not null primary key AUTO_INCREMENT,
    register_number int(10) not null,
    person_number int(10) not null,
    FOREIGN KEY (register_number) REFERENCES cars (register_number),
    FOREIGN KEY (person_number) REFERENCES customers (person_number)
);

/*
    price int(10) not null,
    checked_in datetime,
    checked_out datetime,
    days int(3) as (DATEDIFF(checked_out,checked_in)),
    cost int(10) as (price*days),
*/