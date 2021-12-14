drop database if exists finalassign;
create database if not exists finalassign;
use finalassign;

create table customer(
    customer_id int not null auto_increment,
    first_name varchar(15),
    last_name varchar(15),
    phone varchar(15),
    creditID varchar(15),
    emailAdd varchar(15),
    regularAdd varchar(15),
    primary key(customer_id),
    unique(creditID)
);

create table bags(
    bag_id int not null,
    names varchar(15),
    Color varchar(15),
    Manufacturer varchar(15),
    Price float not null,
    nums int not null,
    primary key(bag_id)
);

create table rentals(
    rentals_id int not null auto_increment,
    customer_id int not null,
    DateRent Date,
    DateReturn Date,
    Insurance boolean,
    bag_id int not null,
    ReturnOP varchar(15),
    foreign key(bag_id) references bags(bag_id),
    foreign key(customer_id) references customer(customer_id),
    -- 不会有人同一天借同一个包，所以可以唯一表示一条交易记录
    primary key(rentals_id,customer_id, DateRent, bag_id),
    unique(rentals_id, customer_id, DateRent, bag_id)
);