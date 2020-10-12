-- auto-generated definition
create table users
(
    id         int auto_increment
        primary key,
    login      varchar(30) not null,
    password   varchar(30) not null,
    created_at date        null
);