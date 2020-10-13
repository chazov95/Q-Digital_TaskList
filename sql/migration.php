<?php
$link = mysqli_connect("mysql", "db", "db", "db");
if ($link !== false) {
    $link->query(
        'create table users
                (
                    id int auto_increment,
                    login varchar(30) null,
                    password varchar(100) not null,
                    created_at date null,
                    constraint users_pk
                    primary key (id)
                )'
    );
    $link->query(
        'create table tasks
                    (
    id          int auto_increment
        primary key,
    user_id     int         null,
    description varchar(255)         null,
    created_at  date        null,
    status      varchar(10) null,
    hash        text        not null
)'
    );
}
