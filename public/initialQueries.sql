create database rentacar;

use rentacar;

create table customers (
    person_number varchar(20) not null primary key,
    name varchar(256) not null,
    adress varchar(256) not null,
    postal_code int(5) not null,
    phone varchar(20) not null
);

create table cars (
    register_number varchar(10) not null primary key,
    make varchar(256) not null,
    color varchar(256) not null,
    year int(4) not null,
    price float(10,2) not null
);

create table history (
    id int(20) not null primary key AUTO_INCREMENT,
    register_number varchar(10) not null,
    person_number varchar(20) not null,
    FOREIGN KEY (register_number) REFERENCES cars (register_number) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (person_number) REFERENCES customers (person_number) ON UPDATE CASCADE ON DELETE CASCADE,
    checked_in datetime,
    checked_out datetime
);

insert into customers (person_number, name, adress, postal_code, phone) values (9309230465, 'Hermione Granger', 'Fall River Avenue 1105', '11190', '0739756160');
insert into customers (person_number, name, adress, postal_code, phone) values (9002152677, 'Ron Weasley', 'Charlton Road 100', '19360', '0769756160');
insert into customers (person_number, name, adress, postal_code, phone) values (5702130161, 'Sirius Black', 'Palmer Road 352', '19460', '0729756160');
insert into customers (person_number, name, adress, postal_code, phone) values (7405314563, 'Rubeus Hagrid', 'Washington Ave Extension 141', '15160', '0709756160');
insert into customers (person_number, name, adress, postal_code, phone) values (8205030789, 'Draco Malfoy', 'Niagara Falls Blvd 2055', '19120', '0729756160');
insert into customers (person_number, name, adress, postal_code, phone) values (4502148200, 'Severus Snape', 'Crooked Hill Road 85', '19120', '0749756160');

insert into cars (register_number, make, color, year, price) values ('ABD345', 'Peugeot', 'Green', '2010', '100');
insert into cars (register_number, make, color, year, price) values ('JGH578', 'Fiat', 'Green', '2015', '150');
insert into cars (register_number, make, color, year, price) values ('GDH645', 'Honda', 'White', '2013', '120');
insert into cars (register_number, make, color, year, price) values ('KDJ736', 'Hyundai', 'Blue', '2013', '120');
insert into cars (register_number, make, color, year, price) values ('JUH674', 'Toyota', 'Black', '2014', '300');
insert into cars (register_number, make, color, year, price) values ('FTE564', 'Chrysler', 'Red', '2015', '200');

create table makes (
    id int(20) not null primary key AUTO_INCREMENT,
    make varchar(20) not null
);

insert into makes (make) values ('Peugeot'), ('Suzuki'), ('Fiat'), ('Honda'), ('Hyundai'), ('Renault'), ('Toyota'), ('Volkswagen'), ('Chrysler');

create table colors (
    id int(20) not null primary key AUTO_INCREMENT,
    color varchar(20) not null
);

insert into colors (color) values ('Blue'), ('Red'), ('Green'), ('Yellow'), ('Black'), ('White'), ('Magenta'), ('Orange'), ('Grey'), ('Brown');
